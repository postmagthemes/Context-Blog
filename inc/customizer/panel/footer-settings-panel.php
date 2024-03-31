<?php
add_action( 'customize_register', 'context_blog_footer_section_register' );

function context_blog_footer_section_register( $wp_customize ) {
	$wp_customize->add_panel(
		'context_blog_footer_section_panel',
		array(
			'priority'       => 24,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Footer settings', 'context-blog' ),
		)
	);
	include get_template_directory() . '/inc/customizer/footer/footer-memo.php';
	include get_template_directory() . '/inc/customizer/footer/footer-first-post.php';
	include get_template_directory() . '/inc/customizer/footer/footer-second-post.php';
	include get_template_directory() . '/inc/customizer/footer/footer-logo.php';
}
