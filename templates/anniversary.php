<?php 
/*
Template Name: Anniversary
*/
global $post;

// Events = _ann_events -> title, description, image, date_and_time
// Giving Section = _ann_giving_section_content
// Sponsors = _ann_sponsors

get_header(); ?>

<section class="logo-block" style="background-image: url('<?php echo the_field('_ann_banner'); ?>;">
  <div class="row text-center">
    <img class="ann-logo wiggle" src="<?php echo the_field('_ann_logo'); ?>" alt="Artspace 30th Anniversary">
  </div>
</section>

<section class="stories">
  <div class="div">
    <?php 
        if( have_rows('_ann_stories') ):
        while ( have_rows('_ann_stories') ) : the_row();
            // display a sub field value
            the_sub_field('title');
            the_sub_field('content');
            the_sub_field('story_image');

        endwhile;
      else :

        // no rows found

      endif;
     ?>
  </div>
</section>


  <?php do_action('SimpleSpaceship_before_content'); ?>

  <?php get_footer(); ?>