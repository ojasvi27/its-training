<?php
require_once ("../class/config.inc.php");
 ?>
<?php
	require_once ("../class/class.api.php");
	$api_obj = new api();


?>
<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

	<style >
		.jumbotron-flat {
  background-color: solid #4DB8FFF;
  height: 100%;
  border: 1px solid #4DB8FF;
  background: white;
  width: 100%;
text-align: center;
box-sizing:border-box;
margin:0px 20px 0px 20px;
}

.paymentAmt {
    font-size: 80px; 
}

.centered {
    text-align: center;
}

.title {
 padding-top: 15px;   
}
	</style>
<link rel="shortcut icon" href="images/favicon.ico" />
<title> ITS | Corporate training company in gurgaon</title>
		<meta name="google-site-verification" content="4LQfxEFHNVZerbmokoCxB0O_aKaBVdI-U9dEiweDhfE" />
		<meta name="alexaVerifyID" content="h5vTU1j2rSWps6c3F1IY1qRG4uc"/>
               
		<script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?key=
		AIzaSyBzfmxwZ2l6nOA3JH1qSnllVxWmmzRXL2A&sensor=false&libraries=places,geometry"></script>

		<script src="js/maps.js"></script>
		<?php $api_obj -> print_header_for_seo('index', ""); ?>
			<?php
			include ('../includes/for_css_js.php');
		?>
		

	</head>

	<body>
	
		<?php
		include ('../includes/header_index.php');
		?>

		<div class="container">
	
	<script>
	// window.onload = function() {
	// 	var d = new Date().getTime();
	// 	document.getElementById("tid").value = d;
	// };
