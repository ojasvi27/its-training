<?php
error_reporting(0); 
ob_start();
 session_start();
include('dbpath.php'); 
$course=$_REQUEST["course"];
//$class=$_REQUEST["class"];
 if(!isset($_REQUEST["email"]))
 {
   header("Location:index.php?err=35");
 }
   $email=trim(mysql_real_escape_string($_REQUEST["email"]));
   $name=trim(mysql_real_escape_string($_REQUEST["name"]));
   $mobile=trim(mysql_real_escape_string($_REQUEST["mobile"]));
   $cname=trim(mysql_real_escape_string($_REQUEST["cname"]));
   $course=trim(mysql_real_escape_string($_REQUEST["course"]));
   $emp_id=trim(mysql_real_escape_string($_REQUEST["emp_id"]));
  date_default_timezone_set('Asia/Calcutta'); 
	 $date = date('Y-m-d', time());
   $sql69="select * from test_member where email='".$email."' and course='".$course."' and emp_id='".$emp_id."' and date='$date'";
	$qry69=mysql_query($sql69);
	  $count1=mysql_num_rows($qry69);
	  $row69=mysql_fetch_array(mysql_query($sql69));
	  $mid=$row69["oid"];
 	if($count1>0)
	{
		//echo $count1;
		
		if($row69["attempt"]>=2)
		{
			header("location:attempt_online_test.php?msg=1");
		}
		else
		{
		$count2=$row69["attempt"]+1;
	 	$msg="Warning: This is your  $count2 Attempt!";
		mysql_query("update test_member set attempt=attempt+1 where email='".$email."' and course='".$course."' and emp_id='".$emp_id."' and date='$date' ");
   $_SESSION["email"]=$email;
   $_SESSION["mid"]=$mid;
   $username=$row["username"];
		}
	}
	else
	{
		$sql70="insert into test_member(emp_id,name,email,phone,cname,course,attempt,date)values('$emp_id','$name','$email','$mobile','$cname','$course','1','$date')";
		$qry70=mysql_query($sql70);
		$mid=mysql_insert_id();
		 $_SESSION["email"]=$email;
		 $_SESSION["mid"]=$mid;
		 $count2=1;
 	}
   $sql="select * from question_paper where course='". $course ."' and id=1  ORDER BY RAND() LIMIT 0,1";
$result1 = mysql_query($sql);
$result = mysql_query($sql);
$d = mysql_fetch_array($result1);
$qid=$d["qid"];
$_SESSION["qid"]=$qid;
$i=0;
 ?>
