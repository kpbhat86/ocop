<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['father_data'] = array(
		'module_name' => 'Father_data',
		'module_uri' => 'father_data',
		'model_name' => 'father_data_model',
		'model_location' => 'father_data',
		'permission' => 'father_data',
		'nav_selected' => 'father_data',
		'instructions' => lang('module_instructions', 'father_data'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
