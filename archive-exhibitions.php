<?php 
global $post;
$opts = get_option('exhibition_options');
get_header(); ?>

<section class="page-banner-image" style="background-image: url(<?php the_field('arch_banner_image', 'option'); ?>);">
	<div class="row post-type-search">
		<div class="medium-6 columns">
			<h2>Exhibitions</h2>
			<form role="search" method="get" class="artist-search-form" action="">
				<label>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search exhibitions', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				</label>
				<input type="hidden" name="post_type" value="exhibitions" />
			</form>
		</div>
	</div>
</section>

<section class="featured-exhib">
	<header class="row">
		<h3>Featured Exhibitions</h3>
	</header>
	<?php 
		// the query
		$args = array (
							'post_type'              => array( 'exhibitions' ),
							'pagination'             => true,
							'posts_per_page'         => '3',
							'order'                  => 'DES',
							'orderby'                => 'meta_value_num',
							'post_status' 					 => array( 'publish', 'future' ),
							'meta_query' => array(
									array(
										'key'     => '_exhib_start',
										'type'   => 'DATE',
										'compare' => 'NOT LIKE',
									),
								),
						);

		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<!-- the loop -->
			<div class="row">
			<ul class="medium-block-grid-3">
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<?php
						// Get all the custom fields we need
						global $post;
						$start = get_post_meta( get_the_ID(), '_exhib_start', true );
						$end = get_post_meta( get_the_ID(), '_exhib_end', true );
						$press_release = get_post_meta( get_the_ID(), '_exhib_press_release', true );
						$catalogue = get_post_meta( get_the_ID(), '_exhib_catalogue', true );
					?>
					<li>
						<div class="row">
							<?php if ( has_post_thumbnail() ): ?>
								<div class="medium-12 columns">
									<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>
								</div>
							<?php endif; ?>
							<div class="medium-12 columns">
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
								<p class="start-end"><time class="start"><?php echo date('M j', $start); ?></time> - <time class="end"><?php echo date('M j', $end); ?></time></p>
								<?php the_excerpt(); ?>
								<?php the_tags(  ); ?>
								<?php the_terms( $post->ID, 'location', '<h5 class="exhib-location">Location: <span>', '</span></h5>' ); ?>
							</div>
						</div>
					</li>	
			<?php endwhile; ?>
			</ul>
			</div>
			<!-- end of the loop -->
			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
</section>

<div class="row exhib-arch">
	<div class="medium-12 columns exhib-arch-main">
		<div class="row">
			<div class="large-12 columns exhib-archive-list">
			<?php 
				// the query
				$args = array (
									'post_type'              => array( 'exhibitions' ),
									'offset'             => '3',
									'order'                  => 'DES',
									'orderby'                => 'meta_value_num',
									'post_status' 					 => array( 'publish', 'future' ),
									'meta_query' => array(
											array(
												'key'     => '_exhib_start',
												'type'   => 'DATE',
												'compare' => 'NOT LIKE',
											),
										),
								);

				$the_query = new WP_Query( $args ); ?>

				<?php if ( $the_query->have_posts() ) : ?>

					<!-- the loop -->
					<div class="row">
					<ul class="no-bullet>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<?php
								// Get all the custom fields we need
								global $post;
								$start = get_post_meta( get_the_ID(), '_exhib_start', true );
								$end = get_post_meta( get_the_ID(), '_exhib_end', true );
								$press_release = get_post_meta( get_the_ID(), '_exhib_press_release', true );
								$catalogue = get_post_meta( get_the_ID(), '_exhib_catalogue', true );
							?>
							<li>
								<div class="row">
									<?php if ( has_post_thumbnail() ): ?>
										<div class="medium-5 columns">
											<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>
										</div>
									<?php endif; ?>
									<div class="medium-7 columns">
										<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
										<p class="start-end"><time class="start"><?php echo date('M j', $start); ?></time> - <time class="end"><?php echo date('M j', $end); ?></time></p>
										<?php the_excerpt(); ?>
										<?php the_tags(  ); ?>
										<?php the_terms( $post->ID, 'location', '<h5 class="exhib-location">Location: <span>', '</span></h5>' ); ?>
									</div>
								</div>
							</li>	
					<?php endwhile; ?>
					</ul>
					</div>
					<!-- end of the loop -->
					<?php wp_reset_postdata(); ?>

				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
				<?php /*
				<ul class="no-bullet">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						// Get all the custom fields we need
						global $post;
						$start = get_post_meta( get_the_ID(), '_exhib_start', true );
						$end = get_post_meta( get_the_ID(), '_exhib_end', true );
						$press_release = get_post_meta( get_the_ID(), '_exhib_press_release', true );
						$catalogue = get_post_meta( get_the_ID(), '_exhib_catalogue', true );
					?>
					<li>
						<div class="row">
							<?php if ( has_post_thumbnail() ): ?>
								<div class="medium-5 columns">
									<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>
								</div>
							<?php endif; ?>
							<div class="medium-7 columns">
								<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
								<p class="start-end"><time class="start"><?php echo date('M j', $start); ?></time> - <time class="end"><?php echo date('M j', $end); ?></time></p>
								<?php the_excerpt(); ?>
								<?php the_tags(  ); ?>
								<?php the_terms( $post->ID, 'location', '<h5 class="exhib-location">Location: <span>', '</span></h5>' ); ?>
							</div>
						</div>
					</li>	
						<?php endwhile; else : get_template_part( 'partials/content', 'none' ); ?>
					<?php endif; // end have_posts() check ?>
				</ul>
				*/ ?>
					<?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>
						<nav id="post-nav">
							<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
							<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
						</nav>
					<?php } ?>
				
			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>