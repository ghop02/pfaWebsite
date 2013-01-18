<?php get_header(); ?>
<div id="content" class="grid_24">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      
        <header>
          <h1><?php the_title(); ?></h1>
        </header>
		<!-- thumbnail info -->
       
		
          <?php echo the_content(); ?>
        <!--.post-content-->
		
		
      

    </div><!-- #post-## -->

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>