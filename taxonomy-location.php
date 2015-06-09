<?php get_header(); ?>

<div class="row exhib-arch">
	
	<div class="medium-3 columns side-menu">
		<ul class="no-bullet exhib-local-menu">
		<?php 
		    $args = array(
			'show_option_all'    => '',
			'orderby'            => 'ID',
			'order'              => 'ASC',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 0,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude'            => '',
			'exclude_tree'       => '',
			'include'            => '',
			'hierarchical'       => 1,
			'title_li'           => __( 'Exhibitions' ),
			'show_option_none'   => __( '' ),
			'number'             => null,
			'echo'               => 1,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,
			'taxonomy'           => 'location',
			'walker'             => null
		    );
		    wp_list_categories( $args ); 
		?>
		</ul>

	</div>

	<div class="medium-9 columns exhib-arch-main">
		<div class="row">

		<header class="row">
			<div class="small-12 columns">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artspace_exhibitions.png" alt="Exhibitions">
			</div>
		</header>
		<div class="row">
			<div class="large-12 columns">
				<div class="js-masonry-contain">
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<div class="item">
							<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>
							<div class="item-content">
								<header class="row">
									<div class="small-10 columns">
										<h3><?php the_title(); ?></h3>
									</div>
									<div class="small-2 columns">
										<span class="right js-show-item"><i class="ss-icon ss-standard ss-navigatedown"></i></span>
									</div>
								</header>
								<div class="js-item-excerpt" style="display:none">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</div>

					<?php endwhile; ?>

					<?php else : ?>
						<?php get_template_part( 'partials/content', 'none' ); ?>

				<?php endif; // end have_posts() check ?>
				</div>
			</div>
		</div>
	</div>

</div>

	

	<!--
	<div class="row">
	<?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
		</nav>
	<?php } ?>
	</div>
	-->

<?php get_footer(); ?>