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

function saveimmunization(){
	
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var bcgandopv = $("#ddlbcgandopv option:selected").val();
	var hpatities1 = $("#ddlhpatities1 option:selected").val();
	var dptandopv = $("#ddldptandopv option:selected").val();
	var hpatities2 = $("#ddlhpatities2 option:selected").val();
	var dpv2andopv3 = $("#ddldpv2andopv3 option:selected").val();
	var dpv3andopv4 = $("#ddldpv3andopv4 option:selected").val();
	var hepatitiesB3 = $("#ddlhepatitiesB3 option:selected").val();
	var measlesandopv5 = $("#ddlmeaslesandopv5 option:selected").val();
	var mmr = $("#ddlmmr option:selected").val();
	var booster1 = $("#ddlbooster1 option:selected").val();
	var typhoid = $('#ddltyphoid option:selected').val();
	var booster2 = $("#ddlbooster2 option:selected").val();
	var tetanustoxid1 = $('#ddltetanustoxid1 option:selected').val();
	var tetanustoxide2 = $('#ddltetanustoxide2 option:selected').val();
	var hib1 = $('#ddlhib1 option:selected').val();
	var hib2 = $('#ddlhib2 option:selected').val();
	var hib3 = $('#ddlhib3 option:selected').val();
	var hibbooster = $('#ddlhibbooster option:selected').val();
	var hepa1 = $('#ddlhepa1 option:selected').val();
	var hepa2 = $('#ddlhepa2 option:selected').val();
	var hibbooster = $('#ddlhibbooster option:selected').val();
	var vita = $('#ddlvita option:selected').val();
	var chicknpox = $('#ddlchicknpox option:selected').val();
	if ( voterid == "" || summary_id == "")
	{
		alert('Please enter mandatory fields');
	}
	else{
	
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&bcgandopv='+bcgandopv+'&hpatities1='+hpatities1+'&dptandopv='+dptandopv+'&hpatities2='+hpatities2+'&dptandopv='+dptandopv+'&hpatities2='+hpatities2+'&dpv2andopv3='+dpv2andopv3+'&dpv3andopv4='+dpv3andopv4+'&hepatitiesB3='+hepatitiesB3+'&measlesandopv5='+measlesandopv5+'&mmr='+mmr+'&booster1='+booster1+'&typhoid='+typhoid+'&booster2='+booster2+'&tetanustoxid1='+tetanustoxid1+'&tetanustoxide2='+tetanustoxide2+'&hib1='+hib1+'&hib2='+hib2+'&hib3='+hib3+'&hibbooster='+hibbooster+'&hepa1='+hepa1+'&hepa2='+hepa2+'&hibbooster='+hibbooster+'&vita='+vita+'&chicknpox='+chicknpox;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('immunization/saveimmunization');?>",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=immunizationfrm]')); 
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
$(document).ready(function() { 
$("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('immunization/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						resetForm($('form[name=immunizationfrm]'));
						$("#ddlchildname").empty();
					}
				}  
			});  
		}
    });
	$("#divassistance").hide();
    $("#ddlassistancerecvd").change(function(data) {
        var assistance_recieved = $("#ddlassistancerecvd option:selected").val();
		if(assistance_recieved == 'Yes'){
			$("#divassistance").show();
		}else{
			$("#divassistance").hide();
		}
    });
});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_immunization">Immunization</h2>
</div>

<?php include_once(IMMUNIZATION_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(IMMUNIZATION_PATH.'views/_blocks/layout.php');?>		
 
