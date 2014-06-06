<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class childgeneral_report extends Fuel_base_controller {
	private $data;
	public $nav_selected = 'childgeneral_report';
	public $view_location = 'childgeneral_report';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('childgeneral_report');
		$this->load->language('childgeneral_report');
		$this->childgeneral_report = $this->config->item('childgeneral_report');
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
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
            $this->_render('childgeneral_report', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}
	
	function layout_agewise()
	{
		$this->_render('_blocks/layout_agewise');
		
	}
	
	
		function layout_agewise_multiple()
	{
		$this->_render('_blocks/layout_agewise_multiple');
		
	}
	
	function layout_agewise_selection()
	{
		$this->_render('_blocks/layout_agewise_selection');
		
	}
	
	
	function childagewise_multiple_pdf()
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childagewise_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	function layout_castewise_multiple()
	{
		$this->_render('_blocks/layout_castewise_multiple');
		
	}
	
	function layout_castewise_selection()
	{
		$this->_render('_blocks/layout_castewise_selection');
		
	}
	
	
	function childcastewise_multiple_pdf()
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childcastewise_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
	
		function layout_orphanwise_multiple()
	{
		$this->_render('_blocks/layout_orphanwise_multiple');
		
	}
	
	function layout_orphanwise_selection()
	{
		$this->_render('_blocks/layout_orphanwise_selection');
		
	}
	
	
	function childorphanwise_multiple_pdf()
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childorphanwise_multiple_pdf(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	function layout_orphanwise()
	{
		$this->_render('_blocks/layout_orphanwise');
		
	}
	function layout_rationcardwise()
	{
		$this->_render('_blocks/layout_rationcardwise');
		
	}
	
	
		function layout_religionwise_multiple()
	{
		$this->_render('_blocks/layout_religionwise_multiple');
		
	}
	
	function layout_religionwise_selection()
	{
		$this->_render('_blocks/layout_religionwise_selection');
		
	}
	
	
	function religionmultiplemodel()
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->religionmultiplemodel(  $txtpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
	function layout_religionwise()
	{
		$this->_render('_blocks/layout_religionwise');
		
	}
	function layout_castewise()
	{
		$this->_render('_blocks/layout_castewise');
		
	}
	function example() {
		return true;
	}
		
	function childgeneral_report_pdf(){
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
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childgeneral_report_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}	
	

		function childgeneral_Individualreport_pdf(){
	if ($this->fuel_auth->has_permission('childgeneral_report/childgeneral_Individualreport_pdf'))
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
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childgeneral_Individualreport_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
	
	function childgeneral_report_pdfoneyearly(){
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
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childgeneral_report_pdfoneyearly( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear);
	}
		
	function childgeneral_castewisereport_pdf(){
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childgeneral_castewisereport_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
	function childgeneral_castewise_yearly_pdf(){
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childgeneral_castewise_yearlyreport_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
		function castewisereport_multiple_bar($txtpanchayat='') {
			$castewisereport_multiple_bar = $this->childgeneral_report_model->castewisereport_multiple_bar($_POST['txtpanchayat']);
		for($i=0; $i < count($castewisereport_multiple_bar); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$castewisereport_multiple_bar[$i]->entryagemale03, 
			'entryagemale36' => (int)$castewisereport_multiple_bar[$i]->entryagemale36,
			'entryagemale614' => (int)$castewisereport_multiple_bar[$i]->entryagemale614, 
			'entryagemale618' => (int)$castewisereport_multiple_bar[$i]->entryagemale618,
			'entryagefemale03' => (int)$castewisereport_multiple_bar[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$castewisereport_multiple_bar[$i]->entryagefemale36,
			'entryagefemale614' => (int)$castewisereport_multiple_bar[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$castewisereport_multiple_bar[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
		function agewisereport_multiple_bar($txtpanchayat='')
{		
		$agewisereport_multiple_bar = $this->childgeneral_report_model->agewisereport_multiple_bar($_POST['txtpanchayat']);
		for($i=0; $i < count($agewisereport_multiple_bar); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$agewisereport_multiple_bar[$i]->entryagemale03, 
			'entryagemale36' => (int)$agewisereport_multiple_bar[$i]->entryagemale36,
			'entryagemale614' => (int)$agewisereport_multiple_bar[$i]->entryagemale614, 
			'entryagemale618' => (int)$agewisereport_multiple_bar[$i]->entryagemale618,
			'entryagefemale03' => (int)$agewisereport_multiple_bar[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$agewisereport_multiple_bar[$i]->entryagefemale36,
			'entryagefemale614' => (int)$agewisereport_multiple_bar[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$agewisereport_multiple_bar[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	function castewisereport_multiple_pie($txtpanchayat='') {
		$castewisereport_multiple_pie = $this->childgeneral_report_model->castewisereport_multiple_pie($_POST['txtpanchayat']);
		for($i=0; $i < count($castewisereport_multiple_pie); $i++)
		{
			$test[] = (array('name' => $castewisereport_multiple_pie[$i]->name, 'data' => (int)$castewisereport_multiple_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	

	

	function orphanwisereport_multiple_bar($txtpanchayat='') {
		$orphanwisereport_multiple_bar = $this->childgeneral_report_model->orphanwisereport_multiple_bar($_POST['txtpanchayat']);
		for($i=0; $i < count($orphanwisereport_multiple_bar); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$orphanwisereport_multiple_bar[$i]->entryagemale03, 
			'entryagemale36' => (int)$orphanwisereport_multiple_bar[$i]->entryagemale36,
			'entryagemale614' => (int)$orphanwisereport_multiple_bar[$i]->entryagemale614, 
			'entryagemale618' => (int)$orphanwisereport_multiple_bar[$i]->entryagemale618,
			'entryagefemale03' => (int)$orphanwisereport_multiple_bar[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$orphanwisereport_multiple_bar[$i]->entryagefemale36,
			'entryagefemale614' => (int)$orphanwisereport_multiple_bar[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$orphanwisereport_multiple_bar[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
		function orphanwisereport_multiple_pie($txtpanchayat='') {
		$orphanwisereport_multiple_pie = $this->childgeneral_report_model->orphanwisereport_multiple_pie($_POST['txtpanchayat']);
		for($i=0; $i < count($orphanwisereport_multiple_pie); $i++)
		{
			$test[] = (array('name' => $orphanwisereport_multiple_pie[$i]->name, 'data' => (int)$orphanwisereport_multiple_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	
		function religionwisereport_multiple_bar($txtpanchayat='') {
		$religionwisereport_multiple_bar = $this->childgeneral_report_model->religionwisereport_multiple_bar($_POST['txtpanchayat']);
		for($i=0; $i < count($religionwisereport_multiple_bar); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$religionwisereport_multiple_bar[$i]->entryagemale03, 
			'entryagemale36' => (int)$religionwisereport_multiple_bar[$i]->entryagemale36,
			'entryagemale614' => (int)$religionwisereport_multiple_bar[$i]->entryagemale614, 
			'entryagemale618' => (int)$religionwisereport_multiple_bar[$i]->entryagemale618,
			'entryagefemale03' => (int)$religionwisereport_multiple_bar[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$religionwisereport_multiple_bar[$i]->entryagefemale36,
			'entryagefemale614' => (int)$religionwisereport_multiple_bar[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$religionwisereport_multiple_bar[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
			function religionwisereport_multiple_pie($txtpanchayat='') {
		$religionwisereport_multiple_pie = $this->childgeneral_report_model->religionwisereport_multiple_pie($_POST['txtpanchayat']);
		for($i=0; $i < count($religionwisereport_multiple_pie); $i++)
		{
			$test[] = (array('name' => $religionwisereport_multiple_pie[$i]->name, 'data' => (int)$religionwisereport_multiple_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	
		function yearSpendTrend($village='') {
			$yearSpendTrend = $this->childgeneral_report_model->yearSpendTrend($_POST['ddlvillage']);
		for($i=0; $i < count($yearSpendTrend); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$yearSpendTrend[$i]->entryagemale03, 
			'entryagemale36' => (int)$yearSpendTrend[$i]->entryagemale36,
			'entryagemale614' => (int)$yearSpendTrend[$i]->entryagemale614, 
			'entryagemale618' => (int)$yearSpendTrend[$i]->entryagemale618,
			'entryagefemale03' => (int)$yearSpendTrend[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$yearSpendTrend[$i]->entryagefemale36,
			'entryagefemale614' => (int)$yearSpendTrend[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$yearSpendTrend[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	

		function castewisereportbarchart($ddlvillage='') {
		$castewisereportbarchart = $this->childgeneral_report_model->castewisereportbarchart($_POST['ddlvillage']);
		for($i=0; $i < count($castewisereportbarchart); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$castewisereportbarchart[$i]->entryagemale03, 
			'entryagemale36' => (int)$castewisereportbarchart[$i]->entryagemale36,
			'entryagemale614' => (int)$castewisereportbarchart[$i]->entryagemale614, 
			'entryagemale618' => (int)$castewisereportbarchart[$i]->entryagemale618,
			'entryagefemale03' => (int)$castewisereportbarchart[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$castewisereportbarchart[$i]->entryagefemale36,
			'entryagefemale614' => (int)$castewisereportbarchart[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$castewisereportbarchart[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	
	
	function castewisereport_pie($ddlvillage='') {
		$castewisereport_pie = $this->childgeneral_report_model->castewisereport_pie($_POST['ddlvillage']);
		for($i=0; $i < count($castewisereport_pie); $i++)
		{
			$test[] = (array('name' => $castewisereport_pie[$i]->name, 'data' => (int)$castewisereport_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
	function religionbargraph($ddlvillage='') {
		$religionbargraph = $this->childgeneral_report_model->religionbargraph($_POST['ddlvillage']);
		for($i=0; $i < count($religionbargraph); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$religionbargraph[$i]->entryagemale03, 
			'entryagemale36' => (int)$religionbargraph[$i]->entryagemale36,
			'entryagemale614' => (int)$religionbargraph[$i]->entryagemale614, 
			'entryagemale618' => (int)$religionbargraph[$i]->entryagemale618,
			'entryagefemale03' => (int)$religionbargraph[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$religionbargraph[$i]->entryagefemale36,
			'entryagefemale614' => (int)$religionbargraph[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$religionbargraph[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
		
	function religionreport_pie($ddlvillage='') {
		$religionreport_pie = $this->childgeneral_report_model->religionreport_pie($_POST['ddlvillage']);
		for($i=0; $i < count($religionreport_pie); $i++)
		{
			$test[] = (array('name' => $religionreport_pie[$i]->name, 'data' => (int)$religionreport_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
		function orphanwisereport_pie($ddlvillage='') {
		$orphanwisereport_pie = $this->childgeneral_report_model->orphanwisereport_pie($_POST['ddlvillage']);
		for($i=0; $i < count($orphanwisereport_pie); $i++)
		{
			$test[] = (array('name' => $orphanwisereport_pie[$i]->name, 'data' => (int)$orphanwisereport_pie[$i]->data)) ;
			
		}
		print json_encode($test);
		
	}
	
	
		function orphanwisereportbarchart($ddlvillage='') {
		$orphanwisereportbarchart = $this->childgeneral_report_model->orphanwisereportbarchart($_POST['ddlvillage']);
		for($i=0; $i < count($orphanwisereportbarchart); $i++)
		{
			$test[] = (array(
			'entryagemale03' => (int)$orphanwisereportbarchart[$i]->entryagemale03, 
			'entryagemale36' => (int)$orphanwisereportbarchart[$i]->entryagemale36,
			'entryagemale614' => (int)$orphanwisereportbarchart[$i]->entryagemale614, 
			'entryagemale618' => (int)$orphanwisereportbarchart[$i]->entryagemale618,
			'entryagefemale03' => (int)$orphanwisereportbarchart[$i]->entryagefemale03, 
			'entryagefemale36' => (int)$orphanwisereportbarchart[$i]->entryagefemale36,
			'entryagefemale614' => (int)$orphanwisereportbarchart[$i]->entryagefemale614, 
			'entryagefemale618' => (int)$orphanwisereportbarchart[$i]->entryagefemale618)) ;
					
		}
		print json_encode($test);	
	}
	
	function yearData(){
		$childinfo = $this->childgeneral_report_model->childinfoYearData();
		print(json_encode($childinfo));
	}
	
	function reportgenerate($state = '',$divison = '',$district = '',$taluk='',$panchayat='',$village='') {
		$report_lists = $this->childgeneral_report_model->reportgenerate($_POST['txtstate'],$_POST['txtdivision'],$_POST['txtdistrict'],$_POST['txttaluk'],$_POST['ddlpanchayat'],$_POST['ddlvillage']);	   
		if(!empty($report_lists)){
			$files = array();
			foreach($report_lists as $rp) {
				$obj = new stdClass();
				$obj->threeyearsmale = $rp->threeyearsmale;
				$obj->sixyearsmale	= $rp->sixyearsmale;
				$obj->fourteenyearsmale	= $rp->fourteenyearsmale;
				$obj->eighteenyearsmale	= $rp->eighteenyearsmale;
				$obj->threeyearsfemale	= $rp->threeyearsfemale;
				$obj->sixyearsfemale	= $rp->sixyearsfemale;
				$obj->fourteenyearsfemale = $rp->fourteenyearsfemale;
				$obj->eighteenyearsfemale = $rp->eighteenyearsfemale;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function castewisereport($state = '',$divison = '',$district = '',$taluk='',$panchayat='',$village='') {
		$report_lists = $this->childgeneral_report_model->castewisereport($_POST['txtstate'],$_POST['txtdivision'],$_POST['txtdistrict'],$_POST['txttaluk'],$_POST['ddlpanchayat'],$_POST['ddlvillage']);	   
		if(!empty($report_lists)){
			$files = array();
			foreach($report_lists as $rp) {
				$obj = new stdClass();
				$obj->threeyearsmale = $rp->threeyearsmale;
				$obj->sixyearsmale	= $rp->sixyearsmale;
				$obj->fourteenyearsmale	= $rp->fourteenyearsmale;
				$obj->eighteenyearsmale	= $rp->eighteenyearsmale;
				$obj->threeyearsfemale	= $rp->threeyearsfemale;
				$obj->sixyearsfemale	= $rp->sixyearsfemale;
				$obj->fourteenyearsfemale = $rp->fourteenyearsfemale;
				$obj->eighteenyearsfemale = $rp->eighteenyearsfemale;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function reportgenerateyearly() {
		$report_lists = $this->childgeneral_report_model->reportgenerateyearly();	   
		if(!empty($report_lists)){
			$files = array();
			foreach($report_lists as $rp) {
				$obj = new stdClass();
				$obj->threeyearsmale = $rp->threeyearsmale;
				$obj->sixyearsmale	= $rp->sixyearsmale;
				$obj->fourteenyearsmale	= $rp->fourteenyearsmale;
				$obj->eighteenyearsmale	= $rp->eighteenyearsmale;
				$obj->threeyearsfemale	= $rp->threeyearsfemale;
				$obj->sixyearsfemale	= $rp->sixyearsfemale;
				$obj->fourteenyearsfemale = $rp->fourteenyearsfemale;
				$obj->eighteenyearsfemale = $rp->eighteenyearsfemale;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function orphanreportgenerate(){
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->orphanreportgeneratemodel( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	function religionreportgenerate(){
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->religionreportgeneratemodel( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
	}
	
	
	
		function childcaste_Individualreport_pdf(){
	if ($this->fuel_auth->has_permission('childgeneral_report/childcaste_Individualreport_pdf'))
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
		//$ddlagebreakup = $args["ddlagebreakup"];
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childcaste_Individualreport_pdf( $ddlvillage, $ddlpanchayat, $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
		function childagewise_grama_pdf(){
	if ($this->fuel_auth->has_permission('childgeneral_report/childagewise_grama_pdf'))
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
		$this->load->module_model(CHILDGENERAL_REPORT_FOLDER, 'childgeneral_report_model');
		$childgenerateb = $this->childgeneral_report_model->childagewise_grama_pdf( $txtpanchayat , $txttaluk,  $txtdistrict, $txtdivision, $txtstate, $txtreportlevel, $txtyear );
		}
	}
	
}
/* End of file */
/* Location: ./fuel/modules/controllers*/