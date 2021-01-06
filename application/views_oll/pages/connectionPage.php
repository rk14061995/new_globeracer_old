  <style type="text/css">
    .strava{
      /*border: 1px solid burlywood;*/
      font-size: 2em;
      font-family: 'Signika', sans-serif;
      color: #ff5d0f;
      padding: 8px;
      /*text-decoration: none;*/
  }
  .fSixe{
    font-size: 20px !important; 
    }
  }
  </style>
      <div class="content">
        <!-- <script type=  "text/javascript">
          $(document).ready(function() {
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              } );
          } );
        </script> -->
        <!--  <?php print_r($userSessionData[0])?> -->
          <?php 
              $res=$this->db->where('id_table',$userSessionData[0]->id_table)->get('user_details')->row();
              $dst=0;
              if($res->user_id!=""){
                $condition=array(
                                "user_email"=>$res->user_email,
                                "start_date >="=>'2020-11-14',
                                );
                  $myEvent=$this->db->where($condition)->get('event_details')->result();
                //   print_r($myEvent);
                  $totalEvents=count($myEvent);
                  foreach($myEvent as $evtDt){
                    $dst+=$evtDt->distance;
                  }
              }else{
                $totalEvents=0; 
              }
              
              if($res){
                $access_token=$res->refresh_token;
              }else{
                $access_token="";
              }
          ?>
          <div class="row">
            <div class="col-md-12">
              <?php
                if($this->session->flashdata('msg_')){
                  echo '<div class="alert alert-info">'.$this->session->flashdata('msg_').'</div>';
                }  
              ?>
            </div>
          </div>
        <div class="row">
         
          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-4 col-md-3">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-8 col-md-9">
                    <div class="numbers">
                      <p class="card-category">My Events</p>
                      <p class="card-title fSixe"><?=$totalEvents?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <?php if($access_token!=""){ ?>
                   <a href="<?=base_url('User/updateData')?>" style="text-decoration: none">
                      <i class="fa fa-refresh"></i>
                      Update Now
                    </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-4 col-md-3">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-world-2 text-success"></i>
                    </div>
                  </div>
                  <div class="col-8 col-md-9">
                    <div class="numbers">
                      <p class="card-category">Event Distance</p>
                      <p class="card-title fSixe"><?= $dst/1000?> km<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <?php if($access_token!=""){ ?>
                   <a href="<?=base_url('User/updateData')?>" style="text-decoration: none">
                      <i class="fa fa-refresh"></i>
                      Update Now
                    </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-4 col-md-3">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-user-run text-danger"></i>
                    </div>
                  </div>
                  <div class="col-8 col-md-9">
                    <div class="numbers">
                      <p class="card-category">Longest Ride</p>
                      <p class="card-title fSixe"><?= $res->longest_ride?> m<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <?php if($access_token!=""){ ?>
                   <a href="<?=base_url('User/updateData')?>" style="text-decoration: none">
                      <i class="fa fa-refresh"></i>
                      Update Now
                    </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-4 col-md-3">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-sound-wave text-primary"></i>
                    </div>
                  </div>
                  <div class="col-8 col-md-9">
                    <div class="numbers">
                      <p class="card-category">Elevation Gain</p>
                      <p class="card-title fSixe"><?= $res->total_elevation_gain?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                   <?php if($access_token!=""){ ?>
                   <a href="<?=base_url('User/updateData')?>" style="text-decoration: none">
                      <i class="fa fa-refresh"></i>
                      Update Now
                    </a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
         
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">API Connection</h4>
                <hr>
                <?php
                  if($this->session->flashdata('msg')){
                    echo '<div class="alert alert-info">'.$this->session->flashdata('msg').'</div>';
                  }  
                ?>
              </div>
              <?php
                // print_r($res->connection_type);

              ?>
              <div class="card-body">
               <table width="100%">
                <tbody>
                   <tr>
                     <td><img src="<?=base_url('assets/img/strava_icon_130820.png')?>"><span class="strava ">Strava</span></td>
                     <td>
                      <?php if($res->connection_type=="Strava"){ ?>
                            <a href="<?=base_url('API/disconnectStrava')?>" class="btn btn-danger">Disconnect</a>
                      <?php }else{?>

                        
                         <a href="http://www.strava.com/oauth/authorize?client_id=54937&response_type=code&redirect_uri=<?=base_url('API/getCode')?>&approval_prompt=force&scope=read_all,activity:read,activity:read_all,profile:read_all" class="strava ">
                    
                        Connect
                        </a>
                      <?php }?>
                    </td>
                   </tr>
                   <tr>
                     <td><span class="strava ">Sunnto</span></td>
                     <td>
                      <?php
                      if ($res->connection_type=="Suunto") {
                        ?>
                        <a href="<?=base_url()?>Suunto/disconnect" class="btn btn-danger">Disconnect</a>
                        <?php
                      }
                      else{
                        ?>
                        <a href="https://cloudapi-oauth.suunto.com/oauth/authorize?response_type=code&client_id=3953e3d4-2382-4028-9788-ad6dd2f80337&redirect_uri=<?=base_url('Suunto')?>" class="btn btn-danger">Connect</a>
                        <?php
                      }
                      ?>
                      
                    <a href="<?=base_url()?>Suunto/getData" class="btn btn-danger">GET DATA</a>
                        
                    </td>
                   </tr>
                   <tr>
                     <td><span class="strava ">Today's Plan</span></td>
                     <td>
                      
                       <a href="#" class="btn btn-danger">Coming Soon</a>
                      

                        
                    </td>
                   </tr>
                 </tbody>
               </table>
                
              </div>
            </div>
          </div>
          
        </div>
      </div>
  