
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
          $(document).on('click','.deleteEvent', function(){
             
                var event_id=$(this).attr('event_id');
              $.ajax({
                  url:"<?=base_url('Events/dltEvent')?>",
                  type:"post",
                 
                  data:{event_id:event_id},
                  success:function(response){
                      response=JSON.parse(response);
                      if(response.code==1){
                          swal("Great", "Deleted Successfully!", "success");
                      }else{
                          swal("Oops", "Failed To Delete", "error");
                      }
                      setInterval(function(){
                          location.reload();
                      },2000);
                  }
              });
          });
        </script>
        <div class="row">
            <div class="col-md-12">
                <table class="display" id="example" style="width: 100%">
                    <thead class=" text-primary">
                      <th class="text-center">
                        Event Name
                      </th>
                      <th class="text-center">
                        Image
                      </th>
                      <th class="text-center">
                        Venue
                      </th>
                      <th class="text-center">
                        Date
                      </th>
                      <th class="text-center">Status</th>
                      <th class="text-center">
                        Action
                      </th>
                      <!--<th class="text-right">-->
                      <!--  Salary-->
                      <!--</th>-->
                    </thead>
                    <tbody>
                        <?php foreach($events as $evt):?>
                            <tr>
                                <td class="text-center">
                                  <?=ucwords($evt->event_name)?>
                                </td>
                                <td class="text-center">
                                  <a href="<?=base_url('assets/img/eventsImage/').$evt->event_image?>"><img src="<?=base_url('assets/img/eventsImage/').$evt->event_image?>" class="rounded-circle" width="50px" height="50px"></a>
                                </td>
                                <td class="text-center">
                                  <?=$evt->event_venue?> 
                                </td>
                                <td class="text-center">
                                    <p class="text-success"><span><?=date('d, M Y', strtotime($evt->event_start_date))?></span> - <span><?=date('h:i A', strtotime($evt->event_start_date))?></span> </p>
                                    <p class="text-danger"><span><?=date('d, M Y', strtotime($evt->event_end_date))?></span> - <span><?=date('h:i A', strtotime($evt->event_end_date))?></span> </p>
                                      <!--to  <span class="text-danger"><?=date('d, M Y', strtotime($evt->event_end_date))?></span>-->
                                </td>
                                <td>
                                    <select class="form-control" name="act_deact">
                                        <option value="0">Select</option>
                                        <option value="1">Active</option>
                                        <option value="2" selected>In-Active</option>
                                    </select>
                                </td>
                                <td class="text-center">
                                    <a href="<?=base_url('Events/viewEventDescription/').$evt->event_id?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0)" event_id="<?=$evt->event_id?>" class="btn btn-danger deleteEvent"><i class="fa fa-trash"></i></a>
                                 
                                </td>
                                
                            </tr>
                        <?php endforeach;?>
                      
                    </tbody>
                  </table>
            </div>
           
         
          
        </div>
       
      </div>
  