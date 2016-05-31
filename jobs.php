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
<style>
#jobss {
	border-radius: 3px;
    background:#FF9191;
	padding: 5px; 
    width: 120px;
    height: 40px;	
	}
#testimonials {
	background-attachment: scroll;
	background-clip: border-box;
	background-color:hsl(7, 77%, 63%);
	;
	background-image: none;
	background-origin: padding-box;
	background-position: 0 0;
	background-repeat: repeat;
	background-size: auto auto;
	color: hsl(0, 0%, 85%);
	min-height: 215px;
}
#carousel-testimonials {
	position: relative;
	z-index: 100;
}
#carousel-testimonials p {
	font-size: 20px;
	font-style: italic;
	line-height: 26px;
	max-width: 960px;
	padding-bottom: 15px;
	padding-left: 0;
	padding-right: 0;
	padding-top: 15px;
}
#carousel-testimonials .carousel-indicators {
	bottom: 0;
	left: 0;
	margin-bottom: 0;
	margin-left: 0;
	margin-right: 0;
	margin-top: 0;
	padding-bottom: 0;
	padding-left: 0;
	padding-right: 0;
	padding-top: 0;
	position: relative;
	text-align: left;
	width: auto;
	z-index: 1;
}
#carousel-testimonials .carousel-indicators li {
	height: 15px;
	margin-bottom: 0;
	margin-left: 0;
	margin-right: 5px;
	margin-top: 0;
	width: 15px;
}
#carousel-testimonials .carousel-indicators li.active, #carousel-testimonials .carousel-indicators li:hover {
	background-attachment: scroll;
	background-clip: border-box;
	background-color:#FFF;
	background-image: none;
	background-origin: padding-box;
	background-position: 0 0;
	background-repeat: repeat;
	background-size: auto auto;
	border-bottom-color: hsl(0, 0%, 30%);
	border-left-color: hsl(0, 0%, 30%);
	border-right-color: hsl(0, 0%, 30%);
	border-top-color: hsl(0, 0%, 30%);
}
#carousel-testimonials .carousel-inner .item {
	opacity: 0;
	transition-property: opacity;
}
#carousel-testimonials .carousel-inner .active {
	opacity: 1;
}
#carousel-testimonials .carousel-inner .active.left, .carousel-fade .carousel-inner .active.right {
	left: 0;
	opacity: 0;
	z-index: 1;
}
#carousel-testimonials .carousel-inner .next.left, .carousel-fade .carousel-inner .prev.right {
	opacity: 1;
}
#carousel-testimonials .carousel-control {
	z-index: 2;
}
</style>

