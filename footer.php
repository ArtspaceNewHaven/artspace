</section>
<section class="footer-border">
	<div class="row">
		<ul class="sub-nav">
			<li><a href="#"><i class="ss-icon ss-social-regular ss-twitter"></i></a></li>
			<li><a href="#"><i class="ss-icon ss-social-regular ss-facebook"></i></a></li>
			<li><a href="#"><i class="ss-icon ss-social-regular ss-instagram"></i> </a></li>
			<li><a href="#"><i class="ss-icon ss-social-regular ss-flickr"></i> </a></li>
		</ul>
	</div>
</section>
<footer role="main">
	<div class="row">
		<div class="large-6 columns footer-section footer-menus">
			<div class="row">
				<?php do_action('SimpleSpaceship_before_footer'); ?>
				<?php dynamic_sidebar("artspace-footer-widgets"); ?>
				<?php do_action('SimpleSpaceship_after_footer'); ?>
				<p class="copyright">Copyright © 2015  Artspace. All rights reserved. Terms and Conditions </p>
			</div>
		</div>
		<div class="large-3 columns footer-section hours-container">
			<div class="row open-next">
				<h6>Open Next:</h6>
				<h6>Wednesday 12pm</h6>
			</div>
			<div class="row hours">
				<h6>Wednesday - Thursday</h6>
				<h6>12 - 6pm</h6>
				<h6>Friday - Saturday</h6>
				<h6>12 - 8pm</h6>
				<h6>Sunday - Tuesday</h6>
				<h6>Closed</h6>
			</div>
		</div>
		<div class="large-3 footer-section columns">
			
		</div>
	</div>
</footer>
<a class="exit-off-canvas"></a>

	<?php do_action('SimpleSpaceship_layout_end'); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action('SimpleSpaceship_before_closing_body'); ?>
</body>
</html>
