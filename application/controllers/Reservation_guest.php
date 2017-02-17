<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation_guest extends CI_Controller {

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
		redirect('/table_management');
	}
	
	public function get_guests(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$data = $this->Model_guest->get_guest($user_data['id']);
		echo json_encode($data);
	}
	
	public function add_reservation(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$data = (array) json_decode($this->input->post('data'));
		$tables = (array) json_decode($this->input->post('tables'));
		/*
		$data = array(
			'restaurant_id'=>$user_data['id'],
			'server_id'=>8,
			'guest_name'=>'Jane Doe',
			'notes'=>'Wants a cup of tea',
			'customer_size'=>2,
			'arrival_time'=>'2017-01-18 12:30:00',
			'turn_time'=>'01:00:00',
			'status'=>1
		);
		$tables = array(
				array('table_id'=>16),
				array('table_id'=>52)
			);
		*/
		$result = $this->Model_guest->add_reservation($user_data['id'],$data,$tables);
		echo json_encode($result);
	}
	
	public function update_reservation(){
		$this->load->model('Model_guest');
		$data = $this->input->post('data');
		$data = json_decode($data);
		$result = $this->Model_guest->update_reservation($data);
		echo json_encode($result);
	}
	
	public function remove_reservation(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$reservation_guest_id = $this->input->post('reservation_guest_id');
		$data = json_decode($data);
		$result = $this->Model_guest->remove_reservation($user_data['id'],$reservation_guest_id);
		echo json_encode($result);
	}
	
	public function change_tables(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$tables = $this->input->post('tables');
		$reservation_guest_id = $this->input->post('reservation_guest_id');
		$tables = json_decode($tables);
		/*
		$tables = array(
			array('table_id'=>14),
			array('table_id'=>16),
			array('table_id'=>39)
		);
		*/
		$result = $this->Model_guest->change_tables($user_data['id'],$reservation_guest_id,$tables);
		echo json_encode($result);
	}
	
	
	
}





















