<?php
//if "email" variable is filled out, send email
  if (isset($_REQUEST['email']))  {	  
$to = 'banga.ojasvi9104@gmail.com';
$subject = $_REQUEST['subject'] ;
$comment = $_REQUEST['comment'] ;
$header = "From: noreply@example.com\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 

echo mail('banga.ojasvi9104@gmail.com', $subject, $comment, $header);
  
//Email information
 /* $admin_email = "banga.ojasvi9104@gmail.com";
  $email = $_REQUEST['email'];
  $subject = $_REQUEST['subject'];
  $comment = $_REQUEST['comment'];*/
  
  //send email
 // mail($admin_email, $subject, $comment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
?>
<?php
  }
?> 