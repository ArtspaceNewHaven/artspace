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
											<a href="http://artspacenewhaven.org/exhibitions/three-decades-of-change/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/three-decades-exhib.jpg" alt="Three Decades of Change"></a>
											<div class="copy-container">
												<h3><a href="http://artspacenewhaven.org/exhibitions/three-decades-of-change/">Three Decades of Change</a></h3>
												<h5 class="uppercase">October 29-November 1, 2015</h5>
												<p>Curated by Sarah Fritchey and Jeremy Wollin</p>
											</div>
										</div>
									</li>
									<li>
										<div class="card home">
											<a href="http://artspacenewhaven.org/exhibitions/hello-world/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hello-world-thumb.jpg" alt="Hello World"></a>
											<div class="copy-container">
												<h3><a href="http://artspacenewhaven.org/exhibitions/hello-world/">Hello World</a></h3>
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
							“No other cultural event... brings the city so close together and involves the city so intensely.”
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
			</section>

			<section role="slider" class="timeline-slider">
				<div class="row">
					<div class="timeline-slides">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/timeline-1.png" alt="1980's Timeline">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/timline-95s.jpg" alt="1990's Timeline">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/timeline-2000s.jpg" alt="2000's Timeline">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/timline-2015.jpg" alt="2010's Timeline">
					</div>
				</div>
			</section>

			<section class="ways-to-give">
				<div class="row">
					
				</div>
			</section>

			<section class="image-quote perfect-teal">
				<ul class="medium-block-grid-2">
					<li>
						<div class="row">
							<div class="medium-11 medium-centered columns">
								<blockquote>
									“A nurturing home for developing talent as well as a space devoted to exhibiting established local and regional artists. Truly one of the most impressive spaces in the City.”
									<cite>New Haven Advocate, 2003</cite>
								</blockquote>
							</div>
						</div>
					</li>
					<li>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ann-image-2.jpg" >
					</li>
				</ul>
			</section>

			<section class="how-to-give" style="padding: 3rem 0;">
				<div class="row">
					<div class="medium-10 medium-centered columns text-center">
						<h1>Please Consider Supporting Artspace</h1>
						<p>Artspace is a non-profit organization bringing communities together with emerging local and national artists</p>
						<a href="http://artspacenh.org/support/support-artspace" target="_blank" class="button secondary">Learn More About Supporting Our Work</a>
					</div>
				</div>
			</section>

			<section class="ann-stories">
				<div class="row">
					
				</div>
			</section>

			<section class="ann-news">
				<div class="row">
					<div class="medium-6 columns">
						<h2>Thank You</h2>
						<p>Thanks to supporters like you, we have accomplished extraordinary things in just 30 years, and redefined how a community sees itself, establishing New Haven as a vibrant nexus for visual artists. As we mark this milestone with an array of exciting celebratory events and reflective programs,  our job is also to ensure that we:</p>
						<ul class="no-bullet">
							<li style="padding-bottom:0.5rem"><strong>Enhance</strong> our exhibitions and educational programs to extend their reach and impact. </li>
							<li style="padding-bottom:0.5rem"><strong>Equip</strong> artists and culture-bearers with resources for creative projects that will be path-breaking and consequential for Greater New Haven.</li>
							<li style="padding-bottom:0.5rem"><strong>Attract and retain</strong> exemplary arts professionals who will make a commitment to New Haven and grow into Artspace’s next generation leadership.</li>
							<li style="padding-bottom:0.5rem"><strong>Capitalize</strong> on the participation and visibility of City-Wide Open Studios to build community across sectors, with expanded planning, networking, and collaborations.</li>
							<li style="padding-bottom:0.5rem"><strong>Make a sustained commitment</strong> to prepare today’s teens in the New Haven Public School district to succeed through such programs as our annual Summer Apprenticeship.</li>
							<li style="padding-bottom:0.5rem">And, most directly,</li>
							<li><strong>Position</strong> Artspace and the artist community for excellence and sustainability for the next 30 years.</li>
						</ul>
					<p>Thank you for being part of <strong>THREE DECADES OF CHANGE.</strong></p>

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
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-30th.png" alt="Three Decades of Change">
					</div>
				</div>
			</section>
	

		</main>
	<?php endwhile;?>

	<?php do_action('SimpleSpaceship_after_content'); ?>

<?php get_footer(); ?>