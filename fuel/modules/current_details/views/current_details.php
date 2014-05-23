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

function savecurrentdetails(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var child_weight = $('#txtcweight').val();
	var child_height = $('#txtcheight').val();
	var child_disability = $("#ddlcdisability option:selected").val();
	var child_problem = $("#ddlcprobfaced option:selected").val();
	var assistance_recieved = $("#ddlassistancerecvd option:selected").val();
	var assistance_given = $("#ddlsssistancesrc option:selected").val();
	var health_center = $("#ddlhcenter option:selected").val();
	if ( voterid == "" || summary_id == "" || child_disability == ""  || child_problem == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&child_weight='+child_weight+'&child_height='+child_height+'&child_disability='+child_disability+'&child_problem='+child_problem+'&assistance_recieved='+assistance_recieved+'&assistance_given='+assistance_given+'&health_center='+health_center;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('current_details/savecurrentdetails');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=currentdetailsfrm]'));
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
	$("#divassistancerecvd").hide(); 
$("#ddlchildname").change(function(data) {
		var household_id = $('#txtvoterid').val();
		var child_name = $("#ddlchildname option:selected").val();
		if ( household_id != "" || child_name != ""){
			var dataString = 'household_id='+household_id+'&child_name='+child_name;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('current_details/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						$("#ddlchildname").empty();
						resetForm($('form[name=currentdetailsfrm]'));
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

$("#ddlcprobfaced").change(function(data) {
        var certificate = $("#ddlcprobfaced option:selected").val();
		if(certificate == 'Yes'){
			$("#divassistancerecvd").show();
		}else{
			$("#divassistancerecvd").hide();
		}
    });
});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_current_details">Current Details</h2>
</div>

<?php include_once(CURRENT_DETAILS_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(CURRENT_DETAILS_PATH.'views/_blocks/layout.php');?>		
 
