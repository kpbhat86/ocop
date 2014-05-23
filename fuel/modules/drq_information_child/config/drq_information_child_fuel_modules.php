<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['drq_information_child'] = array(
		'module_name' => 'Summary Of Questionnaire',
		'module_uri' => 'drq_information_child',
		'model_name' => 'drq_information_child_model',
		'model_location' => 'drq_information_child',
		'permission' => 'drq_information_child',
		'nav_selected' => 'drq_information_child',
		'instructions' => lang('module_instructions', 'drq_information_child'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
