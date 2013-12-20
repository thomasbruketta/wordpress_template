<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
	
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/vnd.microsoft.icon" /> 
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.6.4.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>
	
	<?php wp_head(); ?>
</head>

<body>

<div class="wrapper">
	<div class="wrapper2">
	
		<a id="logo" href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/starterlogo.png" alt="Starter!" width="174" height="67" /></a>
		
		<ul id="social">
			<li><a href="#">Linked in</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Slideshare</a></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
		</ul>
		
		<div id="search">
			<?php get_search_form(); ?>
		</div>

		<div id="nav">
			<?php wp_nav_menu(array( "theme_location" => "main" )); ?>
		</div>
