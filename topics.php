<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
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
  <li><a href="index.php">Home</a></li>
  <li class="active"><a href="topics.php">Topics</a></li>
 </ol>
  <div class="container">
              <form action="search.php" method="get">
              <div class="col-md-10"> <input type="text" class="form-control input-lg col-md-12 col-xs-12" name="q" placeholder="Find Courses,e.g. Vm ware, Java, Digital Marketing" data-provide=" " id="search_c"/></div>
              
              <div class="col-md-2"><input type="submit" class="btn btn-danger btn-lg " value="Search" /></div>
              </form>
              </div>
             </div>
             <br />
<div class="container">
<?php $api_obj->get_cat_forpage();
 ?>
  
  
  
  
  
</div>  
  
  
  
  
  
</div>
</div>
</section>
<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
 
</body>
</html>