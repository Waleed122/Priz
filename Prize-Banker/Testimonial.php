<?php
include "inc/configuration.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="style.css" />
<title>Prize Banker - Testimonials</title>
<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/jquery.animatebg.js"></script>
<script language="javascript" type="text/javascript" src="js/main.js"></script>
<script src="js/testi-slider.js" type="text/javascript"></script>
<script type="text/javascript">
			$(function() {

				$('#carousel').carouFredSel({
					width: 800,
					items: 2,
					scroll: 1,
					auto: {
						duration: 1250,
						timeoutDuration: 2500
					},
					prev: '.videos-list-left',
					next: '.videos-list-right',
				});
	
			});
</script>
<script>
$(document).ready(function(){
    $("#socials a").fadeTo('fast', 0.6)
        .mouseenter(function(){
            $(this).clearQueue().fadeTo('fast', 1);
        })
        .mouseleave(function(){
            $(this).clearQueue().fadeTo('fast', 0.6);
        });
});
</script>
<script> defaultPostion = 835; </script>
</head>

<body>

<div id="main">
	<div id="main2">
    
    	<div id="header"></div>
        <div id="menu" style="background-position: 835px 0px">
			<ul>
				<li><a href="contact.php" onMouseOver="slideMenuBG(925);">Contact Us</a></li>
				<li><a href="Testimonial.php" onMouseOver="slideMenuBG(835);">Testimonials</a></li>
                <li><a href="vips.php" onMouseOver="slideMenuBG(762);">VIPs</a></li>
				<li><a href="invite.php" onMouseOver="slideMenuBG(685);">Invite Friends</a></li>
				<li><a href="about.html" onMouseOver="slideMenuBG(595);">About Us</a></li>
				<li><a href="index.php" onMouseOver="slideMenuBG(533);">Home</a></li>
			</ul>
        </div>
        <!-- Menu Ends -->
        
        <div id="content">

            	<div id="invite" style="width:980px;">
                	<div class="title">Testimonials</div>
						<div class="descrip">Checkout our Members Testimonials</div>
						
						<div class="main-video1">
							<div class="main-video2">
								<div class="main-video3">
									<div class="youtube-video">
										<?php
										if ($_GET['video']){
											echo "<iframe width='853' height='480' src='http://www.youtube.com/embed/".$_GET['video']."' frameborder='0' allowfullscreen></iframe>";
										}else{
										$query = mysql_query("select * from testimonial ORDER BY id DESC LIMIT 1") or die(mysql_error());
										$row = mysql_fetch_assoc($query);
										$code = $row['code'];
										echo "<iframe width='853' height='480' src='http://www.youtube.com/embed/".$code."' frameborder='0' allowfullscreen></iframe>";
										
										}
										?>
									</div>
								</div>
							</div>
						</div>
						
						<a href="#" class="videos-list-left"></a>
						<div class="caroufredsel_wrapper videos-list">
						<div id="carousel">
							<?php
							$query = mysql_query("select * from testimonial ORDER BY id DESC") or die(mysql_error());
							while ($row = mysql_fetch_assoc($query)){
								$title = $row['title'];
								$embed_code = $row['code'];
								echo "<div class='sec'>
								<div class='tb'><a href='?video=$embed_code'><img src='http://img.youtube.com/vi/$embed_code/0.jpg' width='185' height='103' border='0' title='$title' /></a></div>
							</div>";
							}
							?>
						</div>
						</div>
                  <a href="#" class="videos-list-right"></a>
						
                    
                </div>

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
