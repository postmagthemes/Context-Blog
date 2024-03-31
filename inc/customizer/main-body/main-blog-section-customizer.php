<?php

$wp_customize->add_section(
	'context_blog_home_main_blog_section',
	array(
		'panel'    => 'context_blog_blog_post_settings_panel',
		'title'    => __( 'Blog post section', 'context-blog' ),
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'context_blog_image_section6',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_section6',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_home_main_blog_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/section6.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_home_main_blog_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_home_main_blog_enable',
	array(
		'section' => 'context_blog_home_main_blog_section',
		'label'   => __( 'Enable this section', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_home_main_blog_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_home_main_blog_title',
	array(
		'section' => 'context_blog_home_main_blog_section',
		'label'   => __( 'Title', 'context-blog' ),
		'type'    => 'text',
	)
);


$wp_customize->add_setting(
	'context_blog_main_blog_design',
	array(
		'default'           => 2,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_main_blog_design',
	array(
		'label'       => __( 'Blog Post section layout types', 'context-blog' ),
		'description' => __( 'This setting also change archive and search page layout type.', 'context-blog' ),
		'section'     => 'context_blog_home_main_blog_section',
		'type'        => 'select',
		'choices'     => array(
			'1' => __( 'Single column', 'context-blog' ),
			'2' => __( 'Double column with feature', 'context-blog' ),
			'3' => __( 'Masonry', 'context-blog' ),

		),
	)
);

$wp_customize->add_setting(
	'context_blog_main_blog_excerpt_limit',
	array(
		'default'           => 22,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_main_blog_excerpt_limit',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'context-blog' ),
		'description' => esc_html__( 'Excerpt Length determines the no of words in short description.', 'context-blog' ),
		'section'     => 'context_blog_home_main_blog_section',
		'type'        => 'number',
	)
);

$context_blog_post_taxonomy_arrays = array( __( 'category', 'context-blog' ), __( 'meta', 'context-blog' ), __( 'date', 'context-blog' ), __( 'comment', 'context-blog' ), __( 'excerpt', 'context-blog' ) );
foreach ( $context_blog_post_taxonomy_arrays as  $context_blog_post_taxonomy ) {

	$wp_customize->add_setting(
		'context_blog_main_blog_' . $context_blog_post_taxonomy,
		array(
			'default'           => 1,
			'sanitize_callback' => 'context_blog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'context_blog_main_blog_' . $context_blog_post_taxonomy,
		array(
			/* translators: %s: Label */
			'label'   => sprintf( __( 'Show %s', 'context-blog' ), $context_blog_post_taxonomy ),
			'section' => 'context_blog_home_main_blog_section',
			'type'    => 'checkbox',
		)
	);
}

$wp_customize->add_setting(
	'context_blog_main_blog_readmore',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_main_blog_readmore',
	array(
		'section' => 'context_blog_home_main_blog_section',
		'label'   => __( 'Show read more', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_section(
	'context_blog_mainblog_advertise_section',
	array(
		'panel'    => 'context_blog_blog_post_settings_panel',
		'title'    => __( 'Advertisement settings', 'context-blog' ),
		'priority' => 2,
	)
);

$wp_customize->add_setting(
	'context_blog_mainblog_ads_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_mainblog_ads_enable',
	array(
		'section' => 'context_blog_mainblog_advertise_section',
		'label'   => __( 'Enable this section on the homepage', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_mainblog_ads_image',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);

$wp_customize->add_control(
	new WP_Customize_Cropped_Image_Control(
		$wp_customize,
		'context_blog_mainblog_ads_image',
		array(
			'label'       => __( 'Advertisement image', 'context-blog' ),
			'description' => __( 'Recommended size is 728px by 90px', 'context-blog' ),
			'section'     => 'context_blog_mainblog_advertise_section',
			'setting'     => 'context_blog_mainblog_ads_image',
			'context'     => 'your_setting_context',
			'flex_width'  => false,
			'flex_height' => false,
			'width'       => 728,
			'height'      => 90,
		)
	)
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting(
	'context_blog_mainblog_ads_image_url',
	array(

		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'context_blog_mainblog_ads_image_url',
	array(
		'label'    => esc_html__( 'URL Link', 'context-blog' ),
		'section'  => 'context_blog_mainblog_advertise_section',
		'type'     => 'text',
		'priority' => 90,
	)
);

