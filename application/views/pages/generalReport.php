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
                                <h5 class="text-dark">Revenue By Race</h5>
                            </div>
                        </div>
                        <div id="viewResult">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <select class="form-control" id="evtName_">
                                      <option>Select </option>
                                      
                                      <?php foreach($events as $evt): ?>
                                        <option value="<?=$evt->event_id?>"><?=$evt->event_name?></option>
                                      <?php endforeach; ?>
                                    </select>
                                </div>
                              
                                <div class="col-md-6">
                                    <!--<a href="javascript:void(0)" class="btn btn-danger" id="genReport">Generate</a>-->
                                    <button  type="button" class="btn btn-danger m-0" id="genReport">Generate</button>
                                </div>
                                            
                                </div>
                                <div class=" table-responsible mt-3">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                          <tr>
                                            <th>Total Participants</th>
                                            <th>Paid Total </th>
                                            <th>Cancel Total </th>
                                            <th class="text-right">Total Earning</th>
                                          </tr>
                                        </thead>
                                        <tbody class="revenueResult">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                        
                        <script>
                        
                        $(document).on('click','#genReport',function(){
                            var event_id=$('#evtName_').val();
                            var html ='';
                            $.ajax({
                               url:"<?=base_url('Report/getAmountByRace')?>",
                               type:"post",
                               data:{
                                 event_id:event_id
                                },
                               success:function(response){
                                 //  console.log(response);
                                   response=JSON.parse(response);
                                   if(response.code==1){
                                    $('.revenueResult').empty();
                                   
                                  var participant =0 
                                  var paid =0;
                                  var cancel =0;
                                      if(response.data.cancel[0].paidAmount!=null){
                                          cancel = parseFloat(response.data.cancel[0].paidAmount).toFixed(2);
                                      }
                                      if(response.data.paid[0].paidAmount!=null){
                                        paid = parseFloat(response.data.paid[0].paidAmount).toFixed(2);
                                        participant = response.data.paid[0].participantCount;
                                      }
                                     
                                    var earn = parseFloat(paid-cancel).toFixed(2);
                                
                                      html+='<tr>'+
                                              '<td>'+participant+'</td>'+
                                              '<td>'+paid+'</td>'+
                                              '<td>'+cancel+'</td>'+
                                              '<td class="text-right"><strong>'+earn+'</strong></td>'+
                                            '</tr>';
                                            $('.revenueResult').append(html);
                                   }else{
                                       swal("Error", "Something Went Wrong", "error");
                                   }
                                  //  setInterval(function(){
                                  //      location.reload();
                                  //  },2000);
                                   
                               }
                           });
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
              
                <div class="tab-content">
                  <!--<div id="" class="tab-pane  fade">-->
                    
                  <!--</div>-->
                  <div >
                    <h3>Total Participants Across All Races</h3>
                    
                    
                   
                    <div class="table-responsive">
                      <table class="display" id="example" style="width: 100%">
                        <thead class=" text-primary">
                           <th class="text-left">S.No</th>
                          
                          <th class="text-left">
                            Name
                          </th>
                          
                          <th class="text-left">
                            Total number of Participant
                          </th>
                          <!-- <th>Total Km
                          </th> -->
                         
                        </thead>
                        <tbody>
                            <?php 
                            $sno=1;
                            foreach($eventResult as $rst): ?>
                              <tr>
                                <td>
                                  <?=$sno?>
                                </td>
                              
                                <td class="text-left">
                                  <?=$rst->event_name?>
                                </td>
                                
                                <td class="text-left">
                                  <?=$rst->participantCount?>
                                </td>
                                <!-- <td class="text-left">
                                  <?=$rst->sumTotal/1000?>
                                </td> -->
                                
                              </tr>
                              <?php
                              $sno++;
                            endforeach; ?>
                          
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