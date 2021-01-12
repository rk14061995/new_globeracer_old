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
		public function viewLeaderboard(){
			$event_id=$this->input->get('event_id');
			$data['event_id']=$event_id;
			$eventDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
			
            $start_date=$eventDetails->event_start_date;
            $end_date=$eventDetails->event_end_date;
			if($this->input->get('_for_')){
				// echo 'For passed';
				$for_date=$this->input->get('_for_');
                if($eventDetails->result_declared==1){
                    $condition=array(
                                    "race_registeration.event_id"=>$event_id,
                                    "race_registeration.to_show"=>1,
                                    "event_details.start_date >="=>$start_date,
                                    "event_details.start_date <="=>$end_date,
                                    "race_registeration.amoun_status"=>'Paid'
                                );
                    $data['max_date']=$end_date;
                }else{
                    $condition=array(
                                    "race_registeration.event_id"=>$event_id,
                                    "race_registeration.to_show"=>1,
                                    "event_details.start_date ="=>$for_date,
                                );
                    $data['max_date']=date('Y-m-d');
                }
			}else{
				// echo 'For Today';
				$for_date=date('Y-m-d');
                $condition=array(
                                "race_registeration.event_id"=>$event_id,
                                "race_registeration.to_show"=>1,
                                "event_details.start_date ="=>$for_date,
                            );
			}
			$data['for_']=$for_date;
        	
			
		        
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
        		        ->join('event_details','event_details.athlete_id=user_details.user_id')
        		        ->order_by('user_distance','desc')
        		        ->group_by('user_details.user_id')
        		        ->where($condition)
        		        ->get('race_registerati___on')->result();
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
        	$data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    $data['events']=$this->db->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/leader_board_latest');
			$this->load->view('layout/footer');
		}



		public function dailyReports($event_id=""){
			if($this->input->get('event_id')){
		      $event_id=$this->input->get('event_id');
		  }
		    if($event_id!=""){
		        $condition=array(
                		            "race_registeration.event_id"=>$event_id,
                		            "race_registeration.to_show"=>1,
                		            "race_registeration.amoun_status"=>'Paid'
		                        );
		        
		        $reacResult=array();
		        $temp_status=0;
		        $evtDtls=$this->db->where('event_id',$event_id)->get('userevents')->row();
		        $data['event_name']=$evtDtls->event_name;
		        if($evtDtls->result_declared!=1){
		            $data['particpants']=$this->db->select('team_details.team_name, user_details.user_id as api_id ,team_details.team_id, race_registeration.reg_id, 
        		        race_registeration.user_id, race_registeration.created_at as reg_on,race_registeration.event_id, 
        		        user_details.id_table, user_details.d_o_b,user_details.user_email,user_details.firstname,user_details.middle_name ,
        		        user_details.lastname, user_details.sex,event_category.category_name, user_details.contact_no')
        		        ->join('user_details','user_details.id_table=race_registeration.user_id')
        		        ->join('team_details', 'team_details.team_id = race_registeration.team_id', 'left')
        		        ->join('userevents','userevents.event_id=race_registeration.event_id')
        		        ->join('event_category','event_category.category_id=userevents.event_category')
        		        ->order_by('race_registeration.reg_id','desc')
        		        ->where($condition)
        		        ->get('race_registeration')->result();
		            foreach($data['particpants'] as $prcpt){
    		            $soloDistance=$this->getTotalKmCovered($event_id,$prcpt->api_id);
    		            $teamDistance=$this->getTotalKmCoveredForTeam($prcpt->team_id,$event_id);
    		            $totalActitvities=$this->getTotalActivities($event_id,$prcpt->api_id);
    		            $totalEventsKm=$this->totalEventKm($event_id);
    		            $totalTimeTaken=$this->getTotalTimeTaken($event_id,$prcpt->api_id);
    		            $temp_status=1;
    		            $toPush=array(
    		                            "full_name"=>$prcpt->firstname.' '.$prcpt->middle_name.' '.$prcpt->lastname,
    		                            "event_id"=>$event_id,
    		                            "user_id"=>$prcpt->id_table,
    		                            "gender"=>$prcpt->sex,
    		                            "d_o_b"=>$prcpt->d_o_b,
    		                            "token"=>$prcpt->reg_id,
    		                            "distance"=>$soloDistance,
    		                            "team_name"=>$prcpt->team_name,
    		                            "timeTaken"=>$totalTimeTaken,
    		                            "team_distance"=>$teamDistance,
    		                            "total_activities"=>$totalActitvities,
    		                            "totalEventsKm"=>$totalEventsKm
    		                           );
        		          if($this->db->insert('generated_result',$toPush)){
        		              $temp_status=0;
        		          }else{
        		              die(" Failed To Insert Result. ");
        		          }           
    		          //  array_push($reacResult,$toPush );
    		        }
    		        if($temp_status==0){
    		           $this->db->where('event_id',$event_id)->update('userevents', array("result_declared"=>1)) ;
    		        }else{
    		           die(" Something Went Wrong.");
    		        }
		        }else{
		          //  echo ' res';
		          $condition="";
		          if($this->input->get('category')){
        		      $category=$this->input->get('category');
        		      if($category!=0){
        		         
        		             
        		            $current_year=date('Y');
                		    $age_18 = date('Y-m-d',strtotime('-18 year'));
                		    $age_45 = date('Y-m-d',strtotime('-45 year'));
                		    $age_60 = date('Y-m-d',strtotime('-60 year'));
                		    switch($category){
                    		     case 1 : $this->db->where(" `d_o_b` BETWEEN '".$age_45."' AND '".$age_18."'"); $ct_wise='18-45'; break;
                    		     case 2 : $this->db->where(" `d_o_b` BETWEEN '".$age_60."' AND '".$age_45."'"); $ct_wise='45-60'; break;
                    		     case 3 : $this->db->where(" `d_o_b` < '".$age_60."' AND `d_o_b`!='0000-00-00'"); $ct_wise='60+'; break;
                    		     default:  break;
                    		 }
                    		 $data['Cateogory_wise']= $ct_wise;
                    	 
        		          //echo ' Category: '.$category;
    		              //$this->db->where('',);
    		          }else{
    		              echo ' Category: Zero ';
    		          }
        		  }
        		  if($this->input->get('gender')){
        		      $gender=$this->input->get('gender');
        		      if($gender!='all'){
        		          //echo ' Gender: '.$gender;
    		              $this->db->where('gender',$gender);
    		          }else{
    		              //echo ' Gender: All ';
    		          }
        		  }
		          
		          
		            $reacResult=$this->db->where('event_id',$event_id)->order_by('distance','desc')->get('generated_result')->result_array();
		        }
		        
		      //  print_r($reacResult);
		    }else{
		        $reacResult=array();
		    }
		    $data['eventResult']=$reacResult;
		  //  print_r($reacResult);
		  //  die;
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    $data['events']=$this->db->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/leader_boa_rd');
			$this->load->view('layout/footer');
		}
		public function index($event_id=""){
		    $data['Cateogory_wise']='--NA--';
		  //  extract($_GET);
		  //  print_r($_GET);
		  //  die;
		  if($this->input->get('event_id')){
		      $event_id=$this->input->get('event_id');
		  }
		    if($event_id!=""){
		        $condition=array(
                		            "race_registeration.event_id"=>$event_id,
                		            "race_registeration.to_show"=>1,
                		            "race_registeration.amoun_status"=>'Paid'
		                        );
		        
		        $reacResult=array();
		        $temp_status=0;
		        $evtDtls=$this->db->where('event_id',$event_id)->get('userevents')->row();
		        $data['event_name']=$evtDtls->event_name;
		        if($evtDtls->result_declared!=1){
		            $data['particpants']=$this->db->select('team_details.team_name, user_details.user_id as api_id ,team_details.team_id, race_registeration.reg_id, 
        		        race_registeration.user_id, race_registeration.created_at as reg_on,race_registeration.event_id, 
        		        user_details.id_table, user_details.d_o_b,user_details.user_email,user_details.firstname,user_details.middle_name ,
        		        user_details.lastname, user_details.sex,event_category.category_name, user_details.contact_no')
        		        ->join('user_details','user_details.id_table=race_registeration.user_id')
        		        ->join('team_details', 'team_details.team_id = race_registeration.team_id', 'left')
        		        ->join('userevents','userevents.event_id=race_registeration.event_id')
        		        ->join('event_category','event_category.category_id=userevents.event_category')
        		        ->order_by('race_registeration.reg_id','desc')
        		        ->where($condition)
        		        ->get('race_registeration')->result();
		            foreach($data['particpants'] as $prcpt){
    		            $soloDistance=$this->getTotalKmCovered($event_id,$prcpt->api_id);
    		            $teamDistance=$this->getTotalKmCoveredForTeam($prcpt->team_id,$event_id);
    		            $totalActitvities=$this->getTotalActivities($event_id,$prcpt->api_id);
    		            $totalEventsKm=$this->totalEventKm($event_id);
    		            $totalTimeTaken=$this->getTotalTimeTaken($event_id,$prcpt->api_id);
    		            $temp_status=1;
    		            $toPush=array(
    		                            "full_name"=>$prcpt->firstname.' '.$prcpt->middle_name.' '.$prcpt->lastname,
    		                            "event_id"=>$event_id,
    		                            "user_id"=>$prcpt->id_table,
    		                            "gender"=>$prcpt->sex,
    		                            "d_o_b"=>$prcpt->d_o_b,
    		                            "token"=>$prcpt->reg_id,
    		                            "distance"=>$soloDistance,
    		                            "team_name"=>$prcpt->team_name,
    		                            "timeTaken"=>$totalTimeTaken,
    		                            "team_distance"=>$teamDistance,
    		                            "total_activities"=>$totalActitvities,
    		                            "totalEventsKm"=>$totalEventsKm
    		                           );
        		          if($this->db->insert('generated_result',$toPush)){
        		              $temp_status=0;
        		          }else{
        		              die(" Failed To Insert Result. ");
        		          }           
    		          //  array_push($reacResult,$toPush );
    		        }
    		        if($temp_status==0){
    		           $this->db->where('event_id',$event_id)->update('userevents', array("result_declared"=>1)) ;
    		        }else{
    		           die(" Something Went Wrong.");
    		        }
		        }else{
		          //  echo ' res';
		          $condition="";
		          if($this->input->get('category')){
        		      $category=$this->input->get('category');
        		      if($category!=0){
        		         
        		             
        		            $current_year=date('Y');
                		    $age_18 = date('Y-m-d',strtotime('-18 year'));
                		    $age_45 = date('Y-m-d',strtotime('-45 year'));
                		    $age_60 = date('Y-m-d',strtotime('-60 year'));
                		    switch($category){
                    		     case 1 : $this->db->where(" `d_o_b` BETWEEN '".$age_45."' AND '".$age_18."'"); $ct_wise='18-45'; break;
                    		     case 2 : $this->db->where(" `d_o_b` BETWEEN '".$age_60."' AND '".$age_45."'"); $ct_wise='45-60'; break;
                    		     case 3 : $this->db->where(" `d_o_b` < '".$age_60."' AND `d_o_b`!='0000-00-00'"); $ct_wise='60+'; break;
                    		     default:  break;
                    		 }
                    		 $data['Cateogory_wise']= $ct_wise;
                    	 
        		          //echo ' Category: '.$category;
    		              //$this->db->where('',);
    		          }else{
    		              echo ' Category: Zero ';
    		          }
        		  }
        		  if($this->input->get('gender')){
        		      $gender=$this->input->get('gender');
        		      if($gender!='all'){
        		          //echo ' Gender: '.$gender;
    		              $this->db->where('gender',$gender);
    		          }else{
    		              //echo ' Gender: All ';
    		          }
        		  }
		          
		          
		            $reacResult=$this->db->where('event_id',$event_id)->order_by('distance','desc')->get('generated_result')->result_array();
		        }
		        
		      //  print_r($reacResult);
		    }else{
		        $reacResult=array();
		    }
		    $data['eventResult']=$reacResult;
		  //  print_r($reacResult);
		  //  die;
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
		    $data['events']=$this->db->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/report');
			$this->load->view('layout/footer');
		}
		public function gen_report(){
		    extract($_GET);
		    if($event_id!=0){
		        
		    
        		    $current_year=date('Y');
        		    $age_18 = date('Y-m-d',strtotime('-18 year'));
        		    $age_45 = date('Y-m-d',strtotime('-45 year'));
        		    $age_60 = date('Y-m-d',strtotime('-60 year'));
        		  //  echo ' 18: '.$age_18;
        		    
        		  //  die;
        		    
        		    
        		    
        		  //  echo 'Event Id: '.$event_id;
        		  //  $condition=array(
        		                        
        		  //                      "race_registeration.to_show"=>1,
        		  //                      "race_registeration.event_id"=>$event_id,
        		  //                      "user_details.sex"=>$gender,
        		  //                      "race_registeration.amoun_status"=>"Paid"
        		  //                );
        // 		  if($category){
        		      
        // 		  }
        // 		 switch($category){
        // 		     case 1 : $btwn="' BETWEEN '".$age_45."' AND '".$age_18." '"; break;
        // 		     case 2 : $btwn="' BETWEEN ".$age_60." AND ".$age_45." '"; break;
        // 		     case 3 : $btwn="' > ".$age_18."'"; break;
        // 		     default: $btwn=''; break;
        // 		 }
        // 	 echo $btwn;
        // 		 die;
        // echo $btwn;
                    if(!$this->input->get('gender')){
                        $gender='all';
                    }
                    $eventDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
        		  if($gender=='all'){
        		      $condition=array(
        		                      //  "user_details.d_o_b"=>$btwn,
        		                        "race_registeration.to_show"=>1,
        		                        "race_registeration.event_id"=>$event_id,
        		                      //  "event_details.start_date >="=>$eventDetails->event_start_date,
        		                      //  "event_details.start_date <="=>$eventDetails->event_end_date,
        		                        "race_registeration.amoun_status"=>"Paid"
        		                  );
        		  }else{
        		      $condition=array(
        		                      //  "user_details.d_o_b"=>$btwn,
        		                        "race_registeration.to_show"=>1,
        		                        "race_registeration.event_id"=>$event_id,
        		                      //  "event_details.start_date >="=>$eventDetails->event_start_date,
        		                      //  "event_details.start_date <="=>$eventDetails->event_end_date,
        		                      //  "user_details.sex"=>$gender,
        		                        "race_registeration.amoun_status"=>"Paid"
        		                  );
        		  }
        		  //print_r($condition);
        		  ///die/;
        		    $da_one=$this->db
        		            ->select('race_registeration.reg_id,user_details.user_id, user_details.firstname,user_details.middle_name,user_details.lastname')
        		            ->where($condition)
                	       // ->join('race_registeration','race_registeration.user_id=user_details.id_table')
                	        ->join('user_details','user_details.id_table=race_registeration.user_id','left')
                	        ->join('event_details','user_details.user_id=event_details.athlete_id','right')
                        	->group_by('race_registeration.reg_id')
                        	->get('race_registeration')->result();
        		    
        		    
        		    
        		    
        		    
                	   //->select('user_details.id_table, user_details.sex, user_details.d_o_b,user_details.user_id,race_registeration.reg_id as bib,
                	   //   user_details.firstname, user_details.middle_name, user_details.lastname,user_details.user_id,
                	   //   SUM(calculated_data.distance) as use_dist, SUM(event_details.moving_time) as moving_time ,SUM(calculated_data.distance) as use_dist, calculated_data.data_Date, team_details.team_name,calculated_data.dt_id')
                	   //->where($condition)
                	   //->order_by('use_dist','desc')
                	   
                	   //->join('user_details','user_details.user_id=calculated_data.user_id','left')
                	   //->join('race_registeration','race_registeration.user_id=user_details.id_table','left')
                	   //->join('event_details','user_details.user_id=event_details.athlete_id')
                	   //->join('team_details','team_details.team_id=race_registeration.team_id','left')
                	   //->group_by('user_details.user_id')
                	   //->get('calculated_datad')->result();
                    //  $da_one=$this->db
                	   //->select('user_details.id_table, user_details.sex, user_details.d_o_b,user_details.user_id,
                	   //   user_details.firstname, user_details.middle_name, user_details.lastname,user_details.user_id,
                	   //   SUM(event_details.distance) as use_dist, SUM(event_details.moving_time) as moving_time, calculated_data.data_Date, team_details.team_name,calculated_data.dt_id')
                	   //->where($condition)
                	   //->order_by('use_dist','desc')
                	   //->join('user_details','user_details.user_id=event_details.athlete_id')
                	   //->join('calculated_data','calculated_data.user_id=user_details.user_id')
                	   
                	   //->join('race_registeration','race_registeration.user_id=user_details.id_table','left')
                	   //->join('team_details','team_details.team_id=race_registeration.team_id','left')
                	   //->group_by('user_details.user_id')
                	   //->get('event_details')->result();
                	   
                	   //print_r($da_one);
                	   //die;
                	   //echo '<table>';
                	   $i=1;
                	   $ude=array();
                	   foreach($da_one as $d){
                	       
                	       // echo '<tr>';
                	       // echo '<td>'.$i.'</td>';
                	       // echo '<td>'.$d->firstname.' '.$d->middle_name.' '.$d->lastname.'</td>';
                	       // echo '<td>'.$d->use_dist.'</td>';
                	       // echo '</tr>';
                	        array_push($ude,array('data'=>$d,'rank'=>$i));
                	        $i++;
                	   }
                	   //echo '</table>';
                	   $data['evDdat']=$ude;
                	   //print_r($data['evDdat']);
                	   //die;
                	   $data['raceData']=$da_one;
		    }else{
		        echo 'dfdfdf';
		        $data['evDdat']=array();
		    }
		    print_r($data['raceData']);
		    die;
        	    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
    		    $data['events']=$this->db->get('userevents')->result();
    			$this->load->view('layout/header',$data);
    			$this->load->view('pages/newReport');
    			$this->load->view('layout/footer');
        	  
        	   //print_r($ude);
        	   //die(json_encode(array("code"=>$da_one)));
		  //  if(){
		        
		  //  }
		}
		
		public function getTotalKmCovered($event_id,$api_id){
		    $evtDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
		    $startDate=$evtDetails->event_start_date;
		    $endDate=$evtDetails->event_end_date;
		    $de=$this->db->query("select SUM(distance) as distance from event_details where start_date BETWEEN '$startDate' AND '$endDate' AND athlete_id='$api_id'")->result();
		  //  print_r($de);
		  //  $evtArray=$this->db->where("start_date BETWEEN '$startDate' AND '$endDate' AND athlete_id='$api_id' ")->get('event_details')->result();
		  //  $distance=0;
		  //  foreach($evtArray as $evt){
		  //      $distance+=$evt->distance;
		  //  }
		    return $de[0]->distance;
		}
		public function getTotalActivities($event_id,$api_id){
		    $evtDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
    		$startDate=$evtDetails->event_start_date;
    		$endDate=$evtDetails->event_end_date;
    		$evtArray=$this->db->where("start_date BETWEEN '$startDate' AND '$endDate' AND athlete_id='$api_id' ")->get('event_details')->result();
		    return count($evtArray);
		}
		public function getTotalTimeTaken($event_id,$api_id){
		    $evtDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
		    $startDate=$evtDetails->event_start_date;
		    $endDate=$evtDetails->event_end_date;
		    $de=$this->db->query("select SUM(moving_time) as moving_time from event_details where start_date BETWEEN '$startDate' AND '$endDate' AND athlete_id='$api_id'")->result();
            return $de[0]->moving_time;
		}
		public function getTotalKmCoveredForTeam($team_id,$event_id){
		    $evtDetails=$this->db->where('event_id',$event_id)->get('userevents')->row();
    		    $startDate=$evtDetails->event_start_date;
    		    $endDate=$evtDetails->event_end_date;
		    $condition=array(
		                           "race_registeration.team_id"=>$team_id
		                    );
		  
		    $result=$this->db->where($condition)
		    ->select('user_details.firstname, user_details.middle_name, user_details.lastname, user_details.user_id as api_id')
		    ->join('user_details','user_details.id_table=race_registeration.user_id')
		    ->get('race_registeration')->result();
		    $distance=0;
		    
		    
		    
		    foreach($result as $res){
		        $de=$this->db->query("select SUM(distance) as distance from event_details where start_date BETWEEN '$startDate' AND '$endDate' AND athlete_id='$res->api_id'")->result();
		        $distance+=$de[0]->distance;
    		  //  $evtArray=$this->db->where("start_date BETWEEN '$startDate' AND '$endDate' AND athlete_id='$res->api_id' ")->get('event_details')->result();
    		  //  foreach($evtArray as $evt){
    		  //      $distance+=$evt->distance;
    		  //  }
    		  //  echo ' Distance covered by '.$res->firstname.': '.$distance;
		    }
		    return $distance;
		  //  print_r($distance);
		  //  echo ' *************** ';
		}
		
		public function totalEventKm($event_id){
		    $condition=array(
		                        "race_registeration.event_id"=>$event_id,
		                        "race_registeration.to_show"=>1,
		                        "race_registeration.amoun_status"=>'Paid'
		                    );
		    $result=$this->db->where($condition)
		    ->select('user_details.firstname, user_details.lastname, user_details.user_id as api_id')
		    ->join('user_details','user_details.id_table=race_registeration.user_id')
		    ->get('race_registeration')->result();
		  //  print_r($result);
		    $totalDistance=0;
		  $t=0;
		    foreach($result as $users){
		      //  echo ' S.No: '.$t.' || Distance: '.$this->getTotalKmCovered($event_id,$users->api_id).' Usere : '.$users->firstname.' '.$users->lastname;
		       $t++; 
		       $totalDistance+=$this->getTotalKmCovered($event_id,$users->api_id);
		    }
		  //  echo ' Total Distance Covered: '.$totalDistance;
		    return $totalDistance;
		}
		public function getResult($event=""){
		  $ddd= array(
                    array(
                            'full_name' => 'RAVI  SHARMA',
                            'gender' =>'' ,
                            'token' => 187,
                            'distance' => 0,
                            'team_name' => 'Mustang',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Vaishali  Sharma',
                            'gender' => 'Female',
                            'token' => '186',
                            'distance' => 0,
                            'team_name' => 'Mustang',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Uma  Ramamurthy',
                            'gender' => '',
                            'token' => 178,
                            'distance' => 0,
                            'team_name' => 'Solo',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Harish  Lakshmi',
                            'gender' => '',
                            'token' => 176,
                            'distance' => 0,
                            'team_name' => 'Solo',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Rakesh  Chawat',
                            'gender' => '',
                            'token' => 173,
                            'distance' => 96321,
                            'team_name' => 'Mustang',
                            'total_activities' => 17
                        ),
                    array(
                            'full_name' => 'V  Avinash',
                            'gender' => 'Male',
                            'token' => 172,
                            'distance' => 102773,
                            'team_name' => 'BCY_TriClub  Gurgaon',
                            'total_activities' => 18
                        ),
                    array(
                            'full_name' => 'Deb Ann Spicer',
                            'gender' => '',
                            'token' => 171,
                            'distance' => 0,
                            'team_name' => 'Solo',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Deepak Derebail Subramanya',
                            'gender' => 'Male',
                            'token' => 168,
                            'distance' => 25332,
                            'team_name' => 'Mustang',
                            'total_activities' => 17
                        ),
                    array(
                            'full_name' => 'Sachin S Darak',
                            'gender' => 'Male',
                            'token' => 167,
                            'distance' => 0,
                            'team_name' => 'blueBRIGADE Running Club Pune',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Aparna  prabhudesai',
                            'gender' => '',
                            'token' => 166,
                            'distance' => 0,
                            'team_name' => 'blueBRIGADE Running Club Pune',
                            'total_activities' => 0
                        ),
                    array(
                            'full_name' => 'Akshay Chandrashekhar  Aiyar',
                            'gender' => 'Male',
                            'token' => 164,
                            'distance' => 225132,
                            'team_name' => 'blueBRIGADE Running Club Pune',
                            'total_activities' => 19
                        )
                );
                // $this->sortting($ddd);
                uasort( $ddd, $this->priceCmp );
        foreach ( $ddd as $key => $val )
             print "$key: $val[distance]<BR>\n";
                //   $test_array = array(3, 0, 2, 5, -1, 4, 1);
                // echo "Original Array :\n";
                // echo implode(', ',$test_array );
                // echo "\nSorted Array\n:";
                // echo implode(', ',$this->bubble_Sort($test_array)). PHP_EOL;
		    
		}
		public function bubble_Sort($my_array){
        	do{
        		$swapped = false;
        		for( $i = 0, $c = count( $my_array ) - 1; $i < $c; $i++ ){
        			if( $my_array[$i] > $my_array[$i + 1] ){
        				list( $my_array[$i + 1], $my_array[$i] ) =
        						array( $my_array[$i], $my_array[$i + 1] );
        				$swapped = true;
        			}
        		}
        	}
        	while( $swapped );
        return $my_array;
        }
        public function priceCmp($a, $b){
           
           if  ( $a[price] == $b[price] )
                return 0;
           if  ( $a[price] < $b[price] )
                 return -1;
           return 1;
      
        
       }
	}
	

?>