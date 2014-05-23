<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_immunization_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('drq_immunization');
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
	
	function savegeneralinfo($post){

				
		$voterid 		= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$bcgandopv 		= $_POST['bcgandopv'];
		$hpatities1 		= $_POST['hpatities1'];
		$dptandopv		= $_POST['dptandopv'];
		$hpatities2 		= $_POST['hpatities2'];
		$dpv2andopv3		= $_POST['dpv2andopv3'];
		$dpv3andopv4	    	= $_POST['dpv3andopv4'];
		$hepatitiesB3 		= $_POST['hepatitiesB3'];
		$measlesandopv5		= $_POST['measlesandopv5'];
		$mmr 			= $_POST['mmr'];
		$booster1 		= $_POST['booster1'];
		$typhoid 		= $_POST['typhoid'];
		$booster2 		= $_POST['booster2'];
		$tetanustoxid1 		= $_POST['tetanustoxid1'];
		$tetanustoxide2		= $_POST['tetanustoxide2'];
		$hib1 			= $_POST['hib1'];
		$hib2 			= $_POST['hib2'];
		$hib3 			= $_POST['hib3'];
		$hibbooster 		= $_POST['hibbooster'];
		$hepa1 			= $_POST['hepa1'];
		$hepa2 			= $_POST['hepa2'];
		$vita 			= $_POST['vita'];
		$chicknpox 		= $_POST['chicknpox'];
		$data = array(  'household_voters_id' => $voterid, 
			        'summary_id' => $summary_id, 
				'bcgandopv' => $bcgandopv, 
				'hpatities1' => $hpatities1,
				'dptandopv' => $dptandopv,
				'hpatities2' => $hpatities2, 
				'dpv2andopv3' => $dpv2andopv3,
				'dpv3andopv4' => $dpv3andopv4, 
				'hepatitiesB3' => $hepatitiesB3, 
				'measlesandopv5' => $measlesandopv5, 
				'mmr' => $mmr, 
				'booster1' => $booster1, 
				'typhoid' => $typhoid, 
				'booster2' => $booster2, 
				'tetanustoxid1' => $tetanustoxid1, 
				'tetanustoxide2' => $tetanustoxide2, 
				'hib1' => $hib1,
				'hib2' => $hib2,
				'hib3' => $hib3,
				'hibbooster' => $hibbooster,
				'hepa1' => $hepa1,
				'hepa2' => $hepa2,
				'vita' => $vita,
				'chicknpox' => $chicknpox,
				);
	    $this->db->insert('drq_immunization', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class drq_immunizationmodel extends Base_module_record {
 	
}
