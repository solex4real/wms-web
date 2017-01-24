<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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
			$this->load->model('Model_restaurant');
			$this->load->model('Model_servers');
			$page_data = $this->Model_restaurant->get_html_data($user_data['id']);
			$servers = $this->Model_servers->get_servers($user_data['id']);
			$data = array(
					'user_data' => $user_data,
					'user_id' => $user_data['id'],
					'name' => $user_data['name'],
					'view' => 'Settings',
					'upload'=> '0',
					'icon_path'=>$user_data['icon_path'],
					'servers'=>$servers,
					'page_data' => $page_data
			);
			$this->load->view('settings',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	
	
	
	
	
}





















