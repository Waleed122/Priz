<?php
include "inc/configuration.php";
include "inc/functions.php";

$names = $_POST['name'];
$email = $_POST['email'];
$your_name = Protect($_POST['your_name']);
$your_email = Protect($_POST['your_email']);

$headers = array("From: admin@example.com","Content-Type: text/html");  ///// FROM email address WILL BE HERE 
$subject = "Invitation";   ///// SUBJECT WILL BE HERE 

$x=0;
foreach ($names as $key => $name){
	if ($name!=""){
		$body = "
		Dear, $name
		your friend is invited to you please visit the following link<br>
		<a href='#'>Click</a>
		";
		$personEmail = Protect($email[$x]);
		$named = Protect($name);
		$mail = mail($personEmail, $subject, $body, implode("\r\n", $headers));
		$query = mysql_query("insert into email_records VALUES('','$named','','$personEmail')") or die(mysql_error());
		if ($x=="4"){
			$query123 = mysql_query("insert into sweepstakes VALUES('','$your_name','$your_email')") or die(mysql_error());
		}
		if ($mail){
			echo "Successfully sent to $personEmail <br>";
		}else{
			echo "An error occured during the mail sending to $personEmail <br>";
		}
	$x++;
	}
}
?>