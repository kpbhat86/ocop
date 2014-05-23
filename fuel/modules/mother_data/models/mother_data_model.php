<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class mother_data_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('mother_data');
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
		$checkdata = "select * from ocop_mother_data where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
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
		$sql = "select child_name, mother_name, religion, caste from ocop_general_info where household_voters_id = '".$hid."' and summary_id = '".$summaryid."' LIMIT 0,1";
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
	
	function savemotherdata($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$mother_status 		= $_POST['mother_status'];
		$mother_name 		= $_POST['mother_name'];
		$mother_dob			= $_POST['mother_dob'];
		$present_address 	= $_POST['present_address'];
		$permanent_address 	= $_POST['permanent_address'];
		$mother_religion  	= $_POST['mother_religion'];
		$mother_caste 		= $_POST['mother_caste'];
		$ration_status		= $_POST['ration_status'];
		$ration_type 		= $_POST['ration_type'];
		$marriage_date 		= $_POST['marriage_date'];
		$marriage_age 		= $_POST['marriage_age'];
		$hospital_visited 	= $_POST['hospital_visited'];
		$hospital_reason 	= $_POST['hospital_reason'];
		$hospital_reason_anc1 = $_POST['hospital_reason_anc1'];
		$hospital_reason_anc2 = $_POST['hospital_reason_anc2'];
		$hospital_reason_anc3 = $_POST['hospital_reason_anc3'];
		$madilu_scheme 		= $_POST['madilu_scheme'];
		$taayi_scheme 		= $_POST['taayi_scheme'];
		$janani_scheme		= $_POST['janani_scheme'];
		$services_recieved 	= $_POST['services_recieved'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'mother_status' => $mother_status, 'mother_name' => $mother_name, 'mother_dob' => $mother_dob, 'present_address' => $present_address, 'permanent_address' => $permanent_address, 'mother_religion' => $mother_religion, 'mother_caste' => $mother_caste, 'ration_status' => $ration_status, 'ration_type' => $ration_type, 'marriage_date' => $marriage_date, 'marriage_age' => $marriage_age, 'hospital_visited' => $hospital_visited, 'hospital_reason_anc1' => $hospital_reason_anc1, 'hospital_reason_anc2' => $hospital_reason_anc2, 'hospital_reason_anc3' => $hospital_reason_anc3, 'madilu_scheme' => $madilu_scheme, 'taayi_scheme' => $taayi_scheme, 'janani_scheme' => $janani_scheme, 'services_recieved' => $services_recieved);
	    $this->db->insert('ocop_mother_data', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class motherdatamodel extends Base_module_record {
 	
}