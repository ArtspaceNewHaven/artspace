<?php 
/*
Template Name: Anniversary
*/
global $post;
get_header(); ?>

<section class="logo-block" style="background-image: url('<?php echo the_field('_ann_banner'); ?>;">
  <div class="row text-center">
    <img class="ann-logo wiggle" src="<?php echo the_field('_ann_logo'); ?>" alt="Artspace 30th Anniversary">
  </div>
</section>

<section id="annContent">
  <div class="row">
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile;?>
  </div>
</section>

<section class="events-exhibs">
  <div class="row">
    <div id="annEvents" class="medium-6 columns">
      <h2>Events</h2>
      <hr>
      <ul class="no-bullet event-list">
      <?php /// Events Loop
        if( have_rows('_ann_events') ):
        while ( have_rows('_ann_events') ) : the_row(); ?>
      <li>
        <?php the_sub_field('image'); ?>
        <h4><?php the_sub_field('title'); ?> <span class="event-date"><em>@ <?php the_sub_field('date_and_time'); ?></em></span></h4>
        <?php the_sub_field('description'); ?>
      </li>
      <?php 
        endwhile;
        else :

          // no rows found

        endif;
      ?>
      </ul>
    </div>
    <div id="annExhibitions" class="medium-6 columns">
      <h2>Exhibitions</h2>
      <hr>
      <ul class="no-bullet exhib-list">
      <?php
        $exhib_ids = get_field('_ann_exhibitions');

        $args = array (
          'post__in'  => $exhib_ids,
          'post_type' => array( 'exhibitions' ),
        );

        // The Query
        $exhibitions_query = new WP_Query( $args );

        // The Loop
        if ( $exhibitions_query->have_posts() ) {
          while ( $exhibitions_query->have_posts() ) {
            $exhibitions_query->the_post(); ?>
        
        <li>
          <div class="row">
            <div class="small-3 columns">
              <?php the_post_thumbnail( 'large', array( 'class' => 'circle-thumb' ) ); ?>  
            </div>
            <div class="small-9 columns">
              <h4><?php the_title(); ?></h4>
              <?php the_excerpt(); ?>
              <a href="<?php the_permalink(); ?>" class="button small success">Learn More</a>
            </div>
          </div>
        </li>

        <?php  }
        } else {
          // no exhibitions found
        }

        // Restore original Post Data
        wp_reset_postdata();
      ?>
      </ul>
    </div>
  </div>
</section>

<section id="annTimeline">
  <header class="row">
    <div class="medium-8 medium-centered columns text-center">
      <h1>Timeline</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae corporis, eius nesciunt hic vel officia modi, voluptates aperiam necessitatibus doloremque labore ullam. Placeat iste voluptate corporis odio quo dignissimos tenetur?</p>
    </div>
  </header>
  <div class="row">
    <div class="medium-12 columns">
    <ul class="tabs" data-tab role="tablist">
    <?php /// Timeline Loop
        if( have_rows('_ann_timeline') ):
        while ( have_rows('_ann_timeline') ) : the_row(); ?>
      <li class="tab-title" role="presentation">
        <a href="#timeline<?php the_sub_field('year'); ?>" role="tab" tabindex="0" aria-selected="true" aria-controls="timeline<?php the_sub_field('year'); ?>"><?php the_sub_field('year'); ?></a>
      </li>
      <?php  endwhile;
      else :
        // no rows found
      endif;
    ?>
    </ul>
    
    <div class="tabs-content">
    <?php /// Timeline Loop
        if( have_rows('_ann_timeline') ):
        while ( have_rows('_ann_timeline') ) : the_row(); ?>
      <section role="tabpanel" aria-hidden="false" class="content" id="timeline<?php the_sub_field('year'); ?>">
        <div class="row">
          <div class=""
          <?php the_sub_field('content'); ?>
          <?php the_sub_field('image'); ?>
         </div>
      </section>
      <?php  endwhile;
      else :
        // no rows found
      endif;
    ?>
    </div>
    </div>
  </div>
</section>

<section id="annStories">
  <header class="row">
    <div class="medium-10 medium-centered columns text-center">
      <hr>
      <h1>Stories</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam commodi obcaecati officia non necessitatibus alias, cum nam a enim tempora magnam aliquam veritatis molestiae, cumque excepturi minus. Molestiae, animi, soluta!</p>
      <hr>
    </div>
  </header>
  <div class="row">
    <div class="medium-8 medium-centered columns">
      <?php /// Stories Loop
        if( have_rows('_ann_stories') ):
        $i = 0;
        while ( have_rows('_ann_stories') ) : the_row(); ?>
        <?php $i++; ?>
        <?php if( $i > 3 ):
           break;
         endif; ?>
         <article class="ann-story">
            <?php the_sub_field('story_image'); ?>
            <h4><?php the_sub_field('title'); ?></h4>
            <?php the_sub_field('content'); ?>
          </article>
        <?php
        endwhile;
      else :
        // no rows found
      endif;
     ?>
     </div>
  </div>
</section>

<section id="annSponsors">
  <div class="row">
    <div class="small-5 columns">
      <h1>30th Anniversary Sponsors</h1>
    </div>
    <div class="small-7 columns">
    <ul class="medium-block-grid-4">
    <?php /// Ann Sponsors
      $sponsor_ids = get_field('_ann_sponsors');

      $args = array (
        'post_type'   => array( 'sponsors' ),
        'post__in'    => $sponsor_ids
      );

      $sponsors_query = new WP_Query( $args );

      if ( $sponsors_query->have_posts() ) {
        while ( $sponsors_query->have_posts() ) {
          $sponsors_query->the_post(); ?>
        <li>  
          <?php the_post_thumbnail(); ?>
        </li>

      <?php  }
      } else {
        // no sponsors found
      }

      wp_reset_postdata();
    ?>
    </ul>
    </div>
  </div>
</section>

<?php do_action('SimpleSpaceship_before_content'); ?>
<?php get_footer(); ?>