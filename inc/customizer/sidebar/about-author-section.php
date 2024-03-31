<?php

$wp_customize->add_section(
	'context_blog_sidebar_about_author_section',
	array(
		'panel'    => 'context_blog_sidebar_settings_panel',
		'title'    => __( 'About author section', 'context-blog' ),
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'context_blog_image_author',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_author',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_sidebar_about_author_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/author.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_about_author_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_about_author_enable',
	array(
		'section' => 'context_blog_sidebar_about_author_section',
		'label'   => __( 'Enable this section at sidebar', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_about_author_heading',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_about_author_heading',
	array(
		'label'   => __( 'Title', 'context-blog' ),
		'section' => 'context_blog_sidebar_about_author_section',
		'type'    => 'text',
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_about_author_textarea',
	array(

		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_about_author_textarea',
	array(
		'label'   => __( 'Author description', 'context-blog' ),
		'section' => 'context_blog_sidebar_about_author_section',
		'type'    => 'text',

	)
);
$wp_customize->add_setting(
	'context_blog_sidebar_about_image',
	array(

		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	new WP_Customize_Cropped_Image_Control(
		$wp_customize,
		'context_blog_sidebar_about_image',
		array(
			'label'       => __( 'Author image', 'context-blog' ),
			'section'     => 'context_blog_sidebar_about_author_section',
			'settings'    => 'context_blog_sidebar_about_image',
			'context'     => 'your_setting_context',
			'flex_width'  => false,
			'flex_height' => false,
			'width'       => 300,
			'height'      => 300,
		)
	)
);

$wp_customize->add_setting(
	'context_blog_about_author_social_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_about_author_social_enable',
	array(
		'section' => 'context_blog_sidebar_about_author_section',
		'label'   => __( 'Show social links', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_about_author_readmore_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_about_author_readmore_text',
	array(
		'label'   => __( 'Text for read more button', 'context-blog' ),
		'section' => 'context_blog_sidebar_about_author_section',
		'type'    => 'text',
	)
);

$wp_customize->add_setting(
	'context_blog_about_author_readmore_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'context_blog_about_author_readmore_url',
	array(
		'label'   => __( 'Read more Url', 'context-blog' ),
		'section' => 'context_blog_sidebar_about_author_section',
		'type'    => 'url',
	)
);
