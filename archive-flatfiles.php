<?php 
global $post;
$opts = get_option('flatfile_options');

get_header(); ?>
<div class="row content-container" data-equalizer>

	<aside class="large-3 columns left-col" data-equalizer-watch>
		
		<form method="get" action="<?php bloginfo('url'); ?>">
		    <div><label class="screen-reader-text" for="s">Search</label>
		    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		    <input type="hidden" name="post_type" value="flatfiles">
		    <input type="submit" id="searchsubmit" value="Search" />
		    </div>
		</form>

		<section class="filter-by">
			<div class="row">
				<h5 class="js-filter">Filter by</h5>
			</div>
		</section>

	</aside>

	<div class="small-12 large-9 columns" role="main" data-equalizer-watch>
		<header class="row">
			<img src="<?php echo $opts['main_image']; ?>" alt="Flatfiles">
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
