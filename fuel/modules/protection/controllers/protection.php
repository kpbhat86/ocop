<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class protection extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'protection';
	public $view_location = 'protection';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('protection');
		$this->load->language('protection');
		$this->protection = $this->config->item('protection');
		$this->load->module_model(PROTECTION_FOLDER, 'protection_model');
		$this->data = $this->protection_model->example();
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
            $this->_render('protection', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->protection_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function saveprotection() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->protection_model->saveprotection($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->protection_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function childinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->protection_model->childinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}

}