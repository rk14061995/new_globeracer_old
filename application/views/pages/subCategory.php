<script type="text/javascript">
          $(document).ready(function() {
              $('#raceEx').DataTable( {
                  dom: 'Bfrtip',
                //   buttons: [
                //       'copy', 'csv', 'excel', 'pdf', 'print'
                //   ]
              } );
          } );
          $(document).on('click','.deleteEvent',function(){
              var event_id=$(this).attr('event_id');
              swal("Good job!", "This will be Deleted! : "+event_id, "success");
          })
          $(document).on('click','.editCat',function(){
              var cat_id=$(this).attr('cat_id');
              var cat_name= $(this).attr('cat_name');
              $('#cat_id').val(cat_id);
              $('#cat_name').val(cat_name);
              $('#editCategory').modal('show');
          });
          $(document).on('submit','#updateCategory', function(e){
              e.preventDefault();
              var formData= new FormData($(this)[0]);
              $.ajax({
                  url:"<?=base_url('Events/updateCategory')?>",
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
          $(document).on('submit','#addCategory', function(e){
              e.preventDefault();
              var formData= new FormData($(this)[0]);
              $.ajax({
                  url:"<?=base_url('Events/addCategory')?>",
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
          $(document).on('click','.dltCategory', function(){
             
                var cat_id=$(this).attr('cat_id');
              $.ajax({
                  url:"<?=base_url('Events/dltCategory')?>",
                  type:"post",
                 
                  data:{cat_id:cat_id},
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
                <form id="addCategory">
                    <div class="form-group">
                        <label class="font-weight-bold">Category Name</label>
                        <select type="text" class="form-control" name="cat_name" placeholder="New Category Name">
                            <option selected disabled>Select category</option>
                            <?php foreach($categories as $category){ ?>
                                <option value="<?=$category->category_id?>"><?=$category->category_name?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Category Name</label>
                        <input type="text" class="form-control" name="cat_name" placeholder="New Category Name">
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
                            Category Name
                        </th>
                        <th class="text-center">
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <?php foreach($categories as $cat): ?>
                           <tr>
                               <td><?=$i?></td>
                               <td><?=$cat->category_name?></td>
                               <td class="text-center">
                                        <a href="javascript:void(0)" class="btn btn-info editCat" cat_id="<?=$cat->category_id?>" cat_name="<?=$cat->category_name?>" ><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" cat_id="<?=$cat->category_id?>" class="btn btn-danger dltCategory"><i class="fa fa-trash"></i></a>
                                     
                                    </td>
                           </tr>
                        <?php $i++?>
                        <?php endforeach;?>
                       
                           
                      
                    </tbody>
                  </table>
            </div>
           
          
        </div>
    </div>
    <div id="editCategory" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Update Category</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <form id="updateCategory">
                <div class="form-group">
                    <label>Category Name:</label>
                    <input type="hidden" id="cat_id" name="cat_id" class="form-control">
                    <input type="text" id="cat_name" name="cat_name" class="form-control">
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
  