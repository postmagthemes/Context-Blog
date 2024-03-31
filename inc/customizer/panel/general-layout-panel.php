<?php
/**
 * Theme optons panel at Theme Customizer
 *
 * @package context-blog
 * @since   1.0.0
 */

add_action( 'customize_register', 'context_blog_layout_register' );

function context_blog_layout_register( $wp_customize ) {

	$wp_customize->add_panel(
		'context_blog_layout_panel',
		array(
			'priority'       => 32,
			'theme_supports' => '',
			'title'          => __( 'General layout settings', 'context-blog' ),
		)
	);

	include get_template_directory() . '/inc/customizer/layout/general-layout.php';

}
