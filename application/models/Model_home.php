<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_home extends CI_Model {
	public function get_autocomplete($search_data) {
		$this->db->select('name');
		$this->db->select('id');
		$this->db->select('restaurant_username');
		$this->db->where('status',"1");
		$this->db->like('name', $search_data);
		return $this->db->get('restaurants', 10);
	}
	
	public function get_restaurants($search_data) {
		$this->db->select('*');
		$this->db->where('status',"1");
		$this->db->like('name', $search_data);
		$query = $this->db->get('restaurants');
		return $query->result();
	}
	
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
	
}
?>