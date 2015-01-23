<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    //wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    //wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'parent-style' ) );
    wp_enqueue_style( 'child-foundation', get_stylesheet_directory_uri() . '/css/app.css' );

}

// Add Custom Post Type
require_once( get_stylesheet_directory() . '/library/artists.php' );
require_once( get_stylesheet_directory() . '/library/exhipitions.php' );
require_once( get_stylesheet_directory() . '/library/opportunities.php' );
require_once( get_stylesheet_directory() . '/library/media-fields.php' );

// Add locations taxonomy for Exhibitions
// Main Gallery, Project Room, Flat File, Crown St. Window, The Lot, Shop Window, Offsite