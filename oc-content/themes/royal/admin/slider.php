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
?>

<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<?php
    if(Params::getParam("action_specific")!='') {
        switch(Params::getParam("action_specific")) {
            case('upload_slider'):
                $package = Params::getFiles("slider");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/slider.jpg" ) ){
                        osc_add_flash_ok_message(__("The image has been uploaded correctly","royal"), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                }
            break;
            case('upload_slider_1'):
                $package = Params::getFiles("slider_1");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/slider-1.jpg" ) ){
                        osc_add_flash_ok_message(__("The image has been uploaded correctly","royal"), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                }
            break;
                case('upload_slider_2'):
                $package = Params::getFiles("slider_2");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/slider-2.jpg" ) ){
                        osc_add_flash_ok_message(__("The image has been uploaded correctly","royal"), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                }
            break;
case('upload_cover_2'):
                $package = Params::getFiles("cover_2");

                if ($package['error'] == UPLOAD_ERR_OK) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/cover.jpg" ) ){
                        osc_add_flash_ok_message(__("The image has been uploaded correctly","royal"), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again","royal"), 'admin');
                }
            break;
          case('remove_slider1'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/slider.jpg" );
                    osc_add_flash_ok_message(__("The image has been removed","royal"), 'admin');
                }else{
                    osc_add_flash_error_message(__("Image not found","royal"), 'admin');
                }
            break;
            case('remove_slider2'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-1.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-1.jpg" );
                    osc_add_flash_ok_message(__("The image has been removed","royal"), 'admin');
                }else{
                    osc_add_flash_error_message(__("Image not found","royal"), 'admin');
                }

            break;
                case('remove_slider3'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-2.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-2.jpg" );
                    osc_add_flash_ok_message(__("The image has been removed","royal"), 'admin');
                }else{
                    osc_add_flash_error_message(__("Image not found","royal"), 'admin');
                }

            break;
case('remove_cover'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/cover.jpg" ) ) {
                    unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/cover.jpg" );
                    osc_add_flash_ok_message(__("The image has been removed","royal"), 'admin');
                }else{
                    osc_add_flash_error_message(__("Image not found","royal"), 'admin');
                }

            break;
            
        }
    }
?>
    <?php osc_show_flash_message('admin') ; ?>
