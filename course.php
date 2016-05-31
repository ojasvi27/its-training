<?php require_once("class/config.inc.php"); ?>
<?php include('includes/common_functions.php'); ?>
<?php require_once("class/class.api.php"); 
$api_obj=new api();
if($_REQUEST['id']!=""){
$api_data=$api_obj->get_course_by_courseid($_REQUEST['id']);


	}else{
		  include('404.html');
	}
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

<?php $api_obj->print_header_for_seo('course',$_REQUEST['id']);?>
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
  
  
  
  <div class="col-lg-12">
  
                    <h2 class="well"><?php echo $api_data['name']; ?><br /><img src="http://itstraining.in/<?php echo $api_data['url']; ?>" width="100"                    />
                      </h2>
  
  </div>
  <div class="col-lg-12">
  
  
  
  <div  class="col-md-3">
                        <div class="list-group"> <a href="#" class="list-group-item " style="font-weight:bold;"> TRAININGS </a>
                         <a href="http://itstraining.in/search.php" class="list-group-item "> <i class="fa fa-angle-right"></i> Search for Courses</a>
                          <a href="http://itstraining.in/index.php#contact_form" class="list-group-item"><i class="fa fa-angle-right"></i> Email Us</a>
                           <a href="http://itstraining.in/#rooms_scroll" class="list-group-item"><i class="fa fa-angle-right"></i> Our Training Location</a> 
                         <a href="#" class="list-group-item  " style=" font-weight:bold; background: #81c77f; color:#fff;">BECOME <span style="text-transformation:uppercase;"><?php echo $api_data['name']; ?></span> EXPERT</a>
                        </div>
                    </div>
         
         
         <div class="col-lg-6">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#Brief" role="tab" data-toggle="tab">Brief</a></li>
                             <li role="presentation" ><a href="#prereq" role="tab" data-toggle="tab">Prerequsite</a></li>
                           
                            <li role="presentation"><a href="#Course" role="tab" data-toggle="tab">Course Content</a></li>
                            <li role="presentation"><a href="#Certification" role="tab" data-toggle="tab">Certification/Examination</a></li>
                        </ul>
                        <div class="col-lg-12 share" >
                         <span class='st_facebook_hcount' displayText='Facebook'></span>
                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                            <span class='st_linkedin_hcount' displayText='LinkedIn'></span>
                            <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                            <span class='st_email_hcount' displayText='Email'></span>

                        </div>
                        <div class="tab-content">
                           
                            <div role="tabpanel" class="tab-pane active" id="Brief">
							<?php echo $api_data['brief']; ?>
							
                                
                            </div>
                            <div role="tabpanel" class="tab-pane active" id="prereq">
							<?php echo $api_data['prereq']; ?>
							
                                
                            </div>
                            
                            <div role="tabpanel" class="tab-pane" id="Course">
							<?php echo $api_data['content']; ?>
							
                            </div>
                            <div role="tabpanel" class="tab-pane" id="Certification">
                            <?php echo $api_data['content_2']; ?>
							
							</div>
                        </div>
                        <!-- Tab panes -->

                    </div>           
                    
                  
                  
                  <div class="col-lg-3">
                 
                        <?php
						
						
						 $api_obj->left_bar($api_data['id'],$api_data['duration'],$api_data['method'],$api_data['id']);
 ?>
                    </div>
                  
                  
                  
                  
              
                  
                  
                  
                  
                    
  
            
        </div>
  
  
  
  
  
  
  
<?php // include('includes/comment_box.php');?>
  
  
  
  
  
  
  
  </div>
 </div>

</section>



  
<?php  include('includes/footer.php');?>

<?php  include('includes/social_links.php');?>
  
  
 
</body>
</html>