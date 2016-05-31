<?php 
error_reporting(0); 
include('dbpath.php'); 
session_start();
ob_start();
 $u_email=$_POST["email"];
 $course=$_POST["course"];
 $name=$_POST["name"];
 $subject=$_POST["subject"];
 $name=$_POST["name"];
 $mobile=$_POST["mobile"];
 $cname=$_POST["cname"];
 $emp_id=$_POST["emp_id"];
 $attempt=$_POST["attempt"];
$wrong1=0;
$right1=0;
$na=0;	
$_SESSION['member']=$username;
$rr="select * from result_summery order by id desc";
$rrr = mysql_query($rr);
$rrrr=mysql_fetch_array($rrr);
$last=$rrrr["id"]+1;
  $sql="select * from question_paper  where course='". $course ."' and qid='".$_SESSION["qid"]."'";
  $result1 = mysql_query($sql);
$result = mysql_query($sql);
if (!mysql_num_rows($result1))
	{  echo "<div align=center><b><br><br><br>No Examination was attempted</div>";} 
 else
	 { $i=0;
	 $a = mysql_fetch_array($result);
	 $qemail=$a["email_id"];
 		$q=explode(",",$a["question"]);
		foreach ($q as $key => $value)
		{	$i=$i+1;
			if(trim($value))
			{
			 $v=trim($value);
			  $qt="select * from question_bank where id= '$v'";
			  $data=mysql_query($qt);
 			while($row=mysql_fetch_array($data))
			{ 
 			  $rname=$row['id'];
		  $rname1="question".$i;
		  $answer= $_REQUEST[$rname1];
 			  $strsql=("INSERT INTO result (username, question_id, course, answer,summery_id) 
			 VALUES ('$u_email', '$rname', '$course', '$answer','$last')");
			 $result1 = mysql_query($strsql);			 
			if($answer==$row['answer'])
			{ $right1++;			}
			else
			{
				if($answer=='F')
				{ $na++;}
				else
				{
				$wrong1++;			}
			} 
		 }//while row
		 
		 }//if trim
		 
		 }//foreach
		 //}//while a
			  
	///echo "<br>wrong:".$wrong1;
	///echo "<br>right:".$right1;
	$r=$right1;
	$w=$wrong1;
///	echo "<br>NA:".$na;
 			$t=$wrong1+$right1+$na;
 			$p=round(($right1*100)/$t);
			$d=date("Y-m-d");
$strsql1=("INSERT INTO result_summery (mid,name,mobile,cname,emp_id,username, date, course, total_question, correct_answer, wrong_answer, percent_result,attempt) 
			VALUES ('".$_SESSION["mid"]."','$name','$mobile','$cname','$emp_id','$u_email', '$d', '$course','$t', '$right1','$wrong1', '$p','$attempt')");
 		 $result2 = mysql_query($strsql1);			
//header("location: attempt_trial_examination3.php?t=".$t."&r=".$right1."&w=".$wrong1."&p=".$p); 
$send_mail=$u_email.",";
/*if($qemail)
{
$send_mail.=$qemail.",";
}*/
//$send_mail.="design@rpgwebsolutions.com";
$attem=$r+$w;
$unattemp=$t-($r+$w);
//$send_mail.="webdevelopment@rpgwebsolutions.com";
 $to_email=$send_mail;
 //$email = "info@delhiproperty.org";
  $subject = " online Quiz result of  itstraining.in";
$message="
<html>
<head></head>
<body>
<table width='95%' border='1' align='left' cellpadding='2' cellspacing='0'>
              <tr bgcolor='#BFD5EA'> 
                <td colspan='2'> <div align='center'><font size='2' face='Verdana, Arial, Helvetica, sans-serif'><strong>online Quiz result of  itstraining.in. Details are following.  </strong></font></div></td>
              </tr>
			   <tr bgcolor='#FEFDD6'> 
                <td><div align='right'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Course :</font></strong></div></td>
                <td width='52%' valign='middle'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$course."</font></strong></td>
              </tr>
			  <tr bgcolor='#FEFDD6'> 
                <td><div align='right'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>Name :</font></strong></div></td>
                <td width='52%' valign='middle'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$name."</font></strong></td>
              </tr>
              <tr bgcolor='#FEFDD6'> 
                <td><div align='right'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>No 
                    of Questions :</font></strong></div></td>
                <td width='52%' valign='middle'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$t."</font></strong></td>
              </tr>
              <tr bgcolor='#FEFDD6'> 
                <td width='48%'> <div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Attempted 
                    :</strong> &nbsp;</font></div></td>
                <td valign='middle'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$attem."</font></strong></td>
              </tr>
              <tr bgcolor='#FEFDD6'> 
                <td> <div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Correct&nbsp;:&nbsp;</strong></font></div></td>
                <td><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$r." 
                  </font></strong></td>
              </tr>
              <tr bgcolor='#FEFDD6'> 
                <td> <div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Incorrect&nbsp;:&nbsp;</strong></font></div></td>
                <td><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$w."</font></strong> 
                  </font></td>
              </tr>
              <tr bgcolor='#FEFDD6'> 
                <td> <div align='right'><font size='1' face='Verdana, Arial, Helvetica, sans-serif'><strong>Unattempted 
                    &nbsp;:&nbsp;</strong></font></div></td>
                <td><strong><font size='1' face='Verdana, Arial, Helvetica, sans-serif'>".$unattemp." 
                  </font></strong></td>
              </tr>
            </table>
            </body>
            </html>";



   //echo $message;
//$header="From: $u_email";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From: $u_email";
$message.="Dated:";
$headers.="\r\nCc: saurabh.d@itstraining.in,himanshu.chaudhary@itstraining.in";
//$headers.="\r\nBcc: himanshu.chaudhary@itstraining.in\r\n\n";
mail($to_email, $subject, $message,$headers);

	 }?><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td colspan="3"> <div align="center">
        <p><font color="#FF0000" size="4" face="Verdana, Arial, Helvetica, sans-serif"> Examination 
          Results</font></p>
        <p><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Course 
          : <?php echo $course; ?> </strong></font></p>
      </div>
      <div align="right"><font color="#FF0000"> </font><font size="2" face="Arial, Helvetica, sans-serif"> 
        </font></div></td>
  </tr>
  <tr> 
    <td width="33%"><div align="center"><strong> &nbsp;</strong></div></td>
    <td width="34%"><div align="center"></div></td>
    <td width="33%"><div align="center"><strong></strong></div></td>
  </tr>
</table>
<TABLE WIDTH=100% BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
  <TR> 
    <TD width="21"> <IMG SRC="images/test1_01.jpg" WIDTH=21 HEIGHT=19 ALT=""></TD>
    <TD width="944" background="images/test1_02.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    </TD>
    <TD width="28"> <IMG SRC="images/test1_03.jpg" WIDTH=28 HEIGHT=19 ALT=""></TD>
  </TR>
  <TR> 
    <TD background="images/test1_04.jpg">&nbsp; </TD>
    <TD> <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="47%" rowspan="2" valign="top"><table width="95%" border="1" align="left" cellpadding="2" cellspacing="0">
              <tr bgcolor="#BFD5EA"> 
                <td colspan="2"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Test 
                    Performance </strong></font></div></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td><div align="right"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">No 
                    of Questions :</font></strong></div></td>
                <td width="52%" valign="middle"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $t; ?></font></strong></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td width="48%"> <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Attempted 
                    :</strong> &nbsp;</font></div></td>
                <td valign="middle"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $r+$w; ?></font></strong></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td> <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Correct&nbsp;:&nbsp;</strong></font></div></td>
                <td><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php  echo $r; ?> 
                  </font></strong></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td> <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Incorrect&nbsp;:&nbsp;</strong></font></div></td>
                <td><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $w; ?></font></strong> 
                  </font></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td> <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Unattempted 
                    &nbsp;:&nbsp;</strong></font></div></td>
                <td><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $t-($r+$w)?> 
                  </font></strong></td>
              </tr>
              <tr bgcolor="#BFD5EA"> 
                <td colspan="2"> <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Net 
                    Score &nbsp;:&nbsp;<?php echo (($r*100)/$t)?>%<font size="1" face="Verdana, Arial, Helvetica, sans-serif"></font></strong></font></div></td>
              </tr>
            </table></td>
          <td width="53%" valign="top"><table width="67%" border="1" align="right" cellpadding="4" cellspacing="0">
              <tr bgcolor="#BFD5EA"> 
                <td colspan="2"> <div align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Summary 
                    of Results</strong></font></div></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td colspan="2"> <div align="center"><font color="#006600" size="2" face="Arial, Helvetica, sans-serif"><strong><font face="Verdana, Arial, Helvetica, sans-serif"><?php echo round(($r*100)/$t)?>% 
                    Correct</font></strong></font><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                    of Total Question </font></div></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td width="31%"> <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    Correct&nbsp;</font></div></td>
                <td valign="middle"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="7%"><table cellspacing="0" cellpadding="0" height="10" bordercolor="#000000" width="<?php echo round(($r*100)/$t)?>">
                          <tr> 
                            <td bgcolor="#006633"></td>
                          </tr>
                        </table></td>
                      <td width="93%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo round(($r*100)/$t)?>%</font></td>
                    </tr>
                  </table></td>
              </tr>
              <tr bgcolor="#FEFDD6"> 
                <td> <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
                    Incorrect&nbsp;</font></div></td>
                <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                      <td width="7%"><table cellspacing="0" cellpadding="0" height="10" bordercolor="#000000" width="<?php echo round(($w*100)/$t)?>">
                          <tr> 
                            <td bgcolor="#ff0000"></td>
                          </tr>
                        </table></td>
                      <td width="93%"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><?php echo round(($w*100)/$t)?>%</font></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td valign="top">&nbsp;</td>
        </tr>
        <tr> 
          <td colspan="2">&nbsp;</td>
        </tr>
      </table></TD>
    <TD background="images/test1_06.jpg">&nbsp; </TD>
  </TR>
  <TR> 
    <TD> <IMG SRC="images/test1_07.jpg" WIDTH=21 HEIGHT=27 ALT=""></TD>
    <TD width="944" background="images/test1_02.jpg">&nbsp; </TD>
    <TD> <IMG SRC="images/test1_09.jpg" WIDTH=28 HEIGHT=27 ALT=""></TD>
  </TR>
</TABLE>
<div align="center"> 
  <form name="form1" method="post" action="">
    <?php 
  	
$sql="select * from question_paper where qid='$paper_id'";

$resulta = mysql_query($sql);	 
		 
		 while($a = mysql_fetch_array($resulta))
  { 
 
$i=0;
  $id=$a["qid"];
	$q=explode(",",$a["question"]);
	foreach ($q as $key => $value)
	{ $i++;
	$rname="question".$i;
 	if(trim($value)){
	 $v=trim($value);
 	  $qt="select * from question_bank where id= '$v'";
	  $data=mysql_query($qt);
 	while($row1=mysql_fetch_array($data))
	{  
 		 $rname=$row1['id'];
		  $rname1="question".$i;
		  $answer= $_POST[$rname1]; 
  ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="3">
      <tr valign="top"> 
        <td width="3%" height="23"><strong></strong></td>
        <td width="13%"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#ff0000"> 
          <?php if($answer==$row1['answer'])
			  { ?>
          <img src="images/correct.gif" width="80" height="13"> 
          <?php }else
			  { ?>
          <img src="images/incorrect.gif" width="80" height="13"> 
          <?php } ?>
          </font></strong></td>
        <td width="84%"> <strong><font color="#ff0000" size="2" face="Arial, Helvetica, sans-serif"> 
          <?php echo $row1['question'] ?> </font></strong> </td>
      </tr>
      <?php if($answer!='F')
	   {
	   ?>
      <tr> 
        <td colspan="2"><strong></strong></td>
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Your 
          Answer : 
          <?php switch($answer){
			  case "A":  echo $row1['option1']; break; 
			  case "B":  echo $row1["option2"]; break; 
			   case "C": echo $row1['option3']; break;
			    case "D": echo $row1['option4']; break; }?>
          </strong> </font></td>
      </tr>
      <?php }else 
	   {
	   ?>
      <tr> 
        <td colspan="2"><strong></strong></td>
        <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Your 
          Answer :</strong> You didn't attempted this question</font></td>
      </tr>
      <?php }
	  
	   ?>
      <tr> 
        <td colspan="2"><strong></strong></td>
        <td><font color="#000000"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Correct 
          Answer : 
          <?php switch($row1['answer']){
			  case "A":  echo $row1['option1']; break; 
			  case "B":  echo $row1["option2"]; break; 
			   case "C": echo $row1['option3']; break;
			    case "D": echo $row1['option4']; break; }?>
          </strong></font></font></td>
      </tr>
    </table>
    <?php }}}} ?>
  </form>
  <p>&nbsp;</p>
  <p><b><font face="Bookman Old Style" size="2"><a href="javascript:window.close()">Click 
    Here to Close</a></font></b> &nbsp;</p>
  <p><font color="#666666"><strong></strong></font></p>
</div>