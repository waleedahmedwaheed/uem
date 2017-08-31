<?php include_once('conn/db.php'); 
include_once("functions.php");
session_start();
$today = date("Y-m-d");
if ( !isset($_SESSION['SESS_NAME']) ) {
	header('location: login.php');
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
	$t_id = $_GET["t_id"];
}	
	$qry = "SELECT * FROM team d where d.t_id = '".$t_id."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
			$e_id 			= $rows["e_id"];
			$u_id 			= $rows["u_id"];
			$uni_id			= $rows["uni_id"];
			$t_name			= $rows["t_name"];
			$t_contact		= $rows["t_contact"];
			
			//$timestamp = strtotime($issue_date);
//}


$qryc = "select a.team,b.t_id,count(c.p_id) as total,a.e_date from event a,team b,participants c
						where a.e_id = '$e_ids' and b.t_id = '$t_id' and a.e_id=b.e_id and b.t_id = c.t_id";
						 mysql_select_db($database_dbconfig, $dbconfig);
						$resultsc = mysql_query($qryc);
						$rowsc = mysql_fetch_assoc($resultsc);
						$teamc = $rowsc["team"];
						$total = $rowsc["total"];
						$e_date = $rowsc["e_date"];
if ((strtotime($e_date)) < (strtotime($today)))
				{
				$exp = 1;
				} else { 
				$exp = 0;
				}				
				
	$c_id = get_title(c_id,$e_ids);			
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Team</title>

<?php include("headcss.php"); ?>

<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();

$.ajax({
url: ".php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
//$('#loading').hide();
//$('#userForm')[0].reset();
$("#response").html(data);
}
});

}));
});


</script>

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
						
						<tr>
						<td> <a href="single-event.php?e_id=<?php echo $e_id; ?>"><?php echo $t_name; ?> </a></td>
						<td> <?php echo $t_contact; ?> </td>
						<td> <?php echo get_title(uni_id,$uni_id); ?> </td>
						<td> 
						<?php if($exp==0){ ?>
						<a href="reg_team.php?e_id=<?php echo $e_id ?>&t_id=<?php echo $t_id; ?>"> <img src="images/edit.png" alt="UEM" /> </a>
						&nbsp;&nbsp;
						<?php }
						
						if($teamc==$total)
						{
							//echo "OK";
						}
						else
						{
						?>
						<a href="add_participant.php?t_id=<?php echo $t_id; ?>&e_id=<?php echo $e_id; ?>" title="Add Participants"> <i class="fa fa-users"></i> </a>
						<?php
						}
						?>
						</td>
						</tr>
						
				</table>
				
				
				<table>
						
						<tr>
						<th <?php if($c_id==2){ echo "colspan='5'"; } else { ?> colspan="4" <?php  } ?>> <h2> Participants </h2> </th>
						</tr>
						
						<tr>
						<th> Name </th>
						<th> Contact </th>
						<th> Email</th>
						<?php if($c_id==2){ ?>
						<th> Image </th>
						<?php } ?>	
						<th> </th>
						</tr>
						
						<?php 
		$qryp = "SELECT * FROM `participants` WHERE `t_id` = '".$_GET['t_id']."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$resultsp = mysql_query($qryp);
		while($rowsp = mysql_fetch_assoc($resultsp))
		{
			$t_id 			= $rowsp["t_id"];
			$p_id 			= $rowsp["p_id"];
			$p_email		= $rowsp["p_email"];
			$p_name			= $rowsp["p_name"];
			$p_contact		= $rowsp["p_contact"];
			$image			= $rowsp["image"];
						?>
						<tr>
						<td> <?php echo $p_name; ?> </td>
						<td> <?php echo $p_contact; ?> </td>
						<td> <?php echo $p_email; ?> </td>
						<?php if($c_id==2){ ?>
						<td>
						<img src="<?php echo $image; ?>" style="height: 80px;width: 100px;" alt="UEM" /> 
						<?php if($exp==0){ ?>
						<form method="post" action="edit-photo.php" enctype="multipart/form-data">
						 <input type="file" name="image1" accept="image/jpg,image/png,image/jpeg,image/gif" >
						 <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" >
						 <input type="hidden" name="t_id" value="<?php echo $t_id; ?>" >
						 <input type="hidden" name="e_id" value="<?php echo $e_ids; ?>" >
						 <input type="submit" value="Edit" />
						</form>
						<?php } ?>
						</td>
						<?php } ?>
						<td> 
						<?php if($exp==0){ ?>
						<a href="add_participant.php?p_id=<?php echo $p_id ?>&t_id=<?php echo $t_id; ?>&e_id=<?php echo $e_id; ?>"> <img src="images/edit.png" alt="UEM" /> </a>
						<?php } ?>
						</td>
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
