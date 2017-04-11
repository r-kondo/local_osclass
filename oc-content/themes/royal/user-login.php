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
    .controls {
        margin-top: 0px;
    }
    </style>
    <div class="container">
        <div class="wrapper">
            <form action="<?php echo osc_base_url(true); ?>" method="post" class="form-signin">
                <input type="hidden" name="page" value="login" />
                <input type="hidden" name="action" value="login_post" />
                <fieldset>
                    <h3 class="form-signin-heading"><?php _e("Access to your account", 'royal'); ?></h3>
                    <hr class="colorgraph">
                    <br>
                    <div class="form-group">
                        <label class="control-label" for="email">
                            <?php _e("E-mail", 'royal'); ?> </label>
                        <div class="controls">
                            <?php UserForm::email_login_text(); ?> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">
                            <?php _e("Password", 'royal'); ?> </label>
                        <div class="controls">
                            <?php UserForm::password_login_text(); ?> </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            <?php UserForm::rememberme_login_checkbox();?>
                            <label for="remember">
                                <?php _e("Remember me", 'royal'); ?> </label> <b><a href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'royal'); ?></a></b> </div>
                    </div>
                    <button class="btn btn-success btn-lg seratus" type="submit"><span class="fa fa-sign-in" aria-hidden="true"></span>
                        <?php _e("Log in", 'royal');?> </button>
                    <br>
                    <div class="jarak"></div>
                    <?php osc_current_web_theme_path('common/fb.php') ; ?>
              </fieldset>
            </form>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>
</html>