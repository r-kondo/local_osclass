<?php
	// meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('login');
	osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
?>
<div class="loginbox">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        	<div class="login-register">
            <h2><?php _e('Access to your account', 'flatter'); ?></h2>
            <ul id="error_list"></ul>
            <form action="<?php echo osc_base_url(true); ?>" name="login" id="login" method="post" >
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login_post" />
                    <div class="form-group">
                    	<input type="text" name="email" class="form-control" id="email" placeholder="<?php _e('E-mail', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="password" name="password" class="form-control" id="password" placeholder="<?php _e('Password', 'flatter'); ?>">
                  	</div>
                    <div class="clearfix">
                    	<button type="submit" class="btn btn-clr"><?php _e("Log in", 'flatter');?></button>
                        <div class="checkbox pull-right">
                            <?php UserForm::rememberme_login_checkbox();?> <label for="remember"><?php _e('Remember me', 'flatter'); ?></label>
                        </div>
                    </div>
                    <?php if (function_exists("fbc_button")) { ?>
						<div class="divider">
                            <hr />
                            <span><?php _e("or", 'flatter'); ?></span>
                        </div>
                        <?php fbc_button(); ?>
                    <?php } ?>
                    <div class="panel-footer"><a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'flatter'); ?></a>
                    <a class="pull-right" href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'flatter'); ?></a></div>
                </form>
    		</div>
            </div>
        </div>
    </div>
</div>
<?php LoginValidation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>