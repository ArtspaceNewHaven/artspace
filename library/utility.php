<?php

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

/// Add Custom Menu for Very Top Area
// Register Navigation Menus
function artspace_aboutmenu() {

	$locations = array(
		'orange' => __( 'Top About Menu', 'text_domain' ),
	);
	register_nav_menus( $locations );

}

// Hook into the 'init' action
add_action( 'init', 'artspace_aboutmenu' );