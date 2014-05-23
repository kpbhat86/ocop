<div id="main_content_inner">
<p class="instructions"><b>ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ -ಮಗುವಿನ ಮಾಹಿತಿ - ಹಂತ 1 / OCOP Child's Info Step1:</b>ಸಾಮಾನ್ಯ ಮಾಹಿತಿ  / General Info</p>
<form id="generalinfofrm" name="generalinfofrm" method="post" action="">
	<table width="100%" cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td width="65%" class="label"><label><span class="bluemark">CI1.0</span>  ಕುಟುಂಬದ  ಗುರುತು ಸಂಖ್ಯೆ / Household ID ( ಚುನಾವಣಾ ಗುರುತಿನ ಚೀಟಿ / Voter Card Id, ಪಾನ್ ಕಾರ್ಡ್ / Pan Card, ವಾಹನ ಚಾಲನಾ ಪರವಾನಗಿ / Driving License ಅಥವಾ / or ಇತರೆ  / etc) <span class="required">*</span></label></td>
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
		<td class="label"><label><span class="bluemark">CI1.0</span> ಮಗುವಿನ ಹೆಸರು / Name of the Child <span class="required">*</span></label></td>
		<td class="value">
			<select id="ddlchildname" name="ddlchildname" style="min-width:175px;">
			</select>
			<a onClick="childinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.1</span> ಹೆಸರು  / Name <span class="required">*</span></label></td>
		<td><input type="text" id="txtname" name="txtname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.2</span> ಜನ್ಮ ದಿನಾಂಕ / Date of Birth <span class="required">*</span></label></td>
		<td>		
			<input type="text" id="txtdob" name="txtdob" />
			<script type="text/javascript">
				$(txtdob).datepick({dateFormat: 'dd/mm/yyyy'});
			</script>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.3</span> ಲಿಂಗ / Gender <span class="required">*</span></label></td>
		<td>
			<select id="ddlgender" name="ddlgender" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="1" >ಗಂಡು  / Male</option>
				<option value="2" > ಹೆಣ್ಣು / Female</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.4</span> ತಂದೆ ಹೆಸರು / Father's Name <span class="required"></span></label></td>
		<td><input type="text" id="txtfname" name="txtfname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.5</span> ತಾಯಿಯ ಹೆಸರು / Mother's Name <span class="required">*</span></label></td>
		<td><input type="text" id="txtmname" name="txtmname" /></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.6</span> ಪ್ರಸಕ್ತ ವಿಳಾಸ / Present Address <span class="required">*</span></label></td>
		<td><input type="text" id="txtpreaddr" name="txtpreaddr" /></td>
	</tr>
	<tr><td><td><a href="javascript:sync();"><span class="bluemark">Copy Same as Above</span></a></td></td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.7</span> ಖಾಯಂ ವಿಳಾಸ / Permanent Address</label></td>
		<td>
			<input type="text" id="txtperaddr" name="txtperaddr" />
		</td>
	</tr>
		<tr>
		<td><label><span class="bluemark">CI1.8</span> ಮಗು ಯಾರೊಡನೆ ವಾಸುತ್ತಿರುವುದು / Child living with <span class="required">*</span></label></td>
		<td>
			<select id="ddlcliving" name="ddlcliving" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="None">ಯಾರು ಇಲ್ಲ  / None</option>
				<option value="Parents">ಹೆತ್ತವರು  / Parents</option>
				<option value="Mother">ತಾಯಿ / Mother</option>
				<option value="Father">ತಂದೆ / Father</option>
				<option value="Brother">ಅಣ್ಣ-ತಮ್ಮ / Brother</option>
				<option value="Sister">ಅಕ್ಕ-ತಂಗಿ / Sister</option>
				<option value="Uncle">ಚಿಕ್ಕಪ್ಪ-ಮಾವ   / Uncle</option>
				<option value="Anut">ಚಿಕ್ಕಮ್ಮ -ಅತ್ತೆ  / Anut</option>
				<option value="Cousin Brother">ಚಿಕ್ಕಪ್ಪನ  ಮಗ Cousin Brother</option>
				<option value="Cousin Sister">ಚಿಕ್ಕಪ್ಪನ ಮಗಳು   / Cousin Sister</option>
				<option value="Grand Mother">ಅಜ್ಜಿ  / Grand Mother</option>
				<option value="Grand Father">ತಾತ / Grand Father</option>
				<option value="Great Grand Mother">ಮುತ್ತಜ್ಜಿ   / Great Grand Mother</option>
				<option value="Great Grand Father">ಮುತ್ತಜ್ಜ  / Great Grand Father</option>
				<option value="Neighbour">ಅಕ್ಕ ಪಕ್ಕದವರು  / Neighbour</option>
				<option value="Friend">ಸ್ನೇಹಿತರು   / Friend</option>
				<option value="Ashram">ಆಶ್ರಮ  / Ashram</option>
				<option value="Hostel">ವಸತಿ ನಿಲಯ  / Hostel</option>
				<option value="Goverment Homes"> ಸರ್ಕಾರಿ ಬಾಲಮಂದಿರ   / Goverment Homes</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.9</span> ಮಗು  ಅನಾಥ  - ಅರೆ ಅನಾಥವೇ? /  Is the child is Orphan/Semi-Orphan?</label></td>
		<td>
			<select id="ddlcorphan" name="ddlcorphan" style="min-width:175px;">
				<option value="" >-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Yes" >ಹೌದು / Yes</option>
				<option value="No" >ಇಲ್ಲ  / No</option>
			</select>
		</td>
	</tr>	
	<tr id="divorphan1">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI1.10</span> ಮಗು ಅನಾಥವಾಗಿದ್ದರೆ / If the child is Orphan</label></td>
		<td>
			<select id="ddlcorphany" name="ddlcorphany" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="None">ಯಾರು ಇಲ್ಲ / None</option>
				<option value="No Mother">ತಾಯಿ  ಇಲ್ಲ / No Mother</option>
				<option value="No Father">ತಂದೆ  ಇಲ್ಲ / No Father</option>
				<option value="No Parents">ಹೆತ್ತವರು  ಇಲ್ಲ /   No Parents</option>
			</select>
		</td>
	</tr>	
	<tr id="divorphan2">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI1.11</span> ಯಾವಾಗಿನಿಂದ ಅನಾಥ? ಸ್ವಂತ ಮಗುವಾಗಿದ್ದಲ್ಲಿ ಈ ಪ್ರಶ್ನೆ ಕೇಳಬೇಡಿ  / Orphan since from? If child is own don't ask this question</label></td>
		<td>
			
			
			<select id="txtorphansince" name="txtorphansince" style="min-width:175px;"> yrs/ ವರ್ಷ
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
			</select>
			
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.12</span> ದತ್ತು ಮಗುವೆ? ಅಥವಾ ಸಾಕಿಕೊಂಡಿರುವ ಮಗುವೇ? / ಸ್ವಂತ ಮಗುವಾಗಿದ್ದಲ್ಲಿ ಈ ಪ್ರಶ್ನೆ ಕೇಳಬೇಡಿ / Adopted child or just looking after? If child is own don't ask this question ,Looking after / ನೋಡಿಕೊಳ್ಳುತ್ತಿರುವುದು,  Faster care/ ಸಾಕಿಕೊಂಡಿರುವುದು</label></td>
		<td>
			<select id="txtadoptedchild" name="txtadoptedchild" style="min-width:175px;">
			<option value="">-- ಆಯ್ಕೆಮಾಡಿ / Select --</option>
				<option value="Looking after">Looking after /ನೋಡಿಕೊಳ್ಳುತ್ತಿರುವುದು</option>
				<option value="Faster care">Faster care/ ಸಾಕಿಕೊಂಡಿರುವುದು</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.13</span> ಧರ್ಮ / Religion <span class="required">*</span></label></td>
		<td>
			<select id="ddlreligion" name="ddlreligion" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ   / Select --</option>
				<option value="Hindu">ಹಿಂದು  / Hindu</option>
				<option value="Muslim">ಮುಸ್ಲಿಂ  /  Muslim</option>
				<option value="Christian">ಕ್ರಿಶ್ಚಿಯನ್   / Christian</option>
				<option value="Christian">ಜೈನ್  / Jain</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.14</span> ಜಾತಿ / Caste <span class="required">*</span></label></td>
		<td>
			<select id="ddlcaste" name="ddlcaste" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="SC">ಪರಿಶಿಷ್ಟ ಜಾತಿ / SC</option>
				<option value="ST">ಪರಿಶಿಷ್ಟ   ಪಂಗಡ / ST</option>
				<option value="OBC">ಇತರೆ ಹಿಂದುಳಿದ ವರ್ಗ / OBC</option>
				<option value="Other">ಇತರೆ  / Other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label><span class="bluemark">CI1.15</span> ಪಡಿತರ ಚೀಟಿಯಲ್ಲಿ ಹೆಸರು ಸೇರಿಸಿದೆಯೇ ?  / Name in Ration Card <span class="required">*</span></label></td>
		<td>
			<select id="ddlration" name="ddlration" style="width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="Yes">ಹೌದು  / Yes</option>
				<option value="No">ಇಲ್ಲ್ಲ / No</option>
				<option value="Not Applicable">ಅನ್ವಯಿಸುವುದಿಲ್ಲ  / Not Applicable</option>
			</select>
		</td>
	</tr>	
	<tr id="divration">
		<td style="background:#d6d7d6; padding-left:25px;"><label><span class="bluemark">CI1.16</span> ಹೌದಾದರೆ,ಪಡಿತರ ಚೀಟಿಯ ವಿಧ   / If yes, type of the ration card</label></td>
		<td>
			<select id="ddlrationtype" name="ddlrationtype" style="min-width:175px;">
				<option value="">-- ಆಯ್ಕೆಮಾಡಿ  / Select --</option>
				<option value="APL">ಎಪಿಎಲ್  / APL</option>
				<option value="BPL">ಬಿಪಿಎಲ್   / BPL</option>
				<option value="Anthyodaya">ಅಂತ್ಯೋದಯ  / Anthyodaya</option>
			</select>
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