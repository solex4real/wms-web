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
		$start = strtotime(date('Y-m-d H:i:s').' -8 hours');
		$end = strtotime(date('Y-m-d H:i:s').' +8 hours');
		$date1 = date("Y-m-d H:i:s", $start);
		$date2 = date("Y-m-d H:i:s", $end);
		$this->db->select('reservation_guest.reservation_guest_id as reservation_id,
		reservation_guest.id as user_id, reservation_guest.server_id, reservation_guest.turn_time,
		reservation_guest.arrival_time as reservation_time,
		reservation_guest.arrival_time as arrival_time, 
		ADDTIME(reservation_guest.arrival_time, (reservation_guest.turn_time)) as turn_time_val,
		reservation_guest.status, reservation_guest.guest_name as name, " " as icon_path, users.name as server_name,
		users.icon_path as server_icon_path, 
		GROUP_CONCAT(reservation_tables.table_size) as table_size,
		GROUP_CONCAT(reservation_tables.table_id) as table_ids, reservation_guest.notes,
		reservation_guest.customer_size, "guest" type');
		$this->db->from('reservation_guest');
		$this->db->join('users' ,'reservation_guest.server_id = users.id', 'inner');
		$this->db->join('reservation_tables' ,'reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id', 'left');
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$this->db->where('reservation_guest.status',2);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->group_by('reservation_guest.reservation_guest_id');
		$subQuery1 = $this->db->get_compiled_select();
		$this->db->reset_query();
		
		//$this->db->start_cache();
		$this->db->select('reservation.reservation_id, reservation.user_id, reservation.server_id, 
		reservation.reservation_time, reservation.turn_time, reservation.arrival_time,
		ADDTIME(reservation.arrival_time, (reservation.turn_time)) as turn_time_val, reservation.status,
		users.name, users.icon_path, s.name as server_name, s.icon_path as server_icon_path,
		GROUP_CONCAT(reservation_tables.table_size) table_size, 
		GROUP_CONCAT(reservation_tables.table_id) table_ids, reservation.notes, reservation.customer_size,
		"reserved" type');
		$this->db->from('reservation');
		$this->db->join('users' ,'reservation.user_id = users.id', 'inner');
		$this->db->join('users as s' ,'reservation.server_id = s.id', 'inner');
		$this->db->join('reservation_tables' ,'reservation.reservation_id = reservation_tables.reservation_id', 'left');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.status',2);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->group_by('reservation.reservation_id');
		$subQuery2 = $this->db->get_compiled_select();
		
		return $this->db->query($subQuery1." UNION ".$subQuery2." ORDER BY arrival_time DESC")->result();
		//$this->db->query($subQuery1)->result();
		//return $this->db->last_query();
	}
	
	public function get_inline_customers($restaurant_id){
		$start = strtotime(date('Y-m-d H:i:s').' -8 hours');
		$end = strtotime(date('Y-m-d H:i:s').' +8 hours');
		$date1 = date("Y-m-d H:i:s", $start);
		$date2 = date("Y-m-d H:i:s", $end);
		
		//Sub query for reserved customers
		$this->db->select('reservation.arrival_time, reservation.reservation_id,
		reservation.notes, reservation.server_id, reservation.customer_size,
		reservation.turn_time, ADDTIME(reservation.arrival_time, (reservation.turn_time)) as turn_time_val,
		reservation.status, reservation.id, GROUP_CONCAT(reservation_tables.table_id) as table_ids,
		reservation.notes, users.name,users.icon_path, "reserved" type');
		$this->db->from('reservation');
		$this->db->join('reservation_tables','reservation.reservation_id = reservation_tables.reservation_id','left');
		$this->db->join('users','reservation.user_id = users.id','inner');
		$this->db->where('reservation.status',1);
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->group_by('reservation.reservation_id');
		$subQuery1 =  $this->db->get_compiled_select();
		
		//Sub query for guest customers
		$this->db->select('reservation_guest.arrival_time, reservation_guest.reservation_guest_id as reservation_id,
		reservation_guest.notes, reservation_guest.server_id, reservation_guest.customer_size,
		reservation_guest.turn_time, ADDTIME(reservation_guest.arrival_time, (reservation_guest.turn_time)) as turn_time_val,
		reservation_guest.status, reservation_guest.id, GROUP_CONCAT(reservation_tables.table_id) as table_ids,
		reservation_guest.notes, reservation_guest.guest_name, "icon_path" icon_path, "guest" type');
		$this->db->from('reservation_guest');
		$this->db->join('reservation_tables','reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id','left');
		$this->db->where('reservation_guest.status',1);
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->group_by('reservation_guest.reservation_guest_id');
		$subQuery2 =  $this->db->get_compiled_select();
		
		return $this->db->query($subQuery1." UNION ".$subQuery2)->result();
		/*
		$query = $this->db->get();
		return $query->result();
		*/
	}
	
	public function get_onhold_customers($restaurant_id){
		$start = strtotime(date('Y-m-d H:i:s').' -8 hours');
		$end = strtotime(date('Y-m-d H:i:s').' +8 hours');
		$date1 = date("Y-m-d H:i:s", $start);
		$date2 = date("Y-m-d H:i:s", $end);
		$this->db->select('reservation.*, users.name,users.icon_path,
		GROUP_CONCAT(reservation_tables.table_id) as table_ids,
		ADDTIME(reservation.arrival_time, (reservation.turn_time)) as turn_time_val
		');
		$this->db->from('reservation');
		$this->db->join('users','reservation.user_id = users.id','inner');
		$this->db->join('reservation_tables','reservation.reservation_id = reservation_tables.reservation_id','left');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.status',0);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") >',date('Y-m-d H:i:s'));
		$query = $this->db->get();
		return $query->result();	
	}
	
	public function get_server_assignment($restaurant_id){
		$start = strtotime(date('Y-m-d H:i:s').' -8 hours');
		$end = strtotime(date('Y-m-d H:i:s').' +8 hours');
		$date1 = date("Y-m-d H:i:s", $start);
		$date2 = date("Y-m-d H:i:s", $end);
		//Sub query of reservered tables
		$this->db->select('GROUP_CONCAT(COALESCE(reservation_tables.table_size, 0) SEPARATOR "-") as table_size, 
		GROUP_CONCAT(COALESCE(reservation_tables.table_id, 0) SEPARATOR "-") as table_id, 
		reservation_tables.reservation_id, reservation_tables.reservation_guest_id, 
		reservation_tables.restaurant_id',false);
		$this->db->from('reservation_tables');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$this->db->group_by('reservation_tables.reservation_id');
		$this->db->group_by('reservation_tables.reservation_guest_id');
		$subQuery =  $this->db->get_compiled_select();
		
		//Subquery for reserved customers
		$this->db->select('GROUP_CONCAT(COALESCE(reservation_tables.table_size, 0) SEPARATOR ",") as table_size,
		GROUP_CONCAT(COALESCE(reservation_tables.table_id, 0) SEPARATOR ",") as table_id,
		reservation.server_id, GROUP_CONCAT(reservation.user_id) as user_id, 
		GROUP_CONCAT(u.icon_path) as user_icon_path, reservation.arrival_time,
		GROUP_CONCAT(u.name) as user_name, s.name as server_name,
		s.icon_path as server_icon_path, GROUP_CONCAT(reservation.reservation_id) as reservation_id,
		GROUP_CONCAT("reserved") type',false);
		$this->db->from('reservation');
		$this->db->join("($subQuery) as reservation_tables",'reservation.reservation_id = reservation_tables.reservation_id','left');
		$this->db->join('users as u','reservation.user_id = u.id');
		$this->db->join('users as s','reservation.server_id = s.id', 'inner');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->where('reservation.status',2);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->group_by('reservation.reservation_id');
		$subQuery1 =  $this->db->get_compiled_select();
		
		//Subquery for guest customers
		$this->db->select('GROUP_CONCAT(COALESCE(reservation_tables.table_size, 0) SEPARATOR ",") as table_size,
		GROUP_CONCAT(COALESCE(reservation_tables.table_id, 0) SEPARATOR ",") as table_id,
		reservation_guest.server_id,GROUP_CONCAT(reservation_guest.id) as user_id, 
		GROUP_CONCAT("icon_path") as user_icon_path, reservation_guest.arrival_time,
		GROUP_CONCAT(reservation_guest.guest_name) as user_name, s.name as server_name,
		s.icon_path as server_icon_path, GROUP_CONCAT(reservation_guest.reservation_guest_id) as reservation_id,
		GROUP_CONCAT("guest") type',false);
		$this->db->from('reservation_guest');
		$this->db->join("($subQuery) as reservation_tables",'reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id','left');
		$this->db->join('users as s','reservation_guest.server_id = s.id', 'inner');
		$this->db->where('reservation_guest.restaurant_id',$restaurant_id);
		$this->db->where('reservation_guest.reservation_guest_id >',0);
		$this->db->where('reservation_guest.status',2);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") >',$date1);
		$this->db->having('DATE_FORMAT(reservation_guest.arrival_time, "%Y-%m-%d %H:%i:%s") <',$date2);
		$this->db->group_by('reservation_guest.reservation_guest_id');
		$subQuery2 =  $this->db->get_compiled_select();
		
		//$this->db->query($subQuery1." UNION ".$subQuery2)->result();
		$result = $this->db->query("SELECT GROUP_CONCAT(t.table_size) as table_size,
		GROUP_CONCAT(t.table_id) as table_id, t.server_id, GROUP_CONCAT(t.user_id) as user_id,
		GROUP_CONCAT(t.user_icon_path) as user_icon_path, GROUP_CONCAT(t.user_name) as user_name,
		t.server_name, t.server_icon_path, GROUP_CONCAT(t.reservation_id) as reservation_id, 
		GROUP_CONCAT(t.type) as type FROM(".
		$subQuery1." UNION ".$subQuery2.") as t GROUP BY t.server_id")->result();
		
		/*
		$query = $this->db->get(); 
		return $query->result();
		return $this->db->last_query();
		*/
		return $result;
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
	
	public function get_name_autocomplete($restaurant_id,$search_data){
		$limit = 10;
		$this->db->select('reservation.id, reservation.reservation_id, reservation.reservation_time,
			GROUP_CONCAT(reservation_tables.table_id) as table_ids, reservation.customer_size, reservation.notes,
			reservation.server_id, reservation.user_id, reservation.turn_time, users.name
		');
		$this->db->from('reservation');
		$this->db->join('users', 'reservation.user_id = users.id','inner');
		$this->db->join('reservation_tables', 'reservation.reservation_id = reservation_tables.reservation_id','left');
		$this->db->where('reservation.restaurant_id',$restaurant_id);
		$this->db->like('users.name',$search_data);
		$this->db->limit($limit);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function get_reservation_count($restaurant_id){
		$data = array();
		$date = date('Y-m-d');
		$data['total'] = $this->db->where('restaurant_id', $restaurant_id)->count_all_results('reservation');
		$data['total-today'] = $this->db->where('restaurant_id', $restaurant_id)->like('reservation.reservation_time',$date)->count_all_results('reservation');
		return $data;
	}
	
	public function change_tables($restaurant_id,$reservation_id,$tables){
		//Get tables from array
		$this->db->select('table_id');
		$this->db->where('restaurant_id',$restaurant_id);
		$this->db->where('reservation_id',$reservation_id);
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
				'reservation_id'=>$reservation_id,
				'reservation_id'=>0);
				$this->db->insert('reservation_tables',$table);
			}
		$i++;		
		}
		//Remove tables of id's from database that does not exsist in list
		foreach($current_tables as $row){
			$this->db->where(array('restaurant_id'=>$restaurant_id,
			'reservation_id'=>$reservation_id,
			'table_id'=>$row
			));
			$this->db->delete('reservation_tables');
		}
		return true;
	}
	
	public function get_assigned_tables($tables,$table_amount,$customer_size_defined,$table_ids,
	$num_chairs){
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
		$temp_assigned_tables = $assigned_tables;
		$assigned_table_ids = array();
		$notFound = true;
		//Get table ids for reservation
		foreach($temp_assigned_tables as $value){
			//Check if number of chairs equals assigned chair
			$i=0;
			while($notFound){
				if($value == $num_chairs[$i]){
					array_push($assigned_table_ids,$table_ids[$i]);
					$notFound = false;
				}
				$i++;
			}
			$notFound = true;
		}
		
		$data = array(
			"table_size"=>$assigned_tables,
			"table_ids"=>$assigned_table_ids
		);
		//return $assigned_tables;
		return $data;
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
		$this->db->select('reservation_tables.reservation_id, reservation_tables.reservation_guest_id,
		tables.num_chairs as table_size, 
		reservation_tables.restaurant_id, tables.table_id');
		$this->db->from('reservation_tables');
		$this->db->join('tables','reservation_tables.table_id = tables.table_id', 'inner');
		$this->db->where('reservation_tables.restaurant_id ',$restaurant_id);
		$this->db->where('tables.restaurant_id ',$restaurant_id);
		$subQuery =  $this->db->get_compiled_select();
		
		
		//Sub query of used tables for reserved customers
		$this->db->select('COUNT(reservation_tables.table_size) as table_size_total, reservation_tables.table_size, 
		reservation.reservation_time, reservation_tables.reservation_id, reservation.restaurant_id, 
		reservation.customer_size, reservation_tables.table_id');
		$this->db->from('reservation');
		$this->db->join("($subQuery) as reservation_tables", 'reservation.reservation_id = reservation_tables.reservation_id', 'left');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->having('reservation.reservation_time <=',$start);
		$this->db->having('ADDTIME(reservation.reservation_time, "0 01:00:00") >=',$start);
		$this->db->group_by('reservation.reservation_id');
		$subQuery1 = $this->db->get_compiled_select();
		
		//Sub query of used tables for guest customers
		$this->db->select('COUNT(reservation_tables.table_size) as table_size_total, reservation_tables.table_size, 
		reservation_guest.arrival_time as reservation_time, reservation_tables.reservation_id, 
		reservation_guest.reservation_guest_id as reservation_id, reservation_guest.customer_size, 
		reservation_tables.table_id');
		$this->db->from('reservation_guest');
		$this->db->join("($subQuery) as reservation_tables", 'reservation_guest.reservation_guest_id = reservation_tables.reservation_guest_id', 'left');
		$this->db->where('reservation_guest.restaurant_id ',$restaurant_id);
		$this->db->having('reservation_guest.arrival_time <=',$start);
		$this->db->having('ADDTIME(reservation_guest.arrival_time, "0 01:00:00") >=',$start);
		$this->db->group_by('reservation_guest.reservation_guest_id');
		$subQuery2 = $this->db->get_compiled_select();
		
		$this->db->query($subQuery1." UNION ".$subQuery2);
		$subQuery3 = $this->db->last_query();
		
		//,restaurant_tables.quantity,tables.table_size_total
		//Get available tables
		$this->db->select('tables.restaurant_id,(COUNT(tables.num_chairs) - 
		res_tables.table_size_total) as table_quantity, COUNT(tables.num_chairs),
		tables.num_chairs as table_size, GROUP_CONCAT(tables.table_id) as table_ids,
		GROUP_CONCAT(tables.num_chairs) as num_chairs,
		COUNT(tables.num_chairs) as quantity');
		$this->db->from('tables'); 
		$this->db->join("($subQuery3) as res_tables", 'tables.table_id = res_tables.table_id', 'left');
		//$this->db->where('tables.restaurant_id',$restaurant_id);
		$this->db->group_by('tables.num_chairs');
		$this->db->order_by("tables.num_chairs", "asc");
		$query = $this->db->get();
		$result = $query->result();
		$table_size = array();
		$table_ids = array();
		$num_chairs = array();
		$table_quantity  = array();
		$table_total = array();
		$total = array();
		foreach($result as $row)
		{
			array_push($table_size, $row->table_size);
			$table_ids = array_merge($table_ids, explode(",",$row->table_ids));
			$num_chairs = array_merge($num_chairs, explode(",",$row->num_chairs));
			if(empty($row->table_quantity)){
				array_push($table_quantity, $row->quantity);
				array_push($table_total, $row->quantity*$row->table_size);
			}else{
				array_push($table_quantity, $row->table_quantity);
				array_push($table_total, $row->table_quantity*$row->table_size);
			}
		}
		$data = array(
			"table_ids"=>$table_ids,
			"num_chairs"=>$num_chairs,
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
		
		//Sub query of reserved reservation time
		$this->db->select('reservation_time, server_id, restaurant_id, customer_size')->from('reservation');
		$this->db->where('reservation.restaurant_id ',$restaurant_id);
		$this->db->having('reservation.reservation_time <=',$start);
		$this->db->having('ADDTIME(reservation.reservation_time, "0 01:00:00") >=',$start);
		$subQuery1 =  $this->db->get_compiled_select();
		
		//Sub query for guest reservation time
		$this->db->select('arrival_time as reservation_time, server_id, restaurant_id, customer_size')->from('reservation_guest');
		$this->db->where('reservation_guest.restaurant_id ',$restaurant_id);
		$this->db->having('reservation_guest.arrival_time <=',$start);
		$this->db->having('ADDTIME(reservation_guest.arrival_time, "0 01:00:00") >=',$start);
		$subQuery2 =  $this->db->get_compiled_select();
		
		//Combined query
		$this->db->query($subQuery1." UNION ".$subQuery2);
		$subQuery = $this->db->last_query();
		
		
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
				'status' => 0
		);
		//Get tables_size, table_quantity
		$table_data = $this->get_available_tables($restaurant_id,$reservation_time);
		$assigned_table = $this->get_assigned_tables($table_data['size'],$table_data['quantity'],
		$customer_size,$table_data['table_ids'],$table_data['num_chairs']); 
		$customer_table = $assigned_table['table_size'];
		$table_ids = $assigned_table['table_ids'];
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
				$customer_table_data['table_id'] = $table_ids[$i];
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