<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<?php

$database = 'db_register';
$user_db = 'naruemol';
$pass_db = 'fV64Ji!~';
/*
$database = 'db_register';
$user_db = "db_appregis";
$pass_db = "sFfkU38wWOwYz44HLJwV";


$database = '3x3';
$user_db = 'root';
$pass_db = '123456';
*/
// connect to  mysql server
$my_connect = mysql_connect("localhost", $user_db, $pass_db) or die("ไม่สามารถติดต่อฐานข้อมูลได้");

//select the  database
mysql_select_db($database, $my_connect);
//echo "ติดต่อฐานข้อมูลได้แล้ว";

error_reporting(E_ALL ^ E_NOTICE);
mysql_query("SET time_zone = '+7:00'", $my_connect);
mysql_query("SET character_set_results=utf8", $my_connect);
mysql_query("SET collation_connection=utf8_general_ci", $my_connect);
mysql_query("SET NAMES 'utf8'", $my_connect);
?>