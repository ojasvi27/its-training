<?php
@session_start();error_reporting("Error");

	//**************** include classes *************************
	require_once("global.config.php");
	require_once("database.inc.php");
	require_once("database.inc.php");
	require_once("ClsJSFormValidation.cls.php");
	require_once("class.FormValidation.php");
	
	
	define("DATABASE_HOST","localhost",true);
	define("DATABASE_PORT","3306",true);
	define("DATABASE_USER","root",true);
	define("DATABASE_PASSWORD","",true);
	define("DATABASE_NAME","itstrain_newdb",true);
	
	//*************** Set Time Zone ***************************//
	
	date_default_timezone_set("Asia/Calcutta");                     
	
?>