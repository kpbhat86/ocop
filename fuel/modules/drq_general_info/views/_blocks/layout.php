<div id="main_content_inner">
<p class="instructions"><b>ಮರಣಕ್ಕೆ ಸಂಬಂಧಪಟ್ಟ ಪ್ರಶ್ನಾವಾಳಿ - ಹಂತ 3 / Death Related Questionnaire(DRQ) Step3:</b> <b style="color:#41A0CF;">ಮಗುವಿನ ಮರಣದ ಪ್ರಶ್ನಾವಳಿ - ಜನನದ ನಂತರ /  Child's Death Questionnaire-Post-Birth</b> :- Child's General Death Information</p>
<form id="generalinfofrm" name="generalinfofrm" method="post" action="">
	<table  cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td class="label"><label><span class="bluemark">CD2.0</span>  ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ /  Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ /  Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ /  Driving License ಅಥವಾ  /  or ಇತರೆ  / etc)</label></td>
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
		<td class="label"><label><span class="bluemark">CD2.0</span>ಮಗುವಿನ ಹೆಸರು  /  Name of the Child</label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">CD2.1</span> ಮಗುವಿನ ಮರಣದ ಮಾಹಿತಿ / Child's Death Details</label></td>
		<td class="value">
			<select id="ddlchilddeathdetail" name="ddlchilddeathdetail" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Available ">ಗೊತ್ತಿದೆ / Available </option>
				<option value="Not available">ಗೊತ್ತಿಲ್ಲ /  Not available</option>
				<option value="Partially">ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ / Partially</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.2</span> ಮರಣಕ್ಕೆ ಕಾರಣಗಳು /  Reason of death</label></td>
		<td><select id="ddlresnfordeath" name="ddlresnfordeath" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="diarrhea" >ಬೇಧಿ /  Diarrhea</option>
				<option value="malaria" >ಮಲೇರಿಯಾ /  Malaria</option>
				<option value="cough" >ಕೆಮ್ಮು /  Cough</option>
				<option value="mumps" >ಗದ್ದಬಾವು /  Mumps</option>
				<option value="accident" >ಅಪಘಾತ /  Accident</option>
				<option value="other" >ಇತರೆ / Other</option>
			</select></td>
	</tr>
	<tr id="divchild">
		<td><label><span class="bluemark">CD2.3</span> ಮಗು ಮರಣ ಹೊಂದಿದ ದಿನಾಂಕ ಗೊತ್ತಿದೆಯೇ ? /  Do you know the date of child death?</label></td>
		<td>		
			<select id="ddldobchildeath" name="ddldobchildeath" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes" >ಗೊತ್ತಿದೆ /  Yes</option>
				<option value="No" >ಗೊತ್ತಿಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divdeathdate">
		<td style="background:#d6d7d6;"><label><span class="bluemark">CD2.4</span>ಗೊತ್ತಿದ್ದರೆ, ದಿನಾಂಕವನ್ನು ನಮೂದಿಸಿ / If yes, please mention the date</label></td>
		<td>
			<input type="text" id="txtdeathdate" name="txtdeathdate" />&nbsp;
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.5</span>ಮರಣದ ವಯಸ್ಸು /  Age at Death</label></td>
		<td><select id="ddlperiodfordeath" name="ddlperiodfordeath" style="min-width:175px;">
				<option value="" >--ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="aweek" >ಹುಟ್ಟಿದ ಒಂದು ವಾರದೊಳಗೆ /  Within a week from Birth</option>
				<option value="amonth" >ಹುಟ್ಟಿದ ಒಂದು ತಿಂಗಳೊಳಗೆ /  Within a month from Birth</option>
				<option value="twomonth" >ಹುಟ್ಟಿದ ಎರಡು ತಿಂಗಳಿಂದ ಒಂದು ವರ್ಷದೊಳಗೆ /  Within 2 months to 1 year from Birth</option>
				<option value="5years" >ಹುಟ್ಟಿದ 5 ವರ್ಷದೊಳಗೆ /  Within 5 years from Birth</option>
				<option value="18years" >ಹುಟ್ಟಿದ 18 ವರ್ಷದೊಳಗೆ / Within 18 years from Birth</option>
				
			</select></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.6</span>ಮರಣ ದಾಖಲಾತಿ /  Death Registration</label></td>
		<td>		
			<select id="ddldeathreg" name="ddldeathreg" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes" >ಹೌದು /  Yes</option>
				<option value="No" >ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divdeathregno">
		<td style="background:#d6d7d6;"><label><span class="bluemark">CD2.7</span>ಹೌದಾದರೆ, ಮರಣ ನೋದಣಿ ಸಂಖ್ಯೆಯನ್ನು ನಮೂದಿಸಿ /  If Yes, please mention the  Death Registration Number ( ಗೊತ್ತಿದೆ /  Available / ಗೊತ್ತಿಲ್ಲ / Not available) ( ಗೊತ್ತಿದ್ದರೆ,  If Available, ದಯವಿಟ್ಟು ನಮೂದಿಸಿ /  please mention)</label></td>
		<td>
			<textarea COLS=6 ROWS=2 placeholder="Maximum 15 chars." maxlength="15" id="txtdeathregno" name="txtdeathregno"></textarea>&nbsp;
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.8</span>ತಾಯಿಗೆ ಎಷ್ಟನೆ ಮಗು / Birth order of the Child</label></td>
		<td>		
			<input type="text" id="txtbirthorder" name="txtbirthorder" maxlength="3" style="width:35px;"/>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.9</span>ಮಗುವಿನ ಹೆಸರು /  Name of the Child</label></td>
		<td>		
			<input type="text" id="txtnameofchild" name="txtnameofchild" maxlength="100"/>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.10</span>ಮಗುವಿನ ಹುಟ್ಟಿದ ದಿನಾಂಕ /  Date of Birth</label></td>
		<td><input type="text" id="txtdob" name="txtfname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.11</span>ಈ ಮಗು ಹುಟ್ಟುವ ಮೊದಲು, ತಾಯಿ ಈ ಕೆಳಗಿನ ತಪಾಸಣೆ ಮಾಡಿಸಿದ್ದಾರೆಯೇ / While carrying this child , mother has gone through the following checkups</label></td>
		<td><input type="text" id="txtmothercarrying" name="txtmname" /></td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>CD2.11 a) ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 1  /  ANC1</label></td>
		<td>		
			<select id="ddlanc1" name="ddlanc1" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes" >ಹೌದು /  Yes</option>
				<option value="No" >ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
