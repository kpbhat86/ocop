<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['childcurrent_report'] = array(
		'module_name' => 'Childrens Current Details',
		'module_uri' => 'childcurrent_report',
		'model_name' => 'childcurrent_report',
		'model_location' => 'childcurrent_report',
		'permission' => 'childcurrent_report',
		'nav_selected' => 'childcurrent_report',
		'instructions' => lang('module_instructions', 'childcurrent_report'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
	);
