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

	<aside class="medium-3 large-3 columns left-col" data-equalizer-watch>
	<?php echo do_shortcode( '[searchandfilter fields="search,post_types" post_types="artists" headings=",Post Types"]' ); ?>
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

	<main class="medium-9 large-9 columns main-col" data-equalizer-watch>
		<section class="gallery">
			<div class="row">
			<div class="medium-8 columns thumb-container">
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
						<header><h4>contact</h4></header>
						<div class="contact-card-content">
							<p class="address"><?php echo $address; ?></p>
							<p class="email"><?php echo $email; ?></p>
							<p class="web"><?php echo $website; ?></p>
						</div>
					</div>
				</div>
			</div>
		</section>

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
		
<?php get_footer(); ?>