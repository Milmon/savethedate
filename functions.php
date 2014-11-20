<?php
/**
 * Save the Date functions and definitions
 *
 * @package Save the Date
 */


/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'savethedate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function savethedate_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Save the Date, use a find and replace
	 * to change 'savethedate' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'savethedate', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-thumbnails', array( 'post' ) );
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	add_theme_support( 'post-thumbnails', array( 'post', 'movie' ) );

	// This theme uses wp_nav_menu() in one location.
	
        register_nav_menus( array(
		'primary' => __( 'Main Menu', 'savethedate' ),
		'footer-menu' => __( 'Footer Menu', 'savethedate' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'savethedate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );//added 9/16
}
endif; // savethedate_setup
add_action( 'after_setup_theme', 'savethedate_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function savethedate_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget 1', 'savethedate' ),
		'id'            => 'sidebar-1',
		'description'   => 'Top, right widget area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget 2', 'savethedate' ),
		'id'            => 'sidebar-2',
		'description'   => 'Top, left widget area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget 3', 'savethedate' ),
		'id'            => 'sidebar-3',
		'description'   => 'Social Media widget area for use in the footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'savethedate_widgets_init' );


/*** added 10/19/14 ***/
add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
    add_editor_style( get_stylesheet_uri() );
}
/***** remove if it breaks ******/


/**
 * Enqueue scripts and styles.
 */
function savethedate_scripts() {
	wp_enqueue_style( 'savethedate-style', get_stylesheet_uri() );

	wp_enqueue_script( 'savethedate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'savethedate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'savethedate_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';