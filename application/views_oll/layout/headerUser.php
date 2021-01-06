
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
  <link href="https://fonts.googleapis.com/css2?family=Signika:wght@700&display=swap" rel="stylesheet">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" /> -->
 
 
 
 <meta name="google-signin-client_id" content="816948549039-bap5u148at18ohn9ai55n1spgkuvhijj.apps.googleusercontent.com">
    
  <style>
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
        <a href="https://globeracers.com/" class="simple-text logo-normal">
          
          <div class="logo-image-big">
            <img src="https://globeracers.com/wp-content/uploads/2020/06/Logo1.png">
          </div>
        </a>
      </div>
      <div class="sidebar-wrapper" >
        <ul class="nav">
          <li class="active">
            <a href="<?=base_url('User/APIConnection')?>" class="font-weight-bold">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p style="color: maroon;">Dashboard</p>
            </a>
          </li>
          <!--<li class="active">-->
          <!--  <a href="<?=base_url('User/APIConnection')?>" class="font-weight-bold">-->
          <!--    <i class="nc-icon nc-ruler-pencil"></i>-->
          <!--    <p style="color: maroon;">My Account</p>-->
          <!--  </a>-->
          <!--</li>-->
          <li >
            <a href="<?=base_url('User/AllEvents')?>" class="font-weight-bold">
              <i class="nc-icon nc-ruler-pencil"></i>
              <p style="color: maroon;">Current Events</p>
            </a>
          </li>
          
          <li>
            <a href="<?=base_url('User/MyEvents')?>" class="font-weight-bold">
              <i class="nc-icon nc-tile-56 "></i>
              <p style="color: maroon;">My Activity</p>
            </a>
          </li>
          <!--<li>-->
          <!--  <a href="<?=base_url('User/Result')?>" class="font-weight-bold">-->
          <!--    <i class="nc-icon nc-single-02"></i>-->
          <!--    <p style="color: maroon;">Race Result</p>-->
          <!--  </a>-->
          <!--</li>-->
          <li>
            <a href="<?=base_url('User/myUpComing')?>" class="font-weight-bold">
              <i class="nc-icon nc-single-02"></i>
              <p style="color: maroon;">My Order</p>
            </a>
          </li>
          
          <li>
              <a href="<?=base_url('User/testLe')?>" class="font-weight-bold">
              <i class="nc-icon nc-single-02"></i>
              <p style="color: maroon;">Leaderboard</p>
            </a>
          </li>
          <!--<li>-->
          <!--    <a href="<?=base_url('User/ldBoard')?>" class="font-weight-bold">-->
          <!--    <i class="nc-icon nc-single-02"></i>-->
          <!--    <p style="color: maroon;">Leaderboard</p>-->
          <!--  </a>-->
          <!--</li>-->
           <li>
            <a href="<?=base_url('User/Contact_us')?>" class="font-weight-bold">
              <i class="nc-icon nc-single-copy-04"></i>
              <p style="color: maroon;">Contact Us</p>
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
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <?php 
                    $teams=$this->db->get('team_details')->result();
                    
                    
              ?>
              
             <form>
              <div class="input-group ">
                
                <div class="input-group-append">
                    <div class="input-group-text">
                      <?php 
                            $userTable_id=$userSessionData[0]->id_table;
                            $regDetails=$this->db->where('user_id',$userTable_id)->get('race_registeration')->row();
                            if($regDetails->team_id!=0 || $regDetails->team_id!=124){
                                $show_='';
                            }else{
                                $show_='disabled';
                            }
                      ?>
                      
                        <select class="form-control" id="changeTeam" <?=$show_?>>
                            <option>Select Team</option>
                            <?php foreach($teams as $team):?>
                                <?php if($regDetails->team_id==$team->team_id){ ?>
                                    <option value="<?=$team->team_id?>" selected><?=$team->team_name?></option>
                                <?php }else{ ?>
                                    <option value="<?=$team->team_id?>" ><?=$team->team_name?></option>
                                <?php } ?>
                            <?php endforeach;?>
                        </select>
                  </div>
                </div>
              </div>
            </form> 
            <script>
                $(document).on('change','#changeTeam',function(){
                    var team_id= $(this).val();
                   $.ajax({
                      url:"<?=base_url('User/updateTeam')?>",
                      type:"post",
                      data:{team_id:team_id},
                      success:function(response){
                          response=JSON.parse(response);
                          if(response.code==1){
                              swal("Great!", "Your Team Upated.", "success");
                          }else{
                              swal("505", "Server Not Found", "error");
                          }
                        
                      }
                   });
                });
            </script>
            <ul class="navbar-nav">
<!--<!-              <li class="nav-item">-->
<!--                <a class="nav-link btn-magnify" href="javascript:;">-->
<!--                  <i class="nc-icon nc-layout-11"></i>-->
<!--                  <p>-->
<!--                    <span class="d-lg-none d-md-block">Stats</span>-->
<!--                  </p>-->
<!--                </a>-->
<!--              </li> -->

              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- <i class="nc-icon nc-share-66"></i> -->
                  <?=$userSessionData[0]->firstname.' '.$userSessionData[0]->lastname?>
                  
                 
                  <!-- <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p> -->
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="<?=base_url('User/Profile')?>">Profile</a>
                  <?php 
                      if($userSessionData[0]->sign_up_type=='Google'){
                        //   echo '<div class="g_id_signout">Sign Out</div>';
                          echo '<a href="javascript:void(0)" class="dropdown-item"  id="log_out" >Sign out</a>';
                      }else{
                          echo '<a class="dropdown-item" href="'.base_url('logout').'">Log Out</a>';
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
        <script src="https://apis.google.com/js/platform.js" async defer></script>
      <script>
            $(document).ready(function(){
                gapi.load('auth2', function() {
                    gapi.auth2.init();
                  });
            });
            $(document).on('click','#log_out',function(){
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                  console.log('User signed out.');
                });
            });
    //   function onLoad() {
    //           gapi.load('auth2', function() {
    //             gapi.auth2.init();
    //           });
    //         }
    //   function signOut() {
    //         var auth2 = gapi.auth2.getAuthInstance();
    //         auth2.signOut().then(function () {
    //           console.log('User signed out.');
    //         });
    //       }
            $('#log_out').on('click',function(){
                var auth2 = gapi.auth2.getAuthInstance();
                auth2.signOut().then(function () {
                  console.log('User signed out.');
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
            });
          function signOut() {
            //   const button = document.getElementById('signout_button');
            //     button.onclick = () => {
            //       google.accounts.id.disableAutoSelect();
            //     }
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              console.log('User signed out.');
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
        //   function onLoad() {
        //       gapi.load('auth2', function() {
        //         gapi.auth2.init();
        //       });
        //     }
        </script>
      <!-- End Navbar -->