<?php
function context_blog_forground_text_customize_color( $wp_customize ) {
	$wp_customize->add_panel(
		'context_blog_text_color_panel',
		array(
			'priority'       => 30,
			'theme_supports' => '',
			'title'          => __( 'Colors settings', 'context-blog' ),
		)
	);
	include get_template_directory() . '/inc/customizer/color/forground-text-color.php';

}
add_action( 'customize_register', 'context_blog_forground_text_customize_color' );
