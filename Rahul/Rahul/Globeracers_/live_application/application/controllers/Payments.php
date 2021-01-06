<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {


	public function payumoney()
	{

			$this->load->view('pages/payindex');
// $this->load->view('pages/payMentPage');

	}
	public function response()
	{

			$this->load->view('pages/response');

	}
// 	public function 
}
