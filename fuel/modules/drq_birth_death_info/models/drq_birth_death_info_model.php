<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_birth_death_info_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('drq_birth_death_info');
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
	
	function savebirthdetails($post){		
		$voterid 		= $_POST['voterid'];
		$summary_id 	= $_POST['summary_id'];
		$birth_reason 	= $_POST['birth_reason'];
		$anc_1 			= $_POST['anc_1'];
		$anc_2			= $_POST['anc_2'];
		$anc_3 			= $_POST['anc_3'];
		$services_received 	= $_POST['services_received'];
		$treatment_visit  	= $_POST['treatment_visit'];
		$advice_recieved 	= $_POST['advice_recieved'];
		$pregnancy_period	= $_POST['pregnancy_period'];
		$delivery_place 	= $_POST['delivery_place'];
		$delivered_home_assisted = $_POST['delivered_home_assisted'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'birth_reason' => $birth_reason, 'anc_1' => $anc_1, 'anc_2' => $anc_2, 'anc_3' => $anc_3, 'services_received' => $services_received, 'treatment_visit' => $treatment_visit, 'advice_recieved' => $advice_recieved, 'pregnancy_period' => $pregnancy_period, 'delivery_place' => $delivery_place, 'delivered_home_assisted' => $delivered_home_assisted);
	    $this->db->insert('drq_birth_death_info', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class drq_birth_death_infomodel extends Base_module_record {
 	
}