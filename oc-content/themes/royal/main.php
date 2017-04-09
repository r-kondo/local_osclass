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
    <meta name="robots" content="index, follow" />
</head>

<body>
    <?php osc_current_web_theme_path('header.php') ; ?>
    <div class="container">
        <?php royal_show_flash_message() ; ?> 
    </div>
    <?php osc_current_web_theme_path('templates/home/'.osc_get_preference('home-royal', 'royal').'.php') ; ?>
    <?php osc_current_web_theme_path('footer.php') ; ?> 
</body>

</html>