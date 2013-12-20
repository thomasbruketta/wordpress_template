<?php
	/*
	The default page template will make a guess at which template should be
	used based on what top-level page the user is on. This decision will be
	overrided if the user chooses a template to use in the page options.
	*/
	
	// find top level parent
	if ($post->post_parent)	{
		$ancestors=get_post_ancestors($post->ID);
		$root=count($ancestors)-1;
		$parent = $ancestors[$root];
	} else {
		$parent = $post->ID;
	}
	$parent_post = get_post($parent);
	$parent_post_name = $parent_post->post_name;
	
	// pick which template to use based on current top level parent
	// default template
	$page_template = "page_no_sidebar_right.php";
	
	switch( $parent_post_name ) {
	
		case "user":
			if ( $post->post_name == "datasheet" ) {
				$page_template = "datasheet.php";
			} else {
				$page_template = "user.php";
			}
			break;
			
		case "products":
			$page_template = "products.php";
			break;
			
		case "contact":
			$page_template = "contact.php";
			break;
			
		case "facebook":
			$page_template = "page_facebook.php";
			break;
	}
	
	include_once( $page_template );

?>