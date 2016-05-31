<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"GumXl1aQibl0fn", domain:"itstraining.in",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=GumXl1aQibl0fn" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->  

<?php $api_obj->print_header_for_seo('city',$_REQUEST['id']);?>
<?php  include('includes/for_css_js.php');?>
</head> 


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
  <li><a href="city.php">Cities</a></li>
  <li class="active"><?php echo $api_data['1']['6'] ?></li>
</ol>
<div class="container">
<?php if($_REQUEST['id']!=""){

$api_obj->get_city($_REQUEST['id']); }?>

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


<div class="modal fade" id="myModal_gall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
       <img src=""  width="100%"  id="mysrc"/>
      </div>
      <div class="modal-footer">
        <h5 class="modal-title" id="myModalbottom">Modal title</h5>
      </div>
    </div>
  </div>
</div>


<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
</body>
</html>