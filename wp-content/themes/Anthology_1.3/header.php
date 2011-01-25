<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
<?php language_attributes() ?>>
<head>
<meta http-equiv="Content-Type"
	content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php if (is_home()) {
	echo bloginfo('name');
} elseif (is_category()) {
	echo __('Category &raquo; ', 'blank'); wp_title('&laquo; @ ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_tag()) {
	echo __('Tag &raquo; ', 'blank'); wp_title('&laquo; @ ', TRUE, 'right');
	echo bloginfo('name');
} elseif (is_search()) {
	echo __('Search results &raquo; ', 'blank');
	echo the_search_query();
	echo '&laquo; @ ';
	echo bloginfo('name');
} elseif (is_404()) {
	echo '404 '; wp_title(' @ ', TRUE, 'right');
	echo bloginfo('name');
} else {
	echo wp_title(' @ ', TRUE, 'right');
	echo bloginfo('name');
} ?>
</title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/superfish.css" type="text/css" media="screen" charset="utf-8" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/fonts.css" type="text/css" charset="utf-8" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/cssLoader.php" type="text/css" media="screen" charset="utf-8" />
	
	
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	
<script type="text/javascript"
	src="<?php bloginfo('template_directory'); ?>/script/jquery-1.4.2.js"></script>
	<script type="text/javascript"
	src="<?php bloginfo('template_directory'); ?>/script/jquery.prettyPhoto.js"></script>

	
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/script/jquery.tools.min.js"></script> 
<script type="text/javascript"
	src="<?php bloginfo('template_directory'); ?>/script/script.js"></script>
	
<script type="text/javascript">

jQuery(document).ready(function($){
	pexetoSite.initSite();
});

</script>


	
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<!-- enables nested comments in WP 2.7 -->


<!--[if lte IE 6]>
<link href="<?php bloginfo('template_directory'); ?>/css/style_ie6.css" rel="stylesheet" type="text/css" /> 
 <input type="hidden" value="<?php bloginfo('template_directory'); ?>" id="baseurl" /> 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/script/supersleight.js"></script>
<![endif]-->
<!--[if IE 7]>
<link href="<?php bloginfo('template_directory'); ?>/css/style_ie7.css" rel="stylesheet" type="text/css" />  
<![endif]-->
<!--[if IE 8]>
<link href="<?php bloginfo('template_directory'); ?>/css/style_ie8.css" rel="stylesheet" type="text/css" />  
<![endif]-->

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); //leave for plugins ?>
</head>
<body>
<div id="main-container">
<div class="loading-container hidden"></div>

<div id="line-top"></div>
<div id="header" >
<div id="logo-container" class="center"><a href="<?php bloginfo('url'); ?>"></a></div>
<div id="menu-container">
<div class="hr"></div>
<div id="menu" class="center">
<?php wp_nav_menu(array('theme_location' => 'pexeto_main_menu' )); ?>

 </div>
	  <div class="hr"></div>

</div>