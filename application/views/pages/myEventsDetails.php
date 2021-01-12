
      <div class="content">
     
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
       
      </div>
  