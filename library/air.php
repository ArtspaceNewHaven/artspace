<?php
function artspace_air() {

  $labels = array(
    'name'                => _x( 'AIRs', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'AIR', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'AIRs', 'text_domain' ),
    'name_admin_bar'      => __( 'AIRs', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
    'all_items'           => __( 'All AIRs', 'text_domain' ),
    'add_new_item'        => __( 'Add New AIR', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'new_item'            => __( 'New AIR', 'text_domain' ),
    'edit_item'           => __( 'Edit AIR', 'text_domain' ),
    'update_item'         => __( 'Update AIR', 'text_domain' ),
    'view_item'           => __( 'View AIR', 'text_domain' ),
    'search_items'        => __( 'Search AIR', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'AIR', 'text_domain' ),
    'description'         => __( 'AIR', 'text_domain' ),
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
  register_post_type( 'air', $args );

}
add_action( 'init', 'artspace_air', 0 );