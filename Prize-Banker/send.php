<?php
$name = "";
$subject = "";
$website = "";
$message = "";

$names = array("muazzam","khurram","arsalan","ahmed");
$email = array("muazzam@yahoo.com","khurram@yahoo.com","arsalan@yahoo.com","ahmed@yahoo.com");

$x=1;
foreach ($names as $key => $name){
	if ($name!=""){
		$body = "
		Dear, $name
		your friend is invited to you please visit the following link<br>
		<a href='#'>Click</a>
		";
		
		if ($mail){
			echo "Successfully sent to $email <br>";
		}else{
			echo "$x An error occured during the mail sending to $email <br>";
		}
	$x++;
	}
}
?>