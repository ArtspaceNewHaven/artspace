<?php

function artspace_sidebar_widgets() {
  register_sidebar(array(
      'id' => 'sidebar-widgets',
      'name' => __('Sidebar widgets', 'artspace'),
      'description' => __('Drag widgets to this sidebar container.', 'SimpleSpaceship'),
      'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
      'after_widget' => '</article>',
      'before_title' => '<h6>',
      'after_title' => '</h6>'
  ));

  register_sidebar(array(
      'id' => 'artspace-footer-widgets',
      'name' => __('Footer widgets', 'artspace'),
      'description' => __('Drag widgets to this footer container', 'SimpleSpaceship'),
      'before_widget' => '<div class="widget %2$s large-3 columns">',
      'after_widget' => '</div>',
      'before_title' => '<h6>',
      'after_title' => '</h6>'      
  ));
}

add_action( 'widgets_init', 'artspace_sidebar_widgets' );

?>