<?php
	/**
	 * 
	 */
	class Events extends CI_Controller
	{
		
		function __construct()
		{
			# code...
			parent::__construct();
			$this->load->model('API_Model','API');
			if(!$this->session->userdata('adminData')){
				redirect('userLogin');
			}
		}
		public function activity_log(){
		    
		    $data['category']=$this->db->get('event_category')->result();
			$data['Ngo']=$this->db->where('user_type','Ngo')->get('users_')->result();
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$data['Coaches_Nutritionist']=$this->db->where('user_type','Coaches_Nutritionist')->get('users_')->result();
			$data['log']=$this->db->order_by('log_id','desc')->get('api_hit_logs')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/api_hit_log_myEvent');
			$this->load->view('layout/footer');
		}
		public function index(){
			$data['category']=$this->db->get('event_category')->result();
			$data['Ngo']=$this->db->where('user_type','Ngo')->get('users_')->result();
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$data['Coaches_Nutritionist']=$this->db->where('user_type','Coaches_Nutritionist')->get('users_')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/createEvent');
			$this->load->view('layout/footer');
		}
		public function Category(){
		    	$data['category']=$this->db->get('event_category')->result();
// 			$data['Ngo']=$this->db->where('user_type','Ngo')->get('users_')->result();
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
// 			$data['Coaches_Nutritionist']=$this->db->where('user_type','Coaches_Nutritionist')->get('users_')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/category');
			$this->load->view('layout/footer');
		}

		public function subCategory(){
			$data['categories']=$this->db->get('event_category')->result();
// 			$data['Ngo']=$this->db->where('user_type','Ngo')->get('users_')->result();
		$data['userSessionData']=unserialize($this->session->userdata('adminData'));
// 			$data['Coaches_Nutritionist']=$this->db->where('user_type','Coaches_Nutritionist')->get('users_')->result();
		$this->load->view('layout/header',$data);
		$this->load->view('pages/subCategory');
		$this->load->view('layout/footer');
	}

		public function updateCategory(){
		    
            $toUpdate=array('category_name'=>$this->input->post('cat_name'));
            if($this->db->where('category_id',$this->input->post('cat_id'))->update('event_category',$toUpdate)){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0)));
            }

		}
		
		public function addCategory(){
		    
            $data=array('category_name'=>$this->input->post('cat_name'));
            if(count($this->db->where($data)->get('event_category')->result())==0){
                if($this->db->insert('event_category',$data)){
                die(json_encode(array("code"=>1)));
                }else{
                    die(json_encode(array("code"=>0)));
                }
            }else{
                die(json_encode(array("code"=>0)));
            }
		}
		public function dltCategory(){
		    
            $condition=array('category_id'=>$this->input->post('cat_id'));
            if($this->db->where($condition)->delete('event_category')){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0)));
            }
        
		}
		public function upComing(){
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$condition=array(
								
								"userevents.event_start_date>"=>date('Y-m-d')
							);

			$data['events']=$this->db->select('userevents.*,user_details.firstname, user_details.lastname ')->join('user_details','user_details.id_table=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','desc')->get('userevents')->result();
			// $data['events']=$this->db->select('userevents.*')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/upComing');
			$this->load->view('layout/footer');
		}
		public function onGoing(){
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$condition=array(
								"userevents.event_start_date<="=>date('Y-m-d'),
								"userevents.event_end_date>="=>date('Y-m-d')
							);
			$data['events']=$this->db->select('userevents.*')->join('user_details','user_details.id_table=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			// $data['events']=$this->db->select('userevents.*,users_.user_fullname ')->join('users_','users_.user_id=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/onGoing');
			$this->load->view('layout/footer');
		}
		public function PastEvent(){
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$condition=array(
								
								"userevents.event_start_date<"=>date('Y-m-d')
							);
			$data['events']=$this->db->select('userevents.*,user_details.firstname, user_details.lastname ')->join('user_details','user_details.id_table=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			// $data['events']=$this->db->select('userevents.*,users_.user_fullname ')->join('users_','users_.user_id=userevents.user_id')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/PastEvent');
			$this->load->view('layout/footer');
		}
		public function LeaderBoard(){
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			$this->load->view('layout/header',$data);
			$this->load->view('pages/LeaderBoard');
			$this->load->view('layout/footer');
		}
		public function viewEventDescription($eventId){

			$condition=array(
								"event_details.event_id"=>$eventId,
								// "userevents.event_start_date>="=>date('Y-m-d')
							);
			// $data['description']=$this->db->join('user_details','event_details.athlete_id=user_details.user_id')->where($condition)->get('event_details')->row();
			$data['description']=$this->db->select('userevents.*,user_details.firstname, user_details.lastname ')->join('user_details','user_details.id_table=userevents.user_id')->where('event_id',$eventId)->get('userevents')->row();
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			
			$this->load->view('layout/header',$data);
			$this->load->view('pages/eventDescription');
			$this->load->view('layout/footer');
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
		public function updateEventStatus(){
		  //  print_r($_POST);
		    if($this->input->post('status')!=0){
		        $st=$this->db->where('event_id',$this->input->post('event_id'))->update('userevents',array('event_status'=>$this->input->post('status')));
    		    if($st){
    		        die(json_encode(array("code"=>1)));
    		    }else{
    		        die(json_encode(array("code"=>0)));
    		    }
		    }
		}	
		
		public function createEvent(){
			// print_r($_POST);
			$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			// print_r($data['userSessionData']);
			$user=$data['userSessionData'][0]->id_table;
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
							"currency_"=>$this->input->post('currency'),
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
			
// 			echo 'dfdfd';
			redirect('Events');
			// INSERT INTO `userevents`(`event_id`, `event_name`, `event_category`, `event_start_date`, `event_end_date`, `event_fee`, `guide_lines`, `event_faq`, `coaches`, `ngos_`, `created_on`)/''
		}
		public function updateEvent(){
		    $event_id=$this->input->post('event_id');
		    	$data['userSessionData']=unserialize($this->session->userdata('adminData'));
			// print_r($data['userSessionData']);
			$user=$data['userSessionData'][0]->id_table;
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
			

			$toUpdate=array(
							"event_name"=>$this->input->post('event_name'),
							"user_id"=>$user,
							"event_image"=>$Image,
							"currency_"=>$this->input->post('currency'),
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
// 			die(json_encode($toUpdate));
// 			if(count($this->db->where($data)->get('userevents')->result())==0){
			if($this->db->where('event_id',$event_id)->update('userevents',$toUpdate)){
				$this->session->set_flashdata('msg','Event Updated Successfully.');
			}else{
				$this->session->set_flashdata('err','Some Thing Went Wrong.');
			}
// 			}else{
// 				$this->session->set_flashdata('msg','Event Already Exists.');
// 			}
			
// 			echo 'dfdfd';
			redirect('Events');
			// INSERT INTO `userevents`(`event_id`, `event_name`, `event_category`, `event_start_date`, `event_end_date`, `event_fee`, `guide_lines`, `event_faq`, `coaches`, `ngos_`, `created_on`)/''
		
		}
		public function editEvent($event_id){
		    $data['userSessionData']=unserialize($this->session->userdata('adminData'));
			
            $data['category']=$this->db->get('event_category')->result();
			$data['eventDetail']=$this->db->where('event_id',$event_id)->get('userevents')->row();
			// $data['events']=$this->db->select('userevents.*')->where($condition)->order_by('userevents.event_start_date','asc')->get('userevents')->result();
			$this->load->view('layout/header',$data);
			$this->load->view('pages/editEvent');
			$this->load->view('layout/footer');
		}
		public function dltEvent(){
		    
            $condition=array('event_id'=>$this->input->post('event_id'));
            if($this->db->where($condition)->delete('userevents')){
                die(json_encode(array("code"=>1)));
            }else{
                die(json_encode(array("code"=>0)));
            }
            
            

		}
	
	}

?>