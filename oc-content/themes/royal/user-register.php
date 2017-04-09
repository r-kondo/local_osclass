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
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_js_url('jquery-ui/jquery-ui-1.10.2.custom.css'));
    osc_enqueue_script('jquery-validate');
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
        <link href="<?php echo osc_current_web_theme_styles_url('profile_form.css') ?>" rel="stylesheet">
        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('profile_form.js') ?>"></script>
<?php /*        <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('profile_station.js') ?>"></script> */ ?>
        <script>
            $(document).ready(function() {
                $('#s_name').prop('required', true);
                $('#s_password').prop('required', true);
                $('#s_password2').prop('required', true);
                $('#s_email').prop('required', true);
                $('#s_email').prop('type', 'email');
            });
        </script>
    </head>
   <body>
   <?php UserForm::location_javascript(); ?>
    <style>
    .controls {
    margin-top: 0px;
    }
    .breadcrumb {
        text-align: center;
    }
    </style>
    <?php UserForm::js_validation(); ?>
    <?php osc_current_web_theme_path('header.php'); ?>
    <div class="container">
        <div class="wrapper">
            <form name="register" id="register" enctype="multipart/form-data" action="<?php echo osc_base_url(true); ?>" method="post" class="form-signin" name="form">
                <input type="hidden" name="page" value="register" />
                <input type="hidden" name="action" value="register_post" />
                <fieldset>
                    <h3 class="form-signin-heading"><?php _e("Register an account for free", 'royal'); ?>
                    <p><small>この情報は、あとで修正することができます</small></p>
</h3>
                    <hr class="colorgraph">
                    <ul id="error_list"></ul>
                            <table class="form_table">
                                <thead><tr><th colspan="2">基本情報</th></tr></thead>
                                <tr>
                                    <th><label class="control-label" for="s_name">
                                    <?php _e("Name", 'royal'); ?><span class="require">*</span></label></th>
                                    <td><?php UserForm::name_text(); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="s_password">
                                    <?php _e("Password", 'royal'); ?><span class="require">*</span></label></th>
                                    <td><?php UserForm::password_text(); ?> </td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="s_password2">
                                    <?php _e("Re-type password", 'royal'); ?><span class="require">*</span></label></th>
                                    <td>
                                        <?php UserForm::check_password_text(); ?>
                                        <p id="password-error" style="display:none;">
                                        <?php _e("Passwords don't match", 'royal '); ?>.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="s_email">
                                    <?php _e("E-mail", 'royal '); ?><span class="require">*</span></label> 
                                    <td><?php UserForm::email_text(); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="country">
                                    <?php _e("Country", 'royal'); ?></label></th>
                                    <td><?php UserForm::country_select(osc_get_countries(), osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="regionId">
                                        <?php _e("Region", 'royal'); ?></label></th>
                                    <td><?php UserForm::region_select(osc_get_regions(), osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="cityId">
                                        <?php _e("City", 'royal'); ?></label></th>
                                    <td><?php UserForm::city_select(osc_get_cities(), osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="cityArea">
                                        <?php _e("City area", 'royal'); ?> </label></th>
                                    <td><?php UserForm::city_area_text(osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="address">
                                        <?php _e("Address", 'royal'); ?> </label></td>
                                    <td><?php UserForm::address_text(osc_user()); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="company_name">
                                        <?php echo get_label('company_name'); ?></label></th>
                                    <td><?php form_company_name(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="birthday">
                                        <?php echo get_label('birthday'); ?> </label></th>
                                    <td><?php form_birthday(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label" for="sex">
                                        <?php echo get_label('sex') ?></label></th>
                                    <td><?php form_sex(mr_user(osc_user_id())); ?></td>
                                </tr>
                            </table>
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
                                <?php for($i = 1; $i < 5; $i++) { ?>
                                <tr>
                                    <th><?php echo $i ?>人目のお子様</th>
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
                                    <td><?php form_ice_phone(mr_user(osc_user_id())); ?></td>
                                </tr>
                                <tr>
                                    <th><label class="control-label">
                                        <?php echo get_label('ice_relationship'); ?></label></th>
                                    <td><?php form_ice_relationship(mr_user(osc_user_id())); ?></td>
                                </tr>
                            </table>
                            <table class="form_table">
                                <thead><tr><th><?php echo get_label('image_path'); ?></th></tr></thead>
                                <tr>
                                    <th><label class="control-label" for="image">
                                        お子様と一緒に写っているもの・顔がわかるものをアップロードしてください。 </label></th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php form_image(mr_user(osc_user_id())) ?>
                                    </td>
                                </tr>
                            </table>
                            <table class="form_table">
                            <thead><tr><th colspan="2"><?php echo get_label('room_image_path'); ?></th></tr></thead>
                                <tr>
                                    <th colspan="2"><label class="control-label" for="image">
                                        お部屋の構成などがわかりやすいものをアップロードしてください。 (5枚まで)</label></th>
                                </tr>
                                <?php for($i = 1; $i < 6; $i++) { ?>
                                <tr>
                                    <th>
                                        <label class="control-label"><?php echo $i ?>枚目</label>
                                    </th>
                                    <td>
                                        <?php form_room_image(mr_user(osc_user_id()), $i) ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
 

                       <?php osc_run_hook('user_register_form'); ?>
<?php /*
                       <div class="form-group">
                       <?php osc_show_recaptcha('register'); ?>
    </div>
 */ ?>
                        <div class="form-group">
                        <label><input class="cekk" type="checkbox" required><a target="_blank" href="<?php echo osc_get_preference('tos-me', 'royal'); ?>"><?php _e("Terms of Use", 'royal'); ?></a>に同意します</label>
                        </div>
                        <button class="btn btn-success btn-lg topper seratus" type="submit"><span class="fa fa-group" aria-hidden="true"></span> <?php _e("Register", 'royal '); ?></button>
                        <div class="jarak"></div>
                       <?php osc_current_web_theme_path('common/fb.php') ; ?>
                </fieldset>
            </form>
        </div>
    </div>
        <?php osc_current_web_theme_path('footer.php'); ?>
         <script>
    document.getElementById("s_name").maxLength = "30";
    </script>
    </body>
</html>
