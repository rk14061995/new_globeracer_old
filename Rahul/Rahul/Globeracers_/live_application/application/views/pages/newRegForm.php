<?php

$merchantKey='QQypU6ma';
$saltKey='v3iRO6zZVM';

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
// 	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .base_url('Payments/response');
	return base_url('API/response');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com">
	<title>Globeracers Event Registration </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
     <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style type="text/css">
        
        /* sign in FORM */
        #logreg-forms{
            width:412px;
            margin:10vh auto;
            background-color:#f3f3f3;
            box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
          transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        }
        #logreg-forms form {
            width: 100%;
            max-width: 410px;
            padding: 15px;
            margin: auto;
        }
        #logreg-forms .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        #logreg-forms .form-control:focus { z-index: 2; }
        #logreg-forms .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        #logreg-forms .form-signin input[type="password"] {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        #logreg-forms .social-login{
            width:390px;
            margin:0 auto;
            margin-bottom: 14px;
        }
        #logreg-forms .social-btn{
            font-weight: 100;
            color:white;
            width:190px;
            font-size: 0.9rem;
        }

        #logreg-forms a{
            display: block;
            padding-top:10px;
            color:lightseagreen;
        }

        #logreg-form .lines{
            width:200px;
            border:1px solid red;
        }


        #logreg-forms button[type="submit"]{ margin-top:10px; }

        #logreg-forms .facebook-btn{  background-color:#3C589C; }

        #logreg-forms .google-btn{ background-color: #DF4B3B; }

        /*#logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }*/

        #logreg-forms .form-signup .social-btn{ width:210px; }

        #logreg-forms .form-signup input { margin-bottom: 2px;}

        .form-signup .social-login{
            width:210px !important;
            margin: 0 auto;
        }

        /* Mobile */

        @media screen and (max-width:500px){
            #logreg-forms{
                width:300px;
            }
            
            #logreg-forms  .social-login{
                width:200px;
                margin:0 auto;
                margin-bottom: 10px;
            }
            #logreg-forms  .social-btn{
                font-size: 1.3rem;
                font-weight: 100;
                color:white;
                width:200px;
                height: 56px;
                
            }
            #logreg-forms .social-btn:nth-child(1){
                margin-bottom: 5px;
            }
            #logreg-forms .social-btn span{
                display: none;
            }
            #logreg-forms  .facebook-btn:after{
                content:'Facebook';
            }
          
            #logreg-forms  .google-btn:after{
                content:'Google+';
            }
            
        }
        .abcRioButton {
            width:100% !important;
        }
        .colYel{
            color: #ffde16;
        }
        .signupbtn{
            color: #ffde16;
            padding: 12px;
            background-color: #000;
        }
        .signupbtn:hover{
            background-color: #ffde16;
            padding: 12px;
            color:black;
        } 
        
        .succBtn{
            background-color: #ffde16;
            padding: 12px;
        } 
        .succBtn:hover{
            color: #ffde16;
            padding: 12px;
            background-color: #000;
        }
        .mar4{
            margin: 6px;
        }
    </style>
