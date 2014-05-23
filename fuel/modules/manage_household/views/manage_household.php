<script type="text/javascript">
/*function load_party_account() {
    //var hid = "<?php echo $hid; ?>";
    loadfolderlist();
    $('#content').html('Household List!');
}

function refresh_folderlist() {
    load_party_account();
}*/
$(document).ready(function() { 
    loadfolderlist();
    //$('#content').html('Household Entry List!');
});
</script>

<div id="main_top_panel">
	<h2 class="ico ico_manage_household">Manage Household</h2>
</div>
<?php include_once(MANAGE_HOUSEHOLD_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(MANAGE_HOUSEHOLD_PATH.'views/_blocks/layout.php');?>		
 
