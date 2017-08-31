<?php
include_once('conn/db.php');

$p_id			= $_REQUEST["p_id"];
$t_id			= $_REQUEST["t_id"];
$e_id			= $_REQUEST["e_id"];

$uploadOk = 1;
$size = 10*1024*1024;

if (!isset($_FILES['image1']['tmp_name'])) {
	$location1 = "";
	}else{
	if($_FILES["image1"]["size"] > $size ){
		$uploadOk = 0;
	}
	if($uploadOk==0){
		echo "Sorry, there was an error in uploading";
	} else{
		
	
	$file=$_FILES['image1']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	$image_name= addslashes($_FILES['image1']['name']);
	$image_size= getimagesize($_FILES['image1']['tmp_name']);

	
			
			move_uploaded_file($_FILES["image1"]["tmp_name"],"images/event/" . $_FILES["image1"]["name"]);
			
			$location1="images/event/" . $_FILES["image1"]["name"];
		}
	}
	
	$qrys = "UPDATE participants set image='$location1'
	where p_id='$p_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Image updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='view_team.php?e_id=$e_id&t_id=$t_id';</script>";
	
?>	