<?php

// Register Medium
function artspace_medium() {

	$labels = array(
		'name'                       => _x( 'Mediums', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Medium', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Medium', 'text_domain' ),
		'all_items'                  => __( 'All Medium', 'text_domain' ),
		'parent_item'                => __( 'Parent Medium', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Medium:', 'text_domain' ),
		'new_item_name'              => __( 'New Medium Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Medium', 'text_domain' ),
		'edit_item'                  => __( 'Edit Medium', 'text_domain' ),
		'update_item'                => __( 'Update Medium', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate medium with commas', 'text_domain' ),
		'search_items'               => __( 'Search Mediums', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'medium', array( 'flatfiles', 'artists', 'attachment' ), $args );

}


add_action( 'init', 'artspace_medium', 0 );


/// Register Keywords
function artspace_keyword() {

	$labels = array(
		'name'                       => _x( 'Keywords', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Keyword', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Keyword', 'text_domain' ),
		'all_items'                  => __( 'All Keyword', 'text_domain' ),
		'parent_item'                => __( 'Parent Keyword', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Keyword:', 'text_domain' ),
		'new_item_name'              => __( 'New Keyword Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Keyword', 'text_domain' ),
		'edit_item'                  => __( 'Edit Keyword', 'text_domain' ),
		'update_item'                => __( 'Update Keyword', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate keyword with commas', 'text_domain' ),
		'search_items'               => __( 'Search Keywords', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'keyword', array( 'flatfiles', 'artists', 'attachment' ), $args );

}


add_action( 'init', 'artspace_keyword', 0 );

/// Register State
function artspace_location() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Location', 'text_domain' ),
		'all_items'                  => __( 'All Location', 'text_domain' ),
		'parent_item'                => __( 'Parent Location', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Location:', 'text_domain' ),
		'new_item_name'              => __( 'New Location Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Location', 'text_domain' ),
		'edit_item'                  => __( 'Edit Location', 'text_domain' ),
		'update_item'                => __( 'Update Location', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate locations with commas', 'text_domain' ),
		'search_items'               => __( 'Search Locations', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'location', array( 'artists', 'attachment', 'exhibitions' ), $args );

}


add_action( 'init', 'artspace_location', 0 );