<?php
add_filter( 'cmb2_meta_boxes', 'media_metaboxes' );

function media_metaboxes( array $meta_boxes ) {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_artfile_';

    /**
     * Sample metabox to demonstrate each field type included
     */
    $meta_boxes['media_metabox'] = array(
        'id'            => 'media_metabox',
        'title'         => __( 'Details of Art', 'cmb2' ),
        'object_types'  => array( 'attachment', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        'fields'        => array(
            array(
                'name'       => __( 'Artist Name', 'cmb2' ),
                'desc'       => __( 'field description (optional)', 'cmb2' ),
                'id'         => $prefix . 'artist_name',
                'type'       => 'text',
                'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
                // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
                // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
                // 'on_front'        => false, // Optionally designate a field to wp-admin only
                // 'repeatable'      => true,
            ),
            array(
                'name' => __( 'Title', 'cmb2' ),
                'id'   => $prefix . 'title',
                'type' => 'text',
            ),
            array(
			    'name' => 'Date',
			    'id'   => $prefix . 'start',
			    'type' => 'text_date_timestamp',
			    // 'timezone_meta_key' => $prefix . 'timezone',
			     'date_format' => 'M j, Y',
			),
			array(
                'name' => __( 'Medium', 'cmb2' ),
                'id'   => $prefix . 'medium',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Dimensions', 'cmb2' ),
                'id'   => $prefix . 'size',
                'type' => 'text',
            ),
            array(
                'name' => __( 'Photo Credit', 'cmb2' ),
                'id'   => $prefix . 'credit',
                'type' => 'text',
            ),
        ),
    );

    // Add other metaboxes as needed

    return $meta_boxes;
}
?>