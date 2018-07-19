<?php if (!defined('ABSPATH')) {
    exit; // exit if accessed directly
}


/**
 * Theme Icon
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.3
 */
 
if ( !function_exists( 'ut_favicon' ) ) {

    function ut_favicon() {
        
        if( ot_get_option( 'ut_favicon' ) ) {
        
            $favicon      = ot_get_option( 'ut_favicon' );
            $favicon_info = pathinfo( $favicon ); 
            $type         = NULL;
            
            if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'png' ) {
                $type = 'type="image/png"';
            }
            
             if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico' ) {
                $type = 'type="image/x-icon"';
            }
            
             if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif' ) {
                $type = 'type="image/gif"';
            }
            
            echo '<link rel="shortcut&#x20;icon" href="' . esc_url( $favicon ) . '" ' . $type. ' />';
            echo '<link rel="icon" href="' . esc_url( $favicon ) . '" ' . $type. ' />';
        
        }
                  
    }
    
}


/**
 * Theme Scroll Effect
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.3
 */
 
if ( !function_exists( 'ut_scroll_effect' ) ) {

    function ut_scroll_effect() {
        
        $scrollto = ot_get_option( 'ut_scrollto_effect' );
        return !empty( $scrollto['easing'] ) ? $scrollto['easing'] : 'easeInOutExpo' ;
                  
    }
    
}



/**
 * Recognized Theme Base Font Styles
 *
 * @return    bolean
 *
 * @access    public
 * @since     2.0
 */
 
if ( !function_exists( 'ut_recognized_font_styles' ) ) {

    function ut_recognized_font_styles() {
      
      return apply_filters( 'ut_recognized_font_styles', array(
            "extralight" => "ralewayextralight",
            "light"      => "ralewaylight",
            "regular"    => "ralewayregular",
            "medium"     => "ralewaymedium",
            "semibold"   => "ralewaysemibold",
            "bold"       => "ralewaybold"        
      ) );
      
    }
    
}

/**
 * Helper Function: return true if woocommerce shop is displaying
 *
 * @return    bolean
 *
 * @access    public
 * @since     2.0
 */

if ( !function_exists( 'ut_is_shop' ) ) {
	
    function ut_is_shop() {
	
		if( function_exists('is_shop') ) {
            
            return is_shop();
        
        } else {
            
            return false;    
            
        }
		
	}
    
}


/**
 * Helper Function: Create Default Header CSS Classes
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.0.3
 */

if ( !function_exists( 'ut_header_class' ) ) {
	
    function ut_header_class( $class = '' ) {
        
        /* class array */
        $classes   = array();
        $classes[] = $class;
        
		// header style
		// $classes[] = 'ha-header-' . ut_return_header_config( 'ut_header_top_layout', 'default' );		
		
        // header scroll position
        $classes[] = ut_return_header_config('ut_navigation_scroll_position' , 'floating') == 'floating' && ut_return_header_config( 'ut_header_layout', 'default' ) == 'default' ? 'ut-header-floating' : 'ut-header-fixed';

        // site border settings
        $classes[] = apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ? 'bordered-navigation' : '';

        // header width
        $classes[] = ut_return_header_config('ut_navigation_width' , 'centered');
        $classes[] = ut_page_option( 'ut_top_header' , 'hide' ) == 'show' ? 'bordered-top' : '';
        $classes[] = ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ut_return_header_config( 'ut_site_navigation_flush', 'no' ) == 'yes' && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ? 'ut-flush' : '';

        if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' ) == 'ut-header-custom' ) {

            if( apply_filters( 'ut_show_hero', false ) ) {

                $classes[] = 'ut-primary-custom-skin';

            } else {

                if( ut_return_header_config('ut_navigation_customskin_state' , 'off') == 'on_switch' ) {

                    $classes[] = 'ut-secondary-custom-skin';

                } else {

                    $classes[] = 'ut-primary-custom-skin';

                }

            }

            if( ut_return_header_config( 'ut_navigation_customskin_state', 'off' ) == 'off' && apply_filters( 'ut_show_hero', false ) ) {

                $classes[] = 'ha-header-hide';

            }

        } else {

            /* border */
            $classes[] = ut_return_header_config( 'ut_navigation_state') == 'on_transparent' && ut_return_header_config( 'ut_navigation_transparent_border' ) == 'on' ?  'ut-header-has-border' : '';

            /* transparent */
            $classes[] = ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'on_transparent' && apply_filters( 'ut_show_hero', false ) ? 'ha-transparent' : ut_return_header_config( 'ut_navigation_skin' , 'ut-header-light' );
                        
            if( apply_filters( 'ut_show_hero', false ) ) {

                if( ut_return_header_config( 'ut_navigation_state' , 'off' ) == 'off' && apply_filters( 'ut_show_hero', false ) ) {

                    $classes[] = 'ha-header-hide';

                }

            }            

        }
        
        
        /* clean up */
        $classes = array_map( 'esc_attr', $classes );
        $classes = array_unique( $classes );
        
        /* output */                
        echo implode( ' ' , $classes );
		
	}
    
}

