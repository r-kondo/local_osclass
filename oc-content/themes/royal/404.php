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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template"> <i class="fa fa-ban veranda"></i>
                    <h1 class="judulku"><?php _e("Oops!", 'royal'); ?></h1>
                    <h2><?php _e("404 Not Found", 'royal'); ?></h2>
                    <div class="error-details">
                        <?php _e("Sorry, an error has occured, Requested page not found!", 'royal'); ?> 
                    </div>
                    <div class="error-actions"> <a href="<?php echo osc_base_url(); ?>" class="btn btn-primary btn-lg rini"><span class="fa fa-home"></span>
                       <?php _e("Take Me Home", 'royal'); ?></a><a href="<?php echo osc_contact_url(); ?>" class="btn btn-success btn-lg rini"><span class="fa fa-envelope"></span> <?php _e("Contact Support", 'royal'); ?></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>

</html>