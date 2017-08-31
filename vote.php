<?php
include_once('conn/db.php'); 
include_once("functions.php");
session_start();
if ( !isset($_SESSION['SESS_NAME']) ) {
	header('location: login.php');
} else {
	
	$qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	$email = $user_arr["email"];
	$u_ids = $user_arr["u_id"];
	//exit;
}

$e_ids = $_GET["e_id"];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>UEM - Vote</title>
<?php include("headcss.php"); ?>
</head>
<body>
<div class="page-wrapper">
  
    <!-- Preloader -->
    <div class="preloader"></div>
  
    <?php include("header.php"); ?>
	
    <!-- Page Banner -->
    <section class="page-banner" style="background-image:url(images/background/page-banner.jpg);">
      <div class="auto-container">
          <h1>Vote</h1>
        </div>
    </section>

    <section id="project-version-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="gallery-filter">
                        <li data-filter="all">
                            <span><?php echo get_title(e_id,$e_ids); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row nor4al-gallery" id="image-gallery-mix">
			
			<?php 
			
			
		$qry = "select a.u_id as eve,b.u_id as tea,a.e_id,b.t_id,c.p_id , c.image , c.score
		from event a,team b, participants c 
		where a.e_id = '".$_GET["e_id"]."' and a.c_id = 2 and a.e_id = b.e_id and b.t_id = c.t_id";
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
			$u_id	 		= $rows["u_id"];
			$uni_id			= $rows["uni_id"];
			$image			= $rows["image"];
			$p_id			= $rows["p_id"];
			$eve_id			= $rows["eve"];
			$tea_id			= $rows["tea"];
			$score			= $rows["score"];
			?>
			
                <div class="col-lg-4 col-sm-6 col-xs-12 concert party mix">
                    <div class="img-wrap">
                        <img src="<?php echo $image; ?>" alt="">
						<?php if($eve_id<>$u_ids){ 
		$qryss = "select u_id from team   
		where e_id = '".$_GET["e_id"]."' and u_id = '$u_ids'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$resultss = mysql_query($qryss);
		$rowss = mysql_fetch_assoc($resultss);
		if($rowss>0)
		{
			//echo "TEST";
		}
		else
		{ ?>
                        <div class="content-wrap hvr-rectangle-out">
                            <div class="border">
                                <div class="content">
									
									<h4>
                                    <form method="post" action="vote_save.php">
									<input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
									<input type="hidden" name="u_id" value="<?php echo $u_ids; ?>" />
									<input type="hidden" name="e_id" value="<?php echo $_GET["e_id"]; ?>" />
		<button type="submit" name="submit-form" class="theme-btn btn-style-one hvr-bounce-to-right"><?php echo $score; ?> / Votes</button>
									</form>
									</h4>
		
                                </div>
                            </div>
                        </div>
						
						<?php }
									} else { ?>
			
									<?php } ?>
						
                    </div>
                </div>
		<?php } ?>	
				
              
                
               
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
<script src="js/jquery.countdown.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>