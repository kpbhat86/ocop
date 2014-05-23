<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class drq_father_data extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'drq_father_data';
	public $view_location = 'drq_father_data';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('drq_father_data');
		$this->load->language('drq_father_data');
		$this->drq_father_data = $this->config->item('drq_father_data');
		$this->load->module_model(DRQ_FATHER_DATA_FOLDER, 'drq_father_data_model');
		$this->data = $this->drq_father_data_model->example();
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
            $this->_render('drq_father_data', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->drq_father_data_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savefatherdata() {
		
		$ret = '';
		
		if (!empty($_POST)) {
			if(!$this->drq_father_data_model->savegeneralinfo($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}

}
