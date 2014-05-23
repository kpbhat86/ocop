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
	
function householdinfo(){
	var hhid = $("#txtvoterid").val();			
	if (hhid == "")
	{
		alert('Please select the Household ID');
	}else{
		var dataString = 'hid='+hhid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('drq_information_child/householdinfo');?>",  
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
	var father_death = $("#ddlfdeath option:selected").val();
	var relationship = $('#txtrel').val();
	var child_death = $("#ddlcdeath option:selected").val();
	var num_child_death = $('#txtnumchilddeath').val();
	var num_pre_birth = $('#txtnumprebirth').val();
	var num_post_birth = $('#txtnumpostbirth').val();
	var mother_death = $("#ddlmdeath option:selected").val();
	var pregnancy_period = $('#txtpregnancyprd').val();
	var general = $('#txtgeneral').val();
	if ( voterid == "" || doornum == "" || sdate == "" || village == "" || grama == "" || taluk == "" || district == "" || headname == "" || enumerator == "" || respondant == "" || father_death == "" || relationship == "" || child_death == "" || mother_death == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&doornum='+doornum+'&sdate='+sdate+'&village='+village+'&grama='+grama+'&taluk='+taluk+'&district='+district+'&divison='+divison+'&headname='+headname+'&enumerator='+enumerator+'&respondant='+respondant+'&father_death='+father_death+'&relationship='+relationship+'&child_death='+child_death+'&num_child_death='+num_child_death+'&num_pre_birth='+num_pre_birth+'&num_post_birth='+num_post_birth+'&mother_death='+mother_death+'&pregnancy_period='+pregnancy_period+'&general='+general;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_information_child/savesummary');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=generalinfofrm]'));
				//setTimeout("location.href='<?= site_url('fuel/household'); ?>'", 1000);
			}  
		});  
	}
}
</script>
<div id="main_top_panel">

	<h2 class="ico ico_drq_information_child">Summary of Questionnaire</h2>
</div>

<?php include_once(DRQ_INFORMATION_CHILD_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_INFORMATION_CHILD_PATH.'views/_blocks/layout.php');?>		
 
