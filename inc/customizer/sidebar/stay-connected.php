<?php

$wp_customize->add_section(
	'context_blog_stay_connected_section',
	array(
		'panel'    => 'context_blog_sidebar_settings_panel',
		'title'    => __( 'Social links', 'context-blog' ),
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'context_blog_image_stayconnected',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_stayconnected',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_stay_connected_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/sociallinksidebar.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_stay_connected_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_stay_connected_enable',
	array(
		'section' => 'context_blog_stay_connected_section',
		'label'   => __( 'Enable this section at sidebar', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_stay_connected_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_stay_connected_heading',
	array(
		'label'    => __( 'Title', 'context-blog' ),
		'section'  => 'context_blog_stay_connected_section',
		'type'     => 'text',
		'settings' => 'context_blog_stay_connected_heading',
	)
);

