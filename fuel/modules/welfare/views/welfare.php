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
	$("#ddlchildname").empty();
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

function savewelfare(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var bhagyalaxmi_scheme = $("#ddlbhagyalaxmischeme option:selected").val();
	var bicycle_scheme = $("#ddlbicyclescheme option:selected").val();
	var devadasi_scheme = $("#ddldevadasischeme option:selected").val();
	var disability_certificate = $("#ddldisabilitycert option:selected").val();
	var facilities_provided = $('#txtfacilities').val();
	if ( voterid == "" || summary_id == "")
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&bhagyalaxmi_scheme='+bhagyalaxmi_scheme+'&bicycle_scheme='+bicycle_scheme+'&devadasi_scheme='+devadasi_scheme+'&disability_certificate='+disability_certificate+'&facilities_provided='+facilities_provided;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('welfare/savewelfare');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=welfarefrm]')); 
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
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
				url	: "<?php echo fuel_url('welfare/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						$("#ddlchildname").empty();
						resetForm($('form[name=welfarefrm]'));
					}
				}  
			});  
		}
    });
	$("#ddlchildname").change(function(data) {
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('welfare/checkDevadasi');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					var devadasi_mother = data[0].devadasi_mother;
					var devadasi_system = data[0].devadasi_system;
					
					if(devadasi_mother == 'Yes' && devadasi_system == 'Yes'){
						$("#divdevadasischeme").show();
					}else{
						$("#divdevadasischeme").hide();					
					}
				}  
			});
	});
	$("#ddlchildname").change(function(data) {
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('welfare/checkDisablity');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					var birth_disability = data[0].birth_disability;
					var disabled_facilities = data[0].disabled_facilities;
					var child_disability = data[0].child_disability;
					
					if(birth_disability == 'None' || disabled_facilities == 'None' || child_disability == 'None'){
						$("#divdisabilitycert").show();
					}else{
						$("#divdisabilitycert").hide();					
					}
				}  
			});
	});
});

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
				url	: "<?php echo fuel_url('welfare/childinfo');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					var gender = data[0].gender;
					if(gender == 2){
						$("#divbhagya").show();
					}else if(gender == 1){
						$("#divbhagya").hide();					
					}else{
						$("#divbhagya").show();					
					}
				}  
			});
		}
	}

$(document).ready(function() { 
	$("#divbhagya").hide();	
	$("#divdisability").hide();
	$("#ddldisabilitycert").change(function(data) {
		var disability_cert  = $("#ddldisabilitycert option:selected").val();
		if(disability_cert == 'Availed'){
			$("#divdisability").show();
		}else{
			$("#divdisability").hide();
		}
	});
	
});
</script>



<div id="main_top_panel">
	<h2 class="ico ico_welfare">Welfare</h2>
</div>

<?php include_once(WELFARE_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(WELFARE_PATH.'views/_blocks/layout.php');?>		
 
