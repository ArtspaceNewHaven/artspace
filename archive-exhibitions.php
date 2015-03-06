<?php get_header(); ?>

<div class="row exhib-arch">
	
	<div class="large-3 columns side-menu">
		<ul class="no-bullet">
		<?php 
		    $args = array(
			'show_option_all'    => '',
			'orderby'            => 'name',
			'order'              => 'ASC',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 1,
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

	<div class="large-9 columns">
		<div class="row">
			<div class="large-1 columns">
				<?php 
				add_filter( 'get_archives_link', 'get_archives_exhib_link', 10, 2 );

					wp_get_archives( array( 'post_type' => 'exhibitions', 'type' => 'yearly' ) );

				remove_filter( 'get_archives_link', 'get_archives_exhib_link', 10, 2 );
				 ?>

			</div>
			<div class="large-11 columns">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'partials/content', get_post_format() ); ?>

				<?php endwhile; else : get_template_part( 'partials/content', 'none' ); endif; ?>	
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