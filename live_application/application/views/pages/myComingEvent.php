
      <div class="content">
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              } );
          } );
        </script>
        <div class="row">
            <div class="col-md-12">
                <?php
                    if($this->session->flashdata('error_msg')){
                        echo '<div class="alert alert-info">'.$this->session->flashdata('error_msg').'</div>';
                    }
                    
                ?>
            </div>
        </div>
        <div class="row mt-5">
            
          <?php if(count($events)>0){ ?>
          <?php foreach($events as $evt):?>
           <!-- <?php print_r($evt) ?>  -->
            <div class="col-md-3">
              <div class="card">
                <div class="card-header font-weight-bold">
                   <a href="<?=base_url('User/myEventActivities/').$evt->event_id?>"><?='Event: '.ucwords($evt->event_name)?></a>
                  <hr>
                </div>
                <div class="card-body">
                 <!--  <img src="<?=base_url('assets/img/eventsImage/')?>" width="100%" style="max-height: 200px">
                  <hr> -->
                  <p>
                     <?php 
                       // print_r($distanceSum);
                    //   echo $distanceSum[0]->totalDistance
                       
                       if($distanceSum==0){
                           echo '0';
                       }else{
                           echo '<label>Distance:</label>('. $distanceSum[0]->totalDistance/1000 . ') Km ';
                       }
                     ?>
                    
                  </p>
                  
                  <!--<p>-->
                  <!--  <i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-success"><?=$evt->event_start_date?></span> <!--  to  <span class="text-danger"><?='$evt->event_end_date'?></span> -->
                  <!--</p>-->
                  <!--<p>-->
                  <!--  <i class="fa fa-bicycle" aria-hidden="true"></i> <span class="text-danger"><?=$evt->event_category?>  </span>-->
                  <!--</p>-->
                  <!-- <p>
                    <i class="fa fa-globe" aria-hidden="true"></i> <span class="text-success"><?=$evt->event_venue?>  </span>
                  </p> -->
                  
                  
                </div>
                
              </div>
            </div>
          <?php endforeach; ?>
          <?php }else{
            echo '<div class="col-md-12"><div class="alert alert-danger">No Events Found.</div></div>';
          } ?>
        </div>
        <!-- <div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">My Events</h4>
              </div>
              <div class="card-body">
               
                <div class="table-responsive">
                  <table class="table" id="example">
                    <thead class=" text-primary">
                      <th>
                       Event Name
                      </th>
                      <th>
                        Venue
                      </th>
                      <th>
                        Scheduled On
                      </th>
                    
                      <th class="text-right">
                        Total Participants
                      </th>
                    </thead>
                    <tbody>
                      <?php foreach($events as $evt):?>
                        <tr>
                          <td>
                            Marathon
                          </td>
                          <td>
                           Ahemdabad, Gujrat, India
                          </td>
                          <td>
                            26, December 2020
                          </td>
                          
                          <td class="text-right">
                            36,738
                          </td>
                        </tr>
                      <?php endforeach; ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div> -->
      </div>
  