<?php

class MY_Controller extends CI_Controller {
        function __construct(){
            parent::__construct();
	        if(!$this->session->userdata('userData')){
				redirect('userLogin');
			}
	    }

	public function checkProfileStatus(){
	    
	    
	    if($this->session->userdata('userData')){
	        $userSessionData=unserialize($this->session->userdata('userData'));
	        $userData=$this->db->where('id_table',$userSessionData[0]->id_table)->get('user_details')->row();
	        if($userData->profile_completion_status==1){  
	            $this->session->set_flashdata('welcome_msg',"Welcome To Globe Racers.");
	            return 1;
	        }else{
	            $this->session->set_flashdata('welcome_msg',"Please Complete Your Profile, Before Registering for event.");
	            return 1;
	           // return 0;
	        }
	    }else{
	        return 1;
	       // return 0;
	    }
	    
	}
}