/**
 * Helper Function: Create Default Header CSS Classes
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.0.3
 */

if ( !function_exists( 'ut_side_header_class' ) ) {
	
    function ut_side_header_class( $class = '' ) {
        
        /* class array */
        $classes = array();
        
        /* navigation skin */
        if( ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' ) == 'ut-header-custom' ) {
            
            $classes[] = 'ut-primary-custom-skin';
            
        } else {
            
            $classes[] = ut_return_header_config( 'ut_navigation_skin' , 'ut-header-dark' );
                        
        } 
        
        if( ut_return_header_config( 'ut_side_navigation_shadow', 'off' ) == 'on' ) {
            
            $classes[] = 'bklyn-sidenav-shadow';
        
        }        
        
        if( ut_return_header_config( 'ut_side_navigation_border', 'off' ) == 'on' ) {
            
            $border_position = ut_return_header_config( 'ut_side_header_align', 'left' ) == 'left' ? 'right' : 'left';
            $classes[] = 'bklyn-sidenav-border-' . $border_position;
        
        }
        
        /* clean up */
        $classes = array_map( 'esc_attr', $classes );
        $classes = array_unique( $classes );
        
        /* output */                
        echo implode( ' ' , $classes );
		
	}
    
}

/**
 * Helper Function: Return Font Awesome Unicode
 *
 * @return    bolean
 *
 * @access    public
 * @since     4.0.3
 * @version   1.2
 */

if ( !function_exists( 'ut_get_fontawesome_unicode' ) ) {
	
    function ut_get_fontawesome_unicode( $class = '' ) {
        
        if( empty( $class ) ) {
            return false;        
        }
        
        $unicode = json_decode( include_once( THEME_DOCUMENT_ROOT . '/unite/core/admin/assets/fonts/fontawesome_unicode.php' ), true );
        
        $class = str_replace('fa fa','fa', $class);
                                
        return isset( $unicode[$class] ) ? $unicode[$class] : false;
        
	}
    
}


/**
 * Helper Function: Add Autoplay for Vimeo embed videos
 *
 * @return    bolean
 *
 * @access    public
 * @since     2.6
 * @version   1.0
 */

if( !function_exists( 'autoplay_vimeo_oembed' ) ) {

    function autoplay_vimeo_oembed( $provider, $url, $args ) {
        
        if( strpos( $provider, 'vimeo' ) !== false ) {
            $provider = esc_url_raw( add_query_arg('autoplay', 0, $provider) );
        }
        return $provider;
        
    }
    
    add_filter('oembed_fetch_url', 'autoplay_vimeo_oembed', 10, 3);

}

/**
 * If the specified query is a search query, then modify the post_type array
 * to support a the 'portfolio' custom post type.
 *
 * @since    1.1.0
 *
 * @param    object    $query    The current search query.
 * @return   object    $query    The modified query supporting CPTs.
 */
 
if( !function_exists( 'ut_filter_search' ) ) {

    function ut_filter_search( $query ) {
        
        if ( is_admin() || !$query->is_search && !$query->is_tag || isset( $query->query_vars['post_type'] ) && $query->query_vars['post_type'] == 'dlm_download'  ) {
            return $query;
        }
        
        $query->set( 'post_type', array( 'post', 'page', 'portfolio' ) );
        
        return $query;
        
    }
    
    add_filter( 'pre_get_posts', 'ut_filter_search' );

}


/** 
 * Post Counter
 *
 * @return    string
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */

$GLOBALS['unite_post_count']      = 1;    /* do not delete! */
$GLOBALS['unite_total_count']     = NULL; /* do not delete! */
$GLOBALS['unite_post_count_left'] = NULL; /* do not delete! */

if ( ! function_exists('_unite_post_count_left') ) :
    
    function _unite_post_count_left() {
        
        global $wp_query, $unite_post_count_left, $unite_total_count;                
                
        foreach( (array) $wp_query->posts as $published ) {
            
            if( $published->post_status == 'publish' ) {
                $unite_post_count_left++;    
            }
            
        }
        
        $unite_total_count = $unite_post_count_left;

    }    
    
    add_action( 'ut_before_content_hook', '_unite_post_count_left' ); 
    
endif;


/** 
 * An internal counter to count posts up and down
 *
 * @return    void
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('_unite_post_count') ) :
    
    function _unite_post_count() {
        
        global $wp_query, $unite_post_count, $unite_post_count_left, $unite_total_count;
                        
        $unite_post_count++;
        $unite_post_count_left--;    
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
                
        /* get sidebar settings */
        $sidebar_settings = ut_get_sidebar_settings();
        
        /* counter for blog grid */
        if( $blog_layout == 'grid' && !ut_blog_has_sidebar() || $blog_layout == 'grid' && is_author() ) {
                
            $unite_post_count = ( $unite_post_count === 4 ) ? 1 : $unite_post_count;           
        
        } elseif( $blog_layout == 'grid' ) {
            
            $unite_post_count = ( $unite_post_count === 3 ) ? 1 : $unite_post_count;
        
        }
        
    }
    
    add_action( 'ut_after_article_hook', '_unite_post_count', 99 );
    
