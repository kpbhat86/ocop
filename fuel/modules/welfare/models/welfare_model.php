<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class welfare_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('welfare');
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
		$checkdata = "select * from ocop_welfare where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
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
		$sql = "select gender from ocop_summary where ocop_summary.household_voters_id = '".$hid."' and ocop_summary_id = '".$summaryid."' LIMIT 0,1";
		/*$sql = "select survey_gender_survey from ocop_summary left join household_survey_main ON (ocop_summary.household_voters_id = household_survey_main.household_voters_id) left join household_survey_list ON (household_survey_list.ref_id = household_survey_main.household_survey_main_id) where ocop_summary.household_voters_id = '".$hid."' and ocop_summary_id = '".$summaryid."' LIMIT 0,1";*/
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
	
	function savewelfare($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$bhagyalaxmi_scheme = $_POST['bhagyalaxmi_scheme'];
		$bicycle_scheme 	= $_POST['bicycle_scheme'];
		$devadasi_scheme	= $_POST['devadasi_scheme'];
		$disability_certificate = $_POST['disability_certificate'];
		$facilities_provided = $_POST['facilities_provided'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'bhagyalaxmi_scheme' => $bhagyalaxmi_scheme, 'bicycle_scheme' => $bicycle_scheme, 'devadasi_scheme' => $devadasi_scheme, 'disability_certificate' => $disability_certificate, 'facilities_provided' => $facilities_provided);
	    $this->db->insert('ocop_welfare', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
}

class welfaremodel extends Base_module_record {
 	
}