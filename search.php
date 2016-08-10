<?php get_header(); ?>

	<div class="wrapper index-page">
		<div class="portfolio">
			<div class="container">
				<div class="row three-columns-grid">
					<?php
						$args = array_merge( $wp_query->query_vars, array(
							'post_type' => 'post'
						) );

						$query = new WP_Query($args);

						if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
					?>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="item">
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
					<?php endwhile; wp_reset_postdata(); else: ?>
						<div class="home-photography no-page-bg">
							<div class="head-photo"></div>
							<div class="title-holder">
								<div class="page-title">
									<h2><?php echo esc_html_e("Oops!","Cassiopeia")?></h2>
									<span><?php echo esc_html_e("Sorry nothing found from these keywords.","Cassiopeia")?></span>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>