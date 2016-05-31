<script>
$(function(){

	$('#slide-submenu').on('click',function() {			        
        $('#menubar').css('display','block');	
			$('#form_list').css('display','none');	
        
      });

	$('#menubar').on('click',function(){		
       // $(this).next('.list-group').toggle('slide');
		$('#form_list').css('display','block');	
        $('#menubar').css('display','none');	
		
	})
})</script>

    
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
        <span href="#" class="list-group-item " style="background:#e96656;">
            ENQUIRY FORM
            <span class="pull-right" id="slide-submenu">
                <i class="fa fa-times"></i>
            </span>
        </span>
       
        
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
  
 
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
        
        </div>
        
      </div> 
	</div>
    </div>












