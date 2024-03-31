<?php
$wp_customize->add_section(
	'context_blog_footer_memo_settings',
	array(
		'panel'    => 'context_blog_footer_section_panel',
		'title'    => __( 'Memo section', 'context-blog' ),
		'priority' => 3,
	)
);

$wp_customize->add_setting(
	'context_blog_image_fmemo',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_fmemo',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_footer_memo_settings',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/footerMemo.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_footer_content',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_footer_content',
	array(
		'label'    => 'Write footer memo',
		'section'  => 'context_blog_footer_memo_settings',
		'type'     => 'text',
		'settings' => 'context_blog_footer_content',
	)
);

$wp_customize->add_setting(
	'context_blog_footer_readmore_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'context_blog_footer_readmore_text',
	array(
		'label'    => __( 'Text for read more button', 'context-blog' ),
		'section'  => 'context_blog_footer_memo_settings',
		'type'     => 'text',
		'settings' => 'context_blog_footer_readmore_text',
	)
);

$wp_customize->add_setting(
	'context_blog_footer_readmore_url',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'context_blog_footer_readmore_url',
	array(
		'label'    => __( 'Read more Url', 'context-blog' ),
		'section'  => 'context_blog_footer_memo_settings',
		'type'     => 'url',
		'settings' => 'context_blog_footer_readmore_url',
	)
);

$wp_customize->add_setting(
	'context_blog_footer_social_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
		'priority'          => 1,
	)
);

$wp_customize->add_control(
	'context_blog_footer_social_enable',
	array(
		'section' => 'context_blog_footer_memo_settings',
		'label'   => __( 'Show social links', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

