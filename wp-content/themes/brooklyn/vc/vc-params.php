<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/* check if Visual Composer is installed */
if( ! defined( 'WPB_VC_VERSION' )  ) {
    return;
}

/**
 * Extract VC CSS Declaration from String
 *
 * @param $css
 *
 * @since 4.5.4
 * @return bool / array 
 */

if( !function_exists('ut_vc_css_to_array') ) {

    function ut_vc_css_to_array( $css ) {

        preg_match_all('/(.+?)\s?\{\s?(.+?)\s?\}/', $css, $matches);

        if( !empty( $matches[2][0] ) ) {

            $styles = array_filter( explode( ";", $matches[2][0] ) );

            $new_styles = array();

            foreach ( $styles as $val ) {

                $attr = explode( ':', $val, 2 );

                if( !empty( $attr[0] ) && !empty($attr[1]) )
                $new_styles[$attr[0]] = $attr[1];            

            }

            return $new_styles;        

        }

        return false;    

    }

}


/**
 * Extract CSS Property from string
 *
 * @param $subject
 * @param $property
 * @param bool|false $strict
 *
 * @since 4.5
 * @return bool 
 */

function ut_extract_custom_css_property( $subject, $property, $strict = false ) {
	
    $styles = array();
	$pattern = '/\{([^\}]*?)\}/i';
	preg_match( $pattern, $subject, $styles );
	
    if ( array_key_exists( 1, $styles ) ) {
		$styles = explode( ';', $styles[1] );
	}
    
	$new_styles = array();
	
    foreach ( $styles as $val ) {

        $attr = explode( ':', $val );
                
        if( isset( $attr[0] ) && $attr[0] == $property ) {
            
            if( $property == 'background-image' ) {
            
                $url = wp_extract_urls( $val );
                
                if( !empty( $url[0] )  ) {
                    
                    return $url[0];
                    
                }
            
            }
            
            return $val;            
            
        }
            
	}

	return false;
    
}


/**
 * Removes a CSS Attribute from CSS Array
 *
 * @access    public 
 * @since     4.2.5
 * @version   1.0.0
 */

if( !function_exists('ut_clean_up_vc_css_array') ) {

	function ut_clean_up_vc_css_array( $array, $value ) { 
    
        foreach( $array as $key => $val ) {
            
            if (strpos($val, $value) !== false) {

                unset( $array[$key] );
                                   
            }
        
        }
        
        return $array;
            
    }

}




/**
 * Add Text Transform for Custom Heading Shortcode
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 */
 
function _vc_add_text_transform_to_custom_heading() {
    
    return array(
        'type'          => 'dropdown',
        'heading'       => esc_html__( 'Text Transform', 'unitedthemes' ),
        'param_name'    => 'text_transform',
        'value'         => array(
            esc_html__( 'Select Text Transform' , 'unitedthemes' ) => '',
            esc_html__( 'None' , 'unitedthemes' )        => 'none',
            esc_html__( 'Capitalize' , 'unitedthemes' )  => 'capitalize',
            esc_html__( 'Inherit' , 'unitedthemes' )     => 'inherit',
            esc_html__( 'Lowercase' , 'unitedthemes' )   => 'lowercase',
            esc_html__( 'Uppercase' , 'unitedthemes' )   => 'uppercase'            
        ),
        
    );
    
}

vc_add_param( 'vc_custom_heading', _vc_add_text_transform_to_custom_heading() );


/**
 * Add Background Distortion Effect
 *
 * @return    array
 *
 * @access    private
 * @since     4.6.2
 */

function _vc_add_background_distortion_effect() {
	
	return array (
		
		array(
			'type' => 'dropdown',
			'heading' => __( 'Distortion Hover Effect', 'ut_shortcodes' ),
			'description' => __( 'Add distortion hover effect to background. This requires 2 images! Please make sure to upload to images.', 'ut_shortcodes' ),
			'param_name' => 'distortion',
			'value' => array(
				esc_html__( 'no, thanks!', 'js_composer' ) => '',
				esc_html__( 'yes, please!', 'js_composer' ) => 'on',
			),
			'group' => 'Background Distortion',

		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'First Background Image. This one will display by default!', 'ut_shortcodes' ),
			'param_name' => 'background_distortion_1',
			'edit_field_class'  => 'vc_col-sm-6',
			'group' => 'Background Distortion',
			'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Second Background Image. This one will display on mouse over!', 'ut_shortcodes' ),
			'param_name' => 'background_distortion_2',
			'edit_field_class'  => 'vc_col-sm-6',
			'group' => 'Background Distortion',
			'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )
		),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Distortion Effect', 'ut_shortcodes' ),
			'param_name' => 'distortion_effect',
			'value' => array(
				esc_html__( 'Mosaic',  	'js_composer' ) => '1',
				esc_html__( 'Scales',  	'js_composer' ) => '2',
				esc_html__( 'Canvas',  	'js_composer' ) => '3',
				esc_html__( 'Clouds',  	'js_composer' ) => '4',
				esc_html__( 'Stripes', 	'js_composer' ) => '5',
				esc_html__( 'Wood',    	'js_composer' ) => '6',
				esc_html__( 'Leather', 	'js_composer' ) => '7',
				esc_html__( 'Particles','js_composer' ) => '8',
				esc_html__( 'Concreate','js_composer' ) => '9',
				esc_html__( 'Patchwork','js_composer' ) => '10',
				esc_html__( 'ZigZag',  	'js_composer' ) => '11',
				esc_html__( 'Waves',  	'js_composer' ) => '12',
				esc_html__( 'Digital',  'js_composer' ) => '13',
				esc_html__( 'Abstract', 'js_composer' ) => '14',
				esc_html__( 'Zebra',  	'js_composer' ) => '15',
				esc_html__( 'Disco',  	'js_composer' ) => '16',
				
				
			),
			'group' => 'Background Distortion',
			'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )	
		),
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Intensity', 'ut_shortcodes' ),
			'description' => esc_html__( 'Using negative values will also invert the animation direction.', 'ut_shortcodes' ),
            'param_name' => 'distortion_intensity',
			'value' => array(
                'default'   => '10',
                'min'       => '-20',
                'max'       => '20',
                'step'      => '1',
                'unit'      => ''
            ),
            'group' => 'Background Distortion',
            'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )
        ),
		array(
			'type' => 'dropdown',
			'heading' => __( 'Animation Easing Effect', 'ut_shortcodes' ),
			'param_name' => 'distortion_ease',
			'value' => array(
				esc_html__( 'none', 'js_composer' ) => 'none',
				esc_html__( 'Sine', 'js_composer' ) => 'Sine.easeOut',
				esc_html__( 'Circ', 'js_composer' ) => 'Circ.easeOut',
				esc_html__( 'Power2', 'js_composer' ) => 'Power2.easeOut',
				esc_html__( 'Elastic', 'js_composer' ) => 'Elastic.easeOut',
			),
			'group' => 'Background Distortion',
			'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )	
		),
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Speed In', 'ut_shortcodes' ),
			'description' => __( 'Lower value = quicker. Higher value = slower.', 'ut_shortcodes' ),
            'param_name' => 'distortion_speed_in',
			'edit_field_class'  => 'vc_col-sm-6',
			'value' => array(
                'default'   => '100',
                'min'       => '10',
                'max'       => '400',
                'step'      => '10',
                'unit'      => ''
            ),
            'group' => 'Background Distortion',
            'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )
        ),
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Speed Out', 'ut_shortcodes' ),
			'description' => __( 'Lower value = quicker. Higher value = slower.', 'ut_shortcodes' ),
            'param_name' => 'distortion_speed_out',
			'edit_field_class'  => 'vc_col-sm-6',
			'value' => array(
                'default'   => '100',
                'min'       => '10',
                'max'       => '400',
                'step'      => '10',
                'unit'      => ''
            ),
            'group' => 'Background Distortion',
            'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )
        ),
		
	);
	
}

vc_add_params( 'vc_row', _vc_add_background_distortion_effect() );
vc_add_params( 'vc_column', _vc_add_background_distortion_effect() );
vc_add_params( 'vc_section', _vc_add_background_distortion_effect() );



/**
 * Add Allows Columns animate when parent is hovered
 *
 * @return    array
 *
 * @access    private
 * @since     4.6.3
 */

function _vc_early_background_distortion_call() {
	
	return array (
	
		array(
			'type' => 'dropdown',
			'heading' => __( 'Early Distortion Effect Animation', 'ut_shortcodes' ),
			'description' => __( 'By default the distortion effec animates when users move their mouse over the column. By activating this option the animation starts when moving the mouse over the outer row. This way you can create for example split sections, where users move their mouse over a textarea on the right and the image to the left animates as well.', 'ut_shortcodes' ),
			'param_name' => 'early_distortion_effect',
			'value' => array(
				esc_html__( 'no, thanks!',  	'js_composer' ) => 'off',
				esc_html__( 'yes, please!',  	'js_composer' ) => 'on',
			),
			'group' => 'Background Distortion',
			'dependency'    => array(
                'element' => 'distortion',
                'value' => array('on')
            )	
		)
	
	);
	
}

