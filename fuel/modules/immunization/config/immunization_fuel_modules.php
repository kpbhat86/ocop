<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['immunization'] = array(
		'module_name' => 'immunization',
		'module_uri' => 'immunization',
		'model_name' => 'immunization_model',
		'model_location' => 'immunization',
		'permission' => 'immunization',
		'nav_selected' => 'immunization',
		'instructions' => lang('module_instructions', 'immunization'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
