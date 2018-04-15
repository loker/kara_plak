<?php
/* Kara_Plak functions and definitions */
if ( ! function_exists( 'kara_plak_setup' ) ) :
function kara_plak_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'kara_plak' ),
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'gallery',
		'caption',
	) );
}
endif;
add_action( 'after_setup_theme', 'kara_plak_setup' );
/* Enqueue scripts and styles. */
function kara_plak_scripts() {
	wp_enqueue_style( 'kara_plak-style', get_stylesheet_uri() );
	wp_enqueue_script( 'kara_plak-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20180129', true );
	wp_enqueue_script( 'kara_plak-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20180129', true );
	wp_enqueue_script( 'bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), '4', true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4', true );
}
add_action( 'wp_enqueue_scripts', 'kara_plak_scripts' );

// Register Custom Navigation Walker
require_once('WP_Bootstrap_Navwalker.php');

// DEL WPEMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Close comments on the front-end
function kara_plak_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'kara_plak_disable_comments_status', 20, 2);
add_filter('pings_open', 'kara_plak_disable_comments_status', 20, 2);
// Hide existing comments
function kara_plak_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'kara_plak_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function kara_plak_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'kara_plak_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function kara_plak_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'kara_plak_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function kara_plak_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'kara_plak_disable_comments_dashboard');
// Remove comments links from admin bar
function kara_plak_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'kara_plak_disable_comments_admin_bar');
