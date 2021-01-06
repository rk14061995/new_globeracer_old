
      <div class="content">
       <!--<div class="row">-->
       <!--    <div class="col-md-4">-->
       <!--        <div class="card">-->
       <!--            sdf-->
       <!--        </div>-->
       <!--    </div>-->
       <!--    <div class="col-md-4">-->
       <!--        <div class="card">-->
       <!--            sdf-->
       <!--        </div>-->
       <!--    </div>-->
       <!--</div>-->
        <div class="row">
          
            <div class="col-md-12">
              <div class="card">
                <div class="card-header font-weight-bold">
                  <?=ucwords($description->event_name)?>
                  <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?=base_url('assets/img/eventsImage/').$description->event_image?>" width="100%" style="max-height:280px">
                        </div>
                        <div class="col-md-6">
                            <p>
                                <label class="font-weight-bold">Organiser:</label> <?=$description->firstname.' '.$description->lastname?>
                              </p>
                              <p>
                                <label class="font-weight-bold">Price:</label> <span>&#8377; </span> <?=$description->event_fee?>
                              </p>
                              <p>
                                <label class="font-weight-bold">Distance:</label> <?=$description->event_distance?> m / (<?=($description->event_distance/1000).'Km'?>)
                              </p>
                              <p class="font-weight-bold ">
                                <i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-success">
                                  <?=date('d F, Y', strtotime($description->event_start_date)) ?></span>  to  <span class="text-danger"><?=date('d F, Y', strtotime($description->event_end_date)) ?></span> 
                              </p>
                              <p>
                                <i class="fa fa-globe" aria-hidden="true"></i> <span class="text-success"><?=$description->event_venue?>  </span>
                              </p>
                              <hr>
                              <?php if($userSessionData[0]->user_type!="Admin"): ?>
                               <p>
                                   <?php 
                                   $res=$this->db->where('id_table',$userSessionData[0]->id_table)->get('user_details')->row();
                                    $condition=array(
                                                        "user_id"=>$res->id_table,
                                                        "event_id"=>$description->event_id,
                                                    );
                                                
                                //         $user=unserialize($this->session->userdata('userData'));
                            		  //  $res=$this->db->where('id_table',$user[0]->id_table)->get('user_details')->row();
                            		  //  $condition=array("race_registeration.user_id"=>$res->user_id,"race_registeration.amoun_status"=>"Pending");
                            		  $regDe=$this->db->where($condition)->get('race_registeration')->result();
                                    if(count($regDe)==0){
                                        ?>
                                            <a href="<?=base_url('User/registrationForm/').$description->event_id?>" class="btn btn-info">Register Now</a>
                                        <?php
                                    }else{
                                        if($regDe[0]->amoun_status=="Pending"){
                                            echo '<a href="'.base_url('User/payNow/').$regDe[0]->reg_id.'" class="btn btn-success">Pay Fee</a>';
                                        }else{
                                            echo '<div class="alert alert-info">Already Applied</div>';
                                        }
                                        
                                    }
                                   
                                   ?>
                                  
                                </p> 
                              <?php endif;?>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col-md-12">
                            
                            <label class="font-weight-bold">Description: </label>
                            <br>
                             <?=$description->event_des?> 
                          
                          
                            <br>
                            <label class="font-weight-bold">Guidelines</label><br>
                             <?=$description->guide_lines?> 
                             <br >
                            <label class="font-weight-bold">Event FAQs</label><br>
                             <?=$description->event_faq?> 
                              
                        </div>
                        
                    </div>
                </div>
                
              </div>
            </div>
          
          
        </div>
       
      </div>
  