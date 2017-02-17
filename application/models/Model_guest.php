<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_guest extends CI_Model {
	
	public function get_guest($restaurant_id){
		$this->db->select('reservation_guest.*, users.name, users.icon_path');
		$this->db->from('reservation_guest');
		$this->db->join('users','reservation_guest.server_id = users.id', 'left');
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	
	public function add_reservation($restaurant_id,$data,$tables){
		$reservation_guest_id = $this->get_reservation_id($restaurant_id);
		$data['reservation_guest_id'] = $reservation_guest_id;
		$this->db->insert('reservation_guest',$data);
		if($this->db->affected_rows() > 0){
			$id = $this->db->insert_id();
			//Add tables to database
			$i = 0;
			foreach($tables as $row){
				$tables[$i] = (array) $tables[$i];
				$tables[$i]['reservation_guest_id'] = $reservation_guest_id;
				$tables[$i]['reservation_id'] = 0;
				$tables[$i]['restaurant_id'] = $restaurant_id;
				$this->db->insert('reservation_tables',$tables[$i]);
				$i++;
			}
			return array('success'=>true,'id'=>$id,'reservation_guest_id'=>$reservation_guest_id);
		}
		return array('success'=>false,'id'=>null,'reservation_guest_id'=>null);
	}
	
	public function update_reservation($data){
		$this->db->update_batch ( 'reservation_guest' ,$data, 'id');
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;	
	}
	
	public function remove_reservation($restaurant_id,$reservation_guest_id){
		$this->db->where(array('restaurant_id'=>$restaurant_id,'reservation_guest_id'=>$reservation_guest_id));
		$this->db->delete('reservation_guest');
		if ($this->db->affected_rows () > 0) {
			$this->db->where(array('restaurant_id'=>$restaurant_id,'reservation_guest_id'=>$reservation_guest_id));
			$this->db->delete('reservation_tables');
			return true;
		}
		return false;
	}
	
	public function change_tables($restaurant_id,$reservation_guest_id,$tables){
		//Get tables from array
		$this->db->select('table_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->where('reservation_guest_id',$reservation_guest_id);
		$query = $this->db->get('reservation_tables');
		$current_tables = array();
		foreach($query->result() as $row){
			array_push($current_tables, $row->table_id);
		}
		$i = 0;
		
		//Add table if id does not exist in database
		foreach($tables as $row){
			if(($key = array_search($row->table_id, $current_tables)) !== false){
				unset($current_tables[$key]);
			}else{
				$table = array('table_id'=>$row->table_id,
				'restaurant_id'=>$restaurant_id,
				'reservation_guest_id'=>$reservation_guest_id,
				'reservation_id'=>0);
				$this->db->insert('reservation_tables',$table);
			}
		$i++;		
		}
		//Remove tables of id's from database that does not exsist in list
		foreach($current_tables as $row){
			$this->db->where(array('restaurant_id'=>$restaurant_id,
			'reservation_guest_id'=>$reservation_guest_id,
			'table_id'=>$row
			));
			$this->db->delete('reservation_tables');
		}
		return true;
	}
	
	private function get_reservation_id($restaurant_id){
		$this->db->select('MAX(reservation_guest_id) as max_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('reservation_guest');
		$new_id = $query->row()->max_id + 1;
		return $new_id;
	}
	
}
?>