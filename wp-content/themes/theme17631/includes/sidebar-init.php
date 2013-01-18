<?php
function elegance_widgets_init() {
	// Before Content Area
	// Location: at the top of the content
	register_sidebar(array(
		'name'					=> 'Before Content Area',
		'id' 						=> 'before-content-area',
		'description'   => __( 'Located at the top of the content.'),
		'before_widget' => '<div id="%1$s" class="grid_6">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	// Primary Content Area
	// Location: at the middle of the content
	register_sidebar(array(
		'name'					=> 'Primary Content Area',
		'id' 						=> 'primary-content-area',
		'description'   => __( 'Located at the middle of the content.'),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="h_style"><span class="fleft">',
		'after_title' => '</span><span class="extra-wrap"></span></h1>',
	));
	// After Content Area
	// Location: at the bottom of the content
	register_sidebar(array(
		'name'					=> 'After Content Area',
		'id' 						=> 'after-content-area',
		'description'   => __( 'Located at the bottom of the content.'),
		'before_widget' => '<div id="%1$s">',
		'after_widget' => '</div>',
		'before_title' => '<h1 class="h_style"><span class="fleft">',
		'after_title' => '</span><span class="extra-wrap"></span></h1>',
	));
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar(array(
		'name'					=> 'Sidebar',
		'id' 						=> 'main-sidebar',
		'description'   => __( 'Located at the right side of pages.'),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	));

}
/** Register sidebars by running elegance_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'elegance_widgets_init' );
?>