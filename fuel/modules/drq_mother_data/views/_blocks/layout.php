<div id="main_content_inner">
<p class="instructions"><b>ಮರಣಕ್ಕೆ ಸಂಬಂಧಪಟ್ಟ ಪ್ರಶ್ನಾವಾಳಿ - ಹಂತ 5 / Death Related Questionnaire(DRQ) Step5:</b> <b style="color:#41A0CF;">ತಾಯಿಯ ಮರಣ ಮಾಹಿತಿ /  Mother's Death Details</b> :-ಗರ್ಭವತಿ / ಬಾಣಂತಿಯರ ಮರಣದ ಮಾಹಿತಿ /  During Pregnancy Period Death Information</p>
<form id="motherdatafrm" name="motherdatafrm" method="post" action="">
	<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="60%" class="label"><label><span class="bluemark">MD1.0 </span> ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ /  Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ /  Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ  / or ಇತರೆ  / etc)</label></td>
		<td width="40%" class="value">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">MD1.0 </span>ಮಗುವಿನ ಹೆಸರು  / Name of the Child</label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">MD1.1 </span>ತಾಯಿಯ ಮರಣದ ಮಾಹಿತಿ /  Mother's Death Details</label></td>
		<td class="value">
			<select id="ddldeathmotherstatus_death" name="ddldeathmotherstatus_death" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="available">ಗೊತ್ತಿದೆ / Available</option>
				<option value="notavilable">ಗೊತ್ತಿಲ್ಲ  /  Not Available</option>
				<option value="partially">ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ /  Partially</option>
			</select>
			
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.2 </span>ತಾಯಿಯ ಹೆಸರು /  Name of the Mother</label></td>
		<td>		
			<input type="text" maxlength="100" id="txtmothername" name="txtmothername" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.3 </span>ತಾಯಿಯ ಜನ್ಮದಿನಾಂಕ /  Mother's Date of Birth</label></td>
		<td>
			<input type="text" id="txtmotherdob" name="txtmotherdob" /> 
			<script type="text/javascript">
				$(txtmotherdob).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.4 </span>ಪ್ರಸವ ಸಮಯದಲ್ಲಿ ತಾಯಿಯ ಮರಣ /  Death of Mother at the time of delivery</label></td>
		<td>
			<input type="radio" id="radmotherdeath" name="radration" value="Yes" /> ಹೌದು /  Yes &nbsp;
			<input type="radio" id="radmotherdeath" name="radration" value="No" /> ಇಲ್ಲ / No 
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.4A </span>ಹೌದಾದಲ್ಲಿ, ಮರಣದ ವಯಸ್ಸು / If yes period of death</label></td>
		<td>
			<select id="ddldeathperiod" name="ddldeathperiod" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="instance">ಪ್ರಸವ ಸಮಯದಲ್ಲಿ / At the time of delivery</option>
				<option value="1week">ಹುಟ್ಟಿದ ಒಂದು ವಾರದೊಳಗೆ /  Within a week</option>
				<option value="1month">ಹುಟ್ಟಿದ ಒಂದು ತಿಂಗಳೊಳಗೆ /  Within a month</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.5 </span>ತಾಯಿಯ ಶಿಕ್ಷಣ /  Education of Mother</label></td>
		  <td>
			<select id="ddlmother_education" name="ddlmother_education" style="min-width:175px;">
			<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="available">ಅಕ್ಷರಸ್ಥ /  Illiterate </option>
				<option value="notavilable"> ಐದನೇ ತರಗತಿ ತೇರ್ಗಡೆ /  5th Std.Pass</option>
				<option value="partially">ಎಂಟನೇ  ತರಗತಿ ತೇರ್ಗಡೆ /  8th Std.Pass</option>
				<option value="partially"> ಹತ್ತನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 10th Std.Pass</option>
				<option value="partially">ಹನ್ನೆರಡನೇ  ತರಗತಿ ತೇರ್ಗಡೆ /  12th Std.Pass</option>
				<option value="partially">ಪದವಿ ಮತ್ತು ಅದಕ್ಕಿಂತಾ ಹೆಚ್ಚು /  Degree and above</option>
			</select>
 		 </td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.6 </span>ತಾಯಿ ತೀರಿಹೋದಾಗ ಕೊನೆಯ ಮಗುವಿಗೆ ಎಷ್ಟು ವಯಸ್ಸಾಗಿತ್ತು /  Age of the last child when Mother died</label></td>
		<td><input type="text" id="txtchildage" name="txtchildage" onchange="allnumeric();"/></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.7 </span>ತಾಯಿ ತೀರಿಹೋದಾಗ ತಾಯಿಯ ವಯಸ್ಸು / Age of the Mother when she died</label></td>
		<td>		
			<input type="text" id="txtmotherdod_death" name="txtmotherdod_death" onchange="allnumericdeath();"/>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.8 </span>ಮರಣ ದಾಖಲಾತಿ / Death Registration</label></td>
		<td>
			<select id="ddldeathregistration" name="ddldeathregistration" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No">ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divreg">
		<td style="background:#d6d7d6;"><label><span class="bluemark">MD1.8A </span>ಹೌದಾದರೆ, ಮರಣ ನೋಂದಣಿ ಸಂಖ್ಯೆಯನ್ನು ನಮೂದಿಸಿ / If Yes, please mention the Death Registration Number</label></td>
		  <td>
   		 <input type="text" id="txtmotherdeath_registration" name="txtmotherdeath_registration" />
 		 </td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.9 </span>ಮರಣ ಹೊಂದಲು ಕಾರಣ / Reason for death</label></td>
		<td>		
			<input type="text" id="txtdeathreason" name="txtdeathreason" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.10</span>ತಾಯಿಯ ಮದುವೆಯ ದಿನಾಂಕ ಲಭ್ಯವಿದೆಯೇ ? / Is Mother's Date of Marriage available ?( ಹೌದಾದರೆ ದಯವಿಟ್ಟು ನಮೂದಿಸಿ / If yes, please mention)</label></td>
		<td>
				<input type="radio" id="mothermarriageage" name="mothermarriageage" value="Yes" /> ಹೌದು / Yes &nbsp;
				<input type="radio" id="mothermarriageage" name="mothermarriageage" value="No" />  ಇಲ್ಲ / No &nbsp;
				<input type="text" id="txtmariageage" name="txtmariageage" />				
		</td>
	</tr>
	<tr id="divmariageage">
		<td><label><span class="bluemark">MD1.10A</span>ಇಲ್ಲ ಎಂದಾದರೆ, ಮದುವೆಯಾದಾಗ ತಾಯಿಯ ವಯಸ್ಸು / If No, mother's age at marriage ( ಗೊತ್ತಿದ್ದರೆ, ದಯವಿಟ್ಟು ನಮೂದಿಸಿ / If Available, please mention)</label></td>
		<td>		
			<select id="ddlmariageage" name="ddlmariageage" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Available ">ಗೊತ್ತಿದೆ / Available </option>
				<option value="Not available">ಗೊತ್ತಿಲ್ಲ  /  Not available</option>
				<option value="please mention">ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ /  please mention</option>
				
			</select>
		</td>
	</tr>
	<tr id="divmotherage">
		<td><label><span class="bluemark">MD1.10B</span>ಇಲ್ಲ ಎಂದಾದರೆ, ಮದುವೆಯಾದಾಗ ತಾಯಿಯ ವಯಸ್ಸು / If No, mother's age at marriage</label></td>
		<td>
			<input type="text" id="txtmotherage" name="txtmotherage" />
		</td>
	</tr>
	<tr id="divmariageage">
		<td><label><span class="bluemark">MD1.11</span>ಗರ್ಭವತಿ ಸಮಯದಲ್ಲಿ ತಾಯಿ ಈ ಕೆಳಗಿನ ತಪಾಸಣೆ ಮಾಡಿಸಿದ್ದರೆಯೇ / During Pregnancy, whether mother has gone through the following checkups</label></td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>MD1.11a. ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ 1 /  ANC 1 </label></td>
		<td>
			<input type="radio" id="radanc1" name="radanc1" value="Yes" /> ಹೌದು / Yes &nbsp;
			<input type="radio" id="radanc1" name="radanc1" value="No" /> ಇಲ್ಲ / No &nbsp;
			<input type="radio" id="radanc1" name="radanc1" value="No" /> ಗೊತ್ತಿಲ್ಲ  / Dont Know 
		</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>MD1.11b. ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ  2 /  ANC 2</label></td>
		<td>
			<input type="radio" id="radanc2" name="radanc2" value="Yes" /> ಹೌದು / Yes &nbsp;
			<input type="radio" id="radanc2" name="radanc2" value="No" /> ಇಲ್ಲ / No &nbsp;
			<input type="radio" id="radanc1" name="radanc1" value="No" /> ಗೊತ್ತಿಲ್ಲ  / Dont Know 
		</td>
	</tr>
	<tr>
		<td style="background:#d6d7d6;"><label>MD1.11b. ಪ್ರಸವ ಪೂರ್ವ ತಪಾಸಣೆ  3 / ANC 3</label></td>
		<td>
			<input type="radio" id="radanc3" name="radanc3" value="Yes" /> ಹೌದು / Yes &nbsp;
			<input type="radio" id="radanc3" name="radanc3" value="No" /> ಇಲ್ಲ / No &nbsp;
			<input type="radio" id="radanc1" name="radanc1" value="No" /> ಗೊತ್ತಿಲ್ಲ  /  Dont Know 
		</td>
	</tr>
	
	<tr>
		<td><label><span class="bluemark">MD1.12</span>ಗರ್ಭಿಣಿಯಾಗಿದ್ದಾಗ ಅಂಗನವಾಡಿಯಿಂದ ಪಡೆದ ಸೇವೆಗಳು / Services recieved from the anganawadi during pregnancy</label></td>
		<td>
			<select id="ddlservicesrec" name="ddlservicesrec" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Supplementary nutrition">ಪೂರಕ ಪೌಷ್ಟಿಕ ಆಹಾರ / Supplementary nutrition</option>
				<option value="IFA Tablet">ಕಬ್ಬಿಣಾಂಶದ ಮಾತ್ರೆ /  IFA Tablet</option>
				<option value="ORS">ಓ.ಆರ್.ಎಸ್. /  ORS</option>
				<option value="Information on Hygiene">ಸ್ವಚ್ಚತೆಯ ಕುರಿತು ಮಾಹಿತಿ / Information on Hygiene</option>
				<option value="Referral Service">ನಿರ್ದೇಶನ ಸೇವೆ / Referral Service</option>
				<option value="None"> ಗೊತ್ತಿಲ್ಲ / None</option>
			</select>
		</td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">MD1.13</span>ಗರ್ಭಾವಧಿ / Pregnancy period</label></td>
		<td>
			<select id="ddlpregnancyperiod" name="ddlpregnancyperiod" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="normal">ಸಹಜ /  Normal</option>
				<option value="premature8thmnth">ಎಂಟು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು / Premature 8 th month</option>
				<option value="premature7thmnth">ಏಳು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು / Premature 7 th month</option>
				
			</select>
		</td>
	</tr>
		<tr>
		<td><label><span class="bluemark">MD1.14</span>ಈ ಮಗುವಿನ   ಹೆರಿಗೆಯಾದ ಸ್ಥಳ / Place of delivery of the child</label></td>
		<td>
			<select id="ddldeliveryplace" name="ddldeliveryplace" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="home">ಮನೆ / Home</option>
				<option value="hospital">ಆಸ್ಪತ್ರೆ / Hospital</option>
				<option value="other">ಇತರೆ / Other</option>
			</select>
		</td>
	</tr>
		<tr id="divdeliasst">
		<td style="background:#d6d7d6;"><label><span class="bluemark">MD1.15</span>ಹೆರಿಗೆಗೆ ಸಹಾಯ ಮಾಡಿದವರು /   Delivery Assisted By</label></td>
		<td>
			<select id="ddldeliveryassist" name="ddldeliveryassist" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="dayi">ದಾದಿ / Dayi</option>
				<option value="ANM">ಆರೋಗ್ಯ ಸಹಾಯಕಿ / ANM</option>
				<option value="doctor">ವೈದ್ಯರು / Doctor</option>
				<option value="others"> ಇತರೆ / Others</option>
			</select>
		</td>
	</tr>
	<tr id="hosresid">
		<td style="background:#d6d7d6;"><label><span class="bluemark">MD1.16</span>ಆಸ್ಪತ್ರೆಯಲ್ಲಿ ಹೆರಿಗೆಯಾದಲ್ಲಿ, ನಿಮ್ಮ ನಿವಾಸದಿಂದ ಎಷ್ಟು ದೂರ /  If hospital distance from your residance</label></td>
		<td>		
			<select id="ddlhospitaldistance" name="ddlhospitaldistance" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ /  Select--</option>
				<option value="0to5">0-5 ಕಿ.ಮಿ / 0-5km</option>
				<option value="6to10">6-10 ಕಿ.ಮಿ / 6-10 km</option>
				<option value="10to20">10-20 ಕಿ.ಮಿ / 10-20 km</option>
				<option value="20to30">20-30 ಕಿ.ಮಿ / 20-30 </option>
				<option value="30gt">30 ಕ್ಕಿಂತ ಹೆಚ್ಚು ಿ.ಮಿ / More than 30 km</option>
			</select>
		</td>
	</tr>
	<tr id="divtypehosp">
		<td style="background:#d6d7d6;"><label><span class="bluemark">MD1.17</span>ಆಸ್ಪತ್ರೆಯ ವಿಧ /  Type of Hospital</label></td>
		<td>
			<select id="ddldhospitaltype" name="ddldhospitaltype" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="govt">ಸರ್ಕಾರಿ /  Govt.</option>
				<option value="private">ಖಾಸಗಿ /  Private</option>
				<option value="ngo">ಸ್ವಯಂ ಸೇವಾ ಸಂಸ್ಥೆ /  NGO</option>
				<option value="others">ಇತರೆ / Others</option>
			</select>
		</td>
	</tr>
	<tr id="amtpaid">
		<td style="background:#d6d7d6;"><label><span class="bluemark">MD1.18</span>ಹೆರಿಗೆಗಾಗಿ ನೀವು ನೀಡಿದ ಹಣ /  Amount paid for delivery</label></td>
		<td>		
			<input type="text" id="txtamountpaid" name="txtamountpaid" />
		</td>
	</tr>
	<tr id="delitype"> 
		<td style="background:#d6d7d6;"><label><span class="bluemark">MD1.19</span>ಹೆರಿಗೆಯ ವಿಧಾನ /Delivery type</label></td>
		<td>
			<select id="ddldeliverytype" name="ddldeliverytype" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="simple">ಸರಳ / Simple</option>
				<option value="forceps">ಪೋರ್ಸೆಪ್ಸ್ ನಿಂದ ಎಳೆದು /  Forceps</option>
				<option value="difficult">ಕಷ್ಟಕರ ಹೆರಿಗೆ / Difficult</option>
				<option value="caesarean">ಶಸ್ತ್ರ ಕ್ರಿಯೆ / Caesarean</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.19(A)</span>ಹೆರಿಗೆಯು ಕಷ್ಟಕರವಾಗಿದ್ದಲ್ಲಿ ದಯವಿಟ್ಟು ವಿವರಿಸಿ /  If delivery was difficult please explain</label></td>
		<td>		
			<input type="text" id="txtexplaindelivery" name="txtexplaindelivery" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.20</span>ತಾಯಿಯು ಎಷ್ಟನೇ ಮಗುವಿನ ಪ್ರಸವ ಸಮಯದಲ್ಲಿ ಮರಣ ಹೊಂದಿದರು /  Birth order of child when mother died</label></td>
		<td>		
			<input type="text" id="txtbirthorder" name="txtbirthorder" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD1.21</span>ರ್ಭಿಣಿಯಾಗಿದ್ದ ಸಮಯದಲ್ಲಿ ತಾಯಿ ಚಿಕಿತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿಕೊಟ್ಟಿದ್ದರಾ ? / Have you visited any hospital/PHC during last year for treatment</label></td>
		<td><select id="ddlvisithospital" name="ddlvisithospital" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No">ಇಲ್ಲ / No</option>
				
			</select></td>
	</tr>
	
	<tr>
		<td><label><span class="bluemark">MD1.21(A)</span>ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ , ದಯವಿಟ್ಟು ನಮೂದಿಸಿ/  Reason for visiting the hospital / PHC and the advice you received from the doctor.Please mention</label></td>
		  <td>
   		 <select id="ddlreasonvisitinghospital" name="ddlreasonvisitinghospital" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="HIV/AIDS">ಹೆಚ್.ಐ.ವಿ./ಏಡ್ಸ್ / HIV/AIDS</option>
				<option value="TB">ಟಿ.ಬಿ. / TB</option>
				<option value="Cancer">ಕ್ಯಾನ್ಸರ್ / Cancer</option>
				<option value="Diabetes">ಸಕ್ಕರೆ ಕಾಯಿಲೆ / Diabetes</option>
				<option value="Heart Problem">ಹೃದ್ರೋಗ / Heart Problem</option>
				<option value="Paralysis">ಲಕ್ವಾ / Paralysis</option>
				<option value="Others">ಇತರೆ / Others</option>
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
