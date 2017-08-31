<?php
include_once('conn/db.php');

function get_title($mode,$text){
switch($mode)
{
case category: $sql2 = "select type title from category where c_id ='$text'"; break;   
case u_id: 	   $sql2 = "select u_id title from users where email ='$text'"; break;   
case uni_id:   $sql2 = "select title title from universities where uni_id ='$text'"; break;   
case c_id:     $sql2 = "select c_id title from event where e_id ='$text'"; break;   
case e_id:     $sql2 = "select e_name title from event where e_id ='$text'"; break;   
case email:    $sql2 = "select email title from users where u_id ='$text'"; break;   
case e_ids:    $sql2 = "select e_id title from team where t_id ='$text'"; break;   
 
}
$result = mysql_query($sql2);
//mysql_select_db($database_dbconfig, $dbconfig);
$rows = mysql_fetch_assoc($result);
$title	= $rows["title"];
return $title;
}
?>