<?php 

// Define global theme variables
define('cassiopeia_THEME_NAME', 'cassiopeia');
$posts_per_page = get_option('posts_per_page');
global $posts_per_page;


// Set max content width
if (!isset($content_width)) {
	$content_width = 1170;
}

add_action( 'after_setup_theme', 'radiuzz_cassiopeia_setup' );
function radiuzz_cassiopeia_setup() {
	// Add theme support
	add_theme_support("menus");
	add_theme_support("post-thumbnails");
	add_theme_support("automatic-feed-links");
	add_theme_support("title-tag");
	define("ACF_LITE" , true);



/* ------------------------------------------------------------------------ */
/* Theme Menus */
/* ------------------------------------------------------------------------ */
	register_nav_menus(
		array(
			"main-menu" => "Main Menu",
		)
	);

	add_filter('nav_menu_css_class' , 'radiuzz_cassiopeia_nav_class' , 10 , 2);
	function radiuzz_cassiopeia_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


}

/* ------------------------------------------------------------------------ */
/* Theme Stylesheets */
/* ------------------------------------------------------------------------ */
function radiuzz_cassiopeia_add_external_css() {
	// Register
	wp_register_style("wp-style", get_stylesheet_uri(), false, "1.0");
	wp_register_style("bootstrap", get_template_directory_uri()."/assets/css/bootstrap.css", false, "1.0");
	wp_register_style("font-awesome", get_template_directory_uri()."/assets/css/font-awesome.css", false, "1.0");
	wp_register_style("main", get_template_directory_uri()."/assets/css/main.css", false, "1.0");
	// Enqueue
	wp_enqueue_style("wp-style");
	wp_enqueue_style("bootstrap");
	wp_enqueue_style("font-awesome");
	wp_enqueue_style("main");
 
}

	add_action("wp_enqueue_scripts", "radiuzz_cassiopeia_add_external_css");
	
	// Include custom css
	include( get_template_directory() . "/assets/css/custom.php");
	
/* ------------------------------------------------------------------------ */
/* Google Fonts */
/* ------------------------------------------------------------------------ */

