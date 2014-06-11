<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'helpers/tcpdf/config/lang/eng.php');
require_once(APPPATH.'helpers/tcpdf/tcpdf.php');

class childcurrent_report_model extends Base_module_model {

	function __construct(){
        parent::__construct('ocop_birth_details');
    }
	

	function birthregister_bargraphmultiple($txtpanchayat = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  -> where ("ocop_birth_details.birth_registration IN('Yes','No')")
						  ->join('ocop_birth_details ', 'household_entry.household_entry_id = ocop_birth_details .ocop_birth_details_id', 'left')
						  ->get();
		return $query->result();
	}

	
		function dropout_bargraphmultiple($txtpanchayat = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
				 	       -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  -> where ("ocop_education.drop_out_reason  IN('Taking care of siblings','Parents Death','Migration','Not Interested','Other') ")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education .ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	
		function dropout_piemultiple($txtpanchayat = ''){
		$sql = "SELECT drop_out_reason as name, Count(drop_out_reason) as data
		FROM ocop_education 
		LEFT JOIN household_entry  ON ocop_education.ocop_education_id=household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')  And drop_out_reason IN('Taking care of siblings','Parents Death','Migration','Not Interested','Other') GROUP BY drop_out_reason ";
		//echo $sql;
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
	

	
	
		function birthregister_piemultiple($txtpanchayat = ''){
		$sql = "SELECT birth_registration as name, count(birth_registration) as data
		FROM ocop_birth_details 
		LEFT JOIN household_entry ON ocop_birth_details.ocop_birth_details_id= household_entry.household_entry_id 
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."') and birth_registration IN('Yes','No') GROUP BY birth_registration ";
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
	
		function disability_piemultiple($txtpanchayat = ''){
		$sql = "SELECT non_enrollment_reasons as non_enrollment_reasonssurvey, count(non_enrollment_reasons) as value 
		FROM ocop_education 
		LEFT JOIN household_entry ON ocop_education.ocop_education_id= household_entry.household_entry_id 
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."') AND 
		ocop_education.non_enrollment_reasons IN('Lack of awareness','No School nearby','Taking care of siblings','Other') GROUP BY non_enrollment_reasons ";
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
	
	function disability_bargraphmultiple($txtpanchayat = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	       -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  -> where ("ocop_education.non_enrollment_reasons IN('Lack of awareness','No School nearby','Taking care of siblings','Other')")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education.ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	function preprimary_multiplebargraph($txtpanchayat = ''){
		$query = $this->db->select  ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
						  -> where ("ocop_education.pre_primary_type IN('Government','Private','NGO','Other') ")
				 	       -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education .ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	
		function preprimary_multiplepie($txtpanchayat = ''){
		$sql = "SELECT pre_primary_type as name, Count(pre_primary_type) as data
		FROM ocop_education 
		LEFT JOIN household_entry  ON ocop_education.ocop_education_id=household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."') AND  pre_primary_type IN('Government','Private','NGO','Other') GROUP BY pre_primary_type ";
		//echo $sql;
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
	
	function disablitybargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_education.non_enrollment_reasons IN('Lack of awareness','No School nearby','Taking care of siblings','Other')")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education.ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	

	
	function disablityreport_pie($village = ''){
		$sql = "SELECT non_enrollment_reasons as non_enrollment_reasonssurvey, count(non_enrollment_reasons) as value 
		FROM ocop_education 
		LEFT JOIN household_entry ON ocop_education.ocop_education_id= household_entry.household_entry_id 
		WHERE household_entry.entry_village_name='".$village."' AND 
		ocop_education.non_enrollment_reasons IN('Lack of awareness','No School nearby','Taking care of siblings','Other') GROUP BY non_enrollment_reasons ";
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
	
	function dropoutbargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_education.drop_out_reason  IN('Taking care of siblings','Parents Death','Migration','Not Interested','Other') ")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education .ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
		
	function dropoutpie($village = ''){
		$sql = "SELECT drop_out_reason as name, Count(drop_out_reason) as data
		FROM ocop_education 
		LEFT JOIN household_entry  ON ocop_education.ocop_education_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And drop_out_reason IN('Taking care of siblings','Parents Death','Migration','Not Interested','Other') GROUP BY drop_out_reason ";
		//echo $sql;
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
	
	function preprimarybargraph($village = ''){
		$query = $this->db->select  ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
						  -> where ("ocop_education.pre_primary_type IN('Government','Private','NGO','Other') ")
				 	      -> where ('entry_village_name', $village)
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education .ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	
	function preprimarypie($village = ''){
		$sql = "SELECT pre_primary_type as name, Count(pre_primary_type) as data
		FROM ocop_education 
		LEFT JOIN household_entry  ON ocop_education.ocop_education_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And pre_primary_type IN('Government','Private','NGO','Other') GROUP BY pre_primary_type ";
		//echo $sql;
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
	
	function primarybargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_education.primary_type IN('Government','Private','NGO','Other') ")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education .ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	
	function primarypie($village = ''){
		$sql = "SELECT primary_type as name, Count(primary_type) as data
		FROM ocop_education 
		LEFT JOIN household_entry  ON ocop_education.ocop_education_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And primary_type IN('Government','Private','NGO','Other') GROUP BY primary_type ";
		//echo $sql;
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
	
	
	

	
		
	function non_enrollbargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_education.non_enrollment_reasons IN('Lack of awareness','No school nearby','taking care of siblings','Other')")
						  ->join('ocop_education ', 'household_entry.household_entry_id = ocop_education.ocop_education_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
		function non_enrollreport_pie($village = ''){
		$sql = "SELECT non_enrollment_reasons as name, Count(non_enrollment_reasons) as data
		FROM ocop_education 
		LEFT JOIN household_entry  ON ocop_education.ocop_education_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And non_enrollment_reasons IN('Lack of awareness','No school nearby','taking care of siblings','Other') GROUP BY non_enrollment_reasons ";
		//echo $sql;
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
	
	
		function birth_disabilitybargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_birth_details.birth_disability IN('Vision','Physical','None','Hearing','Other') ")
						  ->join('ocop_birth_details ', 'household_entry.household_entry_id = ocop_birth_details .ocop_birth_details_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	
	function birth_disability_pie($village = ''){
		$sql = "SELECT birth_disability as name, Count(birth_disability) as data
		FROM ocop_birth_details 
		LEFT JOIN household_entry  ON ocop_birth_details.ocop_birth_details_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And birth_disability IN('Vision','Physical','None','Hearing','Other') GROUP BY birth_disability ";
		//echo $sql;
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
	
	
	function workingchildren_bar($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_protection.child_working in ('Yes','No') OR
						  ocop_protection.working_status in ('Full Time','Part Time') ")
						  ->join('ocop_protection ', 'household_entry.household_entry_id = ocop_protection .ocop_protection_id', 'left')
						  ->get();
		return $query->result();
	}
		
	
	
	function workingchildren_pie($village = ''){
		$sql = "SELECT child_working as name, Count(child_working) as data
		FROM ocop_protection 
		LEFT JOIN household_entry  ON ocop_protection.ocop_protection_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And child_working IN('Yes','No') GROUP BY child_working ";
		
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
	

			function child_minorbargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_protection.child_marriage IN('Yes','No') ")
						  ->join('ocop_protection ', 'household_entry.household_entry_id = ocop_protection .ocop_protection_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	
	function child_minor_pie($village = ''){
		$sql = "SELECT child_marriage as name, Count(child_marriage) as data
		FROM ocop_protection 
		LEFT JOIN household_entry  ON ocop_protection.ocop_protection_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And child_marriage IN('Yes','No') GROUP BY child_marriage ";
		//echo $sql;
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
	



function childindividual_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $childid='', $houseid='', $age='') {
		//$txtpanchayat = stripslashes($txtpanchayat);
		//`minor_pregnancy` =  'Yes' 
	//	print_r($ddlvillage);print_r($childid);print_r($houseid);print_r($age);print_r($txtstate);print_r($txtdivision);print_r($txtdistrict);print_r($txttaluk);print_r($ddlpanchayat);die();
		
		
		$sql="SELECT `household_voters_id` as hid, `child_name`as cid, `dob`as dob, ration_card_name as card, `gender`as gen, `father_name`as fname, `mother_name`as mname, child_orphan as orp, religion	as rel ,caste as cas  FROM `ocop_general_info` WHERE household_voters_id = '".$houseid."' and `child_name`='".$childid."'";
		$querymain11 = $this->db->query($sql);
		$hid = $querymain11->row(0)->hid;
		$cid = $querymain11->row(0)->cid;
		$dob = $querymain11->row(0)->dob;
		$gen = $querymain11->row(0)->gen;
		$fname = $querymain11->row(0)->fname;
		$mname = $querymain11->row(0)->mname;
		$orp = $querymain11->row(0)->orp;
		$rel = $querymain11->row(0)->rel;
		$cas = $querymain11->row(0)->cas;
		$card = $querymain11->row(0)->card;
		if( $gen == 1)  {
			$gender = 'Male';
		}
		else{
			$gender = 'Female';
		}
		//print_r($sex);die();
		$sql1="SELECT  `primary_type` as primary_type, pre_primary_type as pre_primary_type, present_class as present_class FROM  `ocop_general_info` LEFT JOIN ocop_education ON ocop_education.`summary_id` = ocop_general_info.summary_id
					WHERE ocop_general_info.child_name =  '".$childid."'
					AND ocop_general_info.household_voters_id =  '".$houseid."'"; 
		$querymain1 = $this->db->query($sql1);
		$primary_type = $querymain1->row(0)->primary_type;
		$pre_primary_type = $querymain1->row(0)->pre_primary_type;
		$present_class = $querymain1->row(0)->present_class;
		
			
		
			$sql1="SELECT  `child_weight` as child_weight, child_height as child_height , child_disability as dis FROM  `ocop_current_details` LEFT JOIN ocop_general_info ON ocop_general_info.`summary_id` = ocop_current_details.summary_id
					WHERE ocop_general_info.child_name =  '".$childid."'
					AND ocop_general_info.household_voters_id =  '".$houseid."'"; 
					//print_r($sql1); die();
		$querymain12 = $this->db->query($sql1);
		$child_weight = $querymain12->row(0)->child_weight;
		$child_height = $querymain12->row(0)->child_height;
		$dis = $querymain12->row(0)->dis;
		
		
		
				$sql2="SELECT  `child_marriage` as child_marriage, marriage_date as marriage_date  FROM  `ocop_protection` LEFT JOIN ocop_general_info ON ocop_general_info.`summary_id` = ocop_protection.summary_id
					WHERE ocop_general_info.child_name =  '".$childid."'
					AND ocop_general_info.household_voters_id =  '".$houseid."'"; 
					//print_r($sql1); die();
		$querymain13 = $this->db->query($sql2);
	//	$child_marriage = $querymain13->row(0)->child_marriage;
//		$marriage_date = $querymain13->row(0)->marriage_date;
		
		$date =  date("d/m/Y");
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</b></h3></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
								Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of child marriage and child Minor Pregnency (General Age Break Up) </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report generated date </b></th>
				<td><span style="color:red">' .$date. '</span></td>
				<th align="left"><b>Regional Report Level </b></th>
				<td><span style="color:red"></span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Household ID (Voter Card Id, Pan Card, Driving License or etc) (Take from Household Entry):'.$houseid.'</b></td>
			</tr>
			<tr>
				<td colspan="4" align="center"><b>Details of the child</b></td>
			</tr>
			<tr>
				<td align="left"><b>CI1.0  Name of the Child </b></td>
				<td align="center"><b>'.$childid.'</b></td>
				<td align="left"><b>CI1.2 Date of Birth </b></td>
				<td align="center"><b>'.$dob.'</b></td>
			</tr><tr>
				<td align="left" >CI1.3 Gender</td> 
			<td align="center" >'.$gender.'</td>
				<td align="left" > Age: (Take from OCOP Childs Info Step1:Summary of Questionnaire/</td>
				<td align="center" >'.$age.'</td>
			
			</tr>
			<tr>
				<td align="left" >CI1.13 Religion</td>
				<td align="center" >'.$rel.'</td>
				<td align="left" >CI1.14 Caste</td>
				<td align="center" >'.$cas.'</td>
			</tr>
				<tr>
				<td align="left" >CI1.5  Mothers Name</td>
				<td align="center" >'.$mname.'</td>
				<td align="left" >CI1.4 Fathers Name</td>
				<td align="center" >'.$fname.'</td>
			</tr>
			<tr>
				<td align="left" >Name of the Guardian (take from OCOP Childs Info Step1: Summary of Questionnaire)</td>
				<td align="center" ></td>
				<td align="left" >CI1.9 Is the child is Orphan/Semi-Orphan?</td>
				<td align="center" >'.$orp.'</td>
			</tr>
			<tr>
				<td align="left" >CI 3.1 Present Weight of the child</td>
				<td align="center" >'.$child_weight.'</td>
				<td align="left" >CI 3.2 Present Height of the child</td>
				<td align="center" >'.$child_height.'</td>
			</tr>
	
	
	
		<tr>
				<td align="left" >CI5.5 Type of Pre-primary School</td>
				<td align="center" >'.$pre_primary_type.'</td>
				<td align="left" >CI5.3 Present Class</td>
				<td align="center" >'.$present_class.'</td>
			</tr>
			
				<tr>
				<td align="left" >CI 3.3  Child Disability</td>
				<td align="center" >'.$dis.'</td>
				<td align="left" >CI5.8 Type of Primary School</td>
				<td align="center" >'.$primary_type.'</td>
			</tr>
			
				<tr>
				<td align="left" >CI1.15 Name in Ration Card *</td>
				<td align="center" >'.$card.'</td>
				<td align="left" >CI3.8. Is the child married?</td>
			</tr>
			
				<tr>
				<td align="left" >CD2.4 If yes, please mention the date</td>
				<td align="left" >CI3.9 Date of marriage</td>
			</tr>

		
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	












function childcurrent_child_minor_pregnency_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		//$txtpanchayat = stripslashes($txtpanchayat);
		//`minor_pregnancy` =  'Yes' 
		$sqlYfemale0to3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale0to3 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
              AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain10 = $this->db->query($sqlYfemale0to3);
		$Yfemale0to3 = $querymain10->row(0)->Yfemale0to3;
		
		
		
		$sqlYfemale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale3to6 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
              AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain11 = $this->db->query($sqlYfemale3to6);
		$Yfemale3to6 = $querymain11->row(0)->Yfemale3to6;
		
		
		$sqlYfemale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale6to14 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
              AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain = $this->db->query($sqlYfemale6to14);
		$Yfemale6to14 = $querymain->row(0)->Yfemale6to14;
		
		$sqlYfemale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale14to18 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
              AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain1 = $this->db->query($sqlYfemale14to18);
		$Yfemale14to18 = $querymain1->row(0)->Yfemale14to18;
		
		//`minor_pregnancy` =  'No' 
		
		$sql10="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Nfemale6to14 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `minor_pregnancy`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain10 = $this->db->query($sql10);
		$Nfemale6to14 = $querymain10->row(0)->Nfemale6to14;
		
		$sql12="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Nfemale14to18 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
              AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain1 = $this->db->query($sql12);
		$Nfemale14to18 = $querymain1->row(0)->Nfemale14to18;
		$Ntotal6to18 = $Nfemale6to14 + $Nfemale14to18;
		
		
		
		//`child_marriage` =  'Yes' 
		
		$sql2="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain2 = $this->db->query($sql2);
		$CMYmale0to3  = $querymain2->row(0)->CMYmale0to3;
		
		$sql3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain3 = $this->db->query($sql3);
		$CMYfemale0to3 = $querymain3->row(0)->CMYfemale0to3;
		$CMYtotal0to3 = $CMYmale0to3 + $CMYfemale0to3;
		
		$sql4="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
               AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain12 = $this->db->query($sql4);
		$CMYmale3to6 = $querymain12->row(0)->CMYmale3to6;
		
		$sql5="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain13 = $this->db->query($sql5);
		$CMYfemale3to6 = $querymain13->row(0)->CMYfemale3to6;
		$CMYtotal3to6 = $CMYmale3to6 + $CMYfemale3to6;
		
	
		
		$sql6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale6to14 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
               AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain5 = $this->db->query($sql6);
		$CMYmale6to14 = $querymain5->row(0)->CMYmale6to14;
		
		
		$sql7="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale6to14 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain4 = $this->db->query($sql7);
		$CMYfemale6to14 = $querymain4->row(0)->CMYfemale6to14;
		$CMYtotal6to14 = $CMYmale6to14 + $CMYfemale6to14;
		
		$sql8="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain14 = $this->db->query($sql8);
		$CMYmale14to18  = $querymain14->row(0)->CMYmale14to18 ;
		
		$sql9="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain15 = $this->db->query($sql9);
		$CMYfemale14to18 = $querymain15->row(0)->CMYfemale14to18;
		$CMYtotal14to18 = $CMYmale14to18 + $CMYfemale14to18;
		
		//`child_marriage` =  'No' 
		
		$sql16="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain2 = $this->db->query($sql16);
		$CMNmale0to3  = $querymain2->row(0)->CMNmale0to3;
		
		$sql17="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain3 = $this->db->query($sql17);
		$CMNfemale0to3 = $querymain3->row(0)->CMNfemale0to3;
		$CMNtotal0to3 = $CMNmale0to3 + $CMNfemale0to3;
		
		$sql18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
               AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain12 = $this->db->query($sql18);
		$CMNmale3to6 = $querymain12->row(0)->CMNmale3to6;
		
		$sql19="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain13 = $this->db->query($sql19);
		$CMNfemale3to6 = $querymain13->row(0)->CMNfemale3to6;
		$CMNtotal3to6 = $CMNmale3to6 + $CMNfemale3to6;
		
	
		
		$sql120="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale6to14 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
               AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain5 = $this->db->query($sql120);
		$CMNmale6to14 = $querymain5->row(0)->CMNmale6to14;
		
		
		$sql121="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale6to14 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain4 = $this->db->query($sql121);
		$CMNfemale6to14 = $querymain4->row(0)->CMNfemale6to14;
		$CMNtotal6to14 = $CMNmale6to14 + $CMNfemale6to14;
		
		$sql122="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain14 = $this->db->query($sql122);
		$CMNmale14to18  = $querymain14->row(0)->CMNmale14to18 ;
		
		$sql123="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";
		$querymain15 = $this->db->query($sql123);
		$CMNfemale14to18 = $querymain15->row(0)->CMNfemale14to18;
		$CMNtotal14to18 = $CMNmale14to18 + $CMNfemale14to18;
		
		
		$CMYtotalmale=$CMYmale0to3 + $CMYmale3to6 + $CMYmale6to14 + $CMYmale14to18;
		$CMYtotalfemale=$CMYfemale0to3 + $CMYfemale3to6 + $CMYfemale6to14 + $CMYfemale14to18;
		$Ytotalfemale = $Yfemale0to3 + $Yfemale3to6 + $Yfemale6to14 + $Yfemale14to18;
		$tot0to3male =$CMYmale0to3 + 0;
		$tot3to6male = $CMYmale3to6 + 0;
		$tot6to14male = $CMYmale6to14 + 0;
		$tot14to18male = $CMYmale14to18 + 0;
		$tot0to3female = $CMYfemale0to3 + $Yfemale0to3;
		$tot3to6female = $CMYfemale3to6 + $Yfemale3to6;
		$tot6to14female = $CMYfemale6to14 + $Yfemale6to14;
		$tot14to18female = $CMYfemale14to18 + $Yfemale14to18;
		$totmale= $CMYtotalmale + 0;
		$totfemale= $CMYtotalfemale + $Ytotalfemale;
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</b></h3></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
								Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of girl child marriages and child Minor Pregnency (General Age Break Up) </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of girl child marriages and child Minor Pregnency (General Age Break Up)</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				
				<th align="center"><b>No. of child marriage </b></th>
				<th align="center"><b>No. of  Minor Pregnancy</b></th>
				<th align="center"><b>Total no. of Children</b></th>
			</tr>
			<tr>
				<td>0-3 yrs</td>
				
				<td>'.$CMYfemale0to3.'</td>
				<td>'.$Yfemale0to3.'</td>
				<td>'.$tot0to3female.'</td>
			</tr>
			<tr>
				<td>3-6 yrs</td>
				
				<td>'.$CMYfemale3to6.'</td>
				<td>'.$Yfemale3to6.'</td>
				<td>'.$tot3to6female.'</td>
			</tr>
	
			<tr>
				<td>6-14 yrs</td>
				<td>'.$CMYfemale6to14.'</td>
				<td>'.$Yfemale6to14.'</td>
				
				<td>'.$tot6to14female.'</td>
			</tr>
		
			<tr>
				<td>14-18 yrs</td>
				<td>'.$CMYfemale14to18.'</td>
				<td>'.$Yfemale14to18.'</td>
				
				<td>'.$tot14to18female.'</td>
			</tr>
		
				<tr>
				<td>Total on of Children</td>
				<td>'.$CMYtotalfemale.'</td>
				<td>'.$Ytotalfemale.'</td>
				
				<td>'.$totfemale.'</td>
			</tr>
			<tr>
				<td colspan="4" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
	function childcurrent_working_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//`drop_out_reason` =  'other' 
		
		$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain = $this->db->query($sql);
		$WCmale0to3 = $querymain->row(0)->WCmale0to3;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain1 = $this->db->query($sql1);
		$WCfemale0to3 = $querymain1->row(0)->WCfemale0to3;
		
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain2 = $this->db->query($sql2);
			$WCmale3to6 = $querymain2->row(0)->WCmale3to6;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain3 = $this->db->query($sql3);
			$WCfemale3to6 = $querymain3->row(0)->WCfemale3to6;
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain4 = $this->db->query($sql4);
			$WCmale6to14 = $querymain4->row(0)->WCmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain5 = $this->db->query($sql5);
			$WCfemale6to14 = $querymain5->row(0)->WCfemale6to14;
			
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain6 = $this->db->query($sql6);
			$WCmale14to18 = $querymain6->row(0)->WCmale14to18;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale14to18 FROM ocop_general_info LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id  LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain7 = $this->db->query($sql7);
			$WCfemale14to18 = $querymain7->row(0)->WCfemale14to18;
		
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain8 = $this->db->query($sql8);
		$FTmale0to3 = $querymain8->row(0)->FTmale0to3;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain9 = $this->db->query($sql9);
		$FTfemale0to3 = $querymain9->row(0)->FTfemale0to3;
		
		
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain10 = $this->db->query($sql10);
			$FTmale3to6 = $querymain10->row(0)->FTmale3to6;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain11 = $this->db->query($sql11);
			$FTfemale3to6 = $querymain11->row(0)->FTfemale3to6;
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain12 = $this->db->query($sql12);
			$FTmale6to14 = $querymain12->row(0)->FTmale6to14;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain13 = $this->db->query($sql13);
			$FTfemale6to14 = $querymain13->row(0)->FTfemale6to14;
			
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain14 = $this->db->query($sql14);
			$FTmale14to18 = $querymain14->row(0)->FTmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id  LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
		AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain15 = $this->db->query($sql15);
		$FTfemale14to18 = $querymain15->row(0)->FTfemale14to18;
		
			$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain16 = $this->db->query($sql16);
		$PTmale0to3 = $querymain16->row(0)->PTmale0to3;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain17 = $this->db->query($sql17);
		$PTfemale0to3 = $querymain17->row(0)->PTfemale0to3;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain18 = $this->db->query($sql18);
			$PTmale3to6 = $querymain18->row(0)->PTmale3to6;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain19 = $this->db->query($sql19);
			$PTfemale3to6 = $querymain19->row(0)->PTfemale3to6;
		
		$sql20="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain20 = $this->db->query($sql20);
			$PTmale6to14 = $querymain20->row(0)->PTmale6to14;
		
		$sql21="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain21 = $this->db->query($sql21);
			$PTfemale6to14 = $querymain21->row(0)->PTfemale6to14;
			
		$sql22="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain22 = $this->db->query($sql22);
			$PTmale14to18 = $querymain22->row(0)->PTmale14to18;
		
		$sql23="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id  LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
		AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain23 = $this->db->query($sql23);
		$PTfemale14to18 = $querymain23->row(0)->PTfemale14to18;
		
		
		
		$totmale0to3 = $WCmale0to3 + $FTmale0to3 + $PTmale0to3;
		$totfemale0to3 = $WCfemale0to3 + $FTfemale0to3 + $PTfemale0to3;
		$totmale3to6 = $WCmale3to6 + $FTmale3to6 + $PTmale3to6;
		$totfemale3to6 = $WCfemale3to6 + $FTfemale3to6 + $PTfemale3to6;
		$totmale6to14 = $WCmale6to14 + $FTmale6to14 + $PTmale6to14;
		$totfemale6to14 = $WCfemale6to14 + $FTfemale6to14 + $PTfemale6to14;
		$totmale14to18 = $WCmale14to18 + $FTmale14to18 + $PTmale14to18;
		$totfemale14to18 = $WCfemale14to18 + $FTfemale14to18 + $PTfemale14to18;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2.5" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which childrelated information of all children will be collected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
								Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of Child Labour (General  break up) </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		
			
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="6" align="center"><b>Child Labour (General  break up) </b></td>
			</tr>
			<tr>
				<th align="center"><b> Age group</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>Full time </b></th>
				<th align="center"><b>Part time    </b></th>
				<th align="center"><b>Total no. of Child Labour</b></th>
			</tr>
			
			<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>Male</td>
				<td>'.$FTmale0to3.'</td>
				<td>'.$PTmale0to3.'</td>
				<td>'.$totmale0to3.'</td>
			</tr>
			<tr>
				<td>Female</td>
				<td>'.$FTfemale0to3.'</td>
				<td>'.$PTfemale0to3.'</td>
				<td>'.$totfemale0to3.'</td>
			</tr>
			<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>Male </td>
				<td>'.$FTmale3to6.'</td>
				<td>'.$PTmale3to6.'</td>
				<td>'.$totmale3to6.'</td>
			</tr>
			<tr>
				<td>Female </td>
				<td>'.$FTfemale3to6.'</td>
				<td>'.$PTfemale3to6.'</td>
				<td>'.$totfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>Male </td>
				<td>'.$FTmale6to14.'</td>
				<td>'.$PTmale6to14.'</td>
				<td>'.$totmale6to14.'</td>
			</tr>
			<tr>
				<td>Female</td>
				<td>'.$FTfemale6to14.'</td>
				<td>'.$PTfemale6to14.'</td>
				<td>'.$totfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>Male </td>
				<td>'.$FTmale14to18.'</td>
				<td>'.$PTmale14to18.'</td>
				<td>'.$totmale14to18.'</td>
			</tr>
			<tr>
				<td>Female</td>
				<td>'.$FTfemale14to18.'</td>
				<td>'.$PTfemale14to18.'</td>
				<td>'.$totfemale14to18.'</td>
			</tr>
			<tr>
				<td colspan="6" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are not live data </span></b></td>
			</tr>
		</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}	
	
	
	function childcurrent_dropout_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//`drop_out_reason` =  'other' 
		
		$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'other' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
			BETWEEN 6 AND 14 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain = $this->db->query($sql);
		$OTmale6to14 = $querymain->row(0)->OTmale6to14;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'other'AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain1 = $this->db->query($sql1);
		$OTfemale6to14 = $querymain1->row(0)->OTfemale6to14;
		$OTtotal6to14 = $OTmale6to14 + $OTfemale6to14;
		
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'other' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
			BETWEEN 14 AND 18 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain10 = $this->db->query($sql10);
		$OTmale14to18 = $querymain10->row(0)->OTmale14to18;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'other'AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain11 = $this->db->query($sql11);
		$OTfemale14to18 = $querymain11->row(0)->OTfemale14to18;
		$OTtotal14to18 = $OTmale14to18 + $OTfemale14to18;
		
		//`drop_out_reason` =  'taking care of siblings' 
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain2 = $this->db->query($sql2);
		$TCmale6to14 = $querymain2->row(0)->TCmale6to14;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain3 = $this->db->query($sql3);
		$TCfemale6to14 = $querymain3->row(0)->TCfemale6to14;
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain12 = $this->db->query($sql12);
		$TCmale14to18 = $querymain12->row(0)->TCmale14to18;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain13 = $this->db->query($sql13);
		$TCfemale14to18 = $querymain13->row(0)->TCfemale14to18;
		
		//`drop_out_reason` =  'migration' 
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain4 = $this->db->query($sql4);
		$Migmale6to14 = $querymain4->row(0)->Migmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain5 = $this->db->query($sql5);
		$Migfemale6to14 = $querymain5->row(0)->Migfemale6to14;
		
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain14 = $this->db->query($sql14);
		$Migmale14to18 = $querymain14->row(0)->Migmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain15 = $this->db->query($sql15);
		$Migfemale14to18 = $querymain15->row(0)->Migfemale14to18;
		
		//`drop_out_reason` =  'parents death' 
		
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain6 = $this->db->query($sql6);
		$PDmale6to14 = $querymain6->row(0)->PDmale6to14;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain7 = $this->db->query($sql7);
		$PDfemale6to14 = $querymain7->row(0)->PDfemale6to14;
		
		
		$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain16 = $this->db->query($sql16);
		$PDmale14to18 = $querymain16->row(0)->PDmale14to18;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain17 = $this->db->query($sql17);
		$PDfemale14to18 = $querymain17->row(0)->PDfemale14to18;
		
		//`drop_out_reason` =  're_enrolment_attempts' 
		
		$sql120="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `re_enrolment_attempts` = 'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain20 = $this->db->query($sql120);
		$REmale6to14 = $querymain20->row(0)->REmale6to14;
		
		$sql21="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `re_enrolment_attempts` =  'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain21 = $this->db->query($sql21);
		$REfemale6to14 = $querymain21->row(0)->REfemale6to14;
		
		$sql22="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `re_enrolment_attempts` = 'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain22 = $this->db->query($sql22);
		$REmale14to18 = $querymain22->row(0)->REmale14to18;
		
		$sql23="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `re_enrolment_attempts` =  'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain23 = $this->db->query($sql23);
		$REfemale14to18 = $querymain23->row(0)->REfemale14to18;
		
		//`drop_out_reason` =  'not interested	' 	
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain8 = $this->db->query($sql8);
		$NTmale6to14 = $querymain8->row(0)->NTmale6to14;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain9 = $this->db->query($sql9);
		$NTfemale6to14 = $querymain9->row(0)->NTfemale6to14;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain18 = $this->db->query($sql18);
		$NTmale14to18 = $querymain18->row(0)->NTmale14to18;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain19 = $this->db->query($sql19);
		$NTfemale14to18 = $querymain19->row(0)->NTfemale14to18;
		
		
		
		
		$TCtotmale618 = $TCmale6to14 + $TCmale14to18 ;
		$TCtotfemale618 = $TCfemale6to14 + $TCfemale14to18 ;
		$PDtotmale618 = $PDmale6to14 + $PDmale14to18 ;
		$PDtotfemale618 = $PDfemale6to14 + $PDfemale14to18 ;
		$Migtotmale618 = $Migmale6to14 + $Migmale14to18 ;
		$Migtotfemale618 = $Migfemale6to14 + $Migfemale14to18 ;
		$NTtotmale618 = $NTmale6to14 + $NTmale14to18 ;
		$NTtotfemale618 = $NTfemale6to14 + $NTfemale14to18 ;
		$OTtotmale618 = $OTmale6to14 + $OTmale14to18 ;
		$OTtotfemale618 = $OTfemale6to14 + $OTfemale14to18 ;
		$REtotmale618 = $REmale6to14 + $REmale14to18 ;
		$REtotfemale618 = $REfemale6to14 + $REfemale14to18 ;
		$totalmale614= $TCmale6to14 + $PDmale6to14 +$Migmale6to14 + $NTmale6to14 + $OTmale6to14 ;
		$totalfemale614= $TCfemale6to14 + $PDfemale6to14 +$Migfemale6to14 + $NTfemale6to14 + $OTfemale6to14  ;
		$totalmale1418= $TCmale14to18 + $PDmale14to18 +$Migmale14to18 + $NTmale14to18 + $OTmale14to18  ;
		$totalfemale1418= $TCfemale14to18 + $PDfemale14to18 +$Migfemale14to18 + $NTfemale14to18 + $OTfemale14to18 ;
		$totlmale6to14=$TCtotmale618+$PDtotmale618+$Migtotmale618+$NTtotmale618 +$OTtotmale618;
		$totlfemale6to14=$TCtotfemale618+$PDtotfemale618+$Migtotfemale618+$NTtotfemale618 +$OTtotfemale618;
		//End of Children's Birth Certificate 
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
								Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Report of School dropout (General break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="9" align="center"><b>Report of School dropout (General break up)</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>taking care of siblings   </b></th>
				<th align="center"><b>parents death</b></th>
				<th align="center"><b>migration </b></th>
				<th align="center"><b>not interested</b></th>
				<th align="center"><b>Other </b></th>
				<th align="center"><b>Total no. of Children / No of Drop out children</b></th>
				<th align="center"><b>Any school re-enrolment attempts</b></th>
				
			</tr>
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$TCmale6to14.'</td>
				<td>'.$PDmale6to14.'</td>
				<td>'.$Migmale6to14.'</td>
				<td>'.$NTmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$totalmale614.'</td>
				<td>'.$REmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$TCfemale6to14.'</td>
				<td>'.$PDfemale6to14.'</td>
				<td>'.$Migfemale6to14.'</td>
				<td>'.$NTfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
					<td>'.$totalfemale614.'</td>
				<td>'.$REfemale6to14.'</td>
			
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$TCmale14to18.'</td>
				<td>'.$PDmale14to18.'</td>
				<td>'.$Migmale14to18.'</td>
				<td>'.$NTmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$totalmale1418.'</td>
				<td>'.$REmale14to18.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$TCfemale14to18.'</td>
				<td>'.$PDfemale14to18.'</td>
				<td>'.$Migfemale14to18.'</td>
				<td>'.$NTfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$totalfemale1418.'</td>
				<td>'.$REfemale14to18.'</td>
				
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$TCtotmale618.'</td>
				<td>'.$PDtotmale618.'</td>
				<td>'.$Migtotmale618.'</td>
				<td>'.$NTtotmale618.'</td>
				<td>'.$OTtotmale618.'</td>
				<td>'.$totlmale6to14.'</td>
				<td>'.$REtotmale618.'</td>
				
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$TCtotfemale618.'</td>
				<td>'.$PDtotfemale618.'</td>
				<td>'.$Migtotfemale618.'</td>
				<td>'.$NTtotfemale618.'</td>
				<td>'.$OTtotfemale618.'</td>
				<td>'.$totlfemale6to14.'</td>
				<td>'.$REtotfemale618.'</td>
				
			</tr>
			<tr>
				<td colspan="9" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	function childprimary_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
				
		$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain = $this->db->query($sql);
			$Gmale6to14 = $querymain->row(0)->Gmale6to14;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain1 = $this->db->query($sql1);
			$Gfemale6to14 = $querymain1->row(0)->Gfemale6to14;
		
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain2 = $this->db->query($sql2);
			$PVmale6to14 = $querymain2->row(0)->PVmale6to14;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain3 = $this->db->query($sql3);
			$PVfemale6to14 = $querymain3->row(0)->PVfemale6to14;
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain4 = $this->db->query($sql4);
			$NGmale6to14 = $querymain4->row(0)->NGmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain5 = $this->db->query($sql5);
			$NGfemale6to14 = $querymain5->row(0)->NGfemale6to14;
			
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain6 = $this->db->query($sql6);
			$OTmale6to14 = $querymain6->row(0)->OTmale6to14;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain7 = $this->db->query($sql7);
			$OTfemale6to14 = $querymain7->row(0)->OTfemale6to14;
		
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain8 = $this->db->query($sql8);
			$ARmale6to14 = $querymain8->row(0)->ARmale6to14;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain9 = $this->db->query($sql9);
			$ARfemale6to14 = $querymain9->row(0)->ARfemale6to14;
			
				
		$sql071="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain071 = $this->db->query($sql071);
			$NOmale6to14 = $querymain071->row(0)->NOmale6to14;
		
		$sql072="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain072 = $this->db->query($sql072);
			$NOfemale6to14 = $querymain072->row(0)->NOfemale6to14;
			
			
			
			
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain10 = $this->db->query($sql10);
			$Gmale14to18 = $querymain10->row(0)->Gmale14to18;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain11 = $this->db->query($sql11);
			$Gfemale14to18 = $querymain11->row(0)->Gfemale14to18;
		
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain12 = $this->db->query($sql12);
			$PVmale14to18 = $querymain12->row(0)->PVmale14to18;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain13 = $this->db->query($sql13);
			$PVfemale14to18 = $querymain13->row(0)->PVfemale14to18;
		
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain14 = $this->db->query($sql14);
			$NGmale14to18 = $querymain14->row(0)->NGmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain15 = $this->db->query($sql15);
			$NGfemale14to18 = $querymain15->row(0)->NGfemale14to18;
			
		$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain16 = $this->db->query($sql16);
			$OTmale14to18 = $querymain16->row(0)->OTmale14to18;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain17 = $this->db->query($sql17);
			$OTfemale14to18 = $querymain17->row(0)->OTfemale14to18;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain18 = $this->db->query($sql18);
			$ARmale14to18 = $querymain18->row(0)->ARmale14to18;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain19 = $this->db->query($sql19);
			$ARfemale14to18 = $querymain19->row(0)->ARfemale14to18;
		
		$sql081="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain081 = $this->db->query($sql081);
			$NOmale14to18 = $querymain081->row(0)->NOmale14to18;
		
		$sql082="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain082 = $this->db->query($sql082);
			$NOfemale14to18 = $querymain082->row(0)->NOfemale14to18;	
			
		
		
		$totmale6to14 = $Gmale6to14 + $PVmale6to14 + $NGmale6to14 + $OTmale6to14  + $NOmale6to14;
		$totfemale6to14 = $Gfemale6to14 + $PVfemale6to14 + $NGfemale6to14 + $OTfemale6to14  + $NOfemale6to14;
		
		$totmale14to18 = $Gmale14to18 + $PVmale14to18 + $NGmale14to18 + $OTmale14to18 + $NOmale14to18;
		$totfemale14to18 = $Gfemale14to18 + $PVfemale14to18 + $NGfemale14to18 + $OTfemale14to18  + $NOfemale14to18;
		
		$Gtotalmale= $Gmale6to14 + $Gmale14to18;
		$PVtotalmale=$PVmale6to14 + $PVmale14to18;
		$NGtotalmale= $NGmale6to14 +$NGmale14to18;
		$OTtotalmale= $OTmale6to14 + $OTmale14to18;
		$ARtotalmale= $ARmale6to14 + $ARmale14to18;
		$NOtotalmale= $NOmale6to14 + $NOmale14to18;
		
		$Gtotalfemale= $Gfemale6to14 + $Gfemale14to18;
		$PVtotalfemale=$PVfemale6to14 + $PVfemale14to18;
		$NGtotalfemale= $NGfemale6to14 +$NGfemale14to18;
		$OTtotalfemale= $OTfemale6to14 + $OTfemale14to18;
		$ARtotalfemale= $ARfemale6to14 + $ARfemale14to18;
		$NOtotalfemale= $NOfemale6to14 + $NOfemale14to18;
		
		$totmale= $Gtotalmale + $PVtotalmale + $NGtotalmale + $OTtotalmale  + $NOtotalmale;
		$totfemale= $Gtotalfemale + $PVtotalfemale + $NGtotalfemale + $OTtotalfemale  + $NOtotalfemale ;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2.5" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in whichchildrelated information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of Primary enrolled children information (General break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		
			
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="9" align="center"><b>Report of Primary enrolled children information (General break up)</b></td>
			</tr>
			<tr>
				<th rowspan="2" align="center"><b> Age Group</b></th>
				<th rowspan="2" align="center"><b></b></th>
				<th  rowspan="2" align="center"><b>No of  children</b></th>
				<th colspan="5"><b>No. of children enrolled</b></th>
				<th rowspan="2" align="center"><b>Attending regularly</b></th>
				
				  	
			</tr>
			<tr>
			<th align="center"><b>Government </b></th>
			
				<th align="center"><b>Private</b></th>
				<th align="center"><b>NGO</b></th>
				<th align="center"><b>Other</b></th>
				<th align="center"><b>Total no. of Children </b></th>
				</tr>
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale6to14.'</td>
				<td>'.$Gmale6to14.'</td>
				<td>'.$PVmale6to14.'</td>
				<td>'.$NGmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$totmale6to14.'</td>
				<td>'.$ARmale6to14.'</td>
				
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale6to14.'</td>
				<td>'.$Gfemale6to14.'</td>
				<td>'.$PVfemale6to14.'</td>
				<td>'.$NGfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$totfemale6to14.'</td>
				<td>'.$ARfemale6to14.'</td>
				
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale14to18.'</td>
				<td>'.$Gmale14to18.'</td>
				<td>'.$PVmale14to18.'</td>
				<td>'.$NGmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$totmale14to18.'</td>
				<td>'.$ARmale14to18.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale14to18.'</td>
				<td>'.$Gfemale14to18.'</td>
				<td>'.$PVfemale14to18.'</td>
				<td>'.$NGfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$totfemale14to18.'</td>
				<td>'.$ARfemale14to18.'</td>
				
			</tr>
			
				<tr>
				<td rowspan="2">Total on of Children</td>
				<td>Total Male number of Childrens</td>
				<td>'.$NOtotalmale.'</td>
				<td>'.$Gtotalmale.'</td>
				<td>'.$PVtotalmale.'</td>
				<td>'.$NGtotalmale.'</td>
				<td>'.$OTtotalmale.'</td>
				<td>'.$totmale.'</td>
				<td>'.$ARtotalmale.'</td>
				
			</tr>
			<tr>
				<td>Total Female Childrens no yrs</td>
				<td>'.$NOtotalfemale.'</td>
				<td>'.$Gtotalfemale.'</td>
				<td>'.$PVtotalfemale.'</td>
				<td>'.$NGtotalfemale.'</td>
				<td>'.$OTtotalfemale.'</td>
				<td>'.$totfemale.'</td>
				<td>'.$ARtotalfemale.'</td>
				
			</tr>
			
			<tr>
				<td colspan="9" align="left"><b><u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of live data. </span></b></td>
			</tr>
		</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}		
	
	
function childpreprimary_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
			$sqlmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain = $this->db->query($sqlmale3to6);
			$Gmale3to6 = $querymain->row(0)->Gmale3to6;
		
		$sqlGfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain1 = $this->db->query($sqlGfemale3to6);
			$Gfemale3to6 = $querymain1->row(0)->Gfemale3to6;
		
		
		$sqlPVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain2 = $this->db->query($sqlPVmale3to6);
			$PVmale3to6 = $querymain2->row(0)->PVmale3to6;
		
		$sqlPVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain3 = $this->db->query($sqlPVfemale3to6);
			$PVfemale3to6 = $querymain3->row(0)->PVfemale3to6;
		
		$sqlNGmale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain4 = $this->db->query($sqlNGmale3to6);
			$NGmale3to6 = $querymain4->row(0)->NGmale3to6;
		
		$sqlNGfemale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain5 = $this->db->query($sqlNGfemale3to6);
			$NGfemale3to6 = $querymain5->row(0)->NGfemale3to6;
			
		$sqlOTmale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain6 = $this->db->query($sqlOTmale3to6);
			$OTmale3to6 = $querymain6->row(0)->OTmale3to6;
		
		$sqlOTfemale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain7 = $this->db->query($sqlOTfemale3to6);
			$OTfemale3to6 = $querymain7->row(0)->OTfemale3to6;
		
		
		$sqlARmale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain8 = $this->db->query($sqlARmale3to6);
			$ARmale3to6 = $querymain8->row(0)->ARmale3to6;
		
		$sqlARfemale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain9 = $this->db->query($sqlARfemale3to6);
			$ARfemale3to6 = $querymain9->row(0)->ARfemale3to6;
			
				
		$sqlNOmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain071 = $this->db->query($sqlNOmale3to6);
			$NOmale3to6 = $querymain071->row(0)->NOmale3to6;
		
		$sqlNOfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale3to6 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain072 = $this->db->query($sqlNOfemale3to6);
			$NOfemale3to6 = $querymain072->row(0)->NOfemale3to6;
			

			
			
		$sqlGmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain10 = $this->db->query($sqlGmale0to3);
			$Gmale0to3 = $querymain10->row(0)->Gmale0to3;
		
		$sqlGfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain11 = $this->db->query($sqlGfemale0to3);
			$Gfemale0to3 = $querymain11->row(0)->Gfemale0to3;
		
		
		$sqlPVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain12 = $this->db->query($sqlPVmale0to3);
			$PVmale0to3 = $querymain12->row(0)->PVmale0to3;
		
		$sqlPVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain13 = $this->db->query($sqlPVfemale0to3);
			$PVfemale0to3 = $querymain13->row(0)->PVfemale0to3;
		
		$sqlNGmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain14 = $this->db->query($sqlNGmale0to3);
			$NGmale0to3 = $querymain14->row(0)->NGmale0to3;
		
		$sqlNGfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain15 = $this->db->query($sqlNGfemale0to3);
			$NGfemale0to3 = $querymain15->row(0)->NGfemale0to3;
			
		$sqlOTmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain16 = $this->db->query($sqlOTmale0to3);
			$OTmale0to3 = $querymain16->row(0)->OTmale0to3;
		
		$sqlOTfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain17 = $this->db->query($sqlOTfemale0to3);
			$OTfemale0to3 = $querymain17->row(0)->OTfemale0to3;
		
		
		$sqlARmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain18 = $this->db->query($sqlARmale0to3);
			$ARmale0to3 = $querymain18->row(0)->ARmale0to3;
		
		$sqlARfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale0to3 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain19 = $this->db->query($sqlARfemale0to3);
			$ARfemale0to3 = $querymain19->row(0)->ARfemale0to3;
		
		$sqlNOmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain081 = $this->db->query($sqlNOmale0to3);
			$NOmale0to3 = $querymain081->row(0)->NOmale0to3;
		
		$sqlNOfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale0to3 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain082 = $this->db->query($sqlNOfemale0to3);
			$NOfemale0to3 = $querymain082->row(0)->NOfemale0to3;	
			
			
			
			
			$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain = $this->db->query($sql);
			$Gmale6to14 = $querymain->row(0)->Gmale6to14;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain1 = $this->db->query($sql1);
			$Gfemale6to14 = $querymain1->row(0)->Gfemale6to14;
		
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain2 = $this->db->query($sql2);
			$PVmale6to14 = $querymain2->row(0)->PVmale6to14;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain3 = $this->db->query($sql3);
			$PVfemale6to14 = $querymain3->row(0)->PVfemale6to14;
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain4 = $this->db->query($sql4);
			$NGmale6to14 = $querymain4->row(0)->NGmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain5 = $this->db->query($sql5);
			$NGfemale6to14 = $querymain5->row(0)->NGfemale6to14;
			
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain6 = $this->db->query($sql6);
			$OTmale6to14 = $querymain6->row(0)->OTmale6to14;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain7 = $this->db->query($sql7);
			$OTfemale6to14 = $querymain7->row(0)->OTfemale6to14;
		
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain8 = $this->db->query($sql8);
			$ARmale6to14 = $querymain8->row(0)->ARmale6to14;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain9 = $this->db->query($sql9);
			$ARfemale6to14 = $querymain9->row(0)->ARfemale6to14;
			
				
		$sql071="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain071 = $this->db->query($sql071);
			$NOmale6to14 = $querymain071->row(0)->NOmale6to14;
		
		$sql072="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain072 = $this->db->query($sql072);
			$NOfemale6to14 = $querymain072->row(0)->NOfemale6to14;
			
			
			
			
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain10 = $this->db->query($sql10);
			$Gmale14to18 = $querymain10->row(0)->Gmale14to18;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain11 = $this->db->query($sql11);
			$Gfemale14to18 = $querymain11->row(0)->Gfemale14to18;
		
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain12 = $this->db->query($sql12);
			$PVmale14to18 = $querymain12->row(0)->PVmale14to18;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain13 = $this->db->query($sql13);
			$PVfemale14to18 = $querymain13->row(0)->PVfemale14to18;
		
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain14 = $this->db->query($sql14);
			$NGmale14to18 = $querymain14->row(0)->NGmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain15 = $this->db->query($sql15);
			$NGfemale14to18 = $querymain15->row(0)->NGfemale14to18;
			
		$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain16 = $this->db->query($sql16);
			$OTmale14to18 = $querymain16->row(0)->OTmale14to18;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain17 = $this->db->query($sql17);
			$OTfemale14to18 = $querymain17->row(0)->OTfemale14to18;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain18 = $this->db->query($sql18);
			$ARmale14to18 = $querymain18->row(0)->ARmale14to18;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain19 = $this->db->query($sql19);
			$ARfemale14to18 = $querymain19->row(0)->ARfemale14to18;
		
		$sql081="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain081 = $this->db->query($sql081);
			$NOmale14to18 = $querymain081->row(0)->NOmale14to18;
		
		$sql082="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
			$querymain082 = $this->db->query($sql082);
			$NOfemale14to18 = $querymain082->row(0)->NOfemale14to18;	
			
			
		$totmale0to3 =  $Gmale0to3 + $PVmale0to3 + $NGmale0to3 + $OTmale0to3 + $ARmale0to3 + $NOmale0to3;
		$totfemale0to3 = $Gfemale0to3 + $PVfemale0to3 + $NGfemale0to3 + $OTfemale0to3 + $ARfemale0to3 + $NOfemale0to3;
		
		$totmale3to6 =  $Gmale3to6 + $PVmale3to6 + $NGmale3to6 + $OTmale3to6 + $ARmale3to6 + $NOmale3to6;
		$totfemale3to6 = $Gfemale3to6 + $PVfemale3to6 + $NGfemale3to6 + $OTfemale3to6 + $ARfemale3to6 + $NOfemale3to6;
		
		$totmale6to14 =  $Gmale6to14 + $PVmale6to14 + $NGmale6to14 + $OTmale6to14 + $ARmale6to14 + $NOmale6to14;
		$totfemale6to14 = $Gfemale6to14 + $PVfemale6to14 + $NGfemale6to14 + $OTfemale6to14 + $ARfemale6to14 + $NOfemale6to14;
		
		$totmale14to18 = $Gmale14to18 + $PVmale14to18 + $NGmale14to18 + $OTmale14to18 + $ARmale14to18 + $NOmale14to18;
		$totfemale14to18 = $Gfemale14to18 + $PVfemale14to18 + $NGfemale14to18 + $OTfemale14to18 + $ARfemale14to18 + $NOfemale14to18;
		
		$Gtotalmale= $Gmale0to3 + $Gmale3to6 + $Gmale6to14 + $Gmale14to18 ;
		$PVtotalmale=$PVmale0to3 + $PVmale3to6 + $PVmale6to14 + $PVmale14to18;
		$NGtotalmale=$NGmale0to3 + $NGmale3to6 + $NGmale6to14 + $NGmale14to18;
		$OTtotalmale=$OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18;
		$ARtotalmale=$ARmale0to3 + $ARmale3to6 + $ARmale6to14 + $ARmale14to18;
		$NOtotalmale=$NOmale0to3 + $NOmale3to6 + $NOmale6to14 + $NOmale14to18;
		
		$Gtotalfemale =  $Gfemale0to3 + $Gfemale3to6 + $Gfemale6to14 + $Gfemale14to18;
		$PVtotalfemale = $PVfemale0to3 + $PVfemale3to6 + $PVfemale6to14 + $PVfemale14to18;
		$NGtotalfemale = $NGfemale0to3 + $NGfemale3to6 + $NGfemale6to14 + $NGfemale14to18;
		$OTtotalfemale = $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18;
		$ARtotalfemale = $ARfemale0to3 + $ARfemale3to6 + $ARfemale6to14 + $ARfemale14to18;
		$NOtotalfemale = $NOfemale0to3 + $NOfemale3to6 + $NOfemale6to14 + $NOfemale14to18;
		
		$totmale= $Gtotalmale + $PVtotalmale + $NGtotalmale + $OTtotalmale + $ARtotalmale + $NOtotalmale;
		$totfemale= $Gtotalfemale + $PVtotalfemale + $NGtotalfemale + $OTtotalfemale + $ARtotalfemale + $NOtotalfemale ;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2.5" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</b></h3></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of Pre-Primary enrolled children  (General break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		
			
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="9" align="center"><b>Report of Pre-Primary enrolled children  (General break up)</b></td>
			</tr>
			<tr>
				<th align="center"><b> Age Group</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>No of Pre-Primary enrolled children</b></th>
				<th align="center"><b>Government </b></th>
				<th align="center"><b>Private</b></th>
				<th align="center"><b>NGO</b></th>
				<th align="center"><b>Other</b></th>
				<th align="center"><b>Attending regularly</b></th>
				<th align="center"><b>Total no. of Children </b></th> 	
			</tr>
			<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>Male</td>
				<td>'.$NOmale0to3.'</td>
				<td>'.$Gmale0to3.'</td>
				<td>'.$PVmale0to3.'</td>
				<td>'.$NGmale0to3.'</td>
				<td>'.$OTmale0to3.'</td>
				<td>'.$ARmale0to3.'</td>
				<td>'.$totmale0to3.'</td>
				
			</tr>
			<tr>
				<td>Female</td>
				<td>'.$NOfemale0to3.'</td>
				<td>'.$Gfemale0to3.'</td>
				<td>'.$PVfemale0to3.'</td>
				<td>'.$NGfemale0to3.'</td>
				<td>'.$OTfemale0to3.'</td>
				<td>'.$ARfemale0to3.'</td>
				<td>'.$totfemale0to3.'</td>
			</tr>
			
			
			<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>Male</td>
				<td>'.$NOmale3to6.'</td>
				<td>'.$Gmale3to6.'</td>
				<td>'.$PVmale3to6.'</td>
				<td>'.$NGmale3to6.'</td>
				<td>'.$OTmale3to6.'</td>
				<td>'.$ARmale3to6.'</td>
				<td>'.$totmale3to6.'</td>
				
			</tr>
			<tr>
				<td>Female </td>
				<td>'.$NOfemale3to6.'</td>
				<td>'.$Gfemale3to6.'</td>
				<td>'.$PVfemale3to6.'</td>
				<td>'.$NGfemale3to6.'</td>
				<td>'.$OTfemale3to6.'</td>
				<td>'.$ARfemale3to6.'</td>
				<td>'.$totfemale3to6.'</td>
			</tr>
			
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale6to14.'</td>
				<td>'.$Gmale6to14.'</td>
				<td>'.$PVmale6to14.'</td>
				<td>'.$NGmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$ARmale6to14.'</td>
				<td>'.$totmale6to14.'</td>
				
			</tr>
			<tr>
				<td>Female</td>
				<td>'.$NOfemale6to14.'</td>
				<td>'.$Gfemale6to14.'</td>
				<td>'.$PVfemale6to14.'</td>
				<td>'.$NGfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$ARfemale6to14.'</td>
				<td>'.$totfemale6to14.'</td>
			</tr>
			
			
			
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>Male</td>
				<td>'.$NOmale14to18.'</td>
				<td>'.$Gmale14to18.'</td>
				<td>'.$PVmale14to18.'</td>
				<td>'.$NGmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$ARmale14to18.'</td>
				<td>'.$totmale14to18.'</td>
			</tr>
			<tr>
				<td>Female</td>
				<td>'.$NOfemale14to18.'</td>
				<td>'.$Gfemale14to18.'</td>
				<td>'.$PVfemale14to18.'</td>
				<td>'.$NGfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$ARfemale14to18.'</td>
				<td>'.$totfemale14to18.'</td>
			</tr>
			
				<tr>
				<td rowspan="2">Total no. of childrens.</td>
				<td>Total Male</td>
				<td>'.$NOtotalmale.'</td>
				<td>'.$Gtotalmale.'</td>
				<td>'.$PVtotalmale.'</td>
				<td>'.$NGtotalmale.'</td>
				<td>'.$OTtotalmale.'</td>
				<td>'.$ARtotalmale.'</td>
				<td>'.$totmale.'</td>
			</tr>
			<tr>
				<td>Total Female </td>
				<td>'.$NOtotalfemale.'</td>
				<td>'.$Gtotalfemale.'</td>
				<td>'.$PVtotalfemale.'</td>
				<td>'.$NGtotalfemale.'</td>
				<td>'.$OTtotalfemale.'</td>
				<td>'.$ARtotalfemale.'</td>
				<td>'.$totfemale.'</td>
			</tr>
			
			<tr>
				<td colspan="9" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are not live data </span></b></td>
			</tr>
		</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}		
	
	
	
			function current_disabilitybargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03,	sum(entry_age3_6yrsmale ) as entryagemale36, 	sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618,  sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) as entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_current_details.child_disability IN ('None', 'Blindness', 'Low vision', 'Leprosy cured', 'Locomotor disability','Hearing impairment' ,'Mental retardation', 'Mental illness' ,'Other')  ")
						  ->join('ocop_current_details ', 'household_entry.household_entry_id = ocop_current_details .ocop_current_details_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	
	function current_disability_pie($village = ''){
		$sql = "SELECT child_disability as name, Count(child_disability) as data
		FROM ocop_current_details 
		LEFT JOIN household_entry  ON ocop_current_details.ocop_current_details_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And child_disability IN ('None', 'Blindness', 'Low vision', 'Leprosy cured', 'Locomotor disability', 'Hearing impairment' ,'Mental retardation', 'Mental illness' ,'Other') GROUP BY child_disability ";
		//echo $sql;
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


function childcurrent_current_disability_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
	//`child_disability` = 'None' 


 $sqlNmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain = $this->db->query($sqlNmale0to3);
		 $Nmale0to3 = $querymain->row(0)->Nmale0to3;
		 
		 
		 
$sqlNfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain4 = $this->db->query($sqlNfemale0to3);
		 $Nfemale0to3 = $querymain4->row(0)->Nfemale0to3;
		 
$sqlNmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain1 = $this->db->query($sqlNmale3to6);
		 $Nmale3to6 = $querymain1->row(0)->Nmale3to6;
		 
		 
$sqlNfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain5 = $this->db->query($sqlNfemale3to6);
		 $Nfemale3to6 = $querymain5->row(0)->Nfemale3to6;

 
$sqlNmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain2 = $this->db->query($sqlNmale6to14);
		 $Nmale6to14 = $querymain2->row(0)->Nmale6to14;
		 
		 

$sqlNfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain6 = $this->db->query($sqlNfemale6to14);
		 $Nfemale6to14 = $querymain6->row(0)->Nfemale6to14;

	 
$sqlNmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain3 = $this->db->query($sqlNmale14to18);
		 $Nmale14to18 = $querymain3->row(0)->Nmale14to18;


$sqlNfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain7 = $this->db->query($sqlNfemale14to18);
		 $Nfemale14to18 = $querymain7->row(0)->Nfemale14to18;

   //`child_disability` = 'Blindness'
   
$sqlBmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Bmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain8 = $this->db->query($sqlBmale0to3);
		 $Bmale0to3 = $querymain8->row(0)->Bmale0to3;

		 
$sqlBfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain12 = $this->db->query($sqlBfemale0to3);
		 $Bfemale0to3 = $querymain12->row(0)->Bfemale0to3;

		 		 
$sqlBmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain9 = $this->db->query($sqlBmale3to6);
		 $Bmale3to6 = $querymain9->row(0)->Bmale3to6;
		 
		 
$sqlBfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain13 = $this->db->query($sqlBfemale3to6);
		 $Bfemale3to6 = $querymain13->row(0)->Bfemale3to6;


$sqlBmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain10 = $this->db->query($sqlBmale6to14);
		 $Bmale6to14 = $querymain10->row(0)->Bmale6to14;
		 
		 
$sqlBfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain14 = $this->db->query($sqlBfemale6to14);
		 $Bfemale6to14 = $querymain14->row(0)->Bfemale6to14;


$sqlBmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain11 = $this->db->query($sqlBmale14to18);
		 $Bmale14to18 = $querymain11->row(0)->Bmale14to18;



$sqlBfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain15 = $this->db->query($sqlBfemale14to18);
		 $Bfemale14to18 = $querymain15->row(0)->Bfemale14to18;
		 
		 
		  //`child_disability` = 'Low vision' 

$sqlLVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision'  AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain16 = $this->db->query($sqlLVmale0to3);
		 $LVmale0to3 = $querymain16->row(0)->LVmale0to3;
		 				 

$sqlLVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LVfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain20 = $this->db->query($sqlLVfemale0to3);
		 $LVfemale0to3 = $querymain20->row(0)->LVfemale0to3;

$sqlLVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability`= 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain17 = $this->db->query($sqlLVmale3to6);
		 $LVmale3to6 = $querymain17->row(0)->LVmale3to6;

		 
$sqlLVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain21 = $this->db->query($sqlLVfemale3to6);
		 $LVfemale3to6 = $querymain21->row(0)->LVfemale3to6;

$sqlLVmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LVmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain18 = $this->db->query($sqlLVmale6to14);
		 $LVmale6to14 = $querymain18->row(0)->LVmale6to14;
		 
		 
$sqlLVfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain22 = $this->db->query($sqlLVfemale6to14);
		 $LVfemale6to14 = $querymain22->row(0)->LVfemale6to14;

$sqlLVmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain19 = $this->db->query($sqlLVmale14to18);
		 $LVmale14to18 = $querymain19->row(0)->LVmale14to18;

$sqlLVfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LVfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain23 = $this->db->query($sqlLVfemale14to18);
		 $LVfemale14to18 = $querymain23->row(0)->LVfemale14to18;

		 
		 //`child_disability` = 'Leprosy cured' //


$sqlLCmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain24 = $this->db->query($sqlLCmale0to3);
		 $LCmale0to3 = $querymain24->row(0)->LCmale0to3;

		 
$sqlLCfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LCfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain28 = $this->db->query($sqlLCfemale0to3);
		 $LCfemale0to3 = $querymain28->row(0)->LCfemale0to3;


$sqlLCmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LCmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain25 = $this->db->query($sqlLCmale3to6);
		 $LCmale3to6 = $querymain25->row(0)->LCmale3to6;
		 
		 
$sqlLCfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain29 = $this->db->query($sqlLCfemale3to6);
		 $LCfemale3to6 = $querymain29->row(0)->LCfemale3to6;


$sqlLCmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain26 = $this->db->query($sqlLCmale6to14);
		 $LCmale6to14 = $querymain26->row(0)->LCmale6to14;

		 

$sqlLCfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain30 = $this->db->query($sqlLCfemale6to14);
		 $LCfemale6to14 = $querymain30->row(0)->LCfemale6to14;


$sqlLCmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain27 = $this->db->query($sqlLCmale14to18);
		 $LCmale14to18 = $querymain27->row(0)->LCmale14to18;

$sqlLCfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LCfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain31 = $this->db->query($sqlLCfemale14to18);
		 $LCfemale14to18 = $querymain31->row(0)->LCfemale14to18;

				 
		  //`child_disability` = 'Hearing impairment' //		

		  
$sqlHImale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS HImale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain40 = $this->db->query($sqlHImale0to3);
		 $HImale0to3 = $querymain40->row(0)->HImale0to3;

		 		 		  
$sqlHIfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HIfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain44 = $this->db->query($sqlHIfemale0to3);
		 $HIfemale0to3 = $querymain44->row(0)->HIfemale0to3;
		  
$sqlHImale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HImale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain41 = $this->db->query($sqlHImale3to6);
		 $HImale3to6 = $querymain41->row(0)->HImale3to6;

		 
		 
		 		  
$sqlHIfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS HIfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain45 = $this->db->query($sqlHIfemale3to6);
		 $HIfemale3to6 = $querymain45->row(0)->HIfemale3to6;

		  
$sqlHImale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HImale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain42 = $this->db->query($sqlHImale6to14);
		 $HImale6to14 = $querymain42->row(0)->HImale6to14;
		 	 	 
		 		  
$sqlHIfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS HIfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain46 = $this->db->query($sqlHIfemale6to14);
		 $HIfemale6to14 = $querymain46->row(0)->HIfemale6to14;
		 

	  
$sqlHImale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HImale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain43 = $this->db->query($sqlHImale14to18);
		 $HImale14to18 = $querymain43->row(0)->HImale14to18;
 
		 		 		  
$sqlHIfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HIfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain47 = $this->db->query($sqlHIfemale14to18);
		 $HIfemale14to18 = $querymain47->row(0)->HIfemale14to18;
		 
		 
		 //`child_disability` = 'Locomotor disability' // 


$sqlLDmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LDmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain48 = $this->db->query($sqlLDmale0to3);
		 $LDmale0to3 = $querymain48->row(0)->LDmale0to3;		 
		 
		 
$sqlLDfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LDfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain49 = $this->db->query($sqlLDfemale0to3);
		 $LDfemale0to3 = $querymain49->row(0)->LDfemale0to3;		 

		 
$sqlLDmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LDmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain50 = $this->db->query($sqlLDmale3to6);
		 $LDmale3to6 = $querymain50->row(0)->LDmale3to6;		 
		 
$sqlLDfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain51 = $this->db->query($sqlLDfemale3to6);
		 $LDfemale3to6 = $querymain51->row(0)->LDfemale3to6;		 


$sqlLDmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain52 = $this->db->query($sqlLDmale6to14);
		 $LDmale6to14 = $querymain52->row(0)->LDmale6to14;


$sqlLDfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain53 = $this->db->query($sqlLDfemale6to14);
		 $LDfemale6to14 = $querymain53->row(0)->LDfemale6to14;		 
		 



		 
		 $sqlLDmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain52 = $this->db->query($sqlLDmale14to18);
		 $LDmale14to18 = $querymain52->row(0)->LDmale14to18;


$sqlLDfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain53 = $this->db->query($sqlLDfemale14to18);
		 $LDfemale14to18 = $querymain53->row(0)->LDfemale14to18;	
		 
		 
		 
			 //`child_disability` = 'Mental retardation' //	 
		 
		 
$sqlMRmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MRmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain54 = $this->db->query($sqlMRmale0to3);
		 $MRmale0to3 = $querymain54->row(0)->MRmale0to3;		 
		 	 
			 
$sqlMRfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain55 = $this->db->query($sqlMRfemale0to3);
		 $MRfemale0to3 = $querymain55->row(0)->MRfemale0to3;
		 
		 
$sqlMRmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MRmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain56 = $this->db->query($sqlMRmale3to6);
		 $MRmale3to6 = $querymain56->row(0)->MRmale3to6;
		 
		 
$sqlMRfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain57 = $this->db->query($sqlMRfemale3to6);
		 $MRfemale3to6 = $querymain57->row(0)->MRfemale3to6;		 
		 

$sqlMRmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MRmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain58 = $this->db->query($sqlMRmale6to14);
		 $MRmale6to14 = $querymain58->row(0)->MRmale6to14;
		 		 
		 
		 
$sqlMRfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain59 = $this->db->query($sqlMRfemale6to14);
		 $MRfemale6to14 = $querymain59->row(0)->MRfemale6to14;
		 		 	 
		 
$sqlMRmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain60 = $this->db->query($sqlMRmale14to18);
		 $MRmale14to18 = $querymain60->row(0)->MRmale14to18;	

$sqlMRfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain61 = $this->db->query($sqlMRfemale14to18);
		 $MRfemale14to18 = $querymain61->row(0)->MRfemale14to18;		 
		 
		 
			 //`child_disability` = 'Mental illness' //	 
		 
		 
$sqlMImale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MImale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain62 = $this->db->query($sqlMImale0to3);
		 $MImale0to3 = $querymain62->row(0)->MImale0to3;

$sqlMIfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MIfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain63 = $this->db->query($sqlMIfemale0to3);
		 $MIfemale0to3 = $querymain63->row(0)->MIfemale0to3;		 
		 
		 
$sqlMImale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MImale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain64 = $this->db->query($sqlMImale3to6);
		 $MImale3to6 = $querymain64->row(0)->MImale3to6;

$sqlMIfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MIfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain65 = $this->db->query($sqlMIfemale3to6);
		 $MIfemale3to6 = $querymain65->row(0)->MIfemale3to6;		 
		 
		 
$sqlMImale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MImale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain66 = $this->db->query($sqlMImale6to14);
		 $MImale6to14 = $querymain66->row(0)->MImale6to14;

$sqlMIfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MIfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain67 = $this->db->query($sqlMIfemale6to14);
		 $MIfemale6to14 = $querymain67->row(0)->MIfemale6to14;		 
		 
		 
$sqlMImale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MImale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain68 = $this->db->query($sqlMImale14to18);
		 $MImale14to18 = $querymain68->row(0)->MImale14to18;

$sqlMIfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MIfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain69 = $this->db->query($sqlMIfemale14to18);
		 $MIfemale14to18 = $querymain69->row(0)->MIfemale14to18;		 
		 
		 	 
			 
			 //`child_disability` = 'Other' //	 
		 
		 
$sqlOTmale0to3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS OTmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain70 = $this->db->query($sqlOTmale0to3);
		 $OTmale0to3 = $querymain70->row(0)->OTmale0to3;

$sqlOTfemale0to3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain71 = $this->db->query($sqlOTfemale0to3);
		 $OTfemale0to3 = $querymain71->row(0)->OTfemale0to3;		 
		 
		 
$sqlOTmale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS OTmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain72 = $this->db->query($sqlOTmale3to6);
		 $OTmale3to6 = $querymain72->row(0)->OTmale3to6;

$sqlOTfemale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain73 = $this->db->query($sqlOTfemale3to6);
		 $OTfemale3to6 = $querymain73->row(0)->OTfemale3to6;		 
		 
		 
$sqlOTmale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS OTmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain74 = $this->db->query($sqlOTmale6to14);
		 $OTmale6to14 = $querymain74->row(0)->OTmale6to14;

$sqlOTfemale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain75 = $this->db->query($sqlOTfemale6to14);
		 $OTfemale6to14 = $querymain75->row(0)->OTfemale6to14;		 
		 
		 
$sqlOTmale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain76 = $this->db->query($sqlOTmale14to18);
		 $OTmale14to18 = $querymain76 ->row(0)->OTmale14to18;

$sqlOTfemale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain77 = $this->db->query($sqlOTfemale14to18);
		 $OTfemale14to18 = $querymain77->row(0)->OTfemale14to18;		 
	
	
	$NoneTotalmale= $Nmale0to3 + $Nmale3to6 + $Nmale6to14 + $Nmale14to18 ;
	$NoneTotalfemale= $Nfemale0to3 + $Nfemale3to6 + $Nfemale6to14 + $Nfemale14to18 ;
	
	$BlindTotalmale= $Bmale0to3 + $Bmale3to6 + $Bmale6to14 + $Bmale14to18 ;
	$BlindTotalfemale= $Bfemale0to3 + $Bfemale3to6 + $Bfemale6to14 + $Bfemale14to18 ;
	
	$LowVisionTotalmale= $LVmale0to3 + $LVmale3to6 + $LVmale6to14 + $LVmale14to18 ;
	$LowVisionTotalfemale= $LVfemale0to3 + $LVfemale3to6 + $LVfemale6to14 + $LVfemale14to18 ;
	
	$LepCuredTotalmale= $LCmale0to3 + $LCmale3to6 + $LCmale6to14 + $LCmale14to18 ;
	$LepCuredTotalfemale= $LCfemale0to3 + $LCfemale3to6 + $LCfemale6to14 + $LCfemale14to18 ;
	
	$HearingTotalmale= $HImale0to3 + $HImale3to6 + $HImale6to14 + $HImale14to18 ;
	$HearingTotalfemale= $HIfemale0to3 + $HIfemale3to6 + $HIfemale6to14 + $HIfemale14to18 ;
	
	$LocDisabilityTotalmale= $LDmale0to3 + $LDmale3to6 + $LDmale6to14 + $LDmale14to18 ;
	$LocDisabilityTotalfemale= $LDfemale0to3 + $LDfemale3to6 + $LDfemale6to14 + $LDfemale14to18 ;
	
	$MentalRetarTotalmale= $MRmale0to3 + $MRmale3to6 + $MRmale6to14 + $MRmale14to18 ;
	$MentalRetarTotalfemale= $MRfemale0to3 + $MRfemale3to6 + $MRfemale6to14 + $MRfemale14to18 ;
	
	$MentalIllTotalmale= $MImale0to3 + $MImale3to6 + $MImale6to14 + $MImale14to18 ;
	$MentalIllTotalfemale= $MIfemale0to3 + $MIfemale3to6 + $MIfemale6to14 + $MIfemale14to18 ;
	
	$OtherTotalmale= $OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18 ;
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b>Our Children Our Progress<br>
					(Child Tracking System)</b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;">It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b> Report of  current disable children information </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="11" align="center"><b> Report of  current disable children information </b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>None</b></th>
				<th align="center"><b>Blindness</b></th>
				<th align="center"><b>Low vision</b></th> 
				<th align="center"><b>Leprosy cured</b></th>
				<th align="center"><b>Hearing impairment</b></th> 
				<th align="center"><b>Locomotor disability</b></th> 
				<th align="center"><b>Mental retardation</b></th> 
				<th align="center"><b>Mental illness</b></th> 
				<th align="center"><b>Others</b></th>
			</tr>
				<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale0to3.'</td>
				<td>'.$Bmale0to3.'</td>
				<td>'.$LVmale0to3.'</td>
				<td>'.$LCmale0to3.'</td>
				<td>'.$HImale0to3.'</td>
				<td>'.$LDmale0to3.'</td>
				<td>'.$MRmale0to3.'</td>
				<td>'.$MImale0to3.'</td>
				<td>'.$OTmale0to3.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale0to3.'</td>
				<td>'.$Bfemale0to3.'</td>
				<td>'.$LVfemale0to3.'</td>
				<td>'.$LCfemale0to3.'</td>
				<td>'.$HIfemale0to3.'</td>
				<td>'.$LDfemale0to3.'</td>
				<td>'.$MRfemale0to3.'</td>
				<td>'.$MIfemale0to3.'</td>
				<td>'.$OTfemale0to3.'</td>
			</tr>
				<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale3to6.'</td>
				<td>'.$Bmale3to6.'</td>
				<td>'.$LVmale3to6.'</td>
				<td>'.$LCmale3to6.'</td>
				<td>'.$HImale3to6.'</td>
				<td>'.$LDmale3to6.'</td>
				<td>'.$MRmale3to6.'</td>
				<td>'.$MImale3to6.'</td>
				<td>'.$OTmale3to6.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale3to6.'</td>
				<td>'.$Bfemale3to6.'</td>
				<td>'.$LVfemale3to6.'</td>
				<td>'.$LCfemale3to6.'</td>
				<td>'.$HIfemale3to6.'</td>
				<td>'.$LDfemale3to6.'</td>
				<td>'.$MRfemale3to6.'</td>
				<td>'.$MIfemale3to6.'</td>
				<td>'.$OTfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale6to14.'</td>
				<td>'.$Bmale6to14.'</td>
				<td>'.$LVmale6to14.'</td>
				<td>'.$LCmale6to14.'</td>
				<td>'.$HImale6to14.'</td>
				<td>'.$LDmale6to14.'</td>
				<td>'.$MRmale6to14.'</td>
				<td>'.$MImale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale6to14.'</td>
				<td>'.$Bfemale6to14.'</td>
				<td>'.$LVfemale6to14.'</td>
				<td>'.$LCfemale6to14.'</td>
				<td>'.$HIfemale6to14.'</td>
				<td>'.$LDfemale6to14.'</td>
				<td>'.$MRfemale6to14.'</td>
				<td>'.$MIfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale14to18.'</td>
				<td>'.$Bmale14to18.'</td>
				<td>'.$LVmale14to18.'</td>
				<td>'.$LCmale14to18.'</td>
				<td>'.$HImale14to18.'</td>
				<td>'.$LDmale14to18.'</td>
				<td>'.$MRmale14to18.'</td>
				<td>'.$MImale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale14to18.'</td>
				<td>'.$Bfemale14to18.'</td>
				<td>'.$LVfemale14to18.'</td>
				<td>'.$LCfemale14to18.'</td>
				<td>'.$HIfemale14to18.'</td>
				<td>'.$LDfemale14to18.'</td>
				<td>'.$MRfemale14to18.'</td>
				<td>'.$MIfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
			<td>'.$NoneTotalmale.'</td>
			<td>'.$BlindTotalmale.'</td>
			<td>'.$LowVisionTotalmale.'</td>
			<td>'.$LepCuredTotalmale.'</td>
			<td>'.$HearingTotalmale.'</td>
			<td>'.$LocDisabilityTotalmale.'</td>
			<td>'.$MentalRetarTotalmale.'</td>
			<td>'.$MentalIllTotalmale.'</td>
			<td>'.$OtherTotalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
			<td>'.$NoneTotalfemale.'</td>
			<td>'.$BlindTotalfemale.'</td>
			<td>'.$LowVisionTotalfemale.'</td>
			<td>'.$LepCuredTotalfemale.'</td>
			<td>'.$HearingTotalfemale.'</td>
			<td>'.$LocDisabilityTotalfemale.'</td>
			<td>'.$MentalRetarTotalfemale.'</td>
			<td>'.$MentalIllTotalfemale.'</td>
			<td>'.$OtherTotalfemale.'</td>
			</tr>
			<tr>
				<td colspan="11" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}

	
	
	
	

function childcurrent_birth_disability_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//`birth_disability` = 'None' 

 $sqlNmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain = $this->db->query($sqlNmale0to3);
		 $Nmale0to3 = $querymain->row(0)->Nmale0to3;
		 
		 
$sqlNfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain4 = $this->db->query($sqlNfemale0to3);
		 $Nfemale0to3 = $querymain4->row(0)->Nfemale0to3;
		 
		 
$sqlNmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain1 = $this->db->query($sqlNmale3to6);
		 $Nmale3to6 = $querymain1->row(0)->Nmale3to6;
		 
		 
$sqlNfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain5 = $this->db->query($sqlNfemale3to6);
		 $Nfemale3to6 = $querymain5->row(0)->Nfemale3to6;

 
$sqlNmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain2 = $this->db->query($sqlNmale6to14);
		 $Nmale6to14 = $querymain2->row(0)->Nmale6to14;
		 
		 
$sqlNfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain6 = $this->db->query($sqlNfemale6to14);
		 $Nfemale6to14 = $querymain6->row(0)->Nfemale6to14;

	 
$sqlNmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain3 = $this->db->query($sqlNmale14to18);
		 $Nmale14to18 = $querymain3->row(0)->Nmale14to18;

		 
$sqlNfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain7 = $this->db->query($sqlNfemale14to18);
		 $Nfemale14to18 = $querymain7->row(0)->Nfemale14to18;


   //`birth_disability` = 'Hearing' 
   
$sqlHmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain8 = $this->db->query($sqlHmale0to3);
		 $Hmale0to3 = $querymain8->row(0)->Hmale0to3;
		 
		 
$sqlHfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain12 = $this->db->query($sqlHfemale0to3);
		 $Hfemale0to3 = $querymain12->row(0)->Hfemale0to3;

$sqlHmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Hmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain9 = $this->db->query($sqlHmale3to6);
		 $Hmale3to6 = $querymain9->row(0)->Hmale3to6;
		 
		 
$sqlHfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Hfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain13 = $this->db->query($sqlHfemale3to6);
		 $Hfemale3to6 = $querymain13->row(0)->Hfemale3to6;


$sqlHmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain10 = $this->db->query($sqlHmale6to14);
		 $Hmale6to14 = $querymain10->row(0)->Hmale6to14;
		 
		 
$sqlHfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain14 = $this->db->query($sqlHfemale6to14);
		 $Hfemale6to14 = $querymain14->row(0)->Hfemale6to14;


$sqlHmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain11 = $this->db->query($sqlHmale14to18);
		 $Hmale14to18 = $querymain11->row(0)->Hmale14to18;


$sqlHfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain15 = $this->db->query($sqlHfemale14to18);
		 $Hfemale14to18 = $querymain15->row(0)->Hfemale14to18;
		 
		 
		  //`birth_disability` = 'Vision' 

$sqlVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain16 = $this->db->query($sqlVmale0to3);
		 $Vmale0to3 = $querymain16->row(0)->Vmale0to3;
		 
		 
$sqlVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain20 = $this->db->query($sqlVfemale0to3);
		 $Vfemale0to3 = $querymain20->row(0)->Vfemale0to3;

$sqlVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain17 = $this->db->query($sqlVmale3to6);
		 $Vmale3to6 = $querymain17->row(0)->Vmale3to6;
		 
		 
$sqlVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain21 = $this->db->query($sqlVfemale3to6);
		 $Vfemale3to6 = $querymain21->row(0)->Vfemale3to6;


$sqlVmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain18 = $this->db->query($sqlVmale6to14);
		 $Vmale6to14 = $querymain18->row(0)->Vmale6to14;
		 
		 
$sqlVfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain22 = $this->db->query($sqlVfemale6to14);
		 $Vfemale6to14 = $querymain22->row(0)->Vfemale6to14;

$sqlVmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain19 = $this->db->query($sqlVmale14to18);
		 $Vmale14to18 = $querymain19->row(0)->Vmale14to18;


$sqlVfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain23 = $this->db->query($sqlVfemale14to18);
		 $Vfemale14to18 = $querymain23->row(0)->Vfemale14to18;

		 
		 //`birth_disability` = 'Physical' 


$sqlPmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain24 = $this->db->query($sqlPmale0to3);
		 $Pmale0to3 = $querymain24->row(0)->Pmale0to3;
		 
		 

$sqlPfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain28 = $this->db->query($sqlPfemale0to3);
		 $Pfemale0to3 = $querymain28->row(0)->Pfemale0to3;

		 
$sqlPmale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain25 = $this->db->query($sqlPmale3to6);
		 $Pmale3to6 = $querymain25->row(0)->Pmale3to6;

$sqlPfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain29 = $this->db->query($sqlPfemale3to6);
		 $Pfemale3to6 = $querymain29->row(0)->Pfemale3to6;

$sqlPmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain26 = $this->db->query($sqlPmale6to14);
		 $Pmale6to14 = $querymain26->row(0)->Pmale6to14;
		 
		 
$sqlPfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain30 = $this->db->query($sqlPfemale6to14);
		 $Pfemale6to14 = $querymain30->row(0)->Pfemale6to14;



$sqlPmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain27 = $this->db->query($sqlPmale14to18);
		 $Pmale14to18 = $querymain27->row(0)->Pmale14to18;

$sqlPfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain31 = $this->db->query($sqlPfemale14to18);
		 $Pfemale14to18 = $querymain31->row(0)->Pfemale14to18;

		 
		  //`birth_disability` = 'Mentally' //

		  
$sqlMmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain32 = $this->db->query($sqlMmale0to3);
		 $Mmale0to3 = $querymain32->row(0)->Mmale0to3;
		 
		 	  
$sqlMfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain36 = $this->db->query($sqlMfemale0to3);
		 $Mfemale0to3 = $querymain36->row(0)->Mfemale0to3;
		  
$sqlMmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain33 = $this->db->query($sqlMmale3to6);
		 $Mmale3to6 = $querymain33->row(0)->Mmale3to6;
		 
		 		  
$sqlMfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Mfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain37 = $this->db->query($sqlMfemale3to6);
		 $Mfemale3to6 = $querymain37->row(0)->Mfemale3to6;

		  
$sqlMmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain34 = $this->db->query($sqlMmale6to14);
		 $Mmale6to14 = $querymain34->row(0)->Mmale6to14;
		 
		 		  
$sqlMfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain38 = $this->db->query($sqlMfemale6to14);
		 $Mfemale6to14 = $querymain38->row(0)->Mfemale6to14;
		  
$sqlMmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain35 = $this->db->query($sqlMmale14to18);
		 $Mmale14to18 = $querymain35->row(0)->Mmale14to18;

	

$sqlMfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain39 = $this->db->query($sqlMfemale14to18);
		 $Mfemale14to18 = $querymain39->row(0)->Mfemale14to18;
		 
		 
		  //``birth_disability`` = 'Other' //		


		  
$sqlOTmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain40 = $this->db->query($sqlOTmale0to3);
		 $OTmale0to3 = $querymain40->row(0)->OTmale0to3;

		 		 		  
$sqlOTfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain44 = $this->db->query($sqlOTfemale0to3);
		 $OTfemale0to3 = $querymain44->row(0)->OTfemale0to3;
		 
		  
$sqlOTmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain41 = $this->db->query($sqlOTmale3to6);
		 $OTmale3to6 = $querymain41->row(0)->OTmale3to6;

$sqlOTfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain45 = $this->db->query($sqlOTfemale3to6);
		 $OTfemale3to6 = $querymain45->row(0)->OTfemale3to6;

		  
$sqlOTmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain42 = $this->db->query($sqlOTmale6to14);
		 $OTmale6to14 = $querymain42->row(0)->OTmale6to14;

		 		 		  
$sqlOTfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain46 = $this->db->query($sqlOTfemale6to14);
		 $OTfemale6to14 = $querymain46->row(0)->OTfemale6to14;

		  
$sqlOTmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain43 = $this->db->query($sqlOTmale14to18);
		 $OTmale14to18 = $querymain43->row(0)->OTmale14to18;
 
		 		 		  
$sqlOTfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_village_name='".$ddlvillage."'";

         $querymain47 = $this->db->query($sqlOTfemale14to18);
		 $OTfemale14to18 = $querymain47->row(0)->OTfemale14to18;
		 
		 
		 
	
	$NoneTotalmale= $Nmale0to3 + $Nmale3to6 + $Nmale6to14 + $Nmale14to18 ;
	$NoneTotalfemale= $Nfemale0to3 + $Nfemale3to6 + $Nfemale6to14 + $Nfemale14to18 ;
	
	$HearingTotalmale= $Hmale0to3 + $Hmale3to6 + $Hmale6to14 + $Hmale14to18 ;
	$HearingTotalfemale= $Hfemale0to3 + $Hfemale3to6 + $Hfemale6to14 + $Hfemale14to18 ;
	
	$VisionTotalmale= $Vmale0to3 + $Vmale3to6 + $Vmale6to14 + $Vmale14to18 ;
	$VisionTotalfemale= $Vfemale0to3 + $Vfemale3to6 + $Vfemale6to14 + $Vfemale14to18 ;
	
	$PhysicalTotalmale= $Pmale0to3 + $Pmale3to6 + $Pmale6to14 + $Pmale14to18 ;
	$PhysicalTotalfemale= $Pfemale0to3 + $Pfemale3to6 + $Pfemale6to14 + $Pfemale14to18 ;
	
	$OtherTotalmale= $OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18 ;
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;">It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b> Report of  Birth disabled children information </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="7" align="center"><b> Report of  Birth disabled children information </b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>None</b></th>
				<th align="center"><b>Hearing</b></th>
				<th align="center"><b>Vision</b></th>
				<th align="center"><b>Physical</b></th> 
				<th align="center"><b>Other</b></th>
			</tr>
				<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale0to3.'</td>
				<td>'. $Hmale0to3.'</td>
				<td>'. $Vmale0to3.'</td>
				<td>'.$Pmale0to3.'</td>
				<td>'. $OTmale0to3.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale0to3.'</td>
				<td>'.$Hfemale0to3.'</td>
				<td>'. $Vfemale0to3.'</td>
				<td>'.$Pfemale0to3.'</td>
				<td>'. $OTfemale0to3.'</td>
			</tr>
				<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale3to6.'</td>
				<td>'. $Hmale3to6.'</td>
				<td>'. $Vmale3to6.'</td>
				<td>'.$Pmale3to6.'</td>
				<td>'. $OTmale3to6.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale3to6.'</td>
				<td>'.$Hfemale3to6.'</td>
				<td>'. $Vfemale3to6.'</td>
				<td>'.$Pfemale3to6.'</td>
				<td>'. $OTfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale6to14.'</td>
				<td>'. $Hmale6to14.'</td>
				<td>'. $Vmale6to14.'</td>
				<td>'.$Pmale6to14.'</td>
				<td>'. $OTmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale6to14.'</td>
				<td>'.$Hfemale6to14.'</td>
				<td>'. $Vfemale6to14.'</td>
				<td>'.$Pfemale6to14.'</td>
				<td>'. $OTfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale14to18.'</td>
				<td>'. $Hmale14to18.'</td>
				<td>'. $Vmale14to18.'</td>
				<td>'.$Pmale14to18.'</td>
				<td>'. $OTmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale14to18.'</td>
				<td>'.$Hfemale14to18.'</td>
				<td>'.$Vfemale14to18.'</td>
				<td>'.$Pfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$NoneTotalmale.'</td>
				<td>'.$HearingTotalmale.'</td>
				<td>'.$VisionTotalmale.'</td>
				<td>'.$PhysicalTotalmale.'</td>
				<td>'.$OtherTotalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$NoneTotalfemale.'</td>
				<td>'.$HearingTotalfemale.'</td>
				<td>'.$VisionTotalfemale.'</td>
				<td>'.$PhysicalTotalfemale.'</td>
				<td>'.$OtherTotalfemale.'</td>
			</tr>
			<tr>
				<td colspan="7" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	

function childnonenrolment_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='')
 {
$sqlLAmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
		
	    $querymain4 = $this->db->query($sqlLAmale6to14);
		$LAmale6to14 = $querymain4->row(0)->LAmale6to14;		
		
$sqlLAfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain5 = $this->db->query($sqlLAfemale6to14);
		$LAfemale6to14 = $querymain5->row(0)->LAfemale6to14;	
		
$sqlLAmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain6 = $this->db->query($sqlLAmale14to18);
		$LAmale14to18 = $querymain6->row(0)->LAmale14to18;	
		
$sqlLAfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain7 = $this->db->query($sqlLAfemale14to18);
		$LAfemale14to18 = $querymain7->row(0)->LAfemale14to18;	
		

$sqlNSmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain12 = $this->db->query($sqlNSmale6to14);
		$NSmale6to14 = $querymain12->row(0)->NSmale6to14;


$sqlNSfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain13 = $this->db->query($sqlNSfemale6to14);
		$NSfemale6to14 = $querymain13->row(0)->NSfemale6to14;
		
$sqlNSmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain14 = $this->db->query($sqlNSmale14to18);
		$NSmale14to18 = $querymain14->row(0)->NSmale14to18;


$sqlNSfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain15 = $this->db->query($sqlNSfemale14to18);
		$NSfemale14to18 = $querymain15->row(0)->NSfemale14to18;

$sqlTCmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain20 = $this->db->query($sqlTCmale6to14);
		$TCmale6to14 = $querymain20->row(0)->TCmale6to14;


$sqlTCfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain21 = $this->db->query($sqlTCfemale6to14);
		$TCfemale6to14 = $querymain21->row(0)->TCfemale6to14;
		
$sqlTCmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain22 = $this->db->query($sqlTCmale14to18);
		$TCmale14to18 = $querymain22->row(0)->TCmale14to18;

$sqlTCfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain23 = $this->db->query($sqlTCfemale14to18);
		$TCfemale14to18 = $querymain23->row(0)->TCfemale14to18;

	 $sqlOTmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain28 = $this->db->query($sqlOTmale6to14);
		$OTmale6to14 = $querymain28->row(0)->OTmale6to14; 
 
 $sqlOTfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain29 = $this->db->query($sqlOTfemale6to14);
		$OTfemale6to14 = $querymain29->row(0)->OTfemale6to14;  
 
 
 $sqlOTmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain30 = $this->db->query($sqlOTmale14to18);
		$OTmale14to18 = $querymain30->row(0)->OTmale14to18;   
 
 $sqlOTfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_village_name='".$ddlvillage."'";
			  
	    $querymain31 = $this->db->query($sqlOTfemale14to18);
		$OTfemale14to18 = $querymain31->row(0)->OTfemale14to18;   
		 
		 
	$LackTotalmale= $LAmale6to14 + $LAmale14to18 ;
	$LackTotalfemale= $LAfemale6to14 + $LAfemale14to18 ;
	
	$OtherTotalmale= $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale6to14 + $OTfemale14to18 ;
	
	$TakeTotalmale= $TCmale6to14 + $TCmale14to18 ;
	$TakeTotalfemale= $TCfemale6to14 + $TCfemale14to18 ;	
	
	
	$NearTotalmale= $NSmale6to14 + $NSmale14to18 ;
	$NearTotalfemale= $NSfemale6to14 + $NSfemale14to18 ;	
	
	$total6to14Male=$LAmale6to14 + $OTmale6to14 +$TCmale6to14 + $NSmale6to14;
	$total6to14feMale=$LAfemale6to14 + $OTfemale6to14 +$TCfemale6to14 +$NSmale6to14;
	$total14to18Male=$LAmale14to18  + $OTmale14to18 + $TCmale14to18+ $NSmale14to18;
	$total14to18feMale=$LAfemale14to18 + $OTfemale14to18 + $TCfemale14to18 + $NSfemale14to18;
	$totmale=   $total6to14Male + $total14to18Male;
	$totfemale= $total6to14feMale + $total14to18feMale;
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of non- enrolment to School(General break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="7" align="center"><b> Report of non- enrolment to School(General break up) </b></td>
			</tr>
			<tr>
				<th align="center"><b>Age Group</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>Lack of awareness</b></th>
				<th align="center"><b>Taking care of siblings</b></th>
				<th align="center"><b>Other</b></th>   
				<th align="center"><b>No school nearby </b></th>
				<th align="center"><b>Total</b></th>
			</tr>

			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>Male</td>
				<td>'.$LAmale6to14.'</td>
				<td>'.$TCmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$NSmale6to14.'</td>
				<td>'.$total6to14Male.'</td>
			</tr>
			<tr>
				<td>Female </td>	
				<td>'.$LAfemale6to14.'</td>
				<td>'.$TCfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$NSfemale6to14.'</td>
				<td>'.$total6to14feMale.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>Male</td>
				<td>'.$LAmale14to18.'</td>
				<td>'.$TCmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$NSmale14to18.'</td>
				<td>'.$total14to18Male.'</td>
			</tr>
			<tr>
				<td>Female </td>
				<td>'.$LAfemale14to18.'</td>
				<td>'.$TCfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$NSfemale14to18.'</td> 
				<td>'.$total14to18feMale.'</td> 
			</tr>	
			<tr>
				<td rowspan="2">Total no. of Children</td>
				<td>male Childrens no</td>
				<td>'.$LackTotalmale.'</td>
				<td>'.$TakeTotalmale.'</td>
				<td>'.$OtherTotalmale.'</td>
				<td>'.$NearTotalmale.'</td>
				<td>'.$totmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$LackTotalfemale.'</td>
				<td>'.$TakeTotalfemale.'</td>
				<td>'.$OtherTotalfemale.'</td>
				<td>'.$NearTotalfemale.'</td>
				<td>'.$totfemale.'</td>
			</tr>
			
			<tr>
				<td colspan="7" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	

	
	
	
	function childprimary_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
				
	$txtpanchayat = stripslashes($txtpanchayat);
		$sql="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Gmale6to14 FROM ocop_general_info LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id WHERE  primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		//echo $sql;die();
		$querymain = $this->db->query($sql);
			$Gmale6to14 = $querymain->row(0)->Gmale6to14;
			

			
		
		$sql111="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain111 = $this->db->query($sql111);
			$Gfemale6to14 = $querymain111->row(0)->Gfemale6to14;
			
			
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain10 = $this->db->query($sql10);
			$Gmale14to18 = $querymain10->row(0)->Gmale14to18;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain11 = $this->db->query($sql11);
			$Gfemale14to18 = $querymain11->row(0)->Gfemale14to18;
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 and household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain2 = $this->db->query($sql2);
			$PVmale6to14 = $querymain2->row(0)->PVmale6to14;
		
		$sql3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS PVfemale6to14 FROM ocop_general_info LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id WHERE  primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain3 = $this->db->query($sql3);
			$PVfemale6to14 = $querymain3->row(0)->PVfemale6to14;
		
		$sql4="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NGmale6to14 FROM ocop_general_info LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id WHERE  primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain4 = $this->db->query($sql4);
			$NGmale6to14 = $querymain4->row(0)->NGmale6to14;
		
		$sql5="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NGfemale6to14 FROM ocop_general_info LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id WHERE  primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain5 = $this->db->query($sql5);
			$NGfemale6to14 = $querymain5->row(0)->NGfemale6to14;

		$sql6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTmale6to14 FROM ocop_general_info LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id WHERE  primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain6 = $this->db->query($sql6);
			$OTmale6to14 = $querymain6->row(0)->OTmale6to14;
		
		$sql7="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTfemale6to14 FROM ocop_general_info LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id WHERE  primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain7 = $this->db->query($sql7);
			$OTfemale6to14 = $querymain7->row(0)->OTfemale6to14;
		
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain8 = $this->db->query($sql8);
			$ARmale6to14 = $querymain8->row(0)->ARmale6to14;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain9 = $this->db->query($sql9);
			$ARfemale6to14 = $querymain9->row(0)->ARfemale6to14;
			
				
		$sql071="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain071 = $this->db->query($sql071);
			$NOmale6to14 = $querymain071->row(0)->NOmale6to14;
		
		$sql072="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain072 = $this->db->query($sql072);
			$NOfemale6to14 = $querymain072->row(0)->NOfemale6to14;
			

		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain12 = $this->db->query($sql12);
			$PVmale14to18 = $querymain12->row(0)->PVmale14to18;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain13 = $this->db->query($sql13);
			$PVfemale14to18 = $querymain13->row(0)->PVfemale14to18;
		
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain14 = $this->db->query($sql14);
			$NGmale14to18 = $querymain14->row(0)->NGmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain15 = $this->db->query($sql15);
			$NGfemale14to18 = $querymain15->row(0)->NGfemale14to18;
			
		$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain16 = $this->db->query($sql16);
			$OTmale14to18 = $querymain16->row(0)->OTmale14to18;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain17 = $this->db->query($sql17);
			$OTfemale14to18 = $querymain17->row(0)->OTfemale14to18;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain18 = $this->db->query($sql18);
			$ARmale14to18 = $querymain18->row(0)->ARmale14to18;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain19 = $this->db->query($sql19);
			$ARfemale14to18 = $querymain19->row(0)->ARfemale14to18;
		
		$sql081="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain081 = $this->db->query($sql081);
			$NOmale14to18 = $querymain081->row(0)->NOmale14to18;
		
		$sql082="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain082 = $this->db->query($sql082);
			$NOfemale14to18 = $querymain082->row(0)->NOfemale14to18;	
			
		
		
		$totmale6to14 = $Gmale6to14 + $PVmale6to14 + $NGmale6to14 + $OTmale6to14 + $ARmale6to14 + $NOmale6to14;
		$totfemale6to14 = $Gfemale6to14 + $PVfemale6to14 + $NGfemale6to14 + $OTfemale6to14 + $ARfemale6to14 + $NOfemale6to14;
		
		$totmale14to18 = $Gmale14to18 + $PVmale14to18 + $NGmale14to18 + $OTmale14to18 + $ARmale14to18 + $NOmale14to18;
		$totfemale14to18 = $Gfemale14to18 + $PVfemale14to18 + $NGfemale14to18 + $OTfemale14to18 + $ARfemale14to18 + $NOfemale14to18;
		
		$Gtotalmale= $Gmale6to14 + $Gmale14to18;
		$PVtotalmale=$PVmale6to14 + $PVmale14to18;
		$NGtotalmale= $NGmale6to14 +$NGmale14to18;
		$OTtotalmale= $OTmale6to14 + $OTmale14to18;
		$ARtotalmale= $ARmale6to14 + $ARmale14to18;
		$NOtotalmale= $NOmale6to14 + $NOmale14to18;
		
		$Gtotalfemale= $Gfemale6to14 + $Gfemale14to18;
		$PVtotalfemale=$PVfemale6to14 + $PVfemale14to18;
		$NGtotalfemale= $NGfemale6to14 +$NGfemale14to18;
		$OTtotalfemale= $OTfemale6to14 + $OTfemale14to18;
		$ARtotalfemale= $ARfemale6to14 + $ARfemale14to18;
		$NOtotalfemale= $NOfemale6to14 + $NOfemale14to18;
		
		$totmale= $Gtotalmale + $PVtotalmale + $NGtotalmale + $OTtotalmale + $ARtotalmale + $NOtotalmale;
		$totfemale= $Gtotalfemale + $PVtotalfemale + $NGtotalfemale + $OTtotalfemale + $ARtotalfemale + $NOtotalfemale ;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2.5" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b>Our Children Our Progress<br>
					(Child Tracking System)</b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;">It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of Primary enrolled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red"></span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		
			
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="9" align="center"><b>Report of Primary enrolled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>No of  Primary enrolled children</b></th>
				<th align="center"><b>Government </b></th>
				<th align="center"><b>Private</b></th>
				<th align="center"><b>NGO</b></th>
				<th align="center"><b>Other</b></th>
				<th align="center"><b>Attending regularly</b></th>
				<th align="center"><b>Total no. of Children </b></th>
				  	
			</tr>
			
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale6to14.'</td>
				<td>'.$Gmale6to14.'</td>
				<td>'.$PVmale6to14.'</td>
				<td>'.$NGmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$ARmale6to14.'</td>
				<td>'.$totmale6to14.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale6to14.'</td>
				<td>'.$Gfemale6to14.'</td>
				<td>'.$PVfemale6to14.'</td>
				<td>'.$NGfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$ARfemale6to14.'</td>
				<td>'.$totfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale14to18.'</td>
				<td>'.$Gmale14to18.'</td>
				<td>'.$PVmale14to18.'</td>
				<td>'.$NGmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$ARmale14to18.'</td>
				<td>'.$totmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale14to18.'</td>
				<td>'.$Gfemale14to18.'</td>
				<td>'.$PVfemale14to18.'</td>
				<td>'.$NGfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$ARfemale14to18.'</td>
				<td>'.$totfemale14to18.'</td>
			</tr>
			
				<tr>
				<td rowspan="2">Total on of Children</td>
				<td>Total Male number of Childrens</td>
				<td>'.$NOtotalmale.'</td>
				<td>'.$Gtotalmale.'</td>
				<td>'.$PVtotalmale.'</td>
				<td>'.$NGtotalmale.'</td>
				<td>'.$OTtotalmale.'</td>
				<td>'.$ARtotalmale.'</td>
				<td>'.$totmale.'</td>
			</tr>
			<tr>
				<td>Total Female Childrens no yrs</td>
				<td>'.$NOtotalfemale.'</td>
				<td>'.$Gtotalfemale.'</td>
				<td>'.$PVtotalfemale.'</td>
				<td>'.$NGtotalfemale.'</td>
				<td>'.$OTtotalfemale.'</td>
				<td>'.$ARtotalfemale.'</td>
				<td>'.$totfemale.'</td>
			</tr>
			
			<tr>
				<td colspan="9" align="left"><b><u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of live data. </span></b></td>
			</tr>
		</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}		
	

	function childpre_primary_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
	$txtpanchayat = stripslashes($txtpanchayat);
	
			$sqlmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain = $this->db->query($sqlmale3to6);
			$Gmale3to6 = $querymain->row(0)->Gmale3to6;
		
		$sqlGfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain1 = $this->db->query($sqlGfemale3to6);
			$Gfemale3to6 = $querymain1->row(0)->Gfemale3to6;
		
		
		$sqlPVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain2 = $this->db->query($sqlPVmale3to6);
			$PVmale3to6 = $querymain2->row(0)->PVmale3to6;
		
		$sqlPVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain3 = $this->db->query($sqlPVfemale3to6);
			$PVfemale3to6 = $querymain3->row(0)->PVfemale3to6;
		
		$sqlNGmale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain4 = $this->db->query($sqlNGmale3to6);
			$NGmale3to6 = $querymain4->row(0)->NGmale3to6;
		
		$sqlNGfemale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain5 = $this->db->query($sqlNGfemale3to6);
			$NGfemale3to6 = $querymain5->row(0)->NGfemale3to6;
			
		$sqlOTmale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain6 = $this->db->query($sqlOTmale3to6);
			$OTmale3to6 = $querymain6->row(0)->OTmale3to6;
		
		$sqlOTfemale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain7 = $this->db->query($sqlOTfemale3to6);
			$OTfemale3to6 = $querymain7->row(0)->OTfemale3to6;
		
		
		$sqlARmale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain8 = $this->db->query($sqlARmale3to6);
			$ARmale3to6 = $querymain8->row(0)->ARmale3to6;
		
		$sqlARfemale3to6 ="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain9 = $this->db->query($sqlARfemale3to6);
			$ARfemale3to6 = $querymain9->row(0)->ARfemale3to6;
			
				
		$sqlNOmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain071 = $this->db->query($sqlNOmale3to6);
			$NOmale3to6 = $querymain071->row(0)->NOmale3to6;
		
		$sqlNOfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale3to6 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain072 = $this->db->query($sqlNOfemale3to6);
			$NOfemale3to6 = $querymain072->row(0)->NOfemale3to6;
			

			
			
		$sqlGmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain10 = $this->db->query($sqlGmale0to3);
			$Gmale0to3 = $querymain10->row(0)->Gmale0to3;
		
		$sqlGfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain11 = $this->db->query($sqlGfemale0to3);
			$Gfemale0to3 = $querymain11->row(0)->Gfemale0to3;
		
		
		$sqlPVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain12 = $this->db->query($sqlPVmale0to3);
			$PVmale0to3 = $querymain12->row(0)->PVmale0to3;
		
		$sqlPVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain13 = $this->db->query($sqlPVfemale0to3);
			$PVfemale0to3 = $querymain13->row(0)->PVfemale0to3;
		
		$sqlNGmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain14 = $this->db->query($sqlNGmale0to3);
			$NGmale0to3 = $querymain14->row(0)->NGmale0to3;
		
		$sqlNGfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain15 = $this->db->query($sqlNGfemale0to3);
			$NGfemale0to3 = $querymain15->row(0)->NGfemale0to3;
			
		$sqlOTmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain16 = $this->db->query($sqlOTmale0to3);
			$OTmale0to3 = $querymain16->row(0)->OTmale0to3;
		
		$sqlOTfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain17 = $this->db->query($sqlOTfemale0to3);
			$OTfemale0to3 = $querymain17->row(0)->OTfemale0to3;
		
		
		$sqlARmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain18 = $this->db->query($sqlARmale0to3);
			$ARmale0to3 = $querymain18->row(0)->ARmale0to3;
		
		$sqlARfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale0to3 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain19 = $this->db->query($sqlARfemale0to3);
			$ARfemale0to3 = $querymain19->row(0)->ARfemale0to3;
		
		$sqlNOmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain081 = $this->db->query($sqlNOmale0to3);
			$NOmale0to3 = $querymain081->row(0)->NOmale0to3;
		
		$sqlNOfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale0to3 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain082 = $this->db->query($sqlNOfemale0to3);
			$NOfemale0to3 = $querymain082->row(0)->NOfemale0to3;	
			
			
			
			
			$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain = $this->db->query($sql);
			$Gmale6to14 = $querymain->row(0)->Gmale6to14;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14 AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain1 = $this->db->query($sql1);
			$Gfemale6to14 = $querymain1->row(0)->Gfemale6to14;
		
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain2 = $this->db->query($sql2);
			$PVmale6to14 = $querymain2->row(0)->PVmale6to14;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain3 = $this->db->query($sql3);
			$PVfemale6to14 = $querymain3->row(0)->PVfemale6to14;
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain4 = $this->db->query($sql4);
			$NGmale6to14 = $querymain4->row(0)->NGmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain5 = $this->db->query($sql5);
			$NGfemale6to14 = $querymain5->row(0)->NGfemale6to14;
			
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain6 = $this->db->query($sql6);
			$OTmale6to14 = $querymain6->row(0)->OTmale6to14;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain7 = $this->db->query($sql7);
			$OTfemale6to14 = $querymain7->row(0)->OTfemale6to14;
		
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain8 = $this->db->query($sql8);
			$ARmale6to14 = $querymain8->row(0)->ARmale6to14;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain9 = $this->db->query($sql9);
			$ARfemale6to14 = $querymain9->row(0)->ARfemale6to14;
			
				
		$sql071="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain071 = $this->db->query($sql071);
			$NOmale6to14 = $querymain071->row(0)->NOmale6to14;
		
		$sql072="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale6to14 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain072 = $this->db->query($sql072);
			$NOfemale6to14 = $querymain072->row(0)->NOfemale6to14;
			
			
			
			
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain10 = $this->db->query($sql10);
			$Gmale14to18 = $querymain10->row(0)->Gmale14to18;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Gfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'government' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18 AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain11 = $this->db->query($sql11);
			$Gfemale14to18 = $querymain11->row(0)->Gfemale14to18;
		
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain12 = $this->db->query($sql12);
			$PVmale14to18 = $querymain12->row(0)->PVmale14to18;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PVfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'private' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain13 = $this->db->query($sql13);
			$PVfemale14to18 = $querymain13->row(0)->PVfemale14to18;
		
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain14 = $this->db->query($sql14);
			$NGmale14to18 = $querymain14->row(0)->NGmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NGfemale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'NGO' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain15 = $this->db->query($sql15);
			$NGfemale14to18 = $querymain15->row(0)->NGfemale14to18;
			
		$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain16 = $this->db->query($sql16);
			$OTmale14to18 = $querymain16->row(0)->OTmale14to18;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type = 'other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain17 = $this->db->query($sql17);
			$OTfemale14to18 = $querymain17->row(0)->OTfemale14to18;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain18 = $this->db->query($sql18);
			$ARmale14to18 = $querymain18->row(0)->ARmale14to18;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS ARfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE pre_primary_type IN ('other', 'NGO', 'government', 'private')
			AND attending_regularly = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain19 = $this->db->query($sql19);
			$ARfemale14to18 = $querymain19->row(0)->ARfemale14to18;
		
		$sql081="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain081 = $this->db->query($sql081);
			$NOmale14to18 = $querymain081->row(0)->NOmale14to18;
		
		$sql082="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS NOfemale14to18 FROM ocop_general_info 
			LEFT JOIN ocop_education 	ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id  
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE enrollment_pre_primary = 'yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain082 = $this->db->query($sql082);
			$NOfemale14to18 = $querymain082->row(0)->NOfemale14to18;	
			
			
		$totmale0to3 =  $Gmale0to3 + $PVmale0to3 + $NGmale0to3 + $OTmale0to3 + $ARmale0to3 + $NOmale0to3;
		$totfemale0to3 = $Gfemale0to3 + $PVfemale0to3 + $NGfemale0to3 + $OTfemale0to3 + $ARfemale0to3 + $NOfemale0to3;
		
		$totmale3to6 =  $Gmale3to6 + $PVmale3to6 + $NGmale3to6 + $OTmale3to6 + $ARmale3to6 + $NOmale3to6;
		$totfemale3to6 = $Gfemale3to6 + $PVfemale3to6 + $NGfemale3to6 + $OTfemale3to6 + $ARfemale3to6 + $NOfemale3to6;
		
		$totmale6to14 =  $Gmale6to14 + $PVmale6to14 + $NGmale6to14 + $OTmale6to14 + $ARmale6to14 + $NOmale6to14;
		$totfemale6to14 = $Gfemale6to14 + $PVfemale6to14 + $NGfemale6to14 + $OTfemale6to14 + $ARfemale6to14 + $NOfemale6to14;
		
		$totmale14to18 = $Gmale14to18 + $PVmale14to18 + $NGmale14to18 + $OTmale14to18 + $ARmale14to18 + $NOmale14to18;
		$totfemale14to18 = $Gfemale14to18 + $PVfemale14to18 + $NGfemale14to18 + $OTfemale14to18 + $ARfemale14to18 + $NOfemale14to18;
		
		$Gtotalmale= $Gmale0to3 + $Gmale3to6 + $Gmale6to14 + $Gmale14to18 ;
		$PVtotalmale=$PVmale0to3 + $PVmale3to6 + $PVmale6to14 + $PVmale14to18;
		$NGtotalmale=$NGmale0to3 + $NGmale3to6 + $NGmale6to14 + $NGmale14to18;
		$OTtotalmale=$OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18;
		$ARtotalmale=$ARmale0to3 + $ARmale3to6 + $ARmale6to14 + $ARmale14to18;
		$NOtotalmale=$NOmale0to3 + $NOmale3to6 + $NOmale6to14 + $NOmale14to18;
		
		$Gtotalfemale =  $Gfemale0to3 + $Gfemale3to6 + $Gfemale6to14 + $Gfemale14to18;
		$PVtotalfemale = $PVfemale0to3 + $PVfemale3to6 + $PVfemale6to14 + $PVfemale14to18;
		$NGtotalfemale = $NGfemale0to3 + $NGfemale3to6 + $NGfemale6to14 + $NGfemale14to18;
		$OTtotalfemale = $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18;
		$ARtotalfemale = $ARfemale0to3 + $ARfemale3to6 + $ARfemale6to14 + $ARfemale14to18;
		$NOtotalfemale = $NOfemale0to3 + $NOfemale3to6 + $NOfemale6to14 + $NOfemale14to18;
		
		$totmale= $Gtotalmale + $PVtotalmale + $NGtotalmale + $OTtotalmale + $ARtotalmale + $NOtotalmale;
		$totfemale= $Gtotalfemale + $PVtotalfemale + $NGtotalfemale + $OTtotalfemale + $ARtotalfemale + $NOtotalfemale ;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2.5" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h4>Our Children Our Progress<br>
					(Child Tracking System)</h4></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h4>It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h4></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of Pre-Primary enrolled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		
			
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="9" align="center"><b>Report of Pre-Primary enrolled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>No of Pre-Primary enrolled children</b></th>
				<th align="center"><b>Government </b></th>
				<th align="center"><b>Private</b></th>
				<th align="center"><b>NGO</b></th>
				<th align="center"><b>Other</b></th>
				<th align="center"><b>Attending regularly</b></th>
				<th align="center"><b>Total no. of Children </b></th> 	
			</tr>
			<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale0to3.'</td>
				<td>'.$Gmale0to3.'</td>
				<td>'.$PVmale0to3.'</td>
				<td>'.$NGmale0to3.'</td>
				<td>'.$OTmale0to3.'</td>
				<td>'.$ARmale0to3.'</td>
				<td>'.$totmale0to3.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale0to3.'</td>
				<td>'.$Gfemale0to3.'</td>
				<td>'.$PVfemale0to3.'</td>
				<td>'.$NGfemale0to3.'</td>
				<td>'.$OTfemale0to3.'</td>
				<td>'.$ARfemale0to3.'</td>
				<td>'.$totfemale0to3.'</td>
			</tr>
			
			
			<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale3to6.'</td>
				<td>'.$Gmale3to6.'</td>
				<td>'.$PVmale3to6.'</td>
				<td>'.$NGmale3to6.'</td>
				<td>'.$OTmale3to6.'</td>
				<td>'.$ARmale3to6.'</td>
				<td>'.$totmale3to6.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale3to6.'</td>
				<td>'.$Gfemale3to6.'</td>
				<td>'.$PVfemale3to6.'</td>
				<td>'.$NGfemale3to6.'</td>
				<td>'.$OTfemale3to6.'</td>
				<td>'.$ARfemale3to6.'</td>
				<td>'.$totfemale3to6.'</td>
			</tr>
			
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale6to14.'</td>
				<td>'.$Gmale6to14.'</td>
				<td>'.$PVmale6to14.'</td>
				<td>'.$NGmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$ARmale6to14.'</td>
				<td>'.$totmale6to14.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale6to14.'</td>
				<td>'.$Gfemale6to14.'</td>
				<td>'.$PVfemale6to14.'</td>
				<td>'.$NGfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$ARfemale6to14.'</td>
				<td>'.$totfemale6to14.'</td>
			</tr>
			
			
			
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$NOmale14to18.'</td>
				<td>'.$Gmale14to18.'</td>
				<td>'.$PVmale14to18.'</td>
				<td>'.$NGmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$ARmale14to18.'</td>
				<td>'.$totmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$NOfemale14to18.'</td>
				<td>'.$Gfemale14to18.'</td>
				<td>'.$PVfemale14to18.'</td>
				<td>'.$NGfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$ARfemale14to18.'</td>
				<td>'.$totfemale14to18.'</td>
			</tr>
			
				<tr>
				<td rowspan="2">Total no. of childrens.</td>
				<td>Total Male number of Childrens</td>
				<td>'.$NOtotalmale.'</td>
				<td>'.$Gtotalmale.'</td>
				<td>'.$PVtotalmale.'</td>
				<td>'.$NGtotalmale.'</td>
				<td>'.$OTtotalmale.'</td>
				<td>'.$ARtotalmale.'</td>
				<td>'.$totmale.'</td>
			</tr>
			<tr>
				<td>Total Female Childrens no yrs</td>
				<td>'.$NOtotalfemale.'</td>
				<td>'.$Gtotalfemale.'</td>
				<td>'.$PVtotalfemale.'</td>
				<td>'.$NGtotalfemale.'</td>
				<td>'.$OTtotalfemale.'</td>
				<td>'.$ARtotalfemale.'</td>
				<td>'.$totfemale.'</td>
			</tr>
			
			<tr>
				<td colspan="9" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are not live data </span></b></td>
			</tr>
		</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}		
	
	
function childnon_enrolment_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='')
 {
 $txtpanchayat = stripslashes($txtpanchayat);
$sqlLAmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		
	    $querymain4 = $this->db->query($sqlLAmale6to14);
		$LAmale6to14 = $querymain4->row(0)->LAmale6to14;		
		
$sqlLAfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain5 = $this->db->query($sqlLAfemale6to14);
		$LAfemale6to14 = $querymain5->row(0)->LAfemale6to14;	
		
$sqlLAmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain6 = $this->db->query($sqlLAmale14to18);
		$LAmale14to18 = $querymain6->row(0)->LAmale14to18;	
		
$sqlLAfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS LAfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Lack of awareness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain7 = $this->db->query($sqlLAfemale14to18);
		$LAfemale14to18 = $querymain7->row(0)->LAfemale14to18;	
		

$sqlNSmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain12 = $this->db->query($sqlNSmale6to14);
		$NSmale6to14 = $querymain12->row(0)->NSmale6to14;


$sqlNSfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain13 = $this->db->query($sqlNSfemale6to14);
		$NSfemale6to14 = $querymain13->row(0)->NSfemale6to14;
		
$sqlNSmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain14 = $this->db->query($sqlNSmale14to18);
		$NSmale14to18 = $querymain14->row(0)->NSmale14to18;


$sqlNSfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS NSfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='No school nearby'	 AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain15 = $this->db->query($sqlNSfemale14to18);
		$NSfemale14to18 = $querymain15->row(0)->NSfemale14to18;

$sqlTCmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain20 = $this->db->query($sqlTCmale6to14);
		$TCmale6to14 = $querymain20->row(0)->TCmale6to14;


$sqlTCfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain21 = $this->db->query($sqlTCfemale6to14);
		$TCfemale6to14 = $querymain21->row(0)->TCfemale6to14;
		
$sqlTCmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain22 = $this->db->query($sqlTCmale14to18);
		$TCmale14to18 = $querymain22->row(0)->TCmale14to18;

$sqlTCfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS TCfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Taking care of siblings' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain23 = $this->db->query($sqlTCfemale14to18);
		$TCfemale14to18 = $querymain23->row(0)->TCfemale14to18;

	 $sqlOTmale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTmale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain28 = $this->db->query($sqlOTmale6to14);
		$OTmale6to14 = $querymain28->row(0)->OTmale6to14; 
 
 $sqlOTfemale6to14=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTfemale6to14 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain29 = $this->db->query($sqlOTfemale6to14);
		$OTfemale6to14 = $querymain29->row(0)->OTfemale6to14;  
 
 
 $sqlOTmale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTmale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain30 = $this->db->query($sqlOTmale14to18);
		$OTmale14to18 = $querymain30->row(0)->OTmale14to18;   
 
 $sqlOTfemale14to18=" SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS OTfemale14to18 FROM ocop_general_info 
              LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id  = household_entry.household_entry_id
              LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id 
              WHERE `non_enrollment_reasons`='Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) 
              BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			  
	    $querymain31 = $this->db->query($sqlOTfemale14to18);
		$OTfemale14to18 = $querymain31->row(0)->OTfemale14to18;   
		 
		 
	$LackTotalmale= $LAmale6to14 + $LAmale14to18 ;
	$LackTotalfemale= $LAfemale6to14 + $LAfemale14to18 ;
	
	$OtherTotalmale= $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale6to14 + $OTfemale14to18 ;
	
	$TakeTotalmale= $TCmale6to14 + $TCmale14to18 ;
	$TakeTotalfemale= $TCfemale6to14 + $TCfemale14to18 ;	
	
	
	$NearTotalmale= $NSmale6to14 + $NSmale14to18 ;
	$NearTotalfemale= $NSfemale6to14 + $NSfemale14to18 ;	
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of non- enrolment to School based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="6" align="center"><b> Report of non- enrolment to School based on multiple Grama Panchayat </b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>Lack of awareness</b></th>
				<th align="center"><b>Taking care of siblings</b></th>
				<th align="center"><b>Other</b></th>   
				<th align="center"><b>No school nearby </b></th>
			</tr>
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$LAmale6to14.'</td>
				<td>'.$TCmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$NSmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>	
				<td>'.$LAfemale6to14.'</td>
				<td>'.$TCfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$NSfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$LAmale14to18.'</td>
				<td>'.$TCmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$NSmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$LAfemale14to18.'</td>
				<td>'.$TCfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$NSfemale14to18.'</td>
			</tr>	
			<tr>
				<td rowspan="2">Total no. of Children</td>
				<td>male Childrens no</td>
				<td>'.$LackTotalmale.'</td>
				<td>'.$TakeTotalmale.'</td>
				<td>'.$OtherTotalmale.'</td>
				<td>'.$NearTotalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$LackTotalfemale.'</td>
				<td>'.$TakeTotalfemale.'</td>
				<td>'.$OtherTotalfemale.'</td>
				<td>'.$NearTotalfemale.'</td>
			</tr>
			<tr>
				<td colspan="6" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	

		
	
	
	
	
	function workingchildrens_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		$txtpanchayat = stripslashes($txtpanchayat);
		//`drop_out_reason` =  'other' 
		
		$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		$WCmale0to3 = $querymain->row(0)->WCmale0to3;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain1 = $this->db->query($sql1);
		$WCfemale0to3 = $querymain1->row(0)->WCfemale0to3;
		
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain2 = $this->db->query($sql2);
			$WCmale3to6 = $querymain2->row(0)->WCmale3to6;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain3 = $this->db->query($sql3);
			$WCfemale3to6 = $querymain3->row(0)->WCfemale3to6;
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain4 = $this->db->query($sql4);
			$WCmale6to14 = $querymain4->row(0)->WCmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain5 = $this->db->query($sql5);
			$WCfemale6to14 = $querymain5->row(0)->WCfemale6to14;
			
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain6 = $this->db->query($sql6);
			$WCmale14to18 = $querymain6->row(0)->WCmale14to18;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS WCfemale14to18 FROM ocop_general_info LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id  LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE child_working = 'Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain7 = $this->db->query($sql7);
			$WCfemale14to18 = $querymain7->row(0)->WCfemale14to18;
		
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain8 = $this->db->query($sql8);
		$FTmale0to3 = $querymain8->row(0)->FTmale0to3;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain9 = $this->db->query($sql9);
		$FTfemale0to3 = $querymain9->row(0)->FTfemale0to3;
		
		
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain10 = $this->db->query($sql10);
			$FTmale3to6 = $querymain10->row(0)->FTmale3to6;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain11 = $this->db->query($sql11);
			$FTfemale3to6 = $querymain11->row(0)->FTfemale3to6;
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain12 = $this->db->query($sql12);
			$FTmale6to14 = $querymain12->row(0)->FTmale6to14;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain13 = $this->db->query($sql13);
			$FTfemale6to14 = $querymain13->row(0)->FTfemale6to14;
			
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain14 = $this->db->query($sql14);
			$FTmale14to18 = $querymain14->row(0)->FTmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS FTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id  LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE working_status='Full time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
		AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain15 = $this->db->query($sql15);
		$FTfemale14to18 = $querymain15->row(0)->FTfemale14to18;
		
			$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain16 = $this->db->query($sql16);
		$PTmale0to3 = $querymain16->row(0)->PTmale0to3;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale0to3 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain17 = $this->db->query($sql17);
		$PTfemale0to3 = $querymain17->row(0)->PTfemale0to3;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain18 = $this->db->query($sql18);
			$PTmale3to6 = $querymain18->row(0)->PTmale3to6;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale3to6 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain19 = $this->db->query($sql19);
			$PTfemale3to6 = $querymain19->row(0)->PTfemale3to6;
		
		$sql20="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain20 = $this->db->query($sql20);
			$PTmale6to14 = $querymain20->row(0)->PTmale6to14;
		
		$sql21="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale6to14 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
			AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain21 = $this->db->query($sql21);
			$PTfemale6to14 = $querymain21->row(0)->PTfemale6to14;
			
		$sql22="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
			LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
			WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
			AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
			$querymain22 = $this->db->query($sql22);
			$PTmale14to18 = $querymain22->row(0)->PTmale14to18;
		
		$sql23="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS PTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id  LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE working_status='Part time' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
		AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain23 = $this->db->query($sql23);
		$PTfemale14to18 = $querymain23->row(0)->PTfemale14to18;
		
		
		
		$totmale0to3 = $WCmale0to3 + $FTmale0to3 + $PTmale0to3;
		$totfemale0to3 = $WCfemale0to3 + $FTfemale0to3 + $PTfemale0to3;
		$totmale3to6 = $WCmale3to6 + $FTmale3to6 + $PTmale3to6;
		$totfemale3to6 = $WCfemale3to6 + $FTfemale3to6 + $PTfemale3to6;
		$totmale6to14 = $WCmale6to14 + $FTmale6to14 + $PTmale6to14;
		$totfemale6to14 = $WCfemale6to14 + $FTfemale6to14 + $PTfemale6to14;
		$totmale14to18 = $WCmale14to18 + $FTmale14to18 + $PTmale14to18;
		$totfemale14to18 = $WCfemale14to18 + $FTfemale14to18 + $PTfemale14to18;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2.5" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of working children information based on multiple Grama Panchayat </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		
			
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="6" align="center"><b>Report of working children information based on multiple Grama Panchayat </b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>No. of working children</b></th>
				<th align="center"><b>Full time </b></th>
				<th align="center"><b>Part time    </b></th>
				<th align="center"><b>Total no. of Children / No of Drop out children</b></th>
			</tr>
			
			<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$WCmale0to3.'</td>
				<td>'.$FTmale0to3.'</td>
				<td>'.$PTmale0to3.'</td>
				<td>'.$totmale0to3.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$WCfemale0to3.'</td>
				<td>'.$FTfemale0to3.'</td>
				<td>'.$PTfemale0to3.'</td>
				<td>'.$totfemale0to3.'</td>
			</tr>
			<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$WCmale3to6.'</td>
				<td>'.$FTmale3to6.'</td>
				<td>'.$PTmale3to6.'</td>
				<td>'.$totmale3to6.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$WCfemale3to6.'</td>
				<td>'.$FTfemale3to6.'</td>
				<td>'.$PTfemale3to6.'</td>
				<td>'.$totfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$WCmale6to14.'</td>
				<td>'.$FTmale6to14.'</td>
				<td>'.$PTmale6to14.'</td>
				<td>'.$totmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$WCfemale6to14.'</td>
				<td>'.$FTfemale6to14.'</td>
				<td>'.$PTfemale6to14.'</td>
				<td>'.$totfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$WCmale14to18.'</td>
				<td>'.$FTmale14to18.'</td>
				<td>'.$PTmale14to18.'</td>
				<td>'.$totmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$WCfemale14to18.'</td>
				<td>'.$FTfemale14to18.'</td>
				<td>'.$PTfemale14to18.'</td>
				<td>'.$totfemale14to18.'</td>
			</tr>
			<tr>
				<td colspan="6" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are not live data </span></b></td>
			</tr>
		</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}	
	
	
	
	
	function childdropouts_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		$txtpanchayat = stripslashes($txtpanchayat);
		//`drop_out_reason` =  'other' 
		
		$sql="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTmale6to14 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'other' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
			BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		$OTmale6to14 = $querymain->row(0)->OTmale6to14;
		
		$sql1="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'other'AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql1);
		$OTfemale6to14 = $querymain1->row(0)->OTfemale6to14;
		$OTtotal6to14 = $OTmale6to14 + $OTfemale6to14;
		
		$sql10="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTmale14to18 FROM ocop_general_info
			LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'other' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
			BETWEEN 14 AND 18 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain10 = $this->db->query($sql10);
		$OTmale14to18 = $querymain10->row(0)->OTmale14to18;
		
		$sql11="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS OTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'other'AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain11 = $this->db->query($sql11);
		$OTfemale14to18 = $querymain11->row(0)->OTfemale14to18;
		$OTtotal14to18 = $OTmale14to18 + $OTfemale14to18;
		
		//`drop_out_reason` =  'taking care of siblings' 
		
		$sql2="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$TCmale6to14 = $querymain2->row(0)->TCmale6to14;
		
		$sql3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$TCfemale6to14 = $querymain3->row(0)->TCfemale6to14;
		
		$sql12="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain12 = $this->db->query($sql12);
		$TCmale14to18 = $querymain12->row(0)->TCmale14to18;
		
		$sql13="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS TCfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'taking care of siblings' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain13 = $this->db->query($sql13);
		$TCfemale14to18 = $querymain13->row(0)->TCfemale14to18;
		
		//`drop_out_reason` =  'migration' 
		
		$sql4="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql4);
		$Migmale6to14 = $querymain4->row(0)->Migmale6to14;
		
		$sql5="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql5);
		$Migfemale6to14 = $querymain5->row(0)->Migfemale6to14;
		
		$sql14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain14 = $this->db->query($sql14);
		$Migmale14to18 = $querymain14->row(0)->Migmale14to18;
		
		$sql15="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Migfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'migration' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain15 = $this->db->query($sql15);
		$Migfemale14to18 = $querymain15->row(0)->Migfemale14to18;
		
		//`drop_out_reason` =  'parents death' 
		
		$sql6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain6 = $this->db->query($sql6);
		$PDmale6to14 = $querymain6->row(0)->PDmale6to14;
		
		$sql7="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain7 = $this->db->query($sql7);
		$PDfemale6to14 = $querymain7->row(0)->PDfemale6to14;
		
		
		$sql16="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain16 = $this->db->query($sql16);
		$PDmale14to18 = $querymain16->row(0)->PDmale14to18;
		
		$sql17="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS PDfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'Parents Death' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain17 = $this->db->query($sql17);
		$PDfemale14to18 = $querymain17->row(0)->PDfemale14to18;
		
		//`drop_out_reason` =  're_enrolment_attempts' 
		
		$sql120="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `re_enrolment_attempts` = 'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain20 = $this->db->query($sql120);
		$REmale6to14 = $querymain20->row(0)->REmale6to14;
		
		$sql21="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `re_enrolment_attempts` =  'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain21 = $this->db->query($sql21);
		$REfemale6to14 = $querymain21->row(0)->REfemale6to14;
		
		$sql22="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `re_enrolment_attempts` = 'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain22 = $this->db->query($sql22);
		$REmale14to18 = $querymain22->row(0)->REmale14to18;
		
		$sql23="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS REfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `re_enrolment_attempts` =  'yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain23 = $this->db->query($sql23);
		$REfemale14to18 = $querymain23->row(0)->REfemale14to18;
		
		//`drop_out_reason` =  'not interested	' 	
		
		$sql8="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTmale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain8 = $this->db->query($sql8);
		$NTmale6to14 = $querymain8->row(0)->NTmale6to14;
		
		$sql9="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTfemale6to14 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 6 AND 14 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain9 = $this->db->query($sql9);
		$NTfemale6to14 = $querymain9->row(0)->NTfemale6to14;
		
		
		$sql18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTmale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
			LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
			WHERE  `drop_out_reason` = 'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain18 = $this->db->query($sql18);
		$NTmale14to18 = $querymain18->row(0)->NTmale14to18;
		
		$sql19="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS NTfemale14to18 FROM ocop_general_info LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  `drop_out_reason` =  'not interested' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))
		BETWEEN 14 AND 18 AND gender =2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain19 = $this->db->query($sql19);
		$NTfemale14to18 = $querymain19->row(0)->NTfemale14to18;
		
		
		
		
		$TCtotmale618 = $TCmale6to14 + $TCmale14to18 ;
		$TCtotfemale618 = $TCfemale6to14 + $TCfemale14to18 ;
		$PDtotmale618 = $PDmale6to14 + $PDmale14to18 ;
		$PDtotfemale618 = $PDfemale6to14 + $PDfemale14to18 ;
		$Migtotmale618 = $Migmale6to14 + $Migmale14to18 ;
		$Migtotfemale618 = $Migfemale6to14 + $Migfemale14to18 ;
		$NTtotmale618 = $NTmale6to14 + $NTmale14to18 ;
		$NTtotfemale618 = $NTfemale6to14 + $NTfemale14to18 ;
		$OTtotmale618 = $OTmale6to14 + $OTmale14to18 ;
		$OTtotfemale618 = $OTfemale6to14 + $OTfemale14to18 ;
		$REtotmale618 = $REmale6to14 + $REmale14to18 ;
		$REtotfemale618 = $REfemale6to14 + $REfemale14to18 ;
		$totalmale614= $TCmale6to14 + $PDmale6to14 +$Migmale6to14 + $NTmale6to14 + $OTmale6to14 + $REmale6to14;
		$totalfemale614= $TCfemale6to14 + $PDfemale6to14 +$Migfemale6to14 + $NTfemale6to14 + $OTfemale6to14 + $REfemale6to14 ;
		$totalmale1418= $TCmale14to18 + $PDmale14to18 +$Migmale14to18 + $NTmale14to18 + $OTmale14to18 + $REmale14to18 ;
		$totalfemale1418= $TCfemale14to18 + $PDfemale14to18 +$Migfemale14to18 + $NTfemale14to18 + $OTfemale14to18 + $REfemale14to18 ;
		$totlmale6to14=$TCtotmale618+$PDtotmale618+$Migtotmale618+$NTtotmale618 +$OTtotmale618+$REtotmale618;
		$totlfemale6to14=$TCtotfemale618+$PDtotfemale618+$Migtotfemale618+$NTtotfemale618 +$OTtotfemale618+$REtotfemale618;
		//End of Children's Birth Certificate 
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Report of School dropout based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="9" align="center"><b>Report of School dropout based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>taking care of siblings   </b></th>
				<th align="center"><b>parents death</b></th>
				<th align="center"><b>migration </b></th>
				<th align="center"><b>not interested</b></th>
				<th align="center"><b>Other </b></th>
				<th align="center"><b>Any school re-enrolment attempts</b></th>
				<th align="center"><b>Total no. of Children / No of Drop out children</b></th>
			</tr>
			
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$TCmale6to14.'</td>
				<td>'.$PDmale6to14.'</td>
				<td>'.$Migmale6to14.'</td>
				<td>'.$NTmale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
				<td>'.$REmale6to14.'</td>
				<td>'.$totalmale614.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$TCfemale6to14.'</td>
				<td>'.$PDfemale6to14.'</td>
				<td>'.$Migfemale6to14.'</td>
				<td>'.$NTfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
				<td>'.$REfemale6to14.'</td>
				<td>'.$totalfemale614.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$TCmale14to18.'</td>
				<td>'.$PDmale14to18.'</td>
				<td>'.$Migmale14to18.'</td>
				<td>'.$NTmale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
				<td>'.$REmale14to18.'</td>
				<td>'.$totalmale1418.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$TCfemale14to18.'</td>
				<td>'.$PDfemale14to18.'</td>
				<td>'.$Migfemale14to18.'</td>
				<td>'.$NTfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
				<td>'.$REfemale14to18.'</td>
				<td>'.$totalfemale1418.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$TCtotmale618.'</td>
				<td>'.$PDtotmale618.'</td>
				<td>'.$Migtotmale618.'</td>
				<td>'.$NTtotmale618.'</td>
				<td>'.$OTtotmale618.'</td>
				<td>'.$REtotmale618.'</td>
				<td>'.$totlmale6to14.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$TCtotfemale618.'</td>
				<td>'.$PDtotfemale618.'</td>
				<td>'.$Migtotfemale618.'</td>
				<td>'.$NTtotfemale618.'</td>
				<td>'.$OTtotfemale618.'</td>
				<td>'.$REtotfemale618.'</td>
				<td>'.$totlfemale6to14.'</td>
			</tr>
			<tr>
				<td colspan="9" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
	
	function childbirth_disability_pdf( $txtpanchayat='',  $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//`birth_disability` = 'None' 
$txtpanchayat = stripslashes($txtpanchayat);

 $sqlNmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain = $this->db->query($sqlNmale0to3);
		 $Nmale0to3 = $querymain->row(0)->Nmale0to3;
		 
		 
$sqlNfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain4 = $this->db->query($sqlNfemale0to3);
		 $Nfemale0to3 = $querymain4->row(0)->Nfemale0to3;
		 
		 
$sqlNmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain1 = $this->db->query($sqlNmale3to6);
		 $Nmale3to6 = $querymain1->row(0)->Nmale3to6;
		 
		 
$sqlNfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain5 = $this->db->query($sqlNfemale3to6);
		 $Nfemale3to6 = $querymain5->row(0)->Nfemale3to6;

 
$sqlNmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain2 = $this->db->query($sqlNmale6to14);
		 $Nmale6to14 = $querymain2->row(0)->Nmale6to14;
		 
		 
$sqlNfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain6 = $this->db->query($sqlNfemale6to14);
		 $Nfemale6to14 = $querymain6->row(0)->Nfemale6to14;

	 
$sqlNmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain3 = $this->db->query($sqlNmale14to18);
		 $Nmale14to18 = $querymain3->row(0)->Nmale14to18;

		 
$sqlNfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain7 = $this->db->query($sqlNfemale14to18);
		 $Nfemale14to18 = $querymain7->row(0)->Nfemale14to18;


   //`birth_disability` = 'Hearing' 
   
$sqlHmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain8 = $this->db->query($sqlHmale0to3);
		 $Hmale0to3 = $querymain8->row(0)->Hmale0to3;
		 
		 
$sqlHfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain12 = $this->db->query($sqlHfemale0to3);
		 $Hfemale0to3 = $querymain12->row(0)->Hfemale0to3;

$sqlHmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Hmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain9 = $this->db->query($sqlHmale3to6);
		 $Hmale3to6 = $querymain9->row(0)->Hmale3to6;
		 
		 
$sqlHfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Hfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain13 = $this->db->query($sqlHfemale3to6);
		 $Hfemale3to6 = $querymain13->row(0)->Hfemale3to6;


$sqlHmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain10 = $this->db->query($sqlHmale6to14);
		 $Hmale6to14 = $querymain10->row(0)->Hmale6to14;
		 
		 
$sqlHfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain14 = $this->db->query($sqlHfemale6to14);
		 $Hfemale6to14 = $querymain14->row(0)->Hfemale6to14;


$sqlHmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain11 = $this->db->query($sqlHmale14to18);
		 $Hmale14to18 = $querymain11->row(0)->Hmale14to18;


$sqlHfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain15 = $this->db->query($sqlHfemale14to18);
		 $Hfemale14to18 = $querymain15->row(0)->Hfemale14to18;
		 
		 
		  //`birth_disability` = 'Vision' 

$sqlVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain16 = $this->db->query($sqlVmale0to3);
		 $Vmale0to3 = $querymain16->row(0)->Vmale0to3;
		 
		 
$sqlVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain20 = $this->db->query($sqlVfemale0to3);
		 $Vfemale0to3 = $querymain20->row(0)->Vfemale0to3;

$sqlVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain17 = $this->db->query($sqlVmale3to6);
		 $Vmale3to6 = $querymain17->row(0)->Vmale3to6;
		 
		 
$sqlVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain21 = $this->db->query($sqlVfemale3to6);
		 $Vfemale3to6 = $querymain21->row(0)->Vfemale3to6;


$sqlVmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain18 = $this->db->query($sqlVmale6to14);
		 $Vmale6to14 = $querymain18->row(0)->Vmale6to14;
		 
		 
$sqlVfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain22 = $this->db->query($sqlVfemale6to14);
		 $Vfemale6to14 = $querymain22->row(0)->Vfemale6to14;

$sqlVmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain19 = $this->db->query($sqlVmale14to18);
		 $Vmale14to18 = $querymain19->row(0)->Vmale14to18;


$sqlVfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain23 = $this->db->query($sqlVfemale14to18);
		 $Vfemale14to18 = $querymain23->row(0)->Vfemale14to18;

		 
		 //`birth_disability` = 'Physical' 


$sqlPmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain24 = $this->db->query($sqlPmale0to3);
		 $Pmale0to3 = $querymain24->row(0)->Pmale0to3;
		 
		 

$sqlPfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain28 = $this->db->query($sqlPfemale0to3);
		 $Pfemale0to3 = $querymain28->row(0)->Pfemale0to3;

		 
$sqlPmale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain25 = $this->db->query($sqlPmale3to6);
		 $Pmale3to6 = $querymain25->row(0)->Pmale3to6;

$sqlPfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain29 = $this->db->query($sqlPfemale3to6);
		 $Pfemale3to6 = $querymain29->row(0)->Pfemale3to6;

$sqlPmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain26 = $this->db->query($sqlPmale6to14);
		 $Pmale6to14 = $querymain26->row(0)->Pmale6to14;
		 
		 
$sqlPfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain30 = $this->db->query($sqlPfemale6to14);
		 $Pfemale6to14 = $querymain30->row(0)->Pfemale6to14;



$sqlPmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain27 = $this->db->query($sqlPmale14to18);
		 $Pmale14to18 = $querymain27->row(0)->Pmale14to18;

$sqlPfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain31 = $this->db->query($sqlPfemale14to18);
		 $Pfemale14to18 = $querymain31->row(0)->Pfemale14to18;

		 
		  //`birth_disability` = 'Mentally' //

		  
$sqlMmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain32 = $this->db->query($sqlMmale0to3);
		 $Mmale0to3 = $querymain32->row(0)->Mmale0to3;
		 
		 	  
$sqlMfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain36 = $this->db->query($sqlMfemale0to3);
		 $Mfemale0to3 = $querymain36->row(0)->Mfemale0to3;
		  
$sqlMmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain33 = $this->db->query($sqlMmale3to6);
		 $Mmale3to6 = $querymain33->row(0)->Mmale3to6;
		 
		 		  
$sqlMfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Mfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain37 = $this->db->query($sqlMfemale3to6);
		 $Mfemale3to6 = $querymain37->row(0)->Mfemale3to6;

		  
$sqlMmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain34 = $this->db->query($sqlMmale6to14);
		 $Mmale6to14 = $querymain34->row(0)->Mmale6to14;
		 
		 		  
$sqlMfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain38 = $this->db->query($sqlMfemale6to14);
		 $Mfemale6to14 = $querymain38->row(0)->Mfemale6to14;
		  
$sqlMmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain35 = $this->db->query($sqlMmale14to18);
		 $Mmale14to18 = $querymain35->row(0)->Mmale14to18;

	

$sqlMfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain39 = $this->db->query($sqlMfemale14to18);
		 $Mfemale14to18 = $querymain39->row(0)->Mfemale14to18;
		 
		 
		  //``birth_disability`` = 'Other' //		


		  
$sqlOTmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain40 = $this->db->query($sqlOTmale0to3);
		 $OTmale0to3 = $querymain40->row(0)->OTmale0to3;

		 		 		  
$sqlOTfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain44 = $this->db->query($sqlOTfemale0to3);
		 $OTfemale0to3 = $querymain44->row(0)->OTfemale0to3;
		 
		  
$sqlOTmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain41 = $this->db->query($sqlOTmale3to6);
		 $OTmale3to6 = $querymain41->row(0)->OTmale3to6;

$sqlOTfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain45 = $this->db->query($sqlOTfemale3to6);
		 $OTfemale3to6 = $querymain45->row(0)->OTfemale3to6;

		  
$sqlOTmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain42 = $this->db->query($sqlOTmale6to14);
		 $OTmale6to14 = $querymain42->row(0)->OTmale6to14;

		 		 		  
$sqlOTfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain46 = $this->db->query($sqlOTfemale6to14);
		 $OTfemale6to14 = $querymain46->row(0)->OTfemale6to14;

		  
$sqlOTmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain43 = $this->db->query($sqlOTmale14to18);
		 $OTmale14to18 = $querymain43->row(0)->OTmale14to18;
 
		 		 		  
$sqlOTfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain47 = $this->db->query($sqlOTfemale14to18);
		 $OTfemale14to18 = $querymain47->row(0)->OTfemale14to18;
		 
		 
		 
	
	$NoneTotalmale= $Nmale0to3 + $Nmale3to6 + $Nmale6to14 + $Nmale14to18 ;
	$NoneTotalfemale= $Nfemale0to3 + $Nfemale3to6 + $Nfemale6to14 + $Nfemale14to18 ;
	
	$HearingTotalmale= $Hmale0to3 + $Hmale3to6 + $Hmale6to14 + $Hmale14to18 ;
	$HearingTotalfemale= $Hfemale0to3 + $Hfemale3to6 + $Hfemale6to14 + $Hfemale14to18 ;
	
	$VisionTotalmale= $Vmale0to3 + $Vmale3to6 + $Vmale6to14 + $Vmale14to18 ;
	$VisionTotalfemale= $Vfemale0to3 + $Vfemale3to6 + $Vfemale6to14 + $Vfemale14to18 ;
	
	$PhysicalTotalmale= $Pmale0to3 + $Pmale3to6 + $Pmale6to14 + $Pmale14to18 ;
	$PhysicalTotalfemale= $Pfemale0to3 + $Pfemale3to6 + $Pfemale6to14 + $Pfemale14to18 ;
	
	$OtherTotalmale= $OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18 ;
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b>Our Children Our Progress<br>
					(Child Tracking System)</b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;">It is a unique system in whichchildrelated information of all childrenwillbecollected and fedinto the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b> Report of  Birth disabled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="7" align="center"><b> Report of  Birth disabled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>None</b></th>
				<th align="center"><b>Hearing</b></th>
				<th align="center"><b>Vision</b></th>
				<th align="center"><b>Physical</b></th> 
				<th align="center"><b>Other</b></th>
			</tr>
				<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale0to3.'</td>
				<td>'. $Hmale0to3.'</td>
				<td>'. $Vmale0to3.'</td>
				<td>'.$Pmale0to3.'</td>
				<td>'. $OTmale0to3.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale0to3.'</td>
				<td>'.$Hfemale0to3.'</td>
				<td>'. $Vfemale0to3.'</td>
				<td>'.$Pfemale0to3.'</td>
				<td>'. $OTfemale0to3.'</td>
			</tr>
				<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale3to6.'</td>
				<td>'. $Hmale3to6.'</td>
				<td>'. $Vmale3to6.'</td>
				<td>'.$Pmale3to6.'</td>
				<td>'. $OTmale3to6.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale3to6.'</td>
				<td>'.$Hfemale3to6.'</td>
				<td>'. $Vfemale3to6.'</td>
				<td>'.$Pfemale3to6.'</td>
				<td>'. $OTfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale6to14.'</td>
				<td>'. $Hmale6to14.'</td>
				<td>'. $Vmale6to14.'</td>
				<td>'.$Pmale6to14.'</td>
				<td>'. $OTmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale6to14.'</td>
				<td>'.$Hfemale6to14.'</td>
				<td>'. $Vfemale6to14.'</td>
				<td>'.$Pfemale6to14.'</td>
				<td>'. $OTfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale14to18.'</td>
				<td>'. $Hmale14to18.'</td>
				<td>'. $Vmale14to18.'</td>
				<td>'.$Pmale14to18.'</td>
				<td>'. $OTmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale14to18.'</td>
				<td>'.$Hfemale14to18.'</td>
				<td>'.$Vfemale14to18.'</td>
				<td>'.$Pfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$NoneTotalmale.'</td>
				<td>'.$HearingTotalmale.'</td>
				<td>'.$VisionTotalmale.'</td>
				<td>'.$PhysicalTotalmale.'</td>
				<td>'.$OtherTotalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$NoneTotalfemale.'</td>
				<td>'.$HearingTotalfemale.'</td>
				<td>'.$VisionTotalfemale.'</td>
				<td>'.$PhysicalTotalfemale.'</td>
				<td>'.$OtherTotalfemale.'</td>
			</tr>
			<tr>
				<td colspan="7" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
	/*function childbirth_disability_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//`birth_disability` = 'None' 
$txtpanchayat = stripslashes($txtpanchayat);
 $sqlNmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain = $this->db->query($sqlNmale0to3);
		 $Nmale0to3 = $querymain->row(0)->Nmale0to3;
		 
		 
$sqlNfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain4 = $this->db->query($sqlNfemale0to3);
		 $Nfemale0to3 = $querymain4->row(0)->Nfemale0to3;
		 
		 
$sqlNmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain1 = $this->db->query($sqlNmale3to6);
		 $Nmale3to6 = $querymain1->row(0)->Nmale3to6;
		 
		 
$sqlNfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain5 = $this->db->query($sqlNfemale3to6);
		 $Nfemale3to6 = $querymain5->row(0)->Nfemale3to6;

 
$sqlNmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain2 = $this->db->query($sqlNmale6to14);
		 $Nmale6to14 = $querymain2->row(0)->Nmale6to14;
		 
		 
$sqlNfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain6 = $this->db->query($sqlNfemale6to14);
		 $Nfemale6to14 = $querymain6->row(0)->Nfemale6to14;

	 
$sqlNmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain3 = $this->db->query($sqlNmale14to18);
		 $Nmale14to18 = $querymain3->row(0)->Nmale14to18;

		 
$sqlNfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain7 = $this->db->query($sqlNfemale14to18);
		 $Nfemale14to18 = $querymain7->row(0)->Nfemale14to18;


   //`birth_disability` = 'Hearing' 
   
$sqlHmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain8 = $this->db->query($sqlHmale0to3);
		 $Hmale0to3 = $querymain8->row(0)->Hmale0to3;
		 
		 
$sqlHfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain12 = $this->db->query($sqlHfemale0to3);
		 $Hfemale0to3 = $querymain12->row(0)->Hfemale0to3;

$sqlHmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Hmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain9 = $this->db->query($sqlHmale3to6);
		 $Hmale3to6 = $querymain9->row(0)->Hmale3to6;
		 
		 
$sqlHfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Hfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain13 = $this->db->query($sqlHfemale3to6);
		 $Hfemale3to6 = $querymain13->row(0)->Hfemale3to6;


$sqlHmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain10 = $this->db->query($sqlHmale6to14);
		 $Hmale6to14 = $querymain10->row(0)->Hmale6to14;
		 
		 
$sqlHfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain14 = $this->db->query($sqlHfemale6to14);
		 $Hfemale6to14 = $querymain14->row(0)->Hfemale6to14;


$sqlHmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain11 = $this->db->query($sqlHmale14to18);
		 $Hmale14to18 = $querymain11->row(0)->Hmale14to18;


$sqlHfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Hfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Hearing' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain15 = $this->db->query($sqlHfemale14to18);
		 $Hfemale14to18 = $querymain15->row(0)->Hfemale14to18;
		 
		 
		  //`birth_disability` = 'Vision' 

$sqlVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain16 = $this->db->query($sqlVmale0to3);
		 $Vmale0to3 = $querymain16->row(0)->Vmale0to3;
		 
		 
$sqlVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain20 = $this->db->query($sqlVfemale0to3);
		 $Vfemale0to3 = $querymain20->row(0)->Vfemale0to3;

$sqlVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain17 = $this->db->query($sqlVmale3to6);
		 $Vmale3to6 = $querymain17->row(0)->Vmale3to6;
		 
		 
$sqlVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain21 = $this->db->query($sqlVfemale3to6);
		 $Vfemale3to6 = $querymain21->row(0)->Vfemale3to6;


$sqlVmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Vmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain18 = $this->db->query($sqlVmale6to14);
		 $Vmale6to14 = $querymain18->row(0)->Vmale6to14;
		 
		 
$sqlVfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain22 = $this->db->query($sqlVfemale6to14);
		 $Vfemale6to14 = $querymain22->row(0)->Vfemale6to14;

$sqlVmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain19 = $this->db->query($sqlVmale14to18);
		 $Vmale14to18 = $querymain19->row(0)->Vmale14to18;


$sqlVfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Vfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain23 = $this->db->query($sqlVfemale14to18);
		 $Vfemale14to18 = $querymain23->row(0)->Vfemale14to18;

		 
		 //`birth_disability` = 'Physical' 


$sqlPmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain24 = $this->db->query($sqlPmale0to3);
		 $Pmale0to3 = $querymain24->row(0)->Pmale0to3;
		 
		 

$sqlPfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain28 = $this->db->query($sqlPfemale0to3);
		 $Pfemale0to3 = $querymain28->row(0)->Pfemale0to3;

		 
$sqlPmale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain25 = $this->db->query($sqlPmale3to6);
		 $Pmale3to6 = $querymain25->row(0)->Pmale3to6;

$sqlPfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain29 = $this->db->query($sqlPfemale3to6);
		 $Pfemale3to6 = $querymain29->row(0)->Pfemale3to6;

$sqlPmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain26 = $this->db->query($sqlPmale6to14);
		 $Pmale6to14 = $querymain26->row(0)->Pmale6to14;
		 
		 
$sqlPfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain30 = $this->db->query($sqlPfemale6to14);
		 $Pfemale6to14 = $querymain30->row(0)->Pfemale6to14;



$sqlPmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Pmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain27 = $this->db->query($sqlPmale14to18);
		 $Pmale14to18 = $querymain27->row(0)->Pmale14to18;

$sqlPfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Pfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain31 = $this->db->query($sqlPfemale14to18);
		 $Pfemale14to18 = $querymain31->row(0)->Pfemale14to18;

		 
		  //`birth_disability` = 'Mentally' //

		  
$sqlMmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain32 = $this->db->query($sqlMmale0to3);
		 $Mmale0to3 = $querymain32->row(0)->Mmale0to3;
		 
		 	  
$sqlMfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain36 = $this->db->query($sqlMfemale0to3);
		 $Mfemale0to3 = $querymain36->row(0)->Mfemale0to3;
		  
$sqlMmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain33 = $this->db->query($sqlMmale3to6);
		 $Mmale3to6 = $querymain33->row(0)->Mmale3to6;
		 
		 		  
$sqlMfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Mfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain37 = $this->db->query($sqlMfemale3to6);
		 $Mfemale3to6 = $querymain37->row(0)->Mfemale3to6;

		  
$sqlMmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain34 = $this->db->query($sqlMmale6to14);
		 $Mmale6to14 = $querymain34->row(0)->Mmale6to14;
		 
		 		  
$sqlMfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain38 = $this->db->query($sqlMfemale6to14);
		 $Mfemale6to14 = $querymain38->row(0)->Mfemale6to14;
		  
$sqlMmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain35 = $this->db->query($sqlMmale14to18);
		 $Mmale14to18 = $querymain35->row(0)->Mmale14to18;

	

$sqlMfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Mfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Physical' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain39 = $this->db->query($sqlMfemale14to18);
		 $Mfemale14to18 = $querymain39->row(0)->Mfemale14to18;
		 
		 
		  //``birth_disability`` = 'Other' //		


		  
$sqlOTmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain40 = $this->db->query($sqlOTmale0to3);
		 $OTmale0to3 = $querymain40->row(0)->OTmale0to3;

		 		 		  
$sqlOTfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain44 = $this->db->query($sqlOTfemale0to3);
		 $OTfemale0to3 = $querymain44->row(0)->OTfemale0to3;
		 
		  
$sqlOTmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain41 = $this->db->query($sqlOTmale3to6);
		 $OTmale3to6 = $querymain41->row(0)->OTmale3to6;

$sqlOTfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain45 = $this->db->query($sqlOTfemale3to6);
		 $OTfemale3to6 = $querymain45->row(0)->OTfemale3to6;

		  
$sqlOTmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain42 = $this->db->query($sqlOTmale6to14);
		 $OTmale6to14 = $querymain42->row(0)->OTmale6to14;

		 		 		  
$sqlOTfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain46 = $this->db->query($sqlOTfemale6to14);
		 $OTfemale6to14 = $querymain46->row(0)->OTfemale6to14;

		  
$sqlOTmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain43 = $this->db->query($sqlOTmale14to18);
		 $OTmale14to18 = $querymain43->row(0)->OTmale14to18;
 
		 		 		  
$sqlOTfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_birth_details ON ocop_birth_details.ocop_birth_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `birth_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain47 = $this->db->query($sqlOTfemale14to18);
		 $OTfemale14to18 = $querymain47->row(0)->OTfemale14to18;
		 
		 
		 
	
	$NoneTotalmale= $Nmale0to3 + $Nmale3to6 + $Nmale6to14 + $Nmale14to18 ;
	$NoneTotalfemale= $Nfemale0to3 + $Nfemale3to6 + $Nfemale6to14 + $Nfemale14to18 ;
	
	$HearingTotalmale= $Hmale0to3 + $Hmale3to6 + $Hmale6to14 + $Hmale14to18 ;
	$HearingTotalfemale= $Hfemale0to3 + $Hfemale3to6 + $Hfemale6to14 + $Hfemale14to18 ;
	
	$VisionTotalmale= $Vmale0to3 + $Vmale3to6 + $Vmale6to14 + $Vmale14to18 ;
	$VisionTotalfemale= $Vfemale0to3 + $Vfemale3to6 + $Vfemale6to14 + $Vfemale14to18 ;
	
	$PhysicalTotalmale= $Pmale0to3 + $Pmale3to6 + $Pmale6to14 + $Pmale14to18 ;
	$PhysicalTotalfemale= $Pfemale0to3 + $Pfemale3to6 + $Pfemale6to14 + $Pfemale14to18 ;
	
	$OtherTotalmale= $OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18 ;
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b>Our Children Our Progress<br>
					(Child Tracking System)</b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;">It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b> Report of  Birth disabled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="7" align="center"><b> Report of  Birth disabled children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>None</b></th>
				<th align="center"><b>Hearing</b></th>
				<th align="center"><b>Vision</b></th>
				<th align="center"><b>Physical</b></th> 
				<th align="center"><b>Other</b></th>
			</tr>
				<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale0to3.'</td>
				<td>'. $Hmale0to3.'</td>
				<td>'. $Vmale0to3.'</td>
				<td>'.$Pmale0to3.'</td>
				<td>'. $OTmale0to3.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale0to3.'</td>
				<td>'.$Hfemale0to3.'</td>
				<td>'. $Vfemale0to3.'</td>
				<td>'.$Pfemale0to3.'</td>
				<td>'. $OTfemale0to3.'</td>
			</tr>
				<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale3to6.'</td>
				<td>'. $Hmale3to6.'</td>
				<td>'. $Vmale3to6.'</td>
				<td>'.$Pmale3to6.'</td>
				<td>'. $OTmale3to6.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale3to6.'</td>
				<td>'.$Hfemale3to6.'</td>
				<td>'. $Vfemale3to6.'</td>
				<td>'.$Pfemale3to6.'</td>
				<td>'. $OTfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale6to14.'</td>
				<td>'. $Hmale6to14.'</td>
				<td>'. $Vmale6to14.'</td>
				<td>'.$Pmale6to14.'</td>
				<td>'. $OTmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale6to14.'</td>
				<td>'.$Hfemale6to14.'</td>
				<td>'. $Vfemale6to14.'</td>
				<td>'.$Pfemale6to14.'</td>
				<td>'. $OTfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale14to18.'</td>
				<td>'. $Hmale14to18.'</td>
				<td>'. $Vmale14to18.'</td>
				<td>'.$Pmale14to18.'</td>
				<td>'. $OTmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale14to18.'</td>
				<td>'.$Hfemale14to18.'</td>
				<td>'.$Vfemale14to18.'</td>
				<td>'.$Pfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$NoneTotalmale.'</td>
				<td>'.$HearingTotalmale.'</td>
				<td>'.$VisionTotalmale.'</td>
				<td>'.$PhysicalTotalmale.'</td>
				<td>'.$OtherTotalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$NoneTotalfemale.'</td>
				<td>'.$HearingTotalfemale.'</td>
				<td>'.$VisionTotalfemale.'</td>
				<td>'.$PhysicalTotalfemale.'</td>
				<td>'.$OtherTotalfemale.'</td>
			</tr>
			<tr>
				<td colspan="7" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	*/
	
	
	
	
	function childcurrent_disability_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
	//`child_disability` = 'None' 
	$txtpanchayat = stripslashes($txtpanchayat);

 $sqlNmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain = $this->db->query($sqlNmale0to3);
		 $Nmale0to3 = $querymain->row(0)->Nmale0to3;
		 
		 
		 
$sqlNfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain4 = $this->db->query($sqlNfemale0to3);
		 $Nfemale0to3 = $querymain4->row(0)->Nfemale0to3;
		 
$sqlNmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain1 = $this->db->query($sqlNmale3to6);
		 $Nmale3to6 = $querymain1->row(0)->Nmale3to6;
		 
		 
$sqlNfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain5 = $this->db->query($sqlNfemale3to6);
		 $Nfemale3to6 = $querymain5->row(0)->Nfemale3to6;

 
$sqlNmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Nmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain2 = $this->db->query($sqlNmale6to14);
		 $Nmale6to14 = $querymain2->row(0)->Nmale6to14;
		 
		 

$sqlNfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain6 = $this->db->query($sqlNfemale6to14);
		 $Nfemale6to14 = $querymain6->row(0)->Nfemale6to14;

	 
$sqlNmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain3 = $this->db->query($sqlNmale14to18);
		 $Nmale14to18 = $querymain3->row(0)->Nmale14to18;


$sqlNfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Nfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'None' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain7 = $this->db->query($sqlNfemale14to18);
		 $Nfemale14to18 = $querymain7->row(0)->Nfemale14to18;

   //`child_disability` = 'Blindness' 
   
$sqlBmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS Bmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain8 = $this->db->query($sqlBmale0to3);
		 $Bmale0to3 = $querymain8->row(0)->Bmale0to3;

		 
$sqlBfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain12 = $this->db->query($sqlBfemale0to3);
		 $Bfemale0to3 = $querymain12->row(0)->Bfemale0to3;

		 		 
$sqlBmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain9 = $this->db->query($sqlBmale3to6);
		 $Bmale3to6 = $querymain9->row(0)->Bmale3to6;
		 
		 
$sqlBfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain13 = $this->db->query($sqlBfemale3to6);
		 $Bfemale3to6 = $querymain13->row(0)->Bfemale3to6;


$sqlBmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain10 = $this->db->query($sqlBmale6to14);
		 $Bmale6to14 = $querymain10->row(0)->Bmale6to14;
		 
		 
$sqlBfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain14 = $this->db->query($sqlBfemale6to14);
		 $Bfemale6to14 = $querymain14->row(0)->Bfemale6to14;


$sqlBmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain11 = $this->db->query($sqlBmale14to18);
		 $Bmale14to18 = $querymain11->row(0)->Bmale14to18;



$sqlBfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS Bfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Blindness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain15 = $this->db->query($sqlBfemale14to18);
		 $Bfemale14to18 = $querymain15->row(0)->Bfemale14to18;
		 
		 
		  //`child_disability` = 'Low vision' 

$sqlLVmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision'  AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain16 = $this->db->query($sqlLVmale0to3);
		 $LVmale0to3 = $querymain16->row(0)->LVmale0to3;
		 				 

$sqlLVfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LVfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain20 = $this->db->query($sqlLVfemale0to3);
		 $LVfemale0to3 = $querymain20->row(0)->LVfemale0to3;

$sqlLVmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability`= 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain17 = $this->db->query($sqlLVmale3to6);
		 $LVmale3to6 = $querymain17->row(0)->LVmale3to6;

		 
$sqlLVfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain21 = $this->db->query($sqlLVfemale3to6);
		 $LVfemale3to6 = $querymain21->row(0)->LVfemale3to6;

$sqlLVmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LVmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain18 = $this->db->query($sqlLVmale6to14);
		 $LVmale6to14 = $querymain18->row(0)->LVmale6to14;
		 
		 
$sqlLVfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain22 = $this->db->query($sqlLVfemale6to14);
		 $LVfemale6to14 = $querymain22->row(0)->LVfemale6to14;

$sqlLVmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LVmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain19 = $this->db->query($sqlLVmale14to18);
		 $LVmale14to18 = $querymain19->row(0)->LVmale14to18;

$sqlLVfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LVfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Low vision' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain23 = $this->db->query($sqlLVfemale14to18);
		 $LVfemale14to18 = $querymain23->row(0)->LVfemale14to18;

		 
		 //`child_disability` = 'Leprosy cured' //


$sqlLCmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain24 = $this->db->query($sqlLCmale0to3);
		 $LCmale0to3 = $querymain24->row(0)->LCmale0to3;

		 
$sqlLCfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LCfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain28 = $this->db->query($sqlLCfemale0to3);
		 $LCfemale0to3 = $querymain28->row(0)->LCfemale0to3;


$sqlLCmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LCmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain25 = $this->db->query($sqlLCmale3to6);
		 $LCmale3to6 = $querymain25->row(0)->LCmale3to6;
		 
		 
$sqlLCfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain29 = $this->db->query($sqlLCfemale3to6);
		 $LCfemale3to6 = $querymain29->row(0)->LCfemale3to6;


$sqlLCmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain26 = $this->db->query($sqlLCmale6to14);
		 $LCmale6to14 = $querymain26->row(0)->LCmale6to14;

		 

$sqlLCfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain30 = $this->db->query($sqlLCfemale6to14);
		 $LCfemale6to14 = $querymain30->row(0)->LCfemale6to14;


$sqlLCmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LCmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain27 = $this->db->query($sqlLCmale14to18);
		 $LCmale14to18 = $querymain27->row(0)->LCmale14to18;

$sqlLCfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LCfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Leprosy cured' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain31 = $this->db->query($sqlLCfemale14to18);
		 $LCfemale14to18 = $querymain31->row(0)->LCfemale14to18;

				 
		  //`child_disability` = 'Hearing impairment' //		

		  
$sqlHImale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS HImale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain40 = $this->db->query($sqlHImale0to3);
		 $HImale0to3 = $querymain40->row(0)->HImale0to3;

		 		 		  
$sqlHIfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HIfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain44 = $this->db->query($sqlHIfemale0to3);
		 $HIfemale0to3 = $querymain44->row(0)->HIfemale0to3;
		  
$sqlHImale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HImale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain41 = $this->db->query($sqlHImale3to6);
		 $HImale3to6 = $querymain41->row(0)->HImale3to6;

		 
		 
		 		  
$sqlHIfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS HIfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain45 = $this->db->query($sqlHIfemale3to6);
		 $HIfemale3to6 = $querymain45->row(0)->HIfemale3to6;

		  
$sqlHImale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HImale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain42 = $this->db->query($sqlHImale6to14);
		 $HImale6to14 = $querymain42->row(0)->HImale6to14;
		 	 	 
		 		  
$sqlHIfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS HIfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain46 = $this->db->query($sqlHIfemale6to14);
		 $HIfemale6to14 = $querymain46->row(0)->HIfemale6to14;
		 

	  
$sqlHImale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HImale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain43 = $this->db->query($sqlHImale14to18);
		 $HImale14to18 = $querymain43->row(0)->HImale14to18;
 
		 		 		  
$sqlHIfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS HIfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Hearing impairment' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain47 = $this->db->query($sqlHIfemale14to18);
		 $HIfemale14to18 = $querymain47->row(0)->HIfemale14to18;
		 
		 
		 //`child_disability` = 'Locomotor disability' //


$sqlLDmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LDmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain48 = $this->db->query($sqlLDmale0to3);
		 $LDmale0to3 = $querymain48->row(0)->LDmale0to3;		 
		 
		 
$sqlLDfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LDfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain49 = $this->db->query($sqlLDfemale0to3);
		 $LDfemale0to3 = $querymain49->row(0)->LDfemale0to3;		 

		 
$sqlLDmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS LDmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain50 = $this->db->query($sqlLDmale3to6);
		 $LDmale3to6 = $querymain50->row(0)->LDmale3to6;		 
		 
$sqlLDfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain51 = $this->db->query($sqlLDfemale3to6);
		 $LDfemale3to6 = $querymain51->row(0)->LDfemale3to6;		 


$sqlLDmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain52 = $this->db->query($sqlLDmale6to14);
		 $LDmale6to14 = $querymain52->row(0)->LDmale6to14;


$sqlLDfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain53 = $this->db->query($sqlLDfemale6to14);
		 $LDfemale6to14 = $querymain53->row(0)->LDfemale6to14;		 
		 



		 
		 $sqlLDmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain52 = $this->db->query($sqlLDmale14to18);
		 $LDmale14to18 = $querymain52->row(0)->LDmale14to18;


$sqlLDfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS LDfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Locomotor disability' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain53 = $this->db->query($sqlLDfemale14to18);
		 $LDfemale14to18 = $querymain53->row(0)->LDfemale14to18;	
		 
		 
		 
			 //`child_disability` = 'Mental retardation' //	 
		 
		 
$sqlMRmale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MRmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain54 = $this->db->query($sqlMRmale0to3);
		 $MRmale0to3 = $querymain54->row(0)->MRmale0to3;		 
		 	 
			 
$sqlMRfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain55 = $this->db->query($sqlMRfemale0to3);
		 $MRfemale0to3 = $querymain55->row(0)->MRfemale0to3;
		 
		 
$sqlMRmale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MRmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain56 = $this->db->query($sqlMRmale3to6);
		 $MRmale3to6 = $querymain56->row(0)->MRmale3to6;
		 
		 
$sqlMRfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain57 = $this->db->query($sqlMRfemale3to6);
		 $MRfemale3to6 = $querymain57->row(0)->MRfemale3to6;		 
		 

$sqlMRmale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MRmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain58 = $this->db->query($sqlMRmale6to14);
		 $MRmale6to14 = $querymain58->row(0)->MRmale6to14;
		 		 
		 
		 
$sqlMRfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain59 = $this->db->query($sqlMRfemale6to14);
		 $MRfemale6to14 = $querymain59->row(0)->MRfemale6to14;
		 		 	 
		 
$sqlMRmale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain60 = $this->db->query($sqlMRmale14to18);
		 $MRmale14to18 = $querymain60->row(0)->MRmale14to18;	

$sqlMRfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MRfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental retardation' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain61 = $this->db->query($sqlMRfemale14to18);
		 $MRfemale14to18 = $querymain61->row(0)->MRfemale14to18;		 
		 
		 
			 //`child_disability` = 'Mental illness' //	 
		 
		 
$sqlMImale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MImale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain62 = $this->db->query($sqlMImale0to3);
		 $MImale0to3 = $querymain62->row(0)->MImale0to3;

$sqlMIfemale0to3="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MIfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain63 = $this->db->query($sqlMIfemale0to3);
		 $MIfemale0to3 = $querymain63->row(0)->MIfemale0to3;		 
		 
		 
$sqlMImale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MImale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain64 = $this->db->query($sqlMImale3to6);
		 $MImale3to6 = $querymain64->row(0)->MImale3to6;

$sqlMIfemale3to6="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MIfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain65 = $this->db->query($sqlMIfemale3to6);
		 $MIfemale3to6 = $querymain65->row(0)->MIfemale3to6;		 
		 
		 
$sqlMImale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MImale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain66 = $this->db->query($sqlMImale6to14);
		 $MImale6to14 = $querymain66->row(0)->MImale6to14;

$sqlMIfemale6to14="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS MIfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain67 = $this->db->query($sqlMIfemale6to14);
		 $MIfemale6to14 = $querymain67->row(0)->MIfemale6to14;		 
		 
		 
$sqlMImale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MImale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain68 = $this->db->query($sqlMImale14to18);
		 $MImale14to18 = $querymain68->row(0)->MImale14to18;

$sqlMIfemale14to18="SELECT count(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS MIfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Mental illness' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain69 = $this->db->query($sqlMIfemale14to18);
		 $MIfemale14to18 = $querymain69->row(0)->MIfemale14to18;		 
		 
		 	 
			 
			 //`child_disability` = 'Other' //	 
		 
		 
$sqlOTmale0to3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS OTmale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain70 = $this->db->query($sqlOTmale0to3);
		 $OTmale0to3 = $querymain70->row(0)->OTmale0to3;

$sqlOTfemale0to3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale0to3 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain71 = $this->db->query($sqlOTfemale0to3);
		 $OTfemale0to3 = $querymain71->row(0)->OTfemale0to3;		 
		 
		 
$sqlOTmale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS OTmale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain72 = $this->db->query($sqlOTmale3to6);
		 $OTmale3to6 = $querymain72->row(0)->OTmale3to6;

$sqlOTfemale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale3to6 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain73 = $this->db->query($sqlOTfemale3to6);
		 $OTfemale3to6 = $querymain73->row(0)->OTfemale3to6;		 
		 
		 
$sqlOTmale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' )) ) AS OTmale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain74 = $this->db->query($sqlOTmale6to14);
		 $OTmale6to14 = $querymain74->row(0)->OTmale6to14;

$sqlOTfemale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale6to14 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain75 = $this->db->query($sqlOTfemale6to14);
		 $OTfemale6to14 = $querymain75->row(0)->OTfemale6to14;		 
		 
		 
$sqlOTmale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTmale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain76 = $this->db->query($sqlOTmale14to18);
		 $OTmale14to18 = $querymain76 ->row(0)->OTmale14to18;

$sqlOTfemale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) AS OTfemale14to18 FROM ocop_general_info
         LEFT JOIN ocop_current_details ON ocop_current_details.ocop_current_details_id = ocop_general_info.ocop_general_info_id 
         LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
         WHERE `child_disability` = 'Other' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
         AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";

         $querymain77 = $this->db->query($sqlOTfemale14to18);
		 $OTfemale14to18 = $querymain77->row(0)->OTfemale14to18;		 
	
	
	$NoneTotalmale= $Nmale0to3 + $Nmale3to6 + $Nmale6to14 + $Nmale14to18 ;
	$NoneTotalfemale= $Nfemale0to3 + $Nfemale3to6 + $Nfemale6to14 + $Nfemale14to18 ;
	
	$BlindTotalmale= $Bmale0to3 + $Bmale3to6 + $Bmale6to14 + $Bmale14to18 ;
	$BlindTotalfemale= $Bfemale0to3 + $Bfemale3to6 + $Bfemale6to14 + $Bfemale14to18 ;
	
	$LowVisionTotalmale= $LVmale0to3 + $LVmale3to6 + $LVmale6to14 + $LVmale14to18 ;
	$LowVisionTotalfemale= $LVfemale0to3 + $LVfemale3to6 + $LVfemale6to14 + $LVfemale14to18 ;
	
	$LepCuredTotalmale= $LCmale0to3 + $LCmale3to6 + $LCmale6to14 + $LCmale14to18 ;
	$LepCuredTotalfemale= $LCfemale0to3 + $LCfemale3to6 + $LCfemale6to14 + $LCfemale14to18 ;
	
	$HearingTotalmale= $HImale0to3 + $HImale3to6 + $HImale6to14 + $HImale14to18 ;
	$HearingTotalfemale= $HIfemale0to3 + $HIfemale3to6 + $HIfemale6to14 + $HIfemale14to18 ;
	
	$LocDisabilityTotalmale= $LDmale0to3 + $LDmale3to6 + $LDmale6to14 + $LDmale14to18 ;
	$LocDisabilityTotalfemale= $LDfemale0to3 + $LDfemale3to6 + $LDfemale6to14 + $LDfemale14to18 ;
	
	$MentalRetarTotalmale= $MRmale0to3 + $MRmale3to6 + $MRmale6to14 + $MRmale14to18 ;
	$MentalRetarTotalfemale= $MRfemale0to3 + $MRfemale3to6 + $MRfemale6to14 + $MRfemale14to18 ;
	
	$MentalIllTotalmale= $MImale0to3 + $MImale3to6 + $MImale6to14 + $MImale14to18 ;
	$MentalIllTotalfemale= $MIfemale0to3 + $MIfemale3to6 + $MIfemale6to14 + $MIfemale14to18 ;
	
	$OtherTotalmale= $OTmale0to3 + $OTmale3to6 + $OTmale6to14 + $OTmale14to18 ;
	$OtherTotalfemale= $OTfemale0to3 + $OTfemale3to6 + $OTfemale6to14 + $OTfemale14to18 ;
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
					Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b> Report of  current disable children information based on multiple Grama Panchayat </b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="11" align="center"><b> Report of  current disable children information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>None</b></th>
				<th align="center"><b>Blindness</b></th>
				<th align="center"><b>Low vision</b></th> 
				<th align="center"><b>Leprosy cured</b></th>
				<th align="center"><b>Hearing impairment</b></th> 
				<th align="center"><b>Locomotor disability</b></th> 
				<th align="center"><b>Mental retardation</b></th> 
				<th align="center"><b>Mental illness</b></th> 
				<th align="center"><b>Others</b></th>
			</tr>
				<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale0to3.'</td>
				<td>'.$Bmale0to3.'</td>
				<td>'.$LVmale0to3.'</td>
				<td>'.$LCmale0to3.'</td>
				<td>'.$HImale0to3.'</td>
				<td>'.$LDmale0to3.'</td>
				<td>'.$MRmale0to3.'</td>
				<td>'.$MImale0to3.'</td>
				<td>'.$OTmale0to3.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale0to3.'</td>
				<td>'.$Bfemale0to3.'</td>
				<td>'.$LVfemale0to3.'</td>
				<td>'.$LCfemale0to3.'</td>
				<td>'.$HIfemale0to3.'</td>
				<td>'.$LDfemale0to3.'</td>
				<td>'.$MRfemale0to3.'</td>
				<td>'.$MIfemale0to3.'</td>
				<td>'.$OTfemale0to3.'</td>
			</tr>
				<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale3to6.'</td>
				<td>'.$Bmale3to6.'</td>
				<td>'.$LVmale3to6.'</td>
				<td>'.$LCmale3to6.'</td>
				<td>'.$HImale3to6.'</td>
				<td>'.$LDmale3to6.'</td>
				<td>'.$MRmale3to6.'</td>
				<td>'.$MImale3to6.'</td>
				<td>'.$OTmale3to6.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale3to6.'</td>
				<td>'.$Bfemale3to6.'</td>
				<td>'.$LVfemale3to6.'</td>
				<td>'.$LCfemale3to6.'</td>
				<td>'.$HIfemale3to6.'</td>
				<td>'.$LDfemale3to6.'</td>
				<td>'.$MRfemale3to6.'</td>
				<td>'.$MIfemale3to6.'</td>
				<td>'.$OTfemale3to6.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale6to14.'</td>
				<td>'.$Bmale6to14.'</td>
				<td>'.$LVmale6to14.'</td>
				<td>'.$LCmale6to14.'</td>
				<td>'.$HImale6to14.'</td>
				<td>'.$LDmale6to14.'</td>
				<td>'.$MRmale6to14.'</td>
				<td>'.$MImale6to14.'</td>
				<td>'.$OTmale6to14.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale6to14.'</td>
				<td>'.$Bfemale6to14.'</td>
				<td>'.$LVfemale6to14.'</td>
				<td>'.$LCfemale6to14.'</td>
				<td>'.$HIfemale6to14.'</td>
				<td>'.$LDfemale6to14.'</td>
				<td>'.$MRfemale6to14.'</td>
				<td>'.$MIfemale6to14.'</td>
				<td>'.$OTfemale6to14.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$Nmale14to18.'</td>
				<td>'.$Bmale14to18.'</td>
				<td>'.$LVmale14to18.'</td>
				<td>'.$LCmale14to18.'</td>
				<td>'.$HImale14to18.'</td>
				<td>'.$LDmale14to18.'</td>
				<td>'.$MRmale14to18.'</td>
				<td>'.$MImale14to18.'</td>
				<td>'.$OTmale14to18.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Nfemale14to18.'</td>
				<td>'.$Bfemale14to18.'</td>
				<td>'.$LVfemale14to18.'</td>
				<td>'.$LCfemale14to18.'</td>
				<td>'.$HIfemale14to18.'</td>
				<td>'.$LDfemale14to18.'</td>
				<td>'.$MRfemale14to18.'</td>
				<td>'.$MIfemale14to18.'</td>
				<td>'.$OTfemale14to18.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
			<td>'.$NoneTotalmale.'</td>
			<td>'.$BlindTotalmale.'</td>
			<td>'.$LowVisionTotalmale.'</td>
			<td>'.$LepCuredTotalmale.'</td>
			<td>'.$HearingTotalmale.'</td>
			<td>'.$LocDisabilityTotalmale.'</td>
			<td>'.$MentalRetarTotalmale.'</td>
			<td>'.$MentalIllTotalmale.'</td>
			<td>'.$OtherTotalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
			<td>'.$NoneTotalfemale.'</td>
			<td>'.$BlindTotalfemale.'</td>
			<td>'.$LowVisionTotalfemale.'</td>
			<td>'.$LepCuredTotalfemale.'</td>
			<td>'.$HearingTotalfemale.'</td>
			<td>'.$LocDisabilityTotalfemale.'</td>
			<td>'.$MentalRetarTotalfemale.'</td>
			<td>'.$MentalIllTotalfemale.'</td>
			<td>'.$OtherTotalfemale.'</td>
			</tr>
			<tr>
				<td colspan="11" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
function childchild_minor_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
			$txtpanchayat = stripslashes($txtpanchayat);
		//`minor_pregnancy` =  'Yes' 
		$sqlYfemale0to3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale0to3 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
              AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain10 = $this->db->query($sqlYfemale0to3);
		$Yfemale0to3 = $querymain10->row(0)->Yfemale0to3;
		
		
		
		$sqlYfemale3to6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale3to6 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
              AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain11 = $this->db->query($sqlYfemale3to6);
		$Yfemale3to6 = $querymain11->row(0)->Yfemale3to6;
		
		
		$sqlYfemale6to14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale6to14 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
              AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sqlYfemale6to14);
		$Yfemale6to14 = $querymain->row(0)->Yfemale6to14;
		
		$sqlYfemale14to18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Yfemale14to18 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='Yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
              AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sqlYfemale14to18);
		$Yfemale14to18 = $querymain1->row(0)->Yfemale14to18;
		
		//`minor_pregnancy` =  'No' 
		
		$sql10="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Nfemale6to14 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `minor_pregnancy`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain10 = $this->db->query($sql10);
		$Nfemale6to14 = $querymain10->row(0)->Nfemale6to14;
		
		$sql12="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS Nfemale14to18 FROM ocop_general_info
              LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
              LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
              WHERE `minor_pregnancy`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
              AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql12);
		$Nfemale14to18 = $querymain1->row(0)->Nfemale14to18;
		$Ntotal6to18 = $Nfemale6to14 + $Nfemale14to18;
		
		
		
		//`child_marriage` =  'Yes' 
		
		$sql2="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$CMYmale0to3  = $querymain2->row(0)->CMYmale0to3;
		
		$sql3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$CMYfemale0to3 = $querymain3->row(0)->CMYfemale0to3;
		$CMYtotal0to3 = $CMYmale0to3 + $CMYfemale0to3;
		
		$sql4="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
               AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain12 = $this->db->query($sql4);
		$CMYmale3to6 = $querymain12->row(0)->CMYmale3to6;
		
		$sql5="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain13 = $this->db->query($sql5);
		$CMYfemale3to6 = $querymain13->row(0)->CMYfemale3to6;
		$CMYtotal3to6 = $CMYmale3to6 + $CMYfemale3to6;
		
	
		
		$sql6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale6to14 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
               AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql6);
		$CMYmale6to14 = $querymain5->row(0)->CMYmale6to14;
		
		
		$sql7="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale6to14 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql7);
		$CMYfemale6to14 = $querymain4->row(0)->CMYfemale6to14;
		$CMYtotal6to14 = $CMYmale6to14 + $CMYfemale6to14;
		
		$sql8="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYmale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain14 = $this->db->query($sql8);
		$CMYmale14to18  = $querymain14->row(0)->CMYmale14to18 ;
		
		$sql9="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMYfemale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='yes' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain15 = $this->db->query($sql9);
		$CMYfemale14to18 = $querymain15->row(0)->CMYfemale14to18;
		$CMYtotal14to18 = $CMYmale14to18 + $CMYfemale14to18;
		
		//`child_marriage` =  'No' 
		
		$sql16="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql16);
		$CMNmale0to3  = $querymain2->row(0)->CMNmale0to3;
		
		$sql17="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale0to3 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3
               AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql17);
		$CMNfemale0to3 = $querymain3->row(0)->CMNfemale0to3;
		$CMNtotal0to3 = $CMNmale0to3 + $CMNfemale0to3;
		
		$sql18="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
               AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain12 = $this->db->query($sql18);
		$CMNmale3to6 = $querymain12->row(0)->CMNmale3to6;
		
		$sql19="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale3to6 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain13 = $this->db->query($sql19);
		$CMNfemale3to6 = $querymain13->row(0)->CMNfemale3to6;
		$CMNtotal3to6 = $CMNmale3to6 + $CMNfemale3to6;
		
	
		
		$sql120="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale6to14 FROM ocop_general_info
               LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
               LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
               WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
               AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql120);
		$CMNmale6to14 = $querymain5->row(0)->CMNmale6to14;
		
		
		$sql121="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale6to14 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 6 AND 14
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql121);
		$CMNfemale6to14 = $querymain4->row(0)->CMNfemale6to14;
		$CMNtotal6to14 = $CMNmale6to14 + $CMNfemale6to14;
		
		$sql122="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNmale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain14 = $this->db->query($sql122);
		$CMNmale14to18  = $querymain14->row(0)->CMNmale14to18 ;
		
		$sql123="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS CMNfemale14to18 FROM ocop_general_info
                LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id 
                LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
                WHERE `child_marriage`='No' AND ( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) BETWEEN 14 AND 18
                AND Gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain15 = $this->db->query($sql123);
		$CMNfemale14to18 = $querymain15->row(0)->CMNfemale14to18;
		$CMNtotal14to18 = $CMNmale14to18 + $CMNfemale14to18;
		
		
		$CMYtotalmale=$CMYmale0to3 + $CMYmale3to6 + $CMYmale6to14 + $CMYmale14to18;
		$CMYtotalfemale=$CMYfemale0to3 + $CMYfemale3to6 + $CMYfemale6to14 + $CMYfemale14to18;
		$Ytotalfemale = $Yfemale0to3 + $Yfemale3to6 + $Yfemale6to14 + $Yfemale14to18;
		$tot0to3male =$CMYmale0to3 + 0;
		$tot3to6male = $CMYmale3to6 + 0;
		$tot6to14male = $CMYmale6to14 + 0;
		$tot14to18male = $CMYmale14to18 + 0;
		$tot0to3female = $CMYfemale0to3 + $Yfemale0to3;
		$tot3to6female = $CMYfemale3to6 + $Yfemale3to6;
		$tot6to14female = $CMYfemale6to14 + $Yfemale6to14;
		$tot14to18female = $CMYfemale14to18 + $Yfemale14to18;
		$totmale= $CMYtotalmale + 0;
		$totfemale= $CMYtotalfemale + $Ytotalfemale;
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report of child marriage and child Minor Pregnency based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="5" align="center"><b>Report of child marriage and child Minor Pregnency based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>No. of  Minor Pregnancy</b></th>
				<th align="center"><b>No. of child marriage </b></th>
				<th align="center"><b>Total no. of Children</b></th>
			</tr>
				<tr>
				<td rowspan="2">0-3 yrs</td>
				<td>male Childrens no</td>
				<td>-</td>
				<td>'.$CMYmale0to3.'</td>
				<td>'.$tot0to3male.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Yfemale0to3.'</td>
				<td>'.$CMYfemale0to3.'</td>
				<td>'.$tot0to3female.'</td>
			</tr>
				<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>-</td>
				<td>'.$CMYmale3to6.'</td>
				<td>'.$tot3to6male.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Yfemale3to6.'</td>
				<td>'.$CMYfemale3to6.'</td>
				<td>'.$tot3to6female.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>-</td>
				<td>'.$CMYmale6to14.'</td>
				<td>'.$tot6to14male.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Yfemale6to14.'</td>
				<td>'.$CMYfemale6to14.'</td>
				<td>'.$tot6to14female.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>-</td>
				<td>'.$CMYmale14to18.'</td>
				<td>'.$tot14to18male.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$Yfemale14to18.'</td>
				<td>'.$CMYfemale14to18.'</td>
				<td>'.$tot14to18female.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>-</td>
				<td>'.$CMYtotalmale.'</td>
				<td>'.$totmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$Ytotalfemale.'</td>
				<td>'.$CMYtotalfemale.'</td>
				<td>'.$totfemale.'</td>
			</tr>
			<tr>
				<td colspan="5" align="left"><b><u>Note:</u> <span style="color:red">These values present in the graph are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
		
	function birthregister_pie($village = ''){
		$sql = "SELECT birth_registration as name, count(birth_registration) as data
		FROM ocop_birth_details 
		LEFT JOIN household_entry ON ocop_birth_details.ocop_birth_details_id= household_entry.household_entry_id 
		WHERE household_entry.entry_village_name='".$village."' and birth_registration IN('Yes','No') GROUP BY birth_registration ";
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
	
	function birthregister_bargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_birth_details.birth_registration IN('Yes','No')")
						  ->join('ocop_birth_details ', 'household_entry.household_entry_id = ocop_birth_details .ocop_birth_details_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
		function childbirth_birthregreport_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//Children's Population Birth registration
		
		$sql="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain = $this->db->query($sql);
		$BRmale0to3 = $querymain->row(0)->BRmale0to3;
		
		$sql1="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain1 = $this->db->query($sql1);
		$BRfemale0to3 = $querymain1->row(0)->BRfemale0to3;
		$BRtotal0to3 = $BRmale0to3 + $BRfemale0to3;
		
		$sql2="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain2 = $this->db->query($sql2);
		$BRmale3to6 = $querymain2->row(0)->BRmale3to6;
		
		$sql3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain3 = $this->db->query($sql3);
		$BRfemale3to6 = $querymain3->row(0)->BRfemale3to6;
		$BRtotal3to6 = $BRmale3to6 + $BRfemale3to6;
		
		$sql4="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."' ";
		$querymain4 = $this->db->query($sql4);
		$BRmale6to14 = $querymain4->row(0)->BRmale6to14;
		
		$sql5="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain5 = $this->db->query($sql5);
		$BRfemale6to14 = $querymain5->row(0)->BRfemale6to14;
		$BRtotal6to14 = $BRmale6to14 + $BRfemale6to14;
		
		
		$sql6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain6 = $this->db->query($sql6);
		$BRmale14to18 = $querymain6->row(0)->BRmale14to18;
		
		$sql7="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain7 = $this->db->query($sql7);
		$BRfemale14to18 = $querymain7->row(0)->BRfemale14to18;
		$BRtotal4to18 = $BRmale14to18 + $BRfemale14to18;
		
		
		//End of Children's Birth registration
	
		//Children's Population Birth certificate
		
		$sql8="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain8 = $this->db->query($sql8);
		$BCmale0to3 = $querymain8->row(0)->BCmale0to3;
		
		$sql9="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain9 = $this->db->query($sql9);
		$BCfemale0to3 = $querymain9->row(0)->BCfemale0to3;
		$BCtotal0to3 = $BCmale0to3 + $BCfemale0to3;
		
		$sql10="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain12 = $this->db->query($sql10);
		$BCmale3to6 = $querymain12->row(0)->BCmale3to6;
		
		$sql11="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain13 = $this->db->query($sql11);
		$BCfemale3to6 = $querymain13->row(0)->BCfemale3to6;
		$BCtotal3to6 = $BCmale3to6 + $BCfemale3to6;
		
		$sql12="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."' ";
		$querymain14 = $this->db->query($sql12);
		$BCmale6to14 = $querymain14->row(0)->BCmale6to14;
		
		$sql13="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain15 = $this->db->query($sql13);
		$BCfemale6to14 = $querymain15->row(0)->BCfemale6to14;
		$BCtotal6to14 = $BCmale6to14 + $BCfemale6to14;
		
		
		$sql14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain16 = $this->db->query($sql14);
		$BCmale14to18 = $querymain16->row(0)->BCmale14to18;
		
		$sql15="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain17 = $this->db->query($sql15);
		$BCfemale14to18 = $querymain17->row(0)->BCfemale14to18;
		$BCtotal4to18 = $BCmale14to18 + $BCfemale14to18;
		
		//End of Children's Birth Certificate 
		
		//total
		$totmale03 = $BRmale0to3 + $BCmale0to3 ;
		$totfemale03 = $BRfemale0to3 + $BCfemale0to3 ;
		$totmale36 = $BRmale3to6 + $BCmale3to6 ;
		$totfemale36 = $BRfemale3to6 + $BCfemale3to6 ;
		$totmale614 = $BRmale6to14 + $BCmale6to14 ;
		$totfemale614 = $BRfemale6to14 + $BCfemale6to14 ;
		$totmale1418 = $BRmale14to18 + $BCmale14to18 ;
		$totfemale1418 = $BRfemale14to18 + $BCfemale14to18 ;
		
		$totmalebirthreg = $BRmale0to3 + $BRmale3to6 + $BRmale6to14  + $BRmale14to18 ;
		$totfemalebirthreg = $BRfemale0to3 + $BRfemale3to6  + $BRfemale6to14 + $BRfemale14to18 ;
		$totmalebirthcer = $BCmale0to3 + $BCmale3to6 + $BCmale6to14  + $BCmale14to18 ;
		$totfemalebirthcer = $BCfemale0to3 + $BCfemale3to6  + $BCfemale6to14 + $BCfemale14to18 ;
		$totalmale = $totmalebirthreg + $totmalebirthcer;
		$totalfemale=$totfemalebirthreg + $totfemalebirthcer;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Children Birth registration information (General Age Breakup)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$ddlpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">'.$ddlvillage.'</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';	
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
		<tr>
				<td colspan="5" align="center"><b>Children Birth registration information (General Age Breakup)</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>Total No. of children</b></th>
				<th align="center"><b>No. of  Birth registration"s Children</b></th>
				<th align="center"><b>No. of children received Birth certificate</b></th>
				
			</tr>
			<tr>
    <td rowspan="2">0-3 yrs</td>
    <td>male Childrens no</td>
	<td>'.$totmale03.' </td>
    <td>'.$BRmale0to3.'</td>
	<td>'.$BCmale0to3.'</td>
	
			</tr>
			<tr>
				<td>Female Childrens no</td>
				<td>'.$totfemale03.'</td>
				<td>'.$BRfemale0to3.'</td>
				<td>'.$BCfemale0to3.'</td>
				
			</tr>
			<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$totmale36.'</td>
				<td>'.$BRmale3to6.'</td>
				<td>'.$BCmale3to6.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no</td>
				<td>'.$totfemale36.'</td>
				<td>'.$BRfemale3to6.'</td>
				<td>'.$BCfemale3to6.'</td>
				
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$totmale614.'</td>
				<td>'.$BRmale6to14.'</td>
				<td>'.$BCmale6to14.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$totfemale614.'</td>
				<td>'.$BRfemale6to14.'</td>
				<td>'.$BCfemale6to14.'</td>
				
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$totmale1418.'</td>
				<td>'.$BRmale14to18.'</td>
				<td>'.$BCmale14to18.'</td>
				
			</tr>
			<tr>
				<td>Female Childrens no</td>
				<td>'.$totfemale1418.'</td>
				<td>'.$BRfemale14to18.'</td>
				<td>'.$BCfemale14to18.'</td>
				
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$totalmale.'</td>
				<td>'.$totmalebirthreg.'</td>
				<td>'.$totmalebirthcer.'</td>
				
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$totalfemale.'</td>
				<td>'.$totfemalebirthreg.'</td>
				<td>'.$totfemalebirthcer.'</td>
				
			</tr>
			<tr>
				<td colspan="5" align="left"><b><u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}


		function childbirth_reg_multiple_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		$txtpanchayat = stripslashes($txtpanchayat);
		//Children's Population Birth registration
		
		$sql="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		$BRmale0to3 = $querymain->row(0)->BRmale0to3;
		
		$sql1="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql1);
		$BRfemale0to3 = $querymain1->row(0)->BRfemale0to3;
		$BRtotal0to3 = $BRmale0to3 + $BRfemale0to3;
		
		$sql2="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$BRmale3to6 = $querymain2->row(0)->BRmale3to6;
		
		$sql3="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$BRfemale3to6 = $querymain3->row(0)->BRfemale3to6;
		$BRtotal3to6 = $BRmale3to6 + $BRfemale3to6;
		
		$sql4="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql4);
		$BRmale6to14 = $querymain4->row(0)->BRmale6to14;
		
		$sql5="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql5);
		$BRfemale6to14 = $querymain5->row(0)->BRfemale6to14;
		$BRtotal6to14 = $BRmale6to14 + $BRfemale6to14;
		
		
		$sql6="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRmale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain6 = $this->db->query($sql6);
		$BRmale14to18 = $querymain6->row(0)->BRmale14to18;
		
		$sql7="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BRfemale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_registration = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain7 = $this->db->query($sql7);
		$BRfemale14to18 = $querymain7->row(0)->BRfemale14to18;
		$BRtotal4to18 = $BRmale14to18 + $BRfemale14to18;
		
		
		//End of Children's Birth registration
	
		//Children's Population Birth certificate
		
		$sql8="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain8 = $this->db->query($sql8);
		$BCmale0to3 = $querymain8->row(0)->BCmale0to3;
		
		$sql9="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale0to3 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 0 AND 3 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain9 = $this->db->query($sql9);
		$BCfemale0to3 = $querymain9->row(0)->BCfemale0to3;
		$BCtotal0to3 = $BCmale0to3 + $BCfemale0to3;
		
		$sql10="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain12 = $this->db->query($sql10);
		$BCmale3to6 = $querymain12->row(0)->BCmale3to6;
		
		$sql11="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale3to6 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 3 AND 6 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain13 = $this->db->query($sql11);
		$BCfemale3to6 = $querymain13->row(0)->BCfemale3to6;
		$BCtotal3to6 = $BCmale3to6 + $BCfemale3to6;
		
		$sql12="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain14 = $this->db->query($sql12);
		$BCmale6to14 = $querymain14->row(0)->BCmale6to14;
		
		$sql13="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale6to14 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 6 AND 14 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain15 = $this->db->query($sql13);
		$BCfemale6to14 = $querymain15->row(0)->BCfemale6to14;
		$BCtotal6to14 = $BCmale6to14 + $BCfemale6to14;
		
		
		$sql14="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCmale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain16 = $this->db->query($sql14);
		$BCmale14to18 = $querymain16->row(0)->BCmale14to18;
		
		$sql15="SELECT count( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) ) ) AS BCfemale14to18 FROM `ocop_general_info` LEFT JOIN ocop_birth_details ON ocop_general_info.`ocop_general_info_id` = ocop_birth_details.ocop_birth_details_id LEFT JOIN household_entry  ON ocop_general_info.`ocop_general_info_id`=household_entry.household_entry_id WHERE 
		birth_certificate = 'Yes' AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob, '%d-%m-%Y' ) )) BETWEEN 14 AND 18 AND gender =2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain17 = $this->db->query($sql15);
		$BCfemale14to18 = $querymain17->row(0)->BCfemale14to18;
		$BCtotal4to18 = $BCmale14to18 + $BCfemale14to18;
		
		//End of Children's Birth Certificate 
		
		//total
		$totmale03 = $BRmale0to3 + $BCmale0to3 ;
		$totfemale03 = $BRfemale0to3 + $BCfemale0to3 ;
		$totmale36 = $BRmale3to6 + $BCmale3to6 ;
		$totfemale36 = $BRfemale3to6 + $BCfemale3to6 ;
		$totmale614 = $BRmale6to14 + $BCmale6to14 ;
		$totfemale614 = $BRfemale6to14 + $BCfemale6to14 ;
		$totmale1418 = $BRmale14to18 + $BCmale14to18 ;
		$totfemale1418 = $BRfemale14to18 + $BCfemale14to18 ;
		
		$totmalebirthreg = $BRmale0to3 + $BRmale3to6 + $BRmale6to14  + $BRmale14to18 ;
		$totfemalebirthreg = $BRfemale0to3 + $BRfemale3to6  + $BRfemale6to14 + $BRfemale14to18 ;
		$totmalebirthcer = $BCmale0to3 + $BCmale3to6 + $BCmale6to14  + $BCmale14to18 ;
		$totfemalebirthcer = $BCfemale0to3 + $BCfemale3to6  + $BCfemale6to14 + $BCfemale14to18 ;
		$totalmale = $totmalebirthreg + $totmalebirthcer;
		$totalfemale=$totfemalebirthreg + $totfemalebirthcer;
		
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(trUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
	<div align="center">
			<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Children Birth registration information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';	
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
		<tr>
				<td colspan="5" align="center"><b>Children Birth registration information based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="center"><b>Children"s Age</b></th>
				<th align="center"><b></b></th>
				<th align="center"><b>No. of  Birth registration"s Children</b></th>
				<th align="center"><b>No. of children received Birth certificate</b></th>
				<th align="center"><b>Total No. of children</b></th>
			</tr>
			<tr>
    <td rowspan="2">0-3 yrs</td>
    <td>male Childrens no</td>
    <td>'.$BRmale0to3.'</td>
	<td>'.$BCmale0to3.'</td>
	<td>'.$totmale03.' </td>
			</tr>
			<tr>
				<td>Female Childrens no</td>
				<td>'.$BRfemale0to3.'</td>
				<td>'.$BCfemale0to3.'</td>
				<td>'.$totfemale03.'</td>
			</tr>
			<tr>
				<td rowspan="2">3-6 yrs</td>
				<td>male Childrens no</td>
				<td>'.$BRmale3to6.'</td>
				<td>'.$BCmale3to6.'</td>
				<td>'.$totmale36.'</td>
			</tr>
			<tr>
				<td>Female Childrens no</td>
				<td>'.$BRfemale3to6.'</td>
				<td>'.$BCfemale3to6.'</td>
				<td>'.$totfemale36.'</td>
			</tr>
			<tr>
				<td rowspan="2">6-14 yrs</td>
				<td>male Childrens no</td>
				<td>'.$BRmale6to14.'</td>
				<td>'.$BCmale6to14.'</td>
				<td>'.$totmale614.'</td>
			</tr>
			<tr>
				<td>Female Childrens no yrs</td>
				<td>'.$BRfemale6to14.'</td>
				<td>'.$BCfemale6to14.'</td>
				<td>'.$totfemale614.'</td>
			</tr>
			<tr>
				<td rowspan="2">14-18 yrs</td>
				<td>male Childrens no</td>
				<td>'.$BRmale14to18.'</td>
				<td>'.$BCmale14to18.'</td>
				<td>'.$totmale1418.'</td>
			</tr>
			<tr>
				<td>Female Childrens no</td>
				<td>'.$BRfemale14to18.'</td>
				<td>'.$BCfemale14to18.'</td>
				<td>'.$totfemale1418.'</td>
			</tr>
			<tr>
				<td rowspan="2">Total on of Children</td>
				<td>male Childrens no</td>
				<td>'.$totmalebirthreg.'</td>
				<td>'.$totmalebirthcer.'</td>
				<td>'.$totalmale.'</td>
			</tr>
				<tr>
				<td>Female Childrens no</td>
				<td>'.$totfemalebirthreg.'</td>
				<td>'.$totfemalebirthcer.'</td>
				<td>'.$totalfemale.'</td>
			</tr>
			<tr>
				<td colspan="5" align="left"><b><u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of live data. </span></b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
		
	function childdropout_grama_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		$sql="SELECT child_name as childname, drop_out_reason as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `drop_out_reason` =  'other' ";
			
		$querymain = $this->db->query($sql);

		$sql1="SELECT child_name as childname, drop_out_reason as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `drop_out_reason` =  'not interested'  ";
			
		$querymain1 = $this->db->query($sql1);
		
		$sql23="SELECT child_name as childname, drop_out_reason as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `drop_out_reason` =  'Parents Death' ";
			
		$querymain23 = $this->db->query($sql23);

		$sq34="SELECT child_name as childname, drop_out_reason as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `drop_out_reason` =   'migration' ";
			
	$querymain34 = $this->db->query($sq34);
		
		$sq343="SELECT child_name as childname, drop_out_reason as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `drop_out_reason` =  'taking care of siblings' ";
			
	$querymain343 = $this->db->query($sq343);
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
		<div align="center">
			<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
						 <img src="./assets/images/anu.png" ><br>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Age-Wise Childrens Population (General Age Break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
		<tr>
				<th align="left"><h2><span style="color:red"> Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
				<th align="left"><h2><span style="color:red">Other</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
					if ($querymain->num_rows() > 0)
		{
			foreach($querymain->result() as $rowitem)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
				$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Not interested</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain1->num_rows() > 0)
		{
			foreach($querymain1->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Parents death</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain23->num_rows() > 0)
		{
			foreach($querymain23->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Migration</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain34->num_rows() > 0)
		{
			foreach($querymain34->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Taking care of
siblings</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain343->num_rows() > 0)
		{
			foreach($querymain343->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	

		function childprimary_grama_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		$sql="SELECT child_name as childname, primary_type as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `primary_type` =  'government' ";
			
		$querymain = $this->db->query($sql);

		$sql1="SELECT child_name as childname, primary_type as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `primary_type` =  'private'  ";
			
		$querymain1 = $this->db->query($sql1);
		
		$sql23="SELECT child_name as childname, primary_type as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `primary_type` =  'NGO' ";
			
		$querymain23 = $this->db->query($sql23);

		$sq34="SELECT child_name as childname, primary_type as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_education ON ocop_education.ocop_education_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `primary_type` =   'other' ";
			
	$querymain34 = $this->db->query($sq34);

	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
		<div align="center">
			<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
						 <img src="./assets/images/anu.png" ><br>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Age-Wise Childrens Population (General Age Break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
		<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
				<th align="left"><h2><span style="color:red">Govt.</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
					if ($querymain->num_rows() > 0)
		{
			foreach($querymain->result() as $rowitem)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
				$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Private</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain1->num_rows() > 0)
		{
			foreach($querymain1->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">NGO</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain23->num_rows() > 0)
		{
			foreach($querymain23->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Other</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain34->num_rows() > 0)
		{
			foreach($querymain34->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}

	
		function childbirthreg_grama_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		$sql="SELECT child_name as childname, birth_registration as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_birth_details ON ocop_general_info.ocop_general_info_id = ocop_birth_details.ocop_birth_details_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and birth_registration = 'Yes' ";
		
		
		$querymain = $this->db->query($sql);

		$sql1="SELECT child_name as childname, birth_registration as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_birth_details ON ocop_general_info.ocop_general_info_id = ocop_birth_details.ocop_birth_details_id
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and birth_certificate = 'Yes' ";
			
		$querymain1 = $this->db->query($sql1);
	
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
		<div align="center">
			<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
						 <img src="./assets/images/anu.png" ><br>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Age-Wise Childrens Population (General Age Break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
		<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
				<th align="left"><h2><span style="color:red">Birth Registration</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
					if ($querymain->num_rows() > 0)
		{
			foreach($querymain->result() as $rowitem)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
				$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Birth Certification</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain1->num_rows() > 0)
		{
			foreach($querymain1->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
	
	
		
		
	function childchildminor_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		$sql="SELECT child_name as childname, minor_pregnancy as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `minor_pregnancy`='Yes' ";
			
		$querymain = $this->db->query($sql);

		$sql1="SELECT child_name as childname, minor_pregnancy as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `minor_pregnancy`='No' ";
			
		$querymain1 = $this->db->query($sql1);
		
		$sql23="SELECT child_name as childname, child_marriage as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `child_marriage`='Yes' ";
			
		$querymain23 = $this->db->query($sql23);

		$sq34="SELECT child_name as childname, child_marriage as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN ocop_protection ON ocop_protection.ocop_protection_id = ocop_general_info.ocop_general_info_id
		LEFT JOIN household_entry ON household_entry.household_entry_id=ocop_general_info.ocop_general_info_id 
		WHERE  household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "') and `child_marriage`='No' ";
			
	$querymain34 = $this->db->query($sq34);
		
			
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdfname= 'OCOP CRT REPORT';
		$resolution= array(72, 150);
		$pdf->SetAuthor('ASPEN');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('Aspen, bill, invoice');
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		$pdf->SetFont('helvetica', '', 7);
		$pdf->AddPage();		
		$html = '
		<div align="center">
			<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
	
				<tr>
					<td align="left" align="center" width="25%">
					 <img src="./assets/images/ocop.png" ><br>
					 <span style="font-size:13px" align="center"><b><h3>Our Children Our Progress<br>
					(Child Tracking System)</h3></b></span>

					</td>
					<td align="center" width="75%">
						<span style="text-align:center; font-size:23px;"><h3>It is a unique system in which child related information of all children will be collected and fed into the computer for analysis and monitoring the implementation of survival, development, protection and participation rights of the children as well as to find out the actions required.</h3></span>
						 <img src="./assets/images/anu.png" ><br>
					</td>
				</tr>
				<tr>
					<td align="center">
						Concept & Implementation by:<img src="./assets/images/hooduku.jpg" alt="hooduku" width="85px" height="31px">
					</td>
					<td>
						<img src="./assets/images/crt.png" alt="crt" >
						<img src="./assets/images/everychild.png" alt="everychild" >
					</td>
				</tr>			
			</table> 
		</div>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="4" align="center"><b>Report Title:Age-Wise Childrens Population (General Age Break up)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">'.$txtreportlevel.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>State</b></th>
				<td><span style="color:red">'.$txtstate.'</span></td>
				<th align="left"><b>Division</b></th>
				<td><span style="color:red">'.$txtdivision.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>District</b></th>
				<td><span style="color:red">'.$txtdistrict.'</span></td>
				<th align="left"><b>Taluk</b></th>
				<td><span style="color:red">'.$txttaluk.'</span></td>
			</tr>
			<tr>
				<th align="left"><b>Grama Panchayath</b></th>
				<td><span style="color:red">'.$txtpanchayat.'</span></td>
				<th align="left"><b>Village</b></th>
				<td><span style="color:red">-</span></td>
			</tr>
		</table>';	
		$html .= '
		<table cellspacing="0" cellpadding="5" border="0">
			<tr>
				<td>&nbsp;</td> 
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
		<tr>
				<th align="left"><h2><span style="color:red"> Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
				<th align="left"><h2><span style="color:red">Minor Pregnancy(yes)</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
					if ($querymain->num_rows() > 0)
		{
			foreach($querymain->result() as $rowitem)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
				$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Minor Pregnancy(no)</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain1->num_rows() > 0)
		{
			foreach($querymain1->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Child marriage(yes)</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain23->num_rows() > 0)
		{
			foreach($querymain23->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$html .= '
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Child marriage(no)</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain34->num_rows() > 0)
		{
			foreach($querymain34->result() as $rowitem1)
			{
		$html .= '
			<tr>
				<td align="left"><h4>'.$rowitem1->childname.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->dob.'</h4></td>
				<td align="left" ><h4>'.$rowitem1->caste.'</h4></td>
				<td align="left"><h4>'.$rowitem1->father_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->mother_name.'</h4></td>
				<td align="left"><h4>'.$rowitem1->present_addr.'</h4></td>
				<td align="left"><h4>'.$rowitem1->entry_villages.'</h4></td>
				<td align="left"><h4>'.$rowitem1->panchayat.'</h4></td>
			</tr>';
			}
		}
			
		'</table>';
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
	
	
	
	
	
	
	
	
}
class childcurrentreport_model extends Base_module_record {
 	
}