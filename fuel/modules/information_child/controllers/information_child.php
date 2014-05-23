<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class information_child extends Fuel_base_controller {
	private $data;
	private $househid;
	private $summaryid;
	/*private $datau;
	private $datam;
	private $datad;
	private $datal;
	private $datat;
	private $datap;*/
	public $nav_selected = 'information_child';
	public $view_location = 'information_child';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('information_child');
		$this->load->language('information_child');
		$this->birth_details = $this->config->item('information_child');
		$this->load->module_model(INFORMATION_CHILD_FOLDER, 'information_child_model');
		$this->data = $this->information_child_model->example();
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
			$vars['househid']= $this->househid;
			$vars['summaryid']= $this->summaryid;
            $this->_render('information_child', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function getrecord() {
		if (!empty($_REQUEST)) {
			$summ_info = $this->information_child_model->getrecord($_REQUEST);
			return $summ_info;
		}else {
			echo 'ERROR';
		}
	}
		
	function hhinfo() {
		if (!empty($_REQUEST)) {
		$hhinfo = $this->information_child_model->hhinfo($_REQUEST);
		return $hhinfo;
		}else {
		echo 'ERROR';
		}
	}
		
	function householdinfo() {
		if (!empty($_REQUEST)) {
			$householdinfo = $this->information_child_model->householdinfo($_REQUEST);
			return $householdinfo;
		}else {
			echo 'ERROR';
		}
	}
	
	function savesummary() {
		$ret = '';
		if (!empty($_POST)) {
			$savedata = $this->information_child_model->savesummary($_POST);
			return $savedata;
			/*if(!$this->information_child_model->savesummary($_POST)) {
				echo "<font color='Red'><b>Unable to Process.!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}	*/		
		}else {
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
	
	function updatesummary() {
		$ret = '';
		if (!empty($_POST)) {
			$savedata = $this->information_child_model->updatesummary($_POST);
			return $savedata;		
		}else {
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
	
	function householdcinfo() {
		if (!empty($_POST)) {
		$datat = $this->information_child_model->householdcinfo($_POST['hid']);
		$dataljson = json_encode($datat); 
		print $dataljson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}

}
/* End of file */
/* Location: ./fuel/modules/controllers*/