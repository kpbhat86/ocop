<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['manage_ocop'] = array(
		'module_name' => 'Manage OCOP',
		'module_uri' => 'manage_ocop',
		'model_name' => 'manage_ocop_model',
		'model_location' => 'manage_ocop',
		'permission' => 'manage_ocop',
		'nav_selected' => 'manage_ocop',
		'instructions' => lang('module_instructions', 'manage_ocop'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
