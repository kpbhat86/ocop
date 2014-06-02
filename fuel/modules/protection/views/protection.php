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
	$("#ddlchildname").empty();
	//alert (voterid);
	$.ajax({  
		type: "POST",  
		url	: "<?php echo fuel_url('general_info/childname');?>/",  
		data: dataString,
		datatype : "json"
	}).done(function (msg) {
		var new_cn = eval(msg); 
		var optionlist="<option value=\"\">---Select---</option>";
		$(optionlist).appendTo("select#ddlchildname");
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

function saveprotection(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var child_working = $("#ddlcworking option:selected").val();
	var working_status = $('#ddlworkfp').val();
	var whom_work = $("#ddlworkwhom option:selected").val();
	var work_type = $("#ddlworktype option:selected").val();
	var missing = $("#ddlmissing option:selected").val();
	var missing_reason = $("#ddlmissingreason option:selected").val();
	var missing_date = $('#txtmissingdate').val();
	var fir_registered = $("#ddlfreg option:selected").val();
	var fir_date = $('#txtfirdate').val();
	var child_return = $("#ddlcreturn option:selected").val();
	var return_date = $('#txtreturndate').val();
	var child_marriage = $("#ddlcmarr option:selected").val();
	var marriage_date = $('#txtmarriagedate').val();
	var minor_pregnancy = $('input:radio[name=radpregnancy]:checked').val();
	var devadasi_mother = $('input:radio[name=radddmother]:checked').val();
	var devadasi_system = $("#ddldevadasisys option:selected").val();
	var devadasi_reason = $('#txtdevadasireason').val();
	var child_rescued = $("#ddlchildrescued option:selected").val();
	var before_cwc = $("#ddlchildrescuedreason option:selected").val();
	var service_kind = $('#txtservicekind').val();
	if ( voterid == "" || summary_id == "" || child_working == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&child_working='+child_working+'&working_status='+working_status+'&work_type='+work_type+'&whom_work='+whom_work+'&missing='+missing+'&missing_reason='+missing_reason+'&missing_date='+missing_date+'&fir_registered='+fir_registered+'&fir_date='+fir_date+'&child_return='+child_return+'&return_date='+return_date+'&child_marriage='+child_marriage+'&marriage_date='+marriage_date+'&minor_pregnancy='+minor_pregnancy+'&devadasi_mother='+devadasi_mother+'&devadasi_system='+devadasi_system+'&devadasi_reason='+devadasi_reason+'&child_rescued='+child_rescued+'&before_cwc='+before_cwc+'&service_kind='+service_kind;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('protection/saveprotection');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=protectionfrm]')); 
				$("#ddlchildname").empty();
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
}
</script>

<script type="text/javascript">
	function adddatepicker(){
		date = new Date();             
		var month = date.getMonth()+1;
		var day = date.getDate();
		var year = date.getFullYear();
		/*if (document.getElementById('txtmissingdate').value == ''){
				document.getElementById('txtmissingdate').value =  day + '-' + month + '-' + year;
			}				
		if (document.getElementById('txtfirdate').value == ''){
				document.getElementById('txtfirdate').value =  day + '-' + month + '-' + year;
			}				
		if (document.getElementById('txtreturndate').value == ''){
				document.getElementById('txtreturndate').value =  day + '-' + month + '-' + year;
			}				
		if (document.getElementById('txtmarriagedate').value == ''){
				document.getElementById('txtmarriagedate').value =  day + '-' + month + '-' + year;
			}*/						   
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
				url	: "<?php echo fuel_url('protection/childinfo');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					$('#ddlworktype').val(data[0].survey_occupation_survey);
					var occupation = data[0].survey_occupation_survey;
					if(occupation <= 9){
						//alert(occupation);
						$("#divcw1").show();
						$("#divcw2").show();
						$('#ddlcworking').val('Yes');
					}else if(occupation >= 10){
						$("#divcw1").hide();
						$("#divcw2").hide();
						$('#ddlcworking').val('No');					
					}else{
						$("#divcw1").hide();
						$("#divcw2").hide();
						$('#ddlcworking').val('No');					
					}
				}  
			});
		}
	}
	
	
