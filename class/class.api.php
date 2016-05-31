<?php
class api{
var $status;
var $status_time;

// construct
function __construct(){
$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
$this->validity = new ClsJSFormValidation();
    $this->Form = new ValidateForm();

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



function AddNews($runat)
  {
    switch($runat){
      case 'local' :
              if(count($_POST)>0 and $_POST['submit']=='Submit'){
                extract($_POST);
                $this->name = $name;
                $this->registrationid = $registrationid;
                $this->eventid = $eventid;
                $this->start_date = $start_date;
                $this->end_date = $end_date;
                $this->trainer_name = $trainer_name;
                $this->phoneno = $phoneno;
                $this->email_id = $email_id;
                $this->location = $location;
                $this->company = $company;
            }
            $FormName = "frm_add_news_updates";
            $ControlNames=array(
                                 
                                "name"=>array('name',"'aplha'","Please enter name.   ","span_username"),
                                "registrationid"=>array('registrationid',"Number","Please enter  Registration id ","span_registrationid"),
                                "eventid"=>array('eventid',"''","Please enter  Event id ","span_eventid"),
                                "start_date"=>array('start_date',"''","Please enter  Start date ","span_start_date"),
                                "end_date"=>array('end_date',"''","Please enter  End date ","span_end_date"),
                                "trainer_name"=>array('trainer_name',"''","Please enter Trainer Name ","span_trainer_name"),
                                "phoneno"=>array('phoneno',"Number","Please enter Phoneno","span_phoneno"),
                                "email_id"=>array('email_id',"EMail","Please enter proper Email id   ","span_email_id"),
                                "location"=>array('location',"''","Please enter location    ","span_location"),
                                "company"=>array('company',"''","Please enter company    ","span_company")

            );

            $ValidationFunctionName="CheckAddNewsValidity";
          
            $JsCodeForFormValidation=$this->validity->ShowJSFormValidationCode($FormName,$ControlNames,$ValidationFunctionName,$SameFields,$ErrorMsgForSameFields);
            echo $JsCodeForFormValidation;
            
            ?>

            <section id="about">
  <div class="container">
    <form method="post" action="" enctype="multipart/form-data" name="<?php echo $FormName?>" >
    <div class="form-group">
    <label for="exampleInputEmail1"> Name</label>
    <input type="text" class="form-control" id="name" placeholder="name" name="name" >
    <span id="span_username"></span>
  </div>

  
 <div class="form-group">
    <label for="exampleInputEmail1"> Event  </label>
      <input type="text" class="form-control "  id="eventid" placeholder=" event name" name="eventid" >
         <span id="span_eventid"></span>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Start Date</label>
    <input type="text" class="form-control datepicker"  data-date-format="dd/mm/yyyy" id="start_date" placeholder="start date" name="start_date" >
  <span id="span_start_date"></span>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">End Date</label>
    <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy" id="end_date" placeholder="End Date" name="end_date" >
    <span id="span_end_date"></span>
  </div>
  
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Trainer name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Trainer Name" name="trainer_name" >
    <span id="span_trainer_name"></span>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Phoneno.:</label>
    <input type="text" class="form-control" id="phoneno" placeholder="phone no." name="phoneno"  maxlength="10">
     <span id="span_phoneno"></span>
  </div>
  
    <div class="form-group">
    <label for="exampleInputEmail1">Email Id:</label>
    <input type="email" data-validation="email" class="form-control" id="email_id" placeholder="Email Id" name="email_id" >
    <span id="span_email_id"></span>
  </div>
  

<div class="form-group">
    <label for="exampleInputEmail1">Company</label>
    <input type="text" class="form-control" id="company" placeholder="Company" name="company" >
    <span id="span_company"></span>
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Location</label>
    <input type="text" class="form-control" id="location" placeholder="Location" name="location" >
    <span id="span_location"></span>
  </div>
  
<div> </div>


  <button type="submit" class="btn btn-default" name ="submit" value="Submit" 
                onclick="return <?php echo $ValidationFunctionName;?>()"  >Submit</button>
</form>

            
            <?php
            break;
      case 'server' : 
              extract($_POST);


                $this->name = $name;
                $this->registrationid = $registrationid;
                $this->eventid = $eventid;
                $this->start_date = $start_date;
                $this->end_date = $end_date;
                $this->trainer_name = $trainer_name;
               $this->company = $company;
                $this->phoneno = $phoneno;
                $this->email_id = $email_id;
                $this->location = $location;
              
              
              // server side validation
              $return =true;
              if($this->Form->ValidField($name,'empty','Name is empty')==false)
                $return =false;

             

              if($this->Form->ValidField($eventid,'empty','Event id is empty')==false)
                $return =false;

              if($this->Form->ValidField($start_date,'empty','Start date is empty')==false)
                $return =false;

              if($this->Form->ValidField($end_date,'empty','End date id is empty')==false)
                $return =false;

              if($this->Form->ValidField($trainer_name,'empty','Trainer name  is empty')==false)
                $return =false;

              if($this->Form->ValidField($phoneno,'empty','Phone no  is empty')==false)
                $return =false;

              if($this->Form->ValidField($email_id,'empty','Email id   is empty')==false)
                $return =false;

              if($this->Form->ValidField($location,'empty','location   is empty')==false)
                $return =false;

              
                
              if($return){
              
              $insert_sql_array = array();
              $insert_sql_array['name'] = $this->name;
              //$insert_sql_array['program'] = $this->program;
              $insert_sql_array['start_date'] = $this->start_date;
              $insert_sql_array['end_date'] = $this->end_date;
              $insert_sql_array['company'] = $this->company;
              $insert_sql_array['location'] = $this->location;
              $insert_sql_array['registrationid'] = $this->registrationid;
              $insert_sql_array['eventid'] = $this->eventid;
              $insert_sql_array['trainer_name'] = $this->trainer_name;
              $insert_sql_array['email'] = $email_id;
               $insert_sql_array['phone'] = $phoneno;
              
              
              
              
              $this->db->insert(TBL_FEEDBACK,$insert_sql_array);
              $lid= $this->db->last_insert_id();
              //$_SESSION['msg']='News has been added successfully';
              ?>
              <script type="text/javascript">
                window.location = "feedback_questions.php?feedbackid=<?php echo $lid;?>"
              </script>
              <?php
              exit();
              } else {
              echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
              $this->AddNews('local');
              }
              break;
      default   : 
              echo "Wrong Parameter passed";
              
    }
  }





	function createfeedback($runat)
	{
    
		switch($runat){
			case 'local' :

						
						?>
     					<section id="about">
  <div class="container">
    <form method="POST" id="commentForm" >
    <div class="form-group">
    <label for="exampleInputEmail1"> Name</label>
    <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
  </div>

  
 <div class="form-group">
    <label for="exampleInputEmail1"> Event  </label>
 
         <input type="text" class="form-control "  id="eventid" placeholder=" event name" name="eventid" required>

 	
 
 
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">start Date</label>
    <input type="text" class="form-control datepicker"  data-date-format="dd/mm/yyyy" id="exampleInputPassword1" placeholder="start date" name="start_date" required>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword2">End Date</label>
    <input type="date" class="form-control datepicker" data-date-format="dd/mm/yyyy" id="exampleInputPassword2" placeholder="End Date" name="end_date" required>
  </div>
  
  
  
  <div class="form-group">
    <label for="exampleInputEmail1">Trainer name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Trainer Name" name="trainer_name" required>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Phoneno.:</label>
    <input type="number" class="form-control" id="phoneno" placeholder="phone no." name="phoneno" required>
  </div>
  
    <div class="form-group">
    <label for="exampleInputEmail1">Email Id:</label>
    <input type="text" data-validation="email" class="form-control" id="email_id" placeholder="Email Id" name="email_id" >
  </div>
  

<div class="form-group">
    <label for="exampleInputEmail1">Company</label>
    <input type="text" class="form-control" id="company" placeholder="Company" name="company" required>
  </div>

<div class="form-group">
    <label for="exampleInputEmail1">Location</label>
    <input type="text" class="form-control" id="location" placeholder="Location" name="location" required>
  </div>
  
<div> </div>


  <button type="submit" class="btn btn-default" name ="submit" value="Submit" onclick="return validate();" >Submit</button>
</form>
<script>
  $.validate();
  
</script>
<script>
function validate() {
  var valid =true;
  if($('#name').val()==""){
    alert("Please enter a name ");
    valid=false;
    return false ;
  }
   if($('#registrationid').val()==""){
     alert("Please enter a registration id  ");
    valid=false;
     return false ;
  }
   if($('#eventid').val()==""){
      alert("Please enter event  ");
    valid=false;
     return false ;
  }
   if($('#exampleInputPassword1').val()==""){
     alert("Please enter start date   ");
    valid=false;
     return false ;
  }
   if($('#exampleInputPassword2').val()==""){
     alert("Please enter end date   ");
    valid=false;
     return false ;
  }
   if($('#trainer_name').val()==""){
     alert("Please enter trainer name   ");
    valid=false;
     return false ;
  }
   if($('#phoneno').val()=="" &&  phonenumber($('#phoneno').val()) ){
    alert("Please enter valid phoneno  ");
    valid=false;
     return false ;
  }

  if($('#location').val()==""){
     alert("Please enter location  ");
    valid=false;
     return false ;
  }

   if($('#email_id').val()==""){
     alert("Please enter email id   ");
    valid=false;
     return false ;
  }
    if(validateEmail($('#email_id').val())){
       alert("Please enter proper email id  ");
    valid=false;
     return false ;
  }
   if($('#company').val()==""){
     alert("Please enter company  ");
    valid=false;
     return false ;
  }

  
  return valid ;
}
 function validateEmail(email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( email );
}
    function phonenumber(inputtxt)  
    {  
      var phoneno = /^\d{10}$/;  
      if((inputtxt.value.match(phoneno))  )
            {  
          return true;  
            }  
          else  
            {  
            alert("message");  
            return false;  
            }  
    }  
</script>
  </div>
</section>
					
						<br class="clear"/>
						<?php
						break;
			case 'server' :	
							extract($_POST);
						        $this->name=$name;
							$this->start_date=$start_date;
							$this->end_date=$end_date;
							$this->email=$email;
							$this->company=$company;
							$this->location=$location;
                                                        $this->phoneno=$phoneno;

							$this->registraionid=$registrationid;
						        $this->eventid=$eventid;
							$this->trainer_name=$trainer_name;
							
							
							$return =true;
							if($return){
							$insert_sql_array = array();
							$insert_sql_array['username'] = $this->username;
							//$insert_sql_array['program'] = $this->program;
							$insert_sql_array['start_date'] = $this->start_date;
              $insert_sql_array['phone'] = $this->phoneno;
							$insert_sql_array['end_date'] = $this->send_date;
							$insert_sql_array['company'] = $this->company;
							$insert_sql_array['location'] = $this->location;
							$insert_sql_array['registrationid'] = $this->registration;
							$insert_sql_array['eventid'] = $this->eventid;
							$insert_sql_array['trainer_name'] = $this->trainer_name;
              $insert_sql_array['email'] = $email_id;
              
						  
            	
							
							$this->db->insert(TBL_FEEDBACK,$insert_sql_array);
						$lid=	$this->db->last_insert_id();
							?>
							<script type="text/javascript">
              //alert('hello');
								window.location = "feedback_questions.php?feedbackid=<?php echo $lid;?>"
							</script>
							<?php
							exit();
							} else {
							echo $this->Form->ErrtxtPrefix.$this->Form->ErrorString.$this->Form->ErrtxtSufix; 
							$this->createfeedback('local');
							}
							break;
			default 	: 
							echo "Wrong Parameter passed";
							
		}
	}
	
	
	
	
function showQuestions($runat){
  switch($runat){
      case 'local' :
?>
 <form method="POST">
 <ol >
    <li >
      <h3> The course Material was easy to use.</h3>
    
     <input type="hidden" name="feedbackid" id="feedbackid" value="<?php echo $_REQUEST['feedbackid'];?>">
         
        <label class="radio-inline">
          <input type="radio" name="q1op1" id="q1op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q1op1" id="q1op2" value="good&recommended">
          Good & Recomended </label>
        <label class="radio-inline">
          <input type="radio" name="q1op1" id="q1op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q1op1" id="q1op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q1op1" id="q1op5" value="poor">
          Poor </label>
   
    </li>
    <li>
      <h3>The course met the stated objectives.</h3>
         <label class="radio-inline">
          <input type="radio" name="q2op1" id="q2op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q2op1" id="q2op5"  value="good&recommended">
          Good & Recomended </label>
        <label class="radio-inline">
          <input type="radio" name="q2op1" id="q2op5" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q2op1" id="q2op5" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q2op1" id="q2op5" value="poor">
          Poor </label>
   
    </li>
    <li>
      <h3>The sequence of the course content was effective</h3>
        <label class="radio-inline">
          <input type="radio" name="q3op1" id="q3op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q3op1" id="q3op2" value="good&recommended">
          Good & Recomended </label>
        <label class="radio-inline">
          <input type="radio" name="q3op1" id="q3op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q3op1" id="q3op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q3op1" id="q3op5" value="poor">
          Poor </label>
   
    </li>
    <li>
      <h3>The duration of the course was appropriate to meet the stated learning objectives.</h3>
        <label class="radio-inline">
          <input type="radio" name="q4op1" id="q4op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q4op1" id="q4op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q4op1" id="q4op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q4op1" id="q4op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q4op1" id="q4op5" value="poor">
          Poor </label>
   
    </li>
    <li>
      <h3>The course materials were accurate.</h3>
        <label class="radio-inline">
          <input type="radio" name="q5op1" id="q5op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q5op1" id="q5op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q5op1" id="q5op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q5op1" id="q5op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q5op1" id="q5op5" value="poor">
          Poor </label>
   
    </li>
  </ol>
  <ol>
    <h1> Instructor</h1>
    <li>
      <h3>The instructor was professional and well prepared.</h3>
        <label class="radio-inline">
          <input type="radio" name="q6op1" id="q6op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q6op1" id="q6op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q6op1" id="q6op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q6op1" id="q6op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q6op1" id="q6op5" value="poor">
          Poor </label>
   
    </li>
    <li>
      <h3>The instructor was knowledgeable in the content of the course.</h3>
        <label class="radio-inline">
          <input type="radio" name="q7op1" id="q7op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q7op1" id="q7op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q7op1" id="q7op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q7op1" id="q7op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q7op1" id="q7op5" value="poor">
          Poor </label>
   
    </li>
    <li>
      <h3>The instructor clearly communicated course content.</h3>
        <label class="radio-inline">
          <input type="radio" name="q8op1" id="q8op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q8op1" id="q8op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q8op1" id="q8op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q8op1" id="q8op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q8op1" id="q8op5" value="poor">
          Poor </label>

    </li>
    <li>
      <h3>The instructor was responsive and helpful when answering questions</h3>
        <label class="radio-inline">
          <input type="radio" name="q9op1" id="q9op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q9op1" id="q9op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q9op1" id="q9op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q9op1" id="q9op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q9op1" id="q9op5" value="poor">
          Poor </label>
    </li>
  </ol>
  <h1>Exercises</h1>
  <ol>
    <li>
      <h3>Access to equipment/tools was adequate to meet the course objectives.</h3>
        <label class="radio-inline">
          <input type="radio" name="q10op1" id="q10op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q10op1" id="q10op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q10op1" id="q10op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q10op1" id="q10op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q10op1" id="q10op5" value="poor">
          Poor </label>
    </li>
    <li>
      <h3>The equipment/tools provided were in good working order.</h3>
        <label class="radio-inline">
          <input type="radio" name="q11op1" id="q11op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q11op1" id="q11op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q11op1" id="q11op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q11op1" id="q11op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q11op1" id="q11op5" value="poor">
          Poor </label>
    </li>
    <li>
      <h3>The exercises reinforced the learning objectives.</h3>
        <label class="radio-inline">
          <input type="radio" name="q12op1" id="q12op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q12op1" id="q12op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q12op1" id="q12op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q12op1" id="q12op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q12op1" id="q12op5" value="poor">
          Poor </label>
    </li>
    <li>
      <h3>Time allocation for the exercises was adequate.</h3>
        <label class="radio-inline">
          <input type="radio" name="q13op1" id="q13op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q13op1" id="q13op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q13op1" id="q13op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q13op1" id="q13op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q13op1" id="q13op5" value="poor">
          Poor </label>
    </li>
  </ol>
  <h1> Logistics</h1>
  <ol>
    <li>
      <h3>The course registration process was efficient and easy to use</h3>
        <label class="radio-inline">
          <input type="radio" name="q14op1" id="q14op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q14op1" id="q14op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q14op1" id="q14op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q14op1" id="q14op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q14op1" id="q14op5" value="poor">
          Poor </label>
    </li>
    <li>
      <h3>Training invitation details were clear, helpful and timely</h3>
        <label class="radio-inline">
          <input type="radio" name="q15op1" id="q15op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q15op1" id="q15op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q15op1" id="q15op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q15op1" id="q15op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q15op1" id="q15op5" value="poor">
          Poor </label>
    </li>
    <li>
      <h3>The class room environment was appropriate for learning</h3>
        <label class="radio-inline">
          <input type="radio" name="q16op1" id="q16op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q16op1" id="q16op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q16op1" id="q16op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q16op1" id="q16op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q16op1" id="q16op5" value="poor">
          Poor </label>
     </li>
  </ol>
  <h1>overall</h1>
  <ol>
    <li>
      <h3>Overall, I am satisfied with this learning experience</h3>
        <label class="radio-inline">
          <input type="radio" name="q17op1" id="q17op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q17op1" id="q17op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q17op1" id="q17op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q17op1" id="q17op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q17op1" id="q17op5" value="poor">
          Poor </label>
     </li>
    <li>
      <h3>The knowledge and skills learned will help me in my job.</h3>
        <label class="radio-inline">
          <input type="radio" name="q18op1" id="q18op1" value="Excellent">
          Excellent </label>
        <label class="radio-inline">
          <input type="radio" name="q18op1" id="q18op2" value="good&recommended">
          Good & Recommended </label>
        <label class="radio-inline">
          <input type="radio" name="q18op1" id="q18op3" value="good">
          Good </label>
        <label class="radio-inline">
          <input type="radio" name="q18op1" id="q18op4" value="average">
          Average </label>
        <label class="radio-inline">
          <input type="radio" name="q18op1" id="q18op5" value="poor">
          Poor </label>
     </li>
  </ol>
   <button type="submit" class="btn btn-default" value="Submit" name ="submit_feed">Submit</button>
</form>
  <?php 
  break;
      case 'server' : 
              extract($_REQUEST);

              $sql="select * from ".TBL_FEEDBACK." where feedbackid=".$feedbackid." ";
              $result= $this->db->query($sql,__FILE__,__LINE__);
              $row= $this->db->fetch_array($result);


              $mail_content="Hi ".$row['name'].", </br>";

              $mail_content.="Thanks for your response. and feed back, </br>";


              if($q1op1){
                $mail_content.="<p> The course Material was easy to use.</p>";
                $mail_content.="Option  selected :".$q1op1;
              }
              if($q2op1){
                $mail_content.="<p> The course met the stated objectives.</p>";
                $mail_content.="Option  selected :".$q2op1;
              }
              if($q3op1){
                $mail_content.="<p> The sequence of the course content was effective</p>";
                $mail_content.="Option  selected :".$q3op1;
              }
              if($q4op1){
                $mail_content.="<p> The duration of the course was appropriate to meet the stated learning objectives.</p>";
                $mail_content.="Option  selected :".$q4op1;
              }
              if($q5op1){
                $mail_content.="<p> The course materials were accurate.</p>";
                $mail_content.="Option  selected :".$q5op1;
              }
              if($q6op1){
                $mail_content.="<p> The instructor was professional and well prepared.</p>";
                $mail_content.="Option  selected :".$q6op1;
              }
              if($q7op1){
                $mail_content.="<p> The instructor was knowledgeable in the content of the course.</p>";
                $mail_content.="Option  selected :".$q7op1;
              }
              if($q8op1){
                $mail_content.="<p> The instructor clearly communicated course content.</p>";
                $mail_content.="Option  selected :".$q8op1;
              }
              if($q9op1){
                $mail_content.="<p> The instructor was responsive and helpful when answering questions.</p>";
                $mail_content.="Option  selected :".$q9op1;
              }
              if($q10op1){
                $mail_content.="<p> Access to equipment/tools was adequate to meet the course objectives.</p>";
                $mail_content.="Option  selected :".$q10op1;
              }
              if($q11op1){
                $mail_content.="<p>The equipment/tools provided were in good working order. </p>";
                $mail_content.="Option  selected :".$q11op1;
              }
              if($q12op1){
                $mail_content.="<p>The exercises reinforced the learning objectives. </p>";
                $mail_content.="Option  selected :".$q12op1;
              }
              if($q13op1){
                $mail_content.="<p>Time allocation for the exercises was adequate. </p>";
                $mail_content.="Option  selected :".$q13op1;
              }
               if($q14op1){
                $mail_content.="<p>The course registration process was efficient and easy to use. </p>";
                $mail_content.="Option  selected :".$q14op1;
              }
              if($q15op1){
                $mail_content.="<p>Training invitation details were clear, helpful and timely. </p>";
                $mail_content.="Option  selected :".$q15op1;
              }
              if($q16op1){
                $mail_content.="<p>The class room environment was appropriate for learning. </p>";
                $mail_content.="Option  selected :".$q16op1;
              }
              if($q17op1){
                $mail_content.="<p>Overall, I am satisfied with this learning experience.</p>";
                $mail_content.="Option  selected :".$q17op1;
              }
              if($q18op1){
                $mail_content.="<p>The knowledge and skills learned will help me in my job.</p>";
                $mail_content.="Option  selected :".$q18op1;
              }

              


                    $to = $row['email'];

                    $subject = "Feedback @ itstraining" ;
                    $comment = $mail_content."<p>Regards,</p><p>The Itstrain Team</p>";
                    
                    $header = "From: noreply@itstraining.in\r\n"; 
                    $header.= "MIME-Version: 1.0\r\n"; 
                    $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
                    $header.= "X-Priority: 1\r\n"; 

                    mail($to, $subject, $comment, $header);
      
                    $comment2 = "";
                    $comment2 .= "---------------------------------------------------------------------------------\n<table>";
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>Name";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['name']."</td>";
                        $comment2 .= "</tr>";
      
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>eventid";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['eventid']."</td>";
                        $comment2 .= "</tr>";
      
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>location";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['location']."</td>";
                        $comment2 .= "</tr>";
      
                         $comment2 .= "<tr>";
                        $comment2 .= "<td>phone";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['phone']."</td>";
                        $comment2 .= "</tr>";
      
      
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>email";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['email']."</td>";
                        $comment2 .= "</tr>";
      
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>company";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['company']."</td>";
                        $comment2 .= "</tr>";
      
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>trainer_name";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['trainer_name']."</td>";
                        $comment2 .= "</tr>";
                        
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>start_date";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['start_date']."</td>";
                        $comment2 .= "</tr>";
      
                        $comment2 .= "<tr>";
                        $comment2 .= "<td>end_date";
                        $comment2 .= "</td>";
                        $comment2 .= "<td>";
                        $comment2 .= $row['end_date']."</td>";
                        $comment2 .= "</tr>";
                    
                    $comment2 .= "</table>";
                    
                     $comment2 .= $mail_content;
                        
      
                    $to = "solutions@itstraining.in";
                    mail($to, $subject, $comment2, $header);
                        
                    //echo $comment2;
                    $to = "schumi.offi2124@gmail.com";
                    mail($to, $subject, $comment2, $header);

              ?>
              <script type="text/javascript">
                window.location = "feedback_questions_thanks.php"
              </script>
              <?php 
              break;
      default   : 
              echo "Wrong Parameter passed";
              
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
      <input type="text" placeholder="Name" id="r_name" name="rname" class="form-control" />
      </div>
      <div class="form-group">
      <input type="text" placeholder="Email Address" id="r_email" name="remail" class="form-control" />
     </div>
     <div class="form-group">
     <select id="course" class="form-control" name="rcourse" >
     <option value="">-Select-</option>
     
     <?php $this->get_courses_for_registration($courseid); ?>
     
     
     </select> 
     </div>
    
      <div class="form-group">
      <input type="text" placeholder="Phone-No" id="r_mob" name="rmob" class="form-control"/>
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
                     <input type="text" placeholder="email" value="" name="email" class="form-control input-lg" id="login-email">  
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
      <input type="text" placeholder="Name" id="r_name" name="rname" class="form-control" />
      </div>
      <div class="form-group">
      <input type="text" placeholder="Email Address" id="r_email" name="remail" class="form-control" />
     </div>
     <div class="form-group">
     <select id="course" class="form-control" name="rcourse" >
     <option value="">-Select-</option>
     
     <?php $this->get_workshop_for_registration($worshopid); ?>
     
     
     </select> 
     </div>
    
      <div class="form-group">
      <input type="text" placeholder="Phone-No" id="r_mob" name="rmob" class="form-control"/>
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
<li><a href="http://itstraining.in/id/<?php echo $row['id'];?>/course/<?php echo str_replace(" ",'_',strtolower (strip_tags($row['name'])));?>.html">
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
<input class="form-control input-box search" style="width:80%" type="text"  data-sort="list_filter" id="search" />
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


// class ends here	

}
?>