vc_add_params( 'vc_column', _vc_early_background_distortion_call() );





if( !class_exists( 'UT_Distortion_Background' ) ) {
	
    class UT_Distortion_Background {
		
		/*
		 * Flag for loading the necessary script into the footer
		 */		
		
		private $add_script;
		
		/*
		 * Default Image ID
		 */
		
		public $image_default;
		
		/*
		 * Hover Image ID
		 */
		
		public $image_hover;
		
		/*
		 * Distortion Effect
		 */
		
		public $displacement;
		
		/*
		 * Config Attributes
		 */
		
		public $atts;
		
		
		function __construct( $atts ) {
			
			add_action( 'wp_footer', array( $this, 'enqueue_scripts' ) );
			
			$this->atts = $atts;
			
		}
				
		public function html(){
			
			// we need 2 images
			if( empty( $this->image_default ) || empty( $this->image_hover ) ) {
				return;	
			}			
			
			$this->add_script = true;			
			
			extract( $this->atts );
			
			$attributes = array();
			
			if( !empty( $distortion_intensity ) ) {
				$attributes['data-intensity'] = -( $distortion_intensity / 100 );	
			}			
			
			if( !empty( $distortion_ease ) ) {
				$attributes['data-easing'] = $distortion_ease;
			}		
			
			if( !empty( $distortion_speed_in ) ) {
				$attributes['data-speedIn'] = $distortion_speed_in / 100;	
			}
			
			if( !empty( $distortion_speed_out ) ) {
				$attributes['data-speedOut'] = $distortion_speed_out / 100;	
			}
			
			$attributes = implode(' ', array_map(
                function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
                $attributes,
                array_keys( $attributes )
            ) );
						
			$file_type = $this->displacement == 4 || $this->displacement == 5 ? '.png' : '.jpg';
			
			ob_start(); ?>
		
				<div class="ut-distortion-effect-container" data-displacement="<?php echo THEME_WEB_ROOT; ?>/images/displacement/<?php echo $this->displacement . $file_type; ?>" <?php echo $attributes; ?>>
					<img src="<?php echo $this->image_default[0]; ?>"  width="<?php echo $this->image_default[1]; ?>" height="<?php echo $this->image_default[2]; ?>" alt="Image"/>
					<img src="<?php echo $this->image_hover[0]; ?>"  width="<?php echo $this->image_hover[1]; ?>" height="<?php echo $this->image_hover[2]; ?>" alt="Image"/>
				</div>

			<?php

			return ob_get_clean();	
			
		}		
		
		public function set_default_image( $id ) {
			
			$this->image_default = wp_get_attachment_image_src( $id, 'full' );
			
		}
		
		public function set_hover_image( $id ) {
			
			$this->image_hover = wp_get_attachment_image_src( $id, 'full' );
			
		}
		
		public function set_effect( $id ) {
			
			$this->displacement = $id;
						
		}
				
		function enqueue_scripts() {
            
            if( !$this->add_script ) {
                return;
            }
            
			// has 2 dependecies
            wp_print_scripts( 'ut-distortion-js' );
        
        }		
		
	}

}


/**
 * Add Offset Anchors 
 *
 * @return    array
 *
 * @access    private
 * @since     4.3
 */

