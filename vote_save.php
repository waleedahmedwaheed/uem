<?php
include_once('conn/db.php');

$p_id			= $_REQUEST["p_id"];
$u_id			= $_REQUEST["u_id"];
$e_id			= $_REQUEST["e_id"];

	
	$qry = "SELECT * FROM `vote_hist` WHERE `e_id` = '".$e_id."' and `u_id` = '".$u_id."'";
	//exit;
		 mysql_select_db($database_dbconfig, $dbconfig);
		$results = mysql_query($qry);
		$rows = mysql_fetch_assoc($results);
		if($rows>0)
		{
			echo "<script type='text/javascript'>alert('You already voted for this event');</script>";
			echo "<script type='text/javascript'>window.location='vote.php?e_id=$e_id';</script>";
		}
		else
		{
	$qrys = "UPDATE participants set score = score + 1
	where p_id='$p_id'";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qrys);
					
	$qryss = "INSERT INTO vote_hist(u_id,p_id,e_id) 
					VALUES('$u_id','$p_id','$e_id')";
					mysql_select_db($database_dbconfig, $dbconfig);
					mysql_query($qryss);				
					
					echo "<script type='text/javascript'>alert('Voted successfully');</script>";
					echo "<script type='text/javascript'>window.location='vote.php?e_id=$e_id';</script>";
		}
?>	