<?php
/**
 * context-blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package context-blog
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
function context_blog_setup() {
	 /*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on context-blog, use a find and replace
	* to change 'context-blog' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'context-blog' );

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
	add_image_size( 'context-blog-card-slider-382X271', 382, 271, array( 'center', 'top' ) );
	add_image_size( 'context-blog-full-screen-slider-1440X550', 1440, 550, array( 'center', 'top' ) );
	add_image_size( 'context-blog-gallery-slider-1-510X497', 510, 497, array( 'center', 'top' ) );
	add_image_size( 'context-blog-gallery-slider-2-footer-news-100X98', 100, 100, array( 'center', 'top' ) );
	add_image_size( 'context-blog-leaflet-slider-sidbarlatest-510X724', 510, 724, array( 'center', 'top' ) );
	add_image_size( 'context-blog-main-blog-1-1200X630', 1200, 630, array( 'center', 'top' ) );
	add_image_size( 'context-blog-main-blog-2-538X382', 538, 382, array( 'center', 'top' ) );
	add_image_size( 'context-blog-aboutme-350X350', 350, 350, array( 'center', 'top' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary'   => esc_html__( 'Primary', 'context-blog' ),
			'sidepanel' => esc_html__( 'Sidepanel menu', 'context-blog' ),
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
			'context_blog_custom_background_args',
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
			'height'      => 150,
			'width'       => 150,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );

}
add_action( 'after_setup_theme', 'context_blog_setup' );



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function context_blog_content_width() {
	 $GLOBALS['context_blog_content_width'] = apply_filters( 'context_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'context_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function context_blog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar area', 'context-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'context-blog' ),
			'before_widget' => '<div id="%1$s" class="sidebar-block %2$s">',
			'after_widget'  => '</div><div class="clearfix"></div>',
			'before_title'  => '<div class="sidebar-title"><h2 class="title widget-title">',
			'after_title'   => '</h2></div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Body block section bar area', 'context-blog' ),
			'id'            => 'frontpage-body',
			'description'   => esc_html__( 'Add widgets here.', 'context-blog' ),
			'before_widget' => '<section id="%1$s" class="home-section %2$s"><div class="body-widgetarea">',
			'after_widget'  => '</div><div class="clearfix"></div></section>',
			'before_title'  => '<h2 class="title widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer area', 'context-blog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'context-blog' ),
			'before_widget' => '<div id="%1$s" class="footer-block %2$s col-lg-4 col-md-6 pt-4 pb-4">',
			'after_widget'  => '</div><div class="clearfix"></div>',
			'before_title'  => '<div class="footer-title"><h2 class="title widget-title">',
			'after_title'   => '</h2></div>',
		)
	);
}
add_action( 'widgets_init', 'context_blog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function context_blog_scripts() {
	wp_enqueue_style( 'context-blog-google-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans|Roboto&display=swap', array(), null );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.5.0' );

	wp_enqueue_style( 'font-awesome-5', get_template_directory_uri() . '/assets/css/font-awesome5.css', '5.15.4' );

	wp_enqueue_style( 'sm-core-css', get_template_directory_uri() . '/assets/css/sm-core-css.css', array(), null );

	wp_enqueue_style( 'sm-clean', get_template_directory_uri() . '/assets/css/sm-clean.css', array(), null );

	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.9.0' );

	wp_enqueue_style( 'slic-theme', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), null );

	wp_enqueue_style( 'Aos', get_template_directory_uri() . '/assets/css/aos.css', array(), null );

	wp_enqueue_style( 'context-blog-style', get_stylesheet_uri(), array(), null );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.5.0', true );

	wp_enqueue_script( 'jquery-smartmenus', get_template_directory_uri() . '/assets/js/jquery.smartmenus.js', array( 'jquery' ), '1.1.0', true );

	wp_enqueue_script( 'jquery-smartmenus-bootstrap-4', get_template_directory_uri() . '/assets/js/jquery.smartmenus.bootstrap-4.js', array( 'jquery' ), '0.1.0', true );

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.js', array( 'jquery' ), '1.9.0', true );

	wp_enqueue_script( 'context-blog-scripts', get_template_directory_uri() . '/assets/js/script.js', array( 'jquery' ), '1.16.0', true );

	wp_enqueue_script( 'context-modal-ajax-scripts', get_template_directory_uri() . '/assets/js/modal-ajax.js', array( 'jquery' ), '1.16.0', true );

	wp_enqueue_script( 'jquery-scrollUp', get_template_directory_uri() . '/assets/js/jquery.scrollUp.js', array( 'jquery' ), '2.4.1', true );

	wp_enqueue_script( 'jquery-aos', get_template_directory_uri() . '/assets/js/aos.js', array( 'jquery' ), '1.0.0', true );

	$blogpost_design = array(
		'context_blog_main_blog_design_value' => get_theme_mod( 'context_blog_main_blog_design', 2 ),
	);
	wp_localize_script( 'context-blog-scripts', 'blogpost_design', $blogpost_design );

	wp_localize_script(
		'context-blog-scripts',
		'context_object',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_enqueue_script( 'context-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_register_style( 'context-blog-customizer-styles', false );

	wp_enqueue_style( 'context-blog-customizer-styles' );

	wp_add_inline_style( 'context-blog-customizer-styles', context_blog_color_font_css() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'context-blog-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), null );

	if ( is_singular() || is_archive() || is_search() ) {
		wp_enqueue_script( 'context-blog-singular', get_template_directory_uri() . '/assets/js/singular.js', array( 'jquery' ), '1.0.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'context_blog_scripts', 10000 );

function context_blog_editorscripts() {

	wp_enqueue_style( 'context-blog-google-fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans|Roboto&display=swap', array(), null );

	wp_enqueue_script( 'context-blog-navigation-editor', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_register_style( 'context-blog-editor-styles', false );

	wp_enqueue_style( 'context-blog-editor-styles' );

	if ( ! is_singular() and ! is_home() and ! is_front_page() and ! is_archive() and ! is_search() and ! is_404() ) {

		wp_add_inline_style( 'context-blog-editor-styles', context_blog_color_font_css() );
	}

}

add_action( 'enqueue_block_assets', 'context_blog_editorscripts', 10 );

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
require get_template_directory() . '/template-parts/content-core-meta.php';
require get_template_directory() . '/template-parts/content-core.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
* Breadcrumbs
*/
require_once get_template_directory() . '/inc/breadcrumbs.php';

