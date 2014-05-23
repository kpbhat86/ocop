<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['drq_immunization'] = array(
		'module_name' => 'Death Immunization',
		'module_uri' => 'drq_immunization',
		'model_name' => 'drq_immunization_model',
		'model_location' => 'drq_immunization',
		'permission' => 'drq_immunization',
		'nav_selected' => 'drq_immunization',
		'instructions' => lang('module_instructions', 'drq_immunization'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
