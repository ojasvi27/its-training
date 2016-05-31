<?php

class class_seo{
	
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
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					
					<input type="checkbox" name="city_id[]" value="<?php echo $row['city_id'];?>" checked="checked"><?php echo $row['city_name'];?><br>

					
					<?php
				} ?>
			
			<?php
		}
		function getcat($id=0)
		{
			$this->id=$id;
			$sql="select * from ".TBL_CAT." where 1";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			?>
			<select name="cat_id" id="cat_id">
				<?php
				while($row= $this->db->fetch_array($result))
				{
					?>
					<option <?php if($id==$row['catid']){ echo 'selected="selected"';} ?>  value="<?php echo $row['catid'];?>"><?php echo $row['cat_name'];?></option>
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
								<span>course</span>
								
							<div class="switch" style="width:300px">
									<table width="300px" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td><a href="seo.php?invex=viewAll">
												<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>			
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
                        <th>page type</th>
                        <td> <select name="page_type">
                        <option value="index">index.php</option>
                        <option value="topic">topic.php</option>
                        
                        <option value="course">course.php</option>
                        <option value="room">room</option>
                        <option value="city">city</option>
                        
                        </select></td>
                        </tr>
                        <tr>
                        <th>page var </th>
                        <td> <select name="page_var">
                        <option value="topicid">topicid</option>
                        <option value="id">id</option>
                        
                        </select></td>
                        </tr>
                        
                        <tr>
						 	 <th>pageid </th>
						 	 <td><input type="text" name="pageid" id="pageid" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
                         <th colspan="2">general</th>
                         </tr>
						<tr>
						 	 <th>description </th>
						 	 <td><input type="text" name="description" id="description" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>keywords </th>
						 	 <td><input type="text" name="keywords" id="keywords" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>author </th>
						 	 <td><input type="text" name="author" id="author" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>title </th>
						 	 <td><input type="text" name="title" id="title" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 <tr>
                         <th colspan="2">fb</th>
                         </tr>
						 <tr>
						 	 <th>fb_type </th>
						 	 <td><input type="text" name="fb_type" id="fb_type" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_first_name </th>
						 	 <td><input type="text" name="fb_first_name" id="fb_first_name" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_last_name </th>
						 	 <td><input type="text" name="fb_last_name" id="fb_last_name" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 
						 <tr>
						 	 <th>fb_username </th>
						 	 <td><input type="text" name="fb_username" id="fb_username" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_title </th>
						 	 <td><input type="text" name="fb_title" id="fb_title" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_description </th>
						 	 <td><input type="text" name="fb_description" id="fb_description" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>	fb_image </th>
						 	 <td><input type="text" name="fb_image" id="fb_image" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	fb_url </th>
						 	 <td><input type="text" name="fb_url" id="fb_url" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	fb_site_name </th>
						 	 <td><input type="text" name="fb_site_name" id="fb_site_name" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         <tr>
						 	 <th>	fb_see_also </th>
						 	 <td><input type="text" name="fb_site_name" id="fb_site_name" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr><tr>
						 	 <th>	fb_admins </th>
						 	 <td><input type="text" name="fb_admins" id="fb_admins" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         <tr>
                         <th colspan="2">twitter </th>
                         </tr>
						 
						 <tr>
						 	 <th>	twitter_card </th>
						 	 <td><input type="text" name="twitter_card" id="twitter_card" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr><tr>
						 	 <th>	twitter_site </th>
						 	 <td><input type="text" name="twitter_site" id="twitter_site" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         <tr>
						 	 <th>	twitter_title </th>
						 	 <td><input type="text" name="twitter_title" id="twitter_title" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>		twitter_desctiption </th>
						 	 <td><input type="text" name="twitter_desctiption" id="twitter_desctiption" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	twitter_creator </th>
						 	 <td><input type="text" name="twitter_creator" id="twitter_creator" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	twitter_img </th>
						 	 <td><input type="text" name="twitter_img" id="twitter_img" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         <tr>
						 	 <th>	twitter_domain </th>
						 	 <td><input type="text" name="twitter_domain" id="twitter_domain" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         <tr>
                         <tr>
                         <th colspan="2">goole plus</th>
                         </tr>
                         </tr>
                         
						  <tr>
						 	 <th>	g_name </th>
						 	 <td><input type="text" name="g_name" id="g_name" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         
						  <tr>
						 	 <th>	g_description </th>
						 	 <td><input type="text" name="g_description" id="g_description" value=""  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         
						  <tr>
						 	 <th>	g_image </th>
						 	 <td><input type="text" name="g_image" id="g_image" value=""  />
							 	<span id="span_heading"></span></td>
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
							$this->page_type=$page_type;
							$this->description=$description;
							$this->keywords=$keywords;
							$this->author=$author;
							$this->title=$title;
							$this->fb_type=$fb_type;							
							$this->fb_first_name=$fb_first_name;
							$this->fb_last_name=$fb_last_name;
							$this->fb_username=$fb_username;
							$this->fb_title=$fb_title;
							$this->fb_description=$fb_description;
							$this->fb_image=$fb_image;
							$this->fb_url=$fb_url;
							$this->fb_site_name=$fb_site_name;
							$this->fb_see_also=$fb_see_also;
							$this->fb_admins=$fb_admins;
							
							$this->twitter_card=$twitter_card;
							$this->twitter_site=$twitter_site;
							$this->twitter_title=$twitter_title;
							$this->twitter_desctiption=$twitter_desctiption;
							$this->twitter_creator=$twitter_creator;
							$this->twitter_img=$twitter_img;
							$this->twitter_domain=$twitter_domain;
							$this->g_name=$g_name;
							$this->g_image=$g_image;
							$this->g_description=$g_description;
							
							$this->pageid=$pageid;
							
							
							
							$return =true;
							if($return){
							$insert_sql_array = array();
							
							$insert_sql_array['fb_admins'] = $fb_admins;
							
							$insert_sql_array['twitter_card'] = $twitter_card;
							$insert_sql_array['twitter_site'] = $twitter_site;
							$insert_sql_array['twitter_title'] = $twitter_title;
							$insert_sql_array['twitter_desctiption'] = $twitter_desctiption;
							$insert_sql_array['twitter_creator'] = $twitter_creator;
							
							$insert_sql_array['twitter_img'] = $twitter_img;
							$insert_sql_array['twitter_domain'] = $twitter_domain;
							$insert_sql_array['g_name'] = $g_name;
							$insert_sql_array['g_description'] = $g_description;
							
							$insert_sql_array['g_image'] = $g_image;
							$insert_sql_array['pageid'] = $pageid;
							
							
							$insert_sql_array['fb_image'] = $fb_image;
							$insert_sql_array['fb_url'] = $fb_url;
							$insert_sql_array['fb_site_name'] = $fb_site_name;
							$insert_sql_array['fb_see_also'] = $fb_see_also;
							
							
							
							$insert_sql_array['page_type'] = $this->page_type;
							$insert_sql_array['pageid'] = $pageid;
							$insert_sql_array['description'] = $this->description;
							$insert_sql_array['keywords'] = $keywords;
							$insert_sql_array['author'] = $author;
							$insert_sql_array['title'] = $this->title;
							$insert_sql_array['fb_type'] = $fb_type;
							$insert_sql_array['fb_first_name'] = $fb_first_name;
							$insert_sql_array['fb_last_name'] = $fb_last_name;
							$insert_sql_array['fb_username'] = $fb_username;
							$insert_sql_array['fb_title'] = $fb_title;
							$insert_sql_array['fb_description'] = $fb_description;
							$insert_sql_array['page_var'] = $page_var;
							
							
							
							
							$this->db->insert(TBL_SEO,$insert_sql_array);
							
							
							
							
							$_SESSION['msg']='Record has been added successfully';
							?>
							<script type="text/javascript">
								window.location = "seo.php?index=addRecord"
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
		
		$sql="select * from ".TBL_SEO." where 1 ";
		
		$sql.=" order by id desc ";
		
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
								<td><a href="seo.php?index=SearchRecord">
									<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
									</a>
								</td>
								<td><a href="seo.php?index=addRecord">
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
                <th width="10%">title</th>
				<th width="10%">id</th>
				
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
					<td><p><?php echo $row['page_type'];?></p></td>
                    <td><p><?php echo $row['title'];?></p></td>
					<td><p><?php echo $row['pageid'];?></p></td>
					<td><a target="_blank" href="../<?php echo  $row['page_type'] ?>.php?<?php echo $row['page_var']; ?>=<?php echo $row['pageid'];?>">view </a>
                    |
                    <a href="seo.php?index=editRecord&id=<?php echo $row['id'];?>">
					<img src="images/icon_edit.png"/></a> 
                    
                    </td>
					
					
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
				<a href="seo.php">&laquo;&laquo;</a>
				<a href="seo.php?pg=<?php echo $pgr-1;?>">&laquo;</a>
				<?php if($pgr == $lastpage && ($pgr-4) >= 1 ) { ?>
				<a href="seo.php?pg=<?php echo $pgr-4;?>"><?php echo $pgr-4; ?></a>
				<?php } ?>
				<?php if($pgr == $lastpage || $pgr == $lastpage-1) { 
				if(($pgr-3) >= 1){
				?>
				<a href="seo.php?pg=<?php echo $pgr-3;?>"><?php echo $pgr-3; ?></a>
				<?php } } ?>
				
				<?php $temp0=$pgr-2;
					if($temp0 >= 1) {				
				?>
				<a href="seo.php?pg=<?php echo $pgr-2;?>"><?php echo $pgr-2;?></a>
				<?php } ?>
				
				<?php $temp1=$pgr-1;
					if($temp1 >= 1) {				
				?>
				<a href="seo.php?pg=<?php echo $pgr-1;?>"><?php echo $pgr-1;?></a>
				<?php } ?>
				
				<a href="seo.php?pg=<?php echo $pgr;?>" class="active"><?php echo $pgr;?></a>
				
				<?php $temp2=$pgr+1;
					if($temp2 <= $lastpage) {				
				?>
				<a href="seo.php?pg=<?php echo $pgr+1;?>"><?php echo $pgr+1;?></a>
				<?php } ?>
				<?php $temp3=$pgr+2;
					if($temp3 <= $lastpage) {				
				?>
				<a href="seo.php?pg=<?php echo $pgr+2;?>"><?php echo $pgr+2;?></a>
				<?php } ?>
				
				<?php if($pgr == 1 || $pgr == 2) { 
				if(($pgr+3) <= $lastpage) {
				?>
				<a href="seo.php?pg=<?php echo $pgr+3;?>"><?php echo $pgr+3; ?></a>
				<?php } } ?>
				<?php if($pgr == 1 && ($pgr+4) <= $lastpage) { ?>
				<a href="seo.php?pg=<?php echo $pgr+4;?>"><?php echo $pgr+4; ?></a>
				<?php } ?>
				
				<a href="seo.php?pg=<?php echo $pgr+1;?>">&raquo;</a>
				<a href="seo.php?pg=<?php echo $lastpage;?>">&raquo;&raquo;</a>
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
						
						$sql="select * from ".TBL_SEO." where id='".$this->id."'";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						$row= $this->db->fetch_array($result)
						?>
						<div class="onecolumn">
							<div class="header">
								<span>Course details</span>
								
							<div class="switch" style="width:300px">
									<table width="300px" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
											<td><a href="seo.php">
												<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>
												</a>
											</td>
											
											<td><a href="seo.php?index=SearchRecord">
												<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
												</a>
											</td>
											
											<td><a href="seo.php?index=addRecord">
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
					<th>name: </th> 
					<td><p><?php echo $row['name'];?></p></td>
					</tr>
					
					<tr>
					<th>hours : </th> 
					<td><p><?php echo $row['hours'];?></p></td>
					</tr>
                    
                    
                    <tr>
					<th>iscert: </th> 
					<td><p><?php echo $row['is_cert'];?></p></td>
					</tr>
					
					<tr>
					<th>brief: </th> 
					<td><p><?php echo $row['brief'];?></p></td>
					</tr><tr>
					<th>method: </th> 
					<td><p><?php echo $row['method'];?></p></td>
					</tr>
					
					<tr>
					<th>content: </th> 
					<td><p><?php echo $row['content'];?></p></td>
					</tr><tr>
					<th>content_2: </th> 
					<td><p><?php echo $row['content_2'];?></p></td>
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
			<form action="seo.php?index=SearchRecord" id="search_form" name="search_form" method="post">
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
		
		$sql="select * from ".TBL_SEO." where 1 ";
		 
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
								<td><a href="seo.php">
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>
									</a>
								</td>
								
								<td>
									<input type="button" id="chart_line" name="chart_line" class="middle_switch active" value="Search" style="width:100px" />
								</td>
								
								<td><a href="seo.php?index=addRecord">
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
					<td><a href="seo.php?index=RecordView&id=<?php echo $row['id'];?>" title="View" class="help">
					<img src="images/icon_users.png" /></a> 
					<?php if($_SESSION['user_type'] != 'User') {?>
					|  <a href="seo.php?index=editRecord&id=<?php echo $row['id'];?>" title="Edit" class="help">
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
			
				<a href="seo.php?index=SearchRecord&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&laquo;&laquo;</a>
				
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr-1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&laquo;</a>
				
				<?php if($pgr == $lastpage && ($pgr-4) >= 1 ) { ?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr-4;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-4; ?></a>
				<?php } ?>
				
				<?php if($pgr == $lastpage || $pgr == $lastpage-1) { 
				if(($pgr-3) >= 1){
				?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr-3;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-3; ?></a>
				<?php } }?>
				
				<?php $temp0=$pgr-2;
					if($temp0 >= 1) {				
				?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr-2;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-2;?></a>
				<?php } ?>
				
				<?php $temp1=$pgr-1;
					if($temp1 >= 1) {				
				?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr-1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr-1;?></a>
				<?php } ?>
				
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>" class="active"><?php echo $pgr;?></a>
				
				<?php $temp2=$pgr+1;
					if($temp2 <= $lastpage) {				
				?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr+1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+1;?></a>
				<?php } ?>
				<?php $temp3=$pgr+2;
					if($temp3 <= $lastpage) {				
				?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr+2;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+2;?></a>
				<?php } ?>
				
				<?php if($pgr == 1 || $pgr == 2) { 
				if(($pgr+3) <= $lastpage) {
				?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr+3;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+3; ?></a>
				<?php } }?>
				
				<?php if($pgr == 1 && ($pgr+4) <= $lastpage) { ?>
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr+4;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>"><?php echo $pgr+4; ?></a>
				<?php } ?>
				
				<a href="seo.php?index=SearchRecord&pg=<?php echo $pgr+1;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&raquo;</a>
				
				<a href="seo.php?index=SearchRecord&pg=<?php echo $lastpage;?>&heading=<?php echo $_REQUEST['heading'];?>&articles=<?php echo $_REQUEST['articles'];?>">&raquo;&raquo;</a>
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
						
						$sql="select * from ".TBL_SEO." where id='".$this->id."'";
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
								<td><a href="seo.php">
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="View All" style="width:100px"/>
									</a>
								</td>
								
								<td><a href="seo.php?index=SearchRecord">
									<input type="button" id="chart_line" name="chart_line" class="middle_switch" value="Search" style="width:100px" />
									</a>
								</td>
								
								<td><a href="seo.php?index=addRecord">
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
                        <th>page type</th>
                        <td> <select name="page_type">
                        <option value="index" <?php if( $row['page_type']=='index'){echo 'selected="selected"'; }?>>index.php</option>
                        <option value="topic" <?php if( $row['page_type']=='topic'){echo 'selected="selected"'; }?>>topic.php</option>
                        
                        <option value="course" <?php if( $row['page_type']=='course'){echo 'selected="selected"'; }?>>course.php</option>
                        <option value="room" <?php if( $row['page_type']=='room'){echo 'selected="selected"'; }?>>room</option>
                        <option value="city" <?php if( $row['page_type']=='city'){echo 'selected="selected"'; }?>>city</option>
                        
                        </select></td>
                        </tr>
                        <tr>
                        <th>page var </th>
                        <td> <select name="page_var">
                        <option value="topicid" <?php if( $row['page_var']=='topicid'){echo 'selected="selected"'; }?> >topicid</option>
                        <option value="id" <?php if( $row['page_var']=='id'){echo 'selected="selected"'; }?>>id</option>
                        
                        </select></td>
                        </tr>
                        
                        <tr>
						 	 <th>pageid </th>
						 	 <td><input type="text" name="pageid" id="pageid" value="<?php echo $row['pageid'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
                         <th colspan="2">general</th>
                         </tr>
						<tr>
						 	 <th>description </th>
						 	 <td><input type="text" name="description" id="description" value="<?php echo $row['description'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>keywords </th>
						 	 <td><input type="text" name="keywords" id="keywords" value="<?php echo $row['keywords'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>author </th>
						 	 <td><input type="text" name="author" id="author" value="<?php echo $row['author'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>title </th>
						 	 <td><input type="text" name="title" id="title" value="<?php echo $row['title'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 <tr>
                         <th colspan="2">fb</th>
                         </tr>
						 <tr>
						 	 <th>fb_type </th>
						 	 <td><input type="text" name="fb_type" id="fb_type" value="<?php echo $row['fb_type'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_first_name </th>
						 	 <td><input type="text" name="fb_first_name" id="fb_first_name" value="<?php echo $row['fb_first_name'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_last_name </th>
						 	 <td><input type="text" name="fb_last_name" id="fb_last_name" value="<?php echo $row['fb_last_name'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						 
						 <tr>
						 	 <th>fb_username </th>
						 	 <td><input type="text" name="fb_username" id="fb_username" value="<?php echo $row['fb_username'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_title </th>
						 	 <td><input type="text" name="fb_title" id="fb_title" value="<?php echo $row['fb_title'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>fb_description </th>
						 	 <td><input type="text" name="fb_description" id="fb_description" value="<?php echo $row['fb_description'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 
						<tr>
						 	 <th>	fb_image </th>
						 	 <td><input type="text" name="fb_image" id="fb_image" value="<?php echo $row['fb_image'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	fb_url </th>
						 	 <td><input type="text" name="fb_url" id="fb_url" value="<?php echo $row['fb_url'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	fb_site_name </th>
						 	 <td><input type="text" name="fb_site_name" id="fb_site_name" value="<?php echo $row['fb_site_name'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         <tr>
						 	 <th>	fb_see_also </th>
						 	 <td><input type="text" name="fb_site_name" id="fb_site_name" value="<?php echo $row['fb_site_name'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr><tr>
						 	 <th>	fb_admins </th>
						 	 <td><input type="text" name="fb_admins" id="fb_admins" value="<?php echo $row['fb_admins'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         <tr>
                         <th colspan="2">twitter </th>
                         </tr>
						 
						 <tr>
						 	 <th>	twitter_card </th>
						 	 <td><input type="text" name="twitter_card" id="twitter_card" value="<?php echo $row['twitter_card'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr><tr>
						 	 <th>	twitter_site </th>
						 	 <td><input type="text" name="twitter_site" id="twitter_site" value="<?php echo $row['twitter_site'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         <tr>
						 	 <th>	twitter_title </th>
						 	 <td><input type="text" name="twitter_title" id="twitter_title" value="<?php echo $row['twitter_title'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>		twitter_desctiption </th>
						 	 <td><input type="text" name="twitter_desctiption" id="twitter_desctiption" value="<?php echo $row['twitter_desctiption'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	twitter_creator </th>
						 	 <td><input type="text" name="twitter_creator" id="twitter_creator" value="<?php echo $row['twitter_creator'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
						 <tr>
						 	 <th>	twitter_img </th>
						 	 <td><input type="text" name="twitter_img" id="twitter_img" value="<?php echo $row['twitter_img'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         <tr>
						 	 <th>	twitter_domain </th>
						 	 <td><input type="text" name="twitter_domain" id="twitter_domain" value="<?php echo $row['twitter_domain'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         <tr>
                         <tr>
                         <th colspan="2">goole plus</th>
                         </tr>
                         </tr>
                         
						  <tr>
						 	 <th>	g_name </th>
						 	 <td><input type="text" name="g_name" id="g_name" value="<?php echo $row['g_name'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         
						  <tr>
						 	 <th>	g_description </th>
						 	 <td><input type="text" name="g_description" id="g_description" value="<?php echo $row['g_description'];?>"  />
							 	<span id="span_heading"></span></td>
						 </tr>
                         
                         
						  <tr>
						 	 <th>	g_image </th>
						 	 <td><input type="text" name="g_image" id="g_image" value="<?php echo $row['g_image'];?>"  />
							 	<span id="span_heading"></span></td>
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
						
								// server side validation
							$return =true;
							
							
							if($return){
							
							
$update_sql_array = array();
							
							$update_sql_array['fb_admins'] = $fb_admins;
							
							$update_sql_array['twitter_card'] = $twitter_card;
							$update_sql_array['twitter_site'] = $twitter_site;
							$update_sql_array['twitter_title'] = $twitter_title;
							$update_sql_array['twitter_desctiption'] = $twitter_desctiption;
							$update_sql_array['twitter_creator'] = $twitter_creator;
							
							$update_sql_array['twitter_img'] = $twitter_img;
							$update_sql_array['twitter_domain'] = $twitter_domain;
							$update_sql_array['g_name'] = $g_name;
							$update_sql_array['g_description'] = $g_description;
							
							$update_sql_array['g_image'] = $g_image;
							$update_sql_array['pageid'] = $pageid;
							
							
							$update_sql_array['fb_image'] = $fb_image;
							$update_sql_array['fb_url'] = $fb_url;
							$update_sql_array['fb_site_name'] = $fb_site_name;
							$update_sql_array['fb_see_also'] = $fb_see_also;
							
							
							
							$update_sql_array['page_type'] = $page_type;
							$update_sql_array['pageid'] = $pageid;
							$update_sql_array['description'] = $description;
							$update_sql_array['keywords'] = $keywords;
							$update_sql_array['author'] = $author;
							$update_sql_array['title'] = $title;
							$update_sql_array['fb_type'] = $fb_type;
							$update_sql_array['fb_first_name'] = $fb_first_name;
							$update_sql_array['fb_last_name'] = $fb_last_name;
							$update_sql_array['fb_username'] = $fb_username;
							$update_sql_array['fb_title'] = $fb_title;
							$update_sql_array['fb_description'] = $fb_description;
							$update_sql_array['page_var'] = $page_var;
							
										
						
							
							$this->db->update(TBL_SEO,$update_sql_array,'id',$this->id);
							
							
							
							
							
							$_SESSION['msg']='Record has been Updated successfully';
							?>
							<script type="text/javascript">
								window.location = "seo.php?index=editRecord&id=<?php echo $this->id;?>"
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
		
		$sql_del = "delete from ".TBL_SEO." where id='".$id."'";
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
	
	
	
		
	
	
	
		
		
	
	
	
	
			
	
	
	
	

}

?>