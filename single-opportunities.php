<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-12 large-centered columns" role="main">

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php SimpleSpaceship_entry_meta(); ?>
			</header>

			<?php do_action('SimpleSpaceship_post_before_entry_content'); ?>
			
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
