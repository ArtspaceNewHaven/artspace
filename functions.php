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
    wp_register_script( 'minigrid', get_stylesheet_directory_uri() . '/bower_components/minigrid/minigrid.min.js', array('jquery'), '1.6.3', true );

    wp_enqueue_script( 'masonry' );

    if( is_page_template( 'templates/home.php' ) || is_singular('exhibitions')) {
      wp_enqueue_script('slick');
      wp_enqueue_script('minigrid');
    }
}

function remove_parent_widgets(){
	unregister_sidebar( 'footer-widgets' );
}
add_action( 'widgets_init', 'remove_parent_widgets', 11 );

require_once( get_stylesheet_directory() . '/library/navigation.php' );


// Add Custom Post Type
require_once( get_stylesheet_directory() . '/library/artists.php' );
require_once( get_stylesheet_directory() . '/library/exhibitions.php' );
require_once( get_stylesheet_directory() . '/library/opportunities.php' );
require_once( get_stylesheet_directory() . '/library/flatfiles.php' );
require_once( get_stylesheet_directory() . '/library/media-fields.php' );
require_once( get_stylesheet_directory() . '/library/artspace-taxs.php' );
require_once( get_stylesheet_directory() . '/library/cwos.php' );
require_once( get_stylesheet_directory() . '/library/gala.php' );
require_once( get_stylesheet_directory() . '/library/air.php' );
require_once( get_stylesheet_directory() . '/library/sponsors.php' );


// Admin and Utility Functions
require_once( get_stylesheet_directory() . '/library/utility.php' );
require_once( get_stylesheet_directory() . '/library/widget-areas.php' );
require_once( get_stylesheet_directory() . '/library/post-archives.php' );

// Add Options Pages
require_once( get_stylesheet_directory() . '/library/option-pages.php' );

/// Custom Excerpts
// Need to add if statement here 
  function custom_excerpt_length( $length ) {
    if (is_post_type_archive('exhibitions')) {
      return 25;
    } else {
      return 55;
    }
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

