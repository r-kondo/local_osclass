<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('register');
    osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php') ;
?>
<div class="registerbox">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        	<div class="login-register">
            <h2><?php _e('Register an account for free', 'flatter'); ?></h2>
            <ul id="error_list"></ul>
            <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="register" />
                <input type="hidden" name="action" value="register_post" />
                	<div class="form-group">
                    	<input type="text" name="s_name" class="form-control" id="s_name" placeholder="<?php _e('Name', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="text" name="s_email" class="form-control" id="s_email" placeholder="<?php _e('E-mail', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="password" name="s_password" class="form-control" id="s_password" placeholder="<?php _e('Password', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<input type="password" name="s_password2" class="form-control" id="s_password2" placeholder="<?php _e('Repeat password', 'flatter'); ?>">
                  	</div>
                    <div class="form-group">
                    	<?php echo responsive_recaptcha(); ?>
                    	<?php osc_show_recaptcha('register'); ?>
                    </div>
                    <div class="clearfix">
                    	<button type="submit" class="btn btn-clr"><?php _e("Create", 'flatter'); ?></button>
                        <div class="col-md-9 col-sm-8 col-xs-8 pull-right terms">
                            <small><?php _e("By register, you agree to our", 'flatter'); ?> <a class="clr" href="<?php echo osc_get_preference("terms_link", "flatter_theme"); ?>"><?php _e("terms of use", 'flatter'); ?></a> <?php _e("and", 'flatter'); ?> <a class="clr" href="<?php echo osc_get_preference("privacy_link", "flatter_theme"); ?>"><?php _e("privacy policy", 'flatter'); ?></a>.</small>
                        </div>
                    </div>
                    <?php if (function_exists("fbc_button2")) { ?>
						<div class="divider">
                            <hr />
                            <span><?php _e("or", 'flatter'); ?></span>
                        </div>
                        <?php fbc_button2(); ?>
                        
                    <?php } ?>
                    <div class="panel-footer"><?php _e("Already have an account?", 'flatter'); ?> <a href="<?php echo osc_user_login_url(); ?>"><strong><?php _e("Login", 'flatter'); ?></strong></a>
                    </div>
                </form>
    		</div>
            </div>
        </div>
    </div>
</div>

<?php RegisterValidation(); ?>
<?php osc_current_web_theme_path('footer.php') ; ?>