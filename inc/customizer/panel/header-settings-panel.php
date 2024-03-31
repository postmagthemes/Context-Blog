<?php
function context_blog_header_settings_register( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->priority = '20';
	$wp_customize->get_section( 'header_image' )->title    = __( 'Header Image or Media', 'context-blog' );
	$wp_customize->get_section( 'header_image' )->panel    = 'context_blog_header_settings_panel';

	/**
		 * Add Header settings Panel
		 *
		 * @since 1.0.0
		 */
	$wp_customize->add_panel(
		'context_blog_header_settings_panel',
		array(
			'priority'       => 21,
			'theme_supports' => '',
			'title'          => __( 'Header settings', 'context-blog' ),
		)
	);
	include get_template_directory() . '/inc/customizer/header/header-customizer.php';

}
add_action( 'customize_register', 'context_blog_header_settings_register' );
