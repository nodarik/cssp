<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<span><?php echo esc_html_e("Press Enter to search","cassiopeia")?></span>
	<div id="close-search"><i class="fa fa-times"></i></div>
	<input type="search" name="s" id="search-input" placeholder="<?php esc_html__('Search...', 'cassiopeia')?>">
</form>