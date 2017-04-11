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
    $address = '';
    if(osc_user_address()!='') {
        if(osc_user_city_area()!='') {
            $address = osc_user_address().", ".osc_user_city_area();
        } else {
            $address = osc_user_address();
        }
    } else {
        $address = osc_user_city_area();
    }
    $location_array = array();
    if(trim(osc_user_city()." ".osc_user_zip())!='') {
        $location_array[] = trim(osc_user_city()." ".osc_user_zip());
    }
    if(osc_user_region()!='') {
        $location_array[] = osc_user_region();
    }
    if(osc_user_country()!='') {
        $location_array[] = osc_user_country();
    }
    $location = implode(", ", $location_array);
    unset($location_array);

    osc_enqueue_script('jquery-validate');
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
    ul#user_data {
        padding: 0px 10px;
    }
    </style>
    <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <?php osc_current_web_theme_path('common/avatar.php') ; ?></div>
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php echo osc_user_name(); ?> </div>
                        <div class="profile-usertitle-job">
                            <?php echo osc_user_website(); ?> </div>
                    </div>
                    
                    <?php if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                    <div class="profile-user">
                        <p>
                            <?php _e("You must log in or register a new account in order to contact the advertiser", 'royal'); ?> </p>
                        <p class="contact_button"> <strong><a class="btn btn-success seratus" href="<?php echo osc_user_login_url(); ?>"><?php _e("Login", 'royal'); ?></a></strong> <strong><a class="btn btn-primary seratus topper" href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'royal'); ?></a></strong> </p>
                    </div>
                    <br>
                    <?php } else { ?>
                    <div class="profile-userbuttons">
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i>
                            <?php _e("Send Mail", 'royal'); ?> </button>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->

<div class="cals topper hidden-md-up">
 <div class="report-inner section_bg">
    	<div class="row"><?php if ( osc_user_phone_mobile() !='' ) { ?>
        	<div class="col-xs-6">
            	<a href="sms:<?php echo osc_user_phone_mobile(); ?>"  class="btn btn-call btn-block"><span class=" fa fa-envelope"></span> <?php _e('Sms', 'royal'); ?></a>
            </div><?php } ?>
             <?php if ( osc_user_phone() !='' ) { ?>
            <div class="col-xs-6">
            	<a href="tel:<?php echo osc_user_phone(); ?>"  class="btn btn-call  btn-block "><span class="txt_color_1  fa fa-phone"></span> <?php _e('Call', 'royal'); ?></a>
            </div><?php } ?>
        </div>
    </div>
</div>
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul id="user_data">
                            <?php if( osc_user_name() !=='' ) { ?>
                            <li><b><?php _e("Full name", 'royal'); ?></b>:
                                <?php echo osc_user_name(); ?> </li>
                            <?php } ?>
                            <?php if( osc_user_phone() !=='' ) { ?>
                            <li><b><?php _e("Phone", 'royal'); ?></b>:
                                <?php echo osc_user_phone(); ?> </li>
                            <?php } ?>
                            <?php if( osc_user_phone_mobile() !=='' ) { ?>
                            <li><b><?php _e("Cell phone", 'royal'); ?></b>:
                                <?php echo osc_user_phone_mobile(); ?> </li>
                            <?php } ?>
                            <?php if( $address !=='' ) { ?>
                            <li><b><?php _e("Address", 'royal'); ?></b>:
                                <?php echo $address; ?> </li>
                            <?php } ?>
                            <?php if( $location !=='' ) { ?>
                            <li><b><?php _e("Location", 'royal'); ?></b>:
                                <?php echo $location; ?> </li>
                            <?php } ?>
                            <?php if( osc_user_website() !=='' ) { ?>
                            <li><b><?php _e("Website", 'royal'); ?></b>:
                                <?php echo osc_user_website(); ?> </li>
                            <?php } ?>
                            <?php if( osc_user_info() !=='' ) { ?>
                            <li><b><?php _e("User Description", 'royal'); ?></b>:
                                <?php echo osc_user_info(); ?> </li>
                            <?php } ?> </ul>
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
<center><!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style rini">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript">
                var addthis_config = {
                    "data_track_addressbar": true
                };
                </script>
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-52a877a15b8d59d4"></script>
                <!-- AddThis Button END --></center>
                <center class="ads-right"><?php echo osc_get_preference('sidebar-160x600', 'royal'); ?></center>
            </div>
            <div class="col-md-9">
                <div class="profile-content">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1><?php echo sprintf(__('Listings from %s', 'royal') ,osc_user_name()); ?></h1> 
                        </div>
                        <div class="panel-body">
                            <div id="products" class="row list-group">
                                <?php while(osc_has_items()) { ?>
                                <div class="item <?php osc_run_hook("highlight_class"); ?> col-lg-4 col-md-4 col-sm-3 col-xs-4 four-6 three-12">
                                    <div class="col-item">
                                        <div class="photo">
                                            <?php if( osc_images_enabled_at_items() ) { ?>
                                            <?php if(osc_count_item_resources()) { ?> <a href="<?php echo osc_item_url(); ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" /></a>
                                            <?php } else { ?> <img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" />
                                            <?php } ?>
                                            <?php } ?> </div>
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-12 price">
                                                    <h5 class="price-text-color">
<?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { echo osc_format_price(osc_item_price()); ?>
                                                        <?php } ?></h5> 
                                                </div>
                                                <div class="aribudin col-md-12">
                                                    <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a>
                                                </div>
                                            </div>
                                            <div class="separator clear-left">
                                                <p class="btn-details"> <i class="fa fa-list"></i>
                                                    <a href="<?php echo osc_item_url(); ?>"><?php _e("More details", 'royal') ; ?></a>
                                                </p>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?> </div>
                            <div class="paginate"><?php echo osc_pagination_items(); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?php echo osc_current_web_theme_styles_url('profile.css') ; ?>">
    <?php osc_current_web_theme_path('footer.php'); ?> 
</body>
</html>