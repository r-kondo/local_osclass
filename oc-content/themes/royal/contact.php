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
    <?php osc_current_web_theme_path('header.php'); ?>
    <div id="content" class="container user_forms">
        <style>
        .breadcrumb {
            text-align: center;
        }
        </style>
        <div class="poss col-md-9">
            <div class="panel panel-default row">
                <div class="panel-heading">
                    <h1><?php _e("Contact us", 'royal'); ?></h1> 
                </div>
                <div class="panel-body">
                    <ul id="error_list"></ul>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact">
                        <input type="hidden" name="page" value="contact" />
                        <input type="hidden" name="action" value="contact_post" />
                        <fieldset>
                            <label for="yourName">
                                <?php _e("Your name", 'royal'); ?> (
                                <?php _e("optional", 'royal'); ?>)</label>
                            <?php ContactForm::your_name(); ?>
                            
                            <label for="yourEmail">
                                <?php _e("Your e-mail address", 'royal'); ?> </label>
                            <?php ContactForm::your_email(); ?>
                           
                            <label for="subject">
                                <?php _e("Subject", 'royal'); ?> (
                                <?php _e("optional", 'royal'); ?>)</label>
                            <?php ContactForm::the_subject(); ?>
                           
                            <label for="message">
                                <?php _e("Message", 'royal'); ?> </label>
                            <?php ContactForm::your_message(); ?>
                             <label for="captca">
                            <?php osc_run_hook( 'contact_form'); ?></label>
                             <label for="captca">
                            <?php osc_show_recaptcha(); ?></label>
                            <button class="btn btn-primary seratus" type="submit">
                                <?php _e("Send", 'royal'); ?> </button>
                            <?php osc_run_hook('admin_contact_form'); ?> 
                      </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php ContactForm::js_validation(); ?>
    <?php osc_current_web_theme_path('footer.php'); ?> 
  </body>
</html>