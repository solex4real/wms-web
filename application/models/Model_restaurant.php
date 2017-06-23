<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_restaurant extends CI_Model {
	
	public function can_log_in() {
		
		$this->db->select('password, salt');
		$this->db->where ( 'restaurant_username', $this->input->post ( 'username' ) );
		$query = $this->db->get ( 'restaurants' ); 
		if ($query->num_rows () == 1) {
			//Check password with bycrpt and salt
			$password = $query->row()->password;
			$salt = $query->row()->salt;
			$hash = crypt($this->input->post ( 'password' ), '$2y$12$' . $salt);
			if($password == crypt($this->input->post ( 'password' ),$hash)){
				return true;
			}
			return false;
		} else {
			return false;
		}
	}
	
	public function recover_valilidate($restaurant_id,$link_id){
		$this->db->where ( 'restaurant_id', $restaurant_id );
		$this->db->where ( 'link_id', $link_id );
		$query = $this->db->get ( 'forgot_password' );
		if ($query->num_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function get_name($username) {
		$this->db->select('*');
		$this->db->from('restaurants');
		$this->db->where ( 'restaurant_username', $username);
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->row();
		}else{
			
		}
		return false;
	}
	
	public function get_email($email){
		$this->db->select('email, password, name, restaurant_id');
		$this->db->from('restaurants');
		$this->db->where ( 'email', $email);
		$query = $this->db->get ();
		$data = array();
		if ($query->num_rows () > 0) {
			$data['email'] = $query->row()->email;
			$data['name'] = $query->row()->name;
			$data['restaurant_id'] = $query->row()->restaurant_id;
			$data['password'] = $query->row()->password;
			$data['success'] = true;
		}else{
			$data['email'] = "";
			$data['name'] = "";
			$data['restaurant_id'] = "";
			$data['password'] = "";
			$data['success'] = false;
		}
		return $data;
	}
	
	public function email_exist($email) {
		$this->db->where ( 'email',  $email);
		$query = $this->db->get ( 'restaurants' );
		if ($query->num_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function recovery_action($email){
		$this->db->select('email, name, restaurant_username, restaurant_id');
		$this->db->from('restaurants');
		$this->db->where ( 'email', $email);
		$query = $this->db->get ();
		$name = $query->row()->name;
		$id = $query->row()->restaurant_id;
		$username = $query->row()->restaurant_username;
		$data = array();
		$data['email'] = "";
		$data['name'] = "";
		$data['restaurant_id'] = "";
		$data['link_id'] = "";
		$data['success'] = false;
		if ($query->num_rows () > 0) {
			//add new link to recovery database
			$this->db->from('forgot_password');
			$this->db->where ( 'restaurant_id', $query->row()->restaurant_id);
			$query = $this->db->get ();
			$link_id = $this->generateRandomString(24);
			if($query->num_rows () > 0){
				//Update link if user id already exist
				$val = array (
				'link_id' => $link_id
				);
				$this->db->where('restaurant_id',$id);
				$this->db->update ( 'forgot_password', $val );
				if ($this->db->affected_rows () > 0) {
					$data['email'] = $emal;
					$data['name'] = $name;
					$data['restaurant_id'] = $id;
					$data['link_id'] = $link_id;
					$data['success'] = true;
					return $data;
				}
			}else{
				//Add link if user id does not exist
				$val = array(
					'restaurant_id'=>$id,
					'link_id'=>$link_id
				);
				$this->db->insert ( 'forgot_password', $val );
				if ($this->db->affected_rows () > 0) {
					$data['email'] = $email;
					$data['name'] = $name;
					$data['restaurant_id'] = $id;
					$data['link_id'] = $link_id;
					$data['success'] = true;
					return $data;
				}
			}
		}
		return $data;
	}
	
	public function get_id($restaurant_id) {
		$this->db->select('*');
		$this->db->from('restaurants');
		$this->db->where ( 'restaurant_id', $restaurant_id);
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->row();
		}else{
			
		}
		return false;
	}
	
	public function recover_update_password($restaurant_id, $new_password, $link_id, $date){
		$this->db->from('forgot_password');
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->where('link_id',$link_id);
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			$hash = crypt($new_password, '$2y$12$' . $salt);
			$data = array (
				'password' => $hash,
				'salt' => $salt,
				'date_modified' => $date
			);
			$this->db->where('restaurant_id',$restaurant_id);
			$this->db->update ( 'restaurants', $data );
			if ($this->db->affected_rows () > 0) {
				$val = $this->remove_link_id($restaurant_id,$link_id);
				return true;
			}
		}
		return false;
	}
	
	private function remove_link_id($restaurant_id,$link_id){
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->delete ('forgot_password' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function create_restaurant_username($name){
		$name = $this->clean($name);
		$cnt = 0;
		$exist = true;
		while($exist){
			$val = ($cnt == 0) ? "":$cnt;
			$this->db->where ( 'restaurant_username', $name.$val );
			$query = $this->db->get ( 'restaurants' );
			if ($query->num_rows () > 0) {
				$cnt++;
			}else{
				$exist = false;
			}
		}
		return $name.$val;
	}
	
	function clean($string) {
		$string = str_replace(' ', '.', $string); // Replaces all spaces with dots.
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
		return strtolower ($string );
	}
	
	public function update_image_path($id,$image_path,$location,$date){
		
		$data = array(
				$location=>$image_path,
				'date_modified'=>$date
		);
		$this->db->where('id',$id);
		$this->db->update ('restaurants', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function add_restaurant(){
		$date_created = date ( 'd/m/Y H:i' );
		$date_modified = date ( 'd/m/Y H:i' );
		$username = $this->create_restaurant_username($this->input->post ( 'name' ));
		// salt for bcrypt needs to be 22 base64 characters (but just [./0-9A-Za-z]), see http://php.net/crypt
		$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
		$hash = crypt($this->input->post ( 'password_r' ), '$2y$12$' . $salt);
		$data = array (
				'name' => $this->input->post ( 'name' ),
				'restaurant_username' => $username,
				'password' => $hash,
				'salt'=>$salt,
				'email' => $this->input->post ( 'email' ),
				'contact' => $this->input->post ( 'phone' ),
				'date_created' => $date_created,
				'date_modified' => $date_modified,
				'status' => 1
		);
		$this->db->insert ( 'restaurants', $data );
		if ($this->db->affected_rows () > 0) {
			$id = $this->db->insert_id();
			$restaurant_id = $id;
			$data = array(
				'restaurant_id'=>$restaurant_id
			);
			$this->db->where('id',$id);
			$this->db->update ( 'restaurants', $data );
			$this->send_email($username,$this->input->post ( 'email' ));
			return true;
		}
		return false;
	}
	
	public function send_email($restaurant_username,$email){
		$this->load->library('email');

		$this->email->from('services@whosmyserver.com', 'WMS WEB');
		$this->email->to($email); 
		//$this->email->cc('another@another-example.com'); 
		$this->email->bcc('emmanuelacd@gmail.com'); 
		$this->email->subject('WMS Restaurant Username');
		$message = "Welcome to Who's My Server!\n\n\nUse the username below to login into yor account.\nYour Restaurant Username: ".
		$restaurant_username."\n\nLogin Website: ".base_url()."restaurant/login";
		$this->email->message($message);	

		$this->email->send();

		//echo $this->email->print_debugger();
	}
	
	public function get_autocomplete($search_data) {
		$this->db->select('name');
		$this->db->select('id');
		$this->db->like('name', $search_data);
		return $this->db->get('restaurants', 10);
	}
	
	public function get_servers($search_data) {
		$this->db->select('*');
		$query = $this->db->get('restaurants');
		return $query->result();
	}
	
	public function test(){
		
		$result = "test";
		return $result;
	}
	
	public function get_available_servers($restaurant_id,$start,$group_size=1){
		$end = date('Y-m-d H:i:s', 
		strtotime('+60 minutes', strtotime($start)));//add 60 mins from datetime 
		
		//Sub query of online reservation time
		$this->db->select('reservation_time, server_id, restaurant_id, SUM(customer_size) as table_total')->from('reservation');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->where('reservation.reservation_time <=',$start);
		$this->db->having('ADDTIME(reservation.reservation_time, "01:00:00") >=',$start);
		$subQuery1 =  $this->db->get_compiled_select();
		
		//Sub query for guest reservation time
		$this->db->select('arrival_time as reservation_time, server_id, restaurant_id, SUM(customer_size) as table_total')->from('reservation_guest');
		$this->db->where('reservation_guest.restaurant_id ',$restaurant_id);
		$this->db->having('reservation_guest.arrival_time <=',$start);
		$this->db->having('ADDTIME(reservation_guest.arrival_time, "0 01:00:00") >=',$start);
		$subQuery2 =  $this->db->get_compiled_select();
		
		//Combined query
		$this->db->query("SELECT * FROM(".$subQuery1." UNION ".$subQuery2.") as t");
		$subQuery = $this->db->last_query();
		
		$this->db->select('servers.user_id, servers.server_limit, reservation.table_total as table_total, 
		reservation.reservation_time, calendar.start, calendar.end, calendar.title, 
		users.email, users.name, users.username, users.icon_path, AVG(ratings.rating) as rating_avg
		');
		//, AVG(ratings.rating) as rating_avg, ratings.rating
		$this->db->from('servers');
		
		$this->db->join('calendar', 'servers.user_id = calendar.server_id', 'left');
		$this->db->join("($subQuery) as reservation", 'servers.user_id = reservation.server_id', 'left');
		$this->db->join('users','servers.user_id = users.id', 'inner');
		$this->db->join('ratings','servers.user_id = ratings.server_id', 'left');
		$this->db->where('calendar.start <=',$start);
		$this->db->where('calendar.end >=',$end);
		$this->db->where('servers.status',1);
		$this->db->having('coalesce(servers.server_limit - reservation.table_total,servers.server_limit, reservation.table_total) >', $group_size);
		$this->db->group_by('servers.user_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
		
	} 
	
	public function get_current_servers($restaurant_id){
		
		//Get currently available servers from datbase
		$date = date('Y-m-d H:i:s');
		$this->db->select('calendar.start, calendar.end, calendar.title,
		users.email, users.name, servers.user_id, users.icon_path, users.username,
		servers.server_limit, AVG(ratings.rating) as rating_avg');
		$this->db->from('servers');
		$this->db->join('calendar','servers.user_id = calendar.server_id', 'left');
		$this->db->join('users','servers.user_id = users.id', 'inner');
		$this->db->join('ratings','servers.user_id = ratings.server_id', 'left');
		$this->db->where('servers.restaurant_id ',$restaurant_id);
		$this->db->where('calendar.start <=',$date);
		$this->db->where('calendar.end >=',$date);
		$this->db->group_by('servers.user_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function get_used_tables($restaurant_id,$start){
		//Define values for date range
		$start_high = date('Y-m-d H:i:s', 
		strtotime('+60 minutes', strtotime($start)));//add 60 mins from datetime 
		$start_low = date('Y-m-d H:i:s', 
		strtotime('-60 minutes', strtotime($start)));//minus 60 mins from datetime 
		
		//$this->db->select('*');
		$this->db->select_sum('table_num');
		$this->db->from('reservation');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where("reservation.reservation_time<=",$start_high);
		$this->db->where("reservation.reservation_time>=",$start_low);
		$query = $this->db->get();
		
		return $query->result(); 
	}
	
	public function get_tables($restaurant_id,$current_page=1,$search_data="",$order){
		$limit = 10;
		$start = ($current_page-1)*$limit;
		$this->db->select('*');
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->like('table_id',$search_data);
		$this->db->order_by("table_id", $order);
		$this->db->limit($limit, $start);
		$query = $this->db->get('restaurant_tables');
		$data = array();
		$data['rows'] = $query->result();
		$data['lenght'] = count($data['rows']);
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		$data['total'] = $this->db->where('restaurant_tables.restaurant_id ',$restaurant_id)
		->like('table_id', $search_data)->count_all_results('restaurant_tables');
		
		return $data; 
	}
	
	public function add_table($restaurant_id,$size,$quantity,$description,$location){
		$table_id = $this->get_last_table_id($restaurant_id)+1;
		$data = array(
			'restaurant_id'=>$restaurant_id,
			'table_id'=>$table_id,
			'size'=>$size,
			'quantity'=>$quantity,
			'description'=>$description,
			'location'=>$location
		);
		$this->db->insert ( 'restaurant_tables', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_table($id,$size,$quantity,$description,$location){
		$data = array(
			'size'=>$size,
			'quantity'=>$quantity,
			'description'=>$description,
			'location'=>$location
		);
		$this->db->where('id',$id);
		$this->db->update ('restaurant_tables', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function remove_table($id){
		$array = array('id=' => $id);
		$this->db->where($array);
		$this->db->delete ( 'restaurant_tables' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function get_last_table_id($restaurant_id){
		$this->db->select('table_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('restaurant_tables');
		$data = $query->result();
		$val = json_encode($data);
		$cnt = count($val);
		if($cnt==0){
			$table_id = 200;
		}else{
			$table_id = $this->maxValueInArray($data, "table_id");
		}
		return $table_id;
	}
	
	public function get_schedule($restaurant_id){
		$this->db->select('*');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('restaurant_schedule');
		$result = $query->result();
		return $result;
	}
	
	public function add_schedule($restaurant_id, $start_day, $end_day, $start_time, $end_time){
		$data = array(
			'restaurant_id'=>$restaurant_id,
			'start_day'=>$start_day,
			'end_day'=>$end_day,
			'start_time'=>$start_time,
			'end_time'=>$end_time
		);
		$this->db->insert('restaurant_schedule',$data);
		if ($this->db->affected_rows () > 0) {
			return array(
				"id"=>$this->db->insert_id(),
				"success"=>true
			);
		}
		return array(
				"id"=>0,
				"success"=>false
			);
	}
	
	public function remove_schedule($id){
		$array = array('id=' => $id);
		$this->db->where($array);
		$this->db->delete ( 'restaurant_schedule' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function maxValueInArray($array, $keyToSearch){
    $currentMax = NULL;
    foreach($array as $arr)
    {
        foreach($arr as $key => $value)
        {
            if ($key == $keyToSearch && ($value >= $currentMax))
            {
                $currentMax = $value;
            }
        }
    }

    return $currentMax;
	}
	
	public function check_server_available($restaurant_id,$server_id,$limit=8,$start){
		
		//Define values for date range
		$start_high = date('Y-m-d H:i:s', 
		strtotime('+60 minutes', strtotime($start)));//add 60 mins from datetime 
		$start_low = date('Y-m-d H:i:s', 
		strtotime('-60 minutes', strtotime($start)));//minus 60 mins from datetime 
		
		//$this->db->select('table_num, count(*)');
		$this->db->select_sum('table_num');
		$this->db->from('reservation');
		$this->db->where('reservation.server_id',$server_id);
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where("reservation.reservation_time<=",$start_high);
		$this->db->where("reservation.reservation_time>=",$start_low);
		$query = $this->db->get();
		
		if($query->row()->table_num>$limit){
			return false;
		}else{
			return true;
		}
		
		//return $query->row()->table_num;
	}
	
	public function check_server_reservation($restaurant_id,$server_id,$start){
		
		//Define values for date range
		$start_high = date('Y-m-d H:i:s', 
		strtotime('+60 minutes', strtotime($start)));//add 15 mins from datetime 
		$start_low = date('Y-m-d H:i:s', 
		strtotime('-60 minutes', strtotime($start)));//minus 15 mins from datetime 
		
		//$this->db->select('table_num, count(*)');
		$this->db->from('reservation');
		$this->db->where('reservation.server_id',$server_id);
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where("reservation.reservation_time<=",$start_high);
		$this->db->where("reservation.reservation_time>=",$start_low);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function get_html_data($restaurant_id) {
		$this->db->select('*');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('restaurants');
		return $query->row();
	}
	
	public function add_data($restaurant_id,$data_text,$date){
		$data = array(
				'restaurant_id'=>$restaurant_id,
				'data_text'=>$data_text,
				'date_modified'=>$date
		);
		$this->db->insert ( 'restaurant_data', $data );
		if ($this->db->affected_rows () > 0) {
			return $this->db->affected_rows ();
		}
		return false;
	}
	public function update_data($restaurant_id,$data_text,$date){
		$data = array(
				'data_text'=>$data_text,
				'date_modified'=>$date
		);
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->update ( 'restaurants', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_password($restaurant_id,$new_password,$old_password,$date){
		$this->db->select('password, salt');
		$array = array('restaurant_id=' => $restaurant_id);
		$this->db->where ($array );
		$query = $this->db->get ( 'restaurants' );
		
		//Change password
		if ($query->num_rows () == 1) {
			//Check password with bycrpt and salt
			$password = $query->row()->password;
			$salt = $query->row()->salt;
			$hash = crypt($old_password, '$2y$12$' . $salt);
			if($password == crypt($old_password,$hash)){
				$hash = crypt($new_password, '$2y$12$' . $salt);
				$data = array (
				'password' => $hash,
				'date_modified' => $date
				);
				$this->db->where('restaurant_id',$restaurant_id);
				$this->db->update ( 'restaurants', $data );
				if ($this->db->affected_rows () > 0) {
					return true;
				}
				return false;
			}
			return false;
		} else {
			return false;
		}
	}
	
	public function update_res_info($restaurant_id,$name,$contact,$email,$description,
		$address,$state,$county,$zip,$url,$start_day,$end_day,$start_time,$end_time,$date){
		$data = array(
				'name'=>$name,
				'contact'=>$contact,
				'email'=>$email,
				'description'=>$description,
				'address'=>$address,
				'state'=>$state,
				'county'=>$county,
				'zip'=>$zip,
				'url'=>$url,
				'start_day'=>$start_day,
				'end_day'=>$end_day,
				'start_time'=>$start_time,
				'end_time'=>$end_time,
				'date_modified'=>$date
		);
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->update ('restaurants', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_owner_info($restaurant_id,$name_first,$name_last,$contact,$email,$date){
		$data = array(
				'owner_first_name'=>$name_first,
				'owner_last_name'=>$name_last,
				'owner_contact'=>$contact,
				'owner_email'=>$email,
				'date_modified'=>$date
		);
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->update ('restaurants', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_res_settings($restaurant_id,$server_id,$server_limit,$server_status){
			$data = array(
				'server_limit'=>$server_limit,
				'status'=>$server_status
			);
			$this->db->where('user_id',$server_id);
			$this->db->update ( 'servers', $data );
			if ($this->db->affected_rows () > 0) {
				return  true;
			}
			
		return false;
	}
	
	public function generateRandomString($length = 10) {
		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 
		ceil($length/strlen($x)) )),1,$length);
	}
}
?>