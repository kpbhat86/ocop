<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['manage_household'] = array(
		'module_name' => 'Manage Household',
		'module_uri' => 'manage_household',
		'model_name' => 'manage_household_model',
		'model_location' => 'manage_household',
		'permission' => 'manage_household',
		'nav_selected' => 'manage_household',
		'instructions' => lang('module_instructions', 'manage_household'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
