﻿<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 

<?php $api_obj->print_header_for_seo('city',$_REQUEST['id']);?>
<?php  include('includes/for_css_js.php');?>
</head> 


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>

<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>

<script type="text/javascript">stLight.options({publisher: "f635236d-1a41-4cf9-932c-7d98d23857c4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>



<?php  include('includes/header.php');?>
</br>
</br>
</br>
<section id="about">
  <?php
  extract($_REQUEST);
  if($submit=="Submit")
		{
		$api_obj->AddNews('server');
		}
		else
		{
		$api_obj->AddNews('local');	
		}

  
  
  
  
   ?>
</section>


<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
<<script>
$( document ).ready(function() {
  // Handler for .ready() called.
  $('.datepicker').datepicker();
});
</script>
</body>
</html>