<?php
    /*
     *       Royal Responsive Osclass Themes
     *       
     *       Copyright (C) 2017 OSCLASS.me
     * 
     *       This is Royal Osclass Themes with Single License
     *  
     *       This program is a commercial software. Copying or distribution without a license is not allowed.
     *         
     *       If you need more licenses for this software. Please read more here <http://www.osclass.me/osclass-me-license/>.
     */
?>
<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/jquery.switchButton.css');?>">
<link rel="stylesheet" href="<?php echo osc_current_web_theme_url('admin/css/royal.css');?>">
<script src="<?php echo osc_current_web_theme_url('admin/js/jquery.switchButton.js');?>"></script>
<script>
  $(function() {
    $( "#tabs" ).tabs();
	$("input[type=checkbox]").switchButton();	
  });
 </script>
<style>.form-horizontal .form-label {
    width: inherit;
}
</style>
<div class="body">
    <div class="theme-royal">
        <div class="ari">
            <h2><?php _e('Royal', 'royal'); ?> <?php _e('Logo and Images', 'royal'); ?></h2> </div>
    </div>
    <div id="tabs">
        <ul>
            <li><a href="#logo"><i class="fa fa-gear"></i> <?php _e('Logo', 'royal'); ?></a> </li>
            <li><a href="#slider"><i class="fa fa-file-photo-o"></i> <?php _e('Slider', 'royal'); ?></a> </li>
            <li><a href="#brand"><i class="fa fa-flag"></i> <?php _e("Brand", 'royal'); ?></a>
         </li>
             <li><a href="#icon"><i class="fa fa-buysellads"></i> <?php _e("Icons", 'royal'); ?></a>
         </li>
        </ul>
        <!-- # logo starts -->
        <div id="logo">
            <?php include 'logo.php'; ?> </div>
        <!-- # slider starts -->
        <div id="slider">
            <?php include 'slider.php'; ?> </div>
       <div id="brand">
         <?php include 'brand.php'; ?> </div>
        <!-- # icon starts -->
      <div id="icon">
         <?php include 'icons.php'; ?> </div>
    </div>
</div>
<div class="power"><p><?php _e('Royal', 'royal'); ?> <?php _e('version', 'royal'); ?> <?php _e('1.6.5', 'royal'); ?> | <?php _e('by', 'royal'); ?> <a title="<?php echo osc_esc_html(__('Royal','royal')); ?> <?php echo osc_esc_html(__('Themes Powered by OsclassDotMe','royal')); ?>" target="_blank" href="http://market.osclass.org/user/profile/2614"><?php _e('Osclass.Me', 'royal'); ?></a></p></div>