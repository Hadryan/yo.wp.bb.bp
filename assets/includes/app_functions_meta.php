<?php

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   app functions meta
----------------------------------------------------------------------*/

	/*
	* return page title
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_return_page_title()
		{
			global $page, $paged;
			wp_title( ' &mdash; ', true, 'right' );
			bloginfo( 'name' );
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " &mdash; $site_description";
			if ( $paged >= 2 || $page >= 2 )
				echo ' &mdash; ' . sprintf( __( 'Page %s', 'theme' ), max( $paged, $page ) );
		}


	/*
	* return meta author
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_return_meta_author()
		{
			$value = get_bloginfo('name');
			echo $value;
		
		}


	/*
	* return meta keywords
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_return_meta_keywords()
		{
			$keywords = get_field('global_settings_meta_keywords', 'option');
			$fallback = get_bloginfo('description');
			$value = ($keywords !== '' ? $keywords : $fallback);
			
			echo $value;
		}


	/*
	* return meta desc
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_return_meta_description()
		{
			$description = get_field('global_settings_meta_description', 'option');
			$fallback = get_bloginfo('description');
			$value = ($description !== '' ? $description : $fallback);

			echo $value;
		}


	/*
	* return meta robots
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_return_meta_robots()
		{
			if (( is_home() || is_front_page())){
				echo 'index, follow';
			}else{
				echo 'noindex, nofollow, noarchive';
			}
		}

?>