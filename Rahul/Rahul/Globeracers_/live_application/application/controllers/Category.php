

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Category extends CI_Controller
	{
	
		public function index(){
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$this->load->view('layout/header',$data);
			$this->load->view('pages/category');
			$this->load->view('layout/footer');
		}
		
	}
	

?>