<?php get_header(); ?>

	<div class="wrapper index-page">
		<div class="portfolio">
			<div class="container">
				<div class="row portfolio-masonry3 three-columns-grid">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div <?php post_class('item'); ?>>
							<div class="overlay <?php if(has_post_thumbnail()){}  else {echo 'no-thumbnail';}?>">
								<div class="overlay-inner">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<span><?php the_category(' '); ?></span>
								</div>
							</div>
							<?php 
	                            if(has_post_thumbnail()){
	                                the_post_thumbnail();
	                            }
	                            else {
	                                echo '<div class="no-featured-image"></div>';
	                            }
	                        ?>
						</div>
					</div>
					<?php endwhile; endif; ?>
					
				</div>
				</div>
				
					<div class="row">
					<div class="col-md-12 pagination-holder">
						<?php the_posts_pagination( array( 'mid_size'  => 2 ) ); ?>
					</div>
				</div>
				
			</div>
			
		</div>
	</div>


<?php get_footer(); ?>