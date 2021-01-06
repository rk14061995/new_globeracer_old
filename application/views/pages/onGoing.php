
      <div class="content">
        <script type="text/javascript">
          $(document).ready(function() {
              $('#raceEx').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'pdf', 'print'
                  ]
              } );
          } );
        //   $(document).on('click','.deleteEvent',function(){
        //       var event_id=$(this).attr('event_id');
        //       swal("Good job!", "This will be Deleted! : "+event_id, "success");
        //   })
          
           $(document).on('click','.editCat',function(){
              var cat_id=$(this).attr('cat_id');
              var cat_name= $(this).attr('cat_name');
              $('#cat_id').val(cat_id);
              $('#cat_name').val(cat_name);
              $('#editCategory').modal('show');
          });
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
        //   $(document).on('change','.actInactive',function(){
        //      var event_id= 
        //   });
        </script>
        <div class="row">
            <div class="col-md-12">
                <table class="display" id="raceEx" style="width: 100%">
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
                      <!--<th class="text-center">Change Status</th>-->
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
                                <!--<td>-->
                                    <!--<span class="evId"></span>-->
                                <!--    <select class="form-control" name="act_deact" id="activate_event">-->
                                <!--        <option value="0">Select</option>-->
                                <!--        <option value="1" selected>Active</option>-->
                                <!--        <option value="2">In-Active</option>-->
                                <!--    </select>-->
                                <!--</td>-->
                                <td class="text-center">
                                    
                                    <?php
                                        if($evt->event_status=='Active'){
                                          $cls_="btn btn-success";  
                                        }else{
                                            $cls_="btn btn-danger";  
                                        }
                                    
                                    ?>
                                    <span class="<?=$cls_?>"><?=$evt->event_status?> </span>
                                  
                                </td>
                                <td class="text-center">
                                    <a href="<?=base_url('Events/viewEventDescription/').$evt->event_id?>" class="px-1"><i class="fa fa-eye"></i></a>
                                    <a href="<?=base_url('Events/editEvent/').$evt->event_id?>" class="px-1 text-success editEvent" event_id="<?=$evt->event_id?>" ><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" event_id="<?=$evt->event_id?>" class="px-1 text-danger deleteEvent"><i class="fa fa-trash"></i></a>
                                 
                                </td>
                                
                            </tr>
                        <?php endforeach;?>
                      
                    </tbody>
                  </table>
            </div>
           <script>
               $(document).on('change','#activate_event', function (){
                //   alert(" Activated ");
                   var changeStatus=$(this).val();
                //   var eventId=
                   $.ajax({
                       url:"<?=base_url('Events/updateEventStatus')?>",
                       type:"post",
                       data:{status:changeStatus},
                       success:function(response){
                           console.log(rsponse);
                       }
                   });
               });
           </script>
          
        </div>
      </div>
  