<?php
 /***********************************************************************************

Class Discription : This class will handle the creation and modification
					of User.
************************************************************************************/

class HomePage{
	
	 var $user_id;
	 var $first_name;
	 var $last_name;
	 var $email_id;
	 var $country_code;
	 var $area_code;
	 var $phone_no;
	 var $agree;
	 var $password;
	 var $db;
	 var $validity;
	 var $Form;
	 var $new_pass;
	 var $confirm_pass;
	 var $auth;
	 var $temppass;
	 var $mail_obj;
	 var $template;
	 private $adminuser;
	 private $adminpassword;
	 
	function __construct(){
		$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
		$this->validity = new ClsJSFormValidation();
		$this->Form = new ValidateForm();
		$this->auth=new Authentication();
	}
	
	function DisplayshortCutMent($headding)
	{
		?>
			<h1><?php echo $headding;?></h1>
			
			<!-- Begin shortcut menu -->
			<ul id="shortcut">
    			<li>
    			  <a href="home.php" id="shortcut_home" title="Click me to open Home Page">
				    <img src="images/shortcut/home.png" alt="home"/><br/>
				    <strong>Home</strong>
				  </a>
				</li>
    			<li>
    			  <a href="NewsUpdates.php" title="Click me to open News adn Updates">
				    <img src="images/shortcut/posts.png" alt="News"/><br/>
				    <strong>News</strong>
				  </a>
				</li>
    			
				<li>
    			  <a href="ChangePassword.php" id="shortcut_posts" title="Click me to open Settings">
				    <img src="images/shortcut/setting.png" alt="Settings"/><br/>
				    <strong>Settings</strong>
				  </a>
				</li>
  			</ul>
			<!-- End shortcut menu -->
			<br class="clear"/>
		<?php 
	}
	
	function shortcutNotification()
	{
		?>
		<!-- Begin shortcut notification -->
			<!--<div id="shortcut_notifications">
				<span class="notification" rel="shortcut_home">10</span>
				<span class="notification" rel="shortcut_contacts">5</span>
				<span class="notification" rel="shortcut_posts">1</span>
			</div>-->
			<!-- End shortcut noficaton -->
		<?php 
	}
	
	
}

?>