<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_general_info_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('drq_general_info');
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
	
	function childinfo($_REQUEST) {
		if($_REQUEST){
		$hid = $_REQUEST["hid"];
		$summaryid = $_REQUEST["summaryid"];
		}
		$sql = "select gender, dob from ocop_general_info where household_voters_id = '".$hid."' and summary_id = '".$summaryid."' LIMIT 0,1";
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
		$death_reason = $_POST['death_reason'];
		$dob 		= $_POST['dob'];
		$dod		= $_POST['dod'];
		$periodfordeath= $_POST['periodfordeath'];
		$deathreg= $_POST['deathreg'];
		$gender = $_POST['gender'];
		$mothercarrying = $_POST['mothercarrying'];
		$anc2	= $_POST['anc2'];
		$anc3 	= $_POST['anc3'];
		$services = $_POST['services'];
		$visitinghospital = $_POST['visitinghospital'];
		$pregnecyperiod 		= $_POST['pregnecyperiod'];
		$deleveryplace 	= $_POST['deleveryplace'];
		$childedustatus		= $_POST['childedustatus'];
		$birthorder	= $_POST['birthorder'];
		$immudeath 	= $_POST['immudeath'];
		$anc1           = $_POST['anc1'];
		$treatmentstatus3 = $_POST['treatmentstatus3'];
		$deleveryassist = $_POST['deleveryassist'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'death_reason' => $death_reason, 'dob' => $dob, 'dod' => $dod, 'periodfordeath' => $periodfordeath, 'deathreg' => $deathreg, 'gender' => $gender, 'mothercarrying' => $mothercarrying, 'anc2' => $anc2, 'anc3' => $anc3, 'services' => $services, 'visitinghospital' => $visitinghospital, 'pregnecyperiod' => $pregnecyperiod, 'deleveryplace' => $deleveryplace, 'childedustatus' => $childedustatus, 'birthorder' => $birthorder, 'immudeath' => $immudeath,'anc1' => $anc1,'treatmentstatus3' => $treatmentstatus3,'deleveryassist' => $deleveryassist);
	    $this->db->insert('drq_general_info', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class drq_general_infomodel extends Base_module_record {
 	
}
