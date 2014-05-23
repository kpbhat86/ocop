<?php 
$route[FUEL_ROUTE.'general_info'] = FUEL_FOLDER.'/module';
$route[FUEL_ROUTE.'general_info/(.*)'] = FUEL_FOLDER.'/module/$1';
$route[FUEL_ROUTE.'general_info'] = 'general_info';
$route[FUEL_ROUTE.'general_info/example'] = 'general_info/example';
$route[FUEL_ROUTE.'general_info/childname'] = 'general_info/childname';
$route[FUEL_ROUTE.'general_info/childinfo'] = 'general_info/childinfo';
$route[FUEL_ROUTE.'general_info/savegeneralinfo'] = 'general_info/savegeneralinfo';
$route[FUEL_ROUTE.'general_info/checkrecord'] = 'general_info/checkrecord';
$route[FUEL_ROUTE.'general_info/getrecord'] = 'general_info/getrecord';
$route[FUEL_ROUTE.'general_info/updategeneralinfo'] = 'general_info/updategeneralinfo';
