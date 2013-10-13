<?php

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   post types
----------------------------------------------------------------------*/

	/*
	* register work post type	
	* @param 
	* @return
	*/
		add_action('init', 'app_modules_register');
		
		function app_modules_register()
		{ 

			$labels = array(
				'name' => _x('Modules', 'post type general name'),
				'singular_name' => _x('Module', 'post type singular name'),
				'add_new' => _x('add new', 'Module'),
				'add_new_item' => __('add new Module'),
				'edit_item' => __('edit Module'),
				'new_item' => __('new Module'),
				'view_item' => __('view Module'),
				'search_items' => __('search Modules'),
				'not_found' =>  __('nothing found'),
				'not_found_in_trash' => __('nothing found in Trash'),
				'parent_item_colon' => ''
			);
		 
			$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array('slug' => 'entry'),
				'capability_type' => 'post',
				'has_archive' => true, 
				'hierarchical' => false,
				'menu_position' => 5,
				'supports' => array('title'),
				'taxonomies '=> array()
			  ); 
		 
			register_post_type( 'modules' , $args );
			flush_rewrite_rules();
		}

?>
