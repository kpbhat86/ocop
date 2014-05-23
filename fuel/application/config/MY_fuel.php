<?php
// IMPORTANT: for a complete list of fuel configurations, go to the modules/fuel/config/fuel.php file

// path to the fuel admin from the web base directory... MUST HAVE TRAILING SLASH!
$config['fuel_path'] = 'fuel/';

// the name to be displayed on the top left of the admin
$config['site_name'] = 'HOODUKU ERP';

// options are cms, views, and auto. cms pulls views and variables from the database,
// views mode pulls views from the views folder and variables from the _variables folder.
// the auto option will first check the database for a page and if it doesn't exist or is not published, it will then check for a corresponding view file.
$config['fuel_mode'] = 'AUTO';

// used for system emails.
$config['domain'] = '';

// default password to alert against
$config['default_pwd'] = 'admin';

// specifies which modules are allowed to be used in the fuel admin
$config['modules_allowed'] = array(
	//'user_guide',
	//'blog',
	'backup',
	'cronjobs',
	'manage_household',
	'household',
	'household_survey',
	'information_child',
	'birth_details',
	'childgeneral_report',
	'childbirth_report',
	'childcurrent_report',
	'current_details',
	'general_info',
	'welfare',
	'mother_data',
	'education',
	'protection',
	'mother_data',
	'father_data',
	'guardian_data',
	'immunization',
	'drq_information_child',
	'drq_birth_death_info',
	'drq_general_info',
	'drq_immunization',
	'drq_preg_mother_data',
	'drq_mother_data',
	'drq_father_data',
	'group_access',
	'manage_ocop',
	);
	
$config['nav']['household'] = array(
          'manage_household' => '1. Manage Household',
          'household' => '2. Household',
          'household_survey' => '3. Household Survey',
          'village' => '4. List of Villages'
   /*       'grama_panchayat' => 'List of Grama Panchayat',
          'division' => 'List of Divisions',
          'district' => 'List of Districts',
          'states' => 'List of States',
          'taluk' => 'List of Taluks'*/);

$config['nav']['ocop'] = array(
          'manage_ocop' => '1. Manage OCOP',
          'information_child' => '2. Summary Of Questionnaire',
          'general_info' => '3. General Info',
          'birth_details' => '4. Birth Details',
          'current_details' => '5. Current Details',
          'immunization' => '6. Immunization',
          'education' => '7. Education',
          'protection' => '8. Protection',
          'welfare' => '9. Welfare',
          'mother_data' => '10. Data of Mother',
          'father_data' => '11. Data Of Father',
          'guardian_data' => '12. Data of Guardian');

$config['nav']['DRQ'] = array(
          'drq_information_child' => '13. Summary Of Questionnaire',
          'drq_birth_death_info' => '14. Still Birth/Death Info',
          'drq_general_info' => "15. Child's General Death Info",
          'drq_immunization' => '16. Immunization',
        'drq_preg_mother_data'  => '17. Pregnancy Period Dead Info',
           'drq_mother_data' => "18. Mother's General Death Info",
          'drq_father_data' => "19. Father's Death Details");
		  
$config['nav']['modules'] = array();

$config['nav']['OCOP_Reports'] = array(
         // 'childgeneral_report' => 'Childrens General Info',
         // 'childbirth_report' => 'Childrens Birth Details',
          'childcurrent_report' => '20. Reports',
         // 'childimmunization_report' => 'Childrens Immunization',
         // 'childedu_report' => 'Childrens Education',
         // 'childprotection_report' => 'Childrens Protection',
          //'childwelfare_report' => 'Childrens Welfare',
          //'childdeath_report' => 'Childrens Death',
          //'mothergeneral_report' => 'Mothers General Info',
          //'motherdeath_report' => 'Mothers Death',
          //'fathergeneral_report' => 'Fathers General Info',
		  //'fatherdeath_report' => 'Fathers Death',
		 // 'guardiangeneral_report' => 'Guardian General Info'
		 );

