<?php do_action('SimpleSpaceship_before_searchform'); ?>
<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
	<div class="row collapse">
		<?php do_action('SimpleSpaceship_searchform_top'); ?>
		<div class="small-8 columns">
			<input type="text" value="" name="s" id="s" placeholder="<?php esc_attr_e('Search', 'SimpleSpaceship'); ?>">
		</div>
		<?php do_action('SimpleSpaceship_searchform_before_search_button'); ?>
		<div class="small-4 columns">
			<input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'SimpleSpaceship'); ?>" class="prefix button">
		</div>
		<?php do_action('SimpleSpaceship_searchform_after_search_button'); ?>
	</div>
</form>
<?php do_action('SimpleSpaceship_after_searchform'); ?>
