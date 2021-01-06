<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calc extends CI_Controller {

        //Main Function Refresh Token
        public function check_access_token_detail(){
            $condition=array("to_show"=>1,"amoun_status"=>"Paid");
             $regUser=$this->db
             ->select('user_details.user_id as uId, user_details.user_email,
             user_details.id_table, user_details.expires_at, user_details.expires_in, 
             user_details.firstname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
             ->where($condition)
             ->join('user_details','user_details.id_table=race_registeration.user_id')
             ->get('race_registeration')->result();
             echo '<table border="1">';
             $i=1;
             $count=1;
             $notConnected=1;
             foreach($regUser as $user){
                $user_id=$user->uId;
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$user->user_email.'</td>';
                if($user_id!=""){
                    
                    $id=$user_id;
                    $tokenDetails=$this->db->where('user_id',$id)->get('token_details')->row();
                    if($tokenDetails){
                        $access_token=$tokenDetails->access_token;
                        $refresh_token=$tokenDetails->refresh_token;
                        $expires_at=$tokenDetails->expires_at;
        				$epoch = $expires_at;
        				echo '<td> Refresh Token: '.$refresh_token.'</td>';
        				$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
        				$expDate=$dt->format('Y-m-d H:i:s');
        				$curTime=date('Y-m-d H:i:s');
                        echo '<td>Fetch Data : </td>
                            <td>Strava Id :'.$user->uId.'</td>';
                        echo '<td style="color:red">Strava Data </td>';
                        echo '<td style="color:green">Token Expiry time : '.$expDate.'</td>';
                        echo '<td style="color:blue">Current time : '.$curTime.'</td>';
                        if($expDate >= $curTime){
                            $date1=date_create($expDate);
                            $date2=date_create($curTime);
                            $diff=date_diff($date1,$date2);
                            
                            
                            // print_r($diff);
                            
                            if($diff->i < 20 ){
                                echo '<td style="color:orange">Need To Update Token </td>';
                                $this->getNewAccessToken($refresh_token,$id);
                                $data=array(
                                            "count_"=>1,
                                            "api_for"=>" Token Updated For: ".$id,
                                            "hit_indian_time"=>date('Y-m-d h:i:s'),
                                        );
                                $this->db->insert('test',$data);
                            }
                            echo '<td style="color:black">Valid Token: </td>';
                            echo '<td style="color:black">'.$diff->h.':'.$diff->i.':'.$diff->s.'</td>';
                            echo '<td style="color:red"> Count: '.$count.' </td>';
                            //  $ftSt=$this->tempGetEvents($id,$access_token,$refresh_token);
                            // echo '<td style="color:green">'.$ftSt.'</td>';   
                            $count++;
                        }else{
                            
                            echo '<td style="color:red"> Token Expired </td>';
                            $this->getNewAccessToken($refresh_token,$id);
                            $data=array(
                                            "count_"=>1,
                                            "api_for"=>" Token Updated For: ".$id,
                                            "hit_indian_time"=>date('Y-m-d h:i:s'),
                                        );
                                $this->db->insert('test',$data);
                            
                        }
                    }else{
                        echo '<td style="color:red">No Token Found For: '.$user_id.' </td>';
                        $data=array(
                                        "count_"=>1,
                                        "api_for"=>"No Token Found For: ".$id,
                                        "hit_indian_time"=>date('Y-m-d h:i:s'),
                                    );
                        $this->db->insert('test',$data);
                    }
                    
                }
                else{
                    
                    echo '<td style="color:red">Strava is not Connected: </td>';
                    echo '<td style="color:red"> Count: '.$notConnected.' </td>';
                            $notConnected++;
                }
                echo '</tr>';
                $i++;
             }
             echo '</table>';
             
             date_default_timezone_set('asia/kolkata');
            $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'),"api_msg"=>"To Update Refresh Token");
            $this->db->insert('api_hit_logs',$logs_details);
        }
    public function get_strava_detail(){
            $condition=array("to_show"=>1,"amoun_status"=>"Paid");
         $regUser=$this->db
         ->select('user_details.user_id as uId, user_details.user_email,
         user_details.id_table, user_details.expires_at, user_details.expires_in, 
         user_details.firstname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
         ->where($condition)
         ->join('user_details','user_details.id_table=race_registeration.user_id')
         ->get('race_registeration')->result();
         echo '<table border="1">';
         $i=1;
         $count=1;
         $notConnected=1;
         foreach($regUser as $user){
            $user_id=$user->uId;
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$user->user_email.'</td>';
            if($user_id!=""){
                
                $id=$user_id;
                $tokenDetails=$this->db->where('user_id',$id)->get('token_details')->row();
                if($tokenDetails){
                    $access_token=$tokenDetails->access_token;
                    $refresh_token=$tokenDetails->refresh_token;
                    $expires_at=$tokenDetails->expires_at;
    				$epoch = $expires_at;
    				echo '<td> Refresh Token: '.$refresh_token.'</td>';
    				$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
    				$expDate=$dt->format('Y-m-d H:i:s');
    				$curTime=date('Y-m-d H:i:s');
                    echo '<td>Fetch Data : </td>
                        <td>Strava Id :'.$user->uId.'</td>';
                    echo '<td style="color:red">Strava Data </td>';
                    echo '<td style="color:green">Token Expiry time : '.$expDate.'</td>';
                    echo '<td style="color:blue">Current time : '.$curTime.'</td>';
                    if($expDate >= $curTime){
                        $date1=date_create($expDate);
                        $date2=date_create($curTime);
                        $diff=date_diff($date1,$date2);
                        // print_r($diff);
                        
                       
                        echo '<td style="color:black">Valid Token: </td>';
                        echo '<td style="color:black">'.$diff->h.':'.$diff->i.':'.$diff->s.'</td>';
                        echo '<td style="color:red"> Count: '.$count.' </td>';
                         $ftSt=$this->tempGetEvents($id,$access_token,$refresh_token);
                         $data=array(
                                            "count_"=>1,
                                            "api_for"=>" Data Added For: ".$id,
                                            "hit_indian_time"=>date('Y-m-d h:i:s'),
                                        );
                                $this->db->insert('test',$data);
                        // echo '<td style="color:green">'.$ftSt.'</td>';   
                        $count++;
                    }else{
                        
                        echo '<td style="color:red"> Token Expired </td>';
                        $data=array(
                                            "count_"=>1,
                                            "api_for"=>"Token Exxxpired For: ".$id,
                                            "hit_indian_time"=>date('Y-m-d h:i:s'),
                                        );
                                $this->db->insert('test',$data);
                            // $response=$this->getNewAccessToken($refresh_token,$id);
                        
                        
                    }
                }else{
                    echo '<td style="color:red">No Token Found For: '.$user_id.' </td>';
                    // $data=$this->db->where('user_id',$id)->get('user_details')->row();
                    // if($data->token_type!=""){
                    //     $userData=array(
                    //             "user_id"=>$id,
                    //             "token_type"=>$data->token_type,
                    //             "expires_at"=>$data->expires_at,
                    //             "expires_in"=>$data->expires_in,
                    //             "refresh_token"=>$data->refresh_token,
                    //             "access_token"=>$data->access_token,
                    //             "data_updated_at"=>date('Y-m-d h:i:s')
                    //         );
                    
                    //     if($this->db->insert('token_details',$userData)){
                    //         echo '<td>Token Details Added</td>';
                    //     }else{
                    //         echo '<td>Failed To Add</td>';
                    //     }
                    // }else{
                    //     echo '<td>Erro: 503 </td>';
                    // }
                    
                    
                    
                }
                
            }
            else{
                
                echo '<td style="color:red">Strava is not Connected: </td>';
                // echo '<td style="color:red"> Count: '.$notConnected.' </td>';
                        // $notConnected++;
            }
            echo '</tr>';
            $i++;
         }
         echo '</table>';
         date_default_timezone_set('asia/kolkata');
            $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'),"api_msg"=>"To Retrieve Strava Data");
            $this->db->insert('api_hit_logs',$logs_details);
        }

    public function update_access_token(){
        
    }

    // $daff=0;
    public function ref_token(){
        // INSERT INTO `test`(`id`, `count_`, `api_for`, `hit_indian_time`, `hit_utc_time`)
        $data=array(
                        "count_"=>1,
                        "api_for"=>"Refresh Token",
                        "hit_indian_time"=>date('Y-m-d h:i:s'),
                    );
        $this->db->insert('test',$data);
    }
    
    
    
    
    
    
    public function get_data(){
         $data=array(
                        "count_"=>1,
                        "api_for"=>"Data Fetching API",
                        "hit_indian_time"=>date('Y-m-d h:i:s'),
                    );
        $this->db->insert('test',$data);
    }
    
    
	public function index(){
	    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
	    
	    $data['teams']=$this->db->get('team_details')->result();
		$this->load->view('layout/header',$data);
		$this->load->view('pages/team');
		$this->load->view('layout/footer');
	}
    // public function getDiff($){

    // }
    
    public function insertZeroForPreviousDay(){
        //Commented For One Day.
        // $condition=array("to_show"=>1,"amoun_status"=>"Paid");
        //  $regUser=$this->db
        //  ->select('user_details.user_id as uId, user_details.id_table, user_details.firstname,user_details.user_email,user_details.middle_name,user_details.lastname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
        //  ->where($condition)
        //  ->join('user_details','user_details.id_table=race_registeration.user_id')
        //  ->get('race_registeration')->result();
        //  echo '<table>';
        //  foreach($regUser as $user){
        //     // $dated=date('2020-11-16');
        //         echo $dated=date('Y-m-d',strtotime("-1 days"));
        //         // die;
        //         if($user->uId!=""){
        //             $userData=$this->db->where("athlete_id=".$user->uId." and start_date = '$dated'")->get('event_details')->result();
        //             $distance=0;
        //             if(count($userData)>0){
        //                 echo '<tr>
        //                     <td> Data Exists for : '.$dated.'</td>
        //                     <td>'.$user->firstname.'</td>
        //                     <td>'.$user->user_email.'</td>
        //                     <td>'.$user->firstname.' '.$distance.' m '.'</td>
                    
        //                 </tr>';
        //             }else{
        //                 echo '<tr>
        //                     // <td> No Data Found : </td>
        //                     <td style="color:red"> No Data Found : </td>
        //                     <td>'.$user->firstname.'</td>
        //                     <td>'.$user->user_email.'</td>
        //                     <td> Insert Zero: '.$user->uId.'</td>
        //                  </tr>';
        //                 $toInsert=array(
        //                                     "distance"=>0,
        //                                     "user_id"=>$user->uId,
        //                                     "full_name"=>$user->firstname.' '.$user->middle_name.' '.$user->lastname,
        //                                     "data_Date"=>$dated
        //                                 );
        //                 $this->insertThisdata($toInsert);
        //             }
        //         }else{
        //             echo '<tr>
        //                     <td>User Id Not Found : '.$user->firstname.' </td>
        //                     <td>'.$user->firstname.'</td>
        //                     <td>'.$user->user_email.'</td>
        //                  </tr>';
        //         }
        //  }
        //  echo '</table>';
    }
    public function testFunction(){
      
        $condition=array("to_show"=>1,"amoun_status"=>"Paid");
         $regUser=$this->db
         ->select('user_details.user_id as uId, user_details.id_table, user_details.firstname,user_details.user_email,user_details.middle_name,user_details.lastname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
         ->where($condition)
         ->join('user_details','user_details.id_table=race_registeration.user_id')
         ->get('race_registeration')->result();
         
         
         echo '<table>';
         foreach($regUser as $user){
            // $dated=date('2020-11-16');
                echo $dated=date('Y-m-d',strtotime("-1 days"));
                // die;
                // print_r($user);
                if($user->uId!=""){
                    $userData=$this->db->where("athlete_id=".$user->uId." and start_date = '$dated'")->get('event_details')->result();
                    // print_r($userData);
                    $distance=0;
                    if(count($userData)>0){
                        // foreach($userData as $data){
                        //     $distance += $data->distance;
                        // }
                        // $toInsert=array(
                        //                     "distance"=>$distance,
                        //                     "user_id"=>$user->uId,
                        //                     "full_name"=>$user->firstname.' '.$user->middle_name.' '.$user->lastname,
                        //                     "data_Date"=>$dated
                        //                 );
                        // $this->insertThisdata($toInsert);
                        
                        echo '<tr>
                            <td> Data Exists for : '.$dated.'</td>
                            <td>'.$user->firstname.'</td>
                            <td>'.$user->user_email.'</td>
                            <td>'.$user->firstname.' '.$distance.' m '.'</td>
                    
                </tr>';
                        // echo ' Distance Covered By : '.;
                        
                    }else{
                        echo '<tr>
                            // <td> No Data Found : </td>
                            <td style="color:red"> No Data Found : </td>
                            <td>'.$user->firstname.'</td>
                            <td>'.$user->user_email.'</td>
                            <td> Insert Zero: '.$user->uId.'</td>
                    
                         </tr>';
                        // echo '   Insert Zero  '.$user->uId;
                        $toInsert=array(
                                            "distance"=>0,
                                            "user_id"=>$user->uId,
                                            "full_name"=>$user->firstname.' '.$user->middle_name.' '.$user->lastname,
                                            "data_Date"=>$dated
                                        );
                        $this->insertThisdata($toInsert);
                    }
                }else{
                    // echo ';
                    echo '<tr>
                            <td>User Id Not Found : '.$user->firstname.' </td>
                            <td>'.$user->firstname.'</td>
                            <td>'.$user->user_email.'</td>
                            
                    
                         </tr>';
                }
                // 
         }
         echo '</table>';
    }
    public function getDbBackup(){
        $this->load->dbutil();

        // Backup your entire database and assign it to a variable
        $backup = $this->dbutil->backup();
        
        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file(base_url('dbBackup/').date('d-m-Y').'_mybackup.zip', $backup);
        
        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.zip', $backup);
    }
    public function dataTraverse(){
        $condition=array("to_show"=>1,"amoun_status"=>"Paid");
         $regUser=$this->db
         ->select('user_details.user_id as uId, user_details.id_table, user_details.user_email, user_details.firstname,user_details.middle_name,,user_details.lastname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
         ->where($condition)
         ->join('user_details','user_details.id_table=race_registeration.user_id')
         ->get('race_registeration')->result();
         echo '-------------------------------------------------------------------------------------------------------------------------';
         echo '<table border="1">';
         foreach($regUser as $user){
            // $dated=date('2020-11-21');
                $dated=date('Y-m-d');
                // print_r($user);
                echo '<tr>';
                echo '<td style="color:red">'.$user->firstname.'</td>';
                if($user->uId!=""){
                    $userData=$this->db->where("athlete_id=".$user->uId." and start_date = '$dated'")->get('event_details')->result();
                    // print_r($userData);
                    $distance=0;
                    if(count($userData)>0){
                        foreach($userData as $data){
                            $distance += $data->distance;
                        }
                        $toInsert=array(
                                            "distance"=>$distance,
                                            "user_id"=>$user->uId,
                                            "full_name"=>$user->firstname.' '.$user->middle_name.' '.$user->lastname,
                                            "data_Date"=>$dated
                                        );
                        $this->insertThisdata($toInsert);
                        echo '
                            <td> Data Found for :</td>
                            
                            
                    
                         ';
                        // echo ' Distance Covered By : '.$user->firstname.' '.$distance.' m ';
                        
                    }else{
                        // echo ' No Data Found  For: ';
                        echo '
                            <td>No Data Found </td>
                            
                            
                            
                            
                    
                         ';
                    }
                }else{
                    echo'
                            <td>User Id Is Null </td>
                            <td> Cannot Get Data for </td>
                            
                            
                    
                         ';
                    // echo 'No Id: '.$user->firstname;
                }
                echo '<td>'.$dated.'</td>';
                echo '</tr>';
                // 
         }
         echo '</table>';
        //  INSERT INTO `log_for_calculated_data_api`(`log_id`, `log_utc_time`, `log_indian_time`)
        // date_default_timezone_set('asia/kolkata');
        // $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'));
        // $this->db->insert('log_for_calculated_data_api',$logs_details);
        date_default_timezone_set('asia/kolkata');
        $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'),"api_msg"=>"Data Calculated");
        $this->db->insert('api_hit_logs',$logs_details);
    }
    public function insertThisdata($data){
            // print_r($data);
            if(count($this->db->where($data)->get('calculated_data')->result())>0){
                // echo '   Data Already Exists';
                echo '<td> Data Already Exists </td>';
            }else{
                // echo '   insert Data';
                // "distance"=>$distance,
                //                             "user_id"=>$user->uId,
                //                             "full_name"=>$user->firstname.' '.$user->middle_name.' '.$user->lastname,
                //                             "data_Date"=>$dated
                $condition=array(
                            "user_id"=>$data['user_id'],
                            "data_Date"=>$data['data_Date'],
                    );
                echo '<td> Data Inserted: '.serialize($data).'</td>';
                $d_Exists=$this->db->where($condition)->get('calculated_data')->row();
                if($d_Exists){
                    $newDist=$data['distance'];
                    $toUpdate=array("distance"=>$newDist);
                    $this->db->where('dt_id',$d_Exists->dt_id)->update('calculated_data',$toUpdate);
                }else{
                    $this->db->insert('calculated_data',$data);
                }
                
                
            }
        // $this->db->insert('calculated_data',$data);
    }
    // public function test_two_function(){
    //     if(count($this->db->where($data)->get('calculated_data')->result())>0){
    //             // echo '   Data Already Exists';
    //         }else{
    //             // echo '   insert Data';
    //             $conditionOne=array("user_id"=>$data['user_id'],"date_Date"=>date('Y-m-d'));
    //             if(count($calData=$this->db->where($conditionOne)->get('calculated_data')->result())>0){
    //                 $id=$calData
    //             }
    //             $this->db->insert('calculated_data',$data);
    //         }
    // }
    public function getUserData(){
        $userdata=$this->db->group_by('user_id')->order_by('data_id','asc')->get('athlete_data')->result();
        foreach($userdata as $data){
            echo $data->user_id.' || ';
            // $eachUser=$this->db->where('user_id',$data->user_id)->order_by('data_id','desc')->get('athlete_data')->result();
            // print_r($eachUser);
            
            // echo '---------------------------------------------------------------------------------';

        }
    }


    public function myEvents(){
        $condition=array("to_show"=>1,"amoun_status"=>"Paid");
         $regUser=$this->db
         ->select('user_details.user_id as uId, user_details.user_email,user_details.id_table, user_details.firstname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
         ->where($condition)
         ->join('user_details','user_details.id_table=race_registeration.user_id')
         ->get('race_registeration')->result();
         echo '<table border="1">';
         $i=1;
         foreach($regUser as $user){
          
            $user_id=$user->uId;
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$user->user_email.'</td>';
            // echo '    || Name: '.$user->firstname.' User id: '.$user_id.' Access Token: '.$user->access_token.' Refresh Token: '.$user->refresh_token;
            if($user_id!=""){
                // echo ' Fetching Data for : '.$user->firstname;
                
                
                echo '
                            <td>Fetching Data: </td>
                            <td>Strava Id :'.$user->uId.' </td>
                    
                ';
                $access_token=$user->access_token;
                $refresh_token=$user->refresh_token;
                // $dtStatus=$this->getAthleteEvents($user_id,$access_token,$refresh_token);
                   echo '
                                <td style="color:red">Strava Data </td>
                               
                            
                        
                    ';
            }
            else{

                // echo ' Strava is not Connected. For: '.$user->firstname;
                echo '
                            <td style="color:red">Strava is not Connected: </td>
                           
                    
                ';
                // $this->session->set_flashdata('error_msg','Please Connect To Strava First.');
            }
            
            echo '</tr>';
            $i++;
            
         }
         echo '</table>';
        // $this->dataTraverse();
        // // INSERT INTO `api_hit_logs`(`log_id`, `log_utc_time`, `log_indian_time`)
        // date_default_timezone_set('asia/kolkata');
        // $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'));
        // $this->db->insert('api_hit_logs',$logs_details);
    
        
    }
    public function manuallyFetchData($strav_id){
        
        
        // $res=$this->db->where('user_id',$strav_id)->get('user_details')->result();
        // $res=$this->db->where('user_id',$strav_id)->get('token_details')->result();
        
        // $id=$strav_id;
        //     // print_r($res);
        //     // die();
        //     $url = 'https://www.strava.com/api/v3/oauth/token';
        //         $ch = curl_init($url);
        //         /* Array Parameter Data */
        //         $data = ['client_id'=>'54937',
        //         'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 
        //         'grant_type'=>'refresh_token','refresh_token'=>$res[0]->refresh_token];
        //         /* pass encoded JSON string to the POST fields */
        //         curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
        //         /* set the content type json */
        //         // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
        //         /* set return type json */
        //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //         /* execute request */
        //         $result = curl_exec($ch);
        //         $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        //         echo '<td> Status: '.$httpcode.'</td>';
        //         $result = json_decode($result);
        //         // $result=array();
        //       print_r($result);
        //       // die;
        //         if($httpcode==200){
        //             // echo 'Got Access Token';
        //             $updateResp=$this->updateUserAccessToken($result, $id);
        //             // die(json_encode($updateResp));
        //             switch ($updateResp) {
        //                 case 0:
        //                     // echo 'Failed to Update.';
        //                     echo '<td>Failed </td>';
        //                     return 0;
        //                     break;
        //                 case 1:
        //                     // echo 'Updated Successfully.';
        //                     echo '<td> Updated </td>';
        //                     return 1;
        //                     break;
        //                 default:
        //                     echo '<td> Error </td>';
        //                     // echo 'Some Thing Went Wrong 454';
        //                     return 401;
        //                     break;
        //             }
        //             // echo date('d-m-Y h:i:s',strtotime($result->expires_at));
        //         }else{
        //             echo '<td> Error 500  </td>';
        //             return 500;
        //             // echo 'Some Thing Went Wrong';
        //         }
        //         curl_close($ch);
        //     die(' Access Token Updated');
        
        
        //Fetch Data From Strava
        $res=$this->db->where('user_id',$strav_id)->get('token_details')->result();
        // die(json_encode($res));
        
        $newDat=date('m/d/Y');
        // $newDat='11/18/2020';
        $dt = new DateTime($newDat);  // convert UNIX timestamp to PHP DateTime
            // $expDate=$dt->format('Y-m-d H:i:s');
        // $current=date('Y-m-d H:i:s');
        $ds=$dt->format('U');
        $url = 'https://www.strava.com/api/v3/athlete/activities?id='.$strav_id.'&after='.$ds.'&scope=activity:read_all';
            /* Init cURL resource */
        $curl = curl_init($url);
        // echo ' User Id: '.$id;
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
                 'Authorization: Bearer '.$res[0]->access_token
            ),
        ));
        $result = curl_exec($curl);
        print_r($result);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
        if($httpcode==429){
            echo '<td> API Hit Limit Reached</td>';    
        }else{
            echo '<td> API Hit Status: '.$httpcode.'</td>';    
        }
        
    //     /* execute request */
        if($httpcode==200){
            
            $insStatus=$this->insertEvent($result);
            switch ($insStatus) {
                case 0:
                    // echo 'Failed to Insert.';
                    echo '<td> Failed To Insert</td>';
                    // return 0;
                    break;
                case 1:
                    // echo 'Inserted Successfully.';
                    echo '<td>Inserted Successfully.</td>';
                    // return 1;
                    break;
                case 2:
                    // echo 'Data Already Exists.';
                    echo '<td>Data Already Exists.</td>';
                    // return 2;
                    break;
                default:
                    // echo 'Some Thing Went Wrong';
                     echo '<td>Some Thing Went Wrong.</td>';
                    // return 500;
                    break;
            }  
        }
        // else{
    //         //Ask for refresh Token
    //         // echo 'Refresh Token Expired.';
    //   //   
    //             // echo 'ask for refresh token';
    //             $response=$this->getNewAccessToken($refresh_token,$id);
    //             echo '<td> New Access token: '.serialize($response).'</td>';
            
            
            
    //         // die(json_encode($response));
    //     }
      
        // die(json_encode($httpcode));
        
        /* close cURL resource */
        
        curl_close($curl);
        date_default_timezone_set('asia/kolkata');
        $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'),"api_msg"=>"Data Fetched Manually For: ".$strav_id);
        $this->db->insert('api_hit_logs',$logs_details);
    }
    
    
    public function getUserStravaDetails(){
        $condition=array("to_show"=>1,"amoun_status"=>"Paid");
         $regUser=$this->db
         ->select('user_details.user_id as uId, user_details.user_email,
         user_details.id_table, user_details.expires_at, user_details.expires_in, 
         user_details.firstname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
         ->where($condition)
         ->join('user_details','user_details.id_table=race_registeration.user_id')
         ->get('race_registeration')->result();
         echo '<table border="1">';
         $i=1;
         $count=1;
         $notConnected=1;
         foreach($regUser as $user){
            $user_id=$user->uId;
            echo '<tr>';
            echo '<td>'.$i.'</td>';
            echo '<td>'.$user->user_email.'</td>';
            if($user_id!=""){
                
                $id=$user_id;
                $tokenDetails=$this->db->where('user_id',$id)->get('token_details')->row();
                if($tokenDetails){
                    $access_token=$tokenDetails->access_token;
                    $refresh_token=$tokenDetails->refresh_token;
                    $expires_at=$tokenDetails->expires_at;
    				$epoch = $expires_at;
    				echo '<td> Refresh Token: '.$refresh_token.'</td>';
    				$dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
    				$expDate=$dt->format('Y-m-d H:i:s');
    				$curTime=date('Y-m-d H:i:s');
                    echo '<td>Fetch Data : </td>
                        <td>Strava Id :'.$user->uId.'</td>';
                    echo '<td style="color:red">Strava Data </td>';
                    echo '<td style="color:green">Token Expiry time : '.$expDate.'</td>';
                    echo '<td style="color:blue">Current time : '.$curTime.'</td>';
                    if($expDate >= $curTime){
                        $date1=date_create($expDate);
                        $date2=date_create($curTime);
                        $diff=date_diff($date1,$date2);
                        // print_r($diff);
                        
                       
                        echo '<td style="color:black">Valid Token: </td>';
                        echo '<td style="color:black">'.$diff->h.':'.$diff->i.':'.$diff->s.'</td>';
                        echo '<td style="color:red"> Countt: '.$count.' </td>';
                        //  $ftSt=$this->tempGetEvents($id,$access_token,$refresh_token);
                        // echo '<td style="color:green">'.$ftSt.'</td>';   
                        $count++;
                    }else{
                        
                        echo '<td style="color:red"> Token Expired </td>';
                            // $response=$this->getNewAccessToken($refresh_token,$id);
                        
                        
                    }
                }else{
                    echo '<td style="color:red">No Token Found For: '.$user_id.' </td>';
                    $data=$this->db->where('user_id',$id)->get('user_details')->row();
                    if($data->token_type!=""){
                        if($data->refresh_token!=""){
                            $userData=array(
                                "user_id"=>$id,
                                "token_type"=>$data->token_type,
                                "expires_at"=>$data->expires_at,
                                "expires_in"=>$data->expires_in,
                                "refresh_token"=>$data->refresh_token,
                                "access_token"=>$data->access_token,
                                "data_updated_at"=>date('Y-m-d h:i:s')
                            );
                    
                            if($this->db->insert('token_details',$userData)){
                                echo '<td>Token Details Added</td>';
                                date_default_timezone_set('asia/kolkata');
                                $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'),"api_msg"=>"Token Details Inserted : ".$id);
                                $this->db->insert('api_hit_logs',$logs_details);
                            }else{
                                echo '<td>Failed To Add</td>';
                            }
                        }else{
                            echo '<td>Refresh Token Is Null</td>';
                        }
                        
                    }else{
                        echo '<td>Erro: 503 </td>';
                    }
                    
                    
                    
                }
                
            }
            else{
                
                echo '<td style="color:red">Strava is not Connected: </td>';
                echo '<td style="color:red"> Count: '.$notConnected.' </td>';
                        $notConnected++;
            }
            echo '</tr>';
            $i++;
         }
         echo '</table>';
        date_default_timezone_set('asia/kolkata');
        $logs_details=array("log_indian_time"=>date('d-m-Y h:i:s'),"api_msg"=>"Token Details Updated ");
        $this->db->insert('api_hit_logs',$logs_details);
    }
    
    public function tempGetEvents($id,$access_token,$refresh_token){
         $newDat=date('m/d/Y');
        echo '<td> Fetching Data : </td>';
        
            
            // $dated=date('Y-m-d',strtotime("-1 days"));
            // $newDat='11/18/2020';
            $newDat=$newDat;
            $dt = new DateTime($newDat);  // convert UNIX timestamp to PHP DateTime
            $ds=$dt->format('U');
            $url = 'https://www.strava.com/api/v3/athlete/activities?id='.$id.'&after='.$ds.'activity:read_all';
            $curl = curl_init($url);
 
            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                     'Content-Type: application/json',
                     'Authorization: Bearer '.$access_token
                ),
            ));
            $result = curl_exec($curl);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
            if($httpcode==429){
                echo '<td> API Hit Limit Reached</td>';    
            }else{
                echo '<td> API Hit Status: '.$httpcode.'</td>';    
            }
            if($httpcode==200){
                
                $insStatus=$this->insertEvent($result);
                switch ($insStatus) {
                    case 0:
                        echo '<td>Failed</td>';
                        return 0;
                        break;
                    case 1:
                        echo '<td>Inserted</td>';
                        return 1;
                        break;
                    case 2:
                        echo '<td>Data Already Exists</td>';
                        return 2;
                        break;
                    default:
                        echo '<td>Some Thing Went Wrong</td>';
                        return 500;
                        break;
                }  
            }else{
                echo '<td>Ask for refresh Token</td>';
            }
            curl_close($curl);
    }
    
    
    public function getAthleteEvents($id,$access_token,$refresh_token=""){
             // http GET "https://www.strava.com/api/v3/activities/{id}?include_all_efforts=" "Authorization: Bearer [[token]]"
            // $url = 'https://www.strava.com/api/v3/activities?id='.$id;
            $newDat=date('m/d/Y');
            // $newDat='11/19/2020';
            $dt = new DateTime($newDat);  // convert UNIX timestamp to PHP DateTime
                // $expDate=$dt->format('Y-m-d H:i:s');
            // $current=date('Y-m-d H:i:s');
            $ds=$dt->format('U');
            $url = 'https://www.strava.com/api/v3/athlete/activities?id='.$id.'&after='.$ds.'activity:read_all';
                /* Init cURL resource */
            $curl = curl_init($url);
            // echo ' User Id: '.$id;
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
            // print_r($result);
            $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
        //   print_r($result);
            if($httpcode==429){
                echo '<td> API Hit Limit Reached</td>';    
            }else{
                echo '<td> API Hit Status: '.$httpcode.'</td>';    
            }
            
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
           //   $refresh_toke='db1fea7be6052eaca33ec457158b2426ac2787d5';
                date_default_timezone_set('asia/kolkata');
                // $userSessionData=unserialize($this->session->userdata('userData'));
                
                $resUlt_=$this->db->where('user_id',$id)->get('user_details')->row();

                // print_r($resUlt_);
                $expires_at=$resUlt_->expires_at;
                $epoch = $expires_at;
                $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
                $expDate=$dt->format('Y-m-d H:i:s');
                $current=date('Y-m-d H:i:s');
                if($expDate<$current){
                    // echo 'ask for refresh token';
                    $response=$this->getNewAccessToken($refresh_token,$id);
                    echo '<td> New Access token: '.serialize($response).'</td>';
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

    public function insertEvent($data){
        $eventDetailArray=json_decode($data);
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
            $newEvent=$this->db->where($condition)->get('event_details')->result();
            // print_r($newEvent);
            if(count($newEvent)==0  ){
                // print_r($eventData);
                if($this->db->insert('event_details',$eventData)){
                //  return 1;
                    $temp=1;
                }else{
                //  return 0;
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
    public function getNewAccessToken($refresh_token,$id){
        echo '<td>Updating Refresh Token .. For: '.$id.'</td>';
        echo '<td>Refresh Token: '.$refresh_token.'</td>';
          // echo 'Refresh Token: '.$refresh_token;
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
            // $result=array();
          // print_r($result);
          // die;
            if($httpcode==200){
                // echo 'Got Access Token';
                $updateResp=$this->updateUserAccessToken($result, $id);
                // die(json_encode($updateResp));
                switch ($updateResp) {
                    case 0:
                        // echo 'Failed to Update.';
                        echo '<td>Failed </td>';
                        return 0;
                        break;
                    case 1:
                        // echo 'Updated Successfully.';
                        echo '<td> Updated </td>';
                        return 1;
                        break;
                    default:
                        echo '<td> Error </td>';
                        // echo 'Some Thing Went Wrong 454';
                        return 401;
                        break;
                }
                // echo date('d-m-Y h:i:s',strtotime($result->expires_at));
            }else{
                echo '<td> Error 500  </td>';
                return 500;
                // echo 'Some Thing Went Wrong';
            }
            curl_close($ch);
        }
    public function updateUserAccessToken($data,$id){
            echo '<td> Updating .. </td>';
            // {"token_type":"Bearer","access_token":"234a7f861a217e38dcba146a66b6dcd752908ec5","expires_at":1603110622,"expires_in":20026,"refresh_token":"db1fea7be6052eaca33ec457158b2426ac2787d5"}
            // date_default_timezone_set('asia/kolkata');
            // $userSessionData=unserialize($this->session->userdata('userData'));
            $user_id=$id;
            if($user_id!=""){
                
                // INSERT INTO `token_details`(`token_id`, `user_id`, `token_type`, `expires_at`, `expires_in`, `refresh_token`, `access_token`, `data_updated_at`, `data_inserted_at`)
                $userData=array(
                                "user_id"=>$id,
                                "token_type"=>$data->token_type,
                                "expires_at"=>$data->expires_at,
                                "expires_in"=>$data->expires_in,
                                "refresh_token"=>$data->refresh_token,
                                "access_token"=>$data->access_token,
                                "data_updated_at"=>date('Y-m-d h:i:s')
                            );
                if($this->db->where('user_id',$user_id)->update('token_details',$userData)){
                    // echo '<td> Access Token Udated For: '.$user_id.'</td>';
                    return 1;
                    
                }else{
                    return 0;
                }
                
            }else{
                return 500;
            }
            
        }



















    public function getUserEvents(){
        $condition=array("to_show"=>1,"amoun_status"=>"Paid");
         $regUser=$this->db
         ->select('user_details.user_id as uId, user_details.firstname, user_details.id_table as table_id, user_details.refresh_token, user_details.access_token ')
         ->where($condition)
         ->join('user_details','user_details.id_table=race_registeration.user_id')
         ->get('race_registeration')->result();
         // die(json_encode($regUser));
         foreach($regUser as $user){
            if($user->uId!=""){
                $url = 'https://www.strava.com/api/v3/activities?id='.$user->uId;
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
                         'Authorization: Bearer '.$user->access_token
                    ),
                ));
                $result = curl_exec($curl);
                $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);    
                if($httpcode==200){
                    echo ' Perfect';
                }else{
                    //Asking For refresh Token
                    $url = 'https://www.strava.com/api/v3/oauth/token';
                    $ch = curl_init($url);
                    /* Array Parameter Data */
                    $data = ['client_id'=>'54937', 'client_secret'=>'dcf786ff080f0368b69b111b8aaf619d55bc183c', 'grant_type'=>'refresh_token','refresh_token'=>$user->refresh_token];
                    /* pass encoded JSON string to the POST fields */
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
                    /* set the content type json */
                    // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json')); 
                    /* set return type json */
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    /* execute request */
                    $result_ = curl_exec($ch);
                    $httpcode2 = curl_getinfo($ch,CURLINFO_HTTP_CODE);
                    $result_ = json_decode($result);
                    echo $user->uId;
                    print_r($result);

                    // if($httpcode2==200){
                    //     $condition=array("user_id"=>$user->uId);
                    //     $toUpdate=array(
                    //                     "access_token"=>$result_->access_token,
                    //                     "expires_at"=>$result_->expires_at,
                    //                     "expires_in"=>$result_->expires_in,
                    //                     "refresh_token"=>$result_->refresh_token,
                    //                     );
                    //     echo ' To Update: -------------------- ';
                    //     print_r($toUpdate);
                    //     echo ' Condition: -------------------- ';
                    //     print_r($condition);
                    //     // $this->db->where('user_id',$user->uId)->update('user_details',$toUpdate);
                    // }
                }
            }
         }
    }


    public function getdd($id,$access_token){
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
//          print_r($result);
            /* execute request */
            if($httpcode==200){
                
                $insStatus=$this->insertEvent($result);
                switch ($insStatus) {
                    case 0:
                         echo 'Failed to Insert.';
                        // return 0;
                        break;
                    case 1:
                        echo 'Inserted Successfully.';
                        // return 1;
                        break;
                    case 2:
                        echo 'Data Already Exists.';
                        // return 2;
                        break;
                    default:
                        echo 'Some Thing Went Wrong';
                        // return 500;
                        break;
                }  
            }else{
                //Ask for refresh Token
                echo 'Refresh Token Expired.';
           //   $refresh_toke='db1fea7be6052eaca33ec457158b2426ac2787d5';
                
                
                // die(json_encode($response));
            }
          
            // die(json_encode($httpcode));
            
            /* close cURL resource */
    }
	
}
