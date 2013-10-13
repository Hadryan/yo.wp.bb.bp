<?php 

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
  admin area and notifications
----------------------------------------------------------------------*/
	
	/*
	* app_acf_options_page_settings
	* @desc : adds multiple pages to acf options
	* @param : $settings
	* @return : $settings
	* @reference : http://www.advancedcustomfields.com/resources/filters/acfoptions_pagesettings/
	*/
		
		add_filter( 'acf/options_page/settings', 'app_acf_options_page_settings' );
	
		function app_acf_options_page_settings( $settings )
		{
			$settings['title'] = 'Settings';
			$settings['pages'] = array(
				'General',
				'Display'
			);

			return $settings;
		}
 
	/*
	* app_remove_admin_menu_items
	* @desc : removes unnecessary menu items from admin area 
	* @param : none
	* @returns : none
	* @reference : http://codex.wordpress.org/Plugin_API/Action_Reference/admin_menu
	*/
		add_action( 'admin_menu', 'app_remove_admin_menu_items' );

		function app_remove_admin_menu_items() 
		{
			remove_menu_page('edit.php?post_type=page');
			remove_menu_page('edit.php');	
			//remove_menu_page('plugins.php');
			remove_menu_page('edit-comments.php');	
			remove_menu_page('link-manager.php');
			remove_menu_page('tools.php');	
		}

?>