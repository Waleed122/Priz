<?php
include "inc/configuration.php";
include "inc/functions.php";
include "inc/class.php";

$LeftPanel = new Panels("1");
$RightPanel = new Panels("2");

$query = mysql_query("select description from panels where id='3'") or die(mysql_error());
$row = mysql_fetch_assoc($query);
$awardedAmount = $row['description'];

$query_plus_50 = mysql_query("select * from vips where fund >= 50 and fund <= 99 GROUP BY email");
$plus_50 = mysql_num_rows($query_plus_50);

$query_plus_100 = mysql_query("select * from vips where fund >= 100 and fund <= 249 GROUP BY email");
$plus_100 = mysql_num_rows($query_plus_100);

$query_plus_250 = mysql_query("select * from vips where fund >= 250 and fund <= 499 GROUP BY email");
$plus_250 = mysql_num_rows($query_plus_250);

$query_plus_500 = mysql_query("select * from vips where fund >= 500 and fund <= 999 GROUP BY email");
$plus_500 = mysql_num_rows($query_plus_500);

$query_plus_1000 = mysql_query("select * from vips where fund >= 1000 and fund <= 9999 GROUP BY email");
$plus_1000 = mysql_num_rows($query_plus_1000);

$query_plus_10000 = mysql_query("select * from vips where fund >= 10000 GROUP BY email");
$plus_10000 = mysql_num_rows($query_plus_10000);

$max = max($plus_50,$plus_100,$plus_250,$plus_500,$plus_1000,$plus_10000);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="style.css" />
<title>Prize Banker - VIPs</title>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.animatebg.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>
<script> defaultPostion = 762; </script>
</head>

<body>

