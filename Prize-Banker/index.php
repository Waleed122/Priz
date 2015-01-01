<?php
include "inc/configuration.php";
include "inc/functions.php";
include "inc/class.php";

$LeftPanel = new Panels("1");
$RightPanel = new Panels("2");

$query = mysql_query("select description from panels where id='3'") or die(mysql_error());
$row = mysql_fetch_assoc($query);
$awardedAmount = $row['description'];
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="style.css" />
<title>Prize Banker - Home</title>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.animatebg.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>
<script> defaultPostion = 533; </script>
<script language="javascript" src="js/optionFormValidate.js"></script>
</head>

<body>

<div id="main">
	<div id="main2">
    
    	<div id="header"></div>
        <div id="menu">
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
            
            	<div class="anouncement-title"><?php echo $LeftPanel->title; ?><span style="font-size:10px; vertical-align:top;">sm</span></div>
                
                <div class="anouncement-desc">
                <?php echo $LeftPanel->description; ?>
                </div>
                
                <div class="cause-label">Select A Cause To Fund:</div>
                <select class="cause-field" id="select_causes">
                <option value="Any Social Compact Project" selected>Any Social Compact Project</option>
                	<?php GetCauses("title"); ?>
                </select>
                
                <div class="donates">
                	<div class="fields">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" onSubmit="return first_panel();">
                    	<div class="option1">
                        	<input type="hidden" name="cmd" value="_donations">
                            <input type="hidden" name="business" value="ZQT244S23U8DA">
                            <input type="hidden" name="lc" value="US">
                            <input type="hidden" name="item_number" value="111">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="no_shipping" value="1">
                            <input type="hidden" name="rm" value="1">
                            <input type="hidden" name="return" value="http://www.prizebanker.com/thankyou.php">
                            <input type="hidden" name="cancel_return" value="http://www.prizebanker.com/cancel.php">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="bn" value="PP-DonationsBF:donate-button.png:NonHosted">
                            <input type="hidden" name="item_name" id="causes1">
                        	<input class="donate-field" type="text" name="amount" id="option1" />
                            <input type="submit" class="donate-button" id="submit1" value="" />
                        </div>
                    </form>
                    
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" onSubmit="return third_panel();">
                        <div class="option3">
                        	<input type="hidden" name="cmd" value="_donations">
                            <input type="hidden" name="business" value="ZQT244S23U8DA">
                            <input type="hidden" name="lc" value="US">
                            <input type="hidden" name="item_name" id="causes3">
                            <input type="hidden" name="item_number" value="333">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="no_note" value="1">
                            <input type="hidden" name="no_shipping" value="2">
                            <input type="hidden" name="rm" value="1">
                            <input type="hidden" name="return" value="http://www.prizebanker.com/thanks.php">
                            <input type="hidden" name="cancel_return" value="http://www.prizebanker.com/cancel.php">
                            <input type="hidden" name="currency_code" value="USD">
                            <input type="hidden" name="bn" value="PP-DonationsBF:donate-button.png:NonHosted">
                        	<input class="donate-field" type="text" name="amount" id="option3" />
                            <input type="submit" class="donate-button2" id="submit3" value="" />
                        </div>
                    </form>
                    
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" onSubmit="return second_panel();">
                        <div class="option2">
                        <input type="hidden" name="cmd" value="_donations">
                        <input type="hidden" name="business" value="ZQT244S23U8DA">
                        <input type="hidden" name="lc" value="US">
                        <input type="hidden" name="item_name" id="causes2">
                        <input type="hidden" name="item_number" value="111">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="no_note" value="1">
                        <input type="hidden" name="no_shipping" value="1">
                        <input type="hidden" name="rm" value="1">
                        <input type="hidden" name="return" value="http://www.prizebanker.com/thankyou.php">
                        <input type="hidden" name="cancel_return" value="http://www.prizebanker.com/cancel.php">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="bn" value="PP-DonationsBF:donate-button.png:NonHosted">
                        	<input class="donate-field" type="text" name="amount" id="option2" />
                            <input type="submit" class="donate-button" id="submit2" value="" />
                        </div>
                   </form>
                    </div>
                </div>
                
            </div>
            <!-- Left Panel Ends -->
            <div class="right-panel">
            	<div class="anouncement-title"><?php echo $RightPanel->title; ?></div>
                
                <div class="anouncement-desc">
                <?php echo $RightPanel->description; ?>
                </div>
                
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
