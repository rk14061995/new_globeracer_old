,<!DOCTYPE html>
<html>
<head>
  <title>Login Panel</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link href="<?=base_url('assets/login.css')?>" rel="stylesheet" id="bootstrap-css">
  <!------ Include the above in your HEAD tag ---------->
</head>
<body>
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first py-2">
         <img src="<?=base_url('assets/fit.jpg')?>" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form action="<?=base_url('Login/loginValidate')?>" method="post">
        <input type="text" id="login" class="fadeIn second" name="us_email" placeholder="Eg. john@abc.com">
        <input type="text" id="password" class="fadeIn third" name="us_pass" placeholder="**********">
        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>

      <!-- Remind Passowrd -->
      <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
      </div>

    </div>
  </div>
</body>
</html>




