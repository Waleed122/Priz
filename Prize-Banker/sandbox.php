<?php

/*
 update: 06/27/2011
  - updated to use cURL for better security, assumes PHP version 5.3
*/

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';

$tx_token = $_GET['tx'];

$pp_hostname = "www.sandbox.paypal.com"; 
 
// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-synch';
 
$tx_token = $_GET['tx'];
$auth_token = "YylWTrrAkbgfJJBzSa0ThqQgyLN5Lt6eEoc-LmEVrrNH4xtAuX_EnWC-FYW";
$req .= "&tx=$tx_token&at=$auth_token";
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//if your server does not bundled with default verisign certificates.
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
$res = curl_exec($ch);
curl_close($ch);
 
if(!$res){
    //HTTP ERROR
}else{
     // parse the data
    $lines = explode("\n", $res);
    $keyarray = array();
    if (strcmp ($lines[0], "SUCCESS") == 0) {
        for ($i=1; $i<count($lines);$i++){
        list($key,$val) = explode("=", $lines[$i]);
        $keyarray[urldecode($key)] = urldecode($val);
    }
    // check the payment_status is Completed
    // check that txn_id has not been previously processed
    // check that receiver_email is your Primary PayPal email
    // check that payment_amount/payment_currency are correct
    // process payment
    $firstname = Protect($keyarray['first_name']);
    $lastname = Protect($keyarray['last_name']);
    $itemname = Protect($keyarray['item_name']);
    $amount = Protect($keyarray['payment_gross']);
 	$itemname = Protect($keyarray['item_name']);
	$payer_email = Protect($keyarray['payer_email']);
	$payment_date = Protect($keyarray['payment_date']);
	$address_country = Protect($keyarray['address_country']);
	$address_city = Protect($keyarray['address_city']);
	$address_state = Protect($keyarray['address_state']);
	$address_street = Protect($keyarray['address_street']);
	$address_zip = Protect($keyarray['address_zip']);
	
	$query = mysql_query("insert into funds VALUES('','$firstname','$lastname','$transaction_id','$itemname','$amount','$payer_email','$payment_date','$address_country','$address_city','$address_state','$address_street','$address_zip','qued')") or die(mysql_error());
    $query1 = mysql_query("insert into email_records VALUES('','$firstname','$lastname','$payer_email')") or die(mysql_error());
	if ($amount >= 50){
	$query2 = mysql_query("insert into vips VALUES('','$firstname','$payer_email','$amount')") or die(mysql_error());
	echo "<meta HTTP-EQUIV='REFRESH' content='4; url=invite.php?name=".base64_encode($firstname)."&email=".base64_encode($payer_email)."'>";
	}
		echo "<div id='invite'>
                	<div class='title'>Thank You</div>
                    <div class='descrip'>
                    Your funding is been recieved. Fund more to have Better status in VIP Listing.
                    </div>
                   </div>";
	}
    else if (strcmp ($lines[0], "FAIL") == 0) {
        echo "<div id='invite'>
                	<div class='title'>Confirmation Failed...</div>
                    <div class='descrip'>
                    Your Payment To Confirmation to Paypal has been Failed. Please Contact to us for support.
                    </div>
                   </div>";
    }
}
 
?>