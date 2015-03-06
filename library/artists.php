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
		'taxonomies'          => array(),
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
        'title'         => __( 'General Info', 'cmb2' ),
        'object_types'  => array( 'artists', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'fields'        => array(
            array(
                'name'    => 'Primary Media',
                'id'      => $prefix . 'primary_media',
                'type'    => 'text'
            ),
            array(
                'name'    => 'Secondary Media',
                'id'      => $prefix . 'secondary_media',
                'type'    => 'text'
            ),
            array(
                'name' => 'Address',
                'id' => $prefix . 'address',
                'type' => 'textarea_small'
            ),
            array(
                'name'    => 'Neighborhood',
                'id'      => $prefix . 'neighborhood',
                'type'    => 'text'
            ),
            array(
                'name' => __( 'Website', 'cmb2' ),
                'id'   => $prefix . 'url',
                'type' => 'text_url',
                // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
                // 'repeatable' => true,
            ),
            array(
                'name' => __( 'Email', 'cmb2' ),
                'id'   => $prefix . 'email',
                'type' => 'text_email',
                // 'repeatable' => true,
            ),
        ),
    );

    $meta_boxes['artiststatement_metabox'] = array(
        'id'            => 'artiststatement_metabox',
        'title'         => __( 'Statement & Bio', 'cmb2' ),
        'object_types'  => array( 'artists', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'fields'        => array(
            array(
                'name' => 'Statement',
                'id' => $prefix . 'statement',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
            array(
                'name' => 'Bio',
                'id' => $prefix . 'bio',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        ),
    );

    $meta_boxes['selectedworks_metabox'] = array(
        'id'            => 'selectedworks_metabox',
        'title'         => __( 'Selected Works', 'cmb2' ),
        'object_types'  => array( 'artists', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'fields'        => array(
            array(
                'name' => 'Selected Works',
                'desc' => '',
                'id' => $prefix . 'works',
                'type' => 'file_list',
                // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
            ),
        ),
    );


    // Add other metaboxes as needed

    return $meta_boxes;
}