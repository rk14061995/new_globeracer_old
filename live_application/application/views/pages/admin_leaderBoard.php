
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
              $('#tm_ldr_brd_singl_dy').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  "order": [[ 3, "desc" ]]
              } );
              
            //   $('#cum_ldr_brd').DataTable( {
            //       dom: 'Bfrtip',
            //       buttons: [
            //           'copy', 'csv', 'excel', 'pdf', 'print'
            //       ]
            //   } );
            $('#tm_ldr_brd_cuml').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ],
                  "order": [[ 2, "desc" ]]
              } );
              
          } );
        </script>
        <div class="row">
          <div class="col-md-12">
              
              
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Leader Board</h5>
                <hr>
              </div>
              <div class="card-body">
                    <div class="">
                        <div class="row mx-0 py-4">
                            <div class="col-md-4">
                                <label>Event</label>
                                <select class="form-control" name="event_id" id="event_id">
                                    <option value="0" selected>Select</option>
                                    <?php foreach($events as $evt): ?>
                                        
                                        <option value="<?=$evt->event_id?>" selected><?=$evt->event_name?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <script>
                                $(document).on('change','#ChDate',function(){
                                    if($(this).val()==1){
                                        //Show Single
                                        $('#date_').show();
                                        if($('#ldrShow').val()==1){
                                            //Show Single
                                            $('#cumm_single').show();
                                            $('#team_cuml').hide();
                                            $('#cumm_solo').hide();
                                            $('#team_single_day').hide();
                                        }else{
                                            //Show Cumm
                                            $('#cumm_single').hide();
                                            $('#team_cuml').hide();
                                            $('#cumm_solo').hide();
                                            $('#team_single_day').show();
                                        }
                                    }else{
                                        // Show Cumm
                                        $('#date_').hide();
                                        // $('.single_day_leader').hide();
                                        if($('#ldrShow').val()==1){
                                            //Show Single
                                            $('#cumm_single').hide();
                                            $('#team_cuml').hide();
                                            $('#cumm_solo').show();
                                            $('#team_single_day').hide();
                                        }else{
                                            //Show Cumm
                                            $('#cumm_single').hide();
                                            $('#team_cuml').show();
                                            $('#cumm_solo').hide();
                                            $('#team_single_day').hide();
                                        }
                                        
                                    }
                                });
                                $(document).on('change','#ldrShow',function(){
                                    var l_Value=$(this).val();
                                   
                                    $('#team_cuml').hide();
                                  $('#cumm_solo').hide();
                                  $('#team_single_day').hide();
                                    if(l_Value==1){
                                        console.log("Solo");
                                        if($('#ChDate').val()==1){
                                            //Show Single
                                            $('#cumm_single').show();
                                            $('#team_cuml').hide();
                                            $('#cumm_solo').hide();
                                            $('#team_single_day').hide();
                                        }else{
                                            //Show Cumm
                                            $('#cumm_single').hide();
                                            $('#team_cuml').hide();
                                            $('#cumm_solo').show();
                                            $('#team_single_day').hide();
                                        }
                                    }else if(l_Value==2){
                                        console.log("Team");
                                        if($('#ChDate').val()==1){
                                            //Show Single
                                            $('#cumm_single').hide();
                                            $('#team_cuml').hide();
                                            $('#cumm_solo').hide();
                                            $('#team_single_day').show();
                                            
                                            cumm_single
                                        }else{
                                            //Show Cumm
                                            $('#cumm_single').hide();
                                            $('#team_cuml').show();
                                            $('#cumm_solo').hide();
                                            $('#team_single_day').hide();
                                        }
                                    }else{
                                        console.log("Continent");
                                        // if($('#ChDate').val()==1){
                                        //     //Show Single
                                        // }else{
                                        //     //Show Cumm
                                        // }
                                    }
                                    // if($(this).val()==1 && $('#ChDate').val()==1){
                                        
                                    //     $('#single_day_leader').show();
                                    // }else if($(this).val()==1 && $('#ChDate').val()==2){
                                    //     $('#cum_ldr_brd').hide();
                                    // }
                                });
                                 
                            </script>
                            <div class="col-md-4">
                                <label>Choose Date</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" id="ChDate">
                                            <option value="1">Date</option>
                                            <option value="2">Cumulative </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <!--<input type="text" class="form-control" name="date_" id="date_" value="<?=date('m-d-Y')?>" readonly>-->
                                        <input type="date" class="form-control" name="date_" id="date_" min="2020-11-14" max="<?=date('Y-m-d')?>">
                                    </div>
                                </div>
                            </div>
                            <script>
                                $('#date_').on('change',function(){
                                // alert(); 
                                var dat=$(this).val()
                                window.location.href="<?=base_url('Participant/LeaderBoard/')?>"+dat;
                                });
                            </script>
                            <div class="col-md-4">
                                <label>Choose Leaderboard</label>
                                <select class="form-control" id="ldrShow">
                                    <option value="1">Solo</option>
                                    <option value="2">Team</option>
                                    <option value="3">Continent</option>
                                </select>
                            </div>
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
                   
                  
                  
                
                <div class="table-responsive" id="cumm_single">
                  <table class="table table-stripped sing single_day_leader" id="example">
                    <thead class=" text-primary">
                        <th>Name</th>
                        <th>Team</th>
                        <!--<th>Age</th>-->
                        <th>Gender</th>
                        <th>Day</th>
                        <th>Distance (km)</th>
                        <th>Rank</th>
                     
                      
                    </thead>
                    <tbody id="solo_sing">
                      <?php
                      $rank=1;
                            foreach($leaderBoard as $ld){
                                
                                ?>
                                    <tr>
                                        <td class="text-center"><?=$ld->firstname.' '.$ld->middle_name.' '.$ld->lastname?></td>
                                        <td class="text-center">
                                            <?php 
                                                if($ld->team_name!=""){
                                                    echo $ld->team_name;
                                                }else{
                                                    echo 'Solo';
                                                }
                                            ?>
                                            
                                        </td>
                                        
                                    
                                        <td class="text-center">
                                            <?php 
                                                if($ld->sex!=""){
                                                    echo $ld->sex;
                                                }else{
                                                    echo 'Not Updated';
                                                }
                                            ?>
                                            
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                if($this->uri->segment('3')){
                                                        $dd_date=$this->uri->segment('3');
                                                     }else{
                                                        $dd_date=date('Y-m-d');
                                                     }
                                            echo $dd_date;
                                            ?>
                                            
                                            </td>
                                        <td class="text-center">
                                            <?php
                                            
                                             if($this->uri->segment('3')){
                                                $dd_date=$this->uri->segment('3');
                                             }else{
                                                $dd_date=date('Y-m-d');
                                             }
                                                $condi___=array("data_Date"=>$dd_date,"user_id"=>$ld->user_id);
                                                    $ddd=$this->db->where($condi___)->get('calculated_data')->row();
                                                    if($ddd){
                                                        if($ddd->distance=='' || $ddd->distance==0){
                                                            echo 0;
                                                        }else{
                                                            echo $ddd->distance/1000;
                                                        }
                                                    }
                                                // if($ld->distance=='' || $ld->distance==0){
                                                //     echo 0;
                                                // }else{
                                                //     echo $ld->distance;
                                                // }
                                            
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                if($ddd->distance==0){
                                                   echo 0; 
                                                }else{
                                                    echo $rank;
                                                    
                                                }
                                            
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                $rank++;
                               
                            }
                      
                      ?>
                      
                      
                    </tbody>
                  </table>
                </div>
                <div class="table-responsive"id="cumm_solo">
                    <table class="table table-stripped cumm" id="cum_ldr_brd">
                        <thead class=" text-primary">
                            <th class="text-center">Name</th>
                            <th class="text-center">Gender</th>
                            <!--<th>Age</th>-->
                            <th class="text-center">Total Distance(km)</th>
                            <!--<th>Rank</th>-->
                            
                         
                          
                        </thead>
                        <tbody id="cuml_">
                          <?php
                          $k=1;
                                foreach($leaderBoard as $ld){
                                    ?>
                                        <tr>
                                            <td class="text-center"><?=$ld->firstname.' '.$ld->middle_name.' '.$ld->lastname?></td>
                                            <td class="text-center">
                                                <?php 
                                                    if($ld->sex!=""){
                                                        echo $ld->sex;
                                                    }else{
                                                        echo 'Not Updated';
                                                    }
                                                ?>
                                                
                                            </td>
                                            
                                          
                                            
                                           
                                            <td class="text-center">
                                                
                                                <?php
                                                    
                                                     $di_sta=0;
                                                    // $condi___=array("data_Date >"=>'2020-11-13',"user_id"=>$ld->user_id);
                                                        $condi___=array("user_id"=>$ld->user_id);
                                                        $ddd=$this->db->where($condi___)->get('calculated_data')->result();
                                                        foreach($ddd as $d8){
                                                            if($d8->distance=='' || $d8->distance==0){
                                                                echo 0;
                                                            }else{
                                                                
                                                              $di_sta+=$d8->distance;
                                                            }
                                                        }
                                                        if($di_sta!=0){
                                                             echo $di_sta/1000;
                                                        }else{
                                                            echo 0;
                                                        }
                                                       
                                                        // if($ddd){
                                                        //     if($ddd->distance=='' || $ddd->distance==0){
                                                        //         echo 0;
                                                        //     }else{
                                                        //         echo $ddd->distance/1000;
                                                        //     }
                                                        // }
                                                    // if($ld->distance=='' || $ld->distance==0){
                                                    //     echo 0;
                                                    // }else{
                                                    //     echo $ld->distance;
                                                    // }
                                                
                                                ?>
                                                
                                            </td>
                                            <!--<td class="text-center">-->
                                            <!--   <?= 'Updating'?>-->
                                            <!--</td>-->
                                        </tr>
                                    <?php
                                    $k++;
                                }
                          
                          ?>
                          
                          
                        </tbody>
                      </table>
                </div>
                <div class="table-responsive" id="team_single_day">
                    <table class="table table-stripped sing" id="tm_ldr_brd_singl_dy">
                        <thead class=" text-primary">
                            <th>Team Namett</th>
                            <th>Number of Participant</th>
                            <th>Day</th>
                            <th>Distance(km)</th>
                            <!--<th>Rank</th>-->
                            
                         
                          
                        </thead>
                        <tbody id="tm_ld_siig">
                          <?php
                            foreach($team_details as $team){
                                ?>
                                    <tr>
                                        <td><?=$team->team_name?></td>
                                        <td>
                                            <?php
                                                if($team->team_id==10){
                                                    // /$condition=array()
                                                    $result=$this->db->where("(team_id = 124 or team_id=10) and amoun_status='Paid'")->get('race_registeration')->result();
                                                    echo count($result);
                                                }else{
                                                    $result=$this->db->where('team_id',$team->team_id)->get('race_registeration')->result();
                                                    echo count($result);
                                                }
                                                
                                            
                                            ?>
                                        </td>
                                        <td><?php
                                                    if($this->uri->segment('3')){
                                                            $dd_date=$this->uri->segment('3');
                                                         }else{
                                                            $dd_date=date('Y-m-d');
                                                         }
                                                echo $dd_date;
                                                ?></td>
                                        <td><?php
                                            if($team->team_id!=10){
                                                // echo 'fdfd';
                                                $distance=0;
                                                 $condition_te=array("race_registeration.team_id"=>$team->team_id,'calculated_data.data_Date'=>$dd_date,"race_registeration.to_show"=>1);
                                                $result_ps=$this->db
                                                ->select('user_details.id_table, user_details.user_id, 
                                                calculated_data.distance')
                                                ->where($condition_te)
                                                ->join('user_details','user_details.id_table=race_registeration.user_id')
                                                ->join('calculated_data','calculated_data.user_id=user_details.user_id')
                                                ->get('race_registeration')->result();
                                                // print_r($result_ps);
                                                // echo count($result_s);
                                                
                                                foreach($result_ps as $adc){
                                                    // print_r($adc); 
                                                    // if($distance!="" || $distance!=""){
                                                        $distance+= $adc->distance;
                                                    // }
                                                    
                                                }
                                                echo $distance;
                                            }
                                            
                                        
                                        ?></td>
                                        <!--<td>0</td>-->
                                    </tr>
                                <?php
                            }
                          ?>
                          
                          
                        </tbody>
                      </table>
                </div>
                <div class="table-responsive" id="team_cuml">
                    <table class="table table-stripped cumm" id="tm_ldr_brd_cuml">
                        <thead class=" text-primary">
                            <th>Team Name </th>
                            <th>Number of Participant</th>
                            <th>Total Distance(Km)</th>
                            <!--<th>Rank</th>-->
                            
                         
                          
                        </thead>
                        <tbody id="tm_ld_siidg">
                          <?php   
                                $j=1;
                                foreach($team_details as $t_dt){
                                    ?>
                                        <tr>
                                            <td><?=$t_dt->team_name?></td>
                                            <td>
                                            <?php
                                                if($t_dt->team_id==10){
                                                    // /$condition=array()
                                                    $result=$this->db->where("(team_id = 124 or team_id=10) and amoun_status='Paid'")->get('race_registeration')->result();
                                                    echo count($result);
                                                }else{
                                                    $result=$this->db->where('team_id',$t_dt->team_id)->get('race_registeration')->result();
                                                    echo count($result);
                                                }
                                                
                                            
                                            ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($t_dt->team_id!=10){
                                                        $result_=$this->db
                                                        ->select('user_details.id_table, user_details.user_id, 
                                                        calculated_data.distance')
                                                        ->where('race_registeration.team_id',$t_dt->team_id)
                                                        ->join('user_details','user_details.id_table=race_registeration.user_id')
                                                        ->join('calculated_data','calculated_data.user_id=user_details.user_id','left')
                                                        ->get('race_registeration')->result();
                                                        // echo count($result_);
                                                        $distance=0;
                                                        foreach($result_ as $adc){
                                                            // print_r($adc); 
                                                            // if($distance!=""){
                                                                $distance+=$adc->distance;
                                                            // }
                                                            
                                                        }
                                                        if($distance!=0){
                                                            echo $distance/1000;
                                                        }else{
                                                            echo $distance;
                                                        }
                                                        
                                                    }
                                                    
                                                
                                                ?>
                                            </td>
                                            <!--<td><?=$j?></td>-->
                                        </tr>
                                    <?php
                                    $j++;
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
      
       <script>
       $(window).on('load',function(){
           $('#team_cuml').hide();
           $('#cumm_solo').hide();
           $('#team_single_day').hide();
       });
                     $(document).on('change','#event_id',function(){
                         var event_id=$(this).val();
                         if($('#team_id').val()!=undefined){
                             var team_id=$('#team_id').val();
                             if(team_id!=0){
                                 getBoth(event_id,team_id);
                             }else{
                                 $.ajax({
                                    url:"<?=base_url('User/getLeadData')?>",
                                    type:'post',
                                    data:{event_id:event_id},
                                    success:function(response){
                                        // console.log(response);
                                        response=JSON.parse(response);
                                        $('#ed').empty();
                                        if(response.data.length>0){
                                            
                                            for(let i=0; i<response.data.length; i++){
                                                var tr='';
                                                tr+='<tr>';
                                                tr+='<td><a href="'+response.data[i].id_table+'">'+response.data[i].firstname+''+response.data[i].middle_name+' '+response.data[i].lastname+'</a></td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='</tr>';
                                                $('#ed').append(tr);
                                                
                                            }
                                        }
                                    }
                                });
                             }
                             
                         }
                        //  console.log(" Event Id: "+event_id+" Team Id: "+team_id);
                     });
                     $(document).on('change','#team_id',function(){
                        var team_id=$(this).val();
                        if($('#event_id').val()!=undefined){
                            var event_id=$('#event_id').val();
                            if(event_id!=0){
                                getBoth(event_id,team_id);
                            }else{
                                $.ajax({
                                    url:"<?=base_url('User/getLeadData')?>",
                                    type:'post',
                                    data:{team_id:team_id},
                                    success:function(response){
                                        // console.log(response);
                                        response=JSON.parse(response);
                                        $('#ed').empty();
                                        if(response.data.length>0){
                                            
                                            for(let i=0; i<response.data.length; i++){
                                                var tr='';
                                                tr+='<tr>';
                                                tr+='<td><a href="'+response.data[i].id_table+'">'+response.data[i].firstname+''+response.data[i].middle_name+' '+response.data[i].lastname+'</a></td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='</tr>';
                                                $('#ed').append(tr);
                                                
                                            }
                                        }
                                    }
                                });
                            }
                        } 
                        //  console.log(" Event Id: "+event_id+" Team Id: "+team_id);
                     });
                     function getBoth(event_id,team_id){
                         console.log('Calling Both ');
                         $.ajax({
                                    url:"<?=base_url('User/getLeadData')?>",
                                    type:'post',
                                    data:{event_id:event_id,team_id:team_id},
                                    success:function(response){
                                        // console.log(response);
                                        response=JSON.parse(response);
                                        $('#ed').empty();
                                        if(response.data.length>0){
                                            
                                            for(let i=0; i<response.data.length; i++){
                                                var tr='';
                                                tr+='<tr>';
                                                tr+='<td><a href="'+response.data[i].id_table+'">'+response.data[i].firstname+''+response.data[i].middle_name+' '+response.data[i].lastname+'</a></td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='<td>'+response.data[i].team_id+'</td>';
                                                tr+='</tr>';
                                                $('#ed').append(tr);
                                                
                                            }
                                        }
                                    }
                        });
                     }
                 </script>
  