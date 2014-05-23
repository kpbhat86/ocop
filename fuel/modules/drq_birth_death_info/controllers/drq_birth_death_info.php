<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class drq_birth_death_info extends Fuel_base_controller {
	private $data;
	private $datap;
	public $nav_selected = 'drq_birth_death_info';
	public $view_location = 'drq_birth_death_info';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('drq_birth_death_info');
		$this->load->language('drq_birth_death_info');
		$this->drq_birth_death_info = $this->config->item('drq_birth_death_info');
		$this->load->module_model(DRQ_BIRTH_DEATH_INFO_FOLDER, 'drq_birth_death_info_model');
		$this->data = $this->drq_birth_death_info_model->example();
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
            $this->_render('drq_birth_death_info', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function childname() {
		if (!empty($_POST)) {
			$datap = $this->drq_birth_death_info_model->childname($_POST['voterid']);
			$datapjson = json_encode($datap); 
			print $datapjson;
		}else{	
		}
	}
	
	function savebirthdetails() {
		$ret = '';
		if (!empty($_POST)) {
			if(!$this->drq_birth_death_info_model->savebirthdetails($_POST)) {
				echo "<font color='Red'><b>Unable to Save!</b></font>";
			} else {
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}			
		}
	}

}
/* End of file */
/* Location: ./fuel/modules/controllers*/