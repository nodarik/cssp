<?php 
	/* Template Name: Blog */
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
		<?php 
			if(get_field('cassiopeia_blog_layout') == '1'){
	            $radiuzz_cassiopeia_blog_content = "col-md-9 col-sm-9 col-xs-12";
	            $radiuzz_cassiopeia_blog_sidebar = "col-md-3 col-sm-3 col-xs-12";
	            $radiuzz_cassiopeia_blog_masonry = "row";
	            $radiuzz_cassiopeia_blog_post = "blog-post";
	        }

	        elseif(get_field('cassiopeia_blog_layout') == '2'){
	        	$radiuzz_cassiopeia_blog_content = "col-md-offset-1 col-md-10 col-sm-12 col-xs-12";
	        	$radiuzz_cassiopeia_blog_sidebar = "display-none";
	        	$radiuzz_cassiopeia_blog_masonry = "row";
	        	$radiuzz_cassiopeia_blog_post = "blog-post";
	        }

	        elseif(get_field('cassiopeia_blog_layout') == '3'){
	        	$radiuzz_cassiopeia_blog_content = "row";
	        	$radiuzz_cassiopeia_blog_sidebar = "display-none";
	        	$radiuzz_cassiopeia_blog_masonry = "blog-masonry";
	        	$radiuzz_cassiopeia_blog_post = "blog-post col-md-4";	
	        }

	        elseif(get_field('cassiopeia_blog_layout') == '4'){
	        	$radiuzz_cassiopeia_blog_content = "row";
	        	$radiuzz_cassiopeia_blog_sidebar = "display-none";
	        	$radiuzz_cassiopeia_blog_masonry = "blog-masonry2";
	        	$radiuzz_cassiopeia_blog_post = "blog-post col-md-6";
	        }
		?>
		<div class="blog" style="padding-top: 50px;">
			<div class="container">
				<div class="<?php echo esc_attr($radiuzz_cassiopeia_blog_masonry); ?>">
					<div class="<?php echo esc_attr($radiuzz_cassiopeia_blog_content); ?>">
						<?php 
							if ( get_query_var('paged') ) {
		                        $paged = get_query_var('paged');
		                    } 
		                    elseif ( get_query_var('page') ) {
		                        $paged = get_query_var('page');
		                    } 
		                    else {
		                        $paged = 1;
		                    }

		                    $radiuzz_cassiopeia_blog_category = get_field("cassiopeia_blog_category");
		                    $radiuzz_cassiopeia_blog_postperpage = get_field("cassiopeia_blog_postperpage");

		                    if($radiuzz_cassiopeia_blog_postperpage){
		                    	$radiuzz_cassiopeia_blog_ppp = $radiuzz_cassiopeia_blog_postperpage;
		                    }
		                    else {
		                    	$radiuzz_cassiopeia_blog_ppp = "5";
		                    }

		                    if(!empty($radiuzz_cassiopeia_blog_category)) :

		                    $args = array(
								"post_type" => "post",
								"cat" => $radiuzz_cassiopeia_blog_category,
								"posts_per_page" => $radiuzz_cassiopeia_blog_ppp,
		                    	'paged' => $paged
							);

		               		$query = new WP_Query($args);

							if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
						?>
						<div id="post-<?php the_ID(); ?>" <?php post_class($radiuzz_cassiopeia_blog_post); ?>>
							<div class="post-img">
								<a href="<?php the_permalink(); ?>">
									<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										}
									?>
								</a>
							</div>
							<div class="post-content">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<hr class="special">
								<div class="details">
									<a href="#"><?php the_author(); ?></a>
									<span><?php the_time('F j, Y') ?></span>
									<div class="category">
										<?php the_category(', '); ?>
									</div>
								</div>
								<?php the_excerpt(); ?>
								<div class="more-button">
									<a href="<?php the_permalink(); ?>">read more</a>
								</div>
							</div>
						</div>
						<?php endwhile; endif; wp_reset_postdata(); endif; ?>
						
						<?php 
						
						function pagination_bar() {
								global $wp_query;
							 
								$total_pages = $wp_query->max_num_pages;
							 
								if ($total_pages > 1){
									$current_page = max(1, get_query_var('paged'));
							 
									echo paginate_links(array(
										'base' => get_pagenum_link(1) . '%_%',
										'format' => '/page/%#%',
										'current' => $current_page,
										'total' => $total_pages,
									));
								}
							}

						
						?>
						
						<nav class="pagination">
						<?php pagination_bar(); ?>
						</nav>

					</div>
					<div class="<?php echo esc_attr("$radiuzz_cassiopeia_blog_sidebar"); ?>">
												
						<?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
								<ul>
								<?php get_sidebar(); ?>
								</ul>
							<?php } ?>
						
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 pagination-holder">
						<?php radiuzz_cassiopeia_pagination($query->max_num_pages, "pagination"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>

