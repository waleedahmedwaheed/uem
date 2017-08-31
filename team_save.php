<?php
include_once('conn/db.php');

$t_name 		= $_REQUEST["t_name"];
$t_contact		= $_REQUEST["t_contact"];
$date 			= date('Y-m-d H:i:s');
$action 		= $_REQUEST["action"];
$e_id 			= $_REQUEST["e_id"];
$u_id 			= $_REQUEST["u_id"];
$uni_id			= $_REQUEST["uni_id"];
$t_id			= $_REQUEST["t_id"];

if($action=="update")
{
	$qrys = "UPDATE team set t_name='$t_name',uni_id='$uni_id',t_contact='$t_contact'
	where e_id='$e_id' and t_id='$t_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					echo "<script type='text/javascript'>alert('Record updated successfully');</script>";
					echo "<script type='text/javascript'>window.location='view_team.php?e_id=$e_id&t_id=$t_id';</script>";
}
else if($action=="add")
{
			
					$qrys = "INSERT INTO team(t_name,uni_id,t_contact,t_fee,u_id,e_id,entry_datetime) 
					VALUES('$t_name','$uni_id','$t_contact','$t_fee','$u_id','$e_id','$date')";
					mysql_select_db($database_dbconfig, $dbconfig);
					if (mysql_query($qrys)) {
						echo "<script type='text/javascript'>alert('Team created successfully');</script>";
						echo "<script type='text/javascript'>window.location='single-event.php?e_id=$e_id';</script>";
					} else {
						echo "Error: " . $qrys . "<br>" ;
					}


		
		
		//mysqli_close($conn);
}
?>