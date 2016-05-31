<?php
require_once ("class/config.inc.php");
 ?>
<?php
	require_once ("class/class.api.php");
	$api_obj = new api();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<title> ITS | Corporate training company in gurgaon </title>
		<meta name="google-site-verification" content="4LQfxEFHNVZerbmokoCxB0O_aKaBVdI-U9dEiweDhfE" />
		<meta name="alexaVerifyID" content="h5vTU1j2rSWps6c3F1IY1qRG4uc"/>
               
		<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=
		AIzaSyBzfmxwZ2l6nOA3JH1qSnllVxWmmzRXL2A&sensor=false&libraries=places,geometry"></script>

		<script src="js/maps.js"></script>
		<?php $api_obj -> print_header_for_seo('index', ""); ?>
		<?php
			include ('includes/for_css_js.php');
		?>
<!--  <style>

#popup_box { 
    background-image: url("images/itil-new-popup.jpg");
    
    left: 937px;
    margin-left: 12px;
    position: absolute;
    top: 335px;
    width: 399px;
    z-index: 56;
	height:329px;
}


a{  
cursor: pointer;  
text-decoration:none;  
} 

/* This is for the positioning of the Close Link */
#popupBoxClose {
    font-size:20px;  
    line-height:15px;  
    right:5px;  
    top:5px;  
    position:absolute;  
    color:#6fa5e2;  
    font-weight:500;      
}


</style> -->
	</head>

	<body>
		<?php
		include ('includes/header_index.php');
	?>
		<script>
$(function() {

$.vegas('slideshow', {
backgrounds:[
{ src:'http://itstraining.in/images/slider/course1.jpeg' , fade:1000},
{ src:'http://itstraining.in/images/slider/course2.jpeg',  fade:1000 },

]
});
});
		</script>
		<section class="">
			<div class="container-fluid " >
				<div class="row">
					<div class="auto_completer_box">
						<div class="dark">
							<div style="padding-top:40px; width:50%; margin:0px auto ; text-align:center; ">
								<div class="col-md-12 col-xs-12">

									<h1  class="wh_text animated  fadeInDown"> Welcome to ITS
									<br/>
									Innovative Technology Solutions</h1>
									<div class="paragraph pcon hidden-xs hidden-sm">
										<div class="  col-md-9">
											<p  align="justified hidden-sm" >
												ITS provides flexible training and consulting services in programming, project management and IT service management.
											</p>
										</div>
										<div class="col-md-3">
											<div data-ride="carousel" class="carousel slide  " id="myCarousel-mini">
												<!-- Indicators -->
												<ol class="carousel-indicators">
													<li class="active" data-slide-to="0" data-target="#myCarousel-mini"></li>
												</ol>
