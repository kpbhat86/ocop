<div id="main_content_inner">
<p class="instructions"><b>ಮರಣಕ್ಕೆ ಸಂಬಂಧಪಟ್ಟ ಪ್ರಶ್ನಾವಾಳಿ - ಹಂತ 4 / Death Related Questionnaire(DRQ) Step4:</b> <b style="color:#41A0CF;">ರೋಗ ನಿರೋಧಕ / Immunization</b></p>
<form id="currentdetailsfrm" name="currentdetailsfrm" method="post" action="">
	<table cellpadding="0" cellspacing="10" border="0" width="100%">
	<tr>
		<td class="label" style="border:0px !important"><label><span class="bluemark">CD2.10</span>ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ /   Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ  / or ಇತರೆ  / etc)</label></td>
		<td class="value" style="border:0px !important">
			<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" /> 
			<div class="suggestionsBox" id="suggestions" style="display: none;"> 
				<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
				<div class="suggestionList" id="suggestionsList"></div>
			</div>
			<a onClick="childname();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td class="label"><label><span class="bluemark">CD2.10</span>ಮಗುವಿನ ಹೆಸರು  / Name of the Child<span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
		</td>
	</tr>
	<tr>
		<td class="label" style="border:0px !important"><label><span class="bluemark">CD2.19</span>ರೋಗ ನಿರೋಧಕ ಮಾಹಿತಿ ಕಾರ್ಡ್ ಲಭ್ಯವಿದೆಯೇ /  Is Immunization details card available?</label></td>
		<td class="value" style="border:0px !important">
			<select id="ddlimmunization" name="ddlimmunization" style="min-width:218px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ /  Select --</option>
				<option value="Yes"> ಹೌದು /  Yes</option>
				<option value="No"> ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.20(A)</span> ಬಿಸಿಜಿ ಮತ್ತು ಒಪಿವಿ 1 / BCG and OPV1</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>1.1/2 ತಿಂಗಳು /  1.1/2 Months</center>
		</td>
		<td style="border:0px !important">
		<select id="ddlbcgandopv_drq" name="ddlbcgandopv_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.20(B)</span>ಹೆಪಟೈಟಿಸ್ ಬಿ 1 / Hepatities B1</label></td>
		<td style="border:0px !important">		
			<select id="ddlhpatities1_drq" name="ddlhpatities_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.20(C)</span>ಡಿಪಿಟಿ 1 ಮತ್ತು ಓಪಿವಿ 2  / DPT1 and OPV2</label></td>
		<td style="border:0px !important">
			<select id="ddldptandopv_drq" name="ddldptandopv_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.21(A)</span>ಹೆಪಟೈಟಿಸ್ ಬಿ 2 / Hepatities B2<</label></td>
		<td rowspan="2" style="background:#d6d7d6;">
			<center>2.1/2 ತಿಂಗಳು /  2.1/2 Months</center>
		</td>
		<td style="border:0px !important">
			<select id="ddlhpatities2_drq" name="ddlhpatities2_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.21(B)</span>ಡಿಪಿಟಿ 2 ಮತ್ತು ಓಪಿವಿ 3 / DPT2 and OPV3</label></td>
		<td style="border:0px !important">			
			<select id="ddldpv2andopv3_drq" name="ddldpv2andopv3_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.22(A)</span>ಡಿಪಿಟಿ 3 ಮತ್ತು ಓಪಿವಿ 4 / DPT3 and OPV4</label></td>
		<td rowspan="2" style="background:#d6d7d6;">
			<center>3.1/2 ತಿಂಗಳು /  3.1/2 Months<center>
		</td>
		<td style="border:0px !important">
			<select id="ddldpv3andopv4_drq" name="ddldpv3andopv4_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.22(B)</span> ಹೆಪಟೈಟಿಸ್ ಬಿ 3 / Hepatities B3</label></td>
		<td style="border:0px !important">
			<select id="ddlhepatitiesB3_drq" name="ddlhepatitiesB3_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.23(A)</span>ಮೀಸಲ್ಸ್ ಮತ್ತು ಓಪಿವಿ 5 / Measles and OPV5</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>9 ತಿಂಗಳು /  9 Months<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlmeaslesandopv5_drq" name="ddldpv2andopv3_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.23(B)</span>ಎಂ.ಎಂ.ಆರ್. / MMR</label></td>
		<td style="border:0px !important">
			<select id="ddlmmr_drq" name="ddlmmr_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.23(C)</span>ಬೂಸ್ಟರ್ 1/  Booster 1</label></td>
		<td style="border:0px !important">
			<select id="ddlbooster1_drq" name="ddlbooster1_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
        <tr>
		<td><label><span class="bluemark">CD2.24(A)</span>ಟೈಫಾಯ್ಡ್ / Typhoid</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>16-24 ತಿಂಗಳು /  16-24 Months<center>
		</td>
		<td style="border:0px !important">
			<select id="ddltyphoid_drq" name="ddltyphoid_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.24(B)</span>ಬೂಸ್ಟರ್ 2 / Booster 2</label></td>
		<td style="border:0px !important">
			<select id="ddlbooster2_drq" name="ddlbooster2_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.24(C)</span>ಟಿಟಿ 1 /  Tetanus Toxid 1</label></td>
		<td style="border:0px !important">
			<select id="ddltetanustoxid1_drq" name="ddltetanustoxid1_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	        <tr>
		<td><label><span class="bluemark">CD2.25(A)</span>ಟಿಟಿ 2 /  Tetanus Toxide 2</label></td>
		<td rowspan="4" style="background:#d6d7d6;">
			<center>2-6 ವರ್ಷ /  2-6 Years<center>
		</td>
		<td style="border:0px !important">
			<select id="ddltetanustoxide2_drq" name="ddltyphoid_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.25(B)</span>ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್  1 / HiB Meningitis 1</label></td>
		<td style="border:0px !important">
			<select id="ddlhib1_drq" name="ddlhib1_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.25(C)</span>ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್  2 / HiB Meningitis 2</label></td>
		<td style="border:0px !important">
			<select id="ddlhib2_drq" name="ddlhib2_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.25(D)</span>ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್  3 / HiB Meningitis 3</label></td>
		<td style="border:0px !important">
			<select id="ddlhib3_drq" name="ddlhib3_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.26(A)</span> ಹೆಚ್.ಐ.ಬಿ ಮೆನಿನ್ ಜೈಟಿಸ್  ಬೂಸ್ಟರ್ /  HiB Meningitis Booster</label></td>
		<td rowspan="3" style="background:#d6d7d6;">
			<center>6-14 Years<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlhibbooster_drq" name="ddlhibbooster_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.26(B)</span>ಹೆಪಟೈಟಿಸ್ ಎ 1 /  Hepatitis A 1</label></td>
		<td style="border:0px !important">
			<select id="ddlhepa1_drq" name="ddlhepa1_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.26(C)</span>ಹೆಪಟೈಟಿಸ್ ಎ 2 /  Hepatitis A 2</label></td>
		<td style="border:0px !important">
			<select id="ddlhepa2_drq" name="ddlhepa2_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.27</span> ಬೂಸ್ಟರ್  3 /  Booster 3</label></td>
		<td rowspan="1" style="background:#d6d7d6;">
			<center>14-18 Years<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlhepa2_drq" name="ddlhepa2_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr> 
		<td><label><span class="bluemark">CD2.28</span>ವಿಟಮಿನ್ ಎ / Vitamin A</label></td>
		<td rowspan="2" style="background:#d6d7d6;">
			<center>Any Age<center>
		</td>
		<td style="border:0px !important">
			<select id="ddlvita_drq" name="ddlvita_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CD2.29</span>ಚಿಕನ್ ಫಾಕ್ಸ್ ಲಸಿಕೆ (ದಡಾರ) / Chicken Pox vaccine</label></td>
		<td style="border:0px !important">
			<select id="ddlchicknpox_drq" name="ddlchicknpox_drq" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆ ಮಾಡಿ / Select --</option>				
				<option value="given">ಕೊಟ್ಟಿದೆ / Given</option>
				<option value="notgiven">ಕೊಟ್ಟಿಲ್ಲ / Not Given</option>
				<option value="dnr">ನೆನಪಿನಲ್ಲಿ ಇಲ್ಲ / Do Not Remember</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" style="border:0px !important"></td>
		<td class="actions" style="border:0px !important">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savecurrentdetails();">
		</td>
		
	</tr>
        <tr><td style="border:0px !important"><div id="check_bar"></div></td></tr>
	</table>
	
</form>
</div>
