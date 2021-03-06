<?php

class class_rooms{
	
	var $course_id;
	var $course_name;
	var $subcategory_id;
	var $subcategory_name;
	var $validity;
	var $Form;
	var $db;
	var $tabName;
	var $pagename;
	
	

	
	
	function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->validity = new ClsJSFormValidation();
		$this->Form = new ValidateForm();	
	}
	
	
			
		function getcity($id=0)
		{
			$this->id=$id;
			$sql="select * from ".TBL_CITY." where 1";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			?>
			<select name="city_id"  id="city_id">
            <option> select</option>
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					<option <?php if($id!=0){ echo 'selected="selected"';} ?>  value="<?php echo $row['city_id'];?>"><?php echo $row['city_name'];?></option>
					<?php
				} ?>
			</select>
			<?php
		}
		function getsubcat()
		{
			$this->id=$id;
			$sql="select * from ".TBL_SUBSECTION." where 1";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			?>
			<select name="subcat">
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
					<?php
				} ?>
			</select>
			<?php
		}
	
	
	function Add_record($runat)
	{
		switch($runat){
			case 'local' :
							if(count($_POST)>0 and $_POST['submit']=='Submit'){
								extract($_POST);
							
							$this->topic=$topic; 
							$this->yes=$yes; 						
							$this->no=$no;
							$this->maybe=$maybe; 
								
							}
						$FormName = "frm_add_record";
						$ControlNames=array("heading"=>array('heading',"''","Please enter heading. ","span_heading")
											);

						//$ValidationFunctionName="CheckAddRecordValidity";
					
						//$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						//echo $JsCodeForFormValidation;
						

						?>
						<div class="onecolumn">
							<div class="header">
								<span>Rooms</span>
								
							<div class="switch" style="width:300px">
									<table width="300px" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td><a href="rooms.php?invex=viewAll">
												<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>			
												</a>
											</td>
											<td><a href="rooms.php?index=SearchRecord">
												<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
												</a>
											</td>
											<td>
												<input type="button" id="chart_line" name="chart_line" class="right_switch active" value="Add New" style="width:100px" />
												
											</td>
										</tr>
									</tbody>
									</table>
								</div>	
							</div>
							<br class="clear"/>
							<div class="content">
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
						
						<table class="data" width="100%">
						<tr><td>&nbsp;</td></tr>
						
                        <tr>
						 	 <th>city </th>
						 	 <td><?php $this->getcity(); ?>
                             <span id="span_heading"></span></td>
						 </tr>
                        
                        
						<tr>
						 	 <th>Faculty </th>
						 	 <td><input type="text" name="faculty" id="faculty" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 
						 
						 <tr>
						 	 <th>Contact
						 	 <td><input type="text" name="contact_person"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 
						  <tr>
						 	 <th>Address: </th>
						 	 <td><textarea name="address" id="address" ></textarea></td>
						 </tr>	
						 <tr>
						  	  <td colspan="2"><input type="submit" name="submit" value="Submit" 
							  onclick="return <?php echo $ValidationFunctionName;?>()">
							  &nbsp;
							   <input type="button" onclick="javascript: history.go(-1); return false" 
							  name="cancel" value="Cancle" />
							  </td>
					      </tr>		  
							  
						</table>
						
						</form>
						</div>
						</div>
					
						<br class="clear"/>
						<?php
						break;
			case 'server' :	
							extract($_POST);
							$this->faculty=$faculty;
							$this->city_id=$city_id;
							$this->contact_person=$contact_person;
							$this->address=$address;
							
							
							$return =true;
							if($return){
							$insert_sql_array = array();
							$insert_sql_array['faculty'] = $this->faculty;
							$insert_sql_array['city_id'] = $this->city_id;
							$insert_sql_array['contact_person'] = $contact_person;
							$insert_sql_array['address'] = $address;
							
							$this->db->insert(TBL_ROOM,$insert_sql_array);
							
							$_SESSION['msg']='Record has been added successfully';
							?>
							<script type="text/javascript">
								window.location = "rooms.php?index=addRecord"
							</script>
							<?php
							exit();
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->Add_record('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
							
		}
	}
	
	
	function showAllRecord()
	{
		
		$sql="select * from ".TBL_ROOM."  ";
		$sql.="inner join ".TBL_CITY." on ".TBL_ROOM.".city_id=".TBL_CITY.".city_id ";
		$sql.="where 1 order by roomid desc ";
		
		$resultpages= $this->db->query($sql,__FILE__,__LINE__);
		
		if($_REQUEST['pg'])
		{
			$st= ($_REQUEST['pg'] - 1) * 10;
			$sql.=" limit ".$st.",10 ";	
			$x=(($_REQUEST['pg'] - 1)*10)+1;
			$pgr=$_REQUEST['pg'];
		}
		if($_REQUEST['pg'] == '')
		{
			$sql.=" limit 0,10 ";
			$x=1;
			$pgr=1;
		}	
		$result= $this->db->query($sql,__FILE__,__LINE__);
		$result2= $this->db->query($sql,__FILE__,__LINE__);
		?>
		<div class="onecolumn">
				<div class="header">
					<span>Records List</span>
					
					<div class="switch" style="width:300px">
						<table width="300px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch active" value="View All" style="width:100px"/>
								</td>
								<td><a href="rooms.php?index=SearchRecord">
									<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
									</a>
								</td>
								<td><a href="rooms.php?index=addRecord">
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Add New" style="width:100px" />
									</a>
								</td>
							</tr>
						</tbody>
						</table>
					</div>	
				</div>
				<br class="clear"/>
					
				
				<br class="clear"/>
				<div class="content">
				
				<?php 
				if($_SESSION['groups'] == 'Superadmin')
			 	{
				?>
				<div align="right"> 
				<a href="#" onclick="table2CSV($('#search_table')); return false;"> 
				<img src="images/csv.png"  alt="Export to CSV"  title="Export to CSV" /> 
				</a> 
				</div>
				<?php } ?>
			<form id="form_data" name="form_data" action="" method="post">
			<table class="data" width="100%" cellpadding="0" cellspacing="0" id="search_table">  
			<thead>
			<tr>
				<th width="5%">S.No.</th>
				<th width="10%">Name</th>
                <th width="10%">city</th>
				
				<th width="10%">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php 		
				while($row= $this->db->fetch_array($result))
				{
					
				?>
				<tr>
					<td><?php echo $x;?></td>
					<td><p><?php echo $row['faculty'];?></p></td>
                    <td><?php echo $row['city_name'];?></td>
					
					
					<td><a href="rooms.php?index=RecordView&id=<?php echo $row['roomid'];?>">
					<img src="images/icon_users.png" /></a> | 
                    <a href="rooms.php?index=add_pic&id=<?php echo $row['roomid'];?>">
					add pic</a> 
					<?php if($_SESSION['user_type'] != 'User') {?>
					|  <a href="rooms.php?index=editRecord&id=<?php echo $row['roomid'];?>">
					<img src="images/icon_edit.png"/></a> | 
					<a href="javascript: void(0);" title="Delete" class="help" 
					onclick="javascript: if(confirm('Do u want to delete this Record?')) { dataone.delete_record('<?php echo $row['roomid'];?>',{}) }; return false;" >
					<img src="images/icon_delete.png" /></a>
					<?php } ?></td>
				</tr>			
				<?php 
				$x++;
				}
				?>
			</tbody>	
			</table>
			<br class="clear"/>
			
			
			</form>
			
			<div class="pagination">
			<?php
			$numpages= $this->db->num_rows($resultpages);
			$tmppage = $numpages/10;
			$remndr=$numpages%10;
			if($remndr >= 1)
			{
				$t1=explode('.',$tmppage);
				$lastpage = $t1[0]+1;
			}
			else
			{ $lastpage = $numpages/10; }
			 ?>
				<a href="rooms.php">&laquo;&laquo;</a>
				<a href="rooms.php?pg=<?php echo $pgr-1;?>">&laquo;</a>
				<?php if($pgr == $lastpage && ($pgr-4) >= 1 ) { ?>
				<a href="rooms.php?pg=<?php echo $pgr-4;?>"><?php echo $pgr-4; ?></a>
				<?php } ?>
				<?php if($pgr == $lastpage || $pgr == $lastpage-1) { 
				if(($pgr-3) >= 1){
				?>
				<a href="rooms.php?pg=<?php echo $pgr-3;?>"><?php echo $pgr-3; ?></a>
				<?php } } ?>
				
				<?php $temp0=$pgr-2;
					if($temp0 >= 1) {				
				?>
				<a href="rooms.php?pg=<?php echo $pgr-2;?>"><?php echo $pgr-2;?></a>
				<?php } ?>
				
				<?php $temp1=$pgr-1;
					if($temp1 >= 1) {				
				?>
				<a href="rooms.php?pg=<?php echo $pgr-1;?>"><?php echo $pgr-1;?></a>
				<?php } ?>
				
				<a href="rooms.php?pg=<?php echo $pgr;?>" class="active"><?php echo $pgr;?></a>
				
				<?php $temp2=$pgr+1;
					if($temp2 <= $lastpage) {				
				?>
				<a href="rooms.php?pg=<?php echo $pgr+1;?>"><?php echo $pgr+1;?></a>
				<?php } ?>
				<?php $temp3=$pgr+2;
					if($temp3 <= $lastpage) {				
				?>
				<a href="rooms.php?pg=<?php echo $pgr+2;?>"><?php echo $pgr+2;?></a>
				<?php } ?>
				
				<?php if($pgr == 1 || $pgr == 2) { 
				if(($pgr+3) <= $lastpage) {
				?>
				<a href="rooms.php?pg=<?php echo $pgr+3;?>"><?php echo $pgr+3; ?></a>
				<?php } } ?>
				<?php if($pgr == 1 && ($pgr+4) <= $lastpage) { ?>
				<a href="rooms.php?pg=<?php echo $pgr+4;?>"><?php echo $pgr+4; ?></a>
				<?php } ?>
				
				<a href="rooms.php?pg=<?php echo $pgr+1;?>">&raquo;</a>
				<a href="rooms.php?pg=<?php echo $lastpage;?>">&raquo;&raquo;</a>
			</div>
			
			<div align="right">Total Pages - <?php echo $lastpage;?></div>
			<div align="right">Total Records - <?php echo $numpages;?></div>
			</div>
			</div>
		<?php 
	}
	
	function RecordView($runat,$id)
	{
		$this->id=$id;
		switch($runat){
			case 'local' :
							
						$FormName = "frm_update_followupdate";
						$ControlNames=array(
							"next_follow_up_date"=>array('next_follow_up_date',"''","Please enter Next Follow Up Date. ","span_next_follow_up_date")
											);

						$ValidationFunctionName="CheckaddnValidity";
					
						$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						echo $JsCodeForFormValidation;
						
						$sql="select * from ".TBL_ROOM." where roomid='".$this->id."'";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						$row= $this->db->fetch_array($result)
						?>
						<div class="onecolumn">
							<div class="header">
								<span>Product  Detail</span>
								
							<div class="switch" style="width:300px">
									<table width="300px" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td><a href="rooms.php">
												<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>
												</a>
											</td>
											
											<td><a href="rooms.php?index=SearchRecord">
												<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
												</a>
											</td>
											
											<td><a href="rooms.php?index=addRecord">
												<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Add New" style="width:100px" />
												</a>
											</td>
										</tr>
									</tbody>
									</table>
								</div>	
										
							</div>
							<br class="clear"/>
							<div class="content">
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
						
						<table class="data" width="100%">
						  <tr><td colspan="2">&nbsp;</td></tr>
						 						 
						  	  
					<tr>
					<th>Faculty: </th> 
					<td><p><?php echo $row['faculty'];?></p></td>
					</tr>
					
					<tr>
					<th>Address: </th> 
					<td><p><?php echo $row['address'];?></p></td>
					</tr>
					
					
					
					
						</table>
						</form>
						</div>
						</div>
					
						<br class="clear"/>
						<?php
						break;
			case 'server' :	
							extract($_POST);
							
							$this->name=$name;
							$this->description=$description; 
							$this->production=$production; 
							$this->heading=$heading;
							$this->wash=$wash; 
							$this->shipping=$shipping; 
							$this->price=$price;
							$this->retail=$retail; 
							$this->directory=$directory; 
							
							$update_sql_array = array();
							$update_sql_array['news'] = $this->news;
							$update_sql_array['headline'] = $this->headline;
							
							$this->db->update(NEWS_UPDATES,$update_sql_array,'news_id',$this->news_id);
							$_SESSION['msg']='News has been Updated successfully';
							?>
							<script type="text/javascript">
								window.location = "NewsUpdates.php"
							</script>
							<?php							
							break;
			default 	: 
							echo "Wrong Parameter passed";
							
		}
	}
	
	function RecordSearchBox()
	{
		?>
			
			<div id="searchboxbg">
			<form action="rooms.php?index=SearchRecord" id="search_form" name="search_form" method="post">
				<table width="100%" class="data">
				
				<tr>
				<th>Name :</th>
				<td><input type="text" id="name" name="name" title="Search name"  value="<?php echo $_REQUEST['name'];?>"/></td>
				
				<tr>
				<th colspan="4"><input type="submit" name="search" id="search" value="Search" /></th>
				</tr>
				</table>			
			</form>
			</div>
		
			<br class="clear"/>
		<?php 
	}
	
	function SearchRecord($name='')
	{
		
		$sql="select * from ".TBL_ROOM." where 1 ";
		 
		if($name)
		{
			$sql .= " and name like '".$name."%'";
		}
		
		$sql .= " order by id desc ";
		
		$resultpages= $this->db->query($sql,__FILE__,__LINE__);
		
		if($_REQUEST['pg'])
		{
			$st= ($_REQUEST['pg'] - 1) * 10;
			$sql.=" limit ".$st.",10 ";	
			$x=(($_REQUEST['pg'] - 1)*10)+1;
			$pgr=$_REQUEST['pg'];
		}
		if($_REQUEST['pg'] == '')
		{
			$sql.=" limit 0,10 ";
			$x=1;
			$pgr=1;
		}	
		
		//echo $sql;
		
		$result= $this->db->query($sql,__FILE__,__LINE__);
		
		?>
		<div class="onecolumn">
				<div class="header">
					<span>Record Search</span>
					
					<div class="switch" style="width:300px">
						<table width="300px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td><a href="rooms.php">
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>
									</a>
								</td>
								
								<td>
									<input type="button" id="chart_line" name="chart_line" class="middle_switch active" value="Search" style="width:100px" />
								</td>
								
								<td><a href="rooms.php?index=addRecord">
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Add New" style="width:100px" />
									</a>
								</td>
							</tr>
						</tbody>
						</table>
					</div>	
					
				</div>
				<br class="clear"/>
					
				
				<br class="clear"/>
				<?php $this->RecordSearchBox(); ?>
				<div class="content">
				
			<?php 
			if($_SESSION['groups'] == 'Superadmin')
			{
			?>	
			<div align="right"> 
				<a href="#" onclick="table2CSV($('#search_table')); return false;"> 
				<img src="images/csv.png"  alt="Export to CSV"  title="Export to CSV" /> 
				</a> 
			</div>	
			<?php } ?>
			<form id="form_data" name="form_data" action="" method="post">
			
			<table class="data" width="100%" cellpadding="0" cellspacing="0" id="search_table">  
			<thead>
			<tr>
				<th width="5%">S.No.</th>
				<th width="33%">name</th>
				<th width="14%">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php 		
				while($row= $this->db->fetch_array($result))
				{
					
				?>
				<tr>
					<td><?php echo $x;?></td>
					<td><p><?php echo $row['name'];?></p></td>
					<td><a href="rooms.php?index=RecordView&id=<?php echo $row['id'];?>" title="View" class="help">
					<img src="images/icon_users.png" /></a> 
					<?php if($_SESSION['user_type'] != 'User') {?>
					|  <a href="rooms.php?index=editRecord&id=<?php echo $row['id'];?>" title="Edit" class="help">
					<img src="images/icon_edit.png"/></a> | 
					<a href="javascript: void(0);" title="Delete" class="help" 
					onclick="javascript: if(confirm('Do u want to delete this Record?')) { dataone.delete_record('<?php echo $row['id'];?>',{}) }; return false;" >
					<img src="images/icon_delete.png" /></a>
					<?php } ?></td>
				</tr>		
				<?php 
				$x++;
				}
				if($this->db->num_rows($result)<1)
				{
				?>
				<tr><td colspan="10" align="center">No result</td></tr>
				<?php 
				}
				?>
			</tbody>	
			</table>
			<br class="clear"/>
			
			
			<div class="pagination">
			<?php
			$numpages= $this->db->num_rows($resultpages);
			//echo $numpages;
			$tmppage = $numpages/10;
			$remndr=$numpages%10;
			if($remndr >= 1)
			{
				$t1=explode('.',$tmppage);
				$lastpage = $t1[0]+1;
			}
			else
			{ $lastpage = $numpages/10; }
			 ?>
			
				<a href="rooms.php?index=SearchRecord&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&laquo;&laquo;</a>
				
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr-1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&laquo;</a>
				
				<?php if($pgr == $lastpage && ($pgr-4) >= 1 ) { ?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr-4;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-4; ?></a>
				<?php } ?>
				
				<?php if($pgr == $lastpage || $pgr == $lastpage-1) { 
				if(($pgr-3) >= 1){
				?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr-3;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-3; ?></a>
				<?php } }?>
				
				<?php $temp0=$pgr-2;
					if($temp0 >= 1) {				
				?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr-2;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-2;?></a>
				<?php } ?>
				
				<?php $temp1=$pgr-1;
					if($temp1 >= 1) {				
				?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr-1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-1;?></a>
				<?php } ?>
				
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>" class="active"><?php echo $pgr;?></a>
				
				<?php $temp2=$pgr+1;
					if($temp2 <= $lastpage) {				
				?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr+1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+1;?></a>
				<?php } ?>
				<?php $temp3=$pgr+2;
					if($temp3 <= $lastpage) {				
				?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr+2;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+2;?></a>
				<?php } ?>
				
				<?php if($pgr == 1 || $pgr == 2) { 
				if(($pgr+3) <= $lastpage) {
				?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr+3;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+3; ?></a>
				<?php } }?>
				
				<?php if($pgr == 1 && ($pgr+4) <= $lastpage) { ?>
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr+4;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+4; ?></a>
				<?php } ?>
				
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $pgr+1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&raquo;</a>
				
				<a href="rooms.php?index=SearchRecord&pg=<?php echo $lastpage;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&raquo;&raquo;</a>
			</div>
			</form>
			
			<div align="right">Total Pages - <?php echo $lastpage;?></div>
			<div align="right">Total Records - <?php echo $numpages;?></div>
			
			</div>
			</div>
		<?php 
	}
	
	function edit_record($runat,$id)
	{
		$this->id=$id;
		switch($runat){
			case 'local' :
							if(count($_POST)>0 and $_POST['submit']=='Submit'){
								extract($_POST);
								$this->heading = $heading;
								
							}
						$FormName = "frm_personn";
						$ControlNames=array("heading"=>array('heading',"''","Please enter heading. ","span_heading")
											);

						$ValidationFunctionName="CheckaddnValidity";
					
						$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						echo $JsCodeForFormValidation;
						
						$sql="select * from ".TBL_ROOM." where roomid='".$this->id."'";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						$row= $this->db->fetch_array($result)
						
						?>
						<div class="onecolumn">
							<div class="header">
								<span>Edit Record</span>
								
							<div class="switch" style="width:300px">
						<table width="300px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td><a href="rooms.php">
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>
									</a>
								</td>
								
								<td><a href="rooms.php?index=SearchRecord">
									<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
									</a>
								</td>
								
								<td><a href="rooms.php?index=addRecord">
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Add New" style="width:100px" />
									</a>
								</td>
							</tr>
						</tbody>
						</table>
								</div>	
							</div>
							<br class="clear"/>
							<div class="content">
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
							
                            <table class="data" width="100%">
						<tr><td>&nbsp;</td></tr>
						
                        <tr>
						 	 <th>city </th>
						 	 <td><?php $this->getcity($row['city_id']); ?>
                             <span id="span_heading"></span></td>
						 </tr>
                        
                        
						<tr>
						 	 <th>faculty </th>
						 	 <td><input type="text" name="faculty" id="faculty" value="<?php echo $row['faculty'];?>"   />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 
						 
						 <tr>
						 	 <th>contact
						 	 <td><input type="text" name="contact_person"  value="<?php echo $row['contact_person'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 
						  <tr>
						 	 <th>address: </th>
						 	 <td><textarea name="address" id="address" ><?php echo $row['address'];?></textarea></td>
						 </tr>	
						 <tr>
						  	  <td colspan="2"><input type="submit" name="submit" value="Submit" 
							  onclick="return <?php echo $ValidationFunctionName;?>()">
							  &nbsp;
							   <input type="button" onclick="javascript: history.go(-1); return false" 
							  name="cancel" value="Cancle" />
							  </td>
					      </tr>		  
							  
						</table>
                            
							
						
						</form>
						</div>
						</div>
					
						<br class="clear"/>
						<?php
						break;
			case 'server' :	
							extract($_POST);
							
							$this->city_id=$city_id;
							$this->faculty=$faculty; 
							$this->contact_person=$contact_person;
							$this->address=$address; 
							
							
							
							// server side validation
							$return =true;
							
							
							if($return){
							
							$update_sql_array = array();
							$update_sql_array['city_id'] = $this->city_id;
							$update_sql_array['faculty'] = $this->faculty;
							$update_sql_array['contact_person'] = $this->contact_person;
							$update_sql_array['address'] = $this->address;
							
							
							$this->db->update(TBL_ROOM,$update_sql_array,'roomid',$this->id);
							
							
							
							$_SESSION['msg']='Record has been Updated successfully'.$this->section;
							?>
							<script type="text/javascript">
								window.location = "rooms.php?index=editRecord&id=<?php echo $this->id;?>"
							</script>
							<?php
							exit();
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->edit_record('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
							
		}
	}
	
	function delete_record($id)
	{
		ob_start();
		
		$sql_del = "delete from ".TBL_ROOM." where roomid='".$id."'";
		$this->db->query($sql_del,__FILE__,__LINE__);
		
		$_SESSION['msg']='Record has been deleted successfully';
		?>
		<script type="text/javascript">
		window.location = "<?php echo $_SERVER['PHP_SELF']; ?>"
		</script>
		<?php
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	
	function addpic($runat){
		
		
		switch($runat){
			case 'local' :
							
						$FormName = "frm_add_record";
						$ControlNames=array("heading"=>array('heading',"''","Please enter heading. ","span_heading")
											);

						//$ValidationFunctionName="CheckAddRecordValidity";
					
						//$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						//echo $JsCodeForFormValidation;
						

						?>
						<div class="onecolumn">
							<div class="header">
								<span>Rooms</span>
								
								
							</div>
							<br class="clear"/>
							<div class="content">
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
						
						<table class="data" width="100%">
						<tr><td>&nbsp;</td></tr>
						 <tr>
						 	 <th>Image: </th>
						 	 <td><input name="imgf" type="file" /></td>
						 </tr>
                          <tr>
						 	 <th>text_top: </th>
						 	 <td><input name="text_top" type="text" /></td>
						 </tr>
                          <tr>
						 	 <th>text_top: </th>
						 	 <td><input name="text_bottom" type="text" /></td>
						 </tr>
                         
                          <tr>
						  	  <td colspan="2"><input type="submit" name="submit" value="Submit" 
							  onclick="return <?php echo $ValidationFunctionName;?>()">
							  &nbsp;
							   <input type="button" onclick="javascript: history.go(-1); return false" 
							  name="cancel" value="Cancle" />
							  </td>
					      </tr>		  
							  
						</table>
						
						</form>
						</div>
						</div>
					
						<br class="clear"/>
						<?php
						break;
			case 'server' :	
							extract($_REQUEST);
							
							
							$tmx=time();
							$this->directory="images/"; 
							$this->id=$id;
							
							$tmpname=$_FILES["imgf"]["name"];
							$name= explode('.',$tmpname);
							$tmp=$_FILES["imgf"]["type"];
							$type= explode('/',$tmp);
							
							$path= $cat_name.$tmx.".".$type[1];
							move_uploaded_file($_FILES["imgf"][tmp_name],"../images/rooms/".$path); 
						
							$directory="images/rooms/".$path;
							
							
							
							$return =true;
							if($return){
							$insert_sql_array = array();
							$insert_sql_array['roomid'] = $id;
							$insert_sql_array['image_url'] = $directory;
							$insert_sql_array['text_top'] = $text_top;
							$insert_sql_array['text_bottom'] = $text_bottom;
							
							
							
							$this->db->insert(TBL_IMG_MAP,$insert_sql_array);
							//die("test");
							$_SESSION['msg']='Record has been added successfully';
							?>
							<script type="text/javascript">
								window.location = "rooms.php?index=addRecord"
							</script>
							<?php
							exit();
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->add_pic('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
							
		}
	}
	
		
	
	
	
		
		
	
	
	
	
			
	
	
	
	

}

?>