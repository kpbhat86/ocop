<div id="main_content_inner">
<p class="instructions"><b>OCOP Child's Info Step1:</b> ಪ್ರಶ್ನಾವಳಿ ಸಂಕ್ಷೆಪ್ತ ವಿವರ   /  Summary of Questionnaire</p>
<form id="generalinfofrm" name="generalinfofrm" method="post" action="">
	<div>  
		<table cellpadding="0" cellspacing="10" border="0">
			<tr>
				<td class="label" colspan="2"><label>Household ID (Voter Card Id, Pan Card, Driving License or etc)</label></td>
				<td class="value" colspan="2">
					<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" autocomplete="off" class="" /> 
					<a onClick="householdcinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
					<div class="suggestionsBox" id="suggestions" style="display: none;"> 
						<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
					<div class="suggestionList" id="suggestionsList"></div>
				</div>
				</td>
			</tr>
			<tr>
				<td class="label" colspan="2"><label>ಮಗುವಿನ ಹೆಸರು/Name of the Child</label></td>
				<td class="value" colspan="2">
					<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
					</select>					
					<a onClick="hhinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
				</td>
			</tr>
		
			
			
				<tr>
		<th>Division / ವಿಭಾಗ</th>
		<th>District / ಜಿಲ್ಲೆ</th>		
		<th>Taluk /Block / ತಾಲೂಕು / ಬ್ಲಾಕ್‍</th>  	
		<th>Grama Panchayat / ಗ್ರಾಮಪಂಚಾಯಿತಿ</th>  
		<th>Village / ಹಳ್ಳಿ  </th> </tr>
			
			<tr>
			<td>
				<input id="txtdivison" name="txtdivison" type="text" >
				</td>
			   <td> 
					<input id="txtdistrict" name="txtdistrict" type="text" />
				</td>
				<td>
					<input id="txttaluk" name="txttaluk" type="text" /> 
				</td>
				 <td>
					<input id="txtgrama" name="txtgrama" type="text" /> 
				</td>
				<td>
					<input id="txtvillage" name="txtvillage" type="text"/>
				</td>
				
				
				
			</tr>
			
			
			
				<tr>
				<td>
					<label>ಮನೆ ಸಂಖ್ಯೆ  / Door No</label>
				</td>  
				<td>
					<input id="txtdoornum" name="txtdoornum" type="text" />
				</td>
				<td>&nbsp;</td>
				<td>
					<label>ದಿನಾಂಕ / Date</label>
				</td>
				<td> 
					<input id="txtdate" name="txtdate" type="text" />
				</td>
			</tr>
			
	
			<tr>
			
				<td>
					<label>ಮನೆಯ ಮುಖ್ಯಸ್ತರ ಹೆಸರು  / Name of head of Family</label>
				</td>
				<td> 
					<input id="txtheadname" name="txtheadname" type="text" />
				</td>
				<td>&nbsp;</td>
					<td>
					<label>ಮಾಹಿತಿ ಸಂಗ್ರಹಿಸುವವರ ಹೆಸರು / Name of the Enumerator</label>
				</td>  
				<td>
					<input id="txtenum" name="txtenum" type="text" >
				</td>
			</tr>
			<tr>
			
				
				<td>
					<label>ಮಾಹಿತಿ ನೀಡುತ್ತಿರುವವರ ಹೆಸರು / Name of the Respondant</label>
				</td>
				<td> 
					<input id="txtresp" name="txtresp" type="text" />
				</td>
				<td>&nbsp;</td>
					<td>
					<label>ಪೋಷಕರ ಹೆಸರು / Name of the Guardian</label>
				</td>  
				<td>
					<input id="txtguard" name="txtguard" type="text" >
				</td>
			</tr>
			<tr>
			
				<td>
					<label>ಮನೆಯ ಮುಖ್ಯಸ್ತ ರೊಂದಿಗಿರುವ  ಸಂಬಂಧ / Relationship with the Head of Family</label>
				</td>
				<td> 
					<select id="txtrel" name="txtrel" style="width:175px;">
					<option value="0" >ಆಯ್ಕೆಮಾಡಿ/Select</option>
					<option value="1" >ತಂದೆ /Father</option>
					<option value="2" >ತಾಯಿ /Mother</option>
					<option value="3" >ಅಣ್ಣ /Elder Brother</option>
					<option value="4" >ತಮ್ಮ /Younger Brother</option>
					<option value="5" >ಅಕ್ಕ /Elder Sister</option>
					<option value="6" >ತಂಗಿ /Younger Sister</option>
					<option value="7" >ಗಂಡ /Husband</option>
					<option value="8" >ಹೆಂಡತಿ /Wife</option>
					<option value="9" >ಮಗ /Son</option>
					<option value="10" >ಮಗಳು /Daughter</option>
					<option value="11" >ಮನೆಯ ಮುಖ್ಯಸ್ತರ /Head of Family</option>
					<option value="12" >ಮೊಮ್ಮಗ /Grandson</option>
					<option value="13" >ಮೊಮ್ಮಗಳು /Granddaughter</option>
					<option value="14" >ಸೊಸೆ /Daughter-in-law</option>
					<option value="15" >ಅಳಿಯ /Son-in-law</option>
					<option value="16">ಇತರೆ /Others</option>
				</select>
				</td>
				
				<td>&nbsp;</td>
				<td>
					<label>ತಾಯಿಯ ಹೆಸರು / Name of the Mother</label>
				</td>  
				<td>
					<input id="txtmname" name="txtmname" type="text" >
				</td>
			</tr>
			<tr>
				
				<td>
					<label>ತಂದೆಯ ಹೆಸರು / Name of the Father</label>
				</td>
				<td> 
					<input id="txtfname" name="txtfname" type="text" />
				</td>
				
				<td>&nbsp;</td>
				<td>
					<label>ವಯಸ್ಸು / Age</label>
				</td>
				<td> 
					<input id="txtage" name="txtage" type="text" />
				</td>
			</tr>
			<tr>
				
				<td>
					<label>ಲಿಂಗ / Gender</label>
				</td>  
				
				<td>
					<select id="ddlgender" name="ddlgender" style="min-width:175px;">
						<option value="" > ಆಯ್ಕೆಮಾಡಿ / Select</option>
						<option value="1" > ಗಂಡು / Male</option>
						<option value="2" >  ಹೆಣ್ಣು/ Female</option>
					</select>
				</td>
				
				<td>&nbsp;</td>
					<td>
					<label>ಪ್ರಸಕ್ತ ತರಗತಿ  / Present Class</label>
				</td>
				<td> 
					<select id="ddlpclass" name="ddlpclass" style="width:175px;">
						<option value="0" >ಆಯ್ಕೆಮಾಡಿ/ Select</option>
						<option value="1" >ಅನಕ್ಷರಸ್ಥ / Illiterate</option>
						<option value="2" > ಪ್ರಾಥಮಿಕ ಪೂರ್ವ/Pre Primary</option>
						<option value="3" >ಪ್ರಾಥಮಿಕ ಶಿಕ್ಷಣ/ Primary</option>
						<option value="4" > ಪ್ರೌಢ  ಶಾಲೆ / High School</option>
						<option value="5" > ಡಿಪ್ಲೊಮಾ / Diploma</option>
						<option value="6" >ಪದವಿ ಪೂರ್ವ  /Under Graduate</option>
						<option value="7" >ಪದವೀಧರ /Graduate</option>
						<option value="8" >ಸ್ನಾತಕೋತ್ತರ ಪದವೀಧರ /Post Graduate</option>
					</select>
				</td>
			</tr>
			<tr>
			
				<td>
					<label>ಅನಾಥ  /  ಅರೆ ಅನಾಥ  / Orphan / Semi Orphan</label>
				</td>  
				<td>
					<select id="ddlcorphan" name="ddlcorphan" style="min-width:175px;">
						<option value="" >ಆಯ್ಕೆಮಾಡಿ / Select</option>
						<option value="Yes" >ಹೌದು  / Yes</option>
						<option value="No" >ಇಲ್ಲ  / No</option>
					</select>
				</td>
				
				<td>&nbsp;</td>
						<td>
					<label>ಅಂಗವಿಕಲತೆಯ ವಿಧ  / Type of Disability</label>
				</td>
				<td> 
					<select id="txtdisability" name="txtdisability" style="min-width:175px;">
						<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
						<option value="None">ಯಾವುದೂ ಇಲ್ಲ / None</option>
						<option value="Blindness">ಪೂರ್ಣ ದೃಷ್ಟಿ /  Blindness</option>
						<option value="Low vision">ಮಂದ ದೃಷ್ಟಿ/ Low vision</option>
						<option value="Leprosy-cured"> ಕುಷ್ಟದಿಂದ ಗುಣ / Leprosy-cured</option>
						<option value="Hearing impairment">ಶ್ರವಣ / Hearing impairment</option>
						<option value="Locomotor disability"> ದೈಹಿಕ / Locomotor disability</option>
						<option value="Mental retardation">ಬುದ್ಧಿಮಾಂದ್ಯತೆ/ Mental retardation</option>
						<option value="Mental illness">ಮಾನಸಿಕ  ಅಸ್ವಸ್ಥತೆ / Mental illness</option>
						<option value="Speech and hearing">) ವಾಕ್ ಮತ್ತು ಶ್ರವಣ /Speech and hearing</option> 
					<option value="Other">ಇತರೆ/ Other</option>
					</select>
				</td>
			</tr>
			<tr>
		
				<td>&nbsp;</td>
				<td>
					<label>&nbsp;</label>
				</td>
				<td> 
					&nbsp;
				</td>
			</tr>
			<tr>
		<td>&nbsp;</td>

		
		
		<td class="actions" colspan="3">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savesummary();">
			<div id="check_bar">&nbsp;</div>
		</td>
	</tr>
		</table>
	</div>
</form>
</div>