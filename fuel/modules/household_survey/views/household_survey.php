
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

function fill(thisValue){
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
			url	: "<?php echo fuel_url('household_survey/householdinfo');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txthead_fly').val(data[0].entry_name_head_of_fly);
				$('#txttotnum').val(data[0].entry_tot_no_ppl);
				$('#txtaddr1').val(data[0].entry_door_no);
				$('#txtaddr2').val(data[0].entry_village_name);
			}  
		});
	}
}

function chksavehouseholdsurvey(){
	var voterid = $('#txtvoterid').val();
	var headmember = $('#txthead_fly').val();
	var addr = $('#txtaddr1').val();
	var city = $('#txtcity').val();
	var state = $('#txtstate').val();
	var zip = $('#txtzip').val();
	var item_sku = $('#txtsku1').val();
	var item_name = $('#txtiname1').val();
	var qty = $('#txtqty1').val();
	var line_price = $('#txtprice1').val();
	var sub_amount = $('#txtsamnt').val();
	var total_amount = $('#txttamnt').val();
	if(voterid == '' || headmember == '' || addr == '' || city == '' || state == '' || zip == '' || item_sku == '' || item_name == '' || qty == '' || line_price == '' || sub_amount == '' || total_amount == '')
	{
		alert('Please enter all mandatory fields');
	}
}

function valcount(idvalue){
	document.getElementById('txttotnum').value = idvalue;
}
</script>

<div id="main_top_panel">
	<h2 class="ico ico_household_survey"><?=lang('module_household_survey')?></h2>
</div>
	<?php if(!empty($mode) && !empty($household)){ ?>
		<?php include_once(HOUSEHOLD_SURVEY_PATH.'views/_blocks/layout.php');?>
	<?php }else{ ?>
		<?php include_once(HOUSEHOLD_SURVEY_PATH.'views/_blocks/create.php');?>
	<?php } ?>