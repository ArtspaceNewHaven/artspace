<?php 
/*
Template Name: Home
*/
global $post;
get_header(); ?>

<section role="slider" class="art-slider" style="top:-60px;">
	<div class="slide-init">
		<?php
				// check if the repeater field has rows of data
			if( have_rows('home_slide') ):
			  while ( have_rows('home_slide') ) : the_row(); ?>
				<div class="art-slide" style="background-image: url('<?php the_sub_field('image'); ?>');">
					<div class="row">
						<?php the_sub_field('title'); ?>
					</div>
				</div>
			<?php  endwhile;
			else :
			    // no rows found
			endif;
		?>
	</div>
	<div class="slide-nav">
		<div class="row">
			<h1><i class="ss-icon ss-standard ss-navigateleft"></i> <i class="ss-icon ss-standard ss-navigateright"></i></h1>
		</div>
	</div>
</section>

	<?php do_action('SimpleSpaceship_before_content'); ?>

	<?php while (have_posts()) : the_post(); ?>
		<main <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<?php do_action('SimpleSpaceship_page_before_entry_content'); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<section class="home-blocks">
				<ul class="medium-block-grid-2">
					<li>
						<div class="row">
							<div class="medium-10 medium-centered columns">
								<header>
									<h1>Events</h1>
								</header>
								<ul class="no-bullet event-list">
									<li>
			              <h4>Reunionizing, Union, and Re:Un: conversation with alumns on where we were then and where we are now <span class="event-date"><em>October 2016</em></span></h4>
			      				<p>Day long series of moderated panels and project presentations, to coincide with Artspace’s 19th annual City-Wide Open Studios</p>
			    				</li>
			    				<li>
			              <h4>Awakening the Architectural Ghosts of Artspace: A Performance and Processional  <span class="event-date"><em>June 2017</em></span></h4>
			      				<p>To coincide with the International Festival of Arts + Ideas</p>
			    				</li>
								</ul>
							</div>
						</div>
					</li>
					<li>
						<div class="row">
							<div class="medium-12 columns">
								<header>
									<h1>Exhibitions</h1>
								</header>
								<ul class="medium-block-grid-2">
									<li>
										<div class="card home">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/three-decades-exhib.jpg" alt="Three Decades of Change">
											<div class="copy-container">
												<h3>Three Decades of Change</h3>
												<h5 class="uppercase">October 29-November 1, 2015</h5>
												<p>Curated by Sarah Fritchey and Jeremy Wollin</p>
											</div>
										</div>
									</li>
									<li>
										<div class="card home">
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hello-world-thumb.jpg" alt="Hello World">
											<div class="copy-container">
												<h3>Hello World</h3>
												<h5 class="uppercase">December 4, 2015 - March 5, 2016</h5>
												<p>Curated by JR Uretsky</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</section>

			<section class="image-quote dark-lilac">
				<ul class="medium-block-grid-2">
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ann-image-1.jpg" >
					</li>
					<li>
						<blockquote>
							“A nurturing home for developing talent as well as a space devoted to exhibiting established local and regional artists. Truly one of the most impressive spaces in the City.”
							<cite>New Haven Advocate</cite>
						</blockquote>
					</li>
				</ul>
			</section>


			<section class="ann-timeline">
				<header class="row">
				<hr>
					<div class="medium-10 medium-centered columns text-center">
						<h1>Our History</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore incidunt perferendis et ipsam, sint! Dignissimos id recusandae molestiae animi, minima praesentium quibusdam assumenda necessitatibus porro, rem accusantium consequuntur voluptates maiores.</p>
					</div>
				</header>
				<div class="row p-y">
					<img src="/wp-content/themes/artspace/images/timeline-1.png" alt="1980's Timeline">
				</div>
			</section>

			<section class="ways-to-give">
				<div class="row">
					
				</div>
			</section>

			<section class="image-quote dark-lilac">
				<ul class="medium-block-grid-2">
					<li>
						<div class="row">
							<div class="medium-11 medium-centered columns">
								<blockquote>
									“A nurturing home for developing talent as well as a space devoted to exhibiting established local and regional artists. Truly one of the most impressive spaces in the City.”
									<cite>New Haven Advocate</cite>
								</blockquote>
							</div>
						</div>
					</li>
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ann-image-1.jpg" >
					</li>
				</ul>
			</section>

			<section class="ann-stories">
				<div class="row">
					
				</div>
			</section>

			<section class="ann-news">
				<div class="row">
					<div class="medium-6 columns">
						<h2>30th News</h2>
					</div>
					<div class="medium-6 columns">
						<h2>Commmittee for the 30th</h2>
						<ul class="no-bullet" style="-webkit-column-count: 2; -moz-column-count: 2; column-count: 2;">
							<li>Christina Spiesel, Co-Chair</li>
							<li>Julie Parr, Co-Chair</li>
							<li><br></li>
							<li>Elizabeth Alexander</li>
							<li>Marianne Bernstein</li>
							<li>Johanna Bresnick</li>
							<li>Jan Cunningham</li>
							<li>Jody Ellant</li>
							<li>Sarah Fritchey</li>
							<li>David Goldblum</li>
							<li>Karyn Gilvarg</li>
							<li>Debbie Hesse</li>
							<li>Helen Kauder</li>
							<li>Ruth Koizim</li>
							<li>Ann Lehman</li>
							<li>Carol LeWitt</li>
							<li>Linda Lindroth</li>
							<li>Denise Markonish</li>
							<li>Vivien Nemerson</li>
							<li>Matthew Nemerson</li>
							<li>Barbara Pearce</li>
							<li>Amy Pryor</li>
							<li>Jock Reynolds</li>
							<li>Eric Shiner</li>
							<li>Len Suzio</li>
							<li>Rob Storr</li>
							<li>Barry Svigals</li>
							<li>Bob Taplin</li>
							<li>Barbara Webster</li>
							<li>Jonathan Weinberg</li>
							<li>Susan Whetstone</li>
							<li>Andy Wolf</li>
						</ul>
					</div>
				</div>
			</section>
	

		</main>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

<?php get_footer(); ?>