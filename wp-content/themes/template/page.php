<?php
	// set page template based on page type
	if (is_front_page()) {
		$page_template = "page-home.php";
	} 
	else if ($post->post_title == "example"){
		$page_template = "page-example.php";
	} 
	else {
		$page_template = "page-default.php";
	} 
	
	
	include_once( $page_template );
	

	
?>