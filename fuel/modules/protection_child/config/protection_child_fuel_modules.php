<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['protection_child'] = array(
		'module_name' => 'PROTECTION',
		'module_uri' => 'protection_child',
		'model_name' => 'protection_child_model',
		'model_location' => 'protection_child',
		'permission' => 'protection_child',
		'nav_selected' => 'protection_child',
		'instructions' => lang('module_instructions', 'protection_child'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
