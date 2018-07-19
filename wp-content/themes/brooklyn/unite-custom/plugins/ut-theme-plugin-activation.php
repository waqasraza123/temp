<?php if ( ! defined( 'ABSPATH' ) ) exit;

/** 
 * Plugin Requirements for this theme
 *
 * @return    void
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists( '_ut_register_required_plugins' ) ) : 

    function _ut_register_required_plugins() {
    
        $plugins = array(
            			
		    array(
				'name'     				=> 'Twitter by UnitedThemes',
				'slug'     				=> 'ut-twitter',
				'source'   				=> THEME_WEB_ROOT . '/unite-custom/plugins/lib/ut-twitter.zip', 
				'required' 				=> true, 
				'version' 				=> '3.1.1', 
			),
			
			array(
				'name'     				=> 'Shortcodes by UnitedThemes',
				'slug'     				=> 'ut-shortcodes',
				'source'   				=> THEME_WEB_ROOT . '/unite-custom/plugins/lib/ut-shortcodes.zip', 
				'required' 				=> true, 
				'version' 				=> '4.6.4.3', 
			),
			
			array(
				'name'     				=> 'Portfolio Management by UnitedThemes',
				'slug'     				=> 'ut-portfolio',
				'source'   				=> THEME_WEB_ROOT . '/unite-custom/plugins/lib/ut-portfolio.zip', 
				'required' 				=> true, 
				'version' 				=> '4.3.5', 
			),
			
			array(
				'name'     				=> 'Pricing Tables by United Themes',
				'slug'     				=> 'ut-pricing',
				'source'   				=> THEME_WEB_ROOT . '/unite-custom/plugins/lib/ut-pricing.zip', 
				'required' 				=> true, 
				'version' 				=> '3.1', 
			),
            
            array(
				'name'     				=> 'WPBakery Page Builder by United Themes',
				'slug'     				=> 'js_composer',
				'source'   				=> THEME_WEB_ROOT . '/unite-custom/plugins/lib/js_composer.zip', 
				'required' 				=> true, 
				'version' 				=> '5.4.8.1', 
			),
			
			array(
				'name'     				=> 'Revolution Slider',
				'slug'     				=> 'revslider',
				'source'   				=> THEME_WEB_ROOT . '/unite-custom/plugins/lib/revslider.zip', 
				'required' 				=> true, 
				'version' 				=> '5.4.7.3', 
			),
            
            array(
                'name'      			=> 'Contact Form 7',
                'slug'      			=> 'contact-form-7',
                'required'  			=> true,
				'version' 				=> '5.0.1', 
            ),
			
			array(
                'name'      			=> 'MailChimp for WordPress',
                'slug'      			=> 'mailchimp-for-wp',
                'required'  			=> false,
				'version' 				=> '4.2', 
            ),
            
        
        );
         
        $config = array(
            
            'default_path' 		=> '',                         	/* Default absolute path to pre-packaged plugins */
            'menu'         		=> 'install-required-plugins', 	/* Menu slug */
            'has_notices'      	=> true,                       	/* Show admin notices or not */
            'is_automatic'    	=> true,					   	/* Automatically activate plugins after installation or not */
           
        );
        
        tgmpa( $plugins, $config );
    
    }
    
    add_action( 'tgmpa_register', '_ut_register_required_plugins' );
    
endif;