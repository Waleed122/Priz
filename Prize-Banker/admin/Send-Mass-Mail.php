<?php
include "../inc/configuration.php";

$headers = array("From: admin@example.com","Content-Type: text/html");
$subject = $_POST['subject'];
$body = $_POST['body'];

$query = mysql_query("select email from funds") or die(mysql_error());
while ($row = mysql_fetch_assoc($query)){
	$email = $row['email'];
	$mail = mail($email, $subject, $body, implode("\r\n", $headers));
	if ($mail){
		echo "Successfully sent to $email <br>";
	}else{
		echo "An error occured during the mail sending to $email <br>";
	}
}
?>