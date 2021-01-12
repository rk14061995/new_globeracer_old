
      <div class="content">
        <script type="text/javascript">
          $(document).ready(function() {
            $('#eventsList').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  // "order": [[ 4, "desc" ]]
              } );
          });
          
        </script>
        <div class="row">
           
          <div class="col-md-12">
              
              
            <div class="card">
              <div class="card-header">
                <span>Select Event To View Leaderboard</span>
                <hr>
              </div>
              <div class="card-body">
                    <table class="table " id="eventsList">
                        <thead>
                          <th>S.no</th>
                          <th>Event Name</th>
                          <th>Status</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                          
                          <?php foreach($events as $evt): ?>
                            <?php
                              if($evt->event_status=='Active'){
                                $cls='text-success';
                              }else{
                                $cls='text-danger';
                              }
                            ?>
                            <tr>
                              <td><?=$i?></td>
                              <td><?=$evt->event_name?></td>
                              <td class="<?=$cls?>">
                                <?=$evt->event_status?>
                              </td>
                              <td><?=$evt->event_start_date?></td>
                              <td><?=$evt->event_end_date?></td>
                              <td><a href="<?=base_url('User/viewLeaderboard?').'event_id='.$evt->event_id?>" class="text-info">View LeaderBoard</a></td>
                            </tr>
                            <?php $i++;?>
                          <?php endforeach;?>
                        </tbody>
                    </table>
              </div>
              
        </div>
       
        
      </div>
     
  