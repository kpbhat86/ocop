<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['welfare'] = array(
		'module_name' => 'Welfare',
		'module_uri' => 'welfare',
		'model_name' => 'welfare_model',
		'model_location' => 'welfare',
		'permission' => 'welfare',
		'nav_selected' => 'welfare',
		'instructions' => lang('module_instructions', 'welfare'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