endif;


/** 
 * Creates a parent grid for gird based blog layouts
 *
 * @return    string
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('_unite_start_parent_grid') ) :
    
    function _unite_start_parent_grid() {
        
        global $unite_post_count, $unite_post_count_left, $unite_total_count;
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
        
        if( $blog_layout == 'mixed-grid' ) {
            
            /* mixed grid parent */
            if( $unite_post_count == 2 ) {
            
                echo '<div class="ut-blog-grid clearfix">';
            
            }
            
        }
        
        if( $blog_layout == 'list-grid' ) {
            
            /* grid parent */
            if( $unite_post_count == 1 ) {
            
                echo '<div class="ut-blog-layout-list clearfix">';
            
            }
            
        }  
        
        if( $blog_layout == 'list-grid-first-full' ) {
            
            /* grid parent */
            if( $unite_post_count == 2 ) {
            
                echo '<div class="ut-blog-layout-list clearfix">';
            
            }
            
        }        
            
    }
    
    add_action( 'ut_before_article_hook', '_unite_start_parent_grid', 10 );
    
endif;
   

/** 
 * Closes the parent grid for grid based blog layouts
 *
 * @return    string
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('_unite_close_parent_grid') ) :
    
    function _unite_close_parent_grid() {                
        
        global $unite_post_count, $unite_post_count_left, $unite_total_count;
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
        
        /* mixed grid count */
        if( $blog_layout == 'mixed-grid' ) {
            
            if( ( $unite_post_count - 1 ) % 2 == 0 ) {
                
                 echo '<div class="clear"></div>';
                
            }
            
            if( $unite_post_count_left == 1 && $unite_total_count > 1 ) {
                
                /* close mixed grid parent */
                echo '</div><div class="clear"></div>';
            
            }
            
        }
        
        /* get sidebar settings */
        $sidebar_settings = ut_get_sidebar_settings();
        
        
        if( $blog_layout == 'list-grid-first-full' || $blog_layout == 'list-grid' ) {
            
            if( $unite_post_count_left == 1 ) {
                
                /* close list grid parent */
                echo '</div><div class="clear"></div>';
            
            }
        
        }
        
    }
    
    add_action( 'ut_after_article_hook', '_unite_close_parent_grid', 10 );
    
endif;

/** 
 * Return the path for the current article inside our main loop
 *
 * @return    string
 *
 * @access    private
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists('unite_get_template_path') ) :
    
    function unite_get_template_path() {
        
        global $unite_post_count, $unite_post_count_left, $unite_total_count;
        
        /* get blog style */
        $blog_layout =  apply_filters( 'unite_blog_layout', ot_get_option('ut_blog_layout', 'classic') );
        
        $path = '';
        
        /* return path for mixed grid blog */
        if( $blog_layout == 'mixed-grid' ) {
            
            if( $unite_post_count == 1 ) {
                
                $path = 'blog-mixed-grid/large';
                
            } else {
                
                $path = 'blog-mixed-grid/small';
            
            }
            
        }
        
        /* return path for grid blog */
        if( $blog_layout == 'grid' ) {
            
            $path = 'blog-grid';
        
        }
        
        /* return path for grid sortable blog */
        if( $blog_layout == 'grid-sortable' ) {
            
            $path = 'category-sortable-grid';
        
        }
        
        /* return path for classic blog */
        if( $blog_layout == 'classic' ) {
        
            $path = 'blog';
        
        }  
        
        /* return path for list blog */
        if( $blog_layout == 'list-grid' ) {
        
            $path = 'blog-list';
        
        }       
        
        /* return path for list blog with first post full */
        if( $blog_layout == 'list-grid-first-full' ) {
            
            if( $unite_post_count == 1 ) {
                
                $path = 'blog-list/large';
                
            } else {
                
                $path = 'blog-list';
            
            }
        
        }
        
        return apply_filters( 'unite_template_path', $path );
                
        
    }

endif;

/** 
 * Retuns size for blog-grid article
 *
 * @param     $extraclass ( optional )
 * @return    string
 *
 * @access    public
 * @since     1.0.0
 * @version   1.0.0
 */
if ( ! function_exists('ut_get_article_size') ) :

    function ut_get_article_size( $extra_class = '' ) {
        
        /* get sidebar settings */
        //$sidebar_settings = ut_get_sidebar_settings(); 
        
        /* default size */
        $grid = 'grid-50 tablet-grid-50 mobile-grid-100';
                        
        /* no sidebar - we use 3 column layout  */
        if( !ut_blog_has_sidebar() || is_author() || is_archive() ) {
                                    
            $grid = 'grid-33 tablet-grid-50 mobile-grid-100';
            
        } 
        
        return $grid . ' ' . $extra_class;
        
    }

endif;


/**
 * Create Picturefill 
 *
 * @access    public 
 * @since     1.0.0
 * @version   1.0.0
 */
 
