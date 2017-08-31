<?php include_once('conn/db.php'); 
include_once("functions.php");
session_start();
$today = date("Y-m-d");
if ( !isset($_SESSION['SESS_NAME']) ) {
	//header('location: login.php');
} else {
	
	$qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	$u_ids = $user_arr["u_id"];
	//exit;
}

$qry = "SELECT * FROM event where e_id = '".$_GET["e_id"]."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
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
			$team			= $rows["team"];
			$resulte		= $rows["result"];
			$voting			= $rows["voting"];
			
			
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Event Detail</title>

<?php include("headcss.php"); ?>	

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <?php include("header.php"); ?>	
	
    <!-- Page Banner -->
    <section class="page-banner" style="background-image:url(images/background/page-banner.jpg);">
    	<div class="auto-container">
        	<h1>Event</h1>
        </div>
    </section>
    

    <section id="single-event">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-3">
                    <img src="images/resource/team-image-3.jpg" alt="">
                    <ul>
                        <li><i class="fa fa-calendar"></i><?php echo date("jS F, Y", strtotime("$e_date")); ?></li>
                        <li><i class="fa fa-clock-o"></i><?php echo $e_time; ?></li>
                        <li><i class="fa fa-map-marker"></i><?php echo $e_venue; ?> </li>
                        <li><a href="#" target="_blank"><i class="fa fa-cog"></i><?php echo get_title(category,$c_id); ?></a></li>
                        <li><i class="fa fa-users"></i><?php echo $team; ?> Members Allow</li>
                        <li><i class="fa fa-university"></i><?php echo get_title(uni_id,$uni_id); ?></li>
                    </ul>
					<br>
					<?php if ((isset($_SESSION['SESS_NAME'])) and ($voting==1)){ ?>
				<a class="theme-btn btn-style-one hvr-bounce-to-right" href="vote.php?e_id=<?php echo $e_id ?>" style="float:right;background: #337ab7;margin-bottom:20px;">
				 Vote </a>
				<?php } ?>

				<?php
					if ((isset($_SESSION['SESS_NAME'])) and ($u_id<>$u_ids)) {
				//echo $u_id."--".$u_ids;
				if (((strtotime($e_date)) > (strtotime($today))) and ($u_id==$u_ids))
				{
					// echo "expired";
				} else { 
				
				echo $qry = "SELECT * FROM team where e_id = '".$_GET["e_id"]."' and u_id = '".$u_ids."'";
				 mysql_select_db($database_dbconfig, $dbconfig);
				$results = mysql_query($qry);
				$rows = mysql_fetch_assoc($results);
				if($rows>0)
				{
				?>	
				<a class="theme-btn btn-style-one hvr-bounce-to-right" href="view_team.php?e_id=<?php echo $e_id ?>&t_id=<?php echo $rows["t_id"]; ?>" style="float:right;background: #337ab7">
				<?php echo $rows["t_name"]; ?> registered</a>
				<?php
				}
				else
				{
				?>
					<a class="theme-btn btn-style-one hvr-bounce-to-right" href="reg_team.php?e_id=<?php echo $e_id ?>" style="float:right;background: #337ab7">
					Register on Event </a>
				<?php
				}
						}
					}
					else if ((isset($_SESSION['SESS_NAME'])) and ($u_id==$u_ids)) 
					{
						
				
					}
					
					else 
					{
				?>
				<a class="theme-btn btn-style-one hvr-bounce-to-right" href="login.php" style="float:right;background: #337ab7">
					Login to Register on Event </a>
				<?php	}
				?>
				
                </div>
                <div class="col-lg-9">
				
				<?php 
				if (((strtotime($e_date)) > (strtotime($today))) and ($u_id==$u_ids))
				{ ?>
					<a class="theme-btn btn-style-one hvr-bounce-to-right" href="create_event.php?e_id=<?php echo $e_id; ?>" style="float:right"> Edit </a>
				
				<?php	
				} else { 
					
					if($resulte==1)
					{
					?>	
				<a class="theme-btn btn-style-one hvr-bounce-to-right" href="res_teams.php?e_id=<?php echo $e_id; ?>" style="background: red;margin-bottom: 20px;"> Check Result </a>	
				
				<?php 
					}
					else
					{
						//echo "TETS";
					}
					
				}
				
				$qry = "SELECT count(t_id) as total FROM team where e_id = '".$_GET["e_id"]."'";
				 mysql_select_db($database_dbconfig, $dbconfig);
				$results = mysql_query($qry);
				$rows = mysql_fetch_assoc($results);
				$total = $rows["total"];
					?>
					<a class="theme-btn btn-style-one hvr-bounce-to-right" href="all_teams.php?e_id=<?php echo $e_id ?>" style="float:right;background: #337ab7">
					<?php echo $total; ?> Teams Registered </a>
				
				
				
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
							
							<?php 
				
				if (((strtotime($e_date)) > (strtotime($today))) and ($u_id==$u_ids))
				{ ?>
					 <form method="post" enctype="multipart/form-data" action="edit-banner.php" >
					<input type="file" name="image1" accept="image/jpg,image/png,image/jpeg,image/gif" >
					<input type="hidden" name="e_id" value="<?php echo $e_id; ?>" >
					 <button type="submit" name="submit-form" class="theme-btn btn-style-one hvr-bounce-to-right"> Edit Banner</button>
					</form>
				<?php } else { 
				
				}
				?>
				
                    <h2><?php echo $e_name; ?></h2>

                    <p><?php echo $e_desc; ?></p>
                    
					<p>Created on <?php echo date("jS F, Y", strtotime("$date")); ?></p>

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
<script src="js/jquery.countdown.js"></script>
<script src="js/script.js"></script>

</body>
</html>
