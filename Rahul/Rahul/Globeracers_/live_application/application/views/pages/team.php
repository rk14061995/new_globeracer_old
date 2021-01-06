    <script type="text/javascript">
          $(document).ready(function() {
              $('#raceEx').DataTable( {
                  dom: 'Bfrtip',
                //   buttons: [
                //       'copy', 'csv', 'excel', 'pdf', 'print'
                //   ]
              } );
          } );
         
          $(document).on('click','.editTeam',function(){
              var team_id=$(this).attr('team_id');
              var team_name= $(this).attr('team_name');
              $('#team_id').val(team_id);
              $('#team_name').val(team_name);
              $('#editTeamm').modal('show');
          });
          $(document).on('submit','#updateTeam', function(e){
              e.preventDefault();
              var formData= new FormData($(this)[0]);
              $.ajax({
                  url:"<?=base_url('Team/updateTeam')?>",
                  type:"post",
                  cache:false,
                  contentType:false,
                  processData:false,
                  data:formData,
                  success:function(response){
                      response=JSON.parse(response);
                      if(response.code==1){
                          swal("Great", "Updated!", "success");
                      }else{
                          swal("Oops", "Failed To Update", "error");
                      }
                      setInterval(function(){
                          location.reload();
                      },2000);
                  }
              });
          });
          $(document).on('submit','#addTeam', function(e){
              e.preventDefault();
              var formData= new FormData($(this)[0]);
              $.ajax({
                  url:"<?=base_url('Team/addTeam')?>",
                  type:"post",
                  cache:false,
                  contentType:false,
                  processData:false,
                  data:formData,
                  success:function(response){
                      response=JSON.parse(response);
                      if(response.code==1){
                          swal("Great", "Added!", "success");
                      }else{
                          swal("Oops", "Failed To Add", "error");
                      }
                      setInterval(function(){
                          location.reload();
                      },2000);
                  }
              });
          });
          $(document).on('click','.dltTeam', function(){
             
                var team_id=$(this).attr('team_id');
              $.ajax({
                  url:"<?=base_url('Team/dltTeam')?>",
                  type:"post",
                 
                  data:{team_id:team_id},
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
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <form id="addTeam">
                    <div class="form-group">
                        <label class="font-weight-bold">Team Name</label>
                        <input type="text" class="form-control" name="team_name" placeholder="New Team Name">
                    </div>
                    <div class="form-group">
                        
                        <input type="submit" class="btn btn-success" Value="Add New">
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table class="display" id="raceEx" style="width: 100%">
                    <thead class=" text-primary">
                        <th class="text-center">
                            S.No
                        </th>
                        <th class="text-center">
                            Team Name
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <?php foreach($teams as $detail): ?>
                           <tr>
                               <td><?=$i?></td>
                               <td><?=$detail->team_name?></td>
                               <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-info editTeam" team_id="<?=$detail->team_id?>" team_name="<?=$detail->team_name?>" ><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" team_id="<?=$detail->team_id?>" class="btn btn-danger dltTeam"><i class="fa fa-trash"></i></a>
                                     
                                    </td>
                           </tr>
                        <?php $i++?>
                        <?php endforeach;?>
                       
                           
                      
                    </tbody>
                  </table>
            </div>
           
          
        </div>
    </div>
    <div id="editTeamm" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Update Team</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="updateTeam">
                <div class="form-group">
                    <label>Team Name:</label>
                    <input type="hidden" id="team_id" name="team_id" class="form-control">
                    <input type="text" id="team_name" name="team_name" class="form-control">
                    <hr>
                    
                </div>
                <div class="form-group">
                   
                    <input type="submit" value="Update" class="btn btn-warning">
                    
                    
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
  