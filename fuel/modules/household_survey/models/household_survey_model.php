<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(FUEL_PATH.'models/base_module_model.php');
require_once(MODULES_PATH.'/household_survey/config/household_survey_constants.php');
require_once(APPPATH.'helpers/tcpdf/config/lang/eng.php');
class Household_survey_model extends Base_module_model {

    function __construct()
    {
        parent::__construct('household_entry');
    } 
	
	function example(){
		return true;
	}
	
	function list_householdlists($hvid){
		$query = $this->db->query("SELECT DISTINCT household_voters_id FROM household_entry WHERE household_voters_id LIKE '".$hvid."%' LIMIT 10");
		$arr = $query->result();
		if(!empty($arr)){
		echo '<ul>';
		foreach($arr as $row) {
	         echo '<li onClick="fill(\''.addslashes($row->household_voters_id).'\');">'.$row->household_voters_id.'</li>';
	    }
		echo '</ul>';
		}else{
			echo '<ul>';
			echo '<li>No Record</li>';
			echo '</ul>';
		}
	}
	
	function householdinfo($hlist) {
		if($_REQUEST){
		$hlist = $_REQUEST["hid"];
		}
		$sql = "select entry_name_head_of_fly, entry_door_no, entry_village_name, entry_tot_no_ppl from household_entry where household_voters_id = '".$hlist."' LIMIT 0,1";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$hli = json_encode($arr);
		echo $hli;
	}
	
