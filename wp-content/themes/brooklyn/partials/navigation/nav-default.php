<?php

// additional overlay navigation
$overlay_navigation = ot_get_option('ut_global_overlay_navigation', 'off') == 'on' ? true : false;

// container classes
if( ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'yes' ) {
	
	$classes = array('grid-100 hide-on-tablet hide-on-mobile');	
	
	if( ut_return_header_config( 'ut_site_navigation_center', 'yes' ) == 'yes' ) {
		
		$classes[] = 'ut-navigation-centered'; 
		
	}
	
} else {
	
	if( $overlay_navigation ) {
    
		$classes = array('grid-80 hide-on-tablet hide-on-mobile');

	} else {

		$classes = array('grid-85 hide-on-tablet hide-on-mobile');

	}
	
}

// navigation flush
if( ( ut_page_option( 'ut_site_border', 'hide' ) == 'show' && ot_get_option( 'ut_site_navigation_flush', 'no' ) == 'yes' ) && ut_return_header_config( 'ut_navigation_width', 'centered' ) == 'fullwidth' ) {
    
    $classes[] = 'ut-flush-nav'; 
    
} 

if( $overlay_navigation ) {
	
	$overlay_navigation_classes = array();
		
	if( ut_return_header_config( 'ut_site_navigation_no_logo', 'no' ) == 'yes' ) {
		
		$overlay_navigation_classes[] = 'grid-100';
		
		if( ut_return_header_config( 'ut_site_navigation_center', 'yes' ) == 'yes' ) {
			
			$overlay_navigation_classes[] = 'ut-open-overlay-trigger-centered';
			
		}
		
	} else {
		
		$overlay_navigation_classes[] = 'grid-5';
		
	}
	
    echo '<div class="ut-open-overlay-trigger ' . implode(" ", $overlay_navigation_classes ). ' hide-on-tablet hide-on-mobile">';

        echo ut_transform_button( 'ut-open-overlay-menu' );

    echo '</div>';

}

if( !$overlay_navigation ) {

    // main navigation args
    $menu = array(
        'echo'              => false,
        'container'         => 'nav',
        'container_id'      => 'navigation',
        'fallback_cb'       => 'ut_default_menu',
        'container_class'   => implode(' ' , $classes ),
        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'theme_location'    => 'primary', 
        'walker'            => new ut_menu_walker()
    );

    /* main navigation */
    echo wp_nav_menu( $menu );
    
}