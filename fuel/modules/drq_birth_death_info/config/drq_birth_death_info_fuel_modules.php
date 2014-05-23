<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['drq_birth_death_info'] = array(
		'module_name' => 'Still Birth / Death Information',
		'module_uri' => 'drq_birth_death_info',
		'model_name' => 'drq_birth_death_info_model',
		'model_location' => 'drq_birth_death_info',
		'permission' => 'drq_birth_death_info',
		'nav_selected' => 'drq_birth_death_info',
		'instructions' => lang('module_instructions', 'drq_birth_death_info'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
