<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_products extends CI_Model {
	
	public function get_products($restaurant_id,$search_data,$current_page=1){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		
		$this->db->select('*');
		$this->db->where('restaurant_id',$restaurant_id);
		$array = array('name' => $search_data);
		$this->db->like($array);
		$this->db->limit($limit, $start);
		
		$query = $this->db->get('foods');
		$data = array();
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		$data['total'] = $count = $this->db->where("restaurant_id",$restaurant_id)->like($array)->count_all_results("foods");
		
		
		return $data;
	}
	
	public function add_product($restaurant_id,$name,$type,$description,$price,$tag,$status,$image_path){
		$product_id = $this->get_last_product_id($restaurant_id)+1;
		$data = array(
				'product_id'=>$product_id,
				'restaurant_id'=>$restaurant_id,
				'name'=>$name,
				'type'=>$type,
				'description'=>$description,
				'tag'=>$tag,
				'price'=>$price,
				'status'=>$status,
				'image_path'=>$image_path
		);
		$this->db->insert ( 'foods', $data );
		if ($this->db->affected_rows () > 0) {
			//Get product
			$this->db->select('*');
			$array = array('restaurant_id=' => $restaurant_id,'product_id='=>$product_id);
			$this->db->where($array);
			$val = json_encode($this->db->get('foods')->result());
			//return $query->result();
			$data1 = array(
				'success'=>1,
				'data'=>$val
				
				);
			
			return $data1;
		}
		$data1 = array(
				'success'=>0,
				'data'=>""
				
				);
		return $data1;
	}
	
	public function update_product($restaurant_id,$product_id,$name,$type,$description,$price,$tag){
		$data = array(
				'product_id'=>$product_id,
				'restaurant_id'=>$restaurant_id,
				'name'=>$name,
				'type'=>$type,
				'description'=>$description,
				'tag'=>$tag,
				'price'=>$price
		);
		$array = array('restaurant_id=' => $restaurant_id, 'product_id =' => $product_id);
		$this->db->where($array);
		$this->db->update ( 'foods', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_image_path($restaurant_id,$product_id,$image_path,$date){
		$data = array(
				'image_path'=>$image_path,
				'date_modified'=>$date
		);
		$data1 = array(
			'restaurant_id'=>$restaurant_id,
			'product_id'=>$product_id
		);
		$this->db->where($data1);
		$this->db->update ('foods', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function remove_product($restaurant_id,$product_id){
		$array = array('restaurant_id=' => $restaurant_id, 'product_id =' => $product_id);
		$this->db->where($array);
		$this->db->delete ( 'foods' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function get_last_product_id($restaurant_id){
		$this->db->select('product_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('foods');
		$val = json_encode($query->result());
		$cnt = count($query->result());
		if($cnt==0){
			$product_id = 100;
		}else{
			$val2 = $query->result_array();
			$product_id = $val2[$cnt-1]['product_id'];
		}
		return $product_id;
	}
	
}
?>