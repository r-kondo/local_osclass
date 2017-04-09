<?php
    /*
     *       Royal Responsive Osclass Themes
     *       
     *       Copyright (C) 2016 OSCLASS.me
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
<?php
    if(Params::getParam("action_specific")!='') {
        switch(Params::getParam("action_specific")) {
             
            case('upload_logo1'):
                $package = Params::getFiles("logo");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ){
                        osc_add_flash_ok_message(__('The image has been uploaded correctly', 'royal'), 'admin');
                    } else {
                        osc_add_flash_error_message(__('An error has occurred, please try again','royal'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__('An error has occurred, please try again','royal'), 'admin');
                }
            break;
            case('upload_logo_footer'):
                $package = Params::getFiles("logo");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/favicon.jpg" ) ){
                        osc_add_flash_ok_message(__('The image has been uploaded correctly','royal'), 'admin');
                    } else {
                        osc_add_flash_error_message(__('An error has occurred, please try again','royal'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__('An error has occurred, please try again','royal'), 'admin');
                }
            break;
            case('upload_logo9'):
                $package = Params::getFiles("logoavatar");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/no_photo.gif" ) ){
                        osc_add_flash_ok_message(__("The image has been uploaded correctly","royal"), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                }
            break;
            case('remove_logo'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" );
                    osc_add_flash_ok_message(__('The image has been removed','royal'), 'admin');
                }else{
                    osc_add_flash_error_message(__('Image not found','royal'), 'admin');
                }
            break;
            case('footer_remove'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/favicon.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/favicon.jpg" );
                    osc_add_flash_ok_message(__('The image has been removed','royal'), 'admin');
                }else{
                    osc_add_flash_error_message(__('Image not found','royal'), 'admin');
                }

            break;
            case('remove_logoavatar'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/no_photo.gif" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/no_photo.gif" );
                    osc_add_flash_ok_message(__("The image has been removed","royal"), 'admin');
                }else{
                    osc_add_flash_error_message(__("Image not found","royal"), 'admin');
                }
            break;
        }
    }
?>
<?php osc_show_flash_message('admin') ; ?>
<?php if(is_writable( WebThemes::newInstance()->getCurrentThemePath() ."images/") )  { ?>
<h2 class="render-title"><?php _e('Logo and Images', 'royal'); ?></h2>
   <div id="settings_form">
    <div class="padi">
        <p class="avan"><?php _e('Logo Images','royal'); ?></p>
                 
<?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {?>
                <p>
                    <?php _e('Preview','royal'); ?><p>
                    <img border="0" alt="<?php echo osc_page_title(); ?>" src="<?php echo osc_current_web_theme_url('images/logo.jpg');?>"/>
                    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php');?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action_specific" value="remove_logo" />
                        <fieldset>
                        <input id="button_remove" class="btn btn-red" type="submit" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" />
                        </fieldset>
                    </form>
                <p><?php _e('Please reload or refresh your browser if images not change.','royal'); ?></p><button onclick='window.location.reload();'><?php _e('Reload browser','royal'); ?></button>
                <?php } else { ?>
             <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action_specific" value="upload_logo1" />
                <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label">
                        <label for="package"><?php _e('Logo Images','royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label></div>
                        <div class="form-controls">
                        <input type="file" name="logo" id="package" /></div>
                <div class="uploader">
                <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" />
                </div>
                </div>
                </div>
            </fieldset>
            </form>
                    <p><?php _e('Has not uploaded any image','royal');?></p>
                <?php } ?>
            </div>
        </div>
    

   <div id="settings_form">
    <div class="padi">
        <p class="avan"><?php _e('Favicon Images','royal'); ?></p>
<?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/favicon.jpg" ) ) {?>
                <p>
                   <?php _e('Preview','royal'); ?></p>
                    <img border="0" alt="<?php echo osc_page_title(); ?>" src="<?php echo osc_current_web_theme_url('images/favicon.jpg');?>"/>
                    <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php');?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="action_specific" value="footer_remove" />
                         <fieldset>
                         <input id="button_remove" class="btn btn-red" type="submit" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" />
                         </fieldset>
                    </form>
                <p><?php _e('Please reload or refresh your browser if images not change.','royal'); ?></p><button onclick='window.location.reload();'><?php _e('Reload browser','royal'); ?></button></p>                          
                <?php } else { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php');?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action_specific" value="upload_logo_footer" />
                 <fieldset>
                 <div class="form-horizontal">
                    <div class="form-row">
                    <div class="form-label"><label for="package"><?php _e('Favicon Images','royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label></div>
                    <div class="form-controls">
                    <input type="file" name="logo" id="package" /></div>
                <div class="uploader">
                <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" /></div>
                 </div>
                </div>
            </fieldset>
            </form>
                    <p><?php _e('Has not uploaded any image','royal');?></p>
                <?php } ?>
            </div>
        </div>
   
<div id="settings_form">
    <div class="padi">
        <p class="avan">
            <?php _e("No Ads Thumbinail images", 'royal'); ?> </p>
        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/no_photo.gif" ) ) {?>
        <p>
            <?php _e("Preview", 'royal'); ?> </p> <img border="0" alt="<?php echo osc_page_title(); ?>" src="<?php echo osc_current_web_theme_url('images/no_photo.gif');?>" />
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="remove_logoavatar" />
            <fieldset>
                <input id="button_remove" class="btn btn-red" type="submit" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" /> </fieldset>
        </form>
        <p>
            <?php _e("Please reload or refresh your browser if images not change.", 'royal'); ?> </p>
        <button onclick='window.location.reload();'>
            <?php _e("Reload browser", 'royal'); ?> </button>
        <?php } else { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="upload_logo9" />
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label">
                            <label for="package"><?php _e("No Ads Images", 'royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label>
                        </div>
                        <div class="form-controls">
                            <input type="file" name="logoavatar" id="package" /> 
                        </div>
                        <div class="uploader">
                            <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" /> 
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
        <p>
            <?php _e("Has not uploaded any image", 'royal');?> </p>
        <?php } ?> </div>
</div>
            <div style="clear: both;"></div>

            <?php } else { ?>

            <div id="flash_message">
                <p>
                    <?php
                        $msg  = sprintf(__('The images folder %s is not writable on your server','royal'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                        $msg .= __('Osclass can\'t upload logo image from the administration panel','royal') . '. ';
                        $msg .= __('Please make the mentioned images folder writable','royal') . '.';
                        echo $msg;
                    ?>
                </p>
                <p>
                    <?php _e('To make a directory writable under UNIX execute this command from the shell','royal'); ?>:
                </p>
                <p class="deanda">
                    chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/" ; ?>
                </p>
            </div>

            <?php } ?>