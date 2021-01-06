<?php
	/**
	 * 
	 */
	class Email extends CI_Controller
	{
		
		// function __construct(argument)
		// {
		// 	# code...
		// }
		public function index(){
		    $data['events']=$this->db->get('userevents')->result();
            // print_r($query);
            $data['userSessionData']=unserialize($this->session->userdata('adminData'));
            $this->load->view('layout/header',$data);
            $this->load->view('pages/sendMailToAll');
            $this->load->view('layout/footer');
		}
        public function sendMail(){
            // die(json_encode($_POST));
            $msg=$this->input->post('mail_message');
            $subject=$this->input->post('subject_email');
            $temp=0;
            if($this->input->post('all')){
                $oldUser=$this->db->select('*')->get('user_details')->result();
                foreach($oldUser as $user){
                    $email=$user->user_email;
                        // echo '  || Email: '.$user->user_email;
                        if($this->mailFunction($email,$msg,$subject)){
                            $temp=1;
                        };
                    }
            }else{
                //Send to User Event Wise
                    $eventId=$this->input->post('event_id');
                    $regUser=$this->db->join('race_registeration','race_registeration.user_id=user_details.id_table')->where('race_registeration.event_id',$eventId)->get('user_details')->result();
                        // $emailArr=array("thavika9@yahoo.com");
                    // // print_r($emailArr);
                    if(count($regUser)>0){
                        foreach($regUser as $user){
                            // echo ' || Email: '.$user->user_email;
                            if($this->mailFunction($email,$msg,$subject)){
                                $temp=1;
                            };
                        }
                    }   
            }
            if($temp==1){
                $this->session->set_flashdata('msg','Mail Sent');
            }else{
                $this->session->set_flashdata('err','Failed To Send');
            }
            redirect('Email');
            die(json_encode($_POST));
            $msg=$this->input->post('mail_message');
            $subject=$this->input->post('subject_email');
            $temp=0;
            if($this->input->post('all')){
                // echo 'Send to All';
                // $otherdb = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
                $oldUser=$this->db->select('*')->get('user_details')->result();
                foreach($oldUser as $user){
                    $email=$user->user_email;
                        // echo ' Email: '.$user->user_email;
                        if($this->mailFunction($email,$msg,$subject)){
                            $temp=1;
                        };
                    }
                // die(json_encode($oldUser));
            }else{
                // echo 'Send to Selected ON';
                $emailArr=$this->input->post('to');
                    // $emailArr=array("thavika9@yahoo.com");
                // // print_r($emailArr);
                if(count($emailArr)>0){
                    foreach($emailArr as $email){
                        // echo ' Email: '.$email;
                        if($this->mailFunction($email,$msg,$subject)){
                            $temp=1;
                        };
                    }
                }
            }
            if($temp==1){
                $this->session->set_flashdata('msg','Mail Sent');
            }else{
                $this->session->set_flashdata('err','Failed To Send');
            }
            redirect('Email');
            // for(){
                
            // }
        }
        public function mailFunction($email,$msg,$subject){
        // public function mailFunction($email_id){/
    	   // $this->load->library('email');
            $this->load->library('email');
            $config = array('protocol' => 'sendmail',
                    'mailpath'=>'/usr/sbin/sendmail',
                    'wordwrap' => FALSE,
                    'mailtype' => 'html',
                    // 'charset'=>'iso-8859-1',
                    'charset'   => 'utf-8',
                    'crlf'      => "\r\n",
                    'newline'   => "\r\n",
                    'send_multipart' => FALSE
                    );
            // $config['protocol'] = 'sendmail';
            // $config['mailpath'] = '/usr/sbin/sendmail';
            // $config['mailtype'] = 'html';
            // $config['charset'] = 'iso-8859-1';
            // $config['wordwrap'] = TRUE; 
            $this->email->initialize($config);
           
                $this->email->from('info@globeracers.com');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($msg);
                $st = $this->email->send();
            if($st){
                return 1;
            }else{
                return 0;
            }
            // print_r($this->email->print_debugger());    
                // $config['protocol'] = "smtp";
                // $config['smtp_host'] = "ssl://smtp.googlemail.com";
                // $config['smtp_port'] = "465";
                // $config['smtp_user'] = "greenusys@gmail.com";
                // $config['smtp_pass'] = "grade@835";
                // $message = $msg;
                // $config['mailtype'] = "html";
                // $ci = & get_instance();
                // $ci->load->library('email', $config);
                // $ci->email->set_newline("\r\n");
                // $ci->email->from("greenusys@gmail.com");
                // $ci->email->to($email);
                // $ci->email->subject($subject);
                // $ci->email->message($message);
                //  $ci->email->send();
    	}
	}
	
	

?>