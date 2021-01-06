
      <div class="content">
        <script type="text/javascript">
          $(document).ready(function() {
              $('#example').DataTable( {
                  dom: 'Bfrtip',
                  buttons: [
                      'pdf', 'print','csv'
                  ]
              } );
          } );
        //   $(document).on('click','.deleteEvent',function(){
        //       var event_id=$(this).attr('event_id');
        //       swal("Good job!", "This will be Deleted! : "+event_id, "success");
        //   })
          
           $(document).on('click','.editCat',function(){
              var cat_id=$(this).attr('cat_id');
              var cat_name= $(this).attr('cat_name');
              $('#cat_id').val(cat_id);
              $('#cat_name').val(cat_name);
              $('#editCategory').modal('show');
          });
          $(document).on('click','.deleteEvent', function(){
             
                var event_id=$(this).attr('event_id');
              $.ajax({
                  url:"<?=base_url('Events/dltEvent')?>",
                  type:"post",
                 
                  data:{event_id:event_id},
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
        //   $(document).on('change','.actInactive',function(){
        //      var event_id= 
        //   });
        </script>
        <div class="row">
            <div class="col-md-12">
                <table class="display" id="example" style="width: 100%">
                    <thead class=" text-primary">
                      <th class="text-center">
                        Event Name
                      </th>
                      <th class="text-center">
                        Image
                      </th>
                      <th class="text-center">
                        Venue
                      </th>
                      <th class="text-center">
                        Date
                      </th>
                      <th class="text-center">Status</th>
                      <th class="text-center">
                        Action
                      </th>
                      <!--<th class="text-right">-->
                      <!--  Salary-->
                      <!--</th>-->
                    </thead>
                    <tbody>
                        <?php foreach($oldUser as $evt):?>
                            <tr>
                                <td><?=$evt?></td>
                                <td><?=$evt?></td>
                                <td><?=$evt?></td>
                                <td><?=$evt?></td>
                                <td><?=$evt?></td>
                                <td><?=$evt?></td>
                                
                            </tr>
                        <?php endforeach;?>
                      
                    </tbody>
                  </table>
            </div>
           
          
        </div>
      </div>
  