
<?php
$regionS1='';
$genderGet= '';
$eventGet= '';
    if($this->input->get('region')){
        $regionS1 = $this->input->get('region');
    }
    if($this->input->get('gender')){
        $genderGet = $this->input->get('gender');
    }
    if($this->input->get('event')){
        $eventGet = $this->input->get('event');
    }
?>
<style type="text/css">
  .tabb{
    background: cornflowerblue;
    color: white;
    padding: 7px;
    margin: 0px 5px;

  }
  #raceSs{
      display: none;
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
                    <div class="row mx-0">
                        <div class="col-md-3 mt-2">
                            <label>Region</label>
                            <select class="form-control" name="regionSelect" id="regionSelect">
                                <option selected disabled>Select</option>
                                <?php
                                    foreach($continents as $regions){ ?> 
                                    <option value="<?=$regions->continent_name?>" vals="<?=$regions->continent_name?>"><?=$regions->continent_name?></option>
                                <?php }    
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                            <label>Gender</label>
                            <select class="form-control" name="genderSelect" id="genderSelect">
                                <option selected disabled>Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                <option value="PreferSay">PreferSay</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2">
                            <label>Event Type</label>
                            <select class="form-control" name="typeSelect" id="typeSelect">
                                <option selected disabled>Select</option>
                                <option value="single">Single</option>
                                <option value="multiple">Multiple</option>
                            </select>
                        </div>
                        <div class="col-md-3 mt-2 " id="raceSs">
                            <label>Events</label>
                            <select class="form-control" name="raceType" id="raceType">
                                <option selected disabled>Select</option>
                                <?php
                                    foreach($events as $event){ ?> 
                                    <option value="<?=$event->event_id?>"><?=$event->event_name?></option>
                                <?php }    
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
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
      <script>
       
        $(document).on('change','#regionSelect',function(){
            var event_=$(this).val();
            var current = window.location.href;
            var n = current.includes("gender");
            var m = current.includes("event");
            if(n || m){
              var o = current.includes("region");
               if(!o){
                var url = current+'&region='+event_;
               }else{
                var queryParams = new URLSearchParams(window.location.search);
                queryParams.set("region", event_);
               var url ='<?=base_url('Report/filterTotalKm')?>?'+queryParams;
               }
                
            }else{
              var url = '<?=base_url('Report/filterTotalKm')?>?region='+event_;
            }
         
            window.location.href = url;
        });
        $(document).on('change','#genderSelect',function(){
            var event_=$(this).val();
            var current = window.location.href;
            var n = current.includes("region");
            var m = current.includes("event");
            
            if(n || m){
              var o = current.includes("gender");
               if(!o){
                  var url = current+'&gender='+event_;
               }else{
                var queryParams = new URLSearchParams(window.location.search);
                queryParams.set("gender", event_);
               var url ='<?=base_url('Report/filterTotalKm')?>?'+queryParams;
               }
            }else{
              var url = '<?=base_url('Report/filterTotalKm')?>?gender='+event_;
            }
       
           window.location.href = url;
        });
        $(document).on('change','#raceType',function(){
            var event_=$(this).val();
            var current = window.location.href;
            var n = current.includes("region");
            var m = current.includes("gender");
            if(n || m){
              var o = current.includes("event");
               if(!o){
                  var url = current+'&event='+event_;
               }else{
                var queryParams = new URLSearchParams(window.location.search);
                queryParams.set("event", event_);
               var url ='<?=base_url('Report/filterTotalKm')?>?'+queryParams;
               }
             
            }else{
              var url = '<?=base_url('Report/filterTotalKm')?>?event='+event_;
            }

            window.location.href = url;
        });
      </script>
       <script type="text/javascript"> 
            $(document).on("change","#typeSelect",function(){
                if($(this).val()=='single'){
                    $("#raceSs").show();
                }else{
                    $("#raceSs").hide();
                }
            });


          $(document).ready(function() {
           
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
              
           
          });
        </script>
 <div id="myPreLoader" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body text-center">     
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
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        var region = '<?=$regionS1?>'
        if(region!=''){
            $('#regionSelect option[vals="'+region+'"]').attr("selected","selected");
        }
    })
    $(document).ready(function(){
        var gen = '<?=$genderGet?>'
        if(gen!=''){
            $('#genderSelect option[value="'+gen+'"]').attr("selected","selected");
        }
    })
    $(document).ready(function(){
        var evnt = '<?=$eventGet?>'
        if(evnt!=''){
          $('#typeSelect option[value="single"]').attr("selected","selected");
          $("#raceSs").show();
            $('#raceType option[value="'+evnt+'"]').attr("selected","selected");
        }
    })
    
</script>