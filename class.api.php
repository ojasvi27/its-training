<?php
class api{
var $status;
var $status_time;

// construct
function __construct(){
$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}


function logger(){

$myfile = fopen("log.txt", "a") or die("Unable to open file!");
$path_parts = pathinfo($_SERVER['REQUEST_URI']);
$txt =json_encode($_SERVER['REQUEST_URI']);
$txt.="\n REMOTE_ADDR".$_SERVER['REQUEST_URI'];
$txt.="\n HTTP_REFERER (blank if internal)".$_SERVER['HTTP_REFERER'];

$txt.="\n REMOTE_ADDR user address".$_SERVER['REMOTE_ADDR'];


$txt.="\n date ==".date('d-M-Y h:i:s').$path_parts['filename'];
$txt.="\n-------------------------------------------------------------------------------------------------------------------\n";
fwrite($myfile, $txt);
fclose($myfile);
if($_REQUEST[q]){

return false;
}else{
return $path_parts['filename'];
}

}

function search($q){





	//echo "you searched for : ".q;
	$sql="select * from ".TBL_COURSE_NAME." where name like '%".$q."%' ";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			$i=0;
				while($row= $this->db->fetch_array($result))
				{
						?>
                        <div class="col-md-12">
                        <a href="http://itstraining.in/course.php?id=<?php echo $row['id']; ?>"><h4>Course : <?php echo $row['name']; ?></h4></a>
                        
                        <p style="color:#000;">
                        <?php echo substr(strip_tags($row['brief']),0,300)."..."; ?>
                        <a href="course.php?id=<?php echo $row['id']; ?>">View </a>
                        
                        </p>
                        
                        <hr />
                        </div>
                        <?php
					
					$i++;
				}
				
			if($i>0){
				//echo "sdsd";
				return true;
			}else{
				//echo "----------------------";
				
				return false;
			}
	}

function get_topics()
{

$sql="select * from ".TBL_COURSES." where 1";
$result= $this->db->query($sql,__FILE__,__LINE__);
?>

<select name="topicid"  class="form-control" id="topicid">
<option value="0" data-courseid="0">-Select Topic-</option>
<?php
while($row= $this->db->fetch_array($result))
{
?>
<option value="<?php echo $row['id'];?>"><?php echo ucfirst($row['name']);?></option>
<?php
} ?>
</select>
<?php
}


function getCourseForpayment($courseid)
{
$sql="select * from ".TBL_COURSE_NAME." inner  join ".TBL_CAT." on ".TBL_CAT.".catid=".TBL_COURSE_NAME.".cat_id where id=".$courseid."";
$result= $this->db->query($sql,__FILE__,__LINE__);
$row= $this->db->fetch_array($result);
?>

 <div class="jumbotron jumbotron-flat">
    <div class="center">
    <form  method="post" accept-charset="utf-8" action="process.php" id="form1" >
         	
    		<table class="table table-bordered">
    			<tbody>
    				<tr>
    					<th>Course</th>
    					<th><?php echo $row['name']; ?></th>
    				</tr>
    				<tr>
    					<th>No of hours</th>
    					<th><?php echo $row['hours']; ?></th>
    				</tr>
    				<tr>
    					<th>Duration </th>
    					<th><?php echo $row['duration']; ?></th>
    				</tr>
    				<tr>
    					<th>Total payment amount  </th>
    					<th>Rs.<?php echo $row['amount']; ?></th>
    				</tr>
    				
		        <tr>
		        	<th>Billing Name	:</th><th>
		        	<input type="text" class="form-control" class="form-control" name="billing_name" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing Address	:</th><th><input type="text" class="form-control" name="billing_address" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing City	:</th><th><input type="text" class="form-control" name="billing_city" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing State	:</th><th><input type="text" class="form-control" name="billing_state" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing Zip	:</th><th><input type="number" class="form-control" name="billing_zip" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing Country	:</th><th><input type="text" class="form-control" name="billing_country" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing Tel	:</th><th><input type="number" class="form-control" name="billing_tel" value="" required/></th>
		        </tr>
		        <tr>
		        	<th>Billing Email	:</th><th><input type="email" class="form-control" name="billing_email" value="" required/></th>
		        </tr>
    			</tbody>
    		</table>

    </div>

    		<div class="pull-left">
    			
    			 <a  class="btn btn-danger" href="cancel.php">Cancel</a>
 
    		</div>
    		<div class="pull-right">

	         		<input type="hidden" name="id" value="<?php echo $courseid; ?>">
	         		<input type="hidden" name="type" value="course">


         		<input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
         		<button  class="btn btn-success" type="submit">Proceed to payment</button>
 			
         	</form>
           </div>
 	   </div>      

<?php 
}

function getpaymentDetailsForWorkshop($worshopid){
$sql="select * ,".TBL_WORKSHOP.".amount as amt from ".TBL_WORKSHOP."  ";
		$sql.="inner join ".TBL_CITY." on ".TBL_WORKSHOP.".cityid=".TBL_CITY.".city_id ";
		$sql.="inner join ".TBL_CAT." on ".TBL_WORKSHOP.".catid=".TBL_CAT.".catid ";
		
		$sql.="inner join ".TBL_COURSE_NAME." on ".TBL_WORKSHOP.".courseid=".TBL_COURSE_NAME.".id where worshopid=".worshopid."";
$result= $this->db->query($sql,__FILE__,__LINE__);
$row= $this->db->fetch_array($result);
?>

 <div class="jumbotron jumbotron-flat">
    <div class="center">
    <form  method="post" accept-charset="utf-8" action="process.php"  id="form1" >
         	
    		<table class="table table-bordered">
    			<tbody>
    				<tr>
    					<th>workshop</th>
    					<th><?php echo $row['name']; ?></th>
    				</tr>
    				<tr>
    					<th>Location </th>
    					<th><?php echo $row['location']; ?></th>
    				</tr>
    				<tr>
    					<th>Duration </th>
    					<th><?php echo $row['duration']; ?></th>
    				</tr>
    				<tr>
    					<th>Total payment amount  </th>
    					<th>Rs.<?php echo $row['amt']; ?></th>
    				</tr>
    				
		        <tr>
		        	<th>Billing Name	:</th><th>
		        	<input type="text" class="form-control" class="form-control" name="billing_name" value="Charli"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Address	:</th><th><input type="text" class="form-control" name="billing_address" value="Room no 1101, near Railway station Ambad"/></th>
		        </tr>
		        <tr>
		        	<th>Billing City	:</th><th><input type="text" class="form-control" name="billing_city" value="Indore"/></th>
		        </tr>
		        <tr>
		        	<th>Billing State	:</th><th><input type="text" class="form-control" name="billing_state" value="MH"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Zip	:</th><th><input type="text" class="form-control" name="billing_zip" value="425001"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Country	:</th><th><input type="text" class="form-control" name="billing_country" value="India"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Tel	:</th><th><input type="text" class="form-control" name="billing_tel" value="9999999999"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Email	:</th><th><input type="text" class="form-control" name="billing_email" value="test@test.com"/></th>
		        </tr>
    			</tbody>
    		</table>

    </div>

    		<div class="pull-left">
    			
    			 <a  class="btn btn-danger" href="cancel.php">Cancel</a>
 
    		</div>
    		<div class="pull-right">

	         		<input type="hidden" name="id" value="<?php echo $courseid; ?>">
	         		<input type="hidden" name="type" value="workshop">


         		<input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
         		<button  class="btn btn-success" type="submit">Proceed to payment</button>
 			
         	</form>
           </div>
 	   </div>      

<?php 



}

function getPaymentsDetails($array){
							$insert_sql_array = array();
							$insert_sql_array['dump'] = json_encode ($array);
							$insert_sql_array['biller_name'] = $array[billing_name];
							
							$insert_sql_array['transactionId']=time();
							$this->db->insert(TBL_PAYMENTS,$insert_sql_array);

							$x=$this->db->last_insert_id();


							$randvar=$this->getToken(4);
							$update_sql_array = array();
							$update_sql_array['orderId'] = $x.$randvar."_".$insert_sql_array['transactionId'];
							
							
							$this->db->update(TBL_PAYMENTS,$update_sql_array,'paymentid',$x);
							
							$ret=array();
							$ret[tid]=$insert_sql_array['transactionId'];
							$ret[oid]=$update_sql_array['orderId'];
							return $ret;
}


function payment_station_update($rep,$status){

	$update_sql_array = array();
	$update_sql_array['resp'] = json_encode ($rep);
	$update_sql_array['order_status'] = $status;
	
	$this->db->update(TBL_PAYMENTS,$update_sql_array,'orderId',$rep[order_id]);
							
	
}




function left_bar($courseid,$duration,$delivery="Classroom Training / Virtual Training / Onsite Training",$pdf=""){
	
?>

<div class="blog-sidebar">
<div >
  <div class="sidebar-module sidebar-module-inset">
  
  <div class="list-group">
  <a href="#" class="list-group-item active" style="font-weight:bold;">
    Classroom
  </a>
  <a href="#" class="list-group-item "> <i class="fa fa-angle-right"></i>Course Code: <?php  echo $courseid;?></a>
  <a href="#" class="list-group-item"><i class="fa fa-angle-right"></i>Duration: <?php  echo $duration;?></a>
   <?php if($pdf!=""){ ?>
  <a href="http://itstraining.in/pdf/?id=<?php echo $pdf;?>" target="_blank" class="list-group-item"><i class="fa fa-angle-right"></i> Course.pdf</a>
  <?php } ?>
  
  <a href="#" class="list-group-item"> <i class="fa fa-angle-right"></i> Delivery Methods :<?php echo $delivery; ?></a>
  
  
  
   
 	 
  	
 
   
  
 
  </div>
   <button class="btn btn-danger btn-sm online_assment red-btn" data-toggle="modal" data-target="#myModal">Register for Course</button>
   <!-- 	<a class="btn btn-success btn-sm online_assment " href="http://www.itstraining.in/course_payments.php?type=course&id=<?php echo $courseid; ?> " >Checkout</a>
    -->
   <!--
   <button class="btn btn-danger btn-sm online_assment red-btn" data-toggle="modal" data-target="#mylogin">Login</button>
   -->
   
  </div>
 </div>




<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <form class="" id="course_registration">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Enquire for Course</h3>
      </div>
      <div class="modal-body">
      <div>  
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Name" id="r_name" name="rname" class="form-control" />
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Email Address" id="r_email" name="remail" class="form-control" />
     </div>
     <div class="form-group">
     <select id="course" class="form-control" name="rcourse" >
     <option value="">-Select-</option>
     
     <?php $this->get_courses_for_registration($courseid); ?>
     
     
     </select> 
     </div>
    
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Phone-No" id="r_mob" name="rmob" class="form-control"/>
     </div>
        
        </div>
       </div>
       
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="submit_Coursereg_form()" >Submit</button>
        </div>
        </form>
    </div>
  </div>
</div>



<div id="mylogin" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
 <div class="modal-dialog">
    <div class="modal-content">
<div class="panel" id="login-widget">
            <form role="form" class="form-horizontal" id="loginform">
               <div class="panel-heading text-center">
                  <h5 class="text-uppercase"><strong>Login to your account</strong></h5>
               </div>
               <div class="panel-body">
                  <label for="login-email">Email</label>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                     <input type="text" class="form-control" placeholder="email" value="" name="email" class="form-control input-lg" id="login-email">  
                  </div>
                  <label for="login-email">Password</label>
                  <div class="input-group">
                     <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                     <input type="password" placeholder="password" name="password" class="form-control input-lg" id="login-password">
                  </div>
               </div>
               <div class="panel-footer text-center">
                  <div class="login-btn">
                     <a class="btn btn-ui btn-lg btn-block mrg-btm-10" href="#"><i class="fa fa-play-circle"></i> Sign In</a>
                     <a href="#"><small>Forgot Username or Password?</small></a>
                  </div>
                  <a class="facebook" href="#"><i class="fa fa-lg fa-facebook-square"></i> Login with Facebook</a>             
               </div>
            </form>
         </div>



</div>
</div>

</div>








<?php
}











function workshop_form(){
?>
<div class="modal fade" id="myworkshop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="" id="work_registration">
      
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" id="myModalLabel">Enquire for Workshop</h3>
      </div>
      
      
      <div class="modal-body">
       
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Name" id="r_name" name="rname" class="form-control" />
      </div>
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Email Address" id="r_email" name="remail" class="form-control" />
     </div>
     <div class="form-group">
     <select id="course" class="form-control" name="rcourse" >
     <option value="">-Select-</option>
     
     <?php $this->get_workshop_for_registration($worshopid); ?>
     
     
     </select> 
     </div>
    
      <div class="form-group">
      <input type="text" class="form-control" placeholder="Phone-No" id="r_mob" name="rmob" class="form-control"/>
     </div>
        
        </div>
        
       
        <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="submit_workshop_form()" >Submit</button>
        </div>
        
        
        
        </form>
    </div>
  </div>
  </div>

<?php
}






















function get_workshop_for_registration($worshopid)
{

$sql="select * from ".TBL_WORKSHOP."  ";
		$sql.="inner join ".TBL_CITY." on ".TBL_WORKSHOP.".cityid=".TBL_CITY.".city_id ";
		$sql.="inner join ".TBL_CAT." on ".TBL_WORKSHOP.".catid=".TBL_CAT.".catid ";
		
		$sql.="inner join ".TBL_COURSE_NAME." on ".TBL_WORKSHOP.".courseid=".TBL_COURSE_NAME.".id ";
		
	$result= $this->db->query($sql,__FILE__,__LINE__);
?>

<?php
while($row= $this->db->fetch_array($result))
{
?>
<option class="cls" value="<?php echo $row['worshopid'];?>" <?php if($worshopid==$row['worshopid']){echo 'selected="selected"';} ?> ><?php echo $row['name'];?></option>
<?php
} ?>

<?php
}




function get_courses_for_registration($courseid)
{

$sql="select * from ".TBL_COURSE_NAME." where 1";
$result= $this->db->query($sql,__FILE__,__LINE__);
?>

<?php
while($row= $this->db->fetch_array($result))
{
?>
<option class="cls" value="<?php echo $row['name'];?>" <?php if($courseid==$row['id']){echo 'selected="selected"';} ?> ><?php echo $row['name'];?></option>
<?php
} ?>

<?php
}

function get_courses()
{

$sql="select * from ".TBL_CONTENT." where 1";
$result= $this->db->query($sql,__FILE__,__LINE__);
?>
<select name="courseid"  class="form-control" id="courseid">
<option value="0" data-courseid="0">-Select-</option>
<?php
while($row= $this->db->fetch_array($result))
{
?>
<option class="cls" value="<?php echo $row['id'];?>" data-courseid="<?php echo $row['courseid'];?>"><?php echo $row['name'];?></option>
<?php
} ?>
</select>
<?php
}	

function get_course_by_courseid($courseid)
{

$sql="select * from ".TBL_COURSE_NAME." inner  join ".TBL_CAT." on ".TBL_CAT.".catid=".TBL_COURSE_NAME.".cat_id where id=".$courseid."";
$result= $this->db->query($sql,__FILE__,__LINE__);
$row= $this->db->fetch_array($result);
return $row;

}
function get_category_for_topic_page($id){
	if($id!="" && $id>0){
		
$sql="select * from ".TBL_CAT."  where catid=".$id."";
$result= $this->db->query($sql,__FILE__,__LINE__);
$row= $this->db->fetch_array($result);
?>
<div class="well">
<div class="row">
<div class="col-md-10">

<h3><?php  echo ucfirst($row['cat_name']);?></h3>
<p align="justify"><?php echo $row['description'];?></p>
</div>
<div class="col-md-2"><img src="<?php  echo $row['url'];?>"  class="img-responsive" /></div>
</div>
</div>
<?php
		}
	
}
function getcity($id=0)
		{
			$this->id=$id;
			$sql="select * from ".TBL_CITY." where 1";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			?>
			<select name="cityid"  id="city_id" class="form-control">
           <option value="0"> select</option>
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					<option <?php if($id==$row['city_id']){ echo 'selected="selected"';} ?>  value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
					<?php
				} ?>
			</select>
			<?php
		}
		function getcourse($courseid=0)
		{
			$this->courseid=$courseid;
			$sql="select * from ".TBL_COURSE_NAME." where 1";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			?>
			<select name="courseid" class="form-control"  id="courseid">
            <option value="0"> select</option>
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					<option <?php if($courseid==$row['id']){ echo 'selected="selected"';} ?>  data-catid="<?php echo $row['cat_id'];?>" value="<?php echo $row['id'];?>"><?php echo substr($row['name'],0,70);?></option>
					<?php
				} ?>
			</select>
			<?php
		}
		
		function getsubcat($catid=0)
		{
			$this->id=$id;
			$sql="select * from ".TBL_CAT." where 1";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			?>
			<select name="catid" class="form-control" id="workshow_cat">
            <option value="0"> select</option>
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					<option <?php if($catid==$row['catid']){ echo 'selected="selected"';} ?> value="<?php echo $row['catid'];?>"><?php echo $row['cat_name'];?></option>
					<?php
				} ?>
			</select>
			<?php
		}
	
	
