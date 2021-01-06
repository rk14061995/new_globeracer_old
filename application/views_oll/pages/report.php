<style type="text/css">
  .tabb{

    background: cornflowerblue;
    color: white;
    padding: 7px;
    margin: 0px 5px;

  }
</style>
      <div class="content">
       
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- <div class="card-header">
                <h4 class="card-title">Report</h4>
              </div> -->
              <div class="card-body">
                <ul class="nav nav-tabs">
                  <li class="active "><a data-toggle="tab" class="btn btn-success" href="#revenue">Revenue Report</a></li>
                  <li><a data-toggle="tab" class="btn btn-success" href="#race">Race Report</a></li>
                  <!--<li><a data-toggle="tab" class="btn btn-success" href="#rankgg">Mark Rank</a></li>-->
                </ul>

                <div class="tab-content">
                  <div id="rank" class="tab-pane  ">
                    <h3>Mark Rank</h3>
                    <form action="<?=base_url()?>" method="post">
                      <label>Event </label>
                      
                      <select class="js-example-basic-single form-control" name="race">
                        <option value="AL">Alabama</option>
                          ...
                        <option value="WY">Wyoming</option>
                      </select>



                      <label>Participants </label>
                      <select class="js-example-basic-single form-control" name="participant">
                        <option value="AL">Alabama</option>
                        <option value="WY">Wyoming</option>
                        <option value="WY">Wyoming</option>
                        <!-- <option value="WY">Wyoming</option>
                          ... -->
                        <option value="WY">Wyoming</option>
                      </select>
                     
                      <label>Assing Rank </label>
                      <input type="number" class="form-control" name="rankAssign">
                      <hr>
                      <input type="submit" value="Submit" class="btn btn-success">
                    </form>
                      <br>
                        <div align="center">
                          --OR--
                        </div>
                        <br>
                    <form action="<?=base_url()?>" method="post">
                        <div class="">
                          <?php for($i=1; $i<=10; $i++): ?>
                          <div class="row">
                            <div class="col-md-6">
                              <label class="font-weight-bold">Rank <?=$i?></label>
                            </div>
                            <div class="col-md-6">
                              <select class="js-example-basic-single form-control" name="rank_<?=$i?>">
                                <option value="AL">Alabama</option>
                                  ...
                                <option value="WY">Wyoming</option>
                              </select>
                              
                            </div>
                          </div>
                          <br>
                          <?php endfor;?>
                        </div>
                        <input type="submit" class="btn btn-info" value="Submit">
                    </form>
                  </div>
                  <div id="revenue" class="tab-pane active ">
                    <h3>Revenue Report</h3>
                    <hr>
                    <label class="text-danger">Note: Select Event To View Participant</label>
                        <select class="form-control" id="evtName">
                          <option>Select Event</option>
                          <option value="1">Ride</option>
                        </select>
                    <div class="row mt-1">
                        
                        <div class="col-md-6" id="revenue_">
                            Revenue: 
                        </div>
                        <div class="col-md-6" id="participants_">
                            Participants: 
                        </div>
                        
                    </div>
                    
                    <!--<div class="table-responsive">-->
                    <!--  <table class="display" id="example" style="width: 100%">-->
                    <!--    <thead class=" text-primary">-->
                    <!--      <th>-->
                    <!--        Name-->
                    <!--      </th>-->
                    <!--      <th>-->
                    <!--        Country-->
                    <!--      </th>-->
                    <!--      <th>-->
                    <!--        City-->
                    <!--      </th>-->
                    <!--      <th class="text-right">-->
                    <!--        Salary-->
                    <!--      </th>-->
                    <!--    </thead>-->
                    <!--    <tbody>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Dakota Rice-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Niger-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Oud-Turnhout-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $36,738-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Minerva Hooper-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Curaçao-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Sinaai-Waas-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $23,789-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Sage Rodriguez-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Netherlands-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Baileux-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $56,142-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Philip Chaney-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Korea, South-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Overland Park-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $38,735-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Doris Greene-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Malawi-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Feldkirchen in Kärnten-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $63,542-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Mason Porter-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Chile-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Gloucester-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $78,615-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--      <tr>-->
                    <!--        <td>-->
                    <!--          Jon Porter-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Portugal-->
                    <!--        </td>-->
                    <!--        <td>-->
                    <!--          Gloucester-->
                    <!--        </td>-->
                    <!--        <td class="text-right">-->
                    <!--          $98,615-->
                    <!--        </td>-->
                    <!--      </tr>-->
                    <!--    </tbody>-->
                    <!--  </table>-->
                    <!--</div>-->
                  </div>
                  <div id="race" class="tab-pane fade">
                    <h3>Race Report</h3>
                    <div class="table-responsive">
                      <table class="display" id="raceEx" style="width: 100%">
                        <thead class=" text-primary">
                          <th>
                            Name
                          </th>
                          <th>
                            Country
                          </th>
                          <th>
                            City
                          </th>
                          <th class="text-right">
                            Salary
                          </th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              Dakota Rice
                            </td>
                            <td>
                              Niger
                            </td>
                            <td>
                              Oud-Turnhout
                            </td>
                            <td class="text-right">
                              $36,738
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Minerva Hooper
                            </td>
                            <td>
                              Curaçao
                            </td>
                            <td>
                              Sinaai-Waas
                            </td>
                            <td class="text-right">
                              $23,789
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Sage Rodriguez
                            </td>
                            <td>
                              Netherlands
                            </td>
                            <td>
                              Baileux
                            </td>
                            <td class="text-right">
                              $56,142
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Philip Chaney
                            </td>
                            <td>
                              Korea, South
                            </td>
                            <td>
                              Overland Park
                            </td>
                            <td class="text-right">
                              $38,735
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Doris Greene
                            </td>
                            <td>
                              Malawi
                            </td>
                            <td>
                              Feldkirchen in Kärnten
                            </td>
                            <td class="text-right">
                              $63,542
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Mason Porter
                            </td>
                            <td>
                              Chile
                            </td>
                            <td>
                              Gloucester
                            </td>
                            <td class="text-right">
                              $78,615
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Jon Porter
                            </td>
                            <td>
                              Portugal
                            </td>
                            <td>
                              Gloucester
                            </td>
                            <td class="text-right">
                              $98,615
                            </td>
                          </tr>
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
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              } );
               $('#raceEx').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              } );
               $('#eventRanking').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              } );
          } );
        </script>
  