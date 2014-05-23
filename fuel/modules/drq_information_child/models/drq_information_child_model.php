<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_information_child_model extends Base_module_model {

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
		$father_death = $_POST['father_death'];
		$relationship = $_POST['relationship'];
		$child_death = $_POST['child_death'];
		$num_child_death = $_POST['num_child_death'];
		$num_pre_birth 	 = $_POST['num_pre_birth'];
		$num_post_birth  = $_POST['num_post_birth'];
		$mother_death 	 = $_POST['mother_death'];
		$pregnancy_period = $_POST['pregnancy_period'];
		$general     = $_POST['general'];
		$data = array('household_voters_id' => $voterid, 'door_num' => $doornum, 'sdate' => $sdate, 'village' => $village, 'grama' => $grama, 'taluk' => $taluk, 'district' => $district, 'divison' => $divison, 'headname' => $headname, 'enumerator' => $enumerator, 'respondant' => $respondant, 'father_death' => $father_death, 'relationship' => $relationship, 'child_death' => $child_death, 'num_child_death' => $num_child_death, 'num_pre_birth' => $num_pre_birth, 'num_post_birth' => $num_post_birth, 'mother_death' => $mother_death, 'pregnancy_period' => $pregnancy_period, 'general' => $general);
	    $this->db->insert('drq_summary', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
}

class drq_information_childmodel extends Base_module_record {
 	
}