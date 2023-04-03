<?php
/**
 * Dudca Agency Test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Dudca_Agency_Test
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
/**
 * Enqueue scripts and styles.
 */
/**
 * Enqueue scripts and styles.
 */
function add_scripts_styles()
{
    //this js and style for development
    //wp_enqueue_style('theme-stylesheet', get_template_directory_uri() . "/sass/style.css");
    //wp_enqueue_script('dad-script', get_template_directory_uri() . "/js/main-script.js", array('jquery'),'', true);

    wp_enqueue_style('theme-stylesheet', get_template_directory_uri() . "/dist/main.min.css");
    wp_enqueue_script('dad-script', get_template_directory_uri() . "/dist/main.min.js", array('jquery'),'', true);
}
add_action('wp_enqueue_scripts', 'add_scripts_styles');

function dudca_agency_test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Dudca Agency Test, use a find and replace
		* to change 'dudca-agency-test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'dudca-agency-test', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'dudca-agency-test' ),
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
			'dudca_agency_test_custom_background_args',
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
add_action( 'after_setup_theme', 'dudca_agency_test_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dudca_agency_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dudca_agency_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'dudca_agency_test_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dudca_agency_test_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dudca-agency-test' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dudca-agency-test' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dudca_agency_test_widgets_init' );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}






/*dad code */
show_admin_bar( false );

//post type for Services
add_action( 'init', 'register_case_omega_post_types' );
function register_case_omega_post_types(){
    register_post_type( 'omega', [
        'label'  => null,
        'labels' => [
            'name'               => 'Omega post', // основное название для типа записи
            'singular_name'      => 'omega-post', // название для одной записи этого типа
            'add_new'            => 'Add new', // для добавления новой записи
            'add_new_item'       => 'Add new', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Edit post', // для редактирования типа записи
            'new_item'           => 'New post', // текст новой записи
            'view_item'          => 'View post', // для просмотра записи этого типа.
            'search_items'       => 'Search post', // для поиска по этим типам записи
            'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Not found in trash', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Omega posts', // название меню
        ],
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_menu'        => null,
        'show_in_rest'        => null,
        'rest_base'           => null,
        'menu_position'       => null,
        'menu_icon'           => null,
        'hierarchical'        => false,
        'supports'            => [ 'title', 'thumbnail', 'revisions', 'editor', 'page-attributes', ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

register_nav_menus( array(
    'primary' => __( 'Header',      'main' ),

) );

