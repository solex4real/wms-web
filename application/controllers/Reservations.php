<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservations extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_logged_in')){
			
		}else{
			redirect('/main/login');
		}
	}

	public function index()
	{
		if($this->session->userdata('type')==="restaurant"){
			//echo "Pass";
			$user_data = $this->session->userdata;
			$this->load->model('Model_reservations');
			$this->load->model('Model_servers');
			$servers = $this->Model_servers->get_servers($user_data['id']);
			$reservations = $this->Model_reservations->get_reservations($user_data['id'],1,"","desc");
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'id' => $user_data['id'],
					'view' => 'Reservations',
					'icon_path'=>$user_data['icon_path'],
					'servers'=>$servers,
					'reservations' => $reservations
			);
			$this->load->view('reservations-restaurant',$data);
		}elseif($this->session->userdata('type')==="user"){
			$user_data = $this->session->userdata;
			$this->load->model('Model_reservations');
			$reservations = $this->Model_reservations->get_user_reservations($user_data['id'],1,"","desc");
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'id' => $user_data['id'],
					'view' => 'Reservations',
					'icon_path'=>$user_data['icon_path'],
					'reservations' => $reservations
			);
			$this->load->view('reservations-user',$data);
		}else{
			$this->load->view('404');
		}
	}
	
	public function test(){
		$this->load->model('model_reservations');
		$user_data = $this->session->userdata;
		//$query = $this->model_reservations->get_reservations(2000000,1,"","desc");
		$query = $this->model_reservations->get_server_assignment($user_data['id']);
		//echo count(array())==0;
		//var_dump($query);
		print_r($query);
	}
	
	public function get_current_reservations(){
		$this->load->model('model_reservations');
		$user_data = $this->session->userdata;
		$query = $this->model_reservations->get_current_reservations($user_data['id']);
		echo json_encode($query);
	}
	
	public function get_inline_reservations(){
		$this->load->model('model_reservations');
		$user_data = $this->session->userdata;
		$query = $this->model_reservations->get_inline_customers($user_data['id']);
		echo json_encode($query);
	}
	
	public function get_onhold_customers(){
		$this->load->model('model_reservations');
		$user_data = $this->session->userdata;
		$query = $this->model_reservations->get_onhold_customers($user_data['id']);
		echo json_encode($query);
	}
	
	public function get_server_assignment(){
		$this->load->model('model_reservations');
		$user_data = $this->session->userdata;
		$query = $this->model_reservations->get_server_assignment($user_data['id']);
		echo json_encode($query);
	}
	
	public function get_available_tables(){
		$this->load->model('model_reservations');
		$restaurant_id = $this->input->post('restaurant_id');
		$dateTime = $this->input->post('dateTime');
		$group_size = $this->input->post('group_size');
		$query = $this->model_reservations->get_available_tables($restaurant_id,$dateTime);
		echo json_encode($query);
	}
	
	public function server_isAvailable(){
		$this->load->model('model_reservations');
		$restaurant_id = $this->input->post('restaurant_id');
		$server_id = $this->input->post('server_id');
		$dateTime = $this->input->post('dateTime');
		$group_size = $this->input->post('group_size');
		$query = $this->model_reservations->server_isAvailable($restaurant_id,$server_id,$group_size,$dateTime);
		echo $query;
	}
	
	public function get_unrated_reservations(){
		$this->load->model('model_reservations');
		$user_data = $this->session->userdata;
		$query = $this->model_reservations->get_unrated_reservations($user_data['id']);
		echo json_encode($query);
	}
	
	public function get_reservations(){
		$restaurant_id = $this->input->post('restaurant_id');
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$this->load->model('Model_reservations');
		$data = $this->Model_reservations->get_reservations($restaurant_id,$current_page,$search_data,$sort->reservation_id);	
		//print_r(json_decode(json_encode($data['rows'])));
		echo json_encode($data);
	}
	
	public function get_today_reservations(){
		$restaurant_id = $this->input->post('restaurant_id');
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$this->load->model('Model_reservations');
		$data = $this->Model_reservations->get_today_reservations($restaurant_id,$current_page,$search_data,$sort->reservation_time);	
		//$data['sort'] = $sort->reservation_id;
		//print_r(json_decode(json_encode($data['rows'])));
		echo json_encode($data);
	}
	
	public function get_reservation_dates(){
		$user_data = $this->session->userdata;
		$range = $this->input->post('range');
		$this->load->model('Model_reservations');
		
		$data = $this->Model_reservations->get_reservation_dates($user_data['id'],$range);	
		//print_r(json_decode(json_encode($data['rows'])));
		echo json_encode($data);
	}
	
	public function get_server_reservations(){
		$server_id = $this->input->post('server_id');
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$this->load->model('Model_reservations');
		
		$data = $this->Model_reservations->get_server_reservations($server_id,$current_page,$search_data,$sort->reservation_id);	
		//print_r(json_decode(json_encode($data['rows'])));
		echo json_encode($data);
	}
	
	public function get_user_reservations(){
		$user_id = $this->input->post('user_id');
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$this->load->model('Model_reservations');
		
		$data = $this->Model_reservations->get_user_reservations($user_id,$current_page,$search_data,$sort->reservation_id);	
		//print_r(json_decode(json_encode($data['rows'])));
		echo json_encode($data);
	}
	
	public function add_reservation(){
		$this->load->model('model_reservations');
		$restaurant_id = $this->input->post('restaurant_id');
		$user_id = $this->input->post('user_id');
		$notes = $this->input->post('notes');
		$dateTime = $this->input->post('dateTime');
		$table_num = 8;
		$table_data = "";
		$date = date('Y-m-d H:i:s');
		$group_size = $this->input->post('group_size');
		$server_id = $this->input->post('server_id');
		
		$val = $this->model_reservations->add_reservation($restaurant_id,$server_id,$user_id,$notes,
		$group_size,$table_num,$table_data,$dateTime,$date);
		$this->load->model('model_notifications');
		if($val['success']){
			$this->model_notifications->add_notification($user_id,$server_id,$restaurant_id,$val['reservation_id'],"user","reservation","You have a new Reservation");
		}
		
		echo json_encode($val);
	}
	
	public function delete_reservation(){
		$restaurant_id = $this->input->post('restaurant_id');
		$reservation_id = $this->input->post('reservation_id');
		$user_id = $this->input->post('user_id');
		$server_id = $this->input->post('server_id');
		$this->load->model('Model_reservations');
		$result = $this->Model_reservations->remove_reservation($restaurant_id,$reservation_id);
		$this->load->model('model_notifications');
		if($result){
			$this->model_notifications->add_notification($user_id,$server_id,$restaurant_id,$reservation_id,"user","reservation","Your reservation has been removed");
		}
		echo $result;
	}
	
	public function update_reservation(){
		$restaurant_id = $this->input->post('restaurant_id');
		$reservation_id = $this->input->post('reservation_id');
		$group_size = $this->input->post('group_size');
		$server_id = $this->input->post('server_id');
		$user_id = $this->input->post('user_id');
		$notes = $this->input->post('notes');
		$status = $this->input->post('status');
		$table_data = "";
		$table_num = 8;
		$this->load->model('Model_reservations');
		$this->load->model('model_notifications');
		//echo "Restaurant id: ".$restaurant_id."Order id: ".$order_id."Order: ".$order."Notes: ".$notes."Status: ".$status;
		$query =  $this->Model_reservations->update_reservation($reservation_id,$restaurant_id,$server_id,$notes,
							$group_size, $table_num,$table_data,$status);
		if($query){
			//Send updated message
			$this->Model_reservations->update_reservation_send($restaurant_id,$reservation_id,$group_size,$server_id,$notes,$status);
			$this->model_notifications->add_notification($user_id,$server_id,$restaurant_id,$reservation_id,"user","reservation-user","Your reservation has been updated");
		}				
		echo $query;
	}
	
	public function notifications(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_reservations');
		$data = $this->Model_reservations->get_notifications($user_data['id']);
		
		//$date = date ( 'Y-m-d H:i:s' );
		//echo date('D, M d, Y', strtotime($date));
		//print_r($data);
		echo json_encode($data);
		
	}
	
	public function reservation_send(){
		$this->load->model('model_restaurant');
		$restaurant_name = $this->input->post('restaurant_name');
		$reservation_id = $this->input->post('reservation_id');
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$notes = $this->input->post('notes');
		$dateTime = $this->input->post('dateTime');
		$group_size = $this->input->post('group_size');
		$server_name = $this->input->post('server_name');
		$date = date('Y-m-d H:i:s');
	
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($user_email);
        $this->email->subject('Restaurant Reservation'); 
		$message = "Hi ".$user_name.",\n\n".
		"Thank you for reserving a Server with ".$restaurant_name.".\n".
		"Below are the details of your reservation\n\n".
		"Restaurant Name: ".$restaurant_name."\n".
		"Server Name: ".$server_name."\n".
		"Reservation ID: ".$reservation_id."\n".
		"Reservation Date: ".$dateTime."\n".
		"Group Size: ".$group_size."\n".
		"Notes: ".$notes."\n";
		
        $this->email->message($message); 
		if($this->email->send()){
			echo true;
		}else{
			echo false;
		}
	}
	
}




















