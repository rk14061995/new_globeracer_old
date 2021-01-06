,<!DOCTYPE html>
<html>
<head>
  <title>Login Panel</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="<?=base_url('assets/login.css')?>" rel="stylesheet" id="bootstrap-css">
  
  <script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com">
  <!------ Include the above in your HEAD tag ---------->
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <?php 
          if($this->session->flashdata('err')){
            echo '<div class="alert alert-danger">'.$this->session->flashdata('err').'</div>';
          }
      ?>
      <!-- Icon -->
      <div class="fadeIn first py-2">
         <img src="<?=base_url('assets/fit.jpg')?>" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="<?=base_url('Login/adminloginValidate')?>" method="post">
        <input type="text" id="login" class="fadeIn second" name="us_email" placeholder="Eg. john@abc.com">
        <input type="password" id="password" class="fadeIn third form-control" name="us_pass" placeholder="**********">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
       <!--  <div align="center">
            <div class="g-signin2" data-onsuccess="onSignIn"></div>
        </div> -->
      <!-- Remind Passowrd -->
      <div id="formFooter">
          
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>
      
      <!--sdf-->

    </div>
    <!-- <script>
        function onSignIn(googleUser) {
          var profile = googleUser.getBasicProfile();
          console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
          console.log('Name: ' + profile.getName());
          console.log('Image URL: ' + profile.getImageUrl());
          console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        }
    </script>
    <script>
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script> -->
  </div>
</body>
</html>




