<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class guardian_data_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('guardian_data');
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
		$checkdata = "select * from ocop_guardian_data where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
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
		$sql = "select guardian from ocop_summary where household_voters_id = '".$hid."' and ocop_summary_id  = '".$summaryid."' LIMIT 0,1";
		//echo $sql;
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
		$voterid 		= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$guardianstatus 	= $_POST['guardianstatus'];
		$guardianname 		= $_POST['guardianname'];
		$guardiandob		= $_POST['guardiandob'];
		$guardianpreaddr 	= $_POST['guardianpreaddr'];
		$guardianperaddr	= $_POST['guardianperaddr'];
		$guardianreligion	= $_POST['guardianreligion'];
		$guardiancaste 		= $_POST['guardiancaste'];
		$guardianration		= $_POST['guardianration'];
		$guardianrationtype 	= $_POST['guardianrationtype'];
		$guardianmrg 		= $_POST['guardianmrg'];
		$guardianmrgage 	= $_POST['guardianmrgage'];
		$guardianhos 		= $_POST['guardianhos'];
		$guardianhosdate 	= $_POST['guardianhosdate'];
		
		$data = array(  'household_voters_id' => $voterid, 
			        'summary_id' => $summary_id, 
				'guardian_status' => $guardianstatus, 
				'guardian_name' => $guardianname,
				'guardian_dob' => $guardiandob,
				'guardian_preaddr' => $guardianpreaddr, 
				'guardian_peraddr' => $guardianperaddr,
				'guardian_religion' => $guardianreligion, 
				'guardian_caste' => $guardiancaste, 
				'guardian_ration' => $guardianration, 
				'guardian_rationtype' => $guardianrationtype, 
				'guardian_mrg' => $guardianmrg, 
				'guardian_mrgage' => $guardianmrgage, 
				'guardian_hosvisited' => $guardianhos, 
				'guardian_hosdate' => $guardianhosdate, 
				
				);
	    $this->db->insert('ocop_guardian_data', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class guardian_datamodel extends Base_module_record {
 	
}
