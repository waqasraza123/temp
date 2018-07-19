<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Accordion_Shortcode' ) ) {
	
    class UT_Accordion_Shortcode {
        
        private $shortcode;
        private $accordion_id;
        private $atts;
        private $toggle_counter;
        private $add_script;
            
        function __construct() {
			
            // shortcode base
            $this->shortcode = 'ut_accordion';
            $this->inner_shortcode = 'ut_accordion_item';
            
            add_action( 'init', array( $this, 'map_shortcode' ) );
            add_action( 'wp_footer', array( $this, 'enqueue_scripts' ) );
            
            add_shortcode( $this->shortcode, array( $this, 'create_shortcode' ) );
            add_shortcode( $this->inner_shortcode, array( $this, 'create_inner_shortcode' ) );
            
            
		}
        
        function map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Accordion Module', 'ut_shortcodes' ),
                        'description'     => esc_html__( 'A group of Toggles useful when you want to toggle between hiding and showing large amount of content.', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/accordion.png',
                        'category'        => 'In Progress',
                        'class'           => 'ut-vc-icon-module ut-in-progress-module',
                        'as_parent'       => array( 'only' => $this->inner_shortcode ),
                        'content_element' => true,
                        'is_container'    => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Open / Close Animation Transition Effect.', 'unitedthemes' ),
                                'param_name'        => 'easing',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'ease', 'ut_shortcodes' )        => 'ease',
                                    esc_html__( 'linear', 'ut_shortcodes' )      => 'linear',    
                                    esc_html__( 'ease-in', 'ut_shortcodes' )     => 'ease-in',
                                    esc_html__( 'ease-out', 'ut_shortcodes' )    => 'ease-out',
                                    esc_html__( 'ease-in-out', 'ut_shortcodes' ) => 'ease-in-out'
                                )                                
                            ),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Time to animate opening / closing.', 'ut_shortcodes' ),
								'param_name'        => 'transition',
                                'group'             => 'General',
                                'value'             => array(
                                    'default'   => '400',
                                    'min'       => '200',
                                    'max'       => '2000',
                                    'step'      => '10',
                                    'unit'      => 'ms'
                                ),								                                
						  	),
                            
                            // accordion content color settings
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Activate Border?', 'unitedthemes' ),
                                'param_name'        => 'border',
                                'group'             => 'Accordion Design',
                                'value'             => array(
                                    esc_html__( 'yes', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no', 'ut_shortcodes' )  => 'no',
                                ),                                                               
                            ), 
                                                       
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'        => 'border_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'yes',
                                ),
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Border Style', 'ut_shortcodes' ),
								'param_name'        => 'border_style',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'solid' , 'ut_shortcodes' ) => 'solid',
                                    esc_html__( 'dotted', 'ut_shortcodes' ) => 'dotted',
                                    esc_html__( 'dashed', 'ut_shortcodes' ) => 'dashed',
                                ),
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'yes',
                                ),
						  	),                            
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Label Color', 'ut_shortcodes' ),
								'param_name'        => 'label_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Label Active and Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'label_active_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
						  	),                            
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Label Background Color', 'ut_shortcodes' ),
								'param_name'        => 'label_background_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'no',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Label Background Active and Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'label_active_background_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'border',
                                    'value'   => 'no',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Arrow Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Arrow Active and Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'icon_active_color',
								'group'             => 'Accordion Design',
                                'edit_field_class'  => 'vc_col-sm-6',
						  	), 
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Accordion Content Default Text Color', 'ut_shortcodes' ),
								'param_name'        => 'text_color',
								'group'             => 'Accordion Design'
						  	),
                            
                            // Accordion Counter Design
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Add Number Count?', 'unitedthemes' ),
                                'param_name'        => 'count',
                                'group'             => 'Counter Design',
                                'value'             => array(
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'yes',
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' )  => 'no'                                    
                                )                                
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Number Count Shape', 'unitedthemes' ),
                                'param_name'        => 'counter_shape',
                                'group'             => 'Counter Design',
                                'value'             => array(
                                    esc_html__( 'round', 'ut_shortcodes' )  => 'round',
                                    esc_html__( 'square', 'ut_shortcodes' ) => 'square'
                                ),
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),                                
                            ),

                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Color', 'ut_shortcodes' ),
								'param_name'        => 'counter_color',
								'group'             => 'Counter Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Active and Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'counter_active_color',
								'group'             => 'Counter Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),
						  	),                            
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Background Color', 'ut_shortcodes' ),
								'param_name'        => 'counter_background_color',
								'group'             => 'Counter Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Background Active and Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'counter_active_background_color',
								'group'             => 'Counter Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Color', 'ut_shortcodes' ),
								'param_name'        => 'counter_border_color',
								'group'             => 'Counter Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),
						  	),
                            
                            array(
								'type'              => 'colorpicker',
								'heading'           => esc_html__( 'Border Active and Hover Color', 'ut_shortcodes' ),
								'param_name'        => 'counter_active_border_color',
								'group'             => 'Counter Design',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'count',
                                    'value'   => 'yes',
                                ),
						  	),
                                                        
                            // Accordion Label Font
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Accordion Label Font Size', 'ut_shortcodes' ),
								'param_name'        => 'label_font_size',
                                'group'             => 'Accordion Label Font',
                                'value'             => array(
                                    'default'   => ut_get_theme_options_font_setting( 'h3','font-size', "17" ),
                                    'min'       => '8',
                                    'max'       => '60',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
						  	), 
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Accordion Label Font Weight', 'ut_shortcodes' ),
								'param_name'        => 'label_font_weight',
								'group'             => 'Accordion Label Font',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'Select Font Weight' , 'ut_shortcodes' ),
                                    'lighter',
                                    'normal',
                                    'bold',
                                    'bolder',
                                    100,
                                    200,
                                    300,
                                    400,
                                    500,
                                    600,
                                    700,
                                    800,
                                    900,
                                ),
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Accordion Label Text Transform', 'ut_shortcodes' ),
								'param_name'        => 'label_text_transform',
								'group'             => 'Accordion Label Font',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'Select Text Transform' , 'ut_shortcodes' ) => '',
                                    esc_html__( 'capitalize' , 'ut_shortcodes' )            => 'capitalize',
                                    esc_html__( 'uppercase', 'ut_shortcodes' )              => 'uppercase',
                                    esc_html__( 'lowercase', 'ut_shortcodes' )              => 'lowercase'                                    
                                ),
						  	),
                            
                            // custom css
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ),                            
                            array(
								'type'              => 'textfield',
								'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
								'param_name'        => 'class',
								'group'             => 'General'
						  	),
                            
                        ),
                        'js_view'         => 'VcColumnView'                        
                        
                    )
                
                ); // end mapping
                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Accordion Item', 'ut_shortcodes' ),
                        'base'            => $this->inner_shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/default.png',
                        'as_child'        => array( 'only' => $this->shortcode ),
                        'content_element' => true,
                        'params'          => array(
                                                        
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Accordion Label', 'ut_shortcodes' ),
                                'param_name'        => 'label',
                                'edit_field_class'  => 'vc_col-sm-12 vc_column_no_padding_top',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),
                            
                            array(
                                'type'              => 'textarea_html',
                                'heading'           => esc_html__( 'Accordion Content', 'ut_shortcodes' ),
                                'param_name'        => 'content',
                                'group'             => 'General'
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Open by default?', 'unitedthemes' ),
                                'description'       => esc_html__( 'We recommend only opening one accordion item at the same time.', 'ut_shortcodes' ),
                                'param_name'        => 'open',
                                'group'             => 'General',
                                'value'             => array(
                                    esc_html__( 'no, thanks!', 'ut_shortcodes' )  => 'false',
                                    esc_html__( 'yes, please!', 'ut_shortcodes' ) => 'true'                                                                        
                                )                                
                            ),                            
                            
                        )                        
                        
                    )
                
                ); // end mapping
                
                
                
                
            } 
        
        }
        
        function ut_create_inline_js() {
        
            ob_start(); ?>
                
                <script type="text/javascript">
                
                    (function($){
                                                
                        $(document).ready(function(){
                            
                            $('#<?php echo esc_attr( $this->accordion_id ); ?> [data-accordion]').accordion({
                                "transitionSpeed"  : <?php echo $this->atts['transition']; ?>,
                                "singleOpen"       : true,
                                "transitionEasing" : "<?php echo $this->atts['easing']; ?>",
                            });                            
                    
                        });
                            
                    })(jQuery);
            
                </script>
                
            <?php 
            
            return ob_get_clean();
            
        }        
        
        function ut_create_inline_css() {
            
             $css_style = '';            
            
            if( !empty( $this->atts['text_color'] ) ) {                
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-inner { color: ' . $this->atts['text_color'] . ' }';                
            }
            
            if( !empty( $this->atts['label_color'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading { color: ' . $this->atts['label_color'] . ' }';    
            }
            
            if( !empty( $this->atts['label_active_color'] ) ) {                
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item.open .ut-accordion-module-heading { color: ' . $this->atts['label_active_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:hover { color: ' . $this->atts['label_active_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:active { color: ' . $this->atts['label_active_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:focus { color: ' . $this->atts['label_active_color'] . ' }';                
            }
            
            if( $this->atts['border'] == 'no' && !empty( $this->atts['label_background_color'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading { background: ' . $this->atts['label_background_color'] . ' }';    
            }
            
            if( $this->atts['border'] == 'no' && !empty( $this->atts['label_active_background_color'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item.open .ut-accordion-module-heading { background: ' . $this->atts['label_active_background_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:hover { background: ' . $this->atts['label_active_background_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:active { background: ' . $this->atts['label_active_background_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:focus { background: ' . $this->atts['label_active_background_color'] . ' }';
            }
                 
            if( !empty( $this->atts['icon_color'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:after { color: ' . $this->atts['icon_color'] . ' }';    
            }
            
            if( !empty( $this->atts['icon_active_color'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item.open .ut-accordion-module-heading::after { color: ' . $this->atts['icon_active_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:hover::after { color: ' . $this->atts['icon_active_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:active::after { color: ' . $this->atts['icon_active_color'] . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading:focus::after { color: ' . $this->atts['icon_active_color'] . ' }';
            }
            
            if( !empty( $this->atts['label_font_size'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading { font-size: ' . $this->atts['label_font_size'] . 'px; }';
            }
            
            if( !empty( $this->atts['label_font_weight'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading { font-weight: ' . $this->atts['label_font_weight'] . '; }';    
            }
            
            if( !empty( $this->atts['label_text_transform'] ) ) {
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading { text-transform: ' . $this->atts['label_text_transform'] . '; }';    
            }
            
            $border_styles = array();
            
            if( $this->atts['border_color'] ) {
                $border_styles['border-top-color']  = $this->atts['border_color'];
            }
            
            if( $this->atts['border_style'] ) {
                $border_styles['border-top-style']  = $this->atts['border_style'];
            }
            
            $border_styles = implode(' ', array_map(
                function ($v, $k) { return sprintf("%s:%s;", $k, $v); },
                $border_styles,
                array_keys( $border_styles )
            ) );
            
            if( $this->atts['border'] == 'yes' && !empty( $border_styles ) ) {
                
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item { ' . $border_styles . ' }';
                $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item:last-child { ' . $border_styles . ' }';
                
            }
            
            // Counter Design                
            if( $this->atts['count'] == 'yes' ) {
            
                if( $this->atts['counter_shape'] == 'round' ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading::before { -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; }';
                }
                
                if( !empty( $this->atts['counter_color'] ) ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading::before { color: ' . $this->atts['counter_color'] . '; }';
                }
                
                if( !empty( $this->atts['counter_active_color'] ) ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item.open .ut-accordion-module-heading::before { color: ' . $this->atts['counter_active_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:hover::before { color: ' . $this->atts['counter_active_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:active::before { color: ' . $this->atts['counter_active_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:focus::before { color: ' . $this->atts['counter_active_color'] . '; }';                    
                }
                
                if( !empty( $this->atts['counter_background_color'] ) ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading::before { background: ' . $this->atts['counter_background_color'] . '; }';
                }
                
                if( !empty( $this->atts['counter_active_background_color'] ) ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item.open .ut-accordion-module-heading::before { background: ' . $this->atts['counter_active_background_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:hover::before { background: ' . $this->atts['counter_active_background_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:active::before { background: ' . $this->atts['counter_active_background_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:focus::before { background: ' . $this->atts['counter_active_background_color'] . '; }';                    
                }
                
                if( !empty( $this->atts['counter_border_color'] ) ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-heading::before { border: 1px solid ' . $this->atts['counter_border_color'] . '; }';
                }
                
                if( !empty( $this->atts['counter_active_border_color'] ) ) {
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item.open .ut-accordion-module-heading::before { border: 1px solid ' . $this->atts['counter_active_border_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:hover::before { border: 1px solid ' . $this->atts['counter_active_border_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:active::before { border: 1px solid ' . $this->atts['counter_active_border_color'] . '; }';
                    $css_style .= '#' . esc_attr( $this->accordion_id ) . ' .ut-accordion-module-item .ut-accordion-module-heading:focus::before { border: 1px solid ' . $this->atts['counter_active_border_color'] . '; }';
                }
            
            }
            
            return !empty( $css_style ) ? '<style type="text/css" scoped>' . $css_style . '</style>' : '';
                
            
        }
        
        function create_shortcode( $atts, $content = NULL ) {
            
            /* enqueue scripts */
            $this->add_script = true;
            
            $this->atts = shortcode_atts( array (
                'transition'            => '400',
                'easing'                => 'ease',
                'count'                 => 'yes',
                
                // tab content colors
                'text_color'    => '',
                
                // label color
                'label_color'           => '',
                'label_active_color'    => get_option('ut_accentcolor' , '#1867C1'),
                
                // label background
                'label_background_color'        => '',
                'label_active_background_color' => '',
                
                // toggle color 
                'border'                => 'yes',
                'border_color'          => '',
                'border_style'          => 'solid',
                
                // label icon
                'icon_color'            => '',
                'icon_active_color'     => '',
                
                // label font
                'label_font_size'       => '',
                'label_font_weight'     => '',
                'label_text_transform'  => '',
                
                // counter
                'counter_shape'                     => 'round',
                'counter_color'                     => '',
                'counter_active_color'              => '',
                'counter_background_color'          => '',
                'counter_active_background_color'   => '',
                'counter_border_color'              => '',
                'counter_active_border_color'       => '',
                                
                'class'                 => '',
                'css'                   => ''    
                
            ), $atts, $this->shortcode );
            
            extract( $this->atts ); 
            
            $this->accordion_id = uniqid("ut_accordion_");            
            $this->toggle_counter = 1;
                
            /* start output */
            $output = '';
            
            $output .= $this->ut_create_inline_css();
            $output .= $this->ut_create_inline_js();
            
            $classes   = array();
            $classes[] = $class;
            
            if( $count == 'yes' ) {
                $classes[] = 'ut-accordion-module-with-counter';
            }
            
            if( $border == 'yes' ) {
                $classes[] = 'ut-accordion-module-with-border';
            }
            
            if( !empty( $this->atts['label_background_color'] ) || !empty( $this->atts['label_background_hover_color'] ) ) {
                $classes[] = 'ut-accordion-module-with-background';    
            }
            
            $output .= '<div id="' . esc_attr( $this->accordion_id ) . '" data-accordion-group class="ut-accordion-module ' . esc_attr( implode( ' ', $classes ) ) . '">';
                    
                $output .= do_shortcode( $content );
            
            $output .= '</div>';
            
                        
            if( defined( 'WPB_VC_VERSION' ) ) { 
                
                return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>'; 
            
            }            
                
            return $output;
        
        }
        
        function create_inner_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'label'     => '',
                'open'      => 'false',
                'class'     => ''
            ), $atts ) ); 
            
            // unique item id
            $id = uniqid("ut_accordion_item_");
           
            $classes   = array();
            $classes[] = $class;
        
            if( $open == 'true' ) {
                $classes[] = 'open';   
            }
            
            // start output
            $output = '';
                                    
            $output .= '<div data-accordion class="ut-accordion-module-item ' . esc_attr( implode(' ', $classes ) ) . '">';
            
                $output .= '<h3 data-control class="ut-accordion-module-heading" data-counter="' . esc_attr( $this->toggle_counter ) . '">';
                    
                    $output .= $label;
                
                $output .= '</h3>';
                
                $output .= '<div data-content class="ut-accordion-module-content">';
                    
                    $output .= '<div class="ut-accordion-module-inner entry-content clearfix">';
                    
                        $output .= do_shortcode( $content );
                    
                    $output .= '</div>';
                    
                $output .= '</div>';
            
            $output .= '</div>';
                
            $this->toggle_counter++;
                
            return $output;
            
        
        }
        
        function enqueue_scripts() {
            
            if( !$this->add_script ) {
                return;
            }
            
            wp_print_scripts('ut-accordion');
        
        }
        
                
            
    }

    new UT_Accordion_Shortcode;
    
}



if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    
    class WPBakeryShortCode_ut_accordion extends WPBakeryShortCodesContainer {
        
              
            
    }
    
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    
    class WPBakeryShortCode_ut_accordion_item extends WPBakeryShortCode {
        
        
        
    }
    
}