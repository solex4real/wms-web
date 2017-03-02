<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_notifications extends CI_Model {
	//Restaurant reservation notification
	public function get_restaurant_notifications($restaurant_id){
		$limit = 30;
		$this->db->select('notifications.id, notifications.restaurant_id, users.icon_path, users.name,
		notifications.reference_id, notifications.message, notifications.type, reservation.reservation_time');
		$this->db->from('notifications');
		$this->db->join('users', 'notifications.user_id = users.id', 'inner');
		$this->db->join('reservation', 'notifications.reference_id = reservation.reservation_id', 'inner');
		$this->db->where('notifications.restaurant_id',$restaurant_id);
		$this->db->where('notifications.type',"reservation");
		$this->db->where('notifications.viewed',"0");
		$this->db->limit($limit);
		$query = $this->db->get();
		return $query->result();
	}
	
	//Approved or declined request from server to restaurant
	public function get_update_request($restaurant_id){
		$this->db->select('notifications.id, notifications.server_id, notifications.message,
		users.name, users.icon_path');
		$this->db->from('notifications');
		$this->db->join('users','notifications.server_id = users.id', 'inner');
		$this->db->where('notifications.restaurant_id',$restaurant_id);
		$this->db->where('notifications.type',"request-update");
		$this->db->where('notifications.viewed',"0");
		$query = $this->db->get();
		return $query->result();
	}
	
	//Server reservation notification
	public function get_server_notifications($server_id){
		$this->db->select('id');
		$this->db->where('server_id',$server_id);
		$this->db->where('type',"reservation");
		$query = $this->db->get('notifications');
		return $query->result();
	}
	
	//Server Request notification
	public function get_server_request($server_id){
		$this->db->select('notifications.id, notifications.restaurant_id, restaurants.icon_path,
		restaurants.name, restaurants.restaurant_username');
		$this->db->from('notifications');
		$this->db->join('restaurants', 'notifications.restaurant_id = restaurants.restaurant_id', 'inner');
		$this->db->where('notifications.server_id',$server_id);
		$this->db->where('notifications.type',"server-request");
		$query = $this->db->get();
		return $query->result();
	}
	
	//Check server request
	public function request_added($server_id,$restaurant_id){
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->where('server_id',$server_id);
		$this->db->where('type',"server-request");
		$query = $this->db->get('notifications');
		if($query->num_rows()>0){
			return true;
		}
		return false;
	}
	
	//User reservation notification
	public function get_user_notifications($user_id){
		$limit = 30;
		$this->db->select('notifications.id, notifications.restaurant_id, restaurants.icon_path, restaurants.name,
		notifications.reference_id, notifications.type, reservation.reservation_time, restaurants.name');
		$this->db->from('notifications');
		$this->db->join('restaurants', 'notifications.restaurant_id = restaurants.restaurant_id', 'inner');
		$this->db->join('reservation', 'notifications.reference_id = reservation.reservation_id', 'inner');
		$this->db->where('notifications.user_id',$user_id);
		$this->db->where('notifications.viewed',"0");
		$this->db->like('notifications.type',"reservation-user");
		$this->db->limit($limit);
		//$this->db->where_or('notifications.type',"reservation-user-removed");
		//$this->db->where('notifications.type',"reservation-user");
		$query = $this->db->get();
		return $query->result();
	}
	
	public function add_notification($user_id,$server_id,$restaurant_id,$reference_id,$user,$type,$message){
		$date  = date ( 'Y-m-d H:i:s' );
		$data = array(
			"user_id"=>$user_id,
			"server_id"=>$server_id,
			"restaurant_id"=>$restaurant_id,
			"reference_id"=>$reference_id,
			"user"=>$user,
			"type"=>$type,
			"message"=>$message,
			"viewed"=>0,
			"date"=>$date
		);
		if($type=="request-update"){
			$this->db->where(array('server_id='=>$server_id, 'restaurant_id='=>$restaurant_id, 'type='=>"server-request"));
			$this->db->delete('notifications');
		}
		$this->db->insert('notifications',$data);
		if($this->db->affected_rows()>0){
			return true;
		}
		return false;
	}
	
	public function email_notification($type,$restaurant_id,$server_id){
		$query = $this->db->select('email, name')->where('id',$server_id)->get('users');
		$query = $query->row();
		$server_email = $query->email;
		$server_name = $query->name;
		$query = $this->db->select('name, email')->where('restaurant_id',$restaurant_id)->get('restaurants');
		$query = $query->row();
		$restaurant_name = $query->name;
		$message = "";
		switch($type){
			case "server-request":
				$message = "Hi ".$server_name."!, \n\n".
				"You have a new request from ".$restaurant_name." to become their server.\n".
				"To accept or decline your request, simply login using the link below and click on the accept/decline button on the notification tab.\n".
				"Goodluck!\n".
				"Login link:\n ".base_url()."main/login"."\n\n".
				"Regards,\n WMS Team";
				break;
		}
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($server_email);
        $this->email->subject('WMS Restaurant Request'); 
		$this->email->message($message); 
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
		
	}
	
	//Update Notification
	public function notification_set_viewed($data){
		//$this->db->where_id('id',$id);
		$this->db->update_batch ( 'notifications' ,$data, 'id');
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	//Remove Notification
	public function remove_notification($id){
		$array = array('id=' => $id);
		$this->db->where($array);
		$this->db->delete ( 'notifications' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function send_text($user_id,$phone,$message){
		$this->load->library('twilio');
		$from = '0000000000';
		$to = $phone;
		$message = 'This is a test...';
		$response = $this->twilio->sms($from, $to, $message);
		if($response->IsError)
			//echo 'Error: ' . $response->ErrorMessage;
			return $response->ErrorMessage;
		else
			return true;
	}
	
	
}
?>