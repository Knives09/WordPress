<?php
/*
Plugin Name: Post Carousel
Description: This plugin will enable Post Carousel in your WordPress site.
Plugin URI: http://shapedplugin.com/plugin/post-carousel
Author: ShapedPlugin
Author URI: http://shapedplugin.com
Version: 1.0
*/


/* Define */
define( 'SP_PC_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'SP_PC_PATH', plugin_dir_path( __FILE__ ) );

// Load Text Domain
function post_carousel_load_textdomain() {
	load_plugin_textdomain( 'post-carousel', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'post_carousel_load_textdomain' );

// Post thumbnails
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-carousel-thumb', 600, 400, true );

/* Including files */
if(file_exists( SP_PC_PATH . 'inc/scripts.php')){
	require_once(SP_PC_PATH . "inc/scripts.php");
}
if(file_exists( SP_PC_PATH . 'inc/shortcodes.php')){
	require_once(SP_PC_PATH . "inc/shortcodes.php");
}