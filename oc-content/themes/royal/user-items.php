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
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
    <?php osc_current_web_theme_path('header.php'); ?>
    <div class="container">
        <div class="veraari">
            <div class="col-md-3">
                <?php echo osc_private_user_menu( get_user_menu() ); ?>
                <center class="ads-right"><?php echo osc_get_preference('sidebar-160x600', 'royal'); ?></center>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <div class="panel-heading">
                        <h1><?php _e("Your listings", 'royal'); ?></h1> 
                    </div>
                    <div class="panel-body">
                        <div id="products" class="row list-group">
                            <?php if(osc_count_items()==0 ) { ?>
                            <div class="item  col-xs-6 col-md-4">
                                <h3><?php _e("You don't have any listings yet", 'royal'); ?></h3> </div>
                            <?php } else { ?>
                            <?php while(osc_has_items()) { ?>
                            <div class="item  col-xs-6 col-md-4">
                                <div class="<?php osc_run_hook("highlight_class"); ?> col-item">
                                    <div class="photo">
                                        <?php if (osc_images_enabled_at_items()) { ?>
                                        <?php if (osc_count_item_resources()) { ?> <a href="<?php echo osc_item_url(); ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" /></a>
                                        <?php } else { ?> <img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" />
                                        <?php } ?>
                                        <?php } ?>
                                        <?php if( osc_item_is_premium() ) { ?> <span title="<?php echo osc_esc_html(__('Premium Listings','royal')); ?>" class="cat-label cat-label-label2"><i class="fa fa-star"></i></span>
                                        <?php } ?> </div>
                                    <div class="info">
                                        <div class="row">
                                            <div class="col-md-12 price">
                                                <h5 class="price-text-color">
                                                 <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_format_price(osc_item_price()); ?>
                                                        <?php } ?> </h5> </div>
                                            <div class="aribudin col-md-12">
                                                <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a>
                                            </div>
                                        </div>
                                        <div class="separator clear-left">
                                            <p class="btn-add"> <i class="fa fa-edit"></i>
                                                <a href="<?php echo osc_item_edit_url(); ?>"><?php _e("Edit", 'royal'); ?></a>
                                            </p>
                                            <p class="btn-details"> <i class="fa fa-power-off"></i>
                                                <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'royal')); ?>')" href="<?php echo osc_item_delete_url();?>">
                                                    <?php _e("Delete", 'royal'); ?></a>
                                                <?php if(osc_item_is_inactive()) {?> <span>|</span>
                                                <a href="<?php echo osc_item_activate_url();?>"><?php _e("Activate", 'royal'); ?></a>
                                                <?php } ?> </p>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <br />
                           <div class="paginate"><?php echo osc_pagination_items(); ?></div>
                            <?php } ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path( 'footer.php'); ?> 
</body>
</html>