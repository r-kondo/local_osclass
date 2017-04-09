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
                <center class="ads-right">
                    <?php echo osc_get_preference('sidebar-160x600', 'royal'); ?> </center>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <div class="panel-heading">
                        <h1><?php _e("Your alerts", 'royal'); ?></h1> </div>
                    <div class="panel-body">
                        <?php if(osc_count_alerts()==0 ) { ?>
                        <h3><?php _e("You do not have any alerts yet", 'royal'); ?>.</h3>
                        <?php } else { ?>
                        <?php while(osc_has_alerts()) { ?>
                        <div class="userItem">
                            <div>
                                <?php _e("Alert", 'royal'); ?> |
                                <a onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'royal')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>">
                                    <?php _e("Delete this alert", 'royal'); ?> </a>
                            </div>
                            <?php while(osc_has_items()) { ?>
                            <?php if( osc_images_enabled_at_items() ) { ?>
                            <div class="col-md-2">
                                <?php if(osc_count_item_resources()) { ?><a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" /></a>
                                <?php } else { ?> <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>"/></a>
                                <?php } ?> </div>
                            <?php } ?>
                            <div class="col-md-10 text kat1">
                                <div class="userItem">
                                    <div>
                                        <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a>
                                    </div>
                                    <div class="userItemData">
                                        <?php _e("Publication date", 'royal'); ?>:
                                        <?php echo osc_format_date(osc_item_pub_date()); ?>
                                        <br/>
                                        <?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { _e("Price", 'royal'); ?>:
                                        <?php echo osc_format_price(osc_item_price()); } ?> </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php if(osc_count_items()==0 ) { ?>
                            <br /> 0 <?php _e("Listings", 'royal'); ?>
                            <?php } ?> </div>
                    </div>
                    <br/>
                    <?php } ?>
                    <?php } ?> </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
  </body>

</html>