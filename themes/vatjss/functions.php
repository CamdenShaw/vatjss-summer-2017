<?php
/**
 * RED Starter Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package vatjss_Theme
 */

if ( ! function_exists( 'vatjss_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function vatjss_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html( 'Primary Menu' ),
	) );

	// Switch search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
endif; // vatjss_setup
add_action( 'after_setup_theme', 'vatjss_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
function vatjss_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vatjss_content_width', 640 );
}
add_action( 'after_setup_theme', 'vatjss_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vatjss_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html( 'Footer Widget' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title vatjss-text-uppercase">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'vatjss_widgets_init' );

/**
 * Filter the stylesheet_uri to output the minified CSS file.
 */
function vatjss_minified_css( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( file_exists( get_template_directory() . '/build/css/style.min.css' ) ) {
		$stylesheet_uri = $stylesheet_dir_uri . '/build/css/style.min.css';
	}

	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'vatjss_minified_css', 10, 2 );

/**
 * Enqueue scripts and styles.
 */
function vatjss_scripts() {
	wp_enqueue_style( 'vatjss-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'font-awesome', 'https://use.fontawesome.com/5e78ddec57.js', array(), '4.7.0', false );

	wp_enqueue_script( 'vatjss-skip-link-focus-fix', get_template_directory_uri() . '/build/js/skip-link-focus-fix.min.js', array(), '20130115', true );
	
	if( is_archive( 'resource' ) ) {
		wp_enqueue_script( 'vatjss-resource', get_template_directory_uri() . '/build/js/resource.min.js', array( 'jquery' ), '20130115', true );	
	}
	if( is_single( 'financial-services' ) ) {
		wp_enqueue_script( 'vatjss-services', get_template_directory_uri() . '/build/js/services.min.js', array( 'jquery' ), '20130115', true );	
	}
	if( is_single( 'housing-services' ) ) {
		wp_enqueue_script( 'vatjss-services', get_template_directory_uri() . '/build/js/services.min.js', array( 'jquery' ), '20130115', true );	
	}
	if( is_single( 'justice-services' ) ) {
		wp_enqueue_script( 'vatjss-services', get_template_directory_uri() . '/build/js/services.min.js', array( 'jquery' ), '20130115', true );	
	}
	if( is_front_page() ) {
		wp_enqueue_script( 'vatjss-front-page', get_template_directory_uri() . '/build/js/front-page.min.js', array( 'jquery' ), '20130115', true );	
	}
	wp_enqueue_script( 'vatjss-flickity', get_template_directory_uri() . '/build/js/flickity.min.js', array( 'jquery' ), '20130115', true );
	wp_enqueue_script( 'vatjss-vatjss-carousel', get_template_directory_uri() . '/build/js/vatjss-carousel.min.js', array( 'vatjss-flickity' ), '20130115', true );
	
	if( ! is_front_page() ) {
		wp_enqueue_script( 'vatjss-main', get_template_directory_uri() . '/build/js/main.min.js', array( 'jquery' ), '20130115', true );
	}
	if( is_page( 'contact-us' ) ){
		wp_enqueue_script( 'vatjss-contact', get_template_directory_uri() . '/build/js/contact.min.js', array( 'jquery' ), '20130115', true );
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vatjss_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
