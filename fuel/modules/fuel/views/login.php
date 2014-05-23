<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
 	<title><?=$page_title?></title>
	<?=css('login', FUEL_FOLDER)?>
	<script type="text/javascript">
	<?=$this->load->module_view('fuel', '_blocks/fuel_header_jqx', array(), true)?>
	</script>
	<?=js('jquery/jquery', FUEL_FOLDER)?>
	<?=js('jqx/jqx', FUEL_FOLDER)?>
	<script type="text/javascript">
		jqx.addPreload('fuel.controller.BaseFuelController');
		jqx.init('fuel.controller.LoginController', {});
	</script>
</head>


<div>
<div align="center" width="100%" border="1">
<div id="ico_topbg"width="100%" ></div>
  <table width="100%" border="0" cellpadding="5px" cellspacing="0px">
  <TR><TD COLSPAN="5">&nbsp;</TD></TR>
<tr>
<td ROWSPAN="3" align="center"><div id="ico_karmap"></div></td>
<td align="center"><div id="Picture10"></div></td>
<td align="center"><span  align="center" style="font-size:18pt; padding-left:25px;"></span></td>
<td align="center"><div id="Picture9"></div></td>
<td ROWSPAN="3" align="center"><div id="login">

	<div id="login_inner">
		<?php if (!empty($instructions)) : ?>
		<p><?=$instructions?></p>
		<?php endif; ?>
		<?=$form?>
	</div>	
	<div id="login_notification" class="notification">
			<?=$notifications?>
	</div>
	<div id="settingdiv">
	<div id="leftpanel" align="left">	
	</div>
	<div id="rightpanel" align="right">	
	
	</div>
	</div>
	<div id="login_footer">
		<div align="center"><span style="color:#000;">Copyright &copy; 2013 <a href="http://www.hooduku.com" target="_blank"><span style="color:blue;">Hooduku Inc</span></a>. All Rights Reserved.</span></div>
	</div>
</div></td>
</tr>



<tr>
<td colspan="3"><div align="center" style="padding-top:30px;">
            	   <div id="Picture12"></div><span  align="center" style="font-size:18pt; padding-left:25px; padding-bottom:15px;">ಮತ್ತು</span><div id="Picture13"></div></div></td>
</tr>

<tr>
</tr>
</table>
		
		<div align="center"> <h2>To know more about OCOP web portal, Please click on the following link <a href="http://stg2.kar.nic.in/gpportal/" target="_blank"><span style="font-size:20px;color:red;">Click here</a></span>&nbsp;&nbsp;</div>
		
        <table width="100%">
		<tr><td>&nbsp;</td></tr>
            <tr>
 <td style="padding-left:20px;"><div id="Picture1"></div></td>
<td  style="padding-left:20px;"><div id="Picture5"></div></td>
<td  style="padding-left:20px;"><div id="Picture6"></div></td>
 <td  style="padding-left:20px;"><h1>IT Support by:</h1></td>
 <td  style="padding-left:20px;"><div id="Picture8"></div></td>  
  </tr></table>
  
  
  
  
  </div>
  
    </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  




</html>