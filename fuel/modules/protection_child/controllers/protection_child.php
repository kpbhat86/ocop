<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class protection_child extends Fuel_base_controller {
	private $data;
	private $datam;
	private $datad;
	private $datal;
	private $datat;
	private $datap;
	public $nav_selected = 'protection_child';
	public $view_location = 'protection_child';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('protection_child');
		$this->load->language('protection_child');
		$this->protection_child = $this->config->item('protection_child');
		$this->load->module_model(PROTECTION_CHILD_FOLDER, 'protection_child_model');
		$this->data = $this->protection_child_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
		}
		
		$this->uri->init_get_params();
		$this->datam = $this->protection_child_model->state();
		$this->datad = $this->protection_child_model->division();
		$this->datal = $this->protection_child_model->district();
	}		
}	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
			$vars['datam']= $this->datam;
			$vars['datad']= $this->datad;
			$vars['datal']= $this->datal;
			$vars['datat']= $this->taluk();
			$vars['datap']= $this->grama();
            $this->_render('protection_child', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function taluk() {
		if (!empty($_POST)) {
		$datat = $this->protection_child_model->taluk($_POST['mySelect']);
		$dataljson = json_encode($datat); 
		print $dataljson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function grama() {
		if (!empty($_POST)) {
		$datap = $this->protection_child_model->grama($_POST['talukid']);
		$datapjson = json_encode($datap); 
		print $datapjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}
	
	function village() {
		if (!empty($_POST)) {
		$datav = $this->protection_child_model->village($_POST['gramaid']);
		$datavjson = json_encode($datav); 
		print $datavjson;
		}else{	
			//redirect(fuel_url('#'));
		}
	}

}
/* End of file */
/* Location: ./fuel/modules/controllers*/