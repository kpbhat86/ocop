<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['general_info'] = array(
		'module_name' => 'General Info',
		'module_uri' => 'general_info',
		'model_name' => 'general_info_model',
		'model_location' => 'general_info',
		'permission' => 'general_info',
		'nav_selected' => 'general_info',
		'instructions' => lang('module_instructions', 'general_info'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
