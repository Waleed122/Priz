<?php
session_start();

if ($_SESSION['prize_banker'] || $_COOKIE['prize_banker']){
		header("Location: dashboard.php");
}

include "../inc/configuration.php";
include "../inc/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminTheme - Ultimate Admin Panel Solution</title>
	<meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
	<!--[if IE]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
	<link rel="Stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.1.custom.css"  />	
	<!--[if IE]>
		<style type="text/css">
		  .clearfix {
		    zoom: 1;     /* triggers hasLayout */
		    display: block;     /* resets display for IE/Win */
		    }  /* Only IE can see inside the conditional comment
		    and read this CSS rule. Don't ever use a normal HTML
		    comment inside the CC or it will close prematurely. */
		</style>
	<![endif]-->
	<!-- JavaScript -->
    <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.1.custom.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
	</head>
	 <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
</head>
<body>
<div  id="login_container">
    <div  id="header">
   
		<div id="logo"><h1><a href="/">AdmintTheme</a></h1></div>
		
    </div><!-- end header -->
	   
	    <div id="login" class="section">
        <?php
		if ($_POST['submit']){
			$username = $_POST['username'];
			$password = strtolower($_POST['password']);
			if (!($_POST['rememberme'])){
				$rememberme = "off";
			}else{
				$rememberme = "on";
			}
			
			echo AdminLogin($username,$password,$rememberMe);
		}
		?>
	    	<form name="loginform" id="loginform" action="" method="post">
			
			<label><strong>Username</strong></label><input type="text" name="username" id="username"  size="28" class="input"/>
			<br />
			<label><strong>Password</strong></label><input type="password" name="password" id="password"  size="28" class="input"/>
			<br />
			<strong>Remember Me</strong><input type="checkbox" name="rememberme" id="rememberme" value="on" class="input noborder" /> 
			
			<br />
		
			<input id="save" class="loginbutton" type="submit" class="submit" name="submit" value="Log In" />
			
			</form>
			
			<a href="#" id="passwordrecoverylink">Forgot your username or password?</a>
	    </div>
	
	    
		    


</div><!-- end container -->

</body>
</html>
