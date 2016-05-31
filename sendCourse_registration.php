<?php
@session_start();error_reporting("Error");


$msg ="hi admin \n Mr/Ms ".$_REQUEST['rname'];
$msg.="having email  ".$_REQUEST['remail'];
$msg.="\n having Mobile  ".$_REQUEST['rmob'];
$msg.="\n having course name   ".$_REQUEST['rcourse'];

$headers = 'From: '.$_REQUEST['remail']."\r\n".
 
'Reply-To: '.$_REQUEST['remail']."\r\n" .
 
'X-Mailer: PHP/' . phpversion();

//mail("schumi.offi2124@gmail.com", "Contact from ".$_REQUEST['remail'], $msg, $headers); 
 
mail("solutions@itstraining.in", "Contact from ".$_REQUEST['remail'], $msg, $headers); 
mail("tarika@itstraining.in", "Contact from ".$_REQUEST['remail'], $msg, $headers); 
echo "Thanks we will contact u soon.";
	
	
	
?>
