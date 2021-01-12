<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller {
    function __construct(){
        parent:: __construct();
        $this->load->model('UserModel','USERM');
    }
    // public function usd_to_inr(){
    //     $amount = 1.00;
    //     $from_Currency = 'USD';
    //     $to_Currency = 'INR';
    //     $amount = urlencode($amount);
    //     $from_Currency = urlencode($from_Currency);
    //     $to_Currency = urlencode($to_Currency);
    //     $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
    //     $get = explode("<span class=bld>",$get);
    //     $get = explode("</span>",$get[1]);
    //     echo $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);
    // }
    public function currentLocation(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        print_r($details);
        echo $details->city; // -> "Mountain View"

    }
    public function checkForEventExpir(){
		  $countAr=$this->db->get('test')->row();
		  //print_r($countAr);
		  $count =$countAr->count_ + 1;
		  $this->db->where('id',1)->update('test',array('count_'=>$count));
		  date_default_timezone_set("UTC");
		 echo  $end_date=date('Y-m-d h:i');
		  
		  $condition=array('event_end_date='=>$end_date);
		  $response=$this->db->where($condition)->get('userevents')->result();
		  die(json_encode($response));
		    
	}
	public function getUserDataFromStrava(){
	   $regUser=$this->db->select('user_details.user_id as uId,user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')->join('user_details','user_details.id_table=race_registeration.user_id')->get('race_registeration')->result();
	   $i=1;
	   foreach($regUser as $user){
	       //echo $i;
	       //print_r($user);
	       //echo '---------------------------------------------------------------------------------------------------------------------';
	       $userId=$user->uId;
	       $access_token=$user->access_token;
	       $refresh_token=$user->refresh_token;
	       
	       if($userId!="" && $refresh_token!=""){
	           //echo ' User Id: '.$userId;
	           //$resPonse=$this->getAthleteStats($userId,$access_token);
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
    			$result = curl_exec($curl);
    			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);      
    	        /* execute request */
    	        
    	       // return $result;
    	        
    	        if($httpcode==200){
    	           // echo ' === Works Fine === ';
    	           // print_r(json_decode($result));
    	           $result=json_decode($result);
    	            $allRide=$result->all_ride_totals;
    	            $allSwim=$result->all_swim_totals;
    	            $allRun=$result->all_run_totals;
    	            $dataToAdd=array(
    	                            "user_id"=>$userId,
    	                            "all_ride"=>$allRide->distance,
    	                            "all_swim"=>$allSwim->distance,
    	                            "all_run"=>$allRun->distance
    	                        );
    	           //echo ' All Ride Total: '.$allRide->distance;
    	           //echo ' All Swim Total: '.$allSwim->distance;
    	           //echo ' All Run Total: '.$allRun->distance;
    	           
    	           
    	        }else{
    	            echo '  Access Code Expired. ';
    	           // echo '   Asking For Access Code Expired. '.$refresh_token;
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
    	           // $der=$this->getNewAccessToken($refresh_token);
    	           // print_r($result);
    	            if($httpcode==200){
    	                $toUpdate=array(
    	                                   "token_type"=>$result->token_type,
    	                                   "access_token"=>$result->access_token,
    	                                   "expires_at"=>$result->expires_at,
    	                                   "expires_in"=>$result->expires_in,
    	                                   "refresh_token"=>$result->refresh_token,
    	                                   
    	                                   );
    	               //echo ' || ';
    	               //print_r($toUpdate);
    	               $condition=array("user_id"=>$userId);
    	               //echo ' || ';
    	               //print_r($condition);
    	               //echo ' || ';
    	               
    	               if($this->db->where($condition)->update('user_details',$toUpdate)){
    	                   echo '   Access Token Updated ';
    	                   //$this->getUserDataFromStrava();
    	                   $access_token=$this->db->where('user_id',$userId)->get('user_details')->row();
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
                			         'Authorization: Bearer '.$access_token->access_token
                			    ),
                			));
                			$result = curl_exec($curl);
                			$result=json_decode($result);
                			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                			print_r($result);
                // 			echo $httpcode;
            	           // $allRide=$result->all_ride_totals;
            	           // $allSwim=$result->all_swim_totals;
            	           // $allRun=$result->all_run_totals;
            	           // $dataToAdd=array(
            	           //          "user_id"=>$userId,
    	                   //         "all_ride"=>$allRide->distance,
    	                   //         "all_swim"=>$allSwim->distance,
    	                   //         "all_run"=>$allRun->distance
    	                   //     );
                			 
    	               }
    	               //$this->getUserDataFromStrava();
    	            }
    	            
    	            
    	            //User Data To insert
    	           // INSERT INTO `athlete_data`(`data_id`, `user_id`, `all_ride`, `all_run`, `all_swim`, `inserted_at`) 
    	            
    	            
    	            
    	            
    	            
    	           // $re=$this->db->select('user_details.user_email')->where('user_id',$userId)->get('user_details')->row();
    	           // $toUpdate=array("access_token"=>$der->access_token);
    	           // print_r($toUpdate);
    	         
    	           // print_r($re);
    	          
    	        }
    	       // echo json_encode($dataToAdd);
    	       //print_r($dataToAdd);
    	        $this->db->insert('athlete_data',$dataToAdd);
    	       // echo '<br>';
    	       // echo ' ------------------------------------------------------------------------------------------------------';
    	       // print_r($dataToAdd);
	           curl_close($curl);
	           //echo  ' ************************************************************************************************************************ ';
	       }
	       $i++;
	   }
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
	       
	          return $result;  
	         // print_r($result);  
	        /* close cURL resource */
	        curl_close($ch);
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
	        curl_close($curl);
		}
	public function temRegistration(){
	   // die(json_encode($_POST));
	   // print_r($_POST);
	   // Array ( [event_name] => Earth Matters 
	   // [event_id] => 4 
	   // [first_name] => Lakda 
	   // [mid_name] => global 
	   // [last_name] => Nagendran 
	   // [participant_email] => self@gmail.com 
	   // [country_code_] => +91 
	   // [phone_no] => 23423423 
	   // [teamname_] => 1 
	   // [team_name] => )
	    $userData=$this->db->where('user_email',$this->input->post('participant_email'))->get('user_details')->result();
	   // print_r($userData);
	   // die;
	    if(count($userData)==0){
	        
	        if($this->registerNewUser($_POST)==1){
	            $userDetails__=$this->db->where('user_email',$this->input->post('participant_email'))->get('user_details')->row();
	            if($this->input->post('team_id')){
                    $team_name=$this->input->post('team_name');
                    $newTeam=array("team_name"=>$team_name,"team_creater"=>$userDetails__->id_table);
                    if(count($this->db->where($newTeam)->get('team_details')->result())==0){
                        $this->db->insert('team_details',$newTeam);
                        $team_id=$this->db->insert_id();
                    }
                }else{
                    $team_id=$this->input->post('teamname_');
                }
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
                $eventCategory=$eventDetails->event_category;
                	$toAdd=array(
                            "user_id"=>$userDetails__->id_table,
                            "event_id"=>$this->input->post('event_id'),
                            "team_id"=>$team_id,
                            "amount_to_pay"=>$totalAmount,
                            
                        );
                        // print_r($toAdd);
                        $condition=array(
                            "user_id"=>$userDetails__->id_table,
                            "event_id"=>$this->input->post('event_id'),
                        );
                        // print_r($condition);
                        
                        
                        if(count($this->db->where($condition)->get('race_registeration')->result())==0){
                            if($this->db->insert('race_registeration',$toAdd)){
                                $regData=$this->db->where('reg_id',$this->db->insert_id())->get('race_registeration')->row();
                              //  echo 'Registered Successfully';
                              $msg="Proceed To Payment.";
                              $code=1;
                                // $this->session->set_flashdata('reg_msg','Registered Successfully');
                            }else{
                                $code=0;
                                $regData=array();
                              //  echo 'Failed';
                              $msg="Registration Failed.";
                                // $this->session->set_flashdata('reg_msg','Registration Failed');
                            }
                        }else{
                            $code=2;
                            $regData=$this->db->where($condition)->get('race_registeration')->row();
                            $msg="Already Registered For this Event.";
                            // $this->session->set_flashdata('reg_msg','Already Registered.');
                          //  echo 'Data Already Exists.';
                        }
                die(json_encode(array("code"=>$code,"msg"=>$msg,"path"=>"Success","regData"=>$regData)));
	        }else{
	            die(json_encode(array("code"=>500,"msg"=>"Something Went Wrong")));
	        }
	        
	       // die(json_encode(array("code"=>12,"msg"=>"Register For Account","path"=>$_POST)));
	    }else{
	        $userDetails__=$userData[0];
	        if($this->input->post('team_id')){
                $team_name=$this->input->post('team_name');
                $newTeam=array("team_name"=>$team_name,"team_creater"=>$userDetails__->id_table);
                if(count($this->db->where($newTeam)->get('team_details')->result())==0){
                    $this->db->insert('team_details',$newTeam);
                    $team_id=$this->db->insert_id();
                }
            }else{
                $team_id=$this->input->post('teamname_');
            }
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
            $eventCategory=$eventDetails->event_category;
            	$toAdd=array(
                        "user_id"=>$userDetails__->id_table,
                        "event_id"=>$this->input->post('event_id'),
                        "team_id"=>$team_id,
                        "amount_to_pay"=>$totalAmount,
                        
                    );
                    // print_r($toAdd);
                    $condition=array(
                        "user_id"=>$userDetails__->id_table,
                        "event_id"=>$this->input->post('event_id'),
                    );
                    // print_r($condition);
                    
                    
                    if(count($this->db->where($condition)->get('race_registeration')->result())==0){
                        if($this->db->insert('race_registeration',$toAdd)){
                            $regData=$this->db->where('reg_id',$this->db->insert_id())->get('race_registeration')->row();
                          //  echo 'Registered Successfully';
                          $msg="Proceed To Payment.";
                          $code=1;
                            // $this->session->set_flashdata('reg_msg','Registered Successfully');
                        }else{
                            $code=0;
                            $regData=array();
                          //  echo 'Failed';
                          $msg="Registration Failed.";
                            // $this->session->set_flashdata('reg_msg','Registration Failed');
                        }
                    }else{
                        $code=2;
                        $regData=$this->db->where($condition)->get('race_registeration')->row();
                        $msg="Already Registered For this Event.";
                        // $this->session->set_flashdata('reg_msg','Already Registered.');
                      //  echo 'Data Already Exists.';
                    }
            die(json_encode(array("code"=>$code,"msg"=>$msg,"path"=>"Success","regData"=>$regData)));
	    }
	    
	}
	public function paypalLink($reg_id){
	    redirect('Paypal/buy/'.$reg_id);
	}
	public function payumoney($reg_id){
		    $ip = $_SERVER['REMOTE_ADDR'];
        // $ip ="77.99.179.98";
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $condition=array(
		                        "race_registeration.reg_id"=>$reg_id,
		                    );
		    $data['eventData']=$this->db->join('race_registeration','race_registeration.event_id=userevents.event_id')->join('user_details','user_details.id_table=race_registeration.user_id')->where($condition)->get('userevents')->row();
        if($details->country=='IN'){
            
    		$this->load->view('pages/pay_u',$data);
        }else{
            // echo 'Internation Payment';
            redirect('Paypal/buy/'.$reg_id);
            // $this->load->view('pages/payMentPage',$data);
        }
		  //  $condition=array(
		  //                      "race_registeration.reg_id"=>$reg_id,
		                       
		                        
		  //                  );
		  //  $data['eventData']=$this->db->join('race_registeration','race_registeration.event_id=userevents.event_id')->join('user_details','user_details.id_table=race_registeration.user_id')->where($condition)->get('userevents')->row();
		  ////  $data['userData']=$this->db->where('id_table',$data['eventData']->user_id)->get('user_details')->row();
		 
		  ////  print_r($data['eventData']);
		  ////  die(json_encode($data['eventData']));
		  ////  $data['userSessionData']=unserialize($this->session->userdata('userData'));
    // 		$this->load->view('pages/pay_u',$data);
    	}
    public function registerNewUser($POST){
        
        	$data=array(
                    	    "firstname"=>$POST['first_name'],
                    	    "middle_name"=>$POST['mid_name'],
                    	    "lastname"=>$POST['last_name'],
							"username"=>$POST['participant_email'],
							"user_email"=>$POST['participant_email'],
							"contact_no"=>$POST['country_code_'].'-'.$POST['phone_no'],
							"user_password"=>base64_encode($POST['user_password']),
							"user_type"=>1,
						);
			$res=$this->USERM->createUserAccount($data);
			switch ($res) {
				case 0:
				    $msg="Failed To Register.";
				    $usrData=array();
				    $code=0;
				// 	$this->session->set_flashdata('err','');

					break;
				case 1:
				    $msg="Registered Successfully.";
				    $usrData=$this->db->where('id_table',$this->db->insert_id())->get('user_details')->row();
				    $code=1;
				// 	$this->session->set_flashdata('msg','Registered Successfully.');
					break;
				case 2:
				    $msg="Email Id already Exists.";
				    $usrData=array();
				    $code=2;
				// 	$this->session->set_flashdata('err','Email Id already Exists.');
					break;
				default:
				    $msg="Server Not Found.";
				    $usrData=array();
				    $code=3;
				// 	$this->session->set_flashdata('err','Server Not Found');
					break;
			}
			return $code;
// 			die(json_encode(array("code"=>$code,"msg"=>$msg,"data"=>$usrData)));
    }
    public function userLoginValidate(){
			// print_r($_POST);
			$condition=array(
								"user_email"=>$this->input->post('user_email'),
								"user_password"=>base64_encode($this->input->post('user_pwd')),

							);
			$res=$this->USERM->userLoginValidate($condition);
			if($res){
				$sessionData=unserialize($this->session->userdata('userData'));
				die(json_encode(array("code"=>1,"data"=>$sessionData)));
				
			}else{
			    die(json_encode(array("code"=>0)));
				// redirect('userLogin');
			}
		}
    public function response(){
        $this->load->view('pages/pay_response');
        
    }
    public function payment($reg_id){
        // $ip = $_SERVER['REMOTE_ADDR'];
        $ip ="77.99.179.98";
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $condition=array(
		                        "race_registeration.reg_id"=>$reg_id,
		                    );
		    $data['eventData']=$this->db->join('race_registeration','race_registeration.event_id=userevents.event_id')->join('user_details','user_details.id_table=race_registeration.user_id')->where($condition)->get('userevents')->row();
        if($details->country=='IN'){
            
    		$this->load->view('pages/pay_u',$data);
        }else{
            // echo 'Internation Payment';
            redirect('Paypal/buy/'.$reg_id);
            // $this->load->view('pages/payMentPage',$data);
        }
    }
    
	public function getParticipantList(){
		    $data=$this->db->where('event_id',$this->input->post('event_id'))->get('race_registeration')->result();
		    die(json_encode(array("data"=>$data)));
	}
	public function viewEventDescription($eventId){
			$condition=array(
								"event_details.event_id"=>$eventId,
								// "userevents.event_start_date>="=>date('Y-m-d')
							);
			$data['teams']=$this->db->get('team_details')->result();
			// $data['description']=$this->db->join('user_details','event_details.athlete_id=user_details.user_id')->where($condition)->get('event_details')->row();
			$data['description']=$this->db->where('event_id',$eventId)->get('userevents')->row();
			
            if($this->session->userdata('userData')){
                $data['userSessionData']=unserialize($this->session->userdata('userData'));
            }else{
                $data['userSessionData']=array();
            }
//  
// 			$this->load->view('layout/headerUser',$data);
// 			$this->load->view('pages/tempEventDesc',$data);
            $this->load->view('pages/newRegForm',$data);
// 			$this->load->view('layout/footerUser');
		}
    public function googleLogin(){
        // print_r($_POST);
        // `user_details`( `user_type`, `profile_picture`, `google_id`, `fb_id`, `sign_up_type`,
        // `resource_state`, `firstname`, `lastname`, `user_email`, `user_password`, `login_type`, 
        // `token_type`, `expires_at`, `expires_in`, `refresh_token`, `access_token`, `total_distance_covered`,
        // `total_elevation_gain`, `longest_ride`, `city`, `state`, `country`, `sex`, `premium`, `summit`, 
        // `created_at`, `profile_medium`, `profile`, `friend`, `follower`, `data_updated_at`, `data_inserted_at`)
        // Array
        // (
        //     [id] => 113254395711876641347
        //     [name] => global racer
        //     [image] => https://lh4.googleusercontent.com/-WOz2V--Qw3M/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclo4ts32F_3xKZRl8Dxh6bk5t3yLA/s96-c/photo.jpg
        //     [email] => globalracer2020@gmail.com
        // )
        $nameArr=explode(" ",$this->input->post('name'));
        $userData=array(
                           "user_email"=>$this->input->post('email'),
                           "sign_up_type"=>2,
                           "profile_picture"=>$this->input->post('image'),
                           "firstname"=>$nameArr[0],
                           "lastname"=>$nameArr[1],
                           "google_id"=>$this->input->post('id'),
                          
                        );
        // print_r($userData);
        $condition=array("user_email"=>$this->input->post('email'),"google_id"=>$this->input->post('id'));
        // print_r($condition);
        $checkForExistence=$this->db->where($condition)->get('user_details')->result();
        if(count($checkForExistence)==0){
            // echo 'Insert Data into session and DB';
            if($this->db->insert('user_details',$userData)){
                // echo ' Data Inserted';
                $uData=$this->db->where($condition)->get('user_details')->result();
                // userData?
                $this->session->set_userdata('userData',serialize($uData));
                die(json_encode(array("code"=>1,"msg"=>"Data Inserted", "type"=>"Normal")));
            }else{
            //   echo 'Failed To Insert';  
            }
        }else{
            // echo 'Create Sesssion and Redirect';
            $this->session->set_userdata('userData',serialize($checkForExistence));
            die(json_encode(array("code"=>1,"msg"=>"Data Inserted", "type"=>$checkForExistence[0]->user_type)));
        }

    }
		public function getCode(){
			$code=$_GET['code'];
// 			$response=$this->getDataUsingCode($code);
		    $url = 'https://www.strava.com/oauth/token';
			$ch = curl_init($url);
        	/* Array Parameter Data */
	        $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'code'=>$code, 'grant_type'=>'authorization_code'];
	        /* pass encoded JSON string to the POST fields */
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	        /* set the content type json */
	        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
	        /* set return type json */
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        /* execute request */
	        $result = curl_exec($ch);
	           $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	        /* close cURL resource */
	        curl_close($ch);
