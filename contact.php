<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Contact Us</title>

<?php include("headcss.php"); ?>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
   <?php include("header.php"); ?>	
    
    <!-- Page Banner -->
    <section class="page-banner" style="background-image:url(images/background/page-banner.jpg);">
    	<div class="auto-container">
        	<h1>Contact us</h1>
        </div>
    </section>
    
    <!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
        	
            <div class="row clearfix">
            	
                <!--Map Area-->
            	<div class="col-md-9 col-sm-7 col-xs-12">
                	<div class="map-area" id="map-location"></div>
                </div>
                
                <!--Contact Info-->
                <div class="col-md-3 col-sm-5 col-xs-12">
                	<div class="contact-info">
                    	<h3>Contact</h3>
                    	<div class="text">If you are in the middle of something and you don’t want to miss that important call that could be the start of an exciting new business.</div>
                    	<ul class="info">
                            <li><strong>Email</strong> <a href="mailto:info@uem.com">info@uem.com</a></li>
                            <li><strong>Phone</strong> <a href="#">+92 312 215 5843</a></li>
                            <li><strong>Fax</strong> <a href="#"> +92 123 456 789 </a></li>
                            <li><strong>Website</strong> <a href="#">http://www.uem.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!--Contact Form Area-->
            <div class="row clearfix">
            	<div class="col-md-9 col-sm-12 col-xs-12 contact-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                		
                        <!--Contact Form-->
                        <form id="contact-form" method="post" action="">
                        	<div class="row clearfix">
                                
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    
                                    <div class="form-group">
                                    	<label class="form-label">Name</label>
                                        <input type="text" name="username" value="" placeholder="Enter Your Name">
                                    </div>
                                    
                                    <div class="form-group">
                                    	<label class="form-label">Email</label>
                                        <input type="email" name="email" value="" placeholder="Enter Your Email Address">
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                    <div class="form-group">
                                    	<label class="form-label">Subject</label>
                                        <input type="text" name="subject" value="" placeholder="Enter a Subject">
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    
                                    <div class="form-group">
                                    	<label class="form-label">Message</label>
                                        <textarea name="message" placeholder="Type Your Message Here"></textarea>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="form-group text-right">
                                <button type="submit" name="submit-form" class="theme-btn btn-style-one hvr-bounce-to-right"><span class="fa fa-envelope"></span> Send Message</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                
            </div>
        
    </section>
    
    
    <!--Intro Section-->
    <section class="intro-section" style="background-image:url(images/parallax/image-1.jpg);">
    	<div class="auto-container">
        	<div class="row clearfix">
                <div class="col-md-8 col-sm-8 col-xs-12 text-content">
                	<h2>ARE YOU READY TO MANAGE YOUR OWN EVENTS?</h2>
                	<div class="text">All of our virtual professionals are highly experienced in the areas in which they work and have been through a thorough recruitment process.</div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 text-right">
                	<a href="register.php" class="theme-btn btn-style-one hvr-bounce-to-right"><span class="fa fa-play"></span>SIGN UP TODAY</a>
                </div>
            </div>
        </div>
    </section>
    
    
    <?php include("footer.php"); ?>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"></div>


<script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/revolution.min.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/wow.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/googlemaps.js"></script>
<script src="js/validate.js"></script>
<script src="js/script.js"></script>


</body>
</html>
