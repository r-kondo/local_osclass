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
    <style>
    .breadcrumb {
        text-align: center;
    }
    </style>
    <div class="container">
        <div class="wrapper">
            <form action="<?php echo osc_base_url(true); ?>" method="post" class="form-signin">
                <input type="hidden" name="page" value="login" />
                <input type="hidden" name="action" value="recover_post" />
                <fieldset>
                    <h3 class="form-signin-heading"><?php _e("Recover your password", 'royal'); ?></h3>
                    <hr class="colorgraph">
                    <br>
                    <input type="text" class="form-control bawah" name="s_email" placeholder="<?php echo osc_esc_html(__('E-mail','royal')); ?>" required="" autofocus="" />
                    <div class="jarak"></div>
                    <?php osc_show_recaptcha('recover_password'); ?>
                    <div class="jarak"></div>
                    <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">
                        <?php _e("Send me a new password", 'royal');?> </button>
                    </fieldset>
            </form>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>
</html>