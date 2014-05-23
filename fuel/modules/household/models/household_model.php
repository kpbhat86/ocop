<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class household_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('household_form1');
    }
		
	function example(){
		return true;
	}
	
	function hdetails($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select * from household_entry where household_voters_id = '".$hid."'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] = $row;
			}
		}
		$hdetails = json_encode($arr);
		echo $hdetails;
	}
	
	function hsurveydetails($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(household_survey_list_id) as total_num, COUNT(IF(survey_gender_survey = 1, 1, NULL)) as total_male, COUNT(IF(survey_gender_survey = 2, 2, NULL)) as total_female, COUNT(IF( survey_age_survey <=18, 0, NULL )) as total_child from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."'";
		/*$sql = "select count(household_survey_list_id) as total_num, COUNT(IF(survey_gender_survey = 1, 1, NULL)) as total_male, COUNT(IF(survey_gender_survey = 2, 2, NULL)) as total_female, COUNT(IF( survey_age_survey <=18, 0, NULL )) as total_child, COUNT( IF( survey_age_survey <=3, 0, NULL ) && IF( survey_gender_survey =1, 1, NULL ) ) AS age_male_03, COUNT( IF( survey_age_survey <=3, 0, NULL ) && IF( survey_gender_survey =2, 2, NULL ) ) AS age_female_03, COUNT( IF( survey_age_survey <=6, 3, NULL ) && IF( survey_gender_survey =1, 1, NULL ) ) AS age_male_36, COUNT( IF( survey_age_survey <=6, 3, NULL ) && IF( survey_gender_survey =2, 2, NULL ) ) AS age_female_36, COUNT( IF( survey_age_survey <=14, 6, NULL ) && IF( survey_gender_survey =1, 1, NULL ) ) AS age_male_614, COUNT( IF( survey_age_survey <=14, 6, NULL ) && IF( survey_gender_survey =2, 2, NULL ) ) AS age_female_614, COUNT( IF( survey_age_survey <=18, 14, NULL ) && IF( survey_gender_survey =1, 1, NULL ) ) AS age_male_1418, COUNT( IF( survey_age_survey <=18, 14, NULL ) && IF( survey_gender_survey =2, 2, NULL ) ) AS age_female_1418, COUNT( IF( survey_age_survey <=24, 18, NULL )) AS age_female_2418 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."'";*/
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$hsurveydetails = json_encode($arr);
		echo $hsurveydetails;
	}
	
	function male03($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_male_03 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 0 AND 3) AND survey_gender_survey = '1'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$male03 = json_encode($arr);
		echo $male03;
	}
	
	
		
		function processchk($id , $hid){
	$sqllv = "SELECT dob as process FROM ocop_general_info WHERE child_name='".$id."' and household_voters_id='".$hid."'";
		$query = $this->db->query($sqllv);
		$arr='';
		if ($query->num_rows() > 0) {
		 	foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}	
		return $arr;
	}
	
	
	function female03($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_female_03 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 0 AND 3) AND survey_gender_survey = '2'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$female03 = json_encode($arr);
		echo $female03;
	}
	
	function male36($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_male_36 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 4 AND 6) AND survey_gender_survey = '1'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$male36 = json_encode($arr);
		echo $male36;
	}
	
	function female36($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_female_36 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 4 AND 6) AND survey_gender_survey = '2'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$female36 = json_encode($arr);
		echo $female36;
	}
	
	function male614($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_male_614 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 7 AND 14) AND survey_gender_survey = '1'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$male614 = json_encode($arr);
		echo $male614;
	}
	
	function female614($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_female_614 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 7 AND 14) AND survey_gender_survey = '2'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$female614 = json_encode($arr);
		echo $female614;
	}
	
	function male1418($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_male_1418 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 15 AND 18) AND survey_gender_survey = '1'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$male1418 = json_encode($arr);
		echo $male1418;
	}
	
	function female1418($hid){
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		}
		$sql = "select count(survey_age_survey) as age_female_1418 from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' AND (survey_age_survey BETWEEN 15 AND 18) AND survey_gender_survey = '2'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
		}
		$female1418 = json_encode($arr);
		echo $female1418;
	}
	
	function state() {
		$sql = "select distinct states from house_dropdwn";
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
	
	function division() {
		$sql = "select distinct division  from house_dropdwn"; 
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
	function district() {
		$sql = "select distinct district  from house_dropdwn"; 
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
		
	function grama() {
	if(isset( $_POST['talukid'])) {
	   $talukid = $_POST['talukid'];
	}
	   $sqltl = "select  grama_panchayat from house_dropdwn WHERE taluk='".$talukid."'"; 
	 $query = $this->db->query($sqltl);
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

	function village() {
		if(isset( $_POST['id'])) {
			$gramaid = $_POST['id'];
		}
	   $sqlvl = "select villages from house_dropdwn WHERE grama_panchayat='".$gramaid."'"; 
	   $query = $this->db->query($sqlvl);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} 
		return $arr;
	}	
	
	
		function houseid() {
		if(isset( $_POST['id'])) {
			$villageid = $_POST['id'];
		}
		/*$sqlvl1 = "select id from house_dropdwn WHERE villages='".$villageid."'"; 
		$query1 = $this->db->query($sqlvl1);
		$arr='';
		if ($query1->num_rows() > 0)
		{
			foreach ($query1->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} */
		 //  print_r(); die();
	
	   $sqlvl = "select household_voters_id from household_entry WHERE entry_village_name='".$villageid."'"; 
	 //   print_r( $sqlvl); die();
	   $query = $this->db->query($sqlvl);
		$arr1='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr1[] =$row;
			}
			//var_dump($arr);
		} 
		// print_r($arr1); die();
		return $arr1;
	}
	
	

		function childid() {
		if(isset( $_POST['id'])) {
			$gramaid = $_POST['id'];
		}
	   $sqlvl = "select child_name from ocop_general_info WHERE household_voters_id='".$gramaid."'"; 
	   $query = $this->db->query($sqlvl);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} 
		return $arr;
	}	
	
	
	
	
	
	
	function panchayat() {
		if(isset( $_POST['id'])) {
			$gramaid = $_POST['id'];
		}
	   $sqlvl = "select Distinct(grama_panchayat) as panchayat from house_dropdwn WHERE taluk='".$gramaid."'"; 
	   $query = $this->db->query($sqlvl);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} 
		return $arr;
	}

	function ajax_taluk() {
		if(isset( $_POST['id'])) {
			$gramaid = $_POST['id'];
		}
	   $sqlvl = "select Distinct(taluk) as taluk from house_dropdwn WHERE district='".$gramaid."'"; 
	   $query = $this->db->query($sqlvl);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} 
		return $arr;
	}	

	function ajax_district() {
		if(isset( $_POST['id'])) {
			$gramaid = $_POST['id'];
		}
	   $sqlvl = "select Distinct(district) as district from house_dropdwn WHERE division='".$gramaid."'"; 
	   $query = $this->db->query($sqlvl);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} 
		return $arr;
	}	

	function ajax_division() {
		if(isset( $_POST['id'])) {
			$gramaid = $_POST['id'];
		}
	   $sqlvl = "select Distinct(division) as division from house_dropdwn WHERE states='".$gramaid."'"; 
	   $query = $this->db->query($sqlvl);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] =$row;
			}
			//var_dump($arr);
		} 
		return $arr;
	}
	
	function savehousehold($post){		
		$voterid 	= $_POST['voterid'];
		$state 		= $_POST['state'];
		$division 	= $_POST['division'];
		$district	= $_POST['district'];
		$block 		= $_POST['block'];
		$panchayat 	= $_POST['panchayat'];
		$village 	= $_POST['village'];
		$hdate 		= $_POST['hdate'];
		$headf		= $_POST['headf'];
		$doorno 	= $_POST['doorno'];
		$respondent = $_POST['respondent'];
		$enumerator = $_POST['enumerator'];
		$relationship = $_POST['relationship'];
		$ration 	= $_POST['ration'];
		$totppl		= $_POST['totppl'];
		$maleno 	= $_POST['maleno'];
		$femaleno 	= $_POST['femaleno'];
		$childtot 	= $_POST['childtot'];
		$child03m 	= $_POST['child03m'];
		$child36m	= $_POST['child36m'];
		$child64m 	= $_POST['child64m'];
		$child1418m = $_POST['child1418m'];
		$child03f 	= $_POST['child03f'];
		$child36f	= $_POST['child36f'];
		$child64f 	= $_POST['child64f'];
		$child1418f = $_POST['child1418f'];
		$totppl		= $_POST['totppl'];
		$corphannummale = $_POST['corphannummale'];
		$cdisabilitynummale = $_POST['cdisabilitynummale'];
		$corphannumfemale = $_POST['corphannumfemale'];
		$cdisabilitynumfemale = $_POST['cdisabilitynumfemale'];
		//$malenum 	= $_POST['malenum'];
		//$femalenum 	= $_POST['femalenum'];
		$cdeath		= $_POST['cdeath'];
		$mdeath 	= $_POST['mdeath'];
		$fdeath 	= $_POST['fdeath'];
		$data = array('household_voters_id' => $voterid, 'entry_village_name' => $village, 'entry_grama_panchayat' => $panchayat, 'entry_door_no' => $doorno, 'entry_date_today' => $hdate, 'entry_taluk_block' => $block, 'entry_district_name' => $district, 'entry_name_head_of_fly' => $headf, 'entry_division' => $division, 'entry_name_of_resp' => $respondent, 'entry_name_of_enum' => $enumerator, 'entry_rel_wid_child' => $relationship, 'entry_tot_no_ppl' => $totppl, 'entry_no_of_male_ppl' => $maleno, 'entry_no_of_female_ppl' => $femaleno, 'entry_type_of_rationcrd' => $ration, 'entry_tot_no_childrns' => $childtot, 'entry_age0_3yrsmale' => $child03m, 'entry_age3_6yrsmale' => $child36m, 'entry_age6_14yrsmale' => $child64m, 'entry_age14_18yrsmale' => $child1418m,'entry_age0_3yrsfemale' => $child03f, 'entry_age3_6yrsfemale' => $child36f, 'entry_age6_14yrsfemale' => $child64f, 'entry_age14_18yrsfemale' => $child1418f, 'entry_no_of_male_chld' => $maleno, 'entry_no_of_female_chld' => $femaleno, 'entry_no_child_disability_male' => $cdisabilitynummale, 'entry_no_of_male_orpdis' => $corphannummale, 'entry_no_of_female_orpdis' => $corphannumfemale, 'entry_no_child_disability_female' => $cdisabilitynumfemale, 'entry_child_death' => $cdeath, 'entry_mother_death' => $mdeath, 'entry_father_death' => $fdeath);
	    $this->db->insert('household_entry', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	function updatehousehold($post){		
		$voterid 	= $_POST['voterid'];
		$state 		= $_POST['state'];
		$division 	= $_POST['division'];
		$district	= $_POST['district'];
		$block 		= $_POST['block'];
		$panchayat 	= $_POST['panchayat'];
		$village 	= $_POST['village'];
		$hdate 		= $_POST['hdate'];
		$headf		= $_POST['headf'];
		$doorno 	= $_POST['doorno'];
		$respondent = $_POST['respondent'];
		$enumerator = $_POST['enumerator'];
		$relationship = $_POST['relationship'];
		$ration 	= $_POST['ration'];
		$totppl		= $_POST['totppl'];
		$maleno 	= $_POST['maleno'];
		$femaleno 	= $_POST['femaleno'];
		$childtot 	= $_POST['childtot'];
		$child03m 	= $_POST['child03m'];
		$child36m	= $_POST['child36m'];
		$child64m 	= $_POST['child64m'];
		$child1418m = $_POST['child1418m'];
		$child03f 	= $_POST['child03f'];
		$child36f	= $_POST['child36f'];
		$child64f 	= $_POST['child64f'];
		$child1418f = $_POST['child1418f'];
		$totppl		= $_POST['totppl'];
		$corphannummale = $_POST['corphannummale'];
		$cdisabilitynummale = $_POST['cdisabilitynummale'];
		$corphannumfemale = $_POST['corphannumfemale'];
		$cdisabilitynumfemale = $_POST['cdisabilitynumfemale'];
		$cdeath		= $_POST['cdeath'];
		$mdeath 	= $_POST['mdeath'];
		$fdeath 	= $_POST['fdeath'];
		$data = array('household_voters_id' => $voterid, 'entry_village_name' => $village, 'entry_grama_panchayat' => $panchayat, 'entry_door_no' => $doorno, 'entry_date_today' => $hdate, 'entry_taluk_block' => $block, 'entry_district_name' => $district, 'entry_name_head_of_fly' => $headf, 'entry_division' => $division, 'entry_name_of_resp' => $respondent, 'entry_name_of_enum' => $enumerator, 'entry_rel_wid_child' => $relationship, 'entry_tot_no_ppl' => $totppl, 'entry_no_of_male_ppl' => $maleno, 'entry_no_of_female_ppl' => $femaleno, 'entry_type_of_rationcrd' => $ration, 'entry_tot_no_childrns' => $childtot, 'entry_age0_3yrsmale' => $child03m, 'entry_age3_6yrsmale' => $child36m, 'entry_age6_14yrsmale' => $child64m, 'entry_age14_18yrsmale' => $child1418m,'entry_age0_3yrsfemale' => $child03f, 'entry_age3_6yrsfemale' => $child36f, 'entry_age6_14yrsfemale' => $child64f, 'entry_age14_18yrsfemale' => $child1418f, 'entry_no_of_male_chld' => $maleno, 'entry_no_of_female_chld' => $femaleno, 'entry_no_child_disability_male' => $cdisabilitynummale, 'entry_no_of_male_orpdis' => $corphannummale, 'entry_no_of_female_orpdis' => $corphannumfemale, 'entry_no_child_disability_female' => $cdisabilitynumfemale, 'entry_child_death' => $cdeath, 'entry_mother_death' => $mdeath, 'entry_father_death' => $fdeath);
		
		$sqlcheck = "select * from household_entry where household_voters_id = '".$voterid."'";
		$querycheck = $this->db->query($sqlcheck);
		if($querycheck->num_rows() == 1) {
			$this->db->where('household_voters_id', $voterid);
			$this->db->update('household_entry', $data); 
			return true;
		}else return false;
	    /*$this->db->insert('household_entry', $data);  
		$inserted = $this->db->insert_id();*/
		/*if($inserted){ 
			return true;
		}else return false;*/
	}
}

class householdmodel extends Base_module_record {
 	
}