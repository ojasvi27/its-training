<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
if($_REQUEST['topicid']!=""){
$api_data=$api_obj->get_courses_by_category($_REQUEST['topicid']);

	}else{
		  include('404.html');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  include('includes/for_css_js.php');?>

<body>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "f635236d-1a41-4cf9-932c-7d98d23857c4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?php  include('includes/header.php');?>
<section>
<div class="container-fluid contentos">
<div class="row">
<div class="clearfix"><br /><br /></div>
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Topics</a></li>
  <li class="active"><?php echo $api_data['1']['6'] ?></li>
</ol>
<div class="container">

<h2><?php echo $api_data['1']['6'] ?></h2>

  <?php 
  for($i=0;$i<count ($api_data);$i++){
?>
<div class="col-md-3">
<div class="panel panel-default">
  <div class="panel-heading"><h4><?php echo $api_data[$i]['name']; ?></h4></div>
  <div class="panel-body">
    <?php echo $api_data[$i]['name']; ?>
   <h6>hours: <?php echo $api_data[$i]['name']; ?></h6>
  <span>Certification: <?php if($api_data[$i]['is_cert']){ echo 'Yes';}else{echo "No";} ?></span>
  <div class="clearfix"></div>
  <button class="btn btn-danger btn-sm online_assment red-btn "> View Course</button>
  
  </div>
</div>

</div>

<?php
	  }
  
  ?>
  
  
  
  
  
</div>  
  
  
  
  
  
</div>
</div>
</section>
<?php  include('includes/footer.php');?>
</body>
</html>