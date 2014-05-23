<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
    </script>
<div id="main_content_inner">
<p class="instructions">Manage your OCOP forms here.</p>
<div id="tabs">
    <ul>
        <li><a href="#tabs-1">Main Lists</a></li>
        <li><a href="#tabs-2">OCOP Lists</a></li>
    </ul>
<div id="main_content" style="overflow:hidden;"> 

<!-- MAIN PARTWISE @START -->
	<div id="tabs-1">
		<div id="party_list">
			<div id="contentsfolder" class="flexcroll" style="width:100%; height:580px; overflow-x:hidden; overflow-y:auto;">
				<div id="partycontent" style="width:100%; min-height:550px; overflow:hidden;"> 
					<div id="DynamicGridp_2">
						OCOP Summary Lists
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- @END -->

<!-- SUB PARTWISE @START -->
	<div id="tabs-2" style="height:600px;"> 
		<div id="pr-content" style="width:100%">
			<h2 class="innercellpr" style="margin-bottom:0px !important;"><div class="pr-content-title">List for <span class="container_root" id="pr_container_name">/</span> Household <span class="container_root" id="pr_container_name2">/</span>:</div></h2>
			<div id="contentsholder" class="flexcroll" style="width:100%; height:550px; overflow-x:hidden; overflow-y:auto;">
				<div id="contentn">
				</div>
				<h3> General Info </h3>
				<div id="contentgi" style="padding-bottom:5px;"> 
					<div id="DynamicGrid_gi">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Birth Details </h3>
				<div id="contentbd" style="padding-bottom:5px;"> 
					<div id="DynamicGrid_bd">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Current Details </h3>
				<div id="contentcd" style="padding-bottom:5px;">
					<div id="DynamicGrid_cd">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Immunization </h3>
				<div id="contentim" style="padding-bottom:5px;">
					<div id="DynamicGrid_im">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Education </h3>
				<div id="contentedu" style="padding-bottom:5px;">
					<div id="DynamicGrid_edu">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Protection </h3>
				<div id="contentpro" style="padding-bottom:5px;">
					<div id="DynamicGrid_pro">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Welfare </h3>
				<div id="contentwf" style="padding-bottom:5px;">
					<div id="DynamicGrid_wf">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Data of mother </h3>
				<div id="contentdom" style="padding-bottom:5px;">
					<div id="DynamicGrid_dom">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Data of father </h3>
				<div id="contentdof" style="padding-bottom:5px;">
					<div id="DynamicGrid_dof">
						Select a Parent Summary lists
					</div>
				</div>
				<h3> Data of Guardian </h3>
				<div id="contentdog" style="padding-bottom:5px;">
					<div id="DynamicGrid_dog">
						Select a Parent Summary lists
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- @END -->

</div>
</div>

<script type="text/javascript">
function loadfolderlist() {
	$('#DynamicGridp_2').hide();
	var loading = '<div id="DynamicGridLoadingp_2"> '+
            	   ' <img src="<?=img_path() ?>loading.gif" /><span> Loading OCOP Summary Lists... </span> '+ 
    	    	   ' </div>';
    $("#partycontent").empty();
	$('#partycontent').html(loading);
    $("#pr_container_name").html("/");
    $.ajax({
        type: "POST",
        url: "<?php echo fuel_url('manage_ocop/listprimary');?>",
        data: "",
        dataType: "json"
        }).done(function( msg ) {
			if(msg.length == 0) {
			$('#DynamicGridp_2').hide();
			$('#DynamicGridLoadingp_2').hide();
			var loading1 = '<div id="error_msg"> '+
                           'No Result!'+ 
						   '</div>';
			$('#partycontent').html(loading1);  
			} else{
            var partydata = [];
            for (var i = 0; i < msg.length; i++) {
            var item = msg[i];
            var thisdata = {};
			var selectcoil = '<input type="radio" id="radio_'+item.sid+'" name="list" value="'+item.sid+'"   onClick=showchild('+item.sid+',"'+item.hid+'","'+item.cname+'") />';
			thisdata["select"] = selectcoil;
			//thisdata["id"] = item.sid;
            thisdata["household"] = item.hid;
            thisdata["head of family"] = item.hof;
            thisdata["child name"] = item.cname;
            thisdata["gender"] = item.gender;
            thisdata["age"] = item.age;
            thisdata["date"] = item.entrydate;
			var ci = '<a title="Edit OCOP Summary" href="'+item.ci+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
			var dl = '<a class="ico_coil_delete" title="Delete OCOP Summary" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
            thisdata["action"] = ci + dl;
			//thisdata["action"] = '';
            partydata.push(thisdata);
			}
			if (partydata.length) {
            // If there are files
				$('#DynamicGridp_2').hide();
				$('#DynamicGridLoadingp_2').hide();
				$('#partycontent').html(CreateTableViewX(partydata, "lightPro", true)); 
				var lcScrollbar = $('#contentsholder');	 
				fleXenv.updateScrollBars(lcScrollbar); 
				$(".ico_coil_delete").click(function (e) {
					e.preventDefault();
					var href = $(this).attr('href');
					$.post(href, function (d) {
					loadfolderlist();
                });
                });
			} else {
				$('#DynamicGridp_2').hide();
				$('#DynamicGridLoadingp_2').hide();
				var loading1 = '<div id="error_msg"> '+
							   'No Result!'+ 
							   '</div>';
				$('#partycontent').html(loading1); 
				var lfScrollbar = $('#contentsfolder');	 
				fleXenv.updateScrollBars(lfScrollbar);  
                }
			}
    });
}