</head>
<body>
	<div class="container-fluid">
	    <div class="">
	        <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="https://globeracers.com/">
                  <img src="https://globeracers.com/wp-content/uploads/2020/06/Logo1.png" class=" img-fluid" width="200px">
              </a>
              <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
              <!--  <span class="navbar-toggler-icon"></span>-->
              <!--</button>-->
            
              <!--<div class="collapse navbar-collapse" id="navbarSupportedContent">-->
              <!--  <ul class="navbar-nav mr-auto">-->
              <!--    <li class="nav-item active">-->
              <!--      <a class="nav-link" href="#">About us <span class="sr-only">(current)</span></a>-->
              <!--    </li>-->
              <!--    <li class="nav-item">-->
              <!--      <a class="nav-link" href="#">Link</a>-->
              <!--    </li>-->
              <!--    <li class="nav-item dropdown">-->
              <!--      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
              <!--        Dropdown-->
              <!--      </a>-->
              <!--      <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
              <!--        <a class="dropdown-item" href="#">Action</a>-->
              <!--        <a class="dropdown-item" href="#">Another action</a>-->
              <!--        <div class="dropdown-divider"></div>-->
              <!--        <a class="dropdown-item" href="#">Something else here</a>-->
              <!--      </div>-->
              <!--    </li>-->
              <!--    <li class="nav-item">-->
              <!--      <a class="nav-link disabled" href="#">Disabled</a>-->
              <!--    </li>-->
              <!--  </ul>-->
              <!--  <form class="form-inline my-2 my-lg-0">-->
              <!--    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
              <!--    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
              <!--  </form>-->
              <!--</div>-->
              <?php
                if(count($userSessionData)>0){
                    
                }
              ?>
              
            </nav>
	    </div>
	    
	    
        <div class="row mt-2 pt-5" id="clikLOg">
	        <div class="col-md-6 offset-md-3">
	            <div class="card">
	                <div class="card-header">
	                    
	                    <?php
	                         if(count($userSessionData)>0){
                	            $uds=unserialize($this->session->userdata('userData'));
                	           // print_r($uds);
                	            $DDat=$userSessionData[0];
                	            $fname=$DDat->firstname;
                	            $mname=$DDat->middle_name;
                	            $lname=$DDat->lastname;
                	            $email=$DDat->user_email;
                	            $phone=$DDat->contact_no;
                	            $country_code=$DDat->country_code;
                	            echo '<a href="'.base_url('API/log_Out').'">Log Out</a>';
                	        }else{
                	            $fname="";
                	            $mname="";
                	            $lname="";
                	            $email="";
                	            $phone="";
                	            $country_code="";
                	            echo '<a href="javascript:void(0)" id="loginModal" >Click here to Log In</a>';
                	        }
	                    
	                    ?>
	                    
	                </div>
	            </div>
	            
	            
	        </div>
	        
	    </div>
	         
	    
        <div class="row " id="registrationFormDiv">
          
            <div class="col-md-6 offset-md-3">
              <div class="card">
                <div class="card-header font-weight-bold">
                  Register For : <?=ucwords($description->event_name)?>
                  <!--<hr>-->
                </div>
                <div class="card-body">
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
                                <input type="text" class="form-control"  name="first_name" id="first_name" placeholder="First Name" value="<?=$fname?>" required>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="font-weight-bold">Middle Name</label>
                                <input type="text" class="form-control"  name="mid_name" id="mid_name" placeholder="Middle Name" value="<?=$mname?>" >
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="font-weight-bold">Last Name</label>
                                <input type="text" class="form-control"  name="last_name" id="last_name" placeholder="Last Name" value="<?=$lname?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold">Participant Email</label>
                                <input type="email" class="form-control" name="participant_email" id="participant_email" placeholder="Participant Email Id." value="<?=$email?>" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="font-weight-bold">Phone Number</label>
                                    </div>
                                </div>
                                <div class="row">
                              
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="country_code " value="<?=$country_code?>">
                                        <!--<select class="px-1 js-example-basic-single form-control "  name="country_code " id="country_code">-->
                                           
                                        <!--</select>-->
                                        
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" class="form-control " name="phone_no" id="phone_no" placeholder="<?=$phone?>">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <script>
                            $(document).on('keypress','#participant_email',function(){
                                var keyPressed=$(this).val();
                                // console.log("fff : "+keyPressed);
                                $('#user_nameee').val(keyPressed);
                            });
                            $(document).on('click','#user_nameee',function(){
                                // var keyPressed=$(this).val();
                                // console.log("fff : "+keyPressed);
                                $('#user_nameee').val($('#participant_email').val());
                            });
                        </script>
                        <?php
                            if(count($userSessionData)==0){
                                ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="font-weight-bold">Username</label>
                                            <input type="text" class="form-control" name="user_nameee" id="user_nameee" placeholder="Username">
                                        </div>
                                        <div class="col-md-6" id="pswd_field">
                                            <label class="font-weight-bold">Password</label>
                                            <input type="password" class="form-control" name="user_password" id="user_password" placeholder="*********">
                                        </div>
                                    </div>
                                <?php
                            }
                        
                        ?>
                        
                        <div class="row" id="selTeam">
                            <div class="col-md-12 form-group">
                                <label class="font-weight-bold">Select Team</label>
                                <select class="form-control" name="teamname_">
                                    <option value="0">Select</option>
                                    <?php foreach($teams as $team): ?>
                                        <option value="<?=$team->team_id?>"><?=$team->team_name?></option>
                                    <?php endforeach;?>
                                    
                                </select>
                            </div>
                           
                        </div>
                        <div class="row mt-1 mb-3">
                            <div class="col-md-6">
                               <div class="d-flex">
                                    <input type="checkbox"  name="team_id" id="team_id" class="mar4"> <label class="font-weight-bold"> Or Create Your Own Team</label>
                               </div>
                                
                            </div>
                            <div class="col-md-6" >
                                <input type="text"  name="team_name" class="form-control" id="team_name" style="display:none" placeholder="Team Name"> 
                                
                            </div>
                        </div>
                        <div class="row " >
                            <table class="table ">
                                <tr class="text-center">
                                    <td>Event Fee</td>
                                    <td>&#8377; <?=$description->event_fee?></td>
                                </tr>
                                <tr class="text-center">
                                    <td>convenience  Fee</td>
                                    <td>&#8377; 19.95</td>
                                </tr>
                                <tr class="text-center">
                                    <td>Total</td>
                                    <td>&#8377; <?=$description->event_fee+19.95?></td>
                                </tr>
                            </table>
                        </div>
                       
                      <div class="row">
                        <div class="col-md-12 text-center">
                            <!--<a href="<?=base_url('User/demo')?>" class="btn btn-info">Register Now</a>-->
                            <button type="submit" class="succBtn btn font-weight-bold px-3 btn-success">Pay Now</button>
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
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="#" id="payment_form">
                    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
                    <!--<div class="dv">-->
                    <!--<span class="text"><label>Merchant Key:</label></span>-->
                    <!--<span><input type="text" id="key" name="key" placeholder="Merchant Key" value="<?=$merchantKey?>" /></span>-->
                    <!--</div>-->
                    
                    <!--<div class="dv">-->
                    <!--<span class="text"><label>Merchant Salt:</label></span>-->
                    <!--<span><input type="text" id="salt" name="salt" placeholder="Merchant Salt" value="<?=$saltKey?>" /></span>-->
                    <!--</div>-->
                    
                   <label>Transaction/Order ID:</label>
                    <input type="text" id="txnid" class="form-control" name="txnid" placeholder="Transaction ID" value="<?php echo  "REF-" . date('dmYhis')?>" />
                    <label>Amount:</label>
                    <input type="text" id="amount" class="form-control" name="amount" placeholder="Amount" value="<?=$description->event_fee+19.95?>" />    
                    <input type="hidden" id="pinfo" class="form-control" name="pinfo" placeholder="Product Info" value="<?=$description->event_id?>" />
                    <label>Full Name:</label>
                    <input type="text" id="fname" class="form-control" name="fname" placeholder="Full Name" value="" />
                    <label>Email ID:</label>
                    <input type="text" id="email" class="form-control" name="email" placeholder="Email ID" value="" />
                    <label>Mobile/Cell Number:</label>
                    <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile/Cell Number" value="" />
                    <!--<label>Hash:</label>-->
                    <input type="text" id="hash" class="form-control" name="hash" placeholder="Hash" value="" />
                    <hr>
                    <input type="submit" class="btn btn-info" value="Pay" onclick="launchBOLT(); return false;" />
                </form>
            </div>
        </div>
        <div id="fb-root"></div>

        <div id="logreg-forms" >
            
                
                <form id="regUser" method="post" class="form-signup" >
                    <div class="social-login">
                        <?php
                            if($this->session->flashdata('msg')){
                                echo '<div class="alert alert-success">'.$this->session->flashdata('msg').'</div>';
                            }
                            if($this->session->flashdata('err')){
                                echo '<div class="alert alert-danger">'.$this->session->flashdata('err').'</div>';
                            }
                        ?>
                        <!-- <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign up with Facebook</span> </button> -->
                    </div>
                    <div class="social-login">
                        <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                        <!-- <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign up with Google+</span> </button> -->
                    </div>
                    
                   
            
                    <input type="text" name="user-name" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="">
                    <input type="email" name="user-email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
                    <input type="password" name="user-pass" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
                    <input type="password" name="user-repeatpass" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required autofocus="">
                    <select class="form-control" name="user_type">
                        <option>Select User Type</option>
                        <option value="1">Normal</option>
                        <option value="2">NGO</option>
                        <option value="3">Coaches_Nutritionist</option>
                        <!--<option value="4">Admin</option>-->
                    </select>
                    <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
                    <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
                </form>
                <br>
                
        </div>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">User Login</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
             <form class="form-signin" id="signIn" >
                <h1 class="h3 mb-3 font-weight-bold" style="text-align: center"> Sign in</h1>
                 
                <div class="social-login">
                    <div class="g-signin2" data-onsuccess="onSignIn"></div>
                    <!--<div class="g-signin2" data-onsuccess="onSignIn"></div>-->
                 
                    <!-- <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button> -->
                </div>
                <div class="social-login">
                    <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
                </div>
                
                <!--<p style="text-align:center"> OR  </p>-->
                <input type="email" id="inputEmail" class="form-control" name="user_email" placeholder="Email address" required="" autofocus="">
                <input type="password" id="inputPassword" class="form-control" name="user_pwd" placeholder="Password" required="">
                
                <button class="btn succBtn btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                <!--<a href="#" id="forgot_pswd">Forgot password?</a>-->
                <hr>
                <!-- <p>Don't have an account!</p>  -->
                <!--<button class="btn signupbtn btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button>-->
                </form>
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
          </div>
        </div>
    
      </div>
    </div>
    <div id="myModalLogin" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
          </div>
        </div>
    
    <script>
        $(document).on('click','#loginModal',function(){
            $('#myModal').modal('show');
        })
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="e4GUJkB3"></script>
    <script>
    $(document).ready(function(){
        $('#logreg-forms').hide();
        $('#registrationFormDiv').show();
        $('#payment_form').hide();
        
            $("#team_id").change(function() {
                if($(this).prop('checked')) {
                    $("#selTeam").hide();
                    $("#team_name").show();
                } else {
                    $("#selTeam").show();
                    $("#team_name").hide();
                }
            });
    });
        function onSignIn(googleUser) {
          var profile = googleUser.getBasicProfile();
        //   console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
        //   console.log('Name: ' + profile.getName());
        //   console.log('Image URL: ' + profile.getImageUrl());
        //   console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
          const userData={
              id:profile.getId(),
              name:profile.getName(),
              image:profile.getImageUrl(),
              email:profile.getEmail()
          }
          $.ajax({
                url:"<?=base_url('API/googleLogin')?>",
                type:"post",
                data:userData,
               
                success: function(response) {
                    // alert("responseData")
                    //console.log(response);
                    
                    response=JSON.parse(response);
                    if(response.code==1){
                              console.log(response.data);
                               $('#myModal').modal('hide');
                             $('#first_name').val(response.data[0].firstname);
                              $('#mid_name').val(response.data[0].middle_name);
                              $('#last_name').val(response.data[0].lastname);
                              $('#participant_email').val(response.data[0].user_email);
                              $('#phone_no').val(response.data[0].contact_no);
                              $('#user_nameee').val(response.data[0].user_email);
                        //location.reload();
                        // swal("Great", "Redirecting You To The Dashboard", "success");
                        
                    }else{
                        swal("Ooopss.!!", "Something Went Wrong.", "error");
                    }
                }
            })
        }
    </script>
    <script>
        $(document).on('click','#team_id',function(){
           if($(this).is(':checked')){
                // console.log("Checked");
                $("#team_name").show();  // checked
            }else{
                // console.log("Not Checked");
                $("#team_name").hide();  // unchecked
            } 
        })
        $.ajax({
            url:"https://restcountries.eu/rest/v2/all",
            success:function(response){
                // console.log(response);
                // response=JSON.parse(response);
                $('#country_code').empty();
                // console.log(response.length);
                for(let i=0; i<response.length; i++){
                    var option='';
                    option+='<option value="+'+response[i].callingCodes[0]+'"> +'+response[i].callingCodes[0]+'</option>';
                    // console.log(option);
                    $('#country_code').append(option);
                }
            }
        });
        $(document).on('submit','#regForm',function(e){
            var fname=$("#first_name").val();
            var midname=$("#mid_name").val();
            // alert(fname);
            var lastname=$("#last_name").val();
            var emaill=$("#participant_email").val();
            var Phone=$("#phone_no").val();
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
                            //console.log(response);
                            response=JSON.parse(response);
                            if(response.code==1){
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
                                swal("Sorry", response.msg, "warning");
                                $("#fname").val(fname+' '+midname+' '+lastname);
                                window.location.href="<?=base_url('API/payumoney/')?>"+response.regData.reg_id;
                                // $('#myModalLogin').modal('show'); 
                                // $("#").val(midname);
                                // $("#").val(lastname);
                                // $("#email").val(emaill);
                                // $("#mobile").val(Phone);
                                // $('#registrationFormDiv').hide();
                            //   $("#payment_form").show();
                            }else if(response.code==12){
                                swal("Hey!", "Please Register First.", "warning");
                                //Show User Reg Form
                                $("#user-name").val(fname+' '+midname+' '+lastname);
                                // $("#reg_id").val(response.regData.reg_id);
                                // $("#").val(midname);
                                // $("#").val(lastname);
                                $("#user-email").val(emaill);
                                $("#mobile").val(Phone);
                                $('#registrationFormDiv').hide();
                                $('#logreg-forms').show();
                                $("#payment_form").hide();
                            }else{
                                $("#user-email").val(emaill);
                                $("#user-name").val(fname+' '+midname+' '+lastname);
                                $('#registrationFormDiv').hide();
                                  
                                  
                                //   setInterval(function(){
                                swal("Something Went Wrong", "Already Registered", "warning");
                                //     //   window.location.href="<?=base_url()?>";
                                //     //   location.reload();
                                //   },2000);
                                  
                            }
                        
                      }
                  });
          });
          $(document).on('submit','#signIn',function(e){
            
              e.preventDefault();
              var formData=new FormData($(this)[0]);
              $.ajax({
                      url:"<?=base_url('API/userLoginValidate')?>",
                      type:"post",
                      cache:false,
                      contentType:false,
                      processData:false,
                      data:formData,
                      success:function(response){
                          console.log(response);
                          response=JSON.parse(response);
                          if(response.code==1){
                                  
                              $('#first_name').val(response.data[0].firstname);
                              $('#mid_name').val(response.data[0].middle_name);
                              $('#last_name').val(response.data[0].lastname);
                              $('#participant_email').val(response.data[0].user_email);
                              $('#phone_no').val(response.data[0].contact_no);
                              $('#user_nameee').val(response.data[0].user_email);
                              $('#clikLOg').hide();
                              $('#pswd_field').hide();
                              $('#myModal').modal('hide');
                          }else{
                              swal("Sorry", "Invalid Email/Passwrod ", "warning");
                          }
                        
                      }
                  });
          });
          $(document).on('submit','#regUser',function(e){
            
              e.preventDefault();
              var formData=new FormData($(this)[0]);
              $.ajax({
                      url:"<?=base_url('API/registerNewUser')?>",
                      type:"post",
                      cache:false,
                      contentType:false,
                      processData:false,
                      data:formData,
                      success:function(response){
                          console.log(response);
                          response=JSON.parse(response);
                          if(response.code==1){
                            //   $('#registrationFormDiv').show();
                                var formData=new FormData($('#regForm')[0]);
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
                                              swal("Sorry", "Email Id does not exist. Please Register to Apply for Event.", "warning");
                                              $("#fname").val(fname+' '+midname+' '+lastname);
                                                // $("#").val(midname);
                                                // $("#").val(lastname);
                                                $("#email").val(emaill);
                                                $("#mobile").val(Phone);
                                              
                                              $('#registrationFormDiv').hide();
                                              $("#payment_form").show();
                                          }else if(response.code==12){
                                              //Show User Reg Form
                                                $("#user-name").val(fname+' '+midname+' '+lastname);
                                                $("#reg_id").val(response.regData.reg_id);
                                                // $("#").val(midname);
                                                // $("#").val(lastname);
                                                $("#user-email").val(emaill);
                                                $("#mobile").val(Phone);
                                                 $('#registrationFormDiv').hide();
                                              $('#logreg-forms').show();
                                               $("#payment_form").hide();
                                          }else{
                                              $("#user-email").val(emaill);
                                                $("#user-name").val(fname+' '+midname+' '+lastname);
                                              $('#registrationFormDiv').hide();
                                              
                                              
                                            //   setInterval(function(){
                                                swal("Something Went Wrong", "Already Registered", "warning");
                                            //     //   window.location.href="<?=base_url()?>";
                                            //     //   location.reload();
                                            //   },2000);
                                              
                                          }
                                        
                                      }
                                  });
                            //   swal("Great", response.msg, "success");
                          }else{
                              swal("Something Went Wrong", response.msg, "error");
                          }
                      }
                  });
          });
    </script>
    <script type="text/javascript"><!--
        $('#payment_form').bind('keyup blur', function(){
        	$.ajax({
                  url: '<?=base_url('API/payumoney/').$description->event_id?>',
                  type: 'post',
                  data: JSON.stringify({ 
                    key: '<?=$merchantKey?>',
        			salt: '<?=$saltKey?>',
        			txnid: $('#txnid').val(),
        			amount: $('#amount').val(),
        		    pinfo: $('#pinfo').val(),
                    fname: $('#fname').val(),
        			email: $('#email').val(),
        			mobile: $('#mobile').val(),
        			udf5: $('#udf5').val()
                  }),
        		  contentType: "application/json",
                  dataType: 'json',
                  success: function(json) {
                    if (json['error']) {
        			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
                    }
        			else if (json['success']) {	
        				$('#hash').val(json['success']);
                    }
                  }
                }); 
        });
    //-->
    </script>
    <script type="text/javascript"><!--
        function launchBOLT(){
        	bolt.launch({
            	key: '<?=$merchantKey?>',
            	txnid: $('#txnid').val(), 
            	hash: $('#hash').val(),
            	amount: $('#amount').val(),
            	firstname: $('#fname').val(),
            	email: $('#email').val(),
            	phone: $('#mobile').val(),
            	productinfo: $('#pinfo').val(),
            	udf5: $('#udf5').val(),
            	surl : $('#surl').val(),
            	furl: $('#surl').val(),
            	mode: 'dropout'	
            },{ responseHandler: function(BOLT){
            	console.log( BOLT.response.txnStatus );		
            	if(BOLT.response.txnStatus != 'CANCEL')
            	{
            		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
            		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
            		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
            		'<input type=\"hidden\" name=\"salt\" value=\"'+'<?=$merchantKey?>'+'\" />' +
            		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
            		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
            		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
            		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
            		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
            		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
            		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
            		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
            		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
            		'</form>';
            		var form = jQuery(fr);
            		
            		jQuery('body').append(form);								
            		form.submit();
            	}
            },
        	catchException: function(BOLT){
         		alert( BOLT.message );
        	}
        });
        }
    //--
    </script>
</body>
</html>