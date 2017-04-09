<?php
    // meta tag robots
    osc_add_hook('header','osclasswizards_follow_construct');

    osclasswizards_add_body_class('home');
	
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<?php
if(osclasswizards_premium_listings_slider() == '1'){
    osc_get_premiums(osclasswizards_premium_listings_shown_home());
	
    if(osc_count_premiums() > 0) {

?>

<h1 class="title">
  <?php _e('Premium Listings',OSCLASSWIZARDS_THEME_FOLDER);?>
</h1>
<ul class="row premium_slider">
  <?php
		while ( osc_has_premiums() ) {
	?>
  <?php $size = explode('x', osc_thumbnail_dimensions()); ?>
  <li class="col-md-3 listing-card premium">
    <article class="loop_premium">
      <div class="figure">
        <figure>
          <?php if( osc_images_enabled_at_items() ) { ?>
          <?php if(osc_count_premium_resources()) { ?>
          <a class="listing-thumb" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"><img class="img-responsive" src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
          <?php } else { ?>
          <a class="listing-thumb" href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"><img class="img-responsive" src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_esc_html(osc_premium_title()) ; ?>" width="<?php echo $size[0]; ?>" height="<?php echo $size[1]; ?>"></a>
          <?php } ?>
          <?php } ?>
          <span class="ribbon"> <i class="fa fa-star"></i> </span><span class="onsale_wiz"> <?php echo osclasswizards_realEstate_type(osc_premium_ID());?> </span>
          
        </figure>
      </div>
      <div class="listing-attr">
      
      <div class="info_top">
            <h4><a href="<?php echo osc_premium_url() ; ?>" title="<?php echo osc_esc_html(osc_premium_title()) ; ?>"><?php echo osc_premium_title() ; ?></a></h4>
             <span class="location"><i class="fa fa-map-marker"></i> <?php echo osc_premium_city(); ?>
            <?php if(osc_premium_region()!='') { ?>
            (<?php echo osc_premium_region(); ?>)
            <?php } ?>
            </span>
            
              <?php if( osc_price_enabled_at_items() ) { ?>
        <span class="currency-value"><?php echo osc_format_price(osc_premium_price(), osc_premium_currency_symbol()); ?></span>
        <?php } ?>  
             <span class="wiz_area"> <strong><?php _e('Area:',OSCLASSWIZARDS_THEME_FOLDER);?></strong> <?php echo osclasswizards_realEstate_area(osc_premium_ID());?> </span> 
            
                    <div class="clear_state">

           
          <span class="wiz_floors"><strong><?php _e('Floors:',OSCLASSWIZARDS_THEME_FOLDER);?></strong> <?php echo osclasswizards_realEstate_floors(osc_premium_ID());?> </span>
          
                    <span class="wiz_rooms"> <strong><?php _e('Rooms:',OSCLASSWIZARDS_THEME_FOLDER);?></strong> <?php echo osclasswizards_realEstate_rooms(osc_premium_ID());?> </span>

          <span class="wiz_bathrooms"> <strong><?php _e('Shower:',OSCLASSWIZARDS_THEME_FOLDER);?></strong> <?php echo osclasswizards_realEstate_bathrooms(osc_premium_ID());?> </span>
          
          </div>
            
            </div>
        
      
        <?php $admin = false; ?>
        <?php if($admin){ ?>
        <span class="admin-options"> <a href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow">
        <?php _e('Edit item', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </a> <span>|</span> <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', OSCLASSWIZARDS_THEME_FOLDER)); ?>')" href="<?php echo osc_premium_delete_url();?>" >
        <?php _e('Delete', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </a>
        <?php if(osc_premium_is_inactive()) {?>
        <span>|</span> <a href="<?php echo osc_premium_activate_url();?>" >
        <?php _e('Activate', OSCLASSWIZARDS_THEME_FOLDER); ?>
        </a>
        <?php } ?>
        </span>
        <?php } ?>
      </div>
    </article>
  </li>
  <?php
  } 
  ?>
</ul>
<?php
	}
	}
 ?>
<?php osc_run_hook('inside-main'); ?>
<div class="content">
  <div class="title">
    <h1>
      <?php _e('Latest Listings', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
       </h1>
  </div>
  <div class="latest_ads">
    <?php if( osc_count_latest_items() == 0) { ?>
    <p class="empty">
      <?php _e("There aren't listings available at this moment", OSCLASSWIZARDS_THEME_FOLDER); ?>
    </p>
    <?php } else { ?>
    <?php
    View::newInstance()->_exportVariableToView("listType", 'latestItems');
	osc_current_web_theme_path('loop-grid.php');
    ?>
    <?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
    <p class="see_more_link"><a href="<?php echo osc_search_show_all_url() ; ?>"> <strong>
      <?php _e('See all listings', OSCLASSWIZARDS_THEME_FOLDER) ; ?>
      &raquo;</strong></a> </p>
    <?php } ?>
    <?php } ?>
  </div>

  <?php if( osc_get_preference('homepage-728x90', 'osclasswizards_theme') != "") { ?>
  <div class="ads_home"> <?php echo osc_get_preference('homepage-728x90', 'osclasswizards_theme'); ?> </div>
  <?php } ?>
</div>

<?php osc_current_web_theme_path('footer.php') ; ?>
