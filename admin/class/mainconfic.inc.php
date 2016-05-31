<?php
	session_start();
	//**************** include classes *************************
	require_once("global.config.php");
	require_once("database.inc.php");
	require_once("class.display.php");
	require_once("class.Authentication.php");
	require_once("ClsJSFormValidation.cls.php");
	require_once("class.FormValidation.php");
	require_once("class.Notification.php");
	require_once("class.user.php");
	require_once("class.phpmailer.php");
	//require_once("liveX/PHPLiveX.php");

	
	
	//**************** Database Configuration local development server ****************
	define("DATABASE_HOST","localhost",true);
	define("DATABASE_PORT","3306",true);
	define("DATABASE_USER","root",true);
	define("DATABASE_PASSWORD","",true);
	define("DATABASE_NAME","tbx",true);
	
	//**************** Database Configuration online development server ****************
	/*define("DATABASE_HOST","mysql.kibostudios.es",true);
	define("DATABASE_PORT","3306",true);
	define("DATABASE_USER","hudson_holidays",true);
	define("DATABASE_PASSWORD","holidays",true);
	define("DATABASE_NAME","pre_hudson",true);*/
	
	
?>