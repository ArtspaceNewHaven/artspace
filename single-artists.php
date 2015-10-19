<?php 
global $post;
$primaryMedium = get_post_meta( get_the_ID(), '_artist_primary_media', true );
$otherMedium = get_post_meta( get_the_ID(), '_artist_secondary_media', true );
$address = get_post_meta( get_the_ID(), '_artist_address', true );
$neighborhood = get_post_meta( get_the_ID(), '_artist_neighborhood', true );
$website = get_post_meta( get_the_ID(), '_artist_url', true );
$email = get_post_meta( get_the_ID(), '_artist_email', true );
$bio = get_post_meta( get_the_ID(), '_artist_bio', true );
$bannerimage = get_field('banner_image');

get_header(); ?>

<section class="page-banner-image" style="background-image: url(<?php echo wp_get_attachment_url( $bannerimage ); ?>);">
	<div class="row">
		
	</div>
</section>

<?php get_template_part('partials/breadcrumbs'); ?>

<section class="container" role="document">

<?php do_action('SimpleSpaceship_before_content'); ?>

<?php while (have_posts()) : the_post(); ?>

<section class="artist-lead">
	<div class="row">
		<div class="medium-6 small-12 columns">
			<h2><?php the_title(); ?></h2>
			<ul class="no-bullet">
				<li><h4>Primary Medium: <span class="primary-medium"><?php echo $primaryMedium; ?></span></h4></li>
				<li><h4>Other Media: <span class="other-media"><?php echo $otherMedium; ?></span></h4></li>
			</ul>
		</div>
		<div class="medium-6 small-12 columns">
			<div class="contact-card-content">
				<p class="address"><?php echo $address; ?></p>
				<p class="email"><?php echo $email; ?></p>
				<p class="web"><?php echo $website; ?></p>
			</div>
		</div>
	</div>
</section>

<section class="gallery">
	<ul class="medium-block-grid-2 small-block-grid-1">
		<li class="left-block">
			<?php 
				$post_thumbnail_id = get_post_thumbnail_id( get_the_id() ); 
				$thumb_source = wp_get_attachment_image_src($post_thumbnail_id, 'large');
				$thumb_height = $thumb_source[2];
				?>
			<div class="main-thumb" style="background-image: url( <?php echo $thumb_source[0]; ?>); height: <?php echo $thumb_height; ?>px">
				
			</div>
		</li>
		<li class="right-block">
			<?php  $images = get_field('_artist_gallery');
				if( $images ): ?>
			    <ul class="medium-block-grid-4 small-block-grid-2 artist-gallery-blocks">
			        <?php foreach( $images as $image ): ?>
			            <li style="background-image: url(<?php echo $image['url']; ?>);">
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
		</li>
	</ul>
</section>

<div class="row content-container">

	<main class="medium-12 columns main-col">

		<section class="artist-statement">
			<div class="row">
				<div class="small-12 large-12 large-centered columns" role="main">
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					
						<?php do_action('SimpleSpaceship_post_before_entry_content'); ?>
						
						<div class="entry-content">
							<h3>Artist Statement</h3>
							<?php the_content(); ?>
						</div>
					
					</article>
				<?php endwhile;?>

				<?php do_action('SimpleSpaceship_after_content'); ?>

				</div>
			</div>
		</section>
		
	</main>
</div>
</section>
<?php get_footer(); ?>