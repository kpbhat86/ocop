<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['household'] = array(
		'module_name' => 'CREATE HOUSEHOLD ENTRY',
		'module_uri' => 'household',
		'model_name' => 'household_model',
		'model_location' => 'household',
		'permission' => 'household',
		'nav_selected' => 'household',
		'instructions' => lang('module_instructions', 'household'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
