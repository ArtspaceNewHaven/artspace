<?php 
/*
Template Name: With Sidebar
*/
get_header(); ?>

<div class="row" data-equalizer>
	<div class="medium-3 columns adjusted-side" data-equalizer-watch>
		<div class="row">
			<div class="small-11 columns gray-sidebar" data-equalizer-watch>
				<?php dynamic_sidebar('sidebar-widgets'); ?>
			</div>
		</div>
	</div>
	
	<div class="small-12 medium-9 columns content-box" role="main" data-equalizer-watch>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
			<div class="entry-content row">
				<div class="medium-12 medium-centered columns">
					<?php the_content(); ?>
				</div>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'SimpleSpaceship'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		</article>
	<?php endwhile;?>
	<?php do_action('SimpleSpaceship_after_content'); ?>

		<div class="row">
			<div class="medium-12 medium-centered columns">
				<ul class="medium-block-grid-2">
					<li>
						<div class="image-w-banner vcenter-container" style="background-image: url(http://devslate.com/wp-content/uploads/2015/03/mainpage_cardimage_upcoming.jpg);">
							<div class="vcenter-content">
								<div class="ribbon text-center">
									<h4>2015</h4>
								</div>
							</div>
						</div>
					</li>
					<li>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>
<?php get_footer(); ?>