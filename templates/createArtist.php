<?php 
/*
Template Name: Create Artist
*/
global $post;
acf_form_head();
get_header(); ?>


	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<main <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<header class="row">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>

			
			<?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>

			</div>

		</main>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

	<section class="create-artist-form">
		<div class="row">
			<div class="medium-8 medium-centered columns">
				<?php
					$options = array(
						/* (string) Unique identifier for the form. Defaults to 'acf-form' */
						'id' => 'acf-form',
						'post_id' => 'new_post',
						'new_post' => array(
							'post_type' => 'artists',
							'post_status' => 'publish'
							),
						'field_groups' => array('group_554cd3570863b', 'group_554cfdb5d1f9c'),
						'fields' => false,
						'post_title' => true,
						'post_content' => true,
						'form' => true,
						'form_attributes' => array(
								'class' => 'artist-form'
								),
						'return' => '',
						'html_before_fields' => '',
						'html_after_fields' => '',
						'submit_value' => __("Update", 'acf'),
						'updated_message' => __("Post updated", 'acf'),
						'label_placement' => 'top',
						'instruction_placement' => 'label',
						'field_el' => 'div',
						'uploader' => 'basic'
						
						);
					?>
				<?php acf_form( $options ); ?>
			</div>
		</div>
	</section>

<?php get_footer(); ?>