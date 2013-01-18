<?php
global $ai1ec_calendar_helper, $ai1ec_events_helper;

$bits = $ai1ec_events_helper->gmgetdate( $ai1ec_events_helper->gmt_to_local( time() ) );
$start_time = gmmktime( 0, 0, 0, 1, 1, 1970 );
$end_time = gmmktime( 0, 0, 0, 1, 1, 2100 );

// retrieve events that start today and end today, ordered by start time, all day events are displayed first
$events = $ai1ec_calendar_helper->get_events_relative_to( $start_time);
print_r($events);
$post_ids = array();
foreach( $events as $event ) :
  $post_ids[] = $event->post_id;
endforeach;
?>

<h1 class="section-title">New Events</h1>
<div id="events_added" class="events_list">
	<?php
		
	// The New Events Query
	$args = array(
                'post__in'             => $post_ids
        );
				
	$events_added = new WP_Query( $args );
	// The Loop
	while ( $events_added->have_posts() ) : $events_added->the_post();
				
	$event = Ai1ec_Events_Helper::get_event($post->ID);
					
	?>
		<div class="single_post">
				
			<div class="text_container">
				<a class="single-title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<h2><?php the_title(); ?></h2>
				</a>
				<span>
					<ul>
			<li class="home_when"><?php echo $event->long_start_date;?> -</li>
			<li><?php echo $event->short_end_date;?></li>
			<li class="home_where"><?php echo $event->venue; ?></li>
			<li><?php echo $event->city; ?>, <?php echo $event->country; ?></li>
					</ul>
				</span>
			</div>
			<span class="read_more">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				Find out more...
			</a>
			</span>
		</div>			
		<?php
			
		endwhile;
				
		// Reset Post Data
		wp_reset_postdata();
		?>
</div><!-- #events_added -->