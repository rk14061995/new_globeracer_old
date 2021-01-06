<?php
$merchantKey='QQypU6ma';
$saltKey='v3iRO6zZVM';
$postdata = $_POST;
$msg = '';
if (isset($postdata ['key'])) {
	$key				=   $merchantKey;
	$salt				=   $saltKey;
	$txnid 				= 	$postdata['txnid'];
    $amount      		= 	$postdata['amount'];
	$productInfo  		= 	$postdata['productinfo'];
	$firstname    		= 	$postdata['firstname'];
	$email        		=	$postdata['email'];
	$udf5				=   $postdata['udf5'];
	$mihpayid			=	$postdata['mihpayid'];
	$status				= 	$postdata['status'];
	$resphash				= 	$postdata['hash'];
	//Calculate response hash to verify	
	$keyString 	  		=  	$key.'|'.$txnid.'|'.$amount.'|'.$productInfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
	$keyArray 	  		= 	explode("|",$keyString);
	$reverseKeyArray 	= 	array_reverse($keyArray);
	$reverseKeyString	=	implode("|",$reverseKeyArray);
	$CalcHashString 	= 	strtolower(hash('sha512', $salt.'|'.$status.'|'.$reverseKeyString));
	$userData=unserialize($this->session->userdata('userData'));

	$userid=$userData[0]->user_id;
	if ($status == 'success'  && $resphash == $CalcHashString) {
	    $condition=array("user_id"=>$userid,"event_id"=>$productInfo);
	    $updatedata=array('amoun_status'=>2,
	                            'transaction_id'=>$txnid,
	                          'transactiondate'=>date("Y-m-d H:i:s"),
	                          'transaction_timezone'=>date_default_timezone_get());
	    if($this->db->where($condition)->update('race_registeration',$updatedata)){
	        $msg = "Transaction Successful and Status Updated";
	       $useremail=$userData[0]->user_email;
	       $username=$userData[0]->firstname;
	       $this->db->where('event_id',$productInfo);
	      $geteventsdetails=$this->db->get('userevents')->result();
	      $event_name=$geteventsdetails[0]->event_name;
	      $event_category=$geteventsdetails[0]->event_category;
	      $event_sdate=$geteventsdetails[0]->event_start_date;
	      $event_edate=$geteventsdetails[0]->event_end_date;
	      $event_fee=$geteventsdetails[0]->event_fee;
	      $event_venue=$geteventsdetails[0]->event_venue;
	      $event_distance=$geteventsdetails[0]->event_distance;
	      $event_desc=$geteventsdetails[0]->event_des;
	        $this->load->library('email');
                $config['protocol'] = "smtp";
                $config['smtp_host'] = "ssl://smtp.googlemail.com";
                $config['smtp_port'] = "465";
                $config['smtp_user'] = "greenusys@gmail.com";
                $config['smtp_pass'] = "grade@835";
                $message = "Dear $username
                            Your Registration is Successfull for the Event 
                            The Event Details Are Given Below:-
                            Event Name:-$event_name
                            Event Category:-$event_category
                            Event Venue:-$event_venue
                            Event Distance:-$event_distance
                            
                            Start Date:-$event_sdate
                            End Date:-$event_edate
                            Amout Paid:-$event_fee
                            Transaction Id:-$txnid";
                $config['mailtype'] = "html";
                $ci = & get_instance();
                $ci->load->library('email', $config);
                $ci->email->set_newline("\r\n");
                $ci->email->from("greenusys@gmail.com");
                $ci->email->to($useremail);
                $ci->email->subject("Event Registration Mail");
                $ci->email->message($message);
                 $ci->email->send();
                 
                 
                 $this->email->to("data@globeracers.com");
                $this->email->subject("User Registration Mail");
                $message = "Dear Admin,
                            $username Registered Successfully for the Event. 
                            The Event Details Are Given Below:-
                            Event Name:-$event_name
                            Event Category:-$event_category
                            Event Venue :- $event_venue
                           
                            Start Date:-$event_sdate
                            End Date:-$event_edate
                            Amout Paid:-$event_fee+19.95
                            Transaction Id:-$txnid";
                $this->email->message($message);
                $st = $this->email->send();
	    }else{
	        $msg = "Transaction Successful and Failed To Update";
	    }
		
		//Do success order processing here...
	}
	else {
		//tampered or failed
		$msg = "Payment failed for Hasn not verified...";
	} 
}
else exit(0);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>PayUmoney </title>
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
                            	<h4>Globe Racers</h4>
                            	<hr>
                            </div>
                            <div class="row">
                                <div class="col-md-6" >
                                    <label class="font-weight-bold">Transaction/Order ID:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $txnid; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Amount:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $amount; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Product Info:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $productInfo; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">First Name:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $firstname; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Email ID:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $email; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Mihpayid:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $mihpayid; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Transaction Status:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $status; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="font-weight-bold">Message:</label>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $msg; ?>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                        </div>
                        <hr>
                       <a href="<?=base_url('User')?>">Home</a>
                        <!--<button class="btn btn-success" onclick="print()">Print</button>-->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
<script>
    setInterval(function(){
        window.location.href="<?=base_url('User')?>";
    },10000)
</script>
</body>
</html>
	