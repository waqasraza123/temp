<?php


/*
 * Datepicker Param
 *
 * since 4.6
 * version 1.0
 */

if ( ! class_exists( 'UT_Datepicker_Param' ) ) {
    
    class UT_Datepicker_Param {
        
        /**
         * @var array
         */
        protected $settings = array();
        
        
        /**
         * @var string
         */
        protected $value = '';
        
        
        function __construct( $settings, $value ) {
            
            $this->settings = $this->settings( $settings );            
            $this->value    = $this->value( $value );
            
        }
        
        /**
         * Settings
         *
         * @param null $settings
         *
         * @return array
         */
        function settings( $settings = null ) {
            
            if ( is_array( $settings ) ) {
                $this->settings = $settings;
            }

            return $this->settings;
            
        }
        
        /**
         * @param null $value
         *
         * @return string
         */
        function value( $value = null ) {
            
            if ( is_string( $value ) ) {
                $this->value = $value;
            }

            return $this->value;
            
        }
        
        
        function render() {
            
            $out = '<div class="ut-datetimepicker-wrap">';
            
                $out .= '<input name="' . esc_attr( $this->settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ut-datetimepicker ' . esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) . '_field" type="text" value="' . esc_attr( $this->value ) . '" />';
                
            $out .= '</div>';
            
            return $out;                        
        
        }        
        
    }

}

/**
 * Datepicker
 *
 * @param $settings
 * @param $value
 *
 * @return mixed|void
 */
function ut_add_vc_datepicker_param_type( $settings, $value ) {
    
    $section_anchor = new UT_Datepicker_Param( $settings, $value );
    return $section_anchor->render();

}

if( defined( 'WPB_VC_VERSION' ) ) {

    vc_add_shortcode_param( 
        'datepicker', 
        'ut_add_vc_datepicker_param_type', 
        UT_SHORTCODES_URL . '/vc/admin/assets/vc_extend/datepicker.js' 
    );

}



/*
 * IFrame Textarea with URL extraction
 *
 * since 4.5
 * version 1.0
 */

if ( ! class_exists( 'UT_Iframe_Param' ) ) {
    
    class UT_Iframe_Param {
        
        /**
         * @var array
         */
        protected $settings = array();
        
        
        /**
         * @var string
         */
        protected $value = '';
        
        
        function __construct( $settings, $value ) {
            
            $this->settings = $this->settings( $settings );            
            $this->value    = $this->value( $value );
            
        }
        
        /**
         * Settings
         *
         * @param null $settings
         *
         * @return array
         */
        function settings( $settings = null ) {
            
            if ( is_array( $settings ) ) {
                $this->settings = $settings;
            }

            return $this->settings;
            
        }
        
        /**
         * @param null $value
         *
         * @return string
         */
        function value( $value = null ) {
            
            if ( is_string( $value ) ) {
                $this->value = $value;
            }

            return $this->value;
            
        }
        
        function render() {
            
            $out = '<div class="ut-iframe">';
                
                $out .= '<textarea name="' . esc_attr( $this->settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textarea textarea ut-iframe-input ' . esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) . '_field" value="' . esc_attr( $this->value ) . '">' . esc_attr( $this->value ) . '</textarea>';               
            
            $out .= '</div>';
            
            return $out;
                        
        
        }
        
            
    }

}


/**
 * @param $settings
 * @param $value
 *
 * @return mixed|void
 */
function ut_add_vc_iframe_param_type( $settings, $value ) {
    
    $section_anchor = new UT_Iframe_Param( $settings, $value );
    return $section_anchor->render();

}

if( defined( 'WPB_VC_VERSION' ) ) {

    vc_add_shortcode_param( 
        'iframe', 
        'ut_add_vc_iframe_param_type', 
        UT_SHORTCODES_URL . '/vc/admin/assets/vc_extend/utifroption.js' 
    );

}


/*
 * Gradfent Color Picker
 *
 * since 4.5.4
 * version 1.0
 */

if ( ! class_exists( 'UT_Gradient_Picker' ) ) {

    class UT_Gradient_Picker {
        
        /**
         * @var array
         */
        protected $settings = array();
        
        /**
         * @var string
         */
        protected $value = '';
        
        function __construct( $settings, $value ) {
            
            $this->settings = $this->settings( $settings );            
            $this->value    = $this->value( $value );
            
        }
        
        /**
         * Settings
         *
         * @param null $settings
         *
         * @return array
         */
        function settings( $settings = null ) {
            
            if ( is_array( $settings ) ) {
                $this->settings = $settings;
            }

            return $this->settings;
            
        }
        
        /**
         * @param null $value
         *
         * @return string
         */
        function value( $value = null ) {
            
            if ( is_string( $value ) ) {
                $this->value = $value;
            }

            return $this->value;
            
        }
        
        
        function render() {
        
            $out = '<input name="' . esc_attr( $this->settings['param_name'] ) . '" data-mode="gradient" class="wpb_vc_param_value wpb-textinput ut-gradient-picker ' . esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) . '_field" type="text" value="' . esc_attr( $this->value ) . '" />';           
        
            return $out;
            
        }
        
    }

}

/**
 * @param $settings
 * @param $value
 *
 * @return mixed|void
 */
function ut_add_vc_gradient_picker_param_type( $settings, $value ) {
    
    $gradient_picker = new UT_Gradient_Picker( $settings, $value );
    return $gradient_picker->render();

}

vc_add_shortcode_param( 
    'gradient_picker', 
    'ut_add_vc_gradient_picker_param_type', 
    UT_SHORTCODES_URL . '/vc/admin/assets/vc_extend/gradient-picker.js' 
);


/*
 * Section Anchor Creator
 *
 * since 4.2.3
 * version 1.0
 */

if ( ! class_exists( 'UT_Section_Anchor_Param' ) ) {

    class UT_Section_Anchor_Param {
        
        /**
         * @var array
         */
        protected $settings = array();
        
        /**
         * @var string
         */
        protected $value = '';
        
        function __construct( $settings, $value ) {
            
            $this->settings = $this->settings( $settings );            
            $this->value    = $this->value( $value );
            
        }
        
        /**
         * Settings
         *
         * @param null $settings
         *
         * @return array
         */
        function settings( $settings = null ) {
            
            if ( is_array( $settings ) ) {
                $this->settings = $settings;
            }

            return $this->settings;
            
        }
        
        /**
         * @param null $value
         *
         * @return string
         */
        function value( $value = null ) {
            
            if ( is_string( $value ) ) {
                $this->value = $value;
            }

            return $this->value;
            
        }
        
        function render() {
            
            $out = '<div class="ut-section-anchor-wrap">';
                    
                $out .= '<input name="' . esc_attr( $this->settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ut-section-anchor-input ' . esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) . '_field" type="text" value="' . esc_attr( $this->value ) . '" />';           
                
                $out .= '<span class="vc_description vc_description_top vc_clearfix">' . esc_html__( 'This is your final custom link. ', 'ut_shortcodes' ) . '</span>';
                
                $out .= '<div class="clear"></div>';
                
                $out .= '<code class="ut-url-code"><span class="ut-url"></span><span class="ut-section-id"></span></code>';
                
                $out .= '<span class="vc_description vc_clearfix">' . sprintf( esc_html__( 'You can copy this URL and manually add it as a custom link to the themes primary navigation or a custom link such as a button or any other element which supports links. By using the button below, the system will add the menu item program automatically to the themes primary navigation. Afterwards you simply need to re order the item. If you are using the custom link on a button, please copy the link, add it to the desired element and additionally add the following CSS class to it: %s', 'ut_shortcodes' ), '<strong>ut-scroll-to-section</strong>' ) . '</span>';
                
                $out .= '<div class="clear"></div>';
                
                $out .= '<button class="ut-add-anchor-section ut-ui-button" rel="" title="' . __( 'Add to menu', 'ut_shortcodes' ) . '">' . __( 'Add to menu', 'ut_shortcodes' ) . '</button>';
                                
            $out .= '</div>';
            
            return $out;
       
        }               
            
    }

}

/**
 * @param $settings
 * @param $value
 *
 * @return mixed|void
 */
function ut_add_vc_section_anchor_param_type( $settings, $value ) {
    
    $section_anchor = new UT_Section_Anchor_Param( $settings, $value );
    return $section_anchor->render();

}

vc_add_shortcode_param( 
    'section_anchor', 
    'ut_add_vc_section_anchor_param_type', 
    UT_SHORTCODES_URL . '/vc/admin/assets/vc_extend/section-anchor.js' 
);

/*
 * Ajax Request for Section Anchor
 *
 * since 4.2.3
 * version 1.0
 */

function ut_save_anchor_to_menu() {
            
    if( !current_user_can('edit_posts') ) {
        return;    
    }
    
    $menu_locations = get_nav_menu_locations();
    
    if( !empty( $menu_locations['primary'] ) ) {
        
        $title  = $_POST['title'];
        $url    = esc_url( $_POST['url'] );
        
        if( !empty( $title ) && !empty( $url ) ) {
        
            wp_update_nav_menu_item( 
                $menu_locations['primary'], 0, 
                array(
                    'menu-item-title'   =>  $title,
                    'menu-item-url'     =>  $url, 
                    'menu-item-status'  => 'publish'
                )
            );
            
            echo 'item_added';
            
        } else {
            
            echo 'error';
            
        }
        
    } else {
        
        echo 'no_menu';        
    
    }
                    
    exit;

}

add_action( 'wp_ajax_save_section_anchor', 'ut_save_anchor_to_menu' );


/*
 * Range Slider 
 *
 * since 4.0
 * version 1.0
 */

if( !function_exists('ut_add_vc_range_slider_param_type') ) :

    function ut_add_vc_range_slider_param_type( $settings, $value ) {
                
        $value = empty( $value ) && $value != 0 ? 0 : $value;
        
        if( is_array( $value ) && !empty( $value ) ) {            
            $value = $value["default"];
        }
		
		// do not allow values lower than min
		if( $value < $settings['value']['min'] ) {
			$value = $value["default"];
		}
		
		// do not allows values larger than max
		if( $value > $settings['value']['max'] ) {
			$value = $value["default"];
		}
		
		
        // mabye the field value was stored with a unit such as px
        $value = str_replace("px","", $value);
		$value = str_replace("em","", $value);
		$value = str_replace("%","", $value);
		
		
        $out = '<div class="ut_range_slider_block">'; 
			
            $out .= '<div class="ut-range-slider-wrap">';
                
                $out .= '<div data-value="' . $value . '" data-min="' . esc_attr( $settings['value']['min'] ) . '" data-max="' . esc_attr( $settings['value']['max'] ) . '" data-step="' . esc_attr( $settings['value']['step'] ) . '" data-for="ut_range_slider_' . esc_attr( $settings['param_name'] ) . '" class="ut-range-slider"></div>';
                $out .= '<span data-unit="' . esc_attr( $settings['value']['unit'] ) . '" class="ut-range-value">' . esc_attr( $value ) . '</span>';
                $out .= '<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' . esc_attr( $settings['param_name'] ) . ' ' . esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" />';
            
            $out .= '</div>'; 
                
        $out .= '</div>'; 
        
        return $out; 
        
    }    
    
    vc_add_shortcode_param( 'range_slider', 'ut_add_vc_range_slider_param_type', UT_SHORTCODES_URL . '/vc/admin/assets/vc_extend/range-slider.js' );

endif;


/*
 * United Themes CSS Editor
 *
 * since 4.2
 * version 1.0
 */


if ( ! class_exists( 'UT_CSS_Editor' ) ) {

    class UT_CSS_Editor {
        
        /**
         * @var array
         */
        protected $settings = array();
        
        /**
         * @var string
         */
        protected $value = '';
        
        /**
         * @var array
         */
        protected $layers = array( 'margin', 'padding', 'content' );
        
        /**
         * @var array
         */
        protected $positions = array( 'top', 'right', 'bottom', 'left' );
        
        /**
         *
         */
        function __construct() {
        
        
        }

        /**
         * Setters/Getters {{
         *
         * @param null $settings
         *
         * @return array
         */
        function settings( $settings = null ) {
            
            if ( is_array( $settings ) ) {
                $this->settings = $settings;
            }

            return $this->settings;
            
        }
        
        /**
         * @param $key
         *
         * @return string
         */
        function setting( $key ) {
            
            return isset( $this->settings[ $key ] ) ? $this->settings[ $key ] : '';
            
        }

        /**
         * @param null $value
         *
         * @return string
         */
        function value( $value = null ) {
            
            if ( is_string( $value ) ) {
                $this->value = $value;
            }

            return $this->value;
            
        }

        /**
         * @param null $values
         *
         * @return array
         */
        function params( $values = null ) {
            
            if ( is_array( $values ) ) {
                $this->params = $values;
            }

            return $this->params;
            
        }
        
        /**
         * 
         * @return mixed|void
         */
        function render() {
            
            $out  = '<div class="vc_css-editor vc_row vc_ui-flex-row ut-css-editor">';
                
                $out .= '<input id="ut-css-editor" name="' . esc_attr( $this->settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' . esc_attr( $this->settings['param_name'] ) . ' ' . esc_attr( $this->settings['type'] ) . '_field" type="hidden" value="' . esc_attr( $this->value ) . '" />';
                
                $out .= '<div class="vc_layout-onion vc_col-xs-7">';
                    
                    $out .= '<div class="vc_margin">' . $this->layerControls( 'margin' );
                        
                        $out .= '<div class="vc_padding">' . $this->layerControls( 'padding' );
                        
                            $out .= '<div class="vc_content"></div>';
                        
                        $out .= '</div>';
                    
                    $out .= '</div>';
                    
                $out .= '</div>';
        
            $out .= '</div>';
            
            return $out;
        
        }
        
        /**
         * @param $name
         * @param string $prefix
         *
         * @return string
         */
        protected function layerControls( $name, $prefix = '' ) {

            $output = '<label>' . $name . '</label>';

            foreach ( $this->positions as $pos ) {
                
                $output .= '<input type="text" name="' . $name . '_' . $pos . ( '' !== $prefix ? '_' . $prefix : '' ) . '" data-name="' . $name . ( '' !== $prefix ? '-' . $prefix : '' ) . '-' . $pos . '" class="vc_' . $pos . ' ut-css-editor-field" placeholder="-" data-attribute="' . $name . '-' . $pos . '" value="">';
                
            }

            return $output;
            
        }

    }

}
             

/**
 * @param $settings
 * @param $value
 *
 * @return mixed|void
 */
function ut_vc_css_editor_form_field( $settings, $value ) {
    
    $css_editor = new UT_CSS_Editor();
    $css_editor->settings( $settings );
    $css_editor->value( $value );

    return $css_editor->render();

}

vc_add_shortcode_param( 
    'ut_css_editor', 
    'ut_vc_css_editor_form_field',
    UT_SHORTCODES_URL . '/vc/admin/assets/vc_extend/spacing.js'
);



/**
 * Brooklyn Icon Font
 * @return array
 * since 5.0
 */

if( !function_exists('ut_vc_register_brooklyn_icon_font') ) {
    
    function ut_vc_register_brooklyn_icon_font( $icons ) {
        
        $bklyn_icons = array( array("BklynIcons-Right-6"=>"Right-6"),
            array("BklynIcons-Gallery-1"=>"Gallery-1"),
            array("BklynIcons-by4-Hour"=>"by4-Hour"),
            array("BklynIcons-Addon"=>"Addon"),
            array("BklynIcons-Addon-Setting"=>"Addon-Setting"),
            array("BklynIcons-Angry-Birds"=>"Angry-Birds"),
            array("BklynIcons-Application"=>"Application"),
            array("BklynIcons-Atom"=>"Atom"),
            array("BklynIcons-Bad-3"=>"Bad-3"),
            array("BklynIcons-Blend-Tool"=>"Blend-Tool"),
            array("BklynIcons-Block-Chart-2"=>"Block-Chart-2"),
            array("BklynIcons-Box-1"=>"Box-1"),
            array("BklynIcons-Busy-1"=>"Busy-1"),
            array("BklynIcons-Camera-Rear"=>"Camera-Rear"),
            array("BklynIcons-Cash-Pay"=>"Cash-Pay"),
            array("BklynIcons-Circle"=>"Circle"),
            array("BklynIcons-Clean-Code"=>"Clean-Code"),
            array("BklynIcons-Clipboard-Write"=>"Clipboard-Write"),
            array("BklynIcons-Clock-1"=>"Clock-1"),
            array("BklynIcons-Cloud-Database"=>"Cloud-Database"),
            array("BklynIcons-Cloud-Server-1"=>"Cloud-Server-1"),
            array("BklynIcons-Compas-Rose"=>"Compas-Rose"),
            array("BklynIcons-Compass-2"=>"Compass-2"),
            array("BklynIcons-Computer-Network-2"=>"Computer-Network-2"),
            array("BklynIcons-Computer-Sync"=>"Computer-Sync"),
            array("BklynIcons-Cube-3"=>"Cube-3"),
            array("BklynIcons-Cup-2"=>"Cup-2"),
            array("BklynIcons-Delivery"=>"Delivery"),
            array("BklynIcons-Diamond"=>"Diamond"),
            array("BklynIcons-Digital-Design"=>"Digital-Design"),
            array("BklynIcons-Disabled-man"=>"Disabled-man"),
            array("BklynIcons-Distance-1"=>"Distance-1"),
            array("BklynIcons-Down-2"=>"Down-2"),
            array("BklynIcons-Down-3"=>"Down-3"),
            array("BklynIcons-Download"=>"Download"),
            array("BklynIcons-Enlarge"=>"Enlarge"),
            array("BklynIcons-Ethernet"=>"Ethernet"),
            array("BklynIcons-Financial-Care-2"=>"Financial-Care-2"),
            array("BklynIcons-First-ad"=>"First-ad"),
            array("BklynIcons-Flying-Rocket"=>"Flying-Rocket"),
            array("BklynIcons-Free-Tag-2"=>"Free-Tag-2"),
            array("BklynIcons-French-Fries"=>"French-Fries"),
            array("BklynIcons-Gas-Pump"=>"Gas-Pump"),
            array("BklynIcons-Gear-1"=>"Gear-1"),
            array("BklynIcons-Hamburger"=>"Hamburger"),
            array("BklynIcons-Hand-cargo"=>"Hand-cargo"),
            array("BklynIcons-Handshake"=>"Handshake"),
            array("BklynIcons-Hat-3"=>"Hat-3"),
            array("BklynIcons-Hearts-Empty"=>"Hearts-Empty"),
            array("BklynIcons-Hotspot-Mobile"=>"Hotspot-Mobile"),
            array("BklynIcons-Increasing-Chart-1"=>"Increasing-Chart-1"),
            array("BklynIcons-Lamp-2"=>"Lamp-2"),
            array("BklynIcons-Lamp-3"=>"Lamp-3"),
            array("BklynIcons-Laptop-1"=>"Laptop-1"),
            array("BklynIcons-Left-2"=>"Left-2"),
            array("BklynIcons-Left-3"=>"Left-3"),
            array("BklynIcons-Lens-1"=>"Lens-1"),
            array("BklynIcons-Light-Bulb"=>"Light-Bulb"),
            array("BklynIcons-Line-Chart-1"=>"Line-Chart-1"),
            array("BklynIcons-Map-Pin-2"=>"Map-Pin-2"),
            array("BklynIcons-Map-pin-6"=>"Map-pin-6"),
            array("BklynIcons-Maximize-3"=>"Maximize-3"),
            array("BklynIcons-Medic"=>"Medic"),
            array("BklynIcons-Minimize-1"=>"Minimize-1"),
            array("BklynIcons-Monitor-1"=>"Monitor-1"),
            array("BklynIcons-Mustache-1"=>"Mustache-1"),
            array("BklynIcons-Navigation-1"=>"Navigation-1"),
            array("BklynIcons-Office-Chair"=>"Office-Chair"),
            array("BklynIcons-Office-Desk-2"=>"Office-Desk-2"),
            array("BklynIcons-Paint-Bucket"=>"Paint-Bucket"),
            array("BklynIcons-Paper-Clip-3"=>"Paper-Clip-3"),
            array("BklynIcons-Party-Glasses"=>"Party-Glasses"),
            array("BklynIcons-Pen-Holder"=>"Pen-Holder"),
            array("BklynIcons-Pie-Chart-1"=>"Pie-Chart-1"),
            array("BklynIcons-Pin"=>"Pin"),
            array("BklynIcons-Pizza-Slice"=>"Pizza-Slice"),
            array("BklynIcons-Plugin"=>"Plugin"),
            array("BklynIcons-Pokemon"=>"Pokemon"),
            array("BklynIcons-Reduce"=>"Reduce"),
            array("BklynIcons-Responsive-Design"=>"Responsive-Design"),
            array("BklynIcons-Right-2"=>"Right-2"),
            array("BklynIcons-Right-3"=>"Right-3"),
            array("BklynIcons-Rocket-Launch"=>"Rocket-Launch"),
            array("BklynIcons-Rotate-2"=>"Rotate-2"),
            array("BklynIcons-Ruler-Tool"=>"Ruler-Tool"),
            array("BklynIcons-Sailboat"=>"Sailboat"),
            array("BklynIcons-Sandwich"=>"Sandwich"),
            array("BklynIcons-Saturn"=>"Saturn"),
            array("BklynIcons-Scale-Tool"=>"Scale-Tool"),
            array("BklynIcons-Screen-Rotation"=>"Screen-Rotation"),
            array("BklynIcons-Search"=>"Search"),
            array("BklynIcons-Selection-Tool"=>"Selection-Tool"),
            array("BklynIcons-Share-File-1"=>"Share-File-1"),
            array("BklynIcons-Shoe-2"=>"Shoe-2"),
            array("BklynIcons-Smart-Devices"=>"Smart-Devices"),
            array("BklynIcons-Smartphone"=>"Smartphone"),
            array("BklynIcons-Smartwatch-EKG-1"=>"Smartwatch-EKG-1"),
            array("BklynIcons-Stormtrooper-2"=>"Stormtrooper-2"),
            array("BklynIcons-Tablet-1"=>"Tablet-1"),
            array("BklynIcons-Telescope"=>"Telescope"),
            array("BklynIcons-Tempometer"=>"Tempometer"),
            array("BklynIcons-Test-Flusk-1"=>"Test-Flusk-1"),
            array("BklynIcons-Text-box"=>"Text-box"),
            array("BklynIcons-Theme"=>"Theme"),
            array("BklynIcons-Umbrella"=>"Umbrella"),
            array("BklynIcons-Up-2"=>"Up-2"),
            array("BklynIcons-Up-3"=>"Up-3"),
            array("BklynIcons-Upload"=>"Upload"),
            array("BklynIcons-Waiting-room"=>"Waiting-room"),
            array("BklynIcons-Worms-Armagedon"=>"Worms-Armagedon"),
            );
        
        return array_merge( $icons, $bklyn_icons );
        
    }
    
    add_filter( 'vc_iconpicker-type-bklynicons', 'ut_vc_register_brooklyn_icon_font' );

}


function ut_brooklyn_icon_register_css() {
    
    wp_register_style( 
        'ut-bklynicons', 
        UT_SHORTCODES_URL . 'css/bklynicons/bklynicons.css'
    );

}

add_action( 'vc_base_register_admin_css', 'ut_brooklyn_icon_register_css' );
add_action( 'vc_base_register_front_css', 'ut_brooklyn_icon_register_css' );


if( !function_exists('ut_enqueue_brooklyn_icon_font') ) {
    
    function ut_enqueue_brooklyn_icon_font( $icons ) {
        
        wp_enqueue_style( 'ut-bklynicons' );
        
    }

    add_action( 'vc_backend_editor_enqueue_js_css', 'ut_enqueue_brooklyn_icon_font' );
    add_action( 'vc_enqueue_font_icon_element', 'ut_enqueue_brooklyn_icon_font' );
    add_action( 'wp_enqueue_scripts', 'ut_enqueue_brooklyn_icon_font' );

}




/*
 * Array of available Showcases
 *
 * since 4.4.6
 * version 1.0
 *
 */

if ( !function_exists( 'ut_get_mailchimp_forms' ) ) {
    
    function ut_get_mailchimp_forms() {
        
        if( function_exists('mc4wp_get_forms') ) {
            
            $forms = mc4wp_get_forms();
            $vc    = array();
            
            if( $forms ) {
                
                $vc[esc_html__('Select MailChimp Form', 'ut_shortcodes')] = '';
                
                foreach( $forms as $form ) {
                    
                    $vc[$form->name] = $form->ID;
                        
                }
            
            }
            
            return $vc;
        
        } else {
            
            return array( esc_html__( 'Requires: Mailchimp for WordPress Plugin', 'ut_shortcodes' )  => '' );
            
        }
                
    }

}

/*
 * Array of available Showcases
 *
 * since 4.4.6
 * version 1.0
 */

if ( !function_exists( 'ut_get_showcases' ) ) {
    
    function ut_get_showcases() {
        
        $showcases = get_posts( array(
            'posts_per_page'   => -1,
            'post_type'        => 'portfolio-manager',
            'post_status'      => 'publish',
        ) );
        
        $showcases_array = array(
            esc_html__( 'Select Showcase', 'ut_shortcodes' )  => ''
        );
        
        foreach( $showcases as $key => $showcase ) {
            
            $showcases_array[$showcase->post_title] = $showcase->ID;
        
        }
        
        return $showcases_array;
                
    }

}


/*
 * Get Default Font Settings
 *
 * since 4.4.5
 * version 1.0
 */

if ( !function_exists( 'ut_get_theme_options_font_setting' ) ) {
    
    function ut_get_theme_options_font_setting( $element, $attribute, $fallback = NULL ) {
        
        if( function_exists('ot_get_option') ) {
            
            $settings = array(
                
                'h2'                => array(
                    'font-setting'         => ot_get_option('ut_h2_font_setting' ),
                ),
                
                'h3'                => array(
                    'font-setting'         => ot_get_option('ut_h3_font_setting' ),
                ),
                
                'header_title'      => array(
                    'font-setting'         => ot_get_option('ut_global_headline_font_setting' ),
                ),            
                
                'header_lead'       => array(
                    'font-setting'         => ot_get_option('ut_global_lead_font_setting' ),
                ),
            
            );
        
        } else {
            
            return $fallback;
        
        }
        
        // section title can have different sources
        if( $element == 'section_title' ) {
            
            $font_source = ot_get_option('ut_global_headline_font_type' );
            
            if( $font_source == 'ut-google' ) {
                
                $settings['section_title']['font-setting'] = ot_get_option('ut_global_google_headline_font_style' );    
                
            } elseif( $font_source == 'ut-websafe' ) {
                
                $settings['section_title']['font-setting'] = ot_get_option('ut_global_headline_websafe_font_style_settings' );
                
            } elseif( $font_source == 'ut-font' ) {
                
                $settings['section_title']['font-setting'] = ot_get_option('ut_global_headline_font_style_settings' );
                
            }
            
            
        }
        
        // Body Font can have different sources
        if( $element == 'body_font' ) {
            
            $font_source = ot_get_option('ut_body_font_type' );
            
            if( $font_source == 'ut-google' ) {
                
                $settings['body_font']['font-setting'] = ot_get_option('ut_google_body_font_style' );    
                
            } elseif( $font_source == 'ut-websafe' ) {
                
                $settings['body_font']['font-setting'] = ot_get_option('ut_body_websafe_font_style' );
                
            } elseif( $font_source == 'ut-font' ) {
                
                $settings['body_font']['font-setting'] = ot_get_option('ut_body_font_style' );
                
            }
            
            
        }
        
        
        if( !empty( $settings[$element]['font-setting'][$attribute] ) ) {
    
            return preg_replace("/[^0-9]/","", $settings[$element]['font-setting'][$attribute] );
            
        } else {
            
            return $fallback;
            
        }
        
    }

}


/*
 * Array of available Animation Mapping Settings
 *
 * since 4.3
 * version 1.0
 */

if ( !function_exists( '_vc_add_animation_settings' ) ) {
    
    function _vc_add_animation_settings() {
        
        return array(
        
            array(
                'type'              => 'animation_style',
                'heading'           => __( 'Animation Effect', 'ut_shortcodes' ),
                'description'       => __( 'Select image animation effect.', 'ut_shortcodes' ),
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
                    esc_html__( 'yes', 'unitedthemes' ) => 'yes',
                    esc_html__( 'no' , 'unitedthemes' ) => 'no',
                    esc_html__( 'infinite', 'unitedthemes' ) => 'infinite',
                )
            ),  

            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Animate Image on Tablet?', 'ut_shortcodes' ),
                'param_name'        => 'animate_tablet',
                'group'             => 'Animation',
                'edit_field_class'  => 'vc_col-sm-6',
                'value'             => array(
                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'
                ),
            ),

            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Animate Image on Mobile?', 'ut_shortcodes' ),
                'param_name'        => 'animate_mobile',
                'group'             => 'Animation',
                'edit_field_class'  => 'vc_col-sm-6',
                'value'             => array(
                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'
                ),
            ),                            

            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Delay Animation?', 'ut_shortcodes' ),
                'description'       => esc_html__( 'Time in milliseconds until the image appears. e.g. 200', 'ut_shortcodes' ),
                'param_name'        => 'delay',
                'group'             => 'Animation',
                'edit_field_class'  => 'vc_col-sm-6',
                'value'             => array(
                    esc_html__( 'no', 'ut_shortcodes' ) => 'false',
                    esc_html__( 'yes'  , 'ut_shortcodes' ) => 'true'                                                                        
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
                    'element' => 'delay',
                    'value'   => 'true',
                )
            ), 
            
        );
                
    }

}


