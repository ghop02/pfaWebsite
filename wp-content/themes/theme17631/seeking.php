<?php
/**
 * Template Name: Seeking God
 */

get_header(); ?>

<div id="content" class="grid_24">
	<?php include_once (TEMPLATEPATH . '/title.php');?>   
  <?php global $more;	$more = 0;?>
  <?php $values = get_post_custom_values("category-include"); $cat=$values[0];  ?>
  <?php $catinclude = 'portfolio_category='. $cat ;?>
  
  <?php $temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query(); ?>
  <?php $wp_query->query("post_type=seeking&". $catinclude ."&paged=".$paged.'&showposts=5&orderby=date&order=DSC'); ?>
  <?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'theme1763' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'theme1763' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>
<div id="gallery" class="one_column">
  <ul class="portfolio">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
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
            <p class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,50);?></p>
            <a href="<?php the_permalink() ?>" class="button"><?php _e('more', 'theme1763'); ?></a>
          </div>
        </div>
      </li>
    
  
    <?php endwhile; ?>
  </ul>
  <div class="clear"></div>
</div>





<?php get_template_part('includes/post-formats/post-nav'); ?>
<!-- Posts Navigation -->

<?php $wp_query = null; $wp_query = $temp;?>
</div><!-- #content -->
<!-- end #main -->
<?php get_footer(); ?>