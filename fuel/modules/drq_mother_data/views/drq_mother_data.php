<script type="text/javascript">
function suggest(inputString){
	if(inputString.length == 0) {
		$('#suggestions').fadeOut();
	} else {
		$('#txtvoterid').addClass('load');
		$.post("<?php echo fuel_url('household_survey/autosuggest');?>", {queryString: ""+inputString+""}, function(data){
			if(data.length >0) {
				$('#suggestions').fadeIn();
				$('#suggestionsList').html(data);
				$('#txtvoterid').removeClass('load');
			}
		});
	}
}

function fill(thisValue) {
	$('#txtvoterid').val(thisValue);
	setTimeout("$('#suggestions').fadeOut();", 600);
}

function childname() { 
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
	//alert (voterid);
	$.ajax({  
		type: "POST",  
		url	: "<?php echo fuel_url('general_info/childname');?>/",  
		data: dataString,
		datatype : "json"
	}).done(function (msg) {
		var new_cn = eval(msg); 
		$.each(new_cn, function(i, j){
		var row="<option value=\""+new_cn[i].ocop_summary_id+"\">"+new_cn[i].child_name+"</option>";
		$(row).appendTo("select#ddlchildname");
		});
	});	   
}

function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');
}

function savemotherdata(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var mother_name = $('#txtmothername').val();
	var mother_dob = $('#txtmotherdob').val();
	var motherdeathstatus = $('#radmotherdeath').val();
	var periodofdeath = $('#ddldeathperiod option:selected').val();
	var hospital_reason_anc1 = $('input:radio[name=radanc1]:checked').val();
	var hospital_reason_anc2 = $('input:radio[name=radanc2]:checked').val();
	var hospital_reason_anc3 = $('input:radio[name=radanc3]:checked').val();
	var services_recieved = $("#ddlservicesrec option:selected").val();
	var pregnancyperiod = $("#ddlpregnancyperiod option:selected").val();
	var deliveryplace = $("#ddldeliveryplace option:selected").val();
	var deliveryassistby = $("#ddldeliveryassist option:selected").val();
	var hospitaldistance = $("#txthospitaldistance").val();
	var hospitaltype = $("#ddldhospitaltype option:selected").val();
	var amountpaid= $("#txtamountpaid").val();
	var deliverytype = $("#ddldeliverytype option:selected").val();
	var deliveryexplanation = $("#txtexplaindelivery").val();
	var birthchild = $("#txtbirthorder").val();
	var hospitalvisited = $("#ddlvisithospital option:selected").val();
	var datevisitedhospital = $("#txtfatherhosdate_death").val();
	var mrgdate = $("#txtmrgage").val();
	
	if ( voterid == "" || summary_id == ""  )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&mother_name='+mother_name+'&mother_dob='+mother_dob+'&motherdeathstatus='+motherdeathstatus+'&periodofdeath='+periodofdeath+'&services_recieved='+services_recieved+'&pregnancyperiod='+pregnancyperiod+'&deliveryplace='+deliveryplace+'&deliveryassistby='+deliveryassistby+'&hospital_reason_anc1='+hospital_reason_anc1+'&hospital_reason_anc2='+hospital_reason_anc2+'&hospital_reason_anc3='+hospital_reason_anc3+'&hospitaldistance='+hospitaldistance+'&hospitaltype='+hospitaltype+'&amountpaid='+amountpaid+'&deliverytype='+deliverytype+'&deliveryexplanation='+deliveryexplanation+'&birthchild='+birthchild+'&hospitalvisited='+hospitalvisited+'&datevisitedhospital='+datevisitedhospital+'&mrgdate='+mrgdate;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_mother_data/savemotherdata');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=motherdatafrm]'));
			}  
		});  
	}
}

    

$(document).ready(function() { 

	$("#divreg").hide();
	$("#ddldeathregistration").change(function(data) {
		var place = $("#ddldeathregistration option:selected").val();
		if(place == 'Home'){
			$("#divreg").hide();
		}
		else if ($("#ddldeathregistration option:selected").val() == "No") {
		$("#divreg").hide();
		}
		else{
			$("#divreg").show();
		}
	});
	
	
	$("#divdeliasst").hide();
	$("#hosresid").hide();
	$("#divtypehosp").hide();
	$("#amtpaid").hide();
	$("#delitype").hide();

	$("#ddldeliveryplace").change(function(data) {
		var place = $("#ddldeliveryplace option:selected").val();
		if(place == 'Home'){
			$("#divreg").hide();
		}
		else if ($("#ddldeliveryplace option:selected").val() == "hospital") {
		$("#divdeliasst").show();
		$("#hosresid").show();
		$("#divtypehosp").show();
		$("#amtpaid").show();
		$("#delitype").show();
	
		}
		else if ($("#ddldeliveryplace option:selected").val() == "other") {
			$("#divdeliasst").show();
		$("#hosresid").show();
		$("#divtypehosp").show();
	
		$("#amtpaid").show();
		$("#delitype").show();
		}
		else if($("#ddldeliveryplace option:selected").val() == "home") {
		$("#divdeliasst").show();
		$("#hosresid").hide();
	
		$("#divtypehosp").hide();
		$("#amtpaid").show();
		$("#delitype").show();
		}
	});
	
	
	
});		
</script>



<div id="main_top_panel">
	<h2 class="ico ico_drq_mother_data">During Pregnancy Period</h2>
</div>

<?php include_once(DRQ_MOTHER_DATA_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_MOTHER_DATA_PATH.'views/_blocks/layout.php');?>		
 
