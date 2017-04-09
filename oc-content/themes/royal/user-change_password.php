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
            </div>
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <div class="panel-heading">
                        <h1><?php _e("Change your password", 'royal'); ?></h1> </div>
                    <div class="panel-body">
                        <form action="<?php echo osc_base_url(true); ?>" method="post">
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="action" value="change_password_post" />
                            <fieldset>
                                <div class="form-group">
                                    <label class="control-label" for="password">
                                        <?php _e("Current password", 'royal'); ?> *</label>
                                    <input type="password" name="password" id="password" value="" /> </div>
                                <div class="form-group">
                                    <label class="control-label" for="new_password">
                                        <?php _e("New password", 'royal'); ?> *</label>
                                    <input type="password" name="new_password" id="new_password" value="" /> </div>
                                <div class="form-group">
                                    <label class="control-label" for="new_password2">
                                        <?php _e("Repeat new password", 'royal'); ?> *</label>
                                    <input type="password" name="new_password2" id="new_password2" value="" /> </div>
                                <div style="clear:both;"></div>
                                <button class="btn btn-primary btn-lg" type="submit"><span class="fa fa-check-square" aria-hidden="true"></span>
                                    <?php _e("Update", 'royal'); ?> </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>
</html>