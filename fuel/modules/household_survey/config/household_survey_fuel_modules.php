<?php
// included in the main config/MY_fuel_modules.php

$config['modules']['household_survey'] = array(
		'module_name' => 'Household Survey',
		'module_uri' => 'household_survey',
		'model_name' => 'household_survey_model',
		'model_location' => 'household_survey',
		'permission' => 'household_survey',
		'nav_selected' => 'household_survey',
		'instructions' => lang('module_instructions', 'household_survey'),
		'item_actions' => array('save', 'view', 'publish', 'activate', 'delete', 'duplicate', 'create')	
);	
		