function _vc_add_section_anchor_to_vc_row() {
    
    return array(
        
        array(
            'type' => 'section_anchor',
            'heading' => esc_html__( 'Linking ID', 'ut_shortcodes' ),
            'description' => sprintf( __( 'Enter ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'js_composer' ), 'http://www.w3schools.com/tags/att_global_id.asp' ),
            'param_name' => 'bklyn_section_anchor_id',
            'group' => 'Linking'
        ),
        
    );

}

vc_add_params( 'vc_row', _vc_add_section_anchor_to_vc_row() );
vc_add_params( 'vc_section', _vc_add_section_anchor_to_vc_row() );


/**
 * Enhance VC Section
 *
 * @return    array
 *
 * @access    private
 * @since     4.3.0
 */

function _vc_add_enhance_vc_section() {

    return array(
        
        'type'          => 'dropdown',
        'heading'       => __( 'Section stretch', 'js_composer' ),
        'param_name'    => 'full_width',
        'value'         => array(
            esc_html__( 'Default', 'js_composer' ) => '',
            esc_html__( 'Stretch section', 'js_composer' ) => 'stretch_row',
            esc_html__( 'Stretch section and content', 'js_composer' ) => 'stretch_row_content',
        ),
        'std'           => 'stretch_row',
        'description'   => __( 'Select stretching options for section and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'unitedthemes' ),
        
    );
    
}

vc_add_param( 'vc_section', _vc_add_enhance_vc_section() );



/**
 * Enhance VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.3.0
 */

function _vc_add_enhance_vc_row() {

    return array(
        
        'type'          => 'dropdown',
        'heading'       => __( 'Row stretch', 'js_composer' ),
        'param_name'    => 'full_width',
        'value'         => array(
            esc_html__( 'Default', 'js_composer' ) => '',
            esc_html__( 'Stretch row', 'js_composer' ) => 'stretch_row',
			esc_html__( 'Stretch row and content', 'js_composer' ) => 'stretch_row_content',
			esc_html__( 'Stretch row and content (no paddings)', 'js_composer' ) => 'stretch_row_content_no_spaces',
        ),
        'std'           => 'stretch_row',
        'description'   => __( 'Select stretching options for row and content (Note: stretched may not work properly if parent container has "overflow: hidden" CSS property).', 'unitedthemes' ),
        
    );
    
}

vc_add_param( 'vc_row', _vc_add_enhance_vc_row() );


/**
 * Add Video Settings to VC Section and Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.5.4
 */

// remove old param since we support youtube and vimeo
vc_remove_param( "vc_section", "video_bg" );
vc_remove_param( "vc_section", "video_bg_url" );
vc_remove_param( "vc_section", "video_bg_parallax" );
vc_remove_param( "vc_section", "parallax_speed_video" );

vc_remove_param( "vc_row", "video_bg" );
vc_remove_param( "vc_row", "video_bg_url" );
vc_remove_param( "vc_row", "video_bg_parallax" );
vc_remove_param( "vc_row", "parallax_speed_video" );

function _vc_add_video_settings_to_vc() {
    
    return array(
        
        array(
			'type' => 'checkbox',
			'heading' => __( 'Activate Video Background?', 'js_composer' ),
			'param_name' => 'video_bg',
			'description' => __( 'If checked, video will be used as section background. If Parallax is activated in "Design Options" the video will parallax as well.', 'js_composer' ),
			'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
            'group' => 'Video'
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Video Link', 'js_composer' ),
			'param_name' => 'video_bg_url',
			'description' => __( 'Add Video Link. Can be youtube or vimeo. Only insert the video URL not the embed code.', 'js_composer' ),
			'group' => 'Video',
            'dependency' => array(
				'element' => 'video_bg',
				'not_empty' => true,
			),    
		),
        
    );

}

vc_add_params( 'vc_row', _vc_add_video_settings_to_vc() );
vc_add_params( 'vc_section', _vc_add_video_settings_to_vc() );


/**
 * Add Overlay Settings to VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.0
 */

function _vc_add_overlay_settings_to_vc_row() {
    
    return array( 
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay'
        ),
        array(
            'type'          => 'gradient_picker',
            'heading'       => esc_html__( 'Overlay Color', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_color',
            'group'         => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay Pattern?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_pattern',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Overlay Style', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_pattern_style',
            'group'         => 'Overlay',
            'value'         => array(
                esc_html__( 'Style One' , 'unitedthemes' )  => 'bklyn-style-one',
                esc_html__( 'Style Two' , 'unitedthemes' )  => 'bklyn-style-two',
                esc_html__( 'Style Three' , 'unitedthemes' )  => 'bklyn-style-three',
            ),
            'dependency'    => array(
                'element' => 'bklyn_overlay_pattern',
                'value'   => 'true',
            )
                        
        ),
        
    );
    
}

vc_add_params( 'vc_row', _vc_add_overlay_settings_to_vc_row() );
vc_add_params( 'vc_section', _vc_add_overlay_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_overlay_settings_to_vc_row() );
vc_add_params( 'vc_column_inner', _vc_add_overlay_settings_to_vc_row() );


/**
 * Add Overlay Effect Settings to VC
 *
 * @return    array
 *
 * @access    private
 * @since     4.6.1
 */

function _vc_add_overlay_effect_settings_to_vc_row() {
	
	return array(
	
		array(
			'type'          => 'dropdown',
            'heading'       => esc_html__( 'Activate Overlay Effect?', 'unitedthemes' ),
            'param_name'    => 'bklyn_overlay_effect',
            'value'         => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' )  => 'true'
            ),
            'group'         => 'Overlay',
			'dependency'    => array(
                'element' => 'bklyn_overlay',
                'value'   => 'true',
            ),
        ),
		
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Number of Particles', 'ut_shortcodes' ),
            'description' => esc_html__( 'The higher the number of particles, the more CPU Performance is needed.', 'ut_shortcodes' ),
            'param_name' => 'bklyn_overlay_effect_number',
			'edit_field_class'  => 'vc_col-sm-6',
            'value' => array(
                'default'   => '20',
                'min'       => '1',
                'max'       => '200',
                'step'      => '1',
                'unit'      => ''
            ),
            'group' => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay_effect',
                'value'     => 'true'
            )
        ),
		
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Density of Particles', 'ut_shortcodes' ),
            'description' => esc_html__( 'Use this option with care. If you already have a high number of particles, try to avoid lowering this value. It might end up with high CPU Usage.', 'ut_shortcodes' ),
            'param_name' => 'bklyn_overlay_effect_density',
			'edit_field_class'  => 'vc_col-sm-6',
            'value' => array(
                'default'   => '800',
                'min'       => '200',
                'max'       => '2000',
                'step'      => '50',
                'unit'      => ''
            ),
            'group' => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay_effect',
                'value'     => 'true'
            )
        ),
		
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Speed of Particles', 'ut_shortcodes' ),
            'description' => esc_html__( 'Animation Speed.', 'ut_shortcodes' ),
            'param_name' => 'bklyn_overlay_effect_speed',
            'value' => array(
                'default'   => '5',
                'min'       => '1',
                'max'       => '20',
                'step'      => '1',
                'unit'      => ''
            ),
            'group' => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay_effect',
                'value'     => 'true'
            )
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Particle Shape?', 'unitedthemes' ),
			'description' => __( 'Select your desired particle shape.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_particle_shape',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'circle', 'unitedthemes' ) => 'circle',
				esc_html__( 'star', 'unitedthemes' ) => 'star',
				esc_html__( 'triangle', 'unitedthemes' ) => 'triangle',
				esc_html__( 'edge', 'unitedthemes' ) => 'edge',
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),

		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Particle Color', 'ut_shortcodes' ),
			'description' => __( 'Select your desired particle color.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_particle_color',
			'edit_field_class' => 'vc_col-sm-6',
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),
		
		array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Particle Size', 'ut_shortcodes' ),
            'description' => esc_html__( 'Drag the handle to set the particle size.', 'ut_shortcodes' ),
            'param_name' => 'bklyn_overlay_effect_particle_size',
			'edit_field_class'  => 'vc_col-sm-6',
            'value' => array(
                'default'   => '3',
                'min'       => '0',
                'max'       => '30',
                'step'      => '1',
                'unit'      => ''
            ),
            'group' => 'Overlay',
            'dependency'    => array(
                'element' => 'bklyn_overlay_effect',
                'value'     => 'true'
            )
        ),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Randomize Particle Size?', 'unitedthemes' ),
			'description' => __( 'If activated, the selected particle size is the maximum size for particles. Each particle size can vary up to the set particle size.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_randomize_particles',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'on', 'unitedthemes' ) => 'true',
				esc_html__( 'off', 'unitedthemes' ) => 'false'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Randomize Particle Opacity?', 'unitedthemes' ),
			'description' => __( 'If activated, the particle opacity will be randomly for each particle.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_randomize_opacity',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'off', 'unitedthemes' ) => 'false',
				esc_html__( 'on', 'unitedthemes' ) => 'true'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Change Particle Opacity while moving?', 'unitedthemes' ),
			'description' => __( 'If activated, the particle opacity will while moving on the screen.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_opacity_animate',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'off', 'unitedthemes' ) => 'false',
				esc_html__( 'on', 'unitedthemes' ) => 'true'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Connect Particles?', 'unitedthemes' ),
			'description' => __( 'Nearby particles are connecting each other with a thin line.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_connect_particles',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'on', 'unitedthemes' ) => 'true',
				esc_html__( 'off', 'unitedthemes' ) => 'false'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),

		array(
			'type' => 'colorpicker',
			'heading' => esc_html__( 'Particles Line Color', 'ut_shortcodes' ),
			'description' => __( 'Optional line color. Default Colors is white.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_line_color',
			'edit_field_class' => 'vc_col-sm-6',
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Activate Particle Mouse Interaction?', 'unitedthemes' ),
			'description' => __( 'If activated particles are interacting with mouse movement and mouse click.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_mouse_interaction',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'on', 'unitedthemes' ) => 'true',
				esc_html__( 'off', 'unitedthemes' ) => 'false'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Particle Mouse Interaction', 'unitedthemes' ),
			'description' => __( '<strong>Repulse</strong> = Particles are moving away from curser.<br /> <strong>Grab</strong> = Creates a connection between cursor and particles in a specific range.<br /> <strong>Bubble</strong> = Increases all particles to specific size within a given range.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_hover_mode',
			'value' => array(
				esc_html__( 'repulse', 'unitedthemes' ) => 'repulse',
				esc_html__( 'grab', 'unitedthemes' ) => 'grab',
				esc_html__( 'bubble', 'unitedthemes' ) => 'bubble',
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect_mouse_interaction',
				'value' => 'true',
			),
		),

		array(
			'type' => 'range_slider',
			'heading' => esc_html__( 'Bubble Size', 'ut_shortcodes' ),
			'description' => esc_html__( 'The size the bubble will increase to.', 'ut_shortcodes' ),
			'param_name' => 'bklyn_overlay_effect_hover_bubble_size',
			'value' => array(
				'default' => '6',
				'min' => '0',
				'max' => '30',
				'step' => '1',
				'unit' => ''
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect_hover_mode',
				'value' => 'bubble'
			)
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Activate Boundaries?', 'unitedthemes' ),
			'description' => __( 'If activated particles will bounce back instead of leaving the screen.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_activate_boundaries',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'on', 'unitedthemes' ) => 'true',
				esc_html__( 'off', 'unitedthemes' ) => 'false'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Particles Moving Direction', 'unitedthemes' ),
			'description' => __( 'If set to none, particles will move into all dirctions randomyly. Otherwise they move all into the selected direction.', 'js_composer' ),
			'param_name' => 'bklyn_overlay_effect_moving_direction',
			'edit_field_class' => 'vc_col-sm-6',
			'value' => array(
				esc_html__( 'none', 'unitedthemes' ) => 'none',
				esc_html__( 'top', 'unitedthemes' ) => 'top',
				esc_html__( 'top right', 'unitedthemes' ) => 'top-right',
				esc_html__( 'right', 'unitedthemes' ) => 'right',
				esc_html__( 'bottom right', 'unitedthemes' ) => 'bottom-right',
				esc_html__( 'bottom', 'unitedthemes' ) => 'bottom',
				esc_html__( 'bottom left', 'unitedthemes' ) => 'bottom-left',
				esc_html__( 'left', 'unitedthemes' ) => 'left',
				esc_html__( 'top left', 'unitedthemes' ) => 'top-left'
			),
			'group' => 'Overlay',
			'dependency' => array(
				'element' => 'bklyn_overlay_effect',
				'value' => 'true',
			),
		),
		
	
	);	
	
}

vc_add_params( 'vc_row', _vc_add_overlay_effect_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_overlay_effect_settings_to_vc_row() );
vc_add_params( 'vc_section', _vc_add_overlay_effect_settings_to_vc_row() );
vc_add_params( 'vc_column_inner', _vc_add_overlay_effect_settings_to_vc_row() );


/**
 * Add Box Shadow Settings to VC Elements
 *
 * @return    array
 *
 * @access    private
 * @since     4.5
 */

function _vc_add_box_shadow_settings_to_vc() {
    
    return array(
    
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Add Box Shadow?', 'unitedthemes' ),
            'param_name'        => 'add_box_shadow',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'colorpicker',
            'heading'           => esc_html__( 'Shadow Color', 'ut_shortcodes' ),
            'param_name'        => 'shadow_color',
            'edit_field_class'  => 'vc_col-sm-6',
            'group'             => 'Design Options',
            'dependency' => array(
                'element'   => 'add_box_shadow',
                'value'     => 'true',
            ),
        ),
        
        array(
            'type'              => 'colorpicker',
            'heading'           => esc_html__( 'Shadow Hover Color', 'ut_shortcodes' ),
            'param_name'        => 'shadow_color_hover',
            'edit_field_class'  => 'vc_col-sm-6',
            'group'             => 'Design Options',
            'dependency' => array(
                'element'   => 'add_box_shadow',
                'value'     => 'true',
            ),
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Force Shadow Spacing?', 'unitedthemes' ),
            'description'       => esc_html__( 'If box shadow is cut off due to overflow issues, please activate this option.', 'unitedthemes' ),    
            'param_name'        => 'add_box_shadow_spacing',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
    
    );

}

vc_add_params( 'vc_column', _vc_add_box_shadow_settings_to_vc() );

/**
 * VC Parallax Settings
 *
 * @return    array
 *
 * @access    private
 * @since     4.5.4
 */