/**
* upgrade to pro
*/

require_once get_template_directory() . '/inc/upgrade-to-pro/control.php';


function context_blog_add_menu_link_class( $atts, $item, $args ) {
	if ( property_exists( $args, 'link_class' ) ) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'context_blog_add_menu_link_class', 1, 3 );


/**
 * Ajax.
 */
require get_template_directory() . '/inc/ajax/modal-popup.php';

// change the theme mode of category of version 1.0.4
function context_blog_catname_replaced() {
	$customizer_setting1 = 'context_blog_card_slider_category_name';
	$customizer_setting2 = 'context_blog_full_screen_slider_category_name';
	$customizer_setting3 = 'context_blog_gallery_slider_category_name';
	$customizer_setting4 = 'context_blog_sidebar_fullwidth_category_name';
	$customizer_setting5 = 'context_blog_footer_news1_category_name';
	$customizer_setting6 = 'context_blog_footer_news2_category_name';

	$customizer_settings = array($customizer_setting1,$customizer_setting2,$customizer_setting3,$customizer_setting4,$customizer_setting5,$customizer_setting6);

	for ($a = 0; $a < 6; $a++) {
		if (  ! is_numeric( get_theme_mod($customizer_settings[$a],0) ) ) {
			$categories = get_categories();
			$value_to_check = get_theme_mod( $customizer_settings[$a],0 );
			$result = "not_found";
						
				foreach ($categories as $category) {
					//here get_theme_mode category matched with the list hence replaced it wih ID.
					if ( strtolower($value_to_check) == strtolower($category->name) ) {
						set_theme_mod( $customizer_settings[$a], get_cat_ID( get_theme_mod( $customizer_settings[$a],0 )));
						$result = "found"; 
					}

				}
			
				if ( $result == "not_found" ) {
					//here get_theme_mode category did not matched with the list hence find its slug and then replaced it with id.

					$words_array = explode(' ', get_theme_mod( $customizer_settings[$a],0 ));
					// Count the number of words in the string
					$word_count = count($words_array);
					// Automatically assign each word to separate variables using a loop
					for ($i = 0; $i < $word_count; $i++) {
						${'word' . ($i + 1)} = $words_array[$i];
					}
					for ($i = 0; $i < $word_count; $i++) {
						if ($i==0) {
							$final_word_slug = $words_array[0];
						} else {
						
						$final_word_slug = $final_word_slug."-".${'word' . ($i + 1)};
						}
					}
					$cat = get_category_by_slug($final_word_slug); 
					$catID = $cat->term_id; // can not used get_cat_ID to get cat id as done above
					set_theme_mod( $customizer_settings[$a], $catID );
				}		
		}
	}
}
add_action('after_setup_theme', 'context_blog_catname_replaced');
// after_switch_theme does not fire when verison upgrade, switch_theme also no work
// after_setup_theme always fire when site loaded