<div id="main_content_inner" style="border:0px solid #d6d7d6 !important;">
<form id="update_household_entry" name="update_household_entry" method="post" action=""> 
<div class="pad-5">
<fieldset>
<div class="pad-5">  
	<table width="100%" cellpadding="0" cellspacing="10" border="0" style="background:#cccccc;"> 
		<tr>
			<td colspan="2">
				<label>Household ID (Voter Card Id, Pan Card, Driving License or etc)</label>
			</td>
			<td colspan="6">  
				<input id="txtvoterid" name="txtvoterid" type="text" readonly="readonly" DISABLED>
			</td>
		</tr>
		<tr>
			<td>
				<label>Village</label>
			</td>  
			<td>
				<input type="text" id="ddlvillage" name="ddlvillage" DISABLED>
			</td>
			<td>
				<label>Grama Panchayat</label>
			</td>  
			<td>
				<input type="text" id="ddlpanchayat" name="ddlpanchayat" DISABLED>
			</td>
			<td>
				<label>Door No.</label>
			</td>
			<td>  
				<input id="txtdoorno" name="txtdoorno" type="text"  DISABLED />
			</td>
			<td>
				<label>Date</label>
			</td>
			<td>  
				<input id="txtdate" name="txtdate"  type="text" DISABLED />			
			</td>
		</tr>	
		<tr>
			<td>
				<label>Taluk /Block</label>
			</td>  
			<td>
				<input type="text" id="ddlblock" name="ddlblock" DISABLED>		
			</td>	
			<td>
				<label>District</label>
			</td>  
			<td>
				<div id="divplace" type="hidden"></div>	
				<input type="text" id="ddldistrict" name="ddldistrict" DISABLED>	
			</td>
			<td colspan="2">
				<label>Name of Head of the family</label>
			</td>
			<td colspan="2">
				<input id="txtheadf" name="txtheadf" type="text" DISABLED>
			</td>
		</tr>
		<tr>
			<td>
				<label>Division</label>
			</td>  
			<td colspan="3">
				<div id="divplace" type="hidden"></div>	
				<input type="text" id="ddldivision" name="ddldivision" DISABLED>
			</td>
			<td colspan="2">
				<label>Name of Respondent</label>
			</td>
			<td colspan="2">  
				<input id="txtrespondent" name="txtrespondent" type="text"   DISABLED>
			</td>
		</tr>
		<tr>
			<td>
				<label>Name of Enumerator</label>
			</td>
			<td colspan="3">  
				<input id="txtenumerator" name="txtenumerator" type="text"   DISABLED>
			</td>
			<td colspan="2">
				<label>Relationship With the Head of Family</label>
			</td>
			<td colspan="2">  
				<input id="txtrel" name="txtrel" type="text"   DISABLED>
			</td>
		</tr>
	</table>
</div>
</fieldset>
</div>

<div class="pad-5">
<fieldset>
<div class="pad-5">
	<table width="100%" cellspacing="10" cellpadding="0" <?php if(empty($mode)){ ?> style="background:#cccccc;" <? } ?>>
		<tr>	
			<td rowspan="2"><label>Total No. of People</label></td>
			<td rowspan="2">
				<input id="txttotppl" name="txttotppl" type="text"   />
			</td>
			<td><label>No. of Male</label></td>
			<td>
				<input id="txtmaleno" name="txtmaleno" type="text"   />
			</td>
			<td rowspan="2">
				<label>Type of Ration Card</label>
			</td>
			<td rowspan="2">
				<input id="txtration" name="txtration" type="text"   />
			</td>
		</tr>
		<tr>
			<td>
				<label>No. of Female</label>
			</td>
			<td>
				<input id="txtfemaleno" name="txtfemaleno" type="text"   />
			</td>
		</tr>
	</table>
</div>
</fieldset>
</div>

