<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_reservations extends CI_Model {
	
	public function get_reservations($restaurant_id,$current_page,$search_data,$order){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		$data = array();
		
		//Search array
		$search_array = array(
			"reservation.reservation_id"=>$search_data,
			"s.name"=>$search_data,
			"u.name"=>$search_data,
			"reservation.reservation_time"=>$search_data
		);
		
		$this->db->select('reservation.*,u.name as user_name, u.id as user_id,
		servers.id as servers_id, 
		servers.server_limit,');
		
		$this->db->select('s.name as server_name, s.icon_path as icon_path');
	
		$this->db->from('reservation');
		$this->db->join('servers','reservation.server_id = servers.user_id', 'left');
		$this->db->join('users as u','reservation.user_id = u.id', 'inner');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		//$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->like('reservation.reservation_id', $search_data);
		//$this->db->like('s.name', $search_data);
		$this->db->or_like($search_array);
		$this->db->having('reservation.restaurant_id',$restaurant_id);
		//$this->db->or_like($search_array);
		$this->db->order_by("reservation.reservation_id", $order);
		
		$this->db->limit($limit, $start);
		//$array = array('restaurant_id=' => $restaurant_id, 'reservation_id >' => $last_id);
		//$this->db->where($array);
		$query = $this->db->get();
		//$data['restaurant_id'] = $restaurant_id;
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		
		
		$query = $this->db->select('reservation.restaurant_id')
		->from('reservation')
		->join('servers','reservation.server_id = servers.user_id', 'inner')
		->join('users as u','reservation.user_id = u.id', 'inner')
		->join('users as s','reservation.server_id = s.id', 'inner')
		->where('reservation.restaurant_id', $restaurant_id)
		->like('reservation.reservation_id', $search_data)
		->or_like($search_array)
		->having('reservation.restaurant_id',$restaurant_id)
		->get();
		$data['total'] = $query->num_rows();
		
		return $data;
	}
	
	public function test(){
		date_default_timezone_set('America/New_York');
		//$timezone = date_default_timezone_get();
		$date = date('Y-m-d H:m:s');
		return $date;
	}
	
	public function get_current_reservations($restaurant_id){
		$this->db->select('reservation.reservation_id, reservation.user_id, reservation.server_id, 
		reservation.reservation_time, reservation.turn_time, reservation.arrival_time,
		ADDTIME(reservation.arrival_time, (reservation.turn_time)) as turn_time_val, reservation.status,
		users.name, users.icon_path, s.name as server_name, s.icon_path as server_icon_path,
		GROUP_CONCAT(reservation_tables.table_size) table_size');
		$this->db->from('reservation');
		$this->db->join('users' ,'reservation.user_id = users.id', 'inner');
		$this->db->join('users as s' ,'reservation.server_id = s.id', 'inner');
		$this->db->join('reservation_tables' ,'reservation.reservation_id = reservation_tables.reservation_id', 'left');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->group_by('reservation.reservation_id');
		//$this->db->where('reservation.reservation_time');
		$query = $this->db->get();
		return $query->result();
		//return $this->db->last_query();
	}
	
	public function get_inline_customers($restaurant_id){
		$this->db->select('reservation.*,users.name,users.icon_path');
		$this->db->from('reservation');
		$this->db->join('users','reservation.user_id = users.id','inner');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.status',1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_onhold_customers($restaurant_id){
		$this->db->select('reservation.*,users.name,users.icon_path');
		$this->db->from('reservation');
		$this->db->join('users','reservation.user_id = users.id','inner');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.status',1);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_server_assignment($restaurant_id){
		//Sub query of reservered tables
		$this->db->select('GROUP_CONCAT(reservation_tables.table_size SEPARATOR "-") as table_size, 
		reservation_tables.reservation_id, reservation_tables.restaurant_id');
		$this->db->from('reservation_tables');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$this->db->group_by('reservation_tables.reservation_id');
		$subQuery =  $this->db->get_compiled_select();
		
		$this->db->select('GROUP_CONCAT(reservation_tables.table_size),reservation.server_id,
		GROUP_CONCAT(reservation.user_id), GROUP_CONCAT(u.icon_path) as user_icon_path, 
		GROUP_CONCAT(u.name) as user_name, s.name as server_name,
		s.icon_path as server_icon_path, GROUP_CONCAT(reservation.reservation_id),
		');
		$this->db->from('reservation');
		$this->db->join("($subQuery) as reservation_tables",'reservation.reservation_id = reservation_tables.reservation_id','left');
		$this->db->join('users as u','reservation.user_id = u.id');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->group_by('reservation.server_id');
		$query = $this->db->get(); 
		return $query->result();
		//return $this->db->last_query();
	}
	
	public function get_today_reservations($restaurant_id,$current_page,$search_data,$order){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		$data = array();
		$date = date('Y-m-d');
		
		$search_array = array(
			's.name'=>$search_data,
			'u.name'=>$search_data,
			'reservation.reservation_time'=>$search_data,
		);
		
		/*
		$this->db->select('reservation.*,users.name as user_name, users.id as user_id,
		servers.name as server_name,servers.id as servers_id, servers.icon_path,servers.rating,
		servers.server_limit,');
		*/
		
		$this->db->select('reservation.*,u.name as user_name, u.id as user_id,
		servers.id as servers_id, 
		servers.server_limit');
		
		$this->db->select('s.name as server_name, s.icon_path as icon_path');
	
		$this->db->from('reservation');
		$this->db->join('servers','reservation.server_id = servers.user_id', 'left');
		$this->db->join('users as u','reservation.user_id = u.id', 'inner');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		
		$this->db->or_like($search_array);
		$this->db->like('reservation.reservation_id', $search_data);
		$this->db->having('DATE_FORMAT(reservation.reservation_time, "%Y-%m-%d") =',$date);
		$this->db->having('reservation.restaurant_id ',$restaurant_id);
		$this->db->order_by("reservation.reservation_id", $order);
		
		$this->db->limit($limit, $start);
		//$array = array('restaurant_id=' => $restaurant_id, 'reservation_id >' => $last_id);
		//$this->db->where($array);
		$query = $this->db->get();
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		
		//$data['total'] = $this->db->where('restaurant_id', $restaurant_id)->like('reservation_time', $date)->count_all_results('reservation');
		
		
		$query = $this->db->select('reservation.restaurant_id, reservation.reservation_time')
		->from('reservation')
		->join('servers','reservation.server_id = servers.user_id', 'inner')
		->join('users as u','reservation.user_id = u.id', 'inner')
		->join('users as s','reservation.server_id = s.id', 'inner')
		->where('reservation.restaurant_id', $restaurant_id)
		->like('reservation.reservation_id', $search_data)
		->or_like($search_array)
		->having('reservation.restaurant_id',$restaurant_id)
		->having('DATE_FORMAT(reservation.reservation_time, "%Y-%m-%d") =',$date)
		->get();
		$data['total'] = $query->num_rows();
		
		return $data;
	}
	
	public function get_reservation_count($restaurant_id){
		$data = array();
		$date = date('Y-m-d');
		$data['total'] = $this->db->where('restaurant_id', $restaurant_id)->count_all_results('reservation');
		$data['total-today'] = $this->db->where('restaurant_id', $restaurant_id)->like('reservation.reservation_time',$date)->count_all_results('reservation');
		return $data;
	}
	
	public function get_assigned_tables($tables,$table_amount,$customer_size_defined){
		$customer_size = $customer_size_defined;
		$assigned_tables = array();
		$len = count($tables)-1;
		$assigned = false;
		while(array_sum($assigned_tables)<$customer_size_defined){
			for ($x = $len; $x >= 0; $x--) {
				$quantity = $tables[$x]*$table_amount[$x];
				if($quantity>0&&!$assigned){
					if($customer_size==$tables[$x]){
						$customer_size = $customer_size - $tables[$x];
						$table_amount[$x] = $table_amount[$x] - 1;
						array_push($assigned_tables, $tables[$x]);
						$assigned = true;
					}elseif($customer_size>$tables[$x]){
						if($x+1<$len){
							if($tables[$x+1]*$table_amount[$x+1]>0){
								$customer_size = $customer_size - $tables[$x+1];
								$table_amount[$x+1] = $table_amount[$x+1] - 1;
								array_push($assigned_tables, $tables[$x+1]);
								$assigned = true;
							}else{
								$customer_size = $customer_size - $tables[$x];
								$table_amount[$x] = $table_amount[$x] - 1;
								array_push($assigned_tables, $tables[$x]);
								$assigned = true;
							}
						}else{
							$customer_size = $customer_size - $tables[$x];
							$table_amount[$x] = $table_amount[$x] - 1;
							array_push($assigned_tables, $tables[$x]);
							$assigned = true;
						}
						
					}elseif($x==0){
						$customer_size = $customer_size - $tables[$x];
						$table_amount[$x] = $table_amount[$x] - 1;
						array_push($assigned_tables, $tables[$x]);
						$assigned = true;
					}
				}elseif($quantity==0&&$x==0&&!$assigned){
					for($y = 1; $y <= $len; $y++){
						$quantity = $tables[$y]*$table_amount[$y];
						if($quantity>0&&!$assigned){
							$customer_size = $customer_size - $tables[$y];
							$table_amount[$y] = $table_amount[$y] - 1;
							array_push($assigned_tables, $tables[$y]);
							$assigned = true;
						}
					}
					
				}
				
			} 
			$assigned = false;
		}
		//Remove excess tables
		$len = count($assigned_tables)-1;
		if(array_sum($assigned_tables)>$customer_size_defined){
			for($x = 0; $x <= $len; $x++){
				if(array_sum(array_slice($assigned_tables,$x,$len+1))>=$customer_size_defined){
					$assigned_tables = array_slice($assigned_tables,$x,$len+1);
				}
			}
		}
		return $assigned_tables;
	}
	
	public function get_reservation_dates($restaurant_id,$range="Today"){
		
		
		$end = date('Y-m-d');
		$data = array();
		$this->db->select('COUNT(reservation_id) as reservation_total, reservation_time');
		$this->db->where('restaurant_id ',$restaurant_id);
		
		//Change query based on range
		switch($range){
			case "Today":
				$this->db->where("reservation.reservation_time",$end);
				$this->db->group_by('MONTH(date), YEAR(date), DAY(date), HOUR(date)');
				break;
			case "Two Weeks":
				$time = strtotime($end.' -14 days');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation.reservation_time>=",$start);
				$this->db->group_by('MONTH(date), YEAR(date), DAY(date)');
				break;
			case "6 Months":
				$time = strtotime($end.' -6 months');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation.reservation_time>=",$start);
				$this->db->group_by('MONTH(date), YEAR(date)');
				break;
			case "1 Year":
				$time = strtotime($end.' -1 year');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation.reservation_time>=",$start);
				$this->db->group_by('MONTH(date), YEAR(date)');
				break;
			case "5 Years":
				$time = strtotime($end.' -5 years');
				$start = date("Y-m-d", $time);
				$this->db->where("reservation.reservation_time>=",$start);
				$this->db->group_by('YEAR(date)');
				break;
			case "Max":
				$this->db->group_by('YEAR(date)');
				break;
			default:
		}
		$query = $this->db->get('reservation');
		$data['result']  = $query->result();
		return $data;
	}
	
	public function get_available_tables($restaurant_id,$reservation_time){
		$start = $reservation_time;
		$end = date('Y-m-d H:i:s', 
		strtotime('+60 minutes', strtotime($start)));//add 60 mins from datetime 
		
		//Sub query of reservation tables
		$this->db->select('reservation_id, table_size, restaurant_id')->from('reservation_tables');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$subQuery =  $this->db->get_compiled_select();
		
		//Sub query of used tables
		$this->db->select('COUNT(reservation_tables.table_size) as table_size_total, reservation_tables.table_size, 
		reservation.reservation_time, reservation_tables.reservation_id, reservation.restaurant_id, reservation.customer_size');
		$this->db->from('reservation');
		$this->db->join("($subQuery) as reservation_tables", 'reservation.reservation_id = reservation_tables.reservation_id', 'left');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->having('reservation.reservation_time <=',$start);
		$this->db->having('ADDTIME(reservation.reservation_time, "0 01:00:00") >=',$start);
		$this->db->group_by('reservation_tables.table_size');
		
		$subQuery2 = $this->db->get_compiled_select();
		//,restaurant_tables.quantity,tables.table_size_total
		//Get available tables
		$this->db->select('restaurant_tables.restaurant_id,(restaurant_tables.quantity - 
		tables.table_size_total) as table_quantity, restaurant_tables.quantity,
		restaurant_tables.size as table_size');
		$this->db->from('restaurant_tables'); 
		$this->db->join("($subQuery2) as tables", 'restaurant_tables.size = tables.table_size', 'left');
		$this->db->where('restaurant_tables.restaurant_id',$restaurant_id);
		$this->db->order_by("restaurant_tables.size", "asc");
		$query = $this->db->get();
		$result = $query->result();
		$table_size = array();
		$table_quantity  = array();
		$table_total = array();
		$total = array();
		foreach($result as $row)
		{
			array_push($table_size, $row->table_size);
			if(empty($row->table_quantity)){
				array_push($table_quantity, $row->quantity);
				array_push($table_total, $row->quantity*$row->table_size);
			}else{
				array_push($table_quantity, $row->table_quantity);
				array_push($table_total, $row->table_quantity*$row->table_size);
			}
		}
		$data = array(
			"size"=>$table_size,
			"quantity"=>$table_quantity,
			"total"=>$table_total,
			"sum"=>array_sum($table_total)
		);
		return $data;
	}
	
	public function server_isAvailable($restaurant_id,$server_id,$customer_size,$reservation_time){
		$start = $reservation_time;
		$end = date('Y-m-d H:i:s', 
		strtotime('+60 minutes', strtotime($start)));//add 60 mins from datetime 
		
		//Sub query of reservation time
		$this->db->select('reservation_time, server_id, restaurant_id, customer_size')->from('reservation');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->having('reservation.reservation_time <=',$start);
		$this->db->having('ADDTIME(reservation.reservation_time, "0 01:00:00") >=',$start);
		$subQuery =  $this->db->get_compiled_select();
		
		
		$this->db->select('servers.user_id, servers.server_limit, restaurants.table_size, reservation.customer_size, servers.server_limit,
		(SUM( reservation.customer_size )) as table_total, reservation.reservation_time, ADDTIME(reservation.reservation_time, "01:00:00") as start_res,
		calendar.start, calendar.end, calendar.title, users.email, users.name, users.icon_path
		');
		$this->db->from('servers');
		$this->db->join('calendar', 'servers.user_id = calendar.server_id', 'left');
		$this->db->join("($subQuery) as reservation", 'servers.user_id = reservation.server_id', 'left');
		$this->db->join('restaurants','servers.restaurant_id = restaurants.restaurant_id', 'inner');
		$this->db->join('users','servers.user_id = users.id', 'inner');
		//$this->db->join('ratings','servers.user_id = ratings.server_id', 'outer');
		$this->db->where('calendar.start <=',$start);
		$this->db->where('calendar.end >=',$end);
		$this->db->where('servers.user_id ',$server_id);
		$this->db->having('coalesce(server_limit - table_total,server_limit, table_total) >', $customer_size);
		
		$query = $this->db->get();
		$result = $query->result();
		//return $result;
		
		
		if(count($result)>0){
			return true;
		}
		return false;
		
	}
	
	public function get_server_reservations($server_id,$current_page,$search_data,$order){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		$data = array();
		
		//Search array
		$search_array = array(
			"reservation.reservation_id"=>$search_data,
			"u.name"=>$search_data,
			"reservation.reservation_time"=>$search_data
		);

		$this->db->select('reservation.*,u.name as user_name, u.id as user_id,
		servers.id as servers_id, servers.server_limit');
		
		$this->db->select('s.name as server_name, s.icon_path as icon_path');
	
		$this->db->from('reservation');
		$this->db->join('servers','reservation.server_id = servers.user_id', 'left');
		$this->db->join('users as u','reservation.user_id = u.id', 'inner');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		$this->db->where('reservation.server_id ',$server_id);
		$this->db->like('reservation.reservation_id', $search_data);
		$this->db->or_like($search_array);
		$this->db->having('reservation.server_id ',$server_id);
		$this->db->order_by("reservation.reservation_id", $order);
		
		$this->db->limit($limit, $start);
		//$array = array('restaurant_id=' => $restaurant_id, 'reservation_id >' => $last_id);
		//$this->db->where($array);
		$query = $this->db->get();
		$data['rows'] = $query->result();
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		
		$query = $this->db->select('reservation.server_id')
		->from('reservation')
		->join('servers','reservation.server_id = servers.user_id', 'inner')
		->join('users as u','reservation.user_id = u.id', 'inner')
		->where('reservation.server_id', $server_id)
		->like('reservation.reservation_id', $search_data)
		->or_like($search_array)
		->having('reservation.server_id', $server_id)
		->get();
		$data['total'] = $query->num_rows();

		return $data;
	}
	
	public function get_user_reservations($user_id,$current_page=1,$search_data="",$order){
		
		$limit = 10;
		$start = ($current_page-1)*$limit;
		//Search array
		$search_array = array(
			"reservation.reservation_id"=>$search_data,
			"s.name"=>$search_data,
			"reservation.reservation_time"=>$search_data
		);
		
		$this->db->select('reservation.*,u.name as user_name, u.id as user_id,
		restaurants.name as restaurant_name, servers.user_id as servers_id, 
		servers.server_limit,');
		
		$this->db->select('s.name as server_name, s.icon_path as icon_path');
	
		$this->db->from('reservation');
		$this->db->join('restaurants','reservation.restaurant_id = restaurants.id', 'left');
		$this->db->join('servers','reservation.server_id = servers.user_id', 'left');
		$this->db->join('users as u','reservation.user_id = u.id', 'inner');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		
		
		$this->db->where('reservation.user_id ',$user_id);
		$this->db->like('reservation.reservation_id', $search_data);
		$this->db->or_like($search_array);
		$this->db->having('reservation.user_id ',$user_id);
		$this->db->order_by("reservation.reservation_id", $order);
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$data = array();
		$data['rows'] = $query->result();
		$data['lenght'] = count($data['rows']);
		$data['current'] = $current_page;
		$data['rowCount'] = $limit;
		
		$query = $this->db->select('reservation.user_id')
		->from('reservation')
		->join('servers','reservation.server_id = servers.user_id', 'inner')
		->join('users as s','reservation.server_id = s.id', 'inner')
		->where('reservation.user_id ',$user_id)
		->like('reservation.reservation_id', $search_data)
		->or_like($search_array)
		->having('reservation.user_id',$user_id)
		->get();
		$data['total'] = $query->num_rows();

		return $data;
	}
	
	public function get_unrated_reservations($user_id){
		$date = date('Y-m-d H:i:s');
		$date = date('Y-m-d H:i:s', 
		strtotime('+4 hours', strtotime($date)));//add 120 mins from datetime 
		$this->db->select('reservation.id, reservation.user_id, reservation.server_id,
		reservation.reservation_time,reservation.restaurant_id,reservation.status,
		restaurants.name as restaurant_name, restaurants.icon_path as restaurant_icon_path,
		users.id as server_id, users.name as server_name, users.icon_path as server_icon_path');
		$this->db->from('reservation');
		$this->db->join('restaurants', 'reservation.reservation_id = restaurants.restaurant_id','inner');
		$this->db->join('users','reservation.server_id = users.id', 'inner');
		$this->db->where('reservation.user_id',$user_id);
		$this->db->where('reservation.is_rated',"0");
		$this->db->where('reservation.reservation_time <',$date);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function add_reservation($restaurant_id,$server_id,$user_id,$notes,
		$customer_size,$table_num,$table_data,$reservation_time,$date){
			
			$reservation_id = $this->get_last_reservation_id($restaurant_id)+1;
			$data = array (
				'reservation_id'=>$reservation_id,
				'restaurant_id' => $restaurant_id,
				'server_id' => $server_id,
				'user_id' => $user_id,
				'notes' => $notes,
				'customer_size' => $customer_size,
				'table_num' => $table_num,
				'table_data' => $table_data,
				'reservation_time' => $reservation_time,
				'arrival_time' => $reservation_time,
				'date' => $date,
				'date_modified'=>$date,
				'status' => 2
		);
		//Get tables_size, table_quantity
		$table_data = $this->get_available_tables($restaurant_id,$reservation_time);
		$customer_table = $this->get_assigned_tables($table_data['size'],$table_data['quantity'],$customer_size); 
		$this->db->insert ( 'reservation', $data );
		$data_1 = array();
		if ($this->db->affected_rows () > 0) {
			$data_1['success'] = true;
			$data_1['reservation_id'] = $reservation_id;
			$i = 0;
			foreach($customer_table as $row){
				$customer_table_data['table_size'] = $customer_table[$i];
				$customer_table_data['restaurant_id'] = $restaurant_id;
				$customer_table_data['reservation_id'] = $reservation_id;
				$this->db->insert("reservation_tables",$customer_table_data);
				$i++;
			}
			return $data_1;
		}
		$data_1['success'] = false;
		$data_1['reservation_id'] = "";
		return $data_1;
	}
	
	public function update_reservation($reservation_id,$restaurant_id,$server_id,$notes,
	$customer_size, $table_num,$table_data,$status){
		$date = date ( 'Y-m-d H:i:s' );
		$data = array(
				'restaurant_id'=>$restaurant_id,
				'server_id'=>$server_id,
				'notes'=>$notes,
				'customer_size'=>$customer_size,
				'table_num'=>$table_num,
				'table_data'=>$table_data,
				'status'=>$status,
				'date_modified'=>$date
		);
		$array = array('restaurant_id=' => $restaurant_id, 'reservation_id =' => $reservation_id);
		$this->db->where($array);
		$this->db->update ( 'reservation', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	//Update Reservation batch
	public function reservation_is_rated($data){
		$this->db->update_batch ( 'reservation' ,$data, 'id');
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_reservation_send($restaurant_id,$reservation_id,$group_size,$server_id,$notes,$status){

		//Get info from database
		$this->db->select('restaurants.name as restaurant_name, u.name as user_name,
		u.email as user_email, s.name as server_name, reservation.reservation_time');
		
		$this->db->from('reservation');
		$this->db->join('restaurants','reservation.restaurant_id = restaurants.id', 'left');
		$this->db->join('servers','reservation.server_id = servers.user_id', 'left');
		$this->db->join('users as u','reservation.user_id = u.id', 'inner');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->order_by("reservation.reservation_id", $reservation_id);
		$query = $this->db->get();
		$data = $query->row();
	
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($data->user_email);
        $this->email->subject('Restaurant Reservation Update'); 
		$message = "Hi ".$data->user_name.",\n\n".
		"Your reservation details has been changed with ".$data->restaurant_name.".\n".
		"Below are the new details of your reservation\n\n".
		"Server Name: ".$data->server_name."\n".
		"Reservation ID: ".$reservation_id."\n".
		"Reservation Date: ".$data->reservation_time."\n".
		"Group Size: ".$group_size."\n".
		"Notes: ".$notes."\n";
		
        $this->email->message($message); 
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}
	
	public function delete_reservation_send($restaurant_id,$reservation_id){

		//Get info from database
		$this->db->select('restaurants.name as restaurant_name, u.name as user_name,
		u.email as user_email, s.name as server_name, reservation.reservation_time');
		
		$this->db->from('reservation');
		$this->db->join('restaurants','reservation.restaurant_id = restaurants.id', 'left');
		$this->db->join('servers','reservation.server_id = servers.user_id', 'left');
		$this->db->join('users as u','reservation.user_id = u.id', 'inner');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.reservation_id', $reservation_id);
		$query = $this->db->get();
		$data = $query->row();
	
		//Load email library 
        $this->load->library('email'); 
		 
		$from_email = "services@whosmyserver.com"; 
		$this->email->from($from_email, 'WhosMyServer'); 
        $this->email->to($data->user_email);
        $this->email->subject('Restaurant Reservation Update'); 
		$message = "Hi ".$data->user_name.",\n\n".
		"Your reservation has been cancelled with ".$data->restaurant_name.".\n".
		"Below are the details of the reservation\n\n".
		"Server Name: ".$data->server_name."\n".
		"Reservation ID: ".$reservation_id."\n".
		"Reservation Date: ".$data->reservation_time."\n";
		
		$curdate=strtotime(date ( 'Y-m-d H:i:s' ));
		$mydate=strtotime($data->reservation_time);
		if($curdate < $mydate){
			$this->email->message($message); 
			if($this->email->send()){
				return true;
			}
		}
		return false;
	}
	
	public function get_last_reservation_id($restaurant_id){
		$this->db->select('reservation_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$query = $this->db->get('reservation');
		$data = $query->result();
		$val = json_encode($data);
		$cnt = count($data);
		if($cnt==0){
			$reservation_id = 20000;
		}else{
			$reservation_id = $this->maxValueInArray($data, "reservation_id");
		}
		return $reservation_id;
	}
	
	public function new_order_id($order_id){
		$new_id = $order_id+1;
		return $new_id;
	}
	
	public function remove_reservation($restaurant_id,$reservation_id){
		$val = $this->delete_reservation_send($restaurant_id,$reservation_id);
		$array = array('restaurant_id=' => $restaurant_id, 'reservation_id =' => $reservation_id);
		//$this->db->where($array);
		$this->db->delete ( 'reservation',$array );
		$this->db->delete ( 'reservation_tables',$array );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	
	public function get_notifications($restaurant_id){
		$date = date ( 'Y-m-d H:i:s' );
		$status = 0;
		$this->db->select('users.name,users.icon_path, reservation.reservation_time');
		$this->db->from('reservation');
		$this->db->join('users','reservation.server_id = users.id', 'inner');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->where('reservation.reservation_time > ',$date);
		$query = $this->db->get();
		$data = $query->result();
		
		return $data;
	}
	
	public function get_server_notifications($server_id){
		$date = date ( 'Y-m-d H:i:s' );
		$status = 0;
		$this->db->select('users.name,users.icon_path, reservation.reservation_time');
		$this->db->from('reservation');
		$this->db->join('users','reservation.server_id = users.id', 'inner');
		$this->db->where('reservation.server_id ',$server_id);
		$this->db->where('reservation.reservation_time > ',$date);
		$query = $this->db->get();
		$data = $query->result();
		
		return $data;
	}
	
	public function maxValueInArray($array, $keyToSearch){
    $currentMax = NULL;
    foreach($array as $arr)
    {
        foreach($arr as $key => $value)
        {
            if ($key == $keyToSearch && ($value >= $currentMax))
            {
                $currentMax = $value;
            }
        }
    }

    return $currentMax;
	}
	
}
?>