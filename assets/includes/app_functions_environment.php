<?php

/*
 *
 *
 *
 *
*/

/*---------------------------------------------------------------------
   Environment
----------------------------------------------------------------------*/

	/*
	* detect class
	*/
		require_once('mobile-detect.php');
		$detect = new Mobile_Detect();


	/*
	* is desktop
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_is_desktop()
		{
			global $detect;
			if( ! $detect->isMobile() || ! $detect->isTablet() ) return true;
		}


	/*
	* is phone
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_is_mobile()
		{
			global $detect;
			if( $detect->isMobile() && !$detect->isTablet()) 
				return true;
		}


	/*
	* is tablet
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_is_tablet()
		{
			global $detect;
			if( $detect->isTablet()) 
				return true;
		}


	/*
	* return device 
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		function app_return_device()
		{
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
	* browser body class
	* @desc : 
	* @param : 
	* @return :
	* @reference : 
	*/
		add_filter('body_class','browser_body_class');
		
		function app_browser_body_class($classes)
		{
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

?>