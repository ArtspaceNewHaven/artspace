<?php get_header('cwos'); ?>
<div class="row">
<!-- Row for main content area -->
  <div class="small-12 large-12 columns" role="main">

  <?php if ( have_posts() ) : ?>

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'partials/content', get_post_format() ); ?>
    <?php endwhile; ?>

    <?php else : ?>
      <?php get_template_part( 'partials/content', 'none' ); ?>

  <?php endif; // end have_posts() check ?>

  <?php /* Display navigation to next/previous pages when applicable */ ?>
  <?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>
    <nav id="post-nav">
      <div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
      <div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
    </nav>
  <?php } ?>

  </div>
</div>
<?php get_footer(); ?>