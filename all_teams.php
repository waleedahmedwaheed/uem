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
	$u_id = $user_arr["u_id"];
	//exit;
}


if(isset($_GET["e_id"]))
{
	$e_ids = $_GET["e_id"];
}	
	


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Team</title>

<?php include("headcss.php"); ?>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
	
</head>	
<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
   <?php include("header.php"); ?>	
    
    <!-- Page Banner -->
    <section class="page-banner" style="background-image:url(images/background/page-banner.jpg);">
    	<div class="auto-container">
        	<h1>Team</h1>
        </div>
    </section>
    
	
    <!--Contact Section-->
    <section class="contact-section">
    	<div class="auto-container">
        	
           
            <!--Contact Form Area-->
            <div class="row clearfix">
				
				<table style="margin-bottom:50px;">
						
						<tr>
						<th colspan="4"> <h2> Team </h2> </th>
						</tr>
						
						<tr>
						<th> Name </th>
						<th> Contact </th>
						<th> Institue</th>
						<th> </th>
						</tr>
						<?php
						$qry = "SELECT * FROM team where e_id = '".$e_ids."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rows = mysql_fetch_assoc($results))
		{
			$e_id 			= $rows["e_id"];
			$t_id 			= $rows["t_id"];
			$u_id 			= $rows["u_id"];
			$uni_id			= $rows["uni_id"];
			$t_name			= $rows["t_name"];
			$t_contact		= $rows["t_contact"];
			?>
						<tr>
						<td> <a href="view_team.php?e_id=<?php echo $e_ids ?>&t_id=<?php echo $t_id; ?>"><?php echo $t_name; ?></a></td>
						<td> <?php echo $t_contact; ?> </td>
						<td> <?php echo get_title(uni_id,$uni_id); ?> </td>
						<td> </td>
						</tr>
		<?php } ?>				
				</table>
			
				
				<div class="col-md-9 col-sm-12 col-xs-12 contact-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
            			
                    </div>
                </div>
                
            </div>
        
    </section>
    
    
    <!--Intro Section-->
    
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
