<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

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

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('is_logged_in')){
			
		}else{
			redirect('/main/login');
		}
	}
	
	//Restaurant reservation notification
	public function get_restaurant_notifications(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		$this->load->model('model_notifications');
		$result = $this->model_notifications->get_restaurant_notifications($restaurant_id);
		echo json_encode($result);
	}
	
	//Approved request from server to restaurant
	public function get_update_request(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		$this->load->model('model_notifications');
		$result = $this->model_notifications->get_update_request($restaurant_id);
		echo json_encode($result);
	}
	
	//Server reservation notification
	public function get_server_notifications($server_id){
		$user_data = $this->session->userdata;
		$server_id = $user_data['id'];
		$this->load->model('model_notifications');
		$result = $this->model_notifications->get_server_notifications($server_id);
		echo json_encode($result);
	}
	
	//Server Request notification
	public function get_server_request(){
		$user_data = $this->session->userdata;
		$server_id = $user_data['id'];
		$this->load->model('model_notifications');
		$result = $this->model_notifications->get_server_request($server_id);
		echo json_encode($result);
	}
	
	public function request_added(){
		$user_data = $this->session->userdata;
		$server_id = $this->input->post('server_id');
		$restaurant_id = $user_data['id'];
		$this->load->model('model_notifications');
		$result = $this->model_notifications->request_added($server_id,$restaurant_id);
		echo $result;
	}
	
	//User reservation notification
	public function get_user_notifications(){
		$user_data = $this->session->userdata;
		$user_id = $user_data['id'];
		$this->load->model('model_notifications');
		$result = $this->model_notifications->get_user_notifications($user_id);
		echo json_encode($result);
	}
	
	public function add_notification(){
		$user_id = $this->input->post('user_id');
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$reference_id = $this->input->post('reference_id');
		$user = $this->input->post('user');
		$type = $this->input->post('type');
		$message = $this->input->post('message');
		$this->load->model('model_notifications');
		$result = $this->model_notifications->add_notification($user_id,$server_id,$restaurant_id,$reference_id,$user,$type,$message);
		echo $result;
	}
	
	//Remove Notification
	public function notification_set_viewed(){
		$id = $this->input->post('id');
		$this->load->model('model_notifications');
		$id = json_decode($id);
		$result = $this->model_notifications->notification_set_viewed($id);
		echo $result;
		//var_dump( $id);
	}
	
	//Remove Notification
	public function remove_notification(){
		$id = $this->input->post('id');
		$this->load->model('model_notifications');
		$result = $this->model_notifications->remove_notification($id);
		echo $result;
	}
	
	public function test(){
		//$this->load->model('model_notifications');
		//$result = $this->model_notifications->get_update_request("2000000");
		$result = md5('500Emmanuel');
		print_r($result);
	}
	
}





















