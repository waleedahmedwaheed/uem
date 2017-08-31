<?php require_once('../../conn/db.php'); 

//error_reporting(0);
//error_reporting(E_ERROR | E_PARSE );

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$mobile_no = $_POST['mobile_no'];
$sms_body = $_POST['sms_body'];


echo "<script type='text/javascript'> 
window.location='http://115.186.134.162/IDS_SMS/send_sms.php?user_name=waleed&user_password=786&mobile_no=$mobile_no&sms_body=$sms_body' 
</script>";

	

?>