function getworkshop(){
	
?>
<form method="post">
<table class="table table-bordered table-striped">
  
<tr>
	<td>City</td>
	<td>Category Name</td>
	<td>Course name</td>
	
    <td>Location</td>
	<td>Start date</td>
	<td>End date</td>
	<td>Coordinator</td>
	<td></td>
	
</tr>
<tr>
<td><?php $this->getcity($_REQUEST['cityid']); ?></td>
	<td><?php $this->getsubcat($_REQUEST['catid']); ?></td>
	<td><?php $this->getcourse($_REQUEST['courseid']); ?></td>
	
    <td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><input type="submit"  value="Search" class="btn btn-xs btn-info" name="search" /></td>
	

</tr>
  
  <?php
  
  $sql="select * from ".TBL_WORKSHOP."  ";
		$sql.="inner join ".TBL_CITY." on ".TBL_WORKSHOP.".cityid=".TBL_CITY.".city_id ";
		$sql.="inner join ".TBL_CAT." on ".TBL_WORKSHOP.".catid=".TBL_CAT.".catid ";
		
		$sql.="inner join ".TBL_COURSE_NAME." on ".TBL_WORKSHOP.".courseid=".TBL_COURSE_NAME.".id ";
		
		$sql.="where 1  ";
		if($_REQUEST['cityid']>0){
		$sql.="and ".TBL_WORKSHOP.".cityid=".$_REQUEST['cityid']." ";
		}
		if($_REQUEST['courseid']>0){
		$sql.="and ".TBL_WORKSHOP.".courseid=".$_REQUEST['courseid']." ";
		}
		if($_REQUEST['catid']>0){
		$sql.="and ".TBL_WORKSHOP.".catid=".$_REQUEST['catid']." ";
		}
		$sql.="order by worshopid desc ";
		
$result= $this->db->query($sql,__FILE__,__LINE__);
$i=0;
while($row= $this->db->fetch_array($result)){

?>
<tr>
	<td><?php  echo $row['city_name'];?></td>
	<td><?php  echo $row['cat_name'];?></td>
	<td><?php  echo $row['name'];?></td>
	
    <td><?php  echo $row['location'];?></td>
	<td><?php  echo date("d-M-y",strtotime($row['sdate']));?></td>
	<td><?php  echo date("d-M-y",strtotime($row['edate']));?></td>
	<td><?php  echo $row['coordinator'];?></td>
	<td><button class="btn btn-danger btn-sm online_assment red-btn" data-toggle="modal" type="button" data-target="#myworkshop">Register</button></td>
	<td><!-- <a  href="http://www.itstraining.in/workshop_payments.php?id=<?php echo $row['worshopid'];?>" class="btn btn-success btn-sm online_assment " >Checkout</a></td>
	 -->
</tr>

<?php
}
?>
</table>
</form>
<?php	
	}
