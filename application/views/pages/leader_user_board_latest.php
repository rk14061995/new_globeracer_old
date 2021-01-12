
<?php
  if($this->input->get('_for_')){
    $date_one=$this->input->get('_for_');
  }else{
    $date_one=date('Y-m-d');
  }
        // if($this->uri->segment('4')){
                
       // }else{
          
       // }
       // if($this->uri->segment('3')){
          $event_id=$this->input->get('event_id');
       // }else{
       //    $event_id=0;
       // }
            // echo $date_one;
    ?>
<style type="text/css">
  .tabb{

    background: cornflowerblue;
    color: white;
    padding: 7px;
    margin: 0px 5px;

  }
    .waviy {
        /*background-color: #111;*/
      display: flex;
      justify-content: center;
      align-items: center;
      /*min-height: 100vh;*/
      position: relative;
      -webkit-box-reflect: below -20px linear-gradient(transparent, rgba(0,0,0,.2));
    }
    .waviy span {
      position: relative;
      display: inline-block;
      font-size: 26px;
      /*color: #fff;*/
      text-transform: uppercase;
      animation: waviy 1s infinite;
      animation-delay: calc(.1s * var(--i))
    }
    @keyframes waviy {
      0%,40%,100% {
        transform: translateY(0)
      }
      20% {
        transform: translateY(-20px)
      }
    }
</style>
<script>
  $(document).on('submit','#viewResult',function(e){
      e.preventDefault();
      var event_id=$('#evtName_').val();
      var category=$('#categoryRank').val();
      var gender=$('#gndrName').val();
      window.location.href="<?=base_url('Report/')?>"+'?event_id='+event_id+'&category='+category+'&gender='+gender;
  });
  $(document).on('click','#genReport',function(){
      var event_id=$('#evtName_').val();
      var category=$('#categoryRank').val();
      var gender=$('#gndrName').val();
      window.location.href="<?=base_url('Gen-Report/')?>"+'?event_id='+event_id+'&category='+category+'&gender='+gender;
  });
  $(document).on('change','#evtName',function(){
      var event_id=$(this).val();
      window.location.href="<?=base_url('Report/')?>"+event_id;
      $('#myPreLoader').modal('show');
  });
