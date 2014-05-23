<?php
require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class Household_survey extends Fuel_base_controller {

	public $nav_selected =  'household_survey';
	public $view_location = 'household_survey';
	private $data;
	private $vendorlists;
	private $country;
	private $mode;
	private $household;
	private $hhlineitem;
	private $hhdetails;
	private $numhhlist;
	
	function __construct()
	{
		parent::__construct();
		$this->config->load('household_survey');
		$this->load->language('household_survey');
		$this->household_survey = $this->config->item('household_survey');
		$this->load->module_model(HOUSEHOLD_SURVEY_FOLDER, 'household_survey_model');
		$this->data 		= $this->household_survey_model->example();
		$this->uri->init_get_params();
		$this->mode 		= (string) $this->input->get('mode', TRUE);
		$this->household 	= (string) $this->input->get('hid', TRUE);
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
			}
		}
	}
	
	function index(){
		if(!empty($this->data) && isset($this->data)) {
			$vars['data']		= $this->data;
			$vars['vendorlists']= $this->vendorlists;
			$vars['country'] 	= $this->country;
			$vars['mode'] 		= $this->mode;
			$vars['household'] 	= $this->household;
			if(!empty($this->mode) && !empty($this->household)){
				$vars['hhlineitem'] 	= $this->household_survey_model->edithlineitem($this->household);
				$vars['hhdetails'] 		= $this->household_survey_model->edithdetails($this->household);
				$vars['numhhlist'] 		= $this->household_survey_model->numhhlist($this->household);
			}
			$vars['instructions']= lang('module_instructions');
			$this->_render('household_survey', $vars);
		}
		else {
			redirect(fuel_url('dashboard'));
		}
	
	}
	
	function edithlineitem($bid) {
		$this->household_survey_model->edithlineitem($bid);
	}
	
	function edithdetails($bid) {
		$this->household_survey_model->edithdetails($bid);
	}
	
	function numhhlist($bid) {
		$this->household_survey_model->numhhlist($bid);
	}
	
	function autosuggest($hlist=''){
		if(empty($hlist)) { 
			$hlist = $_POST['queryString'];
		}
		$householdlists = $this->household_survey_model->list_householdlists($hlist);
		return $householdlists;
	}
	
	function householdinfo() {
		if (!empty($_REQUEST)) {
		$householdinfo = $this->household_survey_model->householdinfo($_REQUEST);
		return $householdinfo;
		}else {
		echo 'ERROR';
		}
	}
	
	function savehouseholdsurvey(){
		if (!empty($_POST)) {
			$hid = $_POST['txtvoterid'];
			if(!$this->household_survey_model->savehouseholdsurvey($_POST)){
				redirect(fuel_url('household_survey/?error=1'));
			} else{
				redirect(fuel_url('household/?hid='.$hid.'&mode=update'));
			}
		}
	}
	
	function edithouseholdsurvey(){
		if (!empty($_POST)) {
			$hid = $_POST['txtvoterid'];
			if(!$this->household_survey_model->edithouseholdsurvey($_POST)){
				redirect(fuel_url('household_survey/?hid='.$hid.'&mode=edit&process=false'));
			} else{
				redirect(fuel_url('household/?hid='.$hid.'&mode=update'));
				//redirect(fuel_url('household_survey/?hid='.$hid.'&mode=edit&process=true'));
			}
		}
	}
}