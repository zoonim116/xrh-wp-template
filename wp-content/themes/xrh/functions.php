<?php
/**
 * xrh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xrh
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'xrh_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function xrh_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on xrh, use a find and replace
		 * to change 'xrh' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'xrh', get_template_directory() . '/languages' );

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
				'primary' => esc_html__( 'Primary', 'xrh' ),
				'primary-end' => esc_html__( 'Primary End', 'xrh' ),
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
				'xrh_custom_background_args',
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

		require_once( 'vendor/autoload.php' );
		\Carbon_Fields\Carbon_Fields::boot();
	}
endif;
add_action( 'after_setup_theme', 'xrh_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xrh_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'xrh_content_width', 640 );
}
add_action( 'after_setup_theme', 'xrh_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xrh_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'xrh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'xrh' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'xrh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function xrh_scripts() {
	wp_enqueue_style( 'slick', get_template_directory_uri(). '/css/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri(). '/css/slick-theme.css', array(), _S_VERSION );
	wp_enqueue_style( 'custom-scrollbar', get_template_directory_uri(). '/css/jquery.mCustomScrollbar.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri(). '/css/magnific-popup.css', array(), _S_VERSION );
	wp_enqueue_style( 'xrh-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_script( 'xrh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/js/slick.min.js', ['jquery'], _S_VERSION, true );
	wp_enqueue_script( 'custom-scrollbar-script', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.concat.min.js', ['jquery'], _S_VERSION, true );
	wp_enqueue_script( 'magnific-popup-script', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', ['jquery'], _S_VERSION, true );
	wp_enqueue_script( 'fynd-script', get_template_directory_uri() . '/js/script.js', ['jquery'], _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xrh_scripts' );

require_once "inc/bulma-navwalker.php";
require_once get_template_directory() . '/inc/template-functions.php';
require_once "blocks/block.php";
require_once "inc/theme-options.php";

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require_once get_template_directory() . '/inc/jetpack.php';
}

add_action( 'xrh_show_logo_action', 'xrh_show_logo', 10 );
if ( ! function_exists( 'xrh_show_logo' ) ) {
	function xrh_show_logo() {
		$attachment_id = get_theme_mod( 'custom_logo' );
		$logo          = wp_get_attachment_image_src( $attachment_id, 'full' );
		$alt           = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true );
		print_r( '<img src="' . $logo[0] . '" alt="' . $alt . '"/>' );
	}
}

function xrh_customize_register($wp_customize) {
	$wp_customize->add_setting('footer_logo', array(
		'transport'         => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_logo', [
			'label'             => __('Footer logo', 'xrh'),
			'section'           => 'title_tagline',
			'settings'          => 'footer_logo',
		])
	);

	$wp_customize->add_setting('footer_logo_text', array(
		'transport'         => 'refresh',
	));
	$wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_logo_text', [
			'label'             => __('Text under footer logo', 'xrh'),
			'section'           => 'title_tagline',
			'settings'          => 'footer_logo_text',
			'type'              => 'text'
		])
	);
}

add_action('customize_register', 'xrh_customize_register');

function fynd_widgets_init() {
	register_sidebar(
		[
			'name'          => esc_html__( 'Menu 1', 'xrh' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fynd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Menu 2', 'xrh' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'fynd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Menu 3', 'xrh' ),
			'id'            => 'sidebar-3',
			'description'   => esc_html__( 'Add widgets here.', 'fynd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Menu 4', 'xrh' ),
			'id'            => 'sidebar-4',
			'description'   => esc_html__( 'Add widgets here.', 'fynd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);

	register_sidebar(
		[
			'name'          => esc_html__( 'Menu 5', 'xrh' ),
			'id'            => 'sidebar-5',
			'description'   => esc_html__( 'Add widgets here.', 'fynd' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]
	);
}
add_action( 'widgets_init', 'fynd_widgets_init' );

