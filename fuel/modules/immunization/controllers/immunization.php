<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class immunization extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'immunization';
	public $view_location = 'immunization';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('immunization');
		$this->load->language('immunization');
		$this->immunization = $this->config->item('immunization');
		$this->load->module_model(IMMUNIZATION_FOLDER, 'immunization_model');
		$this->data = $this->immunization_model->example();
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
            $this->_render('immunization', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->immunization_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function saveimmunization() {		
		$ret = '';		
		if (!empty($_POST)) {
			if(!$this->immunization_model->savegeneralinfo($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->immunization_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}

}
