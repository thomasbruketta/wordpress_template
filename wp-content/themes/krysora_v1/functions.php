<?php

// use most recent jquery version
if( !is_admin() ){
	wp_deregister_script('jquery');
	wp_register_script('jquery', ( get_bloginfo('template_url') . "/js/jquery-1.10.2.min.js" ), false, '');
	wp_enqueue_script('jquery');
}

// dynamically add email address to obfuscate from bots
function addMailto( $email, $selector) {
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

?>