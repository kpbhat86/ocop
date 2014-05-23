<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_mother_data_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('drq_mother_data');
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
	
	function savemotherdata($post){
			
		$voterid 		= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$mother_name 		= $_POST['mother_name'];
		$mother_dob		= $_POST['mother_dob'];
		$motherdeathstatus 	= $_POST['motherdeathstatus'];
		$periodofdeath 	= $_POST['periodofdeath'];
		$services_recieved 	= $_POST['services_recieved'];
		$pregnancyperiod 		= $_POST['pregnancyperiod'];
		$deliveryplace		= $_POST['deliveryplace'];
		$deliveryassistby		= $_POST['deliveryassistby'];
		$hospitaldistance 		= $_POST['hospitaldistance'];
		$hospitaltype 		= $_POST['hospitaltype'];
		$amountpaid 	= $_POST['amountpaid'];
		$deliverytype	= $_POST['deliverytype'];
		$hospital_reason_anc1 = $_POST['hospital_reason_anc1'];
		$hospital_reason_anc2 = $_POST['hospital_reason_anc2'];
		$hospital_reason_anc3 = $_POST['hospital_reason_anc3'];
		$deliveryexplanation 		= $_POST['deliveryexplanation'];
		$birthchild 		= $_POST['birthchild'];
		$hospitalvisited		= $_POST['hospitalvisited'];
		$datevisitedhospital 	= $_POST['datevisitedhospital'];
		$mrgdate	= $_POST['mrgdate'];
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'mother_name' => $mother_name, 'mother_dob' => $mother_dob, 'motherdeathstatus' => $motherdeathstatus, 'periodofdeath' => $periodofdeath, 'services_recieved' => $services_recieved, 'pregnancyperiod' => $pregnancyperiod, 'deliveryplace' => $deliveryplace, 'deliveryassistby' => $deliveryassistby, 'hospitaldistance' => $hospitaldistance, 'hospitaltype' => $hospitaltype, 'amountpaid' => $amountpaid, 'hospital_reason_anc1' => $hospital_reason_anc1, 'hospital_reason_anc2' => $hospital_reason_anc2, 'hospital_reason_anc3' => $hospital_reason_anc3, 'deliverytype' => $deliverytype, 'deliveryexplanation' => $deliveryexplanation, 'birthchild' => $birthchild, 'hospitalvisited' => $hospitalvisited , 'datevisitedhospital' => $datevisitedhospital , 'mrgdate' => $mrgdate);
	    $this->db->insert('drq_mother_data', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class drq_motherdatamodel extends Base_module_record {
 	
}
