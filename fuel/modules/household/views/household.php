<script type="text/javascript">
	function copy() { 
		var mySelect = $('#ddldistrict').val();
		var dataString = 'mySelect='+mySelect;
		$.ajax({  
					type: "POST",  
					url	: "<?php echo fuel_url('household/taluk');?>/",  
					data: dataString,
					datatype : "json"
				   }).done(function (msg) {
				   var new_taluk = eval(msg); 
				   
				   $.each(new_taluk, function(i, j){
					var row="<option value=\""+new_taluk[i].taluk+"\">"+new_taluk[i].taluk+"</option>";
					$(row).appendTo("select#ddlblock"); 
					$(option).remove();
					});
				   }); 
	}
</script>
<script type="text/javascript">
	function talukchange() { 
		var talukid = $('#ddlblock').val();
		var dataString = 'talukid='+talukid;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('household/grama');?>/",  
			data: dataString,
			datatype : "json"
		}).done(function (msg) {
				var new_grama = eval(msg); 
				$.each(new_grama, function(i, j){
				var row="<option value=\""+new_grama[i].grama_panchayat+"\">"+new_grama[i].grama_panchayat+"</option>";
				$(row).appendTo("select#ddlpanchayat");
				});
			});	   
	}

</script>	
<script type="text/javascript">
	function gramapanchayat() { 
		var gramaid = $("#ddlpanchayat option:selected").val();
		var dataString = 'gramaid='+gramaid;
			$.ajax({  
				type: "POST",  
				url	: "<?php echo fuel_url('household/village');?>/",  
				data: dataString,
				datatype : "json"
			}).done(function (msg) {
					var new_village = eval(msg); 				   
					$.each(new_village, function(i, j){
					var row="<option value=\""+new_village[i].villages+"\">"+new_village[i].villages+"</option>";
					$(row).appendTo("select#ddlvillage");
				});
			});				   
	}
</script>
<script type="text/javascript">
function resetForm($form) {
    $form.find('input:text, input:password, input:file, select, textarea').val('');
    $form.find('input:radio, input:checkbox')
         .removeAttr('checked').removeAttr('selected');
}
function savehousehold(){
	var voterid = $('#txtvoterid').val();
	var state = $("#ddlstate option:selected").val();
	var division = $("#ddldivision option:selected").val();
	var district = $("#ddldistrict option:selected").val();
	var block = $("#ddlblock option:selected").val();
	var panchayat = $("#ddlpanchayat option:selected").val();
	var village = $("#ddlvillage option:selected").val();
	var hdate = $('#txtdate').val();
	var headf = $('#txtheadf').val();
	var doorno = $('#txtdoorno').val();
	var respondent = $('#txtrespondent').val();
	var enumerator = $('#txtenumerator').val();
	var relationship = $("#txtrel option:selected").val(); 
	var ration = $('#txtration').val();
	var totppl = $('#txttotppl').val();
	var maleno = $('#maleno').val();
	var femaleno = $('#txtfemaleno').val();
	var childtot = $('#txtchildtot').val();
	var child03m = $('#txt03male').val();
	var child36m = $('#txt36male').val();
	var child64m = $('#txt64male').val();
	var child1418m = $('#txt1418male').val();
	var child03f = $('#txt03female').val();
	var child36f = $('#txt36female').val();
	var child64f = $('#txt64female').val();
	var child1418f = $('#txt1418female').val();
	var corphannummale = $('#txtcorphannummale').val();
	var cdisabilitynummale = $('#txtcdisabilitynummale').val();
	var corphannumfemale = $('#txtcorphannumfemale').val();
	var cdisabilitynumfemale = $('#txtcdisabilitynumfemale').val();
	/*var malenum = $('#txtmalenum').val();
	var femalenum = $('#txtfemalenum').val();*/
	var cdeath = $('input:radio[name=radcdeath]:checked').val();//$('#radcdeath').val();
	var mdeath = $('input:radio[name=radmdeath]:checked').val();//$('#radmdeath').val();
	var fdeath = $('input:radio[name=radfdeath]:checked').val();//$('#radfdeath').val();
	if ( doorno == "" || respondent == "" || enumerator == "" || relationship == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&state='+state+'&division='+division+'&district='+district+'&block='+block+'&panchayat='+panchayat+'&village='+village+'&hdate='+hdate+'&headf='+headf+'&doorno='+doorno+'&respondent='+respondent+'&enumerator='+enumerator+'&relationship='+relationship+'&ration='+ration+'&totppl='+totppl+'&maleno='+maleno+'&femaleno='+femaleno+'&childtot='+childtot+'&child03m='+child03m+'&child36m='+child36m+'&child64m='+child64m+'&child1418m='+child1418m+'&child03f='+child03f+'&child36f='+child36f+'&child64f='+child64f+'&child1418f='+child1418f+'&cdisabilitynummale='+cdisabilitynummale+'&corphannumfemale='+corphannumfemale+'&cdisabilitynumfemale='+cdisabilitynumfemale+'&cdeath='+cdeath+'&mdeath='+mdeath+'&fdeath='+fdeath+'&corphannummale='+corphannummale;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('household/savehousehold');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				resetForm($('form[name=household_entry]'));
				//setTimeout("location.href='<?= site_url('fuel/household'); ?>'", 1000);
			}  
		});  
	}
}

