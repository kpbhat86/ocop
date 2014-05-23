<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class welfare extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'welfare';
	public $view_location = 'welfare';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('welfare');
		$this->load->language('welfare');
		$this->welfare = $this->config->item('welfare');
		$this->load->module_model(WELFARE_FOLDER, 'welfare_model');
		$this->load->module_model(PROTECTION_FOLDER, 'protection_model');
		$this->load->module_model(BIRTH_DETAILS_FOLDER, 'birth_details_model');
		$this->data = $this->welfare_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
		}
	}		
}	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
			$vars['datap']= $this->childname();
            $this->_render('welfare', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->welfare_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savewelfare() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->welfare_model->savewelfare($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->welfare_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function childinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->welfare_model->childinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function checkDevadasi() {
		$chkDevdasi = $this->protection_model->checkDevadasi($_POST);
		return $chkDevdasi;
	}

	function checkDisablity() {
		$chkDis = $this->birth_details_model->checkDisablity($_POST);
		return $chkDis;
	}
	
}