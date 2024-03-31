<?php
/**
 *
 *
 * @package context-blog
 * @since   1.0.0
 */

add_action( 'customize_register', 'context_blog_blog_post_register' );

function context_blog_blog_post_register( $wp_customize ) {
	$wp_customize->add_panel(
		'context_blog_blog_post_settings_panel',
		array(
			'priority'       => 22,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Blog post settings', 'context-blog' ),
		)
	);

	include get_template_directory() . '/inc/customizer/main-body/main-blog-section-customizer.php';
}
