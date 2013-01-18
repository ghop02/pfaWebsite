    <?php $post_meta = of_get_option('post_meta'); ?>
		<?php if ($post_meta=='true' || $post_meta=='') { ?>
			<div class="post-meta">
				<div class="fleft"><?php _e('Posted by:', 'theme1763'); ?> <?php the_author_posts_link() ?> | <time datetime="<?php 

the_time('Y-m-d\TH:i'); ?>"><?php the_time('F j, Y'); ?> <?php _e('at', 'theme1763'); ?> <?php the_time() ?></time></div>
				<div class="fright"><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are 

closed'); ?></div>
			</div><!--.post-meta-->
		<?php } ?>		
