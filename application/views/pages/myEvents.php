
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
          <div class="col-lg-12">
          <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Event Name</th>
                <th>Distance (Km)</th>
                <th>Date</th>
                <th>Type</th>
               
            </tr>
        </thead>
        <tbody>
           <?php if(count($events)>0): ?>
          <?php 
          $i=1;
          foreach($events as $evt):?>
          <tr>
            <td><?php echo $i?></td>
            <td> <?= ucwords($evt->event_name)?></td>
            <td><?=($evt->distance/1000)?></td>
            <td><?=$evt->start_date?></td>
            <td><?=$evt->type?></td>
            
          </tr>
            <?php $i++;
             endforeach; ?>
          <?php  endif;?>


           </tbody>
    </table>
         </div>
          <!-- 
            <div class="col-md-3">
              <div class="card">
                <div class="card-header font-weight-bold">
                  <?='Event: '.ucwords($evt->event_name)?>
                  <hr>
                </div>
                <div class="card-body">
                
                  <p>
                    <label>Distance:</label> <?=($evt->distance/1000).'Km '?>(<?=$evt->distance?>)m 
                  </p>
                  
                  <p>
                    <i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-success"><?=$evt->start_date?></span> 
                  </p>
                  <p>
                    <i class="fa fa-bicycle" aria-hidden="true"></i> <span class="text-danger"><?=$evt->type?>  </span>
                  </p>
                  
                  
                  
                </div>
                
              </div>
            </div> -->
          
         
        </div>
        
      </div>
  <script>
    $(document).ready(function() {
    $('#example2').DataTable();
} );
  </script>