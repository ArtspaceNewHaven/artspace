<?php 
 function artspace_sponsors() {

  $labels = array(
    'name'                => _x( 'Sponsors', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Sponsors', 'text_domain' ),
    'name_admin_bar'      => __( 'Sponsors', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
    'all_items'           => __( 'All Sponsors', 'text_domain' ),
    'add_new_item'        => __( 'Add New Sponsor', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'new_item'            => __( 'New Sponsor', 'text_domain' ),
    'edit_item'           => __( 'Edit Sponsor', 'text_domain' ),
    'update_item'         => __( 'Update Sponsor', 'text_domain' ),
    'view_item'           => __( 'View Sponsor', 'text_domain' ),
    'search_items'        => __( 'Search Sponsor', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Sponsor', 'text_domain' ),
    'description'         => __( 'Post Type Description', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'thumbnail', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-thumbs-up',
    'show_in_admin_bar'   => false,
    'show_in_nav_menus'   => false,
    'can_export'          => true,
    'has_archive'         => false,   
    'exclude_from_search' => true,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'sponsors', $args );

}
add_action( 'init', 'artspace_sponsors', 0 );