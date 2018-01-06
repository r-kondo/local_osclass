<?php
     $category = __get("category");
     if(!isset($category['pk_i_id']) ) {
         $category['pk_i_id'] = null;
     }
?>

<div id="sidebar">
	<?php if( osc_get_preference('subscribe_show', 'flatter_theme') !== '0') { ?>
	<?php osc_alert_form(); ?>
    <?php } ?>
    <div class="widget">
        <h3><?php _e('Your search', 'flatter'); ?></h3>
        <div class="wblock quicksearch">
        	<form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
            <input type="hidden" name="page" value="search"/>
            <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
            <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
            <?php foreach(osc_search_user() as $userId) { ?>
            <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
            <?php } ?>
            
            <div class="form-group">
            	<input type="text" class="form-control" name="sPattern"  id="query" placeholder="<?php echo osc_esc_html(__(osc_get_preference('keyword_placeholder', 'flatter_theme'), 'flatter')); ?>" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" />
            </div>
            
            <?php if( osc_images_enabled_at_items() ) { ?>
            <div class="form-group">
                <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> /> <?php _e('listings with pictures', 'flatter') ; ?>
            </div>
            <?php } ?>
            
            <h5><?php _e('Location', 'flatter'); ?></h5>
            <?php if( osc_get_preference('location_input', 'flatter_theme') == '0') { ?>
            <div class="form-group">
            	<input type="text" class="form-control" id="sCity" placeholder="<?php _e('City', 'flatter') ; ?>" name="sCity" value="<?php echo osc_esc_html(osc_search_city()); ?>" />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="sRegion" placeholder="<?php _e('Region', 'flatter') ; ?>" name="sRegion" value="<?php echo osc_esc_html(osc_search_region()); ?>" />
            </div>
            <script type="text/javascript">
				$(function() {
					function log( message ) {
						$( "<div/>" ).text( message ).prependTo( "#log" );
						$( "#log" ).attr( "scrollTop", 0 );
					}
			
					$( "#sCity" ).autocomplete({
						source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
						minLength: 2,
						select: function( event, ui ) {
							$("#sRegion").attr("value", ui.item.region);
							log( ui.item ?
								"<?php _e('Selected', 'flatter'); ?>: " + ui.item.value + " aka " + ui.item.id :
								"<?php _e('Nothing selected, input was', 'flatter'); ?> " + this.value );
						}
					});
				});
			</script>
            <?php } else { ?>
            
            <?php echo location();?>
         
            <?php } ?>
            
			<?php if( osc_price_enabled_at_items() ) { ?>
            <h5><?php _e('Price', 'flatter') ; ?></h5>
            <div class="form-group price-slide clearfix">
                <input class="form-control pull-left" type="text" id="priceMin" name="sPriceMin" placeholder="<?php _e('Min', 'flatter') ; ?>." value="<?php echo osc_esc_html(osc_search_price_min()); ?>" size="6" maxlength="6" />
                
                <input class="form-control pull-right" type="text" id="priceMax" name="sPriceMax" placeholder="<?php _e('Max', 'flatter') ; ?>." value="<?php echo osc_esc_html(osc_search_price_max()); ?>" size="6" maxlength="6" />
            </div>
            <?php } ?>
            <div class="plugin-hooks hidden-xs hidden-sm">
				<?php
                if(osc_search_category_id()) {
                    osc_run_hook('search_form', osc_search_category_id()) ;
                } else {
                    osc_run_hook('search_form') ;
                }
                ?>
            </div>
            <?php
			$aCategories = osc_search_category();
			foreach($aCategories as $cat_id) { ?>
				<input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html($cat_id); ?>"/>
			<?php } ?>
            <div class="form-group">
                <button type="submit" class="btn btn-clr"><?php _e('Apply', 'flatter') ; ?></button>
            </div>
            </form>
        </div>
    </div>
    <?php if( osc_get_preference('google_adsense', 'flatter_theme') !== '0' && osc_get_preference('adsense_searchside', 'flatter_theme') != null ) { ?>
    <div class="widget">
        <div class="wblock gadsense">
            <?php echo osc_get_preference('adsense_searchside', 'flatter_theme'); ?>
        </div>
    </div>
    <?php } ?>
    
    <div class="widget">
        <h3><?php _e('Refine category', 'flatter') ; ?></h3>
        <div class="wblock refine-category">
            <?php flatter_sidebar_category_search($category['pk_i_id']); ?>
        </div>
    </div>
    
    <?php if( osc_get_preference('position3_enable', 'flatter_theme') != '0') { ?>
		<div class="widget <?php if( osc_get_preference('position3_hide', 'flatter_theme') != '0') {echo"hidden-xs";}?>">
        	<div class="wblock gadsense position_3">
        	<?php echo osc_get_preference('position3_content', 'flatter_theme', "UTF-8"); ?>
            </div>
        </div>
  	<?php } ?>
</div>