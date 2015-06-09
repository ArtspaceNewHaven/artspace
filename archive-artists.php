<?php get_header(); ?>

<div class="row content-container" data-equalizer>

	<aside class="medium-3 columns left-col" data-equalizer-watch>
		
		<form role="search" method="get" class="artist-search-form" action="<?php echo home_url( '/' ); ?>">
			<label>
				<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
			</label>
			<input type="hidden" name="post_type" value="artists" />
		</form>

		<?php //echo do_shortcode( '[searchandfilter fields="search,post_types" post_types="artists" headings=""]' ); ?>
		<?php echo do_shortcode('[ULWPQSF id=133]'); ?>
		
		<div class="all-artist">
			<div class="row">
				<div class="small-12 columns">
					<h4>Artists</h4>
				</div>
			</div>
			<div class="row">
				<div class="medium-2 columns alpha-container">
					<ul class="no-bullet" id="alpha">
						<li><div class="filter" data-filter="all">All</div></li>
						<li><div class="filter" data-filter=".A">A</div></li>
						<li><div class="filter" data-filter=".B">B</div></li>
						<li><div class="filter" data-filter=".C">C</div></li>
						<li><div class="filter" data-filter=".D">D</div></li>
						<li><div class="filter" data-filter=".E">E</div></li>
						<li><div class="filter" data-filter=".F">F</div></li>
						<li><div class="filter" data-filter=".G">G</div></li>
						<li><div class="filter" data-filter=".H">H</div></li>
						<li><div class="filter" data-filter=".I">I</div></li>
						<li><div class="filter" data-filter=".J">J</div></li>
						<li><div class="filter" data-filter=".K">K</div></li>
						<li><div class="filter" data-filter=".L">L</div></li>
						<li><div class="filter" data-filter=".M">M</div></li>
						<li><div class="filter" data-filter=".N">N</div></li>
						<li><div class="filter" data-filter=".O">O</div></li>
						<li><div class="filter" data-filter=".P">P</div></li>
						<li><div class="filter" data-filter=".Q">Q</div></li>
						<li><div class="filter" data-filter=".R">R</div></li>
						<li><div class="filter" data-filter=".S">S</div></li>
						<li><div class="filter" data-filter=".T">T</div></li>
						<li><div class="filter" data-filter=".U">U</div></li>
						<li><div class="filter" data-filter=".V">V</div></li>
						<li><div class="filter" data-filter=".W">W</div></li>
						<li><div class="filter" data-filter=".X">X</div></li>
						<li><div class="filter" data-filter=".Y">Y</div></li>
						<li><div class="filter" data-filter=".Z">Z</div></li>
					</ul>
				</div>
				<div class="medium-10 columns artist-alpha-list">
					<ul class="no-bullet" id="artist-Mixup">
						<?php
							$args = array (
								'post_type'              => 'artists',
								'post_status'            => 'publish',
								'order'                  => 'ASC',
								'orderby'                => 'title',
							);

							// The Query
							$all_artists = new WP_Query( $args );

							// The Loop
							if ( $all_artists->have_posts() ) {
								while ( $all_artists->have_posts() ) {
									$all_artists->the_post();
									$letter = get_the_title(); ?>

									<li class="mix <?php echo $letter[0]; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

							<?php	}
							} else {
								// no posts found
							}

							// Restore original Post Data
							wp_reset_postdata();
							?>
					</ul>
				</div>
			</div>
		</div>

	</aside>

	<main class="medium-9 columns main-col" data-equalizer-watch>
		
		<header>
			<div class="row">
				<div class="small-12 columns">
					<img src="<?php the_field('_artist_arch_image', 'option'); ?>" alt="" class="header-text">
					<?php the_field('_artist_pagetext', 'option'); ?>
				</div>
			</div>
			<div class="row cta">
				<div class="medium-6 columns right text-right">
					<a href="#" class="button orange small">Join</a> <a href="#" class="button orange small">Log In</a>
				</div>
			</div>
		</header>

		<section class="recently-updated-artists">
			<div class="row recently-updated">
				<h4>recently updated</h4>
			</div>
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
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
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
