<?php
$block_number = get_sub_field('block_number');
if( have_rows('banner_blocks') ):
  echo '<ul class="medium-block-grid-' . $block_number . '">';
  // loop through the rows of data
  while ( have_rows('banner_blocks') ) : the_row();
    $image = get_sub_field('bg_image'); ?>

    <li>
      <div class="image-w-banner vcenter-container" style="background-image: url(<?php echo $image; ?>);">
        <div class="vcenter-content">
          <div class="ribbon text-center">
            <a href="<?php the_sub_field('link'); ?>">
              <h4><?php the_sub_field('title'); ?></h4>
            </a>
          </div>
        </div>
      </div>
    </li>
    
  <?php endwhile;
  echo '</ul>';
endif; // banner_blocks
?>  