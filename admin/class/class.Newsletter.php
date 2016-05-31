<?php
class NewsLetter{

	 var $db;
	 var $validity;
	 var $Form;
	 var $auth;
	 var $newsletter_id;
	 var $email_id;
	 
		function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->validity = new ClsJSFormValidation();
		$this->Form = new ValidateForm();
		$this->auth=new Authentication();
		$this->mail_obj = new PHPMailer();
	}
	
	function NewsLetter_Emails($runat)
	{
		
		switch($runat){
			case 'local' :
						$formName='frm_news_letter';
						$ControlNames=array("email_id"			=>array('email_id',"EMail","Please enter email address ","span_email"));

						$ValidationFunctionName="CheckValidity_emailname";
					
						$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($formName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						echo $JsCodeForFormValidation;
						?>
						
					<form method="post" action="" enctype="multipart/form-data" name="<?php echo $formName?>" >
					Subscribe to our newsletter: <input type="text" name="email_id" id="email_id" value="E-mail Address" /> 
					<input type="image" src="images/button-subscribe.png" align="absmiddle" name="sub_email" value="go"
					onclick="return <?php echo $ValidationFunctionName?>();" />
					<span id="span_email"></span>
					</form>
						
							
						<?php 
						break;
			case 'server' :			
						extract($_POST);
						$this->email_id=$email_id;
						
						$check="true";
						
						$sql="select * from ".NEWS_LETTER_EMAILS;
						$record = $this->db->query($sql,__FILE__,__LINE__);
						while($row = $this->db->fetch_array($record)){
							if($row['email_id'] == $this->email_id){
							$check='false';
							}	
							
						}
						
						  if($check == 'true'){
						  
						  $insert_sql_array = array();
						  $insert_sql_array['email_id'] = $this->email_id;
						
						  $this->db->insert(NEWS_LETTER_EMAILS,$insert_sql_array);
						
						  $_SESSION['msg']='Your Email has been successfully';
						  ?>
						  <script type="text/javascript">
						 location.replace('<?php $_SERVER['PHP_SELF']; ?>')
						  </script>
						  <?php
						}
						else{
						?>
						<script language="javascript"> 
						 alert('Email Address Already Subscribed');
						 location.replace('<?php $_SERVER['PHP_SELF']; ?>')
						</script>
						
						<?php 
						}  
						
						break;
			default :		echo "Invalid Parameter";
		}
	}
	
	
		function email_newsletters($runat){
		
		switch($runat){
			case 'local' :
							if(count($_POST)>0 and $_POST['submit']=='Save'){
							  extract($_POST);
							  $this->description = $description;
							  $this->subject = $subject;
							}
							$FormName='frm_email_newsletters';
							
							$ControlNames=array("description"			=>array('description',"''","Please enter Description","spandescription")
												);
	
							$ValidationFunctionName="CheckValidityemail_newsletters";
						
							$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
							echo $JsCodeForFormValidation;
							
							$sql="select * from ".TBL_EMAIL_TEMPLATE." where template_id='$this->template_id'"; 
							$record=$this->db->query($sql,__FILE__,__LINE__);
							$row=$this->db->fetch_array($record);
							?>
							<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName;?>" >
							<table id="package_form" width="100%">
							  <tr>
								<th>Subject:</th><td><input type="text" style="width:90%" value="<?php echo $this->title; ?>" name="subject" id="subject" /></td>
								<td>&nbsp;</td>
							  </tr>
							  <tr>
								<th valign="top">Description:</th>
								<td><textarea name="description" rows="20" style="width:90%" ><?php echo $this->description; ?></textarea></td>
								<td><span id="spandescription"></span></td>
							  </tr>
							  <tr>
								<td>&nbsp;</td>
								<td><input type="submit" name="submit" value="send"  />&nbsp;
								<input type="button" name="cancel" value="Cancel" onclick="history.go(-1); return false;" /></td>
								<td></td>
							  </tr>
							</table>
							</form>
							<?php
							break;
			case 'server' :	
								extract($_POST);
								$this->description = $description;
								$this->subject = $subject;
								
								//server side validation
								$return =true;
								if($this->Form->ValidField($description,'empty','Description field is Empty or Invalid')==false)
									$return =false;
								
								$sql="select * from ".NEWS_LETTER_EMAILS;
								$record = $this->db->query($sql,__FILE__,__LINE__);
								$cnt=0;
								if($return){
								while($row = $this->db->fetch_array($record)){
								$this->mail_obj->IsHTML(true);  
								$this->mail_obj->From = "mrbean2124@gmail.com";
								$this->mail_obj->FromName = "No Reply";
								$this->mail_obj->ClearAddresses();
								$this->mail_obj->AddAddress($row['email_id']);
								
								$this->mail_obj->Subject = $this->subject;
								$this->mail_obj->Body = "Dear ".$row['email_id'].",<br><br>";
								$this->mail_obj->Body .= $this->description."<br>";
								$this->mail_obj->Body .= "<span style=\"color:#666666; font-size:12px\">Please do not directly reply to this email since this mailbox is not monitored and you will not receive a response.</span>   <br><br>";
								$this->mail_obj->WordWrap = 50;
								if(!$this->mail_obj->Send()) {
								  $cnt++;	
								}
								}
								
								if($cnt==0)
								{
								   $_SESSION['msg'] .= 'Message has been sent.';
								}
								else
								{
								  $_SESSION['msg'] .= 'Message was not sent. ';
								  $_SESSION['msg'] .= 'Mailer error: ' . $this->mail_obj->ErrorInfo;
								}
							
								?>
								<script type="text/javascript">
								window.location = "<?php echo $_SERVER['PHP_SELF']; ?>";
								</script>
								<?php
								exit();
								} else {
								echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
								$this->email_newsletters('local');
								}								
								break;
			default :
								echo "Wrong Parameter passed";
		}
	}


	
}
?> 