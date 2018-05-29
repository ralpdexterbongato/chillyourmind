<?php
/**
 * Page header for our theme.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My_Cafe
 */

if ( ! function_exists( 'my_cafe_page_header_section' ) ) :

    function my_cafe_page_header_section(){

        $theme_options  = my_cafe_theme_options(); 

        $bg_image_url = get_header_image();

        ?> 
        <?php if ( has_header_image() ) { ?>
       <div class="title-head"  style="background-image: url(<?php echo esc_url( $bg_image_url ); ?>)" background-repeat: no-repeat;>
        <?php } else { ?>

         <div class="title-head title-head-bg">

        <?php } ?>

  <div class="container">
    <div class="title-wrapper">
      <h1>
        <?php
            global $wp_query;
            if ( is_front_page() && 'posts' == get_option( 'show_on_front' )) { 
              echo esc_html( 'Posts', 'my-cafe' ); 
            } elseif ( is_archive() ) {
                the_archive_title();
            } elseif (is_search()) {
              esc_html_e( 'Search Results for', 'my-cafe' ); ?>: <?php the_search_query();
            } elseif (is_404()) {
              esc_html_e( '404', 'my-cafe' );
            } else {
                echo single_post_title();
            }

            ?>
      </h1>
    </div><!--title-wrapper-->
  </div><!--container-->
 </div><!--title-head-->

    <?php }

endif;

add_action( 'my_cafe_page_header', 'my_cafe_page_header_section', 10 );
