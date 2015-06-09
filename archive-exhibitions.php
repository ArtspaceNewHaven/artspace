<?php get_header(); ?>

<div class="row exhib-arch" data-equalizer>
	
	<div class="large-3 columns side-menu" data-equalizer-watch>
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

	<div class="large-9 columns exhib-arch-main" data-equalizer-watch>
		<div class="row">
			<header class="row">
				<div class="small-12 columns">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/artspace_exhibitions.png" alt="Exhibitions">
				</div>
			</header>

			<div class="large-11 columns">

				<section class="current">
					<div class="row">
							<?php 
								$currentargs = array (
									'post_type'              => 'exhibitions',
									'tax_query' => array(
										array(
											'taxonomy' => 'location',
											'field'    => 'slug',
											'terms'    => 'current',
											'include_children' => TRUE
										),
									),
								);

								$exhib_query = new WP_Query( $currentargs );

								if ( $exhib_query->have_posts() ) {
									while ( $exhib_query->have_posts() ) {
										$exhib_query->the_post(); ?>
									
									<div class="on-view">
										<header>currently on view</header>
										<div class="show-info">
											<div class="row">
												<div class="small-12 columns">
													<h4><?php the_title(); ?></h4>
													<?php the_excerpt(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>

								<?php	}
								} else {
									// no posts found
								}

								// Restore original Post Data
								wp_reset_postdata();
							 ?>
					</div>
				</section>

				<section class="archived-upcoming">
					<div class="row">
						<div class="medium-6 columns">
							<?php 
								$arch_args = array (
									'post_type'              => 'exhibitions',
									'tax_query' => array(
										array(
											'taxonomy' => 'location',
											'field'    => 'slug',
											'terms'    => 'archive',
											'include_children' => TRUE
										),
									),
								);

								$exhibArch_query = new WP_Query( $arch_args );

								if ( $exhibArch_query->have_posts() ) {
									while ( $exhibArch_query->have_posts() ) {
										$exhibArch_query->the_post(); ?>
									
									<div class="on-view">
										<header>currently on view</header>
										<div class="show-info">
											<div class="row">
												<div class="small-12 columns">
													<h4><?php the_title(); ?></h4>
													<?php the_excerpt(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>

								<?php	}
								} else {
									// no posts found
								}

								// Restore original Post Data
								wp_reset_postdata();
							 ?>
						</div>
						<div class="medium-6 columns">
							<?php 
								$upcoming_args = array (
									'post_type'              => 'exhibitions',
									'tax_query' => array(
										array(
											'taxonomy' => 'location',
											'field'    => 'slug',
											'terms'    => 'upcoming',
											'include_children' => TRUE
										),
									),
								);

								$exhibUpcoming_query = new WP_Query( $upcoming_args );

								if ( $exhibUpcoming_query->have_posts() ) {
									while ( $exhibUpcoming_query->have_posts() ) {
										$exhibUpcoming_query->the_post(); ?>
									
									<div class="on-view">
										<header>currently on view</header>
										<div class="show-info">
											<div class="row">
												<div class="small-12 columns">
													<h4><?php the_title(); ?></h4>
													<?php the_excerpt(); ?>
												</div>
											</div>
										</div>
									</div>
									<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>

								<?php	}
								} else {
									// no posts found
								}

								// Restore original Post Data
								wp_reset_postdata();
							 ?>
						</div>
					</div>
				</section>

			</div>
		</div>
	</div>

</div>

<?php get_footer(); ?>