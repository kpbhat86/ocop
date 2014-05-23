<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['guardian_data'] = array(
		'module_name' => 'Guardian data',
		'module_uri' => 'guardian_data',
		'model_name' => 'guardian_data_model',
		'model_location' => 'guardian_data',
		'permission' => 'guardian_data',
		'nav_selected' => 'guardian_data',
		'instructions' => lang('module_instructions', 'guardian_data'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
