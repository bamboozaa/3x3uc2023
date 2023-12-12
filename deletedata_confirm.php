<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
</head>

<?php
	require_once("index_top.php");
	
	$_SESSION['user'];
	
	if (empty($_SESSION['user'])) {
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php\">";
	} else {	
	
		require "dbconnect.php";
		
		$emp_user = $_SESSION['user'];
		          
		$sql_user = "select * from `tbl_user` where u_username ='$emp_user' and u_level='2'";
		$dbquery_user = mysql_query($sql_user) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง");
		$result_user = mysql_fetch_array($dbquery_user);
		
		if(empty($result_user)){
			//die("Invalid user name and password");
			echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname.php#modalSignout\"> ";		   
		} else {
	
			$teamno = $_POST['teamno'];
			
			$sql_team = "delete from `team` where team_no = $teamno";                 
			$dbquery_team = mysql_query($sql_team) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง1");
		

			$sql_stu = "delete from `student` where team_no = $teamno";                 
			$dbquery_stu = mysql_query($sql_stu) or die("กรุณาตรวจสอบข้อมูลอีกครั้ง2");	
		
		}
		
		echo "<meta http-equiv=\"refresh\" content=\"0; url=checkname_3x3.php\"> ";
	}
?>