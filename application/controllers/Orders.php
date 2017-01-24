<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{
		if($this->session->userdata('is_logged_in')){
			//echo "Pass";
			$user_data = $this->session->userdata;
			$this->load->model('Model_orders');
			$orders = $this->Model_orders->get_orders($user_data['id'],"",1);
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'id' => $user_data['id'],
					'view' => 'Orders',
					'icon_path'=>$user_data['icon_path'],
					'orders' => $orders
			);
			$this->load->view('orders',$data);
			//$this->load->view('orders',$this->session->userdata);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function test(){
		$this->load->model('model_orders');
		$query = $this->model_orders->get_last_order_id(2);
		print_r($query);
	}
	
	public function get_orders(){
		$restaurant_id = $this->input->post('restaurant_id');
		$search_data = $this->input->post('searchPhrase');
		$current_page = $this->input->post('current');
		//$this->debug_to_console("Output Search: ");
		$this->load->model('Model_orders');
		echo json_encode($this->Model_orders->get_orders($restaurant_id,$search_data,$current_page));
	}
	
	public function delete_order(){
		$restaurant_id = $this->input->post('restaurant_id');
		$order_id = $this->input->post('order_id');
		$this->load->model('Model_orders');
		echo $this->Model_orders->remove_order($restaurant_id,$order_id);
	}
	
	public function update_order(){
		$restaurant_id = $this->input->post('restaurant_id');
		$order_id = $this->input->post('order_id');
		$order = $this->input->post('order');
		$notes = $this->input->post('notes');
		$status = $this->input->post('status');
		$this->load->model('Model_orders');
		//echo "Restaurant id: ".$restaurant_id."Order id: ".$order_id."Order: ".$order."Notes: ".$notes."Status: ".$status;
		echo $this->Model_orders->update_order($restaurant_id,$order_id,$order,$notes,$status);
	}
	
	public function add_order(){
		$customer_id = $this->input->post('customer_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$order = $this->input->post('order');
		$notes = $this->input->post('notes');
		$status = $this->input->post('status');
		$this->load->model('Model_orders');
		echo json_encode($this->Model_orders->add_order($customer_id,$restaurant_id,$order,$notes,$status));
	}
	
	//Display to console
	public function debug_to_console( $data ) {

    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

    echo $output;
	}
}





















