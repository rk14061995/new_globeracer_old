<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                        <script src="//geodata.solutions/includes/countrystatecity.js"></script>
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <div class="content">
        <div class="row">
        
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Profile</h5>
                <hr>
                <?php
                    $email=$userSessionData[0]->user_email;
                    $user_Data=$this->db->where('user_email',$email)->get('user_details')->row();
                ?>
              </div>
              <div class="card-body">
                <form action="<?=base_url('User/updateProfile_')?>" method="post">
                   
                    <div class="row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">First Name</label>
                            <input type="text" class="form-control"  name="first_name" placeholder="First Name" value="<?=$user_Data->firstname?>">
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Middle Name</label>
                            <input type="text" class="form-control"  name="mid_name" placeholder="Middle Name" value="<?=$user_Data->middle_name?>">
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Last Name</label>
                            <input type="text" class="form-control"  name="last_name" placeholder="Last Name" value="<?=$user_Data->lastname?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Date of Birth</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control "  max="<?=date('Y-m-d')?>" id="dob_" name="dob_" placeholder="First Name" value="<?=$user_Data->firstname?>">
                        </div>
                        <div class="col-md-6">
                           
                            
                            <span id="age"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">Participant Email</label>
                            <input type="email" class="form-control" name="participant_email" placeholder="Participant Email Id." value="<?=$user_Data->user_email?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bold">Phone Number</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <select class="js-example-basic-single form-control"  name="country_code " id="country_code">
                                      <option value="0">Select</option>
                                    </select>
                                    
                                    <!--<input type="text" class="form-control" name="country_code" value="+91">-->
                                </div>
                                <div class="col-md-7 text-center">
                                    <input type="text" class="form-control" name="phone_no" placeholder="123456789" value="<?=$user_Data->contact_no?>">
                                </div>
                            </div>
                        </div>
        
                        <div class="col-md-4">
                            <label class="font-weight-bold">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="0">Select</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Other</option>
                                <option value="4">Prefer Not To Say</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Address</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="full_address"><?=$user_Data->full_address?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="font-weight-bold">Country</label>
                            <select name="country" class="countries form-control" id="countryId">
                                <option value="">Select Country</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">State</label>
                            <select name="state" class="states form-control" id="stateId">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">City</label>
                            <select name="city" class="cities form-control" id="cityId">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">Zip Code</label>
                            <input type="text" name="zip_code" class="form-control" placeholder="110017" value="<?=$user_Data->zip_code?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="font-weight-bold">Blood Group</label>
                            <input type="text" class="form-control" name="blood_group" placeholder="Blood Group" value="<?=$user_Data->blood_group?>">
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Emergency Contact Name</label>
                            <input type="text" class="form-control" name="emg_cont_name" placeholder="Emergency Contact Name" value="<?=$user_Data->emg_cont_name?>" >
                        </div>
                        <div class="col-md-4">
                            <label class="font-weight-bold">Emergency Contact Number</label>
                            <input type="text" class="form-control" name="emg_cont_no" placeholder="Emergency Contact Number" value="<?=$user_Data->emg_cont_no?>">
                        </div>
                       
                       
                    </div>
                    <!--12.	Any medicine allergies?-->
                    <!--    a.	If yes, there should be a field to fill the medicines they are allergic to.-->
                    <!--    13.	Any food allergies.-->
                    <!--    a.	If yes, there should be a field to fill in the names of foods they are allergic to.-->
                    <!--    14.	Have you had any surgeries that prevent you from participating in the event?-->
                    <!--    a.	If yes, there should be a warning stating that they should agree to get their doctor's clearance before participating in the race. -->
                    <!--    15.	Would you like to purchase a tee shirt?-->
                    <!--    a.	If yes, a pre-assigned amount of the tee shirt should be added to the total at the checkout.-->
                    <!--    b.	If yes, they should be able to choose a tee shirt size from the drop down list of sizes-->
                    <!--    i.	S-->
                    <!--    ii.	M-->
                    <!--    iii.	L-->
                    <!--    iv.	XL-->
                    <!--    16.	Do you want to donate to one of the non-profit organizations that we support? -->
                        <script>
                            $(document).on('click','#medice_allergy',function(){
                               if($(this).is(':checked')){
                                    // console.log("Checked");
                                    $("#medice_name").show();  // checked
                                }else{
                                    // console.log("Not Checked");
                                    $("#medice_name").hide();  // unchecked
                                } 
                            })
                            $(document).on('click','#food_allergy',function(){
                               if($(this).is(':checked')){
                                    // console.log("Checked");
                                    $("#food_name").show();  // checked
                                }else{
                                    // console.log("Not Checked");
                                    $("#food_name").hide();  // unchecked
                                } 
                            })
                            $(document).on('click','#any_surgery',function(){
                               if($(this).is(':checked')){
                                    // console.log("Checked");
                                    $("#surgery_name").show();  // checked
                                }else{
                                    // console.log("Not Checked");
                                    $("#surgery_name").hide();  // unchecked
                                } 
                            })
                            $(document).on('click','#any_tshirt',function(){
                               if($(this).is(':checked')){
                                    // console.log("Checked");
                                    $("#shirt_size").show();  // checked
                                }else{
                                    // console.log("Not Checked");
                                    $("#shirt_size").hide();  // unchecked
                                } 
                            })
                            
                            
                                
                        </script>
                    <div class="row mt-1">
                        <div class="col-md-4">
                            <input type="checkbox"  name="medice_allergy" id="medice_allergy"> <label class="font-weight-bold"> Any medicine allergies?</label>
                            
                        </div>
                        <div class="col-md-8" >
                            <input type="text"  name="medice_name" class="form-control" id="medice_name" style="display:none" placeholder="Medicine Name"> 
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="checkbox"  name="food_allergy" id="food_allergy"> <label class="font-weight-bold"> Any food allergies.?</label>
                            
                        </div>
                        <div class="col-md-8" >
                            <input type="text"  name="food_name" class="form-control" id="food_name" style="display:none" placeholder="Food Name"> 
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox"  name="any_surgery" id="any_surgery"> <label class="font-weight-bold"> Have you had any surgeries that prevent you from participating in the event?</label>
                            
                        </div>
                        <div class="col-md-6" >
                            <input type="text"  name="surgery_name" class="form-control" id="surgery_name" style="display:none" placeholder="Surgery Name"> 
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox"  name="any_tshirt" id="any_tshirt"> <label class="font-weight-bold"> Would you like to purchase a tee shirt?</label>
                            
                        </div>
                        <div class="col-md-6" >
                            <select class="form-control" style="display:none" name="shirt_size" id="shirt_size">
                                <option value="0">Select</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                           
                            
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                       
                        <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
                    </div>
                   
                   
                  </div>
                 
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      
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
        $.ajax({
            url:"https://restcountries.eu/rest/v2/all",
            success:function(response){
                // console.log(response);
                // response=JSON.parse(response);
                $('#country_code').empty();
                console.log(response.length);
                for(let i=0; i<response.length; i++){
                    var option='';
                    option+='<option value="'+response[i].callingCodes[0]+'"> +'+response[i].callingCodes[0]+' - '+response[i].name+'</option>';
                    // console.log(option);
                    $('#country_code').append(option);
                }
                
            }
        });
        $('#mob-gig-date-gteq').change(function() {
            var date = $(this).val();
            console.log(date, 'change')
        });
        $(document).on('change','#dob_',function(){
            // alert($(this).val());
            
            dob = new Date($(this).val());
            var today = new Date();
            var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
            $('#age').text(age+' years old');
            
            
            // const diffTime = Math.abs(date2 - date1);
            // const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
            // console.log(diffTime + " milliseconds");
            // console.log(diffDays + " days");
        });
        
        // $('#dob_').datepicker({
        //     onSelect: function(value, ui) {
        //         var today = new Date(), 
        //             age = today.getFullYear() - ui.selectedYear;
        //         $('#age').text(age);
        //     },
        //     maxDate: '+0d',
        //     changeMonth: true,
        //     changeYear: true,
        //     defaultDate: '-18yr',
        // });
      </script>
 