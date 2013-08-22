<?php

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   api
----------------------------------------------------------------------*/
	
	/*
	api
	*/
		include('assets/includes/api.php');

/*---------------------------------------------------------------------
   Environment
----------------------------------------------------------------------*/

	/*
	detect class
	*/
		require_once('assets/includes/mobile-detect.php');
		$detect = new Mobile_Detect();


	/*
	is desktop
	*/
		function app_is_desktop() {
			global $detect;
			if( ! $detect->isMobile() || ! $detect->isTablet() ) return true;
		}


	/*
	is phone
	*/
		function app_is_mobile() {
			global $detect;
			if( $detect->isMobile() && !$detect->isTablet()) 
				return true;
		}


	/*
	is tablet
	*/
		function app_is_tablet() {
			global $detect;
			if( $detect->isTablet()) 
				return true;
		}


	/*
	return device 
	*/
		function app_return_device(){
			$device = '';
			if(app_is_tablet()){
				$device = 'tablet';
			}
			elseif(app_is_mobile()){
				$device = 'mobile';
			}
			else{
				$device = 'desktop';
			}
			echo $device;
		}

	/*
	browser body class
	*/
		add_filter('body_class','browser_body_class');
		
		function browser_body_class($classes) {
			global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
			if($is_lynx) $classes[] = 'lynx';
			elseif($is_gecko) $classes[] = 'gecko';
			elseif($is_opera) $classes[] = 'opera';
			elseif($is_NS4) $classes[] = 'ns4';
			elseif($is_safari) $classes[] = 'safari';
			elseif($is_chrome) $classes[] = 'chrome';
			elseif($is_IE) $classes[] = 'ie';
			else $classes[] = 'unknown';
			if($is_iphone) $classes[] = 'iphone';
			return $classes;
		}


/*---------------------------------------------------------------------
   Meta
----------------------------------------------------------------------*/

	/*
	return page title
	*/
		function app_return_page_title(){

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
	return meta author
	*/
		function app_return_meta_author(){

			$value = get_bloginfo('name');
			echo $value;
		
		}


	/*
	return meta keywords
	*/
		function app_return_meta_keywords(){

			$keywords = get_field('global_settings_meta_keywords', 'option');
			$fallback = get_bloginfo('description');
			$value = ($keywords !== '' ? $keywords : $fallback);
			
			echo $value;
		}


	/*
	return meta desc
	*/
		function app_return_meta_description(){

			$description = get_field('global_settings_meta_description', 'option');
			$fallback = get_bloginfo('description');
			$value = ($description !== '' ? $description : $fallback);

			echo $value;
		}


	/*
	return meta robots
	*/
		function app_return_meta_robots(){

			if (( is_home() || is_front_page())){
				echo 'index, follow';
			}else{
				echo 'noindex, nofollow, noarchive';
			}
		}


/*---------------------------------------------------------------------
   Post Types
----------------------------------------------------------------------*/
	
	/*
	register work post type	
	*/
		add_action('init', 'project_register');
		
		function project_register() { 

			$labels = array(
				'name' => _x('project', 'post type general name'),
				'singular_name' => _x('project', 'post type singular name'),
				'add_new' => _x('add new', 'project'),
				'add_new_item' => __('add new project'),
				'edit_item' => __('edit project'),
				'new_item' => __('new project'),
				'view_item' => __('view project'),
				'search_items' => __('search project'),
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
				'rewrite' => true,
				'capability_type' => 'post',
				'has_archive' => true, 
				'hierarchical' => false,
				'menu_position' => 5,
				'supports' => array('title','editor','thumbnail'),
				'taxonomies '=> array()
			  ); 
		 
			register_post_type( 'project' , $args );
			flush_rewrite_rules();
		}


/*---------------------------------------------------------------------
   Image Sizes
----------------------------------------------------------------------*/
	
	/*
	thumbnail support
	*/
		add_theme_support( 'post-thumbnails' );

	/*
	add image sizes
	*/
		//desktop size
			add_image_size('app_desktop_med', 760, 760, false);		
		
		//ipad
			add_image_size('app_tablet_med', 500, 500, false);
		
		//iphone
			add_image_size('app_mobile_med', 280, 280, false);


/*---------------------------------------------------------------------
   Menu
----------------------------------------------------------------------*/
	
	/*
	register menus wp_nav_menus, add more if needed
	*/
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', '' ),
		));


