<?php 
	get_header(); 
	$radiuzz_cassiopeia_pagetitle_bg = get_field("cassiopeia_pagetitle_background_image");
?>


	<div class="wrapper">
		<div class="home-photography no-page-bg" style="height:100vh;">
			<div class="head-photo"></div>
			<div class="title-holder">
				<div class="page-title">
					<h2><?php echo esc_html_e("Page not found","Cassiopeia")?></h2>
					<hr class="special">
					<span><?php echo esc_html_e("Sorry, but the page you were trying to view does not exist.","Cassiopeia")?></span>
				</div>
			</div>
		</div>
	</div>
	

<?php
	get_footer(); 
?>