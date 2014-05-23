<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['drq_general_info'] = array(
		'module_name' => 'General Death Info',
		'module_uri' => 'drq_general_info',
		'model_name' => 'drq_general_info_model',
		'model_location' => 'drq_general_info',
		'permission' => 'drq_general_info',
		'nav_selected' => 'drq_general_info',
		'instructions' => lang('module_instructions', 'drq_general_info'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
