<?php
	/**
	 * 
	 */
	class UserModel extends CI_Model
	{
		
		public function createUserAccount($data){
			// `users_`(`user_id`, `user_email`, `user_password`, `user_fullname`)
			if(count($this->db->where($data)->get('user_details')->result())==0){
				if($this->db->insert('user_details',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}

		public function fetch_data($table,$user_id){
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('user',$user_id);
		    $query = $this->db->get()->result_array();
		    return $query;
		}

		public function check_user($email){ //check if category exists
			$this->db->select('*');
			$this->db->from('suunto_token');
			$this->db->where('user',$email);
		    $query = $this->db->get();
		    if ( $query->num_rows() > 0 )
		    {
		    	return true;
		    }
		    else{
		    	return false;
		    }
		}

		public function check_workout($event_id){

			// print_r($event_id);
			$this->db->select('*');
			$this->db->from('event_details');
			$this->db->where('event_id',$event_id);
		    $query = $this->db->get();
		    if ( $query->num_rows() > 0 )
		    {
		    	return false;
		    }
		    else{
		    	return true;
		    }
		}

		public function check_token($user_id){

			// print_r($event_id);
			$this->db->select('*');
			$this->db->from('token_details');
			$this->db->where('user_id',$user_id);
		    $query = $this->db->get();
		    if ( $query->num_rows() > 0 )
		    {
		    	return false;
		    }
		    else{
		    	return true;
		    }
		}

		public function update_table($table,$data,$condition){
		    $this->db->where($condition);
		    $this->db->update($table,$data);
		    return true;
		}

		public function insert_function($table,$data){ // insert into database
          if($this->db->insert($table, $data)){
          	return true;
          }
          else{
          	return false;
          }
		}
		
		public function userLoginValidate($data){
			if(count($user=$this->db->where($data)->get('user_details')->result())>0){
				$this->session->set_userdata('userData',serialize($user));
				return true; 
			}else{
				return false;
			}
		}
		public function adminLoginValidate($data){
			if(count($user=$this->db->where($data)->get('user_details')->result())>0){
				$this->session->set_userdata('adminData',serialize($user));
				return true; 
			}else{
				return false;
			}
		}
	}
?>