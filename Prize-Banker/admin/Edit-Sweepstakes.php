<?php
session_start();

include "../inc/configuration.php";
include "../inc/functions.php";
include "../inc/class.php";

CheckAdminLogin();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminTheme - Ultimate Admin Panel Solution</title>
	<meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
	
    <link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
	<link rel="Stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.1.custom.css"  />	
	<!--[if IE 7]><link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="screen, projection" /><![endif]-->
	<link rel="stylesheet" type="text/css" href="markitup/skins/markitup/style.css" />
	<link rel="stylesheet" type="text/css" href="markitup/sets/default/style.css" />
	<link rel="stylesheet" type="text/css" href="css/superfish.css" media="screen">
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
	<script type="text/javascript" src="js/hoverIntent.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript">
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
		
		$(document).ready(function() {
			setTimeout(function() {
				$("#success").hide("fast");
			}, 2000);
		});

	</script>
	<script type="text/javascript" src="js/excanvas.pack.js"></script>
	<script type="text/javascript" src="js/jquery.flot.pack.js"></script>
    <script type="text/javascript" src="markitup/jquery.markitup.pack.js"></script>
	<script type="text/javascript" src="markitup/sets/default/set.js"></script>
  	<script type="text/javascript" src="js/custom.js"></script>

	 <!--[if IE]><script language="javascript" type="text/javascript" src="excanvas.pack.js"></script><![endif]-->
</head>
<body>
<div class="container" id="container">
    <div  id="header">
    	<div id="profile_info">
			<img src="img/avatar.jpg" id="avatar" alt="avatar" />
			<p>Welcome <strong>James Ogle</strong>. <a href="#">Log out?</a></p>
			<p>System messages: 3. <a href="#">Read?</a></p>
			<p class="last_login">Last login: 21:03 12.05.2009</p>
		</div>
		<div id="logo"><h1><a href="/">AdmintTheme</a></h1></div>
		
    </div><!-- end header -->
	    <div id="content" >
	    <div id="top_menu" class="clearfix">
	    	
			<a href="http://www.prizebanker.com" target="_blank" id="visit" class="right">Visit site</a>
	    </div>
		<div id="content_main" class="clearfix">
			<div id="main_panel_container" class="left">
			<div id="dashboard">
				<h2 class="ico_mug">Dashboard</h2>
				<div class="clearfix">
				<div class="left quickview">
					<h3>Overview</h3>
					<ul>
					<li>Total Email Records: <span class="number"><?php echo GetTotalEmailNo(); ?></span></li>
					<li>Total Funding Transactions: <span class="number"><?php echo GetTotalTxn(); ?></span></li>
					<li>Total Funded Amount: <span class="number">$<?php echo GetTotalFund(); ?></span></li>
					</ul>
				</div>
				
				
				</div>
			</div><!-- end #dashboard -->

			<div id="shortcuts" class="clearfix">
				<h2 class="ico_mug">Panel shortcuts</h2>
				<ul>
					<li class="first_li"><a href=""><img src="img/theme.jpg" alt="themes" /><span>Themes</span></a></li>
					<li><a href=""><img src="img/statistic.jpg" alt="statistics" /><span>Statistics</span></a></li>
					<li><a href=""><img src="img/ftp.jpg" alt="FTP" /><span>FTP</span></a></li>
					<li><a href=""><img src="img/users.jpg" alt="Users" /><span>Users</span></a></li>
					<li><a href=""><img src="img/comments.jpg" alt="Comments" /><span>Comments</span></a></li>
					<li><a href=""><img src="img/gallery.jpg" alt="Gallery" /><span>Gallery</span></a></li>
					<li><a href=""><img src="img/security.jpg" alt="Security" /><span>Security</span></a></li>
					
				</ul>
			</div><!-- end #shortcuts -->
            
			</div>
            
            
            
			<?php
            include "sidebar.php";
			?><!-- end #sidebar -->
		
		<div id="postedit" class="clearfix">
        <?php
			if ($_POST['submit']){
				$title = Protect($_POST['title']);
				$description = Protect($_POST['description']);
				echo LeftPanelUpdate($title,$description,"2");
			}
			
			CheckAdminLogin();

			$Panels = new Panels("2");
			?>
			<h2 class="ico_mug">Edit Sweepstakes Panel</h2>
			<form method="post">
			<div><input id="post_title" name="title" type="text" tabindex="1" value="<?php echo $Panels->title; ?>" style="width:600px; font-size:20px;" /></div>
			<div id="form_middle_cont" class="clearfix">
			<div class="left"><textarea name="description" id="markItUp" cols="80" rows="10"><?php echo $Panels->description; ?></textarea></div>
			</div>
            <input type="submit" class="submit" value="Update" name="submit" />
			</form>
		
		</div>
        
        
        
	    </div><!-- end #content -->
		   
    <div  id="footer" class="clearfix">
    	<p class="left">© 2013 Prize Banker Admin Panel</p>
	</div><!-- end #footer -->
</div><!-- end container -->

</body>
</html>
