<?php

$msg ="hi admin \n Mr/Ms ".$_REQUEST['wiz_name'];
$msg.="having email  ".$_REQUEST['wiz_email'];
$msg.="\n having Mobile  ".$_REQUEST['wiz_mobile'];
$msg.="\n having Company  ".$_REQUEST['wiz_company'];
$msg.="\n having Location  ".$_REQUEST['wiz_location'];
$msg.="\n looking  No of days  ".$_REQUEST['wiz_days'];
$msg.="\n Participants per room  ".$_REQUEST['wiz_pr'];
$msg.="\n Computer Required ".$_REQUEST['wiz_computer'];
$msg.="\n having Ram  ".$_REQUEST['wiz_ram'];
$msg.="\n having cpu  ".$_REQUEST['wiz_cpu'];
$msg.="\n having speed  ".$_REQUEST['wiz_speed'];

$msg.="\n having lunch  ".$_REQUEST['wiz_lunch'];


$headers = 'From: '.$_REQUEST['wiz_email']."\r\n".
 
'Reply-To: '.$_REQUEST['wiz_email']."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
//mail("schumi.offi2124@gmail.com", "Contact from ".$_REQUEST['wiz_email'], $msg, $headers); 
 
mail("solutions@itstraining.in", "Contact from ".$_REQUEST['wiz_email'], $msg, $headers); 
mail("shomo@istraining.in", "Contact from ".$_REQUEST['wiz_email'], $msg, $headers); 
?>
Thanks we will contact u soon.
