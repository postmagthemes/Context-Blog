<?php
/**
 * Theme optons panel at Theme Customizer
 *
 * @package context-blog
 * @since   1.0.0
 */

add_action( 'customize_register', 'context_blog_page_settings_register' );

function context_blog_page_settings_register( $wp_customize ) {
	$wp_customize->add_panel(
		'context_blog_page_settings_panel',
		array(
			'priority'       => 24,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Page settings', 'context-blog' ),
		)
	);

	include get_template_directory() . '/inc/customizer/page/single-blog.php';
}
