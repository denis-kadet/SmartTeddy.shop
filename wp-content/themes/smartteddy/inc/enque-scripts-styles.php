<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
* Enqueue scripts and styles.
 */
function smartteddy_scripts() {
    wp_enqueue_style( 'smartteddy-style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_style_add_data( 'smartteddy-style', 'rtl', 'replace' );

    wp_enqueue_script( 'smartteddy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    wp_enqueue_style('style_custom',  get_template_directory_uri().'/assets/css/style.min.css');
    wp_deregister_script( 'jquery-core' );
    wp_enqueue_script('script_custom',  get_template_directory_uri().'/assets/js/main.min.js', 'all');
}
add_action( 'wp_enqueue_scripts', 'smartteddy_scripts' );