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
		if($this->session->userdata('type')==="restaurant"){
			$user_data = $this->session->userdata;
			$this->load->model('Model_servers');
			$this->load->model('Model_tables');
			$servers = $this->Model_servers->get_servers($user_data['id']);
			$tables = json_encode($this->Model_tables->get_tables($user_data['id']));
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'id' => $user_data['id'],
					'view' => 'Reservations',
					'servers'=>$servers,
					'tables'=>$tables,
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('reservations-guest-restaurant',$data);
		}else{
			redirect('home');
		}
	}
	
	public function get_guests(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$data = $this->Model_guest->get_guest($user_data['id']);
		echo json_encode($data);
	}
	
	public function get_guest(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$reservation_id = $this->input->post('reservation_id');
		$data = $this->Model_guest->get_guest($user_data['id'],$reservation_id);
		echo json_encode($data);
	}
	
	public function get_reservations(){
		$user_data = $this->session->userdata;
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$this->load->model('Model_guest');
		$data = $this->Model_guest->get_reservations($user_data['id'],$current_page,$search_data,$sort->reservation_id);	
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
		$result = $this->Model_guest->remove_reservation($user_data['id'],$reservation_guest_id);
		echo $result;
	}
	
	public function change_tables(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_guest');
		$tables = $this->input->post('tables');
		$reservation_guest_id = $this->input->post('reservation_guest_id');
		$tables = (array) json_decode($tables);
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
	
	public function name_autocomplete() {
		$user_data = $this->session->userdata;
		$search_data = $this->input->post('search_data');
		$this->load->model('Model_guest');
		$data = $this->Model_guest->get_name_autocomplete($user_data['id'],$search_data);
		foreach ($data as $row):
		echo "<div><a data-reservation-id='" . $row->reservation_guest_id ."' 
		data-reservation-customer-size='".$row->customer_size."'
		data-turn-time='".$row->turn_time."'
		data-table-ids='".$row->table_ids."'
		data-server-id='".$row->server_id."'
		data-email='".$row->email."'
		data-id='".$row->id."'
		data-name='".$row->guest_name."'
		data-notes='".$row->notes."'
		data-type='guest'
		onclick='checkinLoad(\"guest\",\"".$row->reservation_guest_id ."\")'
		class='list-group-item '>".$row->guest_name."</a></div>";
		endforeach;
	}
	
	
}





















