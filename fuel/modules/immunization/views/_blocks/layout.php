<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ -ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 4 / OCOP Child's Info Step 4: </b>ರೋಗ ನಿರೋಧಕ / Immunization</p>
<form id="immunizationfrm" name="immunizationfrm" method="post" action="">
	<table  cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td class="label" style="border:0px !important"><label><span class="bluemark">CI4.0</span> ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ /  Household ID (ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ  / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್  / Pan Card, ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ / or ಇತರೆ / etc) <span class="required">*</span></label></td>
		<td class="value" style="border:0px !important">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" autocomplete="off" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label" style="border:0px !important"><label><span class="bluemark">CI4.0a</span> ಮಗುವಿನ ಹೆಸರು  / Name of the Child <span class="required">*</span></label></td>
		<td class="value" style="border:0px !important">
			<select id="ddlchildname" name="ddlchildname" style="width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.1</span> ಬಿಸಿಜಿ ಮತ್ತು ಓಪಿವಿ 1 / BCG and OPV1</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>1.1/2 ತಿಂಗಳು / 1.1/2 Months</center>
		</td>
		<td style="border:0px !important">
		<select id="ddlbcgandopv" name="ddlbcgandopv" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.2</span> ಹೆಪಟೈಟಿಸ್ ಬಿ 1  / Hepatities B1</label></td>
		<td style="border:0px !important">		
			<select id="ddlhpatities1" name="ddlhpatities" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.3</span> ಡಿಟಿಪಿ1 ಮತ್ತು ಓಪಿವಿ2  / DPT1 and OPV2</label></td>
		<td style="border:0px !important">
			<select id="ddldptandopv" name="ddldptandopv" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.4</span> ಹೆಪಟೈಟಿಸ್ ಬಿ 2  / Hepatities B2</label></td>
		<td rowspan="2" style="background:#d6d7d6;">
			<center>2.1/2 ತಿಂಗಳು / 2.1/2 Months</center>
		</td>
		<td style="border:0px !important">
			<select id="ddlhpatities2" name="ddlhpatities2" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.5</span> ಡಿಟಿಪಿ2 ಮತ್ತು ಓಪಿವಿ3 / DPT2 and OPV3</label></td>
		<td style="border:0px !important">			
			<select id="ddldpv2andopv3" name="ddldpv2andopv3" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.6</span> ಡಿಟಿಪಿ೩ ಮತ್ತು ಓಪಿವಿ೪ / DPT3 and OPV4</label></td>
		<td rowspan="2" style="background:#d6d7d6;">
			<center>3.1/2 ತಿಂಗಳು / 3.1/2 Months<center>
		</td>
		<td style="border:0px !important">
			<select id="ddldpv3andopv4" name="ddldpv3andopv4" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.7</span> ಹೆಪಟೈಟಿಸ್ ಬಿ3 / Hepatities B3</label></td>
		<td style="border:0px !important">
			<select id="ddlhepatitiesB3" name="ddlhepatitiesB3" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.8</span> ಮೀಸಲ್ಸ್ ಮತ್ತು ಓಪಿವಿ 5 / Measles and OPV5</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>9 ತಿಂಗಳು / 9 Months<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlmeaslesandopv5" name="ddldpv2andopv3" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.9</span> ಎಂ.ಎಂ.ಆರ್. / MMR</label></td>
		<td style="border:0px !important">
			<select id="ddlmmr" name="ddlmmr" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.10</span> ಬೂಸ್ಟರ್ 1  / Booster 1</label></td>
		<td style="border:0px !important">
			<select id="ddlbooster1" name="ddlbooster1" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
        <tr>
		<td><label><span class="bluemark">CI4.11</span> ಟೈಫಾಯ್ಫ್ / Typhoid</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>16-24 ತಿಂಗಳು / 16-24 Months<center>
		</td>
		<td style="border:0px !important">
			<select id="ddltyphoid" name="ddltyphoid" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.12</span> ಬೂಸ್ಟರ್ 2 / Booster 2</label></td>
		<td style="border:0px !important">
			<select id="ddlbooster2" name="ddlbooster2" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.13</span> ಟಿ.ಟಿ 1  / Tetanus Toxid 1</label></td>
		<td style="border:0px !important">
			<select id="ddltetanustoxid1" name="ddltetanustoxid1" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	        <tr>
		<td><label><span class="bluemark">CI4.14</span> ಟಿ.ಟಿ 2  / Tetanus Toxide 2</label></td>
		<td rowspan="4" style="background:#d6d7d6;">
			<center>2-6 ವರ್ಷ / 2-6 Years<center>
		</td>
		<td style="border:0px !important">
			<select id="ddltetanustoxide2" name="ddltyphoid" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.15</span> ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್  1  / HiB Meningitis 1</label></td>
		<td style="border:0px !important">
			<select id="ddlhib1" name="ddlhib1" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.16</span> ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್ 2  / HiB Meningitis 2</label></td>
		<td style="border:0px !important">
			<select id="ddlhib2" name="ddlhib2" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.17</span> ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್ 3  / HiB Meningitis 3</label></td>
		<td style="border:0px !important">
			<select id="ddlhib3" name="ddlhib3" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.18</span> ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್  ಬೂಸ್ಟರ್  / HiB Meningitis Booster</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>6-14 ವರ್ಷ / 6-14 Years<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlhibbooster" name="ddlhibbooster" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.19</span> i ಹೆಪಟೈಟಿಸ್ ಎ 1  / Hepatitis A 1</label></td>
		<td style="border:0px !important">
			<select id="ddlhepa1" name="ddlhepa1" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.20</span> ಹೆಪಟೈಟಿಸ್ ಎ  2  / Hepatitis A 2</label></td>
		<td style="border:0px !important">
			<select id="ddlhepa2" name="ddlhepa2" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.21</span> ವಿಟಮಿನ್ ಎ  / Vitamin A</label></td>
		<td rowspan="2" style="background:#d6d7d6;">
			<center>14-18 ವರ್ಷ / 14-18 Years<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlvita" name="ddlvita" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI4.22</span> ಚಿಕನ್ ಫಾಕ್ಸ್ ಲಸಿಕೆ  / Chicken Pox vaccine</label></td>
		<td style="border:0px !important">
			<select id="ddlchicknpox" name="ddlchicknpox" style="min-width:175px;">
				<option value="">--  ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" style="border:0px !important"></td>
		<td class="actions" style="border:0px !important">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="saveimmunization();">
		</td>
		
	</tr>
        <tr><td style="border:0px !important"><div id="check_bar"></div></td></tr>
	</table>
	
</form>
</div>
