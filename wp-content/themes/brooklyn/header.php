<!DOCTYPE html>
<html <?php language_attributes(); ?> class="ut-no-js">
<!--
##########################################################################################

BROOKLYN THEME BY UNITED THEMES™

DESIGNED BY MARCEL MOERKENS
DEVELOPED BY MARCEL MOERKENS & MATTHIAS NETTEKOVEN 

© 2017 BROOKLYN THEME
POWERED BY UNITED THEMES™ 
ALL RIGHTS RESERVED

UNITED THEMES™  
WEB DEVELOPMENT FORGE EST.2011
WWW.UNITEDTHEMES.COM

Version: <?php echo UT_THEME_VERSION; ?>


##########################################################################################
-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <?php ut_meta_hook(); //action hook, see inc/ut-theme-hooks.php ?>
        
    <?php if( !defined('WPSEO_VERSION') ) : ?>
		
        <?php ut_meta_theme_hook(); ?>
        <meta name="description" content="<?php bloginfo('description'); ?>"> 

    <?php endif; ?>
    
    <!-- RSS & Pingbacks -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    
    <!-- Favicon -->
	<?php if( ot_get_option( 'ut_favicon' ) ) : ?>
        
        <?php 
        
        /* get icon info */
        $favicon = ot_get_option( 'ut_favicon' );
        $favicon_info = pathinfo( $favicon ); 
        $type = NULL;
        
        if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'png' ) {
            $type = 'type="image/png"';
        }
        
         if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'ico' ) {
            $type = 'type="image/x-icon"';
        }
        
         if( isset($favicon_info['extension']) && $favicon_info['extension'] == 'gif' ) {
            $type = 'type="image/gif"';
        }
        
        ?>
                
        <link rel="shortcut&#x20;icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />
        <link rel="icon" href="<?php echo $favicon; ?>" <?php echo $type; ?> />
        
    <?php endif; ?>
    
    <!-- Apple Touch Icons -->    
    <?php if( ot_get_option( 'ut_apple_touch_icon_iphone' ) ) :?>
    <link rel="apple-touch-icon" href="<?php echo ot_get_option( 'ut_apple_touch_icon_iphone' ); ?>">
    <?php endif; ?>
    
    <?php if( ot_get_option( 'ut_apple_touch_icon_ipad' ) ) : ?>
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo ot_get_option( 'ut_apple_touch_icon_ipad' ); ?>" />
    <?php endif; ?>
    
    <?php if( ot_get_option( 'ut_apple_touch_icon_iphone_retina' ) ) : ?>
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo ot_get_option( 'ut_apple_touch_icon_iphone_retina' ); ?>" />
    <?php endif; ?>
    
    <?php if( ot_get_option( 'ut_apple_touch_icon_ipad_retina' ) ) :?>
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo ot_get_option( 'ut_apple_touch_icon_ipad_retina' ); ?>" />
    <?php endif; ?>
        
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]--> 
    	
    <?php wp_head(); ?>
    
</head>

<body id="ut-sitebody" <?php body_class(); ?> data-scrolleffect="<?php echo ut_scroll_effect(); ?>" data-scrollspeed="<?php echo ot_get_option( 'ut_scrollto_speed', '1000' ); ?>">

<?php ut_before_top_header_hook(); ?> 
    
<?php get_template_part( 'partials/header/header', 'side' );  ?>

<a class="ut-offset-anchor" id="top" style="top:0px !important;"></a>

<?php 
	
	// Classic Brooklyn Top Header
	if( ut_return_header_config( 'ut_header_top_type', 'classic' ) == 'classic' ) {
	
		get_template_part( 'partials/top', 'header' ); 
		
	}

?>    
    
<?php ut_before_header_hook(); ?> 
    
<?php 
	
	if( ut_return_header_config( 'ut_header_top_type', 'classic' ) == 'advanced' )  {
		
		// New Brooklyn Header Styles ( In Development )
		get_template_part( 'partials/header/top/header', ut_return_header_config( 'ut_header_top_layout', 'style-1' ) ); 
		
	} else {
		
		// Classic Brooklyn Header
		get_template_part( 'partials/header/header', 'default' );
		
	}	
	
?>

<div class="clear"></div>

<?php get_template_part( 'template-part', 'hero' ); ?>       

<?php ut_before_content_hook(); // action hook, see inc/ut-theme-hooks.php ?>

<div id="main-content" class="wrap ha-waypoint" data-animate-up="ha-header-hide" data-animate-down="ha-header-small">
	
    <a class="ut-offset-anchor" id="to-main-content"></a>
		
        <div class="main-content-background clearfix">