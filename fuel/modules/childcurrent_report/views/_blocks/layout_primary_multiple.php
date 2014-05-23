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
			var url = "<?php echo fuel_url('childcurrent_report/childprimary_multiple_pdf');?>/?"+dataStringone;
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
		primarybargraph(); // alert('graph will get generated');
		primarypie(); // alert('graph will get generated');
	}
	
});

function primarybargraph(){ 
var village = $('#ddlvillage').val();
	$.ajax({
	  	type: "POST",
		url	: "<?php echo fuel_url('childcurrent_report/primarybargraph');?>",  
        data: "ddlvillage="+village,	
	}).done(function(retData) {
		drawprimarybargraph(retData); 
	});
}

function primarypie(){ 
var village = $('#ddlvillage').val();
	$.ajax({
	  	type: "POST",
		url	: "<?php echo fuel_url('childcurrent_report/primarypie');?>",  
        data: "ddlvillage="+village,	
	}).done(function(yearData) {
		drawprimarypie(yearData); 
	});
}	

drawprimarypie = function (yearData)  {

var Data= eval(yearData);
	var chart;
    var width = 500,
        height = 350;

    chart = nv.models.pieChart()
        .x(function(d) { return d.primary_typesurvey })
        .y(function(d) { return d.value})
        .showLabels(true)
        .values(function(d) { return d })
      //  .color(d3.scale.category10().range())
        .width(width)
        .height(height);

      d3.select("#test1")
          .datum([Data])
        .transition().duration(1200)
          .attr('width', width)
          .attr('height', height)
          .call(chart);

    chart.dispatch.on('stateChange', function(e) { nv.log('New State:', JSON.stringify(e)); });

    return chart;
}

drawprimarybargraph = function (retData)  {

	var chart = nv.models.multiBarChart();

    chart.x(function(d) { return d.label; });
	chart.y(function(d) { return d.value; });

    d3.select('#chart svg')
        .datum(exampleData(retData))
      .transition().duration(500).call(chart);

    nv.utils.windowResize(chart.update);

    return chart;
}

function exampleData(retData) {
dataparse=JSON.parse(retData);
	var male03=dataparse.entryagemale03;
	var male36=dataparse.entryagemale36;
	var male614=dataparse.entryagemale614;
	var male1418=dataparse.entryagemale618;
	var female03=dataparse.entryagefemale03;
	var female36=dataparse.entryagefemale36;
	var female614=dataparse.entryagefemale614;
	var female1418=dataparse.entryagefemale618;
   return [
  {
    "key": "Male",
    "color": "#d62728",
    "values": [

      { 
        "label" : "6-14years" ,
        "value" : male614
      } , 
      { 
        "label" : "14-18years" ,
        "value" : male1418
      }
    ]
  },
  {
    "key": "Female",
    "color": "#1f77b4",
    "values": [
   
      { 
        "label" : "6-14years" ,
        "value" : female614
      } , 
      { 
        "label" : "14-18years" ,
        "value" : female1418
      } 
    ]
  }
];
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

