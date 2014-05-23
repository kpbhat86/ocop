<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['education_child'] = array(
		'module_name' => 'EDUCATION',
		'module_uri' => 'education_child',
		'model_name' => 'education_child_model',
		'model_location' => 'education_child',
		'permission' => 'education_child',
		'nav_selected' => 'education_child',
		'instructions' => lang('module_instructions', 'education_child'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
