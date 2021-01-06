<?php
	/**
	 * 
	 */
	class Dashboard extends CI_Controller
	{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }
		public function index(){
			$this->load->view('layout/header');
			$this->load->view('pages/index');
			$this->load->view('layout/footer');
		}
	}
	

?>