<div id="main">
	<div id="main2">
    
    	<div id="header"></div>
        <div id="menu" style="background-position: 762px 0px">
			<ul>
				<li><a href="contact.php" onMouseOver="slideMenuBG(925);">Contact Us</a></li>
				<li><a href="Testimonial.php" onMouseOver="slideMenuBG(835);">Testimonials</a></li>
                <li><a href="vips.php" onMouseOver="slideMenuBG(762);">VIPs</a></li>
				<li><a href="invite.php" onMouseOver="slideMenuBG(685);">Invite Friends</a></li>
				<li><a href="about.html" onMouseOver="slideMenuBG(595);">About Us</a></li>
				<li><a href="index.php" onMouseOver="slideMenuBG(533);">Home</a></li>
			</ul>
        </div><!-- Menu Ends -->
        
        <div id="content">
        	<div class="left-panel">
            
            	<div id="invite">
                	<div class="title">Very Important Persons</div>
                  <div class="descrip">
                  Choose your VIP Status and an Initiative to FUND
                  </div>
                    
                  <table width="630" border="1" cellspacing="0" cellpadding="0" class="vip-table" bordercolor="#0066cc">
                    <tr>
                      <td width="105" style="padding:0px;">
                      	<table width="105" border="0" cellspacing="0" cellpadding="0" >
                        	<tr bgcolor="#3399ff">
                              <th width="105" height="40" align="left">Vip &nbsp; $50+</th> 
                            </tr>
                            <?php
							$m=1;
							$result = mysql_query("SELECT name, SUM(fund) FROM vips GROUP BY email") or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								$sum = $row['SUM(fund)'];
								$name = $row['name'];
								if ($sum <= 100 and $sum >= 50){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>$name</td>
                            </tr>";
								$n = $m++;
							}
							}
							$o = $max - $n;
							for ($x=0;$x<=$o;$x++){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>-</td>
                            </tr>";
							}
							?>
                            
                        </table>
                      </td>
                      <td width="105" style="padding:0px;">
                      	<table width="105" border="0" cellspacing="0" cellpadding="0" >
                        	<tr bgcolor="#3399ff">
                              <th width="105" height="40" align="left">Vip &nbsp; $100+</th> 
                            </tr>
                           <?php
							$j=1;
							$result = mysql_query("SELECT name, SUM(fund) FROM vips GROUP BY email") or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								$sum = $row['SUM(fund)'];
								$name = $row['name'];
								if ($sum <= 249 and $sum >= 100){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>$name</td>
                            </tr>";
								$k = $j++;
							}
							}
							$l = $max - $k;
							for ($x=0;$x<=$l;$x++){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>-</td>
                            </tr>";
							}
							?>
                        </table>
                      </td>
                      <td width="105" style="padding:0px;">
                      	<table width="105" border="0" cellspacing="0" cellpadding="0" >
                        	<tr bgcolor="#3399ff">
                              <th width="105" height="40" align="left">Vip &nbsp; $250+</th> 
                            </tr>
                            <?php
							$g=1;
							$result = mysql_query("SELECT name, SUM(fund) FROM vips GROUP BY email") or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								$sum = $row['SUM(fund)'];
								$name = $row['name'];
								if ($sum <= 500 and $sum >= 250){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>$name</td>
                            </tr>";
								$h = $g++;
							}
							}
							$i = $max - $h;
							for ($x=0;$x<=$i;$x++){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>-</td>
                            </tr>";
							}
							?>
                        </table>
                      </td>
                      <td width="105" style="padding:0px;">
                      	<table width="105" border="0" cellspacing="0" cellpadding="0" >
                        	<tr bgcolor="#3399ff">
                              <th width="105" height="40" align="left">Vip &nbsp; $500+</th> 
                            </tr>
                            <?php
							$z=1;
							$result = mysql_query("SELECT name, SUM(fund) FROM vips GROUP BY email") or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								$sum = $row['SUM(fund)'];
								$name = $row['name'];
								if ($sum <= 1000 and $sum >= 500){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>$name</td>
                            </tr>";
								$w = $z++;
							}
							}
							
							$y = $max - $w;
							for ($x=0;$x<=$y;$x++){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>-</td>
                            </tr>";
							}
							?>
                        </table>
                      </td>
                      <td width="105" style="padding:0px;">
                      	<table width="105" border="0" cellspacing="0" cellpadding="0" >
                        	<tr bgcolor="#3399ff">
                              <th width="105" height="40" align="left">Vip &nbsp; $1,000+</th> 
                            </tr>
                           <?php
							$a=1;
							$result = mysql_query("SELECT name, SUM(fund) FROM vips GROUP BY email") or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								$sum = $row['SUM(fund)'];
								$name = $row['name'];
								if ($sum <= 10000 and $sum >= 1000){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>$name</td>
                            </tr>";
								$b = $a++;
							}
							}
							$c = $max - $b;
							for ($x=0;$x<=$c;$x++){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>-</td>
                            </tr>";
							}
							?>
                        </table>
                      </td>
                      <td width="105" style="padding:0px;">
                      	<table width="105" border="0" cellspacing="0" cellpadding="0" >
                        	<tr bgcolor="#3399ff">
                              <th width="105" height="40" align="left">Vip &nbsp; $10,000+</th> 
                            </tr>
                            <?php
							$d=1;
							$result = mysql_query("SELECT name, SUM(fund) FROM vips GROUP BY email") or die(mysql_error());
							while ($row = mysql_fetch_array($result)){
								$sum = $row['SUM(fund)'];
								$name = $row['name'];
								if ($sum >= 10000){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>$name</td>
                            </tr>";
								$e = $d++;
							}
							}
							$f = $max - $e;
							for ($x=0;$x<=$f;$x++){
								echo "<tr bgcolor='#e5f2ff'>
                              <td width='105' height='30'>-</td>
                            </tr>";
							}
							?>
                        </table>
                      </td>              		
                    </tr>
                  </table>
                  
                  <!--
                  
                  <tr bgcolor="#3399ff">
                      <th width="96" height="40" align="left">Vip &nbsp; 50+</td>
                      <th width="96" height="40" align="left">Vip &nbsp; 100+</td>
                      <th width="96" height="40" align="left">Vip &nbsp; 250+</td>
                      <th width="96" height="40" align="left">Vip &nbsp; 500+</td>
                      <th width="96" height="40" align="left">Vip &nbsp; 1,000+</td>
                    <th width="96" height="40" align="left">Vip &nbsp; 10,000+</td>              		
                    </tr>
                      <tr bgcolor="#e5f2ff">
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
              </tr>
                      <tr bgcolor="#fff">
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
                        <td width="96" height="30">A. Bawany</td>
              </tr>
                      <tr bgcolor="#e5f2ff">
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                      </tr>
                      <tr bgcolor="#fff">
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                        <td height="30">A. Bawany</td>
                      </tr>
                      
                      -->
   
              </div>
                
            </div><!-- Left Panel Ends -->
            <div class="right-panel">
              <div class="anouncement-title"><?php echo $RightPanel->title; ?></div>
              <div class="anouncement-desc"> <?php echo $RightPanel->description; ?> </div>
            <div class="total-funding">TOTAL FUNDING</div>
            <div class="total-funding-amount">$<?php echo GetTotalFund(); ?></div>
        <div class="seprator"></div>
                <div class="prize-awarded">Amount of cash and <span style="font-size:30px;">Prizes Awarded</span></div>
                <div class="prize-awarded-amount"><?php echo $awardedAmount; ?></div>
            </div><!-- Right Panel Ends -->
        </div><!-- Content Area Ends -->
    
    </div><!-- Main2 Ends -->
</div><!-- Main Ends -->



<div id="footer-bg">
    <div id="footer-main">
        <div id="footer-main2">
        	<div id="socials">
                <a href="http://www.culturemessage.com/" class="cm" target="_blank"></a>
                <a href="#" class="in"></a>
                <a href="http://pinterest.com/socialcompact/" class="pi" target="_blank"></a>
                <a href="http://www.youtube.com/socialcompactusa" class="yt" target="_blank"></a>
                <a href="http://www.linkedin.com/in/thesocialcompactproject" class="li" target="_blank"></a>
                <a href="http://twitter.com/#!/SocialCompactUS" class="tw" target="_blank"></a>
                <a href="http://www.facebook.com/thesocialcompactproject" class="fb" target="_blank"></a>
            </div><!-- Socials Ends -->
        
			<div id="footer">
                © Copyright 2013 - All Rights Reserved to Prize Banker™
                <span style="float:right">
                <a href="terms.html">Terms & Policies</a> &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; 
                <a href="contact.html">Contact Us</a>
                </span>
       	    </div><!-- Footer Ends -->
        </div>
    </div>
</div>

</body>
</html>
