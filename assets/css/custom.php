<?php

if( function_exists( 'acf' ) ) {
 
  function radiuzz_cassiopeia_custom_css() {
	$radiuzz_cassiopeia_main_color = get_field("cassiopeia_main_color","option");
	$radiuzz_cassiopeia_transition_duration = get_field("cassiopeia_transition_duration","option");
	$radiuzz_cassiopeia_header_search = get_field("cassiopeia_header_search", "option");
	$radiuzz_cassiopeia_header_icons = get_field("cassiopeia_header_icons_hide", "option");
	$radiuzz_cassiopeia_bg_pattern = get_field("cassiopeia_background_pattern","option");
	$radiuzz_cassiopeia_bg_pattern_repeat = get_field("cassiopeia_background_pattern_repeat","option");
	$radiuzz_cassiopeia_custom_css = get_field("cassiopeia_custom_css","option");
	$radiuzz_cassiopeia_custom_css_large_devices = get_field("cassiopeia_custom_css_large_devices","option");
	$radiuzz_cassiopeia_custom_css_medium_devices = get_field("cassiopeia_custom_css_medium_devices","option");
	$radiuzz_cassiopeia_custom_css_small_devices = get_field("cassiopeia_custom_css_small_devices","option");
	$radiuzz_cassiopeia_custom_css_xsmall_devices = get_field("cassiopeia_custom_css_xsmall_devices","option");
	$radiuzz_cassiopeia_page_title_header_color = get_field("cassiopeia_page_title_header_color","option");
	$radiuzz_cassiopeia_page_title_content_color = get_field("cassiopeia_page_title_content_color","option");

	if(get_field("cassiopeia_transition_effect","option") == '1'){
		if($radiuzz_cassiopeia_transition_duration){
			echo "
				<style>
					header .mobile-menu .line,
					header .mobile-menu .line:before,
					header .mobile-menu .line:after,
					header nav .menu li a,
					header nav .menu li a:after,
					.wrapper .portfolio .filters ul li:after,
					.wrapper .portfolio .item .overlay,
					.about .about-content .about-socials ul li,
					.blog .blog-post .post-content h3 a,
					.blog .blog-post .post-content .details a,
					.blog .blog-post .post-content .details span,
					.blog .blog-post .post-content .details a:after,
					.blog .blog-post .post-content h3 a:after,
					.blog .pagination-holder .pagination li a:after,
					.blog .sidebar .comments ul li a:after,
					.blog-single .share-side ul li a:after,
					.blog .blog-post .post-content .more-button a,
					.blog .sidebar .tags a,
					.blog .sidebar .comments ul li a,
					.blog .sidebar .posts ul li a,
					.blog-single .blog-post .post-content .tags a,
					.blog-single .comment-form input,
					.blog-single .comment-form textarea,
					.blog-single .comment-form .submit,
					.contact .contact-form input[type=submit],
					footer span a:after,
					.widget_categories ul li a:hover,
					.widget_recent_comments ul > li > a,
					.widget_recent_comments ul > li > a:after,
					.widget_recent_entries ul li a,
					.widget_pages ul li a,
					.widget_archive ul li a, 
					.widget_meta ul li a,
					.widget_rss ul li a,
					.widget_nav_menu ul li a  {
						-webkit-transition: " . $radiuzz_cassiopeia_transition_duration . "s all;
					    -moz-transition: " . $radiuzz_cassiopeia_transition_duration . "s all;
					    -ms-transition: " . $radiuzz_cassiopeia_transition_duration . "s all;
					    -o-transition: " . $radiuzz_cassiopeia_transition_duration . "s all;
					    transition: " . $radiuzz_cassiopeia_transition_duration . "s all;
					}
				</style>
			";
		}
	}
	else {
		echo "
			<style>
				header .mobile-menu .line,
				header .mobile-menu .line:before,
				header .mobile-menu .line:after,
				header nav .menu li a,
				header nav .menu li a:after,
				.wrapper .portfolio .filters ul li:after,
				.wrapper .portfolio .item .overlay,
				.about .about-content .about-socials ul li,
				.blog .blog-post .post-content h3 a,
				.blog .blog-post .post-content .details a,
				.blog .blog-post .post-content .details span,
				.blog .blog-post .post-content .details a:after,
				.blog .blog-post .post-content h3 a:after,
				.blog .pagination-holder .pagination li a:after,
				.blog .sidebar .comments ul li a:after,
				.blog-single .share-side ul li a:after,
				.blog .blog-post .post-content .more-button a,
				.blog .sidebar .tags a,
				.blog .sidebar .comments ul li a,
				.blog .sidebar .posts ul li a,
				.blog-single .blog-post .post-content .tags a,
				.blog-single .comment-form input,
				.blog-single .comment-form textarea,
				.blog-single .comment-form .submit,
				.contact .contact-form input[type=submit],
				footer span a:after,
				.widget_categories ul li a:hover,
				.widget_recent_comments ul > li > a,
				.widget_recent_comments ul > li > a:after,
				.widget_recent_entries ul li a,
				.widget_pages ul li a,
				.widget_archive ul li a, 
				.widget_meta ul li a,
				.widget_rss ul li a,
				.widget_nav_menu ul li a  {
					-webkit-transition: 0s all;
				    -moz-transition: 0s all;
				    -ms-transition: 0s all;
				    -o-transition: 0s all;
				    transition: 0s all;
				}
			</style>
		";
	}

	if($radiuzz_cassiopeia_header_search){
		echo "
		<style>
			#search-link {
					display: none;
				}
			header nav .menu #socials-link a {
				border-left: none; 
  				padding-left: 0;
			}
		</style>
		";
	}

	if($radiuzz_cassiopeia_header_icons){
		echo "
		<style>
			#socials-link {
					display: none;
				}
		</style>
		";
	}

	if($radiuzz_cassiopeia_bg_pattern){
		echo "
			<style>
				.wrapper .no-page-bg { background: url($radiuzz_cassiopeia_bg_pattern); }
			</style>
		";
	}

	if($radiuzz_cassiopeia_bg_pattern_repeat == 1){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: repeat;}
			</style>
		";
	}

	else if($radiuzz_cassiopeia_bg_pattern_repeat == 2){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: repeat-x;}
			</style>
		";
	}

	else if($radiuzz_cassiopeia_bg_pattern_repeat == 3){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: repeat-y;}
			</style>
		";
	}

	else if($radiuzz_cassiopeia_bg_pattern_repeat == 4){
		echo "
			<style>
				.wrapper .no-page-bg {background-repeat: no-repeat;}
			</style>
		";
	}


	if($radiuzz_cassiopeia_main_color){
		echo "
			<style>
				.wrapper .home-photography .page-title h2,
				header nav .menu li a:hover,
				header nav .menu li.active a,
				.blog .blog-post .post-content h3 a,
				.blog .blog-post .post-content h3 a:hover,
				.blog .blog-post .post-content .details a:hover,
				.blog .pagination-holder .pagination li a:hover,
				.blog .pagination-holder .pagination li.active a,
				.widget_categories ul li,
				.widget_categories ul li a:hover,
				.widget_recent_entries ul li a:hover,
				.widget_pages ul li a:hover,
				.widget_archive ul li,
				.widget_archive ul li a:hover,
				.widget_meta ul li,
				.widget_meta ul li a:hover,
				.widget_calendar a,
				.widget_rss ul li,
				.widget_nav_menu ul li,
				.widget_rss ul li a:hover,
				.widget_nav_menu ul li a:hover,
				.blog-single .share-side ul li a,
				.blog-single .blog-post .post-content .tags a:hover,
				.blog-single .comments .comment .comment-date,
		
				.project-single .project-content .text-content span,
				.project-single .project-content .categories ul a,
				.project-single .project-content .details span,
				.project-single .project-content .date span,
				.contact .contact-info span.active
				{
					color: $radiuzz_cassiopeia_main_color;
				}
				.blog .blog-post .post-content .details a:after,
				.blog .blog-post .post-content h3 a:after,
				.blog .blog-post .post-content .details span:after, .blog .blog-post .post-content .details .category:after,
				.blog .pagination-holder .pagination li a:after,
				.blog .sidebar .comments ul li a:after,
				.blog-single .share-side ul li a:after ,
				header nav .menu li a:after,
				.widget_recent_comments ul > li > a:after,
				footer span a:after,
				.about .about-content .about-progress .progress .progress-bar,
				{
					background-color: $radiuzz_cassiopeia_main_color;
				}
				header nav .menu li ul {
				border-top: 2px solid $radiuzz_cassiopeia_main_color;
			}
			</style>
		";
	}

	if($radiuzz_cassiopeia_page_title_header_color){
		echo "
			<style>
				.wrapper .home-photography .page-title h2 {
					color: $radiuzz_cassiopeia_page_title_header_color;
				}
			</style>
		";
	}

	if($radiuzz_cassiopeia_page_title_content_color){
		echo "
			<style>
				.wrapper .home-photography .page-title span {
					color: $radiuzz_cassiopeia_page_title_content_color;
				}
			</style>
		";		
	}

	if($radiuzz_cassiopeia_custom_css){
		echo "
			<style>
				  ". $radiuzz_cassiopeia_custom_css  ."
			</style>
		";
	}
	if($radiuzz_cassiopeia_custom_css_large_devices){
		echo "
			<style>
				@media screen and (max-width: 1200px) { ". $radiuzz_cassiopeia_custom_css_large_devices  ." }
			</style>
		";
	}
	if($radiuzz_cassiopeia_custom_css_medium_devices){
		echo "
			<style>
				@media screen and (max-width: 992px) { ". $radiuzz_cassiopeia_custom_css_medium_devices  ." }
			</style>
		";
	}
	if($radiuzz_cassiopeia_custom_css_small_devices){
		echo "
			<style>
				@media screen and (max-width: 768px) { ". $radiuzz_cassiopeia_custom_css_small_devices  ." }
			</style>
		";
	}
	if($radiuzz_cassiopeia_custom_css_xsmall_devices){
		echo "
			<style>
				@media screen and (max-width: 480px) { ". $radiuzz_cassiopeia_custom_css_xsmall_devices  ." }
			</style>
		";
	}	

}

add_action('wp_head', 'radiuzz_cassiopeia_custom_css');

  
}




?>