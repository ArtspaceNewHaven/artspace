<?php 
$bannerimage = get_field('banner_image');
get_header(); ?>

<section class="page-banner-image" style="background-image: url(<?php echo wp_get_attachment_url( $bannerimage ); ?>);">
	<div class="row">
		
	</div>
</section>

<div class="row">
	<div class="small-12 medium-12 columns ann-page-content" role="main">

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'SimpleSpaceship'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
		</article>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

	</div>
</div>
<?php get_footer(); ?>