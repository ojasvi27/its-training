<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

<script src="https://code.jquery.com/jquery-1.11.1.js"></script>

<script src="moment.js" ></script>
<link rel="stylesheet" href="bootstrap-datetimepicker.min.css" >
<script src="bootstrap-datetimepicker.js" ></script>



<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<style>
.search_by_date{
	background:url(search.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  display:table;
  width:100%;
  height:100%;
  
	
	}
	body{
	width:100%;
  height:100%;
  	
		}
		html{
			
			width:100%;
  height:100%;
  }
  .pickers{
	  
	  font-family: 'Oswald', sans-serif;
	  text-transform:capitalize;
	  font-size:24px;
	  color:#fff;
	  background:#00967f;
	  padding-left:10px;
	  padding-right:10px;
	  width:auto;
	  
	  
	  
	  }
	  
		 .pad_top{
			 margin-top:10%;
			}
.bleft{
	background:#06F;
	-webkit-border-top-left-radius: 5px;
-webkit-border-bottom-left-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-bottomleft: 5px;
border-top-left-radius: 5px;
border-bottom-left-radius: 5px;
text-transform:uppercase;
height:40px;
padding:9px 20px;
display:table-cell;
line-height:1;
color:#fff;
float:left;
font-size:18px;

}
.bright{-webkit-border-top-right-radius: 5px;
-webkit-border-bottom-right-radius: 5px;
-moz-border-radius-topright: 5px;
-moz-border-radius-bottomright: 5px;
border-top-right-radius: 5px;
border-bottom-right-radius: 5px;
width:200px;height:40px;
line-height:1.42857;
float:left;
box-shadow:0 1px 1px rgba(0, 0, 0, 0.075) inset;
border:1px solid #ccc;
display:table-cell;
padding:9px 12px;
margin-right:40px;
}
.white{color:#fff;
}
.orage{
	  border-radius: 5px;
    cursor: pointer;
    display: inline-block;
    font-size: 22px;
    text-decoration: none;
    transition: all 0.3s ease 0s;
	border: 2px solid #06f;
    color: #06f;
	background:none;
	padding-left:10px;
	padding-right:10px;
	}
.orage:hover{
	background:#06f;
	color:#FFF;
	}
	
	
	
</style>
<script type="text/javascript">
        $(function () {
            $('.datetimepicker9').datetimepicker();
            $('.datetimepicker10').datetimepicker();
            $(".datetimepicker9").on("dp.change",function (e) {
               $('.datetimepicker10').data("DateTimePicker").setMinDate(e.date);
            });
            $(".datetimepicker10").on("dp.change",function (e) {
               $('.datetimepicker9').data("DateTimePicker").setMaxDate(e.date);
            });
        });
    </script>

<body>
<section class="search_by_date">
<div class="container">
<div class="row">
<div class="pad_top">
<div class="center-block">
<h3 class="white">Search a course between </h3>
<div class=""><span class="bleft ">from date  </span><input type="text" class=" bright datetimepicker9" /></div>

<div class=""><span class="bleft ">to date  </span><input type="text" class=" bright datetimepicker10" /></div>
<input type="button" class="orage inline_box" value="View  Courses" />
</div>
</div>
</div>
</div>
</section>
</body>
</html>
