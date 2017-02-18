<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

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
		redirect('/home');
	}
	public function login(){
		$this->load->view('login');
	}
	public function register_page(){
		$this->load->view('register');
	}
	public function forgot_password(){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->model('model_users');
		$this->form_validation->set_rules('email-password','email-password','required|trim|xss_clean');
		if($this->form_validation->run()){
			$email = $this->input->post('email-password');
			$result =   $this->model_users->recovery_action($email);
			if($result['success']){
				$message = $this->send_user_password($email,$result['name'],$result['id'],$result['link_id']);
				//Load session library 
				$this->load->library('session'); 
				$this->load->helper('url'); 
				//add flash data 
				$this->session->set_flashdata('message',$message); 
				//redirect to home page  
				redirect('main/recovery_message/');
			}
		}
		$this->load->view('forgot-password');
	}
	
	public function recovery_message(){
		$this->load->view('recover-message');
	}

	private function send_user_password($email,$name,$id,$link_id){
		//Load email library 
        $this->load->library('email'); 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($email);
        $this->email->subject('Password Recovery');
		$message = "Hi ".$name."\n\n".
		"Use the link below to reset your password\n".
		base_url()."main/recover_password/".$id."/".$link_id."\n";
		$this->email->message($message); 
		if($this->email->send()){
			$message = "A link to reset your password has been sent to your email.";
			
		}else{
			$message = "A link to reset your password has failed to send to your email, 
			please check your input and try again.";
		}
		return $message;
	}
	
	public function recover_password($id,$link_id){
		$this->load->model('model_users');
		if($this->model_users->recover_valilidate($id,$link_id)){
			$data = array(
				'id'=>$id,
				'link_id'=>$link_id
			);
			$this->load->view('recover-password',$data);
		}else{
			redirect('main/login');
		}
	}
	
	public function recover_login($id,$link_id){
		$this->load->model('model_users');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$date = date ( 'd/m/Y H:i' );
		$this->form_validation->set_rules('new-password','new-password','required|trim|xss_clean');
		if($this->form_validation->run()){
			$password = $this->input->post ( 'new-password' );
			$val = $this->model_users->recover_update_password($id,$password,$link_id,$date);
			if($val){
				$result =   $this->model_users->get_user($id);
				$notification = null;
				$data = array(
					'id' => $result->id,
					'username' => $result->username,
					'email' => $result->email,
					'name' => $result->name,
					'icon_path'=>$result->icon_path,
					'type'=>"user",
					'server'=>$result->server,
					'is_logged_in' => 1
				);
				redirect('home');
			}else{
				redirect('main/login');
			}
		}
	}
	
	public function login_validation(){
		
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run()){
			$this->load->model('model_users');
			$username = $this->input->post('username');
			$result =   $this->model_users->get_name($username);
			$notification = null;
			$data = array(
				'id' => $result->id,
				'username' => $username,
				'email' => $result->email,
				 'name' => $result->name,
				 'icon_path'=>$result->icon_path,
				 'type'=>"user",
				 'server'=>$result->server,
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			redirect('home');
		}else{
			redirect('main/login');
		}
	}
	
	public function validate_credentials(){
			$this->load->model('model_users');
			if($this->model_users->can_log_in()){
				return true;
			}else{
				$this->form_validation->set_message('validate_credentials','Incorrect username or password');
				$this->form_validation->set_rules('password','Password','required|md5');
				return false;
			}
			
	}
	
	public function register(){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','name','required|trim|xss_clean');
		$this->form_validation->set_rules('username_r','username_r','required|trim|xss_clean|callback_check_username');
		$this->form_validation->set_rules('password_r','password_r','required|trim|xss_clean|callback_check_password');
		$this->form_validation->set_rules('email','email','required|trim|xss_clean|valid_email|callback_check_email');
		$this->form_validation->set_rules('phone','phone','required|trim|xss_clean');
		if($this->form_validation->run()){
			if($this->model_users->add_user()){
				$this->load->model('model_users');
				$username = $this->input->post('username_r');
				$result =   $this->model_users->get_name($username);
				$data = array(
						'id' => $result->id,
						'username' => $username,
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'icon_path'=>$result->icon_path,
						'type'=>"user",
						'server'=>$result->server,
						'is_logged_in' => 1
				);
				$this->session->set_userdata($data);
				//echo "pass";
				redirect('home');
				
				}else{
					//echo "failed";
					$this->form_validation->set_message('validate_credentials','Failed try again');
					$this->load->view('register');
				}

			}
			//echo "failed";
			$this->form_validation->set_message('validate_credentials','Invalid credentials');
			//echo validation_errors();
			$this->load->view('register');
	}
	
	public function about(){
		if($this->session->userdata('is_logged_in')){
			$user_data = $this->session->userdata;
			$data = array(
					'user_data' => $user_data,
					'restaurant_id'=>$user_data['id'],
					'name' => $user_data['name'],
					'view' => 'Home',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('about',$data);
		}else{
			$user_data = $this->session->userdata('is_logged_in');
			$data = array(
					'user_data' => $user_data,
					'name' => "Guest",
					'view' => 'Home',
					'icon_path'=>""
			);
			$this->load->view('about',$data);
		}		
	}
	
	public function test(){
		echo $this->session->flashdata('link');
	}
	
	public function check_username(){
		$this->load->model('model_users');
		$username = $this->input->post ( 'username' );
		if($this->model_users->username_exist($username)){
			$this->form_validation->set_message('check_username','username already exist');
			return false;
		}else{
			return true;
		}
	}
	
	public function username_exist(){
		$this->load->model('model_users');
		$username = $this->input->post ( 'username_r' );
		if($this->model_users->username_exist($username)){
			//$this->form_validation->set_message('check_username','username already exist');
			$bol = true;
		}else{
			$bol = false;
		}
		echo $bol;
	}
	
	public function check_email(){
		$this->load->model('model_users');
		$email = $this->input->post ( 'email' );
		if($this->model_users->email_exist($email)){
			$this->form_validation->set_message('check_username','email already exist');
			return false;
		}else{
			return true;
		}
	}
	
	public function email_exist(){
		$this->load->model('model_users');
		$email = $this->input->post ( 'email' );
		if($this->model_users->email_exist($email)){
			$bol = true;
		}else{
			$bol = false;
		}
		echo $bol;
	}
	
	public function check_password(){
		if ($this->input->post ( 'password_r' ) === $this->input->post ( 'password_r_2' )) {
			return true;
		} else {
			$this->form_validation->set_message ( 'check_password', 'password does not match' );
			return false;
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('main/login');
	}
	
}





