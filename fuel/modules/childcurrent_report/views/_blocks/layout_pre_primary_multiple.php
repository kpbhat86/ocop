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
			var url = "<?php echo fuel_url('childcurrent_report/childpre_primary_multiple_pdf');?>/?"+dataStringone;
		    window.open(url);
		}  
	}); 
	}
});

$("#generate").click(function() {
	var agebreakup = $('#ddlagebreakup').val();
	var panchayat = $('#ddlpanchayat').val();
	var village = $('#ddlvillage').val();
	if(agebreakup=='' || panchayat == ''  || village == ''){   
		alert("Select All the Value before you click GRAPH!!");
    }
	else{
		preprimary_multiplebargraph(); // alert('graph will get generated');
		preprimary_multiplepie(); // alert('graph will get generated');
	}
	
});

function preprimary_multiplebargraph(){ 
var ddlpanchayat = $("#ddlpanchayat").val();
	document.getElementById('txtpanchayat').value = ddlpanchayat;
	var txtpanchayat = $('#txtpanchayat').val();
	$.ajax({
	  	type: "POST",
		url	: "<?php echo fuel_url('childcurrent_report/preprimary_multiplebargraph');?>",  
        data: "txtpanchayat="+txtpanchayat,	
	}).done(function(retData) {
		drawprimarybargraph(retData); 
	});
}

function preprimary_multiplepie(){ 
var ddlpanchayat = $("#ddlpanchayat").val();
document.getElementById('txtpanchayat').value = ddlpanchayat;
	var txtpanchayat = $('#txtpanchayat').val();
	$.ajax({
	  	type: "POST",
		url	: "<?php echo fuel_url('childcurrent_report/preprimary_multiplepie');?>",  
       	data: "txtpanchayat="+txtpanchayat,	
	}).done(function(yearData) {
		drawbirthregister_pie(yearData); 
	});
}	


