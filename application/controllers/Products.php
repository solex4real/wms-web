<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
			$this->load->model('Model_products');
			$data = array(
					'user_data' => $user_data,
					'name' => $user_data['name'],
					'view' => 'Products',
					'id' => $user_data['id'],
					'icon_path'=>$user_data['icon_path'],
			);
			$this->load->view('products',$data);
			//echo print_r($this->session->userdata);
		}else{
			//echo "Failed";
			redirect('/main/login');
		}
	}
	
	public function get_products(){
		$restaurant_id = $this->input->post('restaurant_id');
		$search_data = $this->input->post('searchPhrase');
		$current_page = $this->input->post('current');
		$this->load->model('Model_products');
		echo json_encode($this->Model_products->get_products($restaurant_id,$search_data,$current_page));
	}
	
	public function delete_product(){
		$restaurant_id = $this->input->post('restaurant_id');
		$product_id = $this->input->post('product_id');
		$this->load->model('Model_products');
		echo $this->Model_products->remove_product($restaurant_id,$product_id);
	}
	
	public function update_product(){
		$restaurant_id = $this->input->post('restaurant_id');
		$product_id = $this->input->post('product_id');
		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$tag = $this->input->post('tag');
		//$image_path = $this->input->post('image_path');
		$this->load->model('Model_products');
		//echo "Restaurant id: ".$restaurant_id."Order id: ".$order_id."Order: ".$order."Notes: ".$notes."Status: ".$status;
		echo $this->Model_products->update_product($restaurant_id,$product_id,$name,$type,$description,$price,$tag);
	}
	
	public function add_product(){
		
		//$restaurant_id,$product_id,$name,$type,$description,$price,$tag,$image_path
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		
		$name = $this->input->post('name1');
		$type = $this->input->post('type1');
		$description = $this->input->post('description1');
		$price = $this->input->post('price1');
		$tag = $this->input->post('tag1');
		$status = 0;//$this->input->post('status-table1');
		$image_path = "";
		$this->load->model('Model_products');
		$date = date ( 'dmYHis' );
		
		$config = array(
			'file_name' => $restaurant_id.$date,
			'upload_path' => "./wms/images/restaurants/products",
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
			$image_path = "wms/images/restaurants/products/".$file_name;
			echo json_encode($this->Model_products->add_product($restaurant_id,$name,$type,$description,$price,$tag,$status,$image_path));
		}
		else
		{
			echo json_encode($this->Model_products->add_product($restaurant_id,$name,$type,$description,$price,$tag,$status,$image_path));
		}
	}
	
	public function test(){
		$this->load->model('Model_products');
		//$restaurant_id,$name,$type,$description,$price,$tag,$image_path
		$product_id = $this->Model_products->add_product("2","test","test","test","test","test","test");
		print_r($product_id);
	}
	
	public function do_upload(){
		$user_data = $this->session->userdata;
		$restaurant_id = $user_data['id'];
		
		$image_path = "";
		$this->load->model('Model_products');
		$date = date ( 'dmYHis' );
		
		$config = array(
			'file_name' => $restaurant_id.$date,
			'upload_path' => "./wms/images/restaurants/products",
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
			$image_path = "wms/images/restaurants/products/".$file_name;
			$data = array(
				'success'=>true,
				'image_path'=>$image_path
			);
			return json_encode($data);
		}
		else
		{
			$data = array(
				'success'=>false,
				'image_path'=>$image_path
			);
			return json_encode($data);
		}
		
	}
	
	public function update_image_path(){
		$user_data = $this->session->userdata;
		$image_path = $this->input->post('image_path');
		$product_id = $this->input->post('product_id');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_products');
		$new_image_path = "";
		echo $this->Model_products->update_image_path($user_data['id'],$product_id,$new_image_path,$date);
		
	}
	
	public function remove_image_path(){
		$user_data = $this->session->userdata;
		$image_path = $this->input->post('image_path');
		$product_id = $this->input->post('product_id');
		$date = date ( 'd/m/Y H:i' );
		$this->load->model('Model_products');
		$this->load->helper("file");
		if(unlink($image_path)){
			$new_image_path = "";
			echo $this->Model_products->update_image_path($user_data['id'],$product_id,$new_image_path,$date);
		}else{
			echo false;
		}
	}
	
}





















