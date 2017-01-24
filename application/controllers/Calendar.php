<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

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
			$this->load->model('Model_calendar');
			$this->load->model('Model_servers');
			$user_data = $this->session->userdata;
			$data = json_encode($this->Model_calendar->get_events($user_data['id'],$user_data['type']));
			$servers = $this->Model_servers->get_servers($user_data['id']);
			$data = array(
					'user_data' => $user_data,
					'user_id' => $user_data['id'],
					'data' => $data,
					'servers' => $servers,
					'name' => $user_data['name'],
					'view' => 'Calendar', 
					'icon_path'=>$user_data['icon_path']
			);
			$this->load->view('calendar',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function event_list(){
		//$search_data = $this->input->post('search_data');
		$this->load->model('Model_calendar');
		$user_data = $this->session->userdata;
		$data = array(
				'user_id'=>$user_data['id'],
				'name' => $user_data['name'],
				'view' => 'Calendar',
				'icon_path'=>$user_data['icon_path']
		);
		echo json_encode($this->Model_calendar->get_events($user_data['id'],$user_data['type']));
	}
	
	public function get_events(){
		//$search_data = $this->input->post('search_data');
		$id = $this->input->post('id');
		$this->load->model('Model_calendar');
		$user_data = $this->session->userdata;
		$type = $this->input->post('type');
		$data = array(
				'user_id'=>$user_data['id'],
				'name' => $user_data['name'],
				'view' => 'Calendar',
				'icon_path'=>$user_data['icon_path']
		);
		//$this->load->view('restaurants-grid',$this->session->userdata);
		echo json_encode($this->Model_calendar->get_events($id,$type));
	}
	
	public function event_add(){
		$data = $this->input->post('data');
		//$data = json_decode($data);
		$title = $this->input->post('title');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$allDay = $this->input->post('allDay');
		$className = $this->input->post('className');
		$tag = $this->input->post('tag');
		$date = date ( 'y-m-d h:i:s' );
		//Load Calendar model
		$this->load->model('Model_calendar');
		//echo json_decode($data[0]);
		echo $this->Model_calendar->add_event($restaurant_id,$server_id,$title,$start,$end,$allDay,$className,$tag,$date);
		/*
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$allDay = $this->input->post('allDay');
		$className = $this->input->post('ClassName');
		$tag = $this->input->post('tag');
		$date = date ( 'y-m-d h:i:s' );
		//Load Calendar model
		$this->load->model('Model_calendar');
		echo $this->Model_calendar->add_event($restaurant_id,$server_id,$title,$start,$end,$allDay,$className,$tag,$date);
		*/
	}
	
	function events_update(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$allDay = $this->input->post('allDay');
		$className = $this->input->post('className');
		$tag = $this->input->post('tag');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_calendar');
		//$data = array('id'=>$id,'title'=>$title,'start'=>$start,'end'=>$end,'allDay'=>$allDay,'className'=>$className,'tag'=>$tag,'date'=>$date);
		echo $this->Model_calendar->update_event($id,$title,$start,$end,$allDay,$className,$tag,$date);
		//echo json_encode($data);
	}
	
	function event_save(){
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$server_id = $this->input->post('server_id');
		$restaurant_id = $this->input->post('restaurant_id');
		$className = $this->input->post('className');
		$tag = $this->input->post('tag');
		$date = date ( 'y-m-d h:i:s' );
		$this->load->model('Model_calendar');
		echo $this->Model_calendar->save_event($id,$server_id,$restaurant_id,$title,$className,$tag,$date);
		//echo json_encode($data);
	}
	
	function event_delete(){
		$id = $this->input->post('id');
		$this->load->model('Model_calendar');
		echo $this->Model_calendar->delete_event($id);
		//echo json_encode($data);
	}
	
	function test(){
		$id = 9;//$this->input->post('id');
		$this->load->model('Model_calendar');
		echo $this->Model_calendar->get_restaurant_id($id);
	}
	
}





















