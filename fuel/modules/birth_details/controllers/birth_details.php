<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class birth_details extends Fuel_base_controller {
	private $data;
	private $datap;
	private $househid;
	private $summaryid;
	public $nav_selected = 'birth_details';
	public $view_location = 'birth_details';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('birth_details');
		$this->load->language('birth_details');
		$this->birth_details = $this->config->item('birth_details');
		$this->load->module_model(BIRTH_DETAILS_FOLDER, 'birth_details_model');
		$this->data = $this->birth_details_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
		}
		$this->uri->init_get_params();
		$this->househid = (string) $this->input->get('hid', TRUE);
		$this->summaryid = (string) $this->input->get('summ', TRUE);
	}		
}	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
			$vars['datap']= $this->childname();
			$vars['househid']= $this->househid;
			$vars['summaryid']= $this->summaryid;
            $this->_render('birth_details', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function getrecord() {
		if (!empty($_REQUEST)) {
			$summ_info = $this->birth_details_model->getrecord($_REQUEST);
			return $summ_info;
		}else {
			echo 'ERROR';
		}
	}
	
	function getchildname() {
		if (!empty($_REQUEST)) {
			$summ_info = $this->birth_details_model->getchildname($_REQUEST);
			return $summ_info;
		}else {
			echo 'ERROR';
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->birth_details_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savebirthdetails() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->birth_details_model->savebirthdetails($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function updatebirthdetails() {
		$ret = '';
		if (!empty($_POST)) {
			$savedata = $this->birth_details_model->updatebirthdetails($_POST);
			return $savedata;		
		}else {
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->birth_details_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}

}
/* End of file */
/* Location: ./fuel/modules/controllers*/