</script>
	<br/>
	<br/>
	<br/>
	<br/>
	<form method="POST" name="customerData" action="ccavRequestHandler.php">
		<input type="hidden" name="redirect_url" value="http://www.itstraining.in/payments/ccavResponseHandler.php"/>
		<input type="hidden" name="cancel_url" value="http://www.itstraining.in/payments/ccavResponseHandler.php"/>
		<input type="hidden" name="currency" value="INR"/>

		<input type="hidden" name="merchant_id" value="57422" readonly="true " />


		<table class="table table-bordered"	>

			<table class="table table-bordered">
				<tr>
		        	<th>Billing Name	:</th><th>
		        	<input type="text" readonly="true" class="form-control" class="form-control" name="billing_name" value="<?php echo $_REQUEST[billing_name]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Address	:</th><th><input readonly="true" type="text" class="form-control" name="billing_address" value="<?php echo $_REQUEST[billing_address]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing City	:</th><th><input readonly="true" type="text" class="form-control" name="billing_city" value="<?php echo $_REQUEST[billing_city]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing State	:</th><th><input readonly="true" type="text" class="form-control" name="billing_state" value="<?php echo $_REQUEST[billing_state]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Zip	:</th><th><input readonly="true" type="text" class="form-control" name="billing_zip"  value="<?php echo $_REQUEST[billing_zip]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Country	:</th><th><input readonly="true"type="text" class="form-control" name="billing_country" value="<?php echo $_REQUEST[billing_country]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Tel	:</th><th><input readonly="true" type="text" class="form-control" name="billing_tel" value="<?php echo $_REQUEST[billing_tel]; ?>"/></th>
		        </tr>
		        <tr>
		        	<th>Billing Email	:</th><th><input readonly="true" type="text" class="form-control" name="billing_email" value="<?php echo $_REQUEST[billing_email]; ?>"/></th>
		        </tr>
				
				<tr><?php $t= $api_obj->getPaymentsDetails($_REQUEST);?>
					<th>TID	:</th><th><input type="text" name="tid" id="tid" class="form-control" value="<?php echo $t['tid']; ?>" readonly /></th>
				</tr>
				
				<tr>
					<th>Order Id	:</th><th><input type="text" name="order_id"  class="form-control"value="<?php echo $t['oid']; ?>" readonly/></th>
				</tr>
				<tr>
					<th>Amount	:</th><th><input type="text" name="amount" class="form-control" value="<?php echo $_REQUEST[amount]; ?>" readonly/></th>
				</tr>
				<!-- <tr>
					<th>Currency	:</th><th></th>
				</tr> -->

		     	
		        
				 <tr>
		     		<th colspan="2">Payment information:</th>
		     	</tr>
				 <tr> <th> Payment Option: </th> 
		         	  <th> 
		         	  		<input class="payOption" type="radio" name="payment_option" value="OPTCRDC">Credit Card
		         	  		<!-- <input class="payOption" type="radio" name="payment_option" value="OPthBCRD">Debit Card  <br/> -->
		         	  		<input class="payOption" type="radio" name="payment_option" value="OPTNBK">Net Banking 
		         	  	<!-- 	<input class="payOption" type="radio" name="payment_option" value="OPTCASHC">Cash Card <br/> -->
		         	  		<!-- <input class="payOption" type="radio" name="payment_option" value="OPTMOBP">Mobile Payments -->
		         	  		<!-- <input class="payOption" type="radio" name="payment_option" value="OPTEMI">EMI
						<input class="payOption" type="radio" name="payment_option" value="OPTWLT">Wallet -->
		         	   </th>
		         </tr>
		         
		         <!-- EMI section start -->
		         
		         <tr >
		         <th  colspan="2">
		          <div id="emi_div" style="display: none">
			         <table border="1" width="100%">
			         <tr> <th colspan="2">EMI Section </th></tr>
			         <tr> <th> Emi plan id: </th>
			            <th><input readonly="readonly" type="text" id="emi_plan_id"  name="emi_plan_id" value=""/> </th>
			         </tr>
			         <tr> <th> Emi tenure id: </th>
			            <th><input readonly="readonly" type="text" id="emi_tenure_id" name="emi_tenure_id" value=""/>  </th>
			         </tr>
			         <tr><th>Pay Through</th>
				         <th>
					         <select name="emi_banks"  id="emi_banks">
					         </select>
				         </th>
			        </tr>
			        <tr><th colspan="2">
				         <div id="emi_duration" class="span12">
		                	<span class="span12 content-text emiDetails">EMI Duration</span>
		                    <table id="emi_tbl" cellpadding="0" cellspacing="0" border="1" >
							</table> 
		                </div>
				        </th>
			        </tr>
			        <tr>
			        	 <th id="processing_fee" colspan="2">
			        	</th>
			        </tr>
			        </table>
		        </div>
		        </th>
		        </tr>
		        <!-- EMI section end -->
		         
		         
		         <tr class="hidden"> <th> Card Type: </th>
		             <th><input type="text" id="card_type" name="card_type" value="" class="form-control" readonly="readonly"/></th>
		         </tr>
		        
		        <tr> <th class="cardlable"> Card type: </th>
		             <th> <select name="card_name" id="card_name" class="form-control"> <option value="">Select Card Name</option> </select> </th>
		        </tr>
		        
		        <tr class="hidden"> <th> Data Accepted At </th>
		             <th><input type="text" id="data_accept" name="data_accept" class="form-control" readonly="readonly"/></th>
		        </tr>
		         
		         <tr class="hidden"> <th> Card Number: </th>
		            <th> <input type="text" id="card_number" name="card_number" value="" class="form-control"/>e.g. 4111111111111111 </th>
		         </tr>
		          <tr class="hidden"> <th> Expiry Month: </th>
		               <th> <input type="text" name="expiry_month" value="" class="form-control"/>e.g. 07 </th>
		         </tr>
		          <tr class="hidden"> <th> Expiry Year: </th>
		          	   <th> <input type="text" name="expiry_year" value="" class="form-control"/>e.g. 2027</th>
		         </tr>
		          <tr class="hidden"> <th> CVV Number:</th>
		               <th> <input type="text" name="cvv_number" value="" class="form-control"/>e.g. 328</th>
		         </tr>
		         <tr class="hidden"> <th> Issuing Bank:</th>
		            <th><input type="text" name="issuing_bank" value="" class="form-control"/>e.g. State Bank Of India</th>
		         </tr>
			 <tr> 
				<th> Mobile Number:</th>
		            	<th><input type="text" name="mobile_number" class="form-control" value="<?php echo $_REQUEST[billing_tel]; ?>"/>e.g. 9770707070</th>
		         </tr>
			<tr class="hidden"> 
				<th> MMID:</th>
		            	<th><input type="text" name="mm_id" value="" class="form-control"/>e.g. 1234567</th>
		         </tr>
			<tr class="hidden"> 
				<th> OTP:</th>
		            	<th><input type="text" name="otp" value="" class="form-control"/>e.g. 123456</th>
		         </tr>
			 <tr class="hidden"> 
				<th> Promotions:</th>
		            	<th> <select name="promo_code" id="promo_code" class="form-control"> <option value="">All Promotions &amp; Offers</option> </select> </th>
		         </tr>
				 
		        <tr>
		        	<th></th><th><INPUT TYPE="submit"  class= " btn btn-success"value="CheckOut"></th>
		        </tr>
	      	</table>
	      </form>
	       <script src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
  $(function(){
  
	 /* json object contains
	 	1) payOptType - Will contain payment options allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
	 	2) cardType - Will contain card type allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
	 	3) cardName - Will contain name of card. E.g. Visa, MasterCard, American Express or and bank name in case of Net banking. 
	 	4) status - Will help in identifying the status of the payment mode. Options may include Active or Down.
	 	5) dataAcceptedAt - It tell data accept at CCAvenue or Service provider
	 	6)error -  This parameter will enable you to troubleshoot any configuration related issues. It will provide error description.
	 */	  
  	  var jsonData;
  	  var access_code="AVGK05CF30AD58KGDA" // shared by CCAVENUE 
	  var amount="6000";
  	  var currency="INR";
  	  
      $.ajax({
           url:'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,
           dataType: 'jsonp',
           jsonp: false,
           jsonpCallback: 'processData',
           success: function (data) { 
                 jsonData = data;
                 // processData method for reference
                 processData(data); 
		 // get Promotion details
                 $.each(jsonData, function(index,value) {
			if(value.Promotions != undefined  && value.Promotions !=null){  
				var promotionsArray = $.parseJSON(value.Promotions);
		               	$.each(promotionsArray, function() {
					console.log(this['promoId'] +" "+this['promoCardName']);	
					var	promotions=	"<option value="+this['promoId']+">"
					+this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";
					$("#promo_code").find("option:last").after(promotions);
				});
			}
		});
           },
           error: function(xhr, textStatus, errorThrown) {
               alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));
               //console.log("Error occured");
           }
   		});
   		
   		$(".payOption").click(function(){
   			var paymentOption="";
   			var cardArray="";
   			var payThrough,emiPlanTr;
		    var emiBanksArray,emiPlansArray;
   			
           	paymentOption = $(this).val();
           	$("#card_type").val(paymentOption.replace("OPT",""));
           	$("#card_name").children().remove(); // remove old card names from old one
            $("#card_name").append("<option value=''>Select</option>");
           	$("#emi_div").hide();

           	
           	if(paymentOption=="OPTCRDC"){
           		$('.cardlable').html("Card type:");
           	}
           	if(paymentOption=="OPTNBK"){
           		$('.cardlable').html("Bank :");
           	}

           	
           

           	
           	//console.log(jsonData);
           	$.each(jsonData, function(index,value) {
           		//console.log(value);
            	  if(paymentOption !="OPTEMI"){
	            	 if(value.payOpt==paymentOption){
	            		cardArray = $.parseJSON(value[paymentOption]);
	                	$.each(cardArray, function() {
	    	            	$("#card_name").find("option:last").after("<option class='"+this['dataAcceptedAt']+" "+this['status']+"'  value='"+this['cardName']+"'>"+this['cardName']+"</option>");
	                	});
	                 }
	              }
	              
	              if(paymentOption =="OPTEMI"){
		              if(value.payOpt=="OPTEMI"){
		              	$("#emi_div").show();
		              	$("#card_type").val("CRDC");
		              	$("#data_accept").val("Y");
		              	$("#emi_plan_id").val("");
						$("#emi_tenure_id").val("");
						$("span.emi_fees").hide();
		              	$("#emi_banks").children().remove();
		              	$("#emi_banks").append("<option value=''>Select your Bank</option>");
		              	$("#emi_tbl").children().remove();
		              	
	                    emiBanksArray = $.parseJSON(value.EmiBanks);
	                    emiPlansArray = $.parseJSON(value.EmiPlans);
	                	$.each(emiBanksArray, function() {
	    	            	payThrough = "<option value='"+this['planId']+"' class='"+this['BINs']+"' id='"+this['subventionPaidBy']+"' label='"+this['midProcesses']+"'>"+this['gtwName']+"</option>";
	    	            	$("#emi_banks").append(payThrough);
	                	});
	                	
	                	emiPlanTr="<tr><th>&nbsp;</th><th>EMI Plan</th><th>Monthly Installments</th><th>Total Cost</th></tr>";
							
	                	$.each(emiPlansArray, function() {
		                	emiPlanTr=emiPlanTr+
							"<tr class='tenuremonth "+this['planId']+"' id='"+this['tenureId']+"' style='display: none'>"+
								"<th> <input type='radio' name='emi_plan_radio' id='"+this['tenureMonths']+"' value='"+this['tenureId']+"' class='emi_plan_radio' > </th>"+
								"<th>"+this['tenureMonths']+ "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>"+this['processingFeePercent']+"</label>&nbsp;%p.a</label>"+
								"</th>"+
								"<th>"+this['currency']+"&nbsp;"+this['emiAmount'].toFixed(2)+
								"</th>"+
								"<th><label class='currency'>"+this['currency']+"</label>&nbsp;"+ 
									"<label class='emiTotal'>"+this['total'].toFixed(2)+"</label>"+
									"<label class='emi_processing_fee_plan' style='display: none;'>"+this['emiProcessingFee'].toFixed(2)+"</label>"+
									"<label class='planId' style='display: none;'>"+this['planId']+"</label>"+
								"</th>"+
							"</tr>";
						});
						$("#emi_tbl").append(emiPlanTr);
	                 } 
                  }
           	});
           	
         });
   
	  
      $("#card_name").click(function(){
      	if($(this).find(":selected").hasClass("DOWN")){
      		alert("Selected option is currently unavailable. Select another payment option or try again later.");
      	}
      	if($(this).find(":selected").hasClass("CCAvenue")){
      		$("#data_accept").val("Y");
      	}else{
      		$("#data_accept").val("N");
      	}
      });
          
     // Emi section start      
          $("#emi_banks").live("change",function(){
	           if($(this).val() != ""){
	           		var cardsProcess="";
	           		$("#emi_tbl").show();
	           		cardsProcess=$("#emi_banks option:selected").attr("label").split("|");
					$("#card_name").children().remove();
					$("#card_name").append("<option value=''>Select</option>");
				    $.each(cardsProcess,function(index,card){
				        $("#card_name").find("option:last").after("<option class=CCAvenue value='"+card+"' >"+card+"</option>");
				    });
					$("#emi_plan_id").val($(this).val());
					$(".tenuremonth").hide();
					$("."+$(this).val()+"").show();
					$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked",true);
					$("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");
					 
					 if($("#emi_banks option:selected").attr("id")=="Customer"){
						$("#processing_fee").show();
					 }else{
						$("#processing_fee").hide();
					 }
					 
				}else{
					$("#emi_plan_id").val("");
					$("#emi_tenure_id").val("");
					$("#emi_tbl").hide();
				}
				
				
				
				$("label.emi_processing_fee_percent").each(function(){
					if($(this).text()==0){
						$(this).closest("tr").find("label.merchant_subvention").hide();
					}
				});
				
		 });
		 
		 $(".emi_plan_radio").live("click",function(){
			var processingFee="";
			$("#emi_tenure_id").val($(this).val());
			processingFee=
					"<span class='emi_fees' >"+
			 			"Processing Fee:"+$(this).closest('tr').find('label.currency').text()+"&nbsp;"+
			 			"<label id='processingFee'>"+$(this).closest('tr').find('label.emi_processing_fee_plan').text()+
			 			"</label><br/>"+
                			"Processing fee will be charged only on the first EMI."+
                	"</span>";
             $("#processing_fee").children().remove();
             $("#processing_fee").append(processingFee);
             
             // If processing fee is 0 then hiding emi_fee span
             if($("#processingFee").text()==0){
             	$(".emi_fees").hide();
             }
			  
		});
		
		
		$("#card_number").focusout(function(){
			/*
			 emi_banks(select box) option class attribute contains two fields either allcards or bin no supported by that emi 
			*/ 
			if($('input[name="payment_option"]:checked').val() == "OPTEMI"){
				if(!($("#emi_banks option:selected").hasClass("allcards"))){
				  if(!$('#emi_banks option:selected').hasClass($(this).val().substring(0,6))){
					  alert("Selected EMI is not available for entered credit card.");
				  }
			   }
		   }
		  
		});
			
			
	// Emi section end 		
   
   
   // below code for reference 
 
   function processData(data){
         var paymentOptions = [];
         var creditCards = [];
         var debitCards = [];
         var netBanks = [];
         var cashCards = [];
         var mobilePayments=[];
         $.each(data, function() {
         	 // this.error shows if any error   	
             console.log(this.error);
              paymentOptions.push(this.payOpt);
              switch(this.payOpt){
                case 'OPTCRDC':
                	var jsonData = this.OPTCRDC;
                 	var obj = $.parseJSON(jsonData);
                 	$.each(obj, function() {
                 		creditCards.push(this['cardName']);
                	});
                break;
                case 'OPthBCRD':
                	var jsonData = this.OPthBCRD;
                 	var obj = $.parseJSON(jsonData);
                 	$.each(obj, function() {
                 		debitCards.push(this['cardName']);
                	});
                break;
              	case 'OPTNBK':
	              	var jsonData = this.OPTNBK;
	                var obj = $.parseJSON(jsonData);
	                $.each(obj, function() {
	                 	netBanks.push(this['cardName']);
	                });
                break;
                
                case 'OPTCASHC':
                  var jsonData = this.OPTCASHC;
                  var obj =  $.parseJSON(jsonData);
                  $.each(obj, function() {
                  	cashCards.push(this['cardName']);
                  });
                 break;
                   
                  case 'OPTMOBP':
                  var jsonData = this.OPTMOBP;
                  var obj =  $.parseJSON(jsonData);
                  $.each(obj, function() {
                  	mobilePayments.push(this['cardName']);
                  });
              }
              
            });
           
           console.log(creditCards);
           console.log(debitCards);
           console.log(netBanks);
           console.log(cashCards);
           console.log(mobilePayments);
            
      }
  });
</script>

		</div>
	<?php		include ('../includes/footer.php');
		?>
		
	</body>
</html>