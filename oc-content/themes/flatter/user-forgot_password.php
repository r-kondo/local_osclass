<?php
    // meta tag robots
    osc_add_hook('header','flatter_nofollow_construct');

    flatter_add_body_class('forgot');
	osc_enqueue_script('jquery-validate');
    osc_current_web_theme_path('header.php');
?>
<div class="registerbox">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
        	<div class="login-register">
            <h2><?php _e('Recover your password', 'flatter'); ?></h2>
            <ul id="error_list"></ul>
            <form action="<?php echo osc_base_url(true); ?>" method="post" >
               <input type="hidden" name="page" value="login" />
            	<input type="hidden" name="action" value="forgot_post" />
            	<input type="hidden" name="userId" value="<?php echo osc_esc_html(Params::getParam('userId')); ?>" />
            	<input type="hidden" name="code" value="<?php echo osc_esc_html(Params::getParam('code')); ?>" />
                <div class="form-group">
                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="<?php _e('New password', 'flatter'); ?>" />
                 </div>
                 <div class="form-group">
                    <input type="password" name="new_password2" class="form-control" id="new_password2" placeholder="<?php _e('Repeat new password', 'flatter'); ?>" />
                 </div>
            
                <div class="clearfix">
                    <button type="submit" class="btn btn-clr rbtn"><?php _e("Change password", 'flatter');?></button>
                </div>
            </form>
            </div>
            </div>
		</div>
    </div>
</div>            

<?php osc_current_web_theme_path('footer.php') ; ?>