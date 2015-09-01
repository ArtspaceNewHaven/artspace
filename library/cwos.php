<?php 
// Register Custom Post Type
function artspace_cwos() {

  $labels = array(
    'name'                => _x( 'CWOS', 'Post Type General Name', 'text_domain' ),
    'singular_name'       => _x( 'CWOS', 'Post Type Singular Name', 'text_domain' ),
    'menu_name'           => __( 'CWOS', 'text_domain' ),
    'name_admin_bar'      => __( 'CWOS', 'text_domain' ),
    'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
    'all_items'           => __( 'All CWOS', 'text_domain' ),
    'add_new_item'        => __( 'Add New CWOS', 'text_domain' ),
    'add_new'             => __( 'Add New', 'text_domain' ),
    'new_item'            => __( 'New CWOS', 'text_domain' ),
    'edit_item'           => __( 'Edit CWOS', 'text_domain' ),
    'update_item'         => __( 'Update CWOS', 'text_domain' ),
    'view_item'           => __( 'View CWOS', 'text_domain' ),
    'search_items'        => __( 'Search CWOS', 'text_domain' ),
    'not_found'           => __( 'Not found', 'text_domain' ),
    'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
  );
  $args = array(
    'label'               => __( 'cwos', 'text_domain' ),
    'description'         => __( 'CWOS', 'text_domain' ),
    'labels'              => $labels,
    'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'page-attributes' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_position'       => 5,
    'menu_icon'           => 'dashicons-screenoptions',
    'show_in_admin_bar'   => true,
    'show_in_nav_menus'   => true,
    'can_export'          => true,
    'has_archive'         => true,    
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
  );
  register_post_type( 'cwos', $args );

}

// Hook into the 'init' action
add_action( 'init', 'artspace_cwos', 0 );