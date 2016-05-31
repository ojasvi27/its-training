<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php  include('includes/for_css_js.php');?>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">var switchTo5x=true;</script> 
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script> 
<script type="text/javascript">stLight.options({publisher: "f635236d-1a41-4cf9-932c-7d98d23857c4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php  include('includes/header.php');?>

<div class="container">
  <h2>Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>





<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
</body>
</html>



