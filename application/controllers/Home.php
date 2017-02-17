<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
			//Load Restuarant data
			$search_data = $this->input->post('search_data');
			$this->load->model('model_home');
			$this->load->model('model_reservations');
			//echo "Pass";
			$user_data = $this->session->userdata;
			if($user_data['type']=="restaurant"){
				$notification = $this->model_reservations->get_notifications($user_data['id']);
			}else{
				$notification = $this->model_reservations->get_server_notifications($user_data['id']);
			}
			
			
			if($user_data['type']=="restaurant"){
				$this->load->model('model_restaurant');
				$this->load->model('model_reservations');
				$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => 'Home',
					'icon_path'=>$user_data['icon_path'],
					'notification'=>$notification,
					'reservation_dates'=>$this->model_reservations->get_reservation_dates($user_data['id']),
					'reservation_total'=>$this->model_reservations->get_reservation_count($user_data['id']),
					'available_servers' => $this->model_restaurant->get_current_servers($user_data['id'])
				);
				$this->load->view('home-dashboard',$data);
			}else{
				$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => 'Home',
					'icon_path'=>$user_data['icon_path'],
					'notification'=>$notification,
					'data' => $this->model_home->get_restaurants($search_data)
				);
				$this->load->view('home',$data);
			}
			
		}else{
			$this->load->model('model_home');
			$user_data = $this->session->userdata('is_logged_in');
			$data = array(
					'user_data' => $user_data,
					'name' => "Guest",
					'view' => 'Home',
					'icon_path'=>"",
					'data' => $this->model_home->get_restaurants("")
			);
			$this->load->view('home',$data);
		}
	}
	
	public function autocomplete() {
		$search_data = $this->input->post('search_data');
		$this->load->model('model_home');
		$query = $this->model_home->get_autocomplete($search_data);
	
		foreach ($query->result() as $row):
		echo "<div><a href='" . base_url() . "restaurant/profile/" . $row->restaurant_username . " ' class='list-group-item'>" . $row->name . "</a></div>";
		endforeach;
	}
	
	public function restaurants_list(){
		$search_data = $this->input->post('search_data');
		$this->load->model('model_home');
		$user_data = $this->session->userdata;
		$data = array(
				'data' => $this->model_home->get_restaurants($search_data),
				'name' => $user_data['name'],
				'icon_path'=>$user_data['icon_path'],
				'view' => 'Home'
		);
		$this->load->view('restaurants-grid', $data);
		
		//$this->load->view('restaurants-grid',$this->session->userdata);
	}
	
	
	private function admin()
	{
		if($this->session->userdata('is_logged_in')){
			//Load Restuarant data
			$user_data = $this->session->userdata;
			$search_data = $this->input->post('search_data');
			$this->load->model('model_home');
			$this->load->model('Model_orders');
			$orders = $this->Model_orders->get_orders($user_data['id'],0);
			//echo "Pass";
			$user_data = $this->session->userdata;
			$data = array(
					'user_data' => $user_data,
					'id' => $user_data['id'],
					'name' => $user_data['name'],
					'view' => 'Home',
					'orders' => $orders,
					'icon_path'=>$user_data['icon_path'],
					'data' => $this->model_home->get_restaurants($search_data)
			);
			$this->load->view('home-admin',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
}





















