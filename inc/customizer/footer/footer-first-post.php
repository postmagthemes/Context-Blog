<?php
$wp_customize->add_section(
    'context_blog_first_footer_post_settings',
    array(
    'panel'     => 'context_blog_footer_section_panel',
    'title'     => __('First post section', 'context-blog'),
    'priority'  => 3,
    ) 
);

$wp_customize->add_setting( 'context_blog_image_fnews1', array(
    'default' => '',
    'sanitize_callback' => 'esc_url',
) );
  
  $wp_customize->add_control( 'context_blog_image_fnews1', array(
    'type' => 'Image',
    'section' => 'context_blog_first_footer_post_settings',
    'input_attrs' => array(
    'src'  => esc_url(get_template_directory_uri().'/images/footernews1.jpeg'),
    ),
) );

$wp_customize->add_setting(
    'context_blog_footer_first_list_post',
    array(
      'default'           => 1,
      'sanitize_callback' => 'context_blog_sanitize_checkbox',
    )
);
  
$wp_customize->add_control(
    'context_blog_footer_first_list_post',
    array(
      'section'     => 'context_blog_first_footer_post_settings',
      'label'       => __('Enable this section on the footer', 'context-blog'),
      'type'        => 'checkbox'
    )       
);
  
$wp_customize->add_setting(
    'context_blog_footer_news1_title', array(
      'default'               => '',
      'sanitize_callback'     => 'sanitize_text_field'
    ) 
);
  
$wp_customize->add_control(
    'context_blog_footer_news1_title', array(
      'label'                 => __('Title', 'context-blog'),
      'section'               => 'context_blog_first_footer_post_settings',
      'type'                  => 'text',
      'settings'              => 'context_blog_footer_news1_title',
    ) 
);
  
  
$wp_customize->add_setting(
    'context_blog_footer_news1_order', array(
        
      'default'     => 'date',
      'sanitize_callback' => 'context_blog_sanitize_select'
    ) 
);
    
    $wp_customize->add_control(
        'context_blog_footer_news1_order', 
        array(
        'label'     => __('Select chronological order', 'context-blog'),
        'section'    => 'context_blog_first_footer_post_settings',
        'type'      => 'select',
        'choices'    => array (
          'date'    => __('Recent publish date', 'context-blog'),
          'comment_count' => __('Comment count', 'context-blog'),
          'rand'  => __( 'Random', 'context-blog' ),

        )
        ) 
    );
    require get_template_directory() . '/inc/dropdown-category.php' ;
    
    $wp_customize->add_setting(
        'context_blog_footer_news1_category_name', 
        array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
        ) 
    );
    
    $wp_customize->add_control(
        new context_blog_My_Dropdown_Category_Control(
            $wp_customize, 'context_blog_footer_news1_category_name', array(
            'label'   => __('Select category', 'context-blog'),
            'section' => 'context_blog_first_footer_post_settings'        
            )   
        ) 
    );
    $wp_customize->add_setting(
        'context_blog_footer_news1_number',
        array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
        )
    );
    
    $wp_customize->add_control(
        'context_blog_footer_news1_number',
        array(
        'section'     => 'context_blog_first_footer_post_settings',
        'label'       => __('Maximum number of posts to show', 'context-blog'),
        'type'        => 'number',
        )       
    );

    $context_blog_post_taxonomy_arrays = array(__('category', 'context-blog'),__('meta', 'context-blog'),__('date', 'context-blog'),__('comment', 'context-blog'));
    foreach ($context_blog_post_taxonomy_arrays as  $context_blog_post_taxonomy) {
        if ($context_blog_post_taxonomy == __('meta', 'context-blog') or $context_blog_post_taxonomy == __('date', 'context-blog')) : 
            $wp_customize->add_setting(
                'context_blog_footer_news1_'.$context_blog_post_taxonomy, array(
                'default'               => 1,
                'sanitize_callback' => 'context_blog_sanitize_checkbox'
                ) 
            );
    else :
        $wp_customize->add_setting(
            'context_blog_footer_news1_'.$context_blog_post_taxonomy, array(
            'default'               => 0 ,
            'sanitize_callback' => 'context_blog_sanitize_checkbox'
            ) 
        );
    endif;


    $wp_customize->add_control(
        'context_blog_footer_news1_'.$context_blog_post_taxonomy, array(
        /* translators: %s: Label */ 
        'label'                 =>  sprintf(__('Show %s', 'context-blog'), $context_blog_post_taxonomy),
        'section'               => 'context_blog_first_footer_post_settings',
        'type'                  => 'checkbox',
        ) 
        );
    }
