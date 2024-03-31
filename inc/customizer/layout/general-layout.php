<?php

$wp_customize->add_section(
	'context_blog_blogpost_layout_settings',
	array(
		'panel'       => 'context_blog_layout_panel',
		'title'       => __( 'Blog post layout', 'context-blog' ),
		'priority'    => 2,
		'description' => __( 'This number will change the width between Blog post section and sidebar.  This setting will also effect on static homepage, archive, search, and detail pages.', 'context-blog' ),
	)
);


$wp_customize->add_setting(
	'context_blog_mainblog_width',
	array(
		'default'           => 67,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_mainblog_width',
	array(
		'section'     => 'context_blog_blogpost_layout_settings',
		'label'       => __( 'Main blog width', 'context-blog' ),
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => '50',
			'step' => '1',
			'max'  => '80',
		),
		'description' => __( 'Default 67, Minimum 50, Maximum 80', 'context-blog' ),

	)
);


$wp_customize->add_section(
	'context_blog_detailpage_settings',
	array(
		'panel'       => 'context_blog_layout_panel',
		'title'       => __( 'Detail page layout', 'context-blog' ),
		'priority'    => 2,
		'description' => __( 'This number will change the width of detail page.', 'context-blog' ),
	)
);

$wp_customize->add_setting(
	'context_blog_singlepage_width',
	array(
		'default'           => 100,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_singlepage_width',
	array(
		'section'     => 'context_blog_detailpage_settings',
		'label'       => __( 'Detail page width', 'context-blog' ),
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => '55',
			'step' => '1',
			'max'  => '100',
		),
		'description' => __( 'Default 100, Minimum 50, Maximum 100', 'context-blog' ),

	)
);
