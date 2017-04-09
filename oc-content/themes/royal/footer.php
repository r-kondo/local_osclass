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

    osc_show_widgets('footer');
?>
<?php osc_current_web_theme_path('templates/footer/'.osc_get_preference('footer-royal', 'royal').'.php') ; ?>
<a href="#0" class="cd-top">
    <?php _e("Top", 'royal');?> </a>
<script src="<?php echo osc_current_web_theme_js_url('top.js') ; ?>"></script>
<?php osc_run_hook('footer'); ?>