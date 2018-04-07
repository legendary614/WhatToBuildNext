<?php
// 1. Initial configuration
// 1.1 Add thumbnail support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );

// 2. Register hooks

// 2.1 Register assets hooks for frontend
function enqueue_styles() {
    wp_enqueue_style( 'app.min.css', get_template_directory_uri().'/assets/css/app.min.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

function enqueue_scripts() {
	wp_enqueue_script('app.min.js', get_template_directory_uri().'/assets/js/app.min.js', array('jquery'),  false, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


// 5. Register custom theme elements

function whattobuildnext_setup() {

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );
}
add_action( 'after_setup_theme', 'whattobuildnext_setup' );

// Function which displays your post date in time ago format

function whattobuildnext_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}

?>

