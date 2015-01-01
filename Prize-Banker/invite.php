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
<title>Prize Banker - Invite Friends</title>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.animatebg.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>
<script> defaultPostion = 685; </script>
<script language="javascript">
$(document).ready(function() {
	$("#more").click(function() {
		var increment = parseInt($("#increment").val());
		if (increment < 10){
		$("#increment").val(increment+1);
		$("#name_label").append("<div class='name-label'>"+parseInt(increment+1)+") Name:</div>");
		$("#name_field_content").append("<input type='text' name='name[]' class='field1' />");
		$("#email_label").append("<div class='email-label'>Email:</div>");
		$("#email_field_content").append("<input type='text' name='email[]' class='field2' />");
		}else{
			alert("You can only invite 10 friends.");	
		}
	});
});
</script>
</head>

<body>

<div id="main">
	<div id="main2">
    
    	<div id="header"></div>
        <div id="menu" style="background-position: 685px 0px">
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
            <form action="invite_send.php" method="post">
            <input type="hidden" id="increment" value="5">
           	  <div id="invite">
                	<div class="title">Invite Friends</div>
                    <div class="descrip">
                    Invite five friends and your name will be added to our <span style="color:#CC0000; font-size:16px;">$1,000,000,000</span> sweepstakes drawing.<br />
                    <a href="terms.html" class="link">Read Applicable Rules</a>
                    </div>
                    
                    <?php
					if ($_GET['name']&&$_GET['email']){
						echo "<input type='hidden' name='your_name' value='".base64_decode($_GET['name'])."'>";
						echo "<input type='hidden' name='your_email' value='".base64_decode($_GET['email'])."'>";
					}else{
					?>
              <div style="border-bottom:1px dashed #ccc; float:left;margin-bottom:10px;">
                    <div class="name-sec">
                    	<div class="name-label">Your Name:</div>
                    </div>
                    
                    <div class="field1-sec">
                    	<input type="text" name="your_name" class="field1" />
                    </div>
                    
                    <div class="email-sec">
                    	<div class="email-label">Email:</div>
                    </div>
                    
                     <div class="field2-sec">
                    	<input type="text" name="your_email" class="field2" />
                    </div>
                    </div>
                    <?php
					}
					?>
          <div class="name-sec" id="name_label">
                    	<div class="name-label">1) Name:</div>
                        <div class="name-label">2) Name:</div>
                        <div class="name-label">3) Name:</div>
                        <div class="name-label">4) Name:</div>
                        <div class="name-label">5) Name:</div>
                    </div>
                    
          <div class="field1-sec" id="name_field_content">
                    	<input type="text" name="name[]" class="field1" />
                        <input type="text" name="name[]" class="field1" />
                        <input type="text" name="name[]" class="field1" />
                        <input type="text" name="name[]" class="field1" />
                        <input type="text" name="name[]" class="field1" />
                    </div>
                    
          <div class="email-sec" id="email_label">
                    	<div class="email-label">Email:</div>
                        <div class="email-label">Email:</div>
                        <div class="email-label">Email:</div>
                        <div class="email-label">Email:</div>
                        <div class="email-label">Email:</div>
                    </div>
                    
          <div class="field2-sec" id="email_field_content">
                    	<input type="text" name="email[]" class="field2" />
                        <input type="text" name="email[]" class="field2" />
                        <input type="text" name="email[]" class="field2" />
                        <input type="text" name="email[]" class="field2" />
                        <input type="text" name="email[]" class="field2" />
                    </div>
                    <div class="field4-sec">
                    <a id="more" class="link" style="line-height:40px; cursor:pointer;">Invite more friends</a>
								<input type="submit" class="button" value="Submit">
                </div>
            </div>
                </form>
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
