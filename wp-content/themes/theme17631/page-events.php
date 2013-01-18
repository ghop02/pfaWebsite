<?php
/**
 * Template Name: Events Page
 */

get_header(); ?>

<div id="content">
	<?php 
		
		
		$bits = $ai1ec_events_helper->gmgetdate( $ai1ec_events_helper->gmt_to_local( time() ) );
		$start_time = gmmktime( 0, 0, 0, 11, 3, 2012 );
		$end_time = gmmktime( 0, 0, 0, 1, 1, 2100 );
		
		//print_r($ai1ec_events_helper->gmgetdate( $ai1ec_events_helper->gmt_to_local( time() ) ));
		// retrieve events that start today and end today, ordered by start time, all day events are displayed first
		
		
		// Key fields 
		// post_title post_content
		// guid
		// start end
		// venue
		// recurrence_rules
		$events = $ai1ec_calendar_helper->get_events_relative_to( $start_time, 10);
		//print_r($events);
		$post_ids = array();
		
		?><h3> Upcoming Events </h3><?php
		
		?>
		
		</div><?php
		
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
		?></div><?php
		//print_r($post_ids);
?>
		
		
</div><!--#content-->
<?php get_footer(); ?>
