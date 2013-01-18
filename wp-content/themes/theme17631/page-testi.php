<?php
/**
 * Template Name: Testimonials
 */

get_header(); ?>
	<div id="content" class="grid_17 <?php echo of_get_option('blog_sidebar_pos') ?>">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div id="page-content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
    <?php
    $temp = $wp_query;
    $wp_query= null;
    $wp_query = new WP_Query();
    $wp_query->query('post_type=testi&showposts=4&paged='.$paged);
    ?>
    <?php if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
      <?php 
      $custom = get_post_custom($post->ID);
      $testiname = $custom["testimonial-name"][0];
      $testiurl = $custom["testimonial-url"][0];
      $testijob = $custom["testimonial-job"][0];
      $testidescr = $custom["testimonial-description"][0];
      ?>
      <article id="post-<?php the_ID(); ?>" class="testimonial post-holder">
        <div class="post-content">
					<?php if(has_post_thumbnail()) { ?>
						<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 120, 120, true ); //resize & crop img
						?>
						<figure class="featured-thumbnail">
							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
						</figure>
          <?php } ?>
        <span class="name-testi single-testi">
          <?php if($testiname != '') { ?>
            <span class="user"><?php echo $testiname; ?></span>
          <?php } ?>
          <?php if($testijob != '') { ?>
            <span class="job"><?php echo $testijob; ?></span>
          <?php } ?>
          <?php if($testiurl != '') { ?>
            <a href="http://<?php echo $testiurl; ?>"><?php echo $testiurl; ?></a>
          <?php } ?>
        </span>
        <div class="clear"></div>
        <?php if($testidescr != '') { ?>
          <strong class="descr"><?php echo $testidescr; ?></strong>
        <?php } ?>
          <?php the_content(); ?>
        </div>
      </article>
      
    <?php endwhile; else: ?>
      <div class="no-results">
				<?php echo '<p><strong>' . __('There has been an error.', 'theme1763') . '</strong></p>'; ?>
        <p><?php _e('We apologize for any inconvenience, please', 'theme1763'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1763'); ?></a> <?php _e('or use the search form below.', 'theme1763'); ?></p>
        <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
      </div><!--no-results-->
    <?php endif; ?>
    
    <?php if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="oldernewer">
          <div class="older">
            <?php next_posts_link( __('&laquo; Older Testimonials', 'theme1763')) ?>
          </div><!--.older-->
          <div class="newer">
            <?php previous_posts_link(__('Newer Testimonials &raquo;', 'theme1763')) ?>
          </div><!--.newer-->
        </nav><!--.oldernewer-->
      <?php endif; ?>
    
    <?php $wp_query = null; $wp_query = $temp;?>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>