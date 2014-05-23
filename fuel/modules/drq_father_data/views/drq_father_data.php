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

$(document).ready(function() { 
/*$("#txtfathername_death").keypress(function(e) {
    if(e.which < 97  || e.which > 122 ) {
        e.preventDefault();
    }
});*/
$("#ddlcprobfaced").change(function(data) {
        var certificate = $("#ddlcprobfaced option:selected").val();
		if(certificate == 'Yes'){
			$("#divassistancerecvd").show();
		}else{
			$("#divassistancerecvd").hide();
		}
    });
});
});

function allnumeric()  {  
	var txtchildage = $('#txtchildage').val();
	var isANumber = isNaN(txtchildage) === false;
	if (isANumber == false){
		alert('????? ???? /Please input numeric characters only');
	}
}
function allnumericdeath()  {  
	var txtfatherdod_death = $('#txtfatherdod_death').val();
	var isANumber = isNaN(txtfatherdod_death) === false;
	if (isANumber == false){
		alert('????? ???? /Please input numeric characters only');
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

function savefathersdata(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var fatherstatus = $("#ddldeathfatherstatus_death option:selected").val();
	var fathername = $("#txtfathername_death").val();
	var fatherdob = $("#ttxtfatherdob_death").val();
	var childage = $("#txtchildage").val();
	var mrgage = $("#txtmrgage").val();
	var dateofdeath = $("#txtfatherdod_death").val();
	var registrationdate = $("#ddldeathregistration option:selected").val();
	var deathreason = $("#txtdeathreason").val();
	var merragedate = $("#txtmrgage").val();
	var hospitalvisited = $("#ddlvisithospital option:selected").val();
	var reasonforvisit = $('#txtfatherhosdate_death').val();
	var sfatheroccupation = $("#txtfather_occupation").val();
	var fathereducation = $("#txtfather_education").val();
	var fathereincome = $("#txtfather_income").val();
	
	if ( voterid == "" )
	{
		alert('Please enter your house hold mandatory fields');
	}
	if (summary_id == "" )
	{
		alert('Please enter your Name of the Child mandatory fields');
	}
	else{
	
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&fatherstatus='+fatherstatus+'&fathername='+fathername+'&fatherdob='+fatherdob+'&childage='+childage+'&mrgage='+mrgage+'&dateofdeath='+dateofdeath+'&registrationdate='+registrationdate+'&deathreason='+deathreason+'&merragedate='+merragedate+'&hospitalvisited='+hospitalvisited+'&reasonforvisit='+reasonforvisit+'&sfatheroccupation='+sfatheroccupation+'&fathereducation='+fathereducation+'&fathereincome='+fathereincome;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_father_data/savefatherdata');?>",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=fatherdatafrm]')); 
  			}  
		}); 
               
		
		
	}
}
</script>



<div id="main_top_panel">
	<h2 class="ico ico_drq_father_death">Father's Death Details</h2>
</div>

<?php include_once(DRQ_FATHER_DATA_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_FATHER_DATA_PATH.'views/_blocks/layout.php');?>		
 
