<?php
/**
 * About context_blog_configuration
 *
 * @package context_blog
 */

$context_blog_config = array(
	'menu_name'           => esc_html__( 'Context blog setup', 'context-blog' ),
	'page_name'           => esc_html__( 'Context blog setup', 'context-blog' ),

	/* translators: theme version */
	'welcome_title'       => sprintf( esc_html__( 'Welcome to %s - ', 'context-blog' ), 'Context blog' ),

	/* translators: 1: theme name */
	'welcome_content'     => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'context-blog' ), 'Context blog' ),

	// Quick links.
	'quick_links'         => array(
		'theme_url'         => array(
			'text' => esc_html__( 'Theme Details', 'context-blog' ),
			'url'  => esc_url( 'https://www.postmagthemes.com/downloads/context-blog-free-wordpress-theme/' ),
		),
		'demo_url'          => array(
			'text' => esc_html__( 'View Demo', 'context-blog' ),
			'url'  => esc_url( 'https://contextblog.postmagthemes.com/' ),
		),
		'demo_url'          => array(
			'text' => esc_html__( 'View Demo Premium', 'context-blog' ),
			'url'  => esc_url( 'https://contextblog.postmagthemes.com/contextblogpro' ),
		),
		'documentation_url' => array(
			'text' => esc_html__( 'View documentation', 'context-blog' ),
			'url'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/' ),
		),
		'pro_url'           => array(
			'text' => esc_html__( 'Buy Premium version', 'context-blog' ),
			'url'  => esc_url( 'https://www.postmagthemes.com/downloads/context-blog-pro-wordpress-theme' ),

		),
	),

	// Tabs.
	'tabs'                => array(
		'getting_started'     => esc_html__( 'Getting Started', 'context-blog' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'context-blog' ),
		'support'             => esc_html__( 'Support', 'context-blog' ),
	),

	// Getting started.
	'getting_started'     => array(
		array(
			'text'                => esc_html__( 'Find step-by-step instructions to set up the theme easily.', 'context-blog' ),
			'button_label'        => esc_html__( 'View documentation', 'context-blog' ),
			'button_link'         => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/' ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'text'                => esc_html__( 'We recommend few steps to take so that you can get a complete site like shown in the demo.', 'context-blog' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'context-blog' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=context-blog-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(

			'postmagthemes-demo-import' => array(
				'title'       => esc_html__( 'PostmagThemes Demo Import', 'context-blog' ),
				'description' => esc_html__( 'Please install the PostmagThemes Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'context-blog' ),
				'check'       => class_exists( 'PMDI_Plugin' ),
				'plugin_slug' => 'postmagthemes-demo-import',
				'id'          => 'postmagthemes-demo-import',
			),

		),
	),

	// Support.
	'support_content'     => array(
		'first'  => array(
			'title'        => esc_html__( 'Contact Support', 'context-blog' ),
			'icon'         => 'dashicons dashicons-sos',
			'button_label' => esc_html__( 'Contact Support', 'context-blog' ),
			'button_link'  => esc_url( 'https://www.postmagthemes.com/contact' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'context-blog' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'button_label' => esc_html__( 'View documentation', 'context-blog' ),
			'button_link'  => esc_url( 'https://www.postmagthemes.com/docs/documentation-of-free-context-blog-wp-theme-and-pro/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),

	),


);
context_blog_About::init( apply_filters( 'context_blog_about_filter', $context_blog_config ) );
