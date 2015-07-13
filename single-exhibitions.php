<?php 
global $post;
$start = get_post_meta( get_the_ID(), '_exhib_start', true );
$end = get_post_meta( get_the_ID(), '_exhib_end', true );
$press_release = get_post_meta( get_the_ID(), '_exhib_press_release', true );
$catalogue = get_post_meta( get_the_ID(), '_exhib_catalogue', true );

get_header(); ?>
<div class="row content-container" data-equalizer>

<aside class="large-3 columns left-col" data-equalizer-watch>
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
</aside>

	<div class="small-12 large-6 columns" role="main" data-equalizer-watch>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action('SimpleSpaceship_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ): ?>
				<div class="row feature-container">
					<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>
					<a href="#" class="more-photos">more photos</a>
				</div>
			<?php endif; ?>
			
			<div class="row">
				<div class="large-12 columns">
					<?php the_content(); ?>
				</div>
			</div>

			</div>
		</article>
	

	</div>

	<aside class="large-3 columns right-col">
		<div class="title-block">
			<header class="row">
				<div class="small-12 columns">
					<h3 class="entry-title"><?php the_title(); ?></h3>
					<p class="start-end"><time class="start"><?php echo date('M j', $start); ?></time> - <time class="end"><?php echo date('M j', $end); ?></time></p>
				</div>
			</header>
		</div>
		<div class="artist-list row">
			<div class="small-12 columns">
			<h4>Featured Artists:</h4>
				<ul class="no-bullet">
					<?php $artists = get_post_meta( get_the_ID(), '_exhib_artists', true );
						foreach ( (array) $artists as $key => $artist ) {
						    $name = $url = '';
						    if ( isset( $artist['name'] ) )
						        $name = esc_html( $artist['name'] );
						    if ( isset( $artist['url'] ) )
						        $url = esc_html( $artist['url'] ); ?>

						<li>
						<a href="<?php echo $url; ?>"><?php echo $name; ?></a>
						</li>
					    
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="exhibition-downloads row">
			<div class="small-12 columns">
				<p>Full Press Release <a href="<?php echo $press_release; ?>" target="_blank">here</a></p>
				<p>Download Catalogue <a href="<?php echo $catalogue; ?>" target="_blank">here</a></p>
			</div>
		</div>

		<!--
		<div class="related-events">
			<header class="side-title">
				<div class="row">
					<h4>Related Events</h4>
				</div>
			</header>
			<div class="row">
				<ul class="no-bullet related-list">
				<?php
					$related = get_posts(array(
					    'post_type' => 'post' // Set post type you are relating to.
					    ,'posts_per_page' => -1
					    ,'post_belongs' => $post_id
					    ,'post_status' => 'publish'
					    ,'suppress_filters' => false // This must be set to false
					  ));
					 
					foreach ($related as $related_post): ?>
					 
					  <li><?php echo $related_post->post_title; ?></li>
					 
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	-->
	</aside>

	<?php endwhile;?>
	<?php do_action('SimpleSpaceship_after_content'); ?>

</div>
<?php get_footer(); ?>