<?php get_header(); ?>

<div class="row content-container" data-equalizer>

	<aside class="medium-3 columns left-col" data-equalizer-watch>

	</aside>

	<main class="medium-9 columns main-col" data-equalizer-watch>
		
		<header>
			<div class="row">
				<div class="small-12 columns">
					<img src="<?php the_field('_artist_arch_image', 'option'); ?>" alt="">
					<?php the_field('_artist_pagetext', 'option'); ?>
				</div>
			</div>
		</header>

		<section class="recently-updated-artists">
			<ul class="medium-block-grid-4">
				<?php
					/// Loop for Getting Most Recently Updated Artists
					$args = array (
						'post_type'              => 'artists',
						'order'                  => 'ASC',
						'orderby'                => 'modified',
					);

					$updated_artists = new WP_Query( $args );

					if ( $updated_artists->have_posts() ) {
						while ( $updated_artists->have_posts() ) {
							$updated_artists->the_post(); ?>
					
					<li>
					<?php the_post_thumbnail(); ?>
					</li>	

				<?php		}
					} else {
						// no posts found
					}

					wp_reset_postdata();
				?>
			</ul>
		</section>
		
	</main>
</div>




<div class="row">
<!-- Row for main content area -->
	<div class="small-12 large-12 columns" role="main">
	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			


		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'partials/content', 'none' ); ?>

	<?php endif; // end have_posts() check ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>
</div>
<?php get_footer(); ?>