function updatehousehold(){
	var voterid = $('#txtvoterid').val();
	var state = $("#ddlstate option:selected").val();
	var division = $("#ddldivision option:selected").val();
	var district = $("#ddldistrict option:selected").val();
	var block = $("#ddlblock option:selected").val();
	var panchayat = $("#ddlpanchayat option:selected").val();
	var village = $("#ddlvillage option:selected").val();
	var hdate = $('#txtdate').val();
	var headf = $('#txtheadf').val();
	var doorno = $('#txtdoorno').val();
	var respondent = $('#txtrespondent').val();
	var enumerator = $('#txtenumerator').val();
	var relationship = $("#txtrel option:selected").val(); 
	var ration = $('#txtration').val();
	var totppl = $('#txttotppl').val();
	var maleno = $('#maleno').val();
	var femaleno = $('#txtfemaleno').val();
	var childtot = $('#txtchildtot').val();
	var child03m = $('#txt03male').val();
	var child36m = $('#txt36male').val();
	var child64m = $('#txt64male').val();
	var child1418m = $('#txt1418male').val();
	var child03f = $('#txt03female').val();
	var child36f = $('#txt36female').val();
	var child64f = $('#txt64female').val();
	var child1418f = $('#txt1418female').val();
	var corphannummale = $('#txtcorphannummale').val();
	var cdisabilitynummale = $('#txtcdisabilitynummale').val();
	var corphannumfemale = $('#txtcorphannumfemale').val();
	var cdisabilitynumfemale = $('#txtcdisabilitynumfemale').val()
	var cdeath = $('input:radio[name=radcdeath]:checked').val();
	var mdeath = $('input:radio[name=radmdeath]:checked').val();
	var fdeath = $('input:radio[name=radfdeath]:checked').val();
	if ( doorno == "" || respondent == "" || enumerator == "" || relationship == "" )
	{
		alert('Please enter all mandatory fields');
	}else{
		var dataString = 'voterid='+voterid+'&state='+state+'&division='+division+'&district='+district+'&block='+block+'&panchayat='+panchayat+'&village='+village+'&hdate='+hdate+'&headf='+headf+'&doorno='+doorno+'&respondent='+respondent+'&enumerator='+enumerator+'&relationship='+relationship+'&ration='+ration+'&totppl='+totppl+'&maleno='+maleno+'&femaleno='+femaleno+'&childtot='+childtot+'&child03m='+child03m+'&child36m='+child36m+'&child64m='+child64m+'&child1418m='+child1418m+'&child03f='+child03f+'&child36f='+child36f+'&child64f='+child64f+'&child1418f='+child1418f+'&cdisabilitynummale='+cdisabilitynummale+'&corphannumfemale='+corphannumfemale+'&cdisabilitynumfemale='+cdisabilitynumfemale+'&cdeath='+cdeath+'&mdeath='+mdeath+'&fdeath='+fdeath+'&corphannummale='+corphannummale;
		$.ajax({  
			type: "POST",  
			url	: "<?php echo fuel_url('household/updatehousehold');?>/",  
			data: dataString,
			success: function(msg){  
				$("#check_bar").html(msg);
				setTimeout(function(){ window.location = "<?php echo fuel_url('household');?>";}, 5000);
				//resetForm($('form[name=household_entry]'));
			}  
		});  
	}
}
</script>
<script type="text/javascript">
$(document).ready(function() { 
	var mode = '<?php echo $mode; ?>';
	if(mode == '' || mode == 'NULL'){
		$("input#txttotppl").attr("disabled","disabled");
		$("input#txtmaleno").attr("disabled","disabled");
		$("input#txtration").attr("disabled","disabled");
		$("input#txtfemaleno").attr("disabled","disabled");
		$("input#txtchildtot").attr("disabled","disabled");
		$("input#txt03male").attr("disabled","disabled");
		$("input#txt36male").attr("disabled","disabled");
		$("input#txt64male").attr("disabled","disabled");
		$("input#txt1418male").attr("disabled","disabled");
		$("input#txtcorphannummale").attr("disabled","disabled");
		$("input#txtcdisabilitynummale").attr("disabled","disabled");
		$("input#txt03female").attr("disabled","disabled");
		$("input#txt36female").attr("disabled","disabled");
		$("input#txt64female").attr("disabled","disabled");
		$("input#txt1418female").attr("disabled","disabled");
		$("input#txtcorphannumfemale").attr("disabled","disabled");
		$("input#txtcdisabilitynumfemale").attr("disabled","disabled");
	}
	//dependency dropdown	
$("#ddlpanchayat").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#ddlvillage').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_village');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#ddlvillage').empty();
$('#ddlvillage').enable();
//$("#ddlvillage").html(html);
var new_village = eval(html); 				   
					var row="<option selected=selected>Select</option>"
					$(row).appendTo("select#ddlvillage");	  
					$.each(new_village, function(i, j){
					var row="<option value=\""+new_village[i].villages+"\">"+new_village[i].villages+"</option>";
					$(row).appendTo("select#ddlvillage");
				});
} 
});

});

