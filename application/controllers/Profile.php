<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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
			$user_data = $this->session->userdata;
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => '',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('profile-about',$data);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function about()
	{
		redirect('/profile/index');
	}
	
	public function storyline()
	{
		if($this->session->userdata('is_logged_in')){
			$user_data = $this->session->userdata;
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => '',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('profile-storyline',$data);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function photos()
	{
		if($this->session->userdata('is_logged_in')){
			$user_data = $this->session->userdata;
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => '',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('profile-photos',$data);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
}





















