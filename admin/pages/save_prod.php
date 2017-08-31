<?php require_once('../../conn/db.php'); 

//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE );

$c_id = $_POST['c_id'];
$color = $_POST['color'];
$sizes = $_POST['size'];
$detail = $_POST['detail'];
$opt = $_POST['opt'];
$p_id = $_POST['p_id'];


$uploadOk = 1;
$size = 10*1024*1024;

	if (!isset($_FILES['image1']['tmp_name'])) {
	$location1 = "";
	$img = 0;
	}else{
	$img = 1;	
		$filename = 'uploaded_files/'.$_FILES['image1']['name'];
	if(file_exists($filename))
    {
	//echo "YES";
	}
	else
	{
    //echo "NO";	
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

	
			
			move_uploaded_file($_FILES["image1"]["tmp_name"],"../../uploaded_files/" . $_FILES["image1"]["name"]);
			
			$location1="uploaded_files/" . $_FILES["image1"]["name"];
		}
	}
	}
	

if($opt=="update")
{	
	if($img==0)
	{
	$insertSQL = "Update product set detail = '$detail',c_id='$c_id',color='$color',size='$sizes' where p_id = '$p_id'";
	}
	else
	{
	$insertSQL = "Update product set detail = '$detail',c_id='$c_id',color='$color',size='$sizes',image='$location1' where p_id = '$p_id'";		
	}
	mysql_select_db($database_dbconfig, $dbconfig);
	$Result1 = mysql_query($insertSQL, $dbconfig) or die(mysql_error());
	echo "<script type='text/javascript'> alert('Added Successfully') </script>";
	echo "<script type='text/javascript'> window.location='view_prod.php' </script>";
}
else
{
	
	$insertSQL = "INSERT INTO product (c_id, detail, image, color, size, status) 
VALUES ('".$c_id."','".$detail."','".$location1."','".$color."', '".$sizes."','0')";
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
echo "<script type='text/javascript'> window.location='add_prod.php' </script>";

}
?>
