
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
        <div class="row">
          <?php if(count($events)>0){ ?>
          <?php foreach($events as $evt):?>
           <!-- <?php print_r($evt) ?>  -->
            <div class="col-md-3">
              <div class="card">
                <div class="card-header font-weight-bold">
                  <?='Event: '.ucwords($evt->event_name)?>
                  <hr>
                </div>
                <div class="card-body">
                 <!--  <img src="<?=base_url('assets/img/eventsImage/')?>" width="100%" style="max-height: 200px">
                  <hr> -->
                  <p>
                    <label>Distance:</label> <?=($evt->distance/1000).'Km '?>(<?=$evt->distance?>)m 
                  </p>
                  
                  <p>
                    <i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-success"><?=$evt->start_date?></span> <!--  to  <span class="text-danger"><?='$evt->event_end_date'?></span> -->
                  </p>
                  <p>
                    <i class="fa fa-bicycle" aria-hidden="true"></i> <span class="text-danger"><?=$evt->type?>  </span>
                  </p>
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
  