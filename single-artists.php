<?php 
global $post;
$primaryMedium = get_post_meta( get_the_ID(), '_artist_primary_media', true );
$otherMedium = get_post_meta( get_the_ID(), '_artist_secondary_media', true );
$address = get_post_meta( get_the_ID(), '_artist_address', true );
$neighborhood = get_post_meta( get_the_ID(), '_artist_neighborhood', true );
$website = get_post_meta( get_the_ID(), '_artist_url', true );
$email = get_post_meta( get_the_ID(), '_artist_email', true );
$bio = get_post_meta( get_the_ID(), '_artist_bio', true );

get_header(); ?>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>

<div class="row content-container" data-equalizer>

	<aside class="medium-3 large-3 columns left-col" data-equalizer-watch style="width: 290px;">
	<?php echo do_shortcode( '[searchandfilter fields="search,post_types" post_types="artists" headings=",Post Types"]' ); ?>
	</aside>

	<main class="medium-9 large-9 columns main-col" data-equalizer-watch>
		<section class="gallery">
			<div class="row">
			<div class="medium-8 columns">
				<?php if ( has_post_thumbnail() ): ?>
					<?php the_post_thumbnail('', array('class' => 'main-thumb')); ?>
				<?php endif; ?>
			</div>
			<div class="medium-4 columns">
				<?php  $images = get_field('_artist_gallery');
				if( $images ): ?>
			    <ul class="medium-block-grid-2 clearing-thumbs" data-clearing>
			        <?php foreach( $images as $image ): ?>
			            <li>
			                <a href="<?php echo $image['url']; ?>">
			                     <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
			                </a>
			                <p><?php echo $image['caption']; ?></p>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="artist-contact">
			<div class="row">
				<div class="medium-6 columns">
					<header>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header>
					<section class="artist-medium">
						<div class="row">
							<div class="medium-12 columns">
								<ul class="no-bullet">
									<li><h3>Primary Medium: <span class="primary-medium"><?php echo $primaryMedium; ?></span></h3></li>
									<li><h3>Other Media: <span class="other-media"><?php echo $otherMedium; ?></span></h3></li>
								</ul>
							</div>
						</div>	
					</section>
				</div>
				<div class="medium-6 columns">
					<div class="contact-card">
						<h4>contact</h4>
						<p class="address"><?php echo $address; ?></p>
						<p class="email"><?php echo $email; ?></p>
						<p class="web"><?php echo $website; ?></p>
					</div>
				</div>
			</div>
		</section>

		<section class="artist-stateent">
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
		
<?php get_footer(); ?>