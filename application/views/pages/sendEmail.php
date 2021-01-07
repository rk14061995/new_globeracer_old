<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                        <script src="//geodata.solutions/includes/countrystatecity.js"></script>
                        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <div class="content">
        <div class="row">
        
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Contact Us</h5>
                <hr>
              </div>
              <div class="card-body">
                <form action="<?=base_url('User/sendMail')?>" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">From:</label>
                            <input type="email" class="form-control" name="from" placeholder="Participant Email Id." value="<?=$userSessionData[0]->user_email?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="font-weight-bold">To:</label>
                            <input type="email" class="form-control" name="to" placeholder="Participant Email Id." value="shivam0474@gmail.com" readonly>
                            <!-- <input type="email" class="form-control" name="to" placeholder="Participant Email Id." value="info@globeracers.com" readonly> -->
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
                            <textarea name="mail_ad" id="mail_ad"></textarea>
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
 