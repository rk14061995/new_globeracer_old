
      <div class="content">
        <div class="row">
         <script type="text/javascript">
           $(document).on('submit','#createEvent',function(e){
            e.preventDefault();
            var formData= new FormData($(this)[0]);
            // console.log(formData);
            // formData.append('access_token','9b444caf81da907f30aa0fc014ea1d440733c10d');
            // formData.append('code','9b444caf81da907f30aa0fc014ea1d440733c10d');
            $.ajax({
              url:"https://www.strava.com/api/v3/activities",
              headers: {
                "Authorization": "Bearer 9b444caf81da907f30aa0fc014ea1d440733c10d"
              },
              cache:false,
              processData:false,
              contentType:false,
              type:"post",
              data:formData,
              success:function(response){
                console.log(response);
              }
            })
             // action="https://www.strava.com/api/v3/activities" method="post"
           });
         </script>
          <div class="col-md-12">
              
            <div class="card card-user p-3">
              <div class="card-header">
                <h5 class="card-title">Update Event: <span class="text-danger"><?=$eventDetail->event_name?></span> (<?=$eventDetail->event_status?>)</h5> 
              </div>
              <div class="card-body">
            
                 <form  action="<?=base_url('Events/updateEvent')?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                      
                      <input type="hidden" value="<?=$eventDetail->event_id?>" name="event_id">
                    <div class="col-md-12">
                      <?php
                          if($this->session->flashdata('msg')){
                            echo '<div class="alert alert-success">'.$this->session->flashdata('msg').'</div>';
                          }
                          if($this->session->flashdata('err')){
                            echo '<div class="alert alert-danger">'.$this->session->flashdata('err').'</div>';
                          }
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="event_name" placeholder="The name of the activity." value="<?=$eventDetail->event_name?>">
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>Category</label>
                        <!-- <label>Category</label> -->
                        <select class="form-control" name="event_cate">
                          <option value="0">Select</option>
                          <?php foreach($category as $cat): ?>
                          <?php
                            if($eventDetail->event_category==$cat->category_id){
                                echo '<option value="'.$cat->category_id.'" selected>'.$cat->category_name.'</option>';
                            }else{
                                echo '<option value="'.$cat->category_id.'" selected>'.$cat->category_name.'</option>';
                            }
                          
                          ?>
                           
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>Venue</label>
                        <input type="text" class="form-control" name="event_venue" placeholder="Event Venue" value="<?=$eventDetail->event_venue?>">
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>Change Status</label>
                        <select class="form-control" name="act_deact" id="activate_event">-->
                            <option value="0">Select</option>
                            <option value="1" >Active</option>
                            <option value="2">In-Active</option>
                        </select>
                      </div>
                    </div>
                    

                  </div>
                  <script>
                       $(document).on('change','#activate_event', function (){
                        //   alert(" Activated ");
                           var changeStatus=$(this).val();
                          var eventId='<?=$eventDetail->event_id?>';
                           $.ajax({
                               url:"<?=base_url('Events/updateEventStatus')?>",
                               type:"post",
                               data:{status:changeStatus, event_id:eventId},
                               success:function(response){
                                   console.log(response);
                                   response=JSON.parse(response);
                                   if(response.code==1){
                                       swal("Success", "Event Status Updated", "success");
                                   }else{
                                       swal("Error", "Something Went Wrong", "error");
                                   }
                                   setInterval(function(){
                                       location.reload();
                                   },2000);
                                   
                               }
                           });
                       });
                   </script>
                  <div class="row">
                    
                    <div class="col-md-12 p-1">
                      <div class="form-group">
                        <label>Description</label>
                        <!--<textarea class="form-control" class="form-control"  name="event_des" placeholder="The name of the activity.">-->
                        <!--    <?=$eventDetail->event_des?>                        -->
                        <!--</textarea>-->
                        <textarea name="event_des" id="event_des"><?=$eventDetail->event_des?></textarea>
                        <script>
                            CKEDITOR.replace( 'event_des' );
                        </script>
                        <!-- <input type="text"  placeholder="The name of the activity." value=""> -->
                      </div>
                    </div>
                    
                    

                  </div>
                   <div class="row">
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control" name="start_date_local" value="<?=$eventDetail->event_start_date?>" >
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" class="form-control" name="end_date_local" value="<?=$eventDetail->event_end_date?>" >
                      </div>
                    </div>
                    <div class="col-md-6 pr-1">
                        <div class="form-group">
                            
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Event Fee (INR)</label>
                                    <input type="number" class="form-control" placeholder=" 0" value="<?=$eventDetail->event_fee?>" name="fee">
                                </div>
                                <div class="col-md-6">
                                    <label>Event Fee (USD)</label>
                                    <input type="number" class="form-control" placeholder=" 0" value="<?=$eventDetail->event_fee_usd?>" name="fee_usd">
                                </div>
                            </div>
                                
                           
                            
                          </div>
                    </div>
                    <!--<div class="col-md-3 pr-1">-->
                    <!--  <div class="form-group">-->
                    <!--    <label>Distance(m)</label>-->
                    <!--    <input type="number" class="form-control" placeholder="0" value="<?=$eventDetail->event_distance?>" name="event_distance">-->
                    <!--  </div>-->
                    <!--</div>-->
                   
                  </div>
                  <div class="row">
                    <div class="col-md-6 p-1">
                      <div class="form-group">
                        <label>Set Guidelines</label>
                        <textarea name="set_guidelines" id="set_guidelines"><?=$eventDetail->guide_lines?></textarea>
                        <script>
                            CKEDITOR.replace( 'set_guidelines' );
                        </script>
                        <!-- <textarea class="form-control" name="set_guidelines"></textarea> -->
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                    <div class="col-md-6 p-1">
                      <div class="form-group">
                        <label>Add FAQ</label>
                        <!-- <textarea class="form-control" name="add_faq"></textarea> -->
                        <textarea name="add_faq" id="add_faq"><?=$eventDetail->event_faq?></textarea>
                        <script>
                            CKEDITOR.replace( 'add_faq' );
                        </script>
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 px-2">
                      <div class="form-group">
                        <label>Coaches/Nutritionist</label>
                        <input type="text " class=" form-control" name="coach_nutri" placeholder="Ener Coach Name">
                        <!--<select class="js-example-basic-single form-control" name="coach_nutri">-->
                        <!--  <?php foreach($Coaches_Nutritionist as $coach): ?>-->
                        <!--    <option value="<?=$coach->user_id?>"><?=$coach->user_fullname?></option>-->
                        <!--  <?php endforeach; ?>-->
                          
                        <!--</select>-->
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                    <div class="col-md-6 px-3">
                      <div class="form-group">
                        <label>NGO</label>
                        <input type="text " class=" form-control" name="ngo_" placeholder="Enter NGO Name">
                        <!--<select class="js-example-basic-single form-control" name="ngo_">-->
                        <!--  <?php foreach($Ngo as $ng): ?>-->
                        <!--    <option value="<?=$ng->user_id?>"><?=$ng->user_fullname?></option>-->
                        <!--  <?php endforeach; ?>-->
                        <!--</select>-->
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 p-1">
                      <div class="form-group">
                        <label>Upload Video/Image</label>
                        <br>
                        <input type="file" name="eventImage" class="" style="opacity: 1; position:unset" name="trainer" >
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <input type="submit" class="btn btn-primary btn-round" value="Update">
                      <!-- <button type="submit" class="btn btn-primar/y btn-round">Create</button> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

      </script>
 