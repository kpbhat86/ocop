<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class manage_household extends Fuel_base_controller {
	private $data;
	public $nav_selected = 'manage_household';
	public $view_location = 'manage_household';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('manage_household');
		$this->load->language('manage_household');
		$this->load->library('data_table');
		$this->manage_household = $this->config->item('manage_household');
		$this->load->module_model(MANAGE_HOUSEHOLD_FOLDER, 'manage_household_model');
		$this->data = $this->manage_household_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
				
			}
		}		
	}	
	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {			
			$vars['data']= $this->data;
            $this->_render('manage_household', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function householdlist() {
		$hh_lists = $this->manage_household_model->householdlistdetails();	   
		if(!empty($hh_lists)){
			$files = array();
			foreach($hh_lists as $hl) {
				$obj = new stdClass();
				$obj->serialno 		= $hl->serialno;
				$obj->hid 			= $hl->hid;
				$obj->hof 			= $hl->hof;
				$obj->doornumber 	= $hl->doornumber;
				$obj->district 		= $hl->district;
				$obj->panchayat 	= $hl->panchayat;
				$obj->totolpeople 	= $hl->totolpeople;
				$obj->edate 		= $hl->edate;
				/*$obj->hedit 		= fuel_url('manage_household').'?edit=='.$hl->id.'&type=hhe';
				$obj->hdelete 		= fuel_url('manage_household/deletehhe').'?delete='.$hl->id.'&type=hhe';
				$obj->hsedit 		= fuel_url('manage_household').'?edit=='.$hl->id.'&type=hhs';
				$obj->hsdelete 		= fuel_url('manage_household/deletehhs').'?delete='.$hl->id.'&type=hhs';*/
				$files[] 			= $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function deletehousehold() {
		$ret = '';
		if (!empty($_REQUEST)) {
			if(!$this->manage_household_model->deletehousehold($_REQUEST)) {
				echo "<font color='green'><b>Household entry deleted successfully!</b></font>";
			} else {
				echo "<font color='Red'><b>Unable to delete. Please try later.</b></font>";
			}			
		}
	}
}