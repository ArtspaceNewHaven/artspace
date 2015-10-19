<?php 

if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Artist Settings',
        'parent' => 'edit.php?post_type=artists',
        'capability' => 'manage_options'
    ));
}
// Options Pages 
if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page(array(
        'title' => 'Exhibition Opts',
        'parent' => 'edit.php?post_type=exhibitions',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'title' => 'CWOS Opts',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}