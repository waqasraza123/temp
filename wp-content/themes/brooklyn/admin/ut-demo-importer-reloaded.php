<?php

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

// Importer Base Files
include_once( THEME_DOCUMENT_ROOT . '/admin/includes/plugins/importer-reloaded/importer.php' );

// Amazon S3 Bucket
define('S3_Bucket', 'https://s3.eu-central-1.amazonaws.com/unitedthemes-xml/');

//@ todo - Widget Import / Server Location Selector ( UnitedThemes Server or AWS )

/**
 * All Demo Data
 *
 * @access    public
 * @since     4.6.1
 */

if ( !function_exists( 'ut_demo_importer_info' ) ) {

	function ut_demo_importer_info() {

		return array(

			'demo_one' => array(
				'id'			=> 1,
				'name'      	=> 'Bklyn Demo #1 Classic',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/classic',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/classic/',    
				'file'      	=> 'demo_one',
				'preview'		=> 'demo1',
				'logo'			=> 'brooklyn-logo-dark.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#FFBF00',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Work'
				),
				'sliderev'	=> array()
			),
			'demo_two' => array(
				'id'			=> 2,
				'name'      	=> 'Bklyn Demo #02',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo2',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo2/',
				'file'      	=> 'demo_two',
				'preview'		=> 'demo2',
				'logo'			=> 'bklyn-logo-white-normal.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#FF6E00',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'My Work', 'Portfolio Frontpage'
				),
				'sliderev'	=> array()
			),
			'demo_three' => array(
				'id'			=> 3,
				'name'      	=> 'Bklyn Demo #03',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo3',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo3/',
				'file'      	=> 'demo_three',
				'preview'		=> 'demo3',
				'logo'			=> 'brooklyn-logo-dark.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#0267C1',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Portfolio Carousel Full Width',
					'Portfolio Carousel',
					'Portfolio Gap 60',
					'Portfolio Gap 40',
					'Portfolio Gap 20',
					'Portfolio Title Below',
					'Portfolio Full Width',
					'Portfolio 4 No Gap',
					'Portfolio 4 No Filter',
					'Portfolio 4 Columns',
					'Portfolio 3 Columns',
					'Portfolio 2 Columns',
					'Our Projects'
				),
				'sliderev'	=> array()
			),
			'demo_four' => array(
				'id'			=> 4,
				'name'      	=> 'Bklyn Demo #04',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/business',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/business/',
				'file'      	=> 'demo_four',
				'preview'		=> 'demo4',
				'logo'			=> 'bklyn-logo-white-normal.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#F1C40F',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery'
				),
				'sliderev'	=> array()
			),
			'demo_five' => array(
				'id'			=> 5,
				'name'      	=> 'Bklyn Demo #05',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo5',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo5/',
				'file'      	=> 'demo_five',
				'preview'		=> 'demo5',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#3498db',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery', 'Portfolio Carousel'
				),
				'sliderev'	=> array(
					'Demo5.zip', 'about.zip'
				)
			),
			'demo_six' => array(
				'id'			=> 6,
				'name'      	=> 'Bklyn Demo #06',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo6',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo6/',
				'file'      	=> 'demo_six',
				'preview'		=> 'demo6',
				'logo'			=> 'bklyn-logo-white-normal.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#FDA527',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery'
				),
				'sliderev'	=> array()
			),
			'demo_seven' => array(
				'id'			=> 7,
				'name'      	=> 'Bklyn Demo #07',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo7',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo7/',
				'file'      	=> 'demo_seven',
				'preview'		=> 'demo7',
				'logo'			=> 'bklyn-logo-dark-normal.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#FF3F00',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'work'
				),
				'sliderev'	=> array(
					'mountain-parallax-header.zip'
				)
			),
			'demo_two_b' => array(
				'id'			=> 8,
				'name'      	=> 'Bklyn Demo #08',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo8',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo8/',
				'file'      	=> 'demo_two_b',
				'preview'		=> 'demo8',
				'logo'			=> 'bklyn-logo-light-no-stripes.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#0cb4ce',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'My Work', 'Portfolio Frontpage'
				),
				'sliderev'	=> array(
					'winter.zip'
				)
			),
			'demo_nine'  => array(
				'id'			=> 9,
				'name'      	=> 'Bklyn Demo #09',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo9',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo9/',
				'file'      	=> 'demo_nine',
				'preview'		=> 'demo9',
				'logo'			=> 'brooklyn-logo-light.png',
				'logo_alt'		=> '',
				'themecolor'	=> 'demo_nine',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery', 'Our Studio'
				),
				'sliderev'	=> array(
					'our-story.zip'
				)
			),
			'demo_ten' => array(
				'id'			=> 10,
				'name'      	=> 'Bklyn Demo #10',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo10',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo10/',
				'file'      	=> 'demo_ten',
				'preview'		=> 'demo10',
				'logo'			=> 'bklyn-1897.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#FDA527',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery'
				),
				'sliderev'	=> array()
			),
			'demo_eleven' => array(
				'id'			=> 11,
				'name'      	=> 'Bklyn Demo #11',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo11',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo11/',
				'file'      	=> 'demo_eleven',
				'preview'		=> 'demo11',
				'logo'			=> 'brooklyn-logo-light.png',
				'logo_alt'		=> 'brooklyn-logo-dark.png',
				'themecolor'	=> '#008ED6',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery'
				),
				'sliderev'	=> array(
					'screens.zip'
				)
			),
			'demo_twelve' => array(
				'id'			=> 12,
				'name'      	=> 'Bklyn Demo #12',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo12',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo12/',
				'file'      	=> 'demo_twelve',
				'preview'		=> 'demo12',
				'logo'			=> 'brooklyn-logo-gaming.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#00E1FF',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery'
				),
				'sliderev'	=> array()
			),
			'demo_thirteen' => array(
				'id'			=> 13,
				'name'      	=> 'Bklyn Demo #13',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo13',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo13/',
				'file'      	=> 'demo_thirteen',
				'preview'		=> 'demo13',
				'logo'			=> 'bklyn-logo-light-no-stripes.png',
				'logo_alt'		=> 'bklyn-logo-dark-no-stripes.png',
				'themecolor'	=> '#1abc9c',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Filterable Portfolio Gallery'
				),
				'sliderev'	=> array(
					'home_slider_snow.zip'
				)
			),
			'demo_fourteen' => array(
				'id'			=> 14,
				'name'      	=> 'Bklyn Demo #14',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo14',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo14/',
				'file'      	=> 'demo_fourteen',
				'preview'		=> 'demo14',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#907557',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Stories'
				),
				'showcases'		=> array(),
				'sliderev'		=> array()
			),
			'demo_fifteen' => array(
				'id'			=> 15,
				'name'      	=> 'Bklyn Demo #15',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo15',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo15/',
				'file'      	=> 'demo_fifteen',
				'preview'		=> 'demo15',
				'logo'			=> 'bklynguys-logo-small.png',
				'logo_alt'		=> 'bklynguys-logo-dark-small.png',
				'themecolor'	=> '#CF0A2C',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_sixteen' => array(
				'id'			=> 16,
				'name'      	=> 'Bklyn Demo #16',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo16',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo16/',
				'file'      	=> 'demo_sixteen',
				'preview'		=> 'demo16',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#c39f76',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array(
					'coastal-weddings.zip', 'elegant-weddings.zip', 'wedding-frontpage.zip', 'outdoor-weddings.zip'
				)
			),
			'demo_seventeen' => array(
				'id'			=> 17,
				'name'      	=> 'Bklyn Demo #17',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo17',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo17/',
				'file'      	=> 'demo_seventeen',
				'preview'		=> 'demo17',
				'logo'			=> 'bklyn-barber-logo-page.png',
				'logo_alt'		=> 'bklyn-barber-logo-page-alternate.png',
				'themecolor'	=> '#c39f76',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_eighteen' => array(
				'id'			=> 18,
				'name'      	=> 'Bklyn Demo #18',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo18',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo18/',
				'file'      	=> 'demo_eighteen',
				'preview'		=> 'demo18',
				'logo'			=> 'bklyn-dentist-logo.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#991b84',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Grid Gallery'
				),
				'sliderev'	=> array()
			),
			'demo_nineteen'  => array(
				'id'			=> 19,
				'name'      	=> 'Bklyn Demo #19',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo19',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo19/',
				'file'      	=> 'demo_nineteen',
				'preview'		=> 'demo19',
				'logo'			=> 'brooklyn-logo-light.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#c39f76',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(),
				'sliderev'	=> array(
					'alex.zip'
				)
			),
			'demo_twenty'  => array(
				'id'			=> 20,
				'name'      	=> 'Bklyn Demo #20',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo20',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo20/',
				'file'      	=> 'demo_twenty',
				'preview'		=> 'demo20',
				'logo'			=> 'Bklyn-Homes-Logo.png',
				'logo_alt'		=> 'Bklyn-Homes-Logo-Alt.png',
				'themecolor'	=> '#f1c40f',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Our Projects','Grid 2 Column','Grid 3 Columns','Grid 4 Column'
				),
				'sliderev'	=> array(
					'Bklyn-Construction.zip', 'single-portfolio-hero-slider.zip'
				)
			),
			'demo_twentyone' => array(
				'id'			=> 21,
				'name'      	=> 'Bklyn Demo #21',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo21',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo21/',
				'file'      	=> 'demo_twentyone',
				'preview'		=> 'demo21',
				'logo'			=> '',
				'logo_alt'		=> '',				
				'themecolor'	=> '#F5AB35',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Portfolio Front Page','Portfolio Page','Portfolio Grid 3 Columns','Portfolio Grid 4 Columns','Portfolio Grid 2 Columns','Filter Gallery 3 Columns','Filter Gallery 2 Columns','Filter Gallery 4 Columns','Filter Gallery Without Gaps','Portfolio Grid With Gaps','Portfolio Carousel 9 Column','Portfolio Carousel 8 Column','Portfolio Carousel 7 Column','Portfolio Carousel 6 Column','Portfolio Carousel 5 Column','Portfolio Carousel 4 Column','Portfolio Carousel 3 Column','Portfolio Carousel 2 Column','Portfolio Carousel 1 Column','Portfolio Popup Lightbox'
				),
				'sliderev'	=> array()
			),
			'demo_twentytwo' => array(
				'id'			=> 22,
				'name'      	=> 'Bklyn Demo #22',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo22',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo22/',
				'file'      	=> 'demo_twentytwo',
				'preview'		=> 'demo22',
				'logo'			=> 'brooklyn-logo-22.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#0070c9',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Portfolio Popup Lightbox','Portfolio Carousel 1 Column','Portfolio Carousel 2 Column','Portfolio Carousel 3 Column','Portfolio Carousel 4 Column','Portfolio Carousel 5 Column','Portfolio Carousel 6 Column','Portfolio Grid With Gaps','Filter Gallery Without Gaps','Filter Gallery 4 Columns','Filter Gallery 2 Columns','Filter Gallery 3 Columns','Portfolio Grid 2 Columns','Portfolio Grid 4 Columns','Portfolio Grid 3 Columns','Portfolio Page','Portfolio Front Page'
				),
				'sliderev'	=> array(
					'Demo22.zip', 'single-portfolio-hero-slider.zip'
				)
			),
			'demo_twentythree' => array(
				'id'			=> 23,
				'name'      	=> 'Bklyn Demo #23',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo23',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo23/',
				's3_bucket'		=> S3_Bucket . 'demo_23/',
				'file'      	=> 'demo_twentythree',
				'preview'		=> 'demo23',
				'logo'			=> 'demo-24-logo-light.svg',
				'logo_alt'		=> 'demo-24-logo-dark.svg',
				'themecolor'	=> '#296AF5',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'My Work', 'Portfolio Frontpage', 'Work Page'
				),
				'sliderev'	=> array(
					'Demo23.zip'
				)
			),
			'demo_twentyfour' => array(
				'id'			=> 24,
				'name'      	=> 'Bklyn Demo #24',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo24',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo24/',
				'file'      	=> 'demo_twentyfour',
				'preview'		=> 'demo24',
				'logo'			=> 'demo-24-logo-dark.svg',
				'logo_alt'		=> '',
				'themecolor'	=> '#FF1654',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_twentyfive' => array(
				'id'			=> 25,
				'name'     	 	=> 'Bklyn Demo #25',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo25',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo25/',
				'file'      	=> 'demo_twentyfive',
				'preview'		=> 'demo25',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#8EA604',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'News'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_twentysix' => array(
				'id'			=> 26,
				'name'      	=> 'Bklyn Demo #26',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo26',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo26/',    
				'file'      	=> 'demo_twentysix',
				'preview'		=> 'demo26',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#ff3f00',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Demo 26 Showcase'
				),
				'sliderev'	=> array()
			),
			'demo_twentyseven' => array(
				'id'			=> 27,
				'name'      	=> 'Bklyn Demo #27',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo1',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo1/',
				's3_bucket'		=> S3_Bucket . 'demo_27/',
				'file'      	=> 'demo_twentyseven',
				'preview'		=> 'demo27',
				'logo'			=> 'bklyn-logo-white.svg',
				'logo_alt'		=> 'bklyn-logo-dark.svg',
				'themecolor'	=> '#FFBF00',
				'menus'			=> array(
					'primary' => 'Main Menu',
					'mobile'  => 'Mobile Menu'
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Work'
				),
				'sliderev'	=> array()
			),
			'demo_twentyeight' => array(
				'id'			=> 28,
				'name'      	=> 'Bklyn Demo #28',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo28',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo28/',
				'file'     		=> 'demo_twentyeight',
				'preview'		=> 'demo28',
				'logo'			=> 'bklyn-logo-stack-normal.png',
				'logo_alt'		=> 'bklyn-logo-stack-normal-light.png',
				'themecolor'	=> '#0674EC',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'My Work', 'Portfolio Frontpage'
				),
				'sliderev'	=> array(
					'demo28.zip'
				)
			),
			'demo_twentynine' => array(
				'id'			=> 29,
				'name'      	=> 'Bklyn Demo #29',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo29',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo29/',
				'file'      	=> 'demo_twentynine',
				'preview'		=> 'demo29',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#0674EC',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'Portfolio Carousel','Packery Centered','Packery Full Width','Portfolio Gallery 3 Column','Portfolio Gallery 2 Column'
				),
				'sliderev'	=> array(
					'demo29.zip'
				)
			),
			'demo_thirty' => array(
				'id'			=> 30,
				'name'      	=> 'Bklyn Demo #30',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo30',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo30/',
				'file'      	=> 'demo_thirty',
				'preview'		=> 'demo30',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#999999',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Work',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					'demo30'
				),
				'sliderev'	=> array()
			),
			'demo_thirtyone' => array(
				'id'			=> 31,
				'name'      	=> 'Bklyn Demo #31',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo31',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo31/',
				'file'      	=> 'demo_thirtyone',
				'preview'		=> 'demo31',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#474973',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Work',
					'blog'	  => 'Articles'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_thirtytwo' => array(
				'id'			=> 32,
				'name'      	=> 'Bklyn Demo #32',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo32',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo32/',
				'file'      	=> 'demo_thirtytwo',
				'preview'		=> 'demo32',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#FFCAD4',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Baby',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_thirtythree' => array(
				'id'			=> 33,
				'name'      	=> 'Bklyn Demo #33',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo33',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo33/',
				's3_bucket'		=> S3_Bucket . 'demo_33/',
				'file'      	=> 'demo_thirtythree',
				'preview'		=> 'demo33',
				'logo'			=> 'bklyn-logo-white-normal.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#2176FF',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(
					
				),
				'sliderev'	=> array()
			),
			'demo_thirtyfour' => array(
				'id'			=> 34,
				'name'      	=> 'Bklyn Demo #34',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo34',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo34/',
				'file'      	=> 'demo_thirtyfour',
				'preview'		=> 'demo34',
				'logo'			=> 'logo-34-normal.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#7552EB',
				'menus'			=> array(
					'primary' => 'Aegis Navigation',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Updates'
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),
			'demo_thirtyfive' => array(
				'id'			=> 35,
				'name'      	=> 'Bklyn Demo #35',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo35',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo35/',
				'file'      	=> 'demo_thirtyfive',
				'preview'		=> 'demo35',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#97C240',
				'menus'			=> array(
					'primary' => 'Main',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),
			'demo_thirtysix' => array(
				'id'			=> 36,
				'name'      	=> 'Bklyn Demo #36',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo36',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo36/',
				'file'      	=> 'demo_thirtysix',
				'preview'		=> 'demo36',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> '#ffbf00',
				'menus'			=> array(
					'primary' => 'Main Menu',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Home',
					'blog'	  => ''
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),
			'demo_thirtyseven' => array(
				'id'			=> 37,
				'name'      	=> 'Bklyn Demo #37',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo37',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo37/',
				'file'      	=> 'demo_thirtyseven',
				'preview'		=> 'demo37',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> 'rgba(9, 3, 31, 0.8)',
				'menus'			=> array(
					'primary' => 'Brooklyn Menu',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => ''
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),
			'demo_thirtyeight' => array(
				'id'			=> 38,
				'name'      	=> 'Bklyn Demo #38',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo38',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo38/',
				'file'      	=> 'demo_thirtyeight',
				'preview'		=> 'demo38',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> 'rgba(130, 114, 95, 1)',
				'menus'			=> array(
					'primary' => 'Menu',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => ''
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),
			'demo_thirtynine' => array(
				'id'			=> 39,
				'name'      	=> 'Bklyn Demo #39',
				'url'      		=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/demo39',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo39/',
				'file'      	=> 'demo_thirtynine',
				'preview'		=> 'demo39',
				'logo'			=> '',
				'logo_alt'		=> '',
				'themecolor'	=> 'rgba(41, 77, 234, 1)',
				'menus'			=> array(
					'primary' => 'Menu',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => ''
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),
			'demo_eight' => array(
				'id'			=> 40,
				'name'      	=> 'The Old Landing Page',
				'url'       	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/landing',
				'xml_url'   	=> 'http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/landing/',
				'file'      	=> 'demo_eight',
				'preview'		=> 'extra_demo',
				'poster'    	=> 'extra_demo.jpg',
				'logo'			=> 'brooklyn-logo-dark.png',
				'logo_alt'		=> '',
				'themecolor'	=> '#F2333A',
				'menus'			=> array(
					'primary' => 'Menu 1',
					'mobile'  => ''
				),
				'reading'		=> array(
					'front'	  => 'Front Page',
					'blog'	  => 'Blog'
				),
				'showcases'		=> array(),
				'sliderev'	=> array()
			),


		);    

	}

}


/**
 * Initialize WXR Importer Class
 *
 * @access    public
 * @since     4.6.1
 */

$GLOBALS['wxr_importer'] = new WXR_Import_UI();

add_action(
	'wp_ajax_wxr-import', 
	 array( $GLOBALS['wxr_importer'], 'stream_import' )
);

/**
 * Add Import to Admin Dashboard Menu
 *
 * @access    public
 * @since     4.6.1
 */

if ( !function_exists( 'ut_demo_importer_reloaded_menu' ) ) {
	
	function ut_demo_importer_reloaded_menu() {
				
		add_submenu_page( 
			'unite-welcome-page', 
			'Website Installer', 
			'Website Installer',
			'manage_options',
			'ut-demo-importer-reloaded',
			array( $GLOBALS['wxr_importer'], 'dispatch' )
		);
		
	}
	
	add_action('admin_menu', 'ut_demo_importer_reloaded_menu');
	
} 


/**
 * Initialize UT Importer Class
 *
 * @access    public
 * @since     4.6.1
 */

class UT_Import {
	
	/**
	 * Constructor.
	 */
	
	public function __construct() {
		
		if ( isset($_GET['page']) && $_GET['page'] == 'ut-demo-importer-reloaded' ) {
		
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		
		}
			
	}
	
	/**
	 * 
	 */
	
	protected function display_error( WP_Error $err ) {
		
		header( "Content-Type: application/json" );
        echo json_encode( array( 'error' => $err->get_error_message() ) );
		
	}
	
	/**
	 *  Used for Ajax Request Status
	 *
	 * * @param     status bolean
	 */
	
	protected function json_return_status( $status ) {
		
		header( "Content-Type: application/json" );
		echo wp_json_encode( array(
			'success' => $status
		) );
		
		exit();
		
	}
	
	/**
	 * Verify Nonce
	 */
	
	protected function verify_nonce( $nonce ) {
		
		if ( ! wp_verify_nonce( $nonce, 'ajax-ut-importer-nonce' ) ) {
			die ( 'Busted!');	
		}
		
	}
	
	
	/**
	 * Importer Scripts
	 */
	
	public function enqueue_scripts() {
	
		wp_enqueue_style(
            'ut-importer',
            THEME_WEB_ROOT . '/admin/assets/css/ut-demo-importer.css'
        );
		
        wp_enqueue_script(
            'ut-importer', 
            THEME_WEB_ROOT . '/admin/assets/js/ut-demo-importer-reloaded.js'
        );
		
		// array for notices
        $importer_notices = array(
            'status'            => 'false',
            'missing_plugins'   => 'false',
            'missing_perm'      => 'false',
            'imported'          => get_option('ut_import_loaded') == 'active' ? "true" : "false",
            'imported_message'  => sprintf( esc_html__('Do not run the Website Installer multiple times one after another, it will result in double content. %s To reset your installation we can recommend to use: %s', 'unitedthemes'), '<br /><br />' ,'<ul><li><span class="ut-modal-highlight">' . esc_html__('WordPress Reset by Matt Martz', 'unitedthemes') . '</span></li></ul>' ),
            'imported_demo'		=> get_option('ut_demo_imported'),
			'error'             => '',
            'dashboard'         => get_admin_url() . 'admin.php?page=unite-welcome-page',
            'xmlready' 			=> esc_html__('Start Installation now!' , 'unitedthemes'),
			'frontpage'         => esc_url( home_url( '/' ) ),
        );
		
		
		
		
		$error_message    = '';
		
		// check for missing plugins
		$plugin_message = array();
		
		if( !ut_is_plugin_active('ut-portfolio/ut-portfolio.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Portfolio Management Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('ut-shortcodes/ut-shortcodes.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Shortcodes Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('ut-pricing/ut-pricing.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Pricing Table Management Plugin</span>', 'unitedthemes' );
            
        endif;
        
        if( !ut_is_plugin_active('js_composer/js_composer.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Visual Composer Plugin</span>', 'unitedthemes' );
            
        endif;
				
		if( !ut_is_plugin_active('contact-form-7/wp-contact-form-7.php') ) :
                        
            $plugin_message[] = esc_html__( '<span class="ut-modal-highlight">Contact Form 7 Plugin</span>', 'unitedthemes' );
            
        endif;
		
		// missing plugins
        if( !empty( $plugin_message ) ) {
            
            /* flag for javascript */
            $importer_notices['missing_plugins'] = 'true';
            
            /* modal content */            
            $error_message .= esc_html__( 'The following plugins are not active or installed, please activate / install them before importing the demo content.', 'unitedthemes' ) . '<ul><li>' . implode( '</li><li>', $plugin_message ) . '</li></ul>';
        
        }
		
		$importer_notices['error'] = $error_message;
		
		
		wp_localize_script( 'ut-importer', 'importer_notices', $importer_notices );
		
	}
	
	/**
	 * XML Loader for Import 
	 */
	
	public function ajax_load_xml() {
		
		$return = array();
		
		if( isset( $_REQUEST['import_xml_start'] ) && !empty( $_REQUEST['import_xml_start'] ) && array_key_exists( $_REQUEST['import_xml_start'], ut_demo_importer_info() ) ) {
			
			$xml = $this->insert_xml_as_post( $_REQUEST['import_xml_start'] );
			
			if ( is_wp_error( $xml ) ) {
				
				$this->display_error( $xml );				
				exit;
				
			}

			$data = $this->get_data_for_xml_attachment( $xml );
			
			if ( is_wp_error( $data ) ) {
				
				$this->display_error( $data );
				exit;
				
			}
			
			$return['id']   = $xml;
			$return['data'] = $data;
			
			// load markup
			header( "Content-Type: application/json" );
			echo wp_json_encode( $return );
			
			exit;
			
		} else {
						
			$xml = new WP_Error(
				'wxr_importer.upload.invalid_id',
				__( 'Invalid Demo File.', 'unitedthemes' ),
				compact( 'id' )
			);						
			
			if ( is_wp_error( $xml ) ) {
				
				$this->display_error( $xml );				
				exit;
				
			}
			
		}
		
		exit;
		
	}
		
	
	/**
	 * Ajax set Categories for Showcases so that portfolio items will display
	 */
	
	public function ajax_set_portfolio_showcase() {
		
		// check for nonce security
    	$this->verify_nonce( $_POST['nonce'] );
		
		// Layout File
		$ot_layout_file = $_REQUEST['import_xml_start'];
		
		// demo config
		$demo_config = ut_demo_importer_info();		
		
		$taxonomies = get_terms( 
			'portfolio-category', 
			array( 'hide_empty' => true )
		);
		
		$portfolio_taxonomies = array();

		// built array
		foreach($taxonomies as $taxonomy ) {

			$portfolio_taxonomies[$taxonomy->term_id] = 'on';

		}
		
		// loop through showcases
		if( !empty( $demo_config[$ot_layout_file]['showcases'] ) ) {			
					
			foreach( $demo_config[$ot_layout_file]['showcases'] as $showcase ) {

				$showcase = get_page_by_title( $showcase , 'OBJECT' , 'portfolio-manager' );
				
				// update showcase categories
				update_post_meta(
					$showcase->ID,
					'ut_portfolio_categories',
					$portfolio_taxonomies
				);

			}	

		}
		
		$this->json_return_status(true);
		
	}
	
	/**
	 * Ajax Set Settings > Reading 
	 */
	
	public function ajax_set_reading_options() {
		
		// check for nonce security
    	$this->verify_nonce( $_POST['nonce'] );
		
		// Layout File
		$ot_layout_file = $_REQUEST['import_xml_start'];
		
		// demo config
		$demo_config = ut_demo_importer_info();
		
		if( !empty( $demo_config[$ot_layout_file]['reading']['front'] ) ) {
			
			$homepage = get_page_by_title( $demo_config[$ot_layout_file]['reading']['front'] );
			
			if( isset( $homepage->ID ) ) {
				update_option('show_on_front', 'page');
				update_option('page_on_front',  $homepage->ID );
			}
			
		}
		
		if( !empty( $demo_config[$ot_layout_file]['reading']['blog'] ) ) {
			
			$posts_page = get_page_by_title( $demo_config[$ot_layout_file]['reading']['blog'] );
			
			if( isset( $posts_page->ID ) ) {
				update_option('page_for_posts', $posts_page->ID);
			}
			
		}
		
		$this->json_return_status(true);		
		
	}
	
	/**
	 * Ajax Set Primary and Mobile Navigation
	 */
	
	public function ajax_set_navigation_locations() {
		
		// check for nonce security
    	$this->verify_nonce( $_POST['nonce'] );
        		
		// layout File
		$ot_layout_file = $_REQUEST['import_xml_start'];
		
		$menus 	   = wp_get_nav_menus();
		$locations = get_theme_mod( 'nav_menu_locations' ); 
		
		// demo config
		$demo_config = ut_demo_importer_info();
		
		if( is_array( $menus ) ) {
			
			foreach( $menus as $menu ) { // assign menus to theme locations

				if( !empty( $demo_config[$ot_layout_file]['menus']['primary'] ) && $menu->name == $demo_config[$ot_layout_file]['menus']['primary'] ) {
					
					$locations['primary'] = $menu->term_id;
					
				}
				
				if( !empty( $demo_config[$ot_layout_file]['menus']['mobile'] ) && $menu->name == $demo_config[$ot_layout_file]['menus']['mobile'] ) {
					
					$locations['mobile'] = $menu->term_id;
					
				}

			}

		}

		set_theme_mod( 'nav_menu_locations', $locations );
		
		// return for browser
		$this->json_return_status(true);		
		
	}
	
	/**
	 * Ajax Set Theme Options for current Demo
	 */
	
	public function ajax_import_theme_options() {
		
		// check for nonce security
    	$this->verify_nonce( $_POST['nonce'] );
		
		// layout File
		$import_xml_start = $_REQUEST['import_xml_start'];
		
		// default file for theme activation
		$ot_layout_file = get_template_directory() . '/admin/assets/optionsdata/' . $import_xml_start . '.txt';
		
		if ( !is_readable( $ot_layout_file ) ) {
			$this->json_return_status(false);
		}
		
        // needed option tree file for operation
		include_once( THEME_DOCUMENT_ROOT . '/admin/includes/ot-functions-admin.php' );
        
        // default images for system pages
        $default_images = array();

        $default_images['ut_csection_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_csection_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_csection_background_image']['background-position'] = 'center center';
        $default_images['ut_csection_background_image']['background-size'] = 'cover';
        $default_images['ut_csection_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default-contact.jpg';

        $default_images['ut_search_hero_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_search_hero_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_search_hero_background_image']['background-position'] = 'center center';
        $default_images['ut_search_hero_background_image']['background-size'] = 'cover';
        $default_images['ut_search_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default.jpg';

        $default_images['ut_404_hero_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_404_hero_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_404_hero_background_image']['background-position'] = 'center center';
        $default_images['ut_404_hero_background_image']['background-size'] = 'cover';
        $default_images['ut_404_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default.jpg';

        $default_images['ut_favicon'] = THEME_WEB_ROOT . '/images/default/fav-32.png';
        $default_images['ut_apple_touch_icon_iphone'] = THEME_WEB_ROOT . '/images/default/fav-57.png';
        $default_images['ut_apple_touch_icon_ipad'] = THEME_WEB_ROOT . '/images/default/fav-72.png';
        $default_images['ut_apple_touch_icon_iphone_retina'] = THEME_WEB_ROOT . '/images/default/fav-114.png';
        $default_images['ut_apple_touch_icon_ipad_retina'] = THEME_WEB_ROOT . '/images/default/fav-144.png';
		
		$demo_config = ut_demo_importer_info();
		
		// no logo set for importer
		if( empty( $demo_config[$import_xml_start]['logo'] ) ) {
			
			$default_images['ut_site_logo'] = '';
            $default_images['ut_site_logo_alt'] = '';
            
            set_theme_mod( 'ut_site_logo', '' );
            set_theme_mod( 'ut_site_logo_alt', '' );
			
		}
		
		// file rawdata
		$rawdata = file_get_contents( $ot_layout_file );
		$options = isset( $rawdata ) ? unserialize( ot_decode( $rawdata ) ) : '';
				
		// get settings array
      	$settings = _ut_theme_options();		
		
		// has options 
		if ( is_array( $options ) ) {
			
			// validate options
			if ( is_array( $settings ) ) {
				
				foreach( $settings['settings'] as $setting ) {
			  
					if ( isset( $options[$setting['id']] ) ) {
                        
                        if( array_key_exists( $setting['id'], $default_images ) ) {
                            
                            if( is_array( $options[$setting['id']] ) ) {
                                
                                $options[$setting['id']] = $default_images[$setting['id']];
                                
                            } else {
                                
                                $options[$setting['id']] = $default_images[$setting['id']];
                                
                            }                            
                                                    
                        }
                        
				  		$content = ot_stripslashes( $options[$setting['id']] );
				  		$options[$setting['id']] = ot_validate_setting( $content, $setting['type'], $setting['id'] );
				  
					}										
			  
				}
			
			} // end validate
            
            
			// update the option tree array
        	update_option('option_tree', $options);
			
			// set themecolor
			if( isset( $demo_config[$import_xml_start]['themecolor'] ) ) {
				update_option('ut_accentcolor', $demo_config[$import_xml_start]['themecolor'] );
			}
			
			// set theme logo
			if( !empty( $demo_config[$import_xml_start]['logo'] ) ) {
				set_theme_mod( 'ut_site_logo', THEME_WEB_ROOT . '/images/default/' . $demo_config[$import_xml_start]['logo'] );
			} else {
				set_theme_mod( 'ut_site_logo', '' );
			}
			
			// set theme alternate logo
			if( !empty( $demo_config[$import_xml_start]['logo_alt'] ) ) {
				set_theme_mod( 'ut_site_logo_alt' , THEME_WEB_ROOT . '/images/default/' . $demo_config[$import_xml_start]['logo_alt'] );
			} else {
				set_theme_mod( 'ut_site_logo_alt', '' );
			}
			
			update_option('ut_import_loaded' , 'active');
			update_option('ut_demo_imported' , $import_xml_start);
			
			// return for browser
			$this->json_return_status( true );
		
		} else {
			
			// return for browser
			$this->json_return_status( false );
			
		}		
		
	}
	
	
	/**
	 * Ajax Import Slider Revolution
	 */
	
	public function ajax_import_slider_revolution() {
		
		// check for nonce security
    	$this->verify_nonce( $_POST['nonce'] );
		
		// current demo
		$ot_layout_file = $_REQUEST['import_xml_start'];
		
		// demo config
		$demo_config = ut_demo_importer_info();
		
		if( class_exists('RevSlider') && !empty( $demo_config[$ot_layout_file]['sliderev'] ) ) {
			
			foreach( $demo_config[$ot_layout_file]['sliderev'] as $revslider ) {
				
				$_FILES["import_file"]["tmp_name"] = THEME_DOCUMENT_ROOT . '/admin/assets/optionsdata/revslider/' . basename( $revslider );
				
				$slider = new RevSlider();
				$slider->importSliderFromPost();
				
				
			}
			
		}		
		
		// return for browser
		$this->json_return_status( true );
		
	}
	
	
	/**
	 * Ajax Update URLs
	 */
		
	public function ajax_update_urls() {
		
		global $wpdb;
		
		// check for nonce security
    	$this->verify_nonce( $_POST['nonce'] );
				
		// current demo
		$ot_layout_file = $_REQUEST['import_xml_start'];
		
		// demo config
		$demo_config = ut_demo_importer_info();
		
		// set URLS		
		$oldurl = $demo_config[$ot_layout_file]['xml_url'];
		$newurl = esc_url( home_url( '/' ) );
		
		// AWS based
		$aws_support = !empty( $demo_config[$ot_layout_file]['s3_bucket'] );
				
		// options to check
		$options = array(
			'content',
			'excerpts',
			'attachments',
			'links',
			'guids',
			'custom'
		);
		
		// queries to execute
		$queries = array(
			'content' 		=> "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)",
			'excerpts' 		=> "UPDATE $wpdb->posts SET post_excerpt = replace(post_excerpt, %s, %s)",
			'attachments' 	=> "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s) WHERE post_type = 'attachment'",
			'links' 		=> "UPDATE $wpdb->links SET link_url = replace(link_url, %s, %s)",
			'custom' 		=> "UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)",
			'guids' 		=> "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s)"
		);
		
		foreach( $options as $option ) {
			
			if( $option == 'custom' ){
				
				$row_count = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->postmeta" );
				$page_size = 10000;
				$pages = ceil( $row_count / $page_size );
				

				for( $page = 0; $page < $pages; $page++ ) {
					
					$current_row = 0;
					$start = $page * $page_size;
					$end = $start + $page_size;
					
					$pmquery = "SELECT * FROM $wpdb->postmeta WHERE meta_value <> ''";
					$items = $wpdb->get_results( $pmquery );
					
					foreach( $items as $item ){
						
						$value = $item->meta_value;
						
						if( trim( $value ) == '' ) {
							continue;
						}						
						
						// update XML URLs
						$edited = $this->unserialize_replace( $oldurl, $newurl, $value );

						if( $edited != $value ){
							
							$fix = $wpdb->query("UPDATE $wpdb->postmeta SET meta_value = '".$edited."' WHERE meta_id = ".$item->meta_id );
							
						}
												
						// update AWS URLs
						if( $aws_support ) {
							
							$edited = $this->unserialize_replace( $demo_config[$ot_layout_file]['s3_bucket'], $newurl . 'wp-content/uploads/', $value );
							
							if( $edited != $value ) {
								
								$fix = $wpdb->query("UPDATE $wpdb->postmeta SET meta_value = '".$edited."' WHERE meta_id = ".$item->meta_id );
								
							}
							
						}
						
					}
					
				}
				
			} else{
				
				$result = $wpdb->query( $wpdb->prepare( $queries[$option], $oldurl, $newurl ) );				
				
				// update AWS URLs
				if( $aws_support ){
					
					$result = $wpdb->query( $wpdb->prepare( $queries[$option], $demo_config[$ot_layout_file]['s3_bucket'], $newurl . 'wp-content/uploads/' ) );
					
				}
				
			}
			
		}
		
		// return for browser
		$this->json_return_status( true );
		
	}
	
	function unserialize_replace( $from = '', $to = '', $data = '', $serialised = false ) {

		if ( false !== is_serialized( $data ) ) {
			
			$unserialized = unserialize( $data );
			$data = $this->unserialize_replace( $from, $to, $unserialized, true );
			
		}
		
		elseif ( is_array( $data ) ) {
			
			$_tmp = array( );
			foreach ( $data as $key => $value ) {
				$_tmp[ $key ] = $this->unserialize_replace( $from, $to, $value, false );
			}
			
			$data = $_tmp;
			unset( $_tmp );
			
		} else {
			
			if ( is_string( $data ) ) {
				$data = str_replace( $from, $to, $data );
			}
			
		}

		if ( $serialised ) {
			return serialize( $data );
		}
		
		return $data;
		
	}
	
	
	
	/**
	 * Insert XML file as post
	 *
	 */
	
	protected function insert_xml_as_post( $id ) {
				
		// check if xml has been created before
		$xml = get_page_by_title( $id . '.xml.txt', OBJECT, 'ut_import_attachment' );
		
		if( isset( $xml->ID ) ) {
			return $xml->ID;
		}
		
		// create xml entry
		$xml = wp_insert_post( array(
			'post_type' 		=> 'ut_import_attachment',
			'post_title'		=>	$id . '.xml.txt',
			'post_content'		=>	THEME_WEB_ROOT . '/admin/assets/xml/unzip/' . $id . '.xml.txt',
			'guid'				=>	THEME_WEB_ROOT . '/admin/assets/xml/unzip/' . $id . '.xml',
			'ping_status'		=> 'closed',
			'comment_status'	=> 'closed',
			'post_status'		=> 'private'
		) );		
		
		// for some reason the insert failed
		if ( ! is_numeric( $xml ) || intval( $xml ) < 1 ) {
			return new WP_Error(
				'wxr_importer.upload.invalid_id',
				__( 'Could not create demo xml. Please contact theme support.', 'unitedthemes' ),
				compact( 'id' )
			);
		}
		
		// set attached file meta
		update_post_meta( $xml, '_wp_attached_file', '/admin/assets/xml/unzip/' . $id . '.xml' );
		
		return $xml;
		
	}
	
	
	/**
	 * Get preliminary data for an import file.
	 *
	 * This is a quick pre-parse to verify the file and grab authors from it.
	 *
	 * @param int $id Media item ID.
	 * @return WXR_Import_Info|WP_Error Import info instance on success, error otherwise.
	 */
	
	protected function get_data_for_xml_attachment( $id ) {
		
		$existing = get_post_meta( $id, '_wxr_import_info', true );
		
		if ( ! empty( $existing ) ) {
			return $existing;
		}

		$file = get_post_meta( $id, '_wp_attached_file', true );

		$importer = new WXR_Importer();
		$data 	  = $importer->get_preliminary_information( $file );
		
		if ( is_wp_error( $data ) ) {
			return $data;
		}

		// Cache the information on the upload
		if ( ! update_post_meta( $id, '_wxr_import_info', $data ) ) {
			return new WP_Error(
				'wxr_importer.upload.failed_save_meta',
				__( 'Could not cache information on the import. Please contact theme support.', 'unitedthemes' ),
				compact( 'id' )
			);
		}

		return $data;
		
	}
	
}

$ut_import = new UT_Import();

// Ajax Actions
add_action( 'wp_ajax_ut_load_xml', array( $ut_import, 'ajax_load_xml' ) );

// Ajax Import Actions
add_action( 'wp_ajax_ut_import_revslider', array( $ut_import, 'ajax_import_slider_revolution' ) );
add_action( 'wp_ajax_ut_import_theme_options', array( $ut_import, 'ajax_import_theme_options' ) );

// Ajax Configuration Settings
add_action( 'wp_ajax_ut_set_settings_reading', array( $ut_import, 'ajax_set_reading_options' ) );
add_action( 'wp_ajax_ut_set_navigation_locations', array( $ut_import, 'ajax_set_navigation_locations' ) );
add_action( 'wp_ajax_ut_set_portfolio_showcases', array( $ut_import, 'ajax_set_portfolio_showcase' ) );
add_action( 'wp_ajax_ut_update_urls', array( $ut_import, 'ajax_update_urls' ) );