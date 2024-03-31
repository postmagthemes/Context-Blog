<?php
// Register sections.
	$wp_customize->add_section(
		new Context_blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => __( 'Go to Pro', 'context-blog' ),
				'pro_text' => __( 'Buy Premium version', 'context-blog' ),
				'pro_url'  => esc_url( 'https://www.postmagthemes.com/downloads/context-blog-pro-wordpress-theme/' ),
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_section(
		new Context_blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell2',
			array(
				'title'    => esc_html__( 'View', 'context-blog' ),
				'pro_text' => esc_html__( 'Generic', 'context-blog' ),
				'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/generic-document/' ),
				'priority' => 2,
				'panel'    => 'context_blog_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Context_blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell3',
			array(
				'title'    => esc_html__( 'View', 'context-blog' ),
				'pro_text' => esc_html__( 'Specific', 'context-blog' ),
				'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/' ),
				'priority' => 3,
				'panel'    => 'context_blog_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Context_blog_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell4',
			array(
				'title'    => esc_html__( 'About', 'context-blog' ),
				'pro_text' => esc_html__( 'Context Blog', 'context-blog' ),
				'pro_url'  => esc_url( 'https://www.postmagthemes.com/downloads/context-blog-free-wordpress-theme/' ),
				'priority' => 3,
				'panel'    => 'context_blog_document_panel',
			)
		)
	);
		$wp_customize->add_section(
			new Context_blog_Customize_Section_Upsell(
				$wp_customize,
				'theme_upsell6',
				array(
					'title'    => esc_html__( 'View', 'context-blog' ),
					'pro_text' => esc_html__( 'Text color', 'context-blog' ),
					'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/detail-on-text-color-and-theme-color-changes/' ),
					'priority' => 3,
					'panel'    => 'context_blog_text_color_panel',
				)
			)
		);
		$wp_customize->add_section(
			new Context_blog_Customize_Section_Upsell(
				$wp_customize,
				'theme_upsell7',
				array(
					'title'    => esc_html__( 'View', 'context-blog' ),
					'pro_text' => esc_html__( 'Background color', 'context-blog' ),
					'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/detail-on-background-color-changes/' ),
					'priority' => 3,
					'panel'    => 'context_blog_background_color_panel',
				)
			)
		);
		$wp_customize->add_section(
			new Context_blog_Customize_Section_Upsell(
				$wp_customize,
				'theme_upsell8',
				array(
					'title'    => esc_html__( 'View', 'context-blog' ),
					'pro_text' => esc_html__( 'Section appearance', 'context-blog' ),
					'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/main-body-slider-section-and-sidebar-appearance-in-context-blog/' ),
					'priority' => 3,
					'panel'    => 'context_blog_home_settings_panel',
				)
			)
		);
		$wp_customize->add_section(
			new Context_blog_Customize_Section_Upsell(
				$wp_customize,
				'theme_upsell9',
				array(
					'title'    => esc_html__( 'View', 'context-blog' ),
					'pro_text' => esc_html__( 'Sidebar appearance', 'context-blog' ),
					'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/main-body-slider-section-and-sidebar-appearance-in-context-blog/' ),
					'priority' => 3,
					'panel'    => 'context_blog_sidebar_settings_panel',
				)
			)
		);
		$wp_customize->add_section(
			new Context_blog_Customize_Section_Upsell(
				$wp_customize,
				'theme_upsell10',
				array(
					'title'    => esc_html__( 'View', 'context-blog' ),
					'pro_text' => esc_html__( 'Setup section', 'context-blog' ),
					'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/how-to-setup-each-section-of-main-body-section/' ),
					'priority' => 3,
					'panel'    => 'context_blog_home_settings_panel',
				)
			)
		);
		$wp_customize->add_section(
			new Context_blog_Customize_Section_Upsell(
				$wp_customize,
				'theme_upsell11',
				array(
					'title'    => esc_html__( 'View', 'context-blog' ),
					'pro_text' => esc_html__( 'Post Credentials', 'context-blog' ),
					'pro_url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/detail-on-basic-configuration-parameter/' ),
					'priority' => 3,
					'panel'    => 'context_blog_blog_post_settings_panel',
				)
			)
		);
