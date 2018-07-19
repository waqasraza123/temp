<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Button_Group' ) ) {
	
    $GLOBALS['ut_btn_group_count'] = false;
    $GLOBALS['ut_btn_group_total_count'] = NULL;
    
    class UT_Button_Group {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_btn_group';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Button Group', 'ut_shortcodes' ),
                        'description'     => esc_html__( 'Allows you to create a group of buttons for an easier visual placement.', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'category'        => 'Information',
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/button-group.png',
                        'class'           => 'ut-vc-icon-module ut-information-module',
                        'content_element' => true,
                        'is_container'    => true,
                        'as_parent'       => array( 'only' => 'ut_btn' ),
                        'js_view'         => 'VcColumnView',
                        'params'          => array(
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Buttons Alignment', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'This will automatically affect all button within this group. Individual button alignments will be overwritten.', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'left'  , 'ut_shortcodes' ) => 'left',
                                    esc_html__( 'center', 'ut_shortcodes' ) => 'center',
                                    esc_html__( 'right' , 'ut_shortcodes' ) => 'right',
                                ),
						  	),
                            
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
								'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
								'group'             => 'General'
						  	), 
                            
                        )                        
                        
                    )
                
                ); /* end mapping */
                
            } 
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'align' => 'left',
                'class' => '',                
            ), $atts ) ); 
            
            global $ut_btn_group_count, $ut_btn_group_total_count;
            
            $classes    = array();
            $classes[]  = $class;
            
            // Button Alignment
            $classes[]  = 'ut-btn-group-' . $align;
            
            // count buttons in this group    
            $button_count = substr_count( $content, '[ut_btn' );
            
            // set globals
            if( $button_count > 1 ) {
                
                $ut_btn_group_count = 1;
                $ut_btn_group_total_count = $button_count;
            }
            
            // variables
            $output = '';
                        
            // start output
            $output .= '<div class="ut-btn-group ' . implode(' ', $classes ) . ' clearfix">';
        
                $output .= do_shortcode( $content );    
            
            $output .= '</div>';
            
            // reset globals
            if( $button_count > 1 ) {
                
                $ut_btn_group_count       = false;
                $ut_btn_group_total_count = NULL;
                
            }
            
            return $output;
        
        }
            
    }

}

new UT_Button_Group;

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_ut_btn_group extends WPBakeryShortCodesContainer {
        
              
            
    }
    
}