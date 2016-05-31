<?php
 /***********************************************************************************

Class Discription : This class will handle the creation and modification
					of User.
************************************************************************************/

class User{
	
	 var $user_id;
	 var $user;
	 var $type;
	 var $password;
	 var $db;
	 var $validity;
	 var $Form;
	 var $new_pass;
	 var $confirm_pass;
	 var $auth;
	 
	 
	function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->validity = new ClsJSFormValidation();
		$this->Form = new ValidateForm();
		$this->auth=new Authentication();
	}
	

	
	function AdminLogin($runat){
		switch($runat){
			case 'local' :
							if(count($_POST)>0 and $_POST['submit']=='Login'){
								extract($_POST);
								$this->adminuser = $adminuser;
							}
							$FormName = "form_login";
							$ControlNames=array("adminuser"			=>array('adminuser',"''","Please enter User Name","spanadminuser"),
												"adminpassword"			=>array('adminpassword',"''","Please enter Password","spanadminpassword")
												);
	
							$ValidationFunctionName="CheckLoginValidity";
						
							$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
							echo $JsCodeForFormValidation;
							?>
	
			<div id="login_wrapper">
		
				<div id="login_top_window">
					<img src="images/blue/top_login_window.png" alt="top window"/>
				</div>
				<div id="login_body_window">
				<div class="inner">
				<!--<img src="images/login_logo.png" alt="logo"/>--> <h3></h3>
				
					<form method="post" action="" enctype="multipart/form-data" id="" name="<?php echo $FormName ?>" >							
							
							<p>
							<input type="text" name="adminuser" value="<?php echo $adminuser ?>" style="width:285px" 
							title="Username" />
							<span id="spanadminuser"></span>
							</p>
									
							<p>
							<input type="password" name="adminpassword" style="width:285px" title="******" value="" />
							<span id="spanadminpassword"></span>
							</p>
							
							<p style="margin-top:50px">		
							<input type="submit" onclick="return <?php echo $ValidationFunctionName ?>();"
							id="submit" name="submit" value="Login" class="Login" style="margin-right:5px" />
							
							</p>
						
						</form>
					</div>
					</div>
				
				<div id="login_footer_window">
					<img src="images/blue/footer_login_window.png" alt="footer window"/>
				</div>
				<div id="login_reflect">
					<img src="images/blue/reflect.png" alt="window reflect"/>
				</div>
			</div>		
							<?php
							break;
			case 'server' :
							
						extract($_POST);
						$this->adminuser = $adminuser;
						$this->adminpassword = $adminpassword;
						//server side validation
						$return =true;
						if($this->Form->ValidField($adminuser,'empty','Please Enter User Name')==false)
							$return =false;
						if($this->Form->ValidField($adminpassword,'empty','Please Enter Your Password')==false)
							$return =false;
							
						if($return){
						
							$sql = "select * from ".TBL_USER." where user='".$adminuser."'";
							$record = $this->db->query($sql,__FILE__,__LINE__);
							$row = $this->db->fetch_array($record);
							if($this->adminuser == $row['user'] and $this->adminpassword == $row['password'])
								{
									if($row['status'] == 'block')
									{
									$_SESSION['error_msg']='User is Blocked Please Contact Administrator ...';
									?>
									<script type="text/javascript">
									window.location="index.php";
									</script>
									<?php
									exit();
									}
									else
									{
									$this->user_id= $row['user_id'];
									$this->groups= $row['auth_to'];
									$this->user_type= $row['type'];
									
									$this->auth->Create_Session($this->adminuser,$this->user_id,$this->groups,$this->user_type);
									?>
									<script type="text/javascript">
									window.location="index.php";
									</script>
									<?php
									exit();
									}
								}
								else
								{
									$_SESSION['error_msg']='Invalid username or password, please try again ...';
								}
							?>
							<script type="text/javascript">
							window.location="<?php echo $_SERVER['PHP_SELF'] ?>";
							</script>
							<?php
							exit();
							}
							else
							{
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->AdminLogin('local');
							}
						break;
			default : echo 'Wrong Paramemter passed';
		}
	}

	function changePassword($runat)
	{
		switch($runat){
			case 'local' :
							
							$FormName = "frm_changePw";
							$ControlNames=array("oldpassword"			=>array('oldpassword',"''","Please enter User Name","spanoldpassword"),
												"password"			=>array('password',"''","Please enter Password","spanpassword"),
												"repassword"			=>array('repassword',"RePassword","Password Donot Match","spanrepassword",'password')
												);
	
							$ValidationFunctionName="CheckPWValidity";
						
							$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
							echo $JsCodeForFormValidation;
							
							?>
							<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName ?>" >							
							<div class="onecolumn">
							<div class="header">
								<span>Change Password</span>
							</div>
							<br class="clear"/>
							<div class="content">
							<table align="center" cellpadding="0" cellspacing="5">
								<tr>
									<th>Old Password</th>
									<th>:</th>
									<td><input type="password" name="oldpassword" value="" />
									<span id="spanoldpassword"></span></td>
								</tr>
								<tr><td colspan="3">&nbsp;</td></tr>
								<tr>
									<th>New Password</th>
									<th>:</th>
									<td><input type="password" name="password" id="password" value="" />
									<span id="spanpassword"></span></td>
								</tr>
								
								<tr>
									<th>Re-Type Password</th>
									<th>:</th>
									<td><input type="password" name="repassword" id="repassword" value="" />
									<span id="spanrepassword"></span></td>
								</tr>
								<tr>
									<td colspan="2">&nbsp;</td>
									<td><input type="submit"  name="submit" id="submit" onclick="return <?php echo $ValidationFunctionName ?>();" value="Change" /></td>
								</tr>
							</table>
							<div id="chart_wrapper" class="chart_wrapper"></div>
							</div>
							</div>
							</form>
							<?php
							break;
			case 'server' :
							
						extract($_POST);
						
						//server side validation
						$return =true;
						if($this->Form->ValidField($oldpassword,'empty','Please Enter User Name')==false)
							$return =false;
						if($this->Form->ValidField($password,'empty','Please Enter Your Password')==false)
							$return =false;
						if($this->Form->ValidField($repassword,'empty','Password Donot Match')==false)
							$return =false;
						
							
						if($return){
							$sql = "select * from ".TBL_USER." where user_id='".$_SESSION['user_id']."'";
							$record = $this->db->query($sql,__FILE__,__LINE__);
							$row = $this->db->fetch_array($record);
							if($oldpassword == $row['password'])
								{
									$update_sql_array = array();
									$update_sql_array['password'] = $password;
									
									$this->db->update(TBL_USER,$update_sql_array,'user_id',$_SESSION['user_id']);
									$_SESSION['msg']='Password Changed Successfully';
									?>
									<script type="text/javascript">
									window.location="home.php";
									</script>
									<?php
									exit();
								}
								else
								{
									$_SESSION['msg']='Old password do not match, please try again ...';
								}
							?>
							<script type="text/javascript">
							window.location="ChangePassword.php";
							</script>
							<?php
							exit();
							}
							else
							{
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->changePassword('local');
							}
						break;
			default : echo 'Wrong Paramemter passed';
		}
	}
	
	function CreateUser($runat)
	{
		switch($runat){
			case 'local':
						
						$FormName = "frm_addUser";
						$ControlNames=array("user"			=>array('user',"''","Please enter Username","span_user"),
											"password"			=>array('password',"Password","Please enter Password","span_password"),
											"repassword"			=>array('repassword',"RePassword","Password Do not match! ","span_repassword",'password')
											);

						$ValidationFunctionName="CheckUserValidity";
					
						$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
						echo $JsCodeForFormValidation;
						?>
						<form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName;?>" >
						<table class='data'>
							<tr><td colspan="3"><h2>Create User</h2></td></tr>
							<tr>
								<th width="30%">User</th>
								<td colspan="2"><input type="text" name="user" value="" />
								<span id="span_user"></span></td>
							</tr>
							<tr>
								<th>Password</th>
								<td colspan="2"><input type="password" name="password" />
								<span id="span_password"></span></td>
							</tr>
							<tr>
								<th>Re-Password</th>
								<td colspan="2"><input type="password" name="repassword" />
								<span id="span_repassword"></span></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" name="submit" value="Submit" 
								 id="submit" onclick="return <?php echo $ValidationFunctionName?>();"/></td>
							</tr>
						</table> 
						</form>
						<?php 
						break;
			case 'server':
							extract($_POST);
							$this->user = $user;
							$this->password = $password;
							$this->type = $type;
							$this->auth_to = $auth_to;

							//server side validation
							$return =true;
							if($this->Form->ValidField($user,'empty','User field is Empty or Invalid')==false)
								$return =false;
							if($this->Form->ValidField($password,'empty','Password name field is Empty or Invalid')==false)
								$return =false;	
							
							$sql="select * from ".TBL_USER." where user='".$this->user."'";
							$result= $this->db->query($sql,__FILE__,__LINE__);
							if($this->db->num_rows($result)>0)
							{
								$_SESSION['error_msg'] = 'User already exist. Please select another username';
								?>
								<script type="text/javascript">
									window.location = "createUser.php"
								</script>
								<?php
								exit();
							}
								
							if($return){
							
							$insert_sql_array = array();
							$insert_sql_array['user'] = $this->user;
							$insert_sql_array['password'] = $this->password;
							$insert_sql_array['type'] = 'Superadmin';
							$insert_sql_array['auth_to'] = 'Superadmin';
							$this->db->insert(TBL_USER,$insert_sql_array);
							
							$_SESSION['msg'] = 'User has been created Successfully';
							
							?>
							<script type="text/javascript">
								window.location = "createUser.php"
							</script>
							<?php
							exit();
							
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->CreateUser.('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
		}
	}

	function showAllUser()
	{
		
		$sql="select * from ".TBL_USER;
		$result= $this->db->query($sql,__FILE__,__LINE__);
		$x=1;
		?>
		<div class="onecolumn">
				<div class="header">
					<span>All User</span>
					
				<div class="switch" style="width:300px">
						<table width="300px" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td>
									<input type="button" id="chart_bar" name="chart_bar" class="left_switch active" value="View All" style="width:150px"/>
								</td>
								
								<td><a href="createUser.php">
									<input type="button" id="chart_line" name="chart_line" class="right_switch" value="Add New" style="width:150px" />
									</a>
								</td>
							</tr>
						</tbody>
						</table>
					</div>	
				</div>
				<br class="clear"/>
				<div class="content">
			<form id="form_data" name="form_data" action="" method="post">
			<table class="data" width="100%" cellpadding="0" cellspacing="0">  
			<thead>
			<tr>
				<th>S.No.</th>
				<th>User</th>
				<th>Type</th>
				<th>Auth to</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
				<?php 		
				while($row= $this->db->fetch_array($result))
				{
					
				?>
				<tr>
					<td><?php echo $x;?></td>
					<td><?php echo $row['user'];?></td>
					<td><?php echo $row['type'];?></td>
					<td><?php echo $row['auth_to'];?></td>
					<td> <a class="help" href="editUser_account.php?user_id=<?php echo $row['user_id'];?>" title="Edit Branch" >
					<img src="images/icon_edit.png" width="15px" height="15px" /></a> | 
					<a href="javascript: void(0);" title="Delete User" class="help" 
					onclick="javascript: if(confirm('Do u want to delete this User?')) { user.deleteUser('<?php echo $row['user_id'];?>',{}) }; return false;" >
					<img src="images/icon_delete.png" width="15px" height="15px" /></a> | 
					<?php if($row['status'] != 'block') {?>
					<a href="javascript: void(0);" title="Block Ures" class="help" 
					onclick="javascript: if(confirm('Do u want to Block this User?')) { user.blockUser('<?php echo $row['user_id'];?>',{}) }; return false;" >
					<img src="images/icon_block.png" width="15px" height="15px" /></a>
					<?php } 
					else
					{?>
					<a href="javascript: void(0);" title="Un-Block Ures" class="help" 
					onclick="javascript: if(confirm('Do u want to Un-Block this User?')) { user.unblockUser('<?php echo $row['user_id'];?>',{}) }; return false;" >
					<img src="images/icon_block.png" width="15px" height="15px" /></a>
					<?php }	?>
					</td>
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
	
	function editUser($user_id)
	{
	
			
			$this->user_id=$user_id;
			$FormName = "frm_editUser";
			$ControlNames=array("username"			=>array('username',"''","Please enter Username","span_user"),
								"password"		=>array('password',"Password","Please enter Password","span_password"),
								"repassword"	=>array('repassword',"RePassword","Password do not match","span_repassword",'password')
								);
	
			$ValidationFunctionName="CheckeditUserValidity";
		
			$JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
			echo $JsCodeForFormValidation;
			
			$sql="select * from ".TBL_USER." where user_id='".$this->user_id."'";
			$result= $this->db->query($sql,__FILE__,__LINE__);
			$row= $this->db->fetch_array($result)
			?>
			<form method="post" action="editUser_account.php?index=update_user&user_id=<?php echo $this->user_id;?>" enctype="multipart/form-data" name="<?php echo $FormName;?>" >
			<table class='data'>
				<tr><td colspan="3"><h2>Edit User</h2></td></tr>
				<tr>
					<th width="30%">User</th>
					<td colspan="2"><input type="text" name="username" value="<?php echo $row['user'];?>" />
					<span id="span_user"></span></td>
				</tr>
				<tr>
					<th>Password</th>
					<td colspan="2"><input type="password" name="password" value="<?php echo $row['password'];?>" />
					<span id="span_password"></span></td>
				</tr>
				<tr>
					<th>Re-Password</th>
					<td colspan="2"><input type="password" name="repassword" value="<?php echo $row['password'];?>" />
					<span id="span_repassword"></span></td>
				</tr>
				
				
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><input type="submit" name="upbtn" value="Update" 
							 onclick="return <?php echo $ValidationFunctionName;?>()"></td>
				</tr>
			</table> 
			</form>
			<?php 
				
	}

	
	function updateUser($user_id,$username,$password,$type,$auth_to)
	{	
		if($type == 'Superadmin')
		{
			$auth_to = 'Superadmin';
		}
		
		$update_array = array();
		$update_array['user'] = $username;
		$update_array['password'] = $password;
		$update_array['type'] = 'Superadmin';
		$update_array['auth_to'] = 'Superadmin';
		
		
		
		$this->db->update(TBL_USER,$update_array,'user_id',$user_id);
		
		$_SESSION['msg']='User has been Updated successfully';
		
		?>
		<script type="text/javascript">
			window.location = "editUser.php"
		</script>
		<?php
	
	}
	
	function blockUser($user_id)
	{
		ob_start();
		
		$update_array = array();
		$update_array['status'] = 'block';
		
		$this->db->update(TBL_USER,$update_array,'user_id',$user_id);
		
		$_SESSION['msg']='User has been Blocked successfully';
		
		?>
		<script type="text/javascript">
			window.location = "editUser.php"
		</script>
		<?php
		
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	
	function unblockUser($user_id)
	{
		ob_start();
		
		$update_array = array();
		$update_array['status'] = '';
		
		$this->db->update(TBL_USER,$update_array,'user_id',$user_id);
		
		$_SESSION['msg']='User has been Un-Blocked successfully';
		
		?>
		<script type="text/javascript">
			window.location = "editUser.php"
		</script>
		<?php
		
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	
	function deleteUser($user_id)
	{
		ob_start();
		
		$sql="delete from ".TBL_USER." where user_id='".$user_id."'";
		$this->db->query($sql,__FILE__,__LINE__);
		
		$_SESSION['msg']='User has been Deleted successfully';
		
		?>
		<script type="text/javascript">
			window.location = "editUser.php"
		</script>
		<?php
		
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
}
?>