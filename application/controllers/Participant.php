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
		public function Certificates(){
            $data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    $this->load->view('layout/header',$data);
			$this->load->view('pages/uploadCertificate');
			$this->load->view('layout/footer');
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
		        ->join('event_details', 'user_details.user_id = event_details.athlete_id', 'left')
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
		public function selectEvent(){
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    $user_id=$data['userSessionData'][0]->user_id;
		    $data['events']=$this->db->order_by('event_id','desc')->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/selectEvent');
			$this->load->view('layout/footer');
		}
		public function LeaderBoard($date_sel="", $filter=""){
		   $data['userSessionData']=unserialize($this->session->userdata('adminData'));
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
	   //;
	   
	   /* Query For Filter created On: 23-11-2020
	   
	   SELECT SUM(`event_details`.`distance`) as `dist_`,`user_details`.`user_email`, 
	   `user_details`.`firstname`, `user_details`.`lastname` FROM `user_details` JOIN 
	   `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id`
	   JOIN `event_details` ON `event_details`.`athlete_id`=`user_details`.`user_id` WHERE
	   `race_registeration`.`amoun_status`='Paid' and `race_registeration`.`to_show`=1 AND
	   `event_details`.`start_date`='$date' GROUP BY `event_details`.`athlete_id` order by `dist_` desc*/
	   //$data['filtered_Data']=
	   
	   //Using
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
	   // $query="SELECT sum(`event_details`.`distance`) as dist,`race_registeration`.*,`team_details`.*,`event_details`.* FROM `user_details` JOIN `event_details` on `user_details`.`user_id`=`event_details`.`athlete_id` JOIN `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id` JOIN `team_details` ON `race_registeration`.`team_id`=`team_details`.`team_id` WHERE `event_details`.`start_date`>='2020-11-14' AND `race_registeration`.`amoun_status`='Paid' GROUP BY `race_registeration`.`team_id` ORDER BY dist DESC";
    //     $data['teamLeaderBoard']=$this->db->query($query)->result();
        
         $query="SELECT sum(`event_details`.`distance`) as dist,`race_registeration`.`reg_id`,`event_details`.*,`team_details`.* FROM `user_details` JOIN `event_details` on `user_details`.`user_id`=`event_details`.`athlete_id` JOIN `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id` JOIN `team_details` ON `race_registeration`.`team_id`=`team_details`.`team_id` WHERE `event_details`.`start_date`>='2020-11-14' AND `race_registeration`.`amoun_status`='Paid' GROUP BY `race_registeration`.`team_id` ORDER BY dist DESC";
    	   $data['teamLeaderBoard']=$this->db->query($query)->result();
    	   $leaderBoard=$data['teamLeaderBoard'];
    	   $allTeam=$this->db->get('team_details')->result();
    	   foreach($data['teamLeaderBoard'] as $tem){
    	       //   echo ' Team Id : '.$tem->team_id;
    	   }
    	   $teamDetails=array();
    	   $rank=0;
    	   $teamData=array();
    	   foreach($leaderBoard as $team){
    	       $distance=$team->dist;
    	       foreach($allTeam as $tem){
    	          if($tem->team_id==$team->team_id){
    	              $temp=1;
    	              $rank++;
    	           //   echo ' Team Exits: '.$team->team_id;
    	          }else{
    	           //   echo ' Not Exits: '.$team->team_id;
    	          }
    	       }
    	       if($temp==1){
    	           array_push($teamData,$team->team_id);
        	           array_push($teamDetails, array("team_id"=>$team->team_id,"distance"=>$distance,"rank"=>$rank));
        	       }else{
        	           array_push($teamDetails, array("team_id"=>$team->team_id,"distance"=>0,"rank"=>0));
        	           //echo ' Not Exits: '.$team->team_id;
        	       }
    	   }
    	   foreach($allTeam as $t_){
    	       
                if (in_array($t_->team_id, $teamData))
                  {
                //   echo " Match found : ".$t_->team_id;
                  }
                else
                  {
                //   echo " Match not found : ".$t_->team_id;
                  array_push($teamDetails, array("team_id"=>$t_->team_id,"distance"=>0,"rank"=>0));
                  }
    	   }

            $query_solo_cumm="SELECT sum(distance) as dist,`user_details`.`firstname`,`user_details`.`sex`,`user_details`.`middle_name`,`user_details`.`lastname` FROM `calculated_data` JOIN `user_details` ON `calculated_data`.`user_id`=`user_details`.`user_id` GROUP BY `calculated_data`.`user_id` ORDER BY dist DESC";
            $data['soloCumm']=$this->db->query($query_solo_cumm)->result();
    	   //print_r($data['leaderBoard']);
    	     $data['teamLeaderBoard']=$teamDetails;
    	     $data['cumTedByDate']=$this->cummTeamLeaderBoardByDate($date);
	     
	     
		  
		  //  $data['events']=$this->db->join('userevents','userevents.event_id=race_registeration.event_id')->where($condition)->get('race_registeration')->result();
		    $this->load->view('layout/header',$data);
			$this->load->view('pages/admin_leaderBoard');
			$this->load->view('layout/footer');
		}
		public function cummTeamLeaderBoardByDate($date){
		    $query="SELECT sum(`event_details`.`distance`) as dist,`race_registeration`.`reg_id`,`event_details`.*,`team_details`.* FROM `user_details` JOIN `event_details` on `user_details`.`user_id`=`event_details`.`athlete_id` JOIN `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id` JOIN `team_details` ON `race_registeration`.`team_id`=`team_details`.`team_id` WHERE `event_details`.`start_date`='$date' AND `race_registeration`.`amoun_status`='Paid' GROUP BY `race_registeration`.`team_id` ORDER BY dist DESC";
		    
		  // $query="SELECT sum(`event_details`.`distance`) as dist,`race_registeration`.`reg_id`,`event_details`.*,`team_details`.* FROM `user_details` JOIN `event_details` on `user_details`.`user_id`=`event_details`.`athlete_id` JOIN `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id` JOIN `team_details` ON `race_registeration`.`team_id`=`team_details`.`team_id` WHERE `event_details`.`start_date`>='2020-11-14' AND `race_registeration`.`amoun_status`='Paid' GROUP BY `race_registeration`.`team_id` ORDER BY dist DESC";
    	   $data['teamLeaderBoard']=$this->db->query($query)->result();
    	   $leaderBoard=$data['teamLeaderBoard'];
    	   $allTeam=$this->db->get('team_details')->result();
    	   foreach($data['teamLeaderBoard'] as $tem){
    	       //   echo ' Team Id : '.$tem->team_id;
    	   }
    	   $teamDetails=array();
    	   $rank=0;
    	   $teamData=array();
    	   foreach($leaderBoard as $team){
    	       $distance=$team->dist;
    	       foreach($allTeam as $tem){
    	           if($team->team_id!=10){
    	                if($tem->team_id==$team->team_id){
        	              $temp=1;
        	              $rank++;
        	           //   echo ' Team Exits: '.$team->team_id;
        	            }else{
        	           //   echo ' Not Exits: '.$team->team_id;
        	          }
    	           }else{
    	               
    	           }
    	          if($tem->team_id==$team->team_id){
    	              $temp=1;
    	              $rank++;
    	           //   echo ' Team Exits: '.$team->team_id;
    	          }else{
    	           //   echo ' Not Exits: '.$team->team_id;
    	          }
    	       }
    	       if($temp==1){
    	           array_push($teamData,$team->team_id);
        	           array_push($teamDetails, array("team_id"=>$team->team_id,"distance"=>$distance,"rank"=>$rank));
        	       }else{
        	           array_push($teamDetails, array("team_id"=>$team->team_id,"distance"=>0,"rank"=>0));
        	           //echo ' Not Exits: '.$team->team_id;
        	       }
    	   }
    	   foreach($allTeam as $t_){
    	       
                if (in_array($t_->team_id, $teamData))
                  {
                //   echo " Match found : ".$t_->team_id;
                  }
                else
                  {
                //   echo " Match not found : ".$t_->team_id;
                  array_push($teamDetails, array("team_id"=>$t_->team_id,"distance"=>0,"rank"=>0));
                  }
    	   }
    	   return $teamDetails;
    	   //print_r($teamDetails);
		}
		
	}
	

?>