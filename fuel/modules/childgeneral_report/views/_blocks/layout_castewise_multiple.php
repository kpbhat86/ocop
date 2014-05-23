<?php include_once(CHILDCURRENT_REPORT_PATH.'views/_blocks/report_toolbar_multiple.php'); ?>
<div class="pad-5" style="padding-top:30px">
<div id="main_content_inner">

<div class="yeardropdown">
<table cellpadding="0" cellspacing="10" border="0">
	<tr>
		<td><label><span class="bluemark">Report 1.1 </span><strong>Age Breakup<strong></label>		
			<select id="ddlagebreakup" name="ddlagebreakup">
				<option value="">--Select --</option>
				<option value="general">General Age Breakup</option>
			</select>
		</td>
		<td>
			<input style="cursor: pointer;"  type="button" id="generate" class="button_example" value="GRAPH" />
		</td>
		<td>
			<input style="cursor: pointer;" type="button" id="txtclickpdf" value="Click to Generate Report">
		</td>
	</tr>
</table>	
</div>
<p class="instructions">View Your Report Here</p>
<div id="contentsholder" class="flexcroll" style="width:99.5%; height:950px; overflow-x:hidden !important; overflow-y:hidden;">
<div id="container1"></div>
<div style="height:50px;"></div>
<p><span style="color:red; font-size:18px;">Note:</span>These values present in the Bar Chart and Pie chart are taken from household entry and the values present in the graph are not on the basis of live data.</p>
<div style="height:50px;"></div>
<div id="container"></div>

</div>
</div>

</div>

<script>

$("#txtclickpdf").click(function() {
	var ddlpanchayat = $("#ddlpanchayat").val();
	var txtyear = $('#txtyear').val();
	var txtreportlevel = $('#txtreportlevel').val();
	var txttaluk = $('#txttaluk').val();
	var txtdistrict = $('#txtdistrict').val();
	var txtdivision = $('#txtdivision').val();
	var txtstate = $('#txtstate').val();
	document.getElementById('txtpanchayat').value = ddlpanchayat;
	var txtpanchayat = $('#txtpanchayat').val();
	var dataString =  'txtyear='+txtyear+'&txtreportlevel='+txtreportlevel+'&txttaluk='+txttaluk+'&txtdistrict='+txtdistrict+'&txtdivision='+txtdivision+'&txtstate='+txtstate+'&txtpanchayat='+txtpanchayat;
	if(txtyear=='' ||  txtreportlevel == ''){   
		alert("Please select all the values to generate PDF!!");
    }	
	else{
	$.ajax({  
		type: "POST",  
		success: function(msg){  
			var dataStringone =  'txtpanchayat='+txtpanchayat+'&txtyear='+txtyear+'&txtreportlevel='+txtreportlevel+'&txttaluk='+txttaluk+'&txtdistrict='+txtdistrict+'&txtdivision='+txtdivision+'&txtstate='+txtstate;
			var url = "<?php echo fuel_url('childgeneral_report/childcastewise_multiple_pdf');?>/?"+dataStringone;
		    window.open(url);
		}  
	}); 
	}
});

$("#generate").click(function() {
	var agebreakup = $('#ddlagebreakup').val();
	var panchayat = $('#ddlpanchayat').val();
	document.getElementById('txtpanchayat').value = ddlpanchayat;
	var txtpanchayat = $('#txtpanchayat').val();
	
		castewisereport_multiple_bar(); // alert('graph will get generated');
		castewisereport_multiple_pie(); // alert('graph will get generated');
	

	
});


function castewisereport_multiple_pie(){ 
var ddlpanchayat = $("#ddlpanchayat").val();
document.getElementById('txtpanchayat').value = ddlpanchayat;
	var txtpanchayat = $('#txtpanchayat').val();
	//alert(txtpanchayat);
	$.ajax({
	  	type: "POST",
		url	: "<?php echo fuel_url('childgeneral_report/castewisereport_multiple_pie');?>",  
		data: "txtpanchayat="+txtpanchayat,	
	}).done(function(yearData) {
		drawCastewisereport_pie(yearData); 
	});
}	


drawCastewisereport_pie = function (yearData)  {

var d=JSON.parse(yearData);
var name = Array();
var data = Array();
var dataArrayFinal = Array();
for(i=0;i<d.length;i++) { 
   name[i] = d[i].name; 
   data[i] = d[i].data;  
}

for(j=0;j<name.length;j++) { 
   var temp = new Array(name[j],data[j]); 
   dataArrayFinal[j] = temp;     
}

    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Castewise Report Base on mulltiple Panchayat'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
      type: 'pie',
      name: 'Browser share',
      data: dataArrayFinal
}]
    });
}





function castewisereport_multiple_bar(){ 
var ddlpanchayat = $("#ddlpanchayat").val();
	document.getElementById('txtpanchayat').value = ddlpanchayat;
	var txtpanchayat = $('#txtpanchayat').val();
	$.ajax({
	  	type: "POST",
		url	: "<?php echo fuel_url('childgeneral_report/castewisereport_multiple_bar');?>",  data: "txtpanchayat="+txtpanchayat,		
	}).done(function(retData) {
		drawCastewisereport(retData); 
	});
}



drawCastewisereport = function (retData)  {
//alert(retData);
	var data1=JSON.parse(retData);
	var male03=data1[0].entryagemale03;
	var male36=data1[0].entryagemale36;
	var male614=data1[0].entryagemale614;
	var male1418=data1[0].entryagemale618;
	var female03=data1[0].entryagefemale03;
	var female36=data1[0].entryagefemale36;
	var female614=data1[0].entryagefemale614;
	var female1418=data1[0].entryagefemale618;

 $('#container1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Castewise Report Base on mulltiple Panchayat'
            },
            
            xAxis: {
                categories: [
                    'Castewise Report Base on mulltiple Panchayat'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Age (year)'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
	
            series: [
			{
                name: 'Male 0-3',
                data: [male03]
    
            },
			{
                name: 'Male 3-6',
                data: [male36]
    
            }, {
                name: 'Male 6-14',
                data: [male614]
    
            }, {
                name: 'Male 14-18',
                data: [male1418]
    
            }, {
                name: 'Female 0-3',
                data: [female03]
    
            } , 

			{
                name: 'Female 3-6',
                data: [female36]
    
            }, {
                name: 'Female 6-14',
                data: [female614]
    
            }, {
                name: 'Female 14-18',
                data: [female1418]
    
            }, 
			]
        });
	}

</script>

