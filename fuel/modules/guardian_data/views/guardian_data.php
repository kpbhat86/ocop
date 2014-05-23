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



function sync()
{
  var presentAddr = document.getElementById('txtguardianpreaddr');
  var permanentAddr  = document.getElementById('txtguardianperaddr');
  permanentAddr.value = presentAddr.value;
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
				url	: "<?php echo fuel_url('guardian_data/childinfo');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					$('#txtguardianname').val(data[0].guardian);
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

function saveguardiansdata(){	
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var guardianstatus = $("#ddlguardianstatus option:selected").val();
	var guardianname = $("#txtguardianname").val();
	var guardiandob = $("#txtguardiandob").val();
	var guardianpreaddr = $("#txtguardianpreaddr").val();
	var guardianperaddr = $("#txtguardianperaddr").val();
	var guardianreligion = $("#ddlguardianreligion option:selected").val();
	var guardiancaste = $("#ddlguardiancaste option:selected").val();
	var guardianration = $("#ddlguardianration option:selected").val();
	var guardianrationtype = $("#ddlguardianrationtype option:selected").val();
	var guardianmrg = $("#txtguardianmrg").val();
	var guardianmrgage = $('#txtguardianmrgage').val();
	var guardianhos = $("#radguardianhos").val();
	var guardianhosdate = $('#txtguardianhosdate').val();
	
	if ( voterid == "" || summary_id == "" || guardianname == "" || guardianpreaddr == "" || guardianperaddr =="" || guardiancaste == "" || guardianreligion == "" || guardianration == "")
	{
		alert('Please enter all mandatory fields');
	}
	else{	
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&guardianstatus='+guardianstatus+'&guardianname='+guardianname+'&guardiandob='+guardiandob+'&guardianpreaddr='+guardianpreaddr+'&guardianperaddr='+guardianperaddr+'&guardianreligion='+guardianreligion+'&guardiancaste='+guardiancaste+'&guardianration='+guardianration+'&guardianrationtype='+guardianrationtype+'&guardianmrg='+guardianmrg+'&guardianmrgage='+guardianmrgage+'&guardianhos='+guardianhos+'&guardianhosdate='+guardianhosdate;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('guardian_data/saveguardiandata');?>",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=guardianinfofrm]'));
				$("#ddlchildname").empty();
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
				url	: "<?php echo fuel_url('guardian_data/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						$("#ddlchildname").empty();
						resetForm($('form[name=guardianinfofrm]'));
					}
				}  
			});  
		}
    });
});
</script>



<div id="main_top_panel">
	<h2 class="ico ico_guardian_data">Guardian data</h2>
</div>

<?php include_once(GUARDIAN_DATA_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(GUARDIAN_DATA_PATH.'views/_blocks/layout.php');?>		
 
