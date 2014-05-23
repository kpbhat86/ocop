<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ - ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 6 / OCOP Child's Info Step6:</b> ರಕ್ಷಣೆಯ ಮಾಹಿತಿ  / Protection</p>
<form id="protectionfrm" name="protectionfrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI6.0</span>ಕುಟುಂಬದ ಸಂಖ್ಯೆ /  Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಪರವಾನಗಿ / Driving License ಅಥವಾ ಇತರೆ / or etc) <span class="required">*</span></label></td>
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
		<td class="label"><label><span class="bluemark">CI6.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.1</span> ಮಗು ಕೆಲಸ ಮಾಡುತ್ತಿದೆಯೇ /  Whether child is working? <span class="required">*</span></label></td>
		<td>
			<select id="ddlcworking" name="ddlcworking" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  Select --</option>
				<option value="Yes"> ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divcw1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.2</span> ಪೂರ್ಣಾವಧಿ ಅಥವಾ ಅರೆಕಾಲಿಕ ಕೆಲಸ  /  Work is full time or part time</label></td>
		<td>
		<select id="ddlworkfp" name="ddlworkfp" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="FULL TIME"> ಪೂರ್ಣಾವಧಿ ಕೆಲಸ /  FULL TIME</option>
				<option value="PART TIME">  ಅರೆಕಾಲಿಕ  ಕೆಲಸ / PART TIME</option>
		</select>
	</tr>
	<tr id="divcw2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.3</span> ಯಾರ ಕೆಲಸ / Work for Whom</label></td>
		<td>
			<select id="ddlworkwhom" name="ddlworkwhom" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  /  Select --</option>
				<option value="Own"> ಸ್ವಂತ /  Own</option>
				<option value="Relative">  ಸಂಬಂಧಿಕರು / Relative</option>
				<option value="Other">  ಇತರೆ /  Other</option>
			</select>
		</td>
	</tr>
	<tr id="divworktype">
		<td><label><span class="bluemark">CI6.4</span> ಕೆಲಸದ ವಿಧಾನ / Work Type</label></td>
		<td>		
			<select id="ddlworktype" name="ddlworktype" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ  / Select --</option>
				<option value="12" >ಕೃಷಿ ಕಾರ್ಮಿಕ /agriculture labour</option>
				<option value="13" > ನಿರ್ಮಾಣ ಕಾರ್ಯ /construction</option>
				<option value="14" >ಗ್ಯಾರೇಜ್ /garage</option>
				<option value="15" >ಜೀತ /bonded</option>
				<option value="16" > ಪಶುಸಂಗೋಪನೆ /animal rearing</option>
				<option value="17" >ಇತರೆ/ other	</option>		
				 </select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.5</span> ಮಗು ಕಾಣೆಯಾಗಿತ್ತೆ / ಕಾಣೆಯಾಗಿದೆಯೇ /  Whether Child was Missing/ Is Missing? </label></td>
		<td>
			<select id="ddlmissing" name="ddlmissing" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ  /  Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No">  ಇಲ್ಲ / No</option>
			</select>
		</td>
	</tr>
	<tr id="divcm1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.6</span> ಕಾಣೆಯಾಗಲು  ಕಾರಣ / Reason for missing</label></td>
		<td>
			<select id="ddlmissingreason" name="ddlmissingreason" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Missing during programmes or travel"> ಯಾವುದಾದರು ಸಭೆ, ಸಮಾರಂಭ ಅಥವಾ ಸ್ಥಳಕ್ಕೆ ಭೇಟಿ ಕೊಟ್ಟಾಗ / Missing during programmes or travel </option>
				<option value="Traffic for labour"> ದುಡಿಮೆಗಾಗಿ ಸಾಗಾಣಿಕೆ / Traffic for labour</option>
				<option value="Traffic for flesh trade"> ಲೈಂಗಿಕ ಉದ್ದೇಶಕ್ಕಾಗಿ ಸಾಗಣೆ ಮಾಡುವುದು / Traffic for flesh trade</option>
				<option value="Run away from home"> ಮನೆ ಬಿಟ್ಟು ಓಡಿ ಹೋದದ್ದು / Run away from home</option>
				<option value="Other"> ಇತರೆ /  Other</option>
			</select>
		</td>
	</tr>
	<tr id="divcm2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.7</span> ಕಾಣೆಯಾದ ದಿನಾಂಕ  / The date of missing </label></td>
		<td><input type="text" id="txtmissingdate" name="txtmissingdate" />
			<script type="text/javascript">
				$(txtmissingdate).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr id="divcm3">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.8</span> ಎಫ್.ಐ.ಆರ್ ದಾಖಲಾಗಿದೆಯೇ /  Have you registered the FIR </label></td>
		<td>
			<select id="ddlfreg" name="ddlfreg" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes"> ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divcm4">
		<td style="background:#d6d7d6; padding-left:50px;"><label><span class="bluemark">CI6.9</span> ಎಫ್.ಐ.ಆರ್  ದಾಖಲಿಸಿದ ದಿನಾಂಕ /  FIR Date</label></td>
		<td><input type="text" id="txtfirdate" name="txtfirdate" />
			<script type="text/javascript">
				$(txtfirdate).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr id="divcm5">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.10</span> ಮಗು ಹಿಂದಿರುಗಿತೆ / Is child returned  </label></td>
		<td>
			<select id="ddlcreturn" name="ddlcreturn" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">  ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divcm6">
		<td style="background:#d6d7d6; padding-left:50px;"><label><span class="bluemark">CI6.11</span> ಹಿಂದಿರುಗಿದ ದಿನಾಂಕ  / Return Date</label></td>
		<td><input type="text" id="txtreturndate" name="txtreturndate" />
			<script type="text/javascript">
				$(txtreturndate).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.12</span> ಮಗು ವಿವಾಹವಾಗಿದ್ದರೆ, ವಿವಾಹದ ದಿನಾಂಕ ನೆನಪಿದೆಯೇ /  If child is married, do you know the date of Marriage </label></td>
		<td>
			<select id="ddlcmarr" name="ddlcmarr" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes"> ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr id="divcmarr">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.13</span> ಮದುವೆಯ ದಿನಾಂಕ  / Marriage Date</label></td>
		<td><input type="text" id="txtmarriagedate" name="txtmarriagedate" />
			<script type="text/javascript">
				$(txtmarriagedate).datepick({dateFormat: 'dd-mm-yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.14</span> ಪ್ರಾಯ ಪೂರ್ವ ಗರ್ಭಧಾರಣೆ / Minor Pregnancy</label></td>
		<td>
			<input type="radio" id="radpregnancy" name="radpregnancy" value="Yes" />  ಹೌದು / Yes &nbsp;
			<input type="radio" id="radpregnancy" name="radpregnancy" value="No" /> ಇಲ್ಲ /   No 
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.15</span> ತಾಯಿ ದೇವದಾಸಿಯೆ / Devadasi Mother</label></td>
		<td>
			<input type="radio" id="radddmother" name="radddmother" value="Yes" /> ಹೌದು / Yes &nbsp;
			<input type="radio" id="radddmother" name="radddmother" value="No" /> ಇಲ್ಲ /  No 
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.16</span> ಮಗುವಿಗೆ ಮುತ್ತು ಕಟ್ಟಲಾಗಿದೆಯೇ / Is the child dedicated to Devadasi system</label></td>
		<td>
			<select id="ddldevadasisys" name="ddldevadasisys" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
			</select>			 
		</td>
	</tr>
	<tr id="divdds">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.17</span> ಹೌದಾದರೆ ಕಾರಣವೇನು / If yes what is the reason</label></td>
		<td><input type="text" id="txtdevadasireason" name="txtdevadasireason" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI6.18</span> ಮಗುವನ್ನು ರಕ್ಷಿಸಲಾಗಿದೆಯೇ  / Is child was rescued? </label></td>
		<td>
			<select id="ddlchildrescued" name="ddlchildrescued" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes"> ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ / No</option>
			</select>			 
		</td>
	</tr>
	<tr id="divcr1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.19</span> ಮಗುವನ್ನು ರಕ್ಷಿಸಿದಾಗ, ಮಗುವನ್ನು ಮಕ್ಕಳ ಕಲ್ಯಾಣ ಸಮಿತಿಯ ಮುಂದೆ ಹಾಜರು ಮಾಡಲಾಯಿತೇ / When the child was protected / rescused, whether he/she produced before CWC</label></td>
		<td>
			<select id="ddlchildrescuedreason" name="ddlchildrescuedreason" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="Yes"> ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ /  No</option>
				<option value="Do not know"> ಗೊತ್ತಿಲ್ಲ / Do not know</option>
			</select>
		</td>
	</tr>
	<tr id="divcr2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI6.20</span> ಮಕ್ಕಳ ಕಲ್ಯಾಣ ಸಮಿತಿಯಿಂದ ಮಗುವಿಗೆ ದೊರೆತ ಸೇವೆ ಏನು /  What the kind of service child received from CWC?</label></td>
		<td><input type="text" id="txtservicekind" name="txtservicekind" /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="actions">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="saveprotection();">
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