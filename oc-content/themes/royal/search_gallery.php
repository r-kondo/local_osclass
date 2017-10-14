<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *       
     *       Copyright (C) 2017 OSCLASS.me
     * 
     *       This is Royal Multipurpose Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */

    osc_get_premiums($max = 3);
    if(osc_count_premiums() > 0) {
?>   
<?php while(osc_has_premiums()) { ?>
<div class="col-lg-4 col-md-4 col-sm-3 col-xs-4 four-6 three-12 grid-group-item">
    <div class="col-item">
        <div class="photo">
            <?php if( osc_count_premium_resources() ) { ?> <a href="<?php echo osc_premium_url() ; ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" /></a><span title="<?php echo osc_esc_html(__('Premium Listings','royal')); ?>" class="cat-label cat-label-label2"><i class="fa fa-star"></i></span>
            <?php } else { ?><a href="<?php echo osc_premium_url() ; ?>">
            <img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"/></a><span title="<?php echo osc_esc_html(__('Premium Listings','royal')); ?>" class="cat-label cat-label-label2"><i class="fa fa-star"></i></span>
            <?php } ?> </div>
        <div class="info">
            <div class="row">
                <div class="col-md-12 price">
                    <h5 class="price-text-color">
                     <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { ?> <?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?><?php } ?></h5> </div>
                <div class="aribudin col-md-12">
                    <a href="<?php echo osc_premium_url() ; ?>"><?php echo osc_premium_title(); ?></a>
                </div>
            </div>
            <div class="separator clear-left">
                <p class="btn-add"> <i class="fa fa-user"></i>
                    <a href="<?php echo osc_user_public_profile_url( osc_premium_user_id() ); ?>"><?php _e("Contact seller", 'royal') ; ?></a>
                </p>
                <p class="btn-details"> <i class="fa fa-list"></i>
                    <a href="<?php echo osc_premium_url() ; ?>"><?php _e("More Details", 'royal') ; ?></a>
                </p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php } ?><?php } ?>
<?php while(osc_has_items()) { ?>
<div class="col-lg-4 col-md-4 col-sm-3 col-xs-4 four-6 three-12 <?php osc_run_hook("highlight_class"); ?> grid-group-item">
    <div class="col-item">
        <div class="photo">
            <?php if( osc_images_enabled_at_items() ) { ?>
            <?php if(osc_count_item_resources()) { ?> <a href="<?php echo osc_item_url(); ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
            <?php } else { ?> <a href="<?php echo osc_item_url(); ?>"><img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
            <?php } ?>
            <?php } ?> </div>
        <div class="info">
            <div class="row">
                <div class="col-md-12 price">
                    <h5 class="price-text-color">
                    <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?> <?php echo osc_format_price(osc_item_price()); ?><?php } ?></h5> </div>
                <div class="aribudin col-md-12">
                    <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a>
                </div>
            </div>
            <div class="separator clear-left">
                <p class="btn-add"> <i class="fa fa-user"></i>
                    <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>"><?php _e("Contact seller", 'royal') ; ?></a>
                </p>
                <p class="btn-details"> <i class="fa fa-list"></i>
                    <a href="<?php echo osc_item_url(); ?>"><?php _e("More Details", 'royal') ; ?></a>
                </p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php } ?>