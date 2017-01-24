<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_calendar extends CI_Model {
	
	public function get_events($user_id,$type){
		/*
		$this->db->select('id');
		$this->db->select('title');
		$this->db->select('server_id');
		$this->db->select('start');
		$this->db->select('end');
		$this->db->select('allDay');
		$this->db->select('className');
		$this->db->select('tag');
		*/
		$this->db->select('*');
		if($type==="restaurant"){
			$this->db->where('restaurant_id',$user_id);
		}else{
			$this->db->where('server_id',$user_id);
		}
		$query = $this->db->get('calendar');
		return $query->result();
	}
	
	public function add_event($restaurant_id,$server_id,$title,$start,$end,$allDay,$className,$tag,$date){
		//$restaurant_id = $this->get_restaurant_id($server_id);
		$data = array(
				'restaurant_id'=>$restaurant_id,
				'server_id'=>$server_id,
				'title'=>$title,
				'start'=>$start,
				'end'=>$end,
				'allDay'=>$allDay,
				'className'=>$className,
				'tag'=>$tag,
				'date'=>$date
		);
		$this->db->insert ( 'calendar', $data );
		$insert_id = $this->db->insert_id();
		if ($this->db->affected_rows () > 0) {
			return $insert_id;
		}
		return false;
	}
	
	public function update_event($id,$title,$start,$end,$allDay,$className,$tag,$date){
		$data = array(
				'title'=>$title,
				'start'=>$start,
				'end'=>$end,
				'className'=>$className,
				'allDay'=>$allDay,
				'tag'=>$tag,
				'date'=>$date
		);
		$this->db->where('id',$id);
		$this->db->update ( 'calendar', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function save_event($id,$server_id,$restaurant_id,$title,$className,$tag,$date){
		$data = array(
				'title'=>$title,
				'server_id'=>$server_id,
				'restaurant_id'=>$restaurant_id,
				'className'=>$className,
				'tag'=>$tag,
				'date'=>$date
		);
		$this->db->where('id',$id);
		$this->db->update ( 'calendar', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function delete_event($id){
	
		$this->db->where('id',$id);
		$this->db->delete ( 'calendar' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	function get_restaurant_id($server_id){
		$this->db->select('restaurant_id');
		$this->db->where('user_id',$server_id);
		$row = $this->db->get('servers')->row();
		if(isset($row)){
			return $row->restaurant_id;
		}else{
			return 0;
		}
	}
}
?>