<?php 
/*
Template Name: CWOS Feature
*/
get_header('cwos'); ?>

<header class="row cwos-feature-image">
  <div class="small-12 columns">
    <img src="<?php the_field('header_image'); ?>" >
  </div>
</header>

<div class="row">
  
  <div class="small-12 columns" role="main">

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

  <section class="cwos-flex">
    <div class="row">
      <div class="small-12 columns">
        <?php if( have_rows('cwos_flex_blocks') ):
          while ( have_rows('cwos_flex_blocks') ) : the_row();
            if( get_row_layout() == 'title_blocks' ): ?>
              
              <?php get_template_part( 'partials/blocks', 'banners' ); ?>

          <?php elseif( get_row_layout() == 'content_block'): ?>
            <h2><?php the_sub_field('title'); ?></h2>
            <?php the_sub_field('wysiwyg'); ?>
          <?php
            endif; // gallery
          endwhile; //
          else :
            // no layouts found
          endif; ?>
      </div>
    </div>
  </section>

<!-- sponsorships go here -->
  <section class="sponsors">
    <header class="row">
      <div class="small-12 columns">
        <h4>Sponsors</h4>
      </div>
    </header>
    <div class="row">
      <div class="medium-12 columns">
        <ul class="medium-block-grid-4">
          <?php 
          $sponsor_ids = get_field('connected_sponsors', false, false);
          $args = array (
            'post__in'               => $sponsor_ids,
            'post_type'              => 'sponsors',
            'orderby'                => 'rand',
          );

          $sponsor_query = new WP_Query( $args );
          if ( $sponsor_query->have_posts() ) {
            while ( $sponsor_query->have_posts() ) {
              $sponsor_query->the_post(); ?>
          
          <li>
            <?php the_post_thumbnail(); ?>
          </li>

          <?php  }
          } else {
            // no posts found
          }
          // Restore original Post Data
          wp_reset_postdata();
        ?>
        </ul>
      </div>
    </div>
  </section>
  
  </div>
</div>
<?php get_footer(); ?>