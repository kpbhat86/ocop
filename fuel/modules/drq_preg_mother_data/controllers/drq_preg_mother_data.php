<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class drq_preg_mother_data extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'drq_preg_mother_data';
	public $view_location = 'drq_preg_mother_data';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('drq_preg_mother_data');
		$this->load->language('drq_preg_mother_data');
		$this->drq_preg_mother_data = $this->config->item('drq_preg_mother_data');
		$this->load->module_model(DRQ_PREG_MOTHER_DATA_FOLDER, 'drq_preg_mother_data_model');
		$this->data = $this->drq_preg_mother_data_model->example();
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
            $this->_render('drq_preg_mother_data', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->drq_preg_mother_data_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savemotherdata() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->drq_preg_mother_data_model->savemotherdata($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}

}
