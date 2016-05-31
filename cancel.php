<?php
require_once ("../class/config.inc.php");
 ?>
<?php
	require_once ("../class/class.api.php");
	$api_obj = new api();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

	<<style >
		.jumbotron-flat {
  background-color: solid #4DB8FFF;
  height: 100%;
  border: 1px solid #4DB8FF;
  background: white;
  width: 100%;
text-align: center;
box-sizing:border-box;
margin:0px 20px 0px 20px;
}

.paymentAmt {
    font-size: 80px; 
}

.centered {
    text-align: center;
}

.title {
 padding-top: 15px;   
}
	</style>
<link rel="shortcut icon" href="images/favicon.ico" />
<title> ITS | Corporate training company in gurgaon</title>
		<meta name="google-site-verification" content="4LQfxEFHNVZerbmokoCxB0O_aKaBVdI-U9dEiweDhfE" />
		<meta name="alexaVerifyID" content="h5vTU1j2rSWps6c3F1IY1qRG4uc"/>
               
		<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=
		AIzaSyBzfmxwZ2l6nOA3JH1qSnllVxWmmzRXL2A&sensor=false&libraries=places,geometry"></script>

		<script src="js/maps.js"></script>
		<?php $api_obj -> print_header_for_seo('index', ""); ?>
			<?php
			include ('../includes/for_css_js.php');
		?>
		

	</head>

	<body>
	
		<?php
		include ('../includes/header_index.php');
		?>

		<div class="container">
	<?php $api_obj ->getCourseForpayment($_GET['id']);?>
	

		</div>
	<?php		include ('../includes/footer.php');
		?>
		
	</body>
</html>