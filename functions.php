<?php
/**
 * Belov Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Belov_Test
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function belov_test_setup() {
	// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Belov Test, use a find and replace
		* to change 'belov-test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'belov-test', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'belov-test' ),
			'privacy' => esc_html__( 'Privacy', 'belov-test' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'belov_test_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	
}
add_action( 'after_setup_theme', 'belov_test_setup' );




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function belov_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'belov_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'belov_test_content_width', 0 );

/**-----------------------------
 * Enqueue scripts and styles.
 -----------------------------------*/
function belov_test_scripts() {
	wp_enqueue_style( 'belov-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'belov-test-style', 'rtl', 'replace' );

	 wp_enqueue_style('belov-styles', get_template_directory_uri() . '/assets/css/index.css');
	wp_enqueue_script( 'belov-test-script', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );

	 wp_enqueue_style('swiper_styles', '//cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
     wp_enqueue_script( 'swiper_script', '//cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array ( 'jquery' ), 1.1, true);

	//Default script from _s theme.
	wp_enqueue_script( 'belov-scripts', get_template_directory_uri() . '/assets/js/script.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'belov_test_scripts' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



/*----------------------
ACF BLOCKS REGISTRATION
--------*/
function register_acf_blocks() {
    register_block_type( __DIR__ . './blocks/home-banner'); //Banner on the home page
    register_block_type( __DIR__ . './blocks/services'); //Service section on the home page
    register_block_type( __DIR__ . './blocks/projects'); //Project section on the home page
    register_block_type( __DIR__ . './blocks/manifesto'); //Manifesto section on the home page
    register_block_type( __DIR__ . './blocks/clients'); //Client section on the home page
    register_block_type( __DIR__ . './blocks/newsletter'); //Newsletter section on the home page
    register_block_type( __DIR__ . './blocks/testimonials'); //Testimonial section on the home page
    register_block_type( __DIR__ . './blocks/benefits'); //Benefits section on the home page

}
add_action( 'init', 'register_acf_blocks' );
