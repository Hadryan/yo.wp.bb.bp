<?php 

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   Cleanup output
----------------------------------------------------------------------*/	
	
	/*
	* remove crap from the head
	* @desc : remove unnecessary crap / output from wp head
	* @param : 
	* @return :
	* @reference : 
	*/
		remove_action('wp_head', 'rsd_link'); 
		remove_action('wp_head', 'feed_links', 2); 
		remove_action('wp_head', 'feed_links_extra', 3); 
		remove_action('wp_head', 'index_rel_link'); 
		remove_action('wp_head', 'wlwmanifest_link'); 
		remove_action('wp_head', 'start_post_rel_link', 10, 0); 
		remove_action('wp_head', 'parent_post_rel_link', 10, 0); 
		remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 
		remove_filter( 'the_content', 'capital_P_dangit' ); 
		remove_filter( 'the_title', 'capital_P_dangit' );
		remove_filter( 'comment_text', 'capital_P_dangit' );


	/*
	* hide the version of WordPress for security
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		add_filter('the_generator', 'app_remove_version');
		function app_remove_version() {return '';}


	/*
	remove meta boxes from Post and Page Screens
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		add_action('admin_init','app_customize_meta_boxes');
		function app_customize_meta_boxes() {

	  // posts
		  remove_post_type_support("post","excerpt"); 
		  remove_post_type_support("post","author"); 
		  remove_post_type_support("post","revisions");
		  remove_post_type_support("post","comments"); 
		  remove_post_type_support("post","trackbacks");
		  remove_post_type_support("post","editor"); 
		  remove_post_type_support("post","custom-fields"); 

	  // pages
		  remove_post_type_support("page","revisions"); 
		  remove_post_type_support("page","comments"); 
		  remove_post_type_support("page","author"); 
		  remove_post_type_support("page","trackbacks"); 
		  remove_post_type_support("page","custom-fields"); 
		}

	/*
	* disable the admin bar in 3.1
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		show_admin_bar( false );


	/*
	* remove dashboard widgets
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		if (!current_user_can('manage_options'))
		{
			add_action('wp_dashboard_setup', 'app_remove_dashboard_widgets'); 
		}
		
		function app_remove_dashboard_widgets() {
			global $wp_meta_boxes;
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); 
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); 
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); 
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); 
			unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); 
			unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); 
		}

	/*
	* remove thumbnail dimensions
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		add_filter( 'post_thumbnail_html', 'app_remove_thumbnail_dimensions', 10, 3 );
		
		function app_remove_thumbnail_dimensions( $html, $post_id, $post_image_id )
		{
			$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
			return $html;
		}

	/*
	* remove inline comments style   
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
	    add_action( 'widgets_init', 'app_remove_recent_comments_style' );
	    
	    function app_remove_recent_comments_style()
	    {
	    	global $wp_widget_factory;
	    	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	    }

	/*
	* return slug from permalink
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_get_the_slug( $echo=true )
		{
			$slug = basename(get_permalink());
			do_action('before_slug', $slug);
			$slug = apply_filters('slug_filter', $slug);
			if( $echo ) echo $slug;
			do_action('after_slug', $slug);
			return $slug;
		}

?>