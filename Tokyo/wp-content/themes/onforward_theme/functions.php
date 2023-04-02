<?php
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

function custom_theme_assets() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
 
add_action( 'wp_enqueue_scripts', 'custom_theme_assets' );

function add_custom_query_var( $vars ){
	$vars[] = "category_id";
	return $vars;
}
add_filter( 'query_vars', 'add_custom_query_var' );

function theme_disable_visual_editor( $can ) {
	global $post;
	return false;
}
add_filter( 'user_can_richedit', 'theme_disable_visual_editor' );

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

function getCurrentUrl() {
    $protocol = is_ssl() ? 'https://' : 'http://';
    return ($protocol) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

// function add_my_media_controls($wp_customize) {
//   $wp_customize->add_section('video', array(
//     'title' => 'Video',
//     'description' => 'Add Video',
//     'capability' => 'edit_theme_options'
// ));
// $wp_customize->add_setting('add_video', array(
//     'type' => 'theme_mod',
//     'capability' => 'edit_theme_options',
//     'sanitize_callback' => 'absint'
// ));
// $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'add_video', array(
//     'section' => 'video',
//     'label' => 'Video',
// )));
// }
// add_action('customize_register', 'add_my_media_controls');
