<?php
// Register Custom Post Type
function artspace_EXHIBITIONS() {

	$labels = array(
		'name'                => _x( 'Exhibitions', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Exhibition', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Exhibitions', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Exhibitions:', 'text_domain' ),
		'all_items'           => __( 'All Exhibitions', 'text_domain' ),
		'view_item'           => __( 'View Exhibitions', 'text_domain' ),
		'add_new_item'        => __( 'Add New Exhibitions', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Exhibitions', 'text_domain' ),
		'update_item'         => __( 'Update Exhibitions', 'text_domain' ),
		'search_items'        => __( 'Search Exhibitions', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'post_type', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes' ),
		'taxonomies'          => array( '' ),
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
	register_post_type( 'exhibitions', $args );

}



add_action( 'init', 'artspace_EXHIBITIONS', 0 );

///////////// Custom Fields for Exhibitions ///////////////

add_filter( 'cmb2_meta_boxes', 'exhibitiona_metaboxes' );

function exhibitiona_metaboxes( array $meta_boxes ) {

    $prefix = '_exhib_';

//// Fields for Exhibition Start and End Date ////////

    $meta_boxes['exhibitions_metabox'] = array(
        'id'            => 'exhibitions_metabox',
        'title'         => __( 'Exhibition Details', 'cmb2' ),
        'object_types'  => array( 'exhibitions', ), // Post type
        'context'       => 'side',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
			    'name' => 'Start Date of Show',
			    'id'   => $prefix . 'start',
			    'type' => 'text_date_timestamp',
			    // 'timezone_meta_key' => $prefix . 'timezone',
			     'date_format' => 'M j, Y',
			),
            array(
			    'name' => 'End Date of Show',
			    'id'   => $prefix . 'end',
			    'type' => 'text_date_timestamp',
			    // 'timezone_meta_key' => $prefix . 'timezone',
			     'date_format' => 'M j, Y',
			),
        ),
    );

////// Field to Choose Exhibition Locations ///////

    $meta_boxes['exhib_location_metabox'] = array(
        'id'            => 'exhib_location_metabox',
        'title'         => __( 'Exhibition Location', 'cmb2' ),
        'object_types'  => array( 'exhibitions', ), // Post type
        'context'       => 'side',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
			    'name' => 'Choose Exhibition Location',
			    'desc' => '',
			    'id' => $prefix . 'location',
			    'taxonomy' => 'location', //Enter Taxonomy Slug
			    'type' => 'taxonomy_radio', 
			),

        ),
    );


    $meta_boxes['exhib_images_metabox'] = array(
        'id'            => 'exhib_images_metabox',
        'title'         => __( 'Exhibition Details', 'cmb2' ),
        'object_types'  => array( 'exhibitions', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
			    'name'    => 'Curator',
			    'desc'    => '(optional)',
			    'id'      => $prefix . 'curator',
			    'type'    => 'text'
			),
            array(
			    'name' => 'Images for Top Area',
			    'desc' => 'Captions will be pulled from Media Library',
			    'id' => $prefix . 'slides',
			    'type' => 'file_list',
			    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
			),
			array(
			    'name' => 'Press Release PDF',
			    'desc' => 'Upload a PDF of the Press Release',
			    'id' => $prefix . 'press_release',
			    'type' => 'file',
			    // Optionally allow only attachments and not any URL (this hides the text input for the url):
			    "options" => array(
			        "url" => true
			    )

			),
			array(
			    'name' => 'Catalogue PDF',
			    'id' => $prefix . 'catalogue',
			    'type' => 'file',
			    // Optionally allow only attachments and not any URL (this hides the text input for the url):
			    "options" => array(
			        "url" => true
			    )

			),
        ),
    );

    $meta_boxes['exhib_artists_metabox'] = array(
        'id'            => 'exhib_artists_metabox',
        'title'         => __( 'Exhibition Artists', 'cmb2' ),
        'object_types'  => array( 'exhibitions', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
        'fields'        => array(
            array(
			    'id'          => $prefix . 'artists',
			    'type'        => 'group',
			    'description' => __( 'Exhibition Artists', 'cmb' ),
			    'options'     => array(
			        'group_title'   => __( 'Artist {#}', 'cmb' ), // since version 1.1.4, {#} gets replaced by row number
			        'add_button'    => __( 'Add Another Artist', 'cmb' ),
			        'remove_button' => __( 'Remove Artist', 'cmb' ),
			        'sortable'      => true, // beta
			    ),
			    // Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
			    'fields'      => array(
			        array(
			            'name' => 'Name',
			            'id'   => 'name',
			            'type' => 'text',
			            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
			        ),
			        array(
			            'name' => 'Website',
			            'id'   => 'url',
			            'type' => 'text_url',
			        ),
			    ),
			),
        ),
    );

	$meta_boxes['press_release_metabox'] = array(
	        'id'            => 'press_release_metabox',
	        'title'         => __( 'Press Release Upload', 'cmb2' ),
	        'object_types'  => array( 'exhibitions', ), // Post type
	        'context'       => 'normal',
	        'priority'      => 'high',
	        'show_names'    => true, // Show field names on the left
	        // 'cmb_styles' => false, // false to disable the CMB stylesheet
	        // 'closed'     => true, // Keep the metabox closed by default
	        'fields'        => array(
	            array(
				    'name' => 'Images for Top Area',
				    'desc' => 'Captions will be pulled from Media Library',
				    'id' => $prefix . 'slides',
				    'type' => 'file_list',
				    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
				),
	        ),
	    );

    return $meta_boxes;
}


?>