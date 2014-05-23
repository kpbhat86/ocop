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

function changeSelectedgender(selvalue) { 
	//alert(selvalue);
	var gend = "option[value=" + selvalue + "]";
	$("#ddlgender").find(gend).attr("selected", "selected");
}
	
function childinfo(){
	var hid = $("#txtvoterid").val();	
	var summaryid = $("#ddlchildname option:selected").val();		
	if (hid == "" || summaryid == '')
	{
		alert('Please select the Household ID and Name of the child');
	}else{
		var dataString = 'hid='+hid+'&summaryid='+summaryid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('drq_general_info/childinfo');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txtdob').val(data[0].dob);
				changeSelectedgender(data[0].gender);
			}  
		});
	}
}

function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');
}

function savegeneralinfo(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var death_reason = $('#ddlresnfordeath option:selected ').val();
	var dod = $('#txtdod').val();
	var periodfordeath = $("#ddlperiodfordeath option:selected").val();
	var deathreg = $('#ddldeathreg option:selected').val();
	var gender = $('#ddlgender option:selected').val();
	var dob = $('#txtdob').val();
	var birthorder = $("#txtbirthorder").val();
	var mothercarrying = $("#txtmothercarrying").val();
	
	var anc1 = $("#ddlanc1 option:selected").val();
	var anc2 = $("#ddlanc2 option:selected").val();
	var anc3  = $('#ddlanc3 option:selected').val();
	var services = $('#txtservices').val();
	var visitinghospital = $("#txtvisitinghospital").val();
	var pregnecyperiod = $("#ddlpregnecyperiod option:selected").val();
	var deleveryplace = $("#ddldeleveryplace option:selected").val();
	var treatmentstatus3 = $("#ddtreatmentstatus3 option:selected").val();	
	var childedustatus = $("#txtchildedustatus").val();
	var deleveryassist = $("#ddldeleveryassist option:selected").val();
	var immudeath = $("#txtimmudeath").val();
	if ( voterid == "" || summary_id == "" || death_reason == "" || dod == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
	
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&death_reason='+death_reason+'&dob='+dob+'&dod='+dod+'&periodfordeath='+periodfordeath+'&deathreg='+deathreg+'&gender='+gender+'&mothercarrying='+mothercarrying+'&anc2='+anc2+'&anc3='+anc3+'&services='+services+'&visitinghospital='+visitinghospital+'&pregnecyperiod='+pregnecyperiod+'&deleveryplace='+deleveryplace+'&childedustatus='+childedustatus+'&immudeath='+immudeath+'&birthorder='+birthorder+'&anc1='+anc1+'&treatmentstatus3='+treatmentstatus3+'&deleveryassist='+deleveryassist;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_general_info/savegeneralinfo');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=generalinfofrm]'));
			}  
		}); 
	} 
	
}
</script>

<script type="text/javascript">

$(document).ready(function() { 
	$("#divdeathdate").hide();
	$("#ddldobchildeath").change(function(data) {
		var place = $("#ddldobchildeath option:selected").val();
		if(place == 'Home'){
			$("#divdeathdate").hide();
		}
		else if ($("#ddldobchildeath option:selected").val() == "No") {
		$("#divdeathdate").hide();
		}
		else{
			$("#divdeathdate").show();
		}
	});
	
	$("#divdeathregno").hide();
	$("#ddldeathreg").change(function(data) {
		var place = $("#ddldeathreg option:selected").val();
		if(place == 'Home'){
			$("#divdeathregno").hide();
		}
		else if ($("#ddldeathreg option:selected").val() == "No") {
		$("#divdeathregno").hide();
		}
		else{
			$("#divdeathregno").show();
		}
	});
	
	
	$("#divreason").hide();
	$("#ddtreatmentstatus3").change(function(data) {
		var place = $("#ddtreatmentstatus3 option:selected").val();
		if(place == 'Home'){
			$("#divreason").hide();
		}
		else if ($("#ddtreatmentstatus3 option:selected").val() == "No") {
		$("#divreason").hide();
		}
		else{
			$("#divreason").show();
		}
	});
	
	
	
});	



var section = "demos/datepicker";
	$(function() {
		$( "#txtdeathdate" ).datepicker();
		$( "#txtdob" ).datepicker(); 		
	});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_general_info">General Death Info</h2>
</div>

<?php include_once(DRQ_GENERAL_INFO_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_GENERAL_INFO_PATH.'views/_blocks/layout.php');?>		
 
