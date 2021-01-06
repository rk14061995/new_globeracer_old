
      <div class="content">
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  "order": [[ 4, "desc" ]]
              } );
              $('#cum_ldr_brd').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  "order": [[ 2, "desc" ]]
              } );
              
              
            //   $('#cum_ldr_brd').DataTable( {
            //       dom: 'Bfrtip',
            //       buttons: [
            //           'copy', 'csv', 'excel', 'pdf', 'print'
            //       ]
            //   } );
            // $('#tm_ldr_brd_cuml').DataTable( {
            //       dom: 'Bfrtip',
            //       buttons: [
            //           'copy', 'csv', 'excel', 'pdf', 'print'
            //       ],
            //       "order": [[ 2, "desc" ]]
            //   } );
              
          } );
        </script>
        <div class="row">
          <div class="col-md-12">
              
              
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">API Hit Log</h5>
                <hr>
              </div>
              <div class="card-body">
                   
                
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-12">
              
              
            <div class="card">
              <div class="card-header">
                <!--<h4 class="card-title">Leader Board</h4>-->
              </div>
              <div class="card-body">
                   
                  
                  
                
                <div class="table-responsiv">
                  <table class="table table-stripped " id="example">
                    <thead class=" text-primary">
                        <th>S.No</th>
                        <th>API Message</th>
                        <th>UTC Time</th>
                        <th>Indian Time</th>
                    </thead>
                    <tbody id="solo_sing">
                      <?php
                      $i=1;
                    //   print_r($log);
                            foreach($log as $ld){
                                
                                ?>
                                  <tr>
                                      <td><?=$i++?></td>
                                      <td><?=$ld->api_msg?></td>
                                      <td><?=$ld->log_utc_time?></td>
                                      <td><?=$ld->log_indian_time?></td>
                                  </tr>  
                                <?php
                                
                               
                            }
                      
                      ?>
                      
                      
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
      
  