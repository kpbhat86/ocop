<?php if ($change_pwd){ ?>
<div class="jqmWindow jqmWindowShow warning" id="change_pwd_notification">
	<p><?=lang('warn_change_default_pwd', $this->config->item('default_pwd', 'fuel'))?></p>

	<div class="buttonbar" id="yes_no_modal" style="width: 400px;">
		<ul>
			<li class="end"><a href="#" class="ico ico_no jqmClose" id="change_pwd_cancel"><?=lang('dashboard_change_pwd_later')?></a></li>
			<li class="end"><a href="<?=fuel_url('my_profile/edit/')?>" class="ico ico_yes" id="change_pwd_go"><?=lang('dashboard_change_pwd')?></a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
<?php } ?>

<div id="main_top_panel">
	<h2 class="ico ico_tools_dashboard"><?=lang('section_dashboard')?></h2>
</div>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
  $(document).ready(function() {
      	  $("#jDash").jDashboard({ columns: 2 });
          
      });
</script>
<div align="center">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<td rowspan="2">&nbsp;</td>
<td align="center">

</td>

<td rowspan="2">&nbsp;</td>
</tr>
<tr>
<td width="910px" align="center">



<div class="jdash-item">
		<h1 class="jdash-head"></h1>
		<div class="jdash-body">
			<div>
			<table id="data_table" class="data" cellspacing="0" cellpadding="0">
			<thead>
			<tr>
				<th>Total number of Household Entry</th>
				<th>Total number of childrens</th>
			</tr>
			</thead>
			<tbody>
			<?php if(!empty($household)){ ?>
			<?php foreach($household as $householdentry){ ?>
			<tr>
				<td><?php echo $householdentry->household_entry; ?></td>
				<td><?php echo $householdentry->tot_no_childrns; ?></td>
			</tr>
			<?php } ?>
			<? }else { ?>
			<tr>
				<td colspan="4">
					<b>No Record Present!</b>					
					<div>
						<a class="ico ico_inward" href="<?=fuel_url('inward')?>">Click here to Check Inward Registry.</a>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
			</table>
			</div>
		</div>
	</div>





	
	
	
	
<div id="jDash">
	

	<div class="jdash-item" style="width:910px !important;">
		<h1 class="jdash-head">ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ </h1>
		<div class="jdash-body">
		<span style="color:#0000FF ;"><h2> ಮಕ್ಕಳ ಅನುಸರಣಾ ವ್ಯವಸ್ತೆ ಏಂದರೀನು? &nbsp; </span></br> <span style="color:#8A0808;">
ಮಕ್ಕಳ ಅನುಸರಣಾ ವ್ಯವಸ್ಥೆ ಒಂದು ನಿರಂತರ ಪ್ರಕ್ರಿಯೆ. ಇದು ವಾರ್ಡ್‍ / ಹಳ್ಳಿ (ಗ್ರಾಮ), ಪಂಚಾಯತ್, ನಗರದ ವಾರ್ಡ್ ಗಳಲ್ಲಿ ಹುಟ್ಟಿನಿಂದ 18 ವರ್ಷದವರೆಗಿನ ಮಕ್ಕಳ ಪರಿಸ್ಥಿತಿಯನ್ನು ಅರ್ಥಮಾಡಿಕೊಳ್ಳಲು ನೆರವಾಗುತ್ತದೆ. ಒಂದು ರೀತಿಯಲ್ಲಿ ‘ನಮ್ಮ ಮಕ್ಕಳು ನಮ್ಮ ಪ್ರಗತಿ’ ತಳಮಟ್ಟದಿಂದ ಆರಂಭವಾಗುವ ಮಕ್ಕಳ ಸಮಗ್ರ ಮಾಹಿತಿಯ ಸಂಗ್ರಹ ಮತ್ತು ವಿಶ್ಲೇಷಣೆಯಾಗಿದೆ. 
* ಜನ್ಮ ದಾಖಲಾತಿ, ರೋಗ ನಿರೋಧಕ ಲಸಿಕೆಗಳನ್ನು ಮಕ್ಕಳಿಗೆ ನೀಡಿರುವುದು, ಶಾಲಾ ದಾಖಲಾತಿ, ಆರೋಗ್ಯ ಸ್ಥಿತಿಗತಿ, ವಿವಾಹ, ಅನಾಥ ಅಥವಾ ನಿರಾಶ್ರಿತರು, ಮಕ್ಕಳು ಎತ್ತ ಹೋಗಿದ್ದಾರೆ (ಪೋಷಕರೊಡನೆ / ಸ್ವಂತವಾಗಿ ಮಕ್ಕಳ ವಲಸೆ, ಸಾಗಣೆ, ಕಾಣೆಯಾದ ಮತ್ತು ಓಡಿಹೋದ ಮಕ್ಕಳು, ಬಾಲಕಾರ್ಮಿಕರಾಗಿರುವವರು, ಶಾಲೆ ಬಿಟ್ಟವರು), ಇತ್ಯಾದಿ. 
ಮಕ್ಕಳ ಅನುಸರಣಾ ವ್ಯವಸ್ಥೆಯು ಗ್ರಾಮ, ಪಂಚಾಯಿತಿ, ತಾಲೂಕು, ಜಿಲ್ಲೆ ಮತ್ತು ರಾಜ್ಯಗಳ ಮಟ್ಟದಲ್ಲಿ ಮಕ್ಕಳ ಚಲನವಲನಗಳನ್ನು ಮತ್ತು ಸ್ಥಿತಿಯನ್ನು ಗಮನಿಸುವ ಮತ್ತು ಆ ಗಮನಿಸುವಿಕೆಯಿಂದ ಮಕ್ಕಳನ್ನು ಕುಟುಂಬಳಲ್ಲೇ ಇರಿಸಿ ರಕ್ಷಿಸುವುದು ಅಥವಾ ಕುಟುಂಬದಿಂದ ಬೇರ್ಪಟ್ಟ ಮಕ್ಕಳನ್ನು ಗುರುತಿಸಿ ರಕ್ಷಿಸುವುದು ಅಥವಾ ಯಾವುದೇ ರೀತಿಯ ತೊಂದರೆ, ಅತಂತ್ರದಲ್ಲಿರುವ ಮಕ್ಕಳನ್ನು ಗುರುತಿಸಿ ಅವರಿಗೆ ಬೇಕಾದ ಸೌಲಭ್ಯಗಳನ್ನು ಸ್ಥಳೀಯ ಮಟ್ಟದಲ್ಲಿ ದೊರಕಿಸಲು ನೆರವಾಗುವ ಮಾಹಿತಿ ಸಂಗ್ರಹ ಮತ್ತು ವಿಶ್ಲೇಷಣಾ ವ್ಯವಸ್ಥೆಯಾಗಿದೆ. 
ಹಳ್ಳಿಯಿಂದ ರಾಜ್ಯ ಮಟ್ಟದವರೆಗೆ ಮಕ್ಕಳನ್ನು, ಮಕ್ಕಳ ಸ್ನೇಹೀ ದೃಷ್ಟಿಕೋನದಿಂದ ಗಮನಿಸಲು ಸರ್ಕಾರ ಮತ್ತು ಸ್ವಯಂಸೇವಾ ಸಂಸ್ಥೆಗಳನ್ನು ಸಮರ್ಥರನ್ನಾಗಿಸುವುದು (ಅಥವಾ ಅವುಗಳಿಗೆ ಸಹಾಯ ಮಾಡುವುದು) ಇಂದಿನ ದೊಡ್ಡ ಅಗತ್ಯವಾಗಿದ  </h2>
</span>	
<span style="color:#0000FF ;"><h1>To know more details for OCOP web portal. Please click on the following link
<a href="http://rdpr.kar.nic.in/" target="_blank"> RDPR </a> and <a href="http://stg2.kar.nic.in/gpportal" target="_blank"> GP Portal </a>

</h1>
</span>	
		</div>
	</div>
						
</div>
</td>
</tr>

</table>
</div>
<!-- Code Added By Gaurav - 25th April 2012 -->