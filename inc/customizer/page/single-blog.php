<?php

$wp_customize->add_section(
	'context_blog_single_page_section',
	array(
		'panel'    => 'context_blog_page_settings_panel',
		'title'    => __( 'Single page', 'context-blog' ),
		'priority' => 3,
	)
);


$context_blog_post_taxonomy_arrays = array( __( 'meta', 'context-blog' ), __( 'date', 'context-blog' ), __( 'comment', 'context-blog' ) );
foreach ( $context_blog_post_taxonomy_arrays as  $context_blog_post_taxonomy ) {

	$wp_customize->add_setting(
		'context_blog_singlepage_' . $context_blog_post_taxonomy,
		array(
			'default'           => 1,
			'sanitize_callback' => 'context_blog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'context_blog_singlepage_' . $context_blog_post_taxonomy,
		array(
			/* translators: %s: Label */
			'label'   => sprintf( __( 'Show %s', 'context-blog' ), $context_blog_post_taxonomy ),
			'section' => 'context_blog_single_page_section',
			'type'    => 'checkbox',
		)
	);
}


$wp_customize->add_setting(
	'context_blog_single_page_related_post_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_setting(
	'context_blog_singlepage_related_customize_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new context_blog_Customizer_Title(
		$wp_customize,
		'context_blog_singlepage_related_customize_heading',
		array(
			'label'   => __( 'Related post settings', 'context-blog' ),
			'section' => 'context_blog_single_page_section',
		)
	)
);

$wp_customize->add_control(
	'context_blog_single_page_related_post_text',
	array(
		'label'    => __( 'Title', 'context-blog' ),
		'section'  => 'context_blog_single_page_section',
		'type'     => 'text',
		'settings' => 'context_blog_single_page_related_post_text',
	)
);

$wp_customize->add_setting(
	'context_blog_related_posts_limit',
	array(
		'default'           => 22,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_related_posts_limit',
	array(
		'label'       => __( 'Excerpt Length', 'context-blog' ),
		'description' => __( 'Excerpt Length determines the no of words in short description.', 'context-blog' ),
		'section'     => 'context_blog_single_page_section',
		'type'        => 'number',
	)
);
