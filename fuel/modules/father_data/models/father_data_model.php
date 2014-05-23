<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class father_data_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('father_data');
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
		$checkdata = "select * from ocop_father_data where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
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
		$sql = "select child_name, father_name, religion, caste from ocop_general_info where household_voters_id = '".$hid."' and summary_id = '".$summaryid."' LIMIT 0,1";
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
		$fatherstatus 		= $_POST['fatherstatus'];
		$fathername 		= $_POST['fathername'];
		$fatherdob		= $_POST['fatherdob'];
		$fatherpreaddr 		= $_POST['fatherpreaddr'];
		$fatherperaddr		= $_POST['fatherperaddr'];
		$fatherreligion	    	= $_POST['fatherreligion'];
		$fathercaste 		= $_POST['fathercaste'];
		$fatherration		= $_POST['fatherration'];
		$fatherrationtype 	= $_POST['fatherrationtype'];
		$fathermrg 		= $_POST['fathermrg'];
		$fathermrgage 		= $_POST['fathermrgage'];
		$fatherhos 		= $_POST['fatherhos'];
		$fatherhosdate 		= $_POST['fatherhosdate'];
		
		$data = array(  'household_voters_id' => $voterid, 
			        'summary_id' => $summary_id, 
				'fatherstatus' => $fatherstatus, 
				'fathername' => $fathername,
				'fatherdob' => $fatherdob,
				'fatherpreaddr' => $fatherpreaddr, 
				'fatherperaddr' => $fatherperaddr,
				'fatherreligion' => $fatherreligion, 
				'fathercaste' => $fathercaste, 
				'fatherration' => $fatherration, 
				'fatherrationtype' => $fatherrationtype, 
				'fathermrg' => $fathermrg, 
				'fathermrgage' => $fathermrgage, 
				'fatherhosvisited' => $fatherhos, 
				'fatherhosdate' => $fatherhosdate, 
				
				);
	    $this->db->insert('ocop_father_data', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class father_datamodel extends Base_module_record {
 	
}