/*
 * Array of available Contact Form 7 Forms
 *
 * since 4.6
 * version 1.0
 */

if ( !function_exists( 'ut_get_c7_forms' ) ) {
    
    function ut_get_c7_forms() {
        
        if( class_exists('WPCF7_ContactForm') ) {
            
            $forms = get_posts( array(
                'posts_per_page'   => -1,
                'post_type'        => 'wpcf7_contact_form',
                'post_status'      => 'publish',
            ) );
            
            $forms_array = array(
                esc_html__( 'Select Contact Form 7', 'ut_shortcodes' )  => ''
            );
            
            foreach( $forms as $key => $form ) {
                
                $forms_array[$form->post_title] = $form->ID;
            
            }
            
            return $forms_array;
        
        } else {
            
            return array( esc_html__( 'Requires: Contact Form 7 Plugin', 'ut_shortcodes' )  => '' );
            
        }
                
    }

}


/*
 * Array of available Custom Fonts
 *
 * since 4.6.3
 * version 1.0
 */

if ( !function_exists( 'ut_get_custom_fonts' ) ) {
    
    function ut_get_custom_fonts() {
            
		$taxonomies = get_terms( array( 'hide_empty' => false, 'taxonomy' => 'unite_custom_fonts' ) );
		
		$fonts_array = array(
			esc_html__( 'Select Custom Font', 'ut_shortcodes' )  => ''
		);
		
		if ( $taxonomies ) {
		
			foreach( $taxonomies as $key => $taxonomy ) {
				
				$fonts_array[$taxonomy->name] = $taxonomy->term_id;

			}

		}
		
		return $fonts_array;
                
    }

}