	function numhhlist($hid) {
		$sql = "SELECT count(list_id) as num FROM household_survey_main LEFT JOIN household_survey_list ON household_survey_main.household_survey_main_id = household_survey_list.ref_id WHERE household_voters_id = '".$hid."'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$num = $query->row(0)->num;
		}else{
			$num = '0';
		}
		return $num;
	}
	
	function edithlineitem($hid) {
		$sql = "SELECT list_id as sno, survey_name_survey as name, survey_age_survey as age, survey_gender_survey as gender, survey_relationship_with_head_family as rel_hof, survey_mother_child_relationship_survey as mother_name, survey_father_child_relationship_survey as father_name, survey_guardian_child_relationship_survey as guardian_name, survey_alive_dead_survey as alive_death, survey_education_survey as edu, survey_occupation_survey as occup, survey_annual_income_survey as sal, survey_marital_status_survey as marital_status, survey_married_age_survey as marriage_age FROM household_survey_main LEFT JOIN household_survey_list ON household_survey_main.household_survey_main_id = household_survey_list.ref_id WHERE household_voters_id = '".$hid."' order by list_id asc";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$hhli = json_encode($arr);
		return $hhli;
	}
	
	function edithdetails($hid) {
		$sql = "SELECT household_voters_id as hid, survey_name_of_head_family as hof, survey_address_of_head_family as addr, survey_religion_survey as religion, survey_caste_survey as caste FROM household_survey_main WHERE household_voters_id = '".$hid."' LIMIT 0,1";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$hdli = json_encode($arr);
		return $hdli;
	}
	
	function savehouseholdsurvey($post){		
		$voterid = $_POST['txtvoterid'];
		$headmem = $_POST['txthead_fly'];
		$addr1 = $_POST['txtaddr1'];
		$addr2 = $_POST['txtaddr2'];
		$num = $_POST['txttotnum'];
		$religion = $_POST['radreligion'];
		$caste = $_POST['radcaste'];
		$addr = $addr1.';'.$addr2;
		$data = array('household_voters_id' => $voterid, 'survey_name_of_head_family' => $headmem, 'survey_address_of_head_family' => $addr, 'survey_religion_survey' => $religion, 'survey_caste_survey' => $caste);
	    $this->db->insert('household_survey_main', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){
			/*$i = 1;
			while (isset($_POST['txtsno' . $i]) ) { 
			if (!$_POST['txtsno' . $i]) {
			$i++;
			continue;
			}*/
			for($i=1; $i <= $num; $i++){
			$list_id = $_POST['txtsno'.$i];
			$ref_id = $inserted;
			$name = $_POST['txtname'.$i];
			$age = $_POST['txtage'.$i];
			$gender = $_POST['txtgender'.$i];
			$head_of_fly = $_POST['txthead_of_fly'.$i];
			$mother_chld_rel = $_POST['txtmother_chld_rel'.$i];
			$father_chld_rel = $_POST['txtfather_chld_rel'.$i];
			$guardian_chld_rel = $_POST['txtguardian_chld_rel'.$i];
			$alive_dead = $_POST['txtalive_dead'.$i];
			if($alive_dead == 2){
				$education = '';
				$occupation = '';
				$annual_inc = '';
				$married_unmrd = '';
				$age_married = '';
			}else{
				$education = $_POST['txteducation'.$i];
				$occupation = $_POST['txtoccupation'.$i];
				$annual_inc = $_POST['txtannual_inc'.$i];
				$married_unmrd = $_POST['txtmarried_unmrd'.$i];
				$age_married = $_POST['txtage_married'.$i];
			}
			$item_rows = array('ref_id' => $ref_id, 'list_id' => $list_id, 'survey_name_survey' => $name, 'survey_age_survey' => $age, 'survey_gender_survey' => $gender, 'survey_relationship_with_head_family' => $head_of_fly, 'survey_mother_child_relationship_survey' => $mother_chld_rel, 'survey_father_child_relationship_survey' => $father_chld_rel, 'survey_guardian_child_relationship_survey' => $guardian_chld_rel, 'survey_alive_dead_survey' => $alive_dead, 'survey_education_survey' => $education, 'survey_occupation_survey' => $occupation, 'survey_annual_income_survey' => $annual_inc, 'survey_marital_status_survey' => $married_unmrd, 'survey_married_age_survey' => $age_married);
			$this->db->insert('household_survey_list', $item_rows); 
			//$i++;
			}
		return true;
		}else return false;
	}
	
	function edithouseholdsurvey($post){		
		$voterid 	= $_POST['txtvoterid'];
		$headmem 	= $_POST['txthead_fly'];
		$addr1 		= $_POST['txtaddr1'];
		$num 		= $_POST['txtnumlist'];
		$num1 		= $_POST['txttotnum'];
		$religion 	= $_POST['radreligion'];
		$caste 		= $_POST['radcaste'];
		$addr 		= $addr1;
		$data 		= array('household_voters_id' => $voterid, 'survey_name_of_head_family' => $headmem, 'survey_address_of_head_family' => $addr, 'survey_religion_survey' => $religion, 'survey_caste_survey' => $caste);
		$sqlcheck = "select * from household_entry where household_voters_id = '".$voterid."'";
		$querycheck = $this->db->query($sqlcheck);
		if($querycheck->num_rows() == 1) {
			$this->db->where('household_voters_id', $voterid);
			$this->db->update('household_survey_main', array('household_voters_id' => $voterid, 'survey_name_of_head_family' => $headmem, 'survey_address_of_head_family' => $addr, 'survey_religion_survey' => $religion, 'survey_caste_survey' => $caste)); 
			$sqlhid = "SELECT household_survey_main_id as id FROM household_survey_main WHERE household_voters_id = '".$voterid."'";
			$queryhid = $this->db->query($sqlhid);
			if ($queryhid->num_rows() > 0) {
				$updated = $queryhid->row(0)->id;
			}
			//$updated = $this->db->update();
			if($updated){
				for($i=1; $i <= $num; $i++){
					$list_id = $_POST['txtsno'.$i];
					$ref_id = $updated;
					$name = $_POST['txtname'.$i];
					$age = $_POST['txtage'.$i];
					$gender = $_POST['txtgender'.$i];
					$head_of_fly = $_POST['txthead_of_fly'.$i];
					$mother_chld_rel = $_POST['txtmother_chld_rel'.$i];
					$father_chld_rel = $_POST['txtfather_chld_rel'.$i];
					$guardian_chld_rel = $_POST['txtguardian_chld_rel'.$i];
					$alive_dead = $_POST['txtalive_dead'.$i];
					if($alive_dead == 2){
						$education = '';
						$occupation = '';
						$annual_inc = '';
						$married_unmrd = '';
						$age_married = '';
					}else{
						$education = $_POST['txteducation'.$i];
						$occupation = $_POST['txtoccupation'.$i];
						$annual_inc = $_POST['txtannual_inc'.$i];
						$married_unmrd = $_POST['txtmarried_unmrd'.$i];
						$age_married = $_POST['txtage_married'.$i];
					}
					$item_rows = array('ref_id' => $ref_id, 'list_id' => $list_id, 'survey_name_survey' => $name, 'survey_age_survey' => $age, 'survey_gender_survey' => $gender, 'survey_relationship_with_head_family' => $head_of_fly, 'survey_mother_child_relationship_survey' => $mother_chld_rel, 'survey_father_child_relationship_survey' => $father_chld_rel, 'survey_guardian_child_relationship_survey' => $guardian_chld_rel, 'survey_alive_dead_survey' => $alive_dead, 'survey_education_survey' => $education, 'survey_occupation_survey' => $occupation, 'survey_annual_income_survey' => $annual_inc, 'survey_marital_status_survey' => $married_unmrd, 'survey_married_age_survey' => $age_married);
					$this->db->where(array('ref_id' => $ref_id, 'list_id' => $list_id));
					$this->db->update('household_survey_list', $item_rows); 
				}
				if($num1 > $num) {
				$newnum = $num + 1;
					for($j=$newnum; $j <= $num1; $j++){
						$list_id = $_POST['txtsno'.$j];
						$ref_id = $updated;
						$name = $_POST['txtname'.$j];
						$age = $_POST['txtage'.$j];
						$gender = $_POST['txtgender'.$j];
						$head_of_fly = $_POST['txthead_of_fly'.$j];
						$mother_chld_rel = $_POST['txtmother_chld_rel'.$j];
						$father_chld_rel = $_POST['txtfather_chld_rel'.$j];
						$guardian_chld_rel = $_POST['txtguardian_chld_rel'.$j];
						$alive_dead = $_POST['txtalive_dead'.$j];
						if($alive_dead == 2){
							$education = '';
							$occupation = '';
							$annual_inc = '';
							$married_unmrd = '';
							$age_married = '';
						}else{
							$education = $_POST['txteducation'.$j];
							$occupation = $_POST['txtoccupation'.$j];
							$annual_inc = $_POST['txtannual_inc'.$j];
							$married_unmrd = $_POST['txtmarried_unmrd'.$j];
							$age_married = $_POST['txtage_married'.$j];
						}
						$item_rows = array('ref_id' => $ref_id, 'list_id' => $list_id, 'survey_name_survey' => $name, 'survey_age_survey' => $age, 'survey_gender_survey' => $gender, 'survey_relationship_with_head_family' => $head_of_fly, 'survey_mother_child_relationship_survey' => $mother_chld_rel, 'survey_father_child_relationship_survey' => $father_chld_rel, 'survey_guardian_child_relationship_survey' => $guardian_chld_rel, 'survey_alive_dead_survey' => $alive_dead, 'survey_education_survey' => $education, 'survey_occupation_survey' => $occupation, 'survey_annual_income_survey' => $annual_inc, 'survey_marital_status_survey' => $married_unmrd, 'survey_married_age_survey' => $age_married);
						$this->db->insert('household_survey_list', $item_rows); 
					}
				}
			}
			return true;
		}else{
			return false;
		}
		
	    //$this->db->insert('household_survey_main', $data);  
		//$updated = $this->db->update();
		/*if($updated){
			for($i=1; $i <= $num; $i++){
			$list_id = $_POST['txtsno'.$i];
			$ref_id = $updated;
			$name = $_POST['txtname'.$i];
			$age = $_POST['txtage'.$i];
			$gender = $_POST['txtgender'.$i];
			$head_of_fly = $_POST['txthead_of_fly'.$i];
			$mother_chld_rel = $_POST['txtmother_chld_rel'.$i];
			$father_chld_rel = $_POST['txtfather_chld_rel'.$i];
			$guardian_chld_rel = $_POST['txtguardian_chld_rel'.$i];
			$alive_dead = $_POST['txtalive_dead'.$i];
			$education = $_POST['txteducation'.$i];
			$occupation = $_POST['txtoccupation'.$i];
			$annual_inc = $_POST['txtannual_inc'.$i];
			$married_unmrd = $_POST['txtmarried_unmrd'.$i];
			$age_married = $_POST['txtage_married'.$i];
			$item_rows = array('ref_id' => $ref_id, 'list_id' => $list_id, 'survey_name_survey' => $name, 'survey_age_survey' => $age, 'survey_gender_survey' => $gender, 'survey_relationship_with_head_family' => $head_of_fly, 'survey_mother_child_relationship_survey' => $mother_chld_rel, 'survey_father_child_relationship_survey' => $father_chld_rel, 'survey_guardian_child_relationship_survey' => $guardian_chld_rel, 'survey_alive_dead_survey' => $alive_dead, 'survey_education_survey' => $education, 'survey_occupation_survey' => $occupation, 'survey_annual_income_survey' => $annual_inc, 'survey_marital_status_survey' => $married_unmrd, 'survey_married_age_survey' => $age_married);
			$this->db->insert('household_survey_list', $item_rows); 
			//$i++;
			}
		return true;
		}else return false;*/
	}
}
class Householdsurvey_model extends Base_module_model {

}