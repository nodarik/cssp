<?php 
	get_header(); 
	$radiuzz_cassiopeia_pagetitle_bg = get_field("cassiopeia_pagetitle_background_image");
	$radiuzz_cassiopeia_pagetitle_title = get_field("cassiopeia_pagetitle_title");
	$radiuzz_cassiopeia_pagetitle_desc = get_field("cassiopeia_pagetitle_description");

	if(have_posts()) : while(have_posts()) : the_post();
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
								echo the_title();
							}
						?>
					</h2>
					<hr class="special">
					<span><?php echo esc_attr($radiuzz_cassiopeia_pagetitle_desc); ?></span>
				</div>
			</div>
			<div class="<?php echo esc_attr(($radiuzz_cassiopeia_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div>
		</div>
		<div class="blog blog-single" style="padding-top: 50px;">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10 col-sm-12 col-xs-12">
						<div class="col-md-2 share-side">
							<h5><?php echo esc_html_e("Share Via:","Cassiopeia")?></h5>
							<ul>
								<li><a href="#"><i class="fa fa-behance"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li>
							</ul>
						</div>
						<div class="col-md-10">
							<div class="blog-post ">
								<div class="post-content">
									<div class="details">
										<a href="<?php echo esc_attr(get_the_author_link()); ?>"><?php the_author(); ?></a>
										<span><?php the_time('F j, Y'); ?></span>
									</div>
									<?php the_content(); ?>
									<div class="tags">
										<?php
											$before = '';
											$seperator = ' '; 
											$after = '';
											the_tags( $before, $seperator, $after );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="comments">
							<?php comments_template(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
		

<?php
	endwhile; endif;
	get_footer(); 
?>