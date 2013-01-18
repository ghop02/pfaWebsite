<?php

add_action( 'after_setup_theme', 'my_setup' );

if ( ! function_exists( 'my_setup' ) ):

function my_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 200, 150, true ); // Normal post thumbnails
		add_image_size( 'slider-post-thumbnail', 950, 480, true ); // Slider Thumbnail
		add_image_size( 'slider-thumb', 60, 40, true ); // Slider Small Thumbnail
	}

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// custom menu support
	add_theme_support( 'menus' );
	if ( function_exists( 'register_nav_menus' ) ) {
	  	register_nav_menus(
	  		array(
	  		  'header_menu' => 'Header Menu',
	  		  'footer_menu' => 'Footer Menu'
	  		)
	  	);
	}
}
endif;


/* Slider */
function my_post_type_slider() {
	register_post_type( 'slider',
                array( 
				'label' => __('Slides'), 
				'singular_label' => __('Slide', 'theme1763'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'rewrite' => array(
					'slug' => 'slide-view',
					'with_front' => FALSE,
				),
				'query_var' => "slide", // This goes to the WP_Query schema
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_slides.png',
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_slider');



/* Teams */ 
function my_post_type_teams() {
	register_post_type( 'teams',
                array( 
				'label' => __('Teams'), 
				//'singular_label' => __('Team', 'theme1763'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				/*'rewrite' => array(
					'slug' => 'team',
					'with_front' => FALSE,
				),*/
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						)
					)
				);
				
	//register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
	//register_taxonomy('team_name', 'team', array('hierarchical' => true, 'label' => 'Teams', 'singular_name' => 'Team', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_teams');


/* Leaders */ 
function my_post_type_leaders() {
	register_post_type('leaders', 
				array(
				'label' => __('Leaders'),
				'singular_label' => __('Leader'),
				'_builtin' => false,
				'show_in_nav_menus' => true,
				'capability_type' => 'page',
				'show_ui' => true,
				'supports' => array('title','editor', 'thumbnail', 'custom-fields'),
				'publicly_queryable' => true,
				'exclude_from_search' => false
				)
				);
	//register_taxonomy('leader_type', 'leaders', array('hierarchical' => true, 'label' => 'Leader Type', "rewrite" => true, "query_var" => true));
	
}

add_action('init', 'my_post_type_leaders');



/* Retreats */ 
function my_post_type_retreats() {
	register_post_type('retreats', 
				array(
				'label' => __('Retreats'),
				'singular_label' => __('Retreat'),
				'_builtin' => false,
				'show_in_nav_menus' => true,
				'capability_type' => 'page',
				'show_ui' => true,
				'supports' => array('title','editor', 'thumbnail', 'custom-fields', 'video'),
				'publicly_queryable' => true,
				'exclude_from_search' => false
				)
				);
	register_taxonomy('retreat_type', 'retreats', array('hierarchical' => true, 'label' => 'Retreat Type', "rewrite" => true, "query_var" => true));	
}

add_action('init', 'my_post_type_retreats');


/* Seeking God */ 
function my_post_type_seek() {
	register_post_type( 'seeking',
                array( 
				'label' => __('Seeking God'), 
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						)
					)
				);
}


/* Missions Trips */ 


function my_post_type_mission() {
	register_post_type( 'mission_trip',
                array( 
				'label' => __('Mission Trip'), 
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						)
					)
				);
	register_taxonomy('mission_type', 'mission_trip', 
		array('hierarchical' => true, 
			  'label' => 'Mission Trip Type', 
			  "rewrite" => true, "query_var" => true));	
}

add_action('init', 'my_post_type_mission');

/*
function my_post_type_seek() {
	register_post_type('seeking', 
				array(
				'label' => __('Seeking God'),
				'singular_label' => __('Seeking'),
				'_builtin' => false,
				'show_in_nav_menus' => true,
				//'capability_type' => 'post',
				'public' => true,
				
				'show_ui' => true,
				'supports' => array('title','editor', 'thumbnail', 'custom-fields'),
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				//'rewrite' => array( 'slug' => 'seeking','with_front' => FALSE),
				)
				);
	//register_taxonomy('retreat_type', 'retreats', array('hierarchical' => true, 'label' => 'Retreat Type', "rewrite" => true, "query_var" => true));	
}
*/
add_action('init', 'my_post_type_seek');



/* Testimonials */
function my_post_type_testi() {
	register_post_type( 'testi',
                array( 
				'label' => __('Testimonial'), 
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				/*'rewrite' => array(
					'slug' => 'testimonial-view',
					'with_front' => FALSE,
				),*/
				'supports' => array(
						'title',
						'custom-fields',
						'thumbnail',
						'editor',
						'comments')
					) 
				);
}

add_action('init', 'my_post_type_testi');

register_taxonomy('team_names', Array('leaders','teams'), array('hierarchical' => true, 'label' => 'Team Name', "rewrite" => true, "query_var" => true));

/* FAQs *//*
function phi_post_type_faq() {
	register_post_type('faq', 
				array(
				'label' => __('FAQs'),
				'singular_label' => __('FAQ'),
				'public' => false,
				'show_ui' => true,
				'_builtin' => false, // It's a custom post type, not built in
				'_edit_link' => 'post.php?post=%d',
				'capability_type' => 'post',
				'hierarchical' => false,
				'rewrite' => array("slug" => "faq"), // Permalinks
				'query_var' => "faq", // This goes to the WP_Query schema
				'supports' => array('title','author','editor'),
				'menu_position' => 5,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				));
}
add_action('init', 'phi_post_type_faq');
*/

/* Our Team *//*
function my_post_type_team() {
	register_post_type( 'team',
                array( 
				'label' => __('Our Team'), 
				'singular_label' => __('Person', 'theme1763'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'team-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
						'excerpt',
            'thumbnail')
					) 
				);
}

add_action('init', 'my_post_type_team');
*/
/* Portfolio *//*
function my_post_type_portfolio() {
	register_post_type( 'portfolio',
                array( 
				'label' => __('Portfolio'), 
				'singular_label' => __('Porfolio Item', 'theme1763'),
				'_builtin' => false,
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => true,
				'hierarchical' => true,
				'capability_type' => 'page',
				'menu_icon' => get_template_directory_uri() . '/includes/images/icon_portfolio.png',
				'rewrite' => array(
					'slug' => 'portfolio-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'editor',
						'thumbnail',
						'excerpt',
						'custom-fields',
						'comments')
					) 
				);
	register_taxonomy('portfolio_category', 'portfolio', array('hierarchical' => true, 'label' => 'Portfolio Categories', 'singular_name' => 'Category', "rewrite" => true, "query_var" => true));
}

add_action('init', 'my_post_type_portfolio');
*/

/* Clients */
/*
function my_post_type_partners() {
	register_post_type( 'partners',
                array( 
				'label' => __('Partners'), 
				'singular_label' => __('Partners', 'theme1763'),
				'public' => true, 
				'show_ui' => true,
				'show_in_nav_menus' => false,
				'menu_position' => 5,
				'rewrite' => array(
					'slug' => 'partners-view',
					'with_front' => FALSE,
				),
				'supports' => array(
						'title',
						'thumbnail',
						'editor')
					) 
				);
}

add_action('init', 'my_post_type_partners');
*/

?>