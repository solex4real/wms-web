<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_servers extends CI_Model {
	
	public function get_events($server_id){
		$this->db->select('title');
		$this->db->select('start');
		$this->db->select('end');
		$this->db->select('allDay');
		$this->db->select('className');
		$this->db->where('server_id',$server_id);
		$query = $this->db->get('calendar');
		return $query->result();
	}
	
	public function get_autocomplete($search_data) {
		$limit = 10;
		$this->db->select('servers.restaurant_id, servers.user_id, servers.id,
		users.name as name, users.username');
		/*
		$this->db->select('name');
		$this->db->select('restaurant_id');
		$this->db->select('user_id');
		$this->db->select('id');
		*/
		$this->db->from('servers');
		$this->db->join('users','servers.user_id = users.id', 'inner');
		$this->db->like('users.name', $search_data);
		$this->db->limit($limit);
		$query  = $this->db->get();
		return $query->result();
	}
	
	public function get_servers($restaurant_id){
		$this->db->select('servers.*, users.icon_path as icon_path, users.name as name, users.email as email, users.username,
		restaurants.name as restaurant_name, AVG(ratings.rating) rating_avg');
		$this->db->from('servers');
		$this->db->join('restaurants','servers.restaurant_id = restaurants.restaurant_id', 'inner');
		$this->db->join('users','servers.user_id = users.id', 'inner');
		$this->db->join('ratings','servers.user_id = ratings.server_id', 'left');
		$this->db->group_by('servers.user_id');
		$this->db->where('servers.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_rating($server_id,$current=1,$offset=0){
		$limit = 10;
		$start = ($current-1)*$limit +$offset;
		$this->db->select('ratings.*, users.icon_path as icon_path, users.username as name');
		$this->db->from('ratings');
		$this->db->join('users','ratings.server_id = users.id', 'inner');
		$this->db->where('ratings.server_id',$server_id);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$data = array();
		$data['result'] = $query->result();
		$data['total'] = $this->db->where('server_id', $server_id)->count_all_results('ratings');
		$results = $this->db->select('AVG(rating) rating_avg, AVG(service) service_avg, 
		AVG(personality) personality_avg, AVG(aesthetics) aesthetics_avg')
		->where('server_id', $server_id)->get('ratings')->row();
		$data['rating_avg'] = $results->rating_avg;
		$data['personality_avg'] = $results->personality_avg;
		$data['service_avg'] = $results->service_avg;
		$data['aesthetics_avg'] = $results->aesthetics_avg;
		return $data;
	}
	
	public function get_server($username){
		$this->db->select('servers.*, users.icon_path as icon_path, users.name as name, users.email as email, users.username,
		users.about, restaurants.name as restaurant_name');
		$this->db->from('servers');
		$this->db->join('restaurants','servers.restaurant_id = restaurants.restaurant_id', 'inner');
		$this->db->join('users','servers.user_id = users.id', 'inner');
		$array = array('users.username =' => $username);
		$this->db->where($array);
		$query = $this->db->get();
		if ($query->num_rows () > 0) {
			return $query->row();
		}else{
			
		}
		return false;
	}
	
	public function add_rating($user_id,$restaurant_id,$server_id,
		$service,$personality,$aesthetics,$comments){
		$len = 3; //Amount of ratings
		$date = date ( 'd/m/Y H:i' );
		$rating = ($personality+$aesthetics+$service)/$len;
		$data = array(
				'user_id'=>$user_id,
				'restaurant_id'=>$restaurant_id,
				'server_id'=>$server_id,
				'type'=>"1",
				'rating'=>$rating,
				'service'=>$service,
				'personality'=>$personality,
				'aesthetics'=>$aesthetics,
				'comments'=>$comments,
				'date'=>$date
				
		);
		//Add to ratings to database
		
		$this->db->insert ( 'ratings', $data );
		$id = $this->db->insert_id();
	
		//Update current ratings
		//$this->update_rating($server_id);
		if ($this->db->affected_rows () > 0) {
			$data = array('success'=>true,
						'id'=>$id);
			return $data;
		}else{
		$data = array('success'=>false,
					'id'=>0);
		return $data;
		}
	}
	
	public function update_rating($server_id){
		
		//Update current 
		$len = 3;
		$this->db->select('service');
		$this->db->select('personality');
		$this->db->select('aesthetics');
		$array = array( 'server_id =' => $server_id);
		$this->db->where($array);
		$query = $this->db->get('ratings');
		$result =  $query->result();
		$service = 0;
		$personality = 0;
		$aesthetics = 0;
		$rating = 0;
		$cnt = 0;
		foreach ( $result as $row ){
			$cnt = $cnt + 1;
			$service = $service + $row->service;
			$personality = $personality + $row->personality;
			$aesthetics = $aesthetics + $row->aesthetics;
			$rating = ($row->service + $row->personality + $row->aesthetics)/$len + $rating;
		}
		
		if ($cnt==0){
			
			$data = array(
			'service'=>0,
			'personality'=>0,
			'aesthetics'=>0,
			'rating'=>0,
			'total'=>0
		);
		
		$rating_data = array(
			'rating'=>0,
			'rating_json'=>json_encode($data)
		);
		}else{
		$data = array(
			'service'=>$service/$cnt,
			'personality'=>$personality/$cnt,
			'aesthetics'=>$aesthetics/$cnt,
			'rating'=>$rating/$cnt,
			'total'=>$cnt
		);
		
		$rating_data = array(
			'rating'=>$rating/$cnt,
			'rating_json'=>json_encode($data)
		);
		
		}
		$array = array('user_id =' => $server_id);
		$this->db->where($array);
		$this->db->update ( 'servers', $rating_data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
		
	}
	
	public function add_server($server_id,$restaurant_id){
		//$this->db->where ( 'username', $username );
		
		$this->db->select('id');
		$this->db->where('id',$server_id);
		$query = $this->db->get('users');
		$result = $query->result_array();
		$data = array(
				'user_id'=>$result[0]['id'],
				'restaurant_id'=>$restaurant_id,
				'title'=>"Server",
				'server_limit'=>8,
				'status'=>1
		);
		$data2 = array(
				'restaurant_id'=>$restaurant_id,
				'status'=>1
		);
		
		//$array = array('restaurant_id=' => $restaurant_id, 'user_id=' => $server_id);
		$this->db->where('user_id',$server_id);
		$query = $this->db->get ( 'servers' );
		if ($query->num_rows () == 0) {
			$this->db->insert ( 'servers', $data );
		}else{
			//$array = array('restaurant_id=' => $restaurant_id, 'user_id=' => $server_id);
			$this->db->where('user_id',$server_id);
			//$this->db->where($array);
			$this->db->update ( 'servers', $data2 );
		}
		
		
		if ($this->db->affected_rows () > 0) {
			//Update current ratings
			//$this->update_rating($server_id);
			return true;
		}
		return false;
	}
	
	public function check_server($restaurant_id,$user_id){
		$array = array('restaurant_id=' => $restaurant_id, 'user_id=' => $user_id);
		$this->db->where ($array);
		$query = $this->db->get ( 'servers' );
		if ($query->num_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function remove_server($restaurant_id,$user_id){
		
		$array = array('restaurant_id='=>$restaurant_id,'user_id=' => $user_id);
		$this->db->where($array);
		$data = array(
				'restaurant_id'=>9,
				//'restaurant_name'=>"",
				'status'=>0
		);
		$this->db->update ( 'servers', $data );
		//$this->db->delete ( 'servers' );
		
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function remove_rating($id){	
		$array = array('id=' => $id);
		$this->db->where($array);
		$this->db->delete ( 'ratings' );
		if ($this->db->affected_rows () > 0) {
			//$this->update_rating($server_id);
			return true;
		}
		return false;
	}
	
}
?>