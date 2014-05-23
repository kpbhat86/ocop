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

function savemotherdata(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var mothername = $("#txtmothername").val();
	var motherdob = $('#txtmotherdob').val();
	var hospitalreason = $('#txthospitalreason').val();
	var mothereducation = $('#txtmothereducation').val();
	var motherage = $('#txtmotherage').val();
	var motherdeathage = $('#txtmotherdeathage').val();
	var deathregistration = $("#txtdeathregistration").val();
	var ration_status = $('input:radio[name=radtreatment]:checked').val();
	var mothermrgage	= $("#txtmothermrgage").val();
	var txtmotheroccu = $('#txtmotheroccu').val();
	var txtmotherdeathrsn = $('#txtmotherdeathrsn').val();
	
	if ( voterid == "" || summary_id == ""  )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&mothername='+mothername+'&motherdob='+motherdob+'&hospitalreason='+hospitalreason+'&hospitalreason='+hospitalreason+'&mothereducation='+mothereducation+'&motherage='+motherage+'&motherdeathage='+motherdeathage+'&deathregistration='+deathregistration+'&ration_status='+ration_status+'&mothermrgage='+mothermrgage+'&txtmotheroccu='+txtmotheroccu+'&txtmotherdeathrsn='+txtmotherdeathrsn;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('drq_preg_mother_data/savemotherdata');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=motherdatafrm]'));
			}  
		});  
	}
}

var section = "demos/datepicker";
	$(function() {
		$( "#txtmotherdob" ).datepicker();
		//$( "#txtdob" ).datepicker(); 		
	});
</script>



<div id="main_top_panel">
	<h2 class="ico ico_drq_preg_mother_data">General Death Information</h2>
</div>

<?php include_once(DRQ_PREG_MOTHER_DATA_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(DRQ_PREG_MOTHER_DATA_PATH.'views/_blocks/layout.php');?>		
 
