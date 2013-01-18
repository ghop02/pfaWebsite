<script type="text/javascript">
    jQuery(window).load(function() {
        jQuery(function(){
            jQuery('.camera_wrap').camera({
                alignment           : 'topCenter', //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                autoAdvance         : <?php echo of_get_option('sl_slideshow'); ?>,   //true, false
                mobileAutoAdvance   : <?php echo of_get_option('sl_slideshow'); ?>, //true, false. Auto-advancing for mobile devices
                barDirection        : 'leftToRight',    //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                barPosition         : 'top',    //'bottom', 'left', 'top', 'right'
                cols                : <?php echo of_get_option('sl_columns'); ?>,
                easing              : 'easeInOutExpo',  //for the complete list http://jqueryui.com/demos/effect/easing.html
                mobileEasing        : '',   //leave empty if you want to display the same easing on mobile devices and on desktop etc.
                fx                  : '<?php echo of_get_option('sl_effect'); ?>',    //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft',          'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
                                                //you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'
                mobileFx            : '',   //leave empty if you want to display the same effect on mobile devices and on desktop etc.
                gridDifference      : 250,  //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
                height              : '51%', //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
                imagePath           : 'images/',    //he path to the image folder (it serves for the blank.gif, when you want to display videos)
                loader              : 'none',    //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
                loaderColor         : '#ffffff',
                loaderBgColor       : '#eb8a7c',
                loaderOpacity       : 1,    //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
                loaderPadding       : 0,    //how many empty pixels you want to display between the loader and its background
                loaderStroke        : 3,    //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
                minHeight           : '147px',  //you can also leave it blank
                navigation          : <?php echo of_get_option('sl_dir_nav'); ?>, //true or false, to display or not the navigation buttons
                navigationHover     : <?php echo of_get_option('sl_dir_nav_hide'); ?>,    //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always
                pagination          : <?php echo of_get_option('sl_control_nav'); ?>,
                playPause           : <?php echo of_get_option('sl_play_pause_button'); ?>,   //true or false, to display or not the play/pause buttons
                pieDiameter         : 33,
                piePosition         : 'rightTop',   //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
                portrait            : true, //true, false. Select true if you don't want that your images are cropped
                rows                : <?php echo of_get_option('sl_rows'); ?>,
                slicedCols          : <?php echo of_get_option('sl_columns'); ?>,
                slicedRows          : <?php echo of_get_option('sl_rows'); ?>,
                thumbnails          : false,
                time                : <?php echo of_get_option('sl_pausetime'); ?>,   //milliseconds between the end of the sliding effect and the start of the next one
                transPeriod         : <?php echo of_get_option('sl_animation_speed'); ?>, //lenght of the sliding effect in milliseconds
 
        ////////callbacks
 
                onEndTransition     : function() {  },  //this callback is invoked when the transition effect ends
                onLoaded            : function() {  },  //this callback is invoked when the image on a slide has completely loaded
                onStartLoading      : function() {  },  //this callback is invoked when the image on a slide start loading
                onStartTransition   : function() {  }   //this callback is invoked when the transition effect starts
            });
        });
    });
</script>
 
<div class="camera_wrap">
    <?php
        query_posts("post_type=slider&posts_per_page=-1&post_status=publish");
        while ( have_posts() ) : the_post();
    ?>
    <?php
        $custom = get_post_custom($post->ID);
        $url = get_post_custom_values("slider-url");
        $sl_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-post-thumbnail');
        $sl_small_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slider-thumb');
        $banner_animation = of_get_option('sl_banner');
    ?>
    <?php if(has_post_thumbnail( $the_ID)){ ?>
 
        <?php echo "<div";
                    if($url!=""){ ?>
        <?php echo "data-src='";
                    echo $sl_image_url[0];
                    echo "' data-link='". $url[0] ."'";
                    echo " data-thumb='";
                    echo $sl_small_image_url[0];
                    echo "'>"; ?>
                    <?php if(get_the_content()) { ?>
                    <div class="camera_caption <?php echo $banner_animation;?>">
                        <?php the_content(); ?>
                    </div>
                    <?php } ?>
        <?php }else{ ?>
        <?php echo "data-src='";
                    echo $sl_image_url[0];
                    echo "' data-thumb='";
                    echo $sl_small_image_url[0];
                    echo "'>"; ?>
                    <?php if(get_the_content()) { ?>
                    <div class="camera_caption <?php echo $banner_animation;?>">
                        <?php the_content(); ?>
                    </div>
                    <?php } ?>
        <?php }
                    echo "</div>"; ?>
 
    <?php } ?>
 
    <?php endwhile; ?>
    <?php wp_reset_query();?>
</div>
<!--[if (gt IE 9)|!(IE)]><!-->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.mobile.customized.min.js" type="text/javascript"></script>
<!--<![endif]-->