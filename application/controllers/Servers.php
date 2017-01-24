<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servers extends CI_Controller {

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
			//Load Restuarant data
			$search_data = $this->input->post('search_data');
			$this->load->model('model_servers');
			//echo "Pass";
			$user_data = $this->session->userdata;
			$data = array(
					'user_data' => $user_data,
					'restaurant_id'=>$user_data['id'],
					'name' => $user_data['name'],
					'view' => 'Servers',
					'icon_path'=>$user_data['icon_path'],
					'data' => $this->model_servers->get_servers($user_data['id'])
			);
			$this->load->view('server-contact',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function autocomplete() {
		$search_data = $this->input->post('search_data');
		$this->load->model('model_servers');
		$query = $this->model_servers->get_autocomplete($search_data);
		foreach ($query->result() as $row):
		echo "<div><a href='" . base_url() . "servers/openprofile/" . $row->username ." ' class='list-group-item'>" . $row->name . "</a></div>";
		endforeach;
	}
	
	public function get_server(){
		$server_id = $this->input->post('server_id');
		$this->load->model('model_servers');
		$user_data = $this->session->userdata;
		echo $this->model_servers->get_server($server_id);
	}
	
	public function add_server(){
		$user_data = $this->session->userdata;
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$this->load->model('model_servers');
		$user_data = $this->session->userdata;
		$query = ($this->model_servers->add_server($server_id,$restaurant_id));
		if($query){
			$this->load->model('model_notifications');
			//$user_id,$server_id,$restaurant_id,$reference_id,$user,$type,$message
			$result = $this->model_notifications->add_notification("0",$server_id,
			$restaurant_id,"0","user","request-update","Server Request Approved");
		}
		echo $query;
	}
	
	public function remove_server(){
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$this->load->model('model_servers');
		echo ($this->model_servers->remove_server($restaurant_id,$server_id));
	}
	
	public function openprofile($username){
		if($this->session->userdata('is_logged_in')){
		$user_data = $this->session->userdata;
		$this->load->model('model_servers');
		$this->load->model('model_users');
		$user_data = $this->session->userdata;
		$data_server = $this->model_servers->get_server($username);
			if(!empty($data_server)){
				$data = array(
					'user_data' => $user_data,
					'data_server' => $data_server,
					'rating'=>$this->model_servers->get_rating($data_server->user_id),
					'name' => $user_data['name'],
					'exist' => $this->model_servers->check_server($user_data['id'],$data_server->user_id),
					'icon_path'=>$user_data['icon_path'],
					'view' => 'Servers'
				);
				$this->load->view('server-profile', $data);
			
			}else{
				
			}	
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function get_ratings(){
		$user_data = $this->session->userdata;
		$this->load->model('model_servers');
		$server_id = $this->input->post('server_id');
		$current = $this->input->post('current');
		$offset = $this->input->post('offset');
		$result = $this->model_servers->get_rating($server_id,$current,$offset);
		echo json_encode($result['result']);
	}
	
	public function get_reservation(){
		if($this->session->userdata('is_logged_in')){
			//echo "Pass";
			$user_data = $this->session->userdata;
			$data = array(
					'user_data'=>$user_data,
					'id'=>$user_data['id'],
					'name' => $user_data['name'],
					'view' => 'Customer',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('reservations-servers',$data);
		}else{
			redirect('/main/login');
		}
	}
	
	public function test(){
		$this->load->model('model_servers');
		//var_dump($this->model_servers->get_server(2));
	}
	
	public function opencalendar($server_id)
	{
		if($this->session->userdata('is_logged_in')){
		$user_data = $this->session->userdata;
		$this->load->model('model_servers');
		$this->load->model('model_users');
		$user_data = $this->session->userdata;
		$data = array(
				'user_data' => $user_data,
				'data_user' => $this->model_users->get_user($server_id),
				'data_server' => $this->model_servers->get_server($user_data['id'],$server_id),
				'server_id'=> $server_id,
				'name' => $user_data['name'],
				'icon_path'=>$user_data['icon_path'],
				'view' => 'Servers'
		);
		$this->load->view('server-calendar', $data);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function calendar(){
		
		if($this->session->userdata('is_logged_in')){
			//echo "Pass";
			$user_data = $this->session->userdata;
			$this->load->model('Model_calendar');
			//$this->load->model('Model_servers');
			$user_data = $this->session->userdata;
			$data = json_encode($this->Model_calendar->get_events($user_data['id'],$user_data['type']));
			//$servers = $this->Model_servers->get_servers(2);
			$data = array(
					'user_data' => $user_data,
					'user_id' => $user_data['id'],
					'data' => $data,
					'name' => $user_data['name'],
					'icon_path'=>$user_data['icon_path'],
					'view' => 'Calendar'
			);
			$this->load->view('server-calendar',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function get_events($id){
		$this->load->model('Model_calendar');
		$user_data = $this->session->userdata;
		echo json_encode($this->Model_calendar->get_events($id,"user"));
	}
	
	public function add_rating(){
		//$user_id,$restaurant_id,$server_id,$name,$restaurant_address,
	//$service,$personality,$aesthetics,$comments,$icon_path
		$user_data = $this->session->userdata;
		$id = $this->input->post('id');
		$user_id = $user_data['id'];
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$service = $this->input->post('service');
		$personality = $this->input->post('personality');
		$aesthetics = $this->input->post('aesthetics');
		$comments = $this->input->post('comments');
		$this->load->model('Model_servers');
		$query = $this->Model_servers->add_rating($user_id,$restaurant_id,$server_id,
		$service,$personality,$aesthetics,$comments);
		if($query['success']&&!empty($id)){
			$this->load->model('model_reservations');
			$val = $this->model_reservations->reservation_is_rated(array(0=>array(
				'id'=>$id,
				'is_rated'=>1
			)));
		}
		
		echo json_encode($query);
	}
	
	public function remove_rating(){
		$id = $this->input->post('id');
		$this->load->model('model_servers');
		echo $this->model_servers->remove_rating($id);
	}
}





















