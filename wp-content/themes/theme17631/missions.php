<?php
/**
 * Template Name: Mission Trips
 */

get_header(); ?>

<div id="content" class="grid_24">
	
	
	<?php include_once (TEMPLATEPATH . '/title.php');?>   
	<div id="gallery" class="one_column">
  
	<?php $parents = get_terms('mission_type', array("parent"=> 0));
		  foreach ($parents as $parent) {
		  echo "<h2>".$parent->name."</h2>";			
			
			query_posts('posts_per_page=10&post_type=mission_trip&mission_type='.$parent->name); //THIS IS A HUGE TEST?>
			
			<ul class="portfolio">
			<?php while (have_posts()) : the_post(); ?>
				
				<?php
      $custom = get_post_custom($post->ID);
      $lightbox = $custom["lightbox-url"][0];
    ?>
    
      <li>
				<div class="clearfix">
					<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
					$image = aq_resize( $img_url, 600, 300, true ); //resize & crop img
					?>
        	<?php if($lightbox!=""){ ?>
					<a class="image-wrap touch-item" href="<?php echo $lightbox;?>" title="<?php the_title();?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /><span class="zoom-icon"></span></a>
					<?php }else{ ?>
					<a class="image-wrap" href="<?php the_permalink() ?>" title="<?php _e('Permanent Link to', 'theme1763');?> <?php the_title_attribute(); ?>" ><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
					<?php } ?>
          <div class="folio-desc">
            <h3><a href="<?php the_permalink(); ?>"><?php $title = the_title('','',FALSE); echo substr($title, 0, 40); ?></a></h3>
            <p class="excerpt"><?php echo the_content();?></p>
            <!--<a href="<?php //the_permalink() ?>" class="button"><?php //_e('more', 'theme1763'); ?></a>-->
          </div>
        </div>
      </li>
    
				
			<?php endwhile; ?> </ul> <?php
		
	}
	?>
<?php $wp_query = null; $wp_query = $temp;?>
</div>
</div><!-- #content -->
<!-- end #main -->
<?php get_footer(); ?>