if ( ! function_exists( 'ut_create_picture' ) ) :

    function ut_create_picture( $post_id = NULL, $args ) { 
    
        global $post;
      
        $post_id = ( $post_id == NULL ) ? $post->ID : $post_id;    
        
        /* get post thumbnail first */
        $post_thumbnail = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); 
        $extension      = pathinfo( $post_thumbnail, PATHINFO_EXTENSION); ?>
        
        <figure class="ut-post-thumbnail-caption-wrap">
        
            <picture title="<?php echo wp_strip_all_tags( get_the_title( $post_id ) ); ?>">

                <!--[if IE 9]><video style="display: none;"><![endif]-->    
                <?php if( !empty( $args['devices'] ) && is_array( $args['devices'] ) ) : ?>

                    <?php foreach( $args['devices'] as $device ) :?>

                        <?php 

                            $image  = NULL;
                            $image  = unite_resize( $post_thumbnail, $device[0] , $device[1], true, true, true );
                            $retina = str_replace('.'.$extension, '@2x.'.$extension, $image );

                        ?>

                        <source srcset="<?php echo esc_url( $image ); ?>, <?php echo esc_url( $retina ); ?> 2x" media="(<?php echo $device[2]; ?>)">

                    <?php endforeach; ?>

                <?php endif; ?>

                <?php $desktop  = unite_resize( $post_thumbnail, $args['desktop'][0] , $args['desktop'][1], true, true, true ); ?>

                <!--[if IE 9]></video><![endif]-->    
                <img src="<?php echo THEME_WEB_ROOT; ?>/img/placeholder.png" class="lazyload" srcset="<?php echo esc_url( $desktop ); ?>" alt="<?php echo wp_strip_all_tags( get_the_title( $post_id ) ); ?>">

            </picture>
            
            <?php if( get_post( get_post_thumbnail_id( $post->ID ) )->post_excerpt ) : ?>       
               
            <figcaption class="ut-post-thumbnail-caption"><?php echo get_post( get_post_thumbnail_id( $post->ID ) )->post_excerpt; ?></figcaption>
               
            <?php endif; ?>                                                                            
                                            
        </figure>
        
    <?php }
    
endif;


/**
 * Create Valid Slug for hidden anchors 
 *
 * @access    public 
 * @since     4.2.3
 * @version   1.0.0
 */
 
if ( ! function_exists( 'ut_create_slug' ) ) :

    function ut_create_slug( $title ) {
        
        /* remove special characters */
        $slug = preg_replace( '/[^a-zA-Z ]+/', '', $title );
        
        /* remove numbers */
        $slug = preg_replace( '/[0-9]+/', '', $slug );
        
        /* remove whitespaces  */
        $slug = trim( $slug );
        $slug = preg_replace("/[\s_]/", "-", $slug);
        
        /* make lowercase */
        $slug = strtolower($slug);
        
        /* remove last dash if necessary */
        $slug = rtrim( $slug, "-" );
        
        return $slug;
        
    }

endif;


/**
 * Check if given string is a youtube video
 *
 * @access    public 
 * @since     4.3
 * @version   1.0.0
 */
 
if ( ! function_exists( 'ut_video_is_youtube' ) ) :

    function ut_video_is_youtube( $video ) {
        
        return preg_match('~^(?:https?://)?(?:www[.])?(?:youtube[.]com/watch[?]v=|youtu[.]be/)([^&]{11})~x', trim($video) , $matches);

    }

endif;


/**
 * Check if given string is a vimeo video
 *
 * @access    public 
 * @since     4.4,5
 * @version   1.0.0
 */
 
if ( ! function_exists( 'ut_video_is_vimeo' ) ) :

    function ut_video_is_vimeo( $video ) {
        
        return preg_match('/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/', trim($video) , $matches);

    }

endif;



/**
 * Adds New Contact field to user profiles
 *
 * @access    public 
 * @since     1.0.0
 * @version   4.4.0
 */
if ( ! function_exists( 'ut_add_user_contactmethods' ) ) : 
 
    function ut_add_user_contactmethods( $contactmethods ) {        
        
        /* loop and add fields */        
        foreach( _ut_recognized_social_user_profiles() as $profile => $name ) {
            
            $contactmethods[$profile] = $name;
                        
        }
        
        return $contactmethods;
                
    }
    
    add_filter( 'user_contactmethods', 'ut_add_user_contactmethods', 10, 1 );
    
endif;


/**
 * Add a bottom frame part for additonal spacing
 *
 * @access    public 
 * @since     1.0.0
 * @version   4.4.0
 */
