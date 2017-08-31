<?php
require_once('../../conn/db.php');

$c_id = $_GET["c_id"];

$insertSQL = "Update category set status = '1' where c_id = '$c_id'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
	echo "<script type='text/javascript'> alert('Deleted Successfully') </script>";
	echo "<script type='text/javascript'> window.location='view_categories.php' </script>";
	
?>