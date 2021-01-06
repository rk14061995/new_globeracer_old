<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {


	public function index(){
	    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
	    
	    $data['teams']=$this->db->get('team_details')->result();
		$this->load->view('layout/header',$data);
		$this->load->view('pages/team');
		$this->load->view('layout/footer');
	}
	public function updateTeam(){
	    
        $toUpdate=array('team_name'=>$this->input->post('team_name'));
        // print_r($toUpdate);
        // echo $this->input->post('team_id');
        if($this->db->where('team_id',$this->input->post('team_id'))->update('team_details',$toUpdate)){
            die(json_encode(array("code"=>1)));
        }else{
            die(json_encode(array("code"=>0)));
        }

	}
	
	public function addTeam(){
	    
        $data=array('team_name'=>$this->input->post('team_name'));
        if(count($this->db->where($data)->get('team_details')->result())==0){
            if($this->db->insert('team_details',$data)){
            die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0)));
            }
        }else{
            die(json_encode(array("code"=>0)));
        }
        

	}
	public function dltTeam(){
	    
        $condition=array('team_id'=>$this->input->post('team_id'));
        if($this->db->where($condition)->delete('team_details')){
            die(json_encode(array("code"=>1)));
        }else{
            die(json_encode(array("code"=>0)));
        }
        
        

	}
}
