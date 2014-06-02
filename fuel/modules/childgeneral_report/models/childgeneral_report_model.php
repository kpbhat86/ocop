<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'helpers/tcpdf/config/lang/eng.php');
require_once(APPPATH.'helpers/tcpdf/tcpdf.php');

class childgeneral_report_model extends Base_module_model {

	function __construct(){
        parent::__construct('ocop_general_info');
    }
	
	
	function castewisereport_pie($village = ''){
		$sql = "SELECT caste as name, Count(caste) as data
		FROM ocop_general_info 
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
		WHERE  household_entry.entry_village_name='".$village."'  And caste IN('SC','ST','OBC','Other') GROUP BY caste ";
		
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
			
		function orphanwisereport_pie($village = ''){
		$sql = "SELECT child_orphan_yes as name, Count(child_orphan_yes) as data
		FROM ocop_general_info 
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id= household_entry.household_entry_id 
		WHERE  household_entry.entry_village_name='".$village."' and ocop_general_info.child_orphan IN('Yes','No Parents','No Father','No Mother')  GROUP BY child_orphan_yes ";
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
	
		
	function religionreport_pie($village = ''){
		$sql = "SELECT religion as name, count(religion) as data
		FROM ocop_general_info 
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id 
		WHERE  household_entry.entry_village_name='".$village."' and religion IN('Hindu','Christian','Muslim','Jain','Other') GROUP BY religion ";
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
	
	function yearSpendTrend($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  ->get();
		
		return $query->result();
	}
	
	function castewisereportbarchart($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_general_info.caste IN('SC','ST','OBC','Other')")
						  ->join('ocop_general_info ', 'household_entry.household_entry_id = ocop_general_info.ocop_general_info_id', 'left')
						  ->get();
		return $query->result();
	}
	

		
	function orphanwisereportbarchart($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_general_info.child_orphan IN ('Yes','No Parents','No Father' ,'No Mother' )")
						  ->join('ocop_general_info ', 'household_entry.household_entry_id = ocop_general_info .ocop_general_info_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	

	
	function religionbargraph($village = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ('entry_village_name', $village)
						  -> where ("ocop_general_info.religion IN( 'Hindu','Muslim','Christian','Jain','Other') ")
						  ->join('ocop_general_info ', 'household_entry.household_entry_id = ocop_general_info .ocop_general_info_id', 'left')
						  ->get();
		return $query->result();
	}
	
	
	function childinfoYearData(){
		$sql = "select * from ocop_general_info";
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
	
	function reportgenerate($state = '',$divison = '',$district = '',$taluk='',$panchayat='',$village='') {
		$sql = "select Sum(entry_age0_3yrsmale) as threeyearsmale, Sum(entry_age3_6yrsmale) as sixyearsmale, Sum(entry_age6_14yrsmale) as fourteenyearsmale, Sum(entry_age14_18yrsmale) as eighteenyearsmale, Sum(entry_age0_3yrsfemale) as threeyearsfemale, Sum(entry_age3_6yrsfemale) as sixyearsfemale, Sum(entry_age6_14yrsfemale) as fourteenyearsfemale,Sum(entry_age14_18yrsfemale) as eighteenyearsfemale from household_entry where entry_village_name='".$village."' order by entry_date_today desc";
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
	
	function castewisereport($state = '',$divison = '',$district = '',$taluk='',$panchayat='',$village='') {
		$sql = "select count(entry_age0_3yrsmale) as threeyearsmale, count(entry_age3_6yrsmale) as sixyearsmale, count(entry_age6_14yrsmale) as fourteenyearsmale, count(entry_age14_18yrsmale) as eighteenyearsmale, count(entry_age0_3yrsfemale) as threeyearsfemale, count(entry_age3_6yrsfemale) as sixyearsfemale, count(entry_age6_14yrsfemale) as fourteenyearsfemale, count(entry_age14_18yrsfemale) as eighteenyearsfemale from household_entry where entry_village_name='".$village."' order by entry_date_today desc";
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
	
	function reportgenerateyearly() {
		$sql = "select entry_age0_3yrsmale as threeyearsmale, entry_age3_6yrsmale as sixyearsmale, entry_age6_14yrsmale as fourteenyearsmale, entry_age14_18yrsmale as eighteenyearsmale, entry_age0_3yrsfemale as threeyearsfemale, entry_age3_6yrsfemale as sixyearsfemale, entry_age6_14yrsfemale as fourteenyearsfemale,entry_age14_18yrsfemale as eighteenyearsfemale from household_entry order by entry_date_today desc";
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
	
	function childgeneral_report_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='', $ddlagebreakup='') {
		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as male0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ";
		$querymain = $this->db->query($sql);
		$male0to3 = $querymain->row(0)->male0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain1 = $this->db->query($sql1);
		$female0to3 = $querymain1->row(0)->female0to3;
		$total0to3 = $male0to3 + $female0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS male3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 4 AND 6 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain2 = $this->db->query($sql2);
		$male3to6 = $querymain2->row(0)->male3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 4 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."' ";
		$querymain3 = $this->db->query($sql3);
		$female3to6 = $querymain3->row(0)->female3to6;
		$total3to6 = $male3to6 + $female3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as male6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 7 AND 14 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ";
		$querymain4 = $this->db->query($sql4);
		$male6to14 = $querymain4->row(0)->male6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 7 AND 14 and gender=2 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain5 = $this->db->query($sql5);
		$female6to14 = $querymain5->row(0)->female6to14;
		$total6to14 = $male6to14 + $female6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as male14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 15 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."'";
		$querymain6 = $this->db->query($sql6);
		$male14to18 = $querymain6->row(0)->male14to18;
		
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 15 AND 18 and gender=2 and household_entry.entry_village_name='".$ddlvillage."' ";
		$querymain7 = $this->db->query($sql7);
		$female14to18 = $querymain7->row(0)->female14to18;
		$total14to18 = $male14to18 + $female14to18;
		
		$totmale =  $male0to3 + $male3to6 + $male6to14 + $male14to18;
		$totfemale = $female0to3 + $female3to6 + $female6to14 + $female14to18;
		$totall = $total0to3 + $total3to6 + $total6to14 + $total14to18;
	
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
				<td colspan="4" align="center"><b>Report Title:Age-Wise Childrens Population (General Age Break up)</b><br>
				 <img src="./assets/images/2.png" ></td>
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
				<td colspan="4" align="center"><b>Age-Wise Childrens Population(General Age Breakup)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Childrens Age</b></th>
				<th align="left"><b>Male Childrens Population</b></th>
				<th align="left"><b>Female Childrens Population</b></th>
				<th align="left"><b>Total Childrens Population</b></th>
			</tr>
			<tr>
				<td align="left"><b>0-3 yrs</b></td>
				<td><span style="color:red">'.$male0to3.'</span></td>
				<td><span style="color:red">'.$female0to3.'</span></td>
				<td><span style="color:red">'.$total0to3.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>4-6 yrs</b></td>
				<td><span style="color:red">'.$male3to6.'</span></td>
				<td><span style="color:red">'.$female3to6.'</span></td>
				<td><span style="color:red">'.$total3to6.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>7-14 yrs</b></td>
				<td><span style="color:red">'.$male6to14.'</span></td>
				<td><span style="color:red">'.$female6to14.'</span></td>
				<td><span style="color:red">'.$total6to14.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>15-18 yrs</b></td>
				<td><span style="color:red">'.$male14to18.'</span></td>
				<td><span style="color:red">'.$female14to18.'</span></td>
				<td><span style="color:red">'.$total14to18.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>Total Childrens Population</b></td>
				<td><span style="color:red">'.$totmale.'</span></td>
				<td><span style="color:red">'.$totfemale.'</span></td>
				<td><span style="color:red">'.$totall.'</span></td>
			</tr>
			
			<tr>
				<td colspan="4" align="left"><b><u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of  live data </span></b></td>
			</tr>
			
			<tr>
				<td colspan="4" ><b>For More Information, Please Contact: 
				Child Rights Trust, 4606, 6th Floor, High Point IV, Palace Road, Bangalore 560 001. Ph: +91 080 4113 8285, +91 080 4091 2580
				Fax:+91 080 4091 2580 Website: www.childrightstrust.org  Email: crtindia@yahoo.co.in/ childrightstrust@gmail.com</b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	
	

		function childgeneral_Individualreport_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='', $ddlagebreakup='') {
		
		$sql="SELECT child_name as childname, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE gender =1
		AND household_entry.entry_village_name =  '".$ddlvillage."' GROUP BY child_name";
			
		$querymain = $this->db->query($sql);
		
		$sql1="SELECT child_name as childname, entry_grama_panchayat as panchayat, entry_village_name as entry_villages, dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE gender =2
		AND household_entry.entry_village_name =  '".$ddlvillage."' GROUP BY child_name";
			
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
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">Male Childrens Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
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
				<th align="left"><h2><span style="color:red">Female Childrens Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
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
	
	
	function childgeneral_report_pdfoneyearly($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='', $ddlagebreakup='') {
		$sql="select survey_age_survey  from household_survey_list where (survey_age_survey BETWEEN 0 AND 1) or
		(survey_age_survey BETWEEN 1 AND 2) or 
		(survey_age_survey BETWEEN 2 AND 3)or 
		(survey_age_survey BETWEEN 3 AND 4)or 
		(survey_age_survey BETWEEN 4 AND 5)or 
		(survey_age_survey BETWEEN 5 AND 6)or 
		(survey_age_survey BETWEEN 6 AND 7)or 
		(survey_age_survey BETWEEN 7 AND 8)or 
		(survey_age_survey BETWEEN 8 AND 9)or 
		(survey_age_survey BETWEEN 9 AND 10)or 
		(survey_age_survey BETWEEN 10 AND 11)or 
		(survey_age_survey BETWEEN 11 AND 12)or 
		(survey_age_survey BETWEEN 12 AND 13)or 
		(survey_age_survey BETWEEN 13 AND 14) or 
		(survey_age_survey BETWEEN 14 AND 15)or 
		(survey_age_survey BETWEEN 15 AND 16)or 
		(survey_age_survey BETWEEN 16 AND 17)or 
		(survey_age_survey BETWEEN 17 AND 18) Left join entry_village_name='".$ddlvillage."' order by entry_date_today desc";
		
		$querymain = $this->db->query($sql);
		$threeyearsmale = $querymain->row(0)->threeyearsmale;
		$sixyearsmale = $querymain->row(0)->sixyearsmale; 
		$fourteenyearsmale = $querymain->row(0)->fourteenyearsmale;
		$eighteenyearsmale = $querymain->row(0)->eighteenyearsmale;
		$threeyearsfemale = $querymain->row(0)->threeyearsfemale;
		$sixyearsfemale = $querymain->row(0)->sixyearsfemale; 
		$fourteenyearsfemale = $querymain->row(0)->fourteenyearsfemale;
		$eighteenyearsfemale = $querymain->row(0)->eighteenyearsfemale;
		$threetoal= $threeyearsmale + $threeyearsfemale;
		$sixtotal= $sixyearsmale + $sixyearsfemale;
		$fourteentotal= $fourteenyearsmale + $fourteenyearsfemale;
		$eighteentotal= $eighteenyearsmale + $eighteenyearsfemale;
		$totalmale= $threeyearsmale + $sixyearsmale + $fourteenyearsmale + $eighteenyearsmale;
		$totalfemale= $threeyearsfemale + $sixyearsfemale + $fourteenyearsfemale + $eighteenyearsfemale;
		$totalchild= $threetoal + $sixtotal + $fourteentotal + $eighteentotal;
	
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
		<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="2" align="center"><b>Report Title:Age-Wise Childrens Population (General Age Break up)</b></td>
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			
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
		<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="2" align="center"><b>Age-Wise Childrens Population(General Age Breakup)</b></td>
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			<tr>
				<th align="left"><b>Childrens Age</b></th>
				<th align="left"><b>Male Childrens Population</b></th>
				<th align="left"><b>Female Childrens Population</b></th>
				<th align="left"><b>Total Childrens Population</b></th>
			</tr>
			<tr>
				<td align="left"><b>0-3 yrs</b></td>
				<td><span style="color:red">'.$threeyearsmale.'</span></td>
				<td><span style="color:red">'.$threeyearsfemale.'</span></td>
				<td><span style="color:red">'.$threetoal.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>3-6 yrs</b></td>
				<td><span style="color:red">'.$sixyearsmale.'</span></td>
				<td><span style="color:red">'.$sixyearsfemale.'</span></td>
				<td><span style="color:red">'.$sixtotal.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>6-14 yrs</b></td>
				<td><span style="color:red">'.$fourteenyearsmale.'</span></td>
				<td><span style="color:red">'.$fourteenyearsfemale.'</span></td>
				<td><span style="color:red">'.$fourteentotal.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>14-18 yrs</b></td>
				<td><span style="color:red">'.$eighteenyearsmale.'</span></td>
				<td><span style="color:red">'.$eighteenyearsfemale.'</span></td>
				<td><span style="color:red">'.$eighteentotal.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>Total Childrens Population</b></td>
				<td><span style="color:red">'.$totalmale.'</span></td>
				<td><span style="color:red">'.$totalfemale.'</span></td>
				<td><span style="color:red">'.$totalchild.'</span></td>
			</tr>
		</table>';
	$html .= '	<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			<tr>
				<td align="left"><b><u>Note:</u> <span style="color:red"> These values present in the PDF are live data </span></b></td>
			</tr>
		</table>';
	$html .= '
		
		<table width="100%" cellspacing="2" align="center" border="1px">
			<tr>
				<td><b>For More Information, Please Contact: 
				Child Rights Trust, 4606, 6th Floor, High Point IV, Palace Road, Bangalore 560 001. Ph: +91 080 4113 8285, +91 080 4091 2580
				Fax:+91 080 4091 2580 Website: www.childrightstrust.org  Email: crtindia@yahoo.co.in/ childrightstrust@gmail.com</b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}

	
	function childgeneral_castewisereport_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//Children's Population SC
		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain = $this->db->query($sql);
		$SCmale0to3 = $querymain->row(0)->SCmale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain1 = $this->db->query($sql1);
		$SCfemale0to3 = $querymain1->row(0)->SCfemale0to3;
		$SCtotal0to3 = $SCmale0to3 + $SCfemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS SCmale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  caste='SC'
		AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 3 AND 6 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain2 = $this->db->query($sql2);
		$SCmale3to6 = $querymain2->row(0)->SCmale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain3 = $this->db->query($sql3);
		$SCfemale3to6 = $querymain3->row(0)->SCfemale3to6;
		$SCtotal3to6 = $SCmale3to6 + $SCfemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain4 = $this->db->query($sql4);
		$SCmale6to14 = $querymain4->row(0)->SCmale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain5 = $this->db->query($sql5);
		$SCfemale6to14 = $querymain5->row(0)->SCfemale6to14;
		$SCtotal6to14 = $SCmale6to14 + $SCfemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain6 = $this->db->query($sql6);
		$SCmale14to18 = $querymain6->row(0)->SCmale14to18;
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain7 = $this->db->query($sql7);
		$SCfemale14to18 = $querymain7->row(0)->SCfemale14to18;
		$SCtotal4to18 = $SCmale14to18 + $SCfemale14to18;
		
		$SCtotmale =  $SCmale0to3 + $SCmale3to6 + $SCmale6to14 + $SCmale14to18;
		$SCtotfemale = $SCfemale0to3 + $SCfemale3to6 + $SCfemale6to14 + $SCfemale14to18;
		$SCtotall = $SCtotal0to3 + $SCtotal3to6 + $SCtotal6to14 + $SCtotal4to18;
		
		//End of Children's Population SC  
		
		//Children's Population ST  
		
		$sql_STmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_STmale0to3 = $this->db->query($sql_STmale0to3);
		$STmale0to3 = $query_STmale0to3->row(0)->STmale0to3;
		
		$sql_STfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querySTfemale0to3 = $this->db->query($sql_STfemale0to3);
		$STfemale0to3 = $querySTfemale0to3->row(0)->STfemale0to3;
		$STtotal0to3 = $STmale0to3 + $STfemale0to3;
		
		$sql_STmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querySTmale3to6 = $this->db->query($sql_STmale3to6);
		$STmale3to6 = $querySTmale3to6->row(0)->STmale3to6;
		
		$sql_STfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTfemale3to6 = $this->db->query($sql_STfemale3to6);
		$STfemale3to6 = $querySTfemale3to6->row(0)->STfemale3to6;
		$STtotal3to6 = $STmale3to6 + $STfemale3to6;
		
		$sql_STmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTmale6to14 = $this->db->query($sql_STmale6to14);
		$STmale6to14 = $querySTmale6to14->row(0)->STmale6to14;
		
		$sql_STfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTfemale6to14 = $this->db->query($sql_STfemale6to14);
		$STfemale6to14 = $querySTfemale6to14->row(0)->STfemale6to14;
		$STtotal6to14 = $STmale6to14 + $STfemale6to14;
		
		    
		$sql_STmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTmale14to18 = $this->db->query($sql_STmale14to18);
		$STmale14to18 = $querySTmale14to18->row(0)->STmale14to18;
		
		$sql_STfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTfemale0to3 = $this->db->query($sql_STfemale0to3);
		$STfemale14to18 = $querySTfemale0to3->row(0)->STfemale14to18;
		$STtotal14to18 = $STmale14to18 + $STfemale14to18;
		
		$STtotmale =  $STmale0to3 + $STmale3to6 + $STmale6to14 + $STmale14to18;
		$STtotfemale = $STfemale0to3 + $STfemale3to6 + $STfemale6to14 + $STfemale14to18;
		$STtotall = $STtotal0to3 + $STtotal3to6 + $STtotal6to14 + $STtotal14to18;
		
		
		// End of Children's Population ST  
		
		// Children's Population OBC  
		
		$sql_OBCmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_OBCmale0to3 = $this->db->query($sql_OBCmale0to3);
		$OBCmale0to3 = $query_OBCmale0to3->row(0)->OBCmale0to3;
		
		$sql_OBCfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale0to3 = $this->db->query($sql_OBCfemale0to3);
		$OBCfemale0to3 = $queryOBCfemale0to3->row(0)->OBCfemale0to3;
		$OBCtotal0to3 = $OBCmale0to3 + $OBCfemale0to3;
		
		$sql_OBCmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCmale3to6 = $this->db->query($sql_OBCmale3to6);
		$OBCmale3to6 = $queryOBCmale3to6->row(0)->OBCmale3to6;
		
		$sql_OBCfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale3to6 = $this->db->query($sql_OBCfemale3to6);
		$OBCfemale3to6 = $queryOBCfemale3to6->row(0)->OBCfemale3to6;
		$OBCtotal3to6 = $OBCmale3to6 + $OBCfemale3to6;
		
		$sql_OBCmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCmale6to14 = $this->db->query($sql_OBCmale6to14);
		$OBCmale6to14 = $queryOBCmale6to14->row(0)->OBCmale6to14;
		
		$sql_OBCfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale6to14 = $this->db->query($sql_OBCfemale6to14);
		$OBCfemale6to14 = $queryOBCfemale6to14->row(0)->OBCfemale6to14;
		$OBCtotal6to14 = $OBCmale6to14 + $OBCfemale6to14;
		
		    
		$sql_OBCmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCmale14to18 = $this->db->query($sql_OBCmale14to18);
		$OBCmale14to18 = $queryOBCmale14to18->row(0)->OBCmale14to18;
		
		$sql_OBCfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale14to18 = $this->db->query($sql_OBCfemale14to18);
		$OBCfemale14to18 = $queryOBCfemale14to18->row(0)->OBCfemale14to18;
		$OBCtotal14to18 = $OBCmale14to18 + $OBCfemale14to18;
		
		$OBCtotmale =  $OBCmale0to3 + $OBCmale3to6 + $OBCmale6to14 + $OBCmale14to18;
		$OBCtotfemale = $OBCfemale0to3 + $OBCfemale3to6 + $OBCfemale6to14 + $OBCfemale14to18;
		$OBCtotall = $OBCtotal0to3 + $OBCtotal3to6 + $OBCtotal6to14 + $OBCtotal14to18;
		
		// End of Children's Population OBC  
		
		
		// Children's Population Other 
		
		$sql_OTRmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$query_OTRmale0to3 = $this->db->query($sql_OTRmale0to3);
		$OTRmale0to3 = $query_OTRmale0to3->row(0)->OTRmale0to3;
		
		$sql_OTRfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale0to3);
		$OTRfemale0to3 = $queryOTRfemale0to3->row(0)->OTRfemale0to3;
		$OTRtotal0to3 = $OTRmale0to3 + $OTRfemale0to3;
		
		$sql_OTRmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale3to6 = $this->db->query($sql_OTRmale3to6);
		$OTRmale3to6 = $queryOTRmale3to6->row(0)->OTRmale3to6;
		
		$sql_OTRfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale3to6 = $this->db->query($sql_OTRfemale3to6);
		$OTRfemale3to6 = $queryOTRfemale3to6->row(0)->OTRfemale3to6;
		$OTRtotal3to6 = $OTRmale3to6 + $OTRfemale3to6;
		
		$sql_OTRmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale6to14 = $this->db->query($sql_OTRmale6to14);
		$OTRmale6to14 = $queryOTRmale6to14->row(0)->OTRmale6to14;
		
		$sql_OTRfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale6to14 = $this->db->query($sql_OTRfemale6to14);
		$OTRfemale6to14 = $queryOTRfemale6to14->row(0)->OTRfemale6to14;
		$OTRtotal6to14 = $OTRmale6to14 + $OTRfemale6to14;
		
		    
		$sql_OTRmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale14to18 = $this->db->query($sql_OTRmale14to18);
		$OTRmale14to18 = $queryOTRmale14to18->row(0)->OTRmale14to18;
		
		$sql_OTRfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale14to18);
		$OTRfemale14to18 = $queryOTRfemale0to3->row(0)->OTRfemale14to18;
		$OTRtotal14to18 = $OTRmale14to18 + $OTRfemale14to18;
		
		$OTRtotmale =  $OTRmale0to3 + $OTRmale3to6 + $OTRmale6to14 + $OTRmale14to18;
		$OTRtotfemale = $OTRfemale0to3 + $OTRfemale3to6 + $OTRfemale6to14 + $OTRfemale14to18;
		$OTRtotall = $OTRtotal0to3 + $OTRtotal3to6 + $OTRtotal6to14 + $OTRtotal14to18;
		
		// End of Children's Population Other 
		
							
				
				
				$totmale0to3 = $SCmale0to3 + $STmale0to3 + $OBCmale0to3 + $OTRmale0to3;
				$totfemale0to3 = $SCfemale0to3 + $STfemale0to3 + $OBCfemale0to3 + $OTRfemale0to3;
				$tot0t03=$totmale0to3 + $totfemale0to3;
				$totmale3to6 = $SCmale3to6 + $STmale3to6 + $OBCmale3to6 + $OTRmale3to6;
				$totfemale3to6 = $SCfemale3to6 + $STfemale3to6 + $OBCfemale3to6 + $OTRfemale3to6;
				$tot3t06=$totmale3to6 + $totfemale3to6;
				$totmale6to14 = $SCmale6to14 + $STmale6to14 + $OBCmale6to14 + $OTRmale6to14;
				$totfemale6to14 = $SCfemale6to14 + $STfemale6to14 + $OBCfemale6to14 + $OTRfemale6to14;
				$tot6t014=$totmale6to14 + $totfemale6to14;
				
				$totmale14to18 = $SCmale14to18 + $STmale14to18 + $OBCmale14to18 + $OTRmale14to18;
				$totfemale14to18 = $SCfemale14to18 + $STfemale14to18 + $OBCfemale14to18 + $OTRfemale14to18;
				$tot14t018=$totmale14to18 + $totfemale14to18;
				
				$totmale= $SCtotmale + $STtotmale + $OBCtotmale + $OTRtotmale;
				$totfemale= $SCtotfemale + $STtotfemale + $OBCtotfemale + $OTRtotfemale;
				$tot= $totmale + $totfemale;
		
		
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
				<td colspan="4" align="center"><b>Report Title:Caste-Wise Childrens Population (General Age Break up)</b></td>
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
				<td></td>
				<td align="center" colspan="3">SC Childrens Population</td> 
				<td  align="center" colspan="3">ST Childrens Population</td>
				<td  align="center" colspan="3">OBC Childrens Population</td> 
				<td  align="center" colspan="3">Other Childrens Population</td> 
				<td  align="center" colspan="3">Total</td>
			</tr>
			<tr>
			<td>Childrens Age</td>
			<td align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
		</tr>
			
	
				
			<tr>	
				<td>0-3 yrs</td> 
				<td  align="center">'.$SCmale0to3.'</td> 
				<td  align="center">'.$SCfemale0to3.'</td> 
				<td  align="center">'.$SCtotal0to3.'</td> 
				<td  align="center">'.$STmale0to3.'</td> 
				<td  align="center">'.$STfemale0to3.'</td> 
				<td  align="center">'.$STtotal0to3.'</td> 
				<td  align="center">'.$OBCmale0to3.'</td> 
				<td  align="center">'.$OBCfemale0to3.'</td> 
				<td  align="center">'.$OBCtotal0to3.'</td>
				<td  align="center">'.$OTRmale0to3.'</td> 
				<td  align="center">'.$OTRfemale0to3.'</td> 
				<td  align="center">'.$OTRtotal0to3.'</td>   
		
				<td  align="center">'.$totmale0to3.'</td> 
				<td  align="center">'.$totfemale0to3.'</td> 
				<td  align="center">'.$tot0t03.'</td>   
			</tr>
			
	
			
			
			<tr>
				<td>3-6yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td> 


				<td align="center">'.$totmale3to6.'</td> 
				<td align="center">'.$totfemale3to6.'</td> 
				<td align="center">'.$tot3t06.'</td> 				
			</tr>
			
					
		
			
			<tr>
				<td>6-14 yrs</td> 
				<td align="center">'.$SCmale6to14.'</td> 
				<td align="center">'.$SCfemale6to14.'</td> 
				<td align="center">'.$SCtotal6to14.'</td> 
				<td align="center">'.$STmale6to14.'</td> 
				<td align="center">'.$STfemale6to14.'</td> 
				<td align="center">'.$STtotal6to14.'</td> 
				<td align="center">'.$OBCmale6to14.'</td> 
				<td align="center">'.$OBCfemale6to14.'</td> 
				<td align="center">'.$OBCtotal6to14.'</td>
				<td align="center">'.$OTRmale6to14.'</td> 
				<td align="center">'.$OTRfemale6to14.'</td> 
				<td align="center">'.$OTRtotal6to14.'</td>   
				
				
				<td align="center">'.$totmale6to14.'</td> 
				<td align="center">'.$totfemale6to14.'</td> 
				<td align="center">'.$tot6t014.'</td> 
			</tr>
			<tr>
				<td>14-18 yrs</td> 
				<td align="center">'.$SCmale14to18.'</td> 
				<td align="center">'.$SCfemale14to18.'</td> 
				<td align="center">'.$SCtotal4to18.'</td> 
				<td align="center">'.$STmale14to18.'</td> 
				<td align="center">'.$STfemale14to18.'</td> 
				<td align="center">'.$STtotal14to18.'</td> 
				<td align="center">'.$OBCmale14to18.'</td> 
				<td align="center">'.$OBCfemale14to18.'</td> 
				<td align="center">'.$OBCtotal14to18.'</td>
				<td align="center">'.$OTRmale14to18.'</td> 
				<td align="center">'.$OTRfemale14to18.'</td> 
				<td align="center">'.$OTRtotal14to18.'</td>  
				
				<td align="center">'.$OTRmale14to18.'</td> 
				<td align="center">'.$OTRfemale14to18.'</td> 
				<td align="center">'.$OTRtotal14to18.'</td>  
			</tr>
			<tr>
				<td>Total Childrens Population</td> 
				<td align="center">'.$SCtotmale.'</td> 
				<td align="center">'.$SCtotfemale.'</td> 
				<td align="center">'.$SCtotall.'</td> 
				<td align="center">'.$STtotmale.'</td> 
				<td align="center">'.$STtotfemale.'</td> 
				<td align="center">'.$STtotall.'</td> 
				<td align="center">'.$OBCtotmale.'</td> 
				<td align="center">'.$OBCtotfemale.'</td> 
				<td align="center">'.$OBCtotall.'</td>
				<td align="center">'.$OTRtotmale.'</td> 
				<td align="center">'.$OTRtotfemale.'</td> 
				<td align="center">'.$OTRtotall.'</td>				
				<td align="center">'.$totmale.'</td> 
				<td align="center">'.$totfemale.'</td> 
				<td align="center">'.$tot.'</td>  				
			</tr>
			<tr>
			<td align="left" colspan="16"><u>Note:</u> <span style="color:red"> These values present in the PDF are on the basis of  live data </span></td>
		</tr>
		</table>';		
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	

	
	
	function childgeneral_castewise_yearlyreport_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//Children's Population SC
		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain = $this->db->query($sql);
		$SCmale0to3 = $querymain->row(0)->SCmale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain1 = $this->db->query($sql1);
		$SCfemale0to3 = $querymain1->row(0)->SCfemale0to3;
		$SCtotal0to3 = $SCmale0to3 + $SCfemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS SCmale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  caste='SC'
		AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 3 AND 6 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain2 = $this->db->query($sql2);
		$SCmale3to6 = $querymain2->row(0)->SCmale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain3 = $this->db->query($sql3);
		$SCfemale3to6 = $querymain3->row(0)->SCfemale3to6;
		$SCtotal3to6 = $SCmale3to6 + $SCfemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain4 = $this->db->query($sql4);
		$SCmale6to14 = $querymain4->row(0)->SCmale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain5 = $this->db->query($sql5);
		$SCfemale6to14 = $querymain5->row(0)->SCfemale6to14;
		$SCtotal6to14 = $SCmale6to14 + $SCfemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain6 = $this->db->query($sql6);
		$SCmale14to18 = $querymain6->row(0)->SCmale14to18;
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain7 = $this->db->query($sql7);
		$SCfemale14to18 = $querymain7->row(0)->SCfemale14to18;
		$SCtotal4to18 = $SCmale14to18 + $SCfemale14to18;
		
		$SCtotmale =  $SCmale0to3 + $SCmale3to6 + $SCmale6to14 + $SCmale14to18;
		$SCtotfemale = $SCfemale0to3 + $SCfemale3to6 + $SCfemale6to14 + $SCfemale14to18;
		$SCtotall = $SCtotal0to3 + $SCtotal3to6 + $SCtotal6to14 + $SCtotal4to18;
		
		//End of Children's Population SC  
		
		//Children's Population ST  
		
		$sql_STmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_STmale0to3 = $this->db->query($sql_STmale0to3);
		$STmale0to3 = $query_STmale0to3->row(0)->STmale0to3;
		
		$sql_STfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querySTfemale0to3 = $this->db->query($sql_STfemale0to3);
		$STfemale0to3 = $querySTfemale0to3->row(0)->STfemale0to3;
		$STtotal0to3 = $STmale0to3 + $STfemale0to3;
		
		$sql_STmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querySTmale3to6 = $this->db->query($sql_STmale3to6);
		$STmale3to6 = $querySTmale3to6->row(0)->STmale3to6;
		
		$sql_STfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTfemale3to6 = $this->db->query($sql_STfemale3to6);
		$STfemale3to6 = $querySTfemale3to6->row(0)->STfemale3to6;
		$STtotal3to6 = $STmale3to6 + $STfemale3to6;
		
		$sql_STmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTmale6to14 = $this->db->query($sql_STmale6to14);
		$STmale6to14 = $querySTmale6to14->row(0)->STmale6to14;
		
		$sql_STfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTfemale6to14 = $this->db->query($sql_STfemale6to14);
		$STfemale6to14 = $querySTfemale6to14->row(0)->STfemale6to14;
		$STtotal6to14 = $STmale6to14 + $STfemale6to14;
		
		    
		$sql_STmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTmale14to18 = $this->db->query($sql_STmale14to18);
		$STmale14to18 = $querySTmale14to18->row(0)->STmale14to18;
		
		$sql_STfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querySTfemale0to3 = $this->db->query($sql_STfemale0to3);
		$STfemale14to18 = $querySTfemale0to3->row(0)->STfemale14to18;
		$STtotal14to18 = $STmale14to18 + $STfemale14to18;
		
		$STtotmale =  $STmale0to3 + $STmale3to6 + $STmale6to14 + $STmale14to18;
		$STtotfemale = $STfemale0to3 + $STfemale3to6 + $STfemale6to14 + $STfemale14to18;
		$STtotall = $STtotal0to3 + $STtotal3to6 + $STtotal6to14 + $STtotal14to18;
		
		
		// End of Children's Population ST  
		
		// Children's Population OBC  
		
		$sql_OBCmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_OBCmale0to3 = $this->db->query($sql_OBCmale0to3);
		$OBCmale0to3 = $query_OBCmale0to3->row(0)->OBCmale0to3;
		
		$sql_OBCfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale0to3 = $this->db->query($sql_OBCfemale0to3);
		$OBCfemale0to3 = $queryOBCfemale0to3->row(0)->OBCfemale0to3;
		$OBCtotal0to3 = $OBCmale0to3 + $OBCfemale0to3;
		
		$sql_OBCmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCmale3to6 = $this->db->query($sql_OBCmale3to6);
		$OBCmale3to6 = $queryOBCmale3to6->row(0)->OBCmale3to6;
		
		$sql_OBCfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale3to6 = $this->db->query($sql_OBCfemale3to6);
		$OBCfemale3to6 = $queryOBCfemale3to6->row(0)->OBCfemale3to6;
		$OBCtotal3to6 = $OBCmale3to6 + $OBCfemale3to6;
		
		$sql_OBCmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCmale6to14 = $this->db->query($sql_OBCmale6to14);
		$OBCmale6to14 = $queryOBCmale6to14->row(0)->OBCmale6to14;
		
		$sql_OBCfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale6to14 = $this->db->query($sql_OBCfemale6to14);
		$OBCfemale6to14 = $queryOBCfemale6to14->row(0)->OBCfemale6to14;
		$OBCtotal6to14 = $OBCmale6to14 + $OBCfemale6to14;
		
		    
		$sql_OBCmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCmale14to18 = $this->db->query($sql_OBCmale14to18);
		$OBCmale14to18 = $queryOBCmale14to18->row(0)->OBCmale14to18;
		
		$sql_OBCfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOBCfemale14to18 = $this->db->query($sql_OBCfemale14to18);
		$OBCfemale14to18 = $queryOBCfemale14to18->row(0)->OBCfemale14to18;
		$OBCtotal14to18 = $OBCmale14to18 + $OBCfemale14to18;
		
		$OBCtotmale =  $OBCmale0to3 + $OBCmale3to6 + $OBCmale6to14 + $OBCmale14to18;
		$OBCtotfemale = $OBCfemale0to3 + $OBCfemale3to6 + $OBCfemale6to14 + $OBCfemale14to18;
		$OBCtotall = $OBCtotal0to3 + $OBCtotal3to6 + $OBCtotal6to14 + $OBCtotal14to18;
		
		// End of Children's Population OBC  
		
		
		// Children's Population Other 
		
		$sql_OTRmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$query_OTRmale0to3 = $this->db->query($sql_OTRmale0to3);
		$OTRmale0to3 = $query_OTRmale0to3->row(0)->OTRmale0to3;
		
		$sql_OTRfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale0to3);
		$OTRfemale0to3 = $queryOTRfemale0to3->row(0)->OTRfemale0to3;
		$OTRtotal0to3 = $OTRmale0to3 + $OTRfemale0to3;
		
		$sql_OTRmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale3to6 = $this->db->query($sql_OTRmale3to6);
		$OTRmale3to6 = $queryOTRmale3to6->row(0)->OTRmale3to6;
		
		$sql_OTRfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale3to6 = $this->db->query($sql_OTRfemale3to6);
		$OTRfemale3to6 = $queryOTRfemale3to6->row(0)->OTRfemale3to6;
		$OTRtotal3to6 = $OTRmale3to6 + $OTRfemale3to6;
		
		$sql_OTRmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale6to14 = $this->db->query($sql_OTRmale6to14);
		$OTRmale6to14 = $queryOTRmale6to14->row(0)->OTRmale6to14;
		
		$sql_OTRfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale6to14 = $this->db->query($sql_OTRfemale6to14);
		$OTRfemale6to14 = $queryOTRfemale6to14->row(0)->OTRfemale6to14;
		$OTRtotal6to14 = $OTRmale6to14 + $OTRfemale6to14;
		
		    
		$sql_OTRmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale14to18 = $this->db->query($sql_OTRmale14to18);
		$OTRmale14to18 = $queryOTRmale14to18->row(0)->OTRmale14to18;
		
		$sql_OTRfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and caste='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale14to18);
		$OTRfemale14to18 = $queryOTRfemale0to3->row(0)->OTRfemale14to18;
		$OTRtotal14to18 = $OTRmale14to18 + $OTRfemale14to18;
		
		$OTRtotmale =  $OTRmale0to3 + $OTRmale3to6 + $OTRmale6to14 + $OTRmale14to18;
		$OTRtotfemale = $OTRfemale0to3 + $OTRfemale3to6 + $OTRfemale6to14 + $OTRfemale14to18;
		$OTRtotall = $OTRtotal0to3 + $OTRtotal3to6 + $OTRtotal6to14 + $OTRtotal14to18;
		
		// End of Children's Population Other 
		
		
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
		<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="2" align="center"><b>Report Title:Caste-Wise Childrens Population (General Age Break up)</b></td>
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="2" align="center" cellpadding="5" border="1px">
			
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
		<table width="100%" cellspacing="0" align="center" cellpadding="5" border="1px">
			<tr>
				<td colspan="2" align="center"><b>Caste- Wise Childrens Population (General Age Breakup)</b></td>
			</tr>
		</table>';
		$html .= '
		<table width="100%" cellspacing="0" align="center" cellpadding="5" border="1px">	
		<tr>
		
		<td>Castes</td>
			</tr>
		</table>';		
		$html .= '
		<table width="100%" cellspacing="0" align="center" cellpadding="5" border="1px">
			<tr>
				<td style="width:10%;"></td>
				<td style="width:22.5%;" align="center" colspan=3>SC Childrens Population</td> 
				<td style="width:22.5%;" align="center" colspan=3>ST Childrens Population</td>
				<td style="width:22.5%;" align="center" colspan=3>OBC Childrens Population</td> 
				<td style="width:22.5%;" align="center" colspan=3>Other Childrens Population</td> 
			</tr>
		</table>';

	$html .= '
		<table width="100%" cellspacing="0" align="center" cellpadding="5" border="1px">	
			<tr>
			<td style="width:10%;">Childrens Age</td>
			<td style="width:7.5%;" align="center">Male</td>
			<td style="width:7.5%;" align="center">Female</td>
			<td style="width:7.5%;" align="center">Total</td>
			<td style="width:7.5%;" align="center">Male</td>
			<td style="width:7.5%;" align="center">Female</td>
			<td style="width:7.5%;" align="center">Total</td>
			<td style="width:7.5%;" align="center">Male</td>
			<td style="width:7.5%;" align="center">Female</td>
			<td style="width:7.5%;" align="center">Total</td>
			<td style="width:7.5%;" align="center">Male</td>
			<td style="width:7.5%;" align="center">Female</td>
			<td style="width:7.5%;" align="center">Total</td>
		</tr>
	</table>';
	$html .= '
		<table width="100%" cellspacing="0" align="center" cellpadding="5" border="1px">
			<tr>
				<td style="width:10%;">0-1 yrs</td> 
				<td style="width:7.5%;" align="center">'.$SCmale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$SCfemale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$SCtotal0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$STmale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$STfemale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$STtotal0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$OBCmale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$OBCfemale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$OBCtotal0to3.'</td>
				<td style="width:7.5%;" align="center">'.$OTRmale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$OTRfemale0to3.'</td> 
				<td style="width:7.5%;" align="center">'.$OTRtotal0to3.'</td>   
			</tr>
			<tr>
				<td>1-2yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>2-3yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>3-4yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>4-5 yrs</td> 
				<td align="center">'.$SCmale6to14.'</td> 
				<td align="center">'.$SCfemale6to14.'</td> 
				<td align="center">'.$SCtotal6to14.'</td> 
				<td align="center">'.$STmale6to14.'</td> 
				<td align="center">'.$STfemale6to14.'</td> 
				<td align="center">'.$STtotal6to14.'</td> 
				<td align="center">'.$OBCmale6to14.'</td> 
				<td align="center">'.$OBCfemale6to14.'</td> 
				<td align="center">'.$OBCtotal6to14.'</td>
				<td align="center">'.$OTRmale6to14.'</td> 
				<td align="center">'.$OTRfemale6to14.'</td> 
				<td align="center">'.$OTRtotal6to14.'</td>   
			</tr>
			<tr>
				<td>5-6 yrs</td> 
				<td align="center">'.$SCmale14to18.'</td> 
				<td align="center">'.$SCfemale14to18.'</td> 
				<td align="center">'.$SCtotal4to18.'</td> 
				<td align="center">'.$STmale14to18.'</td> 
				<td align="center">'.$STfemale14to18.'</td> 
				<td align="center">'.$STtotal14to18.'</td> 
				<td align="center">'.$OBCmale14to18.'</td> 
				<td align="center">'.$OBCfemale14to18.'</td> 
				<td align="center">'.$OBCtotal14to18.'</td>
				<td align="center">'.$OTRmale14to18.'</td> 
				<td align="center">'.$OTRfemale14to18.'</td> 
				<td align="center">'.$OTRtotal14to18.'</td>  
			</tr>
			<tr>
				<td>6-7yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>7-8yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>8-9yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>9-10yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>10-11yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>11-12yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>12-13yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>13-14yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>14-15yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>15-16yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>16-17yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>17-18yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td align="left"><b>Total Childrens Population</b></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
				<td><span style="color:red"></span></td>
			</tr>
		</table>';
		
	$html .= '	
	<table width="100%" cellspacing="0" align="left" cellpadding="5" border="1px">
		<tr>
			<th><u>Note:</u> <span style="color:red"> These values present in the PDF are on the basis of  live data </span></th>
		</tr>
	</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	
	

	
	function orphanreportgeneratemodel($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Omale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain = $this->db->query($sql);
		$Omale0to3 = $querymain->row(0)->Omale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain1 = $this->db->query($sql1);
		$Ofemale0to3 = $querymain1->row(0)->Ofemale0to3;
		$Ototal0to3 = $Omale0to3 + $Ofemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Omale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  child_orphan=  'yes'
			AND (
			YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )
			)
			BETWEEN 3 
			AND 6 
			AND gender =1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain2 = $this->db->query($sql2);
		$Omale3to6 = $querymain2->row(0)->Omale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain3 = $this->db->query($sql3);
		$Ofemale3to6 = $querymain3->row(0)->Ofemale3to6;
		$Ototal3to6 = $Omale3to6 + $Ofemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Omale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain4 = $this->db->query($sql4);
		$Omale6to14 = $querymain4->row(0)->Omale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain5 = $this->db->query($sql5);
		$Ofemale6to14 = $querymain5->row(0)->Ofemale6to14;
		$Ototal6to14 = $Omale6to14 + $Ofemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Omale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain6 = $this->db->query($sql6);
		$Omale14to18 = $querymain6->row(0)->Omale14to18;
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain7 = $this->db->query($sql7);
		$Ofemale14to18 = $querymain7->row(0)->Ofemale14to18;
		$Ototal4to18 = $Omale14to18 + $Ofemale14to18;
		
		$Ototmale =  $Omale0to3 + $Omale3to6 + $Omale6to14 + $Omale14to18;
		$Ototfemale = $Ofemale0to3 + $Ofemale3to6 + $Ofemale6to14 + $Ofemale14to18;
		$Ototall = $Ototal0to3 + $Ototal3to6 + $Ototal6to14 + $Ototal4to18;
		
		//Children's Population without Mother  *CPM=Children's Population without Mother
		
		$sql_without_mother_CPMmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_CPMmale0to3 = $this->db->query($sql_without_mother_CPMmale0to3);
		$CPMmale0to3 = $query_CPMmale0to3->row(0)->CPMmale0to3;
		
		$sql_without_mother_CPMfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$queryCPMfemale0to3 = $this->db->query($sql_without_mother_CPMfemale0to3);
		$CPMfemale0to3 = $queryCPMfemale0to3->row(0)->CPMfemale0to3;
		$CPMtotal0to3 = $CPMmale0to3 + $CPMfemale0to3;
		
		$sql_without_mother_CPMmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$queryCPMmale3to6 = $this->db->query($sql_without_mother_CPMmale3to6);
		$CPMmale3to6 = $queryCPMmale3to6->row(0)->CPMmale3to6;
		
		$sql_without_mother_CPMfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPMfemale3to6 = $this->db->query($sql_without_mother_CPMfemale3to6);
		$CPMfemale3to6 = $queryCPMfemale3to6->row(0)->CPMfemale3to6;
		$CPMtotal3to6 = $CPMmale3to6 + $CPMfemale3to6;
		
		$sql_without_mother_CPMmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPMmale6to14 = $this->db->query($sql_without_mother_CPMmale6to14);
		$CPMmale6to14 = $queryCPMmale6to14->row(0)->CPMmale6to14;
		
		$sql_without_mother_CPMfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPMfemale6to14 = $this->db->query($sql_without_mother_CPMfemale6to14);
		$CPMfemale6to14 = $queryCPMfemale6to14->row(0)->CPMfemale6to14;
		$CPMtotal6to14 = $CPMmale6to14 + $CPMfemale6to14;
		
		    
		$sql_without_mother_CPMmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPMmale14to18 = $this->db->query($sql_without_mother_CPMmale14to18);
		$CPMmale14to18 = $queryCPMmale14to18->row(0)->CPMmale14to18;
		
		$sql_without_mother_CPMfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPMfemale0to3 = $this->db->query($sql_without_mother_CPMfemale0to3);
		$CPMfemale14to18 = $queryCPMfemale0to3->row(0)->CPMfemale14to18;
		$CPMtotal14to18 = $CPMmale14to18 + $CPMfemale14to18;
		
		$CPMtotmale =  $CPMmale0to3 + $CPMmale3to6 + $CPMmale6to14 + $CPMmale14to18;
		$CPMtotfemale = $CPMfemale0to3 + $CPMfemale3to6 + $CPMfemale6to14 + $CPMfemale14to18;
		$CPMtotall = $CPMtotal0to3 + $CPMtotal3to6 + $CPMtotal6to14 + $CPMtotal14to18;
		
		
		// End of Children's Population without Mother
		
		//Children's Population without Father *CPF=Children's Population without Father
		
		$sql_without_father_CPFmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_CPFmale0to3 = $this->db->query($sql_without_father_CPFmale0to3);
		$CPFmale0to3 = $query_CPFmale0to3->row(0)->CPFmale0to3;
		
		$sql_without_father_CPFfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFfemale0to3 = $this->db->query($sql_without_father_CPFfemale0to3);
		$CPFfemale0to3 = $queryCPFfemale0to3->row(0)->CPFfemale0to3;
		$CPFtotal0to3 = $CPFmale0to3 + $CPFfemale0to3;
		
		$sql_without_father_CPFmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFmale3to6 = $this->db->query($sql_without_father_CPFmale3to6);
		$CPFmale3to6 = $queryCPFmale3to6->row(0)->CPFmale3to6;
		
		$sql_without_father_CPFfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFfemale3to6 = $this->db->query($sql_without_father_CPFfemale3to6);
		$CPFfemale3to6 = $queryCPFfemale3to6->row(0)->CPFfemale3to6;
		$CPFtotal3to6 = $CPFmale3to6 + $CPFfemale3to6;
		
		$sql_without_father_CPFmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFmale6to14 = $this->db->query($sql_without_father_CPFmale6to14);
		$CPFmale6to14 = $queryCPFmale6to14->row(0)->CPFmale6to14;
		
		$sql_without_father_CPFfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFfemale6to14 = $this->db->query($sql_without_father_CPFfemale6to14);
		$CPFfemale6to14 = $queryCPFfemale6to14->row(0)->CPFfemale6to14;
		$CPFtotal6to14 = $CPFmale6to14 + $CPFfemale6to14;
		
		    
		$sql_without_father_CPFmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFmale14to18 = $this->db->query($sql_without_father_CPFmale14to18);
		$CPFmale14to18 = $queryCPFmale14to18->row(0)->CPFmale14to18;
		
		$sql_without_father_CPFfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPFfemale14to18 = $this->db->query($sql_without_father_CPFfemale14to18);
		$CPFfemale14to18 = $queryCPFfemale14to18->row(0)->CPFfemale14to18;
		$CPFtotal14to18 = $CPFmale14to18 + $CPFfemale14to18;
		
		$CPFtotmale =  $CPFmale0to3 + $CPFmale3to6 + $CPFmale6to14 + $CPFmale14to18;
		$CPFtotfemale = $CPFfemale0to3 + $CPFfemale3to6 + $CPFfemale6to14 + $CPFfemale14to18;
		$CPFtotall = $CPFtotal0to3 + $CPFtotal3to6 + $CPFtotal6to14 + $CPFtotal14to18;
		
		// End of Children's Population without Father
		
		
			//Children's Population without Parents *CPP=Children's Population without Parents
		
		$sql_without_parents_CPPmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$query_CPPmale0to3 = $this->db->query($sql_without_parents_CPPmale0to3);
		$CPPmale0to3 = $query_CPPmale0to3->row(0)->CPPmale0to3;
		
		$sql_without_parents_CPPfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPfemale0to3 = $this->db->query($sql_without_parents_CPPfemale0to3);
		$CPPfemale0to3 = $queryCPPfemale0to3->row(0)->CPPfemale0to3;
		$CPPtotal0to3 = $CPPmale0to3 + $CPPfemale0to3;
		
		$sql_without_parents_CPPmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPmale3to6 = $this->db->query($sql_without_parents_CPPmale3to6);
		$CPPmale3to6 = $queryCPPmale3to6->row(0)->CPPmale3to6;
		
		$sql_without_parents_CPPfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPfemale3to6 = $this->db->query($sql_without_parents_CPPfemale3to6);
		$CPPfemale3to6 = $queryCPPfemale3to6->row(0)->CPPfemale3to6;
		$CPPtotal3to6 = $CPPmale3to6 + $CPPfemale3to6;
		
		$sql_without_parents_CPPmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPmale6to14 = $this->db->query($sql_without_parents_CPPmale6to14);
		$CPPmale6to14 = $queryCPPmale6to14->row(0)->CPPmale6to14;
		
		$sql_without_parents_CPPfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPfemale6to14 = $this->db->query($sql_without_parents_CPPfemale6to14);
		$CPPfemale6to14 = $queryCPPfemale6to14->row(0)->CPPfemale6to14;
		$CPPtotal6to14 = $CPPmale6to14 + $CPPfemale6to14;
		
		    
		$sql_without_parents_CPPmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPmale14to18 = $this->db->query($sql_without_parents_CPPmale14to18);
		$CPPmale14to18 = $queryCPPmale14to18->row(0)->CPPmale14to18;
		
		$sql_without_parents_CPPfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and `child_orphan_yes`='No Parents' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryCPPfemale0to3 = $this->db->query($sql_without_parents_CPPfemale14to18);
		$CPPfemale14to18 = $queryCPPfemale0to3->row(0)->CPPfemale14to18;
		$CPPtotal14to18 = $CPPmale14to18 + $CPPfemale14to18;
		
		$CPPtotmale =  $CPPmale0to3 + $CPPmale3to6 + $CPPmale6to14 + $CPPmale14to18;
		$CPPtotfemale = $CPPfemale0to3 + $CPPfemale3to6 + $CPPfemale6to14 + $CPPfemale14to18;
		$CPPtotall = $CPPtotal0to3 + $CPPtotal3to6 + $CPPtotal6to14 + $CPPtotal14to18;
		
		// End of Children's Population without Parents
		
		
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
				<td colspan="4" align="center"><b>Report Title:Orphan and Semi-Orphan Child Population (General Age Break up)</b></td>
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
				<td colspan="4" align="center"><b>Orphan/ Semi-OrphanChild Population (General Age Breakup)</b></td>
			</tr>
			<tr>
				<td style="width:10%;"></td>
				<td style="width:30%;" align="center" colspan=3>Child Population without Mother</td>
				<td style="width:30%;" align="center" colspan=3>Child Population without Father</td> 
				<td style="width:30%;" align="center" colspan=3>Child Population without both</td> 
			</tr>
			<tr>
			<td style="width:10%;"> Age Group</td>
			<td style="width:9.8%;" align="center">Male</td>
			<td style="width:9.6%;" align="center">Female</td>
			<td style="width:9.8%;" align="center">Total</td>
			<td style="width:9.8%;" align="center">Male</td>
			<td style="width:9.6%;" align="center">Female</td>
			<td style="width:9.5%;" align="center">Total</td>
			<td style="width:9.8%;" align="center">Male</td>
			<td style="width:9.6%;" align="center">Female</td>
			<td style="width:9.5%;" align="center">Total</td>
		</tr>
			
			<tr>
			
				<td style="width:10%;">0-3 yrs</td> 
				<td style="width:9.8%;" align="center">'.$CPMmale0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPMfemale0to3.'</td> 
				<td style="width:9.8%;" align="center">'.$CPMtotal0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPFmale0to3.'</td> 
				<td style="width:9.8%;" align="center">'.$CPFfemale0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPFtotal0to3.'</td>
				<td style="width:9.8%;" align="center">'.$CPPmale0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPPfemale0to3.'</td> 
				<td style="width:9.5%;" align="center">'.$CPPtotal0to3.'</td>   
			</tr>
			<tr>
				<td>3-6yrs</td> 
				<td align="center">'.$CPMmale3to6.'</td> 
				<td align="center">'.$CPMfemale3to6.'</td> 
				<td align="center">'.$CPMtotal3to6.'</td> 
				<td align="center">'.$CPFmale3to6.'</td> 
				<td align="center">'.$CPFfemale3to6.'</td> 
				<td align="center">'.$CPFtotal3to6.'</td>
				<td align="center">'.$CPPmale3to6.'</td> 
				<td align="center">'.$CPPfemale3to6.'</td> 
				<td align="center">'.$CPPtotal3to6.'</td>   
			</tr>
			<tr>
				<td>6-14 yrs</td> 
				<td align="center">'.$CPMmale6to14.'</td> 
				<td align="center">'.$CPMfemale6to14.'</td> 
				<td align="center">'.$CPMtotal6to14.'</td> 
				<td align="center">'.$CPFmale6to14.'</td> 
				<td align="center">'.$CPFfemale6to14.'</td> 
				<td align="center">'.$CPFtotal6to14.'</td>
				<td align="center">'.$CPPmale6to14.'</td> 
				<td align="center">'.$CPPfemale6to14.'</td> 
				<td align="center">'.$CPPtotal6to14.'</td>   
			</tr>
			<tr>
				<td>14-18 yrs</td> 
				<td align="center">'.$CPMmale14to18.'</td> 
				<td align="center">'.$CPMfemale14to18.'</td> 
				<td align="center">'.$CPMtotal14to18.'</td> 
				<td align="center">'.$CPFmale14to18.'</td> 
				<td align="center">'.$CPFfemale14to18.'</td> 
				<td align="center">'.$CPFtotal14to18.'</td>
				<td align="center">'.$CPPmale14to18.'</td> 
				<td align="center">'.$CPPfemale14to18.'</td> 
				<td align="center">'.$CPPtotal14to18.'</td>  
			</tr>
			<tr>
				<td>Total</td> 
				<td align="center">'.$CPMtotmale.'</td> 
				<td align="center">'.$CPMtotfemale.'</td> 
				<td align="center">'.$CPMtotall.'</td> 
				<td align="center">'.$CPFtotmale.'</td> 
				<td align="center">'.$CPFtotfemale.'</td> 
				<td align="center">'.$CPFtotall.'</td>
				<td align="center">'.$CPPtotmale.'</td> 
				<td align="center">'.$CPPtotfemale.'</td> 
				<td align="center">'.$CPPtotall.'</td> 
			</tr>
			<tr>
				<td colspan="10" align="left"> <u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of  live data </span></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}		

function religionreportgeneratemodel($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//Children's Population Hindu

		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindumale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$querymain = $this->db->query($sql);
		$Hindumale0to3 = $querymain->row(0)->Hindumale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain1 = $this->db->query($sql1);
		$Hindufemale0to3 = $querymain1->row(0)->Hindufemale0to3;
		$Hindutotal0to3 = $Hindumale0to3 + $Hindufemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Hindumale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  religion='Hindu'
		AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 3 AND 6 AND gender =1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain2 = $this->db->query($sql2);
		$Hindumale3to6 = $querymain2->row(0)->Hindumale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain3 = $this->db->query($sql3);
		$Hindufemale3to6 = $querymain3->row(0)->Hindufemale3to6;
		$Hindutotal3to6 = $Hindumale3to6 + $Hindufemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindumale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain4 = $this->db->query($sql4);
		$Hindumale6to14 = $querymain4->row(0)->Hindumale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain5 = $this->db->query($sql5);
		$Hindufemale6to14 = $querymain5->row(0)->Hindufemale6to14;
		$Hindutotal6to14 = $Hindumale6to14 + $Hindufemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindumale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain6 = $this->db->query($sql6);
		$Hindumale14to18 = $querymain6->row(0)->Hindumale14to18;
		
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$querymain7 = $this->db->query($sql7);
		$Hindufemale14to18 = $querymain7->row(0)->Hindufemale14to18;
		$Hindutotal4to18 = $Hindumale14to18 + $Hindufemale14to18;
		
		$Hindutotmale =  $Hindumale0to3 + $Hindumale3to6 + $Hindumale6to14 + $Hindumale14to18;
		$Hindutotfemale = $Hindufemale0to3 + $Hindufemale3to6 + $Hindufemale6to14 + $Hindufemale14to18;
		$Hindutotall = $Hindutotal0to3 + $Hindutotal3to6 + $Hindutotal6to14 + $Hindutotal4to18;
		
		//End of Children's Population Hindu  
		
		//Children's Population Muslim  
		
		$sql_Muslimmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_Muslimmale0to3 = $this->db->query($sql_Muslimmale0to3);
		$Muslimmale0to3 = $query_Muslimmale0to3->row(0)->Muslimmale0to3;
		
		$sql_Muslimfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$queryMuslimfemale0to3 = $this->db->query($sql_Muslimfemale0to3);
		$Muslimfemale0to3 = $queryMuslimfemale0to3->row(0)->Muslimfemale0to3;
		$Muslimtotal0to3 = $Muslimmale0to3 + $Muslimfemale0to3;
		
		$sql_Muslimmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$queryMuslimmale3to6 = $this->db->query($sql_Muslimmale3to6);
		$Muslimmale3to6 = $queryMuslimmale3to6->row(0)->Muslimmale3to6;
		
		$sql_Muslimfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryMuslimfemale3to6 = $this->db->query($sql_Muslimfemale3to6);
		$Muslimfemale3to6 = $queryMuslimfemale3to6->row(0)->Muslimfemale3to6;
		$Muslimtotal3to6 = $Muslimmale3to6 + $Muslimfemale3to6;
		
		$sql_Muslimmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryMuslimmale6to14 = $this->db->query($sql_Muslimmale6to14);
		$Muslimmale6to14 = $queryMuslimmale6to14->row(0)->Muslimmale6to14;
		
		$sql_Muslimfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryMuslimfemale6to14 = $this->db->query($sql_Muslimfemale6to14);
		$Muslimfemale6to14 = $queryMuslimfemale6to14->row(0)->Muslimfemale6to14;
		$Muslimtotal6to14 = $Muslimmale6to14 + $Muslimfemale6to14;
		
		    
		$sql_Muslimmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryMuslimmale14to18 = $this->db->query($sql_Muslimmale14to18);
		$Muslimmale14to18 = $queryMuslimmale14to18->row(0)->Muslimmale14to18;
		
		$sql_Muslimfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryMuslimfemale0to3 = $this->db->query($sql_Muslimfemale0to3);
		$Muslimfemale14to18 = $queryMuslimfemale0to3->row(0)->Muslimfemale14to18;
		$Muslimtotal14to18 = $Muslimmale14to18 + $Muslimfemale14to18;
		
		$Muslimtotmale =  $Muslimmale0to3 + $Muslimmale3to6 + $Muslimmale6to14 + $Muslimmale14to18;
		$Muslimtotfemale = $Muslimfemale0to3 + $Muslimfemale3to6 + $Muslimfemale6to14 + $Muslimfemale14to18;
		$Muslimtotall = $Muslimtotal0to3 + $Muslimtotal3to6 + $Muslimtotal6to14 + $Muslimtotal14to18;
		
		
		// End of Children's Population Muslim  
		
		// Children's Population Christian   
		
		$sql_Christianmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 and household_entry.entry_village_name='".$ddlvillage."' ;";
		$query_Christianmale0to3 = $this->db->query($sql_Christianmale0to3);
		$Christianmale0to3 = $query_Christianmale0to3->row(0)->Christianmale0to3;
		
		$sql_Christianfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianfemale0to3 = $this->db->query($sql_Christianfemale0to3);
		$Christianfemale0to3 = $queryChristianfemale0to3->row(0)->Christianfemale0to3;
		$Christiantotal0to3 = $Christianmale0to3 + $Christianfemale0to3;
		
		$sql_Christianmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianmale3to6 = $this->db->query($sql_Christianmale3to6);
		$Christianmale3to6 = $queryChristianmale3to6->row(0)->Christianmale3to6;
		
		$sql_Christianfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianfemale3to6 = $this->db->query($sql_Christianfemale3to6);
		$Christianfemale3to6 = $queryChristianfemale3to6->row(0)->Christianfemale3to6;
		$Christiantotal3to6 = $Christianmale3to6 + $Christianfemale3to6;
		
		$sql_Christianmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianmale6to14 = $this->db->query($sql_Christianmale6to14);
		$Christianmale6to14 = $queryChristianmale6to14->row(0)->Christianmale6to14;
		
		$sql_Christianfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianfemale6to14 = $this->db->query($sql_Christianfemale6to14);
		$Christianfemale6to14 = $queryChristianfemale6to14->row(0)->Christianfemale6to14;
		$Christiantotal6to14 = $Christianmale6to14 + $Christianfemale6to14;
		
		    
		$sql_Christianmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianmale14to18 = $this->db->query($sql_Christianmale14to18);
		$Christianmale14to18 = $queryChristianmale14to18->row(0)->Christianmale14to18;
		
		$sql_Christianfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  and household_entry.entry_village_name='".$ddlvillage."';";
		$queryChristianfemale14to18 = $this->db->query($sql_Christianfemale14to18);
		$Christianfemale14to18 = $queryChristianfemale14to18->row(0)->Christianfemale14to18;
		$Christiantotal14to18 = $Christianmale14to18 + $Christianfemale14to18;
		
		$Christiantotmale =  $Christianmale0to3 + $Christianmale3to6 + $Christianmale6to14 + $Christianmale14to18;
		$Christiantotfemale = $Christianfemale0to3 + $Christianfemale3to6 + $Christianfemale6to14 + $Christianfemale14to18;
		$Christiantotall = $Christiantotal0to3 + $Christiantotal3to6 + $Christiantotal6to14 + $Christiantotal14to18;
		
		// End of Children's Population Christian   
		
		// Children's Population Jain 
		
		$sql_Jainmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$query_Jainmale0to3 = $this->db->query($sql_Jainmale0to3);
		$Jainmale0to3 = $query_Jainmale0to3->row(0)->Jainmale0to3;
		
		$sql_Jainfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainfemale0to3 = $this->db->query($sql_Jainfemale0to3);
		$Jainfemale0to3 = $queryJainfemale0to3->row(0)->Jainfemale0to3;
		$Jaintotal0to3 = $Jainmale0to3 + $Jainfemale0to3;
		
		$sql_Jainmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainmale3to6 = $this->db->query($sql_Jainmale3to6);
		$Jainmale3to6 = $queryJainmale3to6->row(0)->Jainmale3to6;
		
		$sql_Jainfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainfemale3to6 = $this->db->query($sql_Jainfemale3to6);
		$Jainfemale3to6 = $queryJainfemale3to6->row(0)->Jainfemale3to6;
		$Jaintotal3to6 = $Jainmale3to6 + $Jainfemale3to6;
		
		$sql_Jainmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainmale6to14 = $this->db->query($sql_Jainmale6to14);
		$Jainmale6to14 = $queryJainmale6to14->row(0)->Jainmale6to14;
		
		$sql_Jainfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainfemale6to14 = $this->db->query($sql_Jainfemale6to14);
		$Jainfemale6to14 = $queryJainfemale6to14->row(0)->Jainfemale6to14;
		$Jaintotal6to14 = $Jainmale6to14 + $Jainfemale6to14;
		
		    
		$sql_Jainmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainmale14to18 = $this->db->query($sql_Jainmale14to18);
		$Jainmale14to18 = $queryJainmale14to18->row(0)->Jainmale14to18;
		
		$sql_Jainfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and religion='Jain' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryJainfemale0to3 = $this->db->query($sql_Jainfemale14to18);
		$Jainfemale14to18 = $queryJainfemale0to3->row(0)->Jainfemale14to18;
		$Jaintotal14to18 = $Jainmale14to18 + $Jainfemale14to18;
		
		$Jaintotmale =  $Jainmale0to3 + $Jainmale3to6 + $Jainmale6to14 + $Jainmale14to18;
		$Jaintotfemale = $Jainfemale0to3 + $Jainfemale3to6 + $Jainfemale6to14 + $Jainfemale14to18;
		$Jaintotall = $Jaintotal0to3 + $Jaintotal3to6 + $Jaintotal6to14 + $Jaintotal14to18;
		
		// End of Children's Population Jain 
		
		// Children's Population Other 
		
		$sql_OTRmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$query_OTRmale0to3 = $this->db->query($sql_OTRmale0to3);
		$OTRmale0to3 = $query_OTRmale0to3->row(0)->OTRmale0to3;
		
		$sql_OTRfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale0to3);
		$OTRfemale0to3 = $queryOTRfemale0to3->row(0)->OTRfemale0to3;
		$OTRtotal0to3 = $OTRmale0to3 + $OTRfemale0to3;
		
		$sql_OTRmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale3to6 = $this->db->query($sql_OTRmale3to6);
		$OTRmale3to6 = $queryOTRmale3to6->row(0)->OTRmale3to6;
		
		$sql_OTRfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale3to6 = $this->db->query($sql_OTRfemale3to6);
		$OTRfemale3to6 = $queryOTRfemale3to6->row(0)->OTRfemale3to6;
		$OTRtotal3to6 = $OTRmale3to6 + $OTRfemale3to6;
		
		$sql_OTRmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale6to14 = $this->db->query($sql_OTRmale6to14);
		$OTRmale6to14 = $queryOTRmale6to14->row(0)->OTRmale6to14;
		
		$sql_OTRfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale6to14 = $this->db->query($sql_OTRfemale6to14);
		$OTRfemale6to14 = $queryOTRfemale6to14->row(0)->OTRfemale6to14;
		$OTRtotal6to14 = $OTRmale6to14 + $OTRfemale6to14;
		
		    
		$sql_OTRmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRmale14to18 = $this->db->query($sql_OTRmale14to18);
		$OTRmale14to18 = $queryOTRmale14to18->row(0)->OTRmale14to18;
		
		$sql_OTRfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and religion='Other' and household_entry.entry_village_name='".$ddlvillage."';";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale14to18);
		$OTRfemale14to18 = $queryOTRfemale0to3->row(0)->OTRfemale14to18;
		$OTRtotal14to18 = $OTRmale14to18 + $OTRfemale14to18;
		
		$OTRtotmale =  $OTRmale0to3 + $OTRmale3to6 + $OTRmale6to14 + $OTRmale14to18;
		$OTRtotfemale = $OTRfemale0to3 + $OTRfemale3to6 + $OTRfemale6to14 + $OTRfemale14to18;
		$OTRtotall = $OTRtotal0to3 + $OTRtotal3to6 + $OTRtotal6to14 + $OTRtotal14to18;
		
				
			$totmale0to3= $Hindumale0to3 + $Muslimmale0to3 + $Christianmale0to3 + $Jainmale0to3 + $OTRmale0to3;
			$totfemale0to3= $Hindufemale0to3 + $Muslimfemale0to3 + $Christianfemale0to3 + $Jainfemale0to3 + $OTRfemale0to3;
			$tot0t03= $totmale0to3 + $totfemale0to3;
			$totmale3to6= $Hindumale3to6 + $Muslimmale3to6 + $Christianmale3to6 + $Jainmale3to6 + $OTRmale3to6;
			$totfemale3to6= $Hindufemale3to6 + $Muslimfemale3to6 + $Christianfemale3to6 + $Jainfemale3to6 + $OTRfemale3to6;
			$tot3t06= $totmale3to6 + $totfemale3to6;
			
			$totmale6to14= $Hindumale6to14 + $Muslimmale6to14 + $Christianmale6to14 + $Jainmale6to14 + $OTRmale6to14;
			$totfemale6to14= $Hindufemale6to14 + $Muslimfemale6to14 + $Christianfemale6to14 + $Jainfemale6to14 + $OTRfemale6to14;
			$tot6t014= $totmale6to14 + $totfemale6to14;
			
			$totmale14to18= $Hindumale14to18 + $Muslimmale14to18 + $Christianmale14to18 + $Jainmale14to18 + $OTRmale14to18;
			$totfemale14to18= $Hindufemale14to18 + $Muslimfemale14to18 + $Christianfemale14to18 + $Jainfemale14to18 + $OTRfemale14to18;
			$tot14t018= $totmale14to18 + $totfemale14to18;
			
		
		
		
		
		
		// End of Children's Population Other 
		
		
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
				<td colspan="4" align="center"><b>Report Title:Religionwise Child Population (General Age Break up)</b></td>
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
				<td></td>
				<td align="center" colspan="3">Hindu Child Population</td> 
				<td  align="center" colspan="3">Muslim Child Population</td>
				<td  align="center" colspan="3">Christian  Child Population</td> 
				<td align="center" colspan="3">Jain Child Population</td> 
				<td  align="center" colspan="3">Other Child Population</td> 
				<td align="center" colspan="3">Total</td> 
			</tr>
			<tr>
			<td >Age group</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
		</tr>
			
			
			<tr>
		
			
				<td >0-3 yrs</td> 
				<td  align="center">'.$Hindumale0to3.'</td> 
				<td  align="center">'.$Hindufemale0to3.'</td> 
				<td  align="center">'.$Hindutotal0to3.'</td> 
				<td  align="center">'.$Muslimmale0to3.'</td> 
				<td  align="center">'.$Muslimfemale0to3.'</td> 
				<td  align="center">'.$Muslimtotal0to3.'</td> 
				<td  align="center">'.$Christianmale0to3.'</td> 
				<td  align="center">'.$Christianfemale0to3.'</td> 
				<td  align="center">'.$Christiantotal0to3.'</td>
				<td  align="center">'.$Jainmale0to3.'</td> 
				<td  align="center">'.$Jainfemale0to3.'</td> 
				<td  align="center">'.$Jaintotal0to3.'</td>   
				<td  align="center">'.$OTRmale0to3.'</td> 
				<td  align="center">'.$OTRfemale0to3.'</td> 
				<td  align="center">'.$OTRtotal0to3.'</td> 

				<td  align="center">'.$totmale0to3.'</td> 
				<td  align="center">'.$totfemale0to3.'</td> 
				<td  align="center">'.$tot0t03.'</td>   				
				
			</tr>
			
				
			
		
			
			<tr>
				<td>3-6yrs</td> 
				<td align="center">'.$Hindumale3to6.'</td> 
				<td align="center">'.$Hindufemale3to6.'</td> 
				<td align="center">'.$Hindutotal3to6.'</td> 
				<td align="center">'.$Muslimmale3to6.'</td> 
				<td align="center">'.$Muslimfemale3to6.'</td> 
				<td align="center">'.$Muslimtotal3to6.'</td> 
				<td align="center">'.$Christianmale3to6.'</td> 
				<td align="center">'.$Christianfemale3to6.'</td> 
				<td align="center">'.$Christiantotal3to6.'</td>
				<td align="center">'.$Jainmale3to6.'</td> 
				<td align="center">'.$Jainfemale3to6.'</td> 
				<td align="center">'.$Jaintotal3to6.'</td>   
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
				
				<td align="center">'.$totmale3to6.'</td> 
				<td align="center">'.$totfemale3to6.'</td> 
				<td align="center">'.$tot3t06.'</td>   
				
			</tr>
			
		
			
			<tr>
				<td>6-14 yrs</td> 
				<td align="center">'.$Hindumale6to14.'</td> 
				<td align="center">'.$Hindufemale6to14.'</td> 
				<td align="center">'.$Hindutotal6to14.'</td> 
				<td align="center">'.$Muslimmale6to14.'</td> 
				<td align="center">'.$Muslimfemale6to14.'</td> 
				<td align="center">'.$Muslimtotal6to14.'</td> 
				<td align="center">'.$Christianmale6to14.'</td> 
				<td align="center">'.$Christianfemale6to14.'</td> 
				<td align="center">'.$Christiantotal6to14.'</td>
				<td align="center">'.$Jainmale6to14.'</td> 
				<td align="center">'.$Jainfemale6to14.'</td> 
				<td align="center">'.$Jaintotal6to14.'</td>
				<td align="center">'.$OTRmale6to14.'</td> 
				<td align="center">'.$OTRfemale6to14.'</td> 
				<td align="center">'.$OTRtotal6to14.'</td> 
				<td align="center">'.$totmale6to14.'</td> 
				<td align="center">'.$totfemale6to14.'</td> 
				<td align="center">'.$tot6t014.'</td>  				
			</tr>
			<tr>
				<td>14-18 yrs</td> 
				<td align="center">'.$Hindumale14to18.'</td> 
				<td align="center">'.$Hindufemale14to18.'</td> 
				<td align="center">'.$Hindutotal4to18.'</td> 
				<td align="center">'.$Muslimmale14to18.'</td> 
				<td align="center">'.$Muslimfemale14to18.'</td> 
				<td align="center">'.$Muslimtotal14to18.'</td> 
				<td align="center">'.$Christianmale14to18.'</td> 
				<td align="center">'.$Christianfemale14to18.'</td> 
				<td align="center">'.$Christiantotal14to18.'</td>
				<td align="center">'.$Jainmale14to18.'</td> 
				<td align="center">'.$Jainfemale14to18.'</td> 
				<td align="center">'.$Jaintotal14to18.'</td> 
				<td align="center">'.$OTRmale14to18.'</td> 
				<td align="center">'.$OTRfemale14to18.'</td> 
				<td align="center">'.$OTRtotal14to18.'</td>  
				<td align="center">'.$totmale14to18.'</td> 
				<td align="center">'.$totfemale14to18.'</td> 
				<td align="center">'.$tot14t018.'</td>  
			</tr>
			
			
			<tr>
				<td>Total Childrens Population</td> 
				<td align="center">'.$Hindutotmale.'</td> 
				<td align="center">'.$Hindutotfemale.'</td> 
				<td align="center">'.$Hindutotall.'</td> 
				<td align="center">'.$Muslimtotmale.'</td> 
				<td align="center">'.$Muslimtotfemale.'</td> 
				<td align="center">'.$Muslimtotall.'</td> 
				<td align="center">'.$Christiantotmale.'</td> 
				<td align="center">'.$Christiantotfemale.'</td> 
				<td align="center">'.$Christiantotall.'</td>
				<td align="center">'.$Jaintotmale.'</td> 
				<td align="center">'.$Jaintotfemale.'</td> 
				<td align="center">'.$Jaintotall.'</td> 
				<td align="center">'.$OTRtotmale.'</td> 
				<td align="center">'.$OTRtotfemale.'</td> 
				<td align="center">'.$OTRtotall.'</td>
<td align="center">'.$OTRtotmale.'</td> 
				<td align="center">'.$OTRtotfemale.'</td> 
				<td align="center">'.$OTRtotall.'</td> 				
			</tr>
			<tr>
			<td  align="left" colspan="19" ><u>Note:</u> <span style="color:red"> These values present in the PDF are on the basis of  live data </span></td>
		</tr>
		</table>';		
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}


	function childagewise_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='', $ddlagebreakup='') {
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as male0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		$male0to3 = $querymain->row(0)->male0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql1);
		$female0to3 = $querymain1->row(0)->female0to3;
		$total0to3 = $male0to3 + $female0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS male3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 3 AND 6 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$male3to6 = $querymain2->row(0)->male3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$female3to6 = $querymain3->row(0)->female3to6;
		$total3to6 = $male3to6 + $female3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as male6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql4);
		$male6to14 = $querymain4->row(0)->male6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql5);
		$female6to14 = $querymain5->row(0)->female6to14;
		$total6to14 = $male6to14 + $female6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as male14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE(YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain6 = $this->db->query($sql6);
		$male14to18 = $querymain6->row(0)->male14to18;
		
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as female14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain7 = $this->db->query($sql7);
		$female14to18 = $querymain7->row(0)->female14to18;
		$total14to18 = $male14to18 + $female14to18;
		
		$totmale =  $male0to3 + $male3to6 + $male6to14 + $male14to18;
		$totfemale = $female0to3 + $female3to6 + $female6to14 + $female14to18;
		$totall = $total0to3 + $total3to6 + $total6to14 + $total14to18;
	
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
				<td colspan="4" align="center"><b>Report Title:Age-Wise Child Population based on multiple Grama Panchayat</b></td>
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
				<td colspan="4" align="center"><b>Age-Wise Child Population based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<th align="left"><b> Agewise</b></th>
				<th align="left"><b>Male Child Population</b></th>
				<th align="left"><b>Female Child Population</b></th>
				<th align="left"><b>Total Child Population</b></th>
			</tr>
			<tr>
				<td align="left"><b>0-3 yrs</b></td>
				<td><span style="color:red">'.$male0to3.'</span></td>
				<td><span style="color:red">'.$female0to3.'</span></td>
				<td><span style="color:red">'.$total0to3.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>3-6 yrs</b></td>
				<td><span style="color:red">'.$male3to6.'</span></td>
				<td><span style="color:red">'.$female3to6.'</span></td>
				<td><span style="color:red">'.$total3to6.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>6-14 yrs</b></td>
				<td><span style="color:red">'.$male6to14.'</span></td>
				<td><span style="color:red">'.$female6to14.'</span></td>
				<td><span style="color:red">'.$total6to14.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>14-18 yrs</b></td>
				<td><span style="color:red">'.$male14to18.'</span></td>
				<td><span style="color:red">'.$female14to18.'</span></td>
				<td><span style="color:red">'.$total14to18.'</span></td>
			</tr>
			<tr>
				<td align="left"><b>Total Child Population</b></td>
				<td><span style="color:red">'.$totmale.'</span></td>
				<td><span style="color:red">'.$totfemale.'</span></td>
				<td><span style="color:red">'.$totall.'</span></td>
			</tr>
			
			<tr>
				<td colspan="4" align="left"><b><u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of  live data </span></b></td>
			</tr>
			
			<tr>
				<td colspan="4" ><b>For More Information, Please Contact: 
				Child Rights Trust, 4606, 6th Floor, High Point IV, Palace Road, Bangalore 560 001. Ph: +91 080 4113 8285, +91 080 4091 2580
				Fax:+91 080 4091 2580 Website: www.childrightstrust.org  Email: crtindia@yahoo.co.in/ childrightstrust@gmail.com</b></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		'<div style="padding-top:170%;">';
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}

	
	function childcastewise_multiple_pdf($txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
	
		//Children's Population SC
		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		$SCmale0to3 = $querymain->row(0)->SCmale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql1);
		$SCfemale0to3 = $querymain1->row(0)->SCfemale0to3;
		$SCtotal0to3 = $SCmale0to3 + $SCfemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS SCmale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  caste='SC'
		AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 3 AND 6 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$SCmale3to6 = $querymain2->row(0)->SCmale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$SCfemale3to6 = $querymain3->row(0)->SCfemale3to6;
		$SCtotal3to6 = $SCmale3to6 + $SCfemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql4);
		$SCmale6to14 = $querymain4->row(0)->SCmale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql5);
		$SCfemale6to14 = $querymain5->row(0)->SCfemale6to14;
		$SCtotal6to14 = $SCmale6to14 + $SCfemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain6 = $this->db->query($sql6);
		$SCmale14to18 = $querymain6->row(0)->SCmale14to18;
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as SCfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='SC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain7 = $this->db->query($sql7);
		$SCfemale14to18 = $querymain7->row(0)->SCfemale14to18;
		$SCtotal4to18 = $SCmale14to18 + $SCfemale14to18;
		
		$SCtotmale =  $SCmale0to3 + $SCmale3to6 + $SCmale6to14 + $SCmale14to18;
		$SCtotfemale = $SCfemale0to3 + $SCfemale3to6 + $SCfemale6to14 + $SCfemale14to18;
		$SCtotall = $SCtotal0to3 + $SCtotal3to6 + $SCtotal6to14 + $SCtotal4to18;
		
		//End of Children's Population SC  
		
		//Children's Population ST  
		
		$sql_STmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_STmale0to3 = $this->db->query($sql_STmale0to3);
		$STmale0to3 = $query_STmale0to3->row(0)->STmale0to3;
		
		$sql_STfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTfemale0to3 = $this->db->query($sql_STfemale0to3);
		$STfemale0to3 = $querySTfemale0to3->row(0)->STfemale0to3;
		$STtotal0to3 = $STmale0to3 + $STfemale0to3;
		
		$sql_STmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTmale3to6 = $this->db->query($sql_STmale3to6);
		$STmale3to6 = $querySTmale3to6->row(0)->STmale3to6;
		
		$sql_STfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTfemale3to6 = $this->db->query($sql_STfemale3to6);
		$STfemale3to6 = $querySTfemale3to6->row(0)->STfemale3to6;
		$STtotal3to6 = $STmale3to6 + $STfemale3to6;
		
		$sql_STmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTmale6to14 = $this->db->query($sql_STmale6to14);
		$STmale6to14 = $querySTmale6to14->row(0)->STmale6to14;
		
		$sql_STfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTfemale6to14 = $this->db->query($sql_STfemale6to14);
		$STfemale6to14 = $querySTfemale6to14->row(0)->STfemale6to14;
		$STtotal6to14 = $STmale6to14 + $STfemale6to14;
		
		    
		$sql_STmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='ST' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTmale14to18 = $this->db->query($sql_STmale14to18);
		$STmale14to18 = $querySTmale14to18->row(0)->STmale14to18;
		
		$sql_STfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as STfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querySTfemale0to3 = $this->db->query($sql_STfemale0to3);
		$STfemale14to18 = $querySTfemale0to3->row(0)->STfemale14to18;
		$STtotal14to18 = $STmale14to18 + $STfemale14to18;
		
		$STtotmale =  $STmale0to3 + $STmale3to6 + $STmale6to14 + $STmale14to18;
		$STtotfemale = $STfemale0to3 + $STfemale3to6 + $STfemale6to14 + $STfemale14to18;
		$STtotall = $STtotal0to3 + $STtotal3to6 + $STtotal6to14 + $STtotal14to18;
		
		
		// End of Children's Population ST  
		
		// Children's Population OBC  
		
		$sql_OBCmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_OBCmale0to3 = $this->db->query($sql_OBCmale0to3);
		$OBCmale0to3 = $query_OBCmale0to3->row(0)->OBCmale0to3;
		
		$sql_OBCfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCfemale0to3 = $this->db->query($sql_OBCfemale0to3);
		$OBCfemale0to3 = $queryOBCfemale0to3->row(0)->OBCfemale0to3;
		$OBCtotal0to3 = $OBCmale0to3 + $OBCfemale0to3;
		
		$sql_OBCmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCmale3to6 = $this->db->query($sql_OBCmale3to6);
		$OBCmale3to6 = $queryOBCmale3to6->row(0)->OBCmale3to6;
		
		$sql_OBCfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCfemale3to6 = $this->db->query($sql_OBCfemale3to6);
		$OBCfemale3to6 = $queryOBCfemale3to6->row(0)->OBCfemale3to6;
		$OBCtotal3to6 = $OBCmale3to6 + $OBCfemale3to6;
		
		$sql_OBCmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCmale6to14 = $this->db->query($sql_OBCmale6to14);
		$OBCmale6to14 = $queryOBCmale6to14->row(0)->OBCmale6to14;
		
		$sql_OBCfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCfemale6to14 = $this->db->query($sql_OBCfemale6to14);
		$OBCfemale6to14 = $queryOBCfemale6to14->row(0)->OBCfemale6to14;
		$OBCtotal6to14 = $OBCmale6to14 + $OBCfemale6to14;
		
		    
		$sql_OBCmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCmale14to18 = $this->db->query($sql_OBCmale14to18);
		$OBCmale14to18 = $queryOBCmale14to18->row(0)->OBCmale14to18;
		
		$sql_OBCfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OBCfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE caste='OBC' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOBCfemale14to18 = $this->db->query($sql_OBCfemale14to18);
		$OBCfemale14to18 = $queryOBCfemale14to18->row(0)->OBCfemale14to18;
		$OBCtotal14to18 = $OBCmale14to18 + $OBCfemale14to18;
		
		$OBCtotmale =  $OBCmale0to3 + $OBCmale3to6 + $OBCmale6to14 + $OBCmale14to18;
		$OBCtotfemale = $OBCfemale0to3 + $OBCfemale3to6 + $OBCfemale6to14 + $OBCfemale14to18;
		$OBCtotall = $OBCtotal0to3 + $OBCtotal3to6 + $OBCtotal6to14 + $OBCtotal14to18;
		
		// End of Children's Population OBC  
		
		
		// Children's Population Other 
		
		$sql_OTRmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_OTRmale0to3 = $this->db->query($sql_OTRmale0to3);
		$OTRmale0to3 = $query_OTRmale0to3->row(0)->OTRmale0to3;
		
		$sql_OTRfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale0to3);
		$OTRfemale0to3 = $queryOTRfemale0to3->row(0)->OTRfemale0to3;
		$OTRtotal0to3 = $OTRmale0to3 + $OTRfemale0to3;
		
		$sql_OTRmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRmale3to6 = $this->db->query($sql_OTRmale3to6);
		$OTRmale3to6 = $queryOTRmale3to6->row(0)->OTRmale3to6;
		
		$sql_OTRfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale3to6 = $this->db->query($sql_OTRfemale3to6);
		$OTRfemale3to6 = $queryOTRfemale3to6->row(0)->OTRfemale3to6;
		$OTRtotal3to6 = $OTRmale3to6 + $OTRfemale3to6;
		
		$sql_OTRmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRmale6to14 = $this->db->query($sql_OTRmale6to14);
		$OTRmale6to14 = $queryOTRmale6to14->row(0)->OTRmale6to14;
		
		$sql_OTRfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale6to14 = $this->db->query($sql_OTRfemale6to14);
		$OTRfemale6to14 = $queryOTRfemale6to14->row(0)->OTRfemale6to14;
		$OTRtotal6to14 = $OTRmale6to14 + $OTRfemale6to14;
		
		    
		$sql_OTRmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRmale14to18 = $this->db->query($sql_OTRmale14to18);
		$OTRmale14to18 = $queryOTRmale14to18->row(0)->OTRmale14to18;
		
		$sql_OTRfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and caste='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale14to18);
		$OTRfemale14to18 = $queryOTRfemale0to3->row(0)->OTRfemale14to18;
		$OTRtotal14to18 = $OTRmale14to18 + $OTRfemale14to18;
		
		$OTRtotmale =  $OTRmale0to3 + $OTRmale3to6 + $OTRmale6to14 + $OTRmale14to18;
		$OTRtotfemale = $OTRfemale0to3 + $OTRfemale3to6 + $OTRfemale6to14 + $OTRfemale14to18;
		$OTRtotall = $OTRtotal0to3 + $OTRtotal3to6 + $OTRtotal6to14 + $OTRtotal14to18;
		
		// End of Children's Population Other 
		
		
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
				<td colspan="4" align="center"><b>Report Title:Caste-Wise Childrens Population based on multiple Grama Panchayat</b></td>
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
				<td colspan="13" align="center"><b>Caste- Wise Childrens Population based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<td></td>
				<td align="center" colspan= "3" >SC Childrens Population</td> 
				<td align="center" colspan= "3"  >ST Childrens Population</td>
				<td  align="center" colspan= "3"  >OBC Childrens Population</td> 
				<td align="center" colspan= "3"  >Other Childrens Population</td> 
			</tr>
			<tr>
			<td>Childrens Age</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
		</tr>
			
			
			<tr>	
				<td>0-3 yrs</td> 
				<td  align="center">'.$SCmale0to3.'</td> 
				<td  align="center">'.$SCfemale0to3.'</td> 
				<td  align="center">'.$SCtotal0to3.'</td> 
				<td  align="center">'.$STmale0to3.'</td> 
				<td  align="center">'.$STfemale0to3.'</td> 
				<td  align="center">'.$STtotal0to3.'</td> 
				<td  align="center">'.$OBCmale0to3.'</td> 
				<td  align="center">'.$OBCfemale0to3.'</td> 
				<td  align="center">'.$OBCtotal0to3.'</td>
				<td  align="center">'.$OTRmale0to3.'</td> 
				<td  align="center">'.$OTRfemale0to3.'</td> 
				<td  align="center">'.$OTRtotal0to3.'</td>   
			</tr>
			<tr>
				<td>3-6yrs</td> 
				<td align="center">'.$SCmale3to6.'</td> 
				<td align="center">'.$SCfemale3to6.'</td> 
				<td align="center">'.$SCtotal3to6.'</td> 
				<td align="center">'.$STmale3to6.'</td> 
				<td align="center">'.$STfemale3to6.'</td> 
				<td align="center">'.$STtotal3to6.'</td> 
				<td align="center">'.$OBCmale3to6.'</td> 
				<td align="center">'.$OBCfemale3to6.'</td> 
				<td align="center">'.$OBCtotal3to6.'</td>
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>6-14 yrs</td> 
				<td align="center">'.$SCmale6to14.'</td> 
				<td align="center">'.$SCfemale6to14.'</td> 
				<td align="center">'.$SCtotal6to14.'</td> 
				<td align="center">'.$STmale6to14.'</td> 
				<td align="center">'.$STfemale6to14.'</td> 
				<td align="center">'.$STtotal6to14.'</td> 
				<td align="center">'.$OBCmale6to14.'</td> 
				<td align="center">'.$OBCfemale6to14.'</td> 
				<td align="center">'.$OBCtotal6to14.'</td>
				<td align="center">'.$OTRmale6to14.'</td> 
				<td align="center">'.$OTRfemale6to14.'</td> 
				<td align="center">'.$OTRtotal6to14.'</td>   
			</tr>
			<tr>
				<td>14-18 yrs</td> 
				<td align="center">'.$SCmale14to18.'</td> 
				<td align="center">'.$SCfemale14to18.'</td> 
				<td align="center">'.$SCtotal4to18.'</td> 
				<td align="center">'.$STmale14to18.'</td> 
				<td align="center">'.$STfemale14to18.'</td> 
				<td align="center">'.$STtotal14to18.'</td> 
				<td align="center">'.$OBCmale14to18.'</td> 
				<td align="center">'.$OBCfemale14to18.'</td> 
				<td align="center">'.$OBCtotal14to18.'</td>
				<td align="center">'.$OTRmale14to18.'</td> 
				<td align="center">'.$OTRfemale14to18.'</td> 
				<td align="center">'.$OTRtotal14to18.'</td>  
			</tr>
			<tr>
				<td>Total Childrens Population</td> 
				<td align="center">'.$SCtotmale.'</td> 
				<td align="center">'.$SCtotfemale.'</td> 
				<td align="center">'.$SCtotall.'</td> 
				<td align="center">'.$STtotmale.'</td> 
				<td align="center">'.$STtotfemale.'</td> 
				<td align="center">'.$STtotall.'</td> 
				<td align="center">'.$OBCtotmale.'</td> 
				<td align="center">'.$OBCtotfemale.'</td> 
				<td align="center">'.$OBCtotall.'</td>
				<td align="center">'.$OTRtotmale.'</td> 
				<td align="center">'.$OTRtotfemale.'</td> 
				<td align="center">'.$OTRtotall.'</td> 
			</tr>
			<tr>
			<td align="left" colspan="13"><u>Note:</u> <span style="color:red"> These values present in the PDF are on the basis of  live data </span></td>
		</tr>
		</table>';		
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}
	

	
	
