<?php

require_once(FUEL_PATH.'/libraries/Fuel_base_controller.php');

class manage_ocop extends Fuel_base_controller {
	private $data;
	public $nav_selected = 'manage_ocop';
	public $view_location = 'manage_ocop';

	
	function __construct()
	{
		parent::__construct();
		$this->config->load('manage_ocop');
		$this->load->language('manage_ocop');
		$this->manage_ocop = $this->config->item('manage_ocop');
		$this->load->module_model(MANAGE_OCOP_FOLDER, 'manage_ocop_model');
		$this->data = $this->manage_ocop_model->example();
		if(isset($this->data)) {
			if(isset($this->data[0]))  {
			}
		}		
	}	
	
	function index()
	{
		if(!empty($this->data) && isset($this->data)) {
			
			$vars['data']= $this->data;
            $this->_render('manage_ocop', $vars);
		} else {
			redirect(fuel_url('#'));
		}
	}	
	
	function listprimary() {	
		$containers = $this->manage_ocop_model->list_primary();
		if(!empty($containers)){
		foreach($containers as $container) {
			$obj = new stdClass();
			$obj->sid = $container->id;
			$obj->hid = $container->hid;
			$obj->cname = $container->cname;
			$obj->hof = $container->hof;
			$obj->gender = $container->gender;
			$obj->age = $container->age;
			$obj->entrydate = $container->entrydate;
			$obj->ci = site_url('fuel/information_child').'/?hid='.$container->hid.'&summ='.$container->id;
			$obj->dl = fuel_url('manage_ocop/delete_summary').'/?hid='.$container->hid.'&summ='.$container->id;
			$folders[] = $obj;
		}
			echo json_encode($folders);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_summary(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_summary($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_gi($parentid = ''){	
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$gis = $this->manage_ocop_model->list_secondary_gi($parentid);
		if(!empty($gis)){
			$files = array();
			foreach($gis as $gi) {
				$obj = new stdClass();
				$obj->id = $gi->id;
				$obj->hid = $gi->hid;
				$obj->sid = $gi->sid;
				$obj->childname = $gi->child_name;
				$obj->eurl = $gi->eurl;
				$obj->forms = $gi->forms;
				$obj->edate = $gi->edate;
				$obj->edit = site_url('fuel/general_info').'/?hid='.$gi->hid.'&summ='.$gi->sid;
				$obj->dl = fuel_url('manage_ocop/delete_gi').'/?hid='.$gi->hid.'&summ='.$gi->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_gi(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_gi($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_bd($parentid = ''){	
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$bds = $this->manage_ocop_model->list_secondary_bd($parentid);
		if(!empty($bds)){
			$files = array();
			foreach($bds as $bd) {
				$obj = new stdClass();
				$obj->id = $bd->id;
				$obj->hid = $bd->hid;
				$obj->sid = $bd->sid;
				$obj->childname = $bd->child_name;
				$obj->eurl = $bd->eurl;
				$obj->forms = $bd->forms;
				$obj->edate = $bd->edate;
				$obj->edit = site_url('fuel/birth_details').'/?hid='.$bd->hid.'&summ='.$bd->sid;
				$obj->dl = fuel_url('manage_ocop/delete_bd').'/?hid='.$bd->hid.'&summ='.$bd->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_bd(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_bd($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_cd($parentid = ''){	
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$cds = $this->manage_ocop_model->list_secondary_cd($parentid);
		if(!empty($cds)){
			$files = array();
			foreach($cds as $cd) {
				$obj = new stdClass();
				$obj->id = $cd->id;
				$obj->hid = $cd->hid;
				$obj->sid = $cd->sid;
				$obj->childname = $cd->child_name;
				$obj->eurl = $cd->eurl;
				$obj->forms = $cd->forms;
				$obj->edate = $cd->edate;
				$obj->edit = site_url('fuel/current_details').'/?hid='.$cd->hid.'&summ='.$cd->sid;
				$obj->dl = fuel_url('manage_ocop/delete_cd').'/?hid='.$cd->hid.'&summ='.$cd->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_cd(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_cd($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_im($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$ims = $this->manage_ocop_model->list_secondary_im($parentid);
		if(!empty($ims)){
			$files = array();
			foreach($ims as $im) {
				$obj = new stdClass();
				$obj->id = $im->id;
				$obj->hid = $im->hid;
				$obj->sid = $im->sid;
				$obj->childname = $im->child_name;
				$obj->eurl = $im->eurl;
				$obj->forms = $im->forms;
				$obj->edate = $im->edate;
				$obj->edit = site_url('fuel/immunization').'/?hid='.$im->hid.'&summ='.$im->sid;
				$obj->dl = fuel_url('manage_ocop/delete_im').'/?hid='.$im->hid.'&summ='.$im->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_im(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_im($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_edu($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$edus = $this->manage_ocop_model->list_secondary_edu($parentid);
		if(!empty($edus)){
			$files = array();
			foreach($edus as $edu) {
				$obj = new stdClass();
				$obj->id = $edu->id;
				$obj->hid = $edu->hid;
				$obj->sid = $edu->sid;
				$obj->childname = $edu->child_name;
				$obj->eurl = $edu->eurl;
				$obj->forms = $edu->forms;
				$obj->edate = $edu->edate;
				$obj->edit = site_url('fuel/education').'/?hid='.$edu->hid.'&summ='.$edu->sid;
				$obj->dl = fuel_url('manage_ocop/delete_edu').'/?hid='.$edu->hid.'&summ='.$edu->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_edu(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_edu($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_pro($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$pros = $this->manage_ocop_model->list_secondary_pro($parentid);
		if(!empty($pros)){
			$files = array();
			foreach($pros as $pro) {
				$obj = new stdClass();
				$obj->id = $pro->id;
				$obj->hid = $pro->hid;
				$obj->sid = $pro->sid;
				$obj->childname = $pro->child_name;
				$obj->eurl = $pro->eurl;
				$obj->forms = $pro->forms;
				$obj->edate = $pro->edate;
				$obj->edit = site_url('fuel/protection').'/?hid='.$pro->hid.'&summ='.$pro->sid;
				$obj->dl = fuel_url('manage_ocop/delete_pro').'/?hid='.$pro->hid.'&summ='.$pro->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_pro(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_pro($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_wf($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$wfs = $this->manage_ocop_model->list_secondary_wf($parentid);
		if(!empty($pros)){
			$files = array();
			foreach($wfs as $wf) {
				$obj = new stdClass();
				$obj->id = $wf->id;
				$obj->hid = $wf->hid;
				$obj->sid = $wf->sid;
				$obj->childname = $wf->child_name;
				$obj->eurl = $wf->eurl;
				$obj->forms = $wf->forms;
				$obj->edate = $wf->edate;
				$obj->edit = site_url('fuel/welfare').'/?hid='.$wf->hid.'&summ='.$wf->sid;
				$obj->dl = fuel_url('manage_ocop/delete_wf').'/?hid='.$wf->hid.'&summ='.$wf->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_wf(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_wf($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_dom($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$doms = $this->manage_ocop_model->list_secondary_dom($parentid);
		if(!empty($doms)){
			$files = array();
			foreach($doms as $dom) {
				$obj = new stdClass();
				$obj->id = $dom->id;
				$obj->hid = $dom->hid;
				$obj->sid = $dom->sid;
				$obj->childname = $dom->child_name;
				$obj->eurl = $dom->eurl;
				$obj->forms = $dom->forms;
				$obj->edate = $dom->edate;
				$obj->edit = site_url('fuel/mother_data').'/?hid='.$dom->hid.'&summ='.$dom->sid;
				$obj->dl = fuel_url('manage_ocop/delete_dom').'/?hid='.$dom->hid.'&summ='.$dom->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_dom(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_dom($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_dof($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$dofs = $this->manage_ocop_model->list_secondary_dof($parentid);
		if(!empty($dofs)){
			$files = array();
			foreach($dofs as $dof) {
				$obj = new stdClass();
				$obj->id = $dof->id;
				$obj->hid = $dof->hid;
				$obj->sid = $dof->sid;
				$obj->childname = $dof->child_name;
				$obj->eurl = $dof->eurl;
				$obj->forms = $dof->forms;
				$obj->edate = $dof->edate;
				$obj->edit = site_url('fuel/father_data').'/?hid='.$dof->hid.'&summ='.$dof->sid;
				$obj->dl = fuel_url('manage_ocop/delete_dof').'/?hid='.$dof->hid.'&summ='.$dof->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_dof(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_dof($hid, $summ);
		echo $hid;
	}
	
	function list_secondary_dog($parentid = ''){
		if(empty($parentid)) { 
			$parentid = $_POST['sid'];
		}
		$dogs = $this->manage_ocop_model->list_secondary_dog($parentid);
		if(!empty($dogs)){
			$files = array();
			foreach($dogs as $dog) {
				$obj = new stdClass();
				$obj->id = $dog->id;
				$obj->hid = $dog->hid;
				$obj->sid = $dog->sid;
				$obj->childname = $dog->child_name;
				$obj->eurl = $dog->eurl;
				$obj->forms = $dog->forms;
				$obj->edate = $dog->edate;
				$obj->edit = site_url('fuel/guardian_data').'/?hid='.$dog->hid.'&summ='.$dog->sid;
				$obj->dl = fuel_url('manage_ocop/delete_dog').'/?hid='.$dog->hid.'&summ='.$dog->sid;
				$files[] = $obj;
			}
			echo json_encode($files);
		}else{
			$status = array("status"=>"No Results!");
            echo json_encode($status);
		}
	}
	
	function delete_dog(){
        $queryStr = $_SERVER['QUERY_STRING'];
        parse_str($queryStr, $args);
        $hid = $args["hid"];
        $summ = $args["summ"];
		$this->manage_ocop_model->delete_dog($hid, $summ);
		echo $hid;
	}
}