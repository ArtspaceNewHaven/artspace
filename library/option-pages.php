<?php 

if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Artist Settings',
        'parent' => 'edit.php?post_type=artists',
        'capability' => 'manage_options'
    ));
}
