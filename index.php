<?php include_once('conn/db.php'); 
include_once("functions.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Home </title>

<?php include("headcss.php"); ?>	

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
	
	<?php include("header.php"); ?>	
  
    <!-- Main Slider -->
    <section class="main-slider">
    	
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                	
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/image-1.jpg"  data-saveperformance="off"  data-title="Your Lead Power">
                    <img src="images/main-slider/image-1.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="350"
                    data-y="center" data-voffset="-130"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
					<div class="big-title"><h2>Set up events for different <br> gaming competetion</h2></div></div>
                    
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="350"
                    data-y="center" data-voffset="120"
                    data-speed="1500"
                    data-start="1500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
                    	
                       <div class="links">
					<a href="create_event.php" class="default-btn orange hvr-bounce-to-right">Plan an event</a> 
					</div>
                    
                    </div>
                    
                    </li>
                    
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/image-2.jpg"  data-saveperformance="off"  data-title="Your Lead Power">
                    <img src="images/main-slider/image-2.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="15"
                    data-y="center" data-voffset="-60"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
					<div class="big-title"><h2>Plan and create your own events </h2></div></div>
                    
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="15"
                    data-y="center" data-voffset="140"
                    data-speed="1500"
                    data-start="1500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
					<div class="links">
					<a href="create_event.php" class="default-btn orange hvr-bounce-to-right">Plan an event</a> 
					</div>
					</div>
                    
                    </li>
                    
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="images/main-slider/image-3.jpg"  data-saveperformance="off"  data-title="Your Lead Power">
                    <img src="images/main-slider/image-3.jpg"  alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat"> 
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="15"
                    data-y="center" data-voffset="-100"
                    data-speed="1500"
                    data-start="500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
					<div class="big-title"><h2>We plan, manage and create <br>the perfect event for you!</h2></div></div>
                    
                    
                    <div class="tp-caption lfb tp-resizeme"
                    data-x="left" data-hoffset="15"
                    data-y="center" data-voffset="160"
                    data-speed="1500"
                    data-start="1500"
                    data-easing="easeOutExpo"
                    data-splitin="none"
                    data-splitout="none"
                    data-elementdelay="0.01"
                    data-endelementdelay="0.3"
                    data-endspeed="1200"
                    data-endeasing="Power4.easeIn"
                    style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">
					<div class="links"><a href="create_event.php" class="default-btn orange hvr-bounce-to-right">Plan an event</a> 
					</div></div>
                    
                    </li>
                    
                </ul>
                
            	<div class="tp-bannertimer"></div>
            </div>
        </div>
    </section>
    
    
    <!--Features Section-->
    <section class="features-section">
    	<div class="auto-container">
        
        	<div class="sec-title wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms"><h2>How UEM can help you</h2></div>
            <div class="sec-text wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms"><p>Whatever the level of support you require, we are sure that we will have a  package <br>that meets your needs. </p></div>
        	
            <div class="row clearfix">
            
            	<article class="col-md-3 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
                	<div class="inner">
                        <div class="icon"><img src="images/icons/icon-money.png" alt="" title=""></div>
                        <h3>Timely Updates</h3>
                        <div class="text"><p>All upcoming and Ongoing events been displayed here with time to time updates. With registration panel through which students can register theirselves.</p></div>
                	</div>
                </article>
                
                <article class="col-md-3 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms">
                	<div class="inner">
                        <div class="icon"><img src="images/icons/icon-balancing.png" alt="" title=""></div>
                        <h3>Notifications</h3>
                        <div class="text"><p>All registered students would be notified by upcoming events where ever event occurs, an email will be sent to the registered students about upcoming events.</p></div>
                	</div>
                </article>
                
                <article class="col-md-3 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="400ms" data-wow-duration="1000ms">
                	<div class="inner">
                        <div class="icon"><img src="images/icons/icon-saving.png" alt="" title=""></div>
                        <h3>Results</h3>
                        <div class="text"><p>Every event results announcement will be occur on this portal. </p></div>
                	</div>
                </article>
                
                <article class="col-md-3 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1000ms">
                	<div class="inner">
                        <div class="icon"><img src="images/icons/icon-schedule.png" alt="" title=""></div>
                        <h3>Timeline &amp; Schedule</h3>
                        <div class="text"><p>The Event that is been occurred and result is been announced then that will be deleted.</p></div>
                	</div>
                </article>
                
            </div>
        </div>
    </section>
    
    <!--Two Column Full Section-->
    <section class="two-column-full">
    	
        <!--Column-->
        <article class="column wow rotateInDownLeft" data-wow-delay="0ms" data-wow-duration="1000ms" style="background-image:url(images/resource/image-1.jpg);">
        	<div class="link"><a href="#" class="default-btn orange hvr-bounce-to-left">Plan an event</a></div>
            <h4><a href="#">Check out our online eventmanager <span class="arrow">&rarr;</span></a></h4>
            <div class="text"><p>Our teams are up to date with the latest technologies, media trends and are keen to prove themselves in this industry and that’s what you want from an advertising agency, not someone who is relying.</p></div>
        </article>
        
        <!--Column-->
        <article class="column wow rotateInDownRight" style="background-color: #f1f1f1;padding: 0px 0px;" data-wow-delay="0ms" data-wow-duration="1000ms" >
        	<iframe src="http://www.nust.edu.pk/Events/Pages/default.aspx" style="width: 100%; height: 339px; overflow: hidden;"></iframe>
        </article>
        
        <div class="clearfix"></div>
    </section>
    
    <!--Latest Events-->
    <section class="latest-posts" style="background-image:url(images/background/texture-1.jpg);">
    	<div class="texture-layer" style="background-image:url(images/background/texture-map.png);"></div>
        
    	<div class="auto-container">
        	<div class="sec-title wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms"><h2>Explore our latest events</h2></div>
            
            <div class="row clearfix">
            	
                <!--Post-->
				<?php
				$qry = "SELECT * FROM event where status=0 order by e_id desc Limit 4";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
			$e_name 		= $rows["e_name"];
			$c_id			= $rows["c_id"];
			$e_desc			= $rows["e_desc"];
			$e_venue		= $rows["e_venue"];
			$e_date			= $rows["e_date"];
			$e_time			= $rows["e_time"];
			$e_fee			= $rows["e_fee"];
			$date 			= $rows["entry_datetime"];
			$e_banner		= $rows["e_banner"];
			$e_id 			= $rows["e_id"];
			$u_id 			= $rows["u_id"];
			$uni_id			= $rows["uni_id"];
			?>
                <article class="col-lg-3 col-md-4 col-sm-6 col-xs-12 post wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1000ms">
                	<div class="inner">
                    	<div class="upper">
                        	<header class="post-title"><h3><a href="single-event.php?e_id=<?php echo $e_id; ?>"><?php echo $e_name; ?></a></h3></header>
                            <div class="desc">
                            	<div class="text">
					<ul>
                        <li><i class="fa fa-map-marker" style="padding-right: 10px;"></i><?php echo $e_venue; ?> </li>
                        <li><i class="fa fa-cog" style="padding-right: 10px;"></i><?php echo get_title(category,$c_id); ?></li>
                        <li><i class="fa fa-university" style="padding-right: 10px;"></i><?php echo get_title(uni_id,$uni_id); ?></li>
                    </ul>
								</div>
                                <a href="single-event.php?e_id=<?php echo $e_id; ?>" class="more hvr-bounce-to-right"><span class="fa fa-play"></span></a>
                                <br>
                                <div class="info"><?php echo date("jS F, Y", strtotime("$e_date")); ?></div>
                            </div>
                        </div>
                        <figure class="post-image">
                        	 <img <?php if(($e_banner=="") || ($e_banner=="images/uploaded_files/")){ 
							switch ($c_id) {
							case 1:
								$e_banners='images/types/gaming.jpg';
								break;
							case 2:
								$e_banners='images/types/Camera.jpg';
								break;
							case 3:
								$e_banners='images/types/quiz.jpg';
								break;
						}
							?>
							src="<?php echo $e_banners; ?>"
							
							<?php } else { ?>
							
							src="<?php echo $e_banner; ?>" 
							<?php } ?> alt="UEM">
							
                            <div class="overlay"><div class="overlay-content"><p><a href="single-event.php?e_id=<?php echo $e_id; ?>" class="theme-btn btn-style-one hvr-bounce-to-right">READ DETAILS</a></p></div></div>
                        </figure>
                    </div>
                </article>
		<?php } ?>	
				
              
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

<?php include("scripts.php"); ?>

</body>
</html>
