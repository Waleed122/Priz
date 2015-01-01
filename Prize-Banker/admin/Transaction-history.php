<?php
session_start();
include "../inc/configuration.php";
include "../inc/functions.php";
CheckAdminLogin();

if ($_POST['status_selector']&&$_POST['id']){
	$status_selector = $_POST['status_selector'];
	$id = implode(",",$_POST['id']);
	$query = mysql_query("update funds set status='$status_selector' where id in ('$id')") or die(mysql_error());
}
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
		
		$(document).ready(function(){
			$("#status_selector").change(function() {
				if ($("#status_selector").val()!="1"){
					agreeee = confirm("Are You Sure?");
					if (agreeee){
					document.forms['form1'].submit();
					}
				}
			});	
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
			<form method="post" id="form1">
			<div class="section">
			<h2 class="ico_mug">Transaction History</h2>
		<table id="table">
			<thead>
			<tr>
				<th>Name </th>
				<th>Email</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
            <?php
			$per_page = 20;
			$pages_query = mysql_query("SELECT COUNT('email') from funds") or die(mysql_error());
			$pages = ceil(mysql_result($pages_query,0) / $per_page);
			
			$page = mysql_real_escape_string((isset($_GET['page'])) ? (int)$_GET['page'] : 1);
			$start = ($page - 1) * $per_page;
			
			$query = mysql_query("select * from funds ORDER BY id DESC LIMIT $start, $per_page") or die(mysql_error());
			while ($row = mysql_fetch_assoc($query)){
				$id = $row['id'];
				$first_name = $row['first_name'];
				$email = $row['email'];
				$status = $row['status'];
				$transaction_id = $row['transaction_id'];
				
				echo "<tr>
				<td class='table_date'>$first_name</td>
				<td class='table_date'>$email</td>
				<td><a href='Detail-Transaction-history.php?txn=$transaction_id'><img src='img/folder.jpg' alt='folder'/></a></td>";
			echo "</tr>";
			}
			?>
            
			</tbody>
		</table>
			<div class="pagination">
                <?php
				echo "<span class='pages'>Page ".$_GET['page']." of $pages</span>";
		if ($pages >= 1){
			for ($x=1; $x<=$pages; $x++){
				echo "<a href='?page=$x'>$x</a>";
			}
		}
		?>
			</div>
		</div> <!-- end #tabledata -->
        </form>
		
			</div>
			<?php
            include "sidebar.php";
			?>
            <!-- end #sidebar -->
		
		
	    </div><!-- end #content -->
		   
    <div  id="footer" class="clearfix">
    	<p class="left">© 2013 Prize Banker Admin Panel</p>
	</div><!-- end #footer -->
</div><!-- end container -->

</body>
</html>
