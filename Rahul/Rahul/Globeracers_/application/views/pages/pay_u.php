<?php
//  echo 'Emaou:'.$eventData[0]->amount_to_pay;
// print_r($eventData);

// print_r($userData);
$merchantKey='QQypU6ma';
$saltKey='v3iRO6zZVM';

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
// 	return $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .base_url('Payments/response');
	return base_url('API/response');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Globe Racers</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<!--<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt--->
<!--color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>-->
<!-- BOLT Production/Live //-->
<script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 my-3" >
                <div class="card">
                    <div class="card-header">
                        <img src="<?=base_url()?>assets/payumoney.png" />
                    </div>
                    <div class="card-body">
                        <div class="main">
                        	
                            <div>
                            	<h4>Registration Fee</h4>
                            	<hr>
                            </div>
                        	<form action="#" id="payment_form">
                                <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
                                <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
                                <!--<div class="dv">-->
                                <!--<span class="text"><label>Merchant Key:</label></span>-->
                                <!--<span><input type="text" id="key" name="key" placeholder="Merchant Key" value="<?=$merchantKey?>" /></span>-->
                                <!--</div>-->
                                
                                <!--<div class="dv">-->
                                <!--<span class="text"><label>Merchant Salt:</label></span>-->
                                <!--<span><input type="text" id="salt" name="salt" placeholder="Merchant Salt" value="<?=$saltKey?>" /></span>-->
                                <!--</div>-->
                                
                               <label>Transaction/Order ID:</label>
                                <input type="text" id="txnid" class="form-control" name="txnid" placeholder="Transaction ID" value="<?php echo  "REF-" . date('dmYhis')?>" readonly/>
                                <label>Amount:</label>
                                <input type="text" id="amount" class="form-control" name="amount" placeholder="Amount" value="<?=$eventData->amount_to_pay?>" readonly/>    
                                <input type="hidden" id="pinfo" class="form-control" name="pinfo" placeholder="Product Info" value="<?=$eventData->event_id?>" readonly />
                                <label>First Name:</label>
                                <input type="text" id="fname" class="form-control" name="fname" placeholder="First Name" value="" />
                                <label>Email ID:</label>
                                <input type="text" id="email" class="form-control" name="email" placeholder="Email ID" value="<?=$eventData->user_email?>" readonly/>
                                <label>Mobile/Cell Number:</label>
                                <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile/Cell Number" value="" />
                                <!--<label>Hash:</label>-->
                                <input type="hidden" id="hash" class="form-control" name="hash" placeholder="Hash" value="" />
                                <hr>
                               <div class="d-flex">
                                    <input type="submit" class="btn btn-info" value="Pay" onclick="launchBOLT(); return false;" />
                                    
                                    <a href="https://globeracers.com/" class="btn btn-primary ml-3">Back</a>
                               </div>
                        	</form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

<script type="text/javascript"><!--
$('#payment_form').bind('keyup blur', function(){
	$.ajax({
          url: '<?=base_url('API/payumoney/').$eventData->event_id?>',
          type: 'post',
          data: JSON.stringify({ 
            key: '<?=$merchantKey?>',
			salt: '<?=$saltKey?>',
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});
//-->
</script>
<script type="text/javascript"><!--
function launchBOLT()
{
	bolt.launch({
	key: '<?=$merchantKey?>',
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+'<?=$merchantKey?>'+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
//--
</script>	

</body>
</html>
	
