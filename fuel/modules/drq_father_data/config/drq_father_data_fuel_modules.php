<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['drq_father_data'] = array(
		'module_name' => 'Father_data',
		'module_uri' => 'drq_father_data',
		'model_name' => 'drq_father_data_model',
		'model_location' => 'drq_father_data',
		'permission' => 'drq_father_data',
		'nav_selected' => 'drq_father_data',
		'instructions' => lang('module_instructions', 'drq_father_data'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
