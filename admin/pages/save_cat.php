<?php require_once('../../conn/db.php'); 

//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE );

$cname = $_POST['cname'];
$opt = $_POST['opt'];
$c_id = $_POST['c_id'];

if($opt=="update")
{
	$insertSQL = "Update category set type = '$cname' where c_id = '$c_id'";
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
	echo "<script type='text/javascript'> alert('Updated Successfully') </script>";
	echo "<script type='text/javascript'> window.location='view_categories.php' </script>";
}
else
{
	$insertSQL = "INSERT INTO category (type, status) 
VALUES ('".$cname."','0')";
  mysql_select_db($database_dbconfig, $dbconfig);
  $Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
//$qry = "INSERT INTO property(location)VALUES ('21122')";
//$result = mysql_query($qry);

if($Result1)
{
	echo "Product Added";
}
else
{
	echo "Product Not Added";
	//echo $insertSQL;

}

echo "<script type='text/javascript'> alert('Added Successfully') </script>";
echo "<script type='text/javascript'> window.location='add_category.php' </script>";
}
	

?>
