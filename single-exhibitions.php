<?php 
global $post;
$start = get_post_meta( get_the_ID(), '_exhib_start', true );
$end = get_post_meta( get_the_ID(), '_exhib_end', true );
$press_release = get_post_meta( get_the_ID(), '_exhib_press_release', true );
$catalogue = get_post_meta( get_the_ID(), '_exhib_catalogue', true );
$bannerimage = get_field('banner_image');
get_header(); ?>

<section class="page-banner-image" style="background-image: url(<?php echo wp_get_attachment_url( $bannerimage ); ?>);">
	<div class="row">
		
	</div>
</section>

<div class="row content-container" data-equalizer>
	<div class="small-12 medium-8 columns" role="main" data-equalizer-watch>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action('SimpleSpaceship_post_before_entry_content'); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ): ?>
				<div class="row feature-container">
					<?php the_post_thumbnail('', array('class' => 'feature-img')); ?>
					<a href="#" data-reveal-id="exhibModal" class="more-photos">more photos</a>
				</div>

				<div id="exhibModal" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
				<section role="slider" class="art-slider">
					<div class="">
					<ul class="no-bullet slide-init">
				  <?php 
				  $ids = get_field('related_media', false, false);

					$args = array(
						'post_type'      	=> 'attachment',
						'posts_per_page'	=> 3,
						'post__in'		=> $ids,
						'post_status'		=> 'any',
					);

					$media_query = new WP_Query( $args );

					if ( $media_query->have_posts() ) {
						while ( $media_query->have_posts() ) {
							$media_query->the_post();
							// do something
							$attachment_id = get_the_id(); ?>
						<li><?php	echo wp_get_attachment_image( $attachment_id, 'large' ); ?></li>
					<?php	}
					} else {
						// no posts found
					}

					// Restore original Post Data
					wp_reset_postdata();

				   ?>
				   </ul>
				   	</div>
	<div class="slide-nav">
		<div class="row">
			<h1><i class="ss-icon ss-standard ss-navigateleft"></i> <i class="ss-icon ss-standard ss-navigateright"></i></h1>
		</div>
	</div>
</section>
				  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
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

	<aside class="medium-4 columns right-col">
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
			<p>Curated by: </p>
			<p>Featuring Artists:
					<?php $artists = get_post_meta( get_the_ID(), '_exhib_artists', true );
						foreach ( (array) $artists as $key => $artist ) {
						    $name = $url = '';
						    if ( isset( $artist['name'] ) )
						        $name = esc_html( $artist['name'] );
						    if ( isset( $artist['url'] ) )
						        $url = esc_html( $artist['url'] ); ?>
						<span class="featuring-artist"><a href="<?php echo $url; ?>"><?php echo $name; ?></a> ,</span>
					<?php } ?>
					</p>
			</div>
		</div>
		<div class="exhibition-downloads row">
			<div class="small-12 columns">
				<p>Full Press Release <a href="<?php echo $press_release; ?>" target="_blank">here</a></p>
				<p>Download Catalogue <a href="<?php echo $catalogue; ?>" target="_blank">here</a></p>
			</div>
		</div>

		<!-- sponsors component -->
		<div class="sponsor-block row">
			<div class="small-12 columns">
				<header class="row">
					<h4>Sponsors</h4>
				</header>
				<!-- sponsor images here -->
				<div class="sponsors">
					<p>A Text based sponsor</p>
				</div>
			</div>
		</div>

		<!-- current exhibitions block -->
		<div class="current-exhibitions-block row">
			<div class="small-12 columns">
				<header class="row">
					<h4>Current Exhibitions</h4>
				</header>
				<!-- exhibition list here -->
				<ul class="no-bullet">
					
				</ul>
			</div>
		</div>

	</aside>

	<?php endwhile;?>
	<?php do_action('SimpleSpaceship_after_content'); ?>

</div>
<?php get_footer(); ?>