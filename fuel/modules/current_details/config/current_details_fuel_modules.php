<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['current_details'] = array(
		'module_name' => 'Current Details',
		'module_uri' => 'current_details',
		'model_name' => 'current_details_model',
		'model_location' => 'current_details',
		'permission' => 'current_details',
		'nav_selected' => 'current_details',
		'instructions' => lang('module_instructions', 'current_details'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
