<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if( !class_exists( 'UT_Responsive_CSS' ) ) {	
    
    class UT_Responsive_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
            ob_start(); ?>
                
            <style id="ut-responsive-custom-css" type="text/css">
                
                /* Mobile */
                @media (max-width: 400px) {
                    
                    .hide-bg-on-mobile,
                    .hide-bg-on-mobile > .parallax-scroll-container {
                        background-image: none !important;
                    }
					
					#ut-sitebody .hide-bg-on-mobile,
                    #ut-sitebody .hide-bg-on-mobile > .parallax-scroll-container {
                        background-image: none !important;
                    }
                    
                }
                
                @media (max-width: 767px) {
                
                    .hide-bg-on-mobile,
                    .hide-bg-on-mobile > .parallax-scroll-container {
                        background-image: none !important;
                    }
					
					#ut-sitebody .hide-bg-on-mobile,
                    #ut-sitebody .hide-bg-on-mobile > .parallax-scroll-container {
                        background-image: none !important;
                    }
                
                }
                
                /* Tablet */
                @media (min-width: 768px) and (max-width: 1024px) {
                
                    .hide-bg-on-tablet,
                    .hide-bg-on-tablet > .parallax-scroll-container {
                        background-image: none !important;
                    }
					
					#ut-sitebody .hide-bg-on-tablet,
                    #ut-sitebody .hide-bg-on-tablet > .parallax-scroll-container {
                        background-image: none !important;
                    }
                
                }
                
                /* Medium Desktop */
                @media (min-width: 1025px) and (max-width: 1600px) {
                    
                    .hide-bg-on-medium, 
                    .hide-bg-on-medium > .parallax-scroll-container {
                        background-image: none !important;
                    }
					
					#ut-sitebody .hide-bg-on-medium, 
                    #ut-sitebody .hide-bg-on-medium > .parallax-scroll-container {
                        background-image: none !important;
                    }
                   
                }
                                
                .ut-bklyn-onepage section:not(#ut-hero) .parallax-scroll-container {
                    margin-top: -5%;    
                }
                
            </style>            
                
            <?php
            
            /* output css */
            echo $this->minify_css( ob_get_clean() );
        
        }
        
    }

}

new UT_Responsive_CSS;