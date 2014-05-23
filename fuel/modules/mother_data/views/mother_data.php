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
				url	: "<?php echo fuel_url('mother_data/childinfo');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					$('#txtmname').val(data[0].mother_name);
					$('#ddlreligion').val(data[0].religion);
					$('#ddlcaste').val(data[0].caste);
				}  
			});
		}
	}

function childname() { 
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
	//alert (voterid);
	$("#ddlchildname").empty();
	$.ajax({  
		type: "POST",  
		url	: "<?php echo fuel_url('mother_data/childname');?>/",  
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

function savemotherdata(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var mother_status = $("#ddlstatus option:selected").val();
	var mother_name = $('#txtmname').val();
	var mother_dob = $('#txtmdob').val();
	var present_address = $('#txtpraddr').val();
	var permanent_address = $('#txtpaddr').val();
	var mother_religion = $("#ddlreligion option:selected").val();
	var mother_caste = $("#ddlcaste option:selected").val();
	var ration_status = $("#ddlration option:selected").val();
	var ration_type	= $("#ddlrationtype option:selected").val();
	var marriage_date = $('#txtmarriagedate').val();
	var marriage_age = $('#txtmarriageage').val();
	var hospital_visited = $("#ddltreatment option:selected").val();
	var hospital_reason = $('#txthospitalreason').val();
	var hospital_reason_anc1 = $('input:radio[name=radanc1]:checked').val();
	var hospital_reason_anc2 = $('input:radio[name=radanc2]:checked').val();
	var hospital_reason_anc3 = $('input:radio[name=radanc3]:checked').val();
	var madilu_scheme = $("#ddlmadilusch option:selected").val();
	var taayi_scheme = $("#ddltaayisch option:selected").val();
	var janani_scheme = $("#ddljananisch option:selected").val();
	var services_recieved = $("#ddlservicesrec option:selected").val();
	if ( voterid == "" || summary_id == "" || mother_status == "" || mother_name == "" || present_address == "" || mother_religion == "" || mother_caste == "")
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&mother_status='+mother_status+'&mother_name='+mother_name+'&mother_dob='+mother_dob+'&present_address='+present_address+'&permanent_address='+permanent_address+'&mother_religion='+mother_religion+'&mother_caste='+mother_caste+'&ration_status='+ration_status+'&ration_type='+ration_type+'&marriage_date='+marriage_date+'&marriage_age='+marriage_age+'&hospital_visited='+hospital_visited+'&hospital_reason='+hospital_reason+'&hospital_reason_anc1='+hospital_reason_anc1+'&hospital_reason_anc2='+hospital_reason_anc2+'&hospital_reason_anc3='+hospital_reason_anc3+'&madilu_scheme='+madilu_scheme+'&taayi_scheme='+taayi_scheme+'&janani_scheme='+janani_scheme+'&services_recieved='+services_recieved;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('mother_data/savemotherdata');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=motherdatafrm]'));
				$("#ddlchildname").empty();
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
}
function sync()
{
  var presentAddr = document.getElementById('txtpraddr');
  var permanentAddr  = document.getElementById('txtpaddr');
  permanentAddr.value = presentAddr.value;
}
$(document).ready(function() { 
	$("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('mother_data/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						$("#ddlchildname").empty();
						resetForm($('form[name=motherdatafrm]'));
					}
				}  
			});  
		}
    });
	$("#ddltreatment").change(function(data) {
		var treatment = $("#ddltreatment option:selected").val();
		if(treatment == "Yes"){
			$("#divhospitalreason").show();
		}else if(treatment == "No"){
			$("#divhospitalreason").hide();
		}
	});
	$("#ddlration").change(function(data) {
		var rationcard = $("#ddlration option:selected").val();
		if(rationcard == "Yes"){
			$("#div1").show();
		}else if(rationcard == "No"){
			$("#div1").hide();
		}
	});
});
</script>



<div id="main_top_panel">
	<h2 class="ico ico_mother_data">Data of Mother</h2>
</div>

<?php include_once(MOTHER_DATA_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(MOTHER_DATA_PATH.'views/_blocks/layout.php');?>		
 
