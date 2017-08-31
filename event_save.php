<?php
include_once('conn/db.php');

$e_name 		= $_REQUEST["e_name"];
$c_id			= $_REQUEST["c_id"];
$e_desc			= $_REQUEST["e_desc"];
$e_venue		= $_REQUEST["e_venue"];
$e_date			= $_REQUEST["e_date"];
$e_time			= $_REQUEST["e_time"];
$e_fee			= $_REQUEST["e_fee"];
$date 			= date('Y-m-d H:i:s');
$action 		= $_REQUEST["action"];
$e_id 			= $_REQUEST["e_id"];
$u_id 			= $_REQUEST["u_id"];
$uni_id			= $_REQUEST["uni_id"];
$team			= $_REQUEST["team"];

if($action=="update")
{
	$qrys = "UPDATE event set e_name='$e_name',e_desc='$e_desc',e_venue='$e_venue',e_date='$e_date',e_fee='$e_fee',c_id='$c_id',e_time='$e_time',
	uni_id = '$uni_id', team = '$team'
	where e_id='$e_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='create_event.php?e_id=$e_id';</script>";
}
else if($action=="add")
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

	
			
			move_uploaded_file($_FILES["image1"]["tmp_name"],"images/uploaded_files/" . $_FILES["image1"]["name"]);
			
			$location1="images/uploaded_files/" . $_FILES["image1"]["name"];
		}
	}
	

		 /* $qry = "SELECT * FROM users WHERE email='".$email."'";
		 mysql_select_db("ems", $dbconfig);
		$results = mysql_query($qry);
		if($results) {
			if (mysql_num_rows($results) > 0) {
				echo "<script type='text/javascript'>alert('Email already in use');</script>";
				}
				else{  */
					$qrys = "INSERT INTO event(e_name,e_desc,e_venue,e_date,e_fee,u_id,status,entry_datetime,e_banner,c_id,e_time,uni_id,team) 
					VALUES('$e_name','$e_desc','$e_venue','$e_date','$e_fee','$u_id','0','$date','$location1','$c_id','$e_time','$uni_id','$team')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Event created successfully');</script>";
						echo "<script type='text/javascript'>window.location='own_events.php';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}
					/* }
		}
		else {
			die("Query failed");
		}  */
		
		//mysqli_close($conn);
}
?>