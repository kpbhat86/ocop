
<style>
div#action {
    background: #B7DCEC;
    border: 1px solid rgb(145, 202, 231);
    border-radius: 4px 4px 4px 4px;
    height: 210px;
    position: relative;
    width: 99.8%;
}
</style>
		<input id="txtpanchayat" name="txtpanchayat" type="hidden"   />

<div id="action">
	<div id="actions" class="reportbuttonbar">
		<ul>
	
		<table cellpadding="0" cellspacing="10" border="0">
<tr>		
		<td>
				<label>Country /ದೇಶ</label></td>
			 <td>
				<input id="txtcountry" name="txtcountry" type="text" value="India" readonly="readonly"/>
			</td>
		
		
			<td>
				<label>State /ರಾಜ್ಯ</label></td>
			 <td> 
			<select id="txtstate" name="txtstate" style="min-width:175px;">
					<option value="Select"  >Select</option>
					<option value="Andhra Pradesh"  >Andhra Pradesh</option>
					<option value="Arunachal Pradesh"  >Arunachal Pradesh</option>
					<option value="Assam"  >Assam</option>
					<option value="Bihar "  >Bihar </option>
					<option value="Chatisgarh "  >Chatisgarh </option>
					<option value="Delhi "  >Delhi </option>
					<option value="Goa "  >Goa </option>
					<option value="Gujarath "  >Gujarath </option>
					<option value="Haryana "  >Haryana </option>
					<option value="Himachal Pradesh"  >Himachal Pradesh</option>
					<option value="Jammu & Kashmir"  >Jammu & Kashmir</option>
					<option value="Jharkhand "  >Jharkhand </option>
					<option value="Karnataka " >Karnataka </option>
					<option value="Kerala "  >Kerala </option>
					<option value="Madhya Pradesh"  >Madhya Pradesh</option>
					<option value="Maharashtra "  >Maharashtra </option>
					<option value="Manipur "  >Manipur </option>
					<option value="Meghalaya "  >Meghalaya </option>
					<option value="Mizoram "  >Mizoram </option>
					<option value="Nagaland"  >Nagaland</option>
					<option value="Orissa "  >Orissa </option>
					<option value="Punjab"  >Punjab</option>
					<option value="Rajasthan "  >Rajasthan  </option>
					<option value="Sikkim "  >Sikkim </option>
					<option value="Tamil Nadu"  >Tamil Nadu</option>
					<option value="Uttar Pradesh"  >Uttar Pradesh</option>
					<option value="Uttranchal"  >Uttranchal</option>
					<option value="West Bengal"  >West Bengal</option>
				</select>
			</td>
				<td>
				<label>Division / ವಿಭಾಗ</label></td>
				<td>
				<select id="txtdivision"  name="txtdivision" style="min-width:175px;" >
					<?php 
					foreach($datad as $record) {
						echo '<option value="'.$record->division.'">'.$record->division."</option>";
					}?>
				</select>
			</td>
			
			</tr>
			<tr>
					<td>
				<label>District / ಜಿಲ್ಲೆ</label></td>
				<td>
				<select id="txtdistrict" name="txtdistrict" style="min-width:175px;">
					<option value="">---Select---</option>
				</select>
			</td>
			
				<td>
				<label>Taluk/ ತಾಲೂಕು </label></td><td>
				<select id="txttaluk"  name="txttaluk" style="min-width:175px;">
					<option value="">-- Select --</option>
				</select>			
			</td>
			
			
			
		
			<td style="width:40% !important;">
					<label><strong>Gramapanchayat:</strong></label></td><td>
					<select id="ddlpanchayat"  name="ddlpanchayat" style="min-width:200px;" >
					<option value="">-- Select --</option>
				</select>
			</td>
			</tr>
			<tr>

			
					<td style="width:30% !important;">
					<label><strong>Village:</strong></label></td><td><select id="ddlvillage"  name="ddlvillage" style="min-width:200px;" >
						<?php echo '<option value="'.Select.'">'.Select."</option>";
						foreach($data as $record) {
							echo '<option value="'.$record->nPartyName.'">'.$record->nPartyName."</option>";
						}
						?>
					</select>
			</td> 
			
				<td style="width:30% !important;">
					<label><strong>Year:</strong></label></td><td><input type="text" id="txtyear" name="txtyear" />
						<script type="text/javascript">
							$(txtyear).datepick({dateFormat: 'dd-mm-yyyy'});
						</script>
			</td> 
					<td style="width:30% !important;">
					<label><strong>Report Level:</strong></label></td><td><input id="txtreportlevel" name="txtreportlevel" type="textbox" />
			</td>
			</tr>
	</table>
	</div>