<body>
<script type="text/javascript">var switchTo5x=true;</script> 
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script> 
<script type="text/javascript">stLight.options({publisher: "f635236d-1a41-4cf9-932c-7d98d23857c4", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php  include('includes/header.php');?>
<section>
  <div class="container-fluid contentos">
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li class="active"><a href="jobs.php">jobs</a></li>
      </ol>
      <section id="testimonials" class="container-fluid">
        <div class="container">
          <div class="row padTB20">
            <div class="col-sm-12 centered-xs">
            </br>
            </br>
              <h5 style="color:#FFF; font-size:30px;">Career Jobs</h5>
              <div id="carousel-testimonials" class="carousel slide padTB10" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                  <div class="item">
                    <p>""We just want to have <strong>GREAT PEOPLE </strong>Working for us. ""</p>
                  </div>
                  <div class="item active">
                    <p>""Choose a job you love, and you will never have to work a day in your life.""</p>
                  </div>
                  <div class="item">
                    <p>""Find out what you like doing best and get someone to pay you for doing it.""</p>
                  </div>
                  <div class="item">
                    <p>""I think everyone should experience defeat at least once during their career. You learn a lot from it.""</p>
                  </div>
                  <div class="item">
                    <p>""Anyone who has never made a mistake has never tried anything new.""</p>
                  </div>
                  <div class="item">
                    <p>""Desire! That's the one secret of every man's career. Not education. Not being born with hidden talents. Desire""</p>
                  </div>
                  <div class="item">
                    <p>""Dreams are extremely important. You can't do it unless you imagine it.""</p>
                  </div>
                </div>
                <ol class="carousel-indicators">
                  <li class="" data-target="#carousel-testimonials" data-slide-to="1"></li>
                  <li class="active" data-target="#carousel-testimonials" data-slide-to="2"></li>
                  <li class="" data-target="#carousel-testimonials" data-slide-to="3"></li>
                  <li class="" data-target="#carousel-testimonials" data-slide-to="4"></li>
                  <li class="" data-target="#carousel-testimonials" data-slide-to="5"></li>
                  <li class="" data-target="#carousel-testimonials" data-slide-to="6"></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </section>   
      <div class="container panel panel-danger">
      <center><h2><strong> Jobs</strong></h2></center>
      <div class="row">
      	<div class="col-lg-12 col-xs-12 col-sm-12">
      		<div class="col-lg-8 col-xs-8 col-sm-8">
		      <h3><strong>Business Development Executive</strong></h3>     
			 <img src="images/briefcase.png" /> More than 1 year
		     <img src="images/location.png" /> Gurgaon <br />
             <h4><strong>Job Description</strong></h4>
             Innovative Technology Solutions is hiring Graduates with more than 1 year of experience as Business Development Executive profile.Candidates must have Strong written and verbal communication skills
             <ul>
             <li>Experience: More than 1 year experience with graduation / Any Postgraduate (Not Required)</li>
			 <li>Location: Gurgaon</li>
			 <li>Timings: 9.30 am to 6 pm</li>
			 <li>Working Days: Monday to Friday & Alternative Saturday </li>
             </ul>
			 
             <div class="container">
  
    <button type="button" data-toggle="modal" data-target="#myModal">More Details</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Job Description</h4>
        </div>
        <div class="modal-body">        			
<p align="justify">We are looking for an ambitious and energetic Business Development Executive to coordinate and facilitate the expansion of our clientele. You will be the front of the company and will have the experience and dedication to create and apply an effective sales strategy and pass your knowledge to colleagues.</p>
<h5>Roles, Responsibilities and Requirements:</h5>
		<ul>
			<li>Develop a growth strategy focused both on financial gain and customer satisfaction</li>
			<li>Conduct research to identify new markets and customer needs</li>
			<li>Bidding,Interaction with clients</li>
			<li>Promote the company’s  products/services addressing or predicting clients objectives</li>
			<li>Prepare sales contracts ensuring adherence to law-established rules and guidelines</li>
			<li>Keep records of sales, revenue, invoices etc.</li>
			<li>Provide trustworthy feedback and after-sales support</li>
			<li>Build long-term relationships with new and existing customers</li>
			<li>Proven working experience as a business development manager /sales executive or a relevant role</li>
			<li>Proficiency in MS Office and CRM software</li>
			<li>Excellent communication and people skills</li>
			<li>Demonstrable experience in deal with high-level negotiations</li>
			<li>Excellent time management and planning skills</li>			
		</ul> 
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>  
</div>             
            <br />
		    <h3><strong>Search Engine Optimization</strong></h3>
			 <img src="images/briefcase.png" /> More than 1 year
		     <img src="images/location.png" /> Gurgaon <br />
             <h4><strong>Job Description</strong></h4>
             Innovative Technology Solutions is hiring Graduates with more than 1 year of experience as Search Engine Optimiztion profile.Candidates must have Keyword understanding and strong On Page & Off Page Optimization.
             <ul>
             <li>Experience: More than 1 year experience with graduation / Any Postgraduate (Not Required)</li>
			 <li>Location: Gurgaon</li>
			 <li>Timings: 9.30 am to 6 pm</li>
			 <li>Working Days: Monday to Friday</li>
             </ul>
             <div class="container">  
    <button type="button" data-toggle="modal" data-target="#myModal">More Details</button>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Job Description</h4>
        </div>
        <div class="modal-body">        
			<p align="justify">We are looking for an SEO/SEM expert to manage search engine optimization and marketing activities.
				You will be responsible for managing all SEO activities such as content strategy, site speed optimization, link 					                building and keyword strategy to increase rankings on all major search networks. You will also manage all SEM                campaigns on Google, Facebook, Yahoo and Bing in order to maximize ROI.</p>
		<h5>Roles, Responsibilities and Requirements:</h5>
			<ul>
				<li>On Page & Off Page Optimization, Back-linking.</li>
				<li>Content writing; Article preparation & submission; Keyword understanding, Ad words, etc.</li>
				<li>Organic & Local ranking; Proper use of Google - Bing Webmaster Tools & Google Analytic.</li>
				<li>Perform keyword research in coordination with client business objectives to optimize existing content and uncover new opportunities</li>
				<li>Optimize copy and landing pages for SEO</li>
				<li>Perform ongoing keyword discovery & expansion, analyzing and providing recommendations for content development
Research and implement Search Engine Optimization recommendations</li>
				<li>Implement link building strategy</li>
				<li>Develop and implement search engine programs</li>
				<li>Recommend changes to website architecture, content, linking and other factors to improve SEO positions for target keywords</li>
				<li>Experience in ASO would be an added plus </li>
			</ul>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
    </div>
  </div>
 </div>
 </div>
 </div> 
</div>
</section>
<?php  include('includes/footer.php');?>
<?php  include('includes/social_links.php');?>
</body>
</html>