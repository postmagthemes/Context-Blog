<?php
/**
 * context-blog Theme Customizer
 *
 * @package context-blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function context_blog_customize_register( $wp_customize ) {
	 $wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'context_blog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'context_blog_customize_partial_blogdescription',
			)
		);

	}
	class context_blog_Customizer_Title extends WP_Customize_Control {

		// this add extra title in customizer.
		public function enqueue() {
			wp_enqueue_style( 'context-blog-custom-css', trailingslashit( get_template_directory_uri() ) . 'assets/css/customizer.css', array(), '1.0', 'all' );
		}

		public function render_content() {
			?>
			<h3 class="customize-control-lable"><?php echo esc_html( $this->label ); ?></h3>
			<?php if ( ! empty( $this->description ) ) { ?>
				<h4 class="customize-control-des"><?php echo esc_html( $this->description ); ?></h4>
				<?php
			}
		}
	}
}
add_action( 'customize_register', 'context_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function context_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function context_blog_customize_partial_blogdescription() {
	 bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function context_blog_customize_preview_js() {
	wp_enqueue_script( 'context-blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}

add_action( 'customize_preview_init', 'context_blog_customize_preview_js' );


/*
* Backend Scripts
*/

function context_blog_customize_backend_scripts() {
	 wp_enqueue_script( 'context-blog-customizer-hide', get_template_directory_uri() . '/assets/customizer/customizer-hide.js', array( 'jquery' ), '1.1.2', true );
	// below get the value of Your homepage displays settings and used in jquery customizer-hide.js
	$phpInfo = array(
		'show_on_front_value' => get_option( 'show_on_front' ),

	);
	wp_localize_script( 'context-blog-customizer-hide', 'phpInfo', $phpInfo );
	// below get the value of string translation and used in jquery customizer-hide.js

	$taxonomy_translate = array(
		'context_blog_meta_translate'     => __( 'meta', 'context-blog' ),
		'context_blog_date_translate'     => __( 'date', 'context-blog' ),
		'context_blog_comment_translate'  => __( 'comment', 'context-blog' ),
		'context_blog_category_translate' => __( 'category', 'context-blog' ),
		'context_blog_excerpt_translate'  => __( 'excerpt', 'context-blog' ),

	);
	wp_localize_script( 'context-blog-customizer-hide', 'taxonomy_translate', $taxonomy_translate );
	wp_enqueue_script( 'context_blog-customize-controls-js', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'context_blog-customize-controls-css', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'context_blog_customize_backend_scripts', 10 );

require get_template_directory() . '/inc/customizer/customizer-css.php';
require get_template_directory() . '/inc/customizer-sanitize.php';

require get_template_directory() . '/inc/customizer/panel/header-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/global-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/main-body-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/blog-post-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/footer-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/sidebar-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/singlepage-settings-panel.php';
require get_template_directory() . '/inc/customizer/panel/general-layout-panel.php';
require get_template_directory() . '/inc/customizer/panel/background-color-panel.php';
require get_template_directory() . '/inc/customizer/panel/forground-textcolor-panel.php';
require get_template_directory() . '/inc/customizer/panel/document-panel.php';