// whether the admin backend is enabled
$config['admin_enabled'] = TRUE;

// will auto search view files. 
// If the URI is about/history and the about/history view does not exist but about does, it will render the about page
$config['auto_search_views'] = TRUE;

// max upload files size for assets
$config['assets_upload_max_size']	= 5000;

// max width for asset image uploads
$config['assets_upload_max_width']  = 1024;

// max height for asset image uploads
$config['assets_upload_max_height']  = 768;

$config['assets_excluded_dirs'] = array(
	'js',
	'css',
	'cache', 
	'swf', 
	);

// text editor settings  (options are markitup or ckeditor)
$config['text_editor'] = 'markitup';

// ck editor specific settings
$config['ck_editor_settings'] = array(
	'toolbar' => array(
			//array('Source'),
			array('Bold','Italic','Strike'),
			array('Format'),
			array('Image','HorizontalRule'),
			array('NumberedList','BulletedList'),
			array('Link','Unlink'),
			array('Undo','Redo','RemoveFormat'),
			array('Preview'),
			array('Maximize'),
		),
	'contentsCss' => WEB_PATH.'assets/css/main.css',
	'htmlEncodeOutput' => FALSE,
	'entities' => FALSE,
	'bodyClass' => 'ckeditor',
	'toolbarCanCollapse' => FALSE,
);


$config['fuel_javascript'] = array(
	'jquery/plugins/date',
	'jquery/plugins/jquery.datePicker',
	'jquery/plugins/jquery.fillin',
	'jquery/plugins/jquery.easing',
	'jquery/plugins/rgbcolor',
	'jquery/plugins/canvg',
	'jquery/plugins/jquery.minn',
	'jquery/plugins/highcharts',
	'jquery/plugins/exporting',
	'jquery/plugins/grChartImg',
	'jquery/plugins/jquery.bgiframe',
	'jquery/plugins/jquery.tooltip',
	'jquery/plugins/jquery.scrollTo-min',
	'jquery/plugins/jqModal',
	'jquery/plugins/jquery.checksave',
	'jquery/plugins/jquery.form',
	'jquery/plugins/jquery.treeview.min',
	'jquery/plugins/jquery.hotkeys',
	'jquery/plugins/jquery.cookie',
	'jquery/plugins/jquery.fillin',
	'jquery/jquery.print-preview.js',
	'jquery/plugins/jquery.selso',
	'jquery/plugins/jquery-ui-1.8.4.custom.min',
	'jquery/plugins/jquery.disable.text.select.pack',
	'jquery/plugins/jquery.supercomboselect',
	'jquery/plugins/jquery.MultiFile',
	'jquery/plugins/jquery.tablednd.js',
	'editors/markitup/jquery.markitup.pack',
	'editors/markitup/jquery.markitup.set',
	'editors/ckeditor/ckeditor.js',
	'fuel/linked_field_formatters.js',
	'custom/custom.js',
	'nvd3/lib/d3.v2.min',
	'nvd3/lib/fisheye.min.js',
	'nvd3/nv.d3.min.js',
	/*'bootstrap/bootstrap.js',
	'bootstrap/bootstrap.min.js',
	'bootstrap/bootstrap-affix.js',
	'bootstrap/bootstrap-alert.js',
	'bootstrap/bootstrap-button.js',
	'bootstrap/bootstrap-carousel.js',
	'bootstrap/bootstrap-collapse.js',
	'bootstrap/bootstrap-dropdown.js',
	'bootstrap/bootstrap-modal.js',
	'bootstrap/bootstrap-popover.js',
	'bootstrap/bootstrap-scrollspy.js',
	'bootstrap/bootstrap-tab.js',
	'bootstrap/bootstrap-tooltip.js',
	'bootstrap/bootstrap-transition.js',
	'bootstrap/bootstrap-typeaheadn.js',*/
	'jquery/jsapi.js',
);

/* End of file MY_fuel.php */
/* Location: ./application/config/MY_fuel.php */