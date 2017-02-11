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
		//Sub query for reservation tables
		$this->db->select('tables.*, reservation_tables.reservation_id, reservation.turn_time,
		reservation.arrival_time, ADDTIME(reservation.arrival_time, (reservation.turn_time)) as turn_time_val');
		$this->db->from('reservation_tables');
		$this->db->join('tables', 'reservation_tables.table_id = tables.table_id', 'inner');
		$this->db->join('reservation', 'reservation_tables.reservation_id = reservation.reservation_id', 'left');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$this->db->group_by('tables.table_id');
		//$this->db->where('reservation.reservation_time <=',$start);
		//$this->db->having('ADDTIME(reservation.reservation_time, "01:00:00") >=',$start);
		$subQuery =  $this->db->get_compiled_select();
		
		$this->db->select('table_sections.*,tables.*,tab_res.turn_time, tab_res.reservation_id,
		tab_res.arrival_time');
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