

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="76x76" href="https://globeracers.com/wp-content/uploads/2020/09/cropped-logo-icon-512-x-512-270x270.png">
    <link rel="icon" type="image/png" href="https://globeracers.com/wp-content/uploads/2020/09/cropped-logo-icon-512-x-512-270x270.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style.css">
    <title>Globeracers Login/Register</title>
    <meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com">
    
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

        #logreg-forms .form-reset, #logreg-forms .form-signup{ display: none; }

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
    </style>
    

    <!-- <script src="https://apis.google.com/js/platform.js" async defer></script> -->
    <!-- <meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com"> -->
</head>
<body>
    <div id="fb-root"></div>

    <div id="logreg-forms">
        <form class="form-signin" id="signIn" action="<?=base_url('userLoginValidate')?>" method="post">
            <h1 class="h3 mb-3 font-weight-bold" style="text-align: center"> Sign in</h1>
              <?php
                        if($this->session->flashdata('msg')){
                            echo '<div class="alert alert-success">'.$this->session->flashdata('msg').'</div>';
                        }


                        if($this->session->flashdata('err')){
                            echo '<div class="alert alert-danger">'.$this->session->flashdata('err').'</div>';
                        }
                    ?>
            <div class="social-login">
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
             
                <!-- <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button> -->
            </div>
            <div class="social-login">
                <div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>
            </div>
            
            <p style="text-align:center"> OR  </p>
            <input type="email" id="inputEmail" class="form-control" name="user_email" placeholder="Email address" required="" autofocus="">
            <input type="password" id="inputPassword" class="form-control" name="user_pwd" placeholder="Password" required="">
            
            <button class="btn succBtn btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
            <a href="#" id="forgot_pswd">Forgot password?</a>
            <hr>
            <!-- <p>Don't have an account!</p>  -->
            <button class="btn signupbtn btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up New Account</button>
            </form>

            <form action="<?=base_url('Login/sendResetLink')?>" class="form-reset" method="post">
                <input type="email" id="resetEmail" name="email_" class="form-control" placeholder="Email address" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <!--<a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>-->
            </form>
            
            <form action="<?=base_url('userSignUp')?>" method="post" class="form-signup">
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
                
               
                <input type="text" name="first-name" id="first-name" class="form-control" placeholder="First name" required="" autofocus="">
                <input type="text" name="middle-name" id="middle-name" class="form-control" placeholder="Middle name" required="" autofocus="">
                <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Last name" required="" autofocus="">
                 <input type="text" name="contact_no" id="contact_no" class="form-control" placeholder="Contact No" required="" autofocus="">
                <input type="email" name="user-email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
                <input type="password" name="user-pass" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
                <input type="password" name="user-repeatpass" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required autofocus="">
                <select class="form-control" name="user_type">
                    <option>Select User Type</option>
                    <option value="1" selected>Normal</option>
                    <!--<option value="2">NGO</option>-->
                    <!--<option value="3">Coaches_Nutritionist</option>-->
                    <!--<option value="4">Admin</option>-->
                </select>
                <input type="text" name="current_location" id="current_location" class="form-control" placeholder="Current Location"  autofocus="">
                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
            </form>
            <br>
            
    </div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="e4GUJkB3"></script>
    
    <script>
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
                    console.log(response);
                    response=JSON.parse(response);
                    if(response.code==1){
                        if(response.type=="Admin"){
                            window.location.href="<?=base_url('Events')?>";
                        }else{
                            window.location.href="<?=base_url('User')?>";
                        }
                        // swal("Great", "Redirecting You To The Dashboard", "success");
                        
                    }else{
                        swal("Ooopss.!!", "Something Went Wrong.", "error");
                    }
                }
            })
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
        // $(document).on('submit','#signUp',function(e){
        //     e.preventDefault();
        //     // const url="<?=base_url('User/userSignUp')?>";
        //     var formData= new FormData($(this)[0]);
        //     $.ajax({
        //         url:"<?=base_url('User/userSignUp')?>",
        //         type:"post",
        //         cache:false,
                
        //         processData:false,
        //         data:formData,
        //         contentType: "json",
        //         success: function(responseData, textStatus, jqXHR) {
        //             alert("data saved")
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             console.log("Eror: "+errorThrown);
        //         }
        //     })
        // });
        function toggleResetPswd(e){
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle() // display:block or none
            $('#logreg-forms .form-reset').toggle() // display:block or none
        }

        function toggleSignUp(e){
            e.preventDefault();
            $('#logreg-forms .form-signin').toggle(); // display:block or none
            $('#logreg-forms .form-signup').toggle(); // display:block or none
        }

        $(()=>{
            // Login Register Form
            $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
            $('#logreg-forms #cancel_reset').click(toggleResetPswd);
            $('#logreg-forms #btn-signup').click(toggleSignUp);
            $('#logreg-forms #cancel_signup').click(toggleSignUp);
        })
    </script>
    <!-- <script src="/script.js"></script> -->
</body>
</html>