</script>
<script>
  $(document).ready(function(){
    $('#team').hide();
  });
  $(document).on('change','#event_id',function(){
    var eventId=$(this).val();
  
  });
  
    
  // var date='dd';
      var date='<?=$date_one?>';
      $(document).on('change','#ChDate',function(){
          if($(this).val()==1){
              //Show Single
              $('#date_div').show();

              $('#date_').show();
              if($('#ldrShow').val()==1){
                  //Show Single
                  $('#cumm_single').show();
                  $('#team_cuml').hide();
                  $('#cumm_solo').hide();
                  $('#team_single_day').hide();
                  $('#filter_single').hide();
              }else{
                  //Show Cumm

                  $('#cumm_single').hide();
                  $('#team_cuml').hide();
                  $('#cumm_solo').hide();
                  $('#team_single_day').show();
                  $('#filter_single').hide();
                  
                  
                  
                  console.log(" Date: "+date);
              }
          }else{

            window.location.href="<?=base_url('Report/viewLeaderboard').'?event_id='.$event_id?>";
              // Show Cumm
              $('#date_').show();
              $('#date_div').hide();
              // $('.single_day_leader').hide();
              if($('#ldrShow').val()==1){
                  //Show Single
                  $('#cumm_single').hide();
                  $('#team_cuml').hide();
                  $('#cumm_solo').show();
                  $('#team_single_day').hide();
                  $('#filter_single').hide();
              }else{
                  //Show Cumm
                  $('#cumm_single').hide();
                  $('#team_cuml').show();
                  $('#cumm_solo').hide();
                  $('#team_single_day').hide();
                  $('#filter_single').hide();
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
                  $('#filter_single').hide();
              }else{
                  //Show Cumm
                  $('#cumm_single').hide();
                  $('#team_cuml').hide();
                  $('#cumm_solo').show();
                  $('#team_single_day').hide();
                  $('#filter_single').hide();
              }
          }else if(l_Value==2){
              console.log("Team");
              if($('#ChDate').val()==1){
                  //Show Single
                  $('#cumm_single').hide();
                  $('#team_cuml').hide();
                  $('#cumm_solo').hide();
                  $('#team_single_day').show();
                  $('#filter_single').hide();
                  console.log(" Date: "+date);
                  // cumm_single
              }else{
                  //Show Cumm
                  $('#cumm_single').hide();
                  $('#team_cuml').show();
                  $('#cumm_solo').hide();
                  $('#team_single_day').hide();
                  $('#filter_single').hide();
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
<script>
    $(document).on('change','#date_',function(){
        var dat=$(this).val()
        // alert('Date Selected');
        window.location.href="<?=base_url('Report/viewLeaderboard').'?event_id='.$event_id.'&_for_='?>"+dat;
    });
</script>
<script>                          
  $('#filter').on('change',function(){
      var filter_val=$(this).val();
      console.log(" Filter Value : "+filter_val+' Fetch Data For : '+date);
      $('#team_cuml').hide();
         $('#cumm_single').hide();
         
         cumm_single
         $('#cumm_solo').hide();
         $('#team_single_day').hide();
      $('#filter_single').show();
      // if(){
          
      // }
      $.ajax({
          url:"<?=base_url('User/fetchDataByFilter')?>",
          type:"post",
          data:{filter_:filter_val,date:date},
          success:function(response){
              // console.log(response);
              response=JSON.parse(response);
              if(response.code==1){
                  $('#filterSingle').empty();
                  for(let i=0; i<response.data.length; i++){
                      var tr='';
                      tr+='<tr>';
                      tr+='<td>'+response.data[i].firstname+' '+response.data[i].middle_name+' '+response.data[i].lastname+'</td>';
                      tr+='<td>'+response.data[i].team_name+'</td>';
                      tr+='<td>'+response.data[i].sex+'</td>';
                      tr+='<td>'+response.data[i].type+'</td>';
                      tr+='<td>'+response.data[i].start_date+'</td>';
                      tr+='<td>'+(response.data[i].dist_/1000)+'</td>';
                      
                      if(response.data[i].dist_==0){
                          var rank=0;
                      }else{
                          var rank=(i+1);
                      }
                      tr+='<td>'+rank+'</td>';
                      tr+='</tr>';
                      $('#filterSingle').append(tr);
                  }
              }else{
                  swal("Sorry", "No Data Found!", "error");
              }
          }
      });
      // window.location.href="<?=base_url('User/testLe/')?>"+date+"/"+filter_val;
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#date_div').hide();  
  });
  
</script>
<?php
  if($ddd=$this->input->get('type')){
      if($ddd=='Solo'){
        ?>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#ldrShowType option[value=1]').attr('selected','selected');
              $('#single').show();
              $('#team').hide();
            });      
          </script>
        <?php
      }else{
        ?>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#ldrShowType option[value=2]').attr('selected','selected');
              $('#single').hide();
              $('#team').show();
            });      
          </script>
        <?php
      }
  }  

  if($this->input->get('_for_')){
    ?>  
    <script type="text/javascript">
      $(document).ready(function(){
        $('#ChDate option[value=1]').attr('selected','selected');
        $('#date_div').show();
        $('#date_').show();
      });      
    </script>
    <?php  
  }else{
    ?>  
    <script type="text/javascript">
      $(document).ready(function(){
        $('#ChDate option[value=2]').attr('selected','selected');
        $('#date_div').hide();
        $('#date_').hide();
      });
    </script>
    <?php
  }
