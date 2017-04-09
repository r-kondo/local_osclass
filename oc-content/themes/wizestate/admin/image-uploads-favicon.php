<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>
<style type="text/css" media="screen">
.command {
	background-color: white;
	color: #2E2E2E;
	border: 1px solid black;
	padding: 8px;
}
.theme-files {
	min-width: 500px;
}
</style>
<h2 class="render-title">
  <?php _e('Favicon Image', OSCLASSWIZARDS_THEME_FOLDER); ?>
</h2>
<p>
  <?php _e('The preferred size of the favicon is 16x16 pixels.', OSCLASSWIZARDS_THEME_FOLDER); ?>
</p>
<?php
    $logo_prefence = osc_get_preference('favicon', 'osclasswizards_theme');
?>
<?php if( is_writable( osc_uploads_path()) ) { ?>
<?php if($logo_prefence) { ?>
<h3 class="render-title">
  <?php _e('Preview', OSCLASSWIZARDS_THEME_FOLDER) ?>
</h3>
<img style="max-width:100%;" border="0" alt="<?php echo osc_esc_html( osc_page_title() ); ?>" src="<?php echo osclasswizards_favicon_url().'?'.filemtime(osc_uploads_path() . osc_get_preference('favicon','osclasswizards_theme'));?>" />
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php');?>" method="post" enctype="multipart/form-data" class="nocsrf">
  <input type="hidden" name="action_specific" value="remove_favicon" />
  <fieldset>
    <div class="form-horizontal">
      <div class="form-actions">
        <input id="button_remove" type="submit" value="<?php echo osc_esc_html(__('Remove image',OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-red">
      </div>
    </div>
  </fieldset>
</form>
<?php } else { ?>
<div class="flashmessage flashmessage-warning flashmessage-inline" style="display: block;">
  <p>
    <?php _e('No image has been uploaded yet', OSCLASSWIZARDS_THEME_FOLDER); ?>
  </p>
</div>
<?php } ?>
<h2 class="render-title separate-top">
  <?php _e('Upload image', OSCLASSWIZARDS_THEME_FOLDER) ?>
</h2>
<?php if( $logo_prefence ) { ?>
<div class="flashmessage flashmessage-inline flashmessage-warning">
  <p>
    <?php _e('<strong>Note:</strong> Uploading another image will overwrite the current image.', OSCLASSWIZARDS_THEME_FOLDER); ?>
  </p>
</div>
<?php } ?>
<br/>
<br/>
<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" enctype="multipart/form-data" class="nocsrf">
  <input type="hidden" name="action_specific" value="upload_favicon" />
  <fieldset>
    <div class="form-horizontal upload_image_wizard">
      <div class="form-row">
        <div class="form-label">
          <?php _e('Accepted image (png,gif,jpg)',OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
		&nbsp;
       <div class="form-controls btn btn-success fileinput-button">
		 <i class="glyphicon glyphicon-plus"></i>
		 <?php _e('Add favicon',OSCLASSWIZARDS_THEME_FOLDER);?>
          <input type="file" name="favicon" id="package" />
        </div>
      </div>
	  <div class="form-row">
      <div class="form-actions">
        <input id="button_save" type="submit" value="<?php echo osc_esc_html(__('Upload',OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
      </div>
      </div>
    </div>
  </fieldset>
</form>
<?php } else { ?>
<div class="flashmessage flashmessage-error" style="display: block;">
  <p>
    <?php
                $msg  = sprintf(__('The images folder <strong>%s</strong> is not writable on your server', OSCLASSWIZARDS_THEME_FOLDER), WebThemes::newInstance()->getCurrentThemePath() ."images/" ) .", ";
                $msg .= __("Osclass can't upload the image from the administration panel.", OSCLASSWIZARDS_THEME_FOLDER) . ' ';
                $msg .= __('Please make the aforementioned image folder writable.', OSCLASSWIZARDS_THEME_FOLDER) . ' ';
                echo $msg;
            ?>
  </p>
  <p>
    <?php _e('To make a directory writable under UNIX execute this command from the shell:',OSCLASSWIZARDS_THEME_FOLDER); ?>
  </p>
  <p class="command"> chmod a+w <?php echo WebThemes::newInstance()->getCurrentThemePath() ."images/"; ?> </p>
</div>
<?php } ?>