function showchild(parentid, householdid, childname) {
	$('#pr_container_name').html(childname);
	$('#pr_container_name2').html(householdid);
	 $('#DynamicGrid_gi').hide();
	 $('#DynamicGrid_bd').hide();
	 $('#DynamicGrid_cd').hide();
	 $('#DynamicGrid_im').hide();
	 $('#DynamicGrid_edu').hide();
	 $('#DynamicGrid_pro').hide();
	 $('#DynamicGrid_wf').hide();
	 $('#DynamicGrid_dom').hide();
	 $('#DynamicGrid_dof').hide();
	 $('#DynamicGrid_dog').hide();
	 var loading = '<div id="DynamicGridLoading_2"> '+
            	   ' <img src="<?=img_path() ?>loading.gif" /><span> Loading OCOP lists... </span> '+ 
    	    	   ' </div>';
	 $('#contentn').html(loading); 
	/* General Info */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_gi');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_gi').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentgi').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit General Info" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_gi" title="Delete General Info" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentgi').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_gi").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_gi').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentgi').html(loading1);  
                        }
					}
				});
	
	/* Birth Details */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_bd');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_bd').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentbd').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Birth Details" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_coil_delete" title="Delete Birth Details" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentbd').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_bd").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_bd').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentbd').html(loading1);  
                        }
					}
				});
	
	/* Current Details */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_cd');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_cd').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentcd').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Current Details" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_cd" title="Delete Current Details" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentcd').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_cd").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_cd').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentcd').html(loading1);  
                        }
					}
				});
	
	/* Immunization */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_im');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_im').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentim').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Immunization" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_im" title="Delete Immunization" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentim').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_im").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_im').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentim').html(loading1);  
                        }
					}
				});
	
	/* Education */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_edu');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_edu').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentedu').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Education" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_edu" title="Delete Education" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentedu').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_edu").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_edu').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentedu').html(loading1);  
                        }
					}
				});
	
	/* Protection */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_pro');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_pro').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentpro').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Protection" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_pro" title="Delete Protection" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentpro').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_pro").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_pro').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentpro').html(loading1);  
                        }
					}
				});
	
	/* Welfare */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_wf');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_wf').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentwf').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Welfare" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_wf" title="Delete Welfare" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentwf').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_wf").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_wf').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentwf').html(loading1);  
                        }
					}
				});
	
	/* Data of mother */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_dom');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_dom').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentdom').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Data of Mother" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_dom" title="Delete Data of Mother" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentdom').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_dom").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
								});
							});
							} else {
								$('#DynamicGrid_dom').hide();
								$('#DynamicGridLoading_2').hide();
								var loading1 = '<div id="error_msg"> '+
											'No Result!'+ 
											'</div>';
								$('#contentdom').html(loading1);  
							}
						}
					});
	
	/* Data of father */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_dof');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_dof').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentdof').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Data of Father" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_dof" title="Delete Data of Father" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentdof').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_dof").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_dof').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentdof').html(loading1);  
                        }
					}
				});
	
	/* Data of Gaurdian */
		$.ajax({
				type: "POST",
				url: "<?php echo fuel_url('manage_ocop/list_secondary_dog');?>",
                // Parent ID
				data: "sid=" + parentid,
                dataType: "json"
				}).done(function(msg) {
					if(msg.length == 0) {
						 $('#DynamicGrid_dog').hide();
						 $('#contentn').hide();
						 $('#DynamicGridLoading_2').hide();
						 var loading1 = '<div id="error_msg"> '+
                                        'No Result!'+ 
									    '</div>';
						 $('#contentdom').html(loading1);  
					} else{
						var data = [];
                        for (var i = 0; i < msg.length; i++) {
                            var item = msg[i];
                            var thisdata = {};
                            thisdata["form name"] = item.forms;
							thisdata["Household"] = item.hid;
                            thisdata["child name"] = item.childname;
                            thisdata["date"] = item.edate;
							var ci = '<a title="Edit Data Of Guardian" href="'+item.edit+'"><img src="<?php echo img_path('iconset/ico_edit.png'); ?>" /></a>';
							var dl = '<a class="ico_delete_dog" title="Delete Data Of Guardian" href="'+item.dl+'"><img src="<?php echo img_path('iconset/ico_cancel.png'); ?>" /></a>';
							thisdata["action"] = ci + dl;
                            data.push(thisdata);
                        }
						if (data.length) {
                            $('#contentdog').html(CreateTableViewX(data, "lightPro", true)); 
							$(".ico_delete_dog").click(function (e) {
								e.preventDefault();
								var data = {parentid: parentid, householdid: householdid, childname: childname };
								var href = $(this).attr('href');
								$.post(href, data, function (d) {
								showchild(parentid, householdid, childname);
							});
							});
						} else {
							$('#DynamicGrid_dog').hide();
							$('#DynamicGridLoading_2').hide();
							var loading1 = '<div id="error_msg"> '+
										'No Result!'+ 
									    '</div>';
							$('#contentdog').html(loading1);  
                        }
					}
				});
}
</script>
</div>