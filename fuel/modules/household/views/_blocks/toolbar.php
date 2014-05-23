<div id="main_content_inner" style="border:0px solid #d6d7d6 !important;">
<form id="household_entry" method="post" action=""> 
<div class="pad-5">
<fieldset>
<div class="pad-5">  
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
		<tr>
			<td colspan="2">
				<label>Household ID (Voter Card Id, Pan Card, Driving License or etc)</label>
			</td>
			<td>  
				<input id="txtvoterid" name="txtvoterid" type="text" />
			</td>
			<td>
				<label>State</label>
			</td>  
			<td colspan="2">
	            <select id="ddlstate"  name="ddlstate" style="min-width:175px;">
					<?php echo '<option value="'.Select.'">'.Select."</option>";
						foreach($datam as $record) {
						echo '<option value="'.$record->states.'">'.$record->states."</option>";
					}?>
				</select>
			</td>
		</tr>
		<tr>
			<td>
				<label>Division</label>
			</td>  
			<td>
				<select id="ddldivision"  name="ddldivision" style="min-width:175px;">
					<?php 
					foreach($datad as $record) {
						echo '<option value="'.$record->division.'">'.$record->division."</option>";
					}?>
				</select>
			</td>
			<td>
				<label>District</label>
			</td>  
			<td>
				<div id="divplace" type="hidden"></div>	
				<select id="ddldistrict" name="ddldistrict" onchange="copy();" style="min-width:175px;">
					<option value="">---Select---</option>
					<option value="belgaum" >Belgaum</option>
					<option value="gulbarga" >Gulbarga</option>
					<option value="gulbarga" >Bangalore</option>
					<option value="gulbarga" >Mysore</option>
				</select>
			</td>
			<td>
				<label>Taluk /Block</label>
			</td>  
			<td>
				<select id="ddlblock"  name="ddlblock" onchange="talukchange();" style="min-width:175px;">
					<option></option>
				</select>			
			</td>
		</tr>	
		<tr>
			<td><label>Grama Panchayat</label></td>
			<td> 
				<select id="ddlpanchayat" name="ddlpanchayat" onchange="gramapanchayat();" style="min-width:175px;">
					<option></option>
				</select>
			</td>		
			<td>
				<label>Village</label>
			</td>
			<td>
				<select id="ddlvillage" name="ddlvillage" style="min-width:175px;">
					<option></option>
				</select>
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
				<label>Name of Head of the family</label>
			</td>
			<td>
				<input id="txtheadf" name="txtheadf" type="text" />
			</td>
			<td>
				<label>Door No.</label>
			</td>
			<td>  
				<input id="txtdoorno" name="txtdoorno" type="text"   />
			</td>
			<td>
				<label>Name of Respondent</label>
			</td>
			<td>  
				<input id="txtrespondent" name="txtrespondent" type="text"   />
			</td>
		</tr>
		<tr>
			<td>
				<label>Name of Enumerator</label>
			</td>
			<td>  
				<input id="txtenumerator" name="txtenumerator" type="text"   />
			</td>
			<td>
				<label>Relationship With the child</label>
			</td>
			<td>  
				<input id="txtrel" name="txtrel" type="text"   />
			</td>
			<td>
				<label>Type of Ration Card</label>
			</td>
			<td>
				<input id="txtration" name="txtration" type="text"   />
			</td>
		</tr>
	</table>
</div>
</fieldset>
</div>

<div class="pad-5">
<fieldset>
<div class="pad-5">
	<table width="100%" cellspacing="10" cellpadding="0">
		<tr>	
			<th align="center"><label>Total No. of People</label></th>
			<th align="center"><label>No. of Male</label></th>
			<th align="center"><label>No. of Female</label></th>
		</tr>
		<tr>
			<td align="center">
				<input id="txttotppl" name="txttotppl" type="text"   />
			</td>
			<td align="center">
				<input id="txtmaleno" name="txtmaleno" type="text"   />
			</td>
			<td align="center">
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
<table width="100%" cellspacing="10" cellpadding="0" border="0">
	<tr>
		<th align="center">
			<label>Total No. of Childrens</label>
		</th>
		<th align="center">
			<label>0-3 yrs</label>
		</th>
		<th align="center">
			<label>3-6yrs</label>
		</th>
		<th align="center">
			<label>6-14yrs</label>
		</th>
		<th align="center">
			<label>14-18yrs</label>
		</th>
	</tr>
	<tr>
		<td align="center">
			<input id="txtchildtot" name="txtchildtot" type="text"   />
		</td>
		<td align="center">
			<input id="txt03" name="txt03" type="text"   />
		</td>
		<td align="center">
			<input id="txt36" name="txt36" type="text"   />
		</td>
		<td align="center">
			<input id="txt64" name="txt64" type="text"   />
		</td>
		<td align="center">
			<input id="txt1418" name="txt1418" type="text"   />
		</td>
	</tr>
</table>
</div>
</fieldset>
</div>

<div class="pad-5">
<fieldset>
<div class="pad-5">
	<table width="100%" cellpadding="0" cellspacing="10" border="0" >
		<tr>
			<td rowspan="2">
				<label>  No. of Orphan/Semi Orphan Children</label>
			</td>
			<td rowspan="2">
				<input id="txtcorphannum" name="txtcorphannum" type="text"   />
			</td>
			<td rowspan="2">
				<label>No. of Children with Disability</label>
			</td>
			<td rowspan="2">
				<input id="txtcdisabilitynum" name="txtcdisabilitynum" type="text"   />
			</td>
			<td class="pad-5">
				<label>No. of Male</label>
			</td>
			<td>
				<input id="txtmalenum" name="txtmalenum" type="text"   />
			</td>
		</tr>
		<tr>
			<td>
				<label>No. of Female</label>
			</td>
			<td>
				<input id="txtfemalenum" name="txtfemalenum" type="text"   />
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
			<input type="text" id="txtcdeath" name="txtcdeath" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
		</td>
		<td>
			<label>Mother's Death</label>
		</td>
		<td>
			<input type="text" id="txtmdeath" name="txtmdeath" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
		</td>
		<td>
			<label>Father's Death</label>
		</td>
		<td>
			<input type="text" id="txtfdeath" name="txtfdeath" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
		</td>
    </tr>     
</table>
</div>
</fieldset>
</div>


<div class="pad-10">
	<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savehousehold();">
	<div id="check_bar">&nbsp;</div>
</div>

</form>
</div>
