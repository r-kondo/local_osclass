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

    osc_get_premiums();
    if(osc_count_premiums() > 0) {
?>
<?php while(osc_has_premiums()) { ?>
<div class="col-md-12 premium thumbnail">
    <?php if( osc_images_enabled_at_items() ) { ?>
    <div class="col-md-3">
        <?php if(osc_count_premium_resources()) { ?> <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" /></a>
        <?php } else { ?> <a href="<?php echo osc_premium_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" /></a>
        <?php } ?> </div>
    <?php } ?><span title="<?php echo osc_esc_html(__('Premium Listings','royal')); ?>" class="cat-label cat-label-label2"><i class="fa fa-star"></i></span>
    <div class="col-md-9 text kat1">
        <h3><span><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight( strip_tags( osc_premium_title() ) ); ?></a></span>
                     </h3> <small>
                         <strong><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled(osc_premium_category_id()) ) { ?><?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?><?php } ?></strong> </small>
        <p><?php echo osc_highlight( strip_tags( osc_premium_description() ) ); ?> </p>
        </div>
</div>
<?php } ?>
<?php } ?>
<?php while(osc_has_items()) { $i++; ?>
<div class="<?php osc_run_hook("highlight_class"); ?> col-md-12 thumbnail">
    <?php if( osc_images_enabled_at_items() ) { ?>
    <div class="col-md-3">
        <?php if(osc_count_item_resources()) { ?> <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>"  title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
        <?php } else { ?> <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
        <?php } ?> </div>
    <?php } ?>
    <div class="col-md-9 text kat1">
                     <h3>
                         <a href="<?php echo osc_item_url(); ?>"><?php echo osc_highlight( strip_tags( osc_item_title() ) ); ?></a>
                     </h3> <small>
                         <strong><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><?php echo osc_format_price(osc_item_price()); ?><?php } ?></strong></small>
        <p><?php echo osc_highlight( strip_tags( osc_item_description() ) ); ?> </p>
        </div>
</div>
<?php if( $i==5 ) { ?>
<?php osc_run_hook( 'search_ads_listing_medium1'); ?>
<?php } ?>
<?php } ?>