/*
 * Array of available Contact Blocks
 *
 * since 4.6.1
 * version 1.0
 */

if ( !function_exists( 'ut_get_content_blocks' ) ) {
    
    function ut_get_content_blocks() {
            
		$content_blocks = get_posts( array(
			'posts_per_page'   => -1,
			'post_type'        => 'ut-content-block',
			'post_status'      => 'publish',
		) );

		$block_array = array(
			esc_html__( 'Select Content Block', 'ut_shortcodes' )  => ''
		);
		
		if( $content_blocks ) {
		
			foreach( $content_blocks as $key => $block ) {

				$block_array[$block->post_title] = $block->ID;

			}

		}
			
		return $block_array;        
                
    }

}

/*
 * Sort Add Element
 *
 * since 4.6
 * version 1.0
 */

if ( !function_exists( '_ut_sort_vc_add_new_elements_to_box' ) ) {
    
    function _ut_sort_vc_add_new_elements_to_box( $boxes ) {
        
        $sort = array();
        
        if( class_exists('WPBMap') ) {
            $categories = WPBMap::getUserCategories();
        }
        
        foreach( $categories as $category ) {
        
            foreach( $boxes as $key => $box ) {
                
                if( isset( $box['deprecated'] ) && $box['deprecated'] ) {
                    
                    $sort[$key] = $box;
                    continue;
                    
                }
                
                
                if( !isset( $box['category'] ) ) {

                    $boxes[$key]['category'] = '_other_category_';
                    $box['category'] = '_other_category_';

                }
                
                if( $box['category'] == $category ) {
                    
                    $sort[$key] = $box;
                    
                }
                
            }
        
        }
        
        return $sort;
        
    }
    
    add_filter( 'vc_add_new_elements_to_box', '_ut_sort_vc_add_new_elements_to_box' );
    
}  


