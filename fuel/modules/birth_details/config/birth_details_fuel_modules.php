<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['birth_details'] = array(
		'module_name' => 'ENTER BIRTH DETAILS',
		'module_uri' => 'birth_details',
		'model_name' => 'birth_details_model',
		'model_location' => 'birth_details',
		'permission' => 'birth_details',
		'nav_selected' => 'birth_details',
		'instructions' => lang('module_instructions', 'birth_details'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
