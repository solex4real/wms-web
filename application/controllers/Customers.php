<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

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
			$this->load->model('Model_customers');
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => 'Customers',
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('customers',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function get_customers(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_customers');
		$current_page = $this->input->post('current');
		$search_data = $this->input->post('searchPhrase');
		$sort = json_encode($this->input->post('sort'));
		$sort = json_decode($sort);
		$data = $this->Model_customers->get_customers($user_data['id'],$current_page,$search_data,$sort->name);
		$data['sort'] = json_encode($sort);
		echo json_encode($data);
	}
	
}





