<tr>
		<td style="background:#d6d7d6;"><label>CD2.11 b)ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 2 / ANC2</label></td>
		<td>		
			<select id="ddlanc2" name="ddlanc2" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes" >ಹೌದು /  Yes</option>
				<option value="No" >ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
<tr>
		<td style="background:#d6d7d6;"><label>CD2.11 c)ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 3 / ANC3</label></td>
		<td>		
			<select id="ddlanc3" name="ddlanc3" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes" >ಹೌದು /  Yes</option>
				<option value="No" >ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>

	
		
	<tr>
		<td><label><span class="bluemark">CD2.12</span>ಗರ್ಭಿಣಿಯಾಗಿದ್ದಾಗ ಅಂಗನವಾಡಿಯಿಂದ ಪಡೆದ ಸೇವೆಗಳು /  Services received from the anganawadi during pregnancy</label></td>
		<td>	
			<select id="ddlservices" name="ddlservices" style="min-width:175px;">
				<option value="Supplementary nutrition" > ಪೂರಕ ಪೌಷ್ಟಿಕ ಆಹಾರ /  Supplementary nutrition</option>
				<option value="IFA tablet" >ಕಬ್ಬಿಣಾಂಶದ ಮಾತ್ರೆ /  IFA tablet</option>
				<option value="ORS" >ಓ.ಆರ್.ಎಸ್. /  ORS</option>
				<option value="Information on Hygiene / Referral Service" >ಸ್ವಚ್ಚತೆಯ ಕುರಿತು ಮಾಹಿತಿ /  Information on Hygiene / ನಿರ್ದೇಶನ ಸೇವೆ /  Referral Service</option>
				<option value="Dont Know" >ಯಾವುದು ಇಲ್ಲ / Dont Know</option>
				<option value="None" > ಗೊತ್ತಿಲ್ಲ / None</option> 
			</select>
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">CD2.13</span>ಗರ್ಭಿಣಿಯಾಗಿದ್ದ ಸಮಯದಲ್ಲಿ ತಾಯಿ ಚಿಕೆತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ/ ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ಕೊಟ್ಟಿದ್ದರಾ  ? /  Have mother visited any hospital/ PHC during pregnancy for treatment?</label></td>
		<td>		
			<select id="ddtreatmentstatus3" name="ddtreatmentstatus" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes" >ಹೌದು /  Yes</option>
				<option value="No" >ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	
	<tr id="divreason">
		<td style="background:#d6d7d6;"><label><span class="bluemark">CD2.14</span>ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ / Reason for visiting the hospital / PHC and the advice you received from the doctor.</label></td>
		<td>
			<select id="ddlvisitinghospital" name="ddlvisitinghospital" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="HIV/AIDS">ಹೆಚ್.ಐ.ವಿ./ಏಡ್ಸ್ HIV/AIDS</option>
				<option value="TB">ಟಿ.ಬಿ. /  TB</option>
				<option value="Cancer">ಕ್ಯಾನ್ಸರ್ /  Cancer</option>
				<option value="Diabetes"> ಸಕ್ಕರೆ ಕಾಯಿಲೆ / Diabetes</option>
				<option value="Heart Problem">ಹೃದ್ರೋಗ / Heart Problem</option>
				<option value="Paralysis">ಲಕ್ವಾ / Paralysis</option>
				<option value="Others">ಇತರೆ / Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.15</span>ಗರ್ಭಾವಧಿ /  Pregnancy period</label></td>
		<td>
			<select id="ddlpregnecyperiod" name="ddlpregnecyperiod" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="normal">ಸಹಜ /  Normal</option>
				<option value="premature8mnt">ಎಂಟು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು /  Premature 8th Month</option>
				<option value="premature7mnt">ಏಳು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು / Premature 7th Month</option>
				
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.16</span>ಈ ಮಗುವಿನ   ಹೆರಿಗೆಯಾದ ಸ್ಥಳ /  Place Of Delivery of child</label></td>
		<td>
			<select id="ddldeleveryplace" name="ddldeleveryplace" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="home">ಮನೆ /  Home</option>
				<option value="hospital">ಆಸ್ಪತ್ರೆ /  Hospital</option>
				<option value="other">ಇತರೆ / Other</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">CD2.17</span>ಹೆರಿಗೆಗೆ ಸಹಾಯ ಮಾಡಿದವರು /  Delivery assisted by</label></td>
		<td>
			<select id="ddldeleveryassist" name="ddldeleveryassist" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="dayi">ದಾದಿ /  Dayi</option>
				<option value="anm">ಆರೋಗ್ಯ ಸಹಾಯಕಿ /  ANM</option>
				<option value="doctor">ವೈದ್ಯರು /  Doctor</option>
			<option value="other"> ಇತರೆ / Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.18</span>ಮಗು ಮರಣ ಹೊಂದಿದಾಗ ಓದುತ್ತಿದ್ದ ತರಗತಿ / Education of the child at the time of death </label></td>
		<td>
		<select id="txtchildedustatus" name="txtchildedustatus" style="min-width:175px;">
				<option value="">-- Select --</option>
				<option value="pre primary">Pre Primary</option>
				<option value="1">1</option>
				<option value="doctor">2</option>
				<option value="2">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
			<option value="12">12</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.19</span>ಮಗು ಮರಣ ಹೊಂದುವುದಕ್ಕೆ ಮೊದಲು ಈ ಕೆಳಗಿನ ರೋಗ ನಿರೋಧಕಗಳನ್ನು ಕೊಡಿಸಲಾಗಿತ್ತೆ / Has child got these immunizations before death.</label></td>
		<td>
		<input type="text" id="txtimmudeath" name="txtimmudeath" />	
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savegeneralinfo();">
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
