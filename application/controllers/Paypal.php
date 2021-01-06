<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        // Load paypal library 
        $this->load->library('paypal_lib'); 
         
        // Load product model 
        $this->load->model('product'); 
         
        // Load payment model 
        $this->load->model('payment'); 
     }
     function buy($id){ 
        // Set variables for paypal form 
        $returnURL = base_url().'Paypal/success'; //payment success url 
        $cancelURL = base_url().'Paypal/cancel'; //payment cancel url 
        $notifyURL = base_url().'Paypal/ipn'; //ipn url 
         
        // Get product data from the database 
    //     $product = $this->product->getRows($id); 
    //   print_r($product);  
         $details=$this->db->join('userevents','race_registeration.event_id=userevents.event_id')->join('user_details','user_details.id_table=race_registeration.user_id')->where('race_registeration.reg_id',$id)->get('race_registeration')->row();
        //  die(json_encode($details));
        // Get current user ID from the session (optional) 
         $userID = $details->id_table; 
         
        // Add fields to paypal form 
        $this->paypal_lib->add_field('return', $returnURL); 
        $this->paypal_lib->add_field('cancel_return', $cancelURL); 
        $this->paypal_lib->add_field('notify_url', $notifyURL); 
        $this->paypal_lib->add_field('item_name', $details->event_name); 
        $this->paypal_lib->add_field('custom', $userID); 
        $this->paypal_lib->add_field('item_number',  $details->event_id); 
        $this->paypal_lib->add_field('amount',  10); 
         
        // Render paypal form 
        $this->paypal_lib->paypal_auto_form(); 
    } 
      
    function success(){ 
        // Get the transaction data 
        $paypalInfo = $this->input->get(); 
        //  print_r($paypalInfo);
        $productData = $paymentData = array(); 
        if(!empty($paypalInfo['item_number']) && !empty($paypalInfo['tx']) && !empty($paypalInfo['amt']) && !empty($paypalInfo['cc']) && !empty($paypalInfo['st'])){ 
            $item_name = $paypalInfo['item_name']; 
            $item_number = $paypalInfo['item_number']; 
            $txn_id = $paypalInfo["tx"]; 
            $payment_amt = $paypalInfo["amt"]; 
            $currency_code = $paypalInfo["cc"]; 
            $status = $paypalInfo["st"]; 
             
            // Get product info from the database 
            // $productData = $this->product->getRows($item_number); 
             
            // Check if transaction data exists with the same TXN ID 
            $paymentData = $this->payment->getPayment(array('txn_id' => $txn_id)); 
        } 
        //  $data['userData']=$paypalInfo;
        // Pass the transaction data to view 
        // $data['product'] = $productData; 
        $data['payment'] = $paypalInfo;
        // echo ' || Paypal Info ||';
        // print_r($paypalInfo);
        // echo ' || Product Data ||';
        // print_r($productData);$productData;
        // echo ' || Product Data ||';
        // print_r($paymentData);
        $this->load->view('paypal/success', $data); 
    } 
      
     function cancel(){ 
        // Load payment failed view 
        $this->load->view('paypal/cancel'); 
     } 
      
     function ipn(){ 
        // Retrieve transaction data from PayPal IPN POST 
        $paypalInfo = $this->input->post(); 
         
        if(!empty($paypalInfo)){ 
            // Validate and get the ipn response 
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo); 
 
            // Check whether the transaction is valid 
            if($ipnCheck){ 
                // Check whether the transaction data is exists 
                 
                $t_data=array("event_id"=> $paypalInfo["item_number"], "user_id"=>$paypalInfo["custom"]);
                // INSERT INTO `race_registeration`(`reg_id`, `to_show`, ``, `event_id`, `team_id`, `amount_to_pay`, `amoun_status`, `created_at`, `transaction_id`, `transactiondate`, `transaction_timezone`)
              
                
                $prevPayment=$this->db->where($t_data)->get('race_registeration')->row();
                // $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if($prevPayment){ 
                    // Insert the transaction data in the database 
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['event_id']    = $paypalInfo["item_number"]; 
                    $data['transaction_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                     $data['amoun_status']    = 2; 
                    // $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    // $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
     
                    // $this->payment->insertTransaction($data);
                    $this->db->insert('race_registeration',$data);
                } 
            } 
        } 
    } 
    // public function sendConfirmationMailToUser($reg_id){
    //     $userData=$this->db
    //     ->join('user_details','user_details.id_table=race_registeration.user_id')
    //     ->join('userevents','userevents.event_id=race_registeration.event_id')
    //     ->join('event_category','event_category.category_id=userevents.event_category')
    //     ->where('race_registeration.reg_id',$reg_id)
       
    //     ->get('race_registeration')->row();
    //     $msg = "Transaction Successfull and Status Updated";
    //         $config = array('protocol' => 'sendmail',
    //                 'mailpath'=>'/usr/sbin/sendmail',
    //                 'wordwrap' => FALSE,
    //                 'mailtype' => 'html',
    //                 // 'charset'=>'iso-8859-1',
    //                 'charset'   => 'utf-8',
    //                 'crlf'      => "\r\n",
    //                 'newline'   => "\r\n",
    //                 'send_multipart' => FALSE
    //                 );
    //         $this->load->library('email');
    //         $subject="Registration Successful.";
    //         $this->email->initialize($config);
    //             // $email=$useremail;
    //             // $email="globalracer2020@gmail.com";
    //             $this->email->from('info@globeracers.com');
    //             $this->email->to($userData->user_email);
    //             // $this->email->to($userData->user_email);
    //             $this->email->subject($subject);
    //             $message = "Dear $userData->firstname
    //                         Your Registration is Successfull for the Event
    //                         The Event Details Are Given Below:-
    //                         Event Name :- $userData->event_name
    //                         Event Category :- $userData->category_name
    //                         Event Venue :- $userData->event_venue
                           
                           
    //                         Start Date :- $userData->event_start_date
    //                         End Date :- $userData->event_end_date
    //                         Amout Paid :- $userData->event_fee+19.95
    //                         Transaction Id :- $userData->transaction_id";
    //             $this->email->message($message);
    //             $st = $this->email->send();
    // }
    // public function sendConfirmationMailToGloberacers($reg_id){
    //     $userData=$this->db
    //     ->join('user_details','user_details.id_table=race_registeration.user_id')
    //     ->join('userevents','userevents.event_id=race_registeration.event_id')
    //     ->join('event_category','event_category.category_id=userevents.event_category')
    //     ->where('race_registeration.reg_id',$reg_id)
       
    //     ->get('race_registeration')->row();
    //     // $msg = "Transaction Successful and Status Updated";
    //         $config = array('protocol' => 'sendmail',
    //                 'mailpath'=>'/usr/sbin/sendmail',
    //                 'wordwrap' => FALSE,
    //                 'mailtype' => 'html',
    //                 // 'charset'=>'iso-8859-1',
    //                 'charset'   => 'utf-8',
    //                 'crlf'      => "\r\n",
    //                 'newline'   => "\r\n",
    //                 'send_multipart' => FALSE
    //                 );
    //         $this->load->library('email');
    //         $subject="User Registered Successfully";
    //         $this->email->initialize($config);
    //             // $email=$useremail;
    //             // $email="globalracer2020@gmail.com";
    //             $this->email->from('info@globeracers.com');
    //         $this->email->to("data@globeracers.com");
    //             $this->email->subject($subject);
    //             $message2 = "Dear Admin,
    //                         $userData->firstname Registered Successfully for the Event.
    //                         The Event Details Are Given Below:-
    //                         Event Name :- $userData->event_name
    //                         Event Category :- $userData->category_name
    //                         Event Venue :- $userData->event_venue
                           
    //                         Start Date :- $userData->event_start_date
    //                         End Date :- $userData->event_end_date
    //                         Amout Paid :- $userData->event_fee+19.95
    //                         Transaction Id :- $userData->transaction_id";
    //             $this->email->message($message2);
    //             $st = $this->email->send();
    // }
}