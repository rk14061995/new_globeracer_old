<style type="text/css">
  .tabb{

    background: cornflowerblue;
    color: white;
    padding: 7px;
    margin: 0px 5px;

  }
  /** {*/
  /*    padding: 0;*/
  /*    margin: 0;*/
  /*    box-sizing: border-box;*/
  /*  }*/
    

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
      <div class="content">
          
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="text-danger">Note: Select Event To Generate Report</label>
                            </div>
                        </div>
                        <form id="viewResult">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table ">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <select class="form-control" id="evtName_">
                                                      <option>Select </option>
                                                      
                                                      <?php foreach($events as $evt): ?>
                                                        <option value="<?=$evt->event_id?>"><?=$evt->event_name?></option>
                                                      <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="gndrName">
                                                      <option value="0">Select Gender</option>
                                                      <option value="all">All</option>
                                                      <option value="Male">Male</option>
                                                      <option value="Female">Female</option>
                                                      <option value="Other">Other</option>
                                                      
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" id="categoryRank" >
                                                      <option value="0">Select Category</option>
                                                      <option value="1">18-45</option>
                                                      <option value="2">45-60</option>
                                                      <option value="3">60+</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <!--<a href="javascript:void(0)" class="btn btn-danger" id="genReport">Generate</a>-->
                                                    <input type="submit" value="Generate" class="btn btn-danger" id="genReport">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                     
                                
                                
                            </div>
                        </form>
                        
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
  
                    <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <?php if(isset($event_name)): ?>
                   <div class="card-header">
                    <h4 class="card-title">Showing Result For: <?=$event_name?></h4>
                  </div> 
                 <?php endif;?>
              <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="active ">
                    <a data-toggle="tab" class="btn btn-warning" href="#event">Event Wise</a>
                      
                    </li>
                    <li>
                      <a data-toggle="tab" class="btn btn-warning" href="#cate">Category Wise</a>
                    </li>
                </ul>

                <div class="tab-content">
                  <!--<div id="" class="tab-pane  fade">-->
                    
                  <!--</div>-->
                  <div id="event" class="tab-pane active ">
                    <h3>General Result</h3>
                    
                    
                   
                    <div class="table-responsive">
                      <table class="display" id="example" style="width: 100%">
                        <thead class=" text-primary">
                           <th class="text-left">S.No</th>
                          <th class="text-left">
                            Token
                          </th>
                          <th class="text-left">
                            Name
                          </th>
                          <th class="text-left">
                            Participant KM
                          </th>
                          <th class="text-left">
                            Team KM
                          </th>
                          <th class="text-left">
                            Total number of activities
                          </th>
                          <th class="text-left">
                            Total Event Kilometers
                          </th>
                        </thead>
                        <tbody>
                            <?php foreach($eventResult as $rst): ?>
                              <tr>
                                  <td></td>
                                <td class="text-left">
                                  <?=$rst['token']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['full_name']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['distance']/1000?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['team_distance']/1000?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['total_activities']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['totalEventsKm']/1000?>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div id="cate" class="tab-pane fade">
                    <h3>Race Report</h3>
                    <div class="table-responsive">
                      <table class="display" id="category_wise" style="width: 100%">
                        <thead class=" text-primary">
                            <th>Rank</th>
                          <th class="text-left">
                            BIB
                          </th>
                          <th class="text-left">
                            Name
                          </th>
                          <th class="text-left">
                            Distance KM
                          </th>
                          <th class="text-left">
                            Gender
                          </th>
                          <th class="text-left">
                            Time (HH:MM:SS)
                          </th>
                          <!--<th class="text-left">-->
                          <!--  Overall Rank-->
                          <!--</th>-->
                          <!--<th class="text-left">-->
                          <!--  Gender Rank-->
                          <!--</th>-->
                          <th class="text-left">
                            Age Category
                          </th>
                        </thead>
                        <tbody>
                            <?php foreach($eventResult as $rst): ?>
                              <tr>
                                 <td></td>
                                <td class="text-left">
                                  <?=$rst['token']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['full_name']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['distance']/1000?>
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
                                <td class="text-left">
                                   <?php
                                       if($rst['timeTaken']!="" && $rst['timeTaken']!=0){
                                             $mvtim=(int)$rst['timeTaken'];
                                            $dt1 = new DateTime("@0");
                                            $dt2 = new DateTime("@$mvtim");
                                            
                                        //   print_r($d=$dt1->diff($dt2));
                                           if($dt1->diff($dt2)->format('%d')!=0){
                                              $t_h=$dt1->diff($dt2)->format('%d')*24;
                                               echo $t_h+$dt1->diff($dt2)->format('%h').':'.$dt1->diff($dt2)->format('%i').':'.$dt1->diff($dt2)->format('%s');
                                            //   echo  ' ('.($t_h+$dt1->diff($dt2)->format('%h')).$dt1->diff($dt2)->format(' : %i : %s ').')';
                                           }else{
                                               
                                              echo $dt1->diff($dt2)->format('%h:%i:%s');
                                           }
                                            
                                       }else
                                       { 
                                           echo '00:00:00';
                                       }
                                    ?>
                                </td>
                                <!--<td class="text-left">-->
                                <!--  <?='OR'?>-->
                                <!--</td>-->
                                <!--<td class="text-left">-->
                                <!--  <?='GR'?>-->
                                <!--</td>-->
                                <td class="text-left">
                                  <?php
                                        if($rst['d_o_b']!="0000-00-00"){
                                          $from = new DateTime($rst['d_o_b']);
                                            $to   = new DateTime('today');
                                            $d_o_b=$from->diff($to)->y; 
                                        }else{
                                            $d_o_b = '--';
                                        }
                                //   echo gettype($rst['d_o_b']);
                                    if($Cateogory_wise){
                                    //   echo $Cateogory_wise.'('.$d_o_b.')';
                                    echo $Cateogory_wise;
                                    }else{
                                        
                                    }
                                    
                                    
                                  
                                  ?>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div> -->
                </div>
                <script type="text/javascript">
                  $(document).ready(function() {
                      $('.js-example-basic-single').select2();
                  });
                </script>





                
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
             
                t.on( 'order.dt search.dt buttons.dt', function () {
                    t.column(0, {search:'applied', order:'applied', buttons:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
              
            //   $('#category_wise').DataTable( {
            //       dom: 'Bfrtip',
            //       buttons: [
            //           'csv', 'excel', 'pdf', 'print'
            //       ],
            //       "order": [[ 2, "desc" ]]
            //   } );
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