function ut_create_bottom_frame_div() {
    
    // single pages and portfolio can have individual frame settings
    if( ( is_page() || is_singular("portfolio") || is_home() ) && isset( get_queried_object()->ID ) ) {

        // check if we are using a global option
        $ut_site_border_global = get_post_meta( get_queried_object()->ID, 'ut_page_site_border', true );

        if( $ut_site_border_global == 'global' || !$ut_site_border_global ) {

            $ut_site_border_status = ot_get_option( 'ut_site_border_status' );

        } else {

            $ut_site_border_status = get_post_meta( get_queried_object()->ID, 'ut_page_site_border_status', true );

        }                        

    // all other pages are based on global settings    
    } else {

        $ut_site_border_status = ot_get_option( 'ut_site_border_status' );

    }
    
    if( apply_filters( 'ut_show_siteframe', 'hide' ) == 'show' ) {
        
        if( isset( $ut_site_border_status['margin-bottom'] ) && $ut_site_border_status['margin-bottom'] == 'on' ) {
            
            echo '<div class="ut-site-border-bottom-part"></div>';
            
        }
    
    }
        
}

add_action( 'ut_after_footer_content_hook', 'ut_create_bottom_frame_div', 99 );


/**
 * Check search result status
 *
 * @access    public 
 * @since     1.0.0
 * @version   4.4.0
 */

function ut_search_result_status() {
    
    if( is_search()  ) {
        
        return have_posts();
        
    }
    
    if( is_404() ) {
        
        return false;
        
    }
    
    return true;
    
}


/**
 * Animated SVG Buttons
 *
 * @access    public 
 * @since     4.4.2
 * @version   1.0.0
 */

if( !function_exists('ut_transform_button') ) {

	function ut_transform_button( $id = '', $wrap_id = 'ut-hamburger-wrap-overlay', $style = 'ut-hamburger--cross' ) { 
    
    ob_start(); ?>
        
        <div id="<?php echo esc_attr( $wrap_id ); ?>" class="ut-hamburger-wrap">
        
            <a id="<?php echo esc_attr( $id ); ?>" class="ut-hamburger <?php echo $style; ?>" type="button">
                <span></span>
            </a>
        
        </div>
        
    <?php 
    
    return ob_get_clean();
    
    }

}


/**
 * Extra CSS Classes for Color Skins
 *
 * @access    public 
 * @since     4.5
 * @version   1.0.0
 */ 

function ut_post_date_color_skins( $classes ) {

    global $post;
    	
    if( !is_single() && get_post_meta( $post->ID, 'ut_date_color_skin', true ) && get_post_meta( $post->ID, 'ut_date_color_skin', true ) != 'default' ) {

        $classes[] = get_post_meta( $post->ID, 'ut_date_color_skin', true );

    } 
    
	return $classes;
    
}

add_filter( 'post_class', 'ut_post_date_color_skins' );



/**
 * Helper function to implode key pair values
 *
 * @access    public 
 * @since     4.6
 * @version   1.0.0
 */ 

if( !function_exists('implode_with_key') ) {

    function implode_with_key( $assoc, $inglue = ':', $outglue = ';' ) {

        $return = '';

        foreach( $assoc as $tk => $tv ) {
            $return .= $tk . $inglue . $tv . $outglue;
        }

        return $return;

    }

}



/**
 * Creates 2 optional buttons for Hero Area
 *
 * @access    public 
 * @since     4.6
 * @version   1.0.0
 */ 

