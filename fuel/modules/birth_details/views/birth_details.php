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

function allnumeric()  
{  
	var txtbweight = $('#txtbweight').val();
	
	var isANumber = isNaN(txtbweight) === false;
if (isANumber == false){
   alert('ಸಂಕ್ಯ ಹಾಕಿ /Please input numeric characters only');
}
}

function maxcharacters(){
   var txtdelnum = $('#txtdelnum').val();
    
    if (txtdelnum.length>2){
        alert("The field cannot contain more than 2 characters!")
		  $('#txtdelnum').val('');
        return false
    }else {
        return true
    }
}	

function childname() { 
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
	$("#ddlchildname").empty();
	$.ajax({  
		type: "POST",  
		url	: "<?php echo fuel_url('birth_details/childname');?>/",  
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

function savebirthdetails(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var birth_weight = $('#txtbweight').val();
	var birth_disability = $("#ddlbdisability option:selected").val();
	var birth_registration = $('input:radio[name=radbreg]:checked').val();
	var birth_certificate = $('#txtcertno').val();
	var birth_not_registered = $("#txtbnreg option:selected").val();
	var nutricious_received = $('input:radio[name=radrecnut]:checked').val();
	var pregnancy_period = $("#ddlpperiod option:selected").val();
	var delivery_place = $("#ddldplace option:selected").val();
	var delivery_assisted = $("#ddldass option:selected").val();
	var hospital_distance = $('#txthdist').val();
	var hospital_type = $("#ddlhtype option:selected").val();
	var delivery_paid = $('#txtamntpaid').val();
	var delivery_type = $("#ddldtype option:selected").val();
	var delivery_difficult = $('#txtdelexp').val();
	var delivery_number = $('#txtdelnum').val();
	if ( voterid == ""  || birth_registration == ""  || delivery_type == "" || pregnancy_period == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&birth_weight='+birth_weight+'&birth_disability='+birth_disability+'&birth_registration='+birth_registration+'&birth_certificate='+birth_certificate+'&birth_not_registered='+birth_not_registered+'&nutricious_received='+nutricious_received+'&pregnancy_period='+pregnancy_period+'&delivery_place='+delivery_place+'&delivery_assisted='+delivery_assisted+'&hospital_distance='+hospital_distance+'&hospital_type='+hospital_type+'&delivery_paid='+delivery_paid+'&delivery_type='+delivery_type+'&delivery_difficult='+delivery_difficult+'&delivery_number='+delivery_number;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('birth_details/savebirthdetails');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=birthdetailsfrm]'));
				$("#ddlchildname").empty();
				setTimeout(function() {
					$("#check_bar").hide();
				}, 5000);
			}  
		});  
	}
}

$(document).ready(function() { 
	$("#divdass").hide();
	$("#div5").hide();
	
	$("#divhdist").hide();
	$("#divcertno").hide();
    $("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('birth_details/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						resetForm($('form[name=birthdetailsfrm]'));
						$("#ddlchildname").empty();
					}
				}  
			});  
		}
    });
	
$("#ddlcert").change(function(data) {
        var certificate = $("#ddlcert option:selected").val();
		if(certificate == 'Yes'){
			$("#divcertno").show();
		}else{
			$("#divcertno").hide();
		}
    });

$("#ddldplace").change(function(data) {
        var place = $("#ddldplace option:selected").val();
		if(place == 'Home'){
			$("#divdass").show();
			$("#divhdist").hide();
			$("#div4").hide();
			
		}
		else if(place == 'Hospital'){
			$("#divdass").hide();
			$("#divhdist").show();
			$("#div4").show();
		}
		
		else{
			$("#divdass").show();
			$("#divhdist").show();
			$("#div4").show();
		}
    });
	
	$("#ddlBreg").change(function(data) {
        var place = $("#ddlBreg option:selected").val();
		if(place == 'No'){
			$("#divd2").hide();
			$("#divcertno").hide();
			$("#divd3").show();
		}else if(place == 'Yes'){
			$("#divd2").show();
			$("#divd2").show(); 
			$("#divd3").hide();
		}
    });
	
	
	$("#ddldtype").change(function(data) {
        var place = $("#ddldtype option:selected").val();
		if(place == 'Difficult'){
			$("#div5").show();
		}else {
			$("#div5").hide();
		}
    });	
	

	
});



</script>

<div id="main_top_panel">
	<h2 class="ico ico_birth_details">Birth Details</h2>
</div>
	
<?php //echo $househid; echo $summaryid; ?>
<?php include_once(BIRTH_DETAILS_PATH.'views/_blocks/toolbar.php');?>		
<?php if(!empty($househid) && !empty($summaryid)){ ?>		
<?php include_once(BIRTH_DETAILS_PATH.'views/_blocks/update.php');?>
<? }else{ ?>		
<?php include_once(BIRTH_DETAILS_PATH.'views/_blocks/layout.php');?>	
<?php } ?>	
