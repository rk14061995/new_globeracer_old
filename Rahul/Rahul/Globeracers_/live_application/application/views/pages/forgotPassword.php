

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
    </style>

</head>
<body>
    <div id="fb-root"></div>

    <div id="logreg-forms">
        

            <form action="<?=base_url('Login/restPassword')?>" method="post">
                <?php
                    if($this->session->flashdata('msg')){
                        echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                    }
                
                ?>
                <input type="email" id="email" name="email_" class="form-control" placeholder="Email" required="" autofocus="">
                <input type="text" id="otp" name="otp_" class="form-control" placeholder="OTP" required="" autofocus="">
                <input type="text" id="resetEmail"  name="new_pass" class="form-control" placeholder="New Password" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Verify & Reset Password</button>
                <!--<a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>-->
            </form>
            
           
            <br>
            
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</body>
</html>