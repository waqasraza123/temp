<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

global $section_is_contact_section;

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */

$el_class = $full_height = $hide_on_desktop = $hide_on_tablet = $hide_on_mobile = $full_width = $flex_row = $columns_placement = $content_placement = $css = $el_id = $video_bg = $video_bg_url = $css_animation = '';
$disable_element = $output = $after_output = $video_background = '';
$gradient_background = $gradient_overlay_background = $needs_side_nav_spacing = false;

$section_separator_top = $section_separator_bottom = false;
$section_separator_svg_top = $section_separator_svg_bottom = 'design_wave';

$distortion = $background_distortion_1 = $background_distortion_2 = $distortion_ease = $distortion_speed_in = $distortion_speed_out = $distortion_intensity = '';
$distortion_effect = 1;

// parallax vars
$parallax_speed_video = ''; //@todo
$video_bg_parallax = ''; //@todo

$parallax = '';
$parallax_image = !empty( $atts['parallax_image'] ) ? $atts['parallax_image'] : ''; // fallback value
$parallax_speed = 1;
$parallax_direction = 'bottom';
$parallax_threshold = !empty( $atts['parallax_threshold'] ) ? $atts['parallax_threshold'] : '0'; // fallback value

// extract shortcode attributes
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

// disabled section
if ( 'yes' === $disable_element ) {
	
    if ( vc_is_page_editable() ) {
        
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
        
	} else {
		
        return ''; // do not return anything
        
	}
    
}

// real responsive 
if( unite_mobile_detection()->isTablet() && $hide_on_tablet ) {
    return ''; // do not return anything
} 

if( unite_mobile_detection()->isMobile() && $hide_on_mobile ) {
    return ''; // do not return anything
}

// enqueue needed script
wp_enqueue_script( 'wpb_composer_front_js' );

// setup classes array
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array( 'vc_section', $el_class );    

if( !is_singular("post") || $section_is_contact_section ) {
    $css_classes[] = 'ut-vc-' . ot_get_option( 'ut_section_spacing_system' , '80' );
}

if ( vc_shortcode_custom_css_has_property( $css, array( 'border', 'background' ) ) || $video_bg || $parallax || $bklyn_overlay || $section_separator_top || $section_separator_bottom || $distortion ) {
    
    $css_classes[] = 'vc_section-has-fill';    
    
} else {
    
    $css_classes[] = 'vc_section-has-no-fill';    
    
}

if( $distortion ) {
	
	$css_classes[] = 'ut-background-with-distortion-effect';
	
}


// unique ID for this section
if ( empty( $el_id ) ) {
    $el_id = uniqid("ut-section-");
}

// setup wrapper attributes array 
$wrapper_attributes   = array();
$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';

if ( ! empty( $full_width ) ) {
	
    $wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	
    if ( 'stretch_row_content' === $full_width ) {
        
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
        $needs_side_nav_spacing = true;
        
	}
    
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
    
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
}

if ( ! empty( $content_placement ) ) {
    $flex_row = true;
	$css_classes[] = 'vc_section-o-content-' . $content_placement;
}

if ( $flex_row ) {
	$css_classes[] = 'vc_section-flex';    
}


/**
 * Custom CSS
 */

$custom_css_style = '';
$section_custom_class = uniqid("ut-section-");

// push class into section class array
$css_classes[] = $section_custom_class;

// create settings array
if( !$parallax && !empty( $atts['css'] ) && ut_vc_css_to_array( $atts['css'] ) ) {
    
    $vc_css = ut_vc_css_to_array( $atts['css'] );
    
    if( isset( $vc_css["background-color"] ) ) {
        
        if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background-color"] ) ) {
            
            // add background image
            $custom_css_style .= ut_create_gradient_css( $vc_css["background-color"], '.' . $section_custom_class ); 
            
            // remove vc background color
            $vc_css = ut_clean_up_vc_css_array( $vc_css, 'background-color' );
            
        }         
        
    }
    
    // background with gradient and background image
    if( isset( $vc_css["background"] ) ) {
        
        if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background"] ) ) {
            
            // add background image
            $custom_css_style .= ut_create_gradient_css( $vc_css["background"], '.' . $section_custom_class, false, 'background' ); 
            
            // remove vc background
            unset( $vc_css['background'] );
            
        }         
        
    }    
    
    // remove image on mobile devices
    if( unite_mobile_detection()->isMobile() && $hide_bg_mobile ) {
        unset( $vc_css['background-image'] );
    }
    
    // remove image on tablet devices
    if( unite_mobile_detection()->isTablet() && $hide_bg_tablet ) {
        unset( $vc_css['background-image'] );
    }
    
    // custom background position
    if( $background_position ) {
        $vc_css['background-position'] = $background_position . ' !important;';     
    }
    
    // custom background attachment
    if( $background_attachment && !$parallax ) {
        $vc_css['background-attachment'] = $background_attachment . '!important;';
    }
    
    // re-assemble custom css
    $custom_css_style .= '#' . $el_id . '{' . implode_with_key( $vc_css ) . '}';
    
}


