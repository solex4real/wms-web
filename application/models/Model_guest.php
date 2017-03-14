<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_guest extends CI_Model {
	
	public function get_guest($restaurant_id,$reservation_id=""){
		$this->db->select('reservation_guest.*, GROUP_CONCAT(reservation_tables.table_id) as table_ids,
		users.name, users.icon_path');
		$this->db->from('reservation_guest');
		$this->db->join('reservation_tables', 'reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id','left');
		$this->db->join('users','reservation_guest.server_id = users.id', 'left');
		if(!empty($reservation_id)){
			$this->db->where('reservation_guest.reservation_guest_id',$reservation_id);
		}
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	
	public function get_reservations($restaurant_id,$current_page,$search_data,$order){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		$data = array();
		
		//Search array
		$search_array = array(
			"reservation_guest.reservation_guest_id"=>$search_data,
			"s.name"=>$search_data,
			"reservation_guest.guest_name"=>$search_data,
			"reservation_guest.arrival_time"=>$search_data
		);
		//Get data results
		$this->db->select('reservation_guest.*, reservation_guest.reservation_guest_id as reservation_id,
		GROUP_CONCAT(reservation_tables.table_id) as table_ids, s.name as server_name, s.icon_path as icon_path');
		$this->db->from('reservation_guest');
		$this->db->join('users as s','reservation_guest.server_id = s.id', 'inner');
		$this->db->join('reservation_tables','reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id','left');
		//$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$this->db->like('reservation_guest.reservation_guest_id', $search_data);
		$this->db->or_like($search_array);
		$this->db->having('reservation_guest.restaurant_id=',$restaurant_id);
		$this->db->order_by("reservation_guest.reservation_guest_id", $order);
		$this->db->group_by('reservation_guest.id');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		
		//Get total number of rows of data
		$query = $this->db->select('reservation_guest.restaurant_id')
		->from('reservation_guest')
		->join('users as s','reservation_guest.server_id = s.id', 'inner')
		->where('reservation_guest.restaurant_id', $restaurant_id)
		->like('reservation_guest.reservation_guest_id', $search_data)
		->or_like($search_array)
		->get();
		$data['total'] = $query->num_rows();
		
		return $data;
	}
	
	public function add_reservation($restaurant_id,$data,$tables){
		$reservation_guest_id = $this->get_reservation_id($restaurant_id);
		$data['reservation_guest_id'] = $reservation_guest_id;
		$data['restaurant_id'] = $restaurant_id;
		$this->db->insert('reservation_guest',$data);
		if($this->db->affected_rows() > 0){
			$id = $this->db->insert_id();
			//Add tables to database
			$i = 0;
			foreach($tables as $row){
				$tables[$i] = (array) $tables[$i];
				$tables[$i]['reservation_guest_id'] = $reservation_guest_id;
				$tables[$i]['reservation_id'] = 0;
				$tables[$i]['restaurant_id'] = $restaurant_id;
				$this->db->insert('reservation_tables',$tables[$i]);
				$i++;
			}
			$send_confirmation = false;
			if(!empty($data['email'])){
				$send_confirmation =  $this->notification_guest($restaurant_id,$id,$reservation_guest_id);
			}
			
			return array('success'=>true,'id'=>$id,'reservation_guest_id'=>$reservation_guest_id);
		}
		return array('success'=>false,'id'=>null,'reservation_guest_id'=>null);
	}
	
	public function update_reservation($data){
		$this->db->update_batch ( 'reservation_guest' ,$data, 'id');
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;	
	}
	
	public function remove_reservation($restaurant_id,$reservation_guest_id){
		$array = array('restaurant_id'=>$restaurant_id,'reservation_guest_id'=>$reservation_guest_id);
		$this->db->where($array);
		$this->db->delete('reservation_guest');
		if ($this->db->affected_rows () > 0) {
			$this->db->where($array);
			$this->db->delete('reservation_tables');
			return true;
		}
		return false;
	}
	
	//Guest reservation data for dashboard page
	public function get_reservation_dates($restaurant_id,$range="Today"){
		
		
		$end = date('Y-m-d');
		$data = array();
		$this->db->select('COUNT(reservation_guest_id) as reservation_total, arrival_time as reservation_time');
		$this->db->where('restaurant_id ',$restaurant_id);
		
		//Change query based on range
		switch($range){
			case "Today":
				$this->db->where("reservation_guest.arrival_time>=",$end);
				$this->db->group_by('MONTH(date), YEAR(date), DAY(date), HOUR(date), MINUTE(date)');
				break;
			case "Two Weeks":
				$time = strtotime($end.' -14 days');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation_guest.arrival_time>=",$start);
				$this->db->group_by('MONTH(date), YEAR(date), DAY(date)');
				break;
			case "6 Months":
				$time = strtotime($end.' -6 months');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation_guest.arrival_time>=",$start);
				$this->db->group_by('MONTH(date), YEAR(date)');
				break;
			case "1 Year":
				$time = strtotime($end.' -1 year');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation_guest.arrival_time>=",$start);
				$this->db->group_by('MONTH(date), YEAR(date)');
				break;
			case "5 Years":
				$time = strtotime($end.' -5 years');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation_guest.arrival_time>=",$start);
				$this->db->group_by('YEAR(date)');
				break;
			case "Max":
				$this->db->group_by('YEAR(date)');
				break;
			default:
		}
		$query = $this->db->get('reservation_guest');
		return $query->result();
	}
	
	public function get_reservation_count($restaurant_id){
		$data = array();
		$date = date('Y-m-d');
		$data['total'] = $this->db->where('restaurant_id', $restaurant_id)->count_all_results('reservation_guest');
		$data['total-today'] = $this->db->where('restaurant_id', $restaurant_id)->like('reservation_guest.arrival_time',$date)->count_all_results('reservation_guest');
		return $data;
	}
	
	public function get_name_autocomplete($restaurant_id,$search_data){
		$limit = 10;
		$this->db->select('reservation_guest.id, reservation_guest.reservation_guest_id, reservation_guest.arrival_time,
			GROUP_CONCAT(reservation_tables.table_id) as table_ids, reservation_guest.customer_size, reservation_guest.notes,
			reservation_guest.server_id, reservation_guest.email, reservation_guest.turn_time, reservation_guest.guest_name
		');
		$this->db->from('reservation_guest');
		$this->db->join('reservation_tables', 'reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id','left');
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$this->db->like('reservation_guest.guest_name',$search_data);
		$this->db->limit($limit);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function change_tables($restaurant_id,$reservation_guest_id,$tables){
		//Get tables from array
		$this->db->select('table_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->where('reservation_guest_id',$reservation_guest_id);
		$query = $this->db->get('reservation_tables');
		$current_tables = array();
		foreach($query->result() as $row){
			array_push($current_tables, $row->table_id);
		}
		$i = 0;
		
		//Add table if id does not exist in database
		foreach($tables as $row){
			if(($key = array_search($row->table_id, $current_tables)) !== false){
				unset($current_tables[$key]);
			}else{
				$table = array('table_id'=>$row->table_id,
				'restaurant_id'=>$restaurant_id,
				'reservation_guest_id'=>$reservation_guest_id,
				'reservation_id'=>0);
				$this->db->insert('reservation_tables',$table);
			}
		$i++;		
		}
		//Remove tables of id's from database that does not exsist in list
		foreach($current_tables as $row){
			$this->db->where(array('restaurant_id'=>$restaurant_id,
			'reservation_guest_id'=>$reservation_guest_id,
			'table_id'=>$row
			));
			$this->db->delete('reservation_tables');
		}
		return true;
	}
	
	private function notification_guest($restaurant_id,$id,$reservation_guest_id){
		$query = $this->db->select('email, guest_name, arrival_time')->where('id',$id)->get('reservation_guest');
		$query = $query->row();
		$customer_email = $query->email;
		$customer_name = $query->guest_name;
		$arrival_time = $query->arrival_time;
		$query = $this->db->select('name, email, description, address, county, state, zip, url')->where('restaurant_id',$restaurant_id)->get('restaurants');
		$query = $query->row();
		$restaurant_name = $query->name;
		$restaurant_email = $query->email;
		$description = $query->description;
		$website = $query->url;
		$address = $query->address.",\n ".$query->county.", ".$query->state.". ".$query->zip.".";
		$message = 
			"<html><body>".
			"<style>
				table {
					border-collapse: collapse;
					width: 100%;
				}
				th, td {
					text-align: left;
					padding: 8px;
				}
				tr:nth-child(even){background-color: #f2f2f2}
				th {
					background-color: #4CAF50;
					color: white;
				}
				.center{
					text-align: center;
					width: 100%;
				}
			</style>".
			"<p>Hi ".$customer_name."!</p><br/>".
			"<p>Thank you for making a reservation with ".$restaurant_name.".</p>".
			"<p>".$description."</p>".
			"<table>
				<tr>
					<th>Reservation Details</th>
					<th></th>
				</tr>
				<tr>
					<td>Restaurant Name</td>
					<td>".$restaurant_name."</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>".$address."</td>
				</tr>
				<tr>
					<td>Reservation ID</td>
					<td>".$reservation_guest_id."</td>
				</tr>
				<tr>
					<td>Arrival Time</td>
					<td>".$arrival_time."</td>
				</tr>
				<tr>
					<td>Website</td>
					<td>".$website."</td>
				</tr>
			</table>".
			"<p>We look forward to having you here!</p>".
			$restaurant_name." Team.<br/><br/>".
			"<small class='center' style='color:#808080'>Powered by <span><a href='".base_url()."'>Who's My Server</a></span></small></body></html>";
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = $restaurant_email; 
		$this->email->from($from_email, $restaurant_name); 
        $this->email->to($customer_email);
        $this->email->subject('Reservation Confirmation'); 
		$this->email->set_mailtype("html");
		$this->email->message($message); 
		if($this->email->send()){
			return $customer_email;
		}else{
			return false;
		}
	}
	
	private function get_reservation_id($restaurant_id){
		$this->db->select('MAX(reservation_guest_id) as max_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('reservation_guest');
		$new_id = $query->row()->max_id + 1;
		return $new_id;
	}
	
}
?>