<style>
.navbar-default{
	background:none;
	box-shadow:none;
	border-radius:0px;
	border:none;
	}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .active > a{background:none; box-shadow:none;}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus{
	background:none repeat scroll 0 0 #fef4f5;box-shadow:none;
	}
.nav_white{
background:rgba(255,255,255,0.95) !important; }
.navbar{margin-bottom:0px;}
.nav_inline{list-style-type:none; text-align:center;}
.nav_inline li { margin-left:-35px; text-align:center;}

</style>



<div class="navbar navbar-static-top navbar-fixed-top header_row">
  <div class="container nav_white">
        
        <!-- Grid demo navbar -->
        <div class="navbar navbar-default yamm">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">Yamm Megamenu</a>
          </div>
          <div id="navbar-collapse-grid" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
             <li ><a href="#">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Accordion<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li>
                  <div class="yamm-content">
                    <div class="row">
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title"><a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="collapsed">Collapsible Group Item #1</a></h4>
                          </div>
                          <div class="panel-collapse collapse" id="collapseOne" style="height: 0px;">
                            <div class="panel-body">Ut consectetur ullamcorper purus a rutrum. Etiam dui nisi, hendrerit feugiat scelerisque et, cursus eu magna. </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title"><a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="collapsed">Collapsible Group Item #2</a></h4>
                          </div>
                          <div class="panel-collapse collapse" id="collapseTwo" style="height: 0px;">
                            <div class="panel-body">Nullam pretium fermentum sapien ut convallis. Suspendisse vehicula, magna non tristique tincidunt, massa nisi luctus tellus, vel laoreet sem lectus ut nibh. </div>
                          </div>
                        </div>
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title"><a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="collapsed">Collapsible Group Item #3</a></h4>
                          </div>
                          <div class="panel-collapse collapse" id="collapseThree" style="height: 0px;">
                            <div class="panel-body">Praesent leo quam, faucibus at facilisis id, rhoncus sit amet metus. Sed vitae ipsum non nibh mattis congue eget id augue. </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
            
            
            <style>
			
			.thumbnail{
			float:left; padding:6px;	}
            
			.thumbnail.active{
				padding:3px;
				border: 1px  solid #ccc;
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				@import url(http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700);
/* written by riliwan balogun http://www.facebook.com/riliwan.rabo*/
.board{
    width: 100%;
margin: 0px auto;
height: 500px;
background: #fff;
/*box-shadow: 10px 10px #ccc,-10px 20px #ddd;*/
}
.board .nav-tabs {
    position: relative;
    /* border-bottom: 0; */
    /* width: 80%; */
    margin: 0px auto;
    margin-bottom: 0;
    box-sizing: border-box;

}

.board > div.board-inner{
    background: #fafafa url(http://subtlepatterns.com/patterns/geometry2.png);
    background-size: 30%;
}

p.narrow{
    width: 60%;
    margin: 10px auto;
}

.liner{
    height: 2px;
    background: #ddd;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    /* background-color: #ffffff; */
    border: 0;
    border-bottom-color: transparent;
}

span.round-tabs{
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: white;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
	padding-top:18px;
}

span.round-tabs.one{
    color: rgb(34, 194, 34);border: 2px solid rgb(34, 194, 34);
}

li.active span.round-tabs.one{
    background: #fff !important;
    border: 2px solid #ddd;
    color: rgb(34, 194, 34);
}

span.round-tabs.two{
    color: #febe29;border: 2px solid #febe29;
}

li.active span.round-tabs.two{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #febe29;
}

span.round-tabs.three{
    color: #3e5e9a;border: 2px solid #3e5e9a;
}

li.active span.round-tabs.three{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #3e5e9a;
}

span.round-tabs.four{
    color: #f1685e;border: 2px solid #f1685e;
}

li.active span.round-tabs.four{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #f1685e;
}

span.round-tabs.five{
    color: #999;border: 2px solid #999;
}

li.active span.round-tabs.five{
    background: #fff !important;
    border: 2px solid #ddd;
    color: #999;
}

.nav-tabs > li.active > a span.round-tabs{
    background: #fafafa;
}
.nav-tabs > li {
    width: 20%;
}
/*li.active:before {
    content: " ";
    position: absolute;
    left: 45%;
    opacity:0;
    margin: 0 auto;
    bottom: -2px;
    border: 10px solid transparent;
    border-bottom-color: #fff;
    z-index: 1;
    transition:0.2s ease-in-out;
}*/
li:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #ddd;
    transition:0.1s ease-in-out;
    
}
li.active:after {
    content: " ";
    position: absolute;
    left: 45%;
   opacity:1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #ddd;
    
}
.nav-tabs > li a{
   width: 70px;
   height: 70px;
   margin: 20px auto;
   border-radius: 100%;
   padding: 0;
}

.nav-tabs > li a:hover{
    background: transparent;
}

.tab-content{
}
.tab-pane{
   position: relative;
padding-top: 50px;
}
.tab-content .head{
    font-family: 'Roboto Condensed', sans-serif;
    font-size: 25px;
    text-transform: uppercase;
    padding-bottom: 10px;
}
.btn-outline-rounded{
    padding: 10px 40px;
    margin: 20px 0;
    border: 2px solid transparent;
    border-radius: 25px;
}

