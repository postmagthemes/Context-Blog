<?php
 /**
  * Background color
  */

	$wp_customize->add_section(
		'context_blog_background_color',
		array(
			'title'    => __( 'Background color', 'context-blog' ),
			'priority' => 20,
			'panel'    => 'context_blog_background_color_panel',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'background_color',
			array(
				'label'    => __( 'Main background color', 'context-blog' ),
				'section'  => 'context_blog_background_color',
				'settings' => 'background_color',
				'type'     => 'color',
			)
		)
	);

	$wp_customize->add_setting(
		'context_blog_background_color_site_title_homepage',
		array(
			'default'           => '#000',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'context_blog_background_color_site_title_homepage',
			array(
				'label'       => __( 'Overlaying color over the header image', 'context-blog' ),
				'description' => __( 'This feature cover the header image with the color of your choice to enhanced viewing of header image. Note:- This overlaying color does not apply to header video.', 'context-blog' ),
				'section'     => 'context_blog_background_color',
				'type'        => 'color',
			)
		)
	);
	$wp_customize->add_setting(
		'context_blog_background_color_opacity_site_title',
		array(
			'default'           => '0',
			'sanitize_callback' => 'context_blog_sanitize_float',
		)
	);

	$wp_customize->add_control(
		'context_blog_background_color_opacity_site_title',
		array(
			'label'       => __( 'Opacity of overlaying color', 'context-blog' ),
			'description' => __( 'Opacity is the degree to which overlaying color is shown. If you wish to completly remove it then configure value 0 here.', 'context-blog' ),
			'section'     => 'context_blog_background_color',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => '0',
				'step' => '0.1',
				'max'  => '1.0',
			),

		)
	);
