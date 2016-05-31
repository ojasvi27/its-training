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
<head> 

<?php $api_obj->print_header_for_seo('topic',$_REQUEST['topicid']);?>
<?php  include('includes/for_css_js.php');?>


</head> 

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
  <li><a href="index.php">Home</a></li>
  <li><a href="topics.php">Topics</a></li>
  <li class="active"><?php echo $api_data['1']['6'] ?></li>
</ol>
<div class="container">
<?php $api_obj->get_category_for_topic_page($_REQUEST['topicid']);?>
<h2><?php echo $api_data['1']['6'] ?></h2>
<div class="col-lg-12">
<ul class="class="list-group">

  <?php 
  for($i=0;$i<count ($api_data);$i++){
?>
<li class="list-group-item"> <?php echo $api_data[$i]['name']; ?>
  
  <a class="btn btn-danger btn-sm  red-btn  pull-right" href="course.php?id=<?php echo $api_data[$i]['id']; ?>"> View Course</a>
  
 </li> 
  
<?php
	  }
  
  ?>
  
  
  </ul>
  </div>
  
</div>  
  
  
  
  
  
</div>
</div>
</section>
<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
 
</body>
</html>