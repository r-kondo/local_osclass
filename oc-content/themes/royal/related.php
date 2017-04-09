<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *       
     *       Copyright (C) 2016 OSCLASS.me
     * 
     *       This is Royal Multipurpose Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<div class="related">
    <div id="owl-demo45" class="owl-carousel">
        <?php while(osc_has_items()) { ?>
        <div class="item col-md-12">
            <div class="col-item">
                <div class="photo">
                    <?php if( osc_images_enabled_at_items() ) { ?>
                    <?php if(osc_count_item_resources()) { ?> <a href="<?php echo osc_item_url(); ?>"><img class="lazyOwl" data-src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"></a>
                    <?php } else { ?> <a href="<?php echo osc_item_url(); ?>"><img class="lazyOwl" data-src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"></a>
                    <?php } ?>
                    <?php } ?> </div>
                <div class="info">
                    <div class="row">
                        <div class="col-md-12 price">
                            <h5 class="price-text-color">
                             <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><?php echo osc_format_price(osc_item_price()); ?><?php } ?></h5> 
                        </div>
                        <div class="aribudin col-md-12">
                            <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a>
                        </div>
                    </div>
                    <div class="separator clear-left">
                        <p class="btn-ass"> <i class="fa fa-list"></i>
                            <a href="<?php echo osc_item_url(); ?>"><?php _e("More Details", 'royal') ; ?></a>
                        </p>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <?php } ?> 
  </div>
</div>	

<script src="<?php echo osc_current_web_theme_js_url('owl.carousel.js') ; ?>"></script> 
<script>
$("#owl-demo45").owlCarousel({
    items : 4,
     autoPlay: 5000,
    autoplay: true,
    lazyLoad : true,
    
  }); 
</script>