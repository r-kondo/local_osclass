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
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_js_url('jquery-ui/jquery-ui-1.10.2.custom.css'));
    osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
   <body>
    <style>
    .controls {
    margin-top: 0px;
    }
    .breadcrumb {
        text-align: center;
    }
    </style>
    <?php UserForm::js_validation(); ?>
    <?php osc_current_web_theme_path('header.php'); ?>
    <div class="container">
        <div class="wrapper">
            <form name="register" id="register" action="<?php echo osc_base_url(true); ?>" method="post" class="form-signin">
                <input type="hidden" name="page" value="register" />
                <input type="hidden" name="action" value="register_post" />
                <fieldset>
                    <h3 class="form-signin-heading"><?php _e("Register an account for free", 'royal'); ?></h3>
                    <hr class="colorgraph">
                    <br>
                    <ul id="error_list"></ul>
                    <div class="form-group">
                        <label class="control-label" for="name">
                            <?php _e("Name", 'royal'); ?> </label>
                        <div class="controls">
                            <?php UserForm::name_text(); ?> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">
                            <?php _e("Password", 'royal'); ?> </label>
                        <div class="controls">
                            <?php UserForm::password_text(); ?> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="password">
                            <?php _e("Re-type password", 'royal'); ?> </label>
                        <div class="controls">
                            <?php UserForm::check_password_text(); ?> </div>
                    </div>
                    <p id="password-error" style="display:none;">
                        <?php _e("Passwords don't match", 'royal '); ?>.
                        </p>
                       <div class="form-group">
                       <label class="control-label" for="email"><?php _e("E-mail", 'royal '); ?></label> 
                       <div class="controls"><?php UserForm::email_text(); ?></div></div>
                       <div class="form-group">
                       <?php osc_run_hook('user_register_form'); ?>
                       </div>
                       <div class="form-group">
                       <?php osc_show_recaptcha('register'); ?>
                       </div>
                        <div class="form-group">
                        <label><input class="cekk" type="checkbox" required=""><?php _e("I agree to the", 'royal'); ?> <a target="_blank" href="<?php echo osc_get_preference('tos-me', 'royal'); ?>"><?php _e("Terms of Use", 'royal'); ?></a></label>
                        </div>
                        <button class="btn btn-success btn-lg topper seratus" type="submit"><span class="fa fa-group" aria-hidden="true"></span> <?php _e("Register", 'royal '); ?></button>
                        <div class="jarak"></div>
                       <?php osc_current_web_theme_path('common/fb.php') ; ?>
                </fieldset>
            </form>
        </div>
    </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
         <script>
    document.getElementById("s_name").maxLength = "30";
    </script>
    </body>
</html>