// remove default section parallax params
vc_remove_param( "vc_section", "parallax" );
vc_remove_param( "vc_section", "parallax_image" );
vc_remove_param( "vc_section", "parallax_speed_bg" );

// remove default row parallax params
vc_remove_param( "vc_row", "parallax" );
vc_remove_param( "vc_row", "parallax_image" );
vc_remove_param( "vc_row", "parallax_speed_bg" );

// remove default column parallax params
vc_remove_param( "vc_column", "parallax" );
vc_remove_param( "vc_column", "parallax_image" );
vc_remove_param( "vc_column", "parallax_speed_bg" );

// remove default column video parallax params
vc_remove_param( "vc_column", "video_bg" );
vc_remove_param( "vc_column", "video_bg_url" );
vc_remove_param( "vc_column", "video_bg_parallax" );
vc_remove_param( "vc_column", "parallax_speed_video" );


function _vc_add_enhance_vc_parallax() {
    
    return array(
        
        array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax', 'ut_shortcodes' ),
            'description' => __( 'Add parallax type background.', 'ut_shortcodes' ),
			'param_name' => 'parallax',
			'value' => array(
				esc_html__( 'None', 'js_composer' ) => '',
				esc_html__( 'Simple', 'js_composer' ) => 'content-moving',
			),
            'group'         => 'Design Options',
						
		),
        array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Parallax Speed', 'ut_shortcodes' ),
            'description' => esc_html__( '', 'ut_shortcodes' ),
            'param_name' => 'parallax_speed',
            'value' => array(
                'default'   => '3',
                'min'       => '1',
                'max'       => '6',
                'step'      => '1',
                'unit'      => 'x'
            ),
            'group' => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value' => array('content-moving')
            )
        ),
        array(
            'type' => 'range_slider',
            'heading' => esc_html__( 'Parallax Threshold', 'ut_shortcodes' ),
            'description' => __( 'Sometimes it can happen, that an element, which has nearly bypassed the viewport has a small whitegap at the top or bottom. In this case try to reduce this gap with adjusting this value.', 'js_composer' ),
            'param_name' => 'parallax_threshold',
            'value' => array(
                'default'   => '0',
                'min'       => '-100',
                'max'       => '100',
                'step'      => '1',
                'unit'      => 'px'
            ),
            'group' => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value' => array('content-moving')
            )
        ),
        
        /*array(
			'type' => 'dropdown',
			'heading' => __( 'Parallax Direction', 'js_composer' ),
            'description' => __( 'Parallax Scroll Direction.', 'js_composer' ),
			'param_name' => 'parallax_direction',
			'value' => array(
				esc_html__( 'Bottom', 'js_composer' ) => 'bottom',
                esc_html__( 'Top', 'js_composer' ) => 'top',                
			),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value' => array('content-moving')
            )    
						
		),*/        
    
    );
    
}

vc_add_params( 'vc_section', _vc_add_enhance_vc_parallax() );
vc_add_params( 'vc_row', _vc_add_enhance_vc_parallax() );

/**
 * Add Background Settings to VC Row
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_background_settings_to_vc_row() {
    
    return array(
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Background Position', 'unitedthemes' ),
            'param_name'    => 'background_position',
			'edit_field_class'  => 'vc_col-sm-6',
            'value'         => array(
                esc_html__( 'Select Background Position', 'unite' ) => '',
                esc_html__( 'left top', 'unite' )                   => 'left top',
                esc_html__( 'left center', 'unite' )                => 'left center',
                esc_html__( 'left bottom', 'unite' )                => 'left bottom',
                esc_html__( 'center top', 'unite' )                 => 'center top',
                esc_html__( 'center center', 'unite' )              => 'center center',
                esc_html__( 'center bottom', 'unite' )              => 'center bottom',
                esc_html__( 'right top', 'unite' )                  => 'right top',
                esc_html__( 'right center', 'unite' )               => 'right center',
                esc_html__( 'right bottom', 'unite' )               => 'right bottom'  
            ),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value_not_equal_to' => array('content-moving')
            )
        ),
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Background Attachment', 'unitedthemes' ),
            'param_name'    => 'background_attachment',
			'edit_field_class'  => 'vc_col-sm-6',
            'value'         => array(
                esc_html__( 'Select Background Attachment', 'unitedthemes' )=> '',
                esc_html__( 'Scroll', 'unitedthemes' )                      => 'scroll',
                esc_html__( 'Fixed', 'unitedthemes' )                       => 'fixed',
                esc_html__( 'Inherit', 'unitedthemes' )                     => 'inherit',
            ),
            'group'         => 'Design Options',
            'dependency'    => array(
                'element' => 'parallax',
                'value_not_equal_to' => array('content-moving')
            )   
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Medium Desktop?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_medium',
            'edit_field_class'  => 'vc_col-sm-4',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Tablet?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_tablet',
            'edit_field_class'  => 'vc_col-sm-4',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Hide Background on Mobile?', 'unitedthemes' ),
            'param_name'        => 'hide_bg_mobile',
            'edit_field_class'  => 'vc_col-sm-4',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' )     => '',
                esc_html__( 'yes', 'unitedthemes' )    => 'true'
            ),
            'group'             => 'Design Options'
        ),            
        
    );
    
}

// add to sections
vc_add_params( 'vc_section', _vc_add_background_settings_to_vc_row() );

// add to rows and columns
vc_add_params( 'vc_row', _vc_add_background_settings_to_vc_row() );
vc_add_params( 'vc_column', _vc_add_background_settings_to_vc_row() );

// add to inner rows and inner column
vc_add_params( 'vc_row_inner', _vc_add_background_settings_to_vc_row() );
vc_add_params( 'vc_column_inner', _vc_add_background_settings_to_vc_row() );





/*
 * SVG Separators Config
 *
 * @return    array
 *
 * @since     4.6
 */

if( !function_exists('ut_svg_separators_config') ) :

    function ut_svg_separators_config( $svg ) {
        
        $ut_recognized_svg_separators = apply_filters( 'ut_recognized_svg_separators', array(
        
            'design_wave'   => array(
                'id'            => 'design-wave',
                'svg'           => 'design-wave.svg',
                'path_count'    => 2
            ),
            'double_wave_1'   => array(
                'id'            => 'double-wave-1',
                'height'        => '66',
                'svg'           => 'double-wave-1.svg',
                'path_count'    => 1
            ),
            'triple_wave_1'     => array(
                'id'            => 'triple-wave-1',
                'height'        => '435',
                'svg'           => 'triple-wave-1.svg',
                'path_count'    => 3
            ),
            'abstract_waves'    => array(
                'id'            => 'abstract-waves',
                'height'        => '480',
                'svg'           => 'abstract.svg',
                'path_count'    => 2
            ),
            'simple_clouds' => array(
                'id'            => 'simple-clouds',
                'height'        => '250',
                'svg'           => 'simple-clouds.svg',
                'path_count'    => 1
            ),
            'triangle_shadow' => array(
                'id'            => 'triangle-shadow',
                'height'        => '150',
                'svg'           => 'triangle-shadow.svg',
                'path_count'    => 2
            ),
            'triangle_asymmetrical' => array(
                'id'            => 'triangle-asymmetrical',
                'height'        => '120',
                'svg'           => 'triangle-asymmetrical.svg',
                'path_count'    => 1
            ),
            'diagonal' => array(
                'id'            => 'diagonal',
                'height'        => '250',
                'svg'           => 'diagonal.svg',
                'path_count'    => 1
            ),
            'half_circle' => array(
                'id'            => 'half-circle',
                'height'        => '100',
                'svg'           => 'half-circle.svg',
                'path_count'    => 1
            ),
            'curve' => array(
                'id'            => 'curve',
                'height'        => '100',
                'svg'           => 'curve.svg',
                'path_count'    => 1
            ),
            'curve_asymmetrical' => array(
                'id'            => 'curve-asymmetrical',
                'height'        => '100',
                'svg'           => 'curve-asymmetrical.svg',
                'path_count'    => 1
            ),
            'slit' => array(
                'id'            => 'slit',
                'height'        => '200',
                'svg'           => 'slit.svg',
                'path_count'    => 2
            ),
            'stamp' => array(
                'id'            => 'stamp',
                'height'        => '200',
                'svg'           => 'stamp.svg',
                'path_count'    => 1
            ),
            'snow' => array(
                'id'            => 'snow',
                'height'        => '600',
                'svg'           => 'snow.svg',
                'path_count'    => 3
            )
        
        ) );
        
        return isset( $ut_recognized_svg_separators[$svg] ) ? $ut_recognized_svg_separators[$svg] : false;        
        
    }

endif;

/*
 * Linear Gradient for SVG
 *
 * @return    string
 *
 * @since     4.6
 */

