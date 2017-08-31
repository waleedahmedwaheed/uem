<?php
include_once('conn/db.php');

$e_id 			= $_REQUEST["e_id"];

$uploadOk = 1;
$size = 10*1024*1024;

if (!isset($_FILES['image1']['tmp_name'])) {
	$location1 = "";
	}
	else
	{
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

	
			
			move_uploaded_file($_FILES["image1"]["tmp_name"],"images/uploaded_files/" . $_FILES["image1"]["name"]);
			
			if(!isset($_FILES['image1']['tmp_name']))
			{	
				//echo $location1."TES";
				echo "<script type='text/javascript'>window.location='single-event.php?e_id=6767';</script>";
			}
			else
			{
							$location1="images/uploaded_files/" . $_FILES["image1"]["name"];
			
			 $qrys = "UPDATE event set e_banner='$location1'
	where e_id='$e_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
				//echo $location1."TEST";
					echo "<script type='text/javascript'>window.location='single-event.php?e_id=$e_id';</script>";

			}
		}
}
	
?>