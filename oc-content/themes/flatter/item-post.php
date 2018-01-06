<?php
// meta tag robots
osc_add_hook('header','flatter_nofollow_construct');

osc_enqueue_script('tabber');
osc_enqueue_style('tabs', osc_current_web_theme_url('css/tabs.css'));

flatter_add_body_class('item item-post');
$action = 'item_add_post';
$edit = false;
if(Params::getParam('action') == 'item_edit'){
	$action = 'item_edit_post';
	$edit = true;
}
osc_enqueue_script('jquery-validate');
?>
<?php osc_current_web_theme_path('header.php') ; ?>

<?php if( osc_get_preference('location_input', 'flatter_theme') == '1') { ?>
	<?php ItemForm::location_javascript(); ?>
<?php } else { ?>
	<?php ItemForm::location_javascript_new(); ?>
<?php } ?>

<div class="itempost">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12 page-title">
        		<h1><?php if($edit) { ?> <?php _e('Edit your listing', 'flatter'); ?> <?php } else { ?> <?php _e('Publish a listing', 'flatter'); ?> <?php } ?></h1>
                
				<?php if( osc_get_preference('position9_enable', 'flatter_theme') != '0') { ?>
                <div id="position-widget"<?php if( osc_get_preference('position9_hide', 'flatter_theme') != '0') {echo"class='hidden-xs'";}?>>
                    <div class="dd-widget position_9">
                    <?php echo osc_get_preference('position9_content', 'flatter_theme', "UTF-8"); ?>
                    </div>
                </div>
              	<?php } ?>
            </div>
       </div>
     
    	<div class="row">
        	<div class="col-md-12">
            	<div id="content">
                <form name="item" action="<?php echo osc_base_url(true);?>" class="form-horizontal" method="post" enctype="multipart/form-data" id="item-post">
                <input type="hidden" name="action" value="<?php echo $action; ?>" />
                <input type="hidden" name="page" value="item" />
                <?php if($edit){ ?>
                <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                <?php } ?>
                <div class="generalbox">
                <h2><?php _e('General information', 'flatter'); ?><?php //_e('Publish a listing', 'flatter'); ?></h2>
                
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php _e('Category', 'flatter'); ?></label>
                        <div class="col-sm-8">
                          <?php ItemForm::category_select(null, null, __('Select a category', 'flatter')); ?>
                        </div>
                    </div>
                    <?php osc_goto_first_locale(); ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="title[<?php echo str_replace('_', '-', osc_current_user_locale()); ?>]"><?php _e('Title', 'flatter'); ?></label>
                        <div  class="col-sm-8">
							<?php ItemForm::title_input('title',osc_current_user_locale(), osc_esc_html( flatter_item_title() )); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="description[<?php echo osc_current_user_locale(); ?>]"><?php _e('Description', 'flatter'); ?></label>
                        <div  class="col-sm-8">
                            <?php ItemForm::description_textarea('description',osc_current_user_locale(), osc_esc_html( flatter_item_description() )); ?>
                        </div>
                    </div>
                    <?php if( osc_price_enabled_at_items() ) { ?>
                    <div class="form-group price-group">
                        <label class="col-sm-3 control-label" for="price"><?php _e('Price', 'flatter'); ?></label>
                        <div class="col-sm-8" id="price">
                            <?php ItemForm::price_input_text(); ?>
                            <?php ItemForm::currency_select(); ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="custombox">
                	<?php
					if($edit) {
						ItemForm::plugin_edit_item();
					} else {
						ItemForm::plugin_post_item();
					}
					?>
                </div>
                <div class="imagebox">
                    <h2><?php _e('Photos', 'flatter'); ?></h2>
                    <?php if( osc_images_enabled_at_items() ) {
                        ItemForm::ajax_photos();
                     } ?>
                </div>
                <div class="locationbox">
                    <h2><?php _e('Listing location', 'flatter'); ?></h2>
                    <?php if (count(osc_get_countries()) == 0 || count(osc_get_countries()) > 1) { ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="country"><?php _e('Country', 'flatter'); ?></label>
                        <div class="col-sm-8">
                            <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
                        </div>
                    </div>
                    <?php } else { ?>
                    <div style="display:none;"><?php ItemForm::country_text(); ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="region"><?php _e('Region', 'flatter'); ?></label>
                        <div class="col-sm-8">
                          <?php if( osc_get_preference('location_input', 'flatter_theme') == '1') { ?>
                          	<?php ItemForm::region_select(osc_get_regions(), osc_user()); ?>
                          <?php } else { ?>
                          	<?php ItemForm::region_text(osc_user()) ; ?>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="city"><?php _e('City', 'flatter'); ?></label>
                        <div class="col-sm-8">
						  <?php if( osc_get_preference('location_input', 'flatter_theme') == '1') { ?>
                            <?php ItemForm::city_select(osc_get_cities(), osc_user()); ?>
                          <?php } else { ?>
                            <?php ItemForm::city_text(osc_user()) ; ?>
                          <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="cityArea"><?php _e('City Area', 'flatter'); ?></label>
                        <div class="col-sm-8">
                            <?php ItemForm::city_area_text(osc_user()); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="address"><?php _e('Address', 'flatter'); ?></label>
                        <div class="col-sm-8">
                          <?php ItemForm::address_text(osc_user()); ?>
                        </div>
                    </div>
                </div>
               
                
                <?php if(!osc_is_web_user_logged_in() ) { ?>
                <div class="sellerbox">
                    <h2><?php _e("Seller's information", 'flatter'); ?></h2>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="contactName"><?php _e('Name', 'flatter'); ?></label>
                        <div class="col-sm-8">
                            <?php ItemForm::contact_name_text(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="contactEmail"><?php _e('E-mail', 'flatter'); ?></label>
                        <div class="col-sm-8">
                            <?php ItemForm::contact_email_text(); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <div class="checkbox">
                            <label>
                              <?php ItemForm::show_email_checkbox(); ?> <?php _e('Show e-mail on the listing page', 'flatter'); ?>
                            </label>
                          </div>
                        </div>
                     </div>
                    <?php } ?>
                    
                   	<?php if( osc_recaptcha_items_enabled() ) { ?>
                    <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-8">
                            	<?php echo responsive_recaptcha(); ?>
                                <?php osc_show_recaptcha(); ?>
                            </div>
                    </div>
                    <?php } ?>
                     <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-clr"><?php if($edit) { _e("Update", 'flatter'); } else { _e("Publish", 'flatter'); } ?></button>
                        </div>
                      </div>
                </div>
                </form>
            	</div>
            </div><!-- Post Add End -->
            
            <?php if( osc_get_preference('position10_enable', 'flatter_theme') != '0') { ?>
            <div id="position_widget"<?php if( osc_get_preference('position10_hide', 'flatter_theme') != '0') {echo"class='hidden-xs'";}?>>
            	<div class="col-md-12">
                <div class="dd-widget position_10">
                <?php echo osc_get_preference('position10_content', 'flatter_theme', "UTF-8"); ?>
                </div>
                </div>
            </div>
            <?php } ?>
                
		</div>
    </div>
</div>

<script type="text/javascript">
$('#price').bind('hide-price', function(){
	$('.price-group').hide();
});

$('#price').bind('show-price', function(){
	$('.price-group').show();
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