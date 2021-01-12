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
              
                <div class="tab-content">
                  <!--<div id="" class="tab-pane  fade">-->
                    
                  <!--</div>-->
                  <div >
                    <h3> Participants In Multiple Races</h3>
                     <div class="table-responsive">
                      <table class="display" id="example" style="width: 100%">
                        <thead class=" text-primary">
                           <th class="text-left">S.No</th>
                          
                          <th class="text-left">
                            Name
                          </th>
                          <th class="text-left">
                            Gender
                          </th>
                          <th class="text-left">
                            Total KM
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
                                  <a href="<?=base_url('Report/myUpComing/'.$rst['u_id'])?>" ><?=$rst['firstname']?></a>
                                </td>
                                <td class="text-left">
                                  <?=$rst['sex']?>
                                </td>
                                <td class="text-left">
                                  <?=$rst['totalSum']->sumDistance/1000?>
                                </td>
                               
                                
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
                 
                } );
                
                m.on( 'order.dt search.dt buttons.dt', function () {
                    m.column(0, {search:'applied', order:'applied', buttons:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
           
             
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