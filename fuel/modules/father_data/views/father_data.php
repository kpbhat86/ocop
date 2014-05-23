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
  var presentAddr = document.getElementById('txtfatherpreaddr');
  var permanentAddr  = document.getElementById('txtfatherperaddr');
  permanentAddr.value = presentAddr.value;
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
				url	: "<?php echo fuel_url('father_data/childinfo');?>",  
				data: dataString,
				dataType: "json",
				success: function(data){ 
					$('#txtfathername').val(data[0].father_name);
					$('#ddlfatherreligion').val(data[0].religion);
					$('#ddlfathercaste').val(data[0].caste);
				}  
			});
		}
}

function childname() { 
	var voterid = $('#txtvoterid').val();
	var dataString = 'voterid='+voterid;
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

function savefathersdata(){
	var voterid = $('#txtvoterid').val();
	var summary_id = $("#ddlchildname option:selected").val();
	var fatherstatus = $("#ddlfatherstatus option:selected").val();
	var fathername = $("#txtfathername").val();
	var fatherdob = $("#txtfatherdob").val();
	var fatherpreaddr = $("#txtfatherpreaddr").val();
	var fatherperaddr = $("#txtfatherperaddr").val();
	var fatherreligion = $("#ddlfatherreligion option:selected").val();
	var fathercaste = $("#ddlfathercaste option:selected").val();
	var fatherration = $("#ddlfatherration option:selected").val();
	var fatherrationtype = $("#ddlfatherrationtype option:selected").val();
	var fathermrg = $("#txtfathermrg").val();
	var fathermrgage = $('#txtfathermrgage').val();
	var fatherhos = $("#radfatherhos option:selected").val();
	//var fatherhos = $("#radfatherhos").val();
	var fatherhosdate = $("#ddlhospitalreason option:selected").val();
	
	if ( voterid == "" )
	{
		alert('Please enter your Household ID');
	}
	if (summary_id == "" )
	{
		alert('Please select Name of the Child');
	}
	else{
	
		var dataString = 'voterid='+voterid+'&summary_id='+summary_id+'&fatherstatus='+fatherstatus+'&fathername='+fathername+'&fatherdob='+fatherdob+'&fatherpreaddr='+fatherpreaddr+'&fatherperaddr='+fatherperaddr+'&fatherreligion='+fatherreligion+'&fathercaste='+fathercaste+'&fatherration='+fatherration+'&fatherrationtype='+fatherrationtype+'&fathermrg='+fathermrg+'&fathermrgage='+fathermrgage+'&fatherhos='+fatherhos+'&fatherhosdate='+fatherhosdate;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('father_data/savefatherdata');?>",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=fatherdatafrm]')); 
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
				url	: "<?php echo fuel_url('father_data/checkrecord');?>/",  
				data: dataString,
				success: function(msg){  
					if(msg == '1'){
						alert('Record Already Exists');
						$("#ddlchildname").empty();
						resetForm($('form[name=fatherdatafrm]'));
					}
				}  
			});  
		}
    });
	
	
		$("#div18").change(function(data) {
		var fatherhos = $("#radfatherhos option:selected").val();
		if(fatherhos == "No"){
			$("#visitHosp").hide();
		}else {
			$("#visitHosp").show();
		}
	});
	
	
	
});
</script>



<div id="main_top_panel">
	<h2 class="ico ico_father_data">Data of Father</h2>
</div>

<?php include_once(FATHER_DATA_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(FATHER_DATA_PATH.'views/_blocks/layout.php');?>		
 
