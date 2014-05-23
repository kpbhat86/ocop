<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="<?php echo img_path();?>favicon.ico" type="image/x-icon"/>
 	<title><?=$page_title?></title>

	<?=css('datepicker, jqmodal, markitup, jquery.tooltip,jquery-ui, print,style,jquery.supercomboselect, jquery.treeview,easyui,icon, fuel, flexcrollstyles, minierp, jdash, json_table, autosuggest, jquery.datepick, jquery.autocom', 'fuel')?>

	<?php foreach($css as $c) : echo css($c); endforeach; ?>
	<script type="text/javascript">
		<?=$this->load->module_view(FUEL_FOLDER, '_blocks/fuel_header_jqx', array(), TRUE)?>
	</script>
	<?=js('jquery/jquery', 'fuel')?>
	<?=js('jquery/addrow', 'fuel')?>
	<?=js('jquery/jquery.datepick', 'fuel')?>
	<?=js('jquery/addrowit', 'fuel')?>
	<?=js('jquery/addrowhouse', 'fuel')?>
	<?=js('jquery/jquery-ui.min', 'fuel')?>
	<?=js('jquery/example', 'fuel')?>
	<?=js('jquery/json.htmTable', 'fuel')?>
	<?=js('jquery/plugins/jdash', 'fuel')?>
	<?=js('jquery/plugins/jquery.autocomplete', 'fuel')?>
	<?=js('jqx/jqx', 'fuel')?>
	<?=js('jquery/jquery.tablesorter', 'fuel')?>
	<?=js('jquery/jquery.tablesorter.pager', 'fuel')?>
	<?=js('jquery/jquery-1.3.1.min', 'fuel')?>
	<?=js('jquery/jquery.tablesorter.min', 'fuel')?>
	<?=js($this->config->item('fuel_javascript', 'fuel'), 'fuel')?>
	<?php foreach($js as $m => $j) : echo js(array($m => $j)); endforeach; ?>

	<?php if (!empty($this->js_controller)) : ?> 
	<script type="text/javascript">
		<?php if ($this->js_controller != 'BaseFuelController') : ?>
		jqx.addPreload('fuel.controller.BaseFuelController');
		<?php endif; ?>
		jqx.init('<?=$this->js_controller?>', <?=json_encode($this->js_controller_params)?>, '<?=$this->js_controller_path?>');
	</script>
	<?php endif; ?>
<script type="text/javascript">
  $(document).ready(function() {
    $(".tabLink").each(function(){
      $(this).click(function(){
        tabeId = $(this).attr('id');
        $(".tabLink").removeClass("activeLink");
        $(this).addClass("activeLink");
        $(".tabcontent").addClass("hide");
        $("#"+tabeId+"-1").removeClass("hide")   
        return false;	  
      });
    });  
  });
  
  
  function sidebarHide(object)
{var status = document.getElementById(object).style.display;
 //alert(document.getElementById(object).style.display);
 if(status == "inline")

 { 
  status = "none";
	}
 else
 {
 status = "inline";
	}

}  
  
  
  
</script>	
	<script type='text/javascript' src="http://www.hesido.com/flexcroll/variations-howto's/always_display/flexcroll.js"></script>
</head>
<body>
<script language="javascript" type="text/javascript">

  $(document).ready(function() {
$("#quantity_on_hand").change(function() {
    var quantityonhand = $("#quantity_on_hand").val();
   document.getElementById('quantity_on_order').value=quantityonhand;
    });
  });
  $(document).ready(function() {
 $("#quantity_on_hand").attr('readonly','readonly');
 $("#quantity_on_order").attr('readonly','readonly');
  });

  $(window).load(function() {
    $('#loading_content').hide();
	
	/* Calculating height for left nav By Gaurav*/
	var heighttdsecond = $("div#tdsecond").height();
	//alert(heighttdsecond);
	var heighttdone = heighttdsecond - "70";
	var heightone = heighttdone + "px";
	$("#vewscroller").css( "height", heightone);
	$("#vewscroller").css( "width", "210px");
	$("#vewscroller").css( "overflow", "auto");
  });
</script>
<div id="fuel_header">
	<div id="login_logout">
		<div style="padding:0px;">
			<div style="float:left; width:140px;">
				<center>&nbsp; <?=lang('logged_in_as')?>
			<a href="<?=fuel_url('my_profile/edit/')?>" style="color:#3383AA !important;"><?=$user['user_name']?></a></center>
			</div>
			<div style="float:right; width:106px; padding-top:6px;">
				<a href="<?=fuel_url('logout')?>"><div align="center" class="logoutbtn"><?=lang('logout')?></div></a>
			</div>
		</div>
	</div>
</div>

<div id="fuel_body">
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
	
	<td width="5px" align="left" valign="top">&nbsp;</td>
	
	<td width="210px" align="left" valign="top" class="left-td-bg">
		<div id="fuel_left_panel_inner">
			<div class="tab-box"> 
				<table id="Sidebg" width="210px" height="34px" cellspacing="0" cellpadding="0" border="0" style="padding:0px !important; margin:0px !important;">
				<tr>
					<td align="left" valign="middle"><a href="javascript:;" class="tabLink activeLink" id="cont-1">Ocop</a> </td>
				</tr>
				</table>
			</div>	
			<div class="leftnavboxmain">
				<div align="center" style="padding:0px 0px 5px;"><img  src="<?php echo img_path('logo.png'); ?>"></div>
			<div id="vewscroller" class="flexcroll">
				<div class="tabcontent" id="cont-1-1"> 
					<?php  include_once(FUEL_PATH.'views/_blocks/nav_views.php');?>
				</div>
			</div>
			</div>
		</div>
	</td>
	
	<td width="5px" align="left" valign="top">
		&nbsp;
	</td>	
	
	<td align="left" valign="top">
		<table width="100%" height="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td align="left" valign="top" width="20px" style="background:url('<?php echo img_path('layout/div_topleft_norepeat.png'); ?>') no-repeat; height:50px; width:20px;">&nbsp;</td>
			<td align="left" valign="top" style="background:url('<?php echo img_path('layout/div_topcenter_repeatx.png'); ?>') repeat-x; height:50px;">
				<div style="background:url('<?php echo img_path('layout/div_toph.png'); ?>') no-repeat; width:275px; height:50px;">&nbsp;</div>
			</td>
			<td align="left" valign="top" width="24px" style="background:url('<?php echo img_path('layout/div_topright_norepeat.png'); ?>') no-repeat; height:50px;">&nbsp;</td>
		</tr>
		<tr>
			<td width="20px" align="left" valign="top" style="background:url('<?php echo img_path('layout/div_middleleft_repeaty.png'); ?>') repeat-y; width:20px;">&nbsp;</td>
			<td align="left" valign="top" style="background:#ffffff !important;">
			<div id="tdsecond" align="left" style="min-height:740px;">