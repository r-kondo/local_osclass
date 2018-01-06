<?php
    osc_add_hook('header','flatter_nofollow_construct');
	
	osc_enqueue_script('tabber');
	osc_enqueue_style('tabs', osc_current_web_theme_url('css/tabs.css'));
    flatter_add_body_class('userpage user-profile');
    osc_add_hook('before-main','sidebar');
	osc_enqueue_script('jquery-validate');
	
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
                	<h2><?php _e('Change e-mail', 'flatter'); ?></h2>
                </div>
                <div id="content">
                	<!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                      <li><a href="<?php echo osc_user_profile_url(); ?>" title="<?php _e('Account', 'flatter'); ?>"><?php _e('Account', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_username_url(); ?>" title="<?php _e('Username', 'flatter'); ?>"><?php _e('Username', 'flatter'); ?></a></li>
                      <li class="active clr"><a href="<?php echo osc_change_user_email_url(); ?>" title="><?php _e('Email', 'flatter'); ?>"><?php _e('Email', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_password_url(); ?>" title="<?php _e('Password', 'flatter'); ?>"><?php _e('Password', 'flatter'); ?></a></li>
                      <li class="delete whover"><a onclick="javascript:return confirm('<?php echo osc_esc_js(__('Are you sure you want to continue?', 'flatter')); ?>')" href="<?php echo osc_base_url().'?page=user&action=delete&id='.osc_logged_user_id().'&secret='.osc_user_field("s_secret"); ?>" title="<?php _e('Delete account', 'flatter'); ?>"><?php _e('Delete account', 'flatter'); ?></a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="editemail">
                        <div class="change-email">
                            <form action="<?php echo osc_base_url(true); ?>" class="form-horizontal" name="change-email" id="change-email" method="post">
                                <input type="hidden" name="page" value="user" />
                                <input type="hidden" name="action" value="change_email_post" />
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email"><?php _e('Current e-mail', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" disabled="disabled" class="form-control" value="<?php echo osc_logged_user_email(); ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="new_email"><?php _e('New e-mail', 'flatter'); ?> <span class="required">*</span></label>
                                    <div class="col-md-6">
                                        <input type="text" name="new_email" id="new_email" class="form-control" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-6">
                                        <button type="submit" class="btn btn-clr"><?php _e("Update", 'flatter');?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <script type="text/javascript">
                            $(document).ready(function() {
                                $('form[name=change-email]').validate({
                                    rules: {
                                        new_email: {
                                            required: true,
                                            email: true
                                        }
                                    },
                                    messages: {
                                        new_email: {
                                            required: '<?php echo osc_esc_js(__("Email: this field is required", "flatter")); ?>.',
                                            email: '<?php echo osc_esc_js(__("Invalid email address", "flatter")); ?>.'
                                        }
                                    },
                                    //errorLabelContainer: "#error_list",
                                    //wrapper: "li",
                                    invalidHandler: function(form, validator) {
                                        $('html,body').animate({ scrollTop: $('h2').offset().top }, { duration: 250, easing: 'swing'});
                                    },
                                    submitHandler: function(form){
                                        $('button[type=submit], input[type=submit]').attr('disabled', 'disabled');
                                        form.submit();
                                    }
                                });
                            });
                        </script>
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