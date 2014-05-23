<div id="main_content_inner">
<p class="instructions">CI 6.0 Protection</p>
<form id="updateinventory" method="post" action="">
	<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td><label>CI 6.1 Whether child is working?</label></td>
	<td>
			<input type="text" id="chld_death" name="chld_death" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
	</td>
	</tr>
		<tr>
		<td><label>CI 6.2 Work is full time or part time?</label></td>

		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	   </tr>
	<tr>
		<td><label>CI 6.3 Work Type</label></td>
		<td>
		
			<select id="ddlprocess" name="ddlprocess" style="min-width:175px;">
				<option value="">-- Select --</option>
				<option value="plus">Agriculture labour</option>
				<option value="division">Construction</option>
				<option value="multiple">Garage</option>
				<option value="minus">Bonded</option>
				<option value="multiple">Animal Rearing</option>
				<option value="minus">Other</option>
			</select>

		</td>
	</tr>
	<tr>
		<td><label>CI 6.4 Work for whom?</label></td>
			<td>
		
			<select id="ddlprocess" name="ddlprocess" style="min-width:175px;">
				<option value="">-- Select --</option>
				<option value="plus">Own</option>
				<option value="division">Relative</option>
				<option value="multiple">Other</option>
				
			</select>

		</td>
	</tr>
	<tr>
		<td><label>CI 6.5 Missing &nbsp;</label></td>
		<td>
			<select id="ddlprocess" name="ddlprocess" style="min-width:175px;">
				<option value="">-- Select --</option>
				<option value="plus">No</option>
				<option value="division">Yes</option>
				<option value="multiple">Not Applicable</option>
			</select>
		</td>
	</tr>
	
	<tr>
		<td><label>CI 6.6 Reason for missing</label></td>
		<td>
			<select id="ddlprocess" name="ddlprocess" style="min-width:175px;">
				<option value="">-- Select --</option>
				<option value="plus">Missing.</option>
				<option value="division">Traffic for labour</option>
				<option value="multiple">Traffic for flesh trade</option>
				<option value="multiple">Run away from home/other</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>CI 6.7 Missing Date</label></td>
		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	</tr>

	
	<tr>
		<td><label>CI 6.8 FIR Date &nbsp;</label></td>
	<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	</tr>
	<tr>
		<td><label>CI 6.9 Return Date &nbsp;</label></td>
		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	</tr>
	<tr>
		<td><label>CI 6.10 Marriage Date &nbsp;</label></td>
		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	</tr>
	<tr>
		<td><label>CI 6.11 Minor Pregnancy &nbsp;</label></td>
		<td>
			<input type="text" id="chld_death" name="chld_death" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
		</td>
	</tr>
		<tr>
		<td><label>CI 6.12 Devadasi Mother &nbsp;</label></td>
		<td>
			<input type="text" id="chld_death" name="chld_death" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
		</td>
	</tr>
		<tr>
		<td><label>CI 6.13 Is the child dedicated to Devadasi system &nbsp;</label></td>
		<td>
			<input type="text" id="chld_death" name="chld_death" value="Yes / No" onfocus="if (this.value=='Yes / No') {this.value = '';}" onblur="if(this.value=='') {this.value = 'Yes / No';}" /> 
		</td>
	</tr>	
	<tr>
		<td><label>CI 6.14 If yes what is the reason &nbsp;</label></td>
		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
		
	</tr>
	<tr>
		<td><label>CI 6.15 When the child was protected / rescued, </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;whether he / she produced before CWC?</label></td>
		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	</tr>
	<tr>
		<td><label>CI 6.16 If so, what kind of service the child got? &nbsp;</label></td>
		<td><input type="text" id="txtbqty" name="txtbqty" /></td>
	</tr>
	
	<tr><td>&nbsp;</td></tr>
	<tr>
		<td>&nbsp;</td>

		
		
		<td class="actions">
			<input id="" class="cancel" type="button" value="Cancel" name="" onClick="location.href='<?=fuel_url('inventory_adjustments')?>'">
			&nbsp;
			<input id="Save" class="cancel" type="button" value="Save" name="Save" onClick="updateinventory();">
		</td>
	</tr>
	<tr>
	
		<td class="value"><div id="check_bar">&nbsp;</div>
	</tr>
	</table>
</form>
</div>