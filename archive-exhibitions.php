<?php get_header(); ?>

<div class="row exhib-arch" data-equalizer>
	
	<div class="medium-3 columns side-menu" data-equalizer-watch>
		<div class="row">
			<div class="medium-9 columns" data-equalizer-watch>
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
			<div class="medium-3 columns yearly-menu-container" data-equalizer-watch>
				<ul class="no-bullet yearly-menu">
					<?php 
						$yearly = array(
							'type'            => 'yearly',
							'limit'           => '',
							'format'          => 'html', 
							'before'          => '',
							'after'           => '',
							'show_post_count' => false,
							'echo'            => 1,
							'order'           => 'DESC'
						);
						wp_get_archives( $yearly ); ?>
					</ul>
			</div>
		</div>
	</div>

	<div class="medium-9 columns exhib-arch-main" data-equalizer-watch>
		<div class="row">
			

			<div class="large-11 columns exhib-archive-list">
					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'partials/content', get_post_format() ); ?>
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
	</div>

</div>

<?php get_footer(); ?>