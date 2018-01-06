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
                	<h2><?php _e('My account', 'flatter'); ?></h2>
                </div>
                <div id="content">
                	<!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                      <li class="active clr"><a href="<?php echo osc_user_profile_url(); ?>" title="<?php _e('Account', 'flatter'); ?>"><?php _e('Account', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_username_url(); ?>" title="<?php _e('Username', 'flatter'); ?>"><?php _e('Username', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_email_url(); ?>" title="><?php _e('Email', 'flatter'); ?>"><?php _e('Email', 'flatter'); ?></a></li>
                      <li><a href="<?php echo osc_change_user_password_url(); ?>" title="<?php _e('Password', 'flatter'); ?>"><?php _e('Password', 'flatter'); ?></a></li>
                      <li class="delete whover"><a onclick="javascript:return confirm('<?php echo osc_esc_js(__('Are you sure you want to continue?', 'flatter')); ?>')" href="<?php echo osc_base_url().'?page=user&action=delete&id='.osc_logged_user_id().'&secret='.osc_user_field("s_secret"); ?>" title="<?php _e('Delete account', 'flatter'); ?>"><?php _e('Delete account', 'flatter'); ?></a></li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="editprofile">
						<?php UserForm::location_javascript(); ?>
                        <div class="edit-profile">
                            <ul id="error_list"></ul>
                            <form action="<?php echo osc_base_url(true); ?>" class="form-horizontal" method="post">
                                <input type="hidden" name="page" value="user" />
                                <input type="hidden" name="action" value="profile_post" />
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="name"><?php _e('Name', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" name="s_name" id="s_name" value="<?php echo osc_user_name(); ?>" class="form-control"><?php //UserForm::name_text(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="user_type"><?php _e('User type', 'flatter'); ?></label>
                                    <div class="col-md-4">
                                        <?php UserForm::is_company_select(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="phoneMobile"><?php _e('Cell phone', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_phone_mobile(); ?>" name="s_phone_mobile" id="s_phone_mobile" class="form-control"><?php //UserForm::mobile_text(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="phoneLand"><?php _e('Phone', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_phone_land(); ?>" name="s_phone_land" id="s_phone_land" class="form-control"><?php //UserForm::phone_land_text(osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="country"><?php _e('Country', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::country_select(osc_get_countries(), osc_user()); ?>
                                    </div>
                                </div>
                                <?php if( osc_get_preference('location_input', 'flatter_theme') == '1') { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="region"><?php _e('Region', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::region_select(osc_get_regions(), osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="city"><?php _e('City', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::city_select(osc_get_cities(), osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="city_area"><?php _e('City area', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_city_area();?>" name="cityArea" id="cityArea" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="address"><?php _e('Address', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_address();?>" name="address" id="address" class="form-control">
                                    </div>
                                </div>
                                <?php } else { ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="address"><?php _e('Address', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_address();?>" name="address" id="address" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="city_area"><?php _e('City area', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_city_area();?>" name="cityArea" id="cityArea" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="city"><?php _e('City', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::city_text(osc_user()) ; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="region"><?php _e('Region', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::region_text(osc_user()) ; ?>
                                    </div>
                                </div>
                                 <script type="text/javascript">
									$(function() {
										function log( message ) {
											$( "<div/>" ).text( message ).prependTo( "#log" );
											$( "#log" ).attr( "scrollTop", 0 );
										}
								
										$( "#city" ).autocomplete({
											source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
											minLength: 2,
											select: function( event, ui ) {
												$("#region").attr("value", ui.item.region);
												log( ui.item ?
													"<?php _e('Selected', 'flatter'); ?>: " + ui.item.value + " aka " + ui.item.id :
													"<?php _e('Nothing selected, input was', 'flatter'); ?> " + this.value );
											}
										});
									});
								</script>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="webSite"><?php _e('Website', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo osc_user_website(); ?>" name="s_website" id="s_website" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="s_info"><?php _e('Description', 'flatter'); ?></label>
                                    <div class="col-md-6">
                                        <?php UserForm::multilanguage_info($locales, osc_user()); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-clr"><?php _e("Update", 'flatter');?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div><!-- Edit Profile -->
                    </div><!-- Tab content END -->
                </div>
            </div>
            
            <div class="col-sm-3 visible-xs" style="margin-top:15px;">
            	<?php osc_run_hook('before-main'); ?>
            </div>
		</div>
    </div>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>