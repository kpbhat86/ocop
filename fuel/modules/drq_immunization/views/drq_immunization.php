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
	$.ajax({  
		type: "POST",  
		url	: "<?php echo fuel_url('general_info/childname');?>/",  
		data: dataString,
		datatype : "json"
	}).done(function (msg) {
		var new_cn = eval(msg); 
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

function savecurrentdetails(){
	
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var bcgandopv = $("#ddlbcgandopv_drq option:selected").val();
	var hpatities1 = $("#ddlhpatities1_drq option:selected").val();
	var dptandopv = $("#ddldptandopv_drq option:selected").val();
	var hpatities2 = $("#ddlhpatities2_drq option:selected").val();
	var dpv2andopv3 = $("#ddldpv2andopv3_drq option:selected").val();
	var dpv3andopv4 = $("#ddldpv3andopv4_drq option:selected").val();
	var hepatitiesB3 = $("#ddlhepatitiesB3_drq option:selected").val();
	var measlesandopv5 = $("#ddlmeaslesandopv5_drq option:selected").val();
	var mmr = $("#ddlmmr_drq option:selected").val();
	var booster1 = $("#ddlbooster1_drq option:selected").val();
	var typhoid = $('#ddltyphoid_drq option:selected').val();
	var booster2 = $("#ddlbooster2_drq option:selected").val();
	var tetanustoxid1 = $('#ddltetanustoxid1_drq option:selected').val();
	var tetanustoxide2 = $('#ddltetanustoxide2_drq option:selected').val();
	var hib1 = $('#ddlhib1_drq option:selected').val();
	var hib2 = $('#ddlhib2_drq option:selected').val();
	var hib3 = $('#ddlhib3_drq option:selected').val();
	var hibbooster = $('#ddlhibbooster_drq option:selected').val();
	var hepa1 = $('#ddlhepa1_drq option:selected').val();
	var hepa2 = $('#ddlhepa2_drq option:selected').val();
	var hibbooster = $('#ddlhibbooster_drq option:selected').val();
	var vita = $('#ddlvita_drq option:selected').val();
	var chicknpox = $('#ddlchicknpox_drq option:selected').val();
	if ( voterid == "" )
	{
		alert('Please enter your house hold mandatory fields');
	}
	if (summary_id == "" )
	{
		alert('Please enter your Name of the Child mandatory fields');
	}
	else{
	
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&bcgandopv='+bcgandopv+'&hpatities1='+hpatities1+'&dptandopv='+dptandopv+'&hpatities2='+hpatities2+'&dptandopv='+dptandopv+'&hpatities2='+hpatities2+'&dpv2andopv3='+dpv2andopv3+'&dpv3andopv4='+dpv3andopv4+'&hepatitiesB3='+hepatitiesB3+'&measlesandopv5='+measlesandopv5+'&mmr='+mmr+'&booster1='+booster1+'&typhoid='+typhoid+'&booster2='+booster2+'&tetanustoxid1='+tetanustoxid1+'&tetanustoxide2='+tetanustoxide2+'&hib1='+hib1+'&hib2='+hib2+'&hib3='+hib3+'&hibbooster='+hibbooster+'&hepa1='+hepa1+'&hepa2='+hepa2+'&hibbooster='+hibbooster+'&vita='+vita+'&chicknpox='+chicknpox;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_immunization/saveimmunization');?>",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=currentdetailsfrm]'));
  			}  
		}); 
               
		
		
	}
}
</script>



<div id="main_top_panel">
	<h2 class="ico ico_immunization">Immunization</h2>
</div>

<?php include_once(DRQ_IMMUNIZATION_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_IMMUNIZATION_PATH.'views/_blocks/layout.php');?>		
 
