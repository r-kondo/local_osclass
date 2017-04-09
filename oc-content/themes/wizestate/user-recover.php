<?php
    // meta tag robots
    osc_add_hook('header','osclasswizards_nofollow_construct');

    osclasswizards_add_body_class('recover');
    osc_current_web_theme_path('header.php');
?>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="wraps">
    <div class="title">
      <h1>
        <?php _e('Recover your password', OSCLASSWIZARDS_THEME_FOLDER); ?>
      </h1>
    </div>
    <div class="resp-wrapper">
      <form action="<?php echo osc_base_url(true); ?>" method="post" >
        <input type="hidden" name="page" value="login" />
        <input type="hidden" name="action" value="recover_post" />
        <div class="form-group">
          <label class="control-label" for="email">
            <?php _e('E-mail', OSCLASSWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::email_text(); ?>
            
          </div>
		  <div class="recap">
		  <?php osc_show_recaptcha('recover_password'); ?>
		  </div>
        </div>
        <div class="form-group">
          <div class="controls">
            <button type="submit" class="btn btn-success">
            <?php _e("Send me a new password", OSCLASSWIZARDS_THEME_FOLDER);?>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
