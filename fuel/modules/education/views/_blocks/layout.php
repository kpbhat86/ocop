<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ -ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 5 / OCOP Child's Info Step5:</b> ಶಿಕ್ಷಣ / Education</p>
<form id="educationfrm" name="educationfrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI5.0</span>  ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID (ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ  / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್  / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ  / Driving License ಅಥವಾ  / or ಇತರೆ  / etc) <span class="required">*</span></label></td>
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
		<td class="label"><label><span class="bluemark">CI5.1</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ  /  Select --</option>
			</select>			
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr id="div6">
		<td><label><span class="bluemark">CI5.2</span> ಮಗುವನ್ನು ಶಾಲೆಗೆ ಸೇರಿಸಲಾಗಿದೆಯೇ  / Enrollment to school <span class="required">*</span></label></td>
		<td>
			<select id="ddlschoolenrol" name="ddlschoolenrol" style="min-width:175px;">
				<option value="" > ಆಯ್ಕೆ ಮಾಡಿ  / Select</option>
				<option value="Yes" > ಹೌದು  / Yes</option>
				<option value="No" > ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>
	<tr id="div7">
		<td><label><span class="bluemark">CI5.3</span> ಈಗಿರುವ ಶಾಲೆ  / Present Class <span></span></label></td>
		<td>		
			<select id="txtpclass" name="txtpclass" style="min-width:175px;">
				<option value="0" > ಆಯ್ಕೆ ಮಾಡಿ  / Select</option>
				<option value="1" > 1</option>
				<option value="2" > 2</option>
				<option value="3" > 3</option>
				<option value="4" > 4</option>
				<option value="5" > 5</option>
				<option value="6" > 6</option>
				<option value="7" > 7</option>
				<option value="8" > 8</option>
				<option value="0" > 9</option>
				<option value="10" > 10</option>
				<option value="11" > 11</option>
				<option value="12" > 12</option>
				<option value="13" > ITI</option>
				<option value="14" > ಡಿಪ್ಲೋಮಾ  / Diploma</option>
				<option value="14" > PUC</option>
				
				
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI5.4</span> ಪ್ರಾಥಮಿಕ ಪೂರ್ವ ಶಾಲೆಗೆ ಸೇರಿಸಲಾಗಿದೆಯೇ  ( 0 ಯಿಂದ 6 ವರ್ಷದ ಮಕ್ಕಳಿಗೆ ಮಾತ್ರ ) / Enrolment to Pre-primary School (0-6 Years children only)</label></td>
		<td>
			<select id="ddlschoolpre" name="ddlschoolpre" style="min-width:175px;">
				<option value="" > ಆಯ್ಕೆ ಮಾಡಿ  / Select</option>
				<option value="Yes" > ಹೌದು  / Yes</option>
				<option value="No" > ಇಲ್ಲ  /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divpreschool1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.5</span>   ಪ್ರಾಥಮಿಕ ಪೂರ್ವ ಶಾಲೆಯ ವಿಧ  / Type of Pre-primary School</label></td>
		<td>
			<select id="ddlpreschtype" name="ddlpreschtype" style="min-width:175px;">
				<option value=""> ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="government"> ಸರ್ಕಾರಿ / Government</option>
				<option value="private"> ಖಾಸಗಿ / Private</option>
				<option value="NGO"> ಸ್ವಯಂಸೇವಾ ಸಂಸ್ಥೆ / NGO</option>
				<option value="other"> ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr id="divpreschool2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.6</span> ಪ್ರಾಥಮಿಕ ಪೂರ್ವ ಶಾಲೆಗೆ ಸೇರಿದ ದಿನಾಂಕ  / Date of Joining Pre-primary</label></td>
		<td>			
			<input id="txtpredate" name="txtpredate"  type="text" />	
			<script type="text/javascript">
				$(txtpredate).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI5.7</span> ಪ್ರಾಥಮಿಕ ಶಾಲೆಗೆ ಸೇರಿಸಲಾಗಿದೆಯೇ  ( 0 ಯಿಂದ 6 ವರ್ಷದ ಮಕ್ಕಳಿಗೆ ಮಾತ್ರ ) / Enrolment to Primary School (6 years and above children)</label></td>
		<td>
			<select id="ddlpenroll" name="ddlpenroll" style="min-width:175px;">
				<option value="0" > ಆಯ್ಕೆ ಮಾಡಿ  /  Select</option>
				<option value="Yes" > ಹೌದು  / Yes</option>
				<option value="No" > ಇಲ್ಲ  /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divprischool1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.8</span> ಪ್ರಾಥಮಿಕ ಶಾಲೆಯ ವಿಧ  /Type of Primary School</label></td>
		<td>
			<select id="ddlptype" name="ddlptype" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="government"> ಸರ್ಕಾರಿ / Government</option>
				<option value="private"> ಖಾಸಗಿ / Private</option>
				<option value="NGO"> ಸ್ವಯಂಸೇವಾ ಸಂಸ್ಥೆ / NGO</option>
				<option value="other"> ಇತರೆ  /  Other</option>
			</select>
		</td>
	</tr>
	<tr id="divprischool2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.9</span> ಪ್ರಾಥಮಿಕ ಶಾಲೆಗೆ ಸೇರಿದ ದಿನಾಂಕ  / Date of Joining Primary</label></td>
		<td>			
			<input id="txtpridate" name="txtpridate"  type="text" />	
		</td>
	</tr>
	<tr id="divpresentsch">
		<td><label><span class="bluemark">CI5.10</span> ಈಗಿರುವ ಶಾಲೆ  / Present School</label></td>
		<td>
			<select id="ddlpresentsch" name="ddlpresentsch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  /Select --</option>
				<option value="government"> ಸರ್ಕಾರಿ /  Government</option>
				<option value="private">  ಖಾಸಗಿ / Private</option>
				<option value="NGO"> ಸ್ವಯಂಸೇವಾ ಸಂಸ್ಥೆ /  NGO</option>
				<option value="other">  ಇತರೆ  /  Other</option>
			</select>
		</td>
	</tr>
	<tr id="divattending">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.11</span> ನಿಯಮಿತವಾಗಿ ಹಾಜರಾಗುತ್ತಿದೆಯೇ  / Attending regularly</label></td>
		<td>
			<select id="ddlattreg" name="ddlattreg" style="min-width:175px;">
				<option value="" > ಆಯ್ಕೆ ಮಾಡಿ  / Select</option>
				<option value="Yes" > ಹೌದು  / Yes</option>
				<option value="No" > ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>
	<tr id="div8">
		<td><label><span class="bluemark">CI5.12</span>( ಮಗುವಿನ ವಯಸ್ಸು ಮತ್ತು ಈಗಿರುವ ತರಗತಿಯನ್ನು ಆಧರಿಸಿ ಈ ಪಟ್ಟಿಯನ್ನು ನೋಡಬೇಕು /  Consider age and present class) <br /> i ತರಗತಿ ಮತ್ತು ವಯಸ್ಸಿನ ಹೊಂದಾಣಿಕೆ ಆಗದಿರಲು ಕಾರಣ  / If Mismatch of age and class reasons</label></td>
		<td>
			<select id="ddlmismatch" name="ddlmismatch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="early enrolled"> ಶಾಲೆಗೆ ಬೇಗ ದಾಖಲಿಸಲಾಯಿತು  / Early Enrolled</option>
				<option value="not enrolled"> ಶಾಲೆಗೆ ದಾಖಲಾಗಿಲ್ಲ / Not Enrolled</option>
				<option value="marriage"> ಮದುವೆ / Marriage</option>
				<option value="drop out"> ಶಾಲೆ ಬಿಟ್ಟವರು / Drop out</option>
				<option value="missing"> ಕಾಣೆಯಾದವರು / Missing</option>
				<option value="misgrated"> ವಲಸೆ ಹೋದವರು  / Migrated</option>
				<option value="eviction none"> ಗುಳೆ ಎಬ್ಬಿಸಲ್ಪಟ್ಟವರು / ಇತರೆ   / Eviction / None</option>
			</select>
		</td>
	</tr>
	<tr id="divnonenrolled">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.13</span> ಶಾಲೆಗೆ ದಾಖಲಾತಿ ಆಗದಿರಲು ಕಾರಣಗಳು / School Non-Enrollment Reasons</label></td>
		<td>
			<select id="divnonenroll" name="ddlnonenroll" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="lack of awareness"> ತಿಳುವಳಿಕೆಯ ಕೊರತೆ / Lack of awareness</option>
				<option value="no school nearby"> ಶಾಲೆ ಹತ್ತಿರವಿಲ್ಲ /  No School nearby</option>
				<option value="taking care of siblings">  ಒಡಹುಟ್ಟಿದವರ ಹಾರೈಕೆಯಲ್ಲಿ  / Taking care of siblings</option>
				<option value="other"> ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr id="div9">
		<td><label><span class="bluemark">CI5.14</span> ಶಾಲೆ ಬಿಡಲು ಕಾರಣ  / If Drop out, Reasons</label></td>
		<td>
			<select id="ddldropreason" name="ddldropreason" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="taking care of siblings"> ಒಡಹುಟ್ಟಿದವರ ಹಾರೈಕೆಯಲ್ಲಿ / Taking care of siblings</option>
				<option value="parents death">  ಹೆತ್ತವರ ಮರಣ / Parents Death</option>
				<option value="migration"> ವಲಸೆ ಹೋದವರು / Migration</option>
				<option value="not interested"> ಆಸಕ್ತಿ ಇಲ್ಲ / Not Interested</option>
				<option value="other">  ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr id="divreenrolattmpt">
		<td><label><span class="bluemark">CI5.15</span> ಶಾಲಾ ದಾಖಲಾತಿಗೆ ಯಾವುದೇ ಪ್ರಯತ್ನ/ If drop out, Any school re-enrolment attempts</label></td>
		<td>
			<input type="radio" id="radreenrolattmpt" name="radreenrolattmpt" value="Yes" /> ಹೌದು  /  Yes &nbsp;
			<input type="radio" id="radreenrolattmpt" name="radreenrolattmpt" value="No" />  ಇಲ್ಲ  / No 
		</td>
	</tr>
	<tr id="divreenroll">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI5.16</span> ಪ್ರಯತ್ನ ಯಶಸ್ಪಿಯಾಗದಿರಲು ಕಾರಣ  / If no, Reason for Failure of attempts</label></td>
		<td>			
			<input id="txtreasonfail" name="txtreasonfail"  type="text" />	
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI5.17</span> ಮಗು ಅಂಗವಿಕಲತೆ ಹೊಂದಿದೆಯೇ  / Is Child Disabled</label></td>
		<td>
			<select id="ddlchlddisable" name="ddlchlddisable" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes"> ಹೌದು  / Yes</option>
				<option value="No"> ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>
	<tr id="divdisabledsch">
		<td><label><span class="bluemark">CI5.18</span> ಅಂಗವಿಕಲತೆ ಇದ್ದಲ್ಲಿ , ಶಾಲಾ ಸೌಲಭ್ಯಗಳು  / If disabled, school facilities</label></td>
		<td>
			<select id="ddldisabledsch" name="ddldisabledsch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="ramp"> ಇಳಿಜಾರು / Ramp</option>
				<option value="scholarship"> ವಿದ್ಯಾರ್ಥಿ ವೇತನ / Scholarship</option>
				<option value="speical needs"> ವಿಶೇಷ ಅವಶ್ಯಕತೆ / Speical Needs</option>
				<option value="other">  ಇತರೆ / Other</option>
			</select>
		</td>
	</tr>
	<tr id="divspecialsch">
		<td><label><span class="bluemark">CI5.19</span> ವಿಶೇಷ ಶಾಲೆ / Special School</label></td>
		<td>
			<select id="ddlspecialsch" name="ddlspecialsch" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="special education"> ವಿಶೇಷ ಶಿಕ್ಷಣ / Special Education</option>
				<option value="vocational training"> ಉದ್ಯೋಗ ತರಬೇತಿ /  Vocational Training</option>
				<option value="other"> ಇತರೆ / Other</option>
				<option value="none"> ಯಾವುದು ಇಲ್ಲ / None</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI5.20</span> ಶಾಲೆಗೆ ಹೋಗುವ , ಸಾರಿಗೆ ವಿಧಾನ / Mode of Transport to school</label></td>
		<td>
			<select id="ddltransmode" name="ddltransmode" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="walk"> ನಡಿಗೆ / Walk</option>
				<option value="bicycle"> ಸೈಕಲ್ / Bicycle</option>
				<option value="bus">  ಬಸ್ / Bus</option>
				<option value="other">ಇತರೆ /  Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI5.21</span> ಪ್ರಯಾಣ ಮಾಡುವ ದೂರ /  Distance Traveled</label></td>
		<td>
			<select id="ddldistravel" name="ddldistravel" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="Below 1KM"> 1ಕಿ.ಮಿ.ಗಿಂತ ಕಡಿಮೆ / Below 1KM</option>
				<option value="1-2KM"> 1-2ಕಿ.ಮಿ. / 1-2KM</option>
				<option value="2-5KM"> 2-5ಕಿ.ಮಿ. / 2-5KM</option>
				<option value="above 5KM"> 5ಕಿ.ಮಿ. ಗಿಂತ ಹೆಚ್ಚು  / Above 5KM</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="saveeducation();">
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