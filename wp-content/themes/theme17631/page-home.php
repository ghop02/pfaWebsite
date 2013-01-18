<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
<div class="clearfix line">
  	<?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
      <!--Widgetized 'Before Content Area' for the home page-->
    <?php endif ?>
</div>
<div class="clearfix">
	<div class="grid_24">
	  	<?php if ( ! dynamic_sidebar( 'Primary Content Area' ) ) : ?>
	      <!--Widgetized 'Primary Content Area' for the home page-->
	    <?php endif ?>
	</div>
</div>
<div class="clearfix content-pad">
	<!-- Content -->
	<?php if (have_posts()) : while (have_posts()) : the_post();  ?>
		<?php   the_content(); ?>
	<?php endwhile; endif; ?>
	<!-- End Content -->
</div>
<div class="clearfix">
	<div class="grid_24">
	  	<?php if ( ! dynamic_sidebar( 'After Content Area' ) ) : ?>
	      <!--Widgetized 'After Content Area' for the home page-->
	    <?php endif ?>
	</div>
</div>
<?php get_footer(); ?>