<?php 
// For Searching by Custom Post Type
$post_type = $_GET['post_type'];

get_header(); ?>
<div class="row content-container" data-equalizer>

	<aside class="large-3 columns left-col" data-equalizer-watch>
	</aside>

	<div class="small-12 large-9 columns" role="main" data-equalizer-watch>
		<?php do_action('SimpleSpaceship_before_content'); ?>

		<h2><?php _e('Search Results for', 'SimpleSpaceship'); ?> "<?php echo get_search_query(); ?>"</h2>

	<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>

		<?php
			if ( isset( $post_type ) && $post_type == 'flatfiles' ) {

				// do something more here
			  the_title( '<h5>', '</h5>', true );

  		} else { echo 'We did not find anything.'; } ?>


		<?php endwhile;  else : ?>
			<?php get_template_part( 'partials/content', 'none' ); ?>
	<?php endif;?>



	<?php do_action('SimpleSpaceship_before_pagination'); ?>

	<?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>

		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

	</div>
</div>
<?php get_footer(); ?>