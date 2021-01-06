<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
                        <script src="//geodata.solutions/includes/countrystatecity.js"></script>
      <div class="content">
        <div class="row">
        <!--<?php print_r($eventDetail)?>-->
          <div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Registration Fee</h5>
                <hr>
              </div>
              <div class="card-body">
                   <?php
                            // if($this->session->flashdata('reg_msg')){
                            //     echo '<div class="alert alert-info">'.$this->session->flashdata('reg_msg').'</div>';
                            // }
                            $price=0;
                   ?>
                   <?php foreach($eventDetail as $detail): ?>
                    <div class="row">
                        <div class="col-md-3 py-2 " >
                        <label class="font-weight-bold">Event Name:</label><br>
                        <span style="font-size: 16px;"><?=$detail->event_name?></span>
                        </div>
                        <div class="col-md-3 py-2 " >
                            <label class="font-weight-bold">Event Date: </label><br>
                            <span style="font-size: 16px;"><?=$detail->event_start_date.' - '.$detail->event_end_date?></span>
                        </div>
                        <div class="col-md-3">
                            <label class="font-weight-bold">Pay Using Payumoney</label><br>
                            <!--https://globeracers.com/Globeracers//payment/10-->
                            <a href="<?=base_url('API/payumoney/').$detail->reg_id?>" class="btn btn-primary btn-round">Pay Now </a>
                            <!--<a href="<?=base_url('User/payumoney/').$detail->reg_id?>" class="btn btn-primary btn-round">Pay Now &#8377; <?=$detail->amount_to_pay?> </a>-->
                        </div>
                        <!--<div class="col-md-3 py-2 " >-->
                        <!--    <label class="font-weight-bold">Pay Using Paypal</label>-->
                        <!--    <div id="paypal-button"></div>-->
                        <!--</div>-->
                    </div>
                    <?php endforeach;?>
                  
              </div>
              
              
              
                <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                <script>
                  paypal.Button.render({
                    // Configure environment
                    env: 'sandbox',
                    client: {
                      sandbox: 'demo_sandbox_client_id',
                      production: 'demo_production_client_id'
                    },
                    // Customize button (optional)
                    locale: 'en_US',
                    style: {
                      size: 'small',
                      color: 'gold',
                      shape: 'pill',
                    },
                
                    // Enable Pay Now checkout flow (optional)
                    commit: true,
                
                    // Set up a payment
                    payment: function(data, actions) {
                      return actions.payment.create({
                        transactions: [{
                          amount: {
                            total: '0.01',
                            currency: 'USD'
                          }
                        }]
                      });
                    },
                    // Execute the payment
                    onAuthorize: function(data, actions) {
                      return actions.payment.execute().then(function() {
                        // Show a confirmation message to the buyer
                        window.alert('Thank you for your purchase!');
                      });
                    }
                  }, '#paypal-button');
                
                </script>
              
              
              
            </div>
          </div>
        </div>
      </div>
      
 