<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function smartteddy_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'smartteddy' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'smartteddy' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'smartteddy_widgets_init' );

/**
 * добавления поля в футер для виджета рассылок
 */
register_sidebar(array(
    'name' => 'Footer Widget 1',
    'id' => 'footer-1',
    'description' => 'Первая область',
    'before_widget' => '<div class="wsfooterwdget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
));