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


// Allow Email Login
add_filter('authenticate', 'artspace_allow_email_login', 20, 3);
/**
 * bainternet_allow_email_login filter to the authenticate filter hook, to fetch a username based on entered email
 * @param  obj $user
 * @param  string $username [description]
 * @param  string $password [description]
 * @return boolean
 */
function artspace_allow_email_login( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by_email( $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password(null, $username, $password );
}
 
add_filter( 'gettext', 'addEmailToLogin', 20, 3 );
/**
 * addEmailToLogin function to add email address to the username label
 * @param string $translated_text   translated text
 * @param string $text              original text
 * @param string $domain            text domain
 */
function addEmailToLogin( $translated_text, $text, $domain ) {
    if ( "Username" == $translated_text )
        $translated_text .= __( ' Or Email');
    return $translated_text;
}