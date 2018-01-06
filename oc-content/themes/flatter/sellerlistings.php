<?php 
$dlocation = array();
    if( osc_item_city() !== '' ) {
        $dlocation[] = osc_item_city();
    }
    if( osc_item_region() !== '' ) {
        $dlocation[] = osc_item_region();
    }
?>
<?php $ltd = osc_item_id($locale = ""); ?>
<?php osc_query_item(array("author"=>osc_item_user_id(), "results_per_page" => 6)); 
if( osc_count_custom_items() >= 2) { ?>
<div class="widget">
<h3><?php echo osc_item_contact_name(); ?> <?php _e('Listings', 'flatter'); ?></h3>
<div class="wblock sellerlisting">
	<?php while ( osc_has_custom_items() ) { ?>
		<div class="item <?php if ( $ltd == osc_item_id()) {echo "current";} ?> clearfix">
		
			<div class="row">
				<?php if( osc_images_enabled_at_items() ) { ?>
				<div class="col-md-4 col-sm-4 col-xs-4 picture">
				<?php if( osc_count_item_resources() >= 1 ) { ?>
					<a href="<?php echo osc_item_url(); ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" alt="<?php echo osc_item_title(); ?>" /></a>
				<?php } else { ?>
					<a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_current_web_theme_url('images/no-image.jpg'); ?>" alt="<?php echo osc_item_title(); ?>" class="img-responsive"></a>
				<?php } ?>
				</div>
				<?php } ?>
				<div class="col-md-8 col-sm-8 col-xs-8 detail">
					<h5><a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h5>
					<?php if( osc_price_enabled_at_items() ) { ?><span class="price bg"><?php echo osc_item_formated_price(); ?></span><?php } ?>
					<div class="location"><?php echo implode(', ', $dlocation); ?></div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php if( osc_count_custom_items() >= 6) { ?><div class="morelink"><a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>"><?php _e("See all listings", 'flatter');?>&nbsp;&nbsp;<i class="fa fa-external-link-square"></i>
</a></div><?php } ?>
</div>
</div>
<?php } ?>
	