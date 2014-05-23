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

function sync()
{
  var presentAddr = document.getElementById('txtpreaddr');
  var permanentAddr  = document.getElementById('txtperaddr');
  permanentAddr.value = presentAddr.value;
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

function changeSelectedgender(selvalue) { 
	//alert(selvalue);
	var gend = "option[value=" + selvalue + "]";
	$("#ddlgender").find(gend).attr("selected", "selected");
}

function changeSelectedorphan(selvalue) { 
	//alert(selvalue);
	var orph = "option[value=" + selvalue + "]";
	$("#ddlcorphan").find(orph).attr("selected", "selected");
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
			url	: "<?php echo fuel_url('general_info/childinfo');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txtname').val(data[0].child_name);
				$('#txtfname').val(data[0].father_name);
				$('#txtmname').val(data[0].mother_name);
				$('#ddlgender').val(data[0].gender);
				$('#ddlcorphan').val(data[0].orphan);
				$('#ddlreligion').val(data[0].survey_religion_survey);
				$('#ddlcaste').val(data[0].survey_caste_survey);
				$('#txtpreaddr').val(data[0].survey_address_of_head_family);
				
				//changeSelectedgender(data[0].gender);
				//changeSelectedorphan(data[0].orphan);
				if(data[0].orphan == 'Yes'){
					$("#divorphan1").show();
					$("#divorphan2").show();
				}else{
					$("#divorphan1").hide();
					$("#divorphan2").hide();
				}
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
	var child_name = $('#txtname').val();
	var dob = $('#txtdob').val();
	var gender = $("#ddlgender option:selected").val();
	var father_name = $('#txtfname').val();
	var mother_name = $('#txtmname').val();
	var present_addr = $('#txtpreaddr').val();
	var permanent_addr = $('#txtperaddr').val();
	var child_living = $("#ddlcliving option:selected").val();
	var child_orphan = $("#ddlcorphan option:selected").val();
	var child_orphan_yes = $("#ddlcorphany option:selected").val();
	var child_orphan_since = $("#txtorphansince option:selected").val();
	var adopted_child = $('#txtadoptedchild').val();
	var religion = $("#ddlreligion option:selected").val();
	var caste = $("#ddlcaste option:selected").val();
	var ration_card_name = $("#ddlration option:selected").val();
	var ration_card_type = $("#ddlrationtype option:selected").val();
	if ( voterid == "" || child_name == "" || dob == "" || mother_name == "" || present_addr == "" || religion == "" || caste == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&child_name='+child_name+'&dob='+dob+'&gender='+gender+'&father_name='+father_name+'&mother_name='+mother_name+'&present_addr='+present_addr+'&permanent_addr='+permanent_addr+'&child_living='+child_living+'&child_orphan='+child_orphan+'&child_orphan_yes='+child_orphan_yes+'&child_orphan_since='+child_orphan_since+'&adopted_child='+adopted_child+'&religion='+religion+'&caste='+caste+'&ration_card_name='+ration_card_name+'&ration_card_type='+ration_card_type;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('general_info/savegeneralinfo');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				$("#ddlchildname").empty();
				resetForm($('form[name=generalinfofrm]'));
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
}

$(document).ready(function() { 
	$("#divorphan1").hide();
	$("#divorphan2").hide();
	$("#divration").hide();
    $("#ddlcorphan").change(function(data) {
        var child_orphan = $("#ddlcorphan option:selected").val();
		if(child_orphan == 'Yes'){
			$("#divorphan1").show();
			$("#divorphan2").show();
		}else{
			$("#divorphan1").hide();
			$("#divorphan2").hide();
		}
    });
    $("#ddlration").change(function(data) {
        var ration_card = $("#ddlration option:selected").val();
		if(ration_card == 'Yes'){
			$("#divration").show();
		}else{
			$("#divration").hide();
		}
    });
    $("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('general_info/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						$("#ddlchildname").empty();
						resetForm($('form[name=generalinfofrm]'));
					}
				}  
			});  
		}
    });
});
</script>


<script type="text/javascript">
//$(txtdob).datepick({dateFormat: 'dd-mm-yyyy'});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_general_info">General Info</h2>
</div>

<?php //echo $househid; echo $summaryid; ?>
<?php include_once(GENERAL_INFO_PATH.'views/_blocks/toolbar.php');?>	
<?php if(!empty($househid) && !empty($summaryid)){ ?>	
<?php include_once(GENERAL_INFO_PATH.'views/_blocks/update.php');?>	
<? }else{ ?>	
<?php include_once(GENERAL_INFO_PATH.'views/_blocks/layout.php');?>		
<?php } ?>			
 
