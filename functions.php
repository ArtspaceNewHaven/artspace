<?php

/// Add ACF
add_filter('acf/settings/path', 'acf_settings_path');
 
function acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/library/acf/';
    return $path;
}

add_filter('acf/settings/dir', 'acf_settings_dir');
 
function acf_settings_dir( $dir ) {
  $dir = get_stylesheet_directory_uri() . '/library/acf/';
  return $dir;  
}

//add_filter('acf/settings/show_admin', '__return_false');

include_once( get_stylesheet_directory() . '/library/acf/acf.php' );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    //wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
    wp_enqueue_style( 'child-foundation', get_stylesheet_directory_uri() . '/css/app.css' );

    wp_register_script( 'masonry', get_template_directory_uri() . '/bower_components/masonry/dist/masonry.pkgd.min.js', array('jquery'), '3.0.0', true );
    wp_register_script( 'slick', get_stylesheet_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '1.5.5', true );

    wp_enqueue_script( 'masonry' );

    if( is_page_template( 'templates/home.php' )) {
      wp_enqueue_script('slick');
    }
}

function remove_parent_widgets(){
	unregister_sidebar( 'footer-widgets' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11 );

// Add Custom Post Type
require_once( get_stylesheet_directory() . '/library/artists.php' );
require_once( get_stylesheet_directory() . '/library/exhibitions.php' );
require_once( get_stylesheet_directory() . '/library/opportunities.php' );
require_once( get_stylesheet_directory() . '/library/flatfiles.php' );
require_once( get_stylesheet_directory() . '/library/media-fields.php' );
require_once( get_stylesheet_directory() . '/library/artspace-taxs.php' );
require_once( get_stylesheet_directory() . '/library/cwos.php' );

// Admin and Utility Functions
require_once( get_stylesheet_directory() . '/library/utility.php' );
require_once( get_stylesheet_directory() . '/library/widget-areas.php' );
require_once( get_stylesheet_directory() . '/library/post-archives.php' );

// Add Options Pages
require_once( get_stylesheet_directory() . '/library/option-pages.php' );

