<?php
/**
 * Theme optons panel at Theme Customizer
 *
 * @package context-blog
 * @since   1.0.0
 */

add_action( 'customize_register', 'context_blog_home_option_register' );

function context_blog_home_option_register( $wp_customize ) {
	include get_template_directory() . '/inc/repeater/class-repeater-settings.php';
	include get_template_directory() . '/inc/repeater/class-control-repeater.php';

	$wp_customize->add_panel(
		'context_blog_home_settings_panel',
		array(
			'priority'       => 21,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Main body settings', 'context-blog' ),
		)
	);
	include get_template_directory() . '/inc/customizer/main-body/introduction-customizer.php';
	include get_template_directory() . '/inc/customizer/main-body/card-slider-customizer.php';
	include get_template_directory() . '/inc/customizer/main-body/full-screen-slider-customizer.php';
	include get_template_directory() . '/inc/customizer/main-body/gallery-slider-customizer.php';
}
