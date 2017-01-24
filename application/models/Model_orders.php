<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_orders extends CI_Model {
	
	public function get_orders($restaurant_id,$search_data,$current_page=1){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		
		$this->db->select('orders.*,users.name as customer_name, users.id as customer_id,
		users.email as customer_email');
		
		$this->db->from('orders');
		$this->db->join('restaurants','orders.restaurant_id = restaurants.restaurant_id', 'inner');
		$this->db->join('users','orders.customer_id = users.id', 'inner');
		$this->db->where('orders.restaurant_id', $restaurant_id);
		$array = array('orders.order_id' => $search_data);
		$this->db->like($array);
		$this->db->limit($limit, $start);
		
		$query = $this->db->get();
		$data = array();
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		$data['total'] = $count = $this->db->where("orders.restaurant_id",$restaurant_id)->like($array)->count_all_results("orders");
		return $data;
	}
	
	public function add_order($customer_id,$restaurant_id,$order,$notes,$status){
		$date = date ( 'd.m.Y H:i' );
		$order_id = $this->get_last_order_id($restaurant_id)+1;
		$data = array(
				'order_id'=>$order_id,
				'customer_id'=>$customer_id,
				'restaurant_id'=>$restaurant_id,
				'server_id'=>$server_id,
				'order'=>$order,
				'notes'=>$notes,
				'status'=>$status,
				'date_sent'=>$date,
				'date_modified'=>$date,
		);
		$this->db->insert ( 'orders', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_order($restaurant_id,$order_id,$order,$notes,$status){
		$date = date ( 'd.m.Y H:i' );
		$data = array(
				'order'=>$order,
				'notes'=>$notes,
				'status'=>$status,
				'date_modified'=>$date,
		);
		$array = array('restaurant_id=' => $restaurant_id, 'order_id =' => $order_id);
		$this->db->where($array);
		$this->db->update ( 'orders', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function get_last_order_id($restaurant_id){
		$this->db->select('order_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('orders');
		$val = json_encode($query->result());
		$cnt = count($query->result());
		if($cnt==0){
			$order_id = 20000;
		}else{
			$val2 = $query->result_array();
			$order_id = $val2[$cnt-1]['order_id'];
		}
		//$val3 = $this->new_order_id(2202);
		return $order_id;
	}
	
	public function new_order_id($order_id){
		$new_id = $order_id+1;
		return $new_id;
	}
	
	public function remove_order($restaurant_id,$order_id){
		$array = array('restaurant_id=' => $restaurant_id, 'order_id =' => $order_id);
		$this->db->where($array);
		$this->db->delete ( 'orders' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
}
?>