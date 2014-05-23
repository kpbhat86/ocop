<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class protection_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('protection');
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
		$checkdata = "select * from ocop_protection where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
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
		$sql = "select survey_occupation_survey from ocop_summary left join household_survey_main ON (ocop_summary.household_voters_id = household_survey_main.household_voters_id) left join household_survey_list ON (household_survey_list.ref_id = household_survey_main.household_survey_main_id) where ocop_summary.household_voters_id = '".$hid."' and ocop_summary_id = '".$summaryid."' LIMIT 0,1";
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
	
	function saveprotection($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$child_working 		= $_POST['child_working'];
		$working_status 	= $_POST['working_status'];
		$whom_work 			= $_POST['whom_work'];
		$work_type			= $_POST['work_type'];
		$missing 			= $_POST['missing'];
		$missing_reason  	= $_POST['missing_reason'];
		$missing_date 		= $_POST['missing_date'];
		$fir_registered		= $_POST['fir_registered'];
		$fir_date			= $_POST['fir_date'];
		$child_return		= $_POST['child_return'];
		$return_date 		= $_POST['return_date'];
		$child_marriage 	= $_POST['child_marriage'];
		$marriage_date 		= $_POST['marriage_date'];
		$minor_pregnancy 	= $_POST['minor_pregnancy'];
		$devadasi_mother 	= $_POST['devadasi_mother'];
		$devadasi_system 	= $_POST['devadasi_system'];
		$devadasi_reason	= $_POST['devadasi_reason'];
		$child_rescued		= $_POST['child_rescued'];
		$before_cwc		 	= $_POST['before_cwc'];
		$service_kind		= $_POST['service_kind'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'child_working' => $child_working, 'working_status' => $working_status, 'work_type' => $work_type, 'whom_work' => $whom_work, 'missing' => $missing, 'missing_reason' => $missing_reason, 'missing_date' => $missing_date, 'fir_registered' => $fir_registered, 'fir_date' => $fir_date, 'child_return' => $child_return, 'return_date' => $return_date, 'child_marriage' => $child_marriage, 'marriage_date' => $marriage_date, 'minor_pregnancy' => $minor_pregnancy, 'devadasi_mother' => $devadasi_mother, 'devadasi_system' => $devadasi_system, 'devadasi_reason' => $devadasi_reason, 'child_rescued' => $child_rescued, 'before_cwc' => $before_cwc, 'service_kind' => $service_kind);
	    $this->db->insert('ocop_protection', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	function checkDevadasi($post) {
		$voterid = $post["voterid"];
		$sql = "select devadasi_mother,devadasi_system from ocop_protection where household_voters_id = '".$voterid."'  LIMIT 0,1";
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
		print_r( $hli);
	}
	
}

class protectionmodel extends Base_module_record {
 	
}