<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ - ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 7 /  OCOP Child's Info Step7:</b> ಸೌಖ್ಯದ ಪರಿವರ್ತನೆ /  Welfare</p>
<form id="welfarefrm" name="welfarefrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI7.0</span> ಕುಟುಂಬದ ಸಂಖ್ಯೆ /  Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನಾ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ ಇತರೆ /  or etc) <span class="required">*</span></label></td>
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
		<td class="label"><label><span class="bluemark">CI7.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr id="divbhagya">
		<td style="background:#d6d7d6;"><label><span class="bluemark">CI7.1</span> ಭಾಗ್ಯಲಕ್ಷ್ಮಿ ಯೋಜನೆ /  Bhagyalaxmi Scheme</label></td>
		<td>		
			<select id="ddlbhagyalaxmischeme" name="ddlbhagyalaxmischeme" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Availed"> ಪಡೆದಿದ್ದರೆ / Availed</option>
				<option value="Not Availed"> ಪಡೆದಿಲ್ಲ / Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI7.2</span> ಸೈಕಲ್ ಯೋಜನೆ /  Bicycle Scheme <span></span></label></td>
		<td>
			<select id="ddlbicyclescheme" name="ddlbicyclescheme" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Availed"> ಪಡೆದಿದ್ದರೆ / Availed</option>
				<option value="Not Availed">  ಪಡೆದಿಲ್ಲ /  Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
			</select>
		</td>
	</tr>
	<tr id="divdevadasischeme">
		<td><label><span class="bluemark">CI7.3</span> ದೇವದಾಸಿಯ ಸಹಾಯಕ  ಯೋಜನೆ /  Devadasi Assistance Scheme</label></td>
		<td>
			<select id="ddldevadasischeme" name="ddldevadasischeme" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Availed"> ಪಡೆದಿದ್ದರೆ / Availed</option>
				<option value="Not Availed"> ಪಡೆದಿಲ್ಲ / Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
				<option value="Not Aware">ಅನ್ವಹಿಸುವುದಿಲ್ಲ /  Not Applicable</option>
			</select>
		</td>
	</tr>
	<tr id="divdisabilitycert">
		<td><label><span class="bluemark">CI7.4</span> ಅಂಗವಿಕಲತೆಯ ಪ್ರಮಾಣ ಪತ್ರ / Disability Certificate</label></td>
		<td>			
			<select id="ddldisabilitycert" name="ddldisabilitycert" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Availed"> ಪಡೆದಿದ್ದರೆ / Availed</option>
				<option value="Not Availed"> ಪಡೆದಿಲ್ಲ / Not Availed</option>
				<option value="Not Aware"> ಮಾಹಿತಿ ಇಲ್ಲ /  Not Aware</option>
			</select>
		</td>
	</tr>
	<tr id="divdisability">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI7.5</span> ಅಂಗವಿಕಲರಾಗಿದ್ದಾರೆ, ಸಿಕ್ಕಿರುವ ಸೌಲಭ್ಯಗಳೇನು ನಮೂದಿಸಿ /  If disabled, what are the facilities provided (specify)</label></td>
		<td><input type="text" id="txtfacilities" name="txtfacilities" /></td>
	</tr>	
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savewelfare();" />
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