<?php
//Connecting the SERVER_HOST
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";

//Attach the DATABASE
$dbname = "prize-banker";


//Connecting the DATABASE
mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname) or die(mysql_error());
?>