<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['childgeneral_report'] = array(
		'module_name' => 'Childrens General Info',
		'module_uri' => 'childgeneral_report',
		'model_name' => 'childgeneral_report',
		'model_location' => 'childgeneral_report',
		'permission' => 'childgeneral_report',
		'nav_selected' => 'childgeneral_report',
		'instructions' => lang('module_instructions', 'childgeneral_report'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
