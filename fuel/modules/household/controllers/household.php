<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class household extends Fuel_base_controller {
	private $data;
	private $mode;
	private $process;
	private $household;
	private $hdetails;
	private $dataljson;
	public $nav_selected = 'household';
	public $view_location = 'household';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('household');
		$this->load->language('household');
		$this->household = $this->config->item('household');
		$this->load->module_model(HOUSEHOLD_FOLDER, 'household_model');
		$this->data = $this->household_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
		}
		
		$this->uri->init_get_params();
		$this->process = (string) $this->input->get('mode', TRUE);
		if(empty($this->process)){
			$this->mode = '';
		}else{
			$this->mode = $this->process;
		}
		$this->household = (string) $this->input->get('hid', TRUE);
	}		
}	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
			$vars['mode']= $this->mode;
			$vars['household']= $this->household;
			/*if(!empty($this->household)){
				$vars['hdetails']= $this->hdetails($this->household);
			}*/
            $this->_render('household', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function hdetails() {
		if (!empty($_REQUEST)) {
			$hdetails = $this->household_model->hdetails($_REQUEST);
			return $hdetails;
		}else {
			echo 'ERROR';
		}
	}
	
	/*function hdetailsedit() {
		if (!empty($_REQUEST)) {
			$hdetailsedit = $this->household_model->hdetailsedit($_REQUEST);
			return $hdetailsedit;
		}else {
			echo 'ERROR';
		}
	}*/
	
			function processchk(){
	 // $this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
	  $pchk = $this->household_model->processchk($_POST['id'], $_POST['hid']);
	  $pchkjson = json_encode($pchk); 
	  print $pchkjson;
	}
	
	
	function hsurveydetails() {
		if (!empty($_REQUEST)) {
			$hsurveydetails = $this->household_model->hsurveydetails($_REQUEST);
			return $hsurveydetails;
		}else {
			echo 'ERROR';
		}
	}
	
	function male03() {
		if (!empty($_REQUEST)) {
			$male03 = $this->household_model->male03($_REQUEST);
			return $male03;
		}else {
			echo 'ERROR';
		}
	}
	
	function female03() {
		if (!empty($_REQUEST)) {
			$female03 = $this->household_model->female03($_REQUEST);
			return $female03;
		}else {
			echo 'ERROR';
		}
	}
	
	function male36() {
		if (!empty($_REQUEST)) {
			$male36 = $this->household_model->male36($_REQUEST);
			return $male36;
		}else {
			echo 'ERROR';
		}
	}
	
	function female36() {
		if (!empty($_REQUEST)) {
			$female36 = $this->household_model->female36($_REQUEST);
			return $female36;
		}else {
			echo 'ERROR';
		}
	}
	
	function male614() {
		if (!empty($_REQUEST)) {
			$male614 = $this->household_model->male614($_REQUEST);
			return $male614;
		}else {
			echo 'ERROR';
		}
	}
	
	function female614() {
		if (!empty($_REQUEST)) {
			$female614 = $this->household_model->female614($_REQUEST);
			return $female614;
		}else {
			echo 'ERROR';
		}
	}
	
	function male1418() {
		if (!empty($_REQUEST)) {
			$male1418 = $this->household_model->male1418($_REQUEST);
			return $male1418;
		}else {
			echo 'ERROR';
		}
	}
	
	function female1418() {
		if (!empty($_REQUEST)) {
			$female1418 = $this->household_model->female1418($_REQUEST);
			return $female1418;
		}else {
			echo 'ERROR';
		}
	}
	
	function taluk() {
		if (!empty($_POST)) {
			$datat = $this->household_model->taluk($_POST['mySelect']);
			$dataljson = json_encode($datat); 
			print $dataljson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function grama() {
		if (!empty($_POST)) {
			$datap = $this->household_model->grama($_POST['talukid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function ajax_village() {
		if (!empty($_POST)) {
			$datav = $this->household_model->village($_POST['id']);
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	
		function houseid() {
		if (!empty($_POST)) {
			$datav = $this->household_model->houseid($_POST['id']);
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	
		
		function childid() {
		if (!empty($_POST)) {
			$datav = $this->household_model->childid($_POST['id']);
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function ajax_panchayat() {
		if (!empty($_POST)) {
			$datav = $this->household_model->panchayat($_POST['id']);
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function ajax_taluk() {
		if (!empty($_POST)) {
			$datav = $this->household_model->ajax_taluk($_POST['id']);
			
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function ajax_division() {
		if (!empty($_POST)) {
			$datav = $this->household_model->ajax_division($_POST['id']);
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function ajax_district() {
		if (!empty($_POST)) {
			$datav = $this->household_model->ajax_district($_POST['id']);
			$datavjson = json_encode($datav);
			//echo '<option value="'.$datavjson.'">'.$datavjson.'</option>';
			print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function savehousehold() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->household_model->savehousehold($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function updatehousehold() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->household_model->updatehousehold($_POST)) {
				echo "<font color='Red'><b>Unable to Update!</b></font>";
			} else {
				echo "<font color='green'><b>Record updated successfully!</b></font>";
			}			
		}
	}

}
/* End of file */
/* Location: ./fuel/modules/controllers*/