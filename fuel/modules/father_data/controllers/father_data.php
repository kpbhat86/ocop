<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class father_data extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'father_data';
	public $view_location = 'father_data';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('father_data');
		$this->load->language('father_data');
		$this->father_data = $this->config->item('father_data');
		$this->load->module_model(FATHER_DATA_FOLDER, 'father_data_model');
		$this->data = $this->father_data_model->example();
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
            $this->_render('father_data', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->father_data_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savefatherdata() {
		
		$ret = '';
		
		if (!empty($_POST)) {
			if(!$this->father_data_model->savegeneralinfo($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->father_data_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function childinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->father_data_model->childinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}

}
