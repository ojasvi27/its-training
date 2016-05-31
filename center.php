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
  <li><a href="center.php">Training Rooms</a></li>
  <li class="active"><?php echo $api_data['1']['6'] ?></li>
</ol>
<div class="container">
<?php if($_REQUEST['cid']!=""){

$api_obj->get_center($_REQUEST['cid']); }?>

</div>  
  
  
  
  
  
</div>
</div>
</section>


<div id="tr_form" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <?php  include('includes/training_room_form.php');?>
    </div>
  </div>
</div>



<?php  include('includes/footer.php');?>
</body>
</html>