<div class="pad-5">
<fieldset>
<div class="pad-5">
<table width="100%" cellspacing="10" cellpadding="0" border="0" <?php if(empty($mode)){ ?> style="background:#cccccc;" <? } ?>>
	<tr>
		<th align="center">
			<label>Total No. of Childrens</label>
		</th>
		<th align="center">
			<label>0-3 yrs</label>
		</th>
		<th align="center">
			<label>4-6yrs</label>
		</th>
		<th align="center">
			<label>7-14yrs</label>
		</th>
		<th align="center">
			<label>15-18yrs</label>
		</th>
		<th align="center">
			<label>&nbsp;</label>
		</th>
		<th align="center">
			<label>No. of Orphan/Semi Orphan Children</label>
		</th>
		<th align="center">
			<label>No. of Children with Disability</label>
		</th>
	</tr>
	<tr>
		<td rowspan="2">
			<input id="txtchildtot" name="txtchildtot" type="text" style="width:100px;"   />
		</td>
		<td>
			<input id="txt03male" name="txt03male" type="text" style="width:70px;"   />
		</td>
		<td>
			<input id="txt36male" name="txt36male" type="text" style="width:70px;"   />
		</td>
		<td>
			<input id="txt64male" name="txt64male" type="text" style="width:70px;"   />
		</td>
		<td>
			<input id="txt1418male" name="txt1418male" type="text" style="width:70px;"   />
		</td>
		<td>
			<label>No. of Male</label>
		</td>
		<td>
			<input id="txtcorphannummale" name="txtcorphannummale" type="text" style="width:150px;"   />
		</td>
		<td>
			<input id="txtcdisabilitynummale" name="txtcdisabilitynummale" type="text" style="width:150px;"   />
		</td>
	</tr>
	<tr>
		<td>
			<input id="txt03female" name="txt03female" type="text" style="width:70px;"   />
		</td>
		<td>
			<input id="txt36female" name="txt36female" type="text"  style="width:70px;"  />
		</td>
		<td>
			<input id="txt64female" name="txt64female" type="text" style="width:70px;"   />
		</td>
		<td>
			<input id="txt1418female" name="txt1418female" type="text" style="width:70px;"   />
		</td>
		<td>
			<label>No. of female</label>
		</td>
		<td>
			<input id="txtcorphannumfemale" name="txtcorphannumfemale" type="text" style="width:150px;"   />
		</td>
		<td>
			<input id="txtcdisabilitynumfemale" name="txtcdisabilitynumfemale" type="text" style="width:150px;"   />
		</td>
	</tr>
</table>
</div>
</fieldset>
</div>

<div class="pad-5">
<fieldset>
<div class="pad-5">  
<table cellpadding="0" cellspacing="10" border="0" >
	<tr>
		<td>
			<label>Chid's Death</label>
		</td>
		<td>
			<input type="radio" id="radcdeath" name="radcdeath" value="Yes" /> Yes &nbsp;
			<input type="radio" id="radcdeath" name="radcdeath" value="No" /> No
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<label>Mother's Death</label>
		</td>
		<td>
			<input type="radio" id="radmdeath" name="radmdeath" value="Yes" /> Yes &nbsp;
			<input type="radio" id="radmdeath" name="radmdeath" value="No" /> No
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<label>Father's Death</label>
		</td>
		<td>
			<input type="radio" id="radfdeath" name="radfdeath" value="Yes" /> Yes &nbsp;
			<input type="radio" id="radfdeath" name="radfdeath" value="No" /> No
		</td>
    </tr>     
</table>
</div>
</fieldset>
</div>


<div class="pad-10">
	<input id="Update" class="cancel" type="button" value="Update" name="Update" onClick="edithousehold();">
	<div id="check_bar">&nbsp;</div>
</div>

</form>

<script type="text/javascript">
	function edithousehold(){
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
		var relationship = $('#txtrel').val();
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
		if ( state == "" || division == "" || voterid == "" || doorno == "" || respondent == "" || enumerator == "" || relationship == "" )
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
					setTimeout(function(){ window.location = "<?php echo fuel_url('manage_household');?>";}, 8000);
				}  
			});  
		}
	}
</script>
</div>