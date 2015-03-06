<?php 
 function artspace_flatfile() {

	$labels = array(
		'name'                => _x( 'Flatfiles', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Flatfile', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Flatfiles', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent File:', 'text_domain' ),
		'all_items'           => __( 'All Flatfiles', 'text_domain' ),
		'view_item'           => __( 'View File', 'text_domain' ),
		'add_new_item'        => __( 'Add New Flatfile', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit File', 'text_domain' ),
		'update_item'         => __( 'Update File', 'text_domain' ),
		'search_items'        => __( 'Search Flatfiles', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'flatfiles', 'text_domain' ),
		'description'         => __( 'Flatfiles', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', ),
		'taxonomies'          => array(),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-tagcloud',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'flatfiles', $args );

}

// Hook into the 'init' action
add_action( 'init', 'artspace_flatfile', 0 );