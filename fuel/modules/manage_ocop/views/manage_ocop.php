<script type="text/javascript">
function load_party_account() {
    loadfolderlist();
    $('#content').html('OCOP - Summary Of Questionnaire Entry');
}

function refresh_folderlist() {
    load_party_account();
}

$(document).ready(function() {
    load_party_account();
});
</script> 

<div id="main_top_panel">
	<h2 class="ico ico_general_info">Manage OCOP</h2>
</div>

<?php include_once(MANAGE_OCOP_PATH.'views/_blocks/toolbar.php');?>		
<?php include_once(MANAGE_OCOP_PATH.'views/_blocks/layout.php');?>		
 