$(document).ready(function() { 
	$("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('protection/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						resetForm($('form[name=protectionfrm]')); 
						$("#ddlchildname").empty();
					}
				}  
			});  
		}
    });
});

$(document).ready(function() { 
	$("#divcw1").hide();
	$("#divcw2").hide();
	$("#divworktype").hide();
	$("#ddlcworking").change(function(data) {
        var child_working = $("#ddlcworking option:selected").val();
		if(child_working == 'Yes'){
			$("#divcw1").show();
			$("#divcw2").show();
			$("#divworktype").show();
		}else if(child_working == 'No'){
			$("#divcw1").hide();
			$("#divcw2").hide();
			$("#divworktype").hide();
		}else{
			$("#divcw1").hide();
			$("#divcw2").hide();
			$("#divworktype").hide();
		}
    });
});

$(document).ready(function() { 
	$("#divcm1").hide();
	$("#divcm2").hide();
	$("#divcm3").hide();
	$("#divcm4").hide();
	$("#divcm5").hide();
	$("#divcm6").hide();
	
	
	$("#divcr11").hide();
	$("#divcmarr").hide();
	$("#divdds").hide();
	$("#divcr1").hide();
	$("#divcr2").hide();
	$("#ddlfreg").change(function(data) {
		var fir_reg = $("#ddlfreg option:selected").val();
		if(fir_reg == 'Yes'){
			$("#divcm4").show();
		}else{
			$("#divcm4").hide();
		}
	});
	$("#ddlcreturn").change(function(data) {
		var child_ret = $("#ddlcreturn option:selected").val();
		if(child_ret == 'Yes'){
			$("#divcm6").show();
		}else{
			$("#divcm6").hide();
		}
	});
	$("#ddlcmarr").change(function(data) {
		var child_marr = $("#ddlcmarr option:selected").val();
		if(child_marr == 'Yes'){
			$("#divcmarr").show();
		}else{
			$("#divcmarr").hide();
		}
	});
	$("#ddldevadasisys").change(function(data) {
		var devadasi_sys = $("#ddldevadasisys option:selected").val();
		if(devadasi_sys == 'Yes'){
			$("#divdds").show();
			$("#divcr11").show();
		}else{
			$("#divdds").hide();
			$("#divcr11").hide();
		}
	});
	$("#ddlchildrescued").change(function(data) {
		var child_rescued = $("#ddlchildrescued option:selected").val();
		if(child_rescued == 'Yes'){
			$("#divcr1").show();
			$("#divcr2").show();
		}else{
			$("#divcr1").hide();
			$("#divcr2").hide();
		}
	});
	$("#ddlmissing").change(function(data) {
        var child_missing = $("#ddlmissing option:selected").val();
		if(child_missing == 'Yes'){
			$("#divcm1").show();
			$("#divcm2").show();
			$("#divcm3").show();
			$("#divcm5").show();
		}else if(child_missing == 'No'){
			$("#divcm1").hide();
			$("#divcm2").hide();
			$("#divcm3").hide();
			$("#divcm4").hide();
			$("#divcm5").hide();
			$("#divcm6").hide();
		}else{
			$("#divcm1").hide();
			$("#divcm2").hide();
			$("#divcm3").hide();
			$("#divcm4").hide();
			$("#divcm5").hide();
			$("#divcm6").hide();
		}
    });
});
</script>

<script type="text/javascript">
var section = "demos/datepicker";
	$(function() {
		/*$( "#txtmissingdate" ).datepicker();
		$( "#txtfirdate" ).datepicker();
		$( "#txtreturndate" ).datepicker();
		$( "#txtmarriagedate" ).datepicker();*/
	});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_protection">Protection</h2>
</div>

<?php include_once(PROTECTION_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(PROTECTION_PATH.'views/_blocks/layout.php');?>		
 
