<?php
	/**
	 * 
	 */
	class Report extends CI_Controller
	{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }
		public function index(){
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$this->load->view('layout/header',$data);
			$this->load->view('pages/report');
			$this->load->view('layout/footer');
			
		}
	}
	

?>