$("#ddlblock").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#ddlpanchayat').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_panchayat');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#ddlpanchayat').empty();
$('#ddlpanchayat').enable();
//$("#ddlvillage").html(html);
var new_panchayat = eval(html);		 
				var row="<option selected=selected>Select</option>"
				$(row).appendTo("select#ddlpanchayat");	  
				$.each(new_panchayat, function(i, j){
					var row="<option value=\""+new_panchayat[i].panchayat+"\">"+new_panchayat[i].panchayat+"</option>";
					$(row).appendTo("select#ddlpanchayat");
				});	
} 
});

});

$("#ddldistrict").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#ddlblock').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_taluk');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#ddlblock').empty();
$('#ddlblock').enable();
//$("#ddlvillage").html(html);
var new_taluk = eval(html); 			
					var row="<option selected=selected>Select</option>"
					$(row).appendTo("select#ddlblock");		  
					$.each(new_taluk, function(i, j){
					var row="<option value=\""+new_taluk[i].taluk+"\">"+new_taluk[i].taluk+"</option>";
					$(row).appendTo("select#ddlblock");
				});
} 
});

});

$("#ddldivision").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#ddldistrict').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_district');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#ddldistrict').empty();
$('#ddldistrict').enable();
//$("#ddlvillage").html(html);
var new_district = eval(html); 	
				var row="<option selected=selected>Select</option>"
				$(row).appendTo("select#ddldistrict");		
					$.each(new_district, function(i, j){
					var row="<option value=\""+new_district[i].district+"\">"+new_district[i].district+"</option>";
					$(row).appendTo("select#ddldistrict");
				});
} 
});

});