function religionmultiplemodel( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		//Children's Population Hindu

		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindumale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		$Hindumale0to3 = $querymain->row(0)->Hindumale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql1);
		$Hindufemale0to3 = $querymain1->row(0)->Hindufemale0to3;
		$Hindutotal0to3 = $Hindumale0to3 + $Hindufemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Hindumale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  religion='Hindu'
		AND (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ))BETWEEN 3 AND 6 AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$Hindumale3to6 = $querymain2->row(0)->Hindumale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$Hindufemale3to6 = $querymain3->row(0)->Hindufemale3to6;
		$Hindutotal3to6 = $Hindumale3to6 + $Hindufemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindumale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql4);
		$Hindumale6to14 = $querymain4->row(0)->Hindumale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql5);
		$Hindufemale6to14 = $querymain5->row(0)->Hindufemale6to14;
		$Hindutotal6to14 = $Hindumale6to14 + $Hindufemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindumale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain6 = $this->db->query($sql6);
		$Hindumale14to18 = $querymain6->row(0)->Hindumale14to18;
		
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Hindufemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Hindu' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain7 = $this->db->query($sql7);
		$Hindufemale14to18 = $querymain7->row(0)->Hindufemale14to18;
		$Hindutotal4to18 = $Hindumale14to18 + $Hindufemale14to18;
		
		$Hindutotmale =  $Hindumale0to3 + $Hindumale3to6 + $Hindumale6to14 + $Hindumale14to18;
		$Hindutotfemale = $Hindufemale0to3 + $Hindufemale3to6 + $Hindufemale6to14 + $Hindufemale14to18;
		$Hindutotall = $Hindutotal0to3 + $Hindutotal3to6 + $Hindutotal6to14 + $Hindutotal4to18;
		
		//End of Children's Population Hindu  
		
		//Children's Population Muslim  
		
		$sql_Muslimmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_Muslimmale0to3 = $this->db->query($sql_Muslimmale0to3);
		$Muslimmale0to3 = $query_Muslimmale0to3->row(0)->Muslimmale0to3;
		
		$sql_Muslimfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimfemale0to3 = $this->db->query($sql_Muslimfemale0to3);
		$Muslimfemale0to3 = $queryMuslimfemale0to3->row(0)->Muslimfemale0to3;
		$Muslimtotal0to3 = $Muslimmale0to3 + $Muslimfemale0to3;
		
		$sql_Muslimmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimmale3to6 = $this->db->query($sql_Muslimmale3to6);
		$Muslimmale3to6 = $queryMuslimmale3to6->row(0)->Muslimmale3to6;
		
		$sql_Muslimfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimfemale3to6 = $this->db->query($sql_Muslimfemale3to6);
		$Muslimfemale3to6 = $queryMuslimfemale3to6->row(0)->Muslimfemale3to6;
		$Muslimtotal3to6 = $Muslimmale3to6 + $Muslimfemale3to6;
		
		$sql_Muslimmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimmale6to14 = $this->db->query($sql_Muslimmale6to14);
		$Muslimmale6to14 = $queryMuslimmale6to14->row(0)->Muslimmale6to14;
		
		$sql_Muslimfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimfemale6to14 = $this->db->query($sql_Muslimfemale6to14);
		$Muslimfemale6to14 = $queryMuslimfemale6to14->row(0)->Muslimfemale6to14;
		$Muslimtotal6to14 = $Muslimmale6to14 + $Muslimfemale6to14;
		
		    
		$sql_Muslimmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Muslim' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimmale14to18 = $this->db->query($sql_Muslimmale14to18);
		$Muslimmale14to18 = $queryMuslimmale14to18->row(0)->Muslimmale14to18;
		
		$sql_Muslimfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Muslimfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryMuslimfemale0to3 = $this->db->query($sql_Muslimfemale0to3);
		$Muslimfemale14to18 = $queryMuslimfemale0to3->row(0)->Muslimfemale14to18;
		$Muslimtotal14to18 = $Muslimmale14to18 + $Muslimfemale14to18;
		
		$Muslimtotmale =  $Muslimmale0to3 + $Muslimmale3to6 + $Muslimmale6to14 + $Muslimmale14to18;
		$Muslimtotfemale = $Muslimfemale0to3 + $Muslimfemale3to6 + $Muslimfemale6to14 + $Muslimfemale14to18;
		$Muslimtotall = $Muslimtotal0to3 + $Muslimtotal3to6 + $Muslimtotal6to14 + $Muslimtotal14to18;
		
		
		// End of Children's Population Muslim  
		
		// Children's Population Christian   
		
		$sql_Christianmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_Christianmale0to3 = $this->db->query($sql_Christianmale0to3);
		$Christianmale0to3 = $query_Christianmale0to3->row(0)->Christianmale0to3;
		
		$sql_Christianfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianfemale0to3 = $this->db->query($sql_Christianfemale0to3);
		$Christianfemale0to3 = $queryChristianfemale0to3->row(0)->Christianfemale0to3;
		$Christiantotal0to3 = $Christianmale0to3 + $Christianfemale0to3;
		
		$sql_Christianmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianmale3to6 = $this->db->query($sql_Christianmale3to6);
		$Christianmale3to6 = $queryChristianmale3to6->row(0)->Christianmale3to6;
		
		$sql_Christianfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianfemale3to6 = $this->db->query($sql_Christianfemale3to6);
		$Christianfemale3to6 = $queryChristianfemale3to6->row(0)->Christianfemale3to6;
		$Christiantotal3to6 = $Christianmale3to6 + $Christianfemale3to6;
		
		$sql_Christianmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianmale6to14 = $this->db->query($sql_Christianmale6to14);
		$Christianmale6to14 = $queryChristianmale6to14->row(0)->Christianmale6to14;
		
		$sql_Christianfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianfemale6to14 = $this->db->query($sql_Christianfemale6to14);
		$Christianfemale6to14 = $queryChristianfemale6to14->row(0)->Christianfemale6to14;
		$Christiantotal6to14 = $Christianmale6to14 + $Christianfemale6to14;
		
		    
		$sql_Christianmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianmale14to18 = $this->db->query($sql_Christianmale14to18);
		$Christianmale14to18 = $queryChristianmale14to18->row(0)->Christianmale14to18;
		
		$sql_Christianfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Christianfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE religion='Christian ' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryChristianfemale14to18 = $this->db->query($sql_Christianfemale14to18);
		$Christianfemale14to18 = $queryChristianfemale14to18->row(0)->Christianfemale14to18;
		$Christiantotal14to18 = $Christianmale14to18 + $Christianfemale14to18;
		
		$Christiantotmale =  $Christianmale0to3 + $Christianmale3to6 + $Christianmale6to14 + $Christianmale14to18;
		$Christiantotfemale = $Christianfemale0to3 + $Christianfemale3to6 + $Christianfemale6to14 + $Christianfemale14to18;
		$Christiantotall = $Christiantotal0to3 + $Christiantotal3to6 + $Christiantotal6to14 + $Christiantotal14to18;
		
		// End of Children's Population Christian   
		
		// Children's Population Jain 
		
		$sql_Jainmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_Jainmale0to3 = $this->db->query($sql_Jainmale0to3);
		$Jainmale0to3 = $query_Jainmale0to3->row(0)->Jainmale0to3;
		
		$sql_Jainfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainfemale0to3 = $this->db->query($sql_Jainfemale0to3);
		$Jainfemale0to3 = $queryJainfemale0to3->row(0)->Jainfemale0to3;
		$Jaintotal0to3 = $Jainmale0to3 + $Jainfemale0to3;
		
		$sql_Jainmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainmale3to6 = $this->db->query($sql_Jainmale3to6);
		$Jainmale3to6 = $queryJainmale3to6->row(0)->Jainmale3to6;
		
		$sql_Jainfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainfemale3to6 = $this->db->query($sql_Jainfemale3to6);
		$Jainfemale3to6 = $queryJainfemale3to6->row(0)->Jainfemale3to6;
		$Jaintotal3to6 = $Jainmale3to6 + $Jainfemale3to6;
		
		$sql_Jainmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainmale6to14 = $this->db->query($sql_Jainmale6to14);
		$Jainmale6to14 = $queryJainmale6to14->row(0)->Jainmale6to14;
		
		$sql_Jainfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainfemale6to14 = $this->db->query($sql_Jainfemale6to14);
		$Jainfemale6to14 = $queryJainfemale6to14->row(0)->Jainfemale6to14;
		$Jaintotal6to14 = $Jainmale6to14 + $Jainfemale6to14;
		
		    
		$sql_Jainmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainmale14to18 = $this->db->query($sql_Jainmale14to18);
		$Jainmale14to18 = $queryJainmale14to18->row(0)->Jainmale14to18;
		
		$sql_Jainfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Jainfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and religion='Jain' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryJainfemale0to3 = $this->db->query($sql_Jainfemale14to18);
		$Jainfemale14to18 = $queryJainfemale0to3->row(0)->Jainfemale14to18;
		$Jaintotal14to18 = $Jainmale14to18 + $Jainfemale14to18;
		
		$Jaintotmale =  $Jainmale0to3 + $Jainmale3to6 + $Jainmale6to14 + $Jainmale14to18;
		$Jaintotfemale = $Jainfemale0to3 + $Jainfemale3to6 + $Jainfemale6to14 + $Jainfemale14to18;
		$Jaintotall = $Jaintotal0to3 + $Jaintotal3to6 + $Jaintotal6to14 + $Jaintotal14to18;
		
		// End of Children's Population Jain 
		
		// Children's Population Other 
		
		$sql_OTRmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_OTRmale0to3 = $this->db->query($sql_OTRmale0to3);
		$OTRmale0to3 = $query_OTRmale0to3->row(0)->OTRmale0to3;
		
		$sql_OTRfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale0to3);
		$OTRfemale0to3 = $queryOTRfemale0to3->row(0)->OTRfemale0to3;
		$OTRtotal0to3 = $OTRmale0to3 + $OTRfemale0to3;
		
		$sql_OTRmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRmale3to6 = $this->db->query($sql_OTRmale3to6);
		$OTRmale3to6 = $queryOTRmale3to6->row(0)->OTRmale3to6;
		
		$sql_OTRfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale3to6 = $this->db->query($sql_OTRfemale3to6);
		$OTRfemale3to6 = $queryOTRfemale3to6->row(0)->OTRfemale3to6;
		$OTRtotal3to6 = $OTRmale3to6 + $OTRfemale3to6;
		
		$sql_OTRmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRmale6to14 = $this->db->query($sql_OTRmale6to14);
		$OTRmale6to14 = $queryOTRmale6to14->row(0)->OTRmale6to14;
		
		$sql_OTRfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale6to14 = $this->db->query($sql_OTRfemale6to14);
		$OTRfemale6to14 = $queryOTRfemale6to14->row(0)->OTRfemale6to14;
		$OTRtotal6to14 = $OTRmale6to14 + $OTRfemale6to14;
		
		    
		$sql_OTRmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRmale14to18 = $this->db->query($sql_OTRmale14to18);
		$OTRmale14to18 = $queryOTRmale14to18->row(0)->OTRmale14to18;
		
		$sql_OTRfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as OTRfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and religion='Other' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryOTRfemale0to3 = $this->db->query($sql_OTRfemale14to18);
		$OTRfemale14to18 = $queryOTRfemale0to3->row(0)->OTRfemale14to18;
		$OTRtotal14to18 = $OTRmale14to18 + $OTRfemale14to18;
		
		$OTRtotmale =  $OTRmale0to3 + $OTRmale3to6 + $OTRmale6to14 + $OTRmale14to18;
		$OTRtotfemale = $OTRfemale0to3 + $OTRfemale3to6 + $OTRfemale6to14 + $OTRfemale14to18;
		$OTRtotall = $OTRtotal0to3 + $OTRtotal3to6 + $OTRtotal6to14 + $OTRtotal14to18;
		
		// End of Children's Population Other 
		
		
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
				<td colspan="4" align="center"><b>Report Title:Religion-Wise Childrens Population based on multiple Grama Panchayat</b></td>
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
				<td colspan="6" align="center"><b>Religion- Wise Childrens Population based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<td ></td>
				<td  align="center" colspan=3>Hindu Childrens Population</td> 
				<td  align="center" colspan=3>Muslim Childrens Population</td>
				<td  align="center" colspan=3>Christian  Childrens Population</td> 
				<td  align="center" colspan=3>Jain Childrens Population</td> 
				<td  align="center" colspan=3>Other Childrens Population</td> 
			</tr>
			<tr>
			<td >Childrens Age</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
			<td  align="center">Male</td>
			<td  align="center">Female</td>
			<td  align="center">Total</td>
		</tr>
			<tr>
				<td >0-3 yrs</td> 
				<td  align="center">'.$Hindumale0to3.'</td> 
				<td  align="center">'.$Hindufemale0to3.'</td> 
				<td  align="center">'.$Hindutotal0to3.'</td> 
				<td  align="center">'.$Muslimmale0to3.'</td> 
				<td  align="center">'.$Muslimfemale0to3.'</td> 
				<td  align="center">'.$Muslimtotal0to3.'</td> 
				<td  align="center">'.$Christianmale0to3.'</td> 
				<td  align="center">'.$Christianfemale0to3.'</td> 
				<td  align="center">'.$Christiantotal0to3.'</td>
				<td  align="center">'.$Jainmale0to3.'</td> 
				<td  align="center">'.$Jainfemale0to3.'</td> 
				<td  align="center">'.$Jaintotal0to3.'</td>   
				<td  align="center">'.$OTRmale0to3.'</td> 
				<td  align="center">'.$OTRfemale0to3.'</td> 
				<td  align="center">'.$OTRtotal0to3.'</td>   
			</tr>
			<tr>
				<td>3-6yrs</td> 
				<td align="center">'.$Hindumale3to6.'</td> 
				<td align="center">'.$Hindufemale3to6.'</td> 
				<td align="center">'.$Hindutotal3to6.'</td> 
				<td align="center">'.$Muslimmale3to6.'</td> 
				<td align="center">'.$Muslimfemale3to6.'</td> 
				<td align="center">'.$Muslimtotal3to6.'</td> 
				<td align="center">'.$Christianmale3to6.'</td> 
				<td align="center">'.$Christianfemale3to6.'</td> 
				<td align="center">'.$Christiantotal3to6.'</td>
				<td align="center">'.$Jainmale3to6.'</td> 
				<td align="center">'.$Jainfemale3to6.'</td> 
				<td align="center">'.$Jaintotal3to6.'</td>   
				<td align="center">'.$OTRmale3to6.'</td> 
				<td align="center">'.$OTRfemale3to6.'</td> 
				<td align="center">'.$OTRtotal3to6.'</td>   
			</tr>
			<tr>
				<td>6-14 yrs</td> 
				<td align="center">'.$Hindumale6to14.'</td> 
				<td align="center">'.$Hindufemale6to14.'</td> 
				<td align="center">'.$Hindutotal6to14.'</td> 
				<td align="center">'.$Muslimmale6to14.'</td> 
				<td align="center">'.$Muslimfemale6to14.'</td> 
				<td align="center">'.$Muslimtotal6to14.'</td> 
				<td align="center">'.$Christianmale6to14.'</td> 
				<td align="center">'.$Christianfemale6to14.'</td> 
				<td align="center">'.$Christiantotal6to14.'</td>
				<td align="center">'.$Jainmale6to14.'</td> 
				<td align="center">'.$Jainfemale6to14.'</td> 
				<td align="center">'.$Jaintotal6to14.'</td>
				<td align="center">'.$OTRmale6to14.'</td> 
				<td align="center">'.$OTRfemale6to14.'</td> 
				<td align="center">'.$OTRtotal6to14.'</td>   
			</tr>
			<tr>
				<td>14-18 yrs</td> 
				<td align="center">'.$Hindumale14to18.'</td> 
				<td align="center">'.$Hindufemale14to18.'</td> 
				<td align="center">'.$Hindutotal4to18.'</td> 
				<td align="center">'.$Muslimmale14to18.'</td> 
				<td align="center">'.$Muslimfemale14to18.'</td> 
				<td align="center">'.$Muslimtotal14to18.'</td> 
				<td align="center">'.$Christianmale14to18.'</td> 
				<td align="center">'.$Christianfemale14to18.'</td> 
				<td align="center">'.$Christiantotal14to18.'</td>
				<td align="center">'.$Jainmale14to18.'</td> 
				<td align="center">'.$Jainfemale14to18.'</td> 
				<td align="center">'.$Jaintotal14to18.'</td> 
				<td align="center">'.$OTRmale14to18.'</td> 
				<td align="center">'.$OTRfemale14to18.'</td> 
				<td align="center">'.$OTRtotal14to18.'</td>  
			</tr>
			<tr>
				<td>Total Childrens Population</td> 
				<td align="center">'.$Hindutotmale.'</td> 
				<td align="center">'.$Hindutotfemale.'</td> 
				<td align="center">'.$Hindutotall.'</td> 
				<td align="center">'.$Muslimtotmale.'</td> 
				<td align="center">'.$Muslimtotfemale.'</td> 
				<td align="center">'.$Muslimtotall.'</td> 
				<td align="center">'.$Christiantotmale.'</td> 
				<td align="center">'.$Christiantotfemale.'</td> 
				<td align="center">'.$Christiantotall.'</td>
				<td align="center">'.$Jaintotmale.'</td> 
				<td align="center">'.$Jaintotfemale.'</td> 
				<td align="center">'.$Jaintotall.'</td> 
				<td align="center">'.$OTRtotmale.'</td> 
				<td align="center">'.$OTRtotfemale.'</td> 
				<td align="center">'.$OTRtotall.'</td> 
			</tr>
			<tr>
			<td  align="left" colspan="16" ><u>Note:</u> <span style="color:red"> These values present in the PDF are on the basis of  live data </span></td>
		</tr>
		</table>';		
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}	
	
	
	function childorphanwise_multiple_pdf( $txtpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='') {
		
		$sql="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Omale0to3 FROM ocop_general_info
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
			WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain = $this->db->query($sql);
		
		$Omale0to3 = $querymain->row(0)->Omale0to3;
		
		$sql1="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain1 = $this->db->query($sql1);
		$Ofemale0to3 = $querymain1->row(0)->Ofemale0to3;
		$Ototal0to3 = $Omale0to3 + $Ofemale0to3;
		
		$sql2="SELECT COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) AS Omale3to6 FROM ocop_general_info  LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  child_orphan=  'yes'
			AND (
			YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )
			)
			BETWEEN 3 
			AND 6 
			AND gender =1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain2 = $this->db->query($sql2);
		$Omale3to6 = $querymain2->row(0)->Omale3to6;
		
		$sql3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain3 = $this->db->query($sql3);
		$Ofemale3to6 = $querymain3->row(0)->Ofemale3to6;
		$Ototal3to6 = $Omale3to6 + $Ofemale3to6;
		
		$sql4="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Omale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain4 = $this->db->query($sql4);
		$Omale6to14 = $querymain4->row(0)->Omale6to14;
		
		$sql5="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 6 AND 14 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain5 = $this->db->query($sql5);
		$Ofemale6to14 = $querymain5->row(0)->Ofemale6to14;
		$Ototal6to14 = $Omale6to14 + $Ofemale6to14;
		
		
		$sql6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Omale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain6 = $this->db->query($sql6);
		$Omale14to18 = $querymain6->row(0)->Omale14to18;
		$sql7="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as Ofemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE child_orphan='yes' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$querymain7 = $this->db->query($sql7);
		$Ofemale14to18 = $querymain7->row(0)->Ofemale14to18;
		$Ototal4to18 = $Omale14to18 + $Ofemale14to18;
		
		$Ototmale =  $Omale0to3 + $Omale3to6 + $Omale6to14 + $Omale14to18;
		$Ototfemale = $Ofemale0to3 + $Ofemale3to6 + $Ofemale6to14 + $Ofemale14to18;
		$Ototall = $Ototal0to3 + $Ototal3to6 + $Ototal6to14 + $Ototal4to18;
		
		//Children's Population without Mother  *CPM=Children's Population without Mother
		
		$sql_without_mother_CPMmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_CPMmale0to3 = $this->db->query($sql_without_mother_CPMmale0to3);
		$CPMmale0to3 = $query_CPMmale0to3->row(0)->CPMmale0to3;
		
		$sql_without_mother_CPMfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMfemale0to3 = $this->db->query($sql_without_mother_CPMfemale0to3);
		$CPMfemale0to3 = $queryCPMfemale0to3->row(0)->CPMfemale0to3;
		$CPMtotal0to3 = $CPMmale0to3 + $CPMfemale0to3;
		
		$sql_without_mother_CPMmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 3 AND 6 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMmale3to6 = $this->db->query($sql_without_mother_CPMmale3to6);
		$CPMmale3to6 = $queryCPMmale3to6->row(0)->CPMmale3to6;
		
		$sql_without_mother_CPMfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 3 AND 6 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMfemale3to6 = $this->db->query($sql_without_mother_CPMfemale3to6);
		$CPMfemale3to6 = $queryCPMfemale3to6->row(0)->CPMfemale3to6;
		$CPMtotal3to6 = $CPMmale3to6 + $CPMfemale3to6;
		
		$sql_without_mother_CPMmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMmale6to14 = $this->db->query($sql_without_mother_CPMmale6to14);
		$CPMmale6to14 = $queryCPMmale6to14->row(0)->CPMmale6to14;
		
		$sql_without_mother_CPMfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMfemale6to14 = $this->db->query($sql_without_mother_CPMfemale6to14);
		$CPMfemale6to14 = $queryCPMfemale6to14->row(0)->CPMfemale6to14;
		$CPMtotal6to14 = $CPMmale6to14 + $CPMfemale6to14;
		
		    
		$sql_without_mother_CPMmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMmale14to18 = $this->db->query($sql_without_mother_CPMmale14to18);
		$CPMmale14to18 = $queryCPMmale14to18->row(0)->CPMmale14to18;
		
		$sql_without_mother_CPMfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPMfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Mother' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) )) BETWEEN 14 AND 18 and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPMfemale0to3 = $this->db->query($sql_without_mother_CPMfemale0to3);
		$CPMfemale14to18 = $queryCPMfemale0to3->row(0)->CPMfemale14to18;
		$CPMtotal14to18 = $CPMmale14to18 + $CPMfemale14to18;
		
		$CPMtotmale =  $CPMmale0to3 + $CPMmale3to6 + $CPMmale6to14 + $CPMmale14to18;
		$CPMtotfemale = $CPMfemale0to3 + $CPMfemale3to6 + $CPMfemale6to14 + $CPMfemale14to18;
		$CPMtotall = $CPMtotal0to3 + $CPMtotal3to6 + $CPMtotal6to14 + $CPMtotal14to18;
		
		
		// End of Children's Population without Mother
		
		//Children's Population without Father *CPF=Children's Population without Father
		
		$sql_without_father_CPFmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) BETWEEN 0 AND 3 and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_CPFmale0to3 = $this->db->query($sql_without_father_CPFmale0to3);
		$CPFmale0to3 = $query_CPFmale0to3->row(0)->CPFmale0to3;
		
		$sql_without_father_CPFfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFfemale0to3 = $this->db->query($sql_without_father_CPFfemale0to3);
		$CPFfemale0to3 = $queryCPFfemale0to3->row(0)->CPFfemale0to3;
		$CPFtotal0to3 = $CPFmale0to3 + $CPFfemale0to3;
		
		$sql_without_father_CPFmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFmale3to6 = $this->db->query($sql_without_father_CPFmale3to6);
		$CPFmale3to6 = $queryCPFmale3to6->row(0)->CPFmale3to6;
		
		$sql_without_father_CPFfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE  `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFfemale3to6 = $this->db->query($sql_without_father_CPFfemale3to6);
		$CPFfemale3to6 = $queryCPFfemale3to6->row(0)->CPFfemale3to6;
		$CPFtotal3to6 = $CPFmale3to6 + $CPFfemale3to6;
		
		$sql_without_father_CPFmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFmale6to14 = $this->db->query($sql_without_father_CPFmale6to14);
		$CPFmale6to14 = $queryCPFmale6to14->row(0)->CPFmale6to14;
		
		$sql_without_father_CPFfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFfemale6to14 = $this->db->query($sql_without_father_CPFfemale6to14);
		$CPFfemale6to14 = $queryCPFfemale6to14->row(0)->CPFfemale6to14;
		$CPFtotal6to14 = $CPFmale6to14 + $CPFfemale6to14;
		
		    
		$sql_without_father_CPFmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFmale14to18 = $this->db->query($sql_without_father_CPFmale14to18);
		$CPFmale14to18 = $queryCPFmale14to18->row(0)->CPFmale14to18;
		
		$sql_without_father_CPFfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPFfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE `child_orphan_yes`='No Father' and (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2  AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPFfemale14to18 = $this->db->query($sql_without_father_CPFfemale14to18);
		$CPFfemale14to18 = $queryCPFfemale14to18->row(0)->CPFfemale14to18;
		$CPFtotal14to18 = $CPFmale14to18 + $CPFfemale14to18;
		
		$CPFtotmale =  $CPFmale0to3 + $CPFmale3to6 + $CPFmale6to14 + $CPFmale14to18;
		$CPFtotfemale = $CPFfemale0to3 + $CPFfemale3to6 + $CPFfemale6to14 + $CPFfemale14to18;
		$CPFtotall = $CPFtotal0to3 + $CPFtotal3to6 + $CPFtotal6to14 + $CPFtotal14to18;
		
		// End of Children's Population without Father
		
		
			//Children's Population without Parents *CPP=Children's Population without Parents
		
		$sql_without_parents_CPPmale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=1 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$query_CPPmale0to3 = $this->db->query($sql_without_parents_CPPmale0to3);
		$CPPmale0to3 = $query_CPPmale0to3->row(0)->CPPmale0to3;
		
		$sql_without_parents_CPPfemale0to3="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale0to3 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 0 AND 3) and gender=2 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPfemale0to3 = $this->db->query($sql_without_parents_CPPfemale0to3);
		$CPPfemale0to3 = $queryCPPfemale0to3->row(0)->CPPfemale0to3;
		$CPPtotal0to3 = $CPPmale0to3 + $CPPfemale0to3;
		
		$sql_without_parents_CPPmale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=1 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPmale3to6 = $this->db->query($sql_without_parents_CPPmale3to6);
		$CPPmale3to6 = $queryCPPmale3to6->row(0)->CPPmale3to6;
		
		$sql_without_parents_CPPfemale3to6="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale3to6 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 3 AND 6) and gender=2 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPfemale3to6 = $this->db->query($sql_without_parents_CPPfemale3to6);
		$CPPfemale3to6 = $queryCPPfemale3to6->row(0)->CPPfemale3to6;
		$CPPtotal3to6 = $CPPmale3to6 + $CPPfemale3to6;
		
		$sql_without_parents_CPPmale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=1 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPmale6to14 = $this->db->query($sql_without_parents_CPPmale6to14);
		$CPPmale6to14 = $queryCPPmale6to14->row(0)->CPPmale6to14;
		
		$sql_without_parents_CPPfemale6to14="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale6to14 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 6 AND 14) and gender=2 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPfemale6to14 = $this->db->query($sql_without_parents_CPPfemale6to14);
		$CPPfemale6to14 = $queryCPPfemale6to14->row(0)->CPPfemale6to14;
		$CPPtotal6to14 = $CPPmale6to14 + $CPPfemale6to14;
		
		    
		$sql_without_parents_CPPmale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPmale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=1 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPmale14to18 = $this->db->query($sql_without_parents_CPPmale14to18);
		$CPPmale14to18 = $queryCPPmale14to18->row(0)->CPPmale14to18;
		
		$sql_without_parents_CPPfemale14to18="select COUNT( YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) ) as CPPfemale14to18 FROM ocop_general_info LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id WHERE (YEAR( CURDATE( ) ) - YEAR( STR_TO_DATE( dob,  '%d-%m-%Y' ) ) BETWEEN 14 AND 18) and gender=2 and `child_orphan_yes`='No Parents' AND household_entry.entry_grama_panchayat IN ('" . str_replace(",", "','", $txtpanchayat) . "')";
		$queryCPPfemale0to3 = $this->db->query($sql_without_parents_CPPfemale14to18);
		$CPPfemale14to18 = $queryCPPfemale0to3->row(0)->CPPfemale14to18;
		$CPPtotal14to18 = $CPPmale14to18 + $CPPfemale14to18;
		
		$CPPtotmale =  $CPPmale0to3 + $CPPmale3to6 + $CPPmale6to14 + $CPPmale14to18;
		$CPPtotfemale = $CPPfemale0to3 + $CPPfemale3to6 + $CPPfemale6to14 + $CPPfemale14to18;
		$CPPtotall = $CPPtotal0to3 + $CPPtotal3to6 + $CPPtotal6to14 + $CPPtotal14to18;
		
		// End of Children's Population without Parents
		
		
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
				<td colspan="4" align="center"><b>Report Title:Orphan-Wise Childrens Population based on multiple Grama Panchayat</b></td>
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
				<td colspan="4" align="center"><b>Orphan/ Semi-OrphanChildrens Population based on multiple Grama Panchayat</b></td>
			</tr>
			<tr>
				<td style="width:10%;"></td>
				<td style="width:30%;" align="center" colspan=3>Childrens Population without Mother</td>
				<td style="width:30%;" align="center" colspan=3>Childrens Population without Father</td> 
				<td style="width:30%;" align="center" colspan=3>Childrens Population without Parents</td> 
			</tr>
			<tr>
			<td style="width:10%;">Childrens Age</td>
			<td style="width:9.8%;" align="center">Male</td>
			<td style="width:9.6%;" align="center">Female</td>
			<td style="width:9.8%;" align="center">Total</td>
			<td style="width:9.8%;" align="center">Male</td>
			<td style="width:9.6%;" align="center">Female</td>
			<td style="width:9.5%;" align="center">Total</td>
			<td style="width:9.8%;" align="center">Male</td>
			<td style="width:9.6%;" align="center">Female</td>
			<td style="width:9.5%;" align="center">Total</td>
		</tr>
			
			<tr>
			
				<td style="width:10%;">0-3 yrs</td> 
				<td style="width:9.8%;" align="center">'.$CPMmale0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPMfemale0to3.'</td> 
				<td style="width:9.8%;" align="center">'.$CPMtotal0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPFmale0to3.'</td> 
				<td style="width:9.8%;" align="center">'.$CPFfemale0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPFtotal0to3.'</td>
				<td style="width:9.8%;" align="center">'.$CPPmale0to3.'</td> 
				<td style="width:9.6%;" align="center">'.$CPPfemale0to3.'</td> 
				<td style="width:9.5%;" align="center">'.$CPPtotal0to3.'</td>   
			</tr>
			<tr>
				<td>3-6yrs</td> 
				<td align="center">'.$CPMmale3to6.'</td> 
				<td align="center">'.$CPMfemale3to6.'</td> 
				<td align="center">'.$CPMtotal3to6.'</td> 
				<td align="center">'.$CPFmale3to6.'</td> 
				<td align="center">'.$CPFfemale3to6.'</td> 
				<td align="center">'.$CPFtotal3to6.'</td>
				<td align="center">'.$CPPmale3to6.'</td> 
				<td align="center">'.$CPPfemale3to6.'</td> 
				<td align="center">'.$CPPtotal3to6.'</td>   
			</tr>
			<tr>
				<td>6-14 yrs</td> 
				<td align="center">'.$CPMmale6to14.'</td> 
				<td align="center">'.$CPMfemale6to14.'</td> 
				<td align="center">'.$CPMtotal6to14.'</td> 
				<td align="center">'.$CPFmale6to14.'</td> 
				<td align="center">'.$CPFfemale6to14.'</td> 
				<td align="center">'.$CPFtotal6to14.'</td>
				<td align="center">'.$CPPmale6to14.'</td> 
				<td align="center">'.$CPPfemale6to14.'</td> 
				<td align="center">'.$CPPtotal6to14.'</td>   
			</tr>
			<tr>
				<td>14-18 yrs</td> 
				<td align="center">'.$CPMmale14to18.'</td> 
				<td align="center">'.$CPMfemale14to18.'</td> 
				<td align="center">'.$CPMtotal14to18.'</td> 
				<td align="center">'.$CPFmale14to18.'</td> 
				<td align="center">'.$CPFfemale14to18.'</td> 
				<td align="center">'.$CPFtotal14to18.'</td>
				<td align="center">'.$CPPmale14to18.'</td> 
				<td align="center">'.$CPPfemale14to18.'</td> 
				<td align="center">'.$CPPtotal14to18.'</td>  
			</tr>
			<tr>
				<td>Total Childrens Population</td> 
				<td align="center">'.$CPMtotmale.'</td> 
				<td align="center">'.$CPMtotfemale.'</td> 
				<td align="center">'.$CPMtotall.'</td> 
				<td align="center">'.$CPFtotmale.'</td> 
				<td align="center">'.$CPFtotfemale.'</td> 
				<td align="center">'.$CPFtotall.'</td>
				<td align="center">'.$CPPtotmale.'</td> 
				<td align="center">'.$CPPtotfemale.'</td> 
				<td align="center">'.$CPPtotall.'</td> 
			</tr>
			<tr>
				<td colspan="10" align="left"> <u>Note:</u><span style="color:red"> These values present in the PDF are on the basis of  live data </span></td>
			</tr>
		</table>';	
		$pdf->writeHTML($html, true, 0, true, true);
		$pdf->Ln();
		$pdf->lastPage();
		$pdf->Output($pdfname, 'I');
	}	



	
	function castewisereport_multiple_bar($txtpanchayat = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  -> where ("ocop_general_info.caste IN('SC','ST','OBC','Other')")
						  ->join('ocop_general_info ', 'household_entry.household_entry_id = ocop_general_info.ocop_general_info_id', 'left')
						  ->get();
		return $query->result();
	}
	

	

		function castewisereport_multiple_pie($txtpanchayat = ''){
		$sql = "SELECT caste as name, Count(caste) as data
		FROM ocop_general_info 
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')  And caste IN('SC','ST','OBC','Other') GROUP BY caste ";
		
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

		function agewisereport_multiple_bar($txtpanchayat = ''){
		$sql = $query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  ->get();
		return $query->result();
	}
	
	
	
		function religionwisereport_multiple_bar($txtpanchayat = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  -> where ("ocop_general_info.religion IN  ('Hindu','Christian','Muslim','Jain','Other')")
						  ->join('ocop_general_info ', 'household_entry.household_entry_id = ocop_general_info.ocop_general_info_id', 'left')
						  ->get();
		return $query->result();
	}
	

	

		function religionwisereport_multiple_pie($txtpanchayat = ''){
		$sql = "SELECT religion as name, count(religion) as data
		FROM ocop_general_info 
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."') And ocop_general_info.religion IN('Hindu','Christian','Muslim','Jain','Other') GROUP BY religion ";
		
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
	

	
	function orphanwisereport_multiple_bar($txtpanchayat = ''){
		$query = $this->db->select ('sum(entry_age0_3yrsmale) as entryagemale03, sum(entry_age3_6yrsmale) as entryagemale36,sum(entry_age6_14yrsmale) as entryagemale614, sum(entry_age14_18yrsmale) as entryagemale618, sum(entry_age0_3yrsfemale) as entryagefemale03, sum(entry_age3_6yrsfemale) as entryagefemale36, sum(entry_age6_14yrsfemale) as entryagefemale614,sum(entry_age14_18yrsfemale) entryagefemale618')
						  -> from  ('household_entry')
				 	      -> where ("entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."')")
						  -> where ("ocop_general_info.child_orphan IN ('Yes',  'No Parents',  'No Father',  'No Mother')")
						  ->join('ocop_general_info ', 'household_entry.household_entry_id = ocop_general_info.ocop_general_info_id', 'left')
						  ->get();
		return $query->result();
	}


		function orphanwisereport_multiple_pie($txtpanchayat = ''){
		$sql = "SELECT child_orphan_yes as name, Count(child_orphan_yes) as data FROM ocop_general_info 
		LEFT JOIN household_entry  ON ocop_general_info.ocop_general_info_id=household_entry.household_entry_id
		WHERE  household_entry.entry_grama_panchayat IN ('". str_replace(",", "','", $txtpanchayat) ."') and ocop_general_info.child_orphan IN ('Yes',  'No Parents',  'No Father',  'No Mother') GROUP BY child_orphan_yes ";
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
	

	
	
		function childcaste_Individualreport_pdf($ddlvillage='', $ddlpanchayat='', $txttaluk='',  $txtdistrict='', $txtdivision='', $txtstate='', $txtreportlevel='', $txtyear='', $ddlagebreakup='') {
		
		$sql="SELECT child_name as childname, caste as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages ,dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_village_name =  '".$ddlvillage."' and caste = 'SC' ";
			
		$querymain = $this->db->query($sql);

		$sql1="SELECT child_name as childname, caste as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages, dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE household_entry.entry_village_name =  '".$ddlvillage."' and caste = 'ST' ";
			
		$querymain1 = $this->db->query($sql1);
		
		$sql12="SELECT child_name as childname, caste as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages, dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_village_name =  '".$ddlvillage."' and caste = 'OBC' ";

		$querymain12 = $this->db->query($sql12);
		
		$sql13="SELECT child_name as childname, caste as caste, entry_grama_panchayat as panchayat, entry_village_name as entry_villages, dob as dob, father_name as father_name , mother_name as mother_name, present_addr aS present_addr
		FROM ocop_general_info
		LEFT JOIN household_entry ON ocop_general_info.ocop_general_info_id = household_entry.household_entry_id
		WHERE  household_entry.entry_village_name =  '".$ddlvillage."' and caste = 'Other' ";
			
		$querymain13 = $this->db->query($sql13);
	
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
				<td colspan="4" align="center"><b>Report Title:Caste-Wise Childrens Population (Individual Report)</b></td>
			</tr>
			<tr>
				<th align="left"><b>Report Generated Date</b></th>
				<td><span style="color:red">'.$txtyear.'</span></td>
				<th align="left"><b>Regional Report Level</b></th>
				<td><span style="color:red">-</span></td>
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
		<table width="100%" cellspacing="3" align="center" cellpadding="5" style="border:11px !important;">
		
			<tr>
				<th align="left"><h2><span style="color:red">SC Childrens Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
				<th align="left"><h2><span style="color:red">Caste</span></h2></th>
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
				<th align="left"><h2><span style="color:red">ST Childrens Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Caste</span></h2></th>
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
				<th align="left"><h2><span style="color:red">OBC Childrens Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Caste</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain12->num_rows() > 0)
		{
			foreach($querymain12->result() as $rowitem1)
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
				<th align="left"><h2><span style="color:red">Other Childrens Name</span></h2></th>
				<th align="left"><h2><span style="color:red">DOB</span></h2></th>
					<th align="left"><h2><span style="color:red">Caste</span></h2></th>
				<th align="left"><h2><span style="color:red">Fathers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Mothers Name </span></h2></th>
				<th align="left"><h2><span style="color:red">Address</span></h2></th>
				<th align="left"><h2><span style="color:red">Village</span></h2></th> 
				<th align="left"><h2><span style="color:red">Panchayat</span></h2></th> 
			</tr>';
			
				if ($querymain13->num_rows() > 0)
		{
			foreach($querymain13->result() as $rowitem1)
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

class childgeneralreport_model extends Base_module_record {
 	
}
