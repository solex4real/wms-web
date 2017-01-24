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
	
	public function get_sections($restaurant_id){
		$this->db->select('*');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('table_sections');
		return $query->result();
	}
	
	public function test($restaurant_id){
		$this->db->select('table_sections.*,tables.*');
		$this->db->from('table_sections');
		$this->db->join('tables' ,'table_sections.section_id = tables.section_id','right outer');
		$this->db->where('table_sections.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		//return $query->result();
		return $this->db->last_query();
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
			return true;
		}
		return false;
	}
	
	public function update_table($data,$restaurant_id){
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->update_batch ( 'tables' ,$data, 'table_id');
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
}
?>