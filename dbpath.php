<?php
error_reporting(0);  
ob_start();
session_start();
/*
//local
 $hostname_conn = "localhost";
$database_conn = "itc";
$username_conn = "root";
$password_conn = ""; 
$con = mysql_connect($hostname_conn, $username_conn, $password_conn) or die(mysql_error());
mysql_select_db($database_conn, $con) or die ("could not connect the database");
  //online
 */
$hostname_conn = "localhost";
$database_conn = "its";
$username_conn = "root";
$password_conn = ""; 
$conn = mysql_connect($hostname_conn, $username_conn, $password_conn) or die(mysql_error());
mysql_select_db($database_conn, $conn) or die ("could not connect the database");

?>