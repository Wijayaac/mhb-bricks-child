<?php

/**
 * Register/enqueue custom scripts and styles
 */
add_action('wp_enqueue_scripts', function () {
  // Enqueue your files on the canvas & frontend, not the builder panel. Otherwise custom CSS might affect builder)
  if (!bricks_is_builder_main()) {
    $my_js_ver  = date("ymd-Gis", filemtime(plugin_dir_path(__FILE__) . 'assets/js/script.js'));
    wp_enqueue_script('mhb-js', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), $my_js_ver);
    wp_enqueue_style('mhb-style', get_stylesheet_uri(), ['bricks-frontend'], filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('mhb-style-main', get_stylesheet_directory_uri() . '/assets/css/main.css');
  }
});

/** 
 * Add template recommendations to the single post content
 */
require 'inc/template-recommendation.php';
