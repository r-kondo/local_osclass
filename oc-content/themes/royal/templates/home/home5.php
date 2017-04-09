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
<style>
.horbar-bevel, .ad-footers{display:none;
}
section#footerme {
    margin-top: 0px;
}
</style>
<?php if(osc_get_preference('phone-us', 'royal')=="yes" ) { ?>
<div class="<?php echo osc_get_preference('ari-us', 'royal'); ?>">
<?php echo osc_get_preference('memo-us', 'royal'); ?>
</div>
<?php } ?>
<?php osc_current_web_theme_path(''.osc_get_preference('katalog-royal', 'royal').'.php') ; ?>