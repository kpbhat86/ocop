<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class current_details_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('current_details');
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
	
	function savecurrentdetails($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$child_weight 		= $_POST['child_weight'];
		$child_height 		= $_POST['child_height'];
		$child_disability	= $_POST['child_disability'];
		$child_problem 		= $_POST['child_problem'];
		$assistance_recieved = $_POST['assistance_recieved'];
		$assistance_given  	= $_POST['assistance_given'];
		$health_center 		= $_POST['health_center'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'child_weight' => $child_weight, 'child_height' => $child_height, 'child_disability' => $child_disability, 'child_problem' => $child_problem, 'assistance_recieved' => $assistance_recieved, 'assistance_given' => $assistance_given, 'health_center' => $health_center);
	    $this->db->insert('ocop_current_details', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	function checkrecord($_REQUEST) {
		if($_REQUEST){
		$household_id = $_REQUEST["household_id"];
		$child_name = $_REQUEST["child_name"];
		}
		$checkdata = "select * from ocop_current_details where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 0)
		{
			echo '0';
		}else{
			echo '1';
		}
	}
	
	
}

class current_detailsmodel extends Base_module_record {
 	
}