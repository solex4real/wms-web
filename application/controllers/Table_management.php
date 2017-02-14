<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_management extends CI_Controller {

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
			$this->load->model('Model_tables');
			$this->load->model('Model_servers');
			$servers = $this->Model_servers->get_servers($user_data['id']);
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => 'Table Management',
					'servers'=>$servers,
					'sections'=> $this->Model_tables->get_sections($user_data['id']),
					'icon_path'=>$user_data['icon_path']
			);
			//Load test view
			$this->load->view('table-management',$data);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function get_tables(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$data = $this->Model_tables->get_tables($user_data['id']);
		echo json_encode($data);
	}
	
	public function get_preview_tables(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$data = $this->Model_tables->get_preview_tables($user_data['id']);
		echo json_encode($data);
	}
	
	public function get_reservation_times(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$data = $this->Model_tables->get_reservation_times($user_data['id']);
		echo json_encode($data);
	}
	
	public function add_table(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$table_id = $this->input->post('table_id');
		$num_chairs = $this->input->post('num_chairs');
		$top_pos = $this->input->post('top_pos');
		$left_pos = $this->input->post('left_pos');
		$type = $this->input->post('type');
		$size = $this->input->post('size');
		$orientation = $this->input->post('orientation');
		$section = $this->input->post('section');
		$data = $this->Model_tables->add_table($user_data['id'],$table_id,$num_chairs,$top_pos,
			$left_pos,$size,$orientation,$type,$section);
		echo json_encode($data);
	}
	
	public function add_section(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$section_name= $this->input->post('section_name');
		$data = $this->Model_tables->add_section($user_data['id'],$section_name);
		echo json_encode($data);
	}
	
	public function update_table(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$data = $this->input->post('data');
		$data = json_decode($data);
		$result = $this->Model_tables->update_table($data,$user_data['id']);
		echo $result;
	}
	
	public function update_section(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$data = $this->input->post('data');
		$data = json_decode($data);
		$result = $this->Model_tables->update_section($data,$user_data['id']);
		echo $result;
	}
	
	public function delete_table(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$table_id = $this->input->post('table_id');
		$result = $this->Model_tables->delete_table($user_data['id'],$table_id);
		echo $result;
	}
	
	public function delete_section(){
		$this->load->model('Model_tables');
		$id = $this->input->post('id');
		$result = $this->Model_tables->delete_section($id);
		echo $result;
	}
	
	public function test(){
		$user_data = $this->session->userdata;
		$this->load->model('Model_tables');
		$data = $this->Model_tables->test($user_data['id']);
		var_dump($data);
	}
	
}





















