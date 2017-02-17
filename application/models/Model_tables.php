<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_tables extends CI_Model {
	
	public function get_tables($restaurant_id){
		$this->db->select('table_sections.*,tables.*');
		$this->db->from('table_sections');
		$this->db->join('tables' ,'table_sections.section_id = tables.section_id','left');
		$this->db->where('table_sections.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_preview_tables($restaurant_id){
		$start = strtotime(date('Y-m-d H:i:s').' -8 hours');
		$end = strtotime(date('Y-m-d H:i:s').' +8 hours');
		$date1 = date("Y-m-d H:i:s", $start);
		$date2 = date("Y-m-d H:i:s", $end);
		//sub query for customer reservations
		$this->db->select('reservation.id as res_id, reservation.arrival_time, reservation.turn_time,
		reservation.reservation_id, tables.table_id, users.name as customer_name,
		s.name as server_name, "reserved" as type');
		$this->db->from('reservation_tables');
		$this->db->join('tables', 'reservation_tables.table_id = tables.table_id', 'inner');
		$this->db->join('reservation', 'reservation_tables.reservation_id = reservation.reservation_id', 'left');
		$this->db->join('users', 'reservation.user_id = users.id', 'inner');
		$this->db->join('users s', 'reservation.server_id = s.id', 'inner');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.status',2);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$subQuery1 =  $this->db->get_compiled_select();
		
		//sub query for guest reservations
		$this->db->select('reservation_guest.id as res_id, reservation_guest.arrival_time, reservation_guest.turn_time,
		reservation_guest.reservation_guest_id, tables.table_id, reservation_guest.guest_name as customer_name,
		s.name as server_name, "guest" as type');
		$this->db->from('reservation_tables');
		$this->db->join('tables', 'reservation_tables.table_id = tables.table_id', 'inner');
		$this->db->join('reservation_guest', 'reservation_tables.reservation_guest_id = reservation_guest.reservation_guest_id', 'left');
		$this->db->join('users s', 'reservation_guest.server_id = s.id', 'inner');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$this->db->where('reservation_guest.status',2);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$subQuery2 =  $this->db->get_compiled_select();
		
		//Sub query for all reservations
		$this->db->query($subQuery1." UNION ".$subQuery2)->result();
		$subQuery =  $this->db->last_query();
		$this->db->flush_cache();
		
		$this->db->select('table_sections.*,tables.*,tab_res.turn_time, tab_res.reservation_id,
		tab_res.arrival_time, tab_res.customer_name, tab_res.server_name, tab_res.res_id,
		ADDTIME(tab_res.arrival_time, (tab_res.turn_time)) as turn_time_val, tab_res.type as res_type');
		$this->db->from('tables');
		$this->db->join('table_sections' ,'tables.section_id = table_sections.section_id','inner');
		$this->db->join("($subQuery) as tab_res", 'tables.table_id = tab_res.table_id',
		'left');
		$this->db->where('tables.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_sections($restaurant_id){
		$this->db->select('*');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('table_sections');
		return $query->result();
	}
	
	public function test($restaurant_id){
		$this->db->select('MAX(section_id) as max_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('table_sections');
		$query = $query->row();
		$max_id = $query->max_id;
		return $max_id;
	}
	
	public function get_reservation_times($restaurant_id){
		$this->db->select('reservation.*, FROM_UNIXTIME(ROUND(UNIX_TIMESTAMP(DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %h:%i:%s")) DIV 1800) * 1800) as start,
		FROM_UNIXTIME(ROUND(UNIX_TIMESTAMP(DATE_FORMAT(ADDTIME(reservation.arrival_time, (reservation.turn_time)), "%Y-%m-%d %h:%i:%s")) DIV 1800) * 1800) as end,
		users.name as title, s.name as server_name, "" as allDay, "bgm-green" as className');
		$this->db->from('reservation');
		$this->db->join('users' ,'reservation.user_id = users.id', 'inner');
		$this->db->join('users as s' ,'reservation.server_id = s.id', 'inner');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function add_table($restaurant_id,$table_id,$num_chairs,$top_pos,
		$left_pos,$size,$orientation,$type,$section){
		$data = array(
			'restaurant_id'=>$restaurant_id,
			'table_id'=>$table_id,
			'num_chairs'=>$num_chairs,
			'top_pos'=>$top_pos,
			'left_pos'=>$left_pos,
			'size_h'=>$size,
			'size_w'=>$size,
			'orientation'=>$orientation,
			'type'=>$type,
			'section_id'=>$section
		);
		$this->db->insert ( 'tables', $data );
		if ($this->db->affected_rows () > 0) {
			return array('success'=>true,'id'=>$this->db->insert_id() );
		}
		return array('success'=>false,'id'=>0 );
	}
	
	public function add_section($restaurant_id, $section_name){
		$this->db->select('MAX(section_id) as max_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('table_sections');
		$query = $query->row();
		$max_id = $query->max_id;
		$section_id = $max_id + 1;
		$data = array(
			'restaurant_id'=>$restaurant_id,
			'section_id'=>$section_id,
			'section_name'=>$section_name
		);
		$this->db->insert ( 'table_sections', $data );
		if ($this->db->affected_rows () > 0) {
			return array('success'=>true,'section_id'=>$section_id,'id'=>$this->db->insert_id() );
		}
		return array('success'=>false,'section_id'=>'','id'=>0 );
	}
	
	public function update_table($data,$restaurant_id){
		//$this->db->where('restaurant_id',$restaurant_id);
		$this->db->update_batch ( 'tables' ,$data, 'id');
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_section($data,$restaurant_id){
		//$this->db->where('restaurant_id',$restaurant_id);
		$this->db->update_batch ( 'table_sections' ,$data, 'id');
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function delete_table($restaurant_id,$table_id){
		
		$this->db->where(array('restaurant_id'=>$restaurant_id,'table_id'=>$table_id));
		$this->db->delete ( 'tables' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function delete_section($id){
		
		$this->db->where(array('id'=>$id));
		$this->db->delete ( 'table_sections' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
}
?>