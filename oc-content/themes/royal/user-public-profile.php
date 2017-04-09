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
/*
    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }*/
    $location_array = array();
    if(osc_user_region()!='') {
      $location_array[] = osc_user_region();
    }
    if(trim(osc_user_city())!='') {
        $location_array[] = trim(osc_user_city());
    }
    $location = implode("", $location_array);
    unset($location_array);

    osc_enqueue_script('jquery-validate');

    $mr_user = mr_user(osc_user_id());
    $mr_children = mr_children(osc_user_id());
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
    <style>
    .col-item .btn-details {
        width: 100%;
    }
    </style>
    <div class="container">
        <div class="row profile">
            <div class="col-md-12">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <?php 
                          if(isset($mr_user['image_path']) && $mr_user['image_path']){
                            echo '<img src="/oc-content/uploads/profiles/'.$mr_user['image_path'].'" class="img-responsive">';
                          }else{
                            osc_current_web_theme_path('common/avatar.php') ;
                          }
                        ?>
                        </div>
                    
                    <?php if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                    <div class="profile-user">
                        <p>
                            <?php _e("You must log in or register a new account in order to contact the advertiser", 'royal'); ?> </p>
                        <p class="contact_button"> <strong><a class="btn btn-success seratus" href="<?php echo osc_user_login_url(); ?>"><?php _e("Login", 'royal'); ?></a></strong> <strong><a class="btn btn-primary seratus topper" href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'royal'); ?></a></strong> </p>
                    </div>
                    <br>
                    <?php } else { ?>
                    <div class="profile-usermenu">
                       <div class="wrapper">
                          <ul id="user_data">
                            <?php /* if( osc_user_name() !=='' ) { ?>
                            <li><b><?php _e("Full name", 'royal'); ?></b>:
                                <?php echo osc_user_name(); ?> </li>
                            <?php } */ ?>
                            <?php 
                            if( isset($mr_user['birthday']) && $mr_user['birthday'] !=='' ) { 
                              $birthday_year = explode('-', $mr_user['birthday']);
                              $year = date('Y');
                              $user_old = (int)$year - (int)$birthday_year[0];
                            ?>
                            <li><?php echo floor($user_old/10)*10; ?>代 
                            <?php 
                            if($mr_user['sex'] == '1'){
                              echo '男性';
                            }else{
                              echo '女性';
                            }
                            ?></li>
                            <?php } ?>
                            <?php if( $location !=='' ) { ?>
                            <li>地域:&nbsp;<?php echo $location; ?></li>
                            <?php } ?>
                          </ul>
                        </div>

                        <?php if( osc_user_info() !=='' ) { ?>
                        <div class="user-description wrapper">
                          <h2>自己紹介</h2>
                            <?php echo nl2br(osc_user_info()); ?>
                        </div>
                        <?php } ?> 
                        <?php
                        $count = count($mr_children);
                        if($count) { ?>
                        <div class="children-data wrapper clearfix">
                          <h2>お子様</h2>
                          <table class="table table-bordered table-striped table-responsive">
                              <?php 
                                for($i=0; $i<$count; $i++){
                                  if(isset($mr_children[$i])){
?>
                            <tr>
                              <td>
                            <?php 
                                    if( isset($mr_children[$i]['birthday']) && $mr_children[$i]['birthday'] !== '' ) { 
                                      $birthday_year = str_replace('-','',$mr_children[$i]['birthday']);
                                      $year = date('Ymd');
                                      $child_old = (int)$year - (int)$birthday_year;
                                      echo floor($child_old/10000).'歳';
                                    } else {
                                      echo '-';
                                    }
                                    ?>
</td>
                                <td>
                                    <?php
                                    if($mr_children[$i]['sex'] == '1'){
                                      echo '男の子';
                                    }else{
                                      echo '女の子';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $mr_children[$i]['personality']; ?>
                                </td>
                              </tr>                                                             
                              <?php
                                  }
                                }
?>
                          </table>
                        </div>
                        <?php } ?>
                        <div class="places-data wrapper">
                          <h2>保育場所写真</h2>
                          <?php
                          for($i=1; $i<6; $i++){
                            if(isset($mr_user['room_image_path_'.$i]) && $mr_user['room_image_path_'.$i] != ''){
                              echo '<img src="/oc-content/uploads/rooms/'.$mr_user['room_image_path_'.$i].'" class="img-responsive center-block">'; 
                            }
                          }
                          ?>
                        </div>
                        <?php if($mr_user['station_name']) { ?>
                        <div class="station-data wrapper">
                          <h2>最寄り駅</h2>
                                <p><?php if($mr_user['station_line']) { echo $mr_user['station_line']; } ?>線&nbsp;<?php echo $mr_user['station_name'];?>駅</p>
                                <?php if($mr_user['station_walk']) { ?><p><?php echo $mr_user['station_name'];?>より徒歩<?php echo $mr_user['station_walk'];?>分</p><?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    
                    <!-- Modal -->
                    <?php if(osc_logged_user_id() !=osc_user_id()) { ?>
                    <?php if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                                    <h4 class="modal-title" id="myModalLabel"><?php _e("Contact publisher", 'royal'); ?></h4> </div>
                                <div class="modal-body">
                                    <ul id="error_list"></ul>
                                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                                        <input type="hidden" name="action" value="contact_post" />
                                        <input type="hidden" name="page" value="user" />
                                        <input type="hidden" name="id" value="<?php echo osc_esc_html( osc_user_id() ); ?>" />
                                        <div class="control-group">
                                            <label class="control-label" for="yourName">
                                                <?php _e("Your name", 'royal'); ?>:</label>
                                            <div class="controls">
                                                <?php ContactForm::your_name(); ?> </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="yourEmail">
                                                <?php _e("Your email address", 'royal'); ?>:</label>
                                            <div class="controls">
                                                <?php ContactForm::your_email(); ?> </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="phoneNumber">
                                                <?php _e("Phone number", 'royal'); ?> (
                                                <?php _e("optional", 'royal'); ?>):</label>
                                            <div class="controls">
                                                <?php ContactForm::your_phone_number(); ?> </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="message">
                                                <?php _e("Message", 'royal'); ?>:</label>
                                            <div class="controls textarea">
                                                <?php ContactForm::your_message(); ?> </div>
                                        </div>
                                        <div class="control-group">
                                            <div class="controls">
                                                <?php osc_run_hook( 'item_contact_form', osc_item_id()); ?>
                                                <?php if( osc_recaptcha_public_key() ) { ?>
                                                <script type="text/javascript">
                                                var RecaptchaOptions = {
                                                    theme: 'custom',
                                                    custom_theme_widget: 'recaptcha_widget'
                                                };
                                                </script>
                                                <style type="text/css">
                                                div#recaptcha_widget,
                                                div#recaptcha_image > img {
                                                    width: 280px;
                                                }
                                                </style>
                                                <div id="recaptcha_widget">
                                                    <div id="recaptcha_image"><img /> </div> <span class="recaptcha_only_if_image"><?php _e("Enter the words above",'royal'); ?>:</span>
                                                    <input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
                                                    <div>
                                                        <a href="javascript:Recaptcha.showhelp()">
                                                            <?php _e("Help", 'royal'); ?> </a>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php osc_show_recaptcha(); ?> </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _e("Close", 'royal'); ?> </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <?php _e("Send", 'royal'); ?> </button>
                                            </div>
                                    </form>
                                    </div>
                                    <?php ContactForm::js_validation(); ?> </div>
                            </div>
                        </div>
                    </div>
                    <?php } } ?> </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('profile.css') ; ?>">
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>
</html>
