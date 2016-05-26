<?php 
	/* Template Name: Portfolio */
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
					<hr class="special">
					<span><?php echo esc_attr($radiuzz_cassiopeia_pagetitle_desc); ?></span>
				</div>
			</div>
			<div class="<?php echo esc_attr(($radiuzz_cassiopeia_pagetitle_bg) ? 'mouse' : 'display-none'); ?>"></div>
		</div>
		<?php
			if(get_field("cassiopeia_portfolio_layout") == '1'){
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry3 two-columns-grid";
				$radiuzz_cassiopeia_portfolio_item = "col-md-6 col-sm-6 col-xs-12";	
			}

			else if(get_field("cassiopeia_portfolio_layout") == '2'){
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry2 three-columns-grid";
				$radiuzz_cassiopeia_portfolio_item = "col-md-4 col-sm-6 col-xs-12";
			}

			else if(get_field("cassiopeia_portfolio_layout") == '3'){
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry four-columns-grid";
				$radiuzz_cassiopeia_portfolio_item = "col-md-3 col-sm-4 col-xs-12";
			}

			else if(get_field("cassiopeia_portfolio_layout") == '4'){
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry3";
				$radiuzz_cassiopeia_portfolio_item = "col-md-6 col-sm-6 col-xs-12";
			}

			else if(get_field("cassiopeia_portfolio_layout") == '5'){
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry";
				$radiuzz_cassiopeia_portfolio_item = "col-md-4 col-sm-6 col-xs-12";
			}

			else if(get_field("cassiopeia_portfolio_layout") == '5'){
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry";
				$radiuzz_cassiopeia_portfolio_item = "col-md-4 col-sm-6 col-xs-12";
			}

			else {
				$radiuzz_cassiopeia_portfolio_content = "portfolio";
				$radiuzz_cassiopeia_portfolio_row = "row portfolio-masonry2";
				$radiuzz_cassiopeia_portfolio_item = "col-md-3 col-sm-4 col-xs-12";
			}

			if(have_posts()) : while(have_posts()) : the_post();
		?>

		<div class="<?php echo esc_attr($radiuzz_cassiopeia_portfolio_content); ?>">
			<div class="container">
				<?php

					$enable_filters = get_field("cassiopeia_portfolio_filters");
					$filters = get_field("cassiopeia_portfolio_filter_tags");

					if($enable_filters && $filters) :

				?>
				<div class="filters">
					<ul id="filters">
						<li class="active" data-filter="*">All</li>
						<?php foreach($filters as $filter) : ?>
							<li data-filter=".<?php echo esc_attr($filter->slug); ?>"><?php echo esc_attr($filter->name); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="<?php echo esc_attr("$radiuzz_cassiopeia_portfolio_row"); ?>">
					<?php 

						$radiuzz_cassiopeia_portfolio_category = get_field("cassiopeia_portfolio_category");


			            $args = array(
							"post_type" => "post",
							"cat" => $radiuzz_cassiopeia_portfolio_category,
							"posts_per_page" => -1,
			            	'paged' => $paged
						);

			       		$query = new WP_Query($args);

						if ( get_query_var('paged') ) {
	                        $paged = get_query_var('paged');
	                    } 
	                    elseif ( get_query_var('page') ) {
	                        $paged = get_query_var('page');
	                    } 
	                    else {
	                        $paged = 1;
	                    }

	                    if(!empty($radiuzz_cassiopeia_portfolio_category)) :

						if($query->have_posts()) : while($query->have_posts()) : $query->the_post();

	                    $post_tags = get_the_tags();
					?>
					<div class="<?php echo esc_attr($radiuzz_cassiopeia_portfolio_item ); ?> <?php if($post_tags) { foreach($post_tags as $tag) { echo esc_attr($tag->slug . ' '); } }  ?>">
						<div class="item">
							<div class="overlay">
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
	                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/default.png" />';
	                            }
	                        ?>
						</div>
					</div>
					<?php endwhile; endif; wp_reset_postdata(); endif; ?>
				</div>
			</div>
		</div>
		<div class="display-none">
			<?php wp_link_pages( $args ); ?>
			<?php previous_posts_link(); ?>
			<?php posts_nav_link(); ?>
		</div>
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>