drawbirthregister_pie = function (yearData)  {
//alert(yearData);
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
            text: 'Pre-Primary - Wise Childrens Population (General Age Break up)'
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

drawprimarybargraph = function (retData)  {
//alert(retData);
	var chart = nv.models.multiBarChart();

    chart.x(function(d) { return d.label; });
	chart.y(function(d) { return d.value; });

    d3.select('#chart svg')
        .datum(birthregbarData(retData))
      .transition().duration(500).call(chart);

    nv.utils.windowResize(chart.update);

    return chart;
}

function birthregbarData(retData) {

	var data11=JSON.parse(retData);
	var male03=data11[0].entryagemale03;
	var male36=data11[0].entryagemale36;
	var male614=data11[0].entryagemale614;
	var male1418=data11[0].entryagemale618;
	var female03=data11[0].entryagefemale03;
	var female36=data11[0].entryagefemale36;
	var female614=data11[0].entryagefemale614;
	var female1418=data11[0].entryagefemale618;

 $('#container1').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Pre-Primary Childrens Population (General Age Break up)'
            },
            
            xAxis: {
                categories: [
                    'Pre-Primary Childrens Population (General Age Break up)'
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
  
function loadfolderlist() {
	var state = $("#txtstate").val();
	var division = $("#txtdivision").val();
	var district = $("#txtdistrict").val();
	var taluk = $("#txttaluk").val();
	var panchayat = $("#ddlpanchayat").val();
	var village = $("#ddlvillage").val();
	$('#DynamicGrid_2').hide();
	var loading = '<div id="DynamicGridLoading_2"> '+
            	   ' <img src="<?=img_path() ?>loading.gif" /><span> Loading Report... </span> '+ 
    	    	   ' </div>';
    $("#content").empty();
	$('#content').html(loading);
    $.ajax({
        type: "POST",
        url: "<?php echo fuel_url('childgeneral_report/reportgenerate');?>",
        data: "txtstate=" + state+ "&txtdivision="+division+"&txtdistrict="+district+"&txttaluk="+taluk+"&ddlpanchayat="+panchayat+"&ddlvillage="+village,
        dataType: "json"
        }).done(function( msg ) {
			if(msg.length == 0) {
			$('#DynamicGrid_2').hide();
			$('#DynamicGridLoading_2').hide();
			var loading1 = '<div id="error_msg"> '+
                           'No Result!'+ 
						   '</div>';
			$('#content').html(loading1);  
			} else{
            var partydata = [];
            for (var i = 0; i < msg.length; i++) {
            var item = msg[i];
            var thisdata = {};
            thisdata["Male 0-3 Population"] = item.threeyearsmale;
			thisdata["Male 3-6 Population"] = item.sixyearsmale;
            thisdata["Male 6-14 Population"] = item.fourteenyearsmale;
            thisdata["Male 14-18 Population"] = item.eighteenyearsmale;
            thisdata["Female 0-3 Population"] = item.threeyearsfemale;
            thisdata["Female 3-6 Population"] = item.sixyearsfemale;
            thisdata["Female 6-14 Population"] = item.fourteenyearsfemale;
            thisdata["Female 14-18 Population"] = item.eighteenyearsfemale;			
            partydata.push(thisdata);
			}
			if (partydata.length) {
            // If there are files
				$('#DynamicGrid_2').hide();
				$('#DynamicGridLoading_2').hide();
				$('#content').html(CreateTableViewX(partydata, "lightPro", true)); 
				var lcScrollbar = $('#contentsholder');	 
				fleXenv.updateScrollBars(lcScrollbar); 
				$(".ico_coil_delete").click(function (e) {
                // When a delete icon is clicked, stop the href action
                //  and do an ajax call to delete it instead
                e.preventDefault();
                //var data = {account_name: account};
                var href = $(this).attr('href');
                $.post(href, function (d) {
                loadfolderlist();
                });
                });
			} else {
				$('#DynamicGrid_2').hide();
				$('#DynamicGridLoading_2').hide();
				var loading1 = '<div id="error_msg"> '+
							   'No Result!'+ 
							   '</div>';
				$('#content').html(loading1); 
				var lfScrollbar = $('#contentsholder');	 
				fleXenv.updateScrollBars(lfScrollbar);  
                }
			}
    });
}
 
function loadoneyearfolder(){
	$('#DynamicGrid_2').hide();
	var loading = '<div id="DynamicGridLoading_2"> '+
            	   ' <img src="<?=img_path() ?>loading.gif" /><span> Loading Report... </span> '+ 
    	    	   ' </div>';
    $("#content").empty();
	$('#content').html(loading);
    $.ajax({
        type: "POST",
        url: "<?php echo fuel_url('childgeneral_report/reportgenerateyearly');?>",
        data: "",
        dataType: "json"
        }).done(function( msg ) {
			if(msg.length == 0) {
			$('#DynamicGrid_2').hide();
			$('#DynamicGridLoading_2').hide();
			var loading1 = '<div id="error_msg"> '+
                           'No Result!'+ 
						   '</div>';
			$('#content').html(loading1);  
			} else{
            var partydata = [];
            for (var i = 0; i < msg.length; i++) {
            var item = msg[i];
            var thisdata = {};
            thisdata["Male 0-1"] = item.threeyearsmale;
	    thisdata["Male 1-2"] = item.sixyearsmale;
            thisdata["Male 2-3"] = item.fourteenyearsmale;
            thisdata["Male 3-4"] = item.eighteenyearsmale;
            thisdata["Female 0-1"] = item.threeyearsfemale;
            thisdata["Female 1-2"] = item.sixyearsfemale;
            thisdata["Female 2-3"] = item.fourteenyearsfemale;
            thisdata["Female 3-4"] = item.eighteenyearsfemale;			
            partydata.push(thisdata);
			}
			if (partydata.length) {
            // If there are files
				$('#DynamicGrid_2').hide();
				$('#DynamicGridLoading_2').hide();
				$('#content').html(CreateTableViewX(partydata, "lightPro", true)); 
				var lcScrollbar = $('#contentsholder');	 
				fleXenv.updateScrollBars(lcScrollbar); 
				$(".ico_coil_delete").click(function (e) {
                // When a delete icon is clicked, stop the href action
                //  and do an ajax call to delete it instead
                e.preventDefault();
                //var data = {account_name: account};
                var href = $(this).attr('href');
                $.post(href, function (d) {
                loadfolderlist();
                });
                });
			} else {
				$('#DynamicGrid_2').hide();
				$('#DynamicGridLoading_2').hide();
				var loading1 = '<div id="error_msg"> '+
							   'No Result!'+ 
							   '</div>';
				$('#content').html(loading1); 
				var lfScrollbar = $('#contentsholder');	 
				fleXenv.updateScrollBars(lfScrollbar);  
                }
			}
    });
}
 
 
 /* Print Preview*/
    $(function() {
            /*
             * Initialise example carousel
             */
            $("#feature > div").scrollable({interval: 2000}).autoscroll();
            
            /*
             * Initialise print preview plugin
             */
            // Add link for print preview and intialise
            $('#aside').prepend('<a class="print-preview">Print this page</a>');
            $('a.print-preview').printPreview();
            
            // Add keybinding (not recommended for production use)
            $(document).bind('keydown', function(e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (code == 80 && !$('#print-modal').length) {
                    $.printPreview.loadPrintPreview();
                    return false;
                }            
            });
        });
</script>