</div>

	<input type="hidden" id="dob" name="dob"  />
		
		<input type="hidden" id="age" name='age' value=''  />











<!--
<div id="action">
	<div id="actions" class="reportbuttonbar">
		<ul>
		<input id="txtstate" name="txtstate" type="hidden" value="Karnataka"   />
		<input id="txtdivision" name="txtdivision" type="hidden" value="Belgaum"   />
		<input id="txtdistrict" name="txtdistrict" type="hidden" value="Belgaum"   />
		<input id="txttaluk" name="txttaluk" type="hidden" value="Raybagh"   />
			<li class="spacer end">
					<label><strong>Gramapanchayat:</strong></label>
					<select id="ddlpanchayat"  name="ddlpanchayat" style="min-width:200px;" >
					<option value=""  selected="selected">-- Select --</option>
					<option value="Alagawadi"  >Alagawadi</option>
					<option value="Alakhanur"  >Alakhanur</option>
					<option value="Bekkeri"  >Bekkeri</option>
					<option value="Bhendwad"  >Bhendwad</option>
					<option value="Jodatti"  >Jodatti</option>
					<option value="Mavinhonda"  >Mavinhonda</option>
					<option value="Bhirdi"  >Bhirdi</option>
					<option value="Byakud"  >Byakud</option>
					<option value="Biranal"  >Biranal</option>
					<option value="Bommanal"  >Bommanal</option>
					<option value="Chinchali"  >Chinchali</option>
					<option value="Diggewadi"  >Diggewadi</option>
					<option value="Yadrav"  >Yadrav</option>
					<option value="Handigunda"  >Handigunda</option>
					<option value="Harugeri"  >Harugeri</option>
					<option value="Badbyakud"  >Badbyakud</option>
					<option value="Hidkal"  >Hidkal</option>
					<option value="Hubbarwadi"  >Hubbarwadi</option>
					<option value="Itnal"  >Itnal</option>
					<option value="Kandanawadi"  >Kandanawadi</option>
					<option value="Kappalguddi"  >Kappalguddi</option>
					<option value="Katakbhavi"  >Katakbhavi</option>
					<option value="Khemlapur"  >Khemlapur</option>
					<option value="Koligudda"  >Koligudda</option>
					<option value="Kudachi"  >Kudachi</option>
					<option value="Mekhali"  >Mekhali</option>
					<option value="Maradi"  >Maradi</option>
					<option value="Bavchi"  >Bavchi</option>
					<option value="Morab"  >Morab</option>
					<option value="Mugalkhoda"  >Mugalkhoda</option>
					<option value="Nandikurali"  >Nandikurali</option>
					<option value="Nasalapur"  >Nasalapur</option>
					<option value="Nidagundi"  >Nidagundi</option>
					<option value="Nagarala"  >Nagarala</option>
					<option value="Nilaji"  >Nilaji</option>
					<option value="Nipanal"  >Nipanal</option>
					<option value="Palbhavi"  >Palbhavi </option>
					<option value="Paramandawadi"  >Paramandawadi </option>
					<option value="Raibhag"  >Raibhag</option>
					<option value="Kanchakarwadi"  >Kanchakarwadi</option>
					<option value="Savadatti"  >Savadatti</option>
					<option value="Savasuddi"  >Savasuddi</option>
					<option value="Shiragur"  >Shiragur </option>
					<option value="Gundawada"  >Gundawada</option>
					<option value="Mantura"  >Mantura</option>
					<option value="Devapura Hatti"  >Devapura Hatti</option>
					<option value="Khanadal "  >Khanadal </option>
					<option value="Sulthanpura "  >Sulthanpura </option>
					<option value="Marakudi "  >Marakudi </option>
					<option value="Girinayakawadi "  >Girinayakawadi </option>
					<option value="Siddapura "  >Siddapura </option>
					<option value="Yelparatti"  >Yelparatti</option>
					<option value="Jalalpura "  >Jalalpura </option>
					<option value="Factory"  >Factory</option>
					<option value="Basthavad "  >Basthavad </option>
					<option value="Suttatti "  >Suttatti </option>
				</select>
			</li> 
			<li class="spacer end">
					<label><strong>Village:</strong></label><select id="ddlvillage"  name="ddlvillage" style="min-width:200px;" >
						<?php echo '<option value="'.Select.'">'.Select."</option>";
						foreach($data as $record) {
							echo '<option value="'.$record->nPartyName.'">'.$record->nPartyName."</option>";
						}
						?>
					</select>
			</li> 
			<li class="spacer end">
					<label><strong>Year:</strong></label>
					<input type="text" id="txtyear" name="txtyear" />
						<script type="text/javascript">
							$(txtyear).datepick({dateFormat: 'dd-mm-yyyy'});
						</script>
					</select>
			</li>
			<li class="spacer end">
				<label><strong>Report Level:</strong></label>
				<input id="txtreportlevel" name="txtreportlevel" type="textbox" />
			</li>
		</ul>
	</div>
