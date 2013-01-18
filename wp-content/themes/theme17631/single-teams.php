<?php get_header(); ?>
<div id="content" class="grid_24">
	<?php if ( have_posts() ) while ( have_posts() ) { the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
		<!-- thumbnail info -->

        
          <?php the_content(); ?>
		  
        
		<!-- LIST OF LEADERS -->
		<div class="grid_24">
			<h3> Leaders </h3>
			<ul class="recent-posts team">
			<?php 
				// Get current team name
				$taxonomies = get_the_terms($post->ID,'team_names');//, array('fields'=>'ids$post->ID));
				
				$current_team = '';
				foreach ($taxonomies as $tax) {
					$current_team = $tax->name;
					break;
				};
				
				// Get members i n team
				$args = array(
					'post_type'=> 'leaders',
					'team_names'=> $current_team,
					'order'    => 'ASC'
					);              
				
				$the_posts = get_posts( $args );
				foreach ($the_posts as $post ):setup_postdata($post);
					?> <li class="team">
					<?php
					
					// include thumbnail
					if(has_post_thumbnail()) { ?>
					<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'thumbnail'); //get img URL
						$image = aq_resize( $img_url, 120, 120, true ); //resize & crop img
					?>
					<figure class="featured-thumbnail">
						<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
					</figure>
					<?php } 
					
					//
					?> <h6> <?php echo the_title();?> </h6> 
					<h6> <?php echo get_post_meta($post->ID, "team-job", true); ?> </h6>
					<div class="clear"> </div>
					 </li> <?php 
				endforeach;
				?>
			</ul>
		</div>
      

    </div><!-- #post-## -->

  <?php } /* end loop */ ?>
</div><!--#content-->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>