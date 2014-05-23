<div id="main_content_inner" style="border:0px solid #d6d7d6 !important;">
<form id="update_household_entry" name="update_household_entry" method="post" action=""> 
<div class="pad-5">
<fieldset>
<div class="pad-5">  
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
		<tr>
			<td colspan="2">
				<label>Household ID (Voter Card Id, Pan Card, Driving License or etc)</label>
			</td>
			<td colspan="6">  
				<input id="txtvoterid" name="txtvoterid" type="text" readonly="readonly" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Village</label>
			</td>  
			<td>
				<select id="ddlvillage" name="ddlvillage" style="min-width:175px;">
					<option value="27" selected="selected">-- Select --</option>
					<option value="Alagawadi">Alagawadi</option>
					<option value="Alakhanur">Alakhanur</option>
					<option value="Bekkeri">Bekkeri</option>
					<option value="Bhendwad">Bhendwad</option>
					<option value="Jodatti">Jodatti</option>
					<option value="Mavinhonda">Mavinhonda</option>
					<option value="Bhiradi">Bhiradi</option>
					<option value="Byakud">Byakud</option>
					<option value="Biranal">Biranal</option>
					<option value="Bommanal">Bommanal</option>
					<option value="Chinchali">Chinchali</option>
					<option value="Diggewadi">Diggewadi</option>
					<option value="Yadrav" >Yadrav</option>
					<option value="Handigunda"  >Handigunda</option>
					<option value="Harogeri"  >Harogeri</option>
					<option value="Badbyakud"  >Badbyakud</option>
					<option value="Hidakal"  >Hidakal</option>
					<option value="Hubbarwadi"  >Hubbarwadi</option>
					<option value="Itanal"  >Itanal</option>
					<option value="Kandanawadi"  >Kandanawadi</option>
					<option value="Kappalguddi"  >Kappalguddi</option>
					<option value="Katakbhavi"  >Katakbhavi</option>
					<option value="Khemalapur"  >Khemalapur </option>
					<option value="Koligudda"  >Koligudda</option>
					<option value="Kudachi"  >Kudachi(Rural)</option>
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
					<option value="Raibhag"  >Raibhag (Rural)</option>
					<option value="Kanchakarwadi"  >Kanchakarwadi</option>
					<option value="Savadatti"  >Savadatti</option>
					<option value="Savasuddi"  >Savasuddi</option>
					<option value="Shiragur"  >Shiragur </option>
					<option value="Gundawada"  >Gundawada</option>
				</select>
			</td>
			<td>
				<label>Grama Panchayat</label>
			</td>  
			<td>
				<select id="ddlpanchayat" name="ddlpanchayat" style="min-width:175px;">
				<option value="0"  selected="selected">-- Select --</option>
					<option value="Alagawadi"  >Alagawadi</option>
					<option value="Alakhanur"  >Alakhanur</option>
					<option value="Bekkeri"  >Bekkeri</option>
					<option value="Bhendwad"  >Bhendwad</option>
					<option value="Bhiradi"  >Bhiradi</option>
					<option value="Byakud"  >Byakud</option>
					<option value="Chinchali"  >Chinchali</option>
					<option value="Diggewadi"  >Diggewadi</option>
					<option value="Handigunda"  >Handigunda</option>
					<option value="Harogeri"  >Harogeri</option>
					<option value="Hidakal"  >Hidakal</option>
					<option value="Hubbarwadi"  >Hubbarwadi</option>
					<option value="Itanal"  >Itanal</option>
					<option value="Kandanawadi"  >Kandanawadi</option>
					<option value="Kappalguddi"  >Kappalguddi</option>
					<option value="Katakbhavi"  >Katakbhavi</option>
					<option value="Khemalapur"  >Khemalapur</option>
					<option value="Koligudda"  >Koligudda</option>
					<option value="Kudachi"  >Kudachi (Rural)</option>
					<option value="Mekhali"  >Mekhali</option>
					<option value="Morab"  >Morab</option>
					<option value="Mugalkhoda"  >Mugalkhoda</option>
					<option value="Nandikurali"  >Nandikurali</option>
					<option value="Nasalapur"  >Nasalapur</option>
					<option value="Nidagundi"  >Nidagundi</option>
					<option value="Nilaji"  >Nilaji</option>
					<option value="Nipanal"  >Nipanal</option>
					<option value="Palbhavi"  >Palbhavi</option>
					<option value="Paramandawadi"  >Paramandawadi</option>
					<option value="Raibhag"  >Raibhag (Rural)</option>
					<option value="Savadatti"  >Savadatti</option>
					<option value="Savasuddi"  >Savasuddi</option>
					<option value="Shiragur"  >Shiragur</option>
				</select>
			</td>
			<td>
				<label>Door No.</label>
			</td>
			<td>  
				<input id="txtdoorno" name="txtdoorno" type="text"   />
			</td>
			<td>
				<label>Date</label>
			</td>
			<td>  
				<input id="txtdate" name="txtdate"  type="text" />			
			</td>
		</tr>	
		<tr>
			<td>
				<label>Taluk /Block</label>
			</td>  
			<td>
				<select id="ddlblock"  name="ddlblock" style="min-width:175px;">
					<option value="">-- Select --</option>
					<option value="Athani"  >Athani</option>
					<option value="Belgaum"  >Belgaum</option>
					<option value="Bylahongala"  >Bylahongala</option>
					<option value="Chikkodi"  >Chikkodi</option>
					<option value="Gokak"  >Gokak</option>
					<option value="Hukkeri"  >Hukkeri</option>
					<option value="Khanapur"  >Khanapur</option>
					<option value="Ramadurga"  >Ramadurga</option>
					<option value="Rayabagh"  >Rayabagh</option>
					<option value="Savadatti"  >Savadatti</option>
				</select>			
			</td>	
			<td>
				<label>District</label>
			</td>  
			<td>
				<div id="divplace" type="hidden"></div>	
				<select id="ddldistrict" name="ddldistrict" style="min-width:175px;">
					<option value="">---Select---</option>
					<option value="belgaum" >Belgaum</option>
					<option value="gulbarga" >Gulbarga</option>
					<option value="gulbarga" >Bangalore</option>
					<option value="gulbarga" >Mysore</option>
				</select>
			</td>
			<td colspan="2">
				<label>Name of Head of the family</label>
			</td>
			<td colspan="2">
				<input id="txtheadf" name="txtheadf" type="text" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Division</label>
			</td>  
			<td colspan="3">
				<div id="divplace" type="hidden"></div>	
				<select id="ddldivision" name="ddldivision" style="min-width:175px;">
					<option value="">---Select---</option>
					<option value="belgaum" >Belgaum</option>
					<option value="gulbarga" >Gulbarga</option>
					<option value="gulbarga" >Bangalore</option>
					<option value="gulbarga" >Mysore</option>
				</select>
			</td>
			<td colspan="2">
				<label>Name of Respondent</label>
			</td>
			<td colspan="2">  
				<input id="txtrespondent" name="txtrespondent" type="text"   />
			</td>
		</tr>
		<tr>
			<td>
				<label>Name of Enumerator</label>
			</td>
			<td colspan="3">  
				<input id="txtenumerator" name="txtenumerator" type="text"   />
			</td>
			<td colspan="2">
				<label>Relationship With the Head of Family</label>
			</td>
			<td colspan="2">  
				<input id="txtrel" name="txtrel" type="text"   />
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
	<input id="Update" class="cancel" type="button" value="Update" name="Update" onClick="updatehousehold();">
	<div id="check_bar">&nbsp;</div>
</div>

</form>
</div>