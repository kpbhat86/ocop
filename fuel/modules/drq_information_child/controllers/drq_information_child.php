<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class drq_information_child extends Fuel_base_controller {
	private $data;
	private $datau;
	private $datam;
	private $datad;
	private $datal;
	private $datat;
	private $datap;
	public $nav_selected = 'drq_information_child';
	public $view_location = 'drq_information_child';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('drq_information_child');
		$this->load->language('drq_information_child');
		$this->birth_details = $this->config->item('drq_information_child');
		$this->load->module_model(DRQ_INFORMATION_CHILD_FOLDER, 'drq_information_child_model');
		$this->data = $this->drq_information_child_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
		}
	}		
}	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
            $this->_render('drq_information_child', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
		
	function householdinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->drq_information_child_model->householdinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function savesummary() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->drq_information_child_model->savesummary($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}

}
/* End of file */
/* Location: ./fuel/modules/controllers*/