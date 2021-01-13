
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="https://globeracers.com/wp-content/uploads/2020/09/cropped-logo-icon-512-x-512-270x270.png">
  <link rel="icon" type="image/png" href="https://globeracers.com/wp-content/uploads/2020/09/cropped-logo-icon-512-x-512-270x270.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" />

  <link href="<?=base_url()?>assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?=base_url()?>assets/demo/demo.css" rel="stylesheet" />
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
 
<link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css
" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com">
 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" /> -->
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
        <a href="https://globeracers.com" class="simple-text logo-normal">
          
          <div class="logo-image-big">
            <img src="https://globeracers.com/wp-content/uploads/2020/06/Logo1.png">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper" >
        <ul class="nav">
            <li class="active ">
                <a href="<?=base_url('Events')?>">
                  <i class="nc-icon nc-single-02"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="active ">
                <a href="javascript:void(0)" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-calendar-60"></i>
                  <p>Event</p>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="<?=base_url('Events')?>"><i class="nc-icon nc-ruler-pencil"></i><p>Create Events</p></a>
                    <a class="dropdown-item" href="<?=base_url('Events/onGoing')?>"><i class="nc-icon nc-user-run"></i><p>On-Going Events</p></a>
                    <a class="dropdown-item" href="<?=base_url('Events/PastEvent')?>"><i class="nc-icon nc-book-bookmark"></i><p>Past Events</p></a>
                    <a class="dropdown-item" href="<?=base_url('Events/upComing')?>"><i class="nc-icon nc-calendar-60"></i><p>Upcoming Events</p></a>
                </div>
              </li>
            <li class="active ">
                <a href="<?=base_url('Email')?>">
                  <i class="nc-icon nc-single-02"></i>
                  <p>Send Mail</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Events/Category')?>">
                  <i class="nc-icon nc-ruler-pencil"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Events/subCategory')?>">
                  <i class="nc-icon nc-ruler-pencil"></i>
                  <p>Sub-Category</p>
                </a>
              </li>
              <!--<li class="active ">-->
              <!--  <a href="<?=base_url('Events')?>">-->
              <!--    <i class="nc-icon nc-ruler-pencil"></i>-->
              <!--    <p>Create Events</p>-->
              <!--  </a>-->
              <!--</li>-->
               <li class="active ">
                <a href="<?=base_url('Team')?>">
                  <i class="nc-icon nc-ruler-pencil"></i>
                  <p>Team</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Events/activity_log')?>">
                  <i class="nc-icon nc-calendar-60"></i>
                  
                  <p class="blink">API Logs</p>
                  <!--<p></p>-->
                </a>
              </li>
              <!--<li class="active ">-->
              <!--  <a href="<?=base_url('Events/onGoing')?>">-->
              <!--    <i class="nc-icon nc-user-run"></i>-->
              <!--    <p>On-Going Events</p>-->
              <!--  </a>-->
              <!--</li>-->
              <!--<li class="active ">-->
              <!--  <a href="<?=base_url('Events/PastEvent')?>">-->
              <!--    <i class="nc-icon nc-book-bookmark"></i>-->
              <!--    <p>Past Events</p>-->
              <!--  </a>-->
              <!--</li>-->
              <li class="active ">
                <a href="<?=base_url('Participant/selectEvent')?>">
                  <i class="nc-icon nc-tile-56 "></i>
                  <p>Leaerboard</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Participant')?>">
                  <i class="nc-icon nc-single-02"></i>
                  <p>Participant</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Report')?>">
                  <i class="nc-icon nc-single-copy-04"></i>
                  <p>Report</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Report/generalReport')?>">
                  <i class="nc-icon nc-single-copy-04"></i>
                  <p>General Report</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Report/participantMultipleRace')?>">
                  <i class="nc-icon nc-single-copy-04"></i>
                  <p>Participants Report</p>
                </a>
              </li>
              <li class="active ">
                <a href="<?=base_url('Report/filterTotalKm')?>">
                  <i class="nc-icon nc-single-copy-04"></i>
                  <p>Total Km Report</p>
                </a>
              </li>
            </ul>
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
          <style>
      .blink {
        animation: blinker 0.6s linear infinite;
        color: #1c87c9;
        font-size: 12px;
        font-weight: bold;
        font-family: sans-serif;
      }
      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }
      .blink-one {
        animation: blinker-one 1s linear infinite;
      }
      @keyframes blinker-one {
        0% {
          opacity: 0;
        }
      }
      .blink-two {
        animation: blinker-two 1.4s linear infinite;
      }
      @keyframes blinker-two {
        100% {
          opacity: 0;
        }
      }
    </style>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
              <div class="input-group no-border">
               <h3>Admin Panel</h3>
           
                
              </div>
            <p style="font-size:10px"><a href="<?=base_url('Calc/getUserStravaDetails')?>">View Status Of Data Sync.</a></p>
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
                  <?=$userSessionData[0]->firstname.' '.$userSessionData[0]->lastname?>
                  <!--<?php print_r($this->session->userdata('userData'))  ?> -->
                  <!--<?= " **** " ?>-->
                  <!-- <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Profile</a>
                  <?php 
                      if($userSessionData[0]->sign_up_type=='Google'){
                          echo '<a href="javascript:void(0)" class="dropdown-item" onclick="signOut();">Sign out</a>';
                      }else{
                          echo '<a class="dropdown-item" href="'.base_url('Login/adminlogout').'">Log Out</a>';
                      }
                  ?>
                  
                  
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
      
        // <script>
        //   function signOut() {
        //     var auth2 = gapi.auth2.getAuthInstance();
        //     auth2.signOut().then(function () {
        //       console.log('User signed out.');
        //     });
        //   }
        // </script>
        <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
      <script>
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
            //   console.log('User signed out.');
                $.ajax({
                    url:"<?=base_url('Login/logOUtFo')?>",
                    type:"post",
                    success: function(response) {
                        // alert("responseData")
                        response=JSON.parse(response);
                        if(response.code==1){
                            swal("Great", "User signed out. Come Back Soon", "success");
                            window.location.href="<?=base_url()?>";
                        }
                    }  
                });
              
            });
          }
          function onLoad() {
              gapi.load('auth2', function() {
                gapi.auth2.init();
              });
            }
        </script>
      <!-- End Navbar -->