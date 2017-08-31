<?php include_once('conn/db.php'); 

session_start();

if ( !isset($_SESSION['SESS_NAME']) ) {
	header('location: login.php');
} else {
	
	$qry = "SELECT * FROM users WHERE email = '{$_SESSION['SESS_NAME']}'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$result = mysql_query($qry, $dbconfig) or die(mysql_error());
	$user_arr = mysql_fetch_assoc($result);
	$u_ids = $user_arr["u_id"];
	//exit;
}


if(isset($_GET["e_id"]))
{
	$e_ids = $_GET["e_id"];
	
	$qry = "SELECT * FROM event where e_id = '".$e_ids."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
			$t_name 		= $rows["t_name"];
			$c_id			= $rows["c_id"];
			$e_desc			= $rows["e_desc"];
			$e_venue		= $rows["t_contact"];
			$e_date			= $rows["e_date"];
			$e_time			= $rows["e_time"];
			$e_fee			= $rows["e_fee"];
			$date 			= $rows["entry_datetime"];
			$e_banner		= $rows["e_banner"];
			$e_id 			= $rows["e_id"];
			$u_id 			= $rows["u_id"];
			$uni_id			= $rows["uni_id"];
			$team 			= $rows["team"];
}	
	
			
			//$timestamp = strtotime($issue_date);
//}

$qrys = "SELECT * FROM team d where d.t_id = '".$_GET["t_id"]."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qrys);
		$rowss = mysql_fetch_assoc($results);
			$e_id 			= $rowss["e_id"];
			$u_id 			= $rowss["u_id"];
			$uni_id			= $rowss["uni_id"];
			$t_name			= $rowss["t_name"];
			$t_contact		= $rowss["t_contact"];
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
url: "team_save.php", // Url to which the request is send
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
	
	
<script>
$(document).ready(function () {
  //called when key is pressed in textbox
  $("#t_contact").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});
</script>

<script>
$('#t_contact,#t_name').unbind('keyup change input paste').bind('keyup change input paste',function(e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    var maxCount = $this.attr('maxlength');
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
    }
}); 
</script>	

	
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
            	<div class="col-md-9 col-sm-12 col-xs-12 contact-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                		
                        <!--Contact Form-->
                        <form method="post" id="userForm" enctype="multipart/form-data">
                        	<div class="row clearfix">
                                
                                <div class="col-md-5 col-sm-6 col-xs-12">
                                    
                                   
                                    
                                </div>
                                
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    
                                    <div class="form-group">
                                    	<label class="form-label">Team Name *</label>
                                        <input type="text" name="t_name" id="t_name" value="<?php echo $t_name; ?>" maxlength="30" required>
                                    </div>
									
									<div class="form-group">
                                    	<label class="form-label">University *</label>
                                        <select name="uni_id" required>
											<option value="">--Select--</option>
											<?php 
			$qry = "SELECT * FROM universities order by title";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		while($rowsu = mysql_fetch_assoc($results))
		{
											?>
				<option value="<?php echo $rowsu["uni_id"]; ?>" <?php if($uni_id==$rowsu["uni_id"]){ echo "selected";} ?>><?php echo $rowsu["title"]; ?></option>
		<?php } ?>						
											</select>
                                    </div>
                                    
									<div class="form-group">
                                    	<label class="form-label">Contact *</label>
                                        <input type="text" name="t_contact" id="t_contact" value="<?php echo $t_contact; ?>" maxlength="11" required>
                                    </div>
									
									
									<input type="hidden" name="u_id" value="<?php echo $u_ids; ?>" />
									<input type="hidden" name="e_id" value="<?php echo $e_ids; ?>" />
									
									<?php if(isset($_GET["t_id"]))
											{ ?>
											<input type="hidden" name="action" value="update" />
											<input type="hidden" name="t_id" value="<?php echo $_GET["t_id"]; ?>" />
											<?php } else { ?>
											<input type="hidden" name="action" value="add" />
									<?php } ?>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="form-group text-right">
							<?php if(!isset($_GET["t_id"]))
											{ ?>
         <button type="submit" name="submit-form" class="theme-btn btn-style-one hvr-bounce-to-right"><span class="fa fa-user"></span> Create</button>
							<?php } else { ?>
         <button type="submit" name="submit-form" class="theme-btn btn-style-one hvr-bounce-to-right"><span class="fa fa-user"></span> Update</button>
							<?php } ?>

                            </div>
                            
                        </form>
                        
						<span id="response"> </span>
						
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
