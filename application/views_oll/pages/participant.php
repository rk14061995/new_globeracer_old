
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Participant</h4>
              </div>
              <div class="card-body">
                  
                <label class="text-danger">Note: Select Event To View Participant</label>
                <select class="form-control" id="evtName">
                  <option>Select Event</option>
                  
                  <?php foreach($events as $evt): ?>
                    <option value="<?=$evt->event_id?>"><?=$evt->event_name?></option>
                  <?php endforeach;?>
                </select>
                <hr>
                <script type="text/javascript">
                    $(document).on('change','#evtName',function(){
                        var event_id=$(this).val();
                        // alert("Event Name: "+evName);
                        window.location.href="<?=base_url('Participant/')?>"+event_id;
                        // $.ajax({
                        //     url:"<?=base_url('API/getParticipantList')?>",
                        //     type:"post",
                        //     data:{event_id:event_id},
                        //     success:function(response){
                        //         console.log(response);
                        //         response=JSON.parse(response);
                        //         $('#allParti').empty();
                        //         if(response.data.length>0){
                        //             for(let i=0; i<response.data.length; i++){
                        //                 var tr=''; 
                        //                 tr+='<tr>';
                        //                 tr+='    <td>';
                        //                 tr+='      Minerva Hooper';
                        //                 tr+='    </td>';
                        //                 tr+='    <td>';
                        //                 tr+='      Curaçao';
                        //                 tr+='    </td>';
                        //                 tr+='    <td>';
                        //                 tr+='      Sinaai-Waas';
                        //                 tr+='    </td>';
                        //                 tr+='    <td class="text-right">';
                        //                 tr+='      $23,789';
                        //                 tr+='    </td>';
                        //                 tr+='  </tr>';
                        //                 $('#allParti').append(tr);
                        //             }
                        //         }
                        //     }
                        // })
                    });
                </script>
                
                <div class="table-responsive">
                  <table class="table" id="example">
                    <thead class=" text-primary">
                      <th class="text-center">
                        S.No
                      </th>
                      <th class="text-center">
                        Name
                      </th>
                       <th class="text-center">
                        Email Id
                      </th>
                      
                      <th class="text-center">
                        Contact
                      </th>
                      <th class="text-center">
                        Category
                      </th>
                      <th class="text-center">
                        Team Name
                      </th>
                      
                      
                      <th class="text-center">
                        Age
                      </th>
                      <th class="text-center">
                        Gender
                      </th>
                      <th class="text-center">
                        Reg. Date
                      </th>
                      <th class="text-center">
                          Action
                      </th>
                    </thead>
                    <tbody id="allParti">
                        <!--<?php print_r($particpants); ?>-->
                        <?php if(count($particpants)>0){  $i=1; ?>
                        <?php foreach($particpants as $dat):?>
                          <tr>
                            <!--  <td>-->
                            <!--  <?=$dat->id_table?>-->
                            <!--</td>-->
                            <td class="text-center">
                              <?=$i?>
                            </td>
                            <td class="text-center">
                             <a href="<?=base_url('Profile/index/').$dat->id_table?>"><?=ucwords($dat->firstname.' '.$dat->middle_name.' '.$dat->lastname)?></a>
                            </td>
                            <td>
                              <?=$dat->user_email?>
                            </td>
                            
                            <td class="text-center">
                             <?=$dat->contact_no?>
                            </td>
                            <td class="text-center">
                              <span style="font-size:10px"><?=$dat->category_name?></span>
                            </td>
                            <td class="text-center">
                              <span style="font-size:10px"><?=$dat->team_name?></span>
                            </td>
                            
                            <td class="text-center">
                                <?php
                                    $today=date('Y-m-d');
                                    $dob=$dat->d_o_b;
                                    $date1=date_create($today);
                                    $date2=date_create($dob);
                                    $diff=date_diff($date1,$date2);
                                    // print_r($diff->y);
                                    
                                    if($dob!=""){
                                        echo $diff->y.' y';
                                    }else{
                                        echo 'Not Updated';
                                    }
                                
                                ?>
                             
                            </td>
                            <td class="text-center">
                              <?=$dat->sex?>
                            </td>
                            <td class="text-center">
                              <?=date('d, M Y',strtotime($dat->reg_on))?>
                            </td>
                            <td class="text-center">
                              
                                <a href="javascript:void(0)" reg_id="<?=$dat->reg_id?>" class="btn btn-danger deleteUser"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                          <?php $i++ ?>
                        <?php endforeach;?>
                        <?php }else{ ?>
                            <tr>
                                <td colspan="4">
                                  No Data Found.
                                </td>
                             </tr>
                        <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
  <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );
    $(document).on('click','.deleteUser',function(){
       var reg_id=$(this).attr('reg_id');
       swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this data! ",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              
              
            //    var cat_id=$(this).attr('cat_id');
              $.ajax({
                  url:"<?=base_url('Participant/dltParticipant')?>",
                  type:"post",
                 
                  data:{reg_id:reg_id},
                  success:function(response){
                      response=JSON.parse(response);
                      console.log(response);
                      if(response.code==1){
                           swal("Data has been deleted!", {
                              icon: "success",
                            });
                      }else{
                          swal("Oops", "Failed To Delete", "error");
                      }
                      setInterval(function(){
                          location.reload();
                      },2000);
                  }
              });
           
          } else {
            swal("Your Data is safe!");
          }
        });
    });
    
  </script>