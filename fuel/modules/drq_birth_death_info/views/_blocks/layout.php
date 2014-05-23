<div id="main_content_inner">
<p class="instructions"><b>ಮರಣಕ್ಕೆ ಸಂಬಂಧಪಟ್ಟ ಪ್ರಶ್ನಾವಾಳಿ - ಹಂತ 2 / Death Related Questionnaire(DRQ) Step2:</b> <b style="color:#41A0CF;">ಮಗುವಿನ ಮರಣದ ಪ್ರಶ್ನಾವಳಿ - ಜನನ ಪೂರ್ವ / Child's Death Questionnaire-Pre-Birth</b> :- Still Birth/Death Information</p>
<form id="birthdetailsfrm" name="birthdetailsfrm" method="post" action="">
	<table  cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td class="label"><label><span class="bluemark">CD1.0a</span> ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ /  Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ /  Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ /  Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ  /  or ಇತರೆ  / etc)</label></td>
		<td class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">CD1.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child</label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr><tr>
		<td class="label"><label><span class="bluemark">CD1.1</span>ಮಗುವಿನ ಮರಣದ ಮಾಹಿತಿ /  Child's Death Details</label></td>
		<td class="value">
			<select id="ddlchilddeathdetail" name="ddlchilddeathdetail" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Available ">ಗೊತ್ತಿದೆ /  Available </option>
				<option value="Not available">ಗೊತ್ತಿಲ್ಲ  / Not available</option>
				<option value="Partially">ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ /  Partially</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD1.2</span>ನಿರ್ಜೀವ  ಜನನಕ್ಕೆ ಕಾರಣಗಳು /  Reason for still birth</label></td>
		<td><textarea maxlength="500" placeholder="Maximum of 500 characters." id="txtstillbirth" name="txtstillbirth"> </textarea></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD1.3</span>ತಾಯಿಗೆ ಎಷ್ಟನೆ ಮಗು /  Birth Order of the child</label></td>
		<td><input type="text" maxlength="3" id="txtbirthorder" name="txtbirthorder" style="width:50px;" /></td>
	</tr>
	<tr>
		<td colspan="2"><label><span class="bluemark">CD1.4</span> <b>ಈ ಮಗು ಹುಟ್ಟುವ ಮೊದಲು, ತಾಯಿ ಈ ಕೆಳಗಿನ ತಪಾಸಣೆ ಮಾದಿಸಿದ್ದರೆಯೇ / While carrying this child, mother has gone through the following</b></label></td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>CD1.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 1 / ANC 1</label></td>
		<td>
			<select id="ddlanc1" name="ddlanc1" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು /  Yes</option>
				<option value="No">ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>CD1.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b)ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 2 /  ANC 2</label></td>
		<td>
			<select id="ddlanc2" name="ddlanc2" style="min-width:175px;">
				<option value="">--ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು /  Yes</option>
				<option value="No">ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>CD1.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c)ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 3 / ANC 3</label></td>
		<td>
			<select id="ddlanc3" name="ddlanc3" style="min-width:175px;">
				<option value="">-- Select --</option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD1.5</span>ಗರ್ಭಿಣಿಯಾಗಿದ್ದಾಗ ಅಂಗನವಾಡಿಯಿಂದ ಪಡೆದ ಸೇವೆಗಳು /  Services received from the anganawadi during pregnancy</label></td>
		<td>			
				<select id="ddlsreceived" name="ddlsreceived" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="None"> ಗೊತ್ತಿಲ್ಲ /  None</option>
				<option value="Supplementary Nutrition"> ಪೂರಕ ಪೌಷ್ಟಿಕ ಆಹಾರ /  Supplementary Nutrition</option>
				<option value="IFA tablet">ಕಬ್ಬಿಣಾಂಶದ ಮಾತ್ರೆ /  IFA tablet</option>
				<option value="ORS">ಓ.ಆರ್.ಎಸ್. / ORS</option>
				<option value="Information on Hygiene">ಸ್ವಚ್ಚತೆಯ ಕುರಿತು ಮಾಹಿತಿ / Information on Hygiene</option>
				<option value="Referral Service">ನಿರ್ದೇಶನ ಸೇವೆ /  Referral Service</option>
				<option value="Others">ಇತರೆ /  Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD1.6</span> ಗರ್ಭಿಣಿಯಾಗಿದ್ದ ಸಮಯದಲ್ಲಿ ತಾಯಿ ಚಿಕೆತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ/ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ಕೊಟ್ಟಿದ್ದರಾ  ? /  Have mother visited any hospital/ PHC during pregnancy for treatment?</label></td>
		<td>
			<select id="ddlvtreatment" name="ddlvtreatment" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು /  Yes</option>
				<option value="No">ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divreason">
		<td style="background:#d6d7d6;"><label><span class="bluemark">CD1.7</span>ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ /  Reason for visiting the hospital/PHC and the advice your recieved from the doctor. Please mention</label></td>
		<td>
			<select id="ddlrvisiting" name="ddlrvisiting" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="HIV/AIDS">ಹೆಚ್.ಐ.ವಿ./ಏಡ್ಸ್,  / HIV/AIDS</option>
				<option value="TB">ಟಿ.ಬಿ. /  TB</option>
				<option value="Cancer">ಕ್ಯಾನ್ಸರ್ / Cancer</option>
				<option value="Diabetes"> ಸಕ್ಕರೆ ಕಾಯಿಲೆ / Diabetes</option>
				<option value="Heart Problem">ಹೃದ್ರೋಗ / Heart Problem</option>
				<option value="Paralysis">ಲಕ್ವಾ / Paralysis</option>
				<option value="Others">ಇತರೆ /  Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD1.8</span>ಗರ್ಭಾವಧಿ /  Pregnancy period</label></td>
		<td>
			<select id="ddlpperiod" name="ddlpperiod" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Normal">ಸಹಜ / Normal</option>
				<option value="Premature 8th Month">ಎಂಟು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು /  Premature 8th Month</option>
				<option value="Premature 7th Month">ಏಳು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು /  Premature 7th Month</option>
			</select>
		</td>
	</tr>		
	<tr>
		<td><label><span class="bluemark">CD1.9</span> ಈ ಮಗುವಿನ   ಹೆರಿಗೆಯಾದ ಸ್ಥಳ /  Place of Delivery of the child</label></td>
		<td>
			<select id="ddldeliveryplace" name="ddldeliveryplace" style="min-width:175px;">
				<option value="">--ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Home">>ಮನೆ / Home</option>
				<option value="Hospital">ಆಸ್ಪತ್ರೆ /  Hospital</option>
				<option value="Others">ಇತರೆ /  Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2"><label><b> ಮನೆಯಲ್ಲಿ ಹೆರಿಗೆಯಾಗಿದ್ದಾರೆ ಮಾತ್ರ ಅನ್ವಯಿಸುತ್ತದೆ / Only ask if delivered in home</b></label></td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label><span class="bluemark">CD1.9</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) ಹೆರಿಗೆಗೆ ಸಹಾಯ ಮಾಡಿದವರು / Delivery Assisted by</label></td>
		<td>
			<select id="ddldsssisted" name="ddldsssisted" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Dayi">ದಾದಿ / Dayi</option>
				<option value="Doctor">ವೈದ್ಯರು / Doctor</option>
				<option value="Family members">ಮನೆಯವರು / Family members</option>
				<option value="Others"> ಇತರೆ / Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savebirthdetails();">
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