$("#ddlstate").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#ddldivision').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_division');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#ddldivision').empty();
$('#ddldivision').enable(); 
//$("#ddlvillage").html(html);
var new_division = eval(html); 	
					var row="<option selected=selected>Select</option>"
					$(row).appendTo("select#ddldivision");					 
					$.each(new_division, function(i, j){
					var row="<option value=\""+new_division[i].division+"\">"+new_division[i].division+"</option>";
					$(row).appendTo("select#ddldivision");
				});
} 
});

});

});
$(document).ready(function() { 
	var mode = '<?php echo $mode; ?>';
	var hid = '<?php echo $household; ?>';
	if(mode == 'update' && hid != ''){
		var dataString = 'hid='+hid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/hdetails');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txtvoterid').val(data[0].household_voters_id);
				$('#ddlvillage').val(data[0].entry_village_name);
				$('#ddlpanchayat').val(data[0].entry_grama_panchayat);
				$('#txtdoorno').val(data[0].entry_door_no);
				$('#txtdate').val(data[0].entry_date_today);
				$('#ddlblock').val(data[0].entry_taluk_block);
				$('#ddldistrict').val(data[0].entry_district_name);
				$('#txtheadf').val(data[0].entry_name_head_of_fly);
				$('#ddldivision').val(data[0].entry_division);
				$('#txtrespondent').val(data[0].entry_name_of_resp);
				$('#txtenumerator').val(data[0].entry_name_of_enum);
				$('#txtrel').val(data[0].entry_rel_wid_child);
				$('#txtration').val(data[0].entry_type_of_rationcrd);
				var cd = data[0].entry_child_death;
				var md = data[0].entry_mother_death;
				var fd = data[0].entry_father_death;
				$("[name=radcdeath]").filter("[value='"+cd+"']").attr("checked",true);
				$("[name=radmdeath]").filter("[value='"+md+"']").attr("checked",true);
				$("[name=radfdeath]").filter("[value='"+fd+"']").attr("checked",true);
			}  
		});
	}else if(mode == 'edit' && hid != ''){
		var dataString = 'hid='+hid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/hdetails');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txtvoterid').val(data[0].household_voters_id);
				$('#ddlvillage').val(data[0].entry_village_name);
				$('#ddlpanchayat').val(data[0].entry_grama_panchayat);
				$('#txtdoorno').val(data[0].entry_door_no);
				$('#txtdate').val(data[0].entry_date_today);
				$('#ddlblock').val(data[0].entry_taluk_block);
				$('#ddldistrict').val(data[0].entry_district_name);
				$('#txtheadf').val(data[0].entry_name_head_of_fly);
				$('#ddldivision').val(data[0].entry_division);
				$('#txtrespondent').val(data[0].entry_name_of_resp);
				$('#txtenumerator').val(data[0].entry_name_of_enum);
				$('#txtrel').val(data[0].entry_rel_wid_child);
				$('#txtration').val(data[0].entry_type_of_rationcrd);
				$('#txttotppl').val(data[0].entry_tot_no_ppl);
				$('#txtmaleno').val(data[0].entry_no_of_male_ppl);
				$('#txtfemaleno').val(data[0].entry_no_of_female_ppl);
				$('#txtchildtot').val(data[0].entry_tot_no_childrns);
				$('#txt03male').val(data[0].entry_age0_3yrsmale);
				$('#txt36male').val(data[0].entry_age3_6yrsmale);
				$('#txt64male').val(data[0].entry_age6_14yrsmale);
				$('#txt1418male').val(data[0].entry_age14_18yrsmale);
				$('#txt03female').val(data[0].entry_age0_3yrsfemale);
				$('#txt36female').val(data[0].entry_age3_6yrsfemale);
				$('#txt64female').val(data[0].entry_age6_14yrsfemale);
				$('#txt1418female').val(data[0].entry_age14_18yrsfemale);
				$('#txtcdisabilitynummale').val(data[0].entry_no_child_disability_male);
				$('#txtcorphannummale').val(data[0].entry_no_of_male_orpdis);
				$('#txtcdisabilitynumfemale').val(data[0].entry_no_child_disability_female);
				$('#txtcorphannumfemale').val(data[0].entry_no_of_female_orpdis);
				var cd = data[0].entry_child_death;
				var md = data[0].entry_mother_death;
				var fd = data[0].entry_father_death;
				$("[name=radcdeath]").filter("[value='"+cd+"']").attr("checked",true);
				$("[name=radmdeath]").filter("[value='"+md+"']").attr("checked",true);
				$("[name=radfdeath]").filter("[value='"+fd+"']").attr("checked",true);
			}  
		});
	}
});

$(document).ready(function() { 
	var mode = '<?php echo $mode; ?>';
	var hid = '<?php echo $household; ?>';
	if(mode == 'update' && hid != ''){
	//alert (mode);
		var dataString = 'hid='+hid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/hsurveydetails');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				//alert(data);
				$('#txttotppl').val(data[0].total_num);
				$('#txtmaleno').val(data[0].total_male);
				$('#txtfemaleno').val(data[0].total_female);
				$('#txtchildtot').val(data[0].total_child);
			}  
		});
	}
});
$(document).ready(function() { 
	var mode = '<?php echo $mode; ?>';
	var hid = '<?php echo $household; ?>';
	$('#txtcorphannummale').val('0');
	$('#txtcdisabilitynummale').val('0');
	$('#txtcorphannumfemale').val('0');
	$('#txtcdisabilitynumfemale').val('0');
	if(mode == 'update' && hid != ''){
		var dataString = 'hid='+hid;
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/male03');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt03male').val(data[0].age_male_03);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/female03');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt03female').val(data[0].age_female_03);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/male36');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt36male').val(data[0].age_male_36);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/female36');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt36female').val(data[0].age_female_36);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/male614');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt64male').val(data[0].age_male_614);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/female614');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt64female').val(data[0].age_female_614);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/male1418');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt1418male').val(data[0].age_male_1418);
			}  
		});
		$.ajax({  
			type: "GET",  
			url	: "<?php echo fuel_url('household/female1418');?>",  
			data: dataString,
			dataType: "json",
			success: function(data){ 
				$('#txt1418female').val(data[0].age_female_1418);
			}  
		});
	}
});
</script> 
<div id="main_top_panel">
	<h2 class="ico ico_household">Household Entry</h2>
</div>

<?php if($mode == 'edit' && !empty($household)){ ?>		
<?php include_once(HOUSEHOLD_PATH.'views/_blocks/edit.php');?>	
<?php } else if($mode == 'update' && !empty($household)){ ?>		
<?php include_once(HOUSEHOLD_PATH.'views/_blocks/update.php');?>	
<?php }else{ ?>	
<?php include_once(HOUSEHOLD_PATH.'views/_blocks/layout.php');?>	
<?php } ?>
 
