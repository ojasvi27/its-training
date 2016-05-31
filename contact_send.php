<?php
@session_start();error_reporting("Error");


$msg ="hi admin \n Mr/Ms ".$_REQUEST['name'];
$msg.="having email  ".$_REQUEST['email'];
$msg.="\n having Mobile  ".$_REQUEST['mobile'];
$msg.="\n having subject".$_REQUEST['subject'];
$msg.="\n having message".$_REQUEST['message'];

$headers = 'From: '.$_REQUEST['email']."\r\n".
 
'Reply-To: '.$_REQUEST['email']."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
//mail("schumi.offi2124@gmail.com", "Contact from ".$_REQUEST['email'], $msg, $headers); 
 
mail("solutions@itstraining.in", "Contact from ".$_REQUEST['email'], $msg, $headers); 
mail("shomo@istraining.in", "Contact from ".$_REQUEST['email'], $msg, $headers); 
echo "Thanks we will contact u soon.";
	
	
	
?>
