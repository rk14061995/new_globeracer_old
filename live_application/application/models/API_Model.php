<?php
	/**
	 * 
	 */
	class API_Model extends CI_Model
	{
		public function loginValidationApi($data){
			// print_r($data);
			if(count($da=$this->db->where($data)->get('user_details')->result())>0){
				$this->session->userdata('userData',serialize($da));
				return true;
			}else{
				return false;
			}	
		}
		// public function
	}

?>