<div class="container-fluid footer-head" id="contact">
  
  
  
  <div class="container">
      <div class="row">
        
          <div class="col-md-8">
          <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
          <h2 style="font-family: 'Oswald', sans-serif;"> Innovative Technology Solutions</h2>
          
            <p style="text-align:justify; ">Innovative Technology Solutions is the company which provides trainings to individual, corporate and colleges on IT and professional skills. Besides trainings ITS is having training rooms available in all corporate hubs of India for corporate training needs.</p>
          
                    
          </div>
          
          <div class="col-md-4">
             <div class="recent-course-widget">
			<h2 class="widgettitle">Contact us</h2>
			 <div ><i class="fa fa-location-arrow"></i> Innovative Technology Solutions,<br /> B 100 A, South city 1, Near Signature Towers,<br /> Gurgaon &ndash; 122001</div>
			<div ><i class="fa fa-phone"></i> 91-124-4253759</div>
			<div ><i class="fa fa-envelope"></i> enquiry@itstraining.in</div>
			
			 </div>
              
            </div>

        </div>
      </div>
  
<div class="container-fluid">
  <div class="row">
 
    <div class="footer">
 <hr />
 
 
 
 <div class="col-md-12 ">
 <div  class=" matrix" style="text-align:justify;">
 <div class="col-md-4">

<ul>
<li><a href="topic.php?topicid=21">Training on   EMC</a></li>
<li><a href="topic.php?topicid=30">Training on   ITIL</a></li>
<li><a href="course.php?id=143">Training on  TOGAF</a></li>
<li><a href="topic.php?topicid=14">Training on  CISCO</a></li>


</ul>
</div> 
 
 <div class="col-md-4">

<ul>
<li><a href="topic.php?topicid=2">Training on  Citrix</a></li>
<li><a href="topic.php?topicid=1">Training on Vmware</a></li>
<li><a href="topic.php?topicid=12">Training on  Redhat</a></li>
<li><a href="course.php?id=216">Training on Prince2</a></li>

</ul>


</div> 
 
 <div class="col-md-4">
<ul>
<li><a href="#">Training on Bigdata</a></li>
<li><a href="course.php?id=35">Training on  MS Lync Server</a></li>
<li><a href="">100% job Oriented trainings</a></li>
<li><a href="">Training on Digital Marketing</a></li>

</ul>

</div> 
 
 </div>

  <span style="text-align:justify; font-size:12px "><i><strong>Disclaimer:</strong>                   Innovative Technology solutions conducted and selling courses by the help of official or authorised partners of parent company. Innovative Technology Solutions acts as a service provider to its partners and is not required to be licensed by parent companies. Innovative Technology Solutions discourage unofficial delivery of any of software and hardware products.
            </i>
             
            </span>

      <ul class="list-inline">
        <li><a href="index.php?link=1" class="style2">Home</a></li>
        <li><a href="about_us.php" class="style2">About Us</a></li>
        <li><a href="topic.php" class="style2">Trainings</a></li>
        <li><a href="index.php?link=4" class="style2">Training Rooms</a> </li>
        <li><a href="http://itstraining.in/client.php">Clientele</a></li>
        <li><a href="index.php?link=7" class="style2">Contact Us</a></li>
      </ul>
      <p>Copyright@ITS 2015 All Rights Reserved.</p>
	   <div class="dt-sc-ico-content type13">
      <ul class=" list-inline ">
        
        <li  ><div target="_blank"><a href="https://plus.google.com/u/0/b/107514024964658876856/107514024964658876856/posts" class="icon"><span class="fa fa-google" style="color:#d70711 !important"></span></a></div></li>
        <li  ><div target="_blank"><a  href="https://www.facebook.com/ITSGGN?ref=hl" class="icon"><span class="fa fa-facebook" style="color:#d70711 !important"></span></a></div></li>
        <li ><div target="_blank" ><a href="https://twitter.com/ITSGurgaon" class="icon"><span class="fa fa-twitter" style="color:#d70711 !important"></span></a></div></li>
      </ul>
      </div>
      
    </div>
  </div>
</div>






















  </div>

 


	
	

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 

  ga('create', 'UA-21700918-1', 'auto');

  ga('send', 'pageview');

 

</script>



<div id="popup_box">    <!-- OUR PopupBox DIV-->
    <a id="popupBoxClose">X</a>
      
  <span id="countDown"></span>
</div>



<script type="text/javascript">
	  $(document).ready( function() {

        // When site loaded, load the Popupbox First
        new popup($("#popup_box"),$("#container-fluid")).load();
        
    });

    function popup(popup,container) {
        
        var thisPopup = this,            
            timer,
            counter = 10,
            countDown = $("#countDown").text(counter.toString());
        
        thisPopup.load = function() {            
            
            container.animate({
                "opacity": "0.3"  
            },100, function() {            
                popup.fadeIn("100");            
            });    
            
            container.off("click").on("click", function() {
                thisPopup.unload();
            }); 
            
            $('#popupBoxClose').off("click").on("click", function() {            
                thisPopup.unload();               
            });
            
            timer = setInterval(function() {
                counter--;
                if(counter < 0) {                   
                    thisPopup.unload();
                } else {
                    countDown.text(counter.toString());
                }
            }, 500);            
        }       
        
        thisPopup.unload = function() {            
            
            clearInterval(timer); 

            popup.fadeOut("100", function(){
                container.animate({
                    "opacity": "1"  
                },100);  
            });
        }
    }     
	
	
</script>

