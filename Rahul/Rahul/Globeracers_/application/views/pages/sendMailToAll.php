<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
<script src="//geodata.solutions/includes/countrystatecity.js"></script>

      <div class="content">
        <div class="row">
        
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Send Mail</h5>
                <hr>
              </div>
              <div class="card-body">
                  <?php
                    if($this->session->flashdata('msg')){
                        echo '<div class="btn btn-success">'.$this->session->flashdata('msg').'</div>';
                    }
                    if($this->session->flashdata('err')){
                        echo '<div class="btn btn-danger">'.$this->session->flashdata('err').'</div>';
                    }
                    
                   
                  
                  ?>
                <form action="<?=base_url('Email/sendMail')?>" method="post">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">From:</label>
                            <input type="email" class="form-control" name="from" placeholder="Participant Email Id." value="info@globeracers.com" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bold">To:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label>To All</label><br>
                                    <input type="checkbox" value="all" id="sendToAll" name="all"> Send 
                                </div>
                                <div class="col-md-10">
                                    <label>To Particular Events User</label><br>
                                    <select class="form-control" name="event_id">
                                        <option value="0">Select Event</option>
                                        <?php foreach($events as $evt): ?>
                                            <option value="<?=$evt->event_id?>"><?=$evt->event_name?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <!--<input type="checkbox" value="all" id="sendToAll" name="all"> Send To All-->
                                </div>
                                <!--<div class="col-md-9">-->
                                <!--    <label>Selected User</label><br>-->
                                <!--    <select class="js-example-basic-multiple form-control" name="to[]" multiple="multiple">-->
                                <!--        <?php foreach($oldUser as $oldData): ?>-->
                                <!--          <option value="<?=$oldData->user_email?>"><?= ucwords($oldData->firstname)?></option>-->
                                <!--        <?php endforeach;?>-->
                                      <!--<option value="WY">Wyoming</option>-->
                                <!--    </select>-->
                                    <!--<input type="email" class="form-control" name="from" placeholder="Participant Email Id." value="" >-->
                                <!--</div>-->
                            </div>
                            
                            
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Subject:</label>
                            <input type="text" class="form-control" name="subject_email" placeholder="Subject" >
                        </div>
                    </div>
                    <div class="row my-1">
                        <div class="col-md-12">
                            <label class="font-weight-bold">Message:</label>
                            <textarea name="mail_message" id="mail_ad" class="form-control"></textarea>
                            <script>
                                CKEDITOR.replace( 'mail_ad' );
                            </script>
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                        <!--<a href="<?=base_url('User/demo')?>" class="btn btn-info">Register Now</a>-->
                        <button type="submit" class="btn btn-primary btn-round">Send Mail</button>
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
        // $(document).ready(function() {
            // setInterval(function(){
            //     console.log("refersh");
            //     location.reload();
            // },10000);
        // });
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
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
            $('#age').val(age+' years old');
            
            
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
 