// 			die;
            $response=$result;
            // die($response);
            if($httpcode==200){
                $insStatus=$this->addData($response);
    			switch ($insStatus) {
    				case 0:
    				// 	echo 'Failed to Insert.';
    					$this->session->set_flashdata('msg','Failed to Connect.');
    					break;
    				case 1:
    				// 	echo 'Inserted Successfully.';
    				    $this->session->set_flashdata('msg','Connected Successfully.');
    					break;
    				case 2:
    				// 	echo 'Data Already Exists.';
    					if($this->updateUserData($response)){


                            
    						$this->session->set_flashdata('msg','Connected Successfully, Access Token Updated.');
    					}else{
    						$this->session->set_flashdata('msg','Connected Successfully, Failed To Update Access Token.');
    					}
    					
    				// 	print_r($response);
    					break;
    				default:
    				// 	echo 'Some Thing Went Wrong';
    					$this->session->set_flashdata('msg','Some Thing Went Wrong');
    					break;
    			}
            }else{
                $this->session->set_flashdata('msg','Access Code Expired, Try Again');
            }
			
			redirect('User/APIConnection');
		}
		public function getDataUsingCode($code){
			// curl -X POST https://www.strava.com/oauth/token \
			// -F client_id=YOURCLIENTID \
			// -F client_secret=YOURCLIENTSECRET \
			// -F code=AUTHORIZATIONCODE \
			// -F grant_type=authorization_code
			$url = 'https://www.strava.com/oauth/token';
			$ch = curl_init($url);
        	/* Array Parameter Data */
	        $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'code'=>$code, 'grant_type'=>'authorization_code'];
	        /* pass encoded JSON string to the POST fields */
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	        /* set the content type json */
	        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
	        /* set return type json */
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        /* execute request */
	        $result = curl_exec($ch);
	           
	        /* close cURL resource */
	        curl_close($ch);
	        return $result; 
		}
		public function updateUserData($data_){
			$data_=json_decode($data_);
			// print_r($data_);
			$sessionData=unserialize($this->session->userdata('userData'));
		    $email=$sessionData[0]->user_email;
        		
			$athleteData=$data_->athlete;
			$userData=array(
								"token_type"=>$data_->token_type,
								"connection_type"=>2,
								"user_id"=>$athleteData->id,
								"expires_at"=>$data_->expires_at,
								"expires_in"=>$data_->expires_in,
								"refresh_token"=>$data_->refresh_token,
								"access_token"=>$data_->access_token,
								"resource_state"=>$athleteData->resource_state,
							);
            
            $tokenDetails=array(
                                    "user_id"=>$athleteData->id,
                                    "user_email"=>$email,
                                    "token_type"=>$data_->token_type,
                                    "expires_at"=>$data_->expires_at,
                                    "expires_in"=>$data_->expires_in,
                                    "refresh_token"=>$data_->refresh_token,
                                    "access_token"=>$data_->access_token,
                                    "data_updated_at"=>date('Y-m-d h:i:s A'),
                                );

			if($this->db->where('user_email',$email)->update('user_details',$userData)){
                $alr=$this->db->where('user_email',$email)->get('token_details')->result();
                if(count($alr)==0){
                    $this->db->insert('token_details',$tokenDetails);
                }else{
                    $this->db->where('user_email',$email)->update('token_details',$tokenDetails);
                }
				return 1;
			}else{
				return 0;
			}
			
		}
		public function addData($data){
			$data_=json_decode($data);
// 			die(json_encode($data_));
			$athleteData=$data_->athlete;
			$sessionData=unserialize($this->session->userdata('userData'));
		    $email=$sessionData[0]->user_email;
			$userData=array(
								"token_type"=>$data_->token_type,
								"expires_at"=>$data_->expires_at,
								"expires_in"=>$data_->expires_in,
								"refresh_token"=>$data_->refresh_token,
								"access_token"=>$data_->access_token,

								"user_id"=>$athleteData->id,
								"username"=>$athleteData->username,
								"resource_state"=>$athleteData->resource_state,
								
								"premium"=>$athleteData->premium,
								
								"profile_medium"=>$athleteData->profile_medium,
								"profile"=>$athleteData->profile,
								"friend"=>$athleteData->friend,
								"follower"=>$athleteData->follower,
							);
			// print_r($userData);
			if(count($this->db->where('user_email',$email)->get('user_details')->result())==0  ){
				if($this->db->insert('user_details',$userData)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
		public function getAthleteData($access_token){
		 	$url = 'https://www.strava.com/api/v3/athlete';
   
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
			            
	        /* execute request */
	        $result = curl_exec($curl);
	        // print_r($result);     
	        /* close cURL resource */
	        curl_close($curl);

		}
		public function disconnectStrava(){
			$userSessionData=unserialize($this->session->userdata('userData'));
			$user_id=$userSessionData[0]->id_table;
			
			$url = 'https://www.strava.com/oauth/deauthorize';
			$ch = curl_init($url);
        	/* Array Parameter Data */
	        $data = ['access_token'=>$userSessionData[0]->access_token];
	        /* pass encoded JSON string to the POST fields */
	        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	        /* set the content type json */
	        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
	        /* set return type json */
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        /* execute request */
	        $result = curl_exec($ch);
	           $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
	        /* close cURL resource */
	        curl_close($ch);
	       // print_r
	        
			$toUpdate=array("connection_type"=>1,"refresh_token"=>null,"access_token"=>null);
			if($this->db->where('id_table',$user_id)->update('user_details',$toUpdate)){
				$this->session->set_flashdata('msg','Disconnected.');
			}else{
				$this->session->set_flashdata('msg','Failed to Disconnect.');
			}
			redirect('User/APIConnection');
		}
		// public function getMYEvents(){
		// 	$userSessionData=unserialize($this->session->userdata('userData'));
		// 	$user_id=$userSessionData[0]->id_table;
		// 	if($userData=$this->db->where('id_table',$user_id)->get('user_details')->row()){
		// 		print
		// 		// $this->getAthleteEvents($id,$access_token);
		// 	}else{
		// 		$this->session->set_flashdata('msg','No User Found');
		// 	}
			
		// }

		public function getAthleteEvents($id,$access_token){
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
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);      
	        /* execute request */
	        $result = curl_exec($curl);
	        $insStatus=$this->insertEvent($result);
	        switch ($insStatus) {
				case 0:
					echo 'Failed to Insert.';
					break;
				case 1:
					echo 'Inserted Successfully.';
					break;
				case 2:
					echo 'Data Already Exists.';
					break;
				default:
					echo 'Some Thing Went Wrong';
					break;
			}  
	        /* close cURL resource */
	        curl_close($curl);
		}
		public function insertEvent($data){
			$eventDetailArray=json_decode($data);
			// 
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
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
			}
			
		}
		
		public function updateUserAccessToken($data){
			// {"token_type":"Bearer","access_token":"234a7f861a217e38dcba146a66b6dcd752908ec5","expires_at":1603110622,"expires_in":20026,"refresh_token":"db1fea7be6052eaca33ec457158b2426ac2787d5"}
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
}
