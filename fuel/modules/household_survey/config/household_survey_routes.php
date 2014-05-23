<?php 
//link the controller to the nav link

$route[FUEL_ROUTE.'household_survey'] = FUEL_FOLDER.'/module';
$route[FUEL_ROUTE.'household_survey/(.*)'] = FUEL_FOLDER.'/module/$1';
$route[FUEL_ROUTE.'household_survey'] = 'household_survey';
$route[FUEL_ROUTE.'household_survey/dashboard'] = 'household_survey/dashboard';
$route[FUEL_ROUTE.'household_survey/householdinfo'] = 'household_survey/householdinfo';
$route[FUEL_ROUTE.'household_survey/autosuggest'] = 'household_survey/autosuggest';
$route[FUEL_ROUTE.'household_survey/savehouseholdsurvey'] = 'household_survey/savehouseholdsurvey';
$route[FUEL_ROUTE.'household_survey/edithouseholdsurvey'] = 'household_survey/edithouseholdsurvey';