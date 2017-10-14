<?php $size = explode('x', osc_thumbnail_dimensions()); ?>
<li class="listing-card <?php echo $class; if(osc_item_is_premium()){ echo ' premium'; } ?>">
<?php if( osc_images_enabled_at_items() ) { ?>
<?php if(osc_count_item_resources()) { ?>

<a class="listing-thumb" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
<?php } else { ?> <a class="listing-thumb" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_item_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
<?php } ?><?php } ?>


<div class="listing-detail">

<div class="listing-cell">

<div class="listing-data">

<div class="listing-basicinfo">
<?php if( osc_price_enabled_at_items() ) { ?>
<div class="list-currency-value"><?php echo osc_highlight(osc_format_price(osc_item_price()),14); ?></div><?php } ?>
<a href="<?php echo osc_item_url() ; ?>" class="title" title="<?php echo osc_esc_html(osc_item_title()) ; ?>"><?php echo osc_item_title() ; ?></a>
</div>
<div class="listing-attributes">
<span class="category"><?php echo osc_item_category() ; ?></span>
<span class="location"><?php echo osc_item_city(); ?> <?php if( osc_item_region()!='' ) { ?> (<?php echo osc_item_region(); ?>)
<?php } ?></span> 
<span class="date"> <?php echo osc_format_date(osc_item_pub_date()); ?> </span>
<?php if( osc_price_enabled_at_items() ) { ?><div class="grid-currency-value"><?php echo osc_format_price(osc_item_price()); ?></div><?php } ?>
</div>
 
  <?php if($admin){ ?>
  <span class="admin-options">
  <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'azzurro'); ?></a>
  <span>|</span>
  <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'azzurro')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'azzurro'); ?></a>
  <?php if(osc_item_is_inactive()) {?>
  <span>|</span>
  <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'azzurro'); ?></a>
  <?php } ?>
  </span>
  <?php } ?>
</div>
</div>
<p><?php echo osc_highlight( osc_item_description() ,180) ; ?></p>
</div>
</li>
