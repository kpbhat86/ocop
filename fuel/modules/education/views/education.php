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

function saveeducation(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var enrollment_school = $("#ddlschoolenrol option:selected").val();
	var present_class = $("#txtpclass option:selected").val();
	var enrollment_pre_primary = $("#ddlschoolpre option:selected").val();
	var pre_primary_type = $("#ddlpreschtype option:selected").val();
	var pre_primary_date = $('#txtpredate').val();
	var enrollment_primary = $("#ddlpenroll option:selected").val();
	var primary_type = $("#ddlptype option:selected").val();
	var primary_date = $('#txtpridate').val();
	var present_school = $("#ddlpresentsch option:selected").val();
	var attending_regularly = $("#ddlattreg option:selected").val();
	var mismatch_reason = $("#ddlmismatch option:selected").val();
	var non_enrollment_reasons = $("#ddlnonenroll option:selected").val();
	var drop_out_reason = $("#ddldropreason option:selected").val();
	var re_enrolment_attempts = $('input:radio[name=radreenrolattmpt]:checked').val();
	var failure_attempts_reasons = $('#txtreasonfail').val();
	var disabled_facilities = $("#ddldisabledsch option:selected").val();
	var special_school = $("#ddlspecialsch option:selected").val();
	var transport_mode = $("#ddltransmode option:selected").val();
	var distance_traveled = $("#ddldistravel option:selected").val();
	if ( voterid == "" || summary_id == "" || enrollment_school == "")
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&enrollment_school='+enrollment_school+'&present_class='+present_class+'&enrollment_pre_primary='+enrollment_pre_primary+'&pre_primary_type='+pre_primary_type+'&pre_primary_date='+pre_primary_date+'&enrollment_primary='+enrollment_primary+'&primary_type='+primary_type+'&primary_date='+primary_date+'&present_school='+present_school+'&attending_regularly='+attending_regularly+'&mismatch_reason='+mismatch_reason+'&non_enrollment_reasons='+non_enrollment_reasons+'&drop_out_reason='+drop_out_reason+'&re_enrolment_attempts='+re_enrolment_attempts+'&failure_attempts_reasons='+failure_attempts_reasons+'&disabled_facilities='+disabled_facilities+'&special_school='+special_school+'&transport_mode='+transport_mode+'&distance_traveled='+distance_traveled;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('education/saveeducation');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				$("#ddlchildname").empty();
				resetForm($('form[name=educationfrm]')); 
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
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
			url	: "<?php echo fuel_url('education/childinfo');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				var education = data[0].survey_education_survey;
				$('#txtpclass').val(data[0].survey_education_survey);
				if(education > 1){
					$('#ddlschoolenrol').val("Yes");
					$("#divpresentsch").show();
				}else{
					$('#ddlschoolenrol').val("No");
				}
				if(education >= 2){
					$('#ddlschoolpre').val("Yes");
					$("#divpreschool1").show();
					$("#divpreschool2").show();
				}else{
					$('#ddlschoolpre').val("No");
					$("#divprischool1").show();
					$("#divprischool2").show();
				}
				if(education >= 3){
					$('#ddlpenroll').val("Yes");
				}else{
					$('#ddlpenroll').val("No");
				}
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
		if (document.getElementById('txtpredate').value == ''){
				document.getElementById('txtpredate').value =  day + '-' + month + '-' + year;
			}					
		if (document.getElementById('txtpridate').value == ''){
				document.getElementById('txtpridate').value =  day + '-' + month + '-' + year;
			}								   
	}
	
	$(document).ready(function() {
	
$("#div7").hide();
$("#div9").hide();
	$("#divpresentsch").hide();
	$("#divattending").hide();
	$("#divpreschool1").hide();
	$("#divpreschool2").hide();
	$("#divprischool1").hide();
	$("#divprischool2").hide();
	$("#divreenroll").hide();
	$("#divnonenroll").hide();
	$("#divnonenroll").hide();
	$("#divreenrolattmpt").hide();
	$("#divnonenrolled").hide();
	
	$("#txtpclass").change(function(data) {
		var education = $("#txtpclass option:selected").val();
		if(education > 1){
			$('#ddlschoolenrol').val("Yes");
			$("#divpresentsch").show();
			$("#divattending").show();
		}else{
			$('#ddlschoolenrol').val("No");
			$("#divpresentsch").hide();
			$("#divattending").hide();
		}
		if(education >= 2){
			$('#ddlschoolpre').val("Yes");
			$("#divpreschool1").show();
			$("#divpreschool2").show();
		}else{
			$('#ddlschoolpre').val("No");
			$("#divpreschool1").hide();
			$("#divpreschool2").hide();
		}
		if(education >= 3){
			$('#ddlpenroll').val("Yes");
			$("#divprischool1").show();
			$("#divprischool2").show();
		}else{
			$('#ddlpenroll').val("No");
			$("#divprischool1").hide();
			$("#divprischool2").hide();
		}
	});
	
	$("#ddlpenroll").change(function(data) {
		var primary_enroll = $("#ddlpenroll option:selected").val();
		if(primary_enroll == "Yes"){
			$("#divprischool1").show();
			$("#divprischool2").show();
			$("#divnonenroll").show();
		}else if(primary_enroll == "No"){
			$("#divpreschool1").hide();
			$("#divpreschool2").hide();
			$("#divnonenroll").hide();
		}else{
			$("#divprischool1").hide();
			$("#divprischool2").hide();
			$("#divnonenroll").hide();
		}
	});
	$("#div8").change(function(data) {
		var child_dis = $("#div8 option:selected").val();
		if(child_dis == "drop out"){
			$("#div9").show();
		}else {
			$("#div9").hide();
		}
	});
	
		$("#ddlchlddisable").change(function(data) {
		var child_dis = $("#ddlchlddisable option:selected").val();
		if(child_dis == "Yes"){
			$("#divdisabledsch").show();
			$("#divspecialsch").show();
		}else if(child_dis == "No"){
			$("#divdisabledsch").hide();
			$("#divspecialsch").hide();
		}
	});
	
	$("#ddlattreg").change(function(data) {
		var attreg = $("#ddlattreg option:selected").val();
		if(attreg == "Yes"){
			$("#divnonenroll").hide();
			$("#divreenrolattmpt").hide();
		}else if(attreg == "No"){
			$("#divnonenroll").show();
			$("#divreenrolattmpt").show();
		}
	});
	
		$("#div6").change(function(data) {
		var attreg = $("#div6 option:selected").val();
		if(attreg == "No"){
			$("#div7").hide();
		}else if(attreg == "Yes"){
			$("#div7").show();
		}
	});
	
	
	$("#ddlschoolpre").change(function(data) {
		var pre_enroll = $("#ddlschoolpre option:selected").val();
		if(pre_enroll == "Yes"){
			$("#divpreschool1").show();
			$("#divpreschool2").show();
		}else if(pre_enroll == "No"){
			$("#divpreschool1").hide();
			$("#divpreschool2").hide();
		}else{
			$("#divpreschool1").hide();
			$("#divpreschool2").hide();
		}
	});
	
	
	
	$("#ddlmismatch").change(function(data) {
		$("#divnonenrolled").hide();
		var abc = $("#ddlmismatch option:selected").val();
		if(abc == "not enrolled"){
			$("#divnonenrolled").show();
			$("#divnonenroll").show();
		}
	});
	
	
	$("input:radio[name=radreenrolattmpt]").click(function(data) {
		var re_enrollment = $('input:radio[name=radreenrolattmpt]:checked').val();
		if(re_enrollment == "No"){
			$("#divreenroll").show();
		}else if(re_enrollment == "Yes"){
			$("#divreenroll").hide();
		}else{
			$("#divreenroll").hide();
		}
	});
	
    $("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('education/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						resetForm($('form[name=educationfrm]'));
						$("#ddlchildname").empty();
					}
				}  
			});  
		}
    });
});
</script>

<script type="text/javascript">
var section = "demos/datepicker";
	$(function() {
		$( "#txtpridate" ).datepicker();
	});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_education">Education</h2>
</div>

<?php include_once(EDUCATION_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(EDUCATION_PATH.'views/_blocks/layout.php');?>		
 
