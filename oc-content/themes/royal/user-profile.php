<?php
    /*
     *       Royal Multipurpose Osclass Themes
     *       
     *       Copyright (C) 2016 OSCLASS.me
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
        <link href="<?php echo osc_current_web_theme_styles_url('profile_form.css') ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('profile_form.js') ?>"></script>

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
                            <input type="hidden" name="b_company" value="<?php if(is_sitter(osc_user_id())) { ?>1<?php } else { ?>0<?php } ?>">
                            <input type="hidden" name="page" value="user" />
                            <input type="hidden" name="action" value="profile_post" />
                            <table class="form_table">
                                <thead><tr><th colspan="2">基本情報</th></tr></thead>
                                <tr>
                                    <th><label class="control-label" for="name">
                                        <?php _e("Name", 'royal'); ?> </label></th>
                                    <td><?php UserForm::name_text(osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="country">
                                        <?php _e("Country", 'royal'); ?></label></th>
                                    <td><?php UserForm::country_select(osc_get_countries(), osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="region">
                                        <?php _e("Region", 'royal'); ?></label></th>
                                    <td><?php UserForm::region_select(osc_get_regions(), osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="city">
                                        <?php _e("City", 'royal'); ?></label></th>
                                    <td><?php UserForm::city_select(osc_get_cities(), osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="city_area">
                                        <?php _e("City area", 'royal'); ?> </label></th>
                                    <td><?php UserForm::city_area_text(osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="address">
                                        <?php _e("Address", 'royal'); ?> </label></td>
                                    <td><?php UserForm::address_text(osc_user()); ?></td>
                                </tr>
                                <?php if(!is_sitter(osc_user_id())) { ?>
                                <tr>
                                    <th><label class="control-label" for="company">
                                        <?php echo get_label('company_name'); ?></label></th>
                                    <td><?php form_company_name(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th><label class="control-label" for="birthday">
                                        <?php echo get_label('birthday'); ?> </label></th>
                                    <td><?php form_birthday(mr_user(osc_user_id())); ?></td>
                                </tr> 
                                <?php if(!is_sitter(osc_user_id())) { ?>
                                <tr>
                                    <th><label class="control-label" for="sex">
                                        <?php echo get_label('sex') ?></label></th>
                                    <td><?php form_sex(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <?php } ?>
                            </table>

                            <?php if(!is_sitter(osc_user_id())) { ?>
                            <table class="form_table">
                                <thead><tr><th colspan="2">最寄駅</th></tr></thead>
                                <tr>
                                <th><label class="control-label" for="station_line"><?php echo get_label('station_line'); ?></label></th>
                                    <td><?php form_station_line(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="station_name"><?php echo get_label('station_name'); ?></label></th>
                                    <td><?php form_station_name(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="station_walk"><?php echo get_label('station_walk'); ?></label></th>
                                    <td><?php form_station_walk(mr_user(osc_user_id())); ?></td>
                                </tr>
                            </table>
                            <table class="form_table" id="children_table">
                                <thead><tr><th colspan="2">お子様情報</th></tr></thead>
                                <?php
                                    $max = 4;
                                    if(mr_children_count(osc_user_id()) > 4) {
                                        $max = mr_children_count(osc_user_id());
                                    }
                                ?>
                                <?php for($i = 1; $i <= $max; $i++) { ?>
                                <tr>
                                    <th><label class="control-label" for="children"><?php echo $i ?>人目のお子様</label></th>
                                    <td>
                                        <p><label><?php _e("Name", 'royal'); ?>: <?php form_child_name(mr_children(osc_user_id()), $i) ?>       </label></p>
                                        <p><label>生年月日: <?php form_child_birthday(mr_children(osc_user_id()), $i) ?></label></p>
                                        <p><label>性別: <?php form_child_sex(mr_children(osc_user_id()), $i) ?></p>
                                        <p><label>性格: <?php form_child_personality(mr_children(osc_user_id()), $i) ?></p>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="2" class="btn_wrapper">
                                    <button id="add_child" type="button">お子様追加</button>
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>                            

                            <table class="form_table">
                                <thead><tr><th colspan="2">メールアドレス</th></tr></thead>
                                <tr>
                                    <th><label class="control-label" for="email">
                                        <?php _e("E-mail", 'royal'); ?> </label></th>
                                    <td><span class="update">
                                        <?php echo osc_user_email(); ?><br />
                                        <a href="<?php echo osc_change_user_email_url(); ?>"><?php _e("Modify e-mail", 'royal'); ?></a> <a href="<?php echo osc_change_user_password_url(); ?>" ><?php _e("Modify password", 'royal'); ?></a>
                                    </span></td>
                                </tr>
                            </table>
                            <table class="form_table">
                                <thead><tr><th colspan="2">電話番号</th></tr></thead> 
                                <tr>
                                    <th><label class="control-label" for="phoneLand">
                                        <?php _e("Phone", 'royal'); ?> </label></th>
                                    <td><?php UserForm::phone_land_text(osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label">
                                        <?php echo get_label('ice_phone'); ?></label></th>
                                    <td><?php echo form_ice_phone(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label">
                                        <?php echo get_label('ice_relationship'); ?></label></th>
                                    <td><?php echo form_ice_relationship(mr_user(osc_user_id())); ?></td>
                                </tr>
                            </table>
                            <table class="form_table">
                                <thead><tr><th colspan="2">自己紹介</th></tr></thead>
                                <tr>
                                    <th><label class="control-label" for="s_info">
                                        <?php _e('Description', 'royal'); ?> </label></th>
                                    <td>
                                        <?php UserForm::info_textarea('s_info', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info']); ?></td>
                                </tr>
                            </table>
                            <table class="form_table">
                            <thead><tr><th><?php echo get_label('image_path'); ?></th></tr></thead>
                                <tr><th><label class="control-label" for="image">
                                        お子様と一緒に写っているもの・顔がわかるものをアップロードしてください。 </label></th></tr>
                                <tr>
                                    <td>
                                        <?php form_image(mr_user(osc_user_id())) ?>
                                    </td>
                                </tr>
                            </table>

                            <?php if(!is_sitter(osc_user_id())) { ?>
                            <table class="form_table">
                                <thead><tr><th colspan="2"><?php echo get_label('room_image_path'); ?></th></tr></thead>
                                <tr>
                                    <th colspan="2">
                                        <label class="control-label" for="room_image">お部屋の構成などがわかりやすいものをアップロードしてください。 (5枚まで)</label></th>
                                </tr>
                                <?php for($i = 1; $i < 6; $i++) { ?>
                                <tr>
                                   <th><label class="control-label"><?php echo $i ?>枚目</label></th>
                                    <td>
                                        <?php form_room_image(mr_user(osc_user_id()), $i) ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <?php } ?>

                            <?php if(is_sitter(osc_user_id())) { ?>
                            <table class="form_table">
                                <thead><tr><th colspan="2">子育て経験</th></tr></thead>
                                <tr>
                                    <th><label class="control-label"><?php echo get_label('nursery_exp'); ?></label></th>
                                    <td><?php form_nursery_exp(mr_sitter(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label"><?php echo get_label('kindy_exp'); ?></label></th>
                                    <td><?php form_kindy_exp(mr_sitter(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label"><?php echo get_label('childcare_exp'); ?></label></th>
                                    <td><?php form_childcare_exp(mr_sitter(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label"><?php echo get_label('childcare_num'); ?></label></th>
                                    <td><?php form_childcare_num(mr_sitter(osc_user_id())); ?></td>
                                </tr>
                            </table>
                            <table class="form_table">
                                <thead><tr><th><?php echo get_label('test_image_path'); ?></th></tr></thead>
                                <tr>
                                    <td><?php form_test_image(mr_sitter(osc_user_id())); ?></td>
                                </tr>
                            </table>
                            <table class="form_table">
                                <thead><tr><th><?php echo get_label('comment_image_path'); ?></th></tr></thead>
                                <tr>
                                    <td><?php form_comment_image(mr_sitter(osc_user_id())); ?></td>
                                </tr>
                            </table>
                            <?php } ?>

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
