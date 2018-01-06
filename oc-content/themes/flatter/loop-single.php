<?php 
	$dlocation = array();
    if( osc_item_city() !== '' ) {
        $dlocation[] = osc_item_city();
    }
    if( osc_item_region() !== '' ) {
        $dlocation[] = osc_item_region();
    }
?>
<div class="listing-card col-md-4 col-sm-6 col-xs-6<?php echo $class; if(osc_item_is_premium()){ echo ' premium'; } ?>  wow fadeInUp animated">
	<div class="clearfix">
	<div class="listing-image">
    	<div class="image">
			<?php if( osc_images_enabled_at_items() ) { ?>
        	<?php if(osc_count_item_resources()) { ?>
                <a href="<?php echo osc_item_url(); ?>" title="<?php echo osc_item_title(); ?>"><img src="<?php echo osc_resource_preview_url(); ?>" alt="<?php echo osc_item_title() ; ?>" class="img-responsive" /></a>
            <?php } else { ?>
                <a href="<?php echo osc_item_url(); ?>" title="<?php echo osc_item_title(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no-photo.jpg'); ?>" alt="<?php echo osc_item_title() ; ?>" class="img-responsive" /></a>
            <?php } ?>
        	<?php } ?>
    	</div>
        <?php if(osc_item_is_premium()){ ?><div class="status sbg"><span class="premium"><?php _e('Premium', 'flatter'); ?></span></div><?php } ?>
        <?php if (function_exists("watchlist")) { ?>
            <div class="status wishlist">
                <?php if( osc_is_web_user_logged_in() ) { ?>
                    <?php watchlist2(); ?>
                <?php } else { ?>
                <a title="<?php _e("Add to watchlist", 'watchlist'); ?>" rel="nofollow" href="<?php echo osc_user_login_url(); ?>"><i class="fa fa-heart-o fa-lg"></i></a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
    
    <div class="listing-detail">
    	<h5 class="clr"><a href="<?php echo osc_item_url() ; ?>" class="title" title="<?php echo osc_item_title() ; ?>"><?php echo osc_item_title() ; ?></a></h5>
        <div class="listitem-detail"><?php echo osc_item_category(); ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo implode(', ', $dlocation); ?></div>
        <p><?php echo osc_highlight( strip_tags( osc_item_description()) ,150) ; ?></p>
        
        <?php if( osc_price_enabled_at_items() ) { ?><span class="price sclr"><?php echo osc_format_price(osc_item_price()); ?></span><?php } ?>
        <?php if(!osc_is_search_page()) { ?>
        <div class="listing-option">
            <?php if(osc_logged_user_id()== osc_item_user_id()) { ?>
                <span class="admin-options">
                    <a class="edit whover" href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><i class="fa fa-pencil"></i> <?php _e('Edit item', 'flatter'); ?></a>
                    <a class="delete whover" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'flatter')); ?>')" href="<?php echo osc_item_delete_url();?>" ><i class="fa fa-times"></i> <?php _e('Delete', 'flatter'); ?></a>
                    <?php if(osc_item_is_inactive()) {?>
                    <a class="active whover" href="<?php echo osc_item_activate_url();?>" ><i class="fa fa-check"></i> <?php _e('Activate', 'flatter'); ?></a>
                    <?php } ?>
                </span>
            <?php } ?>
        </div>
        <?php } ?>
    </div><!-- Detail -->
    </div>
</div>