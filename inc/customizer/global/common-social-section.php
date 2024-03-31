<?php
$wp_customize->add_section(
	'context_blog_common_social_link',
	array(
		'panel'    => 'context_blog_global_settings_panel',
		'title'    => __( 'Page social links', 'context-blog' ),
		'priority' => 1,
	)
);


/**
 * Social Links on Author section and introduciton page
*/

$wp_customize->add_section(
	'context_blog_author_social_link',
	array(
		'panel'    => 'context_blog_global_settings_panel',
		'title'    => __( 'Author social link', 'context-blog' ),
		'priority' => 1,
	)
);

$wp_customize->add_setting(
	new context_blog_Repeater_Setting(
		$wp_customize,
		'social_links_items',
		array(
			'default'           => array(
				array(
					'font' => 'fab fa-facebook-f',
					'link' => '#',
				),
				array(
					'font' => 'fab fa-instagram',
					'link' => '#',
				),
				array(
					'font' => 'fab fa-linkedin',
					'link' => '#',
				),
				array(
					'font' => 'fab fa-behance',
					'link' => '#',
				),
			),
			'sanitize_callback' => array( 'context_blog_Repeater_Setting', 'sanitize_repeater_setting' ),
		)
	)
);

$wp_customize->add_control(
	new context_blog_Control_Repeater(
		$wp_customize,
		'social_links_items',
		array(
			'section'   => 'context_blog_common_social_link',
			'label'     => __( 'Social Links', 'context-blog' ),
			'fields'    => array(
				'font' => array(
					'type'        => 'font',
					'label'       => __( 'Font Awesome Icon', 'context-blog' ),
					'description' => __( 'Example: fab fa-facebook', 'context-blog' ),
				),
				'link' => array(
					'type'        => 'url',
					'label'       => __( 'Link', 'context-blog' ),
					'description' => __( 'Example: https://facebook.com', 'context-blog' ),
				),
			),
			'row_label' => array(
				'type'  => 'field',
				'value' => __( 'social', 'context-blog' ),
				'field' => 'link',
			),
		)
	)
);

/**
 * Social Links on Author section and introduciton page
*/
$wp_customize->add_setting(
	new context_blog_Repeater_Setting(
		$wp_customize,
		'context_blog_introduction_social_links_items',
		array(
			'default'           => array(
				array(
					'font' => 'fab fa-facebook-f',
					'link' => '#',
				),
				array(
					'font' => 'fab fa-instagram',
					'link' => '#',
				),
				array(
					'font' => 'fab fa-linkedin',
					'link' => '#',
				),
			),
			'sanitize_callback' => array( 'context_blog_Repeater_Setting', 'sanitize_repeater_setting' ),
		)
	)
);

$wp_customize->add_control(
	new context_blog_Control_Repeater(
		$wp_customize,
		'context_blog_introduction_social_links_items',
		array(
			'section'   => 'context_blog_author_social_link',
			'label'     => __( 'Social Links', 'context-blog' ),
			'fields'    => array(
				'font' => array(
					'type'        => 'font',
					'label'       => __( 'Font Awesome Icon', 'context-blog' ),
					'description' => __( 'Example: fab fa-facebook-f', 'context-blog' ),
				),
				'link' => array(
					'type'        => 'url',
					'label'       => __( 'Link', 'context-blog' ),
					'description' => __( 'Example: http://facebook.com', 'context-blog' ),
				),
			),
			'row_label' => array(
				'type'  => 'field',
				'value' => __( 'social', 'context-blog' ),
				'field' => 'link',
			),
		)
	)
);
