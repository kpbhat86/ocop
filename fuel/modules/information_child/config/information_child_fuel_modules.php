<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['information_child'] = array(
		'module_name' => 'Genearl',
		'module_uri' => 'information_child',
		'model_name' => 'information_child_model',
		'model_location' => 'information_child',
		'permission' => 'information_child',
		'nav_selected' => 'information_child',
		'instructions' => lang('module_instructions', 'information_child'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
