<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class welfare_child_model extends Base_module_model {

//	protected $key_field = 'dReceivedDate';
	function __construct(){
        parent::__construct('birth_details');
    }
		
	function example(){
		return true;
	}
	
	function state() {
		$sql = "select distinct states from house_dropdwn";
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
	
	function division() {
		$sql = "select distinct division  from house_dropdwn"; 
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
	function district() {
		$sql = "select distinct district  from house_dropdwn"; 
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
	
	function taluk() {
	 if(isset( $_POST['mySelect'])) {
	   $mySelect = $_POST['mySelect'];
	  }
	   $sql = "select  taluk from house_dropdwn WHERE division='".$mySelect."'"; 

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
	
	function grama() {
	if(isset( $_POST['talukid'])) {
	   $talukid = $_POST['talukid'];
	}
	   $sqltl = "select  grama_panchayat from house_dropdwn WHERE taluk='".$talukid."'"; 
	 $query = $this->db->query($sqltl);
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

	function village() {
	if(isset( $_POST['gramaid'])) {
	   $gramaid = $_POST['gramaid'];
	}
	   $sqlvl = "select  villages from house_dropdwn WHERE grama_panchayat='".$gramaid."'"; 
	 $query = $this->db->query($sqlvl);
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
}

class protection_childmodel extends Base_module_record {
 	
}