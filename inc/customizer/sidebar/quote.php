<?php

$wp_customize->add_section(
	'context_blog_sidebar_quote_section',
	array(
		'panel'    => 'context_blog_sidebar_settings_panel',
		'title'    => __( 'Quote section', 'context-blog' ),
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'context_blog_image_quote',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_quote',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_sidebar_quote_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/quote.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_quote_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_quote_enable',
	array(
		'section' => 'context_blog_sidebar_quote_section',
		'label'   => __( 'Enable this section at sidebar', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_quote_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_quote_heading',
	array(
		'label'    => __( 'Title', 'context-blog' ),
		'section'  => 'context_blog_sidebar_quote_section',
		'type'     => 'text',
		'settings' => 'context_blog_sidebar_quote_heading',
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_quote_texarea',
	array(

		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_quote_texarea',
	array(
		'label'    => __( 'Write Quote', 'context-blog' ),
		'section'  => 'context_blog_sidebar_quote_section',
		'settings' => 'context_blog_sidebar_quote_texarea',
		'type'     => 'text',

	)
);
