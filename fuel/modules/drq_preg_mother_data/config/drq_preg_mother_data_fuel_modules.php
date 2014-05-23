<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['drq_preg_mother_data'] = array(
		'module_name' => 'Mothers Death Details',
		'module_uri' => 'drq_preg_mother_data',
		'model_name' => 'drq_preg_mother_data_model',
		'model_location' => 'drq_preg_mother_data',
		'permission' => 'drq_preg_mother_data',
		'nav_selected' => 'drq_preg_mother_data',
		'instructions' => lang('module_instructions', 'drq_preg_mother_data'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
