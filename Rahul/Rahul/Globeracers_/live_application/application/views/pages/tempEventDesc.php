

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="https://globeracers.com/wp-content/uploads/2020/09/cropped-logo-icon-512-x-512-270x270.png">
  <link rel="icon" type="image/png" href="https://globeracers.com/wp-content/uploads/2020/09/cropped-logo-icon-512-x-512-270x270.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Globeracers Login  
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url('Globeracers/')?>assets/css/bootstrap.min.css" rel="stylesheet" />

  <link href="<?=base_url('Globeracers/')?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url('Globeracers/')?>assets/demo/demo.css" rel="stylesheet" />
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
 
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css
" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Signika:wght@700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                        <script src="//geodata.solutions/includes/countrystatecity.js"></script>

 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" /> -->
 
 
 
 <meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com">
    
  <style>
  label{
      margin-bottom:0px;
  }
    .succBtn {
        background-color: #ffde16;
        padding: 12px 18px;
    }
    .succBtn:hover {
        color: #ffde16;
         padding: 12px 18px;
        background-color: #000;
    }
    .bg-primary {
        background-color: #ffde16 !important;
    }
    .navbar .navbar-collapse .nav-item a {
        color: black;
        font-size: 14px;
    }
    .nav li a{
        color:black;
    }
    .mar4{
        margin: 4px;
    }
    .pad2{
            padding: 9px 10px !important;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <!-- <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="https://globeracers.com/wp-content/uploads/2020/06/Logo1.png">
          </div>
          <p>CT</p> 
        </a> -->
        <a href="<?=base_url('Globeracers/')?>Dashboard" class="simple-text logo-normal">
          
          <div class="logo-image-big">
            <img src="https://globeracers.com/wp-content/uploads/2020/06/Logo1.png">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper" >
        <!--<ul class="nav">-->
        <!--  <li class="active">-->
        <!--    <a href="<?=base_url('Globeracers/')?>User/APIConnection" class="font-weight-bold">-->
        <!--      <i class="nc-icon nc-ruler-pencil"></i>-->
        <!--      <p style="color: maroon;">My Account</p>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--  <li >-->
        <!--    <a href="<?=base_url('Globeracers/')?>User/AllEvents" class="font-weight-bold">-->
        <!--      <i class="nc-icon nc-ruler-pencil"></i>-->
        <!--      <p style="color: maroon;">Current Events</p>-->
        <!--    </a>-->
        <!--  </li>-->
          
        <!--  <li>-->
        <!--    <a href="<?=base_url('Globeracers/')?>User/MyEvents" class="font-weight-bold">-->
        <!--      <i class="nc-icon nc-tile-56 "></i>-->
        <!--      <p style="color: maroon;">My Events</p>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--  <li>-->
        <!--    <a href="<?=base_url('Globeracers/')?>User/Result" class="font-weight-bold">-->
        <!--      <i class="nc-icon nc-single-02"></i>-->
        <!--      <p style="color: maroon;">Race Result</p>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--  <li>-->
        <!--    <a href="<?=base_url('Globeracers/')?>User/myUpComing" class="font-weight-bold">-->
        <!--      <i class="nc-icon nc-single-02"></i>-->
        <!--      <p style="color: maroon;">Upcoming Event</p>-->
        <!--    </a>-->
        <!--  </li>-->
        <!--   <li>-->
        <!--    <a href="<?=base_url('Globeracers/')?>User/Contact_us" class="font-weight-bold">-->
        <!--      <i class="nc-icon nc-single-copy-04"></i>-->
        <!--      <p style="color: maroon;">Contact Us</p>-->
        <!--    </a>-->
        <!--  </li> -->
         
        <!--</ul>-->
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-dark bg-primary">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <!-- <a class="navbar-brand" href="javascript:;">Paper Dashboard 2</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <!-- <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form> -->
            <ul class="navbar-nav">
<!--               <li class="nav-item">
                <a class="nav-link btn-magnify" href="javascript:;">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li> -->

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- <i class="nc-icon nc-share-66"></i> -->
                                 
                 
                  <!-- <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?=base_url('Globeracers/')?>User/Profile">Profile</a>
                  <a class="dropdown-item" href="<?=base_url('Globeracers/')?>logout">Log Out</a>                  
                  
                  <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                </div>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;">
                  <i class="nc-icon nc-share-66"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Log Out</span>
                  </p>
                </a>
              </li> -->
            </ul>
          </div>
        </div>
      </nav>
       
      <!-- End Navbar -->
      <div class="content">
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
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#registrationForm">Register Now</a>
                                <!--<a href="<?=base_url('User/registrationForm/').$description->event_id?>" class="btn btn-info">Register Now</a>-->
                            </p> 
                              
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
      <script>
          $(document).on('submit','#regForm',function(e){
              e.preventDefault();
              var formData=new FormData($(this)[0]);
              $.ajax({
                  url:"<?=base_url('API/temRegistration')?>",
                  type:"post",
                  cache:false,
                  contentType:false,
                  processData:false,
                  data:formData,
                  success:function(response){
                      console.log(response);
                      response=JSON.parse(response);
                      if(response.code==1){
                        //   if(response.regData.length>0){
                              
                        //   }
                        swal("Great", response.msg, "success");
                          try{
                              setInterval(function(){
                              window.location.href="<?=base_url('API/payumoney/')?>"+response.regData.reg_id;
                                //   location.reload();
                              },1000);
                          }catch(e){
                              
                          }
                          
                        //   
                      }else if(response.code==2){
                          swal("Oops", "Already Registered", "warning");
                      }
                      else{
                          swal("Oops", "Register Account", "error");
                          setInterval(function(){
                              window.location.href="<?=base_url()?>";
                            //   location.reload();
                          },2000);
                          
                      }
                    
                  }
              });
          });
      </script>
      <div id="registrationForm" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                
                <h4 class="modal-title font-weight-bold mt-0">Registration Form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                 <form id="regForm" method="post">
                    <div class="row d-none" >
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Event Name:</label>
                            <input type="text" class="form-control" name="event_name" value="<?=$description->event_name?> " readonly>
                            <input type="hidden" class="form-control" name="event_id" value="<?=$description->event_id?> " readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Will Be Held On:</label>
                            <input type="text" class="form-control" value="<?=$description->event_start_date?> " readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Distance:</label>
                            <input type="text" class="form-control" value="<?=$description->event_distance?> m (<?=$description->event_distance/1000?>  Km) " readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">First Name</label>
                            <input type="text" class="form-control"  name="first_name" placeholder="First Name" value="">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Middle Name</label>
                            <input type="text" class="form-control"  name="mid_name" placeholder="Middle Name" value="">
                        </div>
                        <div class="col-md-4 form-group">
                            <label class="font-weight-bold">Last Name</label>
                            <input type="text" class="form-control"  name="last_name" placeholder="Last Name" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label class="font-weight-bold">Participant Email</label>
                            <input type="email" class="form-control" name="participant_email" placeholder="Participant Email Id." value="" >
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="font-weight-bold">Phone Number</label>
                                </div>
                            </div>
                            <div class="row">
                                <!--<div class="col-md-12">-->
                                <!--    <label class="font-weight-bold">Phone Number</label>-->
                                <!--    <div class="d-flex">-->
                                <!--        <div class=" pr-0 text-center">-->
                                <!--            <select class="px-1 js-example-basic-single form-control "  name="country_code " id="country_code">-->
                                <!--              <option value="0">+91</option>-->
                                <!--            </select>-->
                                            
                                            <!--<input type="text" class="form-control" name="country_code" value="+91">-->
                                <!--        </div>-->
                                <!--        <div class=" pl-1 text-center">-->
                                <!--            <input type="text" class="form-control " name="phone_no" placeholder="123456789">-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-md-5">
                                    <select class="px-1 js-example-basic-single form-control "  name="country_code " id="country_code">
                                       
                                    </select>
                                    
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control " name="phone_no" placeholder="123456789">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="font-weight-bold">Team</label>
                            <select class="form-control" name="teamname_">
                                <option value="0">Select</option>
                                <?php foreach($teams as $team): ?>
                                    <option value="<?=$team->team_id?>"><?=$team->team_name?></option>
                                <?php endforeach;?>
                                
                            </select>
                        </div>
                       
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-6">
                           <div class="d-flex">
                                <input type="checkbox"  name="team_id" id="team_id" class="mar4"> <label class="font-weight-bold"> Create Your Own Team</label>
                           </div>
                            
                        </div>
                        <div class="col-md-6" >
                            <input type="text"  name="team_name" class="form-control" id="team_name" style="display:none" placeholder="Team Name"> 
                            
                        </div>
                    </div>
        
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
                            $(document).on('click','#team_id',function(){
                               if($(this).is(':checked')){
                                    // console.log("Checked");
                                    $("#team_name").show();  // checked
                                }else{
                                    // console.log("Not Checked");
                                    $("#team_name").hide();  // unchecked
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
                  
                  <div class="row">
                    <div class="col-md-12 text-center">
                        <!--<a href="<?=base_url('User/demo')?>" class="btn btn-info">Register Now</a>-->
                        <button type="submit" class="succBtn btn ">Register</button>
                    </div>
                   
                   
                  </div>
                 
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
              </div>
            </div>
        
          </div>
        </div>
   <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
             
            </nav>
            <div class="credits ml-auto">
              <!-- <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>
              </span> -->
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script>
      $.ajax({
            url:"https://restcountries.eu/rest/v2/all",
            success:function(response){
                // console.log(response);
                // response=JSON.parse(response);
                $('#country_code').empty();
                console.log(response.length);
                for(let i=0; i<response.length; i++){
                    var option='';
                    option+='<option value="+'+response[i].callingCodes[0]+'"> +'+response[i].callingCodes[0]+'</option>';
                    // console.log(option);
                    $('#country_code').append(option);
                }
                
            }
        });
  </script>
  
  <!--   Core JS Files   -->
  <script src="<?=base_url('Globeracers/')?>assets/js/core/jquery.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>









  <script src="<?=base_url('Globeracers/')?>assets/js/core/popper.min.js"></script>
  <script src="<?=base_url('Globeracers/')?>assets/js/core/bootstrap.min.js"></script>
  <script src="<?=base_url('Globeracers/')?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="<?=base_url('Globeracers/')?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?=base_url('Globeracers/')?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=base_url('Globeracers/')?>assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?=base_url('Globeracers/')?>assets/demo/demo.js"></script>
  
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>


      
  