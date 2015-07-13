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
	
<?php
	$bannerimage = get_field('banner_image');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)

	if( $bannerimage ) {
		echo '<div class="inner-wrap has-banner-img" style="background-image: url(' . wp_get_attachment_url( $bannerimage, $large ) . ');background-position-y: 40px;">';
	} else {
		echo '<div class="inner-wrap">';
	}
?>
	
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

<nav class="about-us">
	<div class="row">
		<?php

			$defaults = array(
				'theme_location'  => 'orange',
				'menu'            => 'orange',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'sub-nav',
				'menu_id'         => 'about',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '',
				'depth'           => 0,
				'walker'          => ''
			);

			wp_nav_menu( $defaults );

		?>
	</div>
</nav>

	<?php get_template_part('partials/top-bar'); ?>

<section class="container" role="document">
	<?php do_action('SimpleSpaceship_after_header'); ?>