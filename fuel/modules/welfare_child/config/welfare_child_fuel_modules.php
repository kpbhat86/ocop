<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['welfare_child'] = array(
		'module_name' => 'PROTECTION',
		'module_uri' => 'welfare_child',
		'model_name' => 'welfare_child_model',
		'model_location' => 'welfare_child',
		'permission' => 'welfare_child',
		'nav_selected' => 'welfare_child',
		'instructions' => lang('module_instructions', 'welfare_child'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
