<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class childcurrent_report extends Fuel_base_controller {
	private $data;
	public $nav_selected = 'childcurrent_report';
	public $view_location = 'childcurrent_report';

	function __construct()
	{
		parent::__construct();
		$this->config->load('childcurrent_report');
		$this->load->language('childcurrent_report');
		$this->childcurrent_report = $this->config->item('childcurrent_report');
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$this->data = $this->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
			}
		}		
	}	
	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
            $this->_render('childcurrent_report', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}


	function layout_non_enrolment()
	{
		$this->_render('_blocks/layout_non_enrolment');
		
	}

	
	function layout_primary_class_children()
	{
		$this->_render('_blocks/layout_primary_class_children');
		
	}
	
	function layout_workingchildrens()
	{
	$this->_render('_blocks/layout_workingchildrens');
	}
	
	
	function layout_pre_primary()
	{
		$this->_render('_blocks/layout_pre_primary');
		
	}
	
	function layout_primary()
	{
		$this->_render('_blocks/layout_primary');
		
	}
	
	
	function layout_primary_selection()
	{
		$this->_render('_blocks/layout_primary_selection');
		
	}
	
	
	function layout_pre_primary_selection()
	{
		$this->_render('_blocks/layout_pre_primary_selection');
		
	}
	
	function layout_primary_multiple()
	{
		$this->_render('_blocks/layout_primary_multiple');
		
	}
	
	function layout_pre_primary_multiple()
	{
		$this->_render('_blocks/layout_pre_primary_multiple');
		
	}
	
	function layout_non_enrolment_multiple()
	{
		$this->_render('_blocks/layout_non_enrolment_multiple');
		
	}
	function layout_non_enrolment_selection()
	{
		$this->_render('_blocks/layout_non_enrolment_selection');
		
	}

	
		function layout_workingchildrens_multiple()
	{
		$this->_render('_blocks/layout_workingchildrens_multiple');
		
	}
	function layout_workingchildrens_selection()
	{
		$this->_render('_blocks/layout_workingchildrens_selection');
		
	}
		
	function layout_dropouts()
		{
		$this->_render('_blocks/layout_dropouts');
		
	}
		
		function layout_dropouts_multiple()
	{
		$this->_render('_blocks/layout_dropouts_multiple');
		
	}
	
	function layout_dropouts_selection()
	{
		$this->_render('_blocks/layout_dropouts_selection');
		
	}
		
	function layout_birth_disability()
		{
		$this->_render('_blocks/layout_birth_disability');
		
	}
	
		function layout_child_individual_selection()
		{
		$this->_render('_blocks/layout_child_individual_selection');
		
	}
		
		function layout_birth_disability_multiple()
	{
		$this->_render('_blocks/layout_birth_disability_multiple');
		
	}
	
	function layout_birth_disability_selection()
	{
		$this->_render('_blocks/layout_birth_disability_selection');
		
	}
	
	function layout_child_devadasi_selection()
	{
		$this->_render('_blocks/layout_child_devadasi_selection');
		
	}
		
	function layout_child_devadasi_multiple()
	{
		$this->_render('_blocks/layout_child_devadasi_multiple');
		
	}
		
	function layout_child_devadasi()
	{
		$this->_render('_blocks/layout_child_devadasi');
		
	}
	
	function childbirth_disability_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childbirth_disability_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
		
		function childindividual_pdf()
	{	
	if ($this->fuel_auth->has_permission('childcurrent_report/childindividual_pdf'))
		{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$childid = $args["childid"];
		$houseid = $args["houseid"];
		$age = $args["age"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childindividual_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate,  $childid, $houseid, $age  );
		}
	} 

	
	function layout_current_disability()
		{
		$this->_render('_blocks/layout_current_disability');
		
	}
		
		function layout_current_disability_multiple()
	{
		$this->_render('_blocks/layout_current_disability_multiple');
		
	}
	
	function layout_current_disability_selection()
	{
		$this->_render('_blocks/layout_current_disability_selection');
		
	}
	
	
	function childcurrent_disability_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childcurrent_disability_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
			
	function layout_child_minor_pregnency()
		{
		$this->_render('_blocks/layout_child_minor_pregnency');
		
	}
		
		function layout_child_minor_pregnency_multiple()
	{
		$this->_render('_blocks/layout_child_minor_pregnency_multiple');
		
	}
	
	function layout_child_minor_pregnency_selection()
	{
		$this->_render('_blocks/layout_child_minor_pregnency_selection');
		
	}
	
	
	function childchild_minor_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childchild_minor_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
				
	function layout_birthreg()
		{
		$this->_render('_blocks/layout_birthreg');
		
	}
		
		function layout_birthreg_multiple()
	{
		$this->_render('_blocks/layout_birthreg_multiple');
		
	}
	
	function layout_birthreg_selection()
	{
		$this->_render('_blocks/layout_birthreg_selection');
		
	}
	
	
	function childbirth_reg_multiple_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childbirth_reg_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	

	
	function childbirth_birthregreport_pdf(){
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childbirth_birthregreport_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function example() {
		return true;
	}


	function current_disabilitybargraph($ddlvillage='') {
		$current_disabilitybargraph = $this->childcurrent_report_model->current_disabilitybargraph($_POST['ddlvillage']);
		for($i=0; $i < count($current_disabilitybargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$current_disabilitybargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$current_disabilitybargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$current_disabilitybargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$current_disabilitybargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$current_disabilitybargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$current_disabilitybargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$current_disabilitybargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$current_disabilitybargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function current_disability_pie($ddlvillage='') {
		$current_disability_pie = $this->childcurrent_report_model->current_disability_pie($_POST['ddlvillage']);
		for($i=0; $i < count($current_disability_pie); $i++)
		{
			$test[] = (array('name' => $current_disability_pie[$i]->name, 'data' => (int)$current_disability_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	
	

	function birth_disabilitybargraph($ddlvillage='') {
		$birth_disabilitybargraph = $this->childcurrent_report_model->birth_disabilitybargraph($_POST['ddlvillage']);
		for($i=0; $i < count($birth_disabilitybargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$birth_disabilitybargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$birth_disabilitybargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$birth_disabilitybargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$birth_disabilitybargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$birth_disabilitybargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$birth_disabilitybargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$birth_disabilitybargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$birth_disabilitybargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function birth_disability_pie($ddlvillage='') {
		$birth_disability_pie = $this->childcurrent_report_model->birth_disability_pie($_POST['ddlvillage']);
		for($i=0; $i < count($birth_disability_pie); $i++)
		{
			$test[] = (array('name' => $birth_disability_pie[$i]->name, 'data' => (int)$birth_disability_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	function workingchildren_bar($ddlvillage='') {
		$workingchildren_bar = $this->childcurrent_report_model->workingchildren_bar($_POST['ddlvillage']);
		for($i=0; $i < count($workingchildren_bar); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$workingchildren_bar[$i]->entryagemale03, 
			'entryagemale36' => (int)$workingchildren_bar[$i]->entryagemale36,
			'entryagemale614' => (int)$workingchildren_bar[$i]->entryagemale614, 
			'entryagemale618' => (int)$workingchildren_bar[$i]->entryagemale618,
			'entryagefemale03' => (int)$workingchildren_bar[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$workingchildren_bar[$i]->entryagefemale36,
			'entryagefemale614' => (int)$workingchildren_bar[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$workingchildren_bar[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function workingchildren_pie($ddlvillage='') {
		$workingchildren_pie = $this->childcurrent_report_model->workingchildren_pie($_POST['ddlvillage']);
		for($i=0; $i < count($workingchildren_pie); $i++)
		{
			$test[] = (array('name' => $workingchildren_pie[$i]->name, 'data' => (int)$workingchildren_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
		function child_minorbargraph($ddlvillage='') {
		$child_minorbargraph = $this->childcurrent_report_model->child_minorbargraph($_POST['ddlvillage']);
		for($i=0; $i < count($child_minorbargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$child_minorbargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$child_minorbargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$child_minorbargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$child_minorbargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$child_minorbargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$child_minorbargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$child_minorbargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$child_minorbargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function child_minor_pie($ddlvillage='') {
		$child_minor_pie = $this->childcurrent_report_model->child_minor_pie($_POST['ddlvillage']);
		for($i=0; $i < count($child_minor_pie); $i++)
		{
			$test[] = (array('name' => $child_minor_pie[$i]->name, 'data' => (int)$child_minor_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}

	
		function preprimarybargraph($ddlvillage='') {
		$preprimarybargraph = $this->childcurrent_report_model->preprimarybargraph($_POST['ddlvillage']);
		for($i=0; $i < count($preprimarybargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$preprimarybargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$preprimarybargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$preprimarybargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$preprimarybargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$preprimarybargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$preprimarybargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$preprimarybargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$preprimarybargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function preprimarypie($ddlvillage='') {
		$preprimarypie = $this->childcurrent_report_model->preprimarypie($_POST['ddlvillage']);
		for($i=0; $i < count($preprimarypie); $i++)
		{
			$test[] = (array('name' => $preprimarypie[$i]->name, 'data' => (int)$preprimarypie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}

	
	
	
			function primarybargraph($ddlvillage='') {
		$primarybargraph = $this->childcurrent_report_model->primarybargraph($_POST['ddlvillage']);
		for($i=0; $i < count($primarybargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$primarybargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$primarybargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$primarybargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$primarybargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$primarybargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$primarybargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$primarybargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$primarybargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function primarypie($ddlvillage='') {
		$primarypie = $this->childcurrent_report_model->primarypie($_POST['ddlvillage']);
		for($i=0; $i < count($primarypie); $i++)
		{
			$test[] = (array('name' => $primarypie[$i]->name, 'data' => (int)$primarypie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	

	function birthregister_pie($ddlvillage='') {
		$birthregister_pie = $this->childcurrent_report_model->birthregister_pie($_POST['ddlvillage']);
		for($i=0; $i < count($birthregister_pie); $i++)
		{
			$test[] = (array('name' => $birthregister_pie[$i]->name, 'data' => (int)$birthregister_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	function birthregister_bargraph($ddlvillage='') {
		$birthregister_bargraph = $this->childcurrent_report_model->birthregister_bargraph($_POST['ddlvillage']);
		for($i=0; $i < count($birthregister_bargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$birthregister_bargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$birthregister_bargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$birthregister_bargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$birthregister_bargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$birthregister_bargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$birthregister_bargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$birthregister_bargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$birthregister_bargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
			function birthregister_piemultiple($txtpanchayat='') {
		$birthregister_piemultiple = $this->childcurrent_report_model->birthregister_piemultiple($_POST['txtpanchayat']);
		for($i=0; $i < count($birthregister_piemultiple); $i++)
		{
			$test[] = (array('name' => $birthregister_piemultiple[$i]->name, 'data' => (int)$birthregister_piemultiple[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
		function birthregister_bargraphmultiple($txtpanchayat='') {
		$birthregister_bargraphmultiple = $this->childcurrent_report_model->birthregister_bargraphmultiple($_POST['txtpanchayat']);
		for($i=0; $i < count($birthregister_bargraphmultiple); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$birthregister_bargraphmultiple[$i]->entryagemale03, 
			'entryagemale36' => (int)$birthregister_bargraphmultiple[$i]->entryagemale36,
			'entryagemale614' => (int)$birthregister_bargraphmultiple[$i]->entryagemale614, 
			'entryagemale618' => (int)$birthregister_bargraphmultiple[$i]->entryagemale618,
			'entryagefemale03' => (int)$birthregister_bargraphmultiple[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$birthregister_bargraphmultiple[$i]->entryagefemale36,
			'entryagefemale614' => (int)$birthregister_bargraphmultiple[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$birthregister_bargraphmultiple[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
		function preprimary_multiplebargraph($txtpanchayat='') {
		$preprimary_multiplebargraph = $this->childcurrent_report_model->preprimary_multiplebargraph($_POST['txtpanchayat']);
		for($i=0; $i < count($preprimary_multiplebargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$preprimary_multiplebargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$preprimary_multiplebargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$preprimary_multiplebargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$preprimary_multiplebargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$preprimary_multiplebargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$preprimary_multiplebargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$preprimary_multiplebargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$preprimary_multiplebargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function preprimary_multiplepie($txtpanchayat='') {
		$preprimary_multiplepie = $this->childcurrent_report_model->preprimary_multiplepie($_POST['txtpanchayat']);
		for($i=0; $i < count($preprimary_multiplepie); $i++)
		{
			$test[] = (array('name' => $preprimary_multiplepie[$i]->name, 'data' => (int)$preprimary_multiplepie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
		function dropout_piemultiple($txtpanchayat='') {
		$dropout_piemultiple = $this->childcurrent_report_model->dropout_piemultiple($_POST['txtpanchayat']);
		for($i=0; $i < count($dropout_piemultiple); $i++)
		{
			$test[] = (array('name' => $dropout_piemultiple[$i]->name, 'data' => (int)$dropout_piemultiple[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	
		function disability_bargraphmultiple($txtpanchayat='') {
		$disability_bargraphmultiple = $this->childcurrent_report_model->disability_bargraphmultiple($_POST['txtpanchayat']);
		for($i=0; $i < count($disability_bargraphmultiple); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$disability_bargraphmultiple[$i]->entryagemale03, 
			'entryagemale36' => (int)$disability_bargraphmultiple[$i]->entryagemale36,
			'entryagemale614' => (int)$disability_bargraphmultiple[$i]->entryagemale614, 
			'entryagemale618' => (int)$disability_bargraphmultiple[$i]->entryagemale618,
			'entryagefemale03' => (int)$disability_bargraphmultiple[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$disability_bargraphmultiple[$i]->entryagefemale36,
			'entryagefemale614' => (int)$disability_bargraphmultiple[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$disability_bargraphmultiple[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	
	function disability_piemultiple($txtpanchayat='') {
		$disability_piemultiple = $this->childcurrent_report_model->disability_piemultiple($_POST['txtpanchayat']);
		for($i=0; $i < count($disability_piemultiple); $i++)
		{
			$test[] = (array('name' => $disability_piemultiple[$i]->name, 'data' => (int)$disability_piemultiple[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	
			function dropout_bargraphmultiple($txtpanchayat='') {
		$dropout_bargraphmultiple = $this->childcurrent_report_model->dropout_bargraphmultiple($_POST['txtpanchayat']);
		for($i=0; $i < count($dropout_bargraphmultiple); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$dropout_bargraphmultiple[$i]->entryagemale03, 
			'entryagemale36' => (int)$dropout_bargraphmultiple[$i]->entryagemale36,
			'entryagemale614' => (int)$dropout_bargraphmultiple[$i]->entryagemale614, 
			'entryagemale618' => (int)$dropout_bargraphmultiple[$i]->entryagemale618,
			'entryagefemale03' => (int)$dropout_bargraphmultiple[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$dropout_bargraphmultiple[$i]->entryagefemale36,
			'entryagefemale614' => (int)$dropout_bargraphmultiple[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$dropout_bargraphmultiple[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	

	
	function dropoutbargraph($ddlvillage='') {
		$dropoutbargraph = $this->childcurrent_report_model->dropoutbargraph($_POST['ddlvillage']);
		for($i=0; $i < count($dropoutbargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$dropoutbargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$dropoutbargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$dropoutbargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$dropoutbargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$dropoutbargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$dropoutbargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$dropoutbargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$dropoutbargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
		
		
		
		function dropoutpie($ddlvillage='') {
		$dropoutpie = $this->childcurrent_report_model->dropoutpie($_POST['ddlvillage']);
		for($i=0; $i < count($dropoutpie); $i++)
		{
			$test[] = (array('name' => $dropoutpie[$i]->name, 'data' => (int)$dropoutpie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	
	
	function non_enrollbargraph($ddlvillage='') {
		$non_enrollbargraph = $this->childcurrent_report_model->non_enrollbargraph($_POST['ddlvillage']);
		for($i=0; $i < count($non_enrollbargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$non_enrollbargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$non_enrollbargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$non_enrollbargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$non_enrollbargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$non_enrollbargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$non_enrollbargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$non_enrollbargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$non_enrollbargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
		
		
		
		function non_enrollreport_pie($ddlvillage='') {
		$non_enrollreport_pie = $this->childcurrent_report_model->non_enrollreport_pie($_POST['ddlvillage']);
		for($i=0; $i < count($non_enrollreport_pie); $i++)
		{
			$test[] = (array('name' => $non_enrollreport_pie[$i]->name, 'data' => (int)$non_enrollreport_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	

	function childdropouts_multiple_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childdropouts_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
		function childnon_enrolment_multiple_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childnon_enrolment_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function childcurrent_dropout_pdf(){
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childcurrent_dropout_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	function childcurrent_birth_disability_pdf () {
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childcurrent_birth_disability_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	function childcurrent_child_minor_pregnency_pdf(){
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childcurrent_child_minor_pregnency_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function childcurrent_current_disability_pdf () {
	$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childcurrent_current_disability_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function childcurrent_working_pdf(){
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childcurrent_working_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function childprimary_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childprimary_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function childprimary_multiple_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childprimary_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
		function workingchildrens_multiple_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->workingchildrens_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
		function childpre_primary_multiple_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childpre_primary_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	function childpreprimary_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childpreprimary_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function childnonenrolment_pdf()
	{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
		$ddlvillage = $args["ddlvillage"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		$ddlpanchayat = $args["ddlpanchayat"];
		$this->load->module_model(CHILDCURRENT_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childnonenrolment_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
			function childdropout_grama_pdf(){
	if ($this->fuel_auth->has_permission('childcurrent_report/childdropout_grama_pdf'))
		{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);		
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childdropout_grama_pdf( $txtpanchayat , $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
	
	
	
		function childprimary_grama_pdf(){
	if ($this->fuel_auth->has_permission('childcurrent_report/childprimary_grama_pdf'))
		{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);		
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childprimary_grama_pdf( $txtpanchayat , $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
	
			function childbirthreg_grama_pdf(){
	if ($this->fuel_auth->has_permission('childcurrent_report/childbirthreg_grama_pdf'))
		{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);		
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childbirthreg_grama_pdf( $txtpanchayat , $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
	
	
				function childchildminor_pdf(){
	if ($this->fuel_auth->has_permission('childcurrent_report/childchildminor_pdf'))
		{
		$queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);		
		$txtpanchayat = $args["txtpanchayat"];
		$txttaluk = $args["txttaluk"];
		$txtdistrict = $args["txtdistrict"];
		$txtdivision = $args["txtdivision"];
		$txtstate = $args["txtstate"];
		$txtreportlevel = $args["txtreportlevel"];
		$txtyear = $args["txtyear"];
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childcurrent_report_model');
		$childgenerateb = $this->childcurrent_report_model->childchildminor_pdf( $txtpanchayat , $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
	
	
	
	
	

	
}
/* End of file */
/* Location: ./fuel/modules/controllers*/