function get_courses_by_category($id=19)
{
$sql="select * from ".TBL_COURSE_NAME." inner join ".TBL_CAT." on 
".TBL_CAT.".catid=".TBL_COURSE_NAME.".cat_id
where catid=".$id." order by name desc";
$result= $this->db->query($sql,__FILE__,__LINE__);
$i=0;
while($row= $this->db->fetch_array($result)){

$arr[$i++]=$row;
}
$b[0]="";
return $b[1]=$arr;

}
function get_cat_forpage()
{

$sql="select * from ".TBL_CAT." where 1 ";
$result= $this->db->query($sql,__FILE__,__LINE__);

while($row= $this->db->fetch_array($result)){
?>
<div class="col-md-3">
<div style="height:500px;">
<div class="panel panel-default">
<div class="panel-heading">
<h4><?php echo ucfirst($row['cat_name']); ?></h4>
</div>
<div class="panel-body"> <img src="<?php echo $row['url']; ?>"  width="100" /><br />
<div style="height:200px; ">
<p  align="justify" > <?php echo $row['description']; ?></p>
</div>
<div class="clearfix"></div>
<a class="btn btn-danger btn-sm online_assment red-btn " href="http://itstraining.in/topic.php?topicid=<?php echo $row['catid']; ?>"> View Course</a> </div>
</div>
</div>
</div>
<?php 
}
}

