<?php
	/*
	Plugin Name: Advanced Carousel Post Slider 
	Plugin URI: https://github.com/beyond88/Advanced-Carousel-Post-Slider
	Description: Advanced Carousel Post Slider is a WordPress plugin will help you create nice-looking, responsive and mobile friendly post slider from multiple categories to showcase your posts or display particular blog posts category.
	Version: 1.0.0
	Author: Mohiuddin Abdul Kader
	Author URI: https://profiles.wordpress.org/hossain88/
	TextDomain: advanced-carousel-post-slider
	License: copyright@domain.com
	*/


	if( !defined( 'ABSPATH' ) ){
	    exit;
	}

	define( 'ADVNCPS_PLUGIN_PATH', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define( 'ADVNCPS_PLUGIN_DIR', plugin_dir_path(__FILE__) );

	function advncps_init(){

		wp_enqueue_script( 'jquery' );
		wp_enqueue_style( 'advncps-fontawesome-css', ADVNCPS_PLUGIN_PATH.'assets/css/font-awesome.min.css' );
		wp_enqueue_style( 'advncps-carousel-css', ADVNCPS_PLUGIN_PATH.'assets/css/owl.carousel.min.css' );
		wp_enqueue_style( 'advncps-theme-css', ADVNCPS_PLUGIN_PATH.'assets/css/owl.theme.default.css' );
		wp_enqueue_style( 'advncps-animate-css', ADVNCPS_PLUGIN_PATH.'assets/css/animate.css' );
		wp_enqueue_style( 'advncps-main-css', ADVNCPS_PLUGIN_PATH.'assets/css/advncps.main.css' );
		wp_enqueue_script( 'advncps_main_js', plugins_url( 'assets/js/advncps.main.js', __FILE__), array(), '1.0.0', true );
		wp_enqueue_script( 'advncps_owl_carousel_js', plugins_url( '/assets/js/owl.carousel.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'advncps_mousewheel_js', plugins_url( '/assets/js/jquery.mousewheel.min.js' , __FILE__ ) , array( 'jquery' ) );
		wp_enqueue_script( 'advncps_jscolor_js', plugins_url( '/assets/js/jscolor.js' , __FILE__ ) , array( 'jquery' ) );

	}
	add_action( 'init', 'advncps_init' );



	# Load plugin Translations
	function advncps_load_textdomain(){
		
		load_plugin_textdomain( 'advanced-carousel-post-slider', false, dirname( plugin_basename( __FILE__ ) ) .'/languages/' );
	}
	add_action( 'plugins_loaded', 'advncps_load_textdomain' );
	

	# Post Type
	require_once( 'lib/post-type/advncps-post-type.php' );

	# Metabox
	require_once( 'lib/metaboxes/advncps-metaboxes.php' );

	#Shortcode
	require_once( 'lib/shortcodes/advncps-shortcode.php' );