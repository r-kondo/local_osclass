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
?>
<style>
section#footerme {
    margin-top: 0px;
}
</style>
<?php if(osc_get_preference('premium-royal', 'royal')=="yes" ) { ?>
<div class="container">
<div class="row">
    <div class="ari">
        <h2><?php _e("Premium Listings", 'royal') ; ?></h2> </div></div>
    <div class="row">
        <div id="owl-demo" class="owl-carousel">
            <?php osc_get_premiums($max=osc_get_preference('premiumads_num_royal', 'royal')) ; if( osc_count_premiums()> 0 ) { ?>
            <?php while ( osc_has_premiums() ) { ?>
            <div class="item col-md-12">
                <div class="col-item">
                    <div class="photo">
                        <?php if( osc_count_premium_resources() ) { ?> <a href="<?php echo osc_premium_url() ; ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" /></a>
                        <?php } else { ?><a href="<?php echo osc_premium_url() ; ?>">
            <img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"/></a>
                        <?php } ?> </div>
                    <div class="info">
                        <div class="row">
                            <div class="col-md-12 price">
                                <h5 class="price-text-color">
                                               <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { ?> <?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?><?php } ?></h5> </div>
                            <div class="aribudin col-md-12">
                                <a href="<?php echo osc_premium_url() ; ?>">
                                    <?php echo osc_premium_title(); ?> </a>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add"> <i class="fa fa-user"></i>
                                <a href="<?php echo osc_user_public_profile_url( osc_premium_user_id() ); ?>">
                                    <?php _e("Contact seller", 'royal') ; ?> </a>
                            </p>
                            <p class="btn-details"> <i class="fa fa-list"></i>
                                <a href="<?php echo osc_premium_url() ; ?>">
                                    <?php _e("More Details", 'royal') ; ?> </a>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?> </div>
    </div>
</div>
<?php } ?>
<?php if(osc_get_preference('product-royal', 'royal')=="yes" ) { ?>
<div class="container">
<div class="row">
    <div class="ari">
        <h2><?php _e("Latest Listings", 'royal') ; ?>
</h2> </div></div>
    <div class="row">
        <div id="owl-demo1" class="owl-carousel">
            <?php if( osc_count_latest_items()==0 ) { ?>
            <p class="empty">
                <?php _e("No Latest Listings", 'royal'); ?> </p>
            <?php } else { ?>
            <?php $class="even" ; ?>
            <?php while ( osc_has_latest_items() ) { ?>
            <div class="item  col-md-12">
                <div class="<?php osc_run_hook("highlight_class"); ?> col-item">
                    <div class="photo">
                        <?php if( osc_images_enabled_at_items() ) { ?>
                        <?php if( osc_count_item_resources() ) { ?> <a href="<?php echo osc_item_url(); ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
                        <?php } else { ?><a href="<?php echo osc_item_url(); ?>">
            <img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"/></a>
                        <?php } ?>
                        <?php if( osc_item_is_premium() ) { ?> <span title="<?php echo osc_esc_html(__('Premium Listings','royal')); ?>" class="cat-label cat-label-label2"><i class="fa fa-star"></i></span>
                        <?php } ?> </div>
                    <div class="info">
                        <div class="row">
                            <div class="col-md-12 price">
                                <h5 class="price-text-color">
                                              <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?> <?php echo osc_format_price(osc_item_price()); ?><?php } ?></h5> </div>
                            <div class="aribudin col-md-12">
                                <a href="<?php echo osc_item_url(); ?>">
                                    <?php echo osc_item_title(); ?> </a>
                            </div>
                        </div>
                        <div class="separator clear-left">
                            <p class="btn-add"> <i class="fa fa-user"></i>
                                <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>">
                                    <?php _e("Contact seller", 'royal') ; ?> </a>
                            </p>
                            <p class="btn-details"> <i class="fa fa-list"></i>
                                <a href="<?php echo osc_item_url(); ?>">
                                    <?php _e("More Details", 'royal') ; ?> </a>
                            </p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?> </div>
    </div>
    <?php if( osc_count_latest_items()==osc_max_latest_items() ) { ?>
    <div class="row">
        <div class="col-md-12">
            <p class='pagination'>
                <?php echo osc_search_pagination(); ?> </p> <a class="btn btn-primary full1" href="<?php echo osc_search_show_all_url();?>"><strong><?php _e("See all offers", 'royal'); ?> &raquo;</strong></a> </div>
    </div>
    <?php } ?>
    <?php View::newInstance()->_erase('items'); } ?> </div>
<?php } ?>
<div class="container">
<div class="row">
<?php if(osc_get_preference( 'sect4_view', 'royal_theme')=="1" ) { ?>
            <div class="col-md-12">
                <div class="ari">
        <h2><i class="fa fa-dollar"></i> <?php _e('Price', 'royal'); ?></h2>
                </div>
                <div class="pricing">
                    <ul>
                        <li class="unit price-primary">
                            <div class="price-title">
                                <?php echo osc_get_preference('price1-us', 'royal'); ?> </div>
                            <div class="price-body">
                                <?php echo osc_get_preference('price2-us', 'royal'); ?>
                                <ul>
                                    <?php echo osc_get_preference('price3-us', 'royal'); ?> </ul>
                            </div>
                            <div class="price-foot">
                                <a type="button" href="<?php echo osc_get_preference('price5-us', 'royal'); ?>" class="btn btn-primary">
                                    <?php echo osc_get_preference('price4-us', 'royal'); ?></a>
                            </div>
                        </li>
                        <li class="unit price-success active">
                            <div class="price-title">
                                <?php echo osc_get_preference('price6-us', 'royal'); ?> </div>
                            <div class="price-body">
                                <?php echo osc_get_preference('price7-us', 'royal'); ?>
                                <ul>
                                    <?php echo osc_get_preference('price8-us', 'royal'); ?> </ul>
                            </div>
                            <div class="price-foot">
                                <a type="button" href="<?php echo osc_get_preference('price10-us', 'royal'); ?>" class="btn btn-success">
                                    <?php echo osc_get_preference('price9-us', 'royal'); ?></a>
                            </div>
                        </li>
                        <li class="unit price-warning">
                            <div class="price-title">
                                <?php echo osc_get_preference('price11-us', 'royal'); ?> </div>
                            <div class="price-body">
                                <?php echo osc_get_preference('price12-us', 'royal'); ?>
                                <ul>
                                    <?php echo osc_get_preference('price13-us', 'royal'); ?> </ul>
                            </div>
                            <div class="price-foot">
                                <a type="button" href="<?php echo osc_get_preference('price15-us', 'royal'); ?>" class="btn btn-warning">
                                    <?php echo osc_get_preference('price14-us', 'royal'); ?> </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php } ?>
            <?php if(osc_get_preference('sect5_view', 'royal_theme')=="1" ) { ?>
            <div class="col-md-12">
                <div class="ari">
        <h2><i class="fa fa-users"></i> <?php _e('Client', 'royal'); ?>
                    </h2>
                </div>
                <div id="owl-demo7" class="owl-carousel">
                    <?php echo brand_1(); ?>
                    <?php echo brand_2(); ?>
                    <?php echo brand_3(); ?>
                    <?php echo brand_4(); ?>
                    <?php echo brand_5(); ?>
                    <?php echo brand_6(); ?>
                    <?php echo brand_7(); ?>
                    <?php echo brand_8(); ?> 
                </div>
            </div>
            <?php } ?> 
</div>
            
    <center class="ad-foot">
        <?php echo osc_get_preference('homepage-728x90', 'royal'); ?> </center>
</div></div>
<?php if(osc_get_preference('popular-royal', 'royal')=="yes" ) { ?>
<div class="page-info">
    <div class="container text-center section-promo">
        <div class="row">
            <div class="col-sm-3 col-xs-6 ari-12">
                <div class="iconbox-wrap">
                    <div class="iconbox">
                        <div class="iconbox-wrap-icon"> <i class="fa fa-th"></i> </div>
                        <div class="iconbox-wrap-content">
                            <h5><span><?php echo osc_total_items(); ?></span> </h5>
                            <div class="iconbox-wrap-text">
                                <?php _e("Total Ads", 'royal'); ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6 ari-12">
                <div class="iconbox-wrap">
                    <div class="iconbox">
                        <div class="iconbox-wrap-icon"> <i class="fa fa-star"></i> </div>
                        <div class="iconbox-wrap-content">
                            <h5><span><?php echo osc_count_premiums(); ?> </span> </h5>
                            <div class="iconbox-wrap-text">
                                <?php _e("Premium Ads", 'royal'); ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6 ari-12">
                <div class="iconbox-wrap">
                    <div class="iconbox">
                        <div class="iconbox-wrap-icon"> <i class="fa fa-group"></i> </div>
                        <div class="iconbox-wrap-content">
                            <h5><span><?php echo osc_total_users(); ?></span> </h5>
                            <div class="iconbox-wrap-text">
                                <?php _e("Total Member", 'royal'); ?> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6 ari-12">
                <div class="iconbox-wrap">
                    <div class="iconbox">
                        <div class="iconbox-wrap-icon"> <i class="fa fa-map-marker"></i> </div>
                        <div class="iconbox-wrap-content">
                            <h5><span><?php echo osc_count_regions($country = '%%%%'); ?></span> </h5>
                            <div class="iconbox-wrap-text">
                                <?php _e("Location", 'royal'); ?> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<script src="<?php echo osc_current_web_theme_js_url('owl.carousel.js') ; ?>"></script> 
<script src="<?php echo osc_current_web_theme_js_url('royal.js') ; ?>"></script> 