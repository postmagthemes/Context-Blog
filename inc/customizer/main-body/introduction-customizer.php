<?php

$wp_customize->add_section(
	'context_blog_introduction_section',
	array(
		'panel'    => 'context_blog_home_settings_panel',
		'title'    => __( 'Introduction section', 'context-blog' ),
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'context_blog_image_section1',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_section1',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_introduction_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/section1.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_introduction_enable_homepage',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_introduction_enable_homepage',
	array(
		'section' => 'context_blog_introduction_section',
		'label'   => __( 'Enable this section on the homepage', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_introduction_enable_blogpage',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_introduction_enable_blogpage',
	array(
		'section' => 'context_blog_introduction_section',
		'label'   => __( 'Enable this section on the blog page', 'context-blog' ),
		'type'    => 'checkbox',
	)
);
$context_blog_latestid = 0;
$wp_customize->add_setting(
	'context_blog_introduction_section_info',
	array(
		'capability'        => 'edit_theme_options',
		'default'           => context_blog_pages( $context_blog_latestid ),
		'sanitize_callback' => 'context_blog_sanitize_dropdown_pages',
	)
);

$wp_customize->add_control(
	'context_blog_introduction_section_info',
	array(
		'label'    => __( 'Select your page for this section', 'context-blog' ),
		'section'  => 'context_blog_introduction_section',
		'type'     => 'dropdown-pages',
		'settings' => 'context_blog_introduction_section_info',

	)
);

$wp_customize->add_setting(
	'context_blog_introduction_section_excerpt_limit',
	array(
		'default'           => 30,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_introduction_section_excerpt_limit',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'context-blog' ),
		'description' => esc_html__( 'Excerpt Length determines the no of words in short description.', 'context-blog' ),
		'section'     => 'context_blog_introduction_section',
		'type'        => 'number',
	)
);

