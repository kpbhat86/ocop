<div id="main_content_inner">
<p class="instructions">Manage your Household Entry and Survey here.</p>
<div id="contentsholder" class="flexcroll" style="width:99.5%; height:650px; overflow-x:hidden !important; overflow-y:auto;">
	<div id="content" style="width:99.5%; min-height:650px; overflow:hidden;"> 
		<div id="DynamicGrid_2">
			No Record!
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
function loadfolderlist() {
	$('#DynamicGrid_2').hide();
	var loading = '<div id="DynamicGridLoading_2"> '+
            	   ' <img src="<?=img_path() ?>loading.gif" /><span> Loading Household List... </span> '+ 
    	    	   ' </div>';
    $("#content").empty();
	$('#content').html(loading);
    $.ajax({
        type: "POST",
        url: "<?php echo fuel_url('manage_household/householdlist');?>",
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
			thisdata["household id"] = item.serialno;
            thisdata["household voter's id"] = item.hid;
			thisdata["head of family"] = item.hof;
            thisdata["door"] = item.doornumber;
            thisdata["district"] = item.district;
            thisdata["panchayat"] = item.panchayat;
            thisdata["totolpeople"] = item.totolpeople;
            thisdata["entrydate"] = item.edate;		
            var hedit = '<a class="ico_coil_edit" title="Edit Household Entry" href="#" onClick=edithentry("'+item.hid+'")><img src="<?php echo img_path('iconset/ico_household_edit.png'); ?>" /></a>';		
            var hsedit = '<a class="ico_coil_edit" title="Edit Household Survey" href="#" onClick=edithsurvey("'+item.hid+'")><img src="<?php echo img_path('iconset/ico_household_survey_edit.png'); ?>" /></a>';
			var hdl = '<a class="ico_coil_delete" title="Delete Household" href="#" onClick=deletehousehold("'+item.hid+'")><img src="<?php echo img_path('iconset/ico_delete_crt.png'); ?>" /></a>';
            thisdata["action"] = hedit+'&nbsp;&nbsp;&nbsp;'+hsedit+'&nbsp;&nbsp;&nbsp;'+hdl;
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

function edithentry(hid) {
	var dataString = 'hid='+hid+'&mode=edit';
	$.ajax({  
		type: "POST",  
		success: function(){
		setTimeout("location.href='<?= site_url('fuel/household'); ?>/?"+ dataString+"'", 1000);
		}
		});
}

function edithsurvey(hid) {
	var dataString = 'hid='+hid+'&mode=edit';
	$.ajax({  
		type: "POST",  
		success: function(){
		setTimeout("location.href='<?= site_url('fuel/household_survey'); ?>/?"+ dataString+"'", 1000);
		}
		});
}

function deletehousehold(hid) {
	var dataString = 'hid='+hid+'&mode=delete';
    var checkstr =  confirm('Are you sure you want to delete Household entry?');
	if(checkstr == true){
	$.ajax({  
		type: "GET",  
		url	: "<?php echo fuel_url('manage_household/deletehousehold');?>",  
		data: dataString,
		dataType: "json",
		success: function(){ 
			//alert(msg);
			//$("#check_bar").html(msg);
			/*setTimeout(function() {
				$("#check_bar").hide();
			}, 5000);*/
		}  
	});
	}else{
		return false;
    }
}
</script>