<?php
$wp_customize->add_section(
	'context_blog_modal_popup',
	array(
		'panel'    => 'context_blog_global_settings_panel',
		'title'    => __( 'Modal popup for read more ', 'context-blog' ),
		'priority' => 1,
	)
);
$wp_customize->add_setting(
	'context_blog_modal_popup_enable',
	array(
		'default'           => 1,
		'sanitize_callback' => 'context_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'context_blog_modal_popup_enable',
	array(
		'label'       => __( 'Show modal popup', 'context-blog' ),
		'description' => __( 'A modal is a dialog box displayed on the screen when clicking the Read More button. It provides a user-friendly way of displaying detailed information about the post without navigating away from the current page.', 'context-blog' ),
		'priority'    => 2,
		'section'     => 'context_blog_modal_popup',
		'type'        => 'checkbox',
	)
);
