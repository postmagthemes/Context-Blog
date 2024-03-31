<?php

function context_blog_document_panel_register( $wp_customize ) {
	$wp_customize->register_section_type( 'Context_blog_Customize_Section_Upsell' );

	$wp_customize->add_panel(
		'context_blog_document_panel',
		array(
			'priority'       => 1,
			'theme_supports' => '',
			'title'          => __( 'Documents', 'context-blog' ),
		)
	);

	include get_template_directory() . '/inc/customizer/document/document.php';

}
add_action( 'customize_register', 'context_blog_document_panel_register' );
