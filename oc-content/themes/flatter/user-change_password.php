<?php
    osc_add_hook('header','flatter_nofollow_construct');
	
	osc_enqueue_script('tabber');
	osc_enqueue_style('tabs', osc_current_web_theme_url('css/tabs.css'));
    flatter_add_body_class('userpage user-profile');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
 	$locales   = __get('locales');
    $osc_user = osc_user();
?>

<?php osc_current_web_theme_path('header.php') ; ?>
<div id="columns">
	<div class="container">
    	<div class="row">
			<div class="col-sm-3 hidden-xs">
            	<?php osc_run_hook('before-main'); ?>
            </div>
            <div class="col-sm-9">
            	<div class="page-title">
                	<h2><?php _e('Change password', 'flatter'); ?></h2>
                </div>
                <div id="content">
                	<!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                      <li><a href="<?php echo osc_user_profile_url(); ?>" title="<?php _e('Account', 'flatter'); ?>"><?php _e('Account', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_username_url(); ?>" title="<?php _e('Username', 'flatter'); ?>"><?php _e('Username', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_email_url(); ?>" title="><?php _e('Email', 'flatter'); ?>"><?php _e('Email', 'flatter'); ?></a></li>
                      <li class="active clr"><a href="<?php echo osc_change_user_password_url(); ?>" title="<?php _e('Password', 'flatter'); ?>"><?php _e('Password', 'flatter'); ?></a></li>
                      <li class="delete whover"><a onclick="javascript:return confirm('<?php echo osc_esc_js(__('Are you sure you want to continue?', 'flatter')); ?>')" href="<?php echo osc_base_url().'?page=user&action=delete&id='.osc_logged_user_id().'&secret='.osc_user_field("s_secret"); ?>" title="<?php _e('Delete account', 'flatter'); ?>"><?php _e('Delete account', 'flatter'); ?></a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                      
                      
                      <div class="tab-pane active" id="editpassword">
                        <div class="form-container form-horizontal">
                            <div class="resp-wrapper">
                                <ul id="error_list"></ul>
                                <form action="<?php echo osc_base_url(true); ?>" method="post">
                                    <input type="hidden" name="page" value="user" />
                                    <input type="hidden" name="action" value="change_password_post" />
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="password"><?php _e('Current password', 'flatter'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="password" id="password" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="new_password"><?php _e('New password', 'flatter'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="new_password" id="new_password" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="new_password2"><?php _e('Repeat new password', 'flatter'); ?> <span class="required">*</span></label>
                                        <div class="col-md-6">
                                            <input type="password" name="new_password2" id="new_password2" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-3 col-md-6">
                                            <button type="submit" class="btn btn-clr"><?php _e("Update", 'flatter');?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
</div>
                      </div>
                      
                    </div>
                	
                </div>
            </div>
            
            <div class="col-sm-3 visible-xs" style="margin-top:15px;">
            	<?php osc_run_hook('before-main'); ?>
            </div>
		</div>
    </div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>