<span style="font-size:14px; 
font-family: 'Open Sans', sans-serif;">ITS is Authorized Training Partners with </span>
												<div role="listbox" class="carousel-inner hidden-sm">
													<div class="item active">
														<img alt="First slide"  src="images/course/citrix-250x250.png">
													</div>
													<div class="item ">
														<img alt="First slide"  src="images/course/hpe.png">
													</div>
													<div class="item ">
														<img alt="First slide"  src="images/course/redhat-logo-200.png">
													</div>
													<div class="item ">
														<img alt="First slide"  src="images/course/symantec-logo.jpg">
													</div>
													<div class="item ">
														<img alt="First slide"  src="images/course/hortan.png">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-12 col-xs-12">
										<form action="search.php" method="get">
											<div class="col-md-10">
												<input type="text" class="form-control col-md-12 col-xs-12" name="q" placeholder="Find Courses,e.g. VMware, Java, Digital Marketing" data-provide=" " id="search_c"/>
											</div>

											<div class="col-md-2">
												<input type="submit" class="btn btn-primary" value="Search" />
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section>

			<section>
		<div class="mini-submenu left_float " style=" padding:13px; margin-top:150px;">
				<ul>
					<li>
						<a href="https://www.facebook.com/ITSGGN?ref=hl"><img src="images/social/f.png" /></a>
					</li>
					<li>
						<a href="https://plus.google.com/u/0/b/107514024964658876856/107514024964658876856/posts"><img src="images/social/g.png" /></a>
					</li>
					<li>
						<a href="https://twitter.com/ITSGurgaon"><img src="images/social/t.png" /></a>
					</li>
                                       <li>
						<a href="https://www.linkedin.com/company/innovative-technology-solutions_3?trk=biz-companies-cym"><img src="images/social/liin.png" /></a>
					</li>

				</ul>

			</div>
            <div class="mini-submenu"  style=" padding:6px; margin-top:151px; padding-right:105px;margin-top:79px;</strong>">

       <strong style="color:#000">**LATEST**<strong>
       <a href="http://www.itstraining.in/id/231/course/itil_foundation.html" style="color:#FFF;"><h2style="font-size:12px; font-weight:bold;"><strong> ITIL Foundation 2011 Training</strong></h2></a> 
         
           
           
            </div>

			<div class="mini-submenu left_float">
				<ul>
					<li >
						<a class="page-scroll" href="#contact_form"><img src="images/enquiry.jpg" /></a>
					</li>

				</ul>

			</div>
			<div class="container-fluid" style="z-index:999999 !important;">
				<div id="form_list" style="z-index:9999 !important;">
					<div class="list-group ">
						<span href="#" class="list-group-item " style="background:#e96656;"> ENQUIRY FORM <span class="pull-right" id="slide-submenu"> <i class="fa fa-times"></i> </span> </span>

						<div style="background-color: rgba(255,255,255,0.6);"  >
							<form class="well">
								<div class="form-group" >
									<label for="exampleInputName">Name</label>
									<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
								</div>

								<div class="form-group" >
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
								</div>
								<div class="form-group" >
									<label for="exampleInputEmail1">Course</label>
									<input type="email" class="form-control" id="exampleInputcourse" placeholder="Enter Course">
								</div>

								<div class="checkbox"></div>
								<button type="submit" class="btn btn-default">
									Submit
								</button>
							</form>

						</div>

					</div>
				</div>
			</div>
			</div>
		</section>

		<section class="technicalbox" style=" background:#FFF">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<br />
						<h2 class="text-center">Technical Training</h2>
						<hr />
						<div class="rd">
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=28"> <img src="images/icons/adobe.png"  class="img-responsive"  >
								<p align="justify">
									Adobe's trainings are designed to meet everyone needs keeping in view the industry demand to accomplish project and growth of organisations and individuals. Adobe's training will enable individual to get the most out of your Adobe products.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=16"><img src="images/icons/apple.png"  class="img-responsive"  >
								<p align="justify">
									Apple the popular OS – IOS having certifications for IT professional and creative professionals to demonstrate your expertise in OS X and related technologies and validate your expertise in Apple pro applications.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=27"> <img src="images/icons/android.png"  class="img-responsive"  >
								<p align="justify">
									Android – is mobile Operating system based on LINUX kernel and developed by Google. Android is the most widely used and highest selling OS overall. ITS provide training to Android developers on Building APPS, adding action bar, supporting different devices
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=18"><img src="images/icons/ceh.png"  class="img-responsive"  >
								<p align="justify">
									EC-Council - Become a certified ethical hacker & get how to secure information security training the CEH program design to certify individuals in the specific network security discipline of Ethical hacking. EC-Council will certify you to become ...
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=14"> <img src="images/icons/cisco.png"  class="img-responsive"  >
								<p align="justify">
									CISCO is the world leader in Network and routing appliances. CISCO offer a complete career path with its Certifications like CCNA, CCNP and CCIE. Besides traiditional technology and course CISCO offers the latest blend of technology i.e. CCNA in Data centre.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=2"><img  src="images/icons/citrix.png"   class="img-responsive" >
								<p align="justify">
									Citrix is well known cloud computing company that enables mobile work styles. Citrix is having many authorised certification course which make you enable to build and grow your career in IT industry. Citrix is having many Certifications on Associate/Professional ...
								</p> </a>
							</div>

						</div>
						<div class="rd">
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=21"><img src="images/icons/emc.png"  class="img-responsive" >
								<p align="justify">
									EMC offerings go beyond traditional products and offerings. EMC is the best available education for information storage and management. The latest offerings are CLOUD, Big data and IT Solutions.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=15"><img src="images/icons/hp.png"  class="img-responsive" >
								<p align="justify">
									Hewlett Packard  education services provides you with a comprehensive selections of training solutions across a wide variety of IT courses. HP ExpertOne  certificate gives edge on operationg systems, hardware and printing, server applications and IT process.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=23"><img src="images/icons/ibm.png"  class="img-responsive" >
								<p align="justify">
									IBM the software and hardware giant offers a comprehensive portfolio of software and hardware training and professional certification designed for individuals, companies, and public organizations to acquire, maintain, optimize and validate their IT skills
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=20"><img src="images/icons/java.png"  class="img-responsive" >
								<p align="justify">
									Java is a programming language expressly designed for use in the distributed environment of the Internet. Vuze, Open Office, Eclipse, NetBeans, jEdit, SoapUI and many more written in Java. Mobile OS Blackberry & Android are majorly develop in JAVA and Android SDK itself is written in Java.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=5"><img src="images/icons/juniper.png"  class="img-responsive" >
								<p align="justify">
									Juniper Networks is one of the leading company offers performance network solutions that help SME's, big enterprises, service providers & public sector organizations create value and accelerate business success.
								</p></a>
							</div>
							<div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2">
								<a href="topic.php?topicid=4"><img src="images/icons/microsoft.png"  class="img-responsive"  >
								<p align="justify">
									Working on Microsoft product is essential either for delivery or project integration, so we at ITS with the help of training we make you more efficient to use Microsoft technology and become a Microsoft certified professional
								</p></a>
							</div>

						</div>

					</div>

				</div>

				<div class="col-md-12">
					<div class="pull-right" style="margin-bottom:50px;">
						<a href="topics.php" class="btn btn-danger btn-lg online_assment red-btn">For more courses click here</a>
					</div>
				</div>

				<div class="clearfix"></div>

			</div>
		</section>

		<section  class="container-fluid" style="background:#e96656 ; padding-bottom:40px;">
			<div class="container" >
				<br />
				<!-- Codrops top bar -->
				<h2 style="color:#fff;" class=" text-center animated  rollIn">Process / Project Management</h2>
				<hr  style="color:#ffacb0;" />
				<div class="col-lg-12">
					<p align="justified " style="color:#fff; font-size:17px; text-align:justify; margin-top:5px;">
						Process and Project Management is the process and activity of planning, organizing, motivating AND controlling resources, procedures and protocols to achieve specific goals in scientific or daily problems. Training on ITIL, Prince 2, Cobit, Agile, Scrum and others make you efficient in delivering services and customer satisfaction to get more orders.
					</p>

					<center>
						<ul id="da-thumbs" class="da-thumbs " >
							<li>
								<a href="topic.php?topicid=34"> <img src="images/pmp/11.png" />
								<div>
									<span>AGILE & SCRUM</span>
								</div> </a>
							</li>
							<li>
								<a href="course.php?id=143"> <img src="images/pmp/2.png" />
								<div>
									<span>Togaf</span>
								</div> </a>
							</li>
							<li>
								<a href="topic.php?topicid=31"> <img src="images/pmp/3.png" />
								<div>
									<span>PMI</span>
								</div> </a>
							</li>
							<li>
								<a href="course.php?id=209"> <img src="images/pmp/5.png" />
								<div>
									<span>Cobit</span>
								</div> </a>
							</li>
							<li>
								<a href="topic.php?topicid=30"> <img src="images/pmp/6.png" />
								<div>
									<span>ITIL</span>
								</div> </a>
							</li>
							<li>
								<a href="topic.php?topicid=32"> <img src="images/pmp/7.png" />
								<div>
									<span>MSP</span>
								</div> </a>
							</li>
							<li>
								<a href="topic.php?topicid=35"> <img src="images/pmp/8.png" />
								<div>
									<span>P30</span>
								</div> </a>
							</li>
							<li>
								<a href="topic.php?topicid=33"> <img src="images/pmp/9.png" />
								<div>
									<span>Sigma Six</span>
								</div> </a>
							</li>
							<li>
								<a href="topic.php?topicid=29"> <img src="images/pmp/10.png" />
								<div>
									<span>Prince2</span>
								</div> </a>
							</li>

							<!--<li> <a href="#"> <img src="images/pmp/12.png" />
							<div><span>More</span></div>
							</a> </li>
							-->
						</ul>
					</center>

				</div>
			</div>
		</section>
		<section class="map-container" style=" background:#FFF" id="rooms_scroll">
			<div class="container" >
				<div class="row" style="padding 20px">
					<br />
					<h2 class="text-center ">Training Centers</h2>
					<hr />
					<h3 class="text-center ">Hire Our training rooms to conduct Your training!</h3>
					<br />
					<div class="clearfix"></div>

					<div class="map_main">

						<div class="col-md-3 col-sm-12 col-xs-12">
							<ul>
								<li class="col-xs-12">
									<span onclick="open_some(0)" class="list-map"  id="listitem_0"><i class="fa fa-university"></i> Gurgaon</span>
									<br>
									<span class="address_map"><a href="city.php?id=19" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>
								<li class="col-xs-12">
									<span onclick="open_some(1)" class="list-map" id="listitem_1"><i class="fa fa-university"></i> Noida</span>
									<br>
									<span class="address_map"><a href="city.php?id=23" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li class="col-xs-12">
								<li class="col-xs-12">
									<span onclick="open_some(2)"   id="listitem_2" class="list-map"><i class="fa fa-university"></i> Delhi </span>
									<br>
									<span class="address_map"><a href="city.php?id=18" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li >
								<li class="col-xs-12">
									<span onclick="open_some(3)" class="list-map"  id="listitem_3"><i class="fa fa-university"></i> Mumbai</span>
									<br>
									<span class="address_map"><a href="city.php?id=22" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>
								<li class="col-xs-12">
									<span onclick="open_some(4)" class="list-map"  id="listitem_4"><i class="fa fa-university"></i> Kolkata </span>
									<br>
									<span class="address_map"><a href="city.php?id=21" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>

							</ul>
						</div>
						<div class="col-md-6 hidden-xs hidden-sm"   >
							<div style="margin:0px auto; text-align:center; padding-left:100px;">
								<div class="air_map_box"><img src="images/ipad-air.png" width="100%" />
								</div>
								<div id="map" ></div>
							</div>
						</div>
						<div class="col-md-3 col-sm-12 col-xs-12">
							<ul>
								<li class="col-xs-12">
									<span onclick="open_some(5)" class="list-map" id="listitem_5"><i class="fa fa-university"></i> Chennai</span>
									<br>
									<span class="address_map"><a href="city.php?id=17" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>
								<li class="col-xs-12">
									<span onclick="open_some(6)" class="list-map"  id="listitem_6"><i class="fa fa-university"></i> Pune</span>
									<br>
									<span class="address_map"><a href="city.php?id=24" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>
								<li class="col-xs-12">
									<span onclick="open_some(7)" class="list-map" id="listitem_7"><i class="fa fa-university"></i> Hyderabad </span>
									<br>
									<span class="address_map"><a href="city.php?id=20" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>
								<li class="col-xs-12">
									<span onclick="open_some(8)" class="list-map" id="listitem_8"><i class="fa fa-university"></i> Mohali</span>
									<br>
									<span class="address_map"><a href="city.php?id=19" class="btn btn-danger btn-sm online_assment red-btn  col-xs-6">View more</a></span>
								</li>
								<li class="col-xs-12">
									<span onclick="open_some(9)" class="list-map" id="listitem_9"><i class="fa fa-university"></i> Bangalore</span>
									<br>
									<span class="address_map"><a href="city.php?id=16" class="btn btn-danger btn-sm online_assment red-btn col-xs-6">View more</a></span>
								</li>

							</ul>

						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="college_training " >
			<div class="overlay_red">
				<div class="container-fluid">
					<div class="container  ">
						<div class="row ">
							<br />
							<h2 class=" text-center wh_text">College Training</h2>
							<div class="col-md-12">
								<div align="justified" class="traing_bg  animated zoomInDown" >
									<p align="middle" >
										Many of Students getting placed by learning new skills from Innovative Technology Solutions
									</p>
									<p align="justify">
										Innovative Technology Solutions is always innovative and creating job oriented training courses for college students to getting placed in industry. ITS offers wide range of job oreinted courses and 100% job assurance courses to selective students.
									</p>
									<div class="column dt-sc-one-sixth  space  first">
										<div class="dt-sc-ico-content type13">
											<div class="icon" style="background-color:#f2672e;">
												<span class="fa fa-html5"> </span>
											</div>
											<h4><a href="#" target="_blank"> HTML </a></h4>
										</div>
									</div>
									<div class="column dt-sc-one-sixth  space  ">
										<div class="dt-sc-ico-content type13">
											<div class="icon" style="background-color:#0171bb;">
												<span class="fa fa-css3"> </span>
											</div>
											<h4><a href="#" target="_blank"> CSS </a></h4>
										</div>
									</div>
									<div class="column dt-sc-one-sixth  space  ">
										<div class="dt-sc-ico-content type13">
											<div class="icon" style="background-color:#9fbf3a;">
												<span class="fa fa-android"> </span>
											</div>
											<h4><a href="#" target="_blank"> Android </a></h4>
										</div>
									</div>
									<div class="column dt-sc-one-sixth  space  ">
										<div class="dt-sc-ico-content type13">
											<div class="icon" style="background-color:#2b8bc0;">
												<span><img src="images/skill/icon-ps.png" title="Photoshop" alt="Photoshop"></span>
											</div>
											<h4><a href="#" target="_blank"> Photoshop </a></h4>
										</div>
									</div>
									<div class="column dt-sc-one-sixth  space  ">
										<div class="dt-sc-ico-content type13">
											<div class="icon" style="background-color:#e5a329;">
												<span><img src="images/skill/icon-js.png" title="jQuery" alt="jQuery"></span>
											</div>
											<h4><a href="#" target="_blank"> jQuery </a></h4>
										</div>
									</div>
									<div class="column dt-sc-one-sixth  space  ">
										<div class="dt-sc-ico-content type13">
											<div class="icon" style="background-color:#d10101;">
												<span><img src="images/skill/icon-ruby.jpg" title="Ruby" alt="Ruby"></span>
											</div>
											<h4><a href="#" target="_blank"> Ruby </a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section style=" background:#FFF">
			<div class="container">
				<div class="row">
					<br />
					<h2 class="text-center">Our Clients</h2>
					<hr />
					<div class="padding cleints">
						<div class="col-lg-12 col-xs-12 col-sm-12">
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p1.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p2.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p3.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p4.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p5.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p6.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands " src="images/brands/p7.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p8.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p9.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p10.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p11.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p12.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p13.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p14.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p15.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p16.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p17.jpg" />
							</div>
							<div class="col-lg-2 col-xs-6 col-sm-3">
								<img class="img-rounded   brands" src="images/brands/p18.jpg" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container newsletter" id="contact_form">
				<div class="container">
					<div class="section-header">
						<h2 class="white-text">Get in touch</h2>
						<h6 class="white-text"> Have any question? Drop us a message. We will get back to you in 24 hours. </h6>
					</div>
					<div class="row">
						<script type="text/javascript" language="javascript">
							$(document).ready(function() {
								$("#contact1").validate({
									rules : {
										// simple rule, converted to {required:true}
										name : "required",
										mobile : "required",
										subject : "required",
										message : "required",
										captch1 : "required",

										// compound rule
										email : {
											required : true,
											email : true
										}
									}
								});
							});
						</script>
						<form role="form" class="contact-form" id="contact1">
							<p id="contact_alert"></p>
							<div style="visibility: visible;-webkit-animation-duration: 1.5s; -moz-animation-duration: 1.5s; animation-duration: 1.5s;-webkit-animation-delay: 0.15s; -moz-animation-delay: 0.15s; animation-delay: 0.15s;" class="wow fadeInLeft animated animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
								<div class="col-lg-6 col-sm-6">
									<input name="name" id="name" placeholder="Your Name" class="form-control input-box" type="text" required>
								</div>
								<div class="col-lg-6 col-sm-6">
									<input name="email" id="email" placeholder="Your Email" class="form-control input-box" type="email" required>
								</div>
								<div class="col-lg-6 col-sm-6">
									<input name="mobile" id="mobile" placeholder="Your mobile no." class="form-control input-box" type="email" required>
								</div>
								<div class="col-lg-6 col-sm-6">
									<input name="subject" id="subject" placeholder="Course Name" class="form-control input-box" type="text" required>
								</div>

							</div>
							<div style="visibility: visible;-webkit-animation-duration: 1.5s; -moz-animation-duration: 1.5s; animation-duration: 1.5s;-webkit-animation-delay: 0.15s; -moz-animation-delay: 0.15s; animation-delay: 0.15s;" class="col-md-12 wow fadeInRight animated animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s">
								<textarea name="message" id="message" class="form-control textarea-box" placeholder="Your Message" required></textarea>
							</div>

							<div class="col-md-6 pull-right">
								<div class="col-md-6">
									<img src="class/captcha/captcha.php" id="captcha" width="140px"  class="thumbnail"/><a href="#" onclick="
									document.getElementById('captcha').src='class/captcha/captcha.php?'+Math.random();
									document.getElementById('captcha-form').focus();"
									id="change-image" class="wh_text"><h3>Refresh</h3></a>
								</div>
								<div class="col-md-6">
									<input type="text" name="captch1" id="captch"  value="" class="form-control input-box" placeholder="Enter the image text" />
								</div>

							</div>

							<div class="clearfix"></div>
							<button style="visibility: visible;-webkit-animation-duration: 1.5s; -moz-animation-duration: 1.5s; animation-duration: 1.5s;-webkit-animation-delay: 0.15s; -moz-animation-delay: 0.15s; animation-delay: 0.15s;" class="btn btn-default pull-right custom-button red-btn-white wow fadeInLeft animated animated" data-wow-offset="30" data-wow-duration="1.5s" data-wow-delay="0.15s" type="button" onclick="submit_contact_form();">
								Send Message
							</button>
						</form>
					</div>
				</div>
			</div>
		</section>
		<section id="about" style=" background:#FFF">
			<div class="container">
				<div class="row brief">

					<!-- BRIEF IMAGE -->
					<div style="visibility: visible; animation-duration: 1.75s; animation-name: fadeInLeft;" class="col-md-6 pull-right wow fadeInLeft animated" data-wow-offset="20" data-wow-duration="1.75s">
						<div class="brief-image-right">
							<img src="images/about-us.jpg" alt="">
						</div>
					</div>

					<!-- BRIEF HEADING -->
					<div style="visibility: visible; animation-duration: 1.75s; animation-name: fadeInRight;" class="col-md-6 content-section pull-left wow fadeInRight animated" data-wow-offset="20" data-wow-duration="1.75s">
						<h3 style="color:#000;"> About Us</h3>
						<p align="justify" style="color:#000;">
							Innovative Technology Solutions heading towards global leading IT and Professional skills development training and solution provider company. ITS in association with Software and Hardware developer companies providing training and solutions to many large and small enterprises across the Globe. ITS is preferred vendor for MNC's like HP, EMC and many more for providing Training Rooms and arranging infrastructure for training needs in APAC / APJ region. ITS is well known for adopting Innovation in training delivery and always updated with relevant content for delivery by excellent instructors. ITS is known to be most flexible in customization of training content and ready to deliver training at any time zone.
						</p>
						<h3 style="color:#000;"> Mission</h3><span align="justify" style="color:#000;">World's leading training provider by 2020.</span>
						<h3  style="color:#000;" > Vision </h3><span align="justify"  style="color:#000;">Effective training Solutions for our customers to help them for their growth.</span>
						<hr />

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
		<?php
			include ('includes/footer.php');
		?>
		
	</body>
</html>

