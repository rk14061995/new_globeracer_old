
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
          <?php if(count($events)>0){ ?>
          <?php foreach($events as $evt):?>
            <!-- <?php print_r($evt) ?>  -->
            <div class="col-md-3">
              <div class="card">
                <div class="card-header font-weight-bold">
                  <?=ucwords($evt->event_name)?>
                  <hr>
                </div>
                <div class="card-body">
                  <img src="<?=base_url('assets/img/eventsImage/').$evt->event_image?>" width="100%" style="height: 200px">
                  <hr>
                  <p>
                    <label>Organiser:</label> <?=$evt->firstname.' '.$evt->lastname?>
                  </p>
                  <p>
                    <i class="fa fa-calendar" aria-hidden="true"></i> <span class="text-success"><?=$evt->event_start_date?></span>  to  <span class="text-danger"><?=$evt->event_end_date?></span>
                  </p>
                  <p>
                    <i class="fa fa-globe" aria-hidden="true"></i> <span class="text-success"><?=$evt->event_venue?>  </span>
                  </p>
                  <p>
                    <a href="<?=base_url('User/viewEventDescription/').$evt->event_id?>" class="btn btn-info">View Description</a>
                  </p>
                  
                </div>
                
              </div>
            </div>
          <?php endforeach; ?>
          <?php }else{
            echo '<div class="alert alert-danger">No Events Found.</div>';
          } ?>
          
          
        </div>
      </div>
  