<?php include_once('conn/db.php'); 
include_once("functions.php");
//error_reporting(0);
session_start();
$u_ids = $_SESSION['SESS_NAME'];
if ( !isset($_SESSION['SESS_NAME']) ) {
	//header('location: login.php');
} else {
	
	$qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	$email = $user_arr["email"];
	//exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Events </title>

<?php include("headcss.php"); ?>	

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    	<?php include("header.php"); ?>	

		<!-- Page Banner -->
    <section class="page-banner" style="background-image:url(images/background/page-banner.jpg);">
    	<div class="auto-container">
        	<h1>Our Events</h1>
        </div>
    </section>

	<!-- Blog -->
    <section id="blog" class="blog-area section">
        <div class="auto-container">
            <div class="row">

                <!-- Blog Left Side Begins -->
                <div class="col-md-8 col-md-offset-2">
                    <!-- Post -->
					
						
							<?php
			if(!isset($_GET["view"])){
    $page = 1;
} else {
    $page = $_GET['view'];
}
	 if (isset($_GET["view"])) { $page  = $_GET["view"]; } else { $page=1; }; 
	$start_from = ($page-1) * 4; 
	
			$qry = "SELECT * FROM event where status=0 order by e_id desc Limit $start_from, 4";
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
						
                    <div class="post-item wow" data-animation="fadeInUp" data-animation-delay="300">
                        <!-- Post Title -->
                        <h2 class="wow fadeInUp"><a href="single-event.php?e_id=<?php echo $e_id; ?>"><?php echo $e_name; ?></a></h2>
                        <div class="post wow fadeInUp">
                            <!-- Image -->
                            <a href="single-event.php?e_id=<?php echo $e_id; ?>"><img style="width:100%" class="img-responsive"  
							<?php if(($e_banner=="") || ($e_banner=="images/uploaded_files/")){ 
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
							<?php } ?>
							alt="uem" /></a>
                            <div class="post-content">	
                                <!-- Text -->
                                <p><?php echo $e_desc; ?></p>
                                <!-- Meta -->
                                <div class="posted-date"><?php echo date("jS F, Y", strtotime("$date")); ?>   /   <span>by</span> <a href="#"><?php echo get_title(uni_id,$uni_id); ?></a> </div>
                            </div>
                        </div>
                    </div><!-- End Post -->
           
		<?php } ?>
		   

                    <!-- Pagination -->
                    <div class="post-nav wow fadeInRight" data-animation="fadeInUp" data-animation-delay="300">
                            <ul class="pagination">
							
							<?php 
$sql = "SELECT COUNT(e_id) FROM event"; 
mysql_select_db($database_dbconfig, $dbconfig);
$rs_result = mysql_query($sql, $dbconfig) or die(mysql_error());	 
$row2 = mysql_fetch_row($rs_result); 
$total_records = $row2[0]; 
$total_pages = ceil($total_records / 4); 

//echo $total_records; 

if($page > 1){
    
	
	?>
    
    <li><a href="events.php?view=<?php echo $prev = ($page - 1);?>" class="button"> < </a></li>
    <?php
}

 
for ($i=1; $i<=$total_pages; $i++) {  
      
	 if($page == $i){
		 ?>
	<li><a href="#"><?php echo $page;?> </a> </li>
     
      <?php  }
	else {		
            }
      
	?>

<?php
}; 

if($page < $total_pages){
  
	?>
    <li><a href="events.php?view=<?php echo $next = ($page + 1); ?>" class="button">></a></li>
   
    <?php
}
?>
                        </ul>
                    </div>	<!-- Pagination Ends-->
                </div><!-- Blog Left Side Ends -->
                

                
            </div>
        
        </div>
    </section>
    <!-- Our Blog Section Ends -->
    
    <?php include("footer.php"); ?>
	
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top"></div>


<?php include("scripts.php"); ?>

</body>
</html>