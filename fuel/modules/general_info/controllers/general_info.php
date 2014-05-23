<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class general_info extends Fuel_base_controller {
	private $data;
	private $datap;
	private $househid;
	private $summaryid;
	public $nav_selected = 'general_info';
	public $view_location = 'general_info';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('general_info');
		$this->load->language('general_info');
		$this->general_info = $this->config->item('general_info');
		$this->load->module_model(GENERAL_INFO_FOLDER, 'general_info_model');
		$this->data = $this->general_info_model->example();
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
            $this->_render('general_info', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function getrecord() {
		if (!empty($_REQUEST)) {
			$summ_info = $this->general_info_model->getrecord($_REQUEST);
			return $summ_info;
		}else {
			echo 'ERROR';
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->general_info_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savegeneralinfo() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->general_info_model->savegeneralinfo($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}
	
	function updategeneralinfo() {
		$ret = '';
		if (!empty($_POST)) {
			$savedata = $this->general_info_model->updategeneralinfo($_POST);
			return $savedata;		
		}else {
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
	
	function checkrecord() {
		if (!empty($_REQUEST)) {
		$checkrecordinfo = $this->general_info_model->checkrecord($_REQUEST);
		return $checkrecordinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function childinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->general_info_model->childinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}

}