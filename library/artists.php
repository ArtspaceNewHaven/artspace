<?php
if ( ! function_exists('artists_post_type') ) {

// Register Custom Post Type
function artists_post_type() {

	$labels = array(
		'name'                => _x( 'Artists', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Artist', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Artists', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Artists', 'text_domain' ),
		'view_item'           => __( 'View Artist', 'text_domain' ),
		'add_new_item'        => __( 'Add New Artist', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Artist', 'text_domain' ),
		'update_item'         => __( 'Update Artist', 'text_domain' ),
		'search_items'        => __( 'Search Artists', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'artist', 'text_domain' ),
		'description'         => __( 'Artist post type', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-art',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'artists', $args );

}

// Hook into the 'init' action
add_action( 'init', 'artists_post_type', 0 );

}

/// Custom Fields For Artists

add_filter( 'cmb2_meta_boxes', 'artist_metaboxes' );

function artist_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_artist_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $meta_boxes['artist_metabox'] = array(
        'id'            => 'artist_metabox',
        'title'         => __( 'Test Metabox', 'cmb2' ),
        'object_types'  => array( 'artist', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'fields'        => array(
            array(
                'name'       => __( 'Test Text', 'cmb2' ),
                'desc'       => __( 'field description (optional)', 'cmb2' ),
                'id'         => $prefix . 'text',
                'type'       => 'text',
                'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
                // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
                // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
                // 'on_front'        => false, // Optionally designate a field to wp-admin only
                // 'repeatable'      => true,
            ),
            array(
                'name' => __( 'Website URL', 'cmb2' ),
                'desc' => __( 'field description (optional)', 'cmb2' ),
                'id'   => $prefix . 'url',
                'type' => 'text_url',
                // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
                // 'repeatable' => true,
            ),
            array(
                'name' => __( 'Test Text Email', 'cmb2' ),
                'desc' => __( 'field description (optional)', 'cmb2' ),
                'id'   => $prefix . 'email',
                'type' => 'text_email',
                // 'repeatable' => true,
            ),
        ),
    );

    // Add other metaboxes as needed

    return $meta_boxes;
}