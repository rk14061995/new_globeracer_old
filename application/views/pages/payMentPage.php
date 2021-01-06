<!DOCTYPE html>
<html>
<head>
	<title>Paypal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <?php 
        if($eventData->amount_to_pay==769.95){
            $amt=10.37;
        }else{
            $amt=769.95;
        }
        
    ?>
    <div class="row">
            <div class="col-md-6 offset-md-3 my-3" >
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <div class="main">
                        	
                            <div>
                            	<h4>Registration Fee</h4>
                            	<hr>
                            </div>
                        	<form action="#" id="payment_form">
                               
                               
                               <label>Transaction/Order ID:</label>
                                <input type="text" id="txnid" class="form-control" name="txnid" placeholder="Transaction ID" value="<?php echo  "REF-" . date('dmYhis')?>" readonly/>
                                <label>Amount:</label>
                                <input type="text" id="amount" class="form-control" name="amount" placeholder="Amount" value="<?=$amt?>" readonly/>    
                                <input type="hidden" id="pinfo" class="form-control" name="pinfo" placeholder="Product Info" value="<?=$eventData->event_id?>" readonly/>
                                <label>First Name:</label>
                                <input type="text" id="fname" class="form-control" name="fname" placeholder="First Name" value="" />
                                <label>Email ID:</label>
                                <input type="text" id="email" class="form-control" name="email" placeholder="Email ID" value="<?=$eventData->user_email?>" />
                                <label>Mobile/Cell Number:</label>
                                <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile/Cell Number" value="" />
                                <!--<label>Hash:</label>-->
                                <input type="hidden" id="hash" class="form-control" name="hash" placeholder="Hash" value="" />
                                <hr>
                               <div class="d-flex">
                                    <div id="paypal-button"></div>
                                    
                                    <a href="https://globeracers.com/" class="btn btn-primary ml-3">Back</a>
                               </div>
                        	</form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
	
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>
	  paypal.Button.render({
	    // Configure environment
	    env: 'sandbox',
	    client: {
	      sandbox: 'AfYMyZZRdnYOQDTxPDcLQQWzl-kK6x-G5Oixm9RMBvTFd1wPRl05LSvsG8_l1M5fBtHjOjJkR5DSgV0w',
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
	            total: '<?=$amt?>',
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
</body>
</html>