<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurant extends CI_Controller {

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
			$data = array(
					'user_data'=>$user_data,
					'name' => $user_data['name'],
					'view' => 'Home',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('restaurant',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function login(){
		$this->load->view('login-restaurant');
	}
	public function register_page(){
		$this->load->view('register-restaurant');
	}
	public function forgot_password(){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->load->model('model_restaurant');
		$this->form_validation->set_rules('email-password','email-password','required|trim|xss_clean');
		if($this->form_validation->run()){
			$email = $this->input->post('email-password');
			$result =   $this->model_restaurant->recovery_action($email);
			if($result['success']){
				$message = $this->send_restaurant_password($email,$result['name'],$result['restaurant_id'],$result['link_id']);
				//Load session library 
				$this->load->library('session'); 
				$this->load->helper('url'); 
				//add flash data 
				$this->session->set_flashdata('message',$message); 
				//redirect to home page  
				redirect('restaurant/recovery_message');
			}
		}
		$this->load->view('forgot-password-restaurant');
	}
	
	public function recovery_message(){
		$this->load->view('recover-message');
	}
	
	public function recovery_password($restaurant_id,$link_id){
		$this->load->model('model_restaurant');
		if($this->model_restaurant->recover_valilidate($restaurant_id,$link_id)){
			$data = array(
				'restaurant_id'=>$restaurant_id,
				'link_id'=>$link_id
			);
			$this->load->view('recover-password-restaurant',$data);
		}else{
			redirect('restaurant/login');
		}
	}
	
	public function recover_login($restaurant_id,$link_id){
		$this->load->model('model_restaurant');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$date = date ( 'd/m/Y H:i' );
		$this->form_validation->set_rules('new-password','new-password','required|trim|xss_clean');
		if($this->form_validation->run()){
			$password = $this->input->post ( 'new-password' );
			$val = $this->model_restaurant->recover_update_password($restaurant_id,$password,$link_id,$date);
			if($val){
				$result =   $this->model_restaurant->get_id($restaurant_id);
				$data = array(
					'id' => $result->restaurant_id,
					'username' => $username,
					'email' => $result->email,
					'name' => $result->name,
					'icon_path'=>$result->icon_path,
					'type'=>"restaurant",
					'is_logged_in' => 1
				);
				$this->session->set_userdata($data);
				redirect('home');
			}else{
				redirect('restaurant/login');
			}
		}
	}
	
	private function send_restaurant_password($email,$name,$id,$link_id){
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($email);
        $this->email->subject('Password Recovery');
		$message = "Hi ".$name."\n\n".
		"Use the link below to reset your password\n".
		base_url()."restaurant/recovery_password/".$id."/".$link_id."\n";
		$this->email->message($message); 
		if($this->email->send()){
			$message = "A link to reset your password has been sent to your email.";
			
		}else{
			$message = "A link to reset your password has failed to send to your email, 
			please check your input and try again.";
		}
		return $message;
	}
	
	public function notify(){
		$this->load->view('restaurant-notify');
	}
	
	public function register(){
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','name','required|trim|xss_clean');
		$this->form_validation->set_rules('password_r','password_r','required|trim|xss_clean|callback_check_password');
		$this->form_validation->set_rules('email','email','required|trim|xss_clean|valid_email|callback_check_email');
		$this->form_validation->set_rules('phone','phone','required|trim|xss_clean');
		$this->load->model('model_restaurant');
		if($this->form_validation->run()){
			if($this->model_restaurant->add_restaurant()){
				
				//echo "pass";
				$this->load->view('restaurant-notify');
				}else{
					//echo "failed";
					$this->form_validation->set_message('validate_credentials','Failed try again');
					//$this->load->view('register-restaurant');
					redirect('Restaurant/notify');
				}
			}
			//echo "failed";
			$this->form_validation->set_message('validate_credentials','Invalid credentials');
			//echo validation_errors();
			$this->load->view('register-restaurant');
	}
	
	public function check_password(){
		if ($this->input->post ( 'password_r' ) === $this->input->post ( 'password_r_2' )) {
			return true;
		} else {
			$this->form_validation->set_message ( 'check_password', 'password does not match' );
			return false;
		}
	}
	
	public function check_email(){
		$this->load->model('model_restaurant');
		$email = $this->input->post ( 'email' );
		if($this->model_restaurant->email_exist($email)){
			$this->form_validation->set_message('check_username','email already exist');
			return false;
		}else{
			return true;
		}
	}
	
	public function email_exist(){
		$this->load->model('model_restaurant');
		$email = $this->input->post ( 'email' );
		if($this->model_restaurant->email_exist($email)){
			$bol = true;
		}else{
			$bol = false;
		}
		echo $bol;
	}
	
	public function login_validation(){
		
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run()){
			$this->load->model('model_restaurant');
			$username = $this->input->post('username');
			$result =   $this->model_restaurant->get_name($username);
			$data = array(
				'id' => $result->restaurant_id,
				'username' => $username,
				'email' => $result->email,
				 'name' => $result->name,
				 'icon_path'=>$result->icon_path,
				 'type'=>"restaurant",
				'is_logged_in' => 1
			);
			$this->session->set_userdata($data);
			//echo "pass";
			redirect('home');
		}else{
			//echo "failed";
			redirect('restaurant/login');
		}
	}
	
	public function validate_credentials(){
			$this->load->model('model_restaurant');
			if($this->model_restaurant->can_log_in()){
				return true;
			}else{
				$this->form_validation->set_message('validate_credentials','Incorrect username or password');
				$this->form_validation->set_rules('password','Password','required|md5');
				return false;
			}
			
	}
	
	function add_data(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		$data_text = $this->input->post('data_text');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_restaurant');
		echo $this->Model_restaurant->add_data($restaurant_id,$data_text,$date);
	}
	
	function update_data(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		$data_text = $this->input->post('data_text');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_restaurant');
		echo $this->Model_restaurant->update_data($restaurant_id,$data_text,$date);
		//echo json_encode($data);
	}
	
	function get_html_data(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_restaurant');
		echo json_encode($this->Model_restaurant->get_html_data($user_data['id']));
		//echo json_encode($data);
	}
	
	function get_info(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_restaurant');
		echo json_encode($this->Model_restaurant->get_info($user_data['id']));
		
	}
	
	function update_password(){
		$user_data = $this->session->userdata;
		$new_password = $this->input->post('new_password');
		$old_password = $this->input->post('old_password');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_restaurant');
		echo $this->Model_restaurant->update_password($user_data['id'],$new_password,$old_password,$date);
		//echo json_encode($data);
	}
	
	function update_info(){
		$user_data = $this->session->userdata;
		$name = $this->input->post('name');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$address = $this->input->post('address');
		$state = $this->input->post('state');
		$county = $this->input->post('county');
		$zip = $this->input->post('zip');
		$url = $this->input->post('url');
		$description = $this->input->post('description');
		$start_day = $this->input->post('start_day');
		$end_day = $this->input->post('end_day');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_restaurant');
		echo $this->Model_restaurant->update_res_info($user_data['id'],$name,$contact,$email,$description,
		$address,$state,$county,$zip,$url,$start_day,$end_day,$start_time,$end_time,$date);
	}
	
	function update_owner_info(){
		$user_data = $this->session->userdata;
		$name_first = $this->input->post('name-first');
		$name_last = $this->input->post('name-last');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_restaurant');
		echo $this->Model_restaurant->update_owner_info($user_data['id'],$name_first,$name_last,$contact,$email,$date);
	}
	
	function update_res_settings(){
		$user_data = $this->session->userdata;
		$server_id = $this->input->post('server_id');
		$server_limit = $this->input->post('server_limit');
		$server_status = $this->input->post('server_status');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_restaurant');
		echo $this->Model_restaurant->update_res_settings($user_data['id'],$server_id,$server_limit,$server_status);
	}
	
	public function do_upload_banner_wide(){
		$user_data = $this->session->userdata;
		$id = $user_data['id'];
		
		$date = date ( 'dmYHis' );
		
		$config = array(
			'file_name' => $id,
			'upload_path' => "./wms/images/restaurants/banner-wide",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "1920",
			'max_width' => "1920"
			);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
			$image_path = "wms/images/restaurants/banner-wide/".$file_name;
			$data = array(
				'success'=>1,
				'path'=>$image_path
			);
			//$this->update_banner_path($image_path);
			echo json_encode($data);
			
		}
		else
		{
			$data = array(
				'success'=>0,
				'path'=>""
			);
			//$data['success'] = 0;
			//$data['path'] = "";
			//$upload_data = $this->upload->data();
			echo json_encode($data);
		}
		
	}
	
	public function do_upload_banner(){
		$user_data = $this->session->userdata;
		$id = $user_data['id'];
		
		$date = date ( 'dmYHis' );
		
		$config = array(
			'file_name' => $id,
			'upload_path' => "./wms/images/restaurants/banner",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "1920",
			'max_width' => "1920"
			);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
			$image_path = "wms/images/restaurants/banner/".$file_name;
			$data = array(
				'success'=>1,
				'path'=>$image_path
			);
			//$this->update_banner_path($image_path);
			echo json_encode($data);
			
		}
		else
		{
			$data = array(
				'success'=>0,
				'path'=>""
			);
			//$data['success'] = 0;
			//$data['path'] = "";
			//$upload_data = $this->upload->data();
			echo json_encode($data);
		}
		
	}
	
	public function do_upload_icon(){
		$user_data = $this->session->userdata;
		$id = $user_data['id'];
		
		$date = date ( 'dmYHis' );
		
		$config = array(
			'file_name' => $id,
			'upload_path' => "./wms/images/restaurants/icon",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "1920",
			'max_width' => "1920"
			);
		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
			$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
			$file_name = $upload_data['file_name'];
			$image_path = "wms/images/restaurants/icon/".$file_name;
			$data = array(
				'success'=>1,
				'path'=>$image_path
			);
			//$this->update_icon_path($image_path);
			echo json_encode($data);
			
		}
		else
		{
			$data = array(
				'success'=>0,
				'path'=>""
			);
			//$data['success'] = 0;
			//$data['path'] = "";
			//$upload_data = $this->upload->data();
			echo json_encode($data);
		}
		
	}
	
	public function update_image_path(){
		$user_data = $this->session->userdata;
		$image_path = $this->input->post('image_path');
		$location = $this->input->post('location');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_restaurant');
		return $this->Model_restaurant->update_image_path($user_data['id'],$image_path,$location,$date);
	}
	
	public function remove_image_path(){
		$user_data = $this->session->userdata;
		$image_path = $this->input->post('image_path');
		$location = $this->input->post('location');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_restaurant');
		$this->load->helper("file");
		if(unlink($image_path)){
			$new_image_path = "";
			echo $this->Model_restaurant->update_image_path($user_data['id'],$new_image_path,$location,$date);
		}else{
			echo false;
		}
		
	}
	
	public function Profile($restaurant_username){
		$user_data = $this->session->userdata;
		$this->load->model('model_restaurant');
		$this->load->model('model_servers');
		$date = date('Y-m-d H:i:s');
		$data_restaurant = $this->model_restaurant->get_name($restaurant_username);
		if($this->session->userdata('is_logged_in')){
		if(!empty($data_restaurant)){
			$data = array(
				'user_data' => $user_data,
				'data_restaurant' => $data_restaurant,
				'name' => $user_data['name'],
				'email' => $user_data['email'],
				'user_id' => $user_data['id'],
				'icon_path'=>$user_data['icon_path'],
				'view' => 'Home',
				'data' => $this->model_restaurant->get_available_servers($data_restaurant->restaurant_id,$date),
				'servers'=>$this->model_servers->get_servers($data_restaurant->restaurant_id)
			);
		$this->load->view('restaurant-profile', $data);
		}
		}else{
			$user_data = $this->session->userdata('is_logged_in');
			$data = array(
				'user_data' => $user_data,
				'data_restaurant' => $data_restaurant,
				'name' => $user_data['name'],
				'email' => $user_data['email'],
				'user_id' => $user_data['id'],
				'icon_path'=>$user_data['icon_path'],
				'view' => 'Home',
				'data' => $this->model_restaurant->get_available_servers($data_restaurant->restaurant_id,$date),
				'servers'=>$this->model_servers->get_servers($data_restaurant->restaurant_id)
			);
			$this->load->view('restaurant-profile', $data);
		}
	}
	
	public function test(){
		$this->load->model('model_restaurant');
		$val = $this->model_restaurant->test();
		var_dump($val);
	}
	
	public function get_tables(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$this->load->model('model_restaurant');
		$data = $this->model_restaurant->get_tables($restaurant_id,$current_page,$search_data,$sort->table_id);	
		echo json_encode($data);
	}
	
	public function add_table(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		$size = $this->input->post('size');
		$quantity = $this->input->post('quantity');
		$description = $this->input->post('description');
		$location = $this->input->post('location');
		$this->load->model('model_restaurant');
		$data = $this->model_restaurant->add_table($restaurant_id,$size,$quantity,$description,$location);	
		echo $data;
	}
	
	public function update_table(){
		$user_data = $this->session->userdata;
		$id = $this->input->post('id');
		$size = $this->input->post('size');
		$quantity = $this->input->post('quantity');
		$description = $this->input->post('description');
		$location = $this->input->post('location');
		$this->load->model('model_restaurant');
		$data = $this->model_restaurant->update_table($id,$size,$quantity,$description,$location);	
		echo $data;
	}
	
	public function remove_table(){
		$id = $this->input->post('id');
		$this->load->model('model_restaurant');
		$data = $this->model_restaurant->remove_table($id);	
		echo $data;
	}
	
	public function get_available_servers(){
		$this->load->model('model_restaurant');
		$restaurant_id = $this->input->post('restaurant_id');
		$dateTime = $this->input->post('dateTime');
		$group_size = $this->input->post('group_size');
		$val = $this->model_restaurant->get_available_servers($restaurant_id,$dateTime,$group_size);
		echo json_encode($val);
	}
	
	public function check_server_available(){
		$this->load->model('model_restaurant');
		$restaurant_id = $this->input->post('restaurant_id');
		$restaurant_table = $this->input->post('restaurant_table');
		$dateTime = $this->input->post('dateTime');
		$group_size = $this->input->post('group_size');
		$server_id = $this->input->post('server_id');
		$server_limit = $this->input->post('server_limit');
		$val = $this->model_restaurant->check_server_available($restaurant_id,"2016-09-07 03:00:00");
		$limit = $val + ceil($group_size/$restaurant_table);
		if($limit>=$val){
			return false;
		}else{
			return true;
		}
	}
	
	
	public function feedback_send(){
		$this->load->model('model_restaurant');
		$restaurant_name = $this->input->post('restaurant_name');
		$user_name = $this->input->post('user_name');
		$user_email = $this->input->post('user_email');
		$message = $this->input->post('message');
		
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($restaurant_name);
        $this->email->subject('User Feedback'); 
		
		$this->email->message($message); 
		if($this->email->send()){
			echo true;
		}else{
			echo false;
		}
		
	}
}



 

















