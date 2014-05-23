<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_father_data_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('drq_father_data');
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
		$fatherstatus 		= $_POST['fatherstatus'];
		$fathername 		= $_POST['fathername'];
		$fatherdob		= $_POST['fatherdob'];
		$childage 		= $_POST['childage'];
		$mrgage			= $_POST['mrgage'];
		$dateofdeath	    	= $_POST['dateofdeath'];
		$registrationdate 	= $_POST['registrationdate'];
		$deathreason		= $_POST['deathreason'];
		$merragedate	 	= $_POST['merragedate'];
		$hospitalvisited 	= $_POST['hospitalvisited'];
		$reasonforvisit 	= $_POST['reasonforvisit'];
		$sfatheroccupation 	= $_POST['sfatheroccupation'];
		$fathereducation 	= $_POST['fathereducation'];
		$fathereincome 		= $_POST['fathereincome'];
		
		$data = array(  'household_voters_id' => $voterid, 
			        'summary_id' => $summary_id, 
				'fatherstatus' => $fatherstatus, 
				'fathername' => $fathername,
				'fatherdob' => $fatherdob,
				'childage' => $childage, 
				'mrgage' => $mrgage,
				'dateofdeath' => $dateofdeath, 
				'registrationdate' => $registrationdate, 
				'deathreason' => $deathreason, 
				'merragedate' => $merragedate, 
				'hospitalvisited' => $hospitalvisited, 
				'reasonforvisit' => $reasonforvisit, 
				'sfatheroccupation' => $sfatheroccupation, 
				'fathereducation' => $fathereducation,
				'fathereincome' => $fathereincome,
				
				);
	    $this->db->insert('drq_father_data', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class drq_father_datamodel extends Base_module_record {
 	
}
