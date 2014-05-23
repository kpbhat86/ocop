<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class drq_preg_mother_data_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('drq_preg_mother_data');
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
			
		$voterid 			= $_POST['voterid'];
		$summary_id 		= $_POST['summary_id'];
		$mothername 		= $_POST['mothername'];
		$motherdob 		= $_POST['motherdob'];
		
		$hospitalreason 	= $_POST['hospitalreason'];
		$mothereducation 	= $_POST['mothereducation'];
		$motherage	  	= $_POST['motherage'];
		$motherdeathage 	= $_POST['motherdeathage'];
		$deathregistration	= $_POST['deathregistration'];
		$ration_status 		= $_POST['ration_status'];
		$mothermrgage 		= $_POST['mothermrgage'];
		$txtmotheroccu		= $_POST['txtmotheroccu'];
		$txtmotherdeathrsn 	= $_POST['txtmotherdeathrsn'];
		
		$data = array('household_voters_id' => $voterid, 'summary_id' => $summary_id, 'mothername' => $mothername, 'motherdob' => $motherdob, 'hospitalreason' => $hospitalreason, 'mothereducation' => $mothereducation, 'motherage' => $motherage, 'motherdeathage' => $motherdeathage, 'deathregistration' => $deathregistration, 'ration_status' => $ration_status, 'mothermrgage' => $mothermrgage, 'txtmotheroccu' => $txtmotheroccu, 'txtmotherdeathrsn' => $txtmotherdeathrsn);
	    $this->db->insert('drq_normal_mother_data', $data);  
		$inserted = $this->db->insert_id();
		if($inserted){ 
			return true;
		}else return false;
	}
	
	
}

class drq_preg_motherdatamodel extends Base_module_record {
 	
}