function get_cat($type)
{

$sql="select * from ".TBL_CAT." where type=".$type." order by cat_name asc";
$result= $this->db->query($sql,__FILE__,__LINE__);

while($row= $this->db->fetch_array($result)){
?>
<?php


$this->get_course($row['catid'],$row['cat_name']);
?>
<?php 
}


}
function get_course($catid,$name)
{
?>
<div class="m_grid col-md-2">
<h5><?php echo ucfirst($name); ?></h5>
<ul>
<?php
$i=1;
$sql="select * from ".TBL_COURSE_NAME." where cat_id=".$catid." ";
$result= $this->db->query($sql,__FILE__,__LINE__);
while($row= $this->db->fetch_array($result)){
$i++;
if($i<5){
?>
<li>
<!-- <a href="http://www.itstraining.in/its/course.php?id=<?php echo $row['id'];?>&course=<?php echo str_replace(" ",'_',strtolower (strip_tags($row['name'])));?>.html">
 -->
<a href="http://www.itstraining.in/id/<?php echo $row['id'];?>/course/<?php echo str_replace(" ",'_',strtolower (strip_tags($row['name'])));?>.html"> 

<?php

echo ucfirst(substr($row['name'],0,20));
?>
</a></li>
<?php
}
}
?>
<li> <a href="http://itstraining.in/topic.php?topicid=<?php echo $catid; ?>">more >> </a></li>
</ul>
</div>
<?php


}
function get_all_rooms()
{

 $sql="select * from ".TBL_CITY." where 1  ";
$result= $this->db->query($sql,__FILE__,__LINE__);
while($row= $this->db->fetch_array($result)){
?>
<li class="col-sm-3">
<ul>
<li class="dropdown-header"><a href="city.php?id=<?php echo ucfirst($row[city_id]); ?>">
<h5><?php echo ucfirst($row[city_name]); ?></h5>
</a></li>
</ul>
</li>
<?php
}

}


