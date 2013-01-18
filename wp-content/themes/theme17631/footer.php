  </div><!--.container-->
  	<div id="back-top-wrapper">
    	<p id="back-top">
        <a href="#top"></a>
      </p>
    </div>
	<footer id="footer">
		<div class="container_24 clearfix">
    	<div id="widget-footer" class="clearfix">
      	<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
          <!--Widgetized Footer-->
        <?php endif ?>
      </div>
			<div id="copyright" class="clearfix">
				<div class="grid_24">
					<div id="footer-text">
						<?php $myfooter_text = of_get_option('footer_text'); ?>
						
						<?php if($myfooter_text){?>
							<?php echo of_get_option('footer_text'); ?>
						<?php } else { ?>
							&copy; 2012 |  
							<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy"><?php _e('Privacy Policy', 'theme1763'); ?></a>
						<?php } ?>
						<?php if( is_front_page() ) { ?>
						More <a rel="nofollow" href="http://www.templatemonster.com/category/business-wordpress-templates/" target="_blank">Business WordPress Templates at TemplateMonster.com</a>
						<?php } ?>
					</div>
					<?php if ( of_get_option('footer_menu') == 'true') { ?>  
						<nav class="footer">
							<?php wp_nav_menu( array(
								'container'       => 'ul', 
								'menu_class'      => 'footer-nav', 
								'depth'           => 0,
								'theme_location' => 'footer_menu' 
								)); 
							?>
						</nav>
					<?php } ?>
				</div>
			</div>
		</div><!--.container-->
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>
</body>
</html>