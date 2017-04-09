<?php if ( (!defined('ABS_PATH')) ) exit('ABS_PATH is not loaded. Direct access is not allowed.'); ?>
<?php if ( !OC_ADMIN ) exit('User access is not allowed.'); ?>

<form action="<?php echo osc_admin_render_theme_url('oc-content/themes/'.OSCLASSWIZARDS_THEME_FOLDER.'/admin/settings.php'); ?>" method="post" class="nocsrf">
  <input type="hidden" name="action_specific" value="banner" />
  <h2 class="render-title">
    <?php _e('Banner Settings', OSCLASSWIZARDS_THEME_FOLDER); ?>
  </h2>
  <fieldset>
    <div class="form-horizontal">
      <div class="form-row">
        <div class="form-label">
          <?php _e('Title', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </div>
        <div class="form-controls">
          <textarea style="height: 75px; width: 500px;"name="banner-title"><?php echo osc_esc_html( osc_get_preference('banner-title', 'osclasswizards_theme') ); ?></textarea>
        </div>
      </div>
      <div class="form-actions">
        <input type="submit" value="<?php echo osc_esc_html(__('Save changes', OSCLASSWIZARDS_THEME_FOLDER)); ?>" class="btn btn-submit">
      </div>
    </div>
  </fieldset>
</form>
