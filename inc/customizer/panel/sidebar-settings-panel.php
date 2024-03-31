<?php
/**
 * Theme optons panel at Theme Customizer
 *
 * @package context-blog
 * @since   1.0.0
 */

add_action( 'customize_register', 'context_blog_sidebar_register' );

function context_blog_sidebar_register( $wp_customize ) {
	include get_template_directory() . '/inc/repeater/class-repeater-settings.php';
	include get_template_directory() . '/inc/repeater/class-control-repeater.php';

	$wp_customize->add_panel(
		'context_blog_sidebar_settings_panel',
		array(
			'priority'       => 23,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Sidebar settings', 'context-blog' ),
		)
	);

	include get_template_directory() . '/inc/customizer/sidebar/full-width.php';
	include get_template_directory() . '/inc/customizer/sidebar/about-author-section.php';
	include get_template_directory() . '/inc/customizer/sidebar/stay-connected.php';
	include get_template_directory() . '/inc/customizer/sidebar/quote.php';
	include get_template_directory() . '/inc/customizer/sidebar/sidebar-layout-settings.php';

}
