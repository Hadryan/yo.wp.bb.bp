<?php
/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   register actions
----------------------------------------------------------------------*/

	// register ajax action hooks
	add_action('wp_ajax_nopriv_do_ajax', 'api_ajax');
	add_action('wp_ajax_do_ajax', 'api_ajax');


/*---------------------------------------------------------------------
   main function 
----------------------------------------------------------------------*/
	
	function api_ajax(){
	     
	    // return specific output via fn request
		switch($_REQUEST['fn']){
			
			// get index / projects
			case 'api_get_latest_posts':
				
				$output = api_get_latest_posts();
			
			break;
			
			// default error
			default:

					$output = 'No function specified, check your ajax call';
			
			break;
		}

		// json encode output
		$output = json_encode($output);
			
			if(is_array($output))
			{
				print_r($output);
			}
			else
			{
				echo $output;
			}
			// return  
			die;
	}


/*---------------------------------------------------------------------
   get posts 
----------------------------------------------------------------------*/

	function api_get_latest_posts(){

		// query array
		$queryArray = array(,
			'post_status' => 'publish',
			'posts_per_page'=> '-1'
			);

		$query = new WP_Query( $queryArray );

		// results array
		$array = array();
		$i = 0;

		// loop through and create object
		foreach($query->posts as $post)
		{
			$array[$i] = array();
			$array[$i]['id'] = $post->ID;
			$array[$i]['title'] = $post->post_title;
			$array[$i]['slug'] = $post->post_name;
			$array[$i]['order'] = $post->menu_order;
			$i++;
		}

		// return
		return $array;
	}

?>