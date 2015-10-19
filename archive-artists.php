<?php 

get_header(); ?>

<section class="page-banner-image" style="background-image: url(<?php the_field('_artist_arch_image', 'option'); ?>);">
	<div class="row post-type-search">
		<div class="medium-6 columns">
			<h2>Aritst Directory</h2>
			<form role="search" method="get" class="artist-search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search artists…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</label>
				<input type="hidden" name="post_type" value="artists" />
			</form>
		</div>
	</div>
</section>

<?php get_template_part( 'partials/breadcrumbs' ); ?>

<div class="row content-container" data-equalizer>

	<main class="medium-12 columns main-col" data-equalizer-watch>
		
		<header>
			<div class="row">
				<div class="small-12 columns">
					<?php the_field('_artist_pagetext', 'option'); ?>
				</div>
			</div>
			<div class="row cta">
				<div class="medium-6 columns right text-right">
					<a href="#" class="button orange small">Join</a> <a href="#" class="button orange small">Log In</a>
				</div>
			</div>
		</header>
		<ul class="tabs" data-tab>
		  <li class="tab-title active"><a href="#panel1"><h4>All Artists</h4></a></li>
		  <li class="tab-title"><a href="#panel2"><h4>Alphabetical By Name</h4></a></li>
		</ul>
		<div class="tabs-content">
		  <div class="content active" id="panel1">
		    <section class="recently-updated-artists">
					<?php if ( have_posts() ) : ?>

					<ul class="medium-block-grid-4">
						<?php while ( have_posts() ) : the_post(); 
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
						?>
							
							<li>
								<a href="<?php the_permalink(); ?>">
									<div class="artist-thumb-container" style="background-image: url(<?php echo $thumb_url[0]; ?>);" >
									</div>
									<h4><?php the_title(); ?></h4>
								</a>
							</li>	

						<?php endwhile; ?>
					</ul>
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
				</section>
		  </div>
		  <div class="content" id="panel2">
		  	<section class="alpha-artists">
			  	<ul class="no-bullet">
			    <?php 
				    $args = array (
							'post_type'              => array( 'artists' ),
							'pagination'             => true,
							'posts_per_page'         => '50',
							'order'                  => 'ASC',
							'orderby'                => 'title',
						);

					// The Query
					$alpha_artist = new WP_Query( $args );

					// The Loop
					if ( $alpha_artist->have_posts() ) {
						while ( $alpha_artist->have_posts() ) {
							$alpha_artist->the_post(); ?>
							<li>
								<a href="<?php the_permalink(); ?>">
									<h5><?php the_title(); ?></h5>
								</a>
							</li>
					<?php	}
						} else {
							// no posts found
						}
						// Restore original Post Data
						wp_reset_postdata();
			     ?>
		  		</ul>
		  	</section>
		  </div>
		</div>
		
	</main>
</div>

<?php get_footer(); ?>
