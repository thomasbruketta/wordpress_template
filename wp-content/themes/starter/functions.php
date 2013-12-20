<?php

// set up menus
add_action( 'init', 'register_my_menus' );

register_nav_menus(array(
	'main' => 'Main Menu',
));

// set up default sidebar
//if ( function_exists('register_sidebar') ) register_sidebar();

// set up multiple sidebars
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name'=>'blog',		
		'before_widget' => '<div id="%1$s" class="widget %2$s">', // Removes <li>
		'after_widget' => '</div>' // Removes </li>
	));
}

// enable featured image box
add_theme_support('post-thumbnails');

// allows for excerpt support in pages
add_post_type_support('page', 'excerpt');

// allow for custom header image support
$hdr_defaults = array(
	'default-image'          => get_bloginfo('template_url') . "/images/masthead-windows.jpg",
	'random-default'         => false,
	'width'                  => 950,
	'height'                 => 120,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $hdr_defaults );

// find top level parent
function get_top_level_parent_id() {
	global $wp_query;
	$post = $wp_query->post;
	
	if ($post->post_parent)	{
		$ancestors=get_post_ancestors($post->ID);
		$root=count($ancestors)-1;
		$top_level_parent_id = $ancestors[$root];
	} else {
		$top_level_parent_id = $post->ID;
	}
	return $top_level_parent_id;
}

// echos contents of page (parameter: page title)
/*function insertPageContent( $pageTitle ) {
	query_posts('pagename='.$pageTitle);
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			the_content('More &raquo;');
		} 
	}
	wp_reset_query();
}*/

// echos contents of page (parameters: page title or page id, is child of current post)
function insertPageContent( $p, $isChildOfCurrentPost ) {
	if (is_int($p)) {
		// not tested
		$q = 'page_id='.$p;
	} else if ( is_string($p) ) {
		if ( $isChildOfCurrentPost === true ) {
			global $wp_query;
			$post = $wp_query->post;
			
			$q = 'pagename=' . $post->post_title . "/" . $p;
		} else {
			$q = 'pagename='.$p;
		}
	}
	query_posts( $q );
	
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			the_content();
		} 
	}
	wp_reset_query();
	
	//echo "<script>console.log('insertPageContent: q = $q');</script>";
}

// same as above, except using ID
function insertPageContentById( $id ) {
	//echo "<script>console.log('insertPageContentById: id = $id');</script>";
	
	query_posts('page_id='.$id);
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			the_content('More &raquo;');
		} 
	}
	wp_reset_query();
}
			
?>