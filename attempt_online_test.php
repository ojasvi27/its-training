<?php echo date("d-M-Y h:i:sa");?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="images/ico" href="images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<script src="js/jquery.validate.js"></script>
<script type="text/javascript" language="javascript">
$(document).ready(function(){
$("#form1").validate();
 });
 </script>
</head>

<body>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center"><img src="images/logo.jpg" width="752" height="121" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="style6"><marquee behavior="alternate" direction="right"> INNOVATIVE TECHNOLOGY SOLUTIONS ONLINE TEST</marquee></td>
  </tr>
  <tr>
    <td align="center"><form id="form1" name="form1" method="post" action="attempt_online_test1.php">
      <table width="50%" border="0" cellspacing="3" cellpadding="3">
      <tr><td colspan="2" class="style6"> </td></tr>
        <tr>
          <td width="29%" align="left" class="style6"> Name</td>
          <td width="71%" align="left"><input name="name" type="text" id="name" size="30" class="required" style="border:1px solid #ccc; padding:2px;" /></td>
        </tr>
        <tr>
          <td align="left" class="style6"> Email Id</td>
          <td align="left"><input name="email" type="text" id="email" size="30" class="required email" style="border:1px solid #ccc; padding:2px;" /></td>
        </tr>
        <tr>
          <td align="left" class="style6">Mobile Number</td>
          <td align="left"><input name="mobile" type="text" id="mobile" size="30" class="required number" maxlength="10" minlength="10" style="border:1px solid #ccc; padding:2px;" /></td>
        </tr>
        <tr>
          <td align="left" class="style6">Company Name</td>
          <td align="left"><input name="cname" type="text" id="cname" size="30" class="required" style="border:1px solid #ccc; padding:2px;" /></td>
        </tr>
        <tr>
          <td align="left" class="style6">Emp Id</td>
          <td align="left"><input name="emp_id" type="text" id="emp_id" size="30" class="required" style="border:1px solid #ccc; padding:2px;" /></td>
        </tr>
        <tr>
          <td align="left" class="style6">Select Course</td>
          <td align="left">
                    <select name="course" id="course" class="required" style="border:1px solid #ccc; padding:2px;">
          <option value="">--choose course--</option>
                    <option value=""></option>
                    <option value="Agile & Scrum">Agile & Scrum</option>
                    <option value="CCNA Pre Test">CCNA Pre Test</option>
                    <option value="Checkpoint R75">Checkpoint R75</option>
                    <option value="COLT HTML & CSS Post Test">COLT HTML & CSS Post Test</option>
                    <option value="COLT HTML & CSS Pre Test">COLT HTML & CSS Pre Test</option>
                    <option value="Excel - PreTest">Excel - PreTest</option>
                    <option value="HPSU-Feedback">HPSU-Feedback</option>
                    <option value="IT Governance Foundation based on COBIT 5.0">IT Governance Foundation based on COBIT 5.0</option>
                    <option value="ITIL Foundation">ITIL Foundation</option>
                    <option value="ITIL � 2011 Intermediate - Lifecycle � Continual Service Improvement">ITIL � 2011 Intermediate - Lifecycle � Continual Service Improvement</option>
                    <option value="ITIL � 2011 Intermediate - Lifecycle � Service Design">ITIL � 2011 Intermediate - Lifecycle � Service Design</option>
                    <option value="ITIL � 2011 Intermediate - Lifecycle � Service Strategy">ITIL � 2011 Intermediate - Lifecycle � Service Strategy</option>
                    <option value="ITIL � 2011 Intermediate - Lifecycle � Service Transition">ITIL � 2011 Intermediate - Lifecycle � Service Transition</option>
                    <option value="java">java</option>
                    <option value="JBoss Post Test">JBoss Post Test</option>
                    <option value="Managing Across Life Cycle (MALC)">Managing Across Life Cycle (MALC)</option>
                    <option value="MS Excel 2007 Post Test">MS Excel 2007 Post Test</option>
                    <option value="MS Projects Advance">MS Projects Advance</option>
                    <option value="MS Projects Basics">MS Projects Basics</option>
                    <option value="MS- Word Pretest">MS- Word Pretest</option>
                    <option value="Pre Test PL-SQL">Pre Test PL-SQL</option>
                    <option value="Prince 2">Prince 2</option>
                    <option value="Prince 2 Foundation">Prince 2 Foundation</option>
                    <option value="Prince 2 Practitioner">Prince 2 Practitioner</option>
                    <option value="Quick Test Professional 11.0">Quick Test Professional 11.0</option>
                    <option value="SQL/PL-SQL">SQL/PL-SQL</option>
                    <option value="Taraspan">Taraspan</option>
                    <option value="VBA-Excel Post Test">VBA-Excel Post Test</option>
                    <option value="VBA-Excel Pre Test">VBA-Excel Pre Test</option>
                    <option value="VM Ware">VM Ware</option>
                    <option value="Win 2012 Post Test">Win 2012 Post Test</option>
                    <option value="Win 2012 Pre Test">Win 2012 Pre Test</option>
                    </select></td>
        </tr>
        <tr>
          <td align="left" class="style6">&nbsp;</td>
          <td align="left"><input type="submit" name="button" id="button" value="Submit" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</body>
</html>
