<?php

$wp_customize->add_section(
	'context_blog_sidebar_fullwidth_section',
	array(
		'panel'    => 'context_blog_sidebar_settings_panel',
		'title'    => __( 'Full-width slider section', 'context-blog' ),
		'priority' => 2,
	)
);


$wp_customize->add_setting(
	'context_blog_image_section7',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	'context_blog_image_section7',
	array(
		'type'        => 'Image',
		'section'     => 'context_blog_sidebar_fullwidth_section',
		'input_attrs' => array(
			'src' => esc_url( get_template_directory_uri() . '/images/section7.jpeg' ),
		),
	)
);


$wp_customize->add_setting(
	'context_blog_sidebar_fullwidth_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_fullwidth_enable',
	array(
		'section' => 'context_blog_sidebar_fullwidth_section',
		'label'   => __( 'Enable this section at sidebar', 'context-blog' ),
		'type'    => 'checkbox',
	)
);

$wp_customize->add_setting(
	'context_blog_sidebar_fullwidth_order',
	array(

		'default'           => 'date',
		'sanitize_callback' => 'context_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_fullwidth_order',
	array(
		'label'   => __( 'Select chronological order', 'context-blog' ),
		'section' => 'context_blog_sidebar_fullwidth_section',
		'type'    => 'select',
		'choices' => array(
			'date'          => __( 'Recent publish date', 'context-blog' ),
			'comment_count' => __( 'Comment count', 'context-blog' ),
			'rand'          => __( 'Random', 'context-blog' ),

		),

	)
);
require get_template_directory() . '/inc/dropdown-category.php';

$wp_customize->add_setting(
	'context_blog_sidebar_fullwidth_category_name',
	array(
		'default'           => 0,
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new context_blog_My_Dropdown_Category_Control(
		$wp_customize,
		'context_blog_sidebar_fullwidth_category_name',
		array(
			'label'   => __( 'Select category', 'context-blog' ),
			'section' => 'context_blog_sidebar_fullwidth_section',
		)
	)
);



$wp_customize->add_setting(
	'context_blog_sidebar_fullwidth_number_of_display',
	array(
		'default'           => 2,
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	'context_blog_sidebar_fullwidth_number_of_display',
	array(
		'label'   => esc_html__( 'Maximum number of posts to show', 'context-blog' ),
		'section' => 'context_blog_sidebar_fullwidth_section',
		'type'    => 'number',
	)
);

$context_blog_post_taxonomy_arrays = array( __( 'category', 'context-blog' ), __( 'meta', 'context-blog' ), __( 'date', 'context-blog' ), __( 'comment', 'context-blog' ) );
foreach ( $context_blog_post_taxonomy_arrays as  $context_blog_post_taxonomy ) {

	$wp_customize->add_setting(
		'context_blog_sidebar_fullwidth_slider_' . $context_blog_post_taxonomy,
		array(
			'default'           => 1,
			'sanitize_callback' => 'context_blog_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'context_blog_sidebar_fullwidth_slider_' . $context_blog_post_taxonomy,
		array(
			/* translators: %s: Label */
			'label'   => sprintf( __( 'Show %s', 'context-blog' ), $context_blog_post_taxonomy ),
			'section' => 'context_blog_sidebar_fullwidth_section',
			'type'    => 'checkbox',
		)
	);
}
