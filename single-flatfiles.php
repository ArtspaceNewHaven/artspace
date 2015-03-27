<?php 
global $post;
get_header(); ?>

<div class="row content-container" data-equalizer>

<aside class="large-3 columns left-col" data-equalizer-watch>

	<div class="search-box">
		<form method="get" action="<?php bloginfo('url'); ?>">
		    <div><label class="screen-reader-text" for="s">Search</label>
		    <input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
		<?php
		    wp_dropdown_categories(array('show_option_all' => 'All Keywords', 'name' => 'keyword', 'taxonomy' => 'keyword')); 
		?>
		    <input type="submit" id="searchsubmit" value="Search" />
		    </div>
		</form>
	</div>

	<div class="all-keywords">
		<?php
		 $terms = get_terms( 'keyword' );
		 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
		     echo '<ul>';
		     foreach ( $terms as $term ) {
		       echo '<li><a href="' . get_term_link( $term ) . '">' . $term->name . '</a></li>';
		        
		     }
		     echo '</ul>';
		 }
		?>
	</div>

</aside>

<div class="small-12 large-9 columns" role="main" data-equalizer-watch>
	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php if ( has_post_thumbnail() ): ?>
			<div class="row">
				<?php the_post_thumbnail('', array('class' => 'thumb')); ?>
			</div>
		<?php endif; ?>

		<article <?php post_class('row') ?> id="post-<?php the_ID(); ?>">
					<?php do_action('SimpleSpaceship_post_before_entry_content'); ?>
					
					<div class="entry-content flat-file small-12 large-12 large-centered columns">
						<h3 class="artist"><?php echo get_post_meta(get_post_thumbnail_id(), '_artfile_artist_name', true); ?></h3>
						<h5 class="title"><em><?php echo get_post_meta(get_post_thumbnail_id(), '_artfile_title', true); ?></em></h5>
						<h5 class="medium"><?php echo get_post_meta(get_post_thumbnail_id(), '_artfile_medium', true); ?></h5>
						<h5 class="size"><?php echo get_post_meta(get_post_thumbnail_id(), '_artfile_size', true); ?></h5>
						<!-- get keywords -->
						<?php 
						$terms = get_the_terms( get_post_thumbnail_id(), 'keyword' ); 
							if ( $terms && ! is_wp_error( $terms ) ) : 
								$keywords = array();
								foreach ( $terms as $term ) {
									$keywords[] = $term->name;
								}
								$keys = join( ", ", $keywords );
							?>

							<p class="keywords"><span><?php echo $keys; ?></span></p>
						<?php endif; ?>

					</div>
		</article>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

	<section class="related-flatfiles">
		<header class="row">
			<h5>Related Flatfiles</h5>
		</header>
		<div class="row">
			<?php 
			$post_terms = wp_get_object_terms(get_the_ID(), 'keyword', array('fields'=>'ids'));

				$args = array(
				    'post_type' => 'flatfiles',
				    'post__not_in' => array(get_the_ID()),
				    'tax_query' => array(
				        array(
				            'taxonomy' => 'keyword',
				            'field' => 'id',
				            'terms' => $post_terms
				        )
				    )
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
				    echo '<ul class="medium-block-grid-4">';
				    while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

				      <li><a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ): ?>
									<?php the_post_thumbnail('', array('class' => 'thumb')); ?>
								<?php endif; ?>
				      </a></li>

				   <?php }
				    echo '</ul>';
				} else {
				    // no posts found
				}
				wp_reset_postdata();
			 ?>
		</div>
	</section>

	</div>
</div>

<?php get_footer(); ?>