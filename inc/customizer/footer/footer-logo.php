<?php
$wp_customize->add_section(
	'context_blog_footerlogo_section',
	array(
		'panel'    => 'context_blog_footer_section_panel',
		'title'    => __( 'Footer logo', 'context-blog' ),
		'priority' => 1,
	)
);

$wp_customize->add_setting(
	'context_blog_logo_location_footer',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_logo_location_footer',
	array(
		'label'    => __( 'Show logo on the left side of the footer', 'context-blog' ),
		'priority' => 4,
		'section'  => 'context_blog_footerlogo_section',
		'type'     => 'checkbox',
	)
);
