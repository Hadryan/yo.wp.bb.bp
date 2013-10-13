<?php

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
  Social & Analytics
----------------------------------------------------------------------*/

	/*
	* facebook open graph........ if needed	
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		add_action( 'wp_head', 'app_insert_fb_in_head', 5 );

		function app_insert_fb_in_head()
		{
			
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
	* Twitter cards ....... if needed		
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		add_action( 'wp_head', 'app_insert_twitter_in_head', 5 );

		function app_insert_twitter_in_head()
		{
			
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