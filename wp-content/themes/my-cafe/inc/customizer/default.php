<?php
/**
 * Default theme options.
 *
 * @package My_Cafe
 */

if ( ! function_exists( 'my_cafe_default_theme_options' ) ) :

    /**
     * Default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function my_cafe_default_theme_options() {

        $defaults = array();

        // Header.
        $defaults['sticky_header']                  = 1;
        
        $defaults['slider_enable']                  = 1;
        $defaults['slider_excerpt_enable']          = 1;
        $defaults['slider_btn_enable']              = 1;
        $defaults['main_slider_type']               = 'slider';
        $defaults['slider_cat']                     = '';
        $defaults['banner_image']                   = '';

        $defaults['home_content']                   = 1;

        $defaults['our_services']                   = '';
        $defaults['about_us']                       = '';
        $defaults['our_blog']                       = '';

        
        $defaults['sidebar']                        = 'right';
        $defaults['enable_post_date']               = 1;
        $defaults['enable_post_author']             = 1;
        $defaults['enable_post_meta']               = 1;
        
        $defaults['enable_scroll_top']              = 1;
        $defaults['enable_social_media']            = 1;

        $defaults['enable_social_links']            = '';
        $defaults['facebook']                       = '';
        $defaults['twitter']                        = '';
        $defaults['google_plus']                    = '';
        $defaults['instagram']                      = '';
        $defaults['linkedin']                       = '';
        $defaults['pinterest']                      = '';
        $defaults['youtube']                        = '';
        $defaults['vimeo']                          = '';
        $defaults['flickr']                         = '';
        $defaults['behance']                        = '';
        $defaults['dribbble']                       = '';
        $defaults['tumblr']                         = '';
        $defaults['github']                         = '';

        $defaults['copyright_text']                 = __( 'Copyright 2018. All rights reserved', 'my-cafe' );

        // Pass through filter.
        return apply_filters( 'my_cafe_defaults', $defaults );

    }

endif;

/**
*  Get theme options
*/
if ( !function_exists('my_cafe_theme_options') ) :

    function my_cafe_theme_options() {

        $my_cafe_defaults = my_cafe_default_theme_options();

        $my_cafe_option_values = get_theme_mod( 'my_cafe' );

        if( is_array($my_cafe_option_values )){

            return array_merge( $my_cafe_defaults ,$my_cafe_option_values );

        }
        else{

            return $my_cafe_defaults;

        }

    }
endif;
