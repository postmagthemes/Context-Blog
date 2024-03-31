<?php

function context_blog_background_color_panel_register( $wp_customize ) {
	$wp_customize->add_panel(
		'context_blog_background_color_panel',
		array(
			'priority'       => 25,
			'theme_supports' => '',
			'title'          => __( 'Background color settings', 'context-blog' ),
		)
	);

	include get_template_directory() . '/inc/customizer/color/background-color.php';

}
add_action( 'customize_register', 'context_blog_background_color_panel_register' );
