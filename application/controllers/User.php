<?php
	/**
	 * 
	 */
	class User extends MY_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->model('UserModel','USERM');
			

		}
		public function selectEvent(){
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $user_id=$data['userSessionData'][0]->user_id;
		    $data['events']=$this->db->order_by('event_id','desc')->get('userevents')->result();
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/selectEventUser');
			$this->load->view('layout/footer');
		}
		public function viewLeaderboard(){
			$event_id=$this->input->get('event_id');
			$data['event_id']=$event_id;
			$eventDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
			$start_date=$eventDetails->event_start_date;
            $end_date=$eventDetails->event_end_date;	
			if($this->input->get('_for_')){
				// echo 'For passed';
				$for_date=$this->input->get('_for_');
                $condition=array(
                                "race_registeration.event_id"=>$event_id,
                                "race_registeration.to_show"=>1,
                                "event_details.start_date ="=>$for_date,
                            );
			}else{
                $for_date=$end_date;
                $condition=array(
                                "race_registeration.event_id"=>$event_id,
                                "race_registeration.to_show"=>1,
                                "event_details.start_date >="=>$start_date,
                                "event_details.start_date <="=>$end_date,
                                "race_registeration.amoun_status"=>'Paid'
                            );
            }
            $teamArray=array();
            if($this->input->get('type') && $this->input->get('type')=='team'){
                
                $team_data=array();
                $condition=array(
                                "race_registeration.event_id"=>$event_id,
                                "race_registeration.to_show"=>1,
                                // "event_details.start_date >="=>$start_date,
                                // "event_details.start_date <="=>$end_date,
                                "race_registeration.amoun_status"=>'Paid',
                                "team_details.team_name!="=>"Solo"
                            );
                $all_teams=$this->db
                                ->select('SUM(event_details.distance) as team_distance, team_details.team_id, team_details.team_name')
                                ->join('race_registeration', 'team_details.team_id = race_registeration.team_id', 'left')
                                ->join('user_details','user_details.id_table=race_registeration.user_id')
                                ->order_by('team_distance','desc')
                                ->join('event_details','event_details.athlete_id=user_details.user_id')
                                ->group_by('team_details.team_id')
                                ->where($condition)
                                ->get('team_details')->result();
                                $i=1;
                foreach($all_teams as $tm){
                    array_push($teamArray,array("rank"=>$i,"team_id"=>$tm->team_id,"team_distance"=>$tm->team_distance,"team_name"=>$tm->team_name));
                    $i++;
                    array_push($team_data,$tm->team_id);
                }
                // print_r($teamArray);
                // echo '  --------------------------------------------------------------- ';
                // print_r($team_data);
                $teams=$this->db->where('team_name!=','Solo')->get('team_details')->result();
                foreach($teams as $t_m_){
                    if (in_array($t_m_->team_id, $team_data)){
                      // echo "Match found";
                    }else{
                      // echo "Match not found";
                      array_push($teamArray,array("rank"=>0,"team_id"=>$t_m_->team_id,"team_distance"=>0,"team_name"=>$t_m_->team_name));
                    }
                }
            }
            $data['team_data']=$teamArray;
			$data['for_']=$for_date;
        	// die;
            $data['min_date']=$start_date;
            $data['max_date']=$end_date;   
	        $reacResult=array();
	        $temp_status=0;
	        $particpants=$this->db->select('SUM(event_details.moving_time) as time_taken ,SUM(event_details.distance) as user_distance, team_details.team_name, user_details.user_id as api_id ,team_details.team_id, race_registeration.reg_id, 
        		        race_registeration.user_id, race_registeration.created_at as reg_on,race_registeration.event_id, 
        		        user_details.id_table, user_details.d_o_b,user_details.user_email,user_details.firstname,user_details.middle_name ,
        		        user_details.lastname, user_details.sex,event_category.category_name, user_details.contact_no')
        		        ->join('user_details','user_details.id_table=race_registeration.user_id')
        		        ->join('team_details', 'team_details.team_id = race_registeration.team_id', 'left')
        		        ->join('userevents','userevents.event_id=race_registeration.event_id')
        		        ->join('event_category','event_category.category_id=userevents.event_category')
        		        // ->order_by('race_registeration.reg_id','desc')
        		        ->join('event_details','event_details.user_email=user_details.user_email')
        		        ->order_by('user_distance','desc')
        		        ->group_by('user_details.user_id')
        		        ->where($condition)
        		        ->get('race_registeration')->result();
        	// echo '<table border="1">';
        	$i=1;
        	
        	foreach($particpants as $user){

        		// echo '<tr>';
        		// echo '<td>'.$i.'</td>';
        		// echo '<td>'.$user->firstname.' '.$user->middle_name.' '.$user->lastname.'</td>';
        		
        		// echo '<td>'.($user->user_distance/1000).'km</td>';
        		// echo '<td>'.$user->api_id.'</td>';
        		// echo '</tr>';
        		

        		array_push($reacResult, array(
        										'name'=>$user->firstname.' '.$user->middle_name.' '.$user->lastname,
        										'team_name'=>$user->team_name,
        										'token'=>'REG-000'.$user->reg_id,
        										'gender'=>$user->sex,
        										'day'=>date('d-m-Y'),
        										'distance'=>($user->user_distance/1000),
        										'timeTaken'=>$user->time_taken,
        										'd_o_b'=>$user->d_o_b,
        										'rank'=>$i,
        									));

        		$i++;


        	}

        	// echo '</table>';
        	// die;
        	$data['event_name']=$eventDetails->event_name;
        	$data['eventResult']=$reacResult;
        	$data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $data['events']=$this->db->get('userevents')->result();
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/leader_user_board_latest');
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
	public function test_one(){
		  //  $query="SELECT sum(`event_details`.`distance`) as dist,`race_registeration`.*,`event_details`.*,`team_details`.* FROM `user_details` JOIN `event_details` on `user_details`.`user_id`=`event_details`.`athlete_id` JOIN `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id` JOIN `team_details` ON `race_registeration`.`team_id`=`team_details`.`team_id` WHERE `event_details`.`start_date`>='2020-11-14' AND `race_registeration`.`amoun_status`='Paid' GROUP BY `race_registeration`.`team_id` ORDER BY dist DESC";
    // 	   $data['teamLeaderBoard']=$this->db->query($query)->result();
    // 	   print_r($data['teamLeaderBoard']);
            $query_solo_cumm="SELECT sum(distance) as dist,`user_details`.`firstname`,`user_details`.`sex`,`user_details`.`middle_name`,`user_details`.`lastname` FROM `calculated_data` JOIN `user_details` ON `calculated_data`.`user_id`=`user_details`.`user_id` GROUP BY `calculated_data`.`user_id` ORDER BY dist DESC";
            $data['soloCumm']=$this->db->query($query_solo_cumm)->result();
            print_r($data['soloCumm']);
            
		}
		public function index(){
		  //  die(json_encode(array("code"=>$this->checkProfileStatus())));
		    if(!$this->checkProfileStatus()){
		      redirect('User/Profile') ;
		    }
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/connectionPage');
			$this->load->view('layout/footerUser');
		}
		public function updateTeam(){
		    $userSessionData=unserialize($this->session->userdata('userData'));
		    $user_id=$userSessionData[0]->id_table;
		    $reg_details=$this->db->where('user_id',$user_id)->get('race_registeration')->row();
		    $toUpdate=array("team_id"=>$this->input->post('team_id'));
		    
		    if($this->db->where('reg_id',$reg_details->reg_id)->update('race_registeration',$toUpdate)){
		        die(json_encode(array("code"=>1)));
		    }else{
		        die(json_encode(array("code"=>0)));
		    }
		  //  print_r($_POST);
		  //  print_r($reg_details);
		}
		public function updateProfile_(){
		  //  print_r($_POST)
		    $email=$this->input->post('participant_email');
		    $condition=array("user_email"=>$email);
		    $userData=array(
		                       "firstname"=>$this->input->post('first_name'),
		                       "middle_name"=>$this->input->post('mid_name'),
		                       "lastname"=>$this->input->post('last_name'),
		                       "d_o_b"=>$this->input->post('dob_'),
		                        "profile_completion_status"=>1,
		                       "country_code"=>$this->input->post('country_code'),
		                       "contact_no"=>$this->input->post('phone_no'),
		                       "sex"=>$this->input->post('gender'),
		                       "full_address"=>$this->input->post('full_address'),
		                       "country"=>$this->input->post('country'),
		                       "state"=>$this->input->post('state'),
		                       "city"=>$this->input->post('city'),
		                       "zip_code"=>$this->input->post('zip_code'),
		                       "blood_group"=>$this->input->post('blood_group'),
		                       "emg_cont_name"=>$this->input->post('emg_cont_name'),
		                       "emg_cont_no"=>$this->input->post('emg_cont_no'),
		                  );
		                  //print_r($userData);
		    if($this->db->where('user_email',$email)->update('user_details',$userData)){
		        $this->session->set_flashdata('msg','Profile Updated Successfully');
		        redirect('User/APIConnection');
		    }else{
		        $this->session->set_flashdata('msg','Failed To Update Profile');
		        redirect('User/APIConnection');
		    }
		}
		public function ldBoard($date_sel=""){
		   $data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $user_id=$data['userSessionData'][0]->user_id;
		    if($date_sel!=""){
		        $date=$date_sel;
		    }else{
		        $date=date('Y-m-d');
		    }
		    $condition=array(
		                        "calculated_data.data_Date "=>$date,
		                        
		                        "race_registeration.user_id"=>$user_id,
		                        "race_registeration.amoun_status"=>"Paid"
		                  );
		  $data['events']=$this->db->get('userevents')->result();
		  $data['team_details']=$this->db->get('team_details')->result();
		  $condition=array("event_id"=>10,"to_show"=>1,"amoun_status"=>"Paid");
	                
	      $data['leaderBoard']=$this->db
	      ->select('user_details.id_table, user_details.sex, user_details.d_o_b,user_details.user_id,
	      user_details.firstname, user_details.middle_name, user_details.lastname,user_details.user_id,
	      team_details.team_id, team_details.team_name')
	      ->where($condition)
	      ->join('user_details','user_details.id_table=race_registeration.user_id')
	      ->join('team_details','team_details.team_id=race_registeration.team_id','left')
	   //   ->join('calculated_data','calculated_data.user_id=user_details.user_id','left')
	   //   ->order_by('calculated_data.distance','desc')
	      ->get('race_registeration')->result();
	   ;
		  //print_r($data['leaderBoard']);
		  //  $data['events']=$this->db->join('userevents','userevents.event_id=race_registeration.event_id')->where($condition)->get('race_registeration')->result();
		    $this->load->view('layout/headerUser',$data);
			$this->load->view('pages/boardLeader');
			$this->load->view('layout/footerUser');
		}
		public function FetchData(){
			$condition=array("to_show"=>1,"amoun_status"=>"Paid");
	         $regUser=$this->db
	         ->select('user_details.user_id as uId, user_details.user_email,user_details.id_table, user_details.connection_type, user_details.firstname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
	         ->where($condition)
	         ->join('user_details','user_details.id_table=race_registeration.user_id')
	         ->get('race_registeration')->result();
	         echo '<table>';
	         foreach($regUser as $user){
	          
	            $user_id=$user->uId;
	            
	            // echo '    || Name: '.$user->firstname.' User id: '.$user_id.' Access Token: '.$user->access_token.' Refresh Token: '.$user->refresh_token;
	            if($user_id!=""){
	                // echo ' Fetching Data for : '.$user->firstname;
	                // if(){

	                // }else{

	                // }
	                echo '<tr>
	                            <td>Fetching Data: </td>
	                            <td>Connection Type :'.$user->connection_type.' </td>
	                            <td>API Id :'.$user->uId.' </td>
	                            <td>'.$user->firstname.'</td>
	                            <td>'.$user->user_email.'</td>
	                    
	                </tr>';
	                // $access_token=$user->access_token;
	                // $refresh_token=$user->refresh_token;
	                // $this->getAthleteEvents($user_id,$access_token,$refresh_token);
	               
	            }
	            else{

	                // echo ' Strava is not Connected. For: '.$user->firstname;
	                echo '<tr>
	                            <td style="color:red">Strava is not Connected: </td>
	                            <td>'.$user->firstname.'</td>
	                            <td>'.$user->user_email.'</td>
	                    
	                </tr>';
	                // $this->session->set_flashdata('error_msg','Please Connect To Strava First.');
	            }
	            
	            
	            
	            
	         }
	         echo '</table>';
	        // $this->dataTraverse();
	        // INSERT INTO `api_hit_logs`(`log_id`, `log_utc_time`, `log_indian_time`)
	        // date_default_timezone_set('asia/kolkata');
	        // $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'));
	        // $this->db->insert('api_hit_logs',$logs_details);
		}
		

		public function getRegAthleteActivities($date_sel=""){
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $user_id=$data['userSessionData'][0]->user_id;
		    $user_email=$data['userSessionData'][0]->user_email;
		    if($date_sel!=""){
		        $date=$date_sel;
		    }else{
		        $date=date('Y-m-d');
		    }
		    $condition=array(
		                        "calculated_data.data_Date ="=>$date,
		                  );
		  $data['events']=$this->db->get('userevents')->result();
		  $data['team_details']=$this->db->get('team_details')->result();
		
	   // $data['leaderBoard']=$this->db
	   // ->select('user_details.id_table, user_details.sex, user_details.d_o_b,user_details.user_id,
	   //    user_details.firstname, user_details.middle_name, user_details.lastname,user_details.user_id,
	   //    calculated_data.distance, calculated_data.data_Date, team_details.team_name,calculated_data.dt_id')
	   // ->where($condition)
	   // ->order_by('calculated_data.distance','desc')
	   
	   // ->join('user_details','user_details.user_id=calculated_data.user_id')
	   // ->join('race_registeration','race_registeration.user_id=user_details.id_table','left')
	   // ->join('team_details','team_details.team_id=race_registeration.team_id','left')
	   // ->group_by('calculated_data.dt_id')
	   // ->get('calculated_data')->result();
	    $query="SELECT sum(`event_details`.`distance`) as dist,`race_registeration`.*,`team_details`.*,`event_details`.* FROM `user_details` JOIN `event_details` on `user_details`.`user_email`=`event_details`.`user_email` JOIN `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id` JOIN `team_details` ON `race_registeration`.`team_id`=`team_details`.`team_id` WHERE `event_details`.`start_date`>='2020-11-14' AND `race_registeration`.`amoun_status`='Paid' GROUP BY `race_registeration`.`team_id` ORDER BY dist DESC";
        $data['teamLeaderBoard']=$this->db->query($query)->result();
        $query_solo_cumm="SELECT sum(distance) as dist,`user_details`.`firstname`,`user_details`.`sex`,`user_details`.`middle_name`,`user_details`.`lastname` FROM `calculated_data` JOIN `user_details` ON `calculated_data`.`user_id`=`user_details`.`user_id` GROUP BY `calculated_data`.`user_id` ORDER BY dist DESC";
        $data['soloCumm']=$this->db->query($query_solo_cumm)->result();
	   print_r($data['teamLeaderBoard']);
	   die;
	     // print_r(expression)
		  //  $data['events']=$this->db->join('userevents','userevents.event_id=race_registeration.event_id')->where($condition)->get('race_registeration')->result();
		    $this->load->view('layout/headerUser',$data);
			$this->load->view('pages/p_leaderBoard');
			$this->load->view('layout/footerUser');
		}
	public function testLe($date_sel="", $filter=""){
	    $data['userSessionData']=unserialize($this->session->userdata('userData'));
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
		 
	   /* Query For Filter created On: 23-11-2020
	    //$data['filtered_Data']=
	   SELECT SUM(`event_details`.`distance`) as `dist_`,`user_details`.`user_email`, 
	   `user_details`.`firstname`, `user_details`.`lastname` FROM `user_details` JOIN 
	   `race_registeration` ON `user_details`.`id_table`=`race_registeration`.`user_id`
	   JOIN `event_details` ON `event_details`.`athlete_id`=`user_details`.`user_id` WHERE
	   `race_registeration`.`amoun_status`='Paid' and `race_registeration`.`to_show`=1 AND
	   `event_details`.`start_date`='$date' GROUP BY `event_details`.`athlete_id` order by `dist_` desc*/
	  
	   
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
		    $this->load->view('layout/headerUser',$data);
			$this->load->view('pages/p_leaderBoard');
			$this->load->view('layout/footerUser');
		}
	public function getLeadData(){
		    $evnt_id=$this->input->post('event_id');
		    $team_id=$this->input->post('team_id');
		    if($this->input->post('event_id') && $this->input->post('team_id')){
		        if($team_id==10){
	                $condition=array("event_id"=>$evnt_id,"amoun_status"=>"Paid");
	                
	                $data=$this->db->where($condition)->join('user_details','user_details.id_table=race_registeration.user_id')->get('race_registeration')->result();
	            }else{
	                $condition=array("event_id"=>$evnt_id,"team_id"=>$team_id,"amoun_status"=>"Paid");
		        $data=$this->db->where($condition)->join('user_details','user_details.id_table=race_registeration.user_id')->get('race_registeration')->result();
	            }
		        
		        die(json_encode(array("code"=>1,"data"=>$data,"msg"=>"Both are selected")));
		    }else{
		        if($this->input->post('team_id')){
		            if($team_id==10){
		                $condition=array("amoun_status"=>"Paid");
		                $data=$this->db->where($condition)->join('user_details','user_details.id_table=race_registeration.user_id')->get('race_registeration')->result();
		            }else{
		                $condition=array("team_id"=>$team_id,"amoun_status"=>"Paid");
		                $data=$this->db->where($condition)->join('user_details','user_details.id_table=race_registeration.user_id')->get('race_registeration')->result(); 
		            }
		            
		            die(json_encode(array("code"=>1,"data"=>$data,"msg"=>"Only Team is Selected")));
		        }
		        if($this->input->post('event_id')){
		            $condition=array("event_id"=>$evnt_id,"amoun_status"=>"Paid");
		            $data=$this->db->where($condition)->join('user_details','user_details.id_table=race_registeration.user_id')->get('race_registeration')->result();
		            die(json_encode(array("code"=>1,"data"=>$data,"msg"=>"Only Event is Selected")));
		        }
		    }
		}
		public function updateData(){
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			// print_r($data['userSessionData']);
			
			$userData=$this->db->where('id_table',$data['userSessionData'][0]->id_table)->get('user_details')->row();
// 			print_r($userData);
// 			die;
			$userId=$userData->user_id;
			$access_token=$userData->access_token;
		    $refresh_token=$userData->refresh_token;
		    
			$url = 'https://www.strava.com/api/v3/athletes/'.$userId.'/stats';
		        /* Init cURL resource */
		    $curl = curl_init($url);
		  // echo ' Access Token: '.$access_token;
		    curl_setopt_array($curl, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
			      // Set Here Your Requesred Headers
			         'Content-Type: application/json',
			         'Authorization: Bearer '.$access_token
			    ),
			));
			     
	        /* execute request */
	        $result = curl_exec($curl);
	       // die($result);
	       $resPonse=$result;
	        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE); 
	        if($httpcode!=200){
	           // echo 'Ask for Access Token';
	            $url = 'https://www.strava.com/api/v3/oauth/token';
    			$ch = curl_init($url);
            	/* Array Parameter Data */
    	        $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'grant_type'=>'refresh_token','refresh_token'=>$refresh_token];
    	        /* pass encoded JSON string to the POST fields */
    	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
    	        /* set the content type json */
    	        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
    	        /* set return type json */
    	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	        /* execute request */
    	        $result = curl_exec($ch);
    	        
    	        $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    	        $result = json_decode($result);
    	       // print_r($result);
    	        $access_token=$result->access_token;
    	            $this->updateUserAccessToken($result);
	           // $response=$this->getNewAccessToken($refresh_token);
	            $resPonse=$this->getAthleteStats($userId,$access_token);
	           // print_r($response);
	        }else{
	           // echo 'No need to ask for access token';
	            $access_token=$access_token;
	           
	        }
			$resPonse=json_decode($resPonse);
		    
			$totalDistance=$resPonse->all_ride_totals->distance + $resPonse->all_run_totals->distance + $resPonse->all_swim_totals->distance;
// 			print_r($resPonse->all_ride_totals->distance);
			$totalElevation=$resPonse->all_ride_totals->elevation_gain;
			$toUpdate=array(
								"total_distance_covered"=>$totalDistance,
								"total_elevation_gain"=>$totalElevation,
								"longest_ride"=>$resPonse->biggest_ride_distance,
								"data_updated_at"=>date('Y-m-d h-i-s')
							);
// 			print_r($toUpdate);	
// 			die;
			if($this->db->where('user_id',$userId)->update('user_details',$toUpdate)){
				$this->session->set_flashdata('msg_','Data Updated');
			}else{
				$this->session->set_flashdata('msg_','Failed To Update Data');
			}
			redirect('User');
	        curl_close($curl);
		}
		public function myUpComing(){
		  
		    $data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $user_id=$data['userSessionData'][0]->id_table;
		    $user_email=$data['userSessionData'][0]->user_email;
		    $atlete_id=$data['userSessionData'][0]->user_id;
		    $condition=array(
		                      //  "userevents.event_start_date >"=>date('Y-m-d'),
		                        "race_registeration.user_id"=>$user_id,
		                        "race_registeration.amoun_status"=>"Paid",
		                        "race_registeration.to_show"=>1
						  );
				
		 $datas = $this->db->join('userevents','userevents.event_id=race_registeration.event_id')->where($condition)->get('race_registeration')->result();
				  
			// print_r($datas);
			$result =array();
				foreach($datas as $rest){
					$start_date = $rest->event_start_date;
					$end_date = $rest->event_end_date;
					
					$con = array(
						'start_date >='=>$start_date,
						'start_date <='=>$end_date,
						// 'athlete_id'=>$atlete_id,
						'user_email'=>$user_email
					);	
					$arr = $this->db->where($con)->get('event_details')->result();
					$distance_total =0;
					for($i=0 ; $i < count($arr); $i++){
						$distance_total = $distance_total +$arr[$i]->distance;
					}
					
					array_push($result,array('event'=>$rest,'distanceSum'=>$distance_total));
				}	
			
			
			$data['events']=$result;
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/myComingEvent');
			$this->load->view('layout/footerUser');
		}

		public function myEventActivities($id){
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $user_id=$data['userSessionData'][0]->id_table;
		    $user_email=$data['userSessionData'][0]->user_email;
			$atlete_id=$data['userSessionData'][0]->user_id;
			$condition=array(
						"event_id"=>$id,
				 	);
			
			$data['event'] = $this->db->where($condition)->get('userevents')->result();
					$start_date = $data['event'][0]->event_start_date;
					$end_date = $data['event'][0]->event_end_date;
				
					$con = array(
						'start_date >='=>$start_date,
						'start_date <='=>$end_date,
						// 'athlete_id'=>$atlete_id,
						'user_email'=>$user_email
					);	
			$data['activities'] = $this->db->where($con)->get('event_details')->result();
					
			
		    $this->load->view('layout/headerUser',$data);
			$this->load->view('pages/myEventActivities');
			$this->load->view('layout/footerUser');  
		}


		public function userProfile($user_id){
		    echo $user_id;
		}
		public function checkForEventExpiry(){
		  $countAr=$this->db->get('test')->row();
		  print_r($countAr);
		  $count =$countAr->count_ + 1;
		  $this->db->where('id',1)->update('test',array('count_'=>$count));
		    
		    
		}
		public function getAthleteStats($userId,$access_token){
		 $url = 'https://www.strava.com/api/v3/athletes/'.$userId.'/stats';
		        /* Init cURL resource */
		    $curl = curl_init($url);
		  // echo ' Access Token: '.$access_token;
		    curl_setopt_array($curl, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
			      // Set Here Your Requesred Headers
			         'Content-Type: application/json',
			         'Authorization: Bearer '.$access_token
			    ),
			));
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);      
	        /* execute request */
	        $result = curl_exec($curl);
	        return $result;
	       // print_r($result);
	        // die;
	  //       $insStatus=$this->insertEvent($result);
	  //       switch ($insStatus) {
			// 	case 0:
			// 		echo 'Failed to Insert.';
			// 		break;
			// 	case 1:
			// 		echo 'Inserted Successfully.';
			// 		break;
			// 	case 2:
			// 		echo 'Data Already Exists.';
			// 		break;
			// 	default:
			// 		echo 'Some Thing Went Wrong';
			// 		break;
			// }  
	        /* close cURL resource */
	        curl_close($curl);
		}
		public function AllEvents(){
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$condition=array(
								
								"userevents.event_start_date  <"=>date('Y-m-d'),
								"userevents.event_end_date > "=>date('Y-m-d')
							);
			// $data['events']=$this->db->where($condition)->get('userevents')->result();
			$data['events']=$this->db->select('userevents.*,user_details.firstname, user_details.lastname ')->join('user_details','user_details.id_table=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			//  print_r($data['events']);
			//  die();
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/allEvents');
			$this->load->view('layout/footerUser');
		}
		public function MyEvents(){
			// $epoch = 1483228800;
			// $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
			// die;
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			echo $athlete_id =$data['userSessionData'][0]->user_id;
			//die();
			$id_table=$data['userSessionData'][0]->id_table;
			$email=$data['userSessionData'][0]->user_email;
			if($userData=$this->db->where('id_table',$id_table)->get('user_details')->row()){
			    $user_id=$userData->user_id;
				if($userData->access_token!="" && $user_id!=""){
				    $access_token=$userData->access_token;
    				$refresh_token=$userData->refresh_token;
    
    				// $this->getAthleteEvents($user_id,$access_token,$refresh_token);
				}else{
				    $this->session->set_flashdata('error_msg','Please Connect To Strava First.');
				}
				
			}else{
				// echo 'sdf';
				$this->session->set_flashdata('msg','No User Found');
			}
			
			$condition=array(
                               "user_email"=>$email,
                                // "athlete_id"=>$athlete_id,
                                );
			$data['events']=$this->db->where($condition)->order_by('id','desc')->get('event_details')->result();
			// $data['events']=$this->db->select('userevents.*,users_.user_fullname ')->join('users_','users_.user_id=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			// die;
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/myEvents');
			$this->load->view('layout/footerUser');
		}
		public function getAthleteEvents($id,$access_token,$refresh_token=""){
			 // http GET "https://www.strava.com/api/v3/activities/{id}?include_all_efforts=" "Authorization: Bearer [[token]]"
			$url = 'https://www.strava.com/api/v3/activities?id='.$id;
		        /* Init cURL resource */
		    $curl = curl_init($url);
		   
		    curl_setopt_array($curl, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_TIMEOUT => 30000,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
			      // Set Here Your Requesred Headers
			         'Content-Type: application/json',
			         'Authorization: Bearer '.$access_token
			    ),
			));
			$result = curl_exec($curl);
			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
