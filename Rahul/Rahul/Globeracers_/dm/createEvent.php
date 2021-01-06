
      <div class="content">
        <div class="row">
         <script type="text/javascript">
           $(document).on('submit','#createEvent',function(e){
            e.preventDefault();
            var formData= new FormData($(this)[0]);
            // console.log(formData);
            // formData.append('access_token','9b444caf81da907f30aa0fc014ea1d440733c10d');
            // formData.append('code','9b444caf81da907f30aa0fc014ea1d440733c10d');
            $.ajax({
              url:"https://www.strava.com/api/v3/activities",
              headers: {
                "Authorization": "Bearer 9b444caf81da907f30aa0fc014ea1d440733c10d"
              },
              cache:false,
              processData:false,
              contentType:false,
              type:"post",
              data:formData,
              success:function(response){
                console.log(response);
              }
            })
             // action="https://www.strava.com/api/v3/activities" method="post"
           });
         </script>
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Create Event</h5>
              </div>
              <div class="card-body">
               <!--  <form id="createEvent">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="name" placeholder="The name of the activity." value="">
                      </div>
                    </div>
                    <div class="col-md-6 px-1">
                      <div class="form-group">
                        <label>Type</label>
                        <input type="text" class="form-control" name="" placeholder="Type of activity. For example - Run, Ride etc." value="">
                      </div>
                    </div>
                    

                  </div>
                  <div class="row">
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control" name="start_date_local" >
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Elapsed Time</label>
                        <input type="number" class="form-control" name="elapsed_time" placeholder="In seconds.">
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Distance</label>
                        <input type="text" class="form-control" placeholder="In meters." name="distance">
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label></label>
                        <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label></label>
                        <input type="checkbox" class="" name="commute" value="1"> Commute
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Create</button>
                    </div>
                  </div>
                </form> -->
                 <form id="createEvent">
                  <div class="row">
                    <div class="col-md-6 p-1">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control"  name="name" placeholder="The name of the activity." value="">
                      </div>
                    </div>
                    <div class="col-md-6 p-1">
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" name="" placeholder="Type of activity. For example - Run, Ride etc." value="">
                      </div>
                    </div>
                    

                  </div>
                  <div class="row">
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control" name="start_date_local" >
                      </div>
                    </div>
                    <div class="col-md-4 p-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" class="form-control" name="end_date_local" >
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Fee</label>
                        <input type="text" class="form-control" placeholder="&#x20B9; 0" value="" name="fee">
                      </div>
                    </div>
                   
                  </div>
                  <div class="row">
                    <div class="col-md-6 p-1">
                      <div class="form-group">
                        <label>Set Guidelines</label>
                        <textarea name="set_guidelines" id="set_guidelines">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
                        <script>
                            CKEDITOR.replace( 'set_guidelines' );
                        </script>
                        <!-- <textarea class="form-control" name="set_guidelines"></textarea> -->
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                    <div class="col-md-6 p-1">
                      <div class="form-group">
                        <label>Add FAQ</label>
                        <!-- <textarea class="form-control" name="add_faq"></textarea> -->
                        <textarea name="add_faq" id="add_faq">&lt;p&gt;Initial editor content.&lt;/p&gt;</textarea>
                        <script>
                            CKEDITOR.replace( 'add_faq' );
                        </script>
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Coaches/Nutritionist</label>
                        <select class="js-example-basic-single form-control" name="coach_nutri">
                          <option value="AL">Alabama</option>
                            ...
                          <option value="WY">Wyoming</option>
                        </select>
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>NGO</label>
                        <select class="js-example-basic-single form-control" name="ngo_">
                          <option value="AL">Alabama</option>
                            ...
                          <option value="WY">Wyoming</option>
                        </select>
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 pl-1">
                      <div class="form-group">
                        <label>Coaches/Nutritionist</label>
                        <select class="js-example-basic-single form-control" name="coach_nutri">
                          <option value="AL">Alabama</option>
                            ...
                          <option value="WY">Wyoming</option>
                        </select>
                        <!-- <input type="checkbox" class="" name="trainer" value="1"> Are you a Trainer -->
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Create</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

      </script>
 