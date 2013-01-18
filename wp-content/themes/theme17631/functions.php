<?php

	$functions_path = TEMPLATEPATH . '/functions/';
	$includes_path = TEMPLATEPATH . '/includes/';
	
	//Loading jQuery and Scripts
	require_once $includes_path . 'theme-scripts.php';
	
	//Widget and Sidebar
	require_once $includes_path . 'sidebar-init.php';
	require_once $includes_path . 'register-widgets.php';
	
	//Theme initialization
	require_once $includes_path . 'theme-init.php';
	
	//Additional function
	require_once $includes_path . 'theme-function.php';
	
	//Shortcodes
	require_once $includes_path . 'theme_shortcodes/shortcodes.php';
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/alert.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tabs.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/toggle.php');
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/html.php');
	
	//tinyMCE includes
	include_once(TEMPLATEPATH . '/includes/theme_shortcodes/tinymce/tinymce_shortcodes.php');
	
	//Aqua Resizer for image cropping and resizing on the fly
	require_once $includes_path . 'aq_resizer.php';
	
	
	//Loading theme textdomain
	load_theme_textdomain( 'theme1763', TEMPLATEPATH . '/languages' );
	
	// Add the post meta
	include("includes/theme-postmeta.php");
	
	
	//Loading options.php for theme customizer
	require_once dirname( __FILE__ ) . '/options.php';
	
	

	
	
	
	
	// removes detailed login error information for security
	add_filter('login_errors',create_function('$a', "return null;"));
	
	/* 
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */
	if ( !function_exists( 'optionsframework_init' ) ) {
		define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/' );
		require_once dirname( __FILE__ ) . '/admin/options-framework.php';
	}
	
	
	
		
	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	
	
	// Post Formats
	$formats = array( 
				'aside', 
				'gallery', 
				'link', 
				'image', 
				'quote', 
				'audio',
				'video');

	add_theme_support( 'post-formats', $formats ); 

	add_post_type_support( 'post', 'post-formats' );
	
	
	
	// Custom excpert length
	function new_excerpt_length($length) {
	return 60;
	}
	add_filter('excerpt_length', 'new_excerpt_length');
  
	
	// enable shortcodes in sidebar
	add_filter('widget_text', 'do_shortcode');
	
	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');
	// no more jumping for read more link
	function no_more_jumping($post) {
		return '&nbsp;<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');
	
	
	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');
	
	
	
	
	function add_upcoming_events() {
		ob_start();
		global $ai1ec_calendar_helper, $ai1ec_events_helper;
		$start_time = gmmktime( 0, 0, 0, 11, 3, 2012 );
		
		$events = $ai1ec_calendar_helper->get_events_relative_to( time(), 10);
	
	
	
		function format_start_date($date) {
			$a = array(1=>"st", 2=>"nd",3=>"rd",4=>"th",5=>"th",6=>'th',7=>'th',8=>'th',9=>'th',0=>'th');
			if ($date['hours'] > 12) {
				$hours = $date['hours'] - 12;
				$time = "pm";
			}
			else $hours = $date['hours'];
			return $date['weekday']." ".substr($date['month'],0,3).". ".$date['mday'].$a[$date['mday']%10].", ".$hours.":".$date['minutes'].'-';
		}
		function format_end_date($date) {
			if ($date['hours'] > 12) {
				$hours = $date['hours'] - 12;
				$time = "pm";
			}
			else {
				$hours = $date['hours'];
				$time='am';
			}
			
			return $hours.":".$date['minutes'].$time;
		}
		
		$prev_date = 0;
		
		?> <div class="events clearfix"> <?php
		foreach( $events['events'] as $event ) :
			//print_r($event);
			
			// DO NOT SHOW NOON PRAYER
			//if ($event->post->post_name=="121-prayer-in-campus-club") continue;
			$start_date = $ai1ec_events_helper->gmgetdate($ai1ec_events_helper->gmt_to_local($event->start));
			$end_date = $ai1ec_events_helper->gmgetdate($ai1ec_events_helper->gmt_to_local($event->end));
			if ($start_date['mday'] != $prev_date) {
				if ($prev_date != 0) echo "</div></div>";
				echo '<div class="day">';
			?>
				<div class="mini-cal-wrapper">
				<div class="mini-cal">
					<div class="month">	<?php echo substr($start_date['month'],0,3);?>	</div>
					<div class="day"> <?php echo $start_date['mday'];?>	</div>
				</div>
				</div>
				<div class="event-wrapper">
			<?php
			}
			
			$prev_date = $start_date['mday'];
			
			?> 
				<div class="event">
				
					<a class="title" href=<?php echo $event->post->guid;?>><?php echo $event->post->post_title;?></a>
					<div class="time"> <?php echo format_start_date($start_date).format_end_date($end_date);?> </div> 
					<div class="location"> at <?php echo $event->venue;?></div>
				
				</div>
			<?php
				//print_r($start_date);
			
			
			
		endforeach;
		
		
		$output_string=ob_get_contents()."</div></div></div>";;
	ob_end_clean();

	return $output_string;
		}
	add_shortcode('upcoming_events', 'add_upcoming_events');
	
	function add_calendar() {
		global $ai1ec_settings,$ai1ec_calendar_controller,
			$ai1ec_events_controller, $calendar;
		
		ob_start();
		//$ai1ec_calendar_controller->view();
		$calendar = ob_get_contents();
		
		//echo $calendar;
	}
	
	add_shortcode('agenda', 'add_calendar');
	
?>