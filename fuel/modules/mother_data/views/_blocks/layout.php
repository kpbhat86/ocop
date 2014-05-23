<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ -ತಾಯಿಯ ಮಾಹಿತಿ - ಹಂತ 8 /  OCOP Mother's Info Step8:</b> ತಾಯಿಯ ಮಾಹಿತಿ / Data of Mother</p>
<form id="motherdatafrm" name="motherdatafrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">MI1.0</span> ಕುಟುಂಬದ ಗುರುತು ಸಂಖ್ಯೆ /  Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ /  Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ /  Driving License ಅಥವಾ  / or ಇತರೆ  / etc) <span class="required">*</span></label></td>
		<td width="35%" class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">MI1.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.1</span> ತಾಯಿಯ ಮಾಹಿತಿ ತಿಳಿದಿದೆಯೇ / Do you know Mother's Information?  <span class="required">*</span></label></td>
		<td>
			<select id="ddlstatus" name="ddlstatus" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /   Select --</option>
				<option value="Available">  ಗೊತ್ತಿದೆ / Available</option>
				<option value="Not Available">  ಗೊತ್ತಿಲ್ಲ / Not Available</option>
				<option value="Partially">  ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ / Partially</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.2</span> ತಾಯಿಯ ಹೆಸರು /  Mother Name <span class="required">*</span></label></td>
		<td>		
			<input type="text" id="txtmname" name="txtmname" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.3</span> ಜನ್ಮ ದಿನಾಂಕ  / Date Of Birth</label></td>
		<td>
			<input type="text" id="txtmdob" name="txtmdob" /> 
			<script type="text/javascript">
				$(txtmdob).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.4</span> ಪ್ರಸಕ್ತ ವಿಳಾಸ /  Present Address <span class="required">*</span></label></td>
		<td><input type="text" id="txtpraddr" name="txtpraddr" /></td>
	</tr>
	<tr><td><td><a href="javascript:sync();"><span class="bluemark">Copy Same as Above</span></a></td></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.5</span> ಖಾಯಂ ವಿಳಾಸ / Permanent Address ( ಇದ್ದಲ್ಲಿ / if any) ಪ್ರಸಕ್ತ ವಿಳಾಸ ಬದಲಾಗಿದ್ದಾರೆ ಮಾತ್ರ ಅನ್ವಯಿಸುತ್ತದೆ /  only applicable if present address changed, ಅದೇ ಆಗಿದ್ದಲ್ಲಿ /  if same, ದಯವಿಟ್ಟು ಮನೆಯ ವಿಳಾಸದಂತೆಯೇ ನಮೂದಿಸಿ / please mention as a same as House Address</label></td>
		<td><input type="text" id="txtpaddr" name="txtpaddr" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.6</span> ಧರ್ಮ / Religion <span class="required">*</span></label></td>
		<td>		
			<select id="ddlreligion" name="ddlreligion" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ   / Select --</option>
				<option value="Hindu">ಹಿಂದು  / Hindu</option>
				<option value="Muslim">ಮುಸ್ಲಿಂ  /  Muslim</option>
				<option value="Christian">ಕ್ರಿಶ್ಚಿಯನ್   / Christian</option>
				<option value="Christian">ಜೈನ್  / Jain</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.7</span> ಜಾತಿ  /  Caste <span class="required">*</span></label></td>
		<td>
			<select id="ddlcaste" name="ddlcaste" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="SC">ಪರಿಶಿಷ್ಟ ಜಾತಿ / SC</option>
				<option value="ST">ಪರಿಶಿಷ್ಟ   ಪಂಗಡ / ST</option>
				<option value="OBC">ಇತರೆ ಹಿಂದುಳಿದ ವರ್ಗ / OBC</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.8</span> ಪಡಿತರ ಚೀಟಿಯಲ್ಲಿ ಹೆಸರಿದೆಯೇ /   Is there name in Ration Card <span class="required">*</span></label></td>
		<td>
			<select id="ddlration" name="ddlration" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No">ಇಲ್ಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="div1">
		<td><label><span class="bluemark">MI1.9</span> ಹೌದಾದರೆ, ಪಡಿತರ ಚೀಟಿಯ ವಿಧ /  If yes, type of the ration card</label></td>
		<td>
			<select id="ddlrationtype" name="ddlrationtype" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="APL"> ಎಪಿಎಲ್ / APL</option>
				<option value="BPL"> ಬಿಪಿಎಲ್ / BPL</option>
				<option value="Anthyodaya"> ಅಂತ್ಯೋದಯ /  Anthyodaya</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">MI1.10</span> ಮದುವೆಯ ದಿನಾಂಕ  / Date of Marriage</label></td>
		<td>
			<input type="text" id="txtmarriagedate" name="txtmarriagedate" />
			<script type="text/javascript">
				$(txtmarriagedate).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">MI1.11</span> ಮದುವೆಯಾದಾಗ ನಿಮ್ಮಗೆ ವಯಸ್ಸು ತಿಳಿದಿತ್ತೆ  /  Do you know your age of during marriage</label></td>
		<td><input type="text" id="txtmarriageage" name="txtmarriageage" /></td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">MI1.12</span> ಕಳೆದ ವರ್ಷ ನೀವು ಚಿಕಿತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿಕೊಟ್ಟಿದ್ದೀರ  / Have you visited any hospital/PHC during last year for treatment? <span class="required">*</span></label></td>
		<td>
			<select id="ddltreatment" name="ddltreatment" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No">ಇಲ್ಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divhospitalreason">
		<td><label><span class="bluemark">MI1.13</span> ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ /  Reason for visiting the hospital /PHC and the advice you recieved frm the doctor. </label></td>
		<td>
			<select id="ddlhospitalreason" name="ddlhospitalreason" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="HIV/AIDS">  ಹೆಚ್ .ಐ. ವಿ /ಏಡ್ಸ್ / HIV/AIDS</option>
				<option value="TB"> ಟಿ.ಬಿ / TB</option>
				<option value="Cancer"> ಕ್ಯಾನ್ಸರ್ / Cancer</option>
				<option value="Diabetes">  ಸಕ್ಕರೆ ಕಾಯಿಲೆ / Diabetes</option>
				<option value="Heart Problem"> ಹೃದ್ರೋಗ /  Heart Problem</option>
				<option value="Paralysis">  ಲಕ್ವಾ / Paralysis</option>
				<option value="Other">  ಇತರೆ /  Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.14</span> ಈ ಮಗು ಹುಟ್ಟುವ ಮೊದಲು, ತಾಯಿ ಈ ಕೆಳಗಿನ ತಪಾಸಣೆ ಮಾಡಿದ್ದಾರೆಯೇ / While carrying this child, mother has gone through the following</label></td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6; padding:7px 0px 7px 25px;"><label><span class="bluemark">MI1.15</span> i. ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ  /ಎ.ಏನ್.ಸಿ 1 /  ANC 1 </label></td>
		<td>
			<input type="radio" id="radanc1" name="radanc1" value="Yes" /> ಹೌದು /  Yes &nbsp;
			<input type="radio" id="radanc1" name="radanc1" value="No" /> ಇಲ್ಲ /  No 
		</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6; padding:7px 0px 7px 25px;"><label><span class="bluemark">MI1.16</span> ii. ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ /ಎ.ಏನ್.ಸಿ 2 /  ANC 2 </label></td>
		<td>
			<input type="radio" id="radanc2" name="radanc2" value="Yes" /> ಹೌದು /  Yes &nbsp;
			<input type="radio" id="radanc2" name="radanc2" value="No" /> ಇಲ್ಲ / No 
		</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6; padding:7px 0px 7px 25px;"><label><span class="bluemark">MI1.17</span> iii. ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ /ಎ.ಏನ್.ಸಿ 3 /  ANC 3 </label></td>
		<td>
			<input type="radio" id="radanc3" name="radanc3" value="Yes" /> ಹೌದು /  Yes &nbsp;
			<input type="radio" id="radanc3" name="radanc3" value="No" /> ಇಲ್ಲ / No 
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.18</span> ಮಡಿಲು ಯೋಜನೆ /  Madilu Scheme</label></td>
		<td>
			<select id="ddlmadilusch" name="ddlmadilusch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Availed"> ಸಿಕ್ಕಿದೆ / Availed</option>
				<option value="Not Availed"> ಸಿಕ್ಕಿಲ್ಲ /  Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.19</span> ತಾಯಿ ಭಾಗ್ಯ ಯೋಜನೆ  / Taayi Bhagya Scheme</label></td>
		<td>
			<select id="ddltaayisch" name="ddltaayisch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Availed">  ಸಿಕ್ಕಿದೆ / Availed</option>
				<option value="Not Availed">  ಸಿಕ್ಕಿಲ್ಲ /  Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.20</span> ಜನನಿ ಸುರಕ್ಷಾ ಯೋಜನೆ  / Janani Suraksha Scheme</label></td>
		<td>
			<select id="ddljananisch" name="ddljananisch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Availed">  ಸಿಕ್ಕಿದೆ / Availed</option>
				<option value="Not Availed">  ಸಿಕ್ಕಿಲ್ಲ /  Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MI1.21</span> ಗರ್ಭಿಣಿಯಾಗಿದ್ದಾಗ ಅಂಗನವಾಡಿಯಿಂದ ಪಡೆದ ಸೇವೆಗಳು /  Services recieved from the anganawadi during pregnancy</label></td>
		<td>
			<select multiple id="ddlservicesrec" name="ddlservicesrec" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Supplementary nutrition">Supplementary nutrition</option>
				<option value="IFA Tablet">IFA Tablet</option>
				<option value="ORS">ORS</option>
				<option value="Information on Hygiene">Information on Hygiene</option>
				<option value="Referral Service">Referral Service</option>
				<option value="None">None</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savemotherdata();">
		</td>
	</tr>
	<tr>
		<td class="required">
			<span class="required">*</span>
			required fields
		</td>
		<td class="value"><div id="check_bar">&nbsp;</div></td>
	</tr>
	</table>
</form>
</div>