function get_city($id){

$sql="select * from ".TBL_CITY." where city_id=".$id."  ";
$result= $this->db->query($sql,__FILE__,__LINE__);
$row= $this->db->fetch_array($result);
?>
<div class="col-md-9">
<h2><?php echo $row['city_name']; ?></h2>
<div class="well"><?php echo $row['description']; ?></div>

<div class="col-md-12">
<p align="justify">
<?php 
$ix=1;
$sql="select * from ".TBL_ROOM." where city_id=".$id."  ";
$result= $this->db->query($sql,__FILE__,__LINE__);
while($row= $this->db->fetch_array($result))
{
?>
<p align="justify">
<h3>Venue <?php echo $ix++; ?></h3>
<?php echo $row['address']; ?>
</p>
<?php $this->get_images_for_room($row['roomid']); ?>
<hr />
<?php } ?>
<span class="btn btn-danger online_assment red-btn" data-toggle="modal" data-target="#tr_form">Contact For more info</span> </div>






</div>
<div class="col-md-3">
<ul class="list-group">
<li  class="list-group-item active" >
    Centers
  </li>
<?php 
$sql="select * from ".TBL_CITY." where 1";
$result= $this->db->query($sql,__FILE__,__LINE__);
while($row= $this->db->fetch_array($result))
{
?>
<li class="list-group-item "><a href="http://itstraining.in/city.php?id=<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></a></li>
<?php
} ?>
	</ul>		
</div>
<!--

<div class="clearfix"></div>
<hr />
<div>
<h4> Our Courses 
<?php //echo $row['faculty']; ?>
</h4>
<div class="panel" style="background:none repeat scroll 0 0 #e96656; padding:10px; ">
   <div id="users">
 
<form   >
<input class="form-control input-box search" style="width:80%" type="text" class="form-control"  data-sort="list_filter" id="search" />
<button class="btn btn-default pull-right custom-button red-btn-white wow fadeInLeft animated animated sort" type="button" >Search</button>
</form>
</div>
<?php // $this->get_courses_for_city($id); ?>


</div>-->
<?php 



}


