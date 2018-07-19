<?php

if ( ! defined( 'ABSPATH' ) ) exit;


class UT_Shortcode_CPT {
    
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {

		add_action( 'init', array( $this, 'register_section_blocks'), 8 );
        add_action( 'init', array( $this, 'register_section_blocks_taxonomy' ) );
        add_action( 'admin_head', array( $this, 'add_menu_icon' ) );
        
    }
    
    
    /**
     * Register the custom post type for section blocks.
     *
     * @since    1.0.0
     */
    public function register_section_blocks() {
        
        $labels = array(
			'parent_item_colon'  => '',
            'name'               => _x( 'United Themes - Content Block Management', 'post type general name' , 'ut_shortcodes' ),
			'singular_name'      => _x( 'Content Block', 'post type singular name' , 'ut_shortcodes' ),
			'add_new'            => _x( 'Add Content Block', 'ut-content-blocks', 'ut_shortcodes' ),
			'add_new_item'       => sprintf( esc_html__( 'Add New %s', 'ut_shortcodes' ), __( 'Content Block' , 'ut_shortcodes' ) ),
			'edit_item'          => sprintf( esc_html__( 'Edit %s', 'ut_shortcodes' ), __( 'Content Block' , 'ut_shortcodes' ) ),
			'new_item'           => sprintf( esc_html__( 'New %s', 'ut_shortcodes' ), __( 'Content Block' , 'ut_shortcodes' ) ),
			'all_items'          => sprintf( esc_html__( 'All %s', 'ut_shortcodes' ), __( 'Content Blocks' , 'ut_shortcodes' ) ),
			'view_item'          => sprintf( esc_html__( 'View %s', 'ut_shortcodes' ), __( 'Content Block' , 'ut_shortcodes' ) ),
			'search_items'       => sprintf( esc_html__( 'Search %a', 'ut_shortcodes' ), __( 'Content Blocks' , 'ut_shortcodes' ) ),
			'not_found'          => sprintf( esc_html__( 'No %s Found', 'ut_shortcodes' ), __( 'Content Blocks' , 'ut_shortcodes' ) ),
			'not_found_in_trash' => sprintf( esc_html__( 'No %s Found In Trash', 'ut_shortcodes' ), __( 'Content Blocks' , 'ut_shortcodes' ) ),
			'menu_name'          => esc_html__( 'Content Blocks', 'ut_shortcodes' )
		);        
        
        register_post_type( 'ut-content-block', array(
            'labels'            => $labels,    
            'supports'          => array( 'title', 'editor' ),
            'show_in_menu'      => true,
            'show_in_nav_menus' => false,
            'public'            => false,
            'show_ui'           => true,
            'menu_position'     => 5,
        ) );    
    
    }
    
    
    /**
     * Register the taxonomy custom post type for section blocks.
     *
     * @since    1.0.0
     */
    public function register_section_blocks_taxonomy() {
        
        $labels = array(
            'name'              => esc_html__( 'Categories' , 'ut_shortcodes' ),
            'singular_name'     => esc_html__( 'Category', 'ut_shortcodes' ),
            'search_items'      => esc_html__( 'Search Categories' , 'ut_shortcodes' ),
            'all_items'         => esc_html__( 'All Categories' , 'ut_shortcodes' ),
            'parent_item'       => esc_html__( 'Parent Category' , 'ut_shortcodes' ),
            'parent_item_colon' => esc_html__( 'Parent Category:' , 'ut_shortcodes' ),
            'edit_item'         => esc_html__( 'Edit Category' , 'ut_shortcodes' ),
            'update_item'       => esc_html__( 'Update Category' , 'ut_shortcodes' ),
            'add_new_item'      => esc_html__( 'Add New Category' , 'ut_shortcodes' ),
            'new_item_name'     => esc_html__( 'New Category Name' , 'ut_shortcodes' ),
            'menu_name'         => esc_html__( 'Categories' , 'ut_shortcodes' ),        
        );
        
        register_taxonomy( 'ut-content-block-category' , 'ut-content-blocks' , array(
            'labels'       => $labels,
            'public'       => true,
            'hierarchical' => true,
            'rewrite'      => true,            
        ) );
    
    }
    
     /**
     * Register the menu icon section blocks.
     *
     * @since    1.0.0
     */
    public function add_menu_icon() {
    
        echo '<style type="text/css">#adminmenu .menu-icon-ut-content-block div.wp-menu-image:before { content: "\f489"; } </style>';
    
    }
    
    
}

new UT_Shortcode_CPT();