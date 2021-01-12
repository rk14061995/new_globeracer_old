

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class Suunto extends CI_Controller
	{

		function __construct(){
	        parent:: __construct();
	        $this->load->model('UserModel','USERM');
    	}
	
		public function index(){
		    $code = $_GET['code'];

		    $username = "3953e3d4-2382-4028-9788-ad6dd2f80337";
		    $password = "secret";
		    $host = "https://cloudapi-oauth.suunto.com/oauth/token";
		    $ch = curl_init($host);
		    $payloadName = array(
		    	"grant_type"=>"authorization_code",
		    	"redirect_uri"=>"http://localhost/new_globeracer/Suunto",
		    	"code"=>$code
		    );
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payloadName);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$return = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
			curl_close($ch);

			if($httpcode==200){
				$data = json_decode($return);
				$array = json_decode(json_encode($data), true);
				$user_id = $array['user'];
				$connection_type = 3;
				$token_type = $array['token_type'];
				$refresh_token = $array['refresh_token'];
				$access_token = $array['access_token'];
				$expires_in = $array['expires_in'];
				$scope = $array['scope'];
				$ukv = $array['ukv'];
				$uk = $array['uk'];
				$jti = $array['jti'];
				$main_datas = array(
					'connection_type'=>$connection_type,
					'scope'=>$scope,
					'ukv'=>$ukv,
					'uk'=>$uk,
					'jti'=>$jti,
					'token_type'=>$token_type,
					'refresh_token'=>$refresh_token,
					'access_token'=>$access_token,
					'expires_in'=>$expires_in,
					'user_id'=>$user_id
				);
				$sess = $sessionData=unserialize($this->session->userdata('userData'));
				$main_user_id = $sess[0]->id_table;
				$condition = array('id_table'=>$main_user_id);
				$table="user_details";
				$update = $this->USERM->update_table($table,$main_datas,$condition);
				$user_email = $sess[0]->user_email;
				$data_inserted_at = $sess[0]->data_inserted_at;
				$t=time();
				$expires_at=$t+$expires_in;
				$data_updated_at = date('Y-m-d H:i:s');
    			   	$token_data = array(
    			   		'user_id'=>$user_id,
    			   		'user_email'=>$user_email,
						'token_type'=>$token_type,
						'expires_at'=>$expires_at,
						'expires_in'=>$expires_in,
						'refresh_token'=>$refresh_token,
						'access_token'=>$access_token,
						'data_updated_at'=>$data_updated_at,
						
    			   	);
    			   	$table = "token_details";
    			   	if(count($this->db->where('user_email',$user_email)->get('token_details')->result())==0){
    			   		if($this->db->insert('token_details',$token_data )){
    			   			$this->session->set_flashdata('msg','Sunnto Connected Successfuly.');
    			   		}else{
    			   			$this->session->set_flashdata('msg','Failed To Add Token Details');
    			   		}
    			   	}else{
    			   		if($this->db->where('user_email',$user_email)->update('token_details',$token_data )){
    			   			$this->session->set_flashdata('msg','Sunnto Connected Successfuly, New Access Token Updated');
    			   		}else{
    			   			$this->session->set_flashdata('msg','Failed To Update Token Details');
    			   		}
    			   	}
    			   	redirect('User');
    			   	// $check = $this->USERM->check_token($user_id);
    		// 	   	if($check)
    		// 	   	{
	    	// 		   	$insert = $this->USERM->insert_function($table,$token_data);
	    	// 		   	if ($insert) {
	    	// 		   		redirect('User');
	    	// 		   	}
	    	// 		   	else{
	    	// 		   		redirect('User');
	    	// 		   	}
    		// 	   	}
    		// 	   	else
    		// 	   	{
    		// 	   		$condition = array('user_id'=>$user_id);
						// $table="token_details";
						// $update = $this->USERM->update_table($table,$token_data,$condition);	
						// if ($update) {
	    	// 		   		redirect('User');
	    	// 		   	}
	    	// 		   	else{
	    	// 		   		redirect('User');
	    	// 		   	}
    		// 	   	}
				// redirect('User');
				// $table="suunto_token";
				// $check = $this->USERM->check_user($user);
				// if ($check) {
				// 	unset($array['user']);
				// 	$data = $array;
				// 	$condition = array('user'=>$user);
				// 	$update = $this->USERM->update_table($table,$data,$condition);
				// }
				// else{
				// 	$insert = $this->USERM->insert_function($table,$array);
				// }

			}
			else{
				echo "error";
			}
		}

		function disconnect(){
			$sess = $sessionData=unserialize($this->session->userdata('userData'));
			$main_user_id = $sess[0]->id_table;
			$condition = array('id_table'=>$main_user_id);
			$main_datas = array('connection_type'=>4);
			$table="user_details";
			$update = $this->USERM->update_table($table,$main_datas,$condition);
			redirect('User');
		}


		function getData()
		{




			$userSessionData=unserialize($this->session->userdata('userData'));
			$res=$this->db->where('id_table',$userSessionData[0]->id_table)->get('user_details')->row();
			
			$access_token = $res->access_token;
			$refresh_token = $res->refresh_token;
			$url = 'https://cloudapi.suunto.com/v2/workouts?since=0';
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
    			         'Ocp-Apim-Subscription-Key: 54a4686a31574fb48cab9153016daed5',
    			         'Authorization:'.$access_token
    			    ),
    			));
    			$result = curl_exec($curl);
    			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);   




    			//Till Noe
    			if ($httpcode==200) 
    			{


    			   	$main_data = json_decode($result);
    			   	$event_id = $main_data->payload[0]->workoutId;
    			   	$event_name = "Suunto Event";
    			   	$distance = $main_data->payload[0]->totalDistance;
    			   	$moving_time = $main_data->payload[0]->totalTime;
    			   	$event_venue = "NA";
    			   	$elapsed_time = $moving_time;
    			   	$type = 0;
    			   	$unix = $main_data->payload[0]->startTime;
    			   	$start_date = date("Y-m-d", $unix/1000);
    			   	$timezone = "NA";
    			   	$athlete_id = $res->user_id;
    			   	$event_data = array(
    			   		"user_email"=>$res->user_email,
    			   		'event_id'=>$event_id,
    			   		'event_name'=>$event_name,
    			   		'distance'=>$distance,
    			   		'moving_time'=>$moving_time,
    			   		'event_venue'=>$event_venue,
    			   		'elapsed_time'=>$elapsed_time,
    			   		'type'=>$type,
    			   		'start_date'=>$start_date,
    			   		'timezone'=>$timezone,
    			   		'athlete_id'=>$athlete_id
    			   	);
    			   	$table = "event_details";
    			   	$check = $this->USERM->check_workout($event_id);
    			   	if($check)
    			   	{
	    			   	$insert = $this->USERM->insert_function($table,$event_data);
	    			   	if ($insert) {
	    			   		redirect('User');
	    			   	}
	    			   	else{
	    			   		echo "error";
	    			   	}
    			   	}
    			   	else{
    			   			redirect('User');
    			   	}
    			}
			   	else
			   	{
			   		$url = 'https://cloudapi-oauth.suunto.com/oauth/token?grant_type=refresh_token&refresh_token='.$refresh_token;
			   		$username = "3953e3d4-2382-4028-9788-ad6dd2f80337";
	    			$password = "secret";
	        /* Init cURL resource */
	    		    $curl = curl_init($url);
	    		    curl_setopt($curl, CURLOPT_HEADER, 0);
					curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
	    		  // echo ' Access Token: '.$access_token;
	    		    curl_setopt_array($curl, array(
	    		    CURLOPT_URL => $url,
	    		    CURLOPT_RETURNTRANSFER => true,
	    		    CURLOPT_ENCODING => "",
	    		    CURLOPT_TIMEOUT => 30000,
	    		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    		    CURLOPT_CUSTOMREQUEST => "POST"
	    			));
	    			$array = curl_exec($curl);
	    			$main_array = json_decode($array);
	    			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);  
	    			if ($httpcode==200) 
	    			{
	    				$connection_type = 2;
						$token_type = $main_array->token_type;
						$refresh_token = $main_array->refresh_token;
						$access_token = $main_array->access_token;
						$expires_in = $main_array->expires_in;
						$scope = $main_array->scope;
						$ukv = $main_array->ukv;
						$uk = $main_array->uk;
						$jti = $main_array->jti;
						$user = $main_array->user;
						$main_datas = array(
							'connection_type'=>$connection_type,
							'scope'=>$scope,
							'ukv'=>$ukv,
							'uk'=>$uk,
							'jti'=>$jti,
							'token_type'=>$token_type,
							'refresh_token'=>$refresh_token,
							'access_token'=>$access_token,
							'expires_in'=>$expires_in,
							'user_id'=>$user
						);
						$sess = $sessionData=unserialize($this->session->userdata('userData'));
						$main_user_id = $sess[0]->id_table;
						$condition = array('id_table'=>$main_user_id);
						$table="user_details";
						$update = $this->USERM->update_table($table,$main_datas,$condition);
						//New Entry
						$userSessionData=unserialize($this->session->userdata('userData'));
						$res=$this->db->where('id_table',$userSessionData[0]->id_table)->get('user_details')->row();
						$access_token = $res->access_token;
						$refresh_token = $res->refresh_token;
						$url = 'https://cloudapi.suunto.com/v2/workouts?since=0';
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
		    			         'Ocp-Apim-Subscription-Key: 54a4686a31574fb48cab9153016daed5',
		    			         'Authorization:'.$access_token
		    			    ),
		    			));
		    			$result = curl_exec($curl);
		    			$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		    			if ($httpcode==200) 
		    			{
		    			   	$main_data = json_decode($result);
		    			   	$event_id = $main_data->payload[0]->workoutId;
		    			   	$event_name = "Suunto Event";
		    			   	$distance = $main_data->payload[0]->totalDistance;
		    			   	$moving_time = $main_data->payload[0]->totalTime;
		    			   	$event_venue = "NA";
		    			   	$elapsed_time = $moving_time;
		    			   	$type = 0;
		    			   	$unix = $main_data->payload[0]->startTime;
		    			   	$start_date = date("Y-m-d", $unix/1000);
		    			   	$timezone = "NA";
		    			   	$athlete_id = $res->user_id;
		    			   	$event_data = array(
		    			   		'event_id'=>$event_id,
		    			   		'event_name'=>$event_name,
		    			   		'distance'=>$distance,
		    			   		'moving_time'=>$moving_time,
		    			   		'event_venue'=>$event_venue,
		    			   		'elapsed_time'=>$elapsed_time,
		    			   		'type'=>$type,
		    			   		'start_date'=>$start_date,
		    			   		'timezone'=>$timezone,
		    			   		'athlete_id'=>$athlete_id
		    			   	);
		    			   	$table = "event_details";
		    			   	$check = $this->USERM->check_workout($event_id);
		    			   	if($check)
		    			   	{
			    			   	$insert = $this->USERM->insert_function($table,$event_data);
			    			   	if ($insert) 
			    			   	{
			    			   		redirect('User');
			    			   	}
			    			   	else
			    			   	{
			    			   		echo "error";
			    			   	}
	    			   		}
    			   			else
    			   			{
		    			   		redirect('User');
		    			   	}

		    			}
	    			}	   	
			   	}  

		}
	}
	

?>