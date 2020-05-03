<?php

function n8astro_enqueue_styles() {
    wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' , get_template_directory_uri() . '/bootstrap/css/bootstrap-grid.min.css', get_template_directory_uri() . '/bootstrap/css/bootstrap-reboot.min.css'  );
    $dependencies = array('bootstrap');
    wp_enqueue_style( 'n8astro-style', get_stylesheet_uri(), $dependencies ); 
}

function n8astro_enqueue_scripts() {
    $dependencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', $dependencies, '4.4.1', true );
}

function n8astro_wp_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support( 'title-tag' );
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
        );
    add_theme_support( 'custom-logo', $defaults );
}

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
        // File does not exist... return an error.
        return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
    } else {
        // File exists... require it.
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
}

function n8astro_register_menu() {
    register_nav_menu('header-menu', __( 'Header Menu'));
}

function n8astro_widgets_init() {

    register_sidebar( array(
        'name'          => 'Footer - Copyright Text',
        'id'            => 'footer_copyright_text',
        'before_widget' => '<div class="footer_copyright_text">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => 'Sidebar - Inset',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="sidebar-module sidebar-module-inset">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Sidebar - Default',
        'id'            => 'sidebar-2',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}

add_action( 'wp_enqueue_scripts', 'n8astro_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'n8astro_enqueue_scripts' );
add_action( 'after_setup_theme', 'n8astro_wp_setup' );
add_action( 'init', 'n8astro_register_menu' );
add_action( 'widgets_init', 'n8astro_widgets_init' );
add_action( 'after_setup_theme', 'register_navwalker' );

?>