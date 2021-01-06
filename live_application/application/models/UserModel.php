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