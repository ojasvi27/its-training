<div class="navbar navbar-static-top navbar-fixed-top header_row menu_css">
  <div class="container nav_white"> 
    
    <!-- Grid demo navbar -->
    <div class="navbar navbar-default yamm">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a href="http://itstraining.in/index.php" class="navbar-brand"><img alt="Innovative Technology SOlutions" src="http://itstraining.in/images/logo_new.png" width="100" /></a> </div>
        <div id="navbar-collapse-grid" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right pagescroll-menu">
          <li><a href="http://itstraining.in/index.php">Home</a></li>
          <li><a href="http://itstraining.in/about_us.php"  >About Us</a></li>
          
          
          <!-- Grid 12 Menu -->
          <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Training<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li >
                <div>
                  <div class="board"> 
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                      <ul class="nav nav-tabs" id="myTab">
                        <li class=" nav_cust"><a href="#home" data-toggle="tab" title="welcome" > <span> Technical </span> </a></li>
                        
<li  class="nav_cust"><a href="#profile" data-toggle="tab" title="profile"> <span class=" two">Process Management</span> </a> </li>
                        
<li class="nav_cust"><a href="#messages" data-toggle="tab" title="bootsnipp goodies"> <span class=" three">College Training</span> </a> </li>  
                     
 </ul>
                    </div>
                    <div class="tab-content">
                      <div class="tab-pane fade in active" id="home">
                      <?php $api_obj->get_cat(0); ?>
                      
                      
                       </div>
                      <div class="tab-pane fade" id="profile">
                      <?php $api_obj->get_cat(9); ?>
                      
                      </div>
                      <div class="tab-pane fade" id="messages">
                    	  <?php $api_obj->get_cat(3); ?>
                    
                      </div>
                      
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
          <!--With Offsets 
              -->
              
             <li><a href="http://itstraining.in/index.php#rooms_scroll"  > Training Rooms </a>
           </li>
          
            <li><a class="page-scroll"  href="http://itstraining.in/workshops.php" >Training Calendar</a></li>
           <li><a class="page-scroll"  href="http://itstraining.in/feedback.php" >Feedback</a></li>
            <li>
            <span href="javascript:void(0)"   class="btn btn-danger btn-sm online_assment red-btn" onclick="window.open('become-a-partner.php ', 'child', 'width=1900,height=1900,left=0,top=0,scrollbars=yes')" >Become A Partner</span>
             </li>
             <li><a class="page-scroll"  href="http://itstraining.in/jobs.php" >Jobs</a></li>            
            <li><a class="page-scroll"  href="#contact" >Contact</a></li>
            </a>
            </li>
           
          <li>
          
          <span href="javascript:void(0)"   class="btn btn-danger btn-sm online_assment red-btn" onclick="window.open('attempt_online_test.php ', 'child', 'width=1900,height=1900,left=0,top=0,scrollbars=yes')" >Online Assessment</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