</div>-->

<script>
//dependency dropdown	
$("#ddlpanchayat").change(function(){
	var id=$(this).val();
	var dataString = 'id='+ id;
	$('#ddlvillage').empty();
	$.ajax
	({
	type: "POST",
	url	: "<?php echo fuel_url('household/ajax_village');?>/", 
	data: dataString,
	cache: false,
	success: function(html){
		$('#ddlvillage').empty();
		$('#ddlvillage').enable();
		//$("#ddlvillage").html(html);
		var new_village = eval(html); 				   
							$.each(new_village, function(i, j){
							var row="<option value=\""+new_village[i].villages+"\">"+new_village[i].villages+"</option>";
							$(row).appendTo("select#ddlvillage");
						});
		} 
	});
});
</script>





<script>
$("#txtdistrict").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#txttaluk').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_taluk');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#txttaluk').empty();
$('#txttaluk').enable();
//$("#ddlvillage").html(html);
var new_taluk = eval(html); 			
					var row="<option selected=selected>Select</option>"
					$(row).appendTo("select#txttaluk");		  
					$.each(new_taluk, function(i, j){
					var row="<option value=\""+new_taluk[i].taluk+"\">"+new_taluk[i].taluk+"</option>";
					$(row).appendTo("select#txttaluk");
				});
} 
});

});

$("#txttaluk").change(function()
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





$("#txtdivision").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#txtdistrict').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_district');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#txtdistrict').empty();
$('#txtdistrict').enable();
//$("#ddlvillage").html(html);
var new_district = eval(html); 	
				var row="<option selected=selected>Select</option>"
				$(row).appendTo("select#txtdistrict");		
					$.each(new_district, function(i, j){
					var row="<option value=\""+new_district[i].district+"\">"+new_district[i].district+"</option>";
					$(row).appendTo("select#txtdistrict");
				});
} 
});

});

