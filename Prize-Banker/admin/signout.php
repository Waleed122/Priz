<?php
session_start();
//// ***** DESTROY SESSION ******** ///////
session_destroy();

setcookie ("prize_banker", "", time()-3600*24);

//Destroying the COOKIE
header("location: index.php");
?>