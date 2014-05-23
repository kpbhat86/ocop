<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['education'] = array(
		'module_name' => 'Education',
		'module_uri' => 'education',
		'model_name' => 'education_model',
		'model_location' => 'education',
		'permission' => 'education',
		'nav_selected' => 'education',
		'instructions' => lang('module_instructions', 'education'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
