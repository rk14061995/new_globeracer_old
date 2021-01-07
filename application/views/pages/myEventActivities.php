
      <div class="content">
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  "order": [[ 5, "desc" ]]
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
        <div class="card mt-5 p-2">
            
          <?php if(count($activities)>0){ ?>
         
          
            <div class="table-responsiv">
                  <table class="table table-stripped sing single_day_leader" id="example">
                    <thead class=" text-primary">
                        <th>Activity Name</th>
                        <th>Distance (Km)</th>
                        <th>Type</th>
                        <th>Moving Time</th>
                        <th>Elapsed Time</th>
                        <th>Start Date </th>
                     
                    </thead>
                    <tbody>
                        <?php
                        $su=0;
                        //print_r($activities);
                        foreach($activities as $ld){
                        ?>
                        <tr>
                            <td><?=$ld->event_name?></td>
                            <td><?=$ld->distance/1000?></td>
                            <td><?=$ld->type?></td>
                            <td><?=$ld->moving_time?></td>
                            <td><?=$ld->elapsed_time?></td>
                            <td><?=$ld->start_date?></td>
                          
                        </tr>
                        
                        <?php 
                           }
                        
                        ?>

                    </tbody>
                </table>
            </div>
        
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
  