<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class drq_immunization extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'drq_immunization';
	public $view_location = 'drq_immunization';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('drq_immunization');
		$this->load->language('drq_immunization');
		$this->drq_immunization = $this->config->item('drq_immunization');
		$this->load->module_model(DRQ_IMMUNIZATION_FOLDER, 'drq_immunization_model');
		$this->data = $this->drq_immunization_model->example();
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
            $this->_render('drq_immunization', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->drq_immunization_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function saveimmunization() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->drq_immunization_model->savegeneralinfo($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}

}
