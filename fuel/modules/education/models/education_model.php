<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class education_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('education');
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
	
	function checkrecord($_REQUEST) {
		if($_REQUEST){
		$household_id = $_REQUEST["household_id"];
		$child_name = $_REQUEST["child_name"];
		}
		$checkdata = "select * from ocop_education where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
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
		$sql = "select survey_education_survey from ocop_summary left join household_survey_main ON (ocop_summary.household_voters_id = household_survey_main.household_voters_id) left join household_survey_list ON (household_survey_list.ref_id = household_survey_main.household_survey_main_id) where ocop_summary.household_voters_id = '".$hid."' and ocop_summary_id = '".$summaryid."' LIMIT 1,1";
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
	
	function saveeducation($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$enrollment_school 	= $_POST['enrollment_school'];
		$present_class 		= $_POST['present_class'];
		$enrollment_pre_primary	= $_POST['enrollment_pre_primary'];
		$pre_primary_type 		= $_POST['pre_primary_type'];
		$pre_primary_date 	= $_POST['pre_primary_date'];
		$enrollment_primary = $_POST['enrollment_primary'];
		$primary_type 		= $_POST['primary_type'];
		$primary_date 		= $_POST['primary_date'];
		$present_school		= $_POST['present_school'];
		$attending_regularly 	= $_POST['attending_regularly'];
		$mismatch_reason 	= $_POST['mismatch_reason'];
		$non_enrollment_reasons = $_POST['non_enrollment_reasons'];
		$drop_out_reason 		= $_POST['drop_out_reason'];
		$re_enrolment_attempts 	= $_POST['re_enrolment_attempts'];
		$failure_attempts_reasons	= $_POST['failure_attempts_reasons'];
		$disabled_facilities 		= $_POST['disabled_facilities'];
		$special_school		= $_POST['special_school'];
		$transport_mode  	= $_POST['transport_mode'];
		$distance_traveled 	= $_POST['distance_traveled'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'enrollment_school' => $enrollment_school, 'present_class' => $present_class, 'enrollment_pre_primary' => $enrollment_pre_primary, 'pre_primary_type' => $pre_primary_type, 'pre_primary_date' => $pre_primary_date, 'enrollment_primary' => $enrollment_primary, 'primary_type' => $primary_type, 'primary_date' => $primary_date, 'present_school' => $present_school, 'attending_regularly' => $attending_regularly, 'mismatch_reason' => $mismatch_reason, 'non_enrollment_reasons' => $non_enrollment_reasons, 'drop_out_reason' => $drop_out_reason, 're_enrolment_attempts' => $re_enrolment_attempts, 'failure_attempts_reasons' => $failure_attempts_reasons, 'disabled_facilities' => $disabled_facilities, 'special_school' => $special_school, 'transport_mode' => $transport_mode, 'distance_traveled' => $distance_traveled);
	    $this->db->insert('ocop_education', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class educationmodel extends Base_module_record {
 	
}