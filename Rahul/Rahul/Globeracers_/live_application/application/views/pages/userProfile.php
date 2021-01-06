
      <div class="content">
        <div class="row">
  
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">User Profile</h5>
              </div>
              <div class="card-body">
              
                 <form  action="<?=base_url('Profile/userProfile')?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-12">
                      <?php
                        //   if($this->session->flashdata('msg')){
                        //     echo '<div class="alert alert-success">'.$this->session->flashdata('msg').'</div>';
                        //   }
                        //   if($this->session->flashdata('err')){
                        //     echo '<div class="alert alert-danger">'.$this->session->flashdata('err').'</div>';
                        //   }
                      ?>
                    </div>
                  </div>
                  <div class="row mx-0">
                    <div class="col-md-2 p-1">
                      <div class="form-group">
                        
                        <img src="<?=base_url('assets/img/dummyuse.png')?>" class="img-fluid w-100">
                      </div>
                    </div>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control"  name="user_name"  value="<?=$userData->firstname?>" placeholder="First Name" value="First Name">
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Middle Name</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="Middle Name" value="<?=$userData->middle_name?>">
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="Last Name" value="<?=$userData->lastname?>">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="First Name " value="<?=$userData->firstname?>">
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="Contact Number" value="<?=$userData->contact_no?>">
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>User Type</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="User Type" value="<?=$userData->user_type?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="Country" value="<?=$userData->country?>">
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="State" value="<?=$userData->state?>">
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="City" value="<?=$userData->city?>">
                      </div>
                    </div>
                    <div class="col-md-3 p-1">
                      <div class="form-group">
                        <label>Zipcode</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="Zipcode" value="<?=$userData->zip_code?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    
                    <div class="col-md-12 p-1">
                      <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" class="form-control"  name="event_des" id="event_des" placeholder="Address">  
                        <?=$userData->full_address?>
                        </textarea>
                        <script>
                            CKEDITOR.replace( 'event_des' );
                        </script>
                        <!-- <input type="text"  placeholder="The name of the activity." value=""> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Sex</label>
                        <select class="form-control">
                            <option value="">Male</option>
                            <option value="">Female</option>
                            <option value="">Other</option>
                            <option value="">PreferSay</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>DOB</label>
                        <input type="date" class="form-control"  name="user_name" placeholder="State" value=" ">
                      </div>
                    </div>
                 
                   
                  </div>
                  <div class="row">
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Blood Group</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="Country" value="">
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Emg-cont-name</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="State" value=" ">
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label>Emg_cont_no</label>
                        <input type="text" class="form-control"  name="user_name" placeholder="City" value="">
                      </div>
                    </div>
                   
                  </div>
                   
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <!--<input type="submit" class="btn btn-primary btn-round" value="Update">-->
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
 