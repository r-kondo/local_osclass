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
    <style>
    .breadcrumb {
        text-align: center;
    }
    </style>
    <div class="container">
        <div class="wrapper">
            <ul id="error_list"></ul>
            <form class="form-signin" name="sendfriend" action="<?php echo osc_base_url(true); ?>" method="post">
                <fieldset>
                    <input type="hidden" name="action" value="send_friend_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_esc_html( osc_item_id() ); ?>" />
                    <h3 class="form-signin-heading"><?php _e("Send to a friend", 'royal'); ?></h3>
                    <hr class="colorgraph">
                    <br>
                    <label>
                        <?php _e("Listing", 'royal'); ?>:
                        <a href="<?php echo osc_item_url( ); ?>">
                            <?php echo osc_item_title(); ?> </a>
                    </label>
                    <br/>
                    <?php if(osc_is_web_user_logged_in()) { ?>
                    <input type="hidden" name="yourName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                    <input type="hidden" name="yourEmail" value="<?php echo osc_logged_user_email();?>" />
                    <?php } else { ?>
                    <label for="yourName">
                        <?php _e("Your name", 'royal'); ?> </label>
                    <?php SendFriendForm::your_name(); ?>
                    <br />
                    <label for="yourEmail">
                        <?php _e("Your e-mail address", 'royal'); ?> </label>
                    <?php SendFriendForm::your_email(); ?>
                    <br />
                    <?php }; ?>
                    <label for="friendName">
                        <?php _e("Your friend's name", 'royal'); ?> </label>
                    <?php SendFriendForm::friend_name(); ?>
                    <br />
                    <label for="friendEmail">
                        <?php _e("Your friend's e-mail address", 'royal'); ?> </label>
                    <?php SendFriendForm::friend_email(); ?>
                    <br />
                    <label for="message">
                        <?php _e("Message", 'royal'); ?> </label>
                    <?php SendFriendForm::your_message(); ?>
                    <div class="jarak"></div>
                    <?php osc_show_recaptcha(); ?>
                    <br />
                    <button class="btn btn-primary btn-lg" type="submit"><span class="fa fa-send" aria-hidden="true"></span>
                        <?php _e("Send", 'royal'); ?> </button>
                </fieldset>
            </form>
        </div>
    </div>
    <?php SendFriendForm::js_validation(); ?>
    <?php osc_current_web_theme_path('footer.php'); ?> 
    </body>
</html>