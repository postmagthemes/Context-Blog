<?php

$wp_customize->add_section(
	'context_blog_toplogo_section',
	array(
		'panel'    => 'context_blog_header_settings_panel',
		'title'    => __( 'Top logo', 'context-blog' ),
		'priority' => 2,
	)
);
$wp_customize->add_setting(
	'context_blog_logo_location_top',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_logo_location_top',
	array(
		'label'    => __( 'Show logo on the left side of the top header', 'context-blog' ),
		'priority' => 2,
		'section'  => 'context_blog_toplogo_section',
		'type'     => 'checkbox',
	)
);

$wp_customize->add_section(
	'context_blog_sidepanel_section',
	array(
		'panel'    => 'context_blog_header_settings_panel',
		'title'    => __( 'Side menu', 'context-blog' ),
		'priority' => 5,
	)
);

$wp_customize->add_setting(
	'context_blog_sidepanel_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidepanel_enable',
	array(
		'label'       => __( 'Show side menu', 'context-blog' ),
		'description' => __( 'Content of this side menu is configured via appearance >> menu. Here under menu settings select display location as Side panel menu. It supports level 1 menu only.', 'context-blog' ),
		'priority'    => 1,
		'section'     => 'context_blog_sidepanel_section',
		'type'        => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_image_sidemenu',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_sidemenu',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_sidepanel_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/sidemenu.jpeg' ),
		),
	)
);

$wp_customize->add_section(
	'context_blog_social_link_section',
	array(
		'panel'    => 'context_blog_header_settings_panel',
		'title'    => __( 'Top social links', 'context-blog' ),
		'priority' => 4,
	)
);

$wp_customize->add_setting(
	'context_blog_image_topsocial',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_topsocial',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_social_link_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/uppersocial.jpeg' ),
		),
	)
);

$wp_customize->add_setting(
	'context_blog_header_social_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_header_social_enable',
	array(
		'section' => 'context_blog_social_link_section',
		'label'   => __( 'Show social links', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_section(
	'context_blog_advertise_section',
	array(
		'panel'    => 'context_blog_header_settings_panel',
		'title'    => __( 'Advertisement settings', 'context-blog' ),
		'priority' => 1,
	)
);
$wp_customize->add_setting(
	'context_blog_top_header_ads_enable',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_top_header_ads_enable',
	array(
		'section' => 'context_blog_advertise_section',
		'label'   => __( 'Enable this section on the homepage', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_top_header_ads_image',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);

$wp_customize->add_control(
	new WP_Customize_Cropped_Image_Control(
		$wp_customize,
		'context_blog_top_header_ads_image',
		array(
			'label'       => __( 'Advertisement image', 'context-blog' ),
			'description' => __( 'Recommended size is 728px by 90px', 'context-blog' ),
			'section'     => 'context_blog_advertise_section',
			'setting'     => 'context_blog_top_header_ads_image',
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
	'context_blog_top_header_ads_image_url',
	array(

		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control(
	'context_blog_top_header_ads_image_url',
	array(
		'label'    => esc_html__( 'URL Link', 'context-blog' ),
		'section'  => 'context_blog_advertise_section',
		'type'     => 'text',
		'priority' => 90,
	)
);

$wp_customize->add_setting(
	'context_blog_header_image_enable_homepage',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_header_image_enable_homepage',
	array(
		'label'    => __( 'Enable this section on the homepage', 'context-blog' ),
		'priority' => 1,
		'section'  => 'header_image',
		'type'     => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_header_image_enable_blogpage',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_header_image_enable_blogpage',
	array(
		'label'    => __( 'Enable this section on the blog page', 'context-blog' ),
		'priority' => 1,
		'section'  => 'header_image',
		'type'     => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_logo_location_onHeaderImage',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_logo_location_onHeaderImage',
	array(
		'label'    => __( 'Show logo at the center of the header image', 'context-blog' ),
		'priority' => 10,
		'section'  => 'header_image',
		'type'     => 'checkbox',
	)
);

$wp_customize->add_section(
	'context_blog_header_sitetitle_section',
	array(
		'panel'    => 'context_blog_header_settings_panel',
		'title'    => __( 'Top site title and tagline', 'context-blog' ),
		'priority' => 3,
	)
);
$wp_customize->add_setting(
	'context_blog_topsite_title_location',
	array(
		'default'           => 0,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_topsite_title_location',
	array(
		'label'    => __( 'Show site title and tagline on top of the header', 'context-blog' ),
		'priority' => 1,
		'section'  => 'context_blog_header_sitetitle_section',
		'type'     => 'checkbox',
	)
);
$wp_customize->add_setting(
	'context_blog_headerimagesite_title_location',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_headerimagesite_title_location',
	array(
		'label'    => __( 'Show site title and tagline at the center of header image', 'context-blog' ),
		'priority' => 20,
		'section'  => 'header_image',
		'type'     => 'checkbox',
	)
);
