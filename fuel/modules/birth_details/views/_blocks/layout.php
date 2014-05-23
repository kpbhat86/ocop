<div id="main_content_inner" style="min-height:700px;">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ -ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 2 / OCOP Child's Info Step2:</b>ಜನನದ ವಿವರಗಳು  /  Birth Details</p>
<form id="birthdetailsfrm" name="birthdetailsfrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI 2.0</span> ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID (ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ /  Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ / or ಇತರೆ  / etc) <span class="required">*</span></label></td>
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
		<td class="label"><label><span class="bluemark">CI 2.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.1</span> ಮಗು ಜನಿಸಿದಾಗ ಇದ್ದ ತೂಕ( 6 ವರ್ಷದೊಳಗಿನ ಮಕ್ಕಳಿಗೆ ಮಾತ್ರ ) / Birth Weight of the child(only for below six years children) <span></span></label></td>
		<td><input type="text" id="txtbweight" name="txtbweight" onchange="allnumeric();"/>ಕೆ.ಜಿ./ KGs</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.2</span> ಮಗು ಜನಿಸುವಾಗ ಇದ್ದ ಅಂಗವಿಕಲತೆ   / Birth Disability of the child</label></td>
		<td>		
			<select id="ddlbdisability" name="ddlbdisability" style="min-width:175px;">
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
		<td><label><span class="bluemark">CI 2.3</span> ಜನನ ದಾಖಲಾತಿ / Birth Registration <span class="required">*</span></label></td>
		<td>
		
			<select id="ddlBreg" name="ddlBreg" style="min-width:175px;">
				<option  value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option id="radbreg" name="radbreg" value="Yes">ಹೌದು / Yes</option>
				<option id="radbreg" name="radbreg" value="No"> ಇಲ್ಲ / No</option>
			</select>		</td>
	</tr>
		<tr id="divd2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.4</span> ಜನನ ಪ್ರಮಾಣ ಪತ್ರ ಪಡೆದಿದ್ದರೆ? (ಹೌದು/ಇಲ್ಲ) ಇದ್ದಲ್ಲಿ ಪ್ರಮಾಣ ಪತ್ರದ ಸಂಖ್ಯೆ ನಮೂದಿಸಿ / Have you obtained the birth certificate? If yes please mention certificate number</label></td>
		<td>
			<select id="ddlcert" name="ddlcert" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No"> ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>
	<tr id="divcertno">
		<td><label><span class="bluemark">CI 2.4.1</span> ಪ್ರಮಾಣ ಪತ್ರದ ಸಂಖ್ಯೆ ನಮೂದಿಸಿ /Please enter certificate number</label></td>
		<td>
		<input type="text"  id="txtcertno" name="txtcertno">
				<!--<select id="txtcertno" name="txtcertno" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No"> ಇಲ್ಲ  / No</option>
			</select>-->
			
			
		</td>
	</tr>
	<tr id="divd3">
		<td><label><span class="bluemark">CI 2.5</span> ಜನನ ದಾಖಲಾತಿ ಮಾಡಿಸದಿದ್ದಲ್ಲಿ , ಕಾರಣ ? / If the Birth is not registered, reasons</label></td>
		<td>
		<select id="txtbnreg" name="txtbnreg" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Not aware of it">Not aware of it/ ಗೊತ್ತಿರಲಿಲ್ಲ</option>
				<option value="Too late">Too late/ತಡವಾಗಿತ್ತು </option>
				<option value="Asked for fee">Asked for fee/ಶುಲ್ಕ ಕೇಳಿದರು</option>
				<option value="Applied not received">Applied not received/ ಅರ್ಜಿ ಕೊಟ್ಟಿದ್ದೇವೆ ಪಡೆದಿಲ್ಲ</option>
				<option value="Felt not needed">Felt not needed/  ಅಗತ್ಯವೆನಿಸಿಲ್ಲ </option>
			</select></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.6</span> ಅಂಗನವಾಡಿಯಿಂದ ಪೌಷ್ಟಿಕಾಂಶದ ಆಹಾರ ದೊರಕಿತ್ತೆ  / Received / Receiving Nutricious food from Anganawadi</label></td>
		<td>			
			<input type="radio" id="radrecnut" name="radrecnut" value="Yes" /> ಹೌದು / Yes &nbsp;
			<input type="radio" id="radrecnut" name="radrecnut" value="No" /> ಇಲ್ಲ / No 
		</td>
	</tr>
	<tr> 
		<td><label><span class="bluemark">CI 2.7</span>ಗರ್ಭಾವದಿ  / Pregnancy Period <span class="required">*</span></label></td>
		<td>
			<select id="ddlpperiod" name="ddlpperiod" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Normal">ಸಹಜ  / Normal</option>
				<option value="Premature 8th Month">ಎಂಟು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ  ಮಗು  / Premature 8th Month</option>
				<option value="Premature 7th Month">ಏಳು ತಿಂಗಳಿಗೆ ಹುಟ್ಟಿದ ಮಗು  / Premature 7th Month</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.8</span> ಈ ಮಗುವಿನ ಹೆರಿಗೆಯಾದ ಸ್ಥಳ  / Place of Delivery of the child</label></td>
		<td>
			<select id="ddldplace" name="ddldplace" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Home">ಮನೆ  / Home</option>
				<option value="Hospital">ಆಸ್ಪತ್ರೆ  / Hospital</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr id="divdass">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.9</span> ಹೆರಿಗೆಗೆ ಸಹಾಯ ಮಾಡಿದವರು / Delivery assisted by:</label></td>
		<td>
			<select id="ddldass" name="ddldass" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Dayi">ದಾದಿ  / Dayi</option>
				<option value="ANM">ಆರೋಗ್ಯ ಸಹಾಯಕಿ / ANM</option>
				<option value="Doctor">ವೈದ್ಯರು  / Doctor</option>
				<option value="Others">  ಇತರೆ  / Others</option>
			</select>
		</td>
	</tr>	
	<tr id="divhdist">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI 2.10</span> ಆಸ್ಪತ್ರೆ  ಹೆರಿಗೆಯಾಗಿದ್ದಲ್ಲಿ, ನಿಮ್ಮ ನಿವಾಸದಿಂದ ಎಷ್ಟು ದೂರ  / If hospital,distance from your residence</label></td>
		<td>
			<select id="txthdist" name="txthdist" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ /  Select --</option>
				<option value="0-5 km">0-5 ಕಿ.ಮಿ /0-5 km</option>
				<option value="5-10 km">5-10 ಕಿ.ಮಿ / 5-10 km</option>
				<option value="15-20 km">15-20 ಕಿ.ಮಿ /15-20 km</option>
				<option value="20-30 km">20-30 ಕಿ.ಮಿ /20-30 km</option>
				<option value="more than 30 km">30  ಕಿ.ಮಿ ಹೆಚ್ಚು /More than 30 Km</option>
			</select>
		</td>
	</tr>	
	<tr id="div4">
		<td><label><span class="bluemark">CI 2.11</span> ಆಸ್ಪತ್ರೆಯ ವಿಧ / Type of Hospital <span></span></label></td>
		<td>
			<select id="ddlhtype" name="ddlhtype" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Government">ಸರ್ಕಾರಿ  / Government</option>
				<option value="Private">ಖಾಸಗಿ / Private</option>
				<option value="NGO">ಸ್ವಯಂ ಸೇವಾ ಸಂಸ್ಥೆ / NGO</option>
				<option value="Others">ಇತರೆ  / Others</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.12</span> ಹೆರಿಗೆಗಾಗಿ ನೀವು ನೀಡಿದ ಸೇವಾ ಶುಲ್ಕ / Amount Paid for Delivery</label></td>
		<td><input type="text" id="txtamntpaid" name="txtamntpaid" /> Rs.</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.13</span> ಹೆರಿಗೆಯ ವಿಧಾನ  / Delivery Type <span class="required">*</span></label></td>
		<td>
			<select id="ddldtype" name="ddldtype" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Simple">ಸರಳ / Simple</option>
				<option value="Caesarean">ಶಸ್ತ್ರ ಕ್ರಿಯೆ / Caesarean</option>
				<option value="Forceps">ಫೋರ್ಸೆಪ್ಸ್ ನಿಂದ / Forceps</option>
				<option value="Difficult">ಕಷ್ಟಕರ ಹೆರಿಗೆ  / Difficult</option>
			</select>
		</td>
	</tr>
	<tr id="div5">
		<td><label><span class="bluemark">CI 2.14</span> ಹೆರಿಗೆಯು ಕಷ್ಟಕರವಾಗಿದ್ದಲ್ಲಿ ವಿವರಸಿ / If delivery was difficult explain</label></td>
		<td>		
		<select id="txtdelexp" name="txtdelexp" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Minor Pregnancy">Minor Pregnancy/ವರ್ಷದೊಳಗಿನ ಬಸಿರು </option>
				<option value="Weak Mother">Weak Mother /ತಾಯಿಯ ನಿಶ್ಯಕ್ತಿ  </option>
				<option value="Improper position of child">Improper position of child/ ಹೊಟ್ಟೆಯಲ್ಲಿ ಮಗು ತಿರುಗಿಕೊಂಡಿರುವುದು</option>
				<option value="Bleeding after dlivery">Bleeding after dlivery/ ಹೆರಿಗೆ ನಂತರದ ತೀರ್ವ ರಕ್ತ ಸ್ರಾವ, ತಡವಾದ ಹೆರಿಗೆ</option>
				<option value="Late delivery">Late delivery</option>
				<option value="Still Birth">Still Birth/ಹೊಟ್ಟೆಯಲ್ಲಿ ಮಗು ತೀರಿಕೊಂಡಿತ್ತು</option>
			</select>


		
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI 2.15</span> ಹೆರಿಗೆಯ ಸಂಖ್ಯೆ  / Delivery Number</label></td>
		<td><input type="text" id="txtdelnum" name="txtdelnum" onkeyup="maxcharacters();"/></td>
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