<?php
global $post;
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if ( is_category() ) {
      echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_tag() ) {
      echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_archive() ) {
      wp_title(''); echo ' Archive | '; bloginfo( 'name' );
    } elseif ( is_search() ) {
      echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
    } elseif ( is_home() || is_front_page() ) {
      bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
    }  elseif ( is_404() ) {
      echo 'Error 404 Not Found | '; bloginfo( 'name' );
    } elseif ( is_single() ) {
      wp_title('');
    } else {
      echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
    } ?></title>

    <style>
      html {
        background: url("<?php the_field('background_pattern','option') ?>") repeat;
      }
      .cwos-menu.top-bar-container, .footer-border, .footer-border ul.sub-nav li {
        background-color: <?php the_field('primary_color', 'option'); ?> !important;
      }
      .cwos-menu > nav.top-bar[role="navigation"] {
        margin-top: 0;
      }
      .cwos-sub-nav {
        background: #fff;
        margin-bottom: 1rem;
      }
      .cwos-sub-nav .sub-nav {margin: .125rem 0 .125rem;}
    </style>
    
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/foundation.css" />

    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri() ; ?>/assets/img/icons/apple-touch-icon-precomposed.png">
    
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <?php do_action('SimpleSpaceship_after_body'); ?>
  
  <div class="off-canvas-wrap" data-offcanvas>
  
  
  <?php do_action('SimpleSpaceship_layout_start'); ?>
  
  <nav class="tab-bar show-for-small-only">
    <section class="left-small">
      <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
    </section>
    <section class="middle tab-bar-section">
      
      <h1 class="title"><?php bloginfo( 'name' ); ?></h1>

    </section>
  </nav>

  <?php get_template_part('partials/off-canvas-menu'); ?>
  
  <!-- need to inject menu for CWOS -->
  <?php get_template_part('partials/cwos-topbar'); ?>

  <?php do_action('SimpleSpaceship_after_header'); ?>