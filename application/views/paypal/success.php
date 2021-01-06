<!--<?php if(!empty($payment)){ ?>-->
<!--    <h1 class="success">Your Payment has been Successful!</h1>-->
<!--    <h4>Payment Information</h4>-->
<!--    <p><b>Reference Number:</b> #<?php echo $payment['id']; ?></p>-->
<!--    <p><b>Transaction ID:</b> <?php echo $payment['txn_id']; ?></p>-->
<!--    <p><b>Paid Amount:</b> <?php echo $payment['payment_gross'].' '.$payment['currency_code']; ?></p>-->
<!--    <p><b>Payment Status:</b> <?php echo $payment['status']; ?></p>-->
	
<!--    <h4>Payer Information</h4>-->
<!--    <p><b>Name:</b> <?php echo $payment['payer_name']; ?></p>-->
<!--    <p><b>Email:</b> <?php echo $payment['payer_email']; ?></p>-->
	
<!--    <h4>Product Information</h4>-->
<!--    <p><b>Name:</b> <?php echo $product['name']; ?></p>-->
<!--    <p><b>Price:</b> <?php echo $product['price'].' '.$product['currency']; ?></p>-->
<!--<?php }else{ ?>-->
<!--    <h1 class="error">Transaction has been failed!</h1>-->
<!--<?php } ?>-->
<html>
    
    <head>
        <title>Payment Success</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row my-3">
                <div class="col-md-6 offset-md-2">
                    <div class="alert alert-success">
                        <h3>Your Payment Was Successfull</h3>
                        <a href="<?=base_url()?>">Click Here For Home Page</a>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</html>

