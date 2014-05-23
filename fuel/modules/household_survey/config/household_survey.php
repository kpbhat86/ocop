<?php
/*
|--------------------------------------------------------------------------
| FUEL NAVIGATION: An array of navigation items for the left menu
|--------------------------------------------------------------------------
*/
//$config['nav']['inventory']['inventory_transfers'] = lang('module_inventory_transfers');
//$config['nav']['aspen_steel']['customers/create'] =  lang('module_create_customers');


//$config['nav']['household']['household_survey'] = lang('module_household_survey');
$config['modules']['household_survey'] = array(
	'module_name' => 'Household Survey',
	'module_uri' => 'household_survey',
	'permission' => 'household_survey',
	'nav_selected' => 'household_survey'
);