function get_courses_for_city($cityid){
	?>
    <ul class=" list list-group" id="serach_list" >
<?php
$sql="select * from ".TBL_CITY_MAP."
inner join  ".TBL_COURSE_NAME." on ".TBL_COURSE_NAME.".id=".TBL_CITY_MAP.".courseid

where ".TBL_CITY_MAP.".city_id=".$cityid." ";
$result= $this->db->query($sql,__FILE__,__LINE__);
while($row= $this->db->fetch_array($result)){
?>
<li class="list-group-item list_filter"> <?php echo $row['name']; ?> <span class="pull-right"><a  class="label label-danger"  href="http://itstraining.in/course.php?id=<?php  echo $row['id'];?>">View Course</a></span> </li>
<?php } ?>
</ul>
    <?php
}

function get_images_for_room($roomid){
?>
<div class="well">
<div class="row">

<?php
$sql=" select * from ".TBL_IMG_MAP." where isdel=0 and roomid=".$roomid."";
$result= $this->db->query($sql,__FILE__,__LINE__);
while($row= $this->db->fetch_array($result)){
?>
<div  class="col-md-4"> <span class="lite_box" data-footer="<?php echo $row['text_bottom']; ?>" data-gallery="multiimages"  data-title="<?php echo $row['text_top']; ?>" data-toggle="lightbox" data-href="http://itstraining.in/<?php echo $row['image_url']; ?>"> <img class="img-thumbnail " src="http://itstraining.in/<?php  echo $row['image_url']; ?>" width="150px"  > </span> </div>
<?php } ?>
</div>
</div>
<?php			
}

