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
    $locales   = __get('locales');
    $osc_user = osc_user();
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_styles_url('jquery-ui/jquery-ui-1.8.20.custom.css'));
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
    </head>
    <body>
    <?php osc_current_web_theme_path('header.php'); ?>
    <div class="container">
        <div class="veraari">
            <div class="col-md-3">
                <?php echo osc_private_user_menu( get_user_menu() ); ?>
                <center class="ads-right"><?php echo osc_get_preference('sidebar-160x600', 'royal'); ?></center>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default row">
                    <div class="panel-heading">
                        <h1><?php _e('Update your profile', 'royal'); ?></h1> </div>
                    <div class="panel-body">
                        <?php UserForm::location_javascript(); ?>
                        <script type="text/javascript">
                    $(document).ready(function(){
                        $("#delete_account").click(function(){
                            $("#dialog-delete-account").dialog('open');
						});
						
                        $("#dialog-delete-account").dialog({
                            autoOpen: false,
                            modal: true,
                            buttons: {
                                "<?php echo osc_esc_js(__('Delete', 'royal')); ?>": function() {
                                    window.location = '<?php echo osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret']; ?>';
								},
                                "<?php echo osc_esc_js(__('Cancel', 'royal')); ?>": function() {
                                    $( this ).dialog( "close" );
								}
							}
						});
					});
				</script>
                        <form action="<?php echo osc_base_url(true); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="action" value="profile_post" />
                            <fieldset>
                                <?php osc_current_web_theme_path('common/avatar1.php') ; ?>
                                <br>
                                <div class="form-group">
                                    <label class="control-label" for="name">
                                        <?php _e("Name", 'royal'); ?> </label>
                                    <?php UserForm::name_text(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">
                                        <?php _e("Username", 'royal'); ?> </label> <span class="update">
                                <?php echo osc_user_username(); ?><br />
                                <?php if(osc_user_username()==osc_user_id()) { ?>
                                    <a href="<?php echo osc_change_user_username_url(); ?>"><?php _e("Modify username", 'royal'); ?></a>
                                <?php }; ?>
                            </span> </div>
                                <div class="form-group">
                                    <label class="control-label" for="email">
                                        <?php _e("E-mail", 'royal'); ?> </label> <span class="update">
                                <?php echo osc_user_email(); ?><br />
                                <a href="<?php echo osc_change_user_email_url(); ?>"><?php _e("Modify e-mail", 'royal'); ?></a> <a href="<?php echo osc_change_user_password_url(); ?>" ><?php _e("Modify password", 'royal'); ?></a>
                            </span> </div>
                                <div class="form-group">
                                    <label class="control-label" for="user_type">
                                        <?php _e("User type", 'royal'); ?> </label>
                                    <?php UserForm::is_company_select(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="phoneLand">
                                        <?php _e("Phone", 'royal'); ?> </label>
                                    <?php UserForm::phone_land_text(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label for="phoneMobile">
                                        <?php _e("Cell phone", 'royal'); ?> </label>
                                    <?php UserForm::mobile_text(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="country">
                                        <?php _e("Country", 'royal'); ?> *</label>
                                    <?php UserForm::country_select(osc_get_countries(), osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="region">
                                        <?php _e("Region", 'royal'); ?> *</label>
                                    <?php UserForm::region_select(osc_get_regions(), osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="city">
                                        <?php _e("City", 'royal'); ?> *</label>
                                    <?php UserForm::city_select(osc_get_cities(), osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="city_area">
                                        <?php _e("City area", 'royal'); ?> </label>
                                    <?php UserForm::city_area_text(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="address">
                                        <?php _e("Address", 'royal'); ?> </label>
                                    <?php UserForm::address_text(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="webSite">
                                        <?php _e("Website", 'royal'); ?> </label>
                                    <?php UserForm::website_text(osc_user()); ?> </div>
                                <div class="form-group">
                                    <label class="control-label" for="s_info">
                                        <?php _e('Description', 'royal'); ?> </label>
                                    <div class="controls">
                                        <?php UserForm::info_textarea('s_info', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info']); ?></div>
                                </div>
                                <?php osc_run_hook('user_profile_form', osc_user()); ?>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg" type="submit"><span class="fa fa-check-square" aria-hidden="true"></span>
                                        <?php _e("Update", 'royal'); ?> </button>
                                    <button class="btn btn-danger btn-lg" id="delete_account" type="button"><span class="fa fa-warning" aria-hidden="true"></span>
                                        <?php _e("Delete my account", 'royal'); ?> </button>
                                </div>
                                <?php osc_run_hook('user_form'); ?> </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="dialog-delete-account" title="<?php echo osc_esc_html(__('Delete account','royal')); ?>" class="has-form-actions">
        <div class="form-horizontal">
            <div class="form-row">
                <p>
                    <?php _e("All your listings and alerts will be removed, this action can not be undone.", 'royal');?> </p>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>
</html>