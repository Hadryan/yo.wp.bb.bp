<?php

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   functions.php config
   Organizing Code in your WordPress functions.php
   http://bit.ly/UGNGza
----------------------------------------------------------------------*/

	// env
	include('assets/includes/app_functions_environment.php');

	// app specific
	include('assets/includes/app_functions_post_types.php');
	include('assets/includes/app_functions_admin_area.php');
	
	// utilities
	include('assets/includes/app_functions_meta.php');
	include('assets/includes/app_functions_theme_support.php');
	include('assets/includes/app_functions_cleanup_output.php');
	include('assets/includes/app_functions_social_analytics.php');

?>
