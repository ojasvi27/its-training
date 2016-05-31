<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
$logval=$api_obj->logger();
if($logval==false){}else{$_REQUEST['q']=$logval;}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 

<?php $api_obj->print_header_for_seo('search',"");?>
<?php  include('includes/for_css_js.php');?>


</head> 

<body>

<?php  include('includes/header.php');?>
<section>
<div class="container-fluid contentos">
<div class="row">
<div class="clearfix"><br /><br /></div>
<ol class="breadcrumb">
  <li><a href="http://itstraining.in/index.php">Home</a></li>
  <li class="active"><a href="http://itstraining.in/search.php">Search</a></li>
 
</ol>
<div class="container">

<div class="col-lg-12">
<form class="well" action="search.php" method="get">
<div class="row">
<div class="col-lg-6">

              <div class="col-md-10"> <input type="text" class="form-control col-md-12" value="<?php echo $_REQUEST['q']; ?>" placeholder="Search A Course" data-provide=" " name="q" id="search_c"/></div>
              
              <div class="col-md-2"><input type="submit" class="btn btn-primary" value="Search" /></div>
              </div><br />

  </div>
  </div>
  </form>

<?php 
if($_REQUEST['q']!=""){
		if($api_obj->search($_REQUEST['q'])==true){
		
		}else{
			echo "
			
			<h3>Your search - ".$_REQUEST['q']." - did not match any documents.</h3><br>
			
			Suggestions:<br><br>
			
			Make sure that all words are spelled correctly.<br>
			Try different keywords.<br>
			Try more general keywords.<br>
			Try fewer keywords.<br>
			
			";
			
		
		
		}
	
	}
 ?>

 
</div>  
  
  
  
  
  
</div>
</div>
</section>
<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
 
</body>
</html>