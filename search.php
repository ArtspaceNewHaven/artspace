<?php 
// For Searching by Custom Post Type
$post_type = $_GET['post_type'];

get_header(); ?>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php //// Start Search Results for Artists //////////////////////////////
		if ( isset( $post_type ) && $post_type == 'artists' ) { ?>
    
    <section class="page-banner-image" style="background-image: url(<?php the_field('_artist_arch_image', 'option'); ?>);">
      <div class="row post-type-search">
        <div class="medium-6 columns">
          <h2>Aritst Directory</h2>
          <form role="search" method="get" class="artist-search-form" action="<?php echo home_url( '/' ); ?>">
            <label>
              <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search artists…', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            </label>
            <input type="hidden" name="post_type" value="artists" />
          </form>
        </div>
      </div>
    </section>

    <header class="row">
      <div class="small-12 columns">
        <h2><?php _e( 'Artist search results for', 'SimpleSpaceship'); ?> "<?php echo get_search_query(); ?>"</h2>
      </div>
    </header>
    
    <section class="search-results">
      <div class="row">
        <div class="small-12 columns">
          <ul class="medium-block-grid-4">
            <?php /// Loop for Artists
              if ( have_posts() ) :  while ( have_posts() ) : the_post(); 
              $thumb_id = get_post_thumbnail_id();
              $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
             ?>

      			<li>
              <a href="<?php the_permalink(); ?>">
                <div class="artist-thumb-container" style="background-image: url(<?php echo $thumb_url[0]; ?>);" >
                </div>
                <h4><?php the_title(); ?></h4>
              </a>
            </li> 

            <?php endwhile;  else : ?>
              <?php get_template_part( 'partials/content', 'none' ); ?>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </section>

	 <?php //// Start Search Results for Flat Files ////////////////////////////////
    } elseif ( isset( $post_type ) && $post_type == 'flatfiles' ) { ?>
    <!-- flat files here -->

    <section class="search-results">
      <div class="row">
        <div class="small-12 columns">
          <ul class="medium-block-grid-4">
            <?php /// Loop for Artists
              if ( have_posts() ) :  while ( have_posts() ) : the_post(); 
              $thumb_id = get_post_thumbnail_id();
              $thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
             ?>

            <li>
              <a href="<?php the_permalink(); ?>">
                <div class="artist-thumb-container" style="background-image: url(<?php echo $thumb_url[0]; ?>);" >
                </div>
                <h4><?php the_title(); ?></h4>
              </a>
            </li> 

            <?php endwhile;  else : ?>
              <?php get_template_part( 'partials/content', 'none' ); ?>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </section>

	<?php	//// Start Search Results for Exhibitions ////////////////////////////
  } elseif ( isset( $post_type ) && $post_type == 'exhibitions' ) { ?>
		<?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
    <!-- exhibitions here -->
    <?php endwhile;  else : ?>
      <?php get_template_part( 'partials/content', 'none' ); ?>
    <?php endif;?>
	<?php	}
		/// likely need to add more things here
		else { echo 'We did not find anything.'; } ?>

<?php do_action('SimpleSpaceship_before_pagination'); ?>

<?php if ( function_exists('SimpleSpaceship_pagination') ) { SimpleSpaceship_pagination(); } else if ( is_paged() ) { ?>

	<nav id="post-nav">
		<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'SimpleSpaceship' ) ); ?></div>
		<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'SimpleSpaceship' ) ); ?></div>
	</nav>
<?php } ?>

<?php do_action('SimpleSpaceship_after_content'); ?>

<?php get_footer(); ?>