<?php if(is_writable( WebThemes::newInstance()->getCurrentThemePath() ."images/") ) { ?>
<h1 class="render-title <?php echo (osc_get_preference('footer_link', 'royal_theme') ? '' : 'separate-top'); ?>"><?php _e('Cover settings', 'royal'); ?></h1>
<div id="settings_form">
    <div class="padi">
        <p class="avan">
            <?php _e('Cover Images', 'royal'); ?>. </p>
        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/cover.jpg" ) ) {?>
        <p>
            <?php _e('Preview', 'royal'); ?> </p> <img class="tomblok" src="<?php echo osc_current_web_theme_url('images/cover.jpg');?>" />
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="remove_cover" />
            <fieldset>
            <input id="button_remove" type="submit" class="btn btn-red" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" /> 
            </fieldset>
        </form>
        <p>
            <?php _e('Please reload or refresh your browser if images not change.', 'royal'); ?> </p>
        <button onclick='window.location.reload();'>
            <?php _e('Reload browser', 'royal'); ?> </button>
        <?php } else { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="upload_cover_2" />
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label">
                <label for="package"><?php _e('Cover image ', 'royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label></div>
                <div class="form-controls">
                <input type="file" name="cover_2" id="package" /> </div>
                <div class="uploader">
                <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" /></div>
                </div>
                </div>
            </fieldset>
        </form>
        <p>
            <?php _e('Has not uploaded any image', 'royal');?> </p>
        <?php } ?> </div>
</div>
<h1 class="render-title <?php echo (osc_get_preference('footer_link', 'royal_theme') ? '' : 'separate-top'); ?>"><?php _e('Slider Images', 'royal'); ?></h1>
<div id="settings_form">
    <div class="padi">
        <p class="avan">
            <?php _e('Slider Images', 'royal'); ?>. </p>
        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider.jpg" ) ) {?>
        <p>
            <?php _e('Preview', 'royal'); ?> </p> <img class="tomblok" src="<?php echo osc_current_web_theme_url('images/slider.jpg');?>" />
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="remove_slider1" />
            <fieldset>
            <input id="button_remove" class="btn btn-red" type="submit" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" /> 
            </fieldset>
        </form>
        <p>
            <?php _e('Please reload or refresh your browser if images not change.', 'royal'); ?> </p>
        <button onclick='window.location.reload();'>
            <?php _e('Reload browser', 'royal'); ?> </button>
        <?php } else { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="upload_slider" />
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label">
                        <label for="package"><?php _e('Slider Images', 'royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label></div>
                        <div class="form-controls">
                        <input type="file" name="slider" id="package" /> </div>
                        <div class="uploader">
                        <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" /> </div>
                    </div>
                </div>
            </fieldset>
         </form>
        <p>
            <?php _e('Has not uploaded any slider image', 'royal');?> </p>
        <?php } ?> </div>
</div>
<div id="settings_form">
    <div class="padi">
        <p class="avan">
            <?php _e('Slider Images', 'royal'); ?>. </p>
        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-1.jpg" ) ) {?>
        <p>
            <?php _e('Preview', 'royal'); ?> </p> <img class="tomblok" src="<?php echo osc_current_web_theme_url('images/slider-1.jpg');?>" />
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="remove_slider2" />
            <fieldset>
            <input id="button_remove" class="btn btn-red" type="submit" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" /> 
            </fieldset>
        </form>
        <p>
            <?php _e('Please reload or refresh your browser if images not change.', 'royal'); ?> </p>
        <button onclick='window.location.reload();'>
            <?php _e('Reload browser', 'royal'); ?> </button>
        <?php } else { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="upload_slider_1" />
             <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label">
                        <label for="package"><?php _e('Slider Images', 'royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label></div>
                        <div class="form-controls">
                        <input type="file" name="slider_1" id="package" /> </div>
                        <div class="uploader">
                        <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" /></div>
                    </div>
                </div>
            </fieldset> 
        </form>
        <p>
            <?php _e('Has not uploaded any image', 'royal');?> </p>
        <?php } ?> </div>
</div>
<div id="settings_form">
    <div class="padi">
        <p class="avan">
            <?php _e('Slider Images', 'royal'); ?>. </p>
        <?php if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/slider-2.jpg" ) ) {?>
        <p>
            <?php _e('Preview', 'royal'); ?> </p> <img class="tomblok" src="<?php echo osc_current_web_theme_url('images/slider-2.jpg');?>" />
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="remove_slider3" />
            <fieldset>
            <input id="button_remove" type="submit" class="btn btn-red" value="<?php echo osc_esc_html(__('Remove','royal')); ?>" /> 
            </fieldset>
        </form>
        <p>
            <?php _e('Please reload or refresh your browser if images not change.', 'royal'); ?> </p>
        <button onclick='window.location.reload();'>
            <?php _e('Reload browser', 'royal'); ?> </button>
        <?php } else { ?>
        <form action="<?php echo osc_admin_render_theme_url('oc-content/themes/royal/admin/admin.php#slider');?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action_specific" value="upload_slider_2" />
            <fieldset>
                <div class="form-horizontal">
                    <div class="form-row">
                        <div class="form-label">
                        <label for="package"><?php _e('Slider Images', 'royal'); ?> <?php _e("png,gif,jpg", 'royal'); ?></label></div>
                        <div class="form-controls">
                        <input type="file" name="slider_2" id="package" /> </div>
                        <div class="uploader">
                        <input id="button_save" class="btn btn-submit" type="submit" value="<?php echo osc_esc_html(__('Upload','royal')); ?>" /> </div>
                    </div>
                </div>
            </fieldset>
        </form>
        <p>
            <?php _e('Has not uploaded any image', 'royal');?> </p>
        <?php } ?> </div>
</div>
<div style="clear: both;"></div>
<?php } else { ?>
               <div id="flash_message">
                <p>
                    <?php
                        $msg  = sprintf(__('The images folder %s is not writable on your server','royal'), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                        $msg .= __('Osclass can\'t upload slider image from the administration panel','royal') . '. ';
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