<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ -ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 4 / OCOP Child's Info Step4:</b> ಪ್ರಚಲಿತ ಮಾಹತಿ  / Current Details</p>
<form id="currentdetailsfrm" name="currentdetailsfrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI 3.0</span>  ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID (ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ / or ಇತರೆ  / etc) <span class="required">*</span></label></td>
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
		<td class="label"><label><span class="bluemark">CI 3.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 3.1</span> ಮಗು ಈಗಿರುವ ತೂಕ  / Present Weight of the child <span></span></label></td>
		<td>
			<input type="text" id="txtcweight" name="txtcweight" />ಕೆ.ಜಿ  ./  Kgs
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 3.2</span> ಮಗು ಈಗಿರುವ ಎತ್ತರ  / Present Height of the child <span></span></label></td>
		<td>		
			<input type="text" id="txtcheight" name="txtcheight" />ಅಡಿ / Feet
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 3.3</span> ಪ್ರಸ್ತುತ ಇರುವ ಅಂಗವಿಕಲತೆ / Current Disability <span class="required">*</span></label></td>
		<td>
			<select id="ddlcdisability" name="ddlcdisability" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="None">ಯಾವುದೂ ಇಲ್ಲ / None</option>
				<option value="Blindness">ಪೂರ್ಣ ದೃಷ್ಟಿ /  Blindness</option>
				<option value="Low vision">ಮಂದ ದೃಷ್ಟಿ/ Low vision</option>
				<option value="Leprosy-cured"> ಕುಷ್ಟದಿಂದ ಗುಣ  /  Leprosy-cured</option>
				<option value="Hearing impairment">ಶ್ರವಣ   /  Hearing impairment</option>
				<option value="Locomotor disability"> ದೈಹಿಕ / Locomotor disability</option>
				<option value="Mental retardation">ಬುದ್ಧಿಮಾಂದ್ಯತೆ/ Mental retardation</option>
				<option value="Mental illness">ಮಾನಸಿಕ  ಅಸ್ವಸ್ಥತೆ / Mental illness</option> 
			<option value="Speech and hearing">) ವಾಕ್ ಮತ್ತು ಶ್ರವಣ /Speech and hearing</option> 
				<option value="Other">ಇತರೆ/ Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 3.4</span> ಕಳೆದ ಒಂದು ವರ್ಷದಿಂದ ಮಗು ಯಾವುದಾದರೂ ಆರೋಗ್ಯ ಸಮಸ್ಯೆ ಎದುರಿಸಿತ್ತೇ ? / During the last year has the child faced any health related problems</label></td>
		<td>
			<select id="ddlcprobfaced" name="ddlcprobfaced" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divassistancerecvd">
		<td><label><span class="bluemark">CI 3.5</span> ಏನಾದರೂ ನೆರವು / ಚಿಕಿತ್ಸೆ ದೊರಕಿತ್ತೇ / Any assistance/intervention recieved </label></td>
		<td>			
			<select id="ddlassistancerecvd" name="ddlassistancerecvd" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divassistance">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 3.6</span> ಹೌದಾದರೆ, ನೆರವು ನೀಡಿದವರು  / If yes, Assistance given by</label></td>
		<td>
			<select id="ddlsssistancesrc" name="ddlsssistancesrc" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="Government">ಸರ್ಕಾರಿ  / Government</option>
				<option value="NGO">ಸ್ವಯಂಸೇವ ಸಂಸ್ಥೆ / NGO</option>
				<option value="Private">ಖಾಸಗಿ / Private</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 3.7</span> ಹತ್ತಿರದ ಆರೋಗ್ಯ ಕೇಂದ್ರ ಕ್ಕಿರುವ ದೂರ / Distance to nearest Health Center</label></td>
		<td>
			<select id="ddlhcenter" name="ddlhcenter" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="0-5 km">0-5 ಕಿ.ಮಿ /0-5 km</option>
				<option value="5-10 km">5-10 ಕಿ.ಮಿ / 5-10 km</option>
				<option value="15-20 km">15-20 ಕಿ.ಮಿ /15-20 km</option>
				<option value="20-30 km">20-30 ಕಿ.ಮಿ /20-30 km</option>
				<option value="more than 30 km">30  ಕಿ.ಮಿ ಹೆಚ್ಚು /More than 30 Km</option>
			</select>
		</td>
	</tr>
		<tr>
		<td><label><span class="bluemark">CI 3.8</span> ಮಗುವಿಗೆ ಮದುವೆ ಆಗಿದೆಯೆ?/Is the child married?</label></td>
		<td>
			<select id="chldmar" name="chldmar" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="Yes">ಹೌದು  /YES</option>
				<option value="No"> ಇಲ್ಲ   / NO</option>
			</select>
		</td>
	</tr>
	
	<tr id="marrdate">
		<td><label><span class="bluemark">CI 3.9</span> ಮದುವೆ ಆದ ದಿನಾಂಕ /Date of marriage</label></td>
			<td>  
					<input id="txtdate" name="txtdate"  type="text" />	
						<script type="text/javascript">
							$(txtdate).datepick({dateFormat: 'dd-mm-yyyy'});
						</script>
					</select>
			</td>	
	</tr>
	
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savecurrentdetails();">
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