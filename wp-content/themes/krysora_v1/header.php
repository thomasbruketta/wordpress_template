<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	
	<title><?php bloginfo('name') ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title() ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version') ?>" />
	
	<!-- Retina iPhone --> 
	<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_url') ?>/images/krysora-114x114.png" />
	<!-- Standard iPad --> 
	<link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo('template_url') ?>/images/krysora-144x144.png" />
	<!-- Retina iPad --> 
	<link rel="apple-touch-icon" sizes="144x144" href="<?php bloginfo('template_url') ?>/images/krysora-144x144.png" />
	<!-- Standard iPhone & default --> 
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url') ?>/images/krysora-114x114.png" />
	
	<!-- OpenGraph tags -->
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?php bloginfo('template_url') ?>/images/krysora-144x144.png" />
	<meta property="og:description" content="Krysora is an information technology company dedicated to transforming the United States health care system." />
	<meta property="og:locale" content="en_US" />
	<meta property="og:site_name" content="Krysora" />
	
	<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_url') ?>/images/favicon_krysora.png" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css" />
	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/css/fonts.css" />
	<link rel="stylesheet" media="screen" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="stylesheet" media="screen" href="<?php bloginfo('template_url') ?>/css/style.css" />
	
	<?php wp_head(); ?>
	
	<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery-1.10.2.min.js"></script>
	
	<!-- typekit -->
	<script type="text/javascript" src="//use.typekit.net/qbm3wiw.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	
	<script type="text/javascript">
		// set environment variables
		var bloginfo = {
			'template_url':'<?php bloginfo('template_url') ?>',
			'url': '<?php bloginfo('url') ?>'
		};
	</script>
	
	<?php echo addMailto("info@krysora.com", ".contact"); // dynamically adds mailto: href to DOM elements matching jQuery selector ?>

</head>

<body>

<section class="top">
	<div class="container">
	
		<nav class="navbar navbar-default" role="navigation">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		    <a class="navbar-brand" href="<?php bloginfo('url') ?>"><img class="logo" src="<?php bloginfo('template_url') ?>/images/krysora.png" alt="krysora" /></a>
		  </div>
		
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="#whatwedo">What We Do</a></li>
		      <li><a href="#whykrysora">Why Krysora</a></li>
		      <li><a href="#bios">Bios</a></li>
		      <li><a href="#news">News</a></li>
		      <li><a href="#" class="contact">Contact</a></li>
		    </ul>
		  </div><!-- /.navbar-collapse -->
		</nav>
		
	</div>
</section>