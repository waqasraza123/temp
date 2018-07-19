<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Social_Follow' ) ) {
	
    class UT_Social_Follow {
        
        private $shortcode;
            
        function __construct() {
			
            /* shortcode base */
            $this->shortcode = 'ut_social_follow';
            
            add_action( 'init', array( $this, 'ut_map_shortcode' ) );
            add_shortcode( $this->shortcode, array( $this, 'ut_create_shortcode' ) );	
            
		}
        
        function ut_map_shortcode( $atts, $content = NULL ) {
            
            if( function_exists( 'vc_map' ) ) {
                                
                vc_map(
                    array(
                        'name'            => esc_html__( 'Social Follow Module', 'ut_shortcodes' ),
                        'base'            => $this->shortcode,
                        'icon'            => UT_SHORTCODES_URL . '/admin/img/vc_icons/social-follow.png',
                        'category'        => 'Community',
                        'class'           => 'ut-vc-icon-module ut-community-module',
                        'content_element' => true,
                        'params'          => array(
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Description', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Only for internal use. This adds a label to Visual Composer for an easier element identification.', 'ut_shortcodes' ),
                                'param_name'        => 'social_description',
                                'admin_label'       => true,
                                'group'             => 'General'
                            ),  
                    
                            array(
                                'type'          => 'param_group',
                                'heading'       => esc_html__( 'Social Items', 'ut_shortcodes' ),
                                'group'         => 'General',
                                'param_name'    => 'socials',
                                'params'        => array(
                                    
                                    array(
                                        'type'          => 'iconpicker',
                                        'heading'       => esc_html__( 'Icon', 'ut_shortcodes' ),
                                        'admin_label'   => true,
                                        'param_name'    => 'icon',                                                                        
                                    ),  
                                    array(
                                        'type'              => 'dropdown',
                                        'heading'           => esc_html__( 'Icon Colors', 'ut_shortcodes' ),
                                        'param_name'        => 'colors',
                                        'group'             => 'General',
                                        'value'             => array(
                                            esc_html__( 'Global Colors', 'ut_shortcodes' )     => 'global',
                                            esc_html__( 'Custom Colors', 'ut_shortcodes' )     => 'custom',
                                        )                                
                                        
                                    ),
                                    array(
                                        'type'              => 'colorpicker',
                                        'heading'           => esc_html__( 'Background Color', 'ut_shortcodes' ),
                                        'description'       => esc_html__( 'Supported shapes: round, square and round corners.', 'ut_shortcodes' ),
                                        'edit_field_class'  => 'vc_col-sm-6',
                                        'param_name'        => 'background',
                                        'dependency' => array(
                                            'element' => 'colors',
                                            'value'   => array( 'custom' ),
                                        ),
                                    ),
                                    array(
                                        'type'              => 'colorpicker',
                                        'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
                                        'edit_field_class'  => 'vc_col-sm-6',
                                        'param_name'        => 'icon_color',
                                        'dependency' => array(
                                            'element' => 'colors',
                                            'value'   => array( 'custom' ),
                                        ),
                                    ),
                                    array(
                                        'type'              => 'colorpicker',
                                        'heading'           => esc_html__( 'Background Hover Color', 'ut_shortcodes' ),
                                        'description'       => esc_html__( 'Supported shapes: round, square and round corners.', 'ut_shortcodes' ),
                                        'edit_field_class'  => 'vc_col-sm-6 vc-clear-left',
                                        'param_name'        => 'background_hover',
                                        'dependency' => array(
                                            'element' => 'colors',
                                            'value'   => array( 'custom' ),
                                        ),
                                    ),
                                    
                                    array(
                                        'type'              => 'colorpicker',
                                        'heading'           => esc_html__( 'Icon Hover Color', 'ut_shortcodes' ),
                                        'edit_field_class'  => 'vc_col-sm-6',
                                        'param_name'        => 'icon_color_hover',
                                        'dependency' => array(
                                            'element' => 'colors',
                                            'value'   => array( 'custom' ),
                                        ),
                                    ),
                                    
                                    array(
                                        'type'          => 'vc_link',
                                        'heading'       => esc_html__( 'Link', 'ut_shortcodes' ),
                                        'param_name'    => 'link',
                                    ),                                    
                                    
                                ),

                            ),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Alignment', 'ut_shortcodes' ),
								'param_name'        => 'align',
								'group'             => 'General',
                                'value'             => array(
                                    'left'      => esc_html__( 'left', 'ut_shortcodes' ),
                                    'center'    => esc_html__( 'center', 'ut_shortcodes' ),
                                    'right'     => esc_html__( 'right', 'ut_shortcodes' ),
                                ),
						  	),
                            
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Gap Size between Items', 'ut_shortcodes' ),
								'param_name'        => 'gap',
								'group'             => 'General',
                                'value'             => array(
                                    '20'    => esc_html__( 'default', 'ut_shortcodes' ),
                                    '40'    => esc_html__( '40 Pixel', 'ut_shortcodes' ),                                    
                                ),
						  	),
                            
                            // Animation
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Icons?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Animate each element inside your icon list with an awesome animation effect.', 'ut_shortcodes' ),
                                'param_name'        => 'animate',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-12',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true',
                                    
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Icons on Tablet?', 'ut_shortcodes' ),
                                'param_name'        => 'animate_tablet',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'
                                ),
                                'dependency' => array(
                                    'element' => 'animate',
                                    'value'   => array( 'true' ),
                                ),
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Icons on Mobile?', 'ut_shortcodes' ),
                                'param_name'        => 'animate_mobile',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'
                                ),
                                'dependency' => array(
                                    'element' => 'animate',
                                    'value'   => array( 'true' ),
                                ),
                            ),                            
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Set delay until Icon Animation starts?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'This timer allows you to delay the entire animation process of the icon list.', 'ut_shortcodes' ),
                                'param_name'        => 'global_delay_animation',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'                                                                        
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true'
                                )
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Delay Timer', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Time in milliseconds until the icon list animation should start. e.g. 200', 'ut_shortcodes' ),
                                'param_name'        => 'global_delay_timer',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'global_delay_animation',
                                    'value'   => 'true',
                                )
                            ),
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Animate Once?', 'unitedthemes' ),
                                'description'       => esc_html__( 'Animate only once when reaching the viewport, animate everytime when reaching the viewport or make the animation infinite? By default the animation executes everytime when the element becomes visible in viewport, means when leaving the viewport the animation will be reseted and starts again when reaching the viewport again. By setting this option to yes, the animation executes exactly once. By setting it to infinite, the animation loops all the time, no matter if the element is in viewport or not.', 'unitedthemes' ),
                                'param_name'        => 'animate_once',
                                'group'             => 'Animation',
                                'value'             => array(
                                    esc_html__( 'yes', 'unitedthemes' )      => 'yes',
                                    esc_html__( 'no' , 'unitedthemes' )      => 'no',
                                    esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true',
                                )
                            ), 
                            
                            array(
                                'type'              => 'dropdown',
                                'heading'           => esc_html__( 'Delay Animation?', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Animate Icons inside the Gallery one by one.', 'ut_shortcodes' ),
                                'param_name'        => 'delay_animation',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'value'             => array(
                                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'                                                                        
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true'
                                )
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'Delay Timer', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Time in milliseconds until the next image appears. e.g. 200', 'ut_shortcodes' ),
                                'param_name'        => 'delay_timer',
                                'group'             => 'Animation',
                                'edit_field_class'  => 'vc_col-sm-6',
                                'dependency'        => array(
                                    'element' => 'delay_animation',
                                    'value'   => 'true',
                                )
                            ),                            
                            
                            array(
                                'type'              => 'animation_style',
                                'heading'           => __( 'Animation Effect', 'ut_shortcodes' ),
                                'description'       => __( 'Select initial loading animation for icons.', 'ut_shortcodes' ),
                                'group'             => 'Animation',
                                'param_name'        => 'effect',
                                'settings' => array(
                                    'type' => array(
                                        'in',
                                        'other',
                                    ),
                                ),
                                'dependency'        => array(
                                    'element' => 'animate',
                                    'value'   => 'true',
                                )
                                
                            ),
                            
                            
                            
                            // Global Colors
                            array(
								'type'              => 'dropdown',
								'heading'           => esc_html__( 'Icon Shape', 'ut_shortcodes' ),
								'param_name'        => 'shape',
								'group'             => 'Global Colors',
                                'value'             => array(
                                    esc_html__( 'no shape', 'ut_shortcodes' )      => 'icon-only',
                                    esc_html__( 'round', 'ut_shortcodes' )         => 'round',
                                    esc_html__( 'square', 'ut_shortcodes' )        => 'square',
                                    esc_html__( 'round corners', 'ut_shortcodes' ) => 'round-corners',
                                )                                
                                
						  	),
                            
                            array(
								'type'              => 'range_slider',
								'heading'           => esc_html__( 'Icon Size', 'ut_shortcodes' ),
								'param_name'        => 'size',
                                'value'             => array(
                                    'default'   => '16',
                                    'min'       => '16',
                                    'max'       => '50',
                                    'step'      => '1',
                                    'unit'      => 'px'
                                ),
								'group'             => 'Global Colors',
						  	),  
                            
                            array(
                                'type'              => 'colorpicker',
                                'heading'           => esc_html__( 'Background Color', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Supported shapes: round, square and round corners.', 'ut_shortcodes' ),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Global Colors',
                                'param_name'        => 'background',
                                'dependency' => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round', 'square', 'round-corners' ),
                                ),
                            ),
                                                              
                            array(
                                'type'              => 'colorpicker',
                                'heading'           => esc_html__( 'Icon Color', 'ut_shortcodes' ),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Global Colors',
                                'param_name'        => 'icon_color',
                                'dependency' => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round', 'square', 'round-corners', 'icon-only' ),
                                ),
                            ),
                            
                            array(
                                'type'              => 'colorpicker',
                                'heading'           => esc_html__( 'Background Hover Color', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Supported shapes: round, square and round corners.', 'ut_shortcodes' ),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Global Colors',
                                'param_name'        => 'background_hover',
                                'dependency' => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round', 'square', 'round-corners' ),
                                ),
                            ),
                            
                            array(
                                'type'              => 'colorpicker',
                                'heading'           => esc_html__( 'Icon Hover Color', 'ut_shortcodes' ),
                                'edit_field_class'  => 'vc_col-sm-6',
                                'group'             => 'Global Colors',
                                'param_name'        => 'icon_color_hover',
                                'dependency' => array(
                                    'element' => 'shape',
                                    'value'   => array( 'round', 'square', 'round-corners', 'icon-only' ),
                                ),
                            ),
                            
                            array(
                                'type'              => 'textfield',
                                'heading'           => esc_html__( 'CSS Class', 'ut_shortcodes' ),
                                'description'       => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ut_shortcodes' ),
                                'param_name'        => 'class',
                                'group'             => 'General'
                            ),
                            
                            /* css editor */
                            array(
                                'type'              => 'css_editor',
                                'param_name'        => 'css',
                                'group'             => esc_html__( 'Design Options', 'ut_shortcodes' ),
                            ) 
                            
                        )                        
                        
                    )
                
                ); // end mapping
                
            } 
        
        }
        
        
        function ut_create_inline_script( $id, $atts ) {
            
            /* no custom js for search excerpts */
            if( is_search() ) {
                return;
            }
            
            extract( shortcode_atts( array (
                'animate'                => 'false',
                'effect'                 => '',
                'lazy'                   => '',
                'delay_animation'        => 'false',
                'global_delay_animation' => 'false',
                'delay_timer'            => 200,
                'global_delay_timer'     => 200,
            ), $atts ) );
            
            ob_start();
            
            ?>
            
            <script type="text/javascript">
                
                (function($){
                    
                    $(document).ready(function(){
                                                
                        function get_animated_objects( $all_appeared_elements, effect ) {
                            
                            var counter = 0;
                            
                            $all_appeared_elements.each(function(){
                                        
                                if( $(this).hasClass(effect) ) {

                                    counter++;

                                }

                            });
                            
                            return counter;
                            
                        }
                        
                        <?php if( $animate == 'true' && $effect ) : ?>
                            
                            $("#<?php echo esc_attr( $id ); ?> .ut-animate-social-follow-element").appear();
                                                    
                            $(document.body).on('appear', '#<?php echo esc_attr( $id ); ?> .ut-animate-social-follow-element', function( event, $all_appeared_elements ) {
                                
                                var $this    = $(this),
                                    effect   = $this.data('effect');
                                
                                <?php if( $global_delay_animation == 'true' ) : ?>
                                
                                    $this.delay(<?php echo $global_delay_timer; ?>).queue( function() {
                                        
                                        $this.dequeue();
                                        
                                <?php endif; ?>

                                        if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                                            return;
                                        }

                                        if( $this.data('animation-duration') ) {

                                            $this.css('animation-duration', $this.data('animation-duration') );

                                        }

                                        <?php if( $delay_animation == 'true' ) : ?>

                                            $this.delay(<?php echo $delay_timer; ?> * ( $all_appeared_elements.index(this) - get_animated_objects( $all_appeared_elements, effect ) ) ).queue( function() {

                                                $this.css('opacity','1').addClass( effect ).dequeue();

                                            });

                                        <?php else: ?>

                                            $this.delay( $this.data('delay') ).queue( function() {

                                                $this.css('opacity','1').addClass( effect ).dequeue();                                        

                                            });

                                        <?php endif; ?>

                                        $this.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {

                                            $this.addClass("ut-animation-done");

                                        }); 
                                
                                <?php if( $global_delay_animation == 'true' ) : ?>
                                
                                    });
                                
                                <?php endif; ?>
                                
                            });
                            
                            $(document.body).on('disappear', '#<?php echo esc_attr( $id ); ?> .ut-animate-social-follow-element', function() {
                                
                                var $this  = $(this),
                                    effect = $this.data('effect');
                                
                                if( $this.hasClass('ut-animation-complete') || $this.hasClass('ut-element-is-animating') ) {
                                    return;
                                }
                                            
                                if( $this.data('animateonce') === 'no' ) {
                                    
                                    $this.parent().removeClass("ut-animation-done");
                                    $this.clearQueue().removeClass( effect ).css('opacity','0').dequeue();                     
                                
                                } else {
                                    
                                    if( $this.hasClass( effect ) ) {
                                    
                                        $this.addClass('ut-animation-complete');
                                
                                    }
                                        
                                }
                                          
                            }); 
                        
                        <?php endif; ?>
  
                    });
                        
                })(jQuery);
            
            </script>
            
            <?php
            
            return ob_get_clean();
        
        }
        
        function ut_create_shortcode( $atts, $content = NULL ) {
            
            extract( shortcode_atts( array (
                'socials'           => '',
                'shape'             => 'icon-only',
                'align'             => 'left',
                'gap'               => '20',
                'size'              => '',
                'background'        => '',                
                'background_hover'  => '',
                'icon_color'        => '',
                'icon_color_hover'  => '',
                'animate'           => 'false',
                'effect'            => '',
                'animate_once'      => 'yes',
                'animate_mobile'    => false,
                'animate_tablet'    => false,
                'class'             => '',
                'css'               => ''
            ), $atts ) ); 
            
            // variables and arrays
            $classes    = array(
                'ut-social-follow-module',
            );
            $classes[]  = $class;
            $css_style  = '';
            
            if( $align ) {
                $classes[] = 'ut-social-follow-module-' . $align;
            }
            
            if( $gap ) {
                $classes[] = 'ut-social-follow-module-' . $gap;
            }
            
            $animation_classes = array();
            $attributes = array();
            
            if( $animate == 'true' && $effect ) {
                
                $attributes['data-effect']      = esc_attr( $effect );
                $attributes['data-animateonce'] = esc_attr( $animate_once );
                
                $animation_classes[]  = 'ut-animate-social-follow-element';
                $animation_classes[]  = 'animated';
                
                if( !$animate_tablet ) {
                    $animation_classes[]  = 'ut-no-animation-tablet';
                }
                
                if( !$animate_mobile ) {
                    $animation_classes[]  = 'ut-no-animation-mobile';
                }
                
                if( $animate_once == 'infinite' ) {
                    $animation_classes[]  = 'infinite';
                }
                
            }
            
            /* attributes string */
            $attributes = implode(' ', array_map(
                function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
                $attributes,
                array_keys( $attributes )
            ) ); 
            
            // extract social items
            if( function_exists('vc_param_group_parse_atts') && !empty( $socials ) ) {
                
                $socials = vc_param_group_parse_atts( $socials );    
                            
            }
                        
            // unique list ID 
            $id = uniqid("ut_sf_");
            
            if( $animate == 'true' && $effect ) {
                $css_style .= '#' . esc_attr( $id ) . ' .ut-animate-social-follow-element { opacity: 0; }';
            }
            
            if( !empty( $icon_color ) ) {
                $css_style .= '#' . esc_attr( $id ) . ' li a i { color: ' . $icon_color .'; }';
            }
            
            if( !empty( $icon_color_hover ) ) {
                $css_style .= '#' . esc_attr( $id ) . ' li a:hover i { color: ' . $icon_color_hover .'; }';
                $css_style .= '#' . esc_attr( $id ) . ' li a:focus i { color: ' . $icon_color_hover .'; }';     
            }
            
            if( !empty( $background ) && $shape != 'icon-only' ) {
                $css_style .= '#' . esc_attr( $id ) . ' li a { background: ' . $background .'; }';    
            }
            
            if( !empty( $background_hover ) && $shape != 'icon-only' ) {
                $css_style .= '#' . esc_attr( $id ) . ' li a:hover { background: ' . $background_hover .'; }';
                $css_style .= '#' . esc_attr( $id ) . ' li a:focus { background: ' . $background_hover .'; }';  
            }
            
            // size 
            if( !empty( $size ) ) {
                $css_style .= '#' . esc_attr( $id ) . ' { font-size: ' . $size .'px; }';
            }
            
            if( !empty( $size ) && $shape != 'icon-only' ) {
                
                $css_style .= '#' . esc_attr( $id ) . ' li a { 
                    height: ' . ( $size * 2.5 ) . 'px;
                    line-height: ' . ( $size * 2.5 ) . 'px;
                    width: ' . ( $size * 2.5 ) . 'px;
                }';
                
                $css_style .= '#' . esc_attr( $id ) . ' li a .fa { 
                    line-height: ' . ( $size * 2.5 ) . 'px;
                }';
                
            }
            
            if( !empty( $socials ) && is_array( $socials ) ) {
                
                foreach( $socials as $key => $social ) {
                    
                    if( !empty( $social['colors'] ) && $social['colors'] != 'custom' ) {
                        continue;
                    }
                    
                    if( !empty( $social['icon_color'] ) ) {
                        $css_style .= '#' . esc_attr( $id ) . ' .ut-social-follow-' . $key . ' a i { color: ' . $social['icon_color'] .'; }';
                    }
                    
                    if( !empty( $social['icon_color_hover'] ) ) {
                        $css_style .= '#' . esc_attr( $id ) . ' .ut-social-follow-' . $key . ' a:hover i { color: ' . $social['icon_color_hover'] .'; }';
                        $css_style .= '#' . esc_attr( $id ) . ' .ut-social-follow-' . $key . ' a:focus i { color: ' . $social['icon_color_hover'] .'; }';     
                    }
                    
                    if( !empty( $social['background'] ) && $shape != 'icon-only' ) {
                        $css_style .= '#' . esc_attr( $id ) . ' .ut-social-follow-' . $key . ' a { background: ' . $social['background'] .'; }';    
                    }
                    
                    if( !empty( $social['background_hover'] ) && $shape != 'icon-only' ) {
                        $css_style .= '#' . esc_attr( $id ) . ' .ut-social-follow-' . $key . ' a:hover { background: ' . $social['background_hover'] .'; }';
                        $css_style .= '#' . esc_attr( $id ) . ' .ut-social-follow-' . $key . ' a:focus { background: ' . $social['background_hover'] .'; }';  
                    }
                
                }
            
            }
            
            // start output 
            $output = '';
            
            // attach JS
            $output .= $this->ut_create_inline_script( $id, $atts );
            
            // add css
            if( !empty( $css_style ) ) {
                $output .= ut_minify_inline_css( '<style class="bklyn-inline-styles" type="text/css" scoped>' . $css_style . '</style>' );
            }
            
            if( !empty( $socials ) && is_array( $socials ) ) {
                
                $output .= '<ul id="' . esc_attr( $id ) . '" class="' . esc_attr( implode(' ', $classes ) ) . '">';
                
                foreach( $socials as $key => $social ) {
                    
                    $li_class = 'ut-social-follow-' . $shape;
                    
                    $output .= '<li ' . $attributes . ' class="ut-social-follow-' . esc_attr( $key ) . ' ' . $li_class . ' ' . implode( ' ', $animation_classes ) . '">';
                        
                        if( !empty( $social['link'] ) ) {
                                
                            $link = vc_build_link( $social['link'] );
                            
                            $url    = !empty( $link['url'] )    ? $link['url'] : '';
                            $target = !empty( $link['target'] ) ? $link['target'] : '_self';
                            $title  = !empty( $link['title'] )  ? $link['title'] : '';
                            $rel    = !empty( $link['rel'] )    ? 'rel="' . esc_attr( trim( $link['rel'] ) ) . '"' : '';
                            
                            $output .= '<a title="' . esc_attr( $title ) . '" href="' . esc_url( $url ) . '" target="' . esc_attr( $target ) . '" ' . $rel . '>';                            
                            
                        } else {
                            
                            $output .= '<a href="#" target="_blank">';   
                            
                        }  
                    
                        if( !empty( $social['icon'] ) ) {
                    
                            $output .= '<i class="' . esc_attr( $social['icon'] ) . '"></i>';
                        
                        }
                            
                        $output .= '</a>';
                    
                    $output .= '</li>';                        
                    
                }
                
                $output .= '</ul>';
            
            }
                
            return '<div class="wpb_content_element ' . apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->shortcode, $atts ) . '">' . $output . '</div>';
            
        
        }
            
    }

}

new UT_Social_Follow;