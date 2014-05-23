<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['mother_data'] = array(
		'module_name' => 'Data of Mother',
		'module_uri' => 'mother_data',
		'model_name' => 'mother_data_model',
		'model_location' => 'mother_data',
		'permission' => 'mother_data',
		'nav_selected' => 'mother_data',
		'instructions' => lang('module_instructions', 'mother_data'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
