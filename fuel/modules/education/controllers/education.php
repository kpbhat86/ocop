<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class education extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'education';
	public $view_location = 'education';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('education');
		$this->load->language('education');
		$this->education = $this->config->item('education');
		$this->load->module_model(EDUCATION_FOLDER, 'education_model');
		$this->data = $this->education_model->example();
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
            $this->_render('education', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->education_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function saveeducation() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->education_model->saveeducation($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function childinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->education_model->childinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->education_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}

}