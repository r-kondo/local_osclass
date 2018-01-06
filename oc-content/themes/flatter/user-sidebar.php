<div id="sidebar">
	<div class="widget patternbg">
    	<div class="bg-layer"></div>
        <div class="profile-section">
            <?php dd_picupload();?>
            <h4><?php echo osc_logged_user_name(); ?> <a href="<?php echo osc_user_public_profile_url( osc_logged_user_id() ); ?>" title="<?php _e('View public profile', 'flatter'); ?>" target="_blank" class="sclr"><i class="fa fa-external-link"></i></a></h4>
        </div>
    </div>
    <div class="widget">
        <div class="wblock user-nav">
            <?php echo osc_private_user_menu( get_user_menu() ); ?>
        </div>
    </div>
    <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0' && osc_get_preference('adsense_sidebar', 'flatter_theme') != null ) { ?>
    <div class="widget">
        <div class="wblock gadsense">
            <?php echo osc_get_preference('adsense_sidebar', 'flatter_theme'); ?>
        </div>
    </div>
    <?php } ?>
</div>