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

function householdcinfo() { 
	var hhid = $("#txtvoterid").val();	
	$("#ddlchildname").empty();		
	if (hhid == "")
	{
		alert('Please select the Household ID');
	}else{
		var dataString = 'hid='+hhid;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('information_child/householdcinfo');?>/",  
			data: dataString,
			datatype : "json"
		}).done(function (msg) {
				var child_name = eval(msg); 
				var optionlist="<option value=\"\">---Select---</option>";
				$(optionlist).appendTo("select#ddlchildname");
				$.each(child_name, function(i, j){
				var row="<option value=\""+child_name[i].survey_name_survey+"\">"+child_name[i].survey_name_survey+"</option>";
				$(row).appendTo("select#ddlchildname");
				});
			});	   
	}	
}
/*function householdinfo(){
	var hhid = $("#txtvoterid").val();			
	if (hhid == "")
	{
		alert('Please select the Household ID');
	}else{
		var dataString = 'hid='+hhid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('information_child/householdinfo');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txtdoornum').val(data[0].entry_door_no);
				$('#txtvillage').val(data[0].entry_village_name);
				$('#txtgrama').val(data[0].entry_grama_panchayat);
				$('#txttaluk').val(data[0].entry_taluk_block);
				$('#txtdistrict').val(data[0].entry_district_name);
				$('#txtdivison').val(data[0].entry_division);
				$('#txtheadname').val(data[0].entry_name_head_of_fly);
				$('#txtenum').val(data[0].entry_name_of_enum);
				$('#txtresp').val(data[0].entry_name_of_resp);
				$('#txtrel').val(data[0].entry_rel_wid_child);
			}  
		});
	}
}*/

	
function hhinfo(){
	var hhid = $("#txtvoterid").val();	
	var childname = $("#ddlchildname option:selected").val();		
	if (hhid == "" || childname == "" )
	{
		alert('Please select the Household ID and Name of the Child');
	}else{
		var dataString = 'hid='+hhid+'&childname='+childname;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('information_child/hhinfo');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txtdoornum').val(data[0].entry_door_no);
				$('#txtvillage').val(data[0].entry_village_name);
				$('#txtgrama').val(data[0].entry_grama_panchayat);
				$('#txttaluk').val(data[0].entry_taluk_block);
				$('#txtdistrict').val(data[0].entry_district_name);
				$('#txtdivison').val(data[0].entry_division);
				$('#txtheadname').val(data[0].entry_name_head_of_fly);
				$('#txtenum').val(data[0].entry_name_of_enum);
				$('#txtresp').val(data[0].entry_name_of_resp);
				$('#txtrel').val(data[0].entry_rel_wid_child);
				$('#txtguard').val(data[0].survey_guardian_child_relationship_survey);
				$('#txtrel').val(data[0].survey_relationship_with_head_family);
				$('#txtmname').val(data[0].survey_mother_child_relationship_survey);
				$('#txtfname').val(data[0].survey_father_child_relationship_survey);
				$('#txtage').val(data[0].survey_age_survey);
				$('#ddlgender').val(data[0].survey_gender_survey);
				$('#ddlpclass').val(data[0].survey_education_survey);
			}  
		});
	}
}
</script>

<script type="text/javascript">
var section = "demos/datepicker";
	$(function() {
		$( "#txtdate" ).datepicker();
	});
</script>
<script type="text/javascript">

function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');
}

function savesummary(){
	var voterid = $('#txtvoterid').val();
	var doornum = $("#txtdoornum").val();
	var sdate = $("#txtdate").val();
	var village = $("#txtvillage").val();
	var grama = $("#txtgrama").val();
	var taluk = $("#txttaluk").val();
	var district = $("#txtdistrict").val();
	var divison = $('#txtdivison').val();
	var headname = $('#txtheadname').val();
	var enumerator = $('#txtenum').val();
	var respondant = $('#txtresp').val();
	var guardian = $('#txtguard').val();
	var relationship = $("#txtrel option:selected").val();
	var mname = $('#txtmname').val();
	var fname = $('#txtfname').val();
	var cname = $("#ddlchildname option:selected").val();
	var age = $('#txtage').val();
	var gender = $("#ddlgender option:selected").val();
	var pclass = $("#ddlpclass option:selected").val();
	//var orphan = $('#txtorphan').val();
	var orphan = $("#ddlcorphan option:selected").val();
	var disability = $('#txtdisability').val();
	if ( voterid == "" || doornum == "" || sdate == "" || village == "" || grama == "" || taluk == "" || district == "" || headname == "" || enumerator == "" || respondant == "" || relationship == "" || mname == "" || fname == "" || cname == "" || age == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&doornum='+doornum+'&sdate='+sdate+'&village='+village+'&grama='+grama+'&taluk='+taluk+'&district='+district+'&divison='+divison+'&headname='+headname+'&enumerator='+enumerator+'&respondant='+respondant+'&guardian='+guardian+'&relationship='+relationship+'&mname='+mname+'&fname='+fname+'&cname='+cname+'&age='+age+'&gender='+gender+'&pclass='+pclass+'&orphan='+orphan+'&disability='+disability;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('information_child/savesummary');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=generalinfofrm]'));
				$("#ddlchildname").empty();
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
}
</script>
<div id="main_top_panel">

	<h2 class="ico ico_information_child">Summary of Questionnaire</h2>
</div>

<?php include_once(INFORMATION_CHILD_PATH.'views/_blocks/toolbar.php');?>	
<?php if(!empty($househid) && !empty($summaryid)){ ?>	
<?php include_once(INFORMATION_CHILD_PATH.'views/_blocks/update.php');?>
<? }else{ ?>	
<?php include_once(INFORMATION_CHILD_PATH.'views/_blocks/layout.php');?>	
<?php } ?>	
 
