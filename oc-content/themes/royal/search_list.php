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

    osc_get_premiums();
    if(osc_count_premiums() > 0) {
?>
<?php while(osc_has_premiums()) { ?>
<div class="premium thumbnail">
<div class="row">
    <?php if( osc_images_enabled_at_items() ) { ?>
    <div class="col-md-3 col-sm-3 col-xs-3 four-4 ari-4 three-6">
        <?php if(osc_count_premium_resources()) { ?> <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" /></a>
        <?php } else { ?> <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" /></a>
        <?php } ?> </div>
    <?php } ?>
    <div class="col-md-9 col-sm-9 col-xs-9 four-8 ari-8 three-6 text kat1">
        <h3><span><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ) ); ?></a></span>
                     </h3> <small>
                         <strong><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { ?><?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?><?php } ?></strong> </small>
        <span title="<?php echo osc_esc_html(__('Premium Listings','royal')); ?>" class="cat-label cat-label-label2"><i class="fa fa-star"></i></span>
        <p class="hidden-xs-down"><?php echo osc_highlight( strip_tags( osc_premium_description() ) ); ?> </p>
<div class="loc"><?php if(osc_premium_city()!='' ) { ?><strong><i class="fa fa-map-marker"></i></strong>
                              <?php echo osc_premium_city(); ?>
                              <?php } ?> &middot;
                              <?php if(osc_premium_region()!='' ) { ?>
                              <?php echo osc_premium_region(); ?>
                              <?php } ?> <span class="datt"><strong><i class="fa fa-clock-o"></i></strong> <?php echo osc_format_date(osc_premium_pub_date()); ?></span></div>
        </div>
</div>
</div>
<?php } ?>
<?php } ?>
<?php while(osc_has_items()) { $i++; ?>
<div class="<?php osc_run_hook("highlight_class"); ?> thumbnail">
<div class="row">
    <?php if( osc_images_enabled_at_items() ) { ?>
    <div class="col-md-3 col-sm-3 col-xs-3 four-4 ari-4 three-6">
        <?php if(osc_count_item_resources()) { ?> <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>"  title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
        <?php } else { ?> <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
        <?php } ?> </div>
    <?php } ?>
    <div class="col-md-9 col-sm-9 col-xs-9 four-8 ari-8 three-6 text kat1">
                     <h3>
                         <a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ) ); ?></a>
                     </h3> <small>
                         <strong><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><?php echo osc_format_price(osc_item_price()); ?><?php } ?></strong></small>
        <p  class="hidden-xs-down"><?php echo osc_highlight( strip_tags( osc_item_description() ) ); ?> </p>
<div class="loc"><?php if(osc_item_city()!='' ) { ?><strong><i class="fa fa-map-marker"></i></strong>
                            <?php echo osc_item_city(); ?>
                            <?php } ?> &middot;
                            <?php if(osc_item_region()!='' ) { ?>
                            <?php echo osc_item_region(); ?>
                            <?php } ?> <span class="datt"><strong><i class="fa fa-clock-o"></i></strong> <?php echo osc_format_date(osc_item_pub_date()); ?></span></div>
        </div>
</div>
</div>
<?php if( $i==5 ) { ?>
<?php osc_run_hook( 'search_ads_listing_medium1'); ?>
<?php } ?>
<?php } ?>