// 			print_r($result);
	        /* execute request */
	        if($httpcode==200){
	            
	        	$insStatus=$this->insertEvent($result);
		        switch ($insStatus) {
					case 0:
						// echo 'Failed to Insert.';
						return 0;
						break;
					case 1:
						// echo 'Inserted Successfully.';
						return 1;
						break;
					case 2:
						// echo 'Data Already Exists.';
						return 2;
						break;
					default:
						// echo 'Some Thing Went Wrong';
						return 500;
						break;
				}  
	        }else{
	        	//Ask for refresh Token
	        	// echo 'Refresh Token Expired.';
	       // 	$refresh_toke='db1fea7be6052eaca33ec457158b2426ac2787d5';
	        	date_default_timezone_set('asia/kolkata');
				$userSessionData=unserialize($this->session->userdata('userData'));
				$user_id=$userSessionData[0]->id_table;
				$resUlt_=$this->db->where('id_table',$user_id)->get('user_details')->row();

				// print_r($resUlt_);
				$expires_at=$resUlt_->expires_at;
				$epoch = $expires_at;
				$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
				$expDate=$dt->format('Y-m-d H:i:s');
				$current=date('Y-m-d H:i:s');
				if($expDate<$current){
					// echo 'ask for refresh token';
					$response=$this->getNewAccessToken($refresh_token);
					return $response;
				}else{
					// echo 'no need of access_token';
				}
	        	
	        	
	        	// die(json_encode($response));
	        }
	      
	        // die(json_encode($httpcode));
	        
	        /* close cURL resource */
	        curl_close($curl);
		}
		public function getNewAccessToken($refresh_token){
// 			echo 'Refresh Token: '.$refresh_token;
			// POST https://www.strava.com/api/v3/oauth/token \
		 //  -d client_id=ReplaceWithClientID \
		 //  -d client_secret=ReplaceWithClientSecret \
		 //  -d grant_type=refresh_token \
		 //  -d refresh_token=ReplaceWithRefreshToken

		  $url = 'https://www.strava.com/api/v3/oauth/token';
			$ch = curl_init($url);
        	/* Array Parameter Data */
	        $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'grant_type'=>'refresh_token','refresh_token'=>$refresh_token];
	        /* pass encoded JSON string to the POST fields */
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	        /* set the content type json */
	        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
	        /* set return type json */
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        /* execute request */
	        $result = curl_exec($ch);
	        $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	        $result = json_decode($result);
	       // print_r($result);
	       // die;
	        if($httpcode==200){
	        	// echo 'Got Access Token';
	        	$updateResp=$this->updateUserAccessToken($result);
	        	// die(json_encode($updateResp));
	        	switch ($updateResp) {
	        		case 0:
						// echo 'Failed to Update.';
						return 0;
						break;
					case 1:
						// echo 'Updated Successfully.';
						return 1;
						break;
					default:
						// echo 'Some Thing Went Wrong 454';
						return 401;
						break;
	        	}
	        	// echo date('d-m-Y h:i:s',strtotime($result->expires_at));
	        }else{
	        	return 500;
	        	// echo 'Some Thing Went Wrong';
	        }
	         // return $result;  
	         // print_r($result);  
	        /* close cURL resource */
	        curl_close($ch);
		}
		public function updateUserAccessToken($data){
			// {"token_type":"Bearer","access_token":"234a7f861a217e38dcba146a66b6dcd752908ec5","expires_at":1603110622,"expires_in":20026,"refresh_token":"db1fea7be6052eaca33ec457158b2426ac2787d5"}
			// date_default_timezone_set('asia/kolkata');
			$userSessionData=unserialize($this->session->userdata('userData'));
			$user_id=$userSessionData[0]->id_table;
			if($user_id!=""){
				$userData=array(
								"token_type"=>$data->token_type,
								"expires_at"=>$data->expires_at,
								"expires_in"=>$data->expires_in,
								"refresh_token"=>$data->refresh_token,
								"access_token"=>$data->access_token,

							);
				if($this->db->where('id_table',$user_id)->update('user_details',$userData)){
					return 1;
				}else{
					return 0;
				}
				
			}else{
				return 500;
			}
			
		}
		public function insertEvent($data){
			$eventDetailArray=json_decode($data);
			$userSessionData=unserialize($this->session->userdata('userData'));
				$user_email=$userSessionData[0]->user_email;
			// print_r($eventDetailArray);
			// die(json_encode($eventDetailArray));
			$temp=0;
			foreach($eventDetailArray as $eventDetail){
				// print_r($eventDetail);
				// echo  $eventDetail->id;
				$createD=explode('T', $eventDetail->start_date);
				$createdAtDate=$createD[0];
				$createdAtTime=$createD[1];
				// print_r($createD);
				if($eventDetail->location_city!=null && $eventDetail->location_state!=null && $eventDetail->location_country!=null){
					$venue=$eventDetail->location_city.', '.$eventDetail->location_state.', '.$eventDetail->location_country;
				}else{
					$venue='NA';
				}
				
				$athleteId=$eventDetail->athlete;
				$eventData=array(
								"user_email"=>$user_email,
								"event_id"=>$eventDetail->id,
								"event_name"=>$eventDetail->name,
								"distance"=>$eventDetail->distance,
								"moving_time"=>$eventDetail->moving_time,
								"elapsed_time"=>$eventDetail->elapsed_time,
								"type"=>$eventDetail->type,
								"event_venue"=>$venue,
								"start_date"=>$createdAtDate,
								"timezone"=>$eventDetail->timezone,
								"athlete_id"=>$athleteId->id,
								
							);
				// print_r($eventData);
				// echo '**************************************************';
    			$condition=array(
    								"event_id"=>$eventDetail->id,
    								"athlete_id"=>$athleteId->id
    							);
    			// print_r($condition);
    			if(count($this->db->where($condition)->get('event_details')->result())==0  ){
    				if($this->db->insert('event_details',$eventData)){
    				// 	return 1;
    				    $temp=1;
    				}else{
    				// 	return 0;
    				    $temp=0;
    				}
    			}else{
    				// return 2;
    				    $temp=2;
    			}
			}
			if($temp==1){
			    return 1;
			}else if($temp==2){
			    return 2;
			}else{
			    return 0;
			}
			
		}
		public function Result(){
		    if(!$this->checkProfileStatus()){
		      redirect('User/Profile') ;
		    }
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/result');
			$this->load->view('layout/footerUser');
		}
		public function viewCreateEvent(){
		    if(!$this->checkProfileStatus()){
		      redirect('User/Profile') ;
		    }
			$data['category']=$this->db->get('event_category')->result();
			$data['Ngo']=$this->db->where('user_type','Ngo')->get('users_')->result();

			$data['Coaches_Nutritionist']=$this->db->where('user_type','Coaches_Nutritionist')->get('users_')->result();
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/createEventUser');
			$this->load->view('layout/footerUser');
		}
		public function payNow($reg_id=''){
		    if(!$this->checkProfileStatus()){
		      redirect('User/Profile') ;
		    }
		  //  if($this->session->flashdata('userData')){
		  $user=unserialize($this->session->userdata('userData'));
		  $res=$this->db->where('id_table',$user[0]->id_table)->get('user_details')->row();
		  if($reg_id!=""){
		      $condition=array("race_registeration.user_id"=>$res->id_table,"race_registeration.amoun_status"=>"Pending","race_registeration.reg_id"=>$reg_id);
		  }else{
		      $condition=array("race_registeration.user_id"=>$res->id_table,"race_registeration.amoun_status"=>"Pending");
		  }
		  //print_r($condition);
		    
		  //  print_r($condition);
		  //  if($this->session->userdata('evn_data')){
		        $data['eventDetail']=$this->db->join('userevents','userevents.event_id=race_registeration.event_id')->where($condition)->order_by('race_registeration.reg_id','desc')->limit(1)->get('race_registeration')->result();
		  //   print_r($data['eventDetail']);
		     
		      //  $data['unPaidevents']=unserialize($this->session->userdata('evn_data'));
		      //  $data['unPaidevents']=$this->db->where($condition)->join('userevents','userevents.event_id=race_registeration.event_id')->get('race_registeration')->result();
		        $data['userSessionData']=unserialize($this->session->userdata('userData'));
    			$this->load->view('layout/headerUser',$data);
    			$this->load->view('pages/demo');
    			$this->load->view('layout/footerUser');
		  //  }
		        
		  //  }else{
		  //      echo 'Something Went Wrong.';
		  //  }
		    
		}
		public function Profile(){
		    
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/profile');
			$this->load->view('layout/footerUser');
		}
		public function compress($source, $destination, $quality) {

		    $info = getimagesize($source);

		    if ($info['mime'] == 'image/jpeg') 
		        $image = imagecreatefromjpeg($source);

		    elseif ($info['mime'] == 'image/gif') 
		        $image = imagecreatefromgif($source);

		    elseif ($info['mime'] == 'image/png') 
		        $image = imagecreatefrompng($source);

		    imagejpeg($image, $destination, $quality);

		    return $destination;
		}
		public function createEvent(){
			// print_r($_POST);
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			// print_r($data['userSessionData']);
			$user=$data['userSessionData'][0]->user_id;
			if(isset($_FILES['eventImage']['name']) && $_FILES['eventImage']['name']!=""){
				
				$source_img = $_FILES['eventImage']['tmp_name'];
				$imgDetails=pathinfo($_FILES['eventImage']['name']);
				$ext=$imgDetails['extension'];
				$imgName='Event-'.date('d-m-Y-h-i-s').'-Image.'.$ext;;
				$destination_img = 'assets/img/eventsImage/'.$imgName; 
				if($this->compress($source_img, $destination_img, 70)){
					// echo 'image Uploaded';
					$Image=$imgName;
				}else{
					// echo 'Failed to Upload';
					$Image='default.png';
				}

				// $d = compress($source_img, $destination_img, 90);
			}else{
				// echo 'No Image found';
				$Image='default.png';
			}
			

			$data=array(
							"event_name"=>$this->input->post('event_name'),
							"user_id"=>$user,
							"event_image"=>$Image,
							"event_category"=>$this->input->post('event_cate'),
							"event_venue"=>$this->input->post('event_venue'),
							"event_des"=>$this->input->post('event_des'),
							"event_distance"=>$this->input->post('event_distance'),
							"event_start_date"=>$this->input->post('start_date_local'),
							"event_end_date"=>$this->input->post('end_date_local'),
							"event_fee"=>$this->input->post('fee'),
							"guide_lines"=>$this->input->post('set_guidelines'),
							"event_faq"=>$this->input->post('add_faq'),
							"coaches"=>$this->input->post('coach_nutri'),
							"ngos_"=>$this->input->post('ngo_'),

						);
			// die(json_encode($data));
			if(count($this->db->where($data)->get('userevents')->result())==0){
				if($this->db->insert('userevents',$data)){
					$this->session->set_flashdata('msg','Event Created Successfully.');
				}else{
					$this->session->set_flashdata('err','Some Thing Went Wrong.');
				}
			}else{
				$this->session->set_flashdata('msg','Event Already Exists.');
			}
			redirect('User/viewCreateEvent');
			// INSERT INTO `userevents`(`event_id`, `event_name`, `event_category`, `event_start_date`, `event_end_date`, `event_fee`, `guide_lines`, `event_faq`, `coaches`, `ngos_`, `created_on`)/''
		}
		public function viewEventDescription($eventId){
			$condition=array(
								"event_details.event_id"=>$eventId,
								// "userevents.event_start_date>="=>date('Y-m-d')
							);
			// $data['description']=$this->db->join('user_details','event_details.athlete_id=user_details.user_id')->where($condition)->get('event_details')->row();
			$data['description']=$this->db->select('userevents.*,user_details.firstname, user_details.lastname ')->join('user_details','user_details.id_table=userevents.user_id')->where('event_id',$eventId)->get('userevents')->row();
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/eventDescription');
			$this->load->view('layout/footerUser');
		}
		public function APIConnection(){
		    if(!$this->checkProfileStatus()){
		      redirect('User/Profile') ;
		    }
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			// print_r($data['userSessionData']);
			// die;
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/connectionPage');
			$this->load->view('layout/footerUser');
		}
		public function registrationForm($eventId){
		    if(!$this->checkProfileStatus()){
		      redirect('User/Profile') ;
		    }
		    $data['eventDetails']=$this->db->where('event_id',$eventId)->get('userevents')->row();
			$data['userSessionData']=unserialize($this->session->userdata('userData'));
			$data['teams']=$this->db->get('team_details')->result();
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/registrationForm');
			$this->load->view('layout/footerUser');
		}
		public function registerRace(){
		  //  print_r($_POST);
		    $email=$this->input->post('user_email');
		  //  $email="kaif@gmail.com";
    		  if($email==""){
    		      $email="kaif@gmail.com";
    		  }
    		  $userDetails=unserialize($this->session->userdata('userData'));
		      $userDetails__=$this->db->where('id_table',$userDetails[0]->id_table)->get('user_details')->row();
		  //  ALTER TABLE `race_registeration` ADD `medice_name_allergy` 
		  //  VARCHAR(255) NULL AFTER `last_updated_at`, ADD `food_name_allerg`
		  //  VARCHAR(255) NULL AFTER `medice_name_allergy`, ADD `surgery_name` VARCHAR(255) NULL AFTER `food_name_allerg`;
		    if($this->input->post('medice_allergy')){
		        $mdname=$this->input->post('medice_name');
		    }else{
		         $mdname="";
		    }
		    if($this->input->post('food_allergy')){
		        $fdname=$this->input->post('food_name');
		    }else{
		         $fdname="";
		    }
		    if($this->input->post('any_surgery')){
		          $sgname=$this->input->post('surgery_name');
		    }else{
		         $sgname="";
		    }
		    $event_id=$this->input->post('event_id');
		    
		    if($this->input->post('team_id')){
		        $team_name=$this->input->post('team_name');
		      //  INSERT INTO `team_details`(`team_id`, `team_name`, `team_creater`,
		      $newTeam=array("team_name"=>$team_name,"team_creater"=>$userDetails__->id_table);
		      if(count($this->db->where($newTeam)->get('team_details')->result())==0){
		          $this->db->insert('team_details',$newTeam);
		          $team_id=$this->db->insert_id();
		      }
		        
		        
		        
		    }else{
		        $team_id=$this->input->post('teamname_');
		    }
		  //  $condition=array("user_email"=>$email);
		  //  $userData=array(
		  //                     "firstname"=>$this->input->post('first_name'),
		  //                     "lastname"=>$this->input->post('mid_name'),
		  //                     "lastname"=>$this->input->post('last_name'),
		  //                     "d_o_b"=>$this->input->post('dob_'),
		                      
		  //                     "country_code"=>$this->input->post('country_code'),
		  //                     "contact_no"=>$this->input->post('phone_no'),
		  //                     "sex"=>$this->input->post('gender'),
		  //                     "full_address"=>$this->input->post('full_address'),
		  //                     "country"=>$this->input->post('country'),
		  //                     "state"=>$this->input->post('state'),
		  //                     "city"=>$this->input->post('city'),
		  //                     "zip_code"=>$this->input->post('zip_code'),
		  //                     "blood_group"=>$this->input->post('blood_group'),
		  //                     "emg_cont_name"=>$this->input->post('emg_cont_name'),
		  //                     "emg_cont_no"=>$this->input->post('emg_cont_no'),
		  //                );
		                  //print_r($condition);
		                  //echo '********************************************************************************************************';
		                  //print_r($userData);
		  //if($this->db->where($condition)->update('user_details',$userData)){
		      //INSERT INTO `race_registeration`(`reg_id`, `user_id`, `event_id`, `amoun_status`, `prev_distance`, 
		      //`prev_dist_date_time`, `new_distance_covered`, `race_last_date`, `last_updated_at`, `created_at`)
		      
		      //echo 'Udated Successfully';
		        
		  //  echo '*********************************************************************************************';
		  
		        $eventDetails=$this->db->where('event_id',$this->input->post('event_id'))->get('userevents')->row();
		        $eventAmount=$eventDetails->event_fee;
		        if($this->input->post('any_tshirt')){
		            //T-Shirt Price
		            $tshirPrice=500;
		        }else{
		            $tshirPrice=0;
		        }
		        $processingFee=19.95;
		        $totalAmount=$eventAmount+$processingFee;
		      //  $this->session->set_userdata('evn_data',serialize($eventDetails));
		        //  print_r($eventDetails);
		        $eventCategory=$eventDetails->event_category;
		        	$toAdd=array(
					    
		                    "user_id"=>$userDetails__->id_table,
		                    "event_id"=>$this->input->post('event_id'),
		                  //  "prev_distance"=>$distance,
	                        "team_id"=>$team_id,
		                    "amount_to_pay"=>$totalAmount,
		                  //  "prev_dist_date_time"=>date('d-m-Y h:i:s'),
		                    "medice_name_allergy"=>$mdname,
                            "food_name_allerg"=>$fdname,
                            "surgery_name"=>$sgname,
		                 
		                );
		                $condition=array(
		                    "user_id"=>$userDetails__->id_table,
		                    "event_id"=>$this->input->post('event_id'),
		                );
		                if(count($this->db->where($condition)->get('race_registeration')->result())==0){
		                    if($this->db->insert('race_registeration',$toAdd)){
		                      //  echo 'Registered Successfully';
		                      $eventData=array(
		                                            "event_id"=>$this->input->post('event_id'),
		                                            
		                                            "user_id"=>$userDetails__->id_table,
		                                          //  "prev_distance"=>$distance,
		                                            "distance_to_cover"=>$eventDetails->event_distance,
		                                            "updated_at"=>date('Y-m-d h:i:s')
		                                        );
		                      //$this->db->insert('event_data',$eventData);
		                      //  INSERT INTO `event_data`(`t_r_id`, ``, ``, ``, 
		                      //  ``, `updated_at`, `inserted_at`))
		                        $this->session->set_flashdata('reg_msg','Registered Successfully');
		                    }else{
		                      //  echo 'Failed';
		                        $this->session->set_flashdata('reg_msg','Registration Failed');
		                    }
		                }else{
		                    $this->session->set_flashdata('reg_msg','Already Registered.');
		                  //  echo 'Data Already Exists.';
		                }
		       redirect('User/payNow');
    		  //  if($userDetails__->user_id!=""){
    		  //      $expires_at=$userDetails__->expires_at;
    				// $epoch = $expires_at;
    				// $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
    				// $expDate=$dt->format('Y-m-d H:i:s');
    				// $current=date('Y-m-d H:i:s');
    				// $distance=0;
    				// if($expDate<$current){
    				// // 	echo 'ask for access token';
    				// 	$response=$this->getNewAccessToken($userDetails__->refresh_token);
    				// 	if($response==1){
    				// 	    $userUpdateData=$this->db->where('id_table',$userDetails[0]->id_table)->get('user_details')->row();
    				// 	    $accessToken=$userUpdateData->access_token;
    				// 	}
    				// // 	die(json_encode($response));
    				// // 	return $response;
    				// $this->session->set_flashdata('reg_msg','Token Expired.');
    				// }else{
    				// // 	echo 'no need of access_token';
    				// // 	echo ' User Id: '.$userDetails__->user_id;
    				// // 	echo ' AccessToken : '.$userDetails__->access_token;
    				
    				// 	$accessToken=$userDetails__->access_token;
    		  //        //print_r($toAdd);
    				// }
    				// // echo ' Access Token: '.$accessToken;
    				// $stats=$this->getAthleteStats($userDetails__->user_id,$accessToken);
    				// 	$stats=json_decode($stats);
    				// // 	print_r($stats);
    				// // die;
    				
    				//     switch($eventCategory){
    				//         case 'Ride':if($stats->all_ride_totals->distance==""){
        //                 				   $distance= 0;
        //                 				}else{
        //                 				  $distance =$stats->all_ride_totals->distance; 
        //                 				}
    				//                     break;
    				//         case 'Walk':if($stats->all_run_totals->distance==""){
        //                 				   $distance= 0;
        //                 				}else{
        //                 				  $distance =$stats->all_run_totals->distance; 
        //                 				}
    				//                     break;
    				//         case 'Swim':if($stats->all_swim_totals->distance==""){
        //                 				   $distance= 0;
        //                 				}else{
        //                 				  $distance =$stats->all_swim_totals->distance; 
        //                 				}
    				//                     break;
    				//         default:$distance=0;
    				//                     break;            
    				//     }
    				// 	$toAdd=array(
    					    
    		  //                  "user_id"=>$userDetails__->user_id,
    		  //                  "event_id"=>$this->input->post('event_id'),
    		  //                  "prev_distance"=>$distance,
    		  //                  "amount_to_pay"=>$totalAmount,
    		  //                  "prev_dist_date_time"=>date('d-m-Y h:i:s'),
    		  //                  "medice_name_allergy"=>$mdname,
        //                         "food_name_allerg"=>$fdname,
        //                         "surgery_name"=>$sgname,
    		                 
    		  //              );
    		  //              $condition=array(
    		  //                  "user_id"=>$userDetails__->user_id,
    		  //                  "event_id"=>$this->input->post('event_id'),
    		  //              );
    		  //              if(count($this->db->where($condition)->get('race_registeration')->result())==0){
    		  //                  if($this->db->insert('race_registeration',$toAdd)){
    		  //                    //  echo 'Registered Successfully';
    		  //                    $eventData=array(
    		  //                                          "event_id"=>$this->input->post('event_id'),
    		                                            
    		  //                                          "user_id"=>$userDetails__->user_id,
    		  //                                          "prev_distance"=>$distance,
    		  //                                          "distance_to_cover"=>$eventDetails->event_distance,
    		  //                                          "updated_at"=>date('Y-m-d h:i:s')
    		  //                                      );
    		  //                    $this->db->insert('event_data',$eventData);
    		  //                    //  INSERT INTO `event_data`(`t_r_id`, ``, ``, ``, 
    		  //                    //  ``, `updated_at`, `inserted_at`))
    		  //                      $this->session->set_flashdata('reg_msg','Registered Successfully');
    		  //                  }else{
    		  //                    //  echo 'Failed';
    		  //                      $this->session->set_flashdata('reg_msg','Registration Failed');
    		  //                  }
    		  //              }else{
    		  //                  $this->session->set_flashdata('reg_msg','Already Registered.');
    		  //                //  echo 'Data Already Exists.';
    		  //              }
    		  //    //  
    		  //  }else{
    		  //      $this->session->set_flashdata('msg','Please Connect To Api First.');
    		  //      redirect('User/APIConnection');
    		  //  }
		      
		      //$this->session->set_userdata('userData',$event_id);
		      //redirect('User/payNow');
		      
		  //}else{
		  //    echo 'Failed To Update';
		  //}
		  
		  die;
		    $userDetails=unserialize($this->session->userdata('userData'));
// 		 print_r($userDetails);
		  $userDetails__=$this->db->where('id_table',$userDetails[0]->id_table)->get('user_details')->row();
		  //   print_r($userDetails__);
		  //   die;
		  //  echo '*********************************************************************************************';
		    $eventDetails=$this->db->where('event_id',$this->input->post('event_id'))->get('userevents')->row();
		  //  print_r($eventDetails);
		    $eventCategory=$eventDetails->event_category;
		    if($userDetails__->user_id!=""){
		        $expires_at=$userDetails__->expires_at;
				$epoch = $expires_at;
				$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
				$expDate=$dt->format('Y-m-d H:i:s');
				$current=date('Y-m-d H:i:s');
				$distance=0;
				if($expDate<$current){
					echo 'ask for refresh token';
				// 	$response=$this->getNewAccessToken($refresh_token);
				// 	return $response;
				$this->session->set_flashdata('reg_msg','Token Expired.');
				}else{
				// 	echo 'no need of access_token';
				// 	echo ' User Id: '.$userDetails__->user_id;
				// 	echo ' AccessToken : '.$userDetails__->access_token;
					$stats=$this->getAthleteStats($userDetails__->user_id,$userDetails__->access_token);
					$stats=json_decode($stats);
				// 	print_r($stats);
				// die;
				    switch($eventCategory){
				        case 'Ride':$distance=$stats->all_ride_totals->distance;
				                    break;
				        case 'Walk':$distance=$stats->all_run_totals->distance;
				                    break;
				        case 'Swim':$distance=$stats->all_swim_totals->distance;
				                    break;
				        default:$distance=0;
				                    break;            
				    }
					$toAdd=array(
					    
		                    "user_id"=>$userDetails__->user_id,
		                    "event_id"=>$this->input->post('event_id'),
		                    "prev_distance"=>$distance,
		                    "prev_dist_date_time"=>date('d-m-Y h:i:s'),
		                 
		                );
		          $condition=array(
		                    "user_id"=>$userDetails__->user_id,
		                    "event_id"=>$this->input->post('event_id'),
		                );
		                if(count($this->db->where($condition)->get('race_registeration')->result())==0){
		                    if($this->db->insert('race_registeration',$toAdd)){
		                      //  echo 'Registered Successfully';
		                      $eventData=array(
		                                            "event_id"=>$this->input->post('event_id'),
		                                            "user_id"=>$userDetails__->user_id,
		                                            "prev_distance"=>$distance,
		                                            "distance_to_cover"=>$eventDetails->event_distance,
		                                            "updated_at"=>date('Y-m-d h:i:s')
		                                        );
		                      $this->db->insert('event_data',$eventData);
		                      //  INSERT INTO `event_data`(`t_r_id`, ``, ``, ``, 
		                      //  ``, `updated_at`, `inserted_at`))
		                        $this->session->set_flashdata('reg_msg','Registered Successfully');
		                    }else{
		                      //  echo 'Failed';
		                        $this->session->set_flashdata('reg_msg','Registration Failed');
		                    }
		                }else{
		                    $this->session->set_flashdata('reg_msg','Already Registered.');
		                  //  echo 'Data Already Exists.';
		                }
		          //print_r($toAdd);
				}
		      //  
		    }else{
		        $this->session->set_flashdata('reg_msg','Database Error.');
		    }
		    redirect('User');
		  //  $toAdd=array(
		  //                  "user_id"=>,
		  //                  "user_id"=>,
		  //                  "user_id"=>,
		  //                  "user_id"=>,
		  //                  "user_id"=>,
		  //              );
		  //  Array ( [event_id] => 1 [name] => greenusys technology )
		  //`race_registeration`(`reg_id`, `user_id`, `amoun_status`, ``,
		  //``, `new_distance_covered`, `race_last_date`, `last_updated_at`, `created_at`)
		  
		}
		public function payumoney($reg_id){
		    $data['userSessionData']=unserialize($this->session->userdata('userData'));
		    $condition=array(
		                        "race_registeration.reg_id"=>$reg_id,
		                       
		                        
		                    );
		      $data['userData']=$this->db->where('id_table',$data['userSessionData'][0]->id_table)->get('user_details')->row();              
		    $data['eventData']=$this->db->join('race_registeration','race_registeration.event_id=userevents.event_id')->where($condition)->get('userevents')->result();
		  //  print_r($data['eventData']);
		  //  die(json_encode($data['eventData']));
		    $data['userSessionData']=unserialize($this->session->userdata('userData'));
    		$this->load->view('pages/payindex',$data);
    	}
    	public function response(){
    		$this->load->view('pages/response');
    	}
    	public function Contact_us(){
    	    $data['userSessionData']=unserialize($this->session->userdata('userData'));
			$this->load->view('layout/headerUser',$data);
			$this->load->view('pages/sendEmail');
			$this->load->view('layout/footerUser');
    	}
    	public function sendMail(){
    	    // print_r($_POST);
			// die();
			$fromEmail = $this->input->post('from');
			$toEmail = $this->input->post('to');
			$subject = $this->input->post('subject_email');
			$message = $this->input->post('mail_ad');
			
			// ini_set( 'smtp_port', 25 );
			// ini_set( 'smtp_port', 25 );
			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' =>465,	
				'smtp_user' => 'greenusys@gmail.com', // change it to yours
				'smtp_pass' => 'grade@835', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
			  );
			  ini_set( 'smtp_port', 25 );

			  $message = $message;
			  $this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($fromEmail);
            $this->email->to($toEmail);
            $this->email->subject($subject);
            $this->email->message($message);
			if($this->email->send())
		   {
			echo 'Email sent.';
		   }
		   else
		  {
		   show_error($this->email->print_debugger());
		  }
          
    	}
	}
	

?>