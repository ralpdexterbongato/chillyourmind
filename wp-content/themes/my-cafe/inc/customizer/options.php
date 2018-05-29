<?php
/**
 * Theme Options.
 *
 * @package My_Cafe
 */

$default = my_cafe_default_theme_options();

/**=========== Option Panel ===========**/
$wp_customize->add_panel(
    'my_cafe_basic_panel', 
    array(
        'title'             => __( 'Theme Options', 'my-cafe' ),
        'priority'          => 200, 
    )
);

/**=========== Header Setting - start ===========**/
$wp_customize->add_section(
    'my_cafe_header', 
    array(    
        'title'             => __( 'Header', 'my-cafe' ),
        'panel'             => 'my_cafe_basic_panel', 
    )
);  

/*----------- Sticky header -----------*/
$wp_customize->add_setting(
    'my_cafe[sticky_header]',
    array(
        'default'           => $default['sticky_header'],       
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[sticky_header]', 
    array(
        'label'             => __( 'Enable sticky header', 'my-cafe' ),
        'section'           => 'my_cafe_header',   
        'settings'          => 'my_cafe[sticky_header]',     
        'type'              => 'checkbox',
    )
);
/**=========== Header Setting - end ===========**/


/**=========== Slider Settings - start ===========**/
$wp_customize->add_section(
    'my_cafe_slider', 
    array(    
        'title'             => __( 'Slider', 'my-cafe' ),
        'panel'             => 'my_cafe_basic_panel'    
    )
);    

/*----------- Enable/Disable Slider -----------*/
$wp_customize->add_setting(
    'my_cafe[slider_enable]',
    array(
        'default'           => $default['slider_enable'],       
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[slider_enable]', 
    array(
        'label'             => __( 'Enable slider OR banner image', 'my-cafe' ),
        'section'           => 'my_cafe_slider',   
        'settings'          => 'my_cafe[slider_enable]',     
        'type'              => 'checkbox'
    )
);  

/*----------- Show/Hide slider excerpt -----------*/
$wp_customize->add_setting(
    'my_cafe[slider_excerpt_enable]', 
    array(
        'default'           => $default['slider_excerpt_enable'],       
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[slider_excerpt_enable]', 
    array(
        'label'             => __( 'Display excerpt', 'my-cafe' ),
        'section'           => 'my_cafe_slider',   
        'settings'          => 'my_cafe[slider_excerpt_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'my_cafe_main_slider',
    )
);

/*----------- Show/Hide slider button -----------*/
$wp_customize->add_setting(
    'my_cafe[slider_btn_enable]', 
    array(
        'default'           => $default['slider_btn_enable'],       
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[slider_btn_enable]', 
    array(
        'label'             => __( 'Display read button', 'my-cafe' ),
        'section'           => 'my_cafe_slider',   
        'settings'          => 'my_cafe[slider_btn_enable]',     
        'type'              => 'checkbox',
        'active_callback'   => 'my_cafe_main_slider',
    )
);

/*----------- Slider type -----------*/
$wp_customize->add_setting(
    'my_cafe[main_slider_type]', 
    array(
        'default'           => $default['main_slider_type'],        
        'sanitize_callback' => 'my_cafe_sanitize_select'
    )
);

$wp_customize->add_control(
    'my_cafe[main_slider_type]', 
    array(      
        'label'             => __( 'Select slider type', 'my-cafe' ),
        'section'           => 'my_cafe_slider',
        'settings'          => 'my_cafe[main_slider_type]',
        'type'              => 'radio',
        'choices'           => array(
            'slider'        => __( 'Slider', 'my-cafe' ),
            'banner-image'  => __( 'Banner image', 'my-cafe' ),              
        ),
        'active_callback'   => 'my_cafe_main_slider',
    )
);  

/*----------- Slider category -----------*/
$wp_customize->add_setting(
    'my_cafe[slider_cat]', 
    array(
        'default'           => $default['slider_cat'],        
        'sanitize_callback' => 'my_cafe_sanitize_number'
    )
);

$wp_customize->add_control(
    new My_Cafe_Customize_Category_Control(
        $wp_customize,
        'my_cafe[slider_cat]',
        array(
            'label'         => __( 'Category for slider', 'my-cafe'  ),
            'description'   => __( 'Posts of selected category will be used as sliders', 'my-cafe'  ),
            'settings'      => 'my_cafe[slider_cat]',
            'section'       => 'my_cafe_slider',
            'active_callback'   => 'my_cafe_slider_category',        
        )
    )
);

/*----------- Banner image -----------*/
$wp_customize->add_setting(
    'my_cafe[banner_image]', 
    array(
        'default'           => $default['banner_image'],             
        'sanitize_callback' => 'my_cafe_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'my_cafe[banner_image]', 
    array(
        'label'             => __( 'Banner image', 'my-cafe' ),   
        'description'       => __( 'Enter the ID of post to use as a banner image.', 'my-cafe'  ), 
        'settings'          => 'my_cafe[banner_image]',
        'section'           => 'my_cafe_slider',
        'type'              => 'text',
        'active_callback'   => 'my_cafe_banner_category',         
    )
);
/**=========== Slider Settings - end ===========**/


/**=========== Home Section - start ===========**/
$wp_customize->add_section(
    'my_cafe_home', 
    array(    
        'title'       => __( 'Home Sections', 'my-cafe' ),
        'panel'       => 'my_cafe_basic_panel'    
    )
);

/**=========== Show home page content ===========**/
$wp_customize->add_setting(
    'my_cafe[home_content]', 
    array(
        'default'           => $default['home_content'],       
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[home_content]', 
    array(
        'label'       => __( 'Show home content', 'my-cafe' ),
        'description' => __( 'Check this box to show page content in home page', 'my-cafe' ),
        'section'     => 'my_cafe_home',   
        'settings'    => 'my_cafe[home_content]',      
        'type'        => 'checkbox'
    )
);


// About us
$wp_customize->add_setting(
    'my_cafe[about_us]', 
    array(
        'default'           => $default['about_us'],             
        'sanitize_callback' => 'my_cafe_sanitize_number',          
    )
);  

$wp_customize->add_control(
    'my_cafe[about_us]', 
    array(
        'label'             => __( 'About us', 'my-cafe' ),   
        'description'       => __( 'Leave blank to hide this section', 'my-cafe'  ), 
        'settings'          => 'my_cafe[about_us]',
        'section'           => 'my_cafe_home',
        'type'              => 'dropdown-pages',         
    )
);


// Our services
$wp_customize->add_setting(
    'my_cafe[our_services]', 
    array(
        'default'           => $default['our_services'],      
        'sanitize_callback' => 'my_cafe_sanitize_number'
        )
    );  

$wp_customize->add_control(
    new My_Cafe_Customize_Category_Control(
        $wp_customize,
        'my_cafe[our_services]',
        array(
            'label'       => __( 'Our services', 'my-cafe' ),
            'description' => __( 'Leave blank to hide this section.', 'my-cafe' ),
            'settings'    => 'my_cafe[our_services]',
            'section'     => 'my_cafe_home',                    
            )
        )
    );

// Testimonial
$wp_customize->add_setting(
    'my_cafe[our_blog]', 
    array(
        'default'           => $default['our_blog'],      
        'sanitize_callback' => 'my_cafe_sanitize_number'
        )
    );  

$wp_customize->add_control(
    new My_Cafe_Customize_Category_Control(
        $wp_customize,
        'my_cafe[our_blog]',
        array(
            'label'       => __( 'Our blog', 'my-cafe' ),
            'description' => __( 'Leave blank to hide this section.', 'my-cafe' ),
            'settings'    => 'my_cafe[our_blog]',
            'section'     => 'my_cafe_home',                    
            )
        )
    );


/**=========== Home Section - end ===========**/


/**=========== Social Media Options - start ===========**/
$wp_customize->add_section(
    'my_cafe_social', 
    array(    
        'title'       => __( 'Social Media', 'my-cafe' ),
        'panel'       => 'my_cafe_basic_panel'    
        ));

/*----------- Social link text field -----------*/
$social_options = array('facebook', 'twitter', 'google_plus', 'instagram', 'linkedin', 'pinterest', 'youtube', 'vimeo', 'flickr', 'behance', 'dribbble', 'tumblr', 'github' );

foreach($social_options as $social) {

    $social_name = ucwords(str_replace('_', ' ', $social));

    $label = '';

    switch ($social) {

        case 'facebook':
        $label = __('Facebook', 'my-cafe' );
        break;

        case 'twitter':
        $label = __( 'Twitter', 'my-cafe'  );
        break;

        case 'google_plus':
        $label = __( 'Google Plus', 'my-cafe'  );
        break;

        case 'instagram':
        $label = __( 'Instagram', 'my-cafe'  );
        break;

        case 'linkedin':
        $label = __( 'LinkedIn', 'my-cafe'  );
        break;

        case 'pinterest':
        $label = __( 'Pinterest', 'my-cafe'  );
        break;

        case 'youtube':
        $label = __( 'Youtube', 'my-cafe'  );
        break;

        case 'vimeo':
        $label = __( 'vimeo', 'my-cafe'  );
        break;

        case 'flickr':
        $label = __( 'Flickr', 'my-cafe'  );
        break;

        case 'behance':
        $label = __( 'Behance', 'my-cafe'  );
        break;

        case 'dribbble':
        $label = __( 'Dribbble', 'my-cafe'  );
        break;

        case 'tumblr':
        $label = __( 'Tumblr', 'my-cafe'  );
        break;

        case 'github':
        $label = __( 'Github', 'my-cafe'  );
        break;

    }
    
    $wp_customize->add_setting( 'my_cafe['.$social.']', array(
        'sanitize_callback'     => 'esc_url_raw',
        'sanitize_js_callback'  =>  'esc_url_raw'
        ));

    $wp_customize->add_control( 'my_cafe['.$social.']', array(
        'label'     => $label,
        'type'      => 'text',
        'section'   => 'my_cafe_social',
        'settings'  => 'my_cafe['.$social.']'
        ));
}
/**=========== Social Media Options - end ===========**/


/**=========== General setting - start ===========**/
$wp_customize->add_section(
    'my_cafe_general', 
    array(    
        'title'       => __('General Setting', 'my-cafe' ),
        'panel'       => 'my_cafe_basic_panel'    
    )
);

/**=========== Page layout ===========**/
$wp_customize->add_setting( 
    'my_cafe[sidebar]',
    array(
        'default'           => $default['sidebar'],
        'sanitize_callback' => 'my_cafe_sanitize_select',
    )
);
$wp_customize->add_control( 'my_cafe[sidebar]',
    array(
        'label'       => esc_html__( 'Page layout', 'my-cafe'  ),
        'section'     => 'my_cafe_general',   
        'settings'    => 'my_cafe[sidebar]',
        'type'        => 'radio',
        'choices'     => array(
            'right'     => esc_html__( 'Right sidebar', 'my-cafe'  ),
            'left'      => esc_html__( 'Left sidebar', 'my-cafe'  ),
            'no_side'   => esc_html__( 'No sidebar', 'my-cafe'  ),
            )
    )
);

/**=========== Enable/Disable - post date ===========**/
$wp_customize->add_setting(
    'my_cafe[enable_post_date]', 
    array(
        'default'           => $default['enable_post_date'],     
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[enable_post_date]', 
    array(
        'label'       => __('Enable post date', 'my-cafe' ),    
        'settings'    => 'my_cafe[enable_post_date]',
        'section'     => 'my_cafe_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post author ===========**/
$wp_customize->add_setting(
    'my_cafe[enable_post_author]', 
    array(
        'default'           => $default['enable_post_author'],     
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[enable_post_author]', 
    array(
        'label'       => __('Enable post author', 'my-cafe' ),    
        'settings'    => 'my_cafe[enable_post_author]',
        'section'     => 'my_cafe_general',
        'type'        => 'checkbox',
    )
);

/**=========== Enable/Disable - post meta ===========**/
$wp_customize->add_setting(
    'my_cafe[enable_post_meta]', 
    array(
        'default'           => $default['enable_post_meta'],     
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[enable_post_meta]', 
    array(
        'label'       => __('Enable post meta', 'my-cafe' ),    
        'settings'    => 'my_cafe[enable_post_meta]',
        'section'     => 'my_cafe_general',
        'type'        => 'checkbox',
    )
);

/**=========== General setting - end ===========**/


/**=========== Footer Options - start ===========**/
$wp_customize->add_section(
    'my_cafe_footer', 
    array(    
        'title'       => __( 'Footer', 'my-cafe' ),
        'panel'       => 'my_cafe_basic_panel'    
    )
); 

/**=========== Enable/Disable - social media ===========**/ 
$wp_customize->add_setting(
    'my_cafe[enable_social_media]', 
    array(
        'default'           => $default['enable_social_media'],     
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[enable_social_media]', 
    array(
        'label'       => __( 'Enable social media', 'my-cafe' ),    
        'settings'    => 'my_cafe[enable_social_media]',
        'section'     => 'my_cafe_footer',
        'type'        => 'checkbox',
    )
);     

/**=========== Copyright text ===========**/
$wp_customize->add_setting(
    'my_cafe[copyright_text]', 
    array(
      'default'           => $default['copyright_text'],  
      'sanitize_callback' => 'sanitize_textarea_field',
    )
);

$wp_customize->add_control(
    'my_cafe[copyright_text]', 
        array(
        'label'       => __( 'Copyright text', 'my-cafe' ),    
        'settings'    => 'my_cafe[copyright_text]',
        'section'     => 'my_cafe_footer',
        'type'        => 'textarea'
    )
);

/**=========== Enable/Disable - scroll to top ===========**/
$wp_customize->add_setting(
    'my_cafe[enable_scroll_top]', 
    array(
        'default'           => $default['enable_scroll_top'],     
        'sanitize_callback' => 'my_cafe_sanitize_checkbox'
    )
);

$wp_customize->add_control(
    'my_cafe[enable_scroll_top]', 
    array(
        'label'       => __( 'Enable scroll to top', 'my-cafe' ),    
        'settings'    => 'my_cafe[enable_scroll_top]',
        'section'     => 'my_cafe_footer',
        'type'        => 'checkbox'
    )
);
/**=========== Footer Options - end ===========**/
