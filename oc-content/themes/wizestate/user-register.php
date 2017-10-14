<?php
    // meta tag robots
    osc_add_hook('header','osclasswizards_nofollow_construct');

    osclasswizards_add_body_class('register');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php') ;
?>

<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <div class="wraps">
    <div class="title">
      <h1>
        <?php _e('Register an account for free', OSCLASSWIZARDS_THEME_FOLDER); ?>
      </h1>
    </div>
      <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="page" value="register" />
        <input type="hidden" name="action" value="register_post" />
        <ul id="error_list">
        </ul>
        <div class="form-group">
          <label class="control-label" for="name">
            <?php _e('Name', OSCLASSWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::name_text(); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="email">
            <?php _e('E-mail', OSCLASSWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::email_text(); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="password">
            <?php _e('Password', OSCLASSWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::password_text(); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label" for="password-2">
            <?php _e('Repeat password', OSCLASSWIZARDS_THEME_FOLDER); ?> <sup>*</sup>
          </label>
          <div class="controls">
            <?php UserForm::check_password_text(); ?>
            <p id="password-error" style="display:none;">
              <?php _e("Passwords don't match", OSCLASSWIZARDS_THEME_FOLDER); ?>
            </p>
          </div>
        </div>
        <?php osc_run_hook('user_register_form'); ?>
        <div class="form-group">
          <div class="recap">
            <?php osc_show_recaptcha('register'); ?>
          </div>
        </div>
        <div class="form-group">
          <div class="controls">
            <button type="submit" class="btn btn-success">
            <?php _e("Create An Account", OSCLASSWIZARDS_THEME_FOLDER); ?>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
<?php UserForm::js_validation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>
