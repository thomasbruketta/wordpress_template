<?php
//
// use most recent jquery version
 if( !is_admin() ){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ( get_bloginfo('template_url') . "/js/jquery-1.10.2.min.js" ), array(), false , false);
	wp_enqueue_script('jquery');
} 

// enqueue bootstrap.js
wp_register_script('bootstrap', ( get_bloginfo('template_url') . "/js/bootstrap.min.js" ), array('jquery'), '3.0.1', true);
wp_enqueue_script('bootstrap');
	
// enqueue scripts.js
wp_register_script('myscript', ( get_bloginfo('template_url') . "/js/scripts.js"), array('jquery'), false ,true);
wp_enqueue_script('myscript');

// enqueue browser_selector.js
wp_register_script('browser-select', ( get_bloginfo('template_url') . "/js/css_browser_selector.js"), array() , false ,true);
wp_enqueue_script('browser-select');

//add dynamic menu
register_nav_menu('main_menu', 'Main Menu' );

// dynamically add email address to obfuscate from bots
function add_mailto( $email, $selector) {
	$e1 = substr($email, 0, 4);
	$e2 = substr($email, 4, 4);
	$e3 = substr($email, 8);
	
	$js = "<script type='text/javascript'>$(document).ready( function() {";
	$js .= "var e3 = '$e3'; var e2 = '$e2'; var e1 = '$e1'; var e4 = e1 + e2 + e3;";
	$js .= "\$('$selector').each( function() {";
	$js .= "\$(this).prop('href', 'mailto:' + e4);";
	$js .= "})";
	$js .= "});</script>";
	
	echo $js;
}

//set multiple sidebars

register_sidebar(array(
	'name' => 'blog',
//	'id' => 'blog',
	'before_widget' => '<div id="%1$s" class="widget %2$s">', //removes <li>
	'after_widget'  => '</div>', // Removes <li>
));

register_sidebar(array(
	'name' => 'page',
//	'id' => 'page',
	'before_widget' => '<div id="%1$s" class="widget %2$s">', //removes <li>
	'after_widget'  => '</div>', // Removes <li>
));

register_sidebar(array(
	'name' => 'Alt',
	'before_widget' => '<div id="%1$s" class="widget %2$s">', //removes <li>
	'after_widget'  => '</div>', // Removes <li>
));

// truncate
function substr_with_ellipsis($string, $chars = 100) {
    preg_match('/^.{0,' . $chars. '}(?:.*?)\b/iu', $string, $matches);
    $new_string = $matches[0];
    return ($new_string === $string) ? $string : $new_string . '&hellip;';
}

// echos contents of page (parameters: page title or page id, is child of current post)
function get_page_content( $p, $isChildOfCurrentPost = false ) {
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
			$content = apply_filters('the_content', get_the_content());
		}
	}
	wp_reset_query();
	
	return $content;
}

// run shortcode to insert a section into a page
function insert_section( $atts ) {
	extract( shortcode_atts( array(
		'post_title' => '',
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );
	
	$html_str = "";
	
	if ($post_title) {
		$html_str .= "<section id='$id' class='$class' style='$style'>";
		$html_str .= "<div class='container'>";
		$html_str .= get_page_content( $post_title );
		$html_str .= "</div>";
		$html_str .= "</section>";
	}
	
	return $html_str;
}

// run shortcode to insert a section into a page
function insert_news( $atts ) {
	extract( shortcode_atts( array(
		'post_title' => '',
		'id' => '',
		'class' => '',
		'style' => ''
	), $atts ) );
	
	$html_str = "";
	
	if ($post_title) {
		$html_str .= "<section id='$id' class='$class' style='$style'>";
		$html_str .= "<div class='container'>";
		$html_str .= get_page_content( $post_title );
		$html_str .= "</div>";
		$html_str .= "</section>";
	}
	
	return $html_str;
}

// register theme-specific shortcodes
add_shortcode( 'insert_section', 'insert_section' );
add_shortcode( 'insert_news', 'insert_news' );

// set up custom post types

function custom_post_types() {	
	$dino_args = array(
		'labels' => array(
			'name' => 'Dinos',
			'singular_name' => 'Dino',
			'add_new' => 'Add New Dino',
			'add_new_item' => 'Add New Dino',
			'edit_item' => 'Edit Dino',
			'new_item' => 'New Dino',
			'view_item' => 'View Dino',
			'search_items' => 'Search Dinos',
			'not_found' => 'No Dinos Found',
			'not_found_in_trash' => 'No Dinos in Trash'
		),
		'supports' => array(
			'title',
			'editor',
			'revisions',
			'thumbnail'
		),
		'capability_type' => 'post',
		'hierarchical' => true,
		'public' => true,
		'query_var' => 'dino',
		'show_ui' => true,
		'rewrite' => true,
		'exclude_from_search' => true,
	);
	
	register_post_type( 'dino', $dino_args );
}

add_action( 'init', 'custom_post_types');

// init taxonomies
add_action( 'init', 'custom_taxonomies');

function custom_taxonomies() {
	$region_args = array(
		'hierarchical' => true,
		'query_var' => 'Region',
		'show_tagcloud' => false,
		'rewrite' => true,
		'labels' => array(
			'name' => 'Regions',
			'singular_name' => 'Region',
			'edit_item' => 'Edit Region',
			'update_item' => 'Update Region',
			'add_new_item' => 'Add New Region',
			'new_item_name' => 'New Region',
			'all_items' => 'All Regions',
			'search_items' => 'Search Regions',
			'popular_items' => 'Popular Regions',
			'separate_items_with_commas' => 'Separate Regions',
			'add_or_remove_items' => 'Add or Remove Regions',
			'choose_from_most_used' => 'Choose from the most popular Regions'
		)
	);
	register_taxonomy('region', array('dino'), $region_args);
}

?>