if( !function_exists('ut_hero_buttons') ) {

    function ut_hero_buttons() {
        
        // main button
        $ut_main_hero_button = ut_return_hero_config( 'ut_main_hero_button' );
        
        // no button set, leave
        if( empty( $ut_main_hero_button ) ) {
            return;
        }
        
        /*
         * Main Button Settings
         */
        
        $ut_main_hero_button_url_type = ut_return_hero_config( 'ut_main_hero_button_url_type', 'section' );
        $ut_main_hero_button_target   = ut_return_hero_config( 'ut_main_hero_button_target', '#ut-to-first-section' );
        $ut_main_hero_button_style    = ut_return_hero_config( 'ut_main_hero_button_style', 'default' );
        $ut_main_hero_button_settings = ut_return_hero_config( 'ut_main_hero_button_settings' );
        
        // button classes
        $ut_main_hero_button_classes   = array('hero-btn');
        $ut_main_hero_button_classes[] = $ut_main_hero_button_style;
        $ut_main_hero_button_classes[] = ut_return_hero_config( 'ut_main_hero_button_hover_shadow', 'off' ) == 'on' ? 'hero-btn-shadow' : '';
        $ut_main_hero_button_classes[] = !empty( $ut_main_hero_button_settings['button_effect'] ) ? 'bklyn-btn-with-effect bklyn-btn-effect-' . $ut_main_hero_button_settings['button_effect'] : '';
        // $ut_main_hero_button_classes[] = !empty( $ut_main_hero_button_settings['particle_effect'] ) ? 'ut-btn-disintegrate' : '';
		// $ut_main_hero_button_classes[] = !empty( $ut_main_hero_button_settings['particle_effect_restore'] ) && $ut_main_hero_button_settings['particle_effect_restore'] == 'yes' ? 'ut-btn-integrate' : '';
		
		// button attributes
		$ut_main_hero_button_attributes = array(); 
		$ut_main_hero_button_attributes['data-text'] = $ut_main_hero_button;
		
		// particle effect
		if( !empty( $ut_main_hero_button_settings['particle_effect'] ) ) 
		$ut_main_hero_button_attributes['data-particle-effect'] = $ut_main_hero_button_settings['particle_effect'];
		
		// particle effect direction
		if( !empty( $ut_main_hero_button_settings['particle_effect_direction'] ) ) 
		$ut_main_hero_button_attributes['data-particle-direction'] = $ut_main_hero_button_settings['particle_effect_direction'];
		
		// particle effect color
		$ut_main_hero_button_attributes['data-particle-color'] = !empty( $ut_main_hero_button_settings['particle_effect_color'] ) ? $ut_main_hero_button_settings['particle_effect_color'] : get_option('ut_accentcolor' , '#F1C40F');
		
		// button attributes
		$ut_main_hero_button_attributes = implode(' ', array_map(
			function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
			$ut_main_hero_button_attributes,
			array_keys( $ut_main_hero_button_attributes )
		) );
		
        /*
         * Second Button Settings
         */    

        $ut_second_hero_button = ut_return_hero_config( 'ut_second_hero_button', 'off' );

        if ( $ut_second_hero_button == 'on' ) {

            $ut_second_hero_button_text      = ut_return_hero_config( 'ut_second_hero_button_text' );
            $ut_second_hero_button_url_type  = ut_return_hero_config( 'ut_second_hero_button_url_type', 'page' );
            $ut_second_hero_button_url       = ut_return_hero_config( 'ut_second_hero_button_url' );
            $ut_second_hero_button_style     = ut_return_hero_config( 'ut_second_hero_button_style', 'default' );
            $ut_second_hero_button_settings  = ut_return_hero_config( 'ut_second_hero_button_settings' );
            
            // second button classes
            $ut_second_hero_button_classes   = array('hero-second-btn');
            $ut_second_hero_button_classes[] = $ut_second_hero_button_style;
            $ut_second_hero_button_classes[] = ut_return_hero_config( 'ut_second_hero_button_hover_shadow', 'off' ) == 'on' ? 'hero-btn-shadow' : '';
            $ut_second_hero_button_classes[] = !empty( $ut_second_hero_button_settings['button_effect'] ) ? 'bklyn-btn-with-effect bklyn-btn-effect-' . $ut_second_hero_button_settings['button_effect'] : '';
			//$ut_second_hero_button_classes[] = !empty( $ut_second_hero_button_settings['particle_effect'] ) ? 'ut-btn-disintegrate' : '';
			//$ut_second_hero_button_classes[] = !empty( $ut_second_hero_button_settings['particle_effect_restore'] ) && $ut_second_hero_button_settings['particle_effect_restore'] == 'yes' ? 'ut-btn-integrate' : '';

			// button attributes
			$ut_second_hero_button_attributes = array(); 
			$ut_second_hero_button_attributes['data-text'] = $ut_second_hero_button_text;

			// particle effect
			if( !empty( $ut_second_hero_button_settings['particle_effect'] ) ) 
			$ut_second_hero_button_attributes['data-particle-effect'] = $ut_second_hero_button_settings['particle_effect'];

			// particle effect direction
			if( !empty( $ut_second_hero_button_settings['particle_effect_direction'] ) ) 
			$ut_second_hero_button_attributes['data-particle-direction'] = $ut_second_hero_button_settings['particle_effect_direction'];

			// particle effect color
			$ut_second_hero_button_attributes['data-particle-color'] = !empty( $ut_second_hero_button_settings['particle_effect_color'] ) ? $ut_second_hero_button_settings['particle_effect_color'] : get_option('ut_accentcolor' , '#F1C40F');

			// button attributes
			$ut_second_hero_button_attributes = implode(' ', array_map(
				function ($v, $k) { return sprintf("%s=\"%s\"", $k, $v); },
				$ut_second_hero_button_attributes,
				array_keys( $ut_second_hero_button_attributes )
			) );

        } ?>

        <span class="hero-btn-holder">

            <a id="to-about-section" target="<?php echo ut_return_hero_config( 'ut_main_hero_button_link_target' ); ?>" <?php echo $ut_main_hero_button_attributes; ?> href="<?php echo $ut_main_hero_button_url_type == 'section' ? ut_clean_section_id( $ut_main_hero_button_target ) : $ut_main_hero_button_target; ?>" class="<?php echo implode(" ", $ut_main_hero_button_classes); ?>">
				
				<?php if( !empty( $ut_main_hero_button_settings['button_effect'] ) && $ut_main_hero_button_settings['button_effect'] == 'winona' ) { echo '<span>'; } ?>
				
					<?php if( $ut_main_hero_button_style == 'custom' && isset( $ut_main_hero_button_settings['icon_position'] ) && $ut_main_hero_button_settings['icon_position'] == 'before' || $ut_main_hero_button_style == 'custom' && empty( $ut_main_hero_button_settings['icon_position'] ) ) : ?>                                        

						<?php echo !empty( $ut_main_hero_button_settings['icon'] ) ? '<i class="hero-btn-icon-before fa ' . esc_attr( $ut_main_hero_button_settings['icon'] ) . '"></i>' : ''; ?><?php echo ut_translate_meta( $ut_main_hero_button ); ?>

					<?php endif; ?>

					<?php if( $ut_main_hero_button_style != 'custom' ) : ?>

						<?php echo ut_translate_meta( $ut_main_hero_button ); ?>

					<?php endif; ?>

					<?php if( $ut_main_hero_button_style == 'custom' && isset( $ut_main_hero_button_settings['icon_position'] ) && $ut_main_hero_button_settings['icon_position'] == 'after'  ) : ?>                                        

						<?php echo ut_translate_meta( $ut_main_hero_button ); ?><?php echo !empty( $ut_main_hero_button_settings['icon'] ) ? '<i class="hero-btn-icon-after fa ' . esc_attr( $ut_main_hero_button_settings['icon'] ) . '"></i>' : ''; ?>

					<?php endif; ?>
				
				<?php if( !empty( $ut_main_hero_button_settings['button_effect'] ) && $ut_main_hero_button_settings['button_effect'] == 'winona' ) { echo '</span>'; } ?>

            </a>

            <?php if( $ut_second_hero_button == 'on' ) : ?>

                <a target="<?php echo ut_return_hero_config( 'ut_second_hero_button_target' ); ?>" <?php echo $ut_second_hero_button_attributes; ?> href="<?php echo $ut_second_hero_button_url_type == 'section' ? ut_clean_section_id( $ut_second_hero_button_url ) : $ut_second_hero_button_url; ?>" class="<?php echo implode(" ", $ut_second_hero_button_classes ); ?>">
					
					<?php if( !empty( $ut_second_hero_button_style['button_effect'] ) && $ut_second_hero_button_style['button_effect'] == 'winona' ) { echo '<span>'; } ?>
					
						<?php if( $ut_second_hero_button_style == 'custom' && isset( $ut_second_hero_button_settings['icon_position'] ) && $ut_second_hero_button_settings['icon_position'] == 'before' || $ut_second_hero_button_style == 'custom' && empty( $ut_second_hero_button_settings['icon_position'] ) ) : ?>                                        

							<?php echo !empty( $ut_second_hero_button_settings['icon'] ) ? '<i class="hero-btn-icon-before fa ' . esc_attr( $ut_second_hero_button_settings['icon'] ) . '"></i>' : ''; ?><?php echo ut_translate_meta( $ut_second_hero_button_text ); ?>

						<?php endif; ?>

						<?php if( $ut_second_hero_button_style != 'custom' ) : ?>

							<?php echo ut_translate_meta( $ut_second_hero_button_text ); ?>

						<?php endif; ?>

						<?php if( $ut_second_hero_button_style == 'custom' && isset( $ut_second_hero_button_settings['icon_position'] ) && $ut_second_hero_button_settings['icon_position'] == 'after' ) : ?>                                        

							<?php echo ut_translate_meta( $ut_second_hero_button_text ); ?><?php echo !empty( $ut_second_hero_button_settings['icon'] ) ? '<i class="hero-btn-icon-after fa ' . esc_attr( $ut_second_hero_button_settings['icon'] ) . '"></i>' : ''; ?>

						<?php endif; ?>
					
					<?php if( !empty( $ut_second_hero_button_style['button_effect'] ) && $ut_second_hero_button_style['button_effect'] == 'winona' ) { echo '</span>'; } ?>

                </a>

            <?php endif; ?> 

        </span>

        <?php 

    }

}


