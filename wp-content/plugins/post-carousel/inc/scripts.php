<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*** Plugin Scripts and CSS ***/
if (!function_exists('sp_pc_scripts_and_style')) {
	function sp_pc_scripts_and_style(){
		// CSS Files
		wp_enqueue_style('owl-carousel-css', SP_PC_URL . 'assets/css/owl.carousel.css', array(), NULL);
		wp_enqueue_style('pc-style', SP_PC_URL . 'assets/css/style.css');

		//JS Files
		wp_enqueue_script( 'owl-carousel-min-js', SP_PC_URL . 'assets/js/owl.carousel.min.js', array('jquery'), NULL, TRUE );
	}
	add_action('wp_enqueue_scripts', 'sp_pc_scripts_and_style');
}