/**
 * Overlay Settings
 */

$overlay_style_id = uniqid("ut-section-overlay-");
$overlay_effect_id = uniqid("ut-section-overlay-effect-");
    
if( $bklyn_overlay && $bklyn_overlay_color ) {
    
    if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $bklyn_overlay_color ) ) {
        
        $custom_css_style .= ut_create_gradient_css( $bklyn_overlay_color, '#' . $overlay_style_id, ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : false ) );   
        $gradient_overlay_background = true;
        
    } else {
        
        $custom_css_style .= '#' . $overlay_style_id . '{ background-color: ' . $bklyn_overlay_color . ';}';
        
    }
    
}

if( $bklyn_overlay_pattern && !$gradient_overlay_background && 'bklyn-custom-pattern' == $bklyn_overlay_pattern_style && !empty( $bklyn_overlay_custom_pattern ) ) {
    
    $bklyn_overlay_custom_pattern = wp_get_attachment_url( $bklyn_overlay_custom_pattern );        
    $custom_css_style .= '#' . $overlay_style_id . '{ background-image: url( ' . esc_url( $bklyn_overlay_custom_pattern ) . '); }'; 
    
} 

if( $bklyn_overlay ) {
    
    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay';
    
}

if( $bklyn_overlay && $bklyn_overlay_effect ) {
    
	wp_enqueue_script( 'ut-particles-js' );
	
    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-overlay-effect';
	
	// $effect config
	$overlay_effect_config = ut_create_overlay_effect_settings( $atts );	
	
}


if( $section_separator_top || $section_separator_bottom ) {
    
    /* add parent css class */
    $css_classes[] = 'bklyn-section-with-separator';
    
}

/**
 * Parallax Background
 */

$parallax_css_style = '';

$parallax_speed_values = array(
    1  => 10,
    2  => 9,
    3  => 8,
    4  => 7,
    5  => 6,
    6  => 5,
    7  => 4,
    8  => 3,
    9  => 2,
    10 => 1
);

$parallax_id = uniqid("ut-parallax-");

if( $parallax ) {
    
    $parallax_image_src = ut_extract_custom_css_property( $css, 'background-image', true );
    
    // one time fallback to avoid empty output
    if( $parallax_image && empty( $parallax_image_src ) ) {
        $parallax_image_src = wp_get_attachment_image_url( $parallax_image, 'full' );
    }
    
    // no background image - check for gradient
    if( empty( $parallax_image_src ) && !empty( $atts['css'] ) && ut_vc_css_to_array( $atts['css'] ) ) {
    
        $vc_css = ut_vc_css_to_array( $atts['css'] );

        if( isset( $vc_css["background-color"] ) ) {

            if( function_exists("ut_create_gradient_css") && ut_create_gradient_css( $vc_css["background-color"] ) ) {

                // add background image
                $parallax_css_style .= ut_create_gradient_css( $vc_css["background-color"], '#' . $parallax_id ); 

            }         

        }
    
    }
    
    $parallax_css_style .= '#' . $parallax_id . '{ background-image: url( ' . esc_url( $parallax_image_src ) . ' ); }';
    $css_classes[]    = 'ut-parallax-section';
        
} 


/**
 * Section Background Video
*/

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) );

if ( $has_video_bg ) {
    
    if( class_exists('UT_Section_Video_player') ) {
        
        if( ut_video_is_vimeo( $video_bg_url ) ) {
            
            $video = new UT_Section_Video_player();
            
            $containment = $parallax ? '#' . $parallax_id : '#' . $el_id;
            
            $video_background = $video::handle_shortcode( array(
                'id'            => uniqid("ut-section-video"),
                'section'       => $containment,   
                'source'        => 'vimeo',
                'video_vimeo'   => esc_url( $video_bg_url ),
            ) );
            
            $css_classes[]    = 'ut-video-section';
            
        }
        
        if( ut_video_is_youtube( $video_bg_url ) ) {
            
            $video = new UT_Section_Video_player();
            
            $containment = $parallax ? '#' . $el_id . ' .parallax-scroll-container' : '#' . $el_id;
            
            $video_background = $video::handle_shortcode( array(
                'id'            => uniqid("ut-section-video"),
                'section'       => $containment,   
                'source'        => 'youtube',
                'video'         => esc_url( $video_bg_url ),
            ) );
            
            $css_classes[]    = 'ut-video-section';
            
        }        
    
    }
    
}


