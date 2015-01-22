<?php 
// Register Custom Post Type
function artspace_opportunities() {

	$labels = array(
		'name'                => _x( 'Opportunities', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Opportunity', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Opportunities', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Opportunities:', 'text_domain' ),
		'all_items'           => __( 'All Opportunities', 'text_domain' ),
		'view_item'           => __( 'View Opportunities', 'text_domain' ),
		'add_new_item'        => __( 'Add New Opportunities', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Opportunities', 'text_domain' ),
		'update_item'         => __( 'Update Opportunities', 'text_domain' ),
		'search_items'        => __( 'Search Opportunities', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'opportunities', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-tools',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'opportunities', $args );

}

// Hook into the 'init' action
add_action( 'init', 'artspace_opportunities', 0 );
 ?>