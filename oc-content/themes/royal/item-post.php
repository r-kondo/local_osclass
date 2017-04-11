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
    $user = osc_user();
    osc_enqueue_style('jquery-ui-custom', osc_current_web_theme_js_url('jquery-ui/jquery-ui-1.10.2.custom.css'));
    osc_enqueue_style('tabs', osc_current_web_theme_url('css/tabs.css'));
    osc_enqueue_script('jquery-validate');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit'){
    $action = 'item_edit_post';
    $edit = true;
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
        <meta name="robots" content="noindex, nofollow" />
        <meta name="googlebot" content="noindex, nofollow" />
        <?php ItemForm::location_javascript(); ?>
        <?php if(osc_images_enabled_at_items() && !royal_is_fineuploader()) {
            ItemForm::photos_javascript();
        }
        ?>
    <script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('tabber-minimized.js') ; ?>"></script>
    </head>
    <body>
    <?php osc_current_web_theme_path('header.php'); ?>
    <div id="content" class="container">
        <div class="poss col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <style>
                    .qq-uploader {
                        position: inherit;
                        width: 100%;
                    }
                    .poss {
                        margin: 0px auto;
                        float: inherit;
                    }
                    .breadcrumb {
                        text-align: center;
                    }
                    .qq-upload-button {
                        background: #0088CC;
                    }
                    .qq-upload-button:hover {
                        background: #097CB5;
                    }
                    </style>
                    <div class="panel panel-default row">
                        <div class="panel-heading">
                            <h1><strong><?php _e("Publish a listing", 'royal'); ?></strong></h1> </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <ul id="error_list"></ul>
                                <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data">
                                    <fieldset>
                                        <input type="hidden" name="action" value="<?php echo osc_esc_html($action); ?>" />
                                        <input type="hidden" name="page" value="item" />
                                        <?php if($edit){ ?>
                                        <input type="hidden" name="id" value="<?php echo osc_esc_html( osc_item_id() ); ?>" />
                                        <input type="hidden" name="secret" value="<?php echo osc_esc_html( osc_item_secret() ); ?>" />
                                        <?php } ?>
                                        <div class="gener">
                                            <div class="form-group">
                                                <label class="control-label" for="select_1">
                                                    <?php _e("Select a category", 'royal'); ?> </label>
                                                <div class="controls">
                                                    <?php ItemForm::category_select(null, null, __( 'Select a category', 'royal')); ?> </div>
                                            </div>
                                             <?php if(osc_get_preference('multi_view', 'royal_theme')=="1" ) { ?>
                                             <div class="form-group">
                                                 <?php ItemForm::multilanguage_title_description(); ?>
                                             </div>
                                            <?php } else { ?> 
                                            <div class="form-group">
                                                <label class="control-label" for="title[<?php echo osc_locale_code(); ?>]">
                                                    <?php _e("Title", 'royal'); ?> </label>
                                                <div class="controls">
                                                    <?php ItemForm::title_input( 'title',osc_locale_code(), osc_esc_html( royal_item_title() )); ?> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="description[<?php echo osc_locale_code(); ?>]">
                                                    <?php _e("Description", 'royal'); ?> </label>
                                                <div class="controls">
                                                    <?php ItemForm::description_textarea( 'description',osc_locale_code(), osc_esc_html( royal_item_description() )); ?> </div>
                                            </div>
                                        </div><?php } ?>
                                        <?php if( osc_price_enabled_at_items() ) { ?>
                                        <div class="box price">
                                            <label for="price">
                                                <?php _e("Price", 'royal'); ?> </label>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <?php ItemForm::price_input_text(); ?>
                                                    <?php ItemForm::currency_select(); ?> </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    <!-- Uploader --> <div class="form-group">
                                   <?php if (function_exists('przi_ajax_uploader')) { przi_ajax_photos(); ?><?php } else { ?>
                                   <?php if( osc_images_enabled_at_items() ) { ItemForm::ajax_photos(); } ?><?php } ?>
                                    </div><!-- end Uploader -->
                                        <div class="box location">
                                            <div class="form-group">
                                                <label class="control-label" for="country">
                                                    <?php _e("Country", 'royal'); ?> *</label>
                                                <?php ItemForm::country_select(); ?> </div>
                                            <div class="form-group">
                                                <label class="control-label" for="region">
                                                    <?php _e("Region", 'royal'); ?> *</label>
                                                <?php if($edit){ ?>
                                                <?php ItemForm::region_select() ; ?>
                                                <?php } else { ?>
                                                <?php ItemForm::region_select(osc_get_regions(), osc_user()); ?>
                                                <?php } ?> </div>
                                            <div class="form-group">
                                                <label class="control-label" for="city">
                                                    <?php _e("City", 'royal'); ?> *</label>
                                                <?php if($edit){ ?>
                                                <?php ItemForm::city_select() ; ?>
                                                <?php } else { ?>
                                                <?php ItemForm::city_select(osc_get_cities(), osc_user()); ?>
                                                <?php } ?> </div>
                                            <div class="form-group">
                                                <label for="city">
                                                    <?php _e("City Area", 'royal'); ?> </label>
                                                <?php ItemForm::city_area_text(osc_user()); ?> </div>
                                            <div class="form-group">
                                                <label for="address">
                                                    <?php _e("Address", 'royal'); ?> </label>
                                                <?php ItemForm::address_text(osc_user()); ?> </div>
                                             <?php if (function_exists('osc_set_telephone_number')) { ?>
                                               <div class="form-group phone">
                                                  <div class="controls">
                                                        <?php osc_set_telephone_number(); ?>
                                                  </div></div>
                                             <?php } ?>
                                        </div>
                                        <!-- seller info -->
                                        <?php if(!osc_is_web_user_logged_in() ) { ?>
                                        <div class="box seller_info">
                                            <h2>
                                <?php _e("Seller's information", 'royal'); ?>
                            </h2>
                                            <div class="form-group">
                                                <label class="control-label" for="contactName">
                                                    <?php _e("Name", 'royal'); ?> </label>
                                                <div class="controls">
                                                    <?php ItemForm::contact_name_text(); ?> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="contactEmail">
                                                    <?php _e("E-mail", 'royal'); ?> </label>
                                                <div class="controls">
                                                    <?php ItemForm::contact_email_text(); ?> </div>
                                            </div>
                                            <?php } ?>
                                            <div class="form-group col-md-12">
                                                <?php if($edit) { ItemForm::plugin_edit_item(); } else { ItemForm::plugin_post_item(); } ?> </div>
                                            <div class="form-group">
                                                <?php if( osc_recaptcha_items_enabled() ) { ?>
                                                <div class="controls">
                                                    <?php osc_show_recaptcha(); ?> </div>
                                                <?php }?></div>
                                            <div class="form-group">
                                                <div class="cekk">
                                                    <?php ItemForm::show_email_checkbox(); ?> </div>
                                                <label for="showEmail">
                                                    <?php _e("Show e-mail on the listing page", 'royal'); ?> </label>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    <input class="cekk" type="checkbox" required="">
                                                    <?php _e("I agree to the", 'royal'); ?>
                                                    <a target="_blank" href="<?php echo osc_get_preference('tos-me', 'royal'); ?>">
                                                        <?php _e("Terms of Use", 'royal'); ?> </a>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <div class="controls">
                                                    <button class="btn btn-success btn-lg btn-block" type="submit"><i class="fa fa-plus"></i>
                                                        <?php if($edit) { _e("Update", 'royal'); } else { _e("Publish", 'royal'); } ?> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php osc_current_web_theme_path('footer.php'); ?>
<script type="text/javascript">
            $('#price').bind('hide-price', function(){
                $('.control-group-price').hide();
            });

            $('#price').bind('show-price', function(){
                $('.control-group-price').show();
            });

    <?php if(osc_locale_thousands_sep()!='' || osc_locale_dec_point() != '') { ?>
    $().ready(function(){
        $("#price").blur(function(event) {
            var price = $("#price").prop("value");
            <?php if(osc_locale_thousands_sep()!='') { ?>
            while(price.indexOf('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>')!=-1) {
                price = price.replace('<?php echo osc_esc_js(osc_locale_thousands_sep());  ?>', '');
            }
            <?php }; ?>
            <?php if(osc_locale_dec_point()!='') { ?>
            var tmp = price.split('<?php echo osc_esc_js(osc_locale_dec_point())?>');
            if(tmp.length>2) {
                price = tmp[0]+'<?php echo osc_esc_js(osc_locale_dec_point())?>'+tmp[1];
            }
            <?php }; ?>
            $("#price").prop("value", price);
        });
    });
    <?php }; ?>
</script>
<script>
        document.getElementById("contactName").maxLength = "30";
        $("#catId").attr("required", true);
        $("#countryId").attr("required", true);
        $("#regionId").attr("required", true);
        $("#cityId").attr("required", true);
    </script>
    </body>
</html>