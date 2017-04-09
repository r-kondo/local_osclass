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
    <div id="content" class="container">
        <style>
        .breadcrumb {
            text-align: center;
        }
        </style>
        <div class="poss col-md-9">
            <div class="panel panel-default row">
                <?php osc_reset_static_pages(); ?>
                <div class="panel-heading">
                    <h1><?php echo osc_static_page_title(); ?></h1> 
                </div>
                <div class="panel-body">
                    <div>
                        <?php echo osc_static_page_text(); ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>

</html>