?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <span class="text-danger"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-md-3">
                            <label>Choose Date</label>
                            <select class="form-control" id="ChDate">
                                <option value="1">Date</option>
                                <option value="2" >Cumulative </option>
                            </select>
                        </div>
                        <div class="col-md-3" id="date_div">
                            <label>Choose Date</label>
                            <!--<input type="text" class="form-control" name="date_" id="date_" value="<?=date('m-d-Y')?>" readonly>-->
                            <?php
                              if($date_one<=$max_date){
                                $vd=date('Y-m-d',strtotime($date_one));
                              }else{
                                $vd=date('Y-m-d',strtotime($max_date));
                              }

                            ?>

                            <input type="date" value="<?=$vd?>" class="form-control" name="date_" id="date_" min="2020-11-14" min="<?=$min_date?>" max="<?=$max_date?>">
                        </div>
                        <div class="col-md-3">
                            <label>Choose Leaderboard</label>
                            <select class="form-control" id="ldrShowType">
                                <option value="1" selected>Solo</option>
                                <option value="2">Team</option>
                                <option value="3">Continent</option>
                            </select>
                        </div>
                        <?php
                           $currentURL = current_url(); //for simple URL
                           $params = $_SERVER['QUERY_STRING']; //for parameters
                           $fullURL = $currentURL . '?' . $params; //full URL with parameter

                        ?>
                        <script type="text/javascript">
                          $(document).on('change','#ldrShowType',function(){
                            var Type_=$(this).val();
                            var gjj='<?=$fullURL?>';
                              // console.log(gjj);
                            if(Type_==1){
                              var t="Solo";
                              window.location.href="<?=base_url('Report/viewLeaderboard')?>"+"?event_id="+'<?=$event_id?>'+"&type="+t;
                            
                            }else{
                              var t="team";
                              $('#single').hide();
                              $('#team').show();
                              window.location.href="<?=base_url('Report/viewLeaderboard')?>"+"?event_id="+'<?=$event_id?>'+"&type="+t; 
                            }
                          });
                        </script>
                        <div class="col-md-3">
                            <label>Filter</label>
                            <select class="form-control" id="filter">
                                <option >Select</option>
                                <option value="Ride">Cycling</option>
                                <option value="Run">Running</option>
                                <option value="Yoga">Yoga</option>
                                <option value="Walk">Walk</option>
                                <option value="Weight">Weight Training</option>
                                <option value="AlpineSki">Alpine Ski</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <script type="text/javascript">
            $(document).on('change','#filter',function(){
              var Type_=$(this).val();
                $('#single').show();
                $('#team').hide();
                window.location.href="<?=$fullURL?>"+"&run_type="+Type_; 
              // if(Type_==1){
              //   var t="solo";
              //   $('#single').show();
              //   $('#team').hide();
              
              // }else{
              //   var t="team";
              //   $('#single').hide();
              //   $('#team').show();
                
              // }
            });
          </script>
        </div>
        <div class="row" id="single">
          <div class="col-md-12">
            <div class="card">
                <?php if(isset($event_name)): ?>
                   <div class="card-header">
                    <h4 class="card-title ">Showing Result For: <span class="text-warning"> <?=$event_name?></span></h4>
                    <hr>
                  </div> 
                 <?php endif;?>
              <div class="card-body">
                <div class="tab-content">
                  <div id="cate" class="tab-pane active">
                    <div class="table-responsive">
                      <table class="display" id="category_wise" style="width: 100%">
                        <thead class=" text-primary">
                          <th class="text-left">
                            Rank
                          </th>
                          <th class="text-left">
                            BIB
                          </th>
                          <th class="text-left">
                            Name
                          </th>
                          <?php
                            if($this->input->get('_for_')){
                              ?>
                                <th class="text-left">
                                  Day
                                </th>
                              <?php
                            }
                          ?>
                          <th class="text-left">
                            Distance KM
                          </th>
                          <th class="text-left">
                            Gender
                          </th>
                        </thead>
                        <tbody>
                            <?php foreach($eventResult as $rst): ?>
                              <tr>
                                <!-- <td></td> -->
                                <td class="text-left">
                                  <?=$rst['rank']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['token']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['name']?>
                                </td>
                                <?php if($this->input->get('_for_')): ?>
                                  <td class="text-left">
                                    <?=$for_?>
                                  </td>
                                <?php endif;?>
                                <td class="text-left">
                                  <?=$rst['distance']?>
                                </td>
                                <td class="text-left">
                                  <?php 
                                    if($rst['gender']!=""){
                                        echo $rst['gender'];
                                    }else{
                                        echo '--';
                                    }
                                  
                                  ?>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row " id="team">
          <div class="col-md-12">
            <div class="card">
                <?php if(isset($event_name)): ?>
                   <div class="card-header">
                    <h4 class="card-title ">Showing Result For: <span class="text-warning"> <?=$event_name?></span></h4>
                    <hr>
                  </div> 
                 <?php endif;?>
              <div class="card-body">
                <div class="tab-content">
                  <div id="cate" class="tab-pane active">
                    <div class="table-responsive">
                      <table class="display" id="team" style="width: 100%" border="1">
                        <thead class=" text-primary">
                          <th class="text-center">
                            S.No
                          </th>
                          <th class="text-center">
                            Rank
                          </th>
                          <th class="text-left">
                            Team Name
                          </th>
                          <th class="text-left">
                            Distance (Km)
                          </th>
                         
                        </thead>
                        <tbody>
                          <?php $k=1;?>
                            <?php foreach($team_data as $tm): ?>
                              <tr>
                                <td class="text-center"><?=$k?></td>
                                <td class="text-center">
                                  <?=$tm['rank']?>
                                </td>
                                <td class="text-left">
                                  <?=$tm['team_name']?>
                                </td>
                                <td class="text-left">
                                  <?=$tm['team_distance']/1000?>
                                </td>
                              </tr>
                              <?php $k++?>
                              <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <script type="text/javascript"> 
          $(document).ready(function() {
            //   $('#example').DataTable( {
            //       dom: 'Bfrtip',
            //       buttons: [
            //           'csv', 'excel', 'pdf', 'print'
            //       ],
            //       "order": [[ 2, "desc" ]]
            //   } );
              
               var m = $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'csv', 'excel', 'pdf', 'print'
                  ],
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    
                    
                    "order": [[ 3, 'desc' ]]
                } );
                
                m.on( 'order.dt search.dt buttons.dt', function () {
                    m.column(0, {search:'applied', order:'applied', buttons:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
                
                
                var t = $('#category_wise').DataTable( {
                    dom: 'Bfrtip',
                      buttons: [
                          'csv', 'excel', 'pdf', 'print'
                      ],
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    buttons: [
                          'csv', 'excel', 'pdf', 'print'
                      ],
                    "order": [[ 3, 'desc' ]]
                } );


             
                // t.on( 'order.dt search.dt buttons.dt', function () {
                //     t.column(0, {search:'applied', order:'applied', buttons:'applied'}).nodes().each( function (cell, i) {
                //         cell.innerHTML = i+1;
                //     } );
                // } ).draw();
              
              // $('#team').DataTable( {
              //     dom: 'Bfrtip',
              //     buttons: [
              //         'csv', 'excel', 'pdf', 'print'
              //     ],
              //     "order": [[ 3, "desc" ]]
              // } );
            //   $('#eventRanking').DataTable( {
            //       dom: 'Bfrtip',
            //       buttons: [
            //           'copy', 'csv', 'excel', 'pdf', 'print'
            //       ]
            //   } );
          } );
        </script>
  <div id="myPreLoader" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <!--<div class="modal-header">-->
            
          <!--</div>-->
          <div class="modal-body text-center">
              <!--<div id="spinner">-->
              <!--    <div class="spinner-grow text-primary" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-secondary" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-success" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-danger" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-warning" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-info" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-light" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--      <div class="spinner-grow text-dark" role="status">-->
              <!--        <span class="sr-only">Loading...</span>-->
              <!--      </div>-->
              <!--</div>-->
              <div id="loader">
                  <div class="waviy">
                       <span style="--i:1">C</span>
                       <span style="--i:2">A</span>
                       <span style="--i:3">L</span>
                       <span style="--i:4">C</span>
                       <span style="--i:5">u</span>
                       <span style="--i:6">L</span>
                       <span style="--i:7">A</span>
                       <span style="--i:8">T</span>
                       <span style="--i:9">I</span>
                       <span style="--i:10">N</span>
                        <span style="--i:1a">G</span>
                        <span style="--i:12">.</span>
                        <span style="--i:13">.</span>
                        <span style="--i:14">.</span>
                        <span style="--i:15">.</span>
                       
                      </div>
              </div>
            
          </div>
          <!--<div class="modal-footer">-->
            
          <!--</div>-->
        </div>
    
      </div>
    </div>