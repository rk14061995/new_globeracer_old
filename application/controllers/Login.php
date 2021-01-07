<?php
	/**
	 * 
	 */
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('API_Model','API');
			$this->load->model('UserModel','USERM');
			// $this->load->library('encrypt');
		}
		public function test(){
			$this->load->view('pages/test');
		}
		public function getCode(){
			$code=$_GET['code'];
			$response=$this->getDataUsingCode($code);
			// print_r($response);
			$insStatus=$this->addData($response);
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
	         return $result;    
	        /* close cURL resource */
	        curl_close($ch);
		}
		public function addData($data){
			$data_=json_decode($data);
			// print_r($data_);
			// echo $data_->token_type;
			$athleteData=$data_->athlete;

			// print_r($athleteData->id);
			// die;
			// INSERT INTO `user_details`(`id_table`, `user_id`, `username`, `resource_state`, `firstname`, `lastname`, `token_type`, `expires_at`, `expires_in`, `refresh_token`, `access_token`, `city`, `state`, `country`, `sex`, `premium`, `summit`, `created_at`, `profile_medium`, `profile`, `friend`, `follower`)
			$userData=array(
								"token_type"=>$data_->token_type,
								"expires_at"=>$data_->expires_at,
								"expires_in"=>$data_->expires_in,
								"refresh_token"=>$data_->refresh_token,
								"access_token"=>$data_->access_token,

								"user_id"=>$athleteData->id,
								"username"=>$athleteData->username,
								"resource_state"=>$athleteData->resource_state,
								"firstname"=>$athleteData->firstname,
								"lastname"=>$athleteData->lastname,
								
								"city"=>$athleteData->city,
								"state"=>$athleteData->state,
								"country"=>$athleteData->country,
								"sex"=>$athleteData->sex,
								"premium"=>$athleteData->premium,
								"summit"=>$athleteData->summit,
								"created_at"=>$athleteData->created_at,
								"profile_medium"=>$athleteData->profile_medium,
								"profile"=>$athleteData->profile,
								"friend"=>$athleteData->friend,
								"follower"=>$athleteData->follower,
							);
			// print_r($userData);
			if(count($this->db->where('user_id',$athleteData->id)->get('user_details')->result())==0  ){
				if($this->db->insert('user_details',$userData)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
		public function getAthleteData(){
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
			         'Authorization: Bearer d11aad26c5db0fc67dfe0675b20443c432f63496'
			    ),
			));
			            
	        /* execute request */
	        $result = curl_exec($curl);
	        // print_r($result);     
	        /* close cURL resource */
	        curl_close($curl);
			
	        // if(){

	        // }
		}
		public function getAthleteEvents(){
			 // http GET "https://www.strava.com/api/v3/activities/{id}?include_all_efforts=" "Authorization: Bearer [[token]]"
			$url = 'https://www.strava.com/api/v3/activities?id=69818594';
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
			         'Authorization: Bearer d11aad26c5db0fc67dfe0675b20443c432f63496'
			    ),
			));
			            
	        /* execute request */
	        $result = curl_exec($curl);
	        print_r($result);
	        die;
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
		public function getNewAccessToken(){
			// POST https://www.strava.com/api/v3/oauth/token \
		 //  -d client_id=ReplaceWithClientID \
		 //  -d client_secret=ReplaceWithClientSecret \
		 //  -d grant_type=refresh_token \
		 //  -d refresh_token=ReplaceWithRefreshToken
		  $url = 'https://www.strava.com/api/v3/oauth/token';
			$ch = curl_init($url);
        	/* Array Parameter Data */
	        $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'grant_type'=>'refresh_token','refresh_token'=>'bcfdd0f2e9eef5f16158cbde9c0dce99e26984c8'];
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
	        if($httpcode==200){
	        	echo 'Got Access Token';
	        	// echo date('d-m-Y h:i:s',strtotime($result->expires_at));
	        }else{
	        	echo 'Some Thing Went Wrong';
	        }
	        // print_r($httpcode);
	        
	         // return $result;  
	         print_r($result);  
	        /* close cURL resource */
	        curl_close($ch);
		}
		// public function getEvent(){
		// 	$_POST;
		// 	curl -G https://www.strava.com/api/v3/athlete -H "Authorization: Bearer 
		// 	$url = 'https://www.strava.com/api/v3/athlete';
		// 	$ch = curl_init($url);
  //       	/* Array Parameter Data */
	 //        $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'code'=>$code, 'grant_type'=>'authorization_code'];
	 //        /* pass encoded JSON string to the POST fields */
	 //        curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	 //        /* set the content type json */
	 //        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
	 //        /* set return type json */
	 //        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	 //        /* execute request */
	 //        $result = curl_exec($ch);
	 //         return $result;    
	 //        /* close cURL resource */
	 //        curl_close($ch);ReplaceWithAccessToken"
		// }
		public function index(){
			$this->load->view('pages/login');
		}
		public function userLogin(){
		    
		    if($this->session->userdata('userData')){
		        $sessionData=unserialize($this->session->userdata('userData'));
		        if($sessionData[0]->user_type!='Admin'){
        			redirect('User');
        		}else{
        			redirect('Events');
        		}
		    }
			$this->load->view('pages/userLogin');
		}
		public function forgotPasswod(){
		   
		    $this->load->view('pages/forgotPassword');
		}
		public function sendResetLink(){
		    $otp=rand(111111,999999);
		    
		    $email=$this->input->post('email_');
		    $ch=$this->db->where('user_email',$email)->get('user_details')->result();
		  //  print_r($ch);
		    if(count($ch)>0){
		        $this->db->where('user_email',$email)->update('user_details', array("otp_forgot_password"=>$otp));
		    
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
    
                // $this->load->library('email');
                $subject="Forgot Password OTP";
                $this->email->initialize($config);
                    // $email=$useremail;
                    
                    $this->email->from('info@globeracers.com');
                    $this->email->to($email);
                    $this->email->subject($subject);
                    $message = 'Your OTP is: '.$otp;
                    $this->email->message($message);
                    $st = $this->email->send();
                    $this->session->set_flashdata('msg','OTP has been send to your registered Email Address');
                    redirect('Login/forgotPasswod');
		    }else{
		        $this->session->set_flashdata('msg','Email Id Does not exists.');
		        redirect('userLogin');
		    }
		    
            
		}
		public function restPassword(){
		 
		    $email=$this->input->post('email_');
		    $otp_enter=$this->input->post('otp_');
		    $new_pass=$this->input->post('new_pass');
		    $user=$this->db->where('user_email',$email)->get('user_details')->result();
		  //  print_r($_POST);
		  //  die();
		    if(count($user)>0){
		        $otpSent=$user[0]->otp_forgot_password;
		        if($otp_enter==$otpSent){
		            //Update Passwod
		            $set=$this->db->where('user_email',$email)->update('user_details',array("user_password"=>base64_encode($new_pass)));
		            if($set){
		                //Password Update
		                $this->session->set_flashdata('msg','Password Updated Successfully');
		            }else{
		                //Failed to Update
		                $this->session->set_flashdata('msg','Failed To Update Password');
		            }
		        }else{
		            //Otp Not Matched
		            $this->session->set_flashdata('msg','OTP does not Matched.');
		        }
		    }else{
		        //User Not Found
		        $this->session->set_flashdata('msg','User Not Found.');
		    }
		    redirect('userLogin');
		}
		public function logOUtFo(){
		    $this->session->unset_userdata('userData');
		    die(json_encode(array("code"=>1)));
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
				if($sessionData[0]->user_type!='Admin'){
					redirect('User');
				}else{
					redirect('Events');
				}
				
			}else{
			    $this->session->set_flashdata('err','Invalid Email/Password');
				redirect('userLogin');
			}
		}
		
		public function userSignUp(){
			// Array ( [] => rahul@123 [] => rahul@123 [] => rahul@123 [user-repeatpass] => rahul@123 )
// 			print_r($_POST);
			// $ip=$_SERVER['REMOTE_ADDR'];
			$ip='103.97.137.69';
			$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
 			$continent_name= $ipdat->geoplugin_continentName;
			$data=array(
			                "firstname"=>$this->input->post('first-name'),
			                "middle_name"=>$this->input->post('middle-name'),
							"lastname"=>$this->input->post('last-name'),
							"user_email"=>$this->input->post('user-email'),
							"user_password"=>base64_encode($this->input->post('user-pass')),
							"contact_no"=>$this->input->post('contact_no'),
							"user_type"=>$this->input->post('user_type'),
							"continent_name"=>$continent_name,
						);
			$res=$this->USERM->createUserAccount($data);
			switch ($res) {
				case 0:
					$this->session->set_flashdata('err','Failed To Register.');

					break;
				case 1:
					$this->session->set_flashdata('msg','Registered Successfully.');
					break;
				case 2:
					$this->session->set_flashdata('err','Email Id already Exists.');
					break;
				default:
					$this->session->set_flashdata('err','Server Not Found');
					break;
			}
			redirect('userLogin');
		}
		public function loginValidate(){
			// print_r($_POST);
			// echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT, $options);
			$condition=array(
								"user_email"=>$this->input->post('us_email'),
								"user_password"=>base64_encode($this->input->post('us_pass')), 
								"user_type"=>"Admin"
							);
			// print_r($condition);

			if($this->API->loginValidationApi($condition)){

				redirect('Events');
			}else{
				$this->session->set_flashdata('err','Invalid Email/Password');
				redirect('userLogin');
			}
		}
		public function adminloginValidate(){
		  //  print_r($_POST);
		    
		    $condition=array(
								"user_email"=>$this->input->post('us_email'),
								"user_password"=>base64_encode($this->input->post('us_pass')), 
							
							);
			// print_r($condition);

			if($this->USERM->adminLoginValidate($condition)){
                // echo 'Admin Data Found';
				redirect('Events');
			}else{
			 //   echo 'Not an Admin';
				$this->session->set_flashdata('err','Invalid Email/Password');
				redirect('admin-login');
			}
		}
		public function logout(){
			$this->session->unset_userdata('userData');
			redirect('userLogin');
		}
	}

?>