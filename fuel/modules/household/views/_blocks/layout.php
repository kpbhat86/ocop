<div id="main_content_inner" style="border:0px solid #d6d7d6 !important;">
<form id="household_entry" name="household_entry" method="post" action=""> 
<div class="pad-5">
<fieldset>
<div class="pad-5">  
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
		<tr>
			<td colspan="2">
				<label>Household ID (Voter Card Id, Pan Card, Driving License or etc) / ಕುಟುಂಬದ ಗುರುತು ಸಂಖ್ಯೆ (ಮತದಾರರ ಗುರುತು ಚೀಟಿ ಸಂಖ್ಯೆ; ಪ್ಯಾನ್‍ ಸಂಖ್ಯೆ; ವಾಹನ ಚಾಲನೆ ಪರವಾನಗೆ ಸಂಖ್ಯೆ, ಇತ್ಯಾದಿ)</label>
			</td>
			<td colspan="2">  
				<input id="txtvoterid" name="txtvoterid" type="text" />
			</td>
			<td>
				<label>Country /ದೇಶ</label>
			</td>
			<td>  
				<input id="txtcountry" name="txtcountry" type="text" value="India" readonly="readonly"/>
			</td>
		
		</tr>
		<tr><th>State</th>
		<th>Division / ವಿಭಾಗ</th>
		<th>District / ಜಿಲ್ಲೆ</th>		
		<th>Taluk /Block / ತಾಲೂಕು / ಬ್ಲಾಕ್‍</th>  	
		<th>Grama Panchayat / ಗ್ರಾಮಪಂಚಾಯಿತಿ</th>  
		<th>Village / ಹಳ್ಳಿ  </th> </tr>
		<tr>
		
		
			<td>  
				<select id="ddlstate" name="ddlstate" style="min-width:175px;">
					<option value="Select"  >Select</option>
					<option value="Andhra Pradesh"  >Andhra Pradesh/ ಆಂಧ್ರಪ್ರದೇಶ </option>
					<option value="Arunachal Pradesh"  >Arunachal Pradesh / ಅರುಣಾಚಲ ಪ್ರದೇಶ</option>
					<option value="Assam"  >Assam /   ಅಸ್ಸಾಂ</option>
					<option value="Bihar "  >Bihar / ಬಿಹಾರ </option>
					<option value="Chatisgarh "  >Chatisgarh / ಚತ್ತೀಸ್ಗಢ</option>
					<option value="Delhi "  >Delhi / ದೆಹಲಿ</option>
					<option value="Goa "  >Goa / ಗೋವ</option>
					<option value="Gujarath "  >Gujarath / ಗುಜರಾತ್</option>
					<option value="Haryana "  >Haryana / ಹರ್ಯಾಣ</option>
					<option value="Himachal Pradesh"  >Himachal Pradesh / ಹಿಮಾಚಲ ಪ್ರದೇಶ</option>
					<option value="Jammu & Kashmir"  >Jammu & Kashmir / ಜಮ್ಮು ಮತ್ತು ಕಾಶ್ಮೀರ</option>
					<option value="Jharkhand "  >Jharkhand /  ಜಾರ್ಖಂಡ್</option>
					<option value="Karnataka " >Karnataka / ಕರ್ನಾಟಕ</option>
					<option value="Kerala "  >Kerala / ಕೇರಳ</option>
					<option value="Madhya Pradesh"  >Madhya Pradesh / ಮಧ್ಯ ಪ್ರದೇಶ</option>
					<option value="Maharashtra "  >Maharashtra / ಮಹಾರಾಷ್ಟ್ರ</option>
					<option value="Manipur "  >Manipur / ಮಣಿಪುರ</option>
					<option value="Meghalaya "  >Meghalaya / ಮೇಘಾಲಯ </option>
					<option value="Mizoram "  >Mizoram / ಮಿಜೋರಾಂ</option>
					<option value="Nagaland"  >Nagaland / ನಾಗಲ್ಯಾಂಡ್</option>
					<option value="Orissa "  >Orissa / ಓರಿಸ್ಸಾ</option>
					<option value="Punjab"  >Punjab / ಪಂಜಾಬ್</option>
					<option value="Rajasthan "  >Rajasthan  / ರಾಜಸ್ತಾನ</option>
					<option value="Sikkim "  >Sikkim / ಸಿಕ್ಕಿಂ</option>
					<option value="Tamil Nadu"  >Tamil Nadu / ತಮಿಳುನಾಡು</option>
					<option value="Uttar Pradesh"  >Uttar Pradesh / ಉತ್ತರ ಪ್ರದೇಶ</option>
					<option value="Uttranchal"  >Uttranchal / ಉತ್ತರಾಂಚಲ</option>
					<option value="West Bengal"  >West Bengal</option>
				</select>
			</td>
		 
			<td>
				<div id="divplace" type="hidden"></div>	
				<select id="ddldivision" name="ddldivision" style="min-width:175px;">
					<option value="">---Select---</option>
				</select>
			</td>
			 
			<td>
				<div id="divplace" type="hidden"></div>	
				<select id="ddldistrict" name="ddldistrict" style="min-width:175px;">
					<option value="">---Select---</option>
				</select>
			</td>
			
	
			<td>
				<select id="ddlblock"  name="ddlblock" style="min-width:175px;">
					<option value="">-- Select --</option>
				</select>			
			</td>
		
			<td>
				<select id="ddlpanchayat" name="ddlpanchayat" style="min-width:175px;">
				<option value="27"  selected="selected">-- Select --</option>
				</select>
			</td>	
	<td>  
				<select id="ddlvillage" name="ddlvillage" style="min-width:175px;" disabled>
					<option value="0"  selected="selected">-- Select --</option>
					
				</select>
			</td>
		
			
		</tr>	
		<tr>
			

			<td>
				<label>Date / ದಿನಾಂಕ</label>
			</td>
			<td>  
					<input id="txtdate" name="txtdate"  type="text" />	
						<script type="text/javascript">
							$(txtdate).datepick({dateFormat: 'dd-mm-yyyy'});
						</script>
					</select>
			</td>			
			<td colspan="2">
				<label>Name of Head of the family / ಕುಟುಂಬದ ಮುಖ್ಯಸ್ಥರ ಹೆಸರು</label>
			</td>
			<td>
				<input id="txtheadf" name="txtheadf" type="text" />
			</td>
		</tr>
		<tr>
			
			<td>
				<label>Door No./ ಮನೆ ಸಂಖ್ಯೆ</label>
			</td> 
			<td colspan="2">  
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
				<label>Name of Enumerator / ಮಾಹಿತಿ ಸಂಗ್ರಹಿಸುತ್ತಿರುವವರ ಹೆಸರು</label>
			</td>
			<td>  
				<input id="txtenumerator" name="txtenumerator" type="text"   />
			</td>
			<td colspan="2">
				<label>Relationship With the Head of Family / ಕುಟುಂಬದ ಮುಖ್ಯಸ್ಥರೊಡನೆ ಇರುವ ಸಂಬಂಧ</label>
			</td>
			<td>  
				<select id="txtrel" name="txtrel" style="width:70px;">
					<option value="0" >Select</option>
					<option value="Father" >Father</option>
					<option value="Mother" >Mother</option>
					<option value="ElderBrother" >Elder Brother</option>
					<option value="YoungerBrother" >Younger Brother</option>
					<option value="ElderSister" >Elder Sister</option>
					<option value="YoungerSister" >Younger Sister</option>
					<option value="Husband" >Husband</option>
					<option value="Wife" >Wife</option>
					<option value="Son" >Son</option>
					<option value="Daughter" >Daughter</option>
					<option value="HeadofFamily" >Head of Family</option>
					<option value="Grandson" >Grandson</option>
					<option value="Granddaughter" >Granddaughter</option>
					<option value="Daughter-in-law" >Daughter-in-law</option>
					<option value="Son-in-law" >Son-in-law</option>
					<option value="Others">Others</option>
				</select>
				
				
				
				
				
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
			<td rowspan="2"><label>Total No. of People / ಒಟ್ಟು ಜನರು</label></td>
			<td rowspan="2">
				<input id="txttotppl" name="txttotppl" type="text"   />
			</td>
			<td><label>No. of Male/ ಪುರುಷರ ಸಂಖ್ಯೆ</label></td>
			<td>
				<input id="txtmaleno" name="txtmaleno" type="text"   />
			</td>
			<td rowspan="2">
				<label>Type of Ration Card/ ಕುಟುಂಬ ಹೊಂದಿರುವ ಪಡಿತರ ಚೀಟಿಯ ವಿಧ</label>
			</td>
			<td rowspan="2">
				<input id="txtration" name="txtration" type="text"   />
			</td>
		</tr>
		<tr>
			<td>
				<label>No. of Female / ಸ್ತ್ರೀಯರ ಸಂಖ್ಯೆ</label>
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
			<label>Total No. of Childrens / ಒಟ್ಟು ಮಕ್ಕಳ ಸಂಖ್ಯೆ</label>
		</th>
		<th align="center">
			<label>0-3 /yrs ವರ್ಷ</label>
		</th>
		<th align="center">
			<label>4-6yrs ವರ್ಷ</label>
		</th>
		<th align="center">
			<label>7-14yrs ವರ್ಷ</label>
		</th>
		<th align="center">
			<label>15-18yrs ವರ್ಷ</label>
		</th>
		<th align="center">
			<label>&nbsp;</label>
		</th>
		<th align="center">
			<label>No. of Orphan/Semi Orphan Children / ಅನಾಥ ಮತ್ತು ಅರೆ ಅನಾಥ ಮಕ್ಕಳ ಸಂಖ್ಯೆ</label>
		</th>
		<th align="center">
			<label>No. of Children with Disability / ಅಂಗವಿಕಲತೆಯೊಂದಿರುವ ಮಕ್ಕಳ ಸಂಖ್ಯೆ</label>
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
			<label>No. of Male / ಒಟ್ಟು ಗಂಡು ಮಕ್ಕಳು </label>
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
			<label>No. of female /ಒಟ್ಟು ಹೆಣ್ಣು ಮಕ್ಕಳು</label>
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
			<label>Chid's Death  / ಮಕ್ಕಳ ಸಾವು ಸಂಭವ </label>
		</td>
		<td>
			<input type="radio" id="radcdeath" name="radcdeath" value="Yes" /> Yes / ಹೌದು&nbsp;
			<input type="radio" id="radcdeath" name="radcdeath" value="No" /> No  / ಇಲ್ಲ
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<label>Mother's Death  / ತಾಯಿಯ ಮರಣ</label>
		</td>
		<td>
			<input type="radio" id="radmdeath" name="radmdeath" value="Yes" /> Yes / ಹೌದು&nbsp;
			<input type="radio" id="radmdeath" name="radmdeath" value="No" /> No  / ಇಲ್ಲ
		</td>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			<label>Father's Death / ತಂದೆಯ ಮರಣ</label>
		</td>
		<td>
			<input type="radio" id="radfdeath" name="radfdeath" value="Yes" /> Yes / ಹೌದು&nbsp;
			<input type="radio" id="radfdeath" name="radfdeath" value="No" /> No  / ಇಲ್ಲ
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
