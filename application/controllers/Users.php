<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		redirect('home');
	}
	
	
	public function Settings(){
		if($this->session->userdata('is_logged_in')){
			//echo "Pass";
			$user_data = $this->session->userdata;
			$this->load->model('Model_users');
			$page_data = $this->Model_users->get_user($user_data['id']);
			//$data_text = $page_data->data_text;
			//$res_data = json_encode($this->Model_restaurant->get_html_data(1));
			$data = array(
					'user_data' => $user_data,
					'user_id' => $user_data['id'],
					'name' => $user_data['name'],
					'view' => 'Settings',
					'page_data' => $page_data,
					'icon_path'=>$user_data['icon_path'],
					'upload'=> '0'
			);
			$this->load->view('settings-user',$data);
			//print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}	
		
	}
	
	function update_password(){
		$user_data = $this->session->userdata;
		$new_password = $this->input->post('new_password');
		$old_password = $this->input->post('old_password');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_users');
		echo $this->Model_users->change_password($user_data['id'],$new_password,$old_password,$date);
		//echo json_encode($data);
	}
	
	function update_info(){
		$user_data = $this->session->userdata;
		$name = $this->input->post('name');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$about = $this->input->post('about');
		$gender = $this->input->post('gender');
		$server = $this->input->post('server');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_users');
		echo $this->Model_users->update_info($user_data['id'],$name,$contact,$email,$about,$gender,$server,$date);
	}
	
	
	
	public function update_image_path(){
		$user_data = $this->session->userdata;
		$image_path = $this->input->post('image_path');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_users');
		return $this->Model_users->update_image_path($user_data['id'],$image_path,$date);
	}
	
	public function remove_image_path(){
		$user_data = $this->session->userdata;
		$image_path = $this->input->post('image_path');//"wms/images/users/2.jpg";
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_users');
		$this->load->helper("file");
		if(unlink($image_path)){
			$new_image_path = "";
			echo $this->Model_users->update_image_path($user_data['id'],$new_image_path,$date);
		}else{
			echo false;
		}	
	}
	
	public function do_upload(){
		$user_data = $this->session->userdata;
		$id = $user_data['id'];
		
		$date = date ( 'dmYHis' );
		
		$config = array(
			'file_name' => $id,
			'upload_path' => "./wms/images/users/",
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
			$image_path = "wms/images/users/".$file_name;
			$data = array(
				'success'=>1,
				'path'=>$image_path
			);
			$this->update_image_path($image_path);
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
	
}





