if( !function_exists('ut_create_svg_linear_gradient') ) :

    function ut_create_svg_linear_gradient( $id, $start_color = '#FFF', $end_color = '#FFF', $direction = 'default', $position = 'top', $flip = 'false' ) {
        
        if( empty( $id ) ) {
            return;
        }
        
        $directions = array(
            
            // left to right
            'default' => array(
                'x1'    => '100%',
                'y1'    => '0%',
                'x2'    => '0%',
                'y2'    => '0%',
                'top'   => array(
                    'start' => $end_color,
                    'end'   => $start_color
                ),
                'bottom' => array(
                    'start' => $end_color,
                    'end'   => $start_color
                )
            ),
            'diagonal_1' => array(
                'x1'    => '0%',
                'y1'    => '0%',
                'x2'    => '100%',
                'y2'    => '100%',
                'top'   => array(
                    'start' => $end_color,
                    'end'   => $start_color
                ),
                'bottom' => array(
                    'start' => $start_color,
                    'end'   => $end_color
                )
            ),
            'diagonal_2' => array(
                'x1'    => '0%',
                'y1'    => '100%',
                'x2'    => '100%',
                'y2'    => '0%',
                'top'   => array(
                    'start' => $start_color,
                    'end'   => $end_color
                ),
                'bottom' => array(
                    'start' => $start_color,
                    'end'   => $end_color
                )
            ),
            'top_down'  => array(
                'x1'    => '0%',
                'y1'    => '100%',
                'x2'    => '0%',
                'y2'    => '0%',
                'top'   => array(
                    'start' => $start_color,
                    'end'   => $end_color
                ),
                'bottom' => array(
                    'start' => $end_color,
                    'end'   => $start_color
                )
            )
        
        );        
        
        if( !isset( $directions[$direction] ) ) {
            return;
        }
        
        $gradient = '<linearGradient id="' . esc_attr( $id ) . '" x1="' . esc_attr( $directions[$direction]['x1'] ) . '" y1="' . esc_attr( $directions[$direction]['y1'] ) . '" x2="' . esc_attr( $directions[$direction]['x2'] ) . '" y2="' . esc_attr( $directions[$direction]['y2'] ) . '">';
        
            $gradient .= '<stop offset="0%" stop-color="' . esc_attr( $directions[$direction][$position]['start'] ) . '" />';
            $gradient .= '<stop offset="100%" stop-color="' . esc_attr( $directions[$direction][$position]['end'] ) . '" />';
                
        $gradient .= '</linearGradient>';

        return $gradient;
        
    }

endif;


/*
 * Create SVG for Section Separators
 *
 * @return    string
 *
 * @since     4.6
 */

if( !function_exists('ut_create_section_separator') ) :

    function ut_create_section_separator( $area = 'section', $position = 'top', $svg, $atts = '' ) {
        
        $svg = ut_svg_separators_config( $svg );
        
        if( $svg && !empty( $svg ) && isset( $svg['svg'] ) ) {
        
            $svg_string = file_get_contents( THEME_DOCUMENT_ROOT . '/images/svg/separators/' . $svg['svg']  ); //@todo
        
        } else {
            
            return; // svg does not exist
            
        }
        
        if( $area == 'hero' ) {
            
            $atts = array(
                
                // separator horizontal flip
                'section_separator_' . $position . '_flip' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_flip', 'false' ),            
                // color 1
                'section_separator_' . $position . '_color_1' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_1' ),
                'section_separator_' . $position . '_color_1_gradient' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_1_gradient', 'false' ),
                'section_separator_' . $position . '_color_1_gradient_color' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_1_gradient_color' ), 
                'section_separator_' . $position . '_color_1_gradient_direction' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_1_gradient_direction' ,'default' ), 
                // color 2
                'section_separator_' . $position . '_color_2' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_2' ),
                'section_separator_' . $position . '_color_2_gradient' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_2_gradient', 'false' ),
                'section_separator_' . $position . '_color_2_gradient_color' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_2_gradient_color' ), 
                'section_separator_' . $position . '_color_2_gradient_direction' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_2_gradient_direction' ,'default' ), 
                // color 3
                'section_separator_' . $position . '_color_3' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_3' ),
                'section_separator_' . $position . '_color_3_gradient' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_3_gradient', 'false' ),
                'section_separator_' . $position . '_color_3_gradient_color' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_3_gradient_color' ), 
                'section_separator_' . $position . '_color_3_gradient_direction' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_color_3_gradient_direction' ,'default' ),
                // dimensions and responsive
                'section_separator_' . $position . '_width' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_width', 100 ),
                'section_separator_' . $position . '_height' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_height', 0 ),
                'section_separator_' . $position . '_hide_on_tablet' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_hide_on_tablet', 'true' ),
                'section_separator_' . $position . '_width_tablet' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_width_tablet', 100 ),
                'section_separator_' . $position . '_height_tablet' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_height_tablet', 0 ),
                'section_separator_' . $position . '_hide_on_mobile' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_hide_on_mobile', 'true' ),
                'section_separator_' . $position . '_width_mobile' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_width_mobile', 100 ),
                'section_separator_' . $position . '_height_mobile' => ut_return_hero_config( 'ut_hero_separator_' . $position . '_height_mobile', 0 ),
                
            );  
            
        }
        
        // create unique SVG ID
        $svg_id = uniqid("ut-svg-");
        
        // Inject ID
        $svg_string = str_replace("{{SVG_ID}}", $svg_id, $svg_string );
        
        // Inject SVG CSS and Linear Gradients
        $svg_css_style = '';
        $svg_def = '';
        
        for( $x = 1; $x <= $svg['path_count']; $x++ ) {
            
            // reset fill
            $svg_fill = '';
            
            $SVG_PATH_CLASS = uniqid("ut-svg-color-");
            $svg_string = str_replace('{{SVG_PATH_' . $x . '_CLASS}}', $SVG_PATH_CLASS, $svg_string );
            
            if( isset( $atts['section_separator_' . $position . '_color_' . $x . '_gradient'] ) && $atts['section_separator_' . $position . '_color_' . $x . '_gradient'] == 'true' ) {
            
                $SVG_FILL_ID = uniqid("ut-svg-def-");
                $svg_fill = 'fill="url(#' . $SVG_FILL_ID . ')"';
                
                // add to svg config
                $svg_def .= ut_create_svg_linear_gradient( $SVG_FILL_ID, $atts['section_separator_' . $position . '_color_' . $x . ''], $atts['section_separator_' . $position . '_color_' . $x . '_gradient_color'], $atts['section_separator_' . $position . '_color_' . $x . '_gradient_direction'] ); 
                
            } else {

                if( !empty( $atts['section_separator_' . $position . '_color_' . $x . ''] ) ) {

                    $svg_css_style .= '.' . $SVG_PATH_CLASS . '{ fill: ' . $atts['section_separator_' . $position . '_color_' . $x] . ' !important }';

                }

            }
            
            // apply fill
            $svg_string = str_replace('{{SVG_FILL_' . $x . '_ID}}', $svg_fill, $svg_string );
            
        } 
        
        
        // Now Replace Tags in SVG
        if( !empty( $svg_css_style ) ) {
            $svg_css_style = '<style type="text/css" scoped>' . ut_minify_inline_css( $svg_css_style ) . '</style>';
        }
        
        if( !empty( $svg_def ) ) {
            $svg_def = '<def>' . $svg_def . '</def>';
        }
        
        $svg_string = str_replace("{{SVG_STYLE_ID}}", $svg_css_style, $svg_string );
        $svg_string = str_replace("{{SVG_DEF_ID}}", $svg_def, $svg_string );

        
        // Separator CSS
        $css_style = '';
        
        $el_id = uniqid("ut-separator-");
        
        if( !empty( $atts['section_separator_' . $position . '_width'] ) && $atts['section_separator_' . $position . '_width'] != 0 ) {
            
            $css_style .= '#' . $el_id . '{ width: calc(' . $atts['section_separator_' . $position . '_width'] . '% + 2px); }';
            $css_style .= '#' . $el_id . ' svg { width: calc(' . $atts['section_separator_' . $position . '_width'] . '% + 2px); left: ' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '%; }';
            
            if( isset( $atts['section_separator_' . $position . '_flip'] ) && $atts['section_separator_' . $position . '_flip'] == 'true' ) {
                
                $css_style .= '#' . $el_id . ' svg { -webkit-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '% ) scale(-1, 1); -ms-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '% ) scale(-1, 1); transform: translateX( -' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '% ) scale(-1, 1); }';
                
            } else {
                
                $css_style .= '#' . $el_id . ' svg { -webkit-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '% ); -ms-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '% ); transform: translateX( -' . ( $atts['section_separator_' . $position . '_width'] / 2 ) . '% ); }';
                
            }
            
        }
        
        if( !empty( $atts['section_separator_' . $position . '_height'] ) ) {
            
            $css_style .= '#' . $el_id . '{ height: ' . $atts['section_separator_' . $position . '_height'] . '%; }';
            $css_style .= '#' . $el_id . ' svg { height: 100%; }';
            
        } elseif( !empty( $svg['height'] ) ) {
            
            $css_style .= '#' . $el_id . '{ height: ' . $svg['height'] . 'px; }';
            $css_style .= '#' . $el_id . ' svg { height: ' . $svg['height'] . 'px; }';
            
        }
        
        // Tablet CSS
        if( !empty( $atts['section_separator_' . $position . '_height_tablet'] ) ) {           
            
            $css_style .= '@media (min-width: 768px) and (max-width: 1024px) {';
                $css_style .= '#' . $el_id . '{ height: ' . $atts['section_separator_' . $position . '_height_tablet'] . '%; }';
                $css_style .= '#' . $el_id . ' svg { height: 100%; }';
            $css_style .= '}';
            
        }
        
        if( !empty( $atts['section_separator_' . $position . '_width_tablet'] ) && $atts['section_separator_' . $position . '_width_tablet'] != 0 ) {
            
            $css_style .= '@media (min-width: 768px) and (max-width: 1024px) {';
                
                $css_style .= '#' . $el_id . '{ width: calc(' . $atts['section_separator_' . $position . '_width_tablet'] . '% + 2px); }';
                $css_style .= '#' . $el_id . ' svg { width: calc(' . $atts['section_separator_' . $position . '_width_tablet'] . '% + 2px); left: ' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '%; }';
                
                if( isset( $atts['section_separator_' . $position . '_flip'] ) && $atts['section_separator_' . $position . '_flip'] == 'true' ) {
            
                    $css_style .= '#' . $el_id . ' svg { -webkit-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '% ) scale(-1, 1); -ms-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '% ) scale(-1, 1); transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '% ) scale(-1, 1); }';
            
                } else {
                
                    $css_style .= '#' . $el_id . ' svg { -webkit-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '% ); -ms-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '% ); transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_tablet'] / 2 ) . '% ); }';
                    
                }
            
            $css_style .= '}';
            
        }
                
        // Mobile CSS
        if( !empty( $atts['section_separator_' . $position . '_height_mobile'] ) ) {           
            
            $css_style .= '@media (max-width: 767px) {';
                $css_style .= '#' . $el_id . '{ height: ' . $atts['section_separator_' . $position . '_height_mobile'] . '%; }';
                $css_style .= '#' . $el_id . ' svg { height: 100%; }';
            $css_style .= '}';
            
        }
        
        if( !empty( $atts['section_separator_' . $position . '_width_mobile'] ) && $atts['section_separator_' . $position . '_width_mobile'] != 0 ) {
            
            $css_style .= '@media (max-width: 767px) {';
                
                $css_style .= '#' . $el_id . '{ width: calc(' . $atts['section_separator_' . $position . '_width_mobile'] . '% + 2px); }';
                $css_style .= '#' . $el_id . ' svg { width: calc(' . $atts['section_separator_' . $position . '_width_mobile'] . '% + 2px); left: ' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '%; }';
            
                if( isset( $atts['section_separator_' . $position . '_flip'] ) && $atts['section_separator_' . $position . '_flip'] == 'true' ) {
            
                    $css_style .= '#' . $el_id . ' svg { -webkit-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '% ) scale(-1, 1); -ms-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '% ) scale(-1, 1); transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '% ) scale(-1, 1); }';
                
                } else {
                    
                    $css_style .= '#' . $el_id . ' svg { -webkit-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '% ); -ms-transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '% ); transform: translateX( -' . ( $atts['section_separator_' . $position . '_width_mobile'] / 2 ) . '% ); }';
                    
                }    
                    
            $css_style .= '}';
            
        }
        
		if( !empty( $atts['section_separator_' . $position . '_zindex'] ) && $atts['section_separator_' . $position . '_zindex'] == 'on' ) {
			$css_style .= '#' . $el_id . '{ z-index: 10; }';
		}
		
        // Start Separator
        $separator = '';
        
        $classes   = array('bklyn-section-separator');
        $classes[] = 'bklyn-section-separator-' . $position;
        $classes[] = 'bklyn-section-separator-' . $svg['id'];
        
        // Flip SVG
        if( isset( $atts['section_separator_' . $position . '_flip'] ) && $atts['section_separator_' . $position . '_flip'] == 'true' ) {
            $classes[] = 'bklyn-section-separator-flip';
        }
                
        // Hide on Tablet  
        if( isset( $atts['section_separator_' . $position . '_hide_on_tablet'] ) && $atts['section_separator_' . $position . '_hide_on_tablet'] == 'true' ) {            
            $classes[] = 'hide-on-tablet';
        }
        
        // Hide on Mobile
        if( isset( $atts['section_separator_' . $position . '_hide_on_mobile'] ) && $atts['section_separator_' . $position . '_hide_on_mobile'] == 'true' ) {            
            $classes[] = 'hide-on-mobile';    
        }
        
        // Add Custom CSS
        if( !empty( $css_style ) ) {
            $separator .= '<style type="text/css" scoped>' . ut_minify_inline_css( $css_style ) . '</style>';
        }
        
        $separator .= '<div id="' . esc_attr( $el_id ) . '" class="' . implode(" ", $classes ) . '">';
        
            $separator .= $svg_string;
        
        $separator .= '</div>';
        
        return $separator;
        
    }

