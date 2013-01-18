<?php get_header(); ?>
<div id="content" class="grid_17 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<h1><?php the_title(); ?></h1>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php 
    $custom = get_post_custom($post->ID);
    $testiname = $custom["testimonial-name"][0];
    $testiurl = $custom["testimonial-url"][0];
    $testijob = $custom["testimonial-job"][0];
    $testidescr = $custom["testimonial-description"][0];
    ?>
    <blockquote class="testi-single" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
      <div class="post-content">
        <?php if($testidescr != '') { ?>
          <strong class="descr"><?php echo $testidescr; ?></strong>
        <?php } ?>
        <?php the_content(); ?>
      </div>
    </blockquote>
    
  <?php endwhile; else: ?>
    <div class="no-results">
    	<?php echo '<p><strong>' . __('There has been an error.', 'theme1763') . '</strong></p>'; ?>
      <p><?php _e('We apologize for any inconvenience, please', 'theme1763'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1763'); ?></a> <?php _e('or use the search form below.', 'theme1763'); ?></p>
      <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
    </div><!--no-results-->
  <?php endif; ?>
  <nav class="oldernewer">
    <div class="older">
      <?php previous_post_link('%link', __('&laquo; Previous post', 'theme1763')) ?>
    </div><!--.older-->
    <div class="newer">
      <?php next_post_link('%link', __('Next Post &raquo;', 'theme1763')) ?>
    </div><!--.newer-->
  </nav><!--.oldernewer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>