/**
 * Creates an array for overlay effect settings
 *
 * @access    public 
 * @since     4.6.1
 * @version   1.0.0
 */ 

if( !function_exists('ut_create_overlay_effect_settings') ) {
	
	function ut_create_overlay_effect_settings( $atts ) {
		
		extract( $atts );
		
		ut_print( $atts, true );
		
		// $effect config
		$overlay_effect_config = array();
		
		$overlay_effect_config['particles']['number']['value'] = !empty( $bklyn_overlay_effect_number ) ? $bklyn_overlay_effect_number : 20;
		$overlay_effect_config['particles']['number']['density']['value_area'] = !empty( $bklyn_overlay_effect_density ) ? $bklyn_overlay_effect_density : 800;
		$overlay_effect_config['particles']['move']['speed'] = !empty( $bklyn_overlay_effect_speed ) ? $bklyn_overlay_effect_speed : 5;
		$overlay_effect_config['particles']['move']['out_mode'] = !empty( $bklyn_overlay_effect_activate_boundaries ) && $bklyn_overlay_effect_activate_boundaries == 'false' ? 'out' : 'bounce';
		$overlay_effect_config['particles']['move']['direction'] = !empty( $bklyn_overlay_effect_moving_direction ) ? $bklyn_overlay_effect_moving_direction : 'none';
		$overlay_effect_config['particles']['shape']['type'] = !empty( $bklyn_overlay_effect_particle_shape ) ? $bklyn_overlay_effect_particle_shape : 'circle';

		// Colors Settings
		if( !empty( $bklyn_overlay_effect_particle_color ) ) {

			if( function_exists('ut_is_hex') && ut_is_hex( $bklyn_overlay_effect_particle_color ) ){

				$overlay_effect_config['particles']['color']['value'] = $bklyn_overlay_effect_particle_color;

			} elseif( function_exists('ut_rgb_to_hex') && function_exists('ut_get_rgba_opacity') ) {

				$overlay_effect_config['particles']['color']['value'] = ut_rgb_to_hex( $bklyn_overlay_effect_particle_color );
				$overlay_effect_config['particles']['opacity']['value'] = ut_get_rgba_opacity( $bklyn_overlay_effect_particle_color );

			}

		} else {

			$overlay_effect_config['particles']['color']['value'] = '#FFFFFF';

		}


		if( !empty( $bklyn_overlay_effect_line_color ) ) {

			if( function_exists('ut_is_hex') && ut_is_hex( $bklyn_overlay_effect_line_color ) ){

				$overlay_effect_config['particles']['line_linked']['color'] = $bklyn_overlay_effect_line_color;

			} elseif( function_exists('ut_rgb_to_hex') && function_exists('ut_get_rgba_opacity') ) {

				$overlay_effect_config['particles']['line_linked']['color'] = ut_rgb_to_hex( $bklyn_overlay_effect_line_color );
				$overlay_effect_config['particles']['line_linked']['opacity'] = ut_get_rgba_opacity( $bklyn_overlay_effect_line_color );

			}

		} else {

			$overlay_effect_config['particles']['line_linked']['color'] = '#FFFFFF';

		}

		$overlay_effect_config['particles']['opacity']['random'] = !empty( $bklyn_overlay_effect_randomize_opacity ) && $bklyn_overlay_effect_randomize_opacity == 'false' ? false : true;
		$overlay_effect_config['particles']['opacity']['anim']['enable'] = !empty( $bklyn_overlay_effect_opacity_animate ) && $bklyn_overlay_effect_opacity_animate == 'false' ? false : true;

		// Linked Lines
		$overlay_effect_config['particles']['line_linked']['enable'] = !empty( $bklyn_overlay_effect_connect_particles ) && $bklyn_overlay_effect_connect_particles == 'false' ? false : true;

		// Dot Configuration
		$overlay_effect_config['particles']['size']['value'] = isset( $bklyn_overlay_effect_particle_size ) ? $bklyn_overlay_effect_particle_size : 3;
		$overlay_effect_config['particles']['size']['random'] = !empty( $bklyn_overlay_effect_randomize_particles ) && $bklyn_overlay_effect_randomize_particles == 'false' ? false : true;
		$overlay_effect_config['interactivity']['events']['onhover']['enable'] = !empty( $bklyn_overlay_effect_mouse_interaction ) && $bklyn_overlay_effect_mouse_interaction == 'false' ? false : true;
		$overlay_effect_config['interactivity']['events']['onclick']['enable'] = !empty( $bklyn_overlay_effect_mouse_interaction ) && $bklyn_overlay_effect_mouse_interaction == 'false' ? false : true;
		$overlay_effect_config['interactivity']['events']['onhover']['mode'] = !empty( $bklyn_overlay_effect_hover_mode ) ? $bklyn_overlay_effect_hover_mode : 'repulse';

		// Bubble Mode
		$overlay_effect_config['interactivity']['modes']['bubble']['size'] = isset( $bklyn_overlay_effect_hover_bubble_size ) ? $bklyn_overlay_effect_hover_bubble_size : 6;

		// Misc Setting not adjustable by user
		$overlay_effect_config['particles']['opacity']['anim']['speed'] = 1;
		$overlay_effect_config['interactivity']['modes']['grab']['distance'] = 400;
		$overlay_effect_config['interactivity']['modes']['bubble']['distance'] = 400;
		$overlay_effect_config['interactivity']['modes']['bubble']['opacity'] = 0;
		$overlay_effect_config['retina_detect'] = true;
				
		return $overlay_effect_config;
		
	}
	
}



/**
 * Parse Contact Section Content Block
 *
 * @access    public 
 * @since     1.0.0
 * @version   4.6.2
 */

function ut_contact_section_content_block() {
    
	global $section_is_contact_section;
	
	$section_is_contact_section = false;
	
	if( apply_filters( 'ut_contact_section_is_cblock', false ) ) {
		
		$section_is_contact_section = true;
		
		$cblock = get_post( ut_return_csection_config('ut_csection_content_block_id') ); ?>

		<div id="ut-custom-contact-section">

			<div class="grid-container">

				<div class="grid-100 mobile-grid-100 tablet-grid-100">
				
					<?php echo apply_filters( 'the_content', $cblock->post_content ); ?>
		
				</div>	

			</div>	
		
		</div>	
			
		<?php     
		
	}
        
}

add_action( 'ut_before_footer_hook', 'ut_contact_section_content_block', 99 );