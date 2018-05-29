<?php
/**
 * My Cafe Theme Custom Customizer Controls.
 *
 * @package My_Cafe
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
  return NULL;
}

/**
 * Customize Category Control.
 */

if (class_exists('WP_Customize_Control') && ! class_exists( 'My_Cafe_Customize_Category_Control' ) ) {

    class My_Cafe_Customize_Category_Control extends WP_Customize_Control {
        /**
         * Render the control's content.
         *
         * @since 3.4.0
         */
        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => 'my-cafe-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;', 'my-cafe' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                    'hide_empty'        => 0,                   

                )
            ); 
            
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
                $this->label,
                $this->description,
                $dropdown

            );
        }
    }
}
