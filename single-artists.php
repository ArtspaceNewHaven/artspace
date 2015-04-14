<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-12 large-centered columns" role="main">

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<?php 
				$primary = get_post_meta( get_the_ID(), '_artist_primary_media', true ); 
				$secondary = get_post_meta( get_the_ID(), '_artist_secondary_media', true );
				$statement = get_post_meta( get_the_ID(), '_artist_statement', true );
				$address = get_post_meta( get_the_ID(), '_artist_address', true );
				$email = get_post_meta( get_the_ID(), '_artist_email', true );
				$website = get_post_meta( get_the_ID(), '_artist_url', true );
				?>

			
				<div class="large-8 columns">
					<header>
						<h2 class="entry-title" style="padding-bottom: 1rem;"><?php the_title(); ?></h2>
						<!-- <?php SimpleSpaceship_entry_meta(); ?> -->
					</header>


					<?php do_action('SimpleSpaceship_post_before_entry_content'); ?>

			
			
					<div class="media" style="padding-bottom: 1rem;">
						<p><strong>Primary Media:</strong> <?php echo $primary; ?><br>

						<strong>Other Media:</strong> <?php echo $secondary; ?></p>
					</div>
				</div>

				<div class="large-4 columns">
					<section class="grey-banner" style="background: #e4e4e4; padding: 1rem; padding-left: 1rem;">
						<div class="large-12 columns">
							<h6 style="color: #c8b92d; margin-top: -0.6rem;">contact</h6>
						</div>
					</section>

					<section class="white-box" style="background: white; padding: 1rem;">
						<div class="address" style="padding-bottom: 1rem;">

							<?php echo $address; ?>
							<?php
							$neighborhood = get_post_meta( get_the_ID(), '_artist_neighborhood', true );
								if ( $neighborhood ) {
							?>

								<em><?php echo $neighborhood; ?></em>

							<?php }else {
							}?>
						</div>
						
						<div class="email">
							<?php echo $email; ?>
						</div>
						<div class="website">
							<a href="<?php echo $website; ?>"><?php echo $website; ?></a>
						</div>
					</section>
				</div>	


			<div class="artist-statement" style="padding-bottom: 2rem;">
				<h5>Artist Statement</h5>

				<?php echo $statement; ?>
			</div>

			<div class="artist-bio">
				<?php
				$bio = get_post_meta( get_the_ID(), '_artist_bio', true );
					if ( $bio ) {
				?>

					<h5>Bio</h5>
					<?php echo $bio; ?>

				<?php }else {
				}?>
			</div>

			
			<div class="entry-content">

				<?php if ( has_post_thumbnail() ): ?>
					<div class="row">
						<div class="column">
							<?php the_post_thumbnail('', array('class' => 'th')); ?>
						</div>
					</div>
				<?php endif; ?>

				<?php the_content(); ?>
			</div>
		
		</article>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

	</div>
</div>
<?php get_footer(); ?>