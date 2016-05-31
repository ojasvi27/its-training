<?php require_once("class/config.inc.php"); ?>
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
<script type="text/javascript">stLight.options({publisher: "f635236d-1a41-4cf9-932c-7d98d23857c4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

<?php  include('includes/header.php');?>

<section id="about">
  <div class="container">
    <div class="row brief"> 
      
      <!-- BRIEF IMAGE -->
      <div style="visibility: visible; animation-duration: 1.75s; animation-name: fadeInLeft;" class="col-md-6 pull-right wow fadeInLeft animated" data-wow-offset="20" data-wow-duration="1.75s">
        <div class="brief-image-right"> <img src="images/about-us.jpg" alt=""> </div>
      </div>
      
      <!-- BRIEF HEADING -->
      <div style="visibility: visible; animation-duration: 1.75s; animation-name: fadeInRight;" class="col-md-6 content-section pull-left wow fadeInRight animated" data-wow-offset="20" data-wow-duration="1.75s">
        <h4 class="dark-text"> About Us</h4>
        <div class="colored-line-left"> </div>
        <p align="justify" style="color:#000;">Innovative Technology Solutions, heading towards global leading IT Training and Professional Skills development training and solution provider company. ITS in association with Software and Hardware devloper companies providing training and solutions to many large and small Enterprises across the Globe. ITS is preferred vendor for MNC's like HP, EMC and many more for providing Training Rooms and arranging Infrastrture for training needs in APAC / APJ region.

ITS is well known for adopting Innovation in training delivery and always updated with relevant content which is to be delivered by the excellent instructors. ITS is known to be most flexible in customization of content, delivery method at any time zone.<br/>

 
<h4 >Mission</h4><span align="justify" style="color:#000;">World's leading training provider by 2020.</span>
<h4 > Vision </h4><span align="justify"  style="color:#000;">Effective training Solutions for our customers to help them for their growth.</span><hr />
 
 
 
        
        <!-- FEATURE LIST -->
        <!--<div class="row">
          <div class="col-md-6 col-sm-6">
            <ul class="feature-list text-left">
              <li><span class="fa-lock red "></span> We care your businnes</li>
              <li><span class="fa-check red"></span> Skilled professionals</li>
              <li><span class="fa-paperclip red"></span> Lorem ipsum dolor</li>
            </ul>
          </div>
          <div class="col-md-6 col-sm-6">
            <ul class="feature-list text-left">
              <li><span class="fa-paperclip red"></span> Startup ipsum does</li>
              <li><span class="fa-adjust red"></span> Flexible schedule</li>
              <li><span class="fa-bookmark red"></span> Certified company</li>
            </ul>
          </div>
        </div>-->
      </div>
    </div>
  </div>
</section>


<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
</body>
</html>