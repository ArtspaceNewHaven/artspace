<?php
function artspace_gala() {

  $labels = array(
    'name'                => _x( 'Galas', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'Gala', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'Galas', 'text_domain' ),
    'name_admin_bar'      => __( 'Galas', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
    'all_items'           => __( 'All Galas', 'text_domain' ),
    'add_new_item'        => __( 'Add New Gala', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'new_item'            => __( 'New Gala', 'text_domain' ),
    'edit_item'           => __( 'Edit Gala', 'text_domain' ),
    'update_item'         => __( 'Update Gala', 'text_domain' ),
    'view_item'           => __( 'View Gala', 'text_domain' ),
    'search_items'        => __( 'Search Gala', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'Gala', 'text_domain' ),
    'description'         => __( 'Gala', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes', 'post-formats', ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-art',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,    
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'gala', $args );

}
add_action( 'init', 'artspace_gala', 0 );