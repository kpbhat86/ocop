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

/*$(document).ready(function() {
	$("#txtvoterid").change(function() {
		childname();
    });
});*/

function childname() { 
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
	//alert (voterid);
	$.ajax({  
		type: "POST",  
		url	: "<?php echo fuel_url('drq_birth_death_info/childname');?>/",  
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

function savebirthdetails(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var birth_reason = $('#txtstillbirth').val();
	var anc_1 = $("#ddlanc1 option:selected").val();
	var anc_2 = $("#ddlanc2 option:selected").val();
	var anc_3 = $("#ddlanc3 option:selected").val();
	var services_received = $("#ddlsreceived option:selected").val();
	var treatment_visit = $("#ddlvtreatment option:selected").val();
	var advice_recieved = $("#ddlrvisiting option:selected").val();
	var pregnancy_period = $("#ddlpperiod option:selected").val();
	var delivery_place = $("#ddldeliveryplace option:selected").val();
	var delivered_home_assisted = $("#ddldsssisted option:selected").val();
	if ( voterid == "" || birth_reason == "" || anc_1 == "" || anc_2 == "" || anc_3 == "" || services_received == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&birth_reason='+birth_reason+'&anc_1='+anc_1+'&anc_2='+anc_2+'&anc_3='+anc_3+'&services_received='+services_received+'&treatment_visit='+treatment_visit+'&advice_recieved='+advice_recieved+'&pregnancy_period='+pregnancy_period+'&delivery_place='+delivery_place+'&delivered_home_assisted='+delivered_home_assisted;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_birth_death_info/savebirthdetails');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=birthdetailsfrm]'));
			}  
		});  
	}
}

$(document).ready(function() { 
	$("#divreason").hide();
	$("#ddlvtreatment").change(function(data) {
		var place = $("#ddlvtreatment option:selected").val();
		if(place == 'Home'){
			$("#divreason").hide();
		}
		else if ($("#ddlvtreatment option:selected").val() == "No") {
		$("#divreason").hide();
		}
		
		else{
			$("#divreason").show();
			
		}
	});
});

</script>



<div id="main_top_panel">
	<h2 class="ico ico_birth_details">Birth Details</h2>
</div>

<?php include_once(DRQ_BIRTH_DEATH_INFO_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_BIRTH_DEATH_INFO_PATH.'views/_blocks/layout.php');?>		
 
