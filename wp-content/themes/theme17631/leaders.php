<?php
/**
 * Template Name: Leaders
 */

get_header(); ?>

<div id="content" class="grid_24">
	
	<?php include_once (TEMPLATEPATH . '/title.php');?>   
	<div id="gallery" class="leaders">
	<?php $parents = get_terms('team_names', array("parent"=> 0));
		  foreach ($parents as $parent) {
		  echo "<h2>".$parent->name."</h2>";
		  
	 $categories = get_terms('team_names', array("parent"=>$parent->term_id)); 
	
	
	
		foreach( $categories as $cat) {
			//$cat_ID = $cat->cat_ID;
			if ($parent->term_id <> 47):
			?> <h3> <a name=student /> <?php echo $cat->name; ?> </h3> <?php
			endif;
			$args = array(
						'post_type' => 'leaders',
						'team_names' => $cat->name,
						'orderby' => 'title',
						'order' => 'DESC',
						);
			
			
			query_posts('posts_per_page=10&post_type=leaders&team_names='.$cat->name); ?>
			<ul class="portfolio">
			<?php while (have_posts()) : the_post(); ?>
				<li>
					<!--<div class="clearfix"> -->
						<?php 
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 100, 100, true ); //resize & crop img
						?>
						 <div class="folio-desc">
							<a class="image-wrap"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
							<h3><?php echo the_title(); ?></h3>
							<p class="excerpt"> <?php echo the_content();?></p>
							
						</div>
					<!--</div>-->
				</li>
				
			<?php endwhile; ?> </ul> <?php
		}
	}
	?>
<?php $wp_query = null; $wp_query = $temp;?>
</div>
</div><!-- #content -->
<!-- end #main -->
<?php get_footer(); ?>