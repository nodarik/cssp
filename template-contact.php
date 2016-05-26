<?php 
	/* Template Name: Contact */
	get_header();
	$radiuzz_cassiopeia_pagetitle_bg = get_field("cassiopeia_pagetitle_background_image");
	$radiuzz_cassiopeia_pagetitle_title = get_field("cassiopeia_pagetitle_title");
	$radiuzz_cassiopeia_pagetitle_desc = get_field("cassiopeia_pagetitle_description");
?>

	<div class="wrapper">
		<div class="<?php echo esc_attr(($radiuzz_cassiopeia_pagetitle_bg) ? 'home-photography' : 'home-photography no-page-bg'); ?>">
			<div class="head-photo" style="background-image: url(<?php echo esc_url($radiuzz_cassiopeia_pagetitle_bg); ?>);"></div>
			<div class="title-holder">
				<div class="page-title">
					<h2>
						<?php
							if($radiuzz_cassiopeia_pagetitle_title){
								echo esc_attr($radiuzz_cassiopeia_pagetitle_title);
							}
							else {
								echo esc_attr(the_title());
							}
						?>
					</h2>
					<span><?php echo esc_attr($radiuzz_cassiopeia_pagetitle_desc); ?></span>
				</div>
			</div>
			<div class="<?php echo esc_attr(($radiuzz_cassiopeia_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div>
		</div>
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div class="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<div class="contact-info adress">
							<?php the_content(); ?>
						</div>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="contact-form">
							<?php echo esc_attr(the_field("cassiopeia_contact_form")); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>