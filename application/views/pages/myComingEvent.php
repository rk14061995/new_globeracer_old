
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
           <?php 
            // print_r($evt['event']->reg_id) ;
            
            ?> 
            <div class="col-md-3">
              <div class="card">
                <div class="card-header font-weight-bold">
                   <a href="<?=base_url('User/myEventActivities/').$evt['event']->event_id?>"><?='Event: '.ucwords($evt['event']->event_name)?></a>
                  <hr>
                </div>
                <div class="card-body">
               
                  <p>
                     <?php 
                      if($evt['distanceSum']==0){
                           echo '<label>Distance:</label>(0) Km ';
                       }else{
                           echo '<label>Distance:</label>('. $evt['distanceSum']/1000 . ') Km ';
                       }
                     ?>
                    
                  </p>
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
  