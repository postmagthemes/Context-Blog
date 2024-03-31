<?php

	$wp_customize->add_section(
		'colors',
		array(
			'title'    => __( 'Colors', 'context-blog' ),
			'priority' => 38,
			'panel'    => 'context_blog_text_color_panel',

		)
	);

	$wp_customize->add_setting(
		'context_blog_theme_color_setting',
		array(
			'default'           => '#73B66B',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'context_blog_theme_color_setting',
			array(
				'label'    => __( 'Primary theme color', 'context-blog' ),
				'section'  => 'colors',
				'type'     => 'color',
				'priority' => 2,
			)
		)
	);

	$wp_customize->add_setting(
		'context_blog_color_opacity_header_text_color',
		array(
			'default'           => 1,
			'sanitize_callback' => 'context_blog_sanitize_float',
		)
	);

	$wp_customize->add_control(
		'context_blog_color_opacity_header_text_color',
		array(
			'label'       => __( 'Opacity of header text color ', 'context-blog' ),
			'description' => __( 'Opacity is the degree to which overlaying color is shown. If you wish to completely remove it then configure value 0 here. Note:- This opacity is used in the case of site title and tagline shown at the center of header image.', 'context-blog' ),
			'section'     => 'colors',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => '0',
				'step' => '0.1',
				'max'  => '1.0',
			),

		)
	);
	// Site-title Color on the top of header
	$wp_customize->add_setting(
		'context_blog_headertext_color_topheader',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'context_blog_headertext_color_topheader',
			array(
				'label'       => __( 'Header text color on top of the header', 'context-blog' ),
				'description' => __( 'Note: Header text color applies for both site title and tag line', 'context-blog' ),
				'section'     => 'colors',
				'type'        => 'color',

			)
		)
	);

