<?php include_once('conn/db.php'); 
include_once("functions.php");
session_start();

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
	$t_ids = $_GET["t_id"];
}	
	$qry = "SELECT * FROM `participants` WHERE `p_id` = '".$_GET['p_id']."'";
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
			$p_id 			= $rows["p_id"];
			$p_email		= $rows["p_email"];
			$p_name			= $rows["p_name"];
			$p_contact		= $rows["p_contact"];
			
			//$timestamp = strtotime($issue_date);
//}

	$c_id = get_title(c_id,$e_ids);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title> UEM - Partcipants</title>

<?php include("headcss.php"); ?>

<script>

$(document).ready(function (e) {
$("#userForm").on('submit',(function(e) {
e.preventDefault();
$('#response').show();

$.ajax({
url: "participant_save.php", // Url to which the request is send
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
  $("#p_contact").keypress(function (e) {
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
$('#p_contact,#p_name').unbind('keyup change input paste').bind('keyup change input paste',function(e){
    var $this = $(this);
    var val = $this.val();
    var valLength = val.length;
    var maxCount = $this.attr('maxlength');
    if(valLength>maxCount){
        $this.val($this.val().substring(0,maxCount));
    }
}); 
</script>	

<script>
function chText()
{
    var str=document.getElementById("aliasEntry");
    var regex=/[^a-z]/gi;
    str.value=str.value.replace(regex ,"");
}
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
        	<h1>Partcipants</h1>
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
                                    	<label class="form-label">Partcipant Name *</label>
                                        <input type="text" name="p_name" id="p_name" maxlength="40" onKeyUp="chText()" onKeyDown="chText()" value="<?php echo $p_name; ?>" required>
                                    </div>
									
									 <div class="form-group">
                                    	<label class="form-label">Partcipant Email *</label>
                                        <input type="email" name="p_email" value="<?php echo $p_email; ?>" required>
                                    </div>
                                    
									<div class="form-group">
                                    	<label class="form-label">Partcipant Contact *</label>
                                        <input type="text" name="p_contact" id="p_contact" onKeyUp="chText()" onKeyDown="chText()" maxlength="11" value="<?php echo $p_contact; ?>" required>
                                    </div>
									
									<?php 
									if($c_id==2)
									{
									?>
									<div class="form-group">
                                    	<label class="form-label">Image *</label>
                                        <input type="file" name="image1" required accept="image/jpg,image/png,image/jpeg,image/gif" >
                                    </div>
									<?php } ?>
									
									<input type="hidden" name="t_id" value="<?php echo $t_ids; ?>" />
									<input type="hidden" name="e_id" value="<?php echo $e_ids; ?>" />
									
									<?php if(isset($_GET["p_id"]))
											{ ?>
											<input type="hidden" name="action" value="update" />
											<input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
											<?php } else { ?>
											<input type="hidden" name="action" value="add" />
									<?php } ?>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="form-group text-right">
							<?php if(!isset($_GET["p_id"]))
											{ ?>
         <button type="submit" name="submit-form" class="theme-btn btn-style-one hvr-bounce-to-right"><span class="fa fa-user"></span> Add</button>
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
