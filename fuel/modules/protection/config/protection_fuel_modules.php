<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['protection'] = array(
		'module_name' => 'Protection',
		'module_uri' => 'protection',
		'model_name' => 'protection_model',
		'model_location' => 'protection',
		'permission' => 'protection',
		'nav_selected' => 'protection',
		'instructions' => lang('module_instructions', 'protection'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
