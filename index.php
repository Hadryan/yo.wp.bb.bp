<!doctype html>
<!--[if lt IE 7]><html class="no-js ie6" lang="en"><![endif]-->
<!--[if IE 7]><html class="no-js ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="no-js ie8" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"><!--<![endif]-->

<head>
	
	<!--meta-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<!--title-->
	<title><?php app_return_page_title();?></title>
	
	<!--meta-->
	<meta name="description" content="<?php app_return_meta_description();?>">
	<meta name="author" content="<?php app_return_meta_author();?>">
	<meta name="keywords" content="<?php app_return_meta_keywords();?>">
	<meta name="robots" content="<?php app_return_meta_robots();?>">
	
	<!--viewport-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!--CSS-->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/style.css">
	
	<!--modernizr-->
	<script src="<?php bloginfo('template_url'); ?>/assets/js/lib/modernizr.custom.73995.js" type="text/javascript"></script>
	
	<!--html5 shiv-->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--Wp head-->	
	<?php wp_head(); ?>

</head>
<body>

	<!--Old Browser	-->
 	<div id="app-layout-message">
		<span class="app-layout-message-shit-browser">Sorry, but this website is desgiend to work in modern browsers, such as Google Chrome. Please upgrade your browser to view this site.</span>
	</div>
	
	<!--Main-->
	<div id="app-layout-main"></div>
	
	<!--application js-->
	<script src="<?php bloginfo('template_url'); ?>/assets/js/lib/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/lib/underscore.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/lib/backbone.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app/router/router.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app/models/models.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app/views/index.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app/app.utils.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app/app.ui.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app/app.main.js" type="text/javascript"></script>
	
	<!--application min
	<script src="<?php bloginfo('template_url'); ?>/assets/js/app.min.js" type="text/javascript"></script>
	-->

	<!--wp footer-->
	<?php wp_footer(); ?>

</body>
</html>