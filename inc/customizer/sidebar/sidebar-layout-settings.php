<?php

$wp_customize->add_section(
	'context_blog_sidebar_layout_settings',
	array(
		'panel'       => 'context_blog_sidebar_settings_panel',
		'title'       => __( 'Sidebar layout settings', 'context-blog' ),
		'priority'    => 2,
		'description' => __( 'Select the below option to show this section in the desired location', 'context-blog' ),
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_enable_homepage',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_enable_homepage',
	array(
		'section' => 'context_blog_sidebar_layout_settings',
		'label'   => __( 'Enable this section on the homepage', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_enable_blogpage',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_enable_blogpage',
	array(
		'section' => 'context_blog_sidebar_layout_settings',
		'label'   => __( 'Enable this section on the blog page', 'context-blog' ),
		'type'    => 'checkbox',
	)
);


$wp_customize->add_setting(
	'context_blog_sidebar_enable_page_detail',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_enable_page_detail',
	array(
		'section' => 'context_blog_sidebar_layout_settings',
		'label'   => __( 'Enable this section on the single post and page detail', 'context-blog' ),
		'type'    => 'checkbox',
	)
);
