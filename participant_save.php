<?php
include_once('conn/db.php');
include_once("functions.php");

$p_name 		= $_REQUEST["p_name"];
$p_contact		= $_REQUEST["p_contact"];
$action 		= $_REQUEST["action"];
$p_email		= $_REQUEST["p_email"];
$t_id			= $_REQUEST["t_id"];
$e_id			= $_REQUEST["e_id"];
$p_id			= $_REQUEST["p_id"];

$c_id = get_title(c_id,$e_id);

if($action=="update")
{
	
	$qrys = "UPDATE participants set p_name='$p_name',p_email='$p_email',p_contact='$p_contact'
	where p_id='$p_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='view_team.php?e_id=$e_id&t_id=$t_id';</script>";
}
else if($action=="add")
{

if($c_id==2)
{
	
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
}	
			
					$qrys = "INSERT INTO participants(p_name,p_email,p_contact,t_id,image) 
					VALUES('$p_name','$p_email','$p_contact','$t_id','$location1')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Participant created successfully');</script>";
						echo "<script type='text/javascript'>window.location='view_team.php?e_id=$e_id&t_id=$t_id';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}


		
		
		//mysqli_close($conn);
}
?>