<html>
<head>
<link rel="icon" type="images/ico" href="images/favicon.ico">
<title>ONLINE EXAMINATION</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <script>
 var isNS = (navigator.appName == "Netscape") ? 1 : 0;
  if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
  function mischandler(){
   return false;
 }
  function mousehandler(e){
 	var myevent = (isNS) ? e : event;
 	var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
 }

 document.oncontextmenu = mischandler;
 document.onmousedown = mousehandler;
 document.onmouseup = mousehandler;
  </script>
 <link href="css/stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="RilTimer()">
 <form name="theTimer" method="post" action="attempt_online_test2.php"  onsubmit= "return atsubmit()" >
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center"><strong> &nbsp;</strong></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"><strong></strong></div></td>
    </tr>
    <tr> 
      <td width="28%">&nbsp;</td>
      <td width="41%"><div align="center"><font size="4" face="Verdana, Arial, Helvetica, sans-serif"><strong>Course 
      : <?php echo $course; ?></strong></font></div></td>
      <td width="31%"><div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Time 
          Left :</font><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif">Min. 
          <input name="min" type="text" id="min" size="5">
          Sec. 
          <input type=text name="theTime" size=5 >
          </font><font color="#FF0000"> </font></div></td>
    </tr>
    <tr> 
      <td><div align="center"><strong> &nbsp;</strong></div></td>
      <td><div align="center"><strong> 
          <input type="hidden" name="course" value="<?php echo $_POST["course"]; ?>">
           <input type="hidden" name="email" value="<?php echo $_POST["email"]; ?>">
           <input type="hidden" name="name" value="<?php echo $_POST["name"]; ?>">
           <input type="hidden" name="mobile" value="<?php echo $_POST["mobile"]; ?>">
           <input type="hidden" name="cname" value="<?php echo $_POST["cname"];?>">
           <input type="hidden" name="emp_id" value="<?php echo $_POST["emp_id"]; ?>">
           <input type="hidden" name="attempt" value="<?php echo $count2; ?>">
            </strong></div></td>
      <td><div align="center"><strong></strong></div></td>
    </tr>
    <tr>
      <td colspan="3" align="center" class="bullet" style="text-decoration:blink;"><?php echo $msg; ?></td>
    </tr>
  </table>
 <?php  if (!mysql_num_rows($result))
			 {  echo "<div align=center><b><br><br><br>There is no question paper for your course. <br>Soon we will update. Try later</div>";} 
			 else
			  { ?>
   <TABLE WIDTH=100% BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
    <TR> 
      <TD width="25" height="19"> <IMG SRC="images/test1_01.jpg" WIDTH=25 HEIGHT=19 ALT=""></TD>
      <TD width="1250" background="images/test1_02.jpg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      </TD>
      <TD width="38"> <IMG SRC="images/test1_03.jpg" WIDTH=28 HEIGHT=19 ALT=""></TD>
    </TR>
    <TR> 
      <TD height="403" background="images/test1_04.jpg">&nbsp; </TD>
      <TD> 
            <?php
				
while($a = mysql_fetch_array($result))
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
 	while($row=mysql_fetch_array($data))
	{ 
  ?>       
        <TABLE WIDTH=68% height="261" BORDER=0 align="center" CELLPADDING=0 CELLSPACING=0>
          <TR> 
            <TD width="17" height="15"> <IMG SRC="images/newbox_01.jpg" WIDTH=19 HEIGHT=15 ALT=""></TD>
            <TD width="810" background="images/newbox_02.jpg"> <IMG SRC="images/newbox_02.jpg" WIDTH=158 HEIGHT=15 ALT=""></TD>
            <TD width="18"> <IMG SRC="images/newbox_03.jpg" WIDTH=19 HEIGHT=15 ALT=""></TD>
          </TR>
          <TR> 
            <TD height="230" background="images/newbox_04.jpg"> <IMG SRC="images/newbox_04.jpg" WIDTH=15 HEIGHT=107 ALT=""></TD>
            <TD bgcolor="DADEE9"><table width="100%" border="0" align="center" cellpadding="4" cellspacing="0">
                <tr> 
                  <td width="4%" height="34" valign="top"> <div align="center"> 
                      <table width="100%" height="27" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                          <td background="images/qno_image.gif"><div align="center"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $i ?></font></strong></div></td>
                        </tr>
                      </table>
                    </div></td>
                  <td colspan="2"><strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row["question"]; ?> 
                   </font></strong></td>
                </tr>
               
                <tr> 
                  <td>&nbsp;</td>
                  <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input type="radio" name="<?php echo $rname ?>" value="A">
                    <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['option1'] ?></font></strong> </font><strong><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">
                  </font></strong></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input type="radio" name="<?php echo $rname ?>" value="B">
                    <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['option2'] ?></font></strong> </font></td>
                </tr>
              
                <tr> 
                  <td>&nbsp;</td>
                  <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input type="radio" name="<?php echo $rname ?>" value="C">
                    <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['option3'] ?></font></strong> </font></td>
                </tr>
               
                <tr> 
                  <td>&nbsp;</td>
                  <td colspan="2"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                    <input type="radio" name="<?php echo $rname ?>" value="D">
                    <strong><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php echo $row['option4'] ?></font></strong> </font></td>
                </tr>
                
				
                <tr> 
                  <td>&nbsp;</td>
                  <td width="96%"> <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"> 
                      <input type="radio" name="<?php echo $rname ?>" value="F">
                      Not Attempting
                      <input type="hidden" name="counter" value="<?php echo $rname ?>">
                  </font></div></td>
                </tr>
              </table> </TD>
            <TD background="images/newbox_06.jpg"> <IMG SRC="images/newbox_06.jpg" WIDTH=19 HEIGHT=107 ALT=""></TD>
          </TR>
          <TR> 
            <TD> <IMG SRC="images/newbox_07.jpg" WIDTH=19 HEIGHT=16 ALT=""></TD>
            <TD background="images/newbox_08.jpg"> <IMG SRC="images/newbox_08.jpg" WIDTH=158 HEIGHT=16 ALT=""></TD>
            <TD> <IMG SRC="images/newbox_09.jpg" WIDTH=19 HEIGHT=16 ALT=""></TD>
          </TR>
        </TABLE>
         <?php
		// $i++;
  }}}}
?><br>

                
        <p align="center"> 
          <input type="submit" name="Submit" value="Exam Completed">
        </p>
      <p>&nbsp;</p></TD>
      <TD background="images/test1_06.jpg">&nbsp; </TD>
    </TR>
    <TR> 
      <TD> <IMG SRC="images/test1_07.jpg" WIDTH=21 HEIGHT=27 ALT=""></TD>
      <TD background="images/test1_02.jpg">&nbsp; </TD>
      <TD> <IMG SRC="images/test1_09.jpg" WIDTH=28 HEIGHT=27 ALT=""></TD>
    </TR>
	<?php }?>
  </TABLE>
</form>

<p align="center"><b><font face="Bookman Old Style" size="2"><a href="javascript:window.close()">Click 
  Here to Close</a></font></b></p>
<script language="JavaScript">
var timeE=1;
var tStart  = 20000;
var seconds=60;
var minutes=39;
function RilTimer() 
	{

	  		seconds--;
  				if (seconds<0) 
  				{
			  	minutes--;  			
   					seconds=60;
					if (minutes>=0)
					{ RilTimer(); }
					else
   			   		{ //alert("I am submiting form");
					 document.theTimer.submit();}
   			    }
 			    
				else
				{
						document.theTimer.min.value =  minutes;
						document.theTimer.theTime.value =  seconds;			
						setTimeout("RilTimer()", 1000);		
	 				
	 			}
			
  
	}

var mymessage = "Potected  page. Right Click is not allowed!";

function rilovclickcheck(keyp){
 if (navigator.appName == "Netscape" && keyp.which == 3) {
    alert(mymessage);
    return false;
  }
  if (navigator.appVersion.indexOf("MSIE") != -1 && event.button == 2) {
    alert(mymessage);
   return false;
  }
}
document.onmousedown = rilovclickcheck;
function atsubmit()
{
var j=0;
timeE=100;
m=false;
x=document.theTimer.counter.length;
for(k=1;k<=x;k++)
{var radioEmpty=true;
box="document.theTimer.question"+k;
y=eval(box);

for(j=0;j<y.length;j++){
if (y[j].checked){
radioEmpty=false;}}

if(radioEmpty){
window.alert("Please specify all Answers");
return false;
}
}
	
//return true;
}
</script>
</body>
</html>