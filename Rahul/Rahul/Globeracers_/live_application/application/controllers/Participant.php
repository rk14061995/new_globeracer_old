<?php
	/**
	 * 
	 */
	class Participant extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
// 			$this->load->model('UserModel','USERM');
			if(!$this->session->userdata('adminData')){
				redirect('userLogin');
			}

		}
		public function index($event_id=''){
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    if($event_id!=''){
		        $condition=array(
                		            "race_registeration.event_id"=>$event_id,
                		            "race_registeration.to_show"=>1,
                		            "race_registeration.amoun_status"=>'Paid'
		                        );
		        $data['particpants']=$this->db->select('team_details.team_name, team_details.team_id, race_registeration.reg_id, race_registeration.user_id, race_registeration.created_at as reg_on,race_registeration.event_id, user_details.id_table, user_details.d_o_b,user_details.user_email,user_details.firstname,user_details.middle_name ,user_details.lastname, user_details.sex,event_category.category_name, user_details.contact_no')
		        ->join('user_details','user_details.id_table=race_registeration.user_id')
		      //  ->join('',)
		        ->join('team_details', 'team_details.team_id = race_registeration.team_id', 'left')
		        ->join('userevents','userevents.event_id=race_registeration.event_id')
		        ->join('event_category','event_category.category_id=userevents.event_category')
		        ->order_by('race_registeration.reg_id','desc')
		        ->where($condition)
		        ->get('race_registeration')->result();
		    }else{
		        $data['particpants']=array();
		    }
		    
		  //  print_r($data['particpants']);
		  //  die;
		    $data['events']= $this->db->get('userevents')->result();
		  //  print_r($data['particpants']);
			$this->load->view('layout/header',$data);
			$this->load->view('pages/participant');
			$this->load->view('layout/footer');
		}
		public function testPart($event_id=''){
		  //  $data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    if($event_id!=''){
		        $condition=array(
                		            "race_registeration.event_id"=>$event_id,
                		            "race_registeration.to_show"=>1,
                		            "race_registeration.amoun_status"=>'Paid'
		                        );
		        $data['particpants']=$this->db->select('team_details.team_name, team_details.team_id, race_registeration.reg_id, race_registeration.user_id, race_registeration.created_at as reg_on,race_registeration.event_id, user_details.id_table, user_details.d_o_b,user_details.user_email,user_details.firstname,user_details.middle_name ,user_details.lastname, user_details.sex,event_category.category_name, user_details.contact_no')
		        ->join('user_details','user_details.id_table=race_registeration.user_id')
		      //  ->join('',)
		        ->join('team_details', 'team_details.team_id = race_registeration.team_id', 'left')
		        ->join('userevents','userevents.event_id=race_registeration.event_id')
		        ->join('event_category','event_category.category_id=userevents.event_category')
		        ->order_by('race_registeration.reg_id','desc')
		        ->where($condition)
		        ->get('race_registeration')->result();
		    }else{
		        $data['particpants']=array();
		    }
		    print_r($data['particpants']);
		}
		public function oldUser(){
		    $otherdb = $this->load->database('otherdb', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
            $data['userSessionData']=unserialize($this->session->userdata('adminData'));
            $data['oldUser']= $otherdb->select('*')->get('wp8m_users')->result();
		    $this->load->view('layout/header',$data);
			$this->load->view('pages/oldUser');
			$this->load->view('layout/footer');
		}
		public function dltParticipant(){
		    $condition=array('reg_id'=>$this->input->post('reg_id'));
		    $toUpdate=array("to_show"=>2);
            if($this->db->where($condition)->update('race_registeration',$toUpdate)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0)));
            }
		}
		public function LeaderBoard($date_sel=""){
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
		  // $data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $user_id=$data['userSessionData'][0]->user_id;
		    if($date_sel!=""){
		        $date=$date_sel;
		    }else{
		        $date=date('Y-m-d');
		    }
		    $condition=array(
		                        "calculated_data.data_Date ="=>$date,
		                      //  "race_registeration.to_show"=>1,
		                      //  "race_registeration.event_id"=>10,
		                      //  "race_registeration.user_id"=>$user_id,
		                      //  "race_registeration.amoun_status"=>"Paid"
		                  );
		  $data['events']=$this->db->get('userevents')->result();
		  $data['team_details']=$this->db->get('team_details')->result();
		  //$condition=array("event_id"=>10,"to_show"=>1,"amoun_status"=>"Paid");
	                
	   //   $data['leaderBoard']=$this->db
	   //   ->select('user_details.id_table, user_details.sex, user_details.d_o_b,user_details.user_id,
	   //   user_details.firstname, user_details.middle_name, user_details.lastname,user_details.user_id,
	   //   team_details.team_id, team_details.team_name,calculated_data.distance, calculated_data.data_Date')
	   //   ->where($condition)
	   //   ->join('user_details','user_details.id_table=race_registeration.user_id')
	   //   ->join('team_details','team_details.team_id=race_registeration.team_id','left')
	   //   ->join('calculated_data','calculated_data.user_id=user_details.user_id')
	   //   ->order_by('calculated_data.distance','desc')
	   //   ->get('race_registeration')->result();
	   ;
	   $data['leaderBoard']=$this->db
	   ->select('user_details.id_table, user_details.sex, user_details.d_o_b,user_details.user_id,
	      user_details.firstname, user_details.middle_name, user_details.lastname,user_details.user_id,
	      calculated_data.distance, calculated_data.data_Date, team_details.team_name,calculated_data.dt_id')
	   ->where($condition)
	   ->order_by('calculated_data.distance','desc')
	   
	   ->join('user_details','user_details.user_id=calculated_data.user_id')
	   ->join('race_registeration','race_registeration.user_id=user_details.id_table','left')
	   ->join('team_details','team_details.team_id=race_registeration.team_id','left')
	   ->group_by('calculated_data.dt_id')
	   ->get('calculated_data')->result();
		  
		  //  $data['events']=$this->db->join('userevents','userevents.event_id=race_registeration.event_id')->where($condition)->get('race_registeration')->result();
		    $this->load->view('layout/header',$data);
			$this->load->view('pages/admin_leaderBoard');
			$this->load->view('layout/footer');
		}
		
	}
	

?>