function print_header_for_seo($page_type,$id){
	if($page_type!=""){
	switch($page_type){
		case 'index':
				$sql=" select * from ".TBL_SEO." where page_type='index' order by id desc limit 0,1";
				$result= $this->db->query($sql,__FILE__,__LINE__);
				$row= $this->db->fetch_array($result);
				
				?>
                <title><?php echo $row['title'] ?></title>

				<meta name="description" content="<?php echo $row['description'] ?>">
				<meta name="keywords" content="<?php echo $row['keywords'] ?>">
				<meta name="author" content="<?php echo $row['author'] ?>">
                
                
                <?php
		
		break;
		case 'city':
				if($id!=""){
				 $sql=" select * from ".TBL_SEO." where page_type='city' and pageid=".$id." order by id desc limit 0,1";
				$result= $this->db->query($sql,__FILE__,__LINE__);
				$row= $this->db->fetch_array($result);
				
				?>
                <title><?php echo $row['title'] ?></title>

				<meta name="description" content="<?php echo $row['description'] ?>">
				<meta name="keywords" content="<?php echo $row['keywords'] ?>">
				<meta name="author" content="<?php echo $row['author'] ?>">
                
                <?php
				}
		break;		
		case 'topic':
				if($id!=""){
				 $sql=" select * from ".TBL_SEO." where page_type='topic' and pageid=".$id." order by id desc limit 0,1";
				$result= $this->db->query($sql,__FILE__,__LINE__);
				$row= $this->db->fetch_array($result);
				
				?>
                <title><?php echo $row['title'] ?></title>

				<meta name="description" content="<?php echo $row['description'] ?>">
				<meta name="keywords" content="<?php echo $row['keywords'] ?>">
				<meta name="author" content="<?php echo $row['author'] ?>">
                
                
                
                <?php
				}
		break;		
		case 'course':
				if($id!=""){
				 $sql=" select * from ".TBL_SEO." where page_type='course' and pageid=".$id." order by id desc limit 0,1";
				$result= $this->db->query($sql,__FILE__,__LINE__);
				$row= $this->db->fetch_array($result);
				
				?>
                <title><?php echo $row['title'] ?></title>

				<meta name="description" content="<?php echo $row['description'] ?>">
				<meta name="keywords" content="<?php echo $row['keywords'] ?>">
				<meta name="author" content="<?php echo $row['author'] ?>">
                
                <?php
				}
		break;		
				
		default:
		
		break;
		
	}
		}
	
}


function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd >= $range);
    return $min + $rnd;
}

function getToken($length)
{
    $characters = 'defghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// class ends here	

}
?>