/*
Register Fonts
*/
function radiuzz_cassiopeia_google_fonts() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'cassiopeia' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Lora|Rokkitt:400,400italic,700italic,700&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}
/*
Enqueue scripts and styles.
*/
function radiuzz_cassiopeia_scripts() {
    wp_enqueue_style( 'cassiopeia-fonts', radiuzz_cassiopeia_google_fonts(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'radiuzz_cassiopeia_scripts' );


/* ------------------------------------------------------------------------ */
/* Loading Theme Scripts */
/* ------------------------------------------------------------------------ */
function radiuzz_cassiopeia_add_external_js() {
	if(!is_admin()) {
		// Register
		wp_register_script("bootstrap", get_template_directory_uri()."/assets/js/bootstrap.js", array("jquery"), "1.0", TRUE);
		wp_register_script("isotope", get_template_directory_uri()."/assets/js/isotope.pkgd.js", array("jquery"), "1.0", TRUE);
		wp_register_script("main", get_template_directory_uri()."/assets/js/main.js", array("jquery"), "1.0", TRUE);
		// Enqueue
		wp_enqueue_script("bootstrap");
		wp_enqueue_script("isotope");
		wp_enqueue_script("main");
		if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	}
}
add_action("wp_enqueue_scripts", "radiuzz_cassiopeia_add_external_js");


/* ------------------------------------------------------------------------ */
/* Widgets */
/* ------------------------------------------------------------------------ */
function radiuzz_cassiopeia_widgets_init() {
    register_sidebar( array(
    'name' => esc_html__( 'Main Sidebar', 'cassiopeia' ),
    'id' => 'sidebar-1',
    'description' => esc_html__( 'Widgets in this area will be shown on all posts and pages.', 'cassiopeia' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'radiuzz_cassiopeia_widgets_init' );



function radiuzz_cassiopeia_social_sharing_buttons($cassiopeia_share_buttons) {
	// Show this on post and page only. Add filter is_home() for home page
	if(is_single()){
	
		// Get current page URL
		$shortURL = get_permalink();
		
		// Get current page title
		$shortTitle = get_the_title();
		
		// Construct sharing URL without using any script
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$shortURL;
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$shortTitle.'&amp;url='.$shortURL.'&amp;via=Crunchify';
		$googleURL = 'https://plus.google.com/share?url='.$shortURL;
	
		// Add sharing button at the end of page/page content
		$cassiopeia_share_buttons .= '<div class="share-side">';
		$cassiopeia_share_buttons .= '<h5>Share Via:</h5>';
		$cassiopeia_share_buttons .= '<ul>';
		$cassiopeia_share_buttons .= '<li><a class="" href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		$cassiopeia_share_buttons .= '<li><a class="" href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		$cassiopeia_share_buttons .= '<li><a class="" href="'.$googleURL.'" target="_blank"><i class="fa fa-google-plus"></i></a></li>';
		$cassiopeia_share_buttons .= '</ul>';
		$cassiopeia_share_buttons .= '</div>';
		return $cassiopeia_share_buttons;
	}
	else{
		return $cassiopeia_share_buttons;
	}
};
add_filter( 'the_content', 'radiuzz_cassiopeia_social_sharing_buttons');

/* ------------------------------------------------------------------------ */
/* TGMPA plugin activation */
/* ------------------------------------------------------------------------ */
require_once( get_template_directory() . '/includes/plugin-activation.php');
add_action( 'tgmpa_register', 'radiuzz_cassiopeia_theme_plugins' );
	function radiuzz_cassiopeia_theme_plugins() {
		$plugins = array(
			array(
				'name'     				=> esc_html__('Cassiopeia core','cassiopeia'), // The plugin name
				'slug'     				=> 'cassiopeia', // The plugin slug (typically the folder name)
				'source'   				=> 'http://cassiopeia.radiuzz.com/plugins/cassiopeia.zip', // The plugin source
				'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
				'version' 				=> '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
				'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
				'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
				'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
			),
	        array(
	            'name'      => esc_html__('Contact form 7','cassiopeia'),
	            'slug'      => 'contact-form-7',
	            'required'  => true,
	        ),
			  array(
	            'name'      => esc_html__('Advanced custom fields','cassiopeia'),
	            'slug'      => 'advanced-custom-fields',
	            'required'  => true,
				'force_activation' 		=> false,

	        )
	    );
		$config = array(
	        'id'           => 'cassiopeia',                 // Unique ID for hashing notices for multiple instances of cassiopeia.
			'domain'       		=> 'cassiopeia',         	// Text domain - likely want to be the same as your theme.
	        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
	        'menu'         => 'cassiopeia-install-plugins', // Menu slug.
	        'has_notices'  => true,                    // Show admin notices or not.
	        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
	        'message'      => '',                      // Message to output right before the plugins table.
	    );
	    tgmpa( $plugins, $config );
	}



function radiuzz_cassiopeia_pagination($pages = '', $class = '', $range = 4) {  
	 $showitems = ($range * 2)+1;

	 global $paged;
	 if(empty($paged)) $paged = 1;

	 if($pages == '')
	 {
		 global $wp_query;
		 $pages = $wp_query->max_num_pages;
		 if(!$pages)
		 {
			 $pages = 1;
		 }
	 }   

	 if($class == '') {
	 	$pagination_class = 'pagination';
	 } else {
	 	$pagination_class = $class;
	 }

	 if(1 != $pages)
	 {
		 echo "<ul class=\"" . esc_attr($pagination_class)  . "\">";
		 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; ".__("First" , 'cassiopeia')."</a>";
		 if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; ".__("Previous",'cassiopeia')."</a></li>";

		 for ($i=1; $i <= $pages; $i++)
		 {
			 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			 {
				 echo ($paged == $i)? "<li class=\"active\"><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
			 }
		 }

		 if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">".__("<i class='fa fa-long-arrow-right'></i>", 'cassiopeia')." &rsaquo;</a>";  
		 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>".__("<i class='fa fa-long-arrow-left'></i>" , 'cassiopeia')." &raquo;</a></li>";
		 echo "</ul>\n";
	 }
}


