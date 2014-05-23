<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class manage_ocop_model extends Base_module_model {
	function __construct(){
        parent::__construct('manage_ocop');
    }
		
	function example(){
		return true;
	}	
	
	function list_primary() {	
		$sql ="SELECT ocop_summary_id as id, household_voters_id as hid, child_name as cname, gender, age, sdate as entrydate, headname as hof FROM ocop_summary ";
		$sql .=" group by ocop_summary_id order by household_voters_id, ocop_summary_id desc";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
		   foreach ($query->result() as $row)
		   {
		      $arr[] =$row;
		   }
		}
		return $arr;
	}

	function delete_summary($hid, $summ){
		$scheck = $this->db->query("select * from ocop_summary where household_voters_id = '".$hid."' and ocop_summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_summary WHERE household_voters_id='".$hid."' and ocop_summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_general_info WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_birth_details WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_current_details WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_immunization WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_education WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_protection WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_welfare WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_mother_data WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_father_data WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
			$this->db->query("DELETE FROM ocop_guardian_data WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_gi($parentid){
		$sqlgi="SELECT ocop_general_info_id as id, household_voters_id as hid, summary_id as sid,  child_name as child_name, 'general_info' as eurl, 'General Info' as forms, DATE_FORMAT(creation_date, '%d-%m-%Y') as edate FROM ocop_general_info WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqlgi);
		$arrgi='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrgi[] =$row;
			}
		}
		return $arrgi;
	}

	function delete_gi($hid, $summ){
		$scheck = $this->db->query("select * from ocop_general_info where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_general_info WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_bd($parentid){
		$sqlbd="SELECT ocop_birth_details_id as id, ocop_birth_details.household_voters_id as hid, summary_id as sid,  ocop_summary.child_name as child_name, 'birth_details' as eurl, 'Birth Details' as forms,  DATE_FORMAT(ocop_birth_details.creation_date, '%d-%m-%Y') as edate FROM ocop_birth_details LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_birth_details.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqlbd);
		$arrbd='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrbd[] =$row;
			}
		}
		return $arrbd;
	}

	function delete_bd($hid, $summ){
		$scheck = $this->db->query("select * from ocop_birth_details where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_birth_details WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_cd($parentid){
		$sqlcd="SELECT ocop_current_details_id as id, ocop_current_details.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'current_details' as eurl, 'Current Details' as forms,  DATE_FORMAT(ocop_current_details.creation_date, '%d-%m-%Y') as edate FROM ocop_current_details LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_current_details.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqlcd);
		$arrcd='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrcd[] =$row;
			}
		}
		return $arrcd;
	}

	function delete_cd($hid, $summ){
		$scheck = $this->db->query("select * from ocop_current_details where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_current_details WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_im($parentid){
		$sqlim="SELECT ocop_immunization_id as id, ocop_immunization.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'immunization' as eurl, 'Immunization' as forms,  DATE_FORMAT(ocop_immunization.creation_date, '%d-%m-%Y') as edate FROM ocop_immunization LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_immunization.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqlim);
		$arrim='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrim[] =$row;
			}
		}
		return $arrim;
	}

	function delete_im($hid, $summ){
		$scheck = $this->db->query("select * from ocop_immunization where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_immunization WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_edu($parentid){
		$sqledu="SELECT ocop_education_id as id, ocop_education.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'education' as eurl, 'Education' as forms,  DATE_FORMAT(ocop_education.creation_date, '%d-%m-%Y') as edate FROM ocop_education LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_education.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqledu);
		$arredu='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arredu[] =$row;
			}
		}
		return $arredu;
	}

	function delete_edu($hid, $summ){
		$scheck = $this->db->query("select * from ocop_education where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_education WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_pro($parentid){
		$sqlpro="SELECT ocop_protection_id as id, ocop_protection.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'protection' as eurl, 'Protection' as forms,  DATE_FORMAT(ocop_protection.creation_date, '%d-%m-%Y') as edate FROM ocop_protection LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_protection.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqlpro);
		$arrpro='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrpro[] =$row;
			}
		}
		return $arrpro;
	}

	function delete_pro($hid, $summ){
		$scheck = $this->db->query("select * from ocop_protection where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_protection WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_wf($parentid){
		$sqlwf="SELECT ocop_welfare_id as id, ocop_welfare.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'welfare' as eurl, 'Welfare' as forms,  DATE_FORMAT(ocop_welfare.creation_date, '%d-%m-%Y') as edate FROM ocop_welfare LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_welfare.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqlwf);
		$arrwf='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrwf[] =$row;
			}
		}
		return $arrwf;
	}

	function delete_wf($hid, $summ){
		$scheck = $this->db->query("select * from ocop_welfare where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_welfare WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_dom($parentid){
		$sqldom="SELECT ocop_mother_data_id as id, ocop_mother_data.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'mother_data' as eurl, 'Data of Mother' as forms,  DATE_FORMAT(ocop_mother_data.creation_date, '%d-%m-%Y') as edate FROM ocop_mother_data LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_mother_data.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqldom);
		$arrdom='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrdom[] =$row;
			}
		}
		return $arrdom;
	}

	function delete_dom($hid, $summ){
		$scheck = $this->db->query("select * from ocop_mother_data where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_mother_data WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_dof($parentid){
		$sqldof="SELECT ocop_father_data_id as id, ocop_father_data.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'father_data' as eurl, 'Data of Father' as forms,  DATE_FORMAT(ocop_father_data.creation_date, '%d-%m-%Y') as edate FROM ocop_father_data LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_father_data.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqldof);
		$arrdof='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrdof[] =$row;
			}
		}
		return $arrdof;
	}

	function delete_dof($hid, $summ){
		$scheck = $this->db->query("select * from ocop_father_data where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_father_data WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
	
	function list_secondary_dog($parentid){
		$sqldog="SELECT ocop_guardian_data_id as id, ocop_guardian_data.household_voters_id as hid, summary_id as sid, ocop_summary.child_name as child_name, 'guardian_data' as eurl, 'Data of Guardian' as forms,  DATE_FORMAT(ocop_guardian_data.creation_date, '%d-%m-%Y') as edate FROM ocop_guardian_data LEFT JOIN ocop_summary ON ocop_summary.ocop_summary_id = ocop_guardian_data.summary_id WHERE summary_id = '".$parentid."'";
		$query = $this->db->query($sqldog);
		$arrdog='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arrdog[] =$row;
			}
		}
		return $arrdog;
	}

	function delete_dog($hid, $summ){
		$scheck = $this->db->query("select * from ocop_guardian_data where household_voters_id = '".$hid."' and summary_id = '".$summ."'");
		$arr = $scheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM ocop_guardian_data WHERE household_voters_id='".$hid."' and summary_id = '".$summ."'");
		}else{
			return false;
		}
    }
}

class manage_ocopmodel extends Base_module_record {
 	
}