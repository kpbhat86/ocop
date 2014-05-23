<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class information_child_model extends Base_module_model {

protected $key_field = 'states';
	function __construct(){
        parent::__construct('birth_details');
    }
		
	function example(){
		return true;
	}
	
	function householdinfo($hlist) {
		if($_REQUEST){
		$hlist = $_REQUEST["hid"];
		}
		$sql = "select * from household_entry where household_voters_id = '".$hlist."' LIMIT 0,1";
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
	
	function hhinfo($_REQUEST) {
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		$cname = $_REQUEST["childname"];
		}
		$sql = "select m.*, l.*, e.* from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) LEFT JOIN household_entry as e ON (e.household_voters_id = m.household_voters_id) where m.household_voters_id = '".$hid."' and l.survey_name_survey = '".$cname."' LIMIT 0,1";
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
	
	function householdcinfo($hid) {
		if(isset( $_POST['hid'])) {
			$hid = $_POST['hid'];
		}
		$sql = "select survey_name_survey from household_survey_main as m LEFT JOIN household_survey_list as l ON (l.ref_id = m.household_survey_main_id) where household_voters_id = '".$hid."' and survey_age_survey <= '18'"; 

		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] = $row;
			}
		} 
		return $arr;
	}
	
	function getrecord($hid){
		if($_REQUEST){
			$hid = $_REQUEST["hid"];
			$sid = $_REQUEST["sid"];
		}
		$sql = "select * from ocop_summary where household_voters_id = '".$hid."' and ocop_summary_id = '".$sid."'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] = $row;
			}
		}
		$getrecord = json_encode($arr);
		echo $getrecord;
	}
	
	
	function savesummary($post){		
		$voterid 	= $_POST['voterid'];
		$doornum 	= $_POST['doornum'];
		$sdate 		= $_POST['sdate'];
		$village	= $_POST['village'];
		$grama 		= $_POST['grama'];
		$taluk 		= $_POST['taluk'];
		$district 	= $_POST['district'];
		$divison 	= $_POST['divison'];
		$headname	= $_POST['headname'];
		$enumerator = $_POST['enumerator'];
		$respondant = $_POST['respondant'];
		$guardian 	= $_POST['guardian'];
		$relationship = $_POST['relationship'];
		$mname 		= $_POST['mname'];
		$fname		= $_POST['fname'];
		$cname 		= $_POST['cname'];
		$age 		= $_POST['age'];
		$gender 	= $_POST['gender'];
		$pclass 	= $_POST['pclass'];
		$orphan		= $_POST['orphan'];
		$disability = $_POST['disability'];
		
		$checkdata = "select * from ocop_summary where household_voters_id = '".$voterid."' and child_name = '".$cname."'"; 
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 0)
		{		
			$data = array('household_voters_id' => $voterid, 'door_num' => $doornum, 'sdate' => $sdate, 'village' => $village, 'grama' => $grama, 'taluk' => $taluk, 'district' => $district, 'divison' => $divison, 'headname' => $headname, 'enumerator' => $enumerator, 'respondant' => $respondant, 'guardian' => $guardian, 'relationship' => $relationship, 'mother_name' => $mname, 'father_name' => $fname, 'child_name' => $cname, 'age' => $age, 'gender' => $gender, 'present_class' => $pclass, 'orphan' => $orphan, 'disability_type' => $disability);
			$this->db->insert('ocop_summary', $data);  
			$inserted = $this->db->insert_id();
			if($inserted){ 
				echo "<font color='green'><b>Record entered successfully!</b></font>";
			}else{ 
				echo "<font color='Red'><b>Unable to Process.!</b></font>";
			}
		}else{
			echo "<font color='Red'><b>Record Already Present.!</b></font>";
		}
	}
	
	
	function updatesummary($post){		
		$voterid 	= $_POST['voterid'];
		$doornum 	= $_POST['doornum'];
		$sdate 		= $_POST['sdate'];
		$village	= $_POST['village'];
		$grama 		= $_POST['grama'];
		$taluk 		= $_POST['taluk'];
		$district 	= $_POST['district'];
		$divison 	= $_POST['divison'];
		$headname	= $_POST['headname'];
		$enumerator = $_POST['enumerator'];
		$respondant = $_POST['respondant'];
		$guardian 	= $_POST['guardian'];
		$relationship = $_POST['relationship'];
		$mname 		= $_POST['mname'];
		$fname		= $_POST['fname'];
		$cname 		= $_POST['cname'];
		$age 		= $_POST['age'];
		$gender 	= $_POST['gender'];
		$pclass 	= $_POST['pclass'];
		$orphan		= $_POST['orphan'];
		$disability = $_POST['disability'];
		
		$checkdata = "select * from ocop_summary where household_voters_id = '".$voterid."' and child_name = '".$cname."'"; 
		//echo $checkdata;
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 1)
		{		
			$data = array('household_voters_id' => $voterid, 'door_num' => $doornum, 'sdate' => $sdate, 'village' => $village, 'grama' => $grama, 'taluk' => $taluk, 'district' => $district, 'divison' => $divison, 'headname' => $headname, 'enumerator' => $enumerator, 'respondant' => $respondant, 'guardian' => $guardian, 'relationship' => $relationship, 'mother_name' => $mname, 'father_name' => $fname, 'child_name' => $cname, 'age' => $age, 'gender' => $gender, 'present_class' => $pclass, 'orphan' => $orphan, 'disability_type' => $disability);
			$this->db->where(array('household_voters_id' => $voterid, 'child_name' => $cname));
			$this->db->update('ocop_summary', $data);  
			echo "<font color='green'><b>Record updated successfully!</b></font>";
		}else{
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
}

class information_childmodel extends Base_module_record {
 	
}