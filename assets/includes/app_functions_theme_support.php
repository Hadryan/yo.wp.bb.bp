<?php 

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   Theme Support
----------------------------------------------------------------------*/
	
	/*
	* thumbnail support
	*/
		add_theme_support( 'post-thumbnails' );

	/*
	* add image sizes
	*/
		//desktop size
			add_image_size('prcss_desktop_med', 760, 760, false);		
		
		//ipad
			add_image_size('prcss_tablet_med', 500, 500, false);
		
		//iphone
			add_image_size('prcss_mobile_med', 280, 280, false);


/*---------------------------------------------------------------------
   Menu
----------------------------------------------------------------------*/
	
	/*
	* register menus wp_nav_menus, add more if needed
	*/
		register_nav_menus(array(
		));

?>