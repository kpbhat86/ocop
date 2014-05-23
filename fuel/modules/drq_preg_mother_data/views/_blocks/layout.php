<div id="main_content_inner">
<p class="instructions"><b>ಮರಣಕ್ಕೆ ಸಂಬಂಧಪಟ್ಟ ಪ್ರಶ್ನಾವಾಳಿ - ಹಂತ 6 / Death Related Questionnaire(DRQ) Step6:</b> <b style="color:#41A0CF;">ತಾಯಿಯ ಮರಣ ಮಾಹಿತಿ  / Mother's Death Details</b> :-ಸಾಮಾನ್ಯ ಮರಣದ ಮಾಹಿತಿ /  General Death Information</p>
<form id="motherdatafrm" name="motherdatafrm" method="post" action="">
	<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="60%" class="label"><label><span class="bluemark">MD2.0</span>ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ /  Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ /  Pan Card,ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ /  Driving License ಅಥವಾ  / or ಇತರೆ  / etc)</label></td>
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
		<td class="label"><label><span class="bluemark">MD2.0</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child</label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td class="label"><label><span class="bluemark">MD2.1 </span>ತಾಯಿಯ ಮರಣದ ಮಾಹಿತಿ /  Mother's Death Details</label></td>
		<td class="value">
			<select id="ddldeathmotherstatusdeath" name="ddldeathmotherstatusdeath" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="available">ಗೊತ್ತಿದೆ / Available</option>
				<option value="notavilable">ಗೊತ್ತಿಲ್ಲ  /  Not Available</option>
				<option value="partially">ಸ್ವಲ್ಪ ಗೊತ್ತಿದೆ /  Partially</option>
			</select>
			
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.2</span>ತಾಯಿಯ ಹೆಸರು /  Name of the Mother</label></td>
		<td>		
			<input type="text" maxlength="100" id="txtmothername" name="txtmothername" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.3</span>ತಾಯಿಯ ಜನ್ಮದಿನಾಂಕ /  Mother's Date of Birth</label></td>
		<td>
			<input type="text" id="txtmotherdob" name="txtmotherdob" /> 
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.4</span>ತಾಯಿಯ ಶಿಕ್ಷಣ / Education of the mother</label></td>
		<td>
			<select id="ddlmothereducation" name="ddlmothereducation" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="available">ಅಕ್ಷರಸ್ಥ /  Illiterate </option>
				<option value="notavilable"> ಐದನೇ ತರಗತಿ ತೇರ್ಗಡೆ / 5th Std.Pass</option>
				<option value="partially">ಎಂಟನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 8th Std.Pass</option>
				<option value="partially"> ಹತ್ತನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 10th Std.Pass</option>
				<option value="partially">ಹನ್ನೆರಡನೇ  ತರಗತಿ ತೇರ್ಗಡೆ / 12th Std.Pass</option>
				<option value="partially">ಪದವಿ ಮತ್ತು ಅದಕ್ಕಿಂತಾ ಹೆಚ್ಚು / Degree and above</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.5</span>ತಾಯಿ ಮರಣ ಹೊಂದಿದಾಗ ಕೊನೆಯ ಮಗುವಿಗೆ ಎಷ್ಟು ವಯಸ್ಸಾಗಿತ್ತು / Age of last child when mother was died</label></td>
		<td><input type="text" id="txtmotherage" name="motherage" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.6</span>ತಾಯಿ ತೀರಿಹೋದಾಗ ತಾಯಿಯ ವಯಸ್ಸು / Age of the mother when died</label></td>
		<td>			
			<input type="text" id="txtmotherdeathage" name="motherdeathage" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.7</span>ಮರಣ ದಾಖಲಾತಿ / Death registration</label></td>
		<td>
			
			<select id="ddldeathregistration" name="ddldeathregistration" style="min-width:175px;">
				<option value="">--   ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes">ಹೌದು / Yes</option>
				<option value="No"> ಇಲ್ಲ /  No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.7(A)</span>ಹೌದಾದರೆ, ಮರಣ ನೋಂದಣಿ ಸಂಖ್ಯೆಯನ್ನು ನಮೂದಿಸಿ / If Yes, please mention the  Death Registration Number</label></td>
		<td>
			<input type="text" id="txtdeathregistrationno" name="txtdeathregistrationno" />
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.8</span>ಮರಣ ಹೊಂದಲು ಕಾರಣ /  Reason for death</label></td>
		<td><input type="text" id="txtmotherdeathrsn" name="txtmotherdeathrsn" /></td>
	</tr>	
	<tr>
		<td><label><span class="bluemark">MD2.9</span>ತಾಯಿಯ ಮದುವೆಯ ದಿನಾಂಕ ಲಭ್ಯವಿದೆಯೇ ? / Is Mother's Date of Marriage available ?( ಹೌದು /  ಇಲ್ಲ / Yes/No) ( ಹೌದಾದರೆ ದಯವಿಟ್ಟು ನಮೂದಿಸಿ / If yes, please mention)</label></td>
		<td>
			<input type="radio" id="motherdeathage" name="motherdeathage" value="Yes" /> Yes &nbsp;
			<input type="radio" id="motherdeathage" name="motherdeathage" value="No" /> No &nbsp;
			<input type="text" id="txtmotherdeathage" name="txtmotherdeathage" />	
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.9(A)</span>ಇಲ್ಲ ಎಂದಾದರೆ, ಮದುವೆಯಾದಾಗ ತಾಯಿಯ ವಯಸ್ಸು / If No, mother's age at marriage</label></td>
		<td>
			<input type="text" id="txtmotherageatmar" name="txtmotherageatmar" />
		</td>
	</tr>	
		
	<tr>
		<td><label><span class="bluemark">MD2.10</span>ತಾಯಿ ಮರಣ ಹೊಂದುವುದಕ್ಕಿಂಥ ಒಂದು ವರ್ಷದ ಹಿಂದೆ ಚಿಕಿತ್ಸೆಗಾಗಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿಕೊಟ್ಟಿದ್ದರಾ ? / Have mother visited any hospital/PHC during last year for treatment before death?</label></td>
		<td>
			<input type="radio" id="radtreatment" name="radtreatment" value="Yes" /> Yes &nbsp;
			<input type="radio" id="radtreatment" name="radtreatment" value="No" /> No
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">MD2.10(A)</span>ಕಳೆದ ವರ್ಷದಲ್ಲಿ ಆಸ್ಪತ್ರೆ / ಪ್ರಾಥಮಿಕ ಆರೋಗ್ಯ ಕೇಂದ್ರಕ್ಕೆ ಬೇಟಿ ನೀಡಲು ಕಾರಣ ಮತ್ತು ವೈದ್ಯರಿಂದ ಪಡೆದ ಸಲಹೆ / Reason for visiting the hospital /PHC and the advice you recieved frm the doctor</label></td>
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
