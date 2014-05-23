<div id="main_content_inner">
<p class="instructions"><b>Death Related Questionnaire(DRQ) Step1:</b> Summary of Questionnaire</p>
<form id="generalinfofrm" name="generalinfofrm" method="post" action="">
	<div>  
		<table cellpadding="0" cellspacing="10" border="0">
			<tr>
				<td class="label" colspan="2"><label>Household ID (Voter Card Id, Pan Card, Driving License or etc)</label></td>
				<td class="value" colspan="2">
					<input type="text" id="txtvoterid" name="txtvoterid" onkeyup="suggest(this.value);" onblur="fill();" class="" /> 
					<a onClick="householdinfo();" style="cursor:pointer;" title="Go" id="go"><img src="<?=img_path('iconset/ico_go_btn.png') ?>" alt="Go" title="Go" border="0" /></a>
					<div class="suggestionsBox" id="suggestions" style="display: none;"> 
						<img src="<?=img_path('arrow.png') ?>" style="position: relative; top: -11px; left: 30px;" alt="upArrow" />
					<div class="suggestionList" id="suggestionsList"></div>
				</div>
				</td>
			</tr>
			<tr>
				<td>
					<label>Door No</label>
				</td>  
				<td>
					<input id="txtdoornum" name="txtdoornum" type="text" />
				</td>
				<td>&nbsp;</td>
				<td>
					<label>Date</label>
				</td>
				<td> 
					<input id="txtdate" name="txtdate" type="text" />
				</td>
			</tr>
			<tr>	
				<td>
					<label>Village</label>
				</td> 
				<td>
					<input id="txtvillage" name="txtvillage" type="text"/>
				</td>
				<td>&nbsp;</td>
				<td>
					<label>Grama Panchayat</label>
				</td> 
				<td>
					<input id="txtgrama" name="txtgrama" type="text" /> 
				</td>
			</tr>
			<tr>
				<td>
					<label>Taluk / Block</label>
				</td> 
				<td>
					<input id="txttaluk" name="txttaluk" type="text" /> 
				</td>
				<td>&nbsp;</td>
				<td>
					<label>District</label>
				</td>
				<td> 
					<input id="txtdistrict" name="txtdistrict" type="text" />
				</td>
			</tr>	
			<tr>
				<td>
					<label>Division</label>
				</td>  
				<td>
					<input id="txtdivison" name="txtdivison" type="text" >
				</td>
				<td>&nbsp;</td>
				<td>
					<label>Name of head of Family</label>
				</td>
				<td> 
					<input id="txtheadname" name="txtheadname" type="text" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Name of the Enumerator</label>
				</td>  
				<td>
					<input id="txtenum" name="txtenum" type="text" >
				</td>
				<td>&nbsp;</td>
				<td>
					<label>Name of the Respondant</label>
				</td>
				<td> 
					<input id="txtresp" name="txtresp" type="text" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Father's Death</label>
				</td>  
				<td>
					<select id="ddlfdeath" name="ddlfdeath" style="min-width:175px;">
						<option value="" >Select</option>
						<option value="Yes" >Yes</option>
						<option value="No" >No</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td>
					<label>Relationship with the Child</label>
				</td>
				<td> 
					<input id="txtrel" name="txtrel" type="text" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Child's Death</label>
				</td>  
				<td>
					<select id="ddlcdeath" name="ddlcdeath" style="min-width:175px;">
						<option value="" >Select</option>
						<option value="Yes" >Yes</option>
						<option value="No" >No</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="2">
					<div>
					<table style="background:#d6d7d7;" cellspacing="4">
						<tr>
						<td rowspan="2" valign="bottom"><label>No. of Child's Death</label></td>
						<td>&nbsp;</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><label>No. of Pre-Birth</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><label>No. of Post-Birth</label></td>
						</tr>
						<tr>
						<td><input id="txtnumchilddeath" name="txtnumchilddeath" type="text" style="width:100px;" /></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input id="txtnumprebirth" name="txtnumprebirth" type="text" /></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input id="txtnumpostbirth" name="txtnumpostbirth" type="text" /></td>
						</tr>
					</table>
					</div>
				</td>  
			</tr>
			<tr>
				<td>
					<label>Mother's Death</label>
				</td>  
				<td>
					<select id="ddlmdeath" name="ddlmdeath" style="min-width:175px;">
						<option value="" >Select</option>
						<option value="Yes" >Yes</option>
						<option value="No" >No</option>
					</select>
				</td>
				<td>&nbsp;</td>
				<td colspan="2">
					<div>
					<table style="background:#d6d7d7;" cellspacing="4">
						<tr>
						<td><label>During Pregnancy Period</label></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><label>General</label></td>
						</tr>
						<tr>
						<td><input id="txtpregnancyprd" name="txtpregnancyprd" type="text" /></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input id="txtgeneral" name="txtgeneral" type="text" /></td>
						</tr>
					</table>
					</div>
				</td>
			</tr> 
			<tr>
		<td>&nbsp;</td>

		
		
		<td class="actions" colspan="3">
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="savesummary();">
			<div id="check_bar">&nbsp;</div>
		</td>
	</tr>
		</table>
	</div>
</form>
</div>