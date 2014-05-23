<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class manage_household_model extends Base_module_model {
	function __construct(){
        parent::__construct('manage_household');
    }
		
	function example(){
		return true;
	}	
	
	function householdlistdetails() {
	$sql = "select household_entry_id as serialno, household_voters_id as hid, entry_name_head_of_fly as hof, entry_door_no as doornumber, entry_district_name as district, entry_grama_panchayat as panchayat, entry_tot_no_ppl as totolpeople, DATE_FORMAT(entry_date_today, '%d-%m-%Y') AS edate from household_entry order by entry_date_today desc";	
	$query = $this->db->query($sql);
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

	function deletehousehold($_REQUEST){
		if($_REQUEST){
			$hid = $_REQUEST['hid'];
		}
		$hcheck = $this->db->query("select * from household_entry where household_voters_id = '".$hid."'");
		$arr = $hcheck->result();
		if(!empty($arr)) {
			$this->db->query("DELETE FROM household_entry WHERE household_voters_id='".$hid."'");
			$this->db->query("DELETE FROM household_survey_main WHERE household_voters_id='".$hid."'");
		}else{
			return false;
		}
    }
}

class manage_householdmodel extends Base_module_record {
 	
}