<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class general_info_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('general_info');
    }
		
	function example(){
		return true;
	}

	function childname() {
		if(isset( $_POST['voterid'])) {
			$voterid = $_POST['voterid'];
		}
		$sqlcn = "select ocop_summary_id, child_name from ocop_summary WHERE household_voters_id='".$voterid."'"; 
		$query = $this->db->query($sqlcn);
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
	
	function getrecord($hid){
		if($_REQUEST){
			$hid = $_REQUEST["hid"];
			$sid = $_REQUEST["sid"];
		}
		$sql = "select * from ocop_general_info where household_voters_id = '".$hid."' and summary_id = '".$sid."'";
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
	
	function checkrecord($_REQUEST) {
		if($_REQUEST){
		$household_id = $_REQUEST["household_id"];
		$child_name = $_REQUEST["child_name"];
		}
		$checkdata = "select * from ocop_general_info where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 0)
		{
			echo '0';
		}else{
			echo '1';
		}
	}
	
	function childinfo($_REQUEST) {
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		$summaryid = $_REQUEST["summaryid"];
		}
		$sql = "select child_name, gender, father_name, mother_name, orphan, survey_religion_survey, survey_address_of_head_family, survey_caste_survey from ocop_summary left join household_survey_main ON ocop_summary.household_voters_id = household_survey_main.household_voters_id where ocop_summary.household_voters_id = '".$hid."' and ocop_summary_id = '".$summaryid."' LIMIT 0,1";
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
	
	function savegeneralinfo($post){		
		$voterid 	= $_POST['voterid'];
		$summary_id = $_POST['summary_id'];
		$child_name = $_POST['child_name'];
		$dob 		= $_POST['dob'];
		$gender		= $_POST['gender'];
		$father_name= $_POST['father_name'];
		$mother_name= $_POST['mother_name'];
		$present_addr = $_POST['present_addr'];
		$permanent_addr = $_POST['permanent_addr'];
		$child_living	= $_POST['child_living'];
		$child_orphan 	= $_POST['child_orphan'];
		$child_orphan_yes = $_POST['child_orphan_yes'];
		$child_orphan_since = $_POST['child_orphan_since'];
		$adopted_child 		= $_POST['adopted_child'];
		$religion 	= $_POST['religion'];
		$caste		= $_POST['caste'];
		$ration_card_name 	= $_POST['ration_card_name'];
		$ration_card_type 	= $_POST['ration_card_type'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'child_name' => $child_name, 'dob' => $dob, 'gender' => $gender, 'father_name' => $father_name, 'mother_name' => $mother_name, 'present_addr' => $present_addr, 'permanent_addr' => $permanent_addr, 'child_living' => $child_living, 'child_orphan' => $child_orphan, 'child_orphan_yes' => $child_orphan_yes, 'child_orphan_since' => $child_orphan_since, 'adopted_child' => $adopted_child, 'religion' => $religion, 'caste' => $caste, 'ration_card_name' => $ration_card_name, 'ration_card_type' => $ration_card_type);
	    $this->db->insert('ocop_general_info', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	function updategeneralinfo($post){		
		$voterid 	= $_POST['voterid'];
		$summary_id = $_POST['summary_id'];
		$child_name = $_POST['child_name'];
		$dob 		= $_POST['dob'];
		$gender		= $_POST['gender'];
		$father_name= $_POST['father_name'];
		$mother_name= $_POST['mother_name'];
		$present_addr = $_POST['present_addr'];
		$permanent_addr = $_POST['permanent_addr'];
		$child_living	= $_POST['child_living'];
		$child_orphan 	= $_POST['child_orphan'];
		$child_orphan_yes = $_POST['child_orphan_yes'];
		$child_orphan_since = $_POST['child_orphan_since'];
		$adopted_child 		= $_POST['adopted_child'];
		$religion 	= $_POST['religion'];
		$caste		= $_POST['caste'];
		$ration_card_name 	= $_POST['ration_card_name'];
		$ration_card_type 	= $_POST['ration_card_type'];
		$checkdata = "select * from ocop_general_info where household_voters_id = '".$voterid."' and summary_id = '".$summary_id."'"; 
		//echo $checkdata;
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 1)
		{
			$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'child_name' => $child_name, 'dob' => $dob, 'gender' => $gender, 'father_name' => $father_name, 'mother_name' => $mother_name, 'present_addr' => $present_addr, 'permanent_addr' => $permanent_addr, 'child_living' => $child_living, 'child_orphan' => $child_orphan, 'child_orphan_yes' => $child_orphan_yes, 'child_orphan_since' => $child_orphan_since, 'adopted_child' => $adopted_child, 'religion' => $religion, 'caste' => $caste, 'ration_card_name' => $ration_card_name, 'ration_card_type' => $ration_card_type);
			$this->db->where(array('household_voters_id' => $voterid, 'summary_id' => $summary_id));
			$this->db->update('ocop_general_info', $data);  
			echo "<font color='green'><b>Record updated successfully!</b></font>";
		}else{
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
	
	
}

class general_infomodel extends Base_module_record {
 	
}