/**
 * Responsive Settings
 */

if( $hide_on_desktop ) {
    $css_classes[] = 'hide-on-desktop';
}

if( $hide_on_tablet ) {
    $css_classes[] = 'hide-on-tablet';
}

if( $hide_on_mobile ) {
    $css_classes[] = 'hide-on-mobile';
}

if( $hide_bg_medium ) {
    $css_classes[] = 'hide-bg-on-medium';
}

if( $hide_bg_tablet ) {
    $css_classes[] = 'hide-bg-on-tablet';
}

if( $hide_bg_mobile ) {
    $css_classes[] = 'hide-bg-on-mobile';
}


/**
 * Design and Custom CSS
 */
$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );

// attributes
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';



/**
 * Section Output
 */

$output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';

// section separator top
if( $section_separator_top ) {
    $output .= ut_create_section_separator( 'section', 'top', $section_separator_svg_top, $atts );
}

// attach video backrgound markup and script
$output .= $video_background;

// parallax scroll container
if( $parallax ) {
    
	$output .= '<div id="' . esc_attr( $parallax_id ) . '" data-parallax-' . $parallax_direction . ' data-parallax-factor="' . esc_attr( $parallax_speed_values[$parallax_speed] ) . '" class="parallax-scroll-container parallax-scroll-container-hide">';
		
		// Background Distortion
		if( $distortion && $parallax ) {

			// Start Class
			$distortion = new UT_Distortion_Background( $atts );

			// Set Images
			$distortion->set_default_image( $background_distortion_1 );
			$distortion->set_hover_image( $background_distortion_2 );

			// Set Effect
			$distortion->set_effect( $distortion_effect );

			$output .= $distortion->html();

		}	
	
	$output .= '</div>';
	
}

// hidden anchor for menu links
if( !empty( $bklyn_section_anchor_id ) ) { 
    $output .= '<a class="ut-vc-offset-anchor-top" id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';        
}

// extra container if navigation and header are located to the left
if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing ) {
    $output .= '<div class="vc-sidenav-column-container-wrap">';
}

// section content
$output .= wpb_js_remove_wpautop( $content );

// extra container if navigation and header are located to the left
if( function_exists('ut_return_header_config') && ut_return_header_config( 'ut_header_layout', 'default' ) == 'side' && $needs_side_nav_spacing ) {
    $output .= '</div>';
}    

// hidden anchor for menu links
if( !empty( $bklyn_section_anchor_id ) ) {    
    $output .= '<a class="ut-vc-offset-anchor-bottom" id="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'" name="section-' . ut_create_slug( $bklyn_section_anchor_id ) .'">' . $bklyn_section_anchor_id .'</a>';        
}

// custom css
if( !empty( $custom_css_style ) || !empty( $parallax_css_style ) ) {
    $output .= '<style type="text/css" scoped>' . $custom_css_style . ' ' . $parallax_css_style . '</style>';
}

// section overlay
if( $bklyn_overlay ) {
    
	$output .= '<div id="' . $overlay_style_id . '" class="bklyn-overlay ' . ( $bklyn_overlay_pattern ? $bklyn_overlay_pattern_style : '' ) . '">';
	
		if( $bklyn_overlay_effect ) {
		
			$output .= '<div id="' . $overlay_effect_id . '" class="bklyn-overlay-effect" data-effect-config=\'' . json_encode( $overlay_effect_config ) . '\'></div>';	
			
		}
	
	$output .= '</div>';
	
}

// Background Distortion
if( $distortion && !$parallax ) {
	
	// Start Class
	$distortion = new UT_Distortion_Background( $atts );
	
	// Set Images
	$distortion->set_default_image( $background_distortion_1 );
	$distortion->set_hover_image( $background_distortion_2 );
		
	// Set Effect
	$distortion->set_effect( $distortion_effect );
	
	$output .= $distortion->html();
	
}

// section separator bottom
if( $section_separator_bottom ) {
    $output .= ut_create_section_separator( 'section', 'bottom', $section_separator_svg_bottom, $atts );
}


$output .= '</section>';
$output .= $after_output;

echo $output;
