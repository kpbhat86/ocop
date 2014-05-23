<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class mother_data extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'mother_data';
	public $view_location = 'mother_data';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('mother_data');
		$this->load->language('mother_data');
		$this->mother_data = $this->config->item('mother_data');
		$this->load->module_model(MOTHER_DATA_FOLDER, 'mother_data_model');
		$this->data = $this->mother_data_model->example();
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
            $this->_render('mother_data', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->mother_data_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savemotherdata() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->mother_data_model->savemotherdata($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->mother_data_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function childinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->mother_data_model->childinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}

}