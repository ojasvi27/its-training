<?php

class News_And_Updates{
	
	var $course_id;
	var $course_name;
	var $subcategory_id;
	var $subcategory_name;
	var $validity;
	var $Form;
	var $db;
	var $tabName;
	
	function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->validity = new ClsJSFormValidation();
		$this->Form = new ValidateForm();	
	}
	
	function AddNews($runat)
	{
		switch($runat){
			case 'local' :
							if(count($_POST)>0 and $_POST['submit']=='Submit'){
								extract($_POST);
								$this->news = $news;
								$this->headline = $headline;
								
							}
						$FormName = "frm_add_news_updates";
						$ControlNames=array("headline"=>array('headline',"''","Please enter Headline","span_headline")
						);

						$ValidationFunctionName="CheckAddNewsValidity";
					
						$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						echo $JsCodeForFormValidation;
						
						?>
						<div class="onecolumn">
						<div class="header">
							<span>Add </span>
							<div class="switch" style="width:300px">
							<table width="300px" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td><input type="button" id="chart_bar" name="chart_bar" class="left_switch active" value="Add News" style="width:150px"/></td>
									<td><a href="NewsUpdates.php">
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="View All News" style="width:150px"/></a></td>
								</tr>
							</tbody>
							</table>
						</div>
						</div>
						<br class="clear"/>
						<div class="content">
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
						
						<table>
						  <tr><td>&nbsp;</td></tr>
						 <tr>
						 	 <th>Headline: </th>
						 	 <td><input type="text" name="headline" id="headline" value="<?php echo $this->headline;?>"  />
							 	<span id="span_headline"></span></td>
						 </tr>	
						 <tr>
						 	 <th>Headline: </th>
						 	 <td><input type="text" name="headline" id="headline" value="<?php echo $this->headline;?>"  />
							 	<span id="span_headline"></span></td>
						 </tr>	 
						 <tr>
						 	 <th>Headline: </th>
						 	 <td><input type="text" name="headline" id="headline" value="<?php echo $this->headline;?>"  />
							 	<span id="span_headline"></span></td>
						 </tr>	 
						 <tr>
						 	 <th>Headline: </th>
						 	 <td><input type="text" name="headline" id="headline" value="<?php echo $this->headline;?>"  />
							 	<span id="span_headline"></span></td>
						 </tr>	  
						 
						 <tr>
						 	<th valign="top">News: </th>
							<td><textarea name="news" rows="20" cols="80" id="wysiwyg"><?php echo $this->news;?></textarea></td>
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
						</div></div>
						<?php
						break;
			case 'server' :	
							extract($_POST);
							$this->headline=$headline;
							$this->news = $news;
							
							
							// server side validation
							$return =true;
							if($this->Form->ValidField($headline,'empty','Headline is empty')==false)
								$return =false;
							
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['news'] = $this->news;
							$insert_sql_array['headline'] = $this->headline;
							
							$this->db->insert(NEWS_UPDATES,$insert_sql_array);
							$_SESSION['msg']='News has been added successfully';
							?>
							<script type="text/javascript">
								window.location = "Addnews.php"
							</script>
							<?php
							exit();
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->AddNews('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
							
		}
	}

	function showAllNews()
	{
		
		$sql="select * from ".NEWS_UPDATES." order by timestamp desc";
		$result= $this->db->query($sql,__FILE__,__LINE__);
		$x=1;
		?>
		<div class="onecolumn">
				<div class="header">
					<span>News and Updates</span>
					<div class="switch" style="width:300px">
							<table width="300px" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td><a href="Addnews.php">
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="Add News" style="width:150px"/></a></td>
									<td>
									<input type="button" id="chart_line" name="chart_line" class="right_switch active" value="View All News" style="width:150px"/></td>
								</tr>
							</tbody>
							</table>
						</div>
						</div>
						<br class="clear"/>
						<div class="content">
				</div>
				<br class="clear"/>
				<div class="content">
			<form id="form_data" name="form_data" action="" method="post">
			<table class="data" width="100%" cellpadding="0" cellspacing="0">  
			<thead>
			<tr>
				<th width="8%">S.No.</th>
				<th width="66%">News</th>
				<th width="26%">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php 		
				while($row= $this->db->fetch_array($result))
				{
					
				?>
				<tr>
					<td><?php echo $x;?></td>
					<td>
					<div class="onecolumn">
				<div class="header">
					<span class="help" title="Click To View News"><?php echo $row['headline'];?></span>
					</div>
					<br class="clear"/>
					<div class="content" style="display:none">
					<?php echo $row['news'];?>
					</div></div>
					</td>
					<td> <a href="editNews.php?news_id=<?php echo $row['news_id'];?>">
					<img src="images/icon_edit.png" width="15px" height="15px" /></a> | 
					<a href="deleteNews.php?news_id=<?php echo $row['news_id'];?>">
					<img src="images/icon_delete.png" width="15px" height="15px" /></a> </td>
				</tr>			
				<?php 
				$x++;
				}
				?>
			</tbody>	
			</table>
			<div id="chart_wrapper" class="chart_wrapper"></div>
			</form>
			</div>
			</div>
		<?php 
	}
	
	function editNews($runat,$news_id)
	{
		$this->news_id=$news_id;
		switch($runat){
			case 'local' :
							
						$FormName = "frm_edit_news";
						$ControlNames=array("headline"=>array('headline',"''","Please enter Headline","span_headline")
						);

						$ValidationFunctionName="CheckAddNewsValidity";
					
						$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						echo $JsCodeForFormValidation;
												
						$sql="select * from ".NEWS_UPDATES." where news_id='".$this->news_id."'";
						$result= $this->db->query($sql,__FILE__,__LINE__);
						$row= $this->db->fetch_array($result);
						?>
						<br class="clear"/>
						<div class="onecolumn">
						<div class="header">
							<span>Edit News and Updates</span>
							<div class="switch" style="width:300px">
							<table width="300px" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td><a href="Addnews.php">
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch" value="Add News" style="width:150px"/></a></td>
									<td><a href="NewsUpdates.php">
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="View All News" style="width:150px"/></a></td>
								</tr>
							</tbody>
							</table>
						</div>
						</div>
						<br class="clear"/>
						<div class="content">
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
						
						<table>
						  <tr><td>&nbsp;</td></tr>
						  
						  <tr>
						 	 <th>Headline: </th>
						 	 <td><input type="text" name="headline" id="headline" value="<?php echo $row['headline'];?>"  />
							 	<span id="span_headline"></span></td>
						 </tr>	
						 
						 <tr>
						 	<th valign="top">News: </th>
							<td><textarea name="news" rows="20" cols="80" id="wysiwyg"><?php echo $row['news'];?></textarea></td>
						</tr>
						
						  <tr>
						  	  <td colspan="2"><input type="submit" name="submit" value="Submit" 
							  onclick="return <?php echo $ValidationFunctionName;?>()" >
							  &nbsp; 
							  <input type="button" onclick="javascript: history.go(-1); return false" 
							  name="cancel" value="Cancle" />
							  </td>
					      </tr>		  
							  
						</table>
						</form>
						</div></div>
						<?php
						break;
			case 'server' :	
							extract($_POST);
							$this->news = $news;
							$this->headline = $headline;
							
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
	
	function deleteNews($news_id)
	{
		
		$sql="delete from ".NEWS_UPDATES." where news_id='".$news_id."'";
		$this->db->query($sql,__FILE__,__LINE__);
		$_SESSION['msg']='News has been Deleted successfully';
		?>
		<script type="text/javascript">
			window.location = "NewsUpdates.php"
		</script>
		<?php
	}
	
	
	
	
	function ShowNews($news_id)
	{
	
		$sql_news="select * from ".NEWS_UPDATES." where news_id='".$news_id."'";
		$news_details= $this->db->query($sql_news,__FILE__,__LINE__);
		$row_news= $this->db->fetch_array($news_details);
		
		echo $row_news['news'];
		
	}
	
	function ShowNewsHeadline($news_id)
	{
	
		$sql_news="select * from ".NEWS_UPDATES." where news_id='".$news_id."'";
		$news_details= $this->db->query($sql_news,__FILE__,__LINE__);
		$row_news= $this->db->fetch_array($news_details);
		
		echo $row_news['headline'];
		
	}
	
	function marqueAllnews()
	{
		?>
		<marquee direction="up" scrolldelay="40" onmouseover="this.stop()" onmouseout="this.start()" scrollamount="2">
		<?php
		$sql_news="select * from ".NEWS_UPDATES;
		/*mysql_connect('localhost','vatsalah_vatsal','vatsal');
		mysql_select_db('vatsalah_hsptl');
		mysql_query($sql_news);
		echo mysql_num_rows(mysql_query($sql_news));*/
		
		$news_details= $this->db->query($sql_news,__FILE__,__LINE__);
		while($row_news= $this->db->fetch_array($news_details))
		{
			$newsupdate=$row_news['news'];
			?>
			<p>
			<strong><a href="visitor.php"><?php echo $row_news['headline'];?></strong>
			
				<br />
			<?php echo substr($newsupdate, 0, 120);?>....</a><br  /></p><?php	}?>
		</marquee>
		<?php 
	
	}
	
}

?>