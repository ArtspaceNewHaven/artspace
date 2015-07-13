<?php 
/*
Template Name: Home
*/
global $post;
get_header(); ?>

<section role="slider" class="art-slider">
	<div class="slide-init">
		<?php
				// check if the repeater field has rows of data
			if( have_rows('home_slide') ):
			  while ( have_rows('home_slide') ) : the_row(); ?>
				<div class="art-slide" style="background-image: url('<?php the_sub_field('image'); ?>');">
					<div class="row">
						<?php the_sub_field('title'); ?>
					</div>
				</div>
			<?php  endwhile;
			else :
			    // no rows found
			endif;
		?>
	</div>
	<div class="slide-nav">
		<div class="row">
			<h1><i class="ss-icon ss-standard ss-navigateleft"></i> <i class="ss-icon ss-standard ss-navigateright"></i></h1>
		</div>
	</div>
</section>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<main <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

<section class="home-blocks">
	<div class="row">
		<ul class="medium-block-grid-3">
			<li class="col-1">
				<div class="card home">
					<img src="http://devslate.com/wp-content/uploads/2015/06/about_mission_01.jpg" alt="">
					<div class="copy-container">
						<h3>Now Accepting Applications</h3>
						<h5 class="uppercase">SUMMER APRPRENTICESHIP PROGRAM</h5>
						<p>Lorem ipsum dolor sit amet, nostrud apeirian lkis... <a href="#">more</a></p>
					</div>
				</div>
				<div class="anniversary">
					<a href="#"><img src="http://devslate.com/wp-content/uploads/2015/06/30th_logo_webversion.jpg" alt=""></a>
				</div>
			</li>
			<li class="col-2">
				<div class="card home">
					<div class="copy-container">
						<h3>Now Accepting Applications</h3>
						<h5 class="uppercase">SUMMER APRPRENTICESHIP PROGRAM</h5>
						<p>Lorem ipsum dolor sit amet, nostrud apeirian lkis... <a href="#">more</a></p>
					</div>
				</div>
				<div class="card home">
					<img src="http://devslate.com/wp-content/uploads/2015/06/about_mission_03.jpg" alt="">
					<div class="copy-container">
						<h3>Now Accepting Applications</h3>
						<h5 class="uppercase">SUMMER APRPRENTICESHIP PROGRAM</h5>
						<p>Lorem ipsum dolor sit amet, nostrud apeirian lkis... <a href="#">more</a></p>
					</div>
				</div>
			</li>
			<li class="col-3">
				<div class="card home">
					<img src="http://devslate.com/wp-content/uploads/2015/06/about_mission_03.jpg" alt="">
					<div class="copy-container">
						<h3>Now Accepting Applications</h3>
						<h5 class="uppercase">SUMMER APRPRENTICESHIP PROGRAM</h5>
						<p>Lorem ipsum dolor sit amet, nostrud apeirian lkis... <a href="#">more</a></p>
					</div>
				</div>
				<div class="card home">
					<img src="http://devslate.com/wp-content/uploads/2015/06/about_mission_03.jpg" alt="">
					<div class="copy-container">
						<h3>Now Accepting Applications</h3>
						<h5 class="uppercase">SUMMER APRPRENTICESHIP PROGRAM</h5>
						<p>Lorem ipsum dolor sit amet, nostrud apeirian lkis... <a href="#">more</a></p>
					</div>
				</div>
			</li>
		</ul>
	</div>
</section>
			

		</main>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

<?php get_footer(); ?>