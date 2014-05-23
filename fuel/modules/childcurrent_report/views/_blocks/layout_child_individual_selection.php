<?php include_once(CHILDCURRENT_REPORT_PATH.'views/_blocks/report_individual_toolbar.php'); ?>
<div class="pad-5" style="padding-top:30px">
<div id="main_content_inner">

<div class="yeardropdown">
<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td>
			<input style="cursor: pointer;" type="button" id="txtclickpdf" value="Click to Generate Report">
		</td>
	</tr>
</table>	
</div>
</div>

</div>



<script>




$("#txtclickpdf").click(function() {
	var ddlpanchayat = $("#ddlpanchayat option:selected").val();
	var ddlvillage = $("#ddlvillage option:selected").val();
	var houseid = $('#houseid').val();
	var childid = $('#childid').val();
	var txttaluk = $("#ddlblock option:selected").val();
	var txtdistrict = $("#ddldistrict option:selected").val();
	var txtdivision = $("#ddldivision option:selected").val();
	var txtstate = $("#ddlstate option:selected").val();
	var age = $('#age').val();
	//alert(age);
	var dataString =  'ddlpanchayat='+ddlpanchayat+'&ddlvillage='+ddlvillage+'&age='+age+'&houseid='+houseid+'&childid='+childid+'&txttaluk='+txttaluk+'&txtdistrict='+txtdistrict+'&txtdivision='+txtdivision+'&txtstate='+txtstate;
	if(houseid=='Select' || ddlpanchayat == 'Select'  || ddlvillage == 'Select'|| childid == 'Select'){   
		alert("Please select all the values to generate PDF!!");
    }	
	else{
	$.ajax({  
		type: "POST",  
		success: function(msg){  
			var dataStringone =  'ddlpanchayat='+ddlpanchayat+'&ddlvillage='+ddlvillage+'&age='+age+'&houseid='+houseid+'&childid='+childid+'&txttaluk='+txttaluk+'&txtdistrict='+txtdistrict+'&txtdivision='+txtdivision+'&txtstate='+txtstate;
			var url = "<?php echo fuel_url('childcurrent_report/childindividual_pdf');?>/?"+dataStringone;
		    window.open(url);
		}  
	}); 
	}
});



</script>

