<?php

/**
 * Register Menus
 * http://codex.wordpress.org/Function_Reference/register_nav_menus#Examples
 */
register_nav_menus(array(
    'top-bar-l' => 'Left Top Bar', // registers the menu in the WordPress admin menu editor
    'top-bar-r' => 'Right Top Bar',
    'cwos-l' => 'CWOS Right Nav',
    'cwos-r' => 'CWOS Left Nav',
    'mobile-off-canvas' => 'Mobile'
));


/**
 * Left top bar
 * http://codex.wordpress.org/Function_Reference/wp_nav_menu
 */
if ( ! function_exists( 'SimpleSpaceship_top_bar_l' ) ) {
	function SimpleSpaceship_top_bar_l() {
	    wp_nav_menu(array( 
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'top-bar-menu left',            // adding custom nav class
	        'theme_location' => 'top-bar-l',                // where it's located in the theme
	        'before' => '',                                 // before each link <a> 
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new Roots_Nav_Walker()
	    ));
	}
}

/**
 * Right top bar
 */
if ( ! function_exists( 'SimpleSpaceship_top_bar_r' ) ) {
	function SimpleSpaceship_top_bar_r() {
	    wp_nav_menu(array( 
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'top-bar-menu right',           // adding custom nav class
	        'theme_location' => 'top-bar-r',                // where it's located in the theme
	        'before' => '',                                 // before each link <a> 
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new Roots_Nav_Walker()
	    ));
	}
}

/**
 * Mobile off-canvas
 */
if ( ! function_exists( 'SimpleSpaceship_mobile_off_canvas' ) ) {
	function SimpleSpaceship_mobile_off_canvas() {
	    wp_nav_menu(array( 
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'off-canvas-list',              // adding custom nav class
	        'theme_location' => 'mobile-off-canvas',        // where it's located in the theme
	        'before' => '',                                 // before each link <a> 
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new Roots_Nav_Walker()
	    ));
	}
}

/* City Wide Open Studios Menus */
if ( ! function_exists( 'cwos_top_bar_l' ) ) {
	function cwos_top_bar_l() {
	    wp_nav_menu(array( 
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'top-bar-menu left',            // adding custom nav class
	        'theme_location' => 'cwos-l',                // where it's located in the theme
	        'before' => '',                                 // before each link <a> 
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new Roots_Nav_Walker()
	    ));
	}
}

/**
 * Right top bar for City Wide Open Studios
 */
if ( ! function_exists( 'cwos_top_bar_r' ) ) {
	function cwos_top_bar_r() {
	    wp_nav_menu(array( 
	        'container' => false,                           // remove nav container
	        'container_class' => '',                        // class of container
	        'menu' => '',                                   // menu name
	        'menu_class' => 'top-bar-menu right',           // adding custom nav class
	        'theme_location' => 'cwos-r',                // where it's located in the theme
	        'before' => '',                                 // before each link <a> 
	        'after' => '',                                  // after each link </a>
	        'link_before' => '',                            // before each link text
	        'link_after' => '',                             // after each link text
	        'depth' => 5,                                   // limit the depth of the nav
	        'fallback_cb' => false,                         // fallback function (see below)
	        'walker' => new Roots_Nav_Walker()
	    ));
	}
}

/** 
 * Add support for buttons in the top-bar menu: 
 * 1) In WordPress admin, go to Apperance -> Menus. 
 * 2) Click 'Screen Options' from the top panel and enable 'CSS CLasses' and 'Link Relationship (XFN)'
 * 3) On your menu item, type 'has-form' in the CSS-classes field. Type 'button' in the XFN field
 * 4) Save Menu. Your menu item will now appear as a button in your top-menu
*/
if ( ! function_exists( 'add_menuclass') ) {
	function add_menuclass($ulclass) {
	    $find = array('/<a rel="button"/', '/<a title=".*?" rel="button"/');
	    $replace = array('<a rel="button" class="button"', '<a rel="button" class="button"');
	    
	    return preg_replace($find, $replace, $ulclass, 1);
	}
	add_filter('wp_nav_menu','add_menuclass');
}

?>
