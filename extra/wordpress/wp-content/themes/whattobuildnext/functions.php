<?php
// 1. Initial configuration
// 1.1 Add thumbnail support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );
add_theme_support( 'title-tag' );

// 2. Register hooks

// 2.1 Register assets hooks for frontend
function whattobuildnext_enqueue_styles() {
    wp_enqueue_style( 'app.min.css', get_template_directory_uri().'/assets/css/app.min.css' );
}
add_action( 'wp_enqueue_scripts', 'whattobuildnext_enqueue_styles' );

function whattobuildnext_enqueue_scripts() {
	wp_enqueue_script('app.min.js', get_template_directory_uri().'/assets/js/app.min.js', array('jquery'),  false, true);
}
add_action( 'wp_enqueue_scripts', 'whattobuildnext_enqueue_scripts' );

// 3. Register widgets
function whattobuildnext_widgets_init() {
	register_sidebar(array(
	  'name'          => 'Table of Contents Area',
	  'id'            => 'table_of_contents_widget',
	  'description'   => '',
	  'before_widget' => '',
	  'after_widget' => '',
	  'before_title' => '',
	  'after_title' => '',
	) );
}
add_action( 'widgets_init', 'whattobuildnext_widgets_init' );

// 4. Register navigation
function whattobuildnext_register_navigation() {
    register_nav_menus(
        array(
            'primary-menu' => 'Primary Menu',
            'footer-menu' => 'Footer menu',
        )
    );
}
add_action( 'init', 'whattobuildnext_register_navigation' );

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

// Allow to see pending posts
function whattobuildnext_allow_pending_posts($qry) {
	$qry->set('post_status', array('publish','pending'));
}
add_action('pre_get_posts','whattobuildnext_allow_pending_posts');

//get topic of post
function get_the_topic(){
	$slug = basename(get_permalink());
	$topic = ucwords(str_replace("-", " ", $slug));
	return $topic;
}

?>