.btn.green{
    background-color:#5cb85c;
    /*border: 2px solid #5cb85c;*/
    color: #ffffff;
}



@media( max-width : 585px ){
    
    .board {
width: 90%;
height:auto !important;
}
    span.round-tabs {
        font-size:16px;
width: 50px;
height: 50px;
line-height: 50px;
    }
    .tab-content .head{
        font-size:20px;
        }
    .nav-tabs > li a {
width: 50px;
height: 50px;
line-height:50px;
}

li.active:after {
content: " ";
position: absolute;
left: 35%;
}

.btn-outline-rounded {
    padding:12px 20px;
    }
}

            </style>
            
            
            
            
            
            
            
            
            <script>
			$( document ).ready(function() {
// Handler for .ready() called.
$("#myTab>li a").mouseover(function(){
	$('.nav_cust').removeClass('active');
 $(this).parent().addClass('active');
 	$('.tab-content .fade').removeClass('active');
	$('.tab-content .fade').removeClass('in');
	$($(this).attr('href')).addClass('in active');
 
 
}); 
});
            
            </script>
            
            
            
            
            
              <!-- Grid 12 Menu -->
              <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Grid<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li >
                     <div>
                     
                     
                     
                     <div class="board">
                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                    <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                    <div class="liner"></div>
                     <li class="active nav_cust">
                     <a href="#home" data-toggle="tab" title="welcome" >
                      <span class="round-tabs one">
                              technical
                      </span> 
                  </a></li>

                  <li  class="nav_cust"><a href="#profile" data-toggle="tab" title="profile">
                     <span class="round-tabs two">
                         <i class="glyphicon glyphicon-user"></i>
                     </span> 
           </a>
                 </li>
                 <li class="nav_cust"><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                     <span class="round-tabs three">
                          <i class="glyphicon glyphicon-gift"></i>
                     </span> </a>
                     </li>

                     <li class="nav_cust"><a href="#settings" data-toggle="tab" title="blah blah">
                         <span class="round-tabs four">
                              <i class="glyphicon glyphicon-comment"></i>
                         </span> 
                     </a></li>

                     <li class="nav_cust"><a href="#doner" data-toggle="tab" title="completed">
                         <span class="round-tabs five">
                              <i class="glyphicon glyphicon-ok"></i>
                         </span> </a>
                     </li>
                     
                     </ul></div>

                     <div class="tab-content">
                      <div class="tab-pane fade in active" id="home">

                          <h3 class="head text-center">Welcome to Bootsnipp<sup>™</sup> <span style="color:#f48260;">♥</span></h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="profile">
                          <h3 class="head text-center">Create a Bootsnipp<sup>™</sup> Profile</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> create your profile <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                          
                      </div>
                      <div class="tab-pane fade" id="messages">
                          <h3 class="head text-center">Bootsnipp goodies</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="settings">
                          <h3 class="head text-center">Drop comments!</h3>
                          <p class="narrow text-center">
                              Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
                          </p>
                          
                          <p class="text-center">
                    <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                </p>
                      </div>
                      <div class="tab-pane fade" id="doner">
  <div class="text-center">
    <i class="img-intro icon-checkmark-circle"></i>
</div>
<h3 class="head text-center">thanks for staying tuned! <span style="color:#f48260;">♥</span> Bootstrap</h3>
<p class="narrow text-center">
  Lorem ipsum dolor sit amet, his ea mollis fabellas principes. Quo mazim facilis tincidunt ut, utinam saperet facilisi an vim.
</p>
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
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Offset<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="grid-demo">
                    <div class="row">
                      <div class="col-sm-4">4</div>
                      <div class="col-sm-4 col-sm-offset-4">4 offset 4</div>
                    </div>
                    <div class="row">
                      <div class="col-sm-3 col-sm-offset-3">3 offset 3</div>
                      <div class="col-sm-3 col-sm-offset-3">3 offset 3</div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">6 offset 6</div>
                    </div>
                  </li>
                </ul>
              </li>
              <!--Aside Menu 
              -->
              <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Aside<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="grid-demo">
                    <div class="row">
                      <div class="col-sm-3"><br>
                        <h3>3</h3><br>
                      </div>
                      <div class="col-sm-9"><br>
                        <h3>9</h3><br>
                      </div>
                    </div>
                  </li>
                </ul>
              </li>
              <!--Nesting Menu 
              -->
              <li class="dropdown yamm-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Nesting<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="grid-demo">
                    <div class="row">
                      <div class="col-sm-12">12</div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">12
                        <div class="row">
                          <div class="col-sm-4">4</div>
                          <div class="col-sm-4">4</div>
                          <div class="col-sm-4">4</div>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                </ul>
              </li>
              <li>
            <span class="btn btn-danger btn-sm online_assment red-btn" href="#contact">Online Assessment</span>
            </li>
            </ul>
          </div>
        </div>
      </div>
</div>
