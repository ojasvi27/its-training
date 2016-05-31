<div  class="col-md-12">
  <div class="wizard-container">
    <form name="myForm" action="" method="" id="form_wizard">
      <div class="card wizard-card ct-wizard-azzure" id="wizard"> 
        
        <!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->
        
        <div class="wizard-header">
          <h3>  <img src="images/logo_new.png" width="100px" /></h3>
          <h3> <b>Book Your Training Room </b><br>
            <small></small> </h3>
        </div>
        <ul>
          <li><a href="#details" data-toggle="tab">Basic</a></li>
          <li><a href="#captain" data-toggle="tab">Schedule</a></li>
          <li><a href="#description" data-toggle="tab">Technical</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="details">
            <div class="col-md-12">
                <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                                      
                <label >Name</label>
                
                  <input type="text" placeholder="Name" id="wiz_name" name="wiz_name" class="form-control">
                  </div>
                </div>
                <div class="col-sm-5">
                <div class="form-group">
                                      
                <label >Email</label>
                  <input type="text" placeholder="Email" id="wiz_email" name="wiz_email" class="form-control">
                  </div>
                </div>
                <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                                      
                <label >Mobile no</label>
                  <input type="text" placeholder="Mobile no" id="wiz_mobile"  name="wiz_mobile"class="form-control">
                  </div>
                </div>
                <div class="col-sm-5">
                <div class="form-group">
                                      
                <label >Company</label>
                  <input type="text" placeholder="company" id="wiz_company" name="wiz_company" class="form-control">
                  </div>
                </div>
                <div class="col-sm-5 col-sm-5 col-sm-offset-1">
                <div class="form-group">
                                      
                <label >Location</label>
                  <input type="text" placeholder="location" id="location" class="form-control" name="wiz_location">
                  </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="captain">
           
            <div class="col-md-12">
           		   <div class="col-sm-12 ">
           
              <div class="col-sm-5 ">
              <div class="form-group">
                                      
              <label  >No of days</label>
                <input type="text" placeholder="No of days" id="days" class="form-control" name="wiz_days">
                </div>
              </div> </div>
              <div class="clearfix"></div>
              <h5 class="text-center" >Tentative Dates  </h5>
              <div class="col-sm-12">
              <div class="form-group">
              
              <div class="col-sm-6">
                          <label>From</label>            
                <input type="text" placeholder="days" id="fdays"  name="wiz_fdays" class="form-control col-md-6">
              </div>
              <div class="col-sm-6">
              
              <label >To </label>
                <input type="text" placeholder="days" id="tdays" name="wiz_tdays" class="form-control col-md-6">
                </div>
              </div>
              </div>
              <div class="col-sm-12">
             
              <div class="col-sm-5">
              <div class="form-group">
                                      
              <label  >Participants per room</label>
                <input type="text" placeholder="Participants per room" id="wiz_pr"   name="wiz_pr"class="form-control">
                </div>
              </div>
             </div>
            
            
           </div> 
          </div>
          <div class="tab-pane" id="description">
            
  <div class="col-sm-12">
<div class="form-group">
<label   >Computer Required</label>
<div class="col-md-12">
    <div class="col-sm-5">
      <label>
        <input type="radio" name="wiz_computer" value="Yes" id="wiz_computer_yes" checked="checked">
        Yes </label>
    </div>
    <div class="col-sm-5">
      <label>
        <input type="radio" name="wiz_computer" value="0" id="wiz_computer_no">
        No </label>
    </div>
    </div>
  </div>
</div>
  <div class="col-sm-5">
<div class="form-group">
<label   >RAM</label>
    <div class="select">
      <select class="form-control" name="wiz_ram">
        <option value="2gb">2gb</option>
      </select>
    </div>
  </div>
</div>
  <div class="col-sm-5">
<div class="form-group">
<label   >CPU</label>
    <div class="select">
      <select class="form-control" name="wiz_cpu">
        <option class="" value="C2d">C2d</option>
      </select>
    </div>
  </div>
</div>
  <div class="col-sm-5">
<div class="form-group">
<label   >Internet </label>
    <div class="checkbox">
      <label>
        <input type="radio" name="wiz_internet" id="wiz_cpu_y" value="yes">
        Yes </label>
    </div>
    <div class="checkbox">
      <label>
        <input type="radio" name="wiz_internet" id="wiz_cpu_n" value="0">
        No </label>
    </div>
    <div class="select">
      <select class="form-control" name="wiz_speed">
        <option  value="2mbps">2Mbps</option>
      </select>
    </div>
  </div>
</div>
              <div class=" col-sm-5">
<div class="form-group">
              <label >Lunch </label>
                <div class="checkbox">
                  <label>
                    <input type="radio" name="wiz_lunch" id="wiz_lunch_y" value="Yes" checked="checked">
                    Yes </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="radio" name="wiz_lunch" id="wiz_lunch_n" value="0">
                    No </label>
                </div>
              </div>
            </div>
           
            
            
          </div>
        </div>
        <div class="wizard-footer">
          <div class="pull-right">
            <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next'  />
            <input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' name='finish' value='Submit' onclick="submit_contact()" />
          </div>
          <div class="pull-left">
            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
            $(function () {
                $('#fdays').datetimepicker();
				 $('#tdays').datetimepicker();
            });
        </script>
        
        <script>
function validateForm() {
    var x = document.forms["myForm"]["wiz_mobile"].value;
    if (x == null || x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
