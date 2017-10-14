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
?>
<style>
ul#myTab {
  border: #ddd 1px solid;
}
.related_ads h2 {
  margin: 10px 0px;
  text-align: left;
}
.nav-tabs > li a {
 text-align: center;
  min-width: 80px;
  height: 20px;
  margin: 20px auto;
  border-radius: 100%;
  padding: 0;
  border: inherit;
}
.panel {  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0);
}
img#zoom_03 {
  width: 100%;
position: relative;
}
</style>
<div class="container item">
    <div id="content" class="col-md-12">
        <div class="row">
            <div class="product-img-box col-md-5">
                <?php if( osc_images_enabled_at_items() ) { ?>
                <?php if( osc_count_item_resources()> 0 ) { $i = 0; ?>
                <div class="col-md-12 row panel panel-body"> <img id="zoom_03" src="<?php echo osc_resource_url(); ?>" data-zoom-image="<?php echo osc_resource_url(); ?>" />
                    <div id="gallery_01">
                        <?php for ( $i=0 ; osc_has_item_resources(); $i++ ) { ?> <a href="#" class="gallery_01 " data-image="<?php echo osc_resource_url(); ?>" data-zoom-image="<?php echo osc_resource_url(); ?>"> <img src="<?php echo osc_resource_thumbnail_url(); ?>" /> </a>
                        <?php } ?> </div>
                </div>
                <?php } else { ?>
                <div class="col-md-12 row panel panel-body">
                    <center><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif') ; ?>"/> </center>
                </div>
                <?php } ?>
                <?php } ?></div>
            <div class="product-des-box col-md-7">
                <div class="product-name">
                    <h1><p><?php echo osc_item_title(); ?></p></h1> </div> <strong class="rini"><?php echo osc_item_category(); ?></strong>
                <div class="inner">
                    <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
                    <p id="edit_item_view"> <strong>
                                <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e("Edit", 'royal'); ?></a>
                            </strong> </p>
                    <?php } else { ?>
                    <div id="report-ads">
                        <!-- Single button -->
                        <div class="btn-group">
                            <button type="button" class="mami btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?php _e("Mark as", 'royal'); ?> <span class="caret"></span> </button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a id="item_spam" href="<?php echo osc_item_link_spam(); ?>" rel="nofollow">
                                        <?php _e("spam", 'royal'); ?> </a>
                                </li>
                                <li>
                                    <a id="item_bad_category" href="<?php echo osc_item_link_bad_category(); ?>" rel="nofollow">
                                        <?php _e("misclassified", 'royal'); ?> </a>
                                </li>
                                <li>
                                    <a id="item_repeated" href="<?php echo osc_item_link_repeated(); ?>" rel="nofollow">
                                        <?php _e("duplicated", 'royal'); ?> </a>
                                </li>
                                <li>
                                    <a id="item_expired" href="<?php echo osc_item_link_expired(); ?>" rel="nofollow">
                                        <?php _e("expired", 'royal'); ?> </a>
                                </li>
                                <li>
                                    <a id="item_offensive" href="<?php echo osc_item_link_offensive(); ?>" rel="nofollow">
                                        <?php _e("offensive", 'royal'); ?> </a>
                                </li>
                            </ul>
                        </div>
                        <button onclick="parent.location='<?php echo osc_item_send_friend_url(); ?>'" style="margin-left:5px" class="mami btn btn-default"><a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow"><i class="fa fa-user"></i> <?php _e("Send to a friend", 'royal'); ?></a> </button>
                        <?php if ( osc_user_name() !='' ) { ?>
                        <button onclick="parent.location='<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>'" class="mami btn btn-default">
                            <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" rel="nofollow">
                                <?php _e("See all ads from", 'royal'); ?>
                                <?php echo osc_user_name(); ?> </a>
                        </button>
                        <?php } ?> </div>
                    <?php }; ?> </div>
                <div class="product-price">
                    <h2><?php if( osc_price_enabled_at_items() && osc_item_category_price_enabled() ) { ?><?php echo osc_item_formated_price(); ?><?php } ?></h2>
                    <div class="add-to-box">
                        <!-- Small modal -->
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-shopping-cart"></i>
                            <?php _e("Contact seller", 'royal'); ?> </button>
                    </div>
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div style="padding:10px" class="modal-content">
                                <p class="contact_button">
                                    <?php if( !osc_item_is_expired () ) { ?>
                                    <?php if( !( ( osc_logged_user_id()==osc_item_user_id() ) && osc_logged_user_id() !=0 ) ) { ?>
                                    <?php if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?> <strong></strong>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <div id="contact">
                                        <button type="button" class="btn btn-primary btn-lg btn-block"><strong><?php _e("Contact seller", 'royal'); ?></strong> </button>
                                        <?php if( osc_item_is_expired () ) { ?>
                                        <p>
                                            <?php _e("The listing is expired. You can't contact the publisher.", 'royal'); ?> </p>
                                        <?php } else if( ( osc_logged_user_id()==osc_item_user_id() ) && osc_logged_user_id() !=0 ) { ?>
                                        <p>
                                            <?php _e("It's your own listing, you can't contact the publisher.", 'royal'); ?> </p>
                                        <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                                        <p>
                                            <?php _e("You must log in or register a new account in order to contact the advertiser", 'royal'); ?> </p>
                                        <p class="contact_button">
                                            <button type="button" class="btn btn-default btn-lg btn-block"><strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e("Login", 'royal'); ?></a></strong> </button>
                                            <button type="button" class="btn btn-default btn-lg btn-block"><strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'royal'); ?></a></strong> </button>
                                        </p>
                                        <br>
                                        <?php } else { ?>
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
                                        <?php if( osc_item_user_id() !=null ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"> <strong><p class="name"><?php _e("Name", 'royal') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></p></strong> </button>
                                        <?php } else { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong><p class="name"><?php _e("Name", 'royal') ?>: <?php echo osc_item_contact_name(); ?></p></strong> </button>
                                        <?php } ?>
                                        <?php if( osc_item_show_email() ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong><p class="email"><?php _e("E-mail", 'royal'); ?>: <?php echo osc_item_contact_email(); ?></p></strong> </button>
                                        <?php } ?>
                                        <?php if ( osc_user_phone() !='' ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="phone"><?php _e("Phone", 'royal'); ?>: <?php echo osc_user_phone(); ?></p></strong> </button>
                                        <?php } ?>
                                        <?php if ( osc_user_phone_mobile() !='' ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="cellphone"><?php _e("Cell phone", 'royal'); ?>: <?php echo osc_user_phone_mobile(); ?></p></strong> </button>
                                        <?php } ?>
                                        <?php if (function_exists('osc_telephone_number')) { ?>
                                   <button type="button" class="btn btn-default btn-lg btn-block"><strong>  <?php osc_telephone_number(); ?></strong> </button>
                                    <?php } ?>
                                        <?php if ( osc_user_address() !='' ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="address"><?php _e("Address", 'royal'); ?>: <?php echo osc_user_address(); ?></p></strong> </button>
                                        <?php } ?>
                                        <?php if ( osc_user_city() !='' ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="city"><?php _e("City", 'royal'); ?>: <?php echo osc_user_city(); ?></p></strong> </button>
                                        <?php } ?>
                                        <?php if ( osc_user_region() !='' ) { ?>
                                        <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="region"><?php _e("Region", 'royal'); ?>: <?php echo osc_user_region(); ?></p></strong> </button>
                                        <?php } ?>
                                        <ul id="error_list"></ul>
                                        <?php ContactForm::js_validation(); ?>
                                        <?php } ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <ul id="item_location">
                        <?php if ( osc_item_address() !="" ) { ?>
                        <li>
                            <?php _e("Address", 'royal'); ?>: <strong><?php echo osc_item_address(); ?></strong>
                            <?php } ?>
                            <?php if ( osc_item_city_area() !="" ) { ?>
                            <?php _e("City area", 'royal'); ?>: <strong><?php echo osc_item_city_area(); ?></strong>
                            <?php } ?>
                            <?php if ( osc_item_city() !="" ) { ?>
                            <?php _e("City", 'royal'); ?>: <strong><?php echo osc_item_city(); ?></strong>
                            <?php } ?>
                            <?php if ( osc_item_region() !="" ) { ?>
                            <?php _e("Region", 'royal'); ?>: <strong><?php echo osc_item_region(); ?></strong>
                            <?php } ?>
                            <?php if ( osc_item_country() !="" ) { ?>
                            <?php _e("Country", 'royal'); ?>: <strong><?php echo osc_item_country(); ?></strong> </li>
                        <?php } ?> </ul>
                    <div id="type_dates"> <em class="publish"><?php if ( osc_item_pub_date() != '' ) echo __('<i class="fa fa-calendar"></i>', 'royal') . ' ' . osc_format_date( osc_item_pub_date() ); ?></em> <em class="update"><?php if ( osc_item_mod_date() != '' ) echo __('<i class="fa fa-edit"></i>', 'royal') . ' ' . osc_format_date( osc_item_mod_date() ); ?></em> </div>
                    <div class="share ulfa">
                        <!-- AddThis Button BEGIN -->
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
                        <!-- AddThis Button END -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-info-box col-md-12">
                <div class="bs-docs-example">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active">
                            <a href="#detail" data-toggle="tab">
                                <?php _e("Description", 'royal'); ?> </a>
                        </li>
                        <li>
                            <a href="#profile" data-toggle="tab">
                                <?php _e("Additional", 'royal'); ?> </a>
                        </li>
                        <li>
                            <a href="#more" data-toggle="tab">
                                <?php _e("Contact seller", 'royal'); ?> </a>
                        </li>
                        <li>
                            <a href="#review" data-toggle="tab">
                                <?php _e("Comments", 'royal'); ?> </a>
                        </li>
                        <li>
                            <a href="#warning" data-toggle="tab">
                                <?php _e("Warning", 'royal'); ?> </a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="panel tab-pane fade in active" id="detail">
                            <p>
                                <?php echo osc_item_description(); ?> </p>
                            <?php osc_run_hook( 'item_detail', osc_item() ); ?> </div>
                        <div class="tab-pane fade panel" id="profile"> <strong><?php _e("More information", 'royal'); ?></strong>
                            <div id="custom_fields">
                                <?php if( osc_count_item_meta()>= 1 ) { ?>
                                <div class="meta_list">
                                    <?php while ( osc_has_item_meta() ) { ?>
                                    <?php if(osc_item_meta_value()!='' ) { ?>
                                    <div class="meta"> <strong><?php echo osc_item_meta_name(); ?>:</strong>
                                        <?php echo osc_item_meta_value(); ?> </div>
                                    <?php } ?>
                                    <?php } ?> </div>
                                <?php } ?> </div>
                        </div>
                        <div class="tab-pane fade panel" id="more">
                            <p class="contact_button">
                                <?php if( !osc_item_is_expired () ) { ?>
                                <?php if( !( ( osc_logged_user_id()==osc_item_user_id() ) && osc_logged_user_id() !=0 ) ) { ?>
                                <?php if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?> <strong></strong>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                <div id="contact">
                                    <button type="button" class="btn btn-primary btn-lg btn-block"><strong><?php _e("Contact seller", 'royal'); ?></strong> </button>
                                    <?php if( osc_item_is_expired () ) { ?>
                                    <p>
                                        <?php _e("The listing is expired. You can't contact the publisher.", 'royal'); ?> </p>
                                    <?php } else if( ( osc_logged_user_id()==osc_item_user_id() ) && osc_logged_user_id() !=0 ) { ?>
                                    <p>
                                        <?php _e("It's your own listing, you can't contact the publisher.", 'royal'); ?> </p>
                                    <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
                                    <p>
                                        <?php _e("You must log in or register a new account in order to contact the advertiser", 'royal'); ?> </p>
                                    <p class="contact_button"> <strong><a href="<?php echo osc_user_login_url(); ?>"><?php _e("Login", 'royal'); ?></a></strong> <strong><a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'royal'); ?></a></strong> </p>
                                    <br>
                                    <?php } else { ?>
                                    <?php if( osc_item_user_id() !=null ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"> <strong><p class="name"><?php _e("Name", 'royal') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></p></strong> </button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong><p class="name"><?php _e("Name", 'royal') ?>: <?php echo osc_item_contact_name(); ?></p></strong> </button>
                                    <?php } ?>
                                    <?php if( osc_item_show_email() ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong><p class="email"><?php _e("E-mail", 'royal'); ?>: <?php echo osc_item_contact_email(); ?></p></strong> </button>
                                    <?php } ?>
                                    <?php if ( osc_user_phone() !='' ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="phone"><?php _e("Phone", 'royal'); ?>: <?php echo osc_user_phone(); ?></p></strong> </button>
                                    <?php } ?>
                                    <?php if ( osc_user_phone_mobile() !='' ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="phone"><?php _e("Phone cell", 'royal'); ?>: <?php echo osc_user_phone_mobile(); ?></p></strong> </button>
                                    <?php } ?>
                                   <?php if (function_exists('osc_telephone_number')) { ?>
                                   <button type="button" class="btn btn-default btn-lg btn-block"><strong>  <?php osc_telephone_number(); ?></strong> </button>
                                    <?php } ?>
                                    <?php if ( osc_user_address() !='' ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="address"><?php _e("Address", 'royal'); ?>: <?php echo osc_user_address(); ?></p></strong> </button>
                                    <?php } ?>
                                    <?php if ( osc_user_city() !='' ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="city"><?php _e("City", 'royal'); ?>: <?php echo osc_user_city(); ?></p></strong> </button>
                                    <?php } ?>
                                    <?php if ( osc_user_region() !='' ) { ?>
                                    <button type="button" class="btn btn-default btn-lg btn-block"><strong> <p class="region"><?php _e("Region", 'royal'); ?>: <?php echo osc_user_region(); ?></p></strong> </button>
                                    <?php } ?>
                                    <button type="button" class="btn btn-primary btn-lg btn-block"><strong> <p class="region"><?php _e("Send Mail", 'royal'); ?></p></strong> </button>
                                    <ul id="error_list"></ul>
                                    <?php ContactForm::js_validation(); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form <?php if( osc_item_attachment() ) { ?>enctype="multipart/form-data"
                                                <?php } ?> action="
                                                <?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form" class="well col-md-12">
                                                <?php osc_prepare_user_info(); ?>
                                                <fieldset>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>
                                                                    <?php _e("Your name", 'royal'); ?> </label>
                                                                <?php ContactForm::your_name(); ?> </div>
                                                            <div class="form-group">
                                                                <label>
                                                                    <?php _e("Your e-mail address", 'royal'); ?> </label>
                                                                <?php ContactForm::your_email(); ?> </div>
                                                            <div class="form-group">
                                                                <label>
                                                                    <?php _e("Phone number", 'royal'); ?> </label>
                                                                <?php ContactForm::your_phone_number(); ?> </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <?php if( osc_item_attachment() ) { ?>
                                                            <label for="contact-attachment">
                                                                <?php _e("Attachments", 'royal') ; ?> </label>
                                                            <?php ContactForm::your_attachment() ; ?>
                                                            <?php } ?>
                                                            <?php osc_run_hook( 'item_contact_form', osc_item_id()); ?>
                                                            <div class="form-group">
                                                                <label>
                                                                    <?php _e("Message", 'royal'); ?> </label>
                                                                <?php ContactForm::your_message(); ?> </div>
                                                            <input type="hidden" name="action" value="contact_post" />
                                                            <input type="hidden" name="page" value="item" />
                                                            <input type="hidden" name="id" value="<?php echo osc_esc_html( osc_item_id() ); ?>" />
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
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-primary pull-left">
                                                                <?php _e("Send", 'royal'); ?> </button>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                    <?php } ?> </div>
                        </div>
                        <div class="tab-pane fade panel" id="review">
                            <?php if( osc_comments_enabled() ) { ?>
                            <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
                            <div id="comments"> <strong><?php _e("Comments", 'royal'); ?></strong>
                                <ul id="comment_error_list"></ul>
                                <?php CommentForm::js_validation(); ?>
                                <?php if( osc_count_item_comments()>= 1 ) { ?>
                                <div class="comments_list">
                                    <?php while ( osc_has_item_comments() ) { ?>
                                    <div class="comment">
                                        <h3><strong><?php echo osc_comment_title(); ?></strong> <em><?php _e("by", 'royal'); ?> <?php echo osc_comment_author_name(); ?>:</em></h3>
                                        <p>
                                            <?php echo nl2br( osc_comment_body() ); ?> </p>
                                        <?php if ( osc_comment_user_id() && (osc_comment_user_id()==osc_logged_user_id()) ) { ?>
                                        <p>
                                            <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>">
                                                <?php _e("Delete", 'royal'); ?> </a>
                                        </p>
                                        <?php } ?> </div>
                                    <?php } ?>
                                    <div class="paginate" style="text-align: right;">
                                        <?php echo osc_comments_pagination(); ?> </div>
                                </div>
                                <?php } ?>
                                <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                                    <fieldset> <strong><?php _e("Leave your comment", 'royal'); ?></strong>
                                        <br>
                                        <input type="hidden" name="action" value="add_comment" />
                                        <input type="hidden" name="page" value="item" />
                                        <input type="hidden" name="id" value="<?php echo osc_esc_html( osc_item_id() ); ?>" />
                                        <?php if(osc_is_web_user_logged_in()) { ?>
                                        <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                                        <input type="hidden" name="authorEmail" value="<?php echo osc_esc_html( osc_logged_user_email() );?>" />
                                        <?php } else { ?>
                                        <label for="authorName">
                                            <?php _e("Your name", 'royal'); ?>:</label>
                                        <br>
                                        <?php CommentForm::author_input_text(); ?>
                                        <br>
                                        <label for="authorEmail">
                                            <?php _e("Your e-mail", 'royal'); ?>:</label>
                                        <br>
                                        <?php CommentForm::email_input_text(); ?>
                                        <br>
                                        <?php }; ?>
                                        <label for="title">
                                            <?php _e("Title", 'royal'); ?>:</label>
                                        <br>
                                        <?php CommentForm::title_input_text(); ?>
                                        <br />
                                        <label for="body">
                                            <?php _e("Comment", 'royal'); ?>:</label>
                                        <br>
                                        <?php CommentForm::body_input_textarea(); ?>
                                        <br />
                                        <button style="margin-top:15px;" class="btn btn-success" type="submit">
                                            <?php _e("Send", 'royal'); ?> </button>
                                    </fieldset>
                                </form>
                            </div>
                            <?php } ?>
                            <?php } ?> </div>
                        <div class="tab-pane fade panel" id="warning">
                            <div id="useful_info"> <strong><?php _e("Useful information", 'royal'); ?></strong>
                                <ul>
                                    <li>
                                        <?php _e('Avoid scams by acting locally or paying with PayPal', 'royal'); ?> </li>
                                    <li>
                                        <?php _e('Never pay with Western Union, Moneygram or other anonymous payment services', 'royal'); ?> </li>
                                    <li>
                                        <?php _e('Don\'t buy or sell outside of your country. Don\'t accept cashier cheques from outside your country', 'royal'); ?> </li>
                                    <li>
                                        <?php _e('This site is never involved in any transaction, and does not handle payments, shipping, guarantee transactions, provide escrow services, or offer "buyer protection" or "seller certification"', 'royal'); ?> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel topper" id="descript">
            <?php osc_run_hook( 'location'); ?> </div>
        <!-- plugins -->
        <div class="related">
            <?php related_listings(); ?>
            <?php if( osc_count_items()> 0 ) { ?>
            <div class="similar_ads">
                <div class="ari">
                    <h2><?php _e("Related Ads", 'royal'); ?></h2> </div>
                <?php View::newInstance()->_exportVariableToView("listType", 'items'); osc_current_web_theme_path('related.php'); ?>
                <div class="clear"></div>
            </div>
            <?php } else { ?>
            <div class="similar_ads">
                <h3 class="pas"><?php _e("No Related Ads", 'royal'); ?></h3> </div>
            <?php } ?> </div>
  </div>
</div>
<?php osc_current_web_theme_path('footer.php'); ?>

<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.elevatezoom.js') ; ?>"></script>
<script>
$("#zoom_03").elevateZoom({zoomType: "none", containLensZoom: true, gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active"});
$("#zoom_03").bind("click", function(e) { var ez = $('#zoom_03').data('elevateZoom');	$.fancybox(ez.getGalleryList()); return false; });
</script>