$("#txtstate").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$('#txtdivision').empty();
$.ajax
({
type: "POST",
url	: "<?php echo fuel_url('household/ajax_division');?>/", 
data: dataString,
cache: false,
success: function(html)
{
$('#txtdivision').empty();
$('#txtdivision').enable(); 
//$("#ddlvillage").html(html);
var new_division = eval(html); 	
					var row="<option selected=selected>Select</option>"
					$(row).appendTo("select#txtdivision");					 
					$.each(new_division, function(i, j){
					var row="<option value=\""+new_division[i].division+"\">"+new_division[i].division+"</option>";
					$(row).appendTo("select#txtdivision");
				});
} 
});

});




//dependency dropdown	
$("#ddlpanchayat").change(function(){
	var id=$(this).val();
	var dataString = 'id='+ id;
	$('#ddlvillage').empty();
	$.ajax
	({
	type: "POST",
	url	: "<?php echo fuel_url('household/ajax_village');?>/", 
	data: dataString,
	cache: false,
	success: function(html){
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





$("#ddlvillage").change(function(){
	var id=$(this).val();
	//alert(id);
	var dataString = 'id='+ id;
	$('#houseid').empty();
	$.ajax
	({
	type: "POST",
	url	: "<?php echo fuel_url('household/houseid');?>/", 
	data: dataString,
	cache: false,
	success: function(html){
		$('#houseid').empty();
		$('#houseid').enable();
		//$("#ddlvillage").html(html);
		var new_village = eval(html); 				   
							$.each(new_village, function(i, j){
							var row="<option value=\""+new_village[i].household_voters_id+"\">"+new_village[i].household_voters_id+"</option>";
							$(row).appendTo("select#houseid");
						});
		} 
	});
});

$("#houseid").change(function(){
	var id=$(this).val();
	//alert(id);
	var dataString = 'id='+ id;
	$('#childid').empty();
	$.ajax
	({
	type: "POST",
	url	: "<?php echo fuel_url('household/childid');?>/", 
	data: dataString,
	cache: false,
	success: function(html){
		$('#childid').empty();
		$('#childid').enable();
		//$("#ddlvillage").html(html);
		var new_village = eval(html); 				   
							$.each(new_village, function(i, j){
							var row="<option value=\""+new_village[i].child_name+"\">"+new_village[i].child_name+"</option>";
							$(row).appendTo("select#childid");
						});
		} 
	});
});





$("#childid").change(function(){
	var id=$(this).val();
	var hid = $("#houseid option:selected").val();
	//alert(hid);
	var dataString = 'id='+ id + '&hid=' + hid;
	$.ajax
  $.ajax({
            type: 'POST',
			url: "<?php echo fuel_url('household/processchk');?>",
			data: dataString,
			success: function(msg){
			var msg5=eval(msg);
			$.each(msg5, function(i, j){
			 var pvalue = j.process;
			document.getElementById("dob").value = pvalue;});
			
        var date1 = new Date();
		var dob = $('#dob').val();
        var date2=new Date(dob);
        var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/; //Regex to validate date format (dd/mm/yyyy)
		//alert(pattern.test(dob));
      //  if (pattern.test(dob)) {
            var y1 = date1.getFullYear(); //getting current year
            var y2 = date2.getFullYear(); //getting dob year
            var age = y1 - y2;           //calculating age 
           document.getElementById("age").value = age;
            //return true;
      //  } 
	   }  
	});
	//ageCount();
});


  function ageCount() {
        var date1 = new Date();
		var doberman = $('#dob').val();
      //  var  dob= document.getElementById("dob").value;
        var date2=new Date(dob);
        var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/; //Regex to validate date format (dd/mm/yyyy)
		alert(pattern.test(dob));
        if (pattern.test(dob)) {
            var y1 = date1.getFullYear(); //getting current year
            var y2 = date2.getFullYear(); //getting dob year
            var age = y1 - y2;           //calculating age 
           document.getElementById("age").value = age;
            return true;
        } else {
            alert("Invalid date format. Please Input in (dd/mm/yyyy) format!");
            return false;
        }

    }



</script>