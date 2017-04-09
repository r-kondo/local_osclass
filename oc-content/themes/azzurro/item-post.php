<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2014 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    // meta tag robots
    osc_add_hook('header','azzurro_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    azzurro_add_body_class('item item-post');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit'){
        $action = 'item_edit_post';
        $edit = true;
    }

    ?>
<?php osc_current_web_theme_path('header.php') ; ?>
<?php
    if (azzurro_default_location_show_as() == 'dropdown') {
        ItemForm::location_javascript();
    } else {
        ItemForm::location_javascript_new();
    }
    ?>
    <div class="form-container form-horizontal">
        <div class="resp-wrapper">
            <div class="header">
                <h1><?php _e('Publish a listing', 'azzurro'); ?></h1>
            </div>
            <ul id="error_list"></ul>
                <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data" id="item-post">
                    <fieldset>
                    <input type="hidden" name="action" value="<?php echo $action; ?>" />
                        <input type="hidden" name="page" value="item" />
                    <?php if($edit){ ?>
                        <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                    <?php } ?>
                        <h2><?php _e('General Information', 'azzurro'); ?></h2>
                        <div class="box description"><div class="control-group">
                            <label class="control-label" for="select_1"><?php _e('Category', 'azzurro'); ?></label>
                            <div class="controls category"><div class="col-md-12">
                                <?php ItemForm::category_multiple_selects(null, null, __('Select a category', 'azzurro')); ?>
                            </div></div>
                        </div>
                        <div class="control-group">
                            <label class="control-label title" for="title[<?php echo osc_current_user_locale(); ?>]"><?php _e('Title', 'azzurro'); ?></label>
                            <div class="controls title"><div class="col-md-12">
                                <?php ItemForm::title_input('title',osc_current_user_locale(), osc_esc_html( azzurro_item_title() )); ?>
                            </div></div>
                        </div>
                        <div class="control-group">
                            <label class="control-label description" for="description[<?php echo osc_current_user_locale(); ?>]"><?php _e('Description', 'azzurro'); ?></label>
                            <div class="controls description"><div class="col-md-12">
                                <?php ItemForm::description_textarea('description',osc_locale_code(), osc_esc_html( azzurro_item_description() )); ?>
                            </div></div>
                        </div>
                        <?php if( osc_price_enabled_at_items() ) { ?>
                        <div class="control-group control-group-price">
                            <label class="control-label" for="price"><?php _e('Price', 'azzurro'); ?></label>
                            <div class="controls price"><div class="col-md-12">
                                <?php ItemForm::price_input_text(); ?>
                                <?php ItemForm::currency_select(); ?>
                            </div></div>
                        </div>
                        <?php } ?>
 

                        <?php if( osc_images_enabled_at_items() ) {
                            ItemForm::ajax_photos();
                         } ?>
 </div>
                <div class="item-post form-plugin">
                    <?php
                      if ( $edit ) {
                        ItemForm::plugin_edit_item();
                      } else {
                        ItemForm::plugin_post_item();
                      }
                    ?>
                  </div>
                        <div class="box location">
                            <h2><?php _e('Listing Location', 'azzurro'); ?></h2>

                            <div class="control-group">
                                <label class="control-label" for="country"><?php _e('Country', 'azzurro'); ?></label>
                                <div class="controls country"><div class="col-md-12">
                                    <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                                </div></div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="region"><?php _e('Region', 'azzurro'); ?></label>
                                <div class="controls region"><div class="col-md-12">
                                  <?php ItemForm::region_text(osc_user()); ?>
                                </div></div>
                                    </div>
                                    <div class="control-group">
                                <label class="control-label" for="city"><?php _e('City', 'azzurro'); ?></label>
                                <div class="controls city"><div class="col-md-12">
                                    <?php ItemForm::city_text(osc_user()); ?>
                                </div></div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="cityArea"><?php _e('City Area', 'azzurro'); ?></label>
                                <div class="controls city-area"><div class="col-md-12">
                                    <?php ItemForm::city_area_text(osc_user()); ?>
                                </div></div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="address"><?php _e('Address', 'azzurro'); ?></label>
                                <div class="controls address"><div class="col-md-12">
                                  <?php ItemForm::address_text(osc_user()); ?>
                                </div></div>
                            </div>
                        </div>
                        <!-- seller info -->
                        <?php if(!osc_is_web_user_logged_in() ) { ?>
                        <div class="box seller_info">
                            <h2><?php _e("Seller's information", 'azzurro'); ?></h2>
                            <div class="control-group">
                                <label class="control-label" for="contactName"><?php _e('Name', 'azzurro'); ?></label>
                                <div class="controls name"><div class="col-md-12">
                                    <?php ItemForm::contact_name_text(); ?>
                                </div></div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="contactEmail"><?php _e('E-mail', 'azzurro'); ?></label>
                                <div class="controls email"><div class="col-md-12">
                                    <?php ItemForm::contact_email_text(); ?>
                                </div></div>
                            </div>
                            <div class="control-group">
                                <div class="controls em-checkbox"><div class="col-md-12">
                                <?php ItemForm::show_email_checkbox(); ?> <label for="showEmail"><?php _e('Show e-mail on the listing page', 'azzurro'); ?></label>
                                </div></div>
                            </div>
                        </div>
                        <?php }  ?>
                        <div class="control-group">
                            <?php if( osc_recaptcha_items_enabled() ) { ?>
                                <div class="controls show-recaptcha">
                                    <?php osc_show_recaptcha(); ?>
                                </div>
                            <?php }?>
                            <div class="controls ad-submit">
                                <button type="submit" class="ui-button ui-button-middle ui-button-main"><?php if($edit) { _e("Update", 'azzurro'); } else { _e("Publish", 'azzurro'); } ?></button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
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
<?php osc_current_web_theme_path('footer.php'); ?>
