<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class birth_details_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('birth_details');
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
	
	function getrecord($hid){
		if($_REQUEST){
			$hid = $_REQUEST["hid"];
			$sid = $_REQUEST["sid"];
		}
		$sql = "select * from ocop_birth_details where household_voters_id = '".$hid."' and summary_id = '".$sid."'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] = $row;
			}
		}
		$getrecord = json_encode($arr);
		echo $getrecord;
	}
	
	function getchildname($hid){
		if($_REQUEST){
			$hid = $_REQUEST["hid"];
			$sid = $_REQUEST["sid"];
		}
		$sql = "select child_name from ocop_summary where household_voters_id = '".$hid."' and ocop_summary_id = '".$sid."'";
		$query = $this->db->query($sql);
		$arr='';
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
			{
				$arr[] = $row;
			}
		}
		$getchildname = json_encode($arr);
		echo $getchildname;
	}
	
	function savebirthdetails($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$birth_weight 		= $_POST['birth_weight'];
		$birth_disability 	= $_POST['birth_disability'];
		$birth_registration	= $_POST['birth_registration'];
		$birth_certificate 	= $_POST['birth_certificate'];
		$birth_not_registered = $_POST['birth_not_registered'];
		$nutricious_received  = $_POST['nutricious_received'];
		$pregnancy_period 	= $_POST['pregnancy_period'];
		$delivery_place		= $_POST['delivery_place'];
		$delivery_assisted 	= $_POST['delivery_assisted'];
		$hospital_distance 	= $_POST['hospital_distance'];
		$hospital_type 		= $_POST['hospital_type'];
		$delivery_paid 		= $_POST['delivery_paid'];
		$delivery_type 		= $_POST['delivery_type'];
		$delivery_difficult	= $_POST['delivery_difficult'];
		$delivery_number 	= $_POST['delivery_number'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'birth_weight' => $birth_weight, 'birth_disability' => $birth_disability, 'birth_registration' => $birth_registration, 'birth_certificate' => $birth_certificate, 'birth_not_registered' => $birth_not_registered, 'nutricious_received' => $nutricious_received, 'pregnancy_period' => $pregnancy_period, 'delivery_place' => $delivery_place, 'delivery_assisted' => $delivery_assisted, 'hospital_distance' => $hospital_distance, 'hospital_type' => $hospital_type, 'delivery_paid' => $delivery_paid, 'delivery_type' => $delivery_type, 'delivery_difficult' => $delivery_difficult, 'delivery_number' => $delivery_number);
	    $this->db->insert('ocop_birth_details', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
	function updatebirthdetails($post){		
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$birth_weight 		= $_POST['birth_weight'];
		$birth_disability 	= $_POST['birth_disability'];
		$birth_registration	= $_POST['birth_registration'];
		$birth_certificate 	= $_POST['birth_certificate'];
		$birth_not_registered = $_POST['birth_not_registered'];
		$nutricious_received  = $_POST['nutricious_received'];
		$pregnancy_period 	= $_POST['pregnancy_period'];
		$delivery_place		= $_POST['delivery_place'];
		$delivery_assisted 	= $_POST['delivery_assisted'];
		$hospital_distance 	= $_POST['hospital_distance'];
		$hospital_type 		= $_POST['hospital_type'];
		$delivery_paid 		= $_POST['delivery_paid'];
		$delivery_type 		= $_POST['delivery_type'];
		$delivery_difficult	= $_POST['delivery_difficult'];
		$delivery_number 	= $_POST['delivery_number'];
		
		$checkdata = "select * from ocop_birth_details where household_voters_id = '".$voterid."' and summary_id = '".$summary_id."'"; 
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 1)
		{		
			$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'birth_weight' => $birth_weight, 'birth_disability' => $birth_disability, 'birth_registration' => $birth_registration, 'birth_certificate' => $birth_certificate, 'birth_not_registered' => $birth_not_registered, 'nutricious_received' => $nutricious_received, 'pregnancy_period' => $pregnancy_period, 'delivery_place' => $delivery_place, 'delivery_assisted' => $delivery_assisted, 'hospital_distance' => $hospital_distance, 'hospital_type' => $hospital_type, 'delivery_paid' => $delivery_paid, 'delivery_type' => $delivery_type, 'delivery_difficult' => $delivery_difficult, 'delivery_number' => $delivery_number);
			$this->db->where(array('household_voters_id' => $voterid, 'summary_id' => $summary_id));
			$this->db->update('ocop_birth_details', $data);  
			echo "<font color='green'><b>Record updated successfully!</b></font>";
		}else{
			echo "<font color='Red'><b>Unable to Process.!</b></font>";
		}
	}
	
	
	function checkrecord($_REQUEST) {
		if($_REQUEST){
		$household_id = $_REQUEST["household_id"];
		$child_name = $_REQUEST["child_name"];
		}
		$checkdata = "select * from ocop_birth_details where household_voters_id = '".$household_id."' and summary_id = '".$child_name."' LIMIT 0,1";
		$checkquery = $this->db->query($checkdata);
		if ($checkquery->num_rows() == 0)
		{
			echo '0';
		}else{
			echo '1';
		}
	}
	
	function checkDisablity($post) {
		$voterid = $post["voterid"];
		$sql = "select birth_disability,ocop_education.disabled_facilities,ocop_current_details.child_disability from ocop_birth_details LEFT JOIN ocop_education ON ocop_education.household_voters_id= ocop_birth_details.household_voters_id  LEFT JOIN ocop_current_details ON ocop_current_details.household_voters_id= ocop_birth_details.household_voters_id  where ocop_birth_details.household_voters_id = '".$voterid."'  LIMIT 0,1";
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

class birth_detailsmodel extends Base_module_record {
 	
}