/*---------------------------------------------------------------------
   Remove uneccessary output
----------------------------------------------------------------------*/	
	
	/*
	remove crap from the head
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
	hide the version of WordPress for security
	*/
		add_filter('the_generator', 'hcwp_remove_version');
		function hcwp_remove_version() {return '';}


	/*
	remove meta boxes from Post and Page Screens
	*/
		add_action('admin_init','customize_meta_boxes');
		function customize_meta_boxes() {

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
	disable the admin bar in 3.1
	*/
		show_admin_bar( false );


	/*
	Remove dashboard widgets
	*/
		if (!current_user_can('manage_options')) {
			add_action('wp_dashboard_setup', 'remove_dashboard_widgets'); 
		}
		
		function remove_dashboard_widgets() {
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
	remove link url field for attachments
	*/
		add_filter( 'attachment_fields_to_edit', 'remove_media_link', 10, 2 );

		function remove_media_link( $form_fields, $post ) {
		        unset( $form_fields['url'] );
		              return $form_fields;
		}


	/*
	remove thumbnail dimensions
	*/
		add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
		
		function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ){
			$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
			return $html;
		}

	/*
	remove inline comments style   
	*/
	    add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );
	    
	    function twentyten_remove_recent_comments_style() {
	    	global $wp_widget_factory;
	    	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
	    }

	/*
	return slug from permalink
	*/
		function the_slug($echo=true){
			$slug = basename(get_permalink());
			do_action('before_slug', $slug);
			$slug = apply_filters('slug_filter', $slug);
			if( $echo ) echo $slug;
			do_action('after_slug', $slug);
			return $slug;
		}


/*---------------------------------------------------------------------
  admin area and notifications
----------------------------------------------------------------------*/

	/*
	all settings admin menu		
	*/
		add_action('admin_menu', 'all_settings_link');	

		function all_settings_link() {
			add_options_page(__('All Settings'), __('All Settings'), 'administrator', 'options.php');
		}
 
   
	/*
	remove all update notifications unless admin
	*/
		global $user_login;
		get_currentuserinfo();
		if ($user_login !== "admin") { // change admin to the username that gets the updates
			add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
			add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
		}


/*---------------------------------------------------------------------
  Social & Analytics
----------------------------------------------------------------------*/

	/*
	facebook open graph........ if needed	
	*/
		add_action( 'wp_head', 'insert_fb_in_head', 5 );

		function insert_fb_in_head() {
			
			global $post;
			if ( !is_singular()) //if it is not a post or a page
				return;
		        echo '<meta property="fb:admins" content=""/>';
		        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		        echo '<meta property="og:type" content="article"/>';
		        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
				echo '<meta property="og:locale" content="en_GB" />';
				echo '<meta property="og:description" content=" '. get_the_title() .'"/>';
		        echo '<meta property="og:site_name" content=" ' . get_bloginfo('name'). ' "/>';
			if(!has_post_thumbnail( $post->ID )) { //set default image
				$default_image = get_field('global_settings_facebook_image', 'option') ;
				echo '<meta property="og:image" content="' . $default_image . '"/>';
			}
			else{
				$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
			}
			echo "\n";
		}


	/*
	Twitter cards ....... if needed		
	*/
		add_action( 'wp_head', 'insert_twitter_in_head', 5 );

		function insert_twitter_in_head() {
			
			global $post;
			if( !is_singular()) {
				$twitter_url = get_permalink();
				$twitter_title = get_the_title();
				$twitter_desc = get_the_excerpt();
				$twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), full );
				$twitter_thumb = $twitter_thumbs[0];

				if(!$twitter_thumb) {
					$twitter_thumb = '';
				}

				echo '<meta name="twitter:card" value="summary" />';
				echo '<meta name="twitter:url" value=" "/>';
				echo '<meta name="twitter:title" value=" "/>';
				echo '<meta name="twitter:description" value=" "/>';
				echo '<meta name="twitter:image" value=" "/>';
				echo '<meta name="twitter:site" value=" "/>';
				echo "\n";
			}
		}
?>
