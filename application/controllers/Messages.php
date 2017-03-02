<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

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
			//$this->load->model('Model_customers');
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => 'Customers',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('messages',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	
}





















