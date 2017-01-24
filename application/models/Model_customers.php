<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_customers extends CI_Model {
	
	public function get_customers($restaurant_id,$current_page=1,$search_data="",$order){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		$data = array();
		//Search array data
		$search_array = array(
			
		);
		
		
		$this->db->select('users.id, users.name, users.icon_path, users.gender, users.email, COUNT(reservation.reservation_time) as reservation_total,
		reservation.reservation_time');
		$this->db->from('reservation');
		$this->db->join('users','reservation.user_id = users.id', 'inner');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->like('users.name', $search_data);
		$this->db->group_by('reservation.user_id');
		$this->db->order_by("reservation.reservation_id", $order);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		
		$data['total'] = $this->db->select('users.id')
		->join('users','reservation.user_id = users.id', 'inner')
		->where('restaurant_id', $restaurant_id)
		->like('users.name', $search_data)->group_by('user_id')->distinct()
		->count_all_results('reservation');
		
		return $data;
	}
	
}
?>