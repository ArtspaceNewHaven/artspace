<?php 
global $post;
$opts = get_option('flatfile_options');
get_header(); ?>

<section class="page-banner-image" style="background-image: url(<?php the_field('_artist_arch_image', 'option'); ?>);">
	<div class="row post-type-search">
		<div class="medium-6 columns">
			<h2>Flatfiles</h2>
			<form role="search" method="get" class="artist-search-form" action="">
				<label>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search flatfiles…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</label>
				<input type="hidden" name="post_type" value="flatfiles" />
			</form>
		</div>
	</div>
</section>

<div class="row content-container" data-equalizer>

	<div class="small-12 medium-12 columns" role="main" data-equalizer-watch>
		
		<header class="row">
			<p><?php echo $opts['info']; ?></p>
		</header>
		
		<section class="featured-works">
			<header class="row">
				<h5>Featured Works:</h5>
			</header>
			<div class="row">
				<ul class="medium-block-grid-4">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<li><a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail('', array('class' => 'thumb')); ?>
								<?php endif; ?>
						  </a></li>
						<?php endwhile;  else : ?>
						<?php get_template_part( 'partials/content', 'none' ); ?>

					<?php endif; // end have_posts() check ?>
				</ul>
			</div>
		</section>

		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>
			<nav id="post-nav row">
				<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
				<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
			</nav>
		<?php } ?>

	</div>
</div>
<?php get_footer(); ?>
