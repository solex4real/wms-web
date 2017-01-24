<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Model_users extends CI_Model {
	public function can_log_in() {
		$this->db->select('password, salt');
		$this->db->where ( 'username', $this->input->post ( 'username' ) );
		//$this->db->where ( 'password', md5 ( $this->input->post ( 'password' ) ) );
		$query = $this->db->get ( 'users' ); 
		if ($query->num_rows () == 1) {
			//Check password with bycrpt and salt
			$password = $query->row()->password;
			$salt = $query->row()->salt;
			$hash = crypt($this->input->post ( 'password' ), '$2y$12$' . $salt);
			if($password == crypt($this->input->post ( 'password' ),$hash)){
				return true;
			}
			return false;
		} else {
			return false;
		}
	}
	
	public function username_exist($username) {
		$this->db->where ( 'username', $username );
		$query = $this->db->get ( 'users' );
		if ($query->num_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function email_exist($email) {
		$this->db->where ( 'email', $email);
		$query = $this->db->get ( 'users' );
		if ($query->num_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function get_user_email($email){
		$this->db->select('email, password, name, username, id');
		$this->db->from('users');
		$this->db->where ( 'email', $email);
		$query = $this->db->get ();
		$data = array();
		if ($query->num_rows () > 0) {
			$data['email'] = $query->row()->email;
			$data['name'] = $query->row()->name;
			$data['id'] = $query->row()->id;
			$data['password'] = $query->row()->password;
			$data['success'] = true;
		}else{
			$data['email'] = "";
			$data['name'] = "";
			$data['id'] = "";
			$data['password'] = "";
			$data['success'] = false;
		}
		return $data;
	}
	
	public function recovery_action($email){
		$this->db->select('email, name, username, id');
		$this->db->from('users');
		$this->db->where ( 'email', $email);
		$query = $this->db->get ();
		$name = $query->row()->name;
		$id = $query->row()->id;
		$username = $query->row()->username;
		$data = array();
		$data['email'] = "";
		$data['name'] = "";
		$data['id'] = "";
		$data['link_id'] = "";
		$data['success'] = false;
		if ($query->num_rows () > 0) {
			//add new link to recovery database
			$this->db->from('forgot_password');
			$this->db->where ( 'user_id', $query->row()->id);
			$query = $this->db->get ();
			$link_id = $this->generateRandomString(24);
			if($query->num_rows () > 0){
				//Update link if user id already exist
				$val = array (
				'link_id' => $link_id
				);
				$this->db->where('user_id',$id);
				$this->db->update ( 'forgot_password', $val );
				if ($this->db->affected_rows () > 0) {
					$data['email'] = $email;
					$data['name'] = $name;
					$data['id'] = $id;
					$data['link_id'] = $link_id;
					$data['success'] = true;
					return $data;
				}
			}else{
				//Add link if user id does not exist
				$val = array(
					'user_id'=>$id,
					'link_id'=>$link_id
				);
				$this->db->insert ( 'forgot_password', $val );
				if ($this->db->affected_rows () > 0) {
					$data['email'] = $email;
					$data['name'] = $name;
					$data['id'] = $id;
					$data['link_id'] = $link_id;
					$data['success'] = true;
					return $data;
				}
			}
		}
		return $data;
	}
	
	public function recover_valilidate($id,$link_id){
		$this->db->where ( 'user_id', $id );
		$this->db->where ( 'link_id', $link_id );
		$query = $this->db->get ( 'forgot_password' );
		if ($query->num_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function add_user() {
		$date_created = date ( 'd/m/Y H:i' );
		$date_modified = date ( 'd/m/Y H:i' );
		// salt for bcrypt needs to be 22 base64 characters (but just [./0-9A-Za-z]), see http://php.net/crypt
		$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
		$hash = crypt($this->input->post ( 'password_r' ), '$2y$12$' . $salt);
		$data = array (
				'name' => $this->input->post ( 'name' ),
				'username' => $this->input->post ( 'username_r' ),
				'password' => $hash,
				'salt'=>$salt,
				'email' => $this->input->post ( 'email' ),
				'phone' => $this->input->post ( 'phone' ),
				'date_created' => $date_created,
				'date_modified' => $date_modified 
		);
		$this->db->insert ( 'users', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	public function get_name($username) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where ( 'username', $username);
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->row();
		}else{
			
		}
		return false;
	}
	
	public function get_user($id) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where ( 'id', $id);
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			return $query->row();
		}else{
			
		}
		return false;
	}
	
	public function change_password($id, $new_password, $password, $date){
		$this->db->select('password, salt');
		$array = array('id=' => $id);
		$this->db->where ($array );
		$query = $this->db->get ( 'users' );
		
		//Change password
		if ($query->num_rows () == 1) {
			//Check password with bycrpt and salt
			$password1 = $query->row()->password;
			$salt = $query->row()->salt;
			$hash = crypt($password, '$2y$12$' . $salt);
			if($password1 == crypt($password,$hash)){
				$hash = crypt($new_password, '$2y$12$' . $salt);
				$data = array (
				'password' => $hash,
				'date_modified' => $date
				);
				$this->db->where('id',$id);
				$this->db->update ( 'users', $data );
				if ($this->db->affected_rows () > 0) {
					return true;
				}
				return false;
			}
			return false;
		} else {
			return false;
		}
		
	}
	
	public function recover_update_password($id, $new_password, $link_id, $date){
		$this->db->from('forgot_password');
		$this->db->where('user_id',$id);
		$this->db->where('link_id',$link_id);
		$query = $this->db->get ();
		if ($query->num_rows () > 0) {
			$salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
			$hash = crypt($new_password, '$2y$12$' . $salt);
			$data = array (
				'password' => $hash,
				'salt' => $salt,
				'date_modified' => $date
			);
			$this->db->where('id',$id);
			$this->db->update ( 'users', $data );
			if ($this->db->affected_rows () > 0) {
				$val = $this->remove_link_id($id,$link_id);
				return true;
			}
		}
		return false;
	}
	
	private function remove_link_id($user_id,$link_id){
		$this->db->where('user_id',$user_id);
		$this->db->delete ('forgot_password' );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function update_info($id,$name,$contact,$email,$about,$gender,$server,$date){
		
		$data = array(
				'name'=>$name,
				'phone'=>$contact,
				'email'=>$email,
				'about'=>$about,
				'gender'=>$gender,
				'server'=>$server,
				'date_modified'=>$date
		);
		$this->db->where('id',$id);
		$this->db->update ('users', $data );
		if ($this->db->affected_rows () > 0) {
			//Add to server if status is server
			if($server==1){
				//Add to server list
				$this->add_server($id);
			}
			
			return true;
		}
		return false;
	}
	
	public function update_image_path($id,$image_path,$date){
		
		$data = array(
				'icon_path'=>$image_path,
				'date_modified'=>$date
		);
		$this->db->where('id',$id);
		$this->db->update ('users', $data );
		if ($this->db->affected_rows () > 0) {
			return true;
		}
		return false;
	}
	
	public function add_server($user_id){
		
		$this->db->where ('user_id',$user_id );
		$query = $this->db->get ( 'servers' );
		if (!($this->db->affected_rows () > 0)) {
			
			
			$server_limit = 8;
			$status = 1;
			$title = "Server";
			$restaurant_id = 9;
		
			$array = array(
				'user_id'=>$user_id,
				'server_limit'=>$server_limit,
				'status'=>$status,
				'title'=>$title,
				'restaurant_id'=>$restaurant_id
			);
			$this->db->insert ( 'servers', $array );
		}
	}
	
	public function generateRandomString($length = 10) {
		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 
		ceil($length/strlen($x)) )),1,$length);
	}
	
}
?>