endif;



/**
 * Add Section Separator Settings to VC Section
 *
 * @return    array
 *
 * @access    private
 * @since     4.6
 */

function _vc_add_section_seperator_settings_to_vc_section() {
    
    return array(
        
        // Top Separator
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Add Section Separator at Top?', 'unitedthemes' ),
            'param_name'        => 'section_separator_top',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => '',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),
        
		array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Force Top Separator to be in front.', 'unitedthemes' ),
			'description' 		=> __( 'By default section separators are loacted behind the content. Use this option to add bring it to the front.', 'js_composer' ),
            'param_name'        => 'section_separator_top_zindex',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => '',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
			'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            )
        ),
		
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Separator Top Style', 'unitedthemes' ),
            'param_name'        => 'section_separator_svg_top',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'Design Waves', 'unitedthemes' ) => 'design_wave',
                esc_html__( 'Double Wave (1)', 'unitedthemes' ) => 'double_wave_1',
                esc_html__( 'Triple Wave (1)', 'unitedthemes' ) => 'triple_wave_1',
                esc_html__( 'Abstract Waves', 'unitedthemes' ) => 'abstract_waves',
                esc_html__( 'Simple Clouds', 'unitedthemes' ) => 'simple_clouds',
                esc_html__( 'Triangle with Shadow', 'unitedthemes' ) => 'triangle_shadow',
                esc_html__( 'Triangle Asymmetrical', 'unitedthemes') => 'triangle_asymmetrical',
                esc_html__( 'Diagonal', 'unitedthemes' ) => 'diagonal',
                esc_html__( 'Half Circle', 'unitedthemes' ) => 'half_circle',
                esc_html__( 'Curve', 'unitedthemes' ) => 'curve',
                esc_html__( 'Curve Asymmetrical', 'unitedthemes' ) => 'curve_asymmetrical',
                esc_html__( 'Slit', 'unitedthemes' ) => 'slit',
                esc_html__( 'Snow', 'unitedthemes' ) => 'snow',
            ),
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            )
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Flip Top Separator?', 'unitedthemes' ),
            'param_name'        => 'section_separator_top_flip',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            )
        ),
        
        // Top Separator Color Part 1
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 1', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_1',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Add Gradient for SVG Color Part 1', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_1_gradient',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 1 Gradient Color', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_1_gradient_color',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_color_1_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Gradient Direction', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_1_gradient_direction',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'Default (left to right)', 'unitedthemes' ) => 'default',
                esc_html__( 'Diagonal (top left to bottom right)', 'unitedthemes' ) => 'diagonal_1',
                esc_html__( 'Diagonal (top right to bottom left)', 'unitedthemes' ) => 'diagonal_2',
                esc_html__( 'Top to Down', 'unitedthemes' ) => 'top_down',
                
            ),
            'dependency'    => array(
                'element'   => 'section_separator_top_color_1_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        // Top Separator Color Part 2
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 2', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_2',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_svg_top',
                'value'     => array('design_wave','triangle_shadow','snow', 'slit','abstract_waves','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Add Gradient for SVG Color Part 2', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_2_gradient',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_svg_top',
                'value'     => array('design_wave','triangle_shadow','snow', 'slit','abstract_waves','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 2 Gradient Color', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_2_gradient_color',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_color_2_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Gradient Direction', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_2_gradient_direction',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'Default (left to right)', 'unitedthemes' ) => 'default',
                esc_html__( 'Diagonal (top left to bottom right)', 'unitedthemes' ) => 'diagonal_1',
                esc_html__( 'Diagonal (top right to bottom left)', 'unitedthemes' ) => 'diagonal_2',
                esc_html__( 'Top to Down', 'unitedthemes' ) => 'top_down',
                
            ),
            'dependency'    => array(
                'element'   => 'section_separator_top_color_2_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        // Top Separator Color Part 3
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 3', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_3',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_svg_top',
                'value'     => array('snow','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Add Gradient for SVG Color Part 3', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_3_gradient',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_svg_top',
                'value'     => array('snow','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 3 Gradient Color', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_3_gradient_color',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_color_3_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Gradient Direction', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_color_3_gradient_direction',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'Default (left to right)', 'unitedthemes' ) => 'default',
                esc_html__( 'Diagonal (top left to bottom right)', 'unitedthemes' ) => 'diagonal_1',
                esc_html__( 'Diagonal (top right to bottom left)', 'unitedthemes' ) => 'diagonal_2',
                esc_html__( 'Top to Down', 'unitedthemes' ) => 'top_down',
                
            ),
            'dependency'    => array(
                'element'   => 'section_separator_top_color_3_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
                
        // Top Separator Dimensions
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Top Separator Width', 'ut_shortcodes' ),
            'description'   => esc_html__( 'default: 100%', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_width',
            'value' => array(
                'default'   => '100',
                'min'       => '100',
                'max'       => '300',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Top Separator Height', 'ut_shortcodes' ),
            'description'   => esc_html__( '0 = default height of separator.', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_height',
            'value' => array(
                'default'   => '0',
                'min'       => '0',
                'max'       => '100',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide Top Separator on Tablet?', 'unitedthemes' ),
            'param_name' => 'section_separator_top_hide_on_tablet',
            'value' => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!', 'unitedthemes' ) => 'true'
            ),
            'std' => 'true',
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            ),
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Top Separator Width on Tablets', 'ut_shortcodes' ),
            'description'   => esc_html__( 'default: 100%', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_width_tablet',
            'value' => array(
                'default'   => '100',
                'min'       => '100',
                'max'       => '300',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_hide_on_tablet',
                'value_not_equal_to' => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Top Separator Height on Tablets', 'ut_shortcodes' ),
            'description'   => esc_html__( '0 = default height of Separator', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_height_tablet',
            'value' => array(
                'default'   => '0',
                'min'       => '0',
                'max'       => '100',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_hide_on_tablet',
                'value_not_equal_to' => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide Top Separator on Mobile?', 'unitedthemes' ),
            'param_name' => 'section_separator_top_hide_on_mobile',
            'value' => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!', 'unitedthemes' ) => 'true'
            ),
            'std' => 'true',
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top',
                'value'     => array('true')
            ),
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Top Separator Width on Mobiles', 'ut_shortcodes' ),
            'description'   => esc_html__( 'default: 100%', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_width_mobile',
            'value' => array(
                'default'   => '100',
                'min'       => '100',
                'max'       => '300',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_hide_on_mobile',
                'value_not_equal_to'  => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Top Separator Height on Mobiles', 'ut_shortcodes' ),
            'description'   => esc_html__( '0 = default height of Separator', 'unitedthemes' ),
            'param_name'    => 'section_separator_top_height_mobile',
            'value' => array(
                'default'   => '0',
                'min'       => '0',
                'max'       => '100',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_top_hide_on_mobile',
                'value_not_equal_to' => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        // Bottom Separator
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Add Section Separator at Bottom?', 'unitedthemes' ),
            'param_name'        => 'section_separator_bottom',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => '',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),
        
		array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Force Bottom Separator to be in front.', 'unitedthemes' ),
			'description' 		=> __( 'By default section separators are loacted behind the content. Use this option to add bring it to the front.', 'js_composer' ),
            'param_name'        => 'section_separator_bottom_zindex',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => '',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
			'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            )
        ),
		
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Bottom Separator Style', 'unitedthemes' ),
            'param_name'        => 'section_separator_svg_bottom',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'Design Waves', 'unitedthemes' ) => 'design_wave',
                esc_html__( 'Double Wave (1)', 'unitedthemes' ) => 'double_wave_1',
                esc_html__( 'Triple Wave (1)', 'unitedthemes' ) => 'triple_wave_1',
                esc_html__( 'Abstract Waves', 'unitedthemes' ) => 'abstract_waves',
                esc_html__( 'Simple Clouds', 'unitedthemes' ) => 'simple_clouds',
                esc_html__( 'Triangle with Shadow', 'unitedthemes' ) => 'triangle_shadow',
                esc_html__( 'Triangle Asymmetrical', 'unitedthemes') => 'triangle_asymmetrical',
                esc_html__( 'Diagonal', 'unitedthemes' ) => 'diagonal',
                esc_html__( 'Half Circle', 'unitedthemes' ) => 'half_circle',
                esc_html__( 'Curve', 'unitedthemes' ) => 'curve',
                esc_html__( 'Curve Asymmetrical', 'unitedthemes' ) => 'curve_asymmetrical',
                esc_html__( 'Slit', 'unitedthemes' ) => 'slit',
                esc_html__( 'Snow', 'unitedthemes' ) => 'snow',
            ),
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            )
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Flip Bottom Separator?', 'unitedthemes' ),
            'param_name'        => 'section_separator_bottom_flip',
            'group'             => 'Separator',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => '',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            )
        ),
        
        // Bottom Separator Color Part 1
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 1', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_1',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Add Gradient for SVG Color Part 1', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_1_gradient',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 1 Gradient Color', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_1_gradient_color',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_color_1_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Gradient Direction', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_1_gradient_direction',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'Default (left to right)', 'unitedthemes' ) => 'default',
                esc_html__( 'Diagonal (top left to bottom right)', 'unitedthemes' ) => 'diagonal_1',
                esc_html__( 'Diagonal (top right to bottom left)', 'unitedthemes' ) => 'diagonal_2',
                esc_html__( 'Top to Down', 'unitedthemes' ) => 'top_down',
                
            ),
            'dependency'    => array(
                'element'   => 'section_separator_bottom_color_1_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        // Bottom Separator Color Part 2
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 2', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_2',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_svg_bottom',
                'value'     => array('design_wave','triangle_shadow','snow', 'slit','abstract_waves','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Add Gradient for SVG Color Part 2', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_2_gradient',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_svg_bottom',
                'value'     => array('design_wave','triangle_shadow','snow', 'slit','abstract_waves','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 2 Gradient Color', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_2_gradient_color',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_color_2_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Gradient Direction', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_2_gradient_direction',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'Default (left to right)', 'unitedthemes' ) => 'default',
                esc_html__( 'Diagonal (top left to bottom right)', 'unitedthemes' ) => 'diagonal_1',
                esc_html__( 'Diagonal (top right to bottom left)', 'unitedthemes' ) => 'diagonal_2',
                esc_html__( 'Top to Down', 'unitedthemes' ) => 'top_down',
                
            ),
            'dependency'    => array(
                'element'   => 'section_separator_bottom_color_2_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        // Bottom Separator Color Part 3
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 3', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_3',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_svg_bottom',
                'value'     => array('snow','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Add Gradient for SVG Color Part 3', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_3_gradient',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!'  , 'unitedthemes' ) => 'true'
            ),
            'dependency'    => array(
                'element'   => 'section_separator_svg_bottom',
                'value'     => array('snow','triple_wave_1')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'SVG Color Part 2 Gradient Color', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_3_gradient_color',
            'group'         => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_color_3_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'dropdown',
            'heading'       => esc_html__( 'Gradient Direction', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_color_3_gradient_direction',
            'group'         => 'Separator',
            'value'             => array(
                esc_html__( 'Default (left to right)', 'unitedthemes' ) => 'default',
                esc_html__( 'Diagonal (top left to bottom right)', 'unitedthemes' ) => 'diagonal_1',
                esc_html__( 'Diagonal (top right to bottom left)', 'unitedthemes' ) => 'diagonal_2',
                esc_html__( 'Top to Down', 'unitedthemes' ) => 'top_down',
                
            ),
            'dependency'    => array(
                'element'   => 'section_separator_bottom_color_3_gradient',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        // Bottom Separator Dimensions
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Bottom Separator Width', 'ut_shortcodes' ),
            'description'   => esc_html__( 'default: 100%', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_width',
            'value' => array(
                'default'   => '100',
                'min'       => '100',
                'max'       => '300',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Bottom Separator Height', 'ut_shortcodes' ),
            'description'   => esc_html__( '0 = default height of Separator', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_height',
            'value' => array(
                'default'   => '0',
                'min'       => '0',
                'max'       => '100',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide Bottom Separator on Tablet?', 'unitedthemes' ),
            'param_name' => 'section_separator_bottom_hide_on_tablet',
            'value' => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!', 'unitedthemes' ) => 'true'
            ),
            'std' => 'true',
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            ),
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Bottom Separator Width on Tablets', 'ut_shortcodes' ),
            'description'   => esc_html__( 'default: 100%', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_width_tablet',
            'value' => array(
                'default'   => '100',
                'min'       => '100',
                'max'       => '300',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_hide_on_tablet',
                'value_not_equal_to'  => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Bottom Separator Height on Tablets', 'ut_shortcodes' ),
            'description'   => esc_html__( '0 = default height of Separator', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_height_tablet',
            'value' => array(
                'default'   => '0',
                'min'       => '0',
                'max'       => '100',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_hide_on_tablet',
                'value_not_equal_to' => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide Bottom Separator on Mobile?', 'unitedthemes' ),
            'param_name' => 'section_separator_bottom_hide_on_mobile',
            'value' => array(
                esc_html__( 'no, thanks!', 'unitedthemes' ) => '',
                esc_html__( 'yes, please!', 'unitedthemes' ) => 'true'
            ),
            'std' => 'true',
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom',
                'value'     => array('true')
            ),
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Bottom Separator Width on Mobiles', 'ut_shortcodes' ),
            'description'   => esc_html__( 'default: 100%', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_width_mobile',
            'value' => array(
                'default'   => '100',
                'min'       => '100',
                'max'       => '300',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_hide_on_mobile',
                'value_not_equal_to' => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),
        
        array(
            'type'          => 'range_slider',
            'heading'       => esc_html__( 'Bottom Separator Height on Mobiles', 'ut_shortcodes' ),
            'description'   => esc_html__( '0 = default height of Separator', 'unitedthemes' ),
            'param_name'    => 'section_separator_bottom_height_mobile',
            'value' => array(
                'default'   => '0',
                'min'       => '0',
                'max'       => '100',
                'step'      => '1',
                'unit'      => '%'
            ),
            'group' => 'Separator',
            'dependency'    => array(
                'element'   => 'section_separator_bottom_hide_on_mobile',
                'value_not_equal_to' => array('true')
            ),
            'edit_field_class'  => 'vc_col-sm-6',
        ),                 
        
    );
    
}

// add to sections
vc_add_params( 'vc_section', _vc_add_section_seperator_settings_to_vc_section() );

/**
 * Add Responsive Settings
 *
 * @return    array
 *
 * @access    private
 * @since     4.4
 */

function _vc_add_responsive_settings_classes() {

    return array(

        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide on Desktop?', 'unitedthemes' ),
            'param_name' => 'hide_on_desktop',
            'value' => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' ) => 'true'
            ),
            'group' => 'Responsive Options'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide on Tablet?', 'unitedthemes' ),
            'param_name' => 'hide_on_tablet',
            'value' => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' ) => 'true'
            ),
            'group' => 'Responsive Options'
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Hide on Mobile?', 'unitedthemes' ),
            'param_name' => 'hide_on_mobile',
            'value' => array(
                esc_html__( 'off', 'unitedthemes' ) => '',
                esc_html__( 'on', 'unitedthemes' ) => 'true'
            ),
            'group' => 'Responsive Options'
        ),

    );

}

vc_add_params( 'vc_row', _vc_add_responsive_settings_classes() );
vc_add_params( 'vc_column', _vc_add_responsive_settings_classes() );
vc_add_params( 'vc_section', _vc_add_responsive_settings_classes() );
vc_add_params( 'vc_row_inner', _vc_add_responsive_settings_classes() );

/**
 * Enhance VC Media Grid
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_enhance_media_grid_gap() {
    
    return array(
        'type' => 'dropdown',
        'heading' => __( 'Gap', 'unitedthemes' ),
        'param_name' => 'gap',
        'value' => array(
            '0px'       => '0',
            '1px'       => '1',
            '2px'       => '2',
            '3px'       => '3',
            '4px'       => '4',
            '5px'       => '5',
            '10px'      => '10',
            '15px'      => '15',
            '20px'      => '20',
            '25px'      => '25',
            '30px'      => '30',
            '35px'      => '35',
            '40px'      => '40',
        ),
        'std' => '40',
        'description' => __( 'Select gap between grid elements.', 'unitedthemes' ),
        'edit_field_class' => 'vc_col-sm-6'
        
    );
    
}

vc_add_param( 'vc_media_grid', _vc_add_enhance_media_grid_gap() );

/* remove grid items */
vc_remove_param( 'vc_media_grid', 'item' );



function _vc_add_enhance_row_grid_gap() {
    
    return array(
        'type' => 'dropdown',
        'heading' => __( 'Gap', 'unitedthemes' ),
        'param_name' => 'gap',
        'value' => array(
            'Brooklyn Default Gap' => '0',
            '1px'         => '1',
            '2px'         => '2',
            '3px'         => '3',
            '4px'         => '4',
            '5px'         => '5',
            '10px'        => '10',
            '15px'        => '15',
            '20px'        => '20',
            '25px'        => '25',
            '30px'        => '30',
            '35px'        => '35',
            '40px'        => '40',
        ),
        'std' => '0',
        'description' => __( 'Select gap between grid elements.', 'unitedthemes' ),
        
    );
    
}

vc_add_param( 'vc_row', _vc_add_enhance_row_grid_gap() );
vc_add_param( 'vc_row_inner', _vc_add_enhance_row_grid_gap() );




/**
 * Enhance VC Empty Space
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_enhance_empty_space_height() {
    
    return array(
        'type'        => 'textfield',
        'heading'     => __( 'Height', 'js_composer' ),
        'param_name'  => 'height',
        'value'       => '40px',
        'admin_label' => true,
        'description' => __( 'Enter empty space height (Note: CSS measurement units allowed).', 'js_composer' ),
    );
    
}

vc_add_param( 'vc_empty_space', _vc_add_enhance_empty_space_height() );



/**
 * Enhance VC Media Gallery
 *
 * @return    array
 *
 * @access    private
 * @since     4.0.3
 */

function _vc_add_color_settings_to_vc_media_gallery() {
    
    return array(
        
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Arrow Color', 'unitedthemes' ),
            'param_name'    => 'arrow_color',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Arrow Hover Color', 'unitedthemes' ),
            'param_name'    => 'arrow_color_hover',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Dot Color', 'unitedthemes' ),
            'param_name'    => 'dot_color',
            'group'         => 'Colors'
        ),
        array(
            'type'          => 'colorpicker',
            'heading'       => esc_html__( 'Dot Color Active', 'unitedthemes' ),
            'param_name'    => 'dot_color_active',
            'group'         => 'Colors'
        )
    
    );

}

vc_add_params( 'vc_gallery', _vc_add_color_settings_to_vc_media_gallery() );


/**
 * Add Animation Settings to VC Column
 *
 * @return    array
 *
 * @access    private
 * @since     4.2.0
 */

// remove default animation param 
vc_remove_param( "vc_column", "css_animation" );

function _vc_add_animation_settings_to_vc_column() {
    
    return array (
        
       array(
            'type'              => 'animation_style',
            'heading'           => __( 'Animation Effect', 'unitedthemes' ),
            'description'       => __( 'Select animation effect.', 'unitedthemes' ),
            'group'             => 'Animation',
            'param_name'        => 'effect',
            'settings' => array(
                'type' => array(
                    'in',
                    'out',
                    'other',
                ),
            )
            
        ),
        
        array(
            'type'              => 'textfield',
            'heading'           => esc_html__( 'Animation Duration', 'unitedthemes' ),
            'description'       => esc_html__( 'Animation time in seconds  e.g. 1s', 'unitedthemes' ),
            'param_name'        => 'animation_duration',
            'group'             => 'Animation',
        ), 
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate Once?', 'unitedthemes' ),
            'description'       => esc_html__( 'Animate only once when reaching the viewport, animate everytime when reaching the viewport or make the animation infinite? By default the animation executes everytime when the element becomes visible in viewport, means when leaving the viewport the animation will be reseted and starts again when reaching the viewport again. By setting this option to yes, the animation executes exactly once. By setting it to infinite, the animation loops all the time, no matter if the element is in viewport or not.', 'unitedthemes' ),
            'param_name'        => 'animate_once',
            'group'             => 'Animation',
            'value'             => array(
                esc_html__( 'no' , 'unitedthemes' )      => 'no',
                esc_html__( 'yes', 'unitedthemes' )      => 'yes',
                esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
            )
        ), 
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate on Tablet?', 'unitedthemes' ),
            'param_name'        => 'animate_tablet',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Animate on Mobile?', 'unitedthemes' ),
            'param_name'        => 'animate_mobile',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'
            ),
        ),                            
        
        array(
            'type'              => 'dropdown',
            'heading'           => esc_html__( 'Delay Animation?', 'unitedthemes' ),
            'param_name'        => 'delay',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'value'             => array(
                esc_html__( 'no', 'unitedthemes' ) => 'false',
                esc_html__( 'yes'  , 'unitedthemes' ) => 'true'                                                                        
            )
        ),
        
        array(
            'type'              => 'textfield',
            'heading'           => esc_html__( 'Delay Timer', 'unitedthemes' ),
            'description'       => esc_html__( 'Time in milliseconds until the animation starts. e.g. 200', 'unitedthemes' ),
            'param_name'        => 'delay_timer',
            'group'             => 'Animation',
            'edit_field_class'  => 'vc_col-sm-6',
            'dependency'        => array(
                'element' => 'delay',
                'value'   => 'true',
            )
        ),   
    
    );

}

vc_add_params( 'vc_row', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_column', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_row_inner', _vc_add_animation_settings_to_vc_column() );
vc_add_params( 'vc_column_inner', _vc_add_animation_settings_to_vc_column() );

vc_remove_param( 'vc_row', 'css_animation' );
vc_remove_param( 'vc_section', 'css_animation' );