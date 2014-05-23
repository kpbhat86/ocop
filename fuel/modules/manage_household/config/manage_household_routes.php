<?php 
$route[FUEL_ROUTE.'manage_household'] = FUEL_FOLDER.'/module';
$route[FUEL_ROUTE.'manage_household/(.*)'] = FUEL_FOLDER.'/module/$1';
$route[FUEL_ROUTE.'manage_household'] = 'manage_household';
$route[FUEL_ROUTE.'manage_household/example'] = 'manage_household/example';
$route[FUEL_ROUTE.'manage_household/householdlist'] = 'manage_household/householdlist';
$route[FUEL_ROUTE.'manage_household/deletehousehold'] = 'manage_household/deletehousehold';