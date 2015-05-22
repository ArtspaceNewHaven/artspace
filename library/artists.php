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
        'title'         => __( 'Statement', 'cmb2' ),
        'object_types'  => array( 'artists', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'fields'        => array(
            array(
                'name' => 'Bio',
                'id' => $prefix . 'bio',
                'type' => 'wysiwyg',
                'options' => array(),
            ),
        ),
    );


    // Add other metaboxes as needed

    return $meta_boxes;
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
    'key' => 'group_554cd3570863b',
    'title' => 'Artist Fields',
    'fields' => array (
        array (
            'key' => 'field_554cd3669db4c',
            'label' => 'Gallery',
            'name' => '_artist_gallery',
            'type' => 'gallery',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'min' => '',
            'max' => '',
            'preview_size' => 'thumbnail',
            'library' => 'uploadedTo',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'artists',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
));

acf_add_local_field_group(array (
    'key' => 'group_554cfdb5d1f9c',
    'title' => 'Artist Options',
    'fields' => array (
        array (
            'key' => 'field_554cfe0319b3e',
            'label' => 'Artist Header Image',
            'name' => '_artist_arch_image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        array (
            'key' => 'field_554cfdc9d2a13',
            'label' => 'Archive Page Text',
            'name' => '_artist_pagetext',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => 'wpautop',
            'readonly' => 0,
            'disabled' => 0,
        ),
    ),
    'location' => array (
        array (
            array (
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-artist-settings',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
));

endif;