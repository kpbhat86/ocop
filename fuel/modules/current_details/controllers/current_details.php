<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class current_details extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'current_details';
	public $view_location = 'current_details';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('current_details');
		$this->load->language('current_details');
		$this->current_details = $this->config->item('current_details');
		$this->load->module_model(CURRENT_DETAILS_FOLDER, 'current_details_model');
		$this->data = $this->current_details_model->example();
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
            $this->_render('current_details', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->current_details_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savecurrentdetails() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->current_details_model->savecurrentdetails($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->current_details_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}

}