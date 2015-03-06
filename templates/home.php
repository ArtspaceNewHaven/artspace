<?php 
/*
Template Name: Home
*/
global $post;
get_header(); ?>


	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<main <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>

			
			<?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

		</main>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

<?php get_footer(); ?>