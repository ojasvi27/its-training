<?php
session_start();
error_reporting("Error");

	//**************** include classes *************************
	require_once("global.config.php");
	require_once("database.inc.php");
	require_once("class.display.php");
	require_once("class.Authentication.php");
	require_once("ClsJSFormValidation.cls.php");
	require_once("class.FormValidation.php");
	require_once("class.Notification.php");
	require_once("class.user.php");
	require_once("liveX/PHPLiveX.php");
	
	
	//**************** Database Configuration online development server ****************
//	define("DATABASE_HOST","118.139.168.182",true);
//	define("DATABASE_PORT","3306",true);
//	define("DATABASE_USER","test2124",true);
//	define("DATABASE_PASSWORD","TTe@st123@#",true);
//	define("DATABASE_NAME","test2124",true);
	
	
	
   
   define("DATABASE_HOST","localhost",true);
	define("DATABASE_PORT","3306",true);
	define("DATABASE_USER","itstrain_nuser",true);
	define("DATABASE_PASSWORD","MRp}^MX{8#{T",true);
	define